<?php
namespace App\Controllers;
use App\Models\DBFileUpload;

class FileUpload extends BaseController
{
    protected $dbfileupload;

    public function __construct()
    {
        $this->dbfileupload = new DBFileUpload();
    }

    public function index()
    {
        return view('index');
    }

    public function fileExists(string $hash)
    {
        return $this->dbfileupload->where('file_hash', $hash)->countAllResults() > 0;
    }

    public function store()
    {
        $file = $this->request->getFile('file');

        // Validation Rules
        $validationRules = [
            'file' => [
                'uploaded[file]',
                'max_size[file, 10240]', // 10MB
                'ext_in[file,jpg,jpeg,pdf,png]'
            ]
        ];

        // Run Validation
        if(!$this->validate($validationRules))
        {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }

        // Check file upload errors
        if(!$file || !$file->isValid())
        {
            return redirect()->back()->with('error', $file->getErrorString());
        }

        // Prepare file data for uploading to mysql database table 'files'
        $fingerprint = sha1_file($file->getTempName());
        $hash = $fingerprint . "." . $file->getExtension();

        // file size in MB
        $fileSize = ($file->getSize() / 1000 / 1000);

        $fileData = [
            'file_name' => $file->getClientName(),
            'file_type' => $file->getClientMimeType(),
            'file_size' => $fileSize,
            'file_data' => file_get_contents($file->getTempName()),
            'file_hash' => $hash
        ];

        try
        {
            if($this->fileExists($hash))
            {
                //return redirect()->back()->with('error', 'File already uploaded!');
                throw new \Exception("File already uploaded!");
            }

            $fileUploadOK = $this->dbfileupload->insert($fileData);

            if($fileUploadOK === false)
            {
                throw new \Exception("Error Uploading File. Please try again later!");
            }

            return redirect()->back()->with('success', 'File uploaded successfully!');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
?>
