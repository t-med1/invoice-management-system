<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FactureSeeder extends Seeder
{
    public function run()
    {
        // add the initial informations
        $data = [
            [
                'id_facture' => '03-001',
                'id_paiment' => 1,
                'id_client' => null,
                'date_saisie' => '2020-03-02',
                'date_emission' => '2020-03-02',
                'date_apres_emission' => 5,
                'date_echeance' => '2020-03-12',
            ],
            [
                'id_facture' => '03-002',
                'id_paiment' => 2,
                'id_client' => 2,
                'date_saisie' => '2020-03-05',
                'date_emission' => '2020-03-05',
                'date_apres_emission' => '',
                'date_echeance' => '2020-03-15',
            ]
        ];

        $this->db->table('facture')->insertBatch($data);
    }
    public function dateCurrent(){
        $data['dateCurrent'] = date('Y-m-d');
        return view('pages/forms/create', $data);
    }
}