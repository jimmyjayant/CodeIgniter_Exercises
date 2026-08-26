<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class CRUDModel extends Model
    {
        protected $table = 'users';
        protected $primaryKey = 'id';
        protected $allowedFields = ['name', 'email'];

        protected $validationRules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email'
        ];
    }
?>
