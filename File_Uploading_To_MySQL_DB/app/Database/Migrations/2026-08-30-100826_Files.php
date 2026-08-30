<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Files extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => '6',
                'auto_increment' => 'true',
                'unsigned' => 'true'
            ],
            'file_name' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'file_type' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'file_size' => [
                'type' => 'int',
                'constraint' => '6'
            ],
            'file_data' => [
                'type' => 'longblob'
            ],
            'file_hash' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => 'false'
            ],
            'created_at' => [
                'type' => 'timestamp'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('file_hash');
        $this->forge->createTable('files');
    }

    public function down()
    {
        // Reverse back the changes in case migration fails
        $this->forge->dropTable("files");
    }
}
?>
