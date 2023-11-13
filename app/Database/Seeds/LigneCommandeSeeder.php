<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LigneCommandeSeeder extends Seeder
{
    public function run()
    {
        // add the initial informations
        $data = [
            [
                'id_service' => 1,
                'id_devis' => '04-001',
                'description_service' => '-Creation site web frontEnd -creation avec basec de bonnées',
                'prix_unitaire' => 4,
                'qte_commande' => 4,
            ],
            [
                'id_service' => 2,
                'id_devis' => '04-002',
                'description_service' => '-publication instagram -publication facebook',
                'prix_unitaire' => 4,
                'qte_commande' => 4,
            ]
        ];

        $this->db->table('lignecommande')->insertBatch($data);
    }
}
