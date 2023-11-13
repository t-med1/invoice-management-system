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
                'id_facture' => '04-001',
                'id_client' => 1,
                'date_saisie' => '2020-04-02',
                'date_emission' => '2020-04-02',
                'date_apres_emission' => 5,
                'date_echeance' => '2020-04-12',
                'relance_faite' => false
            ],
            [
                'id_facture' => '04-002',
                'id_client' => 2,
                'date_saisie' => '2020-04-05',
                'date_emission' => '2020-04-05',
                'date_apres_emission' => 3,
                'date_echeance' => '2020-04-15',
                'relance_faite' => true
            ]
        ];

        $this->db->table('facture')->insertBatch($data);
    }
    public function dateCurrent(){
        $data['dateCurrent'] = date('Y-m-d');
        return view('pages/forms/create', $data);
    }
}