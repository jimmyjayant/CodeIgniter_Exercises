<?php
namespace App\Controllers;

class Reuploading extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function store()
    {
        $file = $this->request->getFile('file');

        $validationRules = [
            'file' => [
                'uploaded[file]',
                'max_size[file, 10240]',
                'ext_in[file,jpg,jpeg,png,pdf]'
            ]
        ];

        if(!$this->validate($validationRules))
        {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }

        if(!$file || !$file->isValid())
        {
            return redirect()->back()->with('error', $file->getErrorString());
        }

        $fingerprint = sha1_file($file->getTempName());
        $targetName = $fingerprint . '.' . $file->getExtension();
        $targetPath = WRITEPATH . 'uploads/' . $targetName;

        if(file_exists($targetPath))
        {
            return redirect()->back()->with('file_exist_error', $file->getName() . ' already uploaded.');
        }
        else
        {
            $file->move(WRITEPATH . 'uploads/', $targetName);
        }

        return redirect()->back()->with('success', 'File uploaded successfully');
    }
}
?>
