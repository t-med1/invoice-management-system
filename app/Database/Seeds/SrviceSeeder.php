<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SrviceSeeder extends Seeder
{
    public function run()
    {
        // add the initial informations
        $data = [
            [
                'titre' => 'Creation Site Web',
                'descriptif_devis' => "cretion dun site web avec une base de donnees",
                'prix_unitaire' => 1000,
            ],
            [
                'titre' => 'Reseau sociaux',
                'descriptif_devis' => "faire des postes dans les reseau sociaux . faire du referencement",
                'prix_unitaire' => 1000,
            ]
        ];

        $this->db->table('service')->insertBatch($data);
    }
}
