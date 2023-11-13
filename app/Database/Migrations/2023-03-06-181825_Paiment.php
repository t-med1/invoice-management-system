<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Paiment extends Migration
{
    public function up()
    {
         // CREATE TABLE FOR Paiment
         $this->forge->addField([
            'id_paiment'=>[
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_facture'=>[
                'type' => 'VARCHAR',
                'constraint' => 80
            ],
            'montant_paye'=>[
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true
            ],
            'montant_rest'=>[
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'date_dernier_paiment'=>[
                'type' => 'DATE',
                'null' => true
            ],
            'status'=>[
                'type' => "ENUM('echue','non Echue','encaissee')",
                'null' => false
            ],
            'status_litige'=>[
                'type' => "ENUM('normal','technique','commercial','irrecouvrable')",
                'null' => false
            ],
            'status_paiment'=>[
                'type' => "ENUM('impayee','paiement partiel','encaissee')",
                'null' => true
            ],
        ]);
        $this->forge->addKey('id_paiment', true);
        $this->forge->addForeignKey('id_facture','facture','id_facture');
        $this->forge->createTable('paiment');
    }

    public function down()
    {
        // FOR DELETE TABLE PAIMENT
        $this->forge->dropTable('paiment');
    }
}
