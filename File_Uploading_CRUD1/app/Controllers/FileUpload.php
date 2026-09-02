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

    // Default method to display the webpage index.php
    public function index()
    {
        try
        {
            $data = [
                // Fetch 10 records automatically 
                'files' => $this->dbfileupload->paginate(10),
                // Keep track of total records, current page and templates
                'pager' => $this->dbfileupload->pager
            ];

            if(!isset($data))
            {
                return view('index');
            }

            return view('index', $data);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Method to return the webpage create.php 
    public function create()
    {
        return view('create');
    }

    // Method to check if file to be uploaded already exists in mysql database table
    public function fileExists(string $hash)
    {
        // will return true or false
        return $this->dbfileupload->where('file_hash', $hash)->countAllResults() > 0;
    }

    // Method to upload the file to mysql database table
    public function store()
    {
        // Get the uploaded file
        $file = $this->request->getFile('file');

        // Validation Rules
        $validationRules = [
            'file' => [
                'uploaded[file]',
                'max_size[file, 10240]', // 10MB
                'ext_in[file,jpg,jpeg,png,pdf]'
            ]
        ];

        // Run validation on the uploaded file
        if(!$this->validate($validationRules))
        {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }

        // Check file upload error
        if(!$file || !$file->isValid())
        {
            return redirect()->back()->with('error', $file->getErrorString());
        }

        try
        {
            // Check if file already exists

            // Prepare hash (unique fingerprint) of the uploaded file
            $fingerprint = sha1_file($file->getTempName());
            $hash = $fingerprint . "." . $file->getExtension();

            if($this->fileExists($hash))
            {
                throw new \Exception('File already exists!');
            }

            $fileName = $file->getClientName();
            $fileType = $file->getClientMimeType();
            $fileSize = $file->getSize(); // In bytes
            $fileData = file_get_contents($file->getTempName());

            $InsertFileData = [
                'file_name' => $fileName,
                'file_size' => $fileSize,
                'file_type' => $fileType,
                'file_hash' => $hash,
                'file_data' => $fileData
            ];

            $fileUploadOK = $this->dbfileupload->insert($InsertFileData);

            if($fileUploadOK === false)
            {
                throw new \Exception('Error Uploading File!');
            }

            return redirect()->back()->with('success', 'File Uploaded Successfully!');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Method to delete the file uploaded to mysql database table
    public function delete($id)
    {
        try
        {
            $IsFileDeleted = $this->dbfileupload->delete($id);

            if(!$IsFileDeleted)
            {
                throw new \Exception('Error Deleting File!');
            }

            return redirect()->back()->with('success', 'File deleted successfully!');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Method to upload different file at the given serial number (id) of mysql database table
    public function edit($id)
    {
        try
        {
            $data['file'] = $this->dbfileupload->find($id);

            if(!$data['file'])
            {
                throw new \Exception('File Not Found!');
            }

            return view('edit', $data);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Method to update the uploaded file with a new one
    public function update($id)
    {
        // Get the uploaded file
        $file = $this->request->getFile('file');

        // Validation Rules
        $validationRules = [
            'file' => [
                'uploaded[file]',
                'max_size[file, 10240]', // 10MB
                'ext_in[file,jpg,jpeg,png,pdf]'
            ]
        ];

        // Run validation on the uploaded file
        if(!$this->validate($validationRules))
        {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }

        // Check file upload error
        if(!$file || !$file->isValid())
        {
            return redirect()->back()->with('error', $file->getErrorString());
        }

        try
        {
            // Check if file already exists

            // Prepare hash (unique fingerprint) of the uploaded file
            $fingerprint = sha1_file($file->getTempName());
            $hash = $fingerprint . "." . $file->getExtension();

            if($this->fileExists($hash))
            {
                throw new \Exception('File already exists!');
            }

            $fileName = $file->getClientName();
            $fileType = $file->getClientMimeType();
            $fileSize = ($file->getSize() / 1000 / 1000);
            $fileData = file_get_contents($file->getTempName());

            $UpdateFileData = [
                'file_name' => $fileName,
                'file_size' => $fileSize,
                'file_type' => $fileType,
                'file_hash' => $hash,
                'file_data' => $fileData
            ];

            $UpdateFileOK = $this->dbfileupload->update($id, $UpdateFileData);

            if($UpdateFileOK === false)
            {
                throw new \Exception('Error Updating File!');
            }

            return redirect()->back()->with('success', 'File Updated Successfully!');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Method to download the uploaded file 
    public function download($id)
    {
        try
        {
            $file = $this->dbfileupload->find($id);

            if(!$file)
            {
                throw new \Exception('File Not Found!');
            }

            return $this->response
                        ->setHeader('Content-Type', $file['file_type'])
                        ->setHeader('Content-Disposition', 'attachment; filename="' . $file['file_name'] . '"')
                        ->setBody($file['file_data']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Method to view the uploaded file
    public function view($id)
    {
        try
        {
            $file = $this->dbfileupload->find($id);

            if(!$file)
            {
                throw new \Exception('File Not Found!');
            }

            return $this->response
                        ->setHeader('Content-Type', $file['file_type'])
                        ->setHeader('Content-Length', $file['file_size'])
                        ->setBody($file['file_data']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
?>
