<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaimentSeeder extends Seeder
{
    public function run()
    {
        // add the initial informations
        $data = [
            [
                "id_facture" => '04-001',
                'montant_paye' => 2000.00,
                'montant_rest' => 0,
                'date_dernier_paiment' => '2020-03-13',
                'status' => 'encaissee',
                'status_litige' => 'commercial',
                'status_paiment' => 'encaissee',
            ],
            [
                "id_facture" => '04-002',
                'montant_paye' => 0,
                'montant_rest' => 1500,
                'date_dernier_paiment' => '',
                'status' => 'non Echue',
                'status_litige' => 'normal',
                'status_paiment' => 'impayee',
            ]
        ];

        $this->db->table('paiment')->insertBatch($data);
    }
}