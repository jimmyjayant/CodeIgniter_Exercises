<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'firstname', 'middlename', 'lastname', 'gender', 'mobilenumber', 'address', 'email', 'password', 'login_status', 'token'
    ];
}
?>
