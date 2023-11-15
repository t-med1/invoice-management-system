<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Facture extends Migration
{
    public function up()
    {
        // CREATE TABLE FOR FACTURES
        $this->forge->addField([
            'id_facture'=>[
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'id_client'=>[
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true
            ],
            'date_saisie'=>[
                'type' => 'DATE',
                'null' => false
            ],
            'date_emission'=>[
                'type' => 'DATE',
                'null' => false
            ],
            'date_apres_emission'=>[
                'type' => 'INT',
                'constraint' => 5,
                'null' => true
            ],
            'date_echeance'=>[
                'type' => 'DATE',
                'null' => false
            ],
        ]);
        $this->forge->addKey('id_facture', true);
        $this->forge->addForeignKey('id_client','client','id_client');
        $this->forge->createTable('facture');
           
    }

    public function down()
    {
        // FOR DELETE TABLE FACTURE
        $this->forge->dropTable('facture');
    }
}
