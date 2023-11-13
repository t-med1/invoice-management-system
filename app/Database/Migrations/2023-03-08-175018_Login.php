<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Login extends Migration
{
    public function up()
    {
        // CREATE TABLE FOR Admins
        $this->forge->addField([
            'code_admin'=>[
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
                'null' => false
            ],
            'nom_complet'=>[
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false
            ],
            'email'=>[
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false
            ],
            'password'=>[
                'type' => 'VARCHAR',
                'constraint' => 14,
                'null' => false
            ]
        ]);
        $this->forge->addKey('code_admin', true);
        $this->forge->createTable('admin');
    }

    public function down()
    {
        // FOR DELETE TABLE Admins
        $this->forge->dropTable('admin');
    }
}
