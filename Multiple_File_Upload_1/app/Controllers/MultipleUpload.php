<?php
namespace App\Controllers;

class MultipleUpload extends BaseController
{
    public function index()
    {
        // Return the webpage index.php
        return view("index");
    }

    public function store()
    {
        // Will get a nested array of files
        $files = $this->request->getFiles();

        // Validation Rules
        $validationRules = [
            'myfiles' => [
                'uploaded[myfiles]',
                'max_size[myfiles, 10240]', // 10MB
                'ext_in[myfiles,jpg,jpeg,png,pdf]'
            ]
        ];

        if($files)
        {
            // Run validation
            if(!$this->validate($validationRules))
            {
                return redirect()->back()->with('error', $this->validator->getErrors());
                // getErrors() return an array
            }

            foreach($files['myfiles'] as $file)
            {
                // Check if file upload OK
                if(!$file->isValid())
                {
                    return redirect()->back()->with('error', $file->getErrorString());
                }

                // Move the uploaded file from temporary to permanent location
                if(!$file->hasMoved())
                {
                    $file->move(WRITEPATH . 'uploads/', $file->getRandomName());
                }
            }

            return redirect()->back()->with('success', 'Files Uploaded Successfully!');
        }
    }
}
?>
