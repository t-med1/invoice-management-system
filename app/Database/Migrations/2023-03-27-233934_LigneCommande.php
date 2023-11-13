<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LigneCommande extends Migration
{
    public function up()
    {
        //CREATE TABLE FOR Service
        $this->forge->addField([
            'id_service'=>[
                'type' => 'INT',
                'constraint' => 5,
            ],
            'id_devis'=>[
                'type' => 'VARCHAR',
                'constraint' => 80
            ],
            'description_service' => [
                'type' => 'VARCHAR',
                'constraint' => 600,
                'null' => false
            ],
            'prix_unitaire'=>[
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'qte_commande' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false
            ],
        ]);
        
        $this->forge->addPrimaryKey(['id_service', 'id_devis']);
        $this->forge->addForeignKey('id_service', 'service', 'id_service');
        $this->forge->addForeignKey('id_devis', 'devis', 'id_devis');
        $this->forge->createTable('lignecommande');
    
    }

    public function down()
    {
        //FOR DELETE TABLE lignecommande
        $this->forge->dropTable('lignecommande');
    }
}
