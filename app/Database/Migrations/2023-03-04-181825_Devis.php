<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Devis extends Migration
{
    public function up()
    {
        // CREATE TABLE FOR Devis
        $this->forge->addField([
            'id_devis'=>[
                'type' => 'VARCHAR',
                'constraint' => 80
            ],
            'id_client'=>[
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'date_saisie'=>[
                'type' => 'DATE',
                'null' => false
            ],
            'total_ht'=>[
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'total_ttc'=>[
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true
            ],
            'modalite_paiement'=>[
                'type' => 'VARCHAR',
                'constraint' => 600,
                'null' => false
            ],
            'etat'=>[
                'type' => 'VARCHAR',
                'constraint' => 600,
                'null' => false
            ],
            
        ]);
        $this->forge->addKey('id_devis', true);
        $this->forge->addForeignKey('id_client','client','id_client');
        $this->forge->createTable('devis');
           
    }

    public function down()
    {
        // FOR DELETE TABLE Devis
        $this->forge->dropTable('devis');
    }
    
}


