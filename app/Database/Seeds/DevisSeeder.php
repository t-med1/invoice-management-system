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
                'id_devis' => '04-001',
                'id_client' => 1,
                'date_saisie' => '2020-04-02',
                'total_ht' => 2000,
                'total_ttc' => 0,
                'modalite_paiement' => "demi demi",
                'etat' => 'accorde'
            ],
            [
                'id_devis' => '04-002',
                'id_client' => 2,
                'date_saisie' => '2020-04-05',
                'total_ht' => 1300,
                'total_ttc' => 1500,
                'modalite_paiement' => "service prepaye",
                'etat' => 'accorde'
            ]
        ];

        $this->db->table('devis')->insertBatch($data);

    }
}
