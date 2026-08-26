<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => '6',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'created_at' => [
                'type' => 'TIMESTAMP'
            ]
        ]);

        $this->forge->addKey("id", true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        // Reverse the changes if you roll back the migration
        $this->forge->dropTable("users");
    }
}
