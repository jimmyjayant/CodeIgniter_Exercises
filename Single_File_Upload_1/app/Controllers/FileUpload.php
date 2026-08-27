<?php
namespace App\Controllers;

class FileUpload extends BaseController
{
    public function index()
    {
        // Returns the webpage index.php
        return view("index");
    }

    public function store()
    {
        /* This store() method is used to get the uploaded file, 
            validate it using validation rules,
            check file upload errors if any,
            then move the uploaded file to permanent location (writable/uploads).
            And in the process, return appropriate error or success messages back to the index.php webpage.
            Extensions allowed are .jpg, .jpeg, .pdf, .png
        */
        
        $file = $this->request->getFile('myfile');

        // Validation Rules
        $validationRules = [
            'myfile' => [
                'uploaded[myfile]',
                'max_size[myfile, 10240]',
                'ext_in[myfile,jpg,jpeg,png,pdf]'
            ]
        ];

        // Run validation
        if(!$this->validate($validationRules))
        {
            return redirect()->back()->with('error', $this->validator->getError('myfile'));
        }

        // Check file upload error
        if(!$file || !$file->isValid())
        {
            return redirect()->back()->with('error', $file->getErrorString());
        }

        // Get new name of uploaded file
        $newName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads/', $newName);

        // Check if file is already moved to permanent location
        if($file->hasMoved())
        {
            return redirect()->back()->with('success', 'File Uploaded Successfully!');
        }        
    }
}
?>
