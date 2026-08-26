<?php
namespace App\Controllers;

class FormValidation extends BaseController
{
    public function index()
    {
        return view("index");
    }

    public function login()
    {
        $validationRules = [
            'email' => 'required|valid_email',
            'pass' => 'required|min_length[3]|max_length[12]'
        ];

        if(!$this->validate($validationRules))
        {
            return view('index', ['validation' => $this->validator]);
        }

        return view('login_success');
    }
}
?>
