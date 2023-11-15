<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RelancementSeeder extends Seeder
{
    public function run()
    {
        // add the initial informations
        $data = [ // en cours de traitement
            [
                'id_client' => 2,
                'relance_faite' => true,
            ],
            [
                'id_client' => 1,
                'relance_faite' => false,
            ]
        ];
        $this->db->table('relancement')->insertBatch($data);
    }
}