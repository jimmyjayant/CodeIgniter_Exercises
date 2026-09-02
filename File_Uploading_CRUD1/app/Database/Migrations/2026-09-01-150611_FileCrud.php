<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FileCrud extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => '10',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'file_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'file_size' => [
                'type' => 'INT',
                'constraint' => '10'
            ],
            'file_type' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'file_hash' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'file_data' => [
                'type' => 'longblob',
            ],
            'created_at' => [
                'type' => 'timestamp'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('file_hash');
        $this->forge->createTable('file_crud');
    }

    public function down()
    {
        // Reverse the changes if migration fails
        $this->forge->dropTable('file_crud');
    }
}
?>
