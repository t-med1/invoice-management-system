<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Service extends Migration
{
    public function up()
    {
        //CREATE TABLE FOR Service
        $this->forge->addField([
            'id_service'=>[
                'type' => 'INT',
                'auto_increment' => true,
                'constraint' => 5,
            ],
            'titre'=>[
                'type' => 'VARCHAR',
                'constraint' => 600,
                'null' => false
            ],
            'descriptif_devis'=>[
                'type' => 'VARCHAR',
                'constraint' => 600,
                'null' => false
            ],
            'prix_unitaire'=>[
                'type' => 'INT',
                'constraint' => 5,
                'null' => false
            ]
        ]);

        $this->forge->addKey('id_service', true);
        $this->forge->createTable('service');
           
    }

    public function down()
    {
        //FOR DELETE TABLE Service
        $this->forge->dropTable('service');
    }
}
