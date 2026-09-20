<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'middlename' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['male', 'female'],
                'default' => 'male'
            ],
            'mobilenumber' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'login_status' => [
                'type' => 'ENUM',
                'constraint' => ['login', 'logout'],
                'default' => 'logout'
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->addUniqueKey('token');
        $this->forge->createTable('user');
    }

    public function down()
    {
        // Reverse the changes if you roll back the migration
        $this->forge->dropTable('user');
    }
}
?>
