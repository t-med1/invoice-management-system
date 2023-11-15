<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DevisSeeder extends Seeder
{
    public function run()
    {
        // add the initial informations
        $data = [
            [
                'id_devis' => '03-001',
                'id_client' => 1,
                'date_saisie' => '2020-03-02',
                'date_emission' => '2020-03-02',
                'date_echeance' => '2020-03-11',
                'total_ht' => 2000,
                'total_ttc' => 0,
            ],
            [
                'id_devis' => '03-002',
                'id_client' => 2,
                'date_saisie' => '2020-03-05',
                'date_emission' => '2020-03-05',
                'date_echeance' => '2020-03-14',
                'total_ht' => 1300,
                'total_ttc' => 1500,
            ]
        ];

        $this->db->table('devis')->insertBatch($data);

    }
}
