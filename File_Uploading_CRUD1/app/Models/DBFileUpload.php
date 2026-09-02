<?php
namespace App\Models;
use CodeIgniter\Model;

class DBFileUpload extends Model
{
    protected $table ='file_crud';
    protected $primaryKey = 'id';
    protected $allowedFields = ['file_name', 'file_size', 'file_type', 'file_hash', 'file_data'];
}
?>
