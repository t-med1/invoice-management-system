<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Relancement extends Migration
{
        public function up()
        {
            // CREATE TABLE FOR Relancement
            $this->forge->addField([
                'id_relance'=>[
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true
                ],
                'id_client'=>[
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'null' => false
                ],
                'id_facture'=>[
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'null' => false
                ],
                'relance_faite'=>[
                    'type' => 'BOOLEAN',
                    'default' => false,
                    'null' => false
                ],
            ]);
            $this->forge->addKey('id_relance', true);
            $this->forge->addForeignKey('id_client', 'client', 'id_client');
            $this->forge->createTable('relancement');
        }

    public function down()
    {
        // FOR DELETE TABLE RELANCEMENT
        $this->forge->dropTable('relancement');
    }
}
