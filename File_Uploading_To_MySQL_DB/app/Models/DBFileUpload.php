<?php
namespace App\Models;
use CodeIgniter\Model;

class DBFileUpload extends Model
{
    protected $table = 'files';
    protected $primaryKey = 'id';
    protected $allowedFields = ['file_name', 'file_type', 'file_size', 'file_data', 'file_hash'];
}
?>
