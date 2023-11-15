<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        // add the initial informations
        $data = [
            [
                'id_client' =>1,
                'nom' => 'Telaj',
                'prenom' => 'Mohammed',
                'email_client' => 'med.telaj404@gmail.com',
                'numero_telephone' => '0620963627',
                'ville' => 'FES',
                'pays' => 'Maroc'
            ],
            [
                'id_client' => 2,
                'nom' => 'Alaoui',
                'prenom' => 'Mehdi',
                'email_client' => 'alaoui.mehdi@gmail.com',
                'numero_telephone' => '0729105673',
                'ville' => 'Rabat',
                'pays' => 'Maroc',
            ]
        ];

        $this->db->table('client')->insertBatch($data);
    }
}