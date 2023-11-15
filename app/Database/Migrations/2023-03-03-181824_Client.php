<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Client extends Migration
{
    public function up()
    {
        // CREATE TABLE FOR CLIENTS
        $this->forge->addField([
            'id_client'=>[
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'ICE'=>[
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'nom'=>[
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'numero_telephone'=>[
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false
            ],
            'email_client'=>[
                'type' => 'VARCHAR',
                'constraint' => 600,
                'null' => false
            ],
            'adresse'=>[
                'type' => 'VARCHAR',
                'constraint' => 600,
                'null' => false
            ],
            'ville'=>[
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'pays'=>[
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
        ]);
        $this->forge->addKey('id_client', true);
        $this->forge->createTable('client');
    }

    public function down()
    {
        // FOR DELETE TABLE CLIENT
        $this->forge->dropTable('client');
    }
}

