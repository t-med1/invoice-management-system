<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LoginSeeder extends Seeder
{
    public function run()
    {
        // add the initial informations
        $data = [
            [
                'nom_complet'=> 'Younes Yaagoubi',
                'email' => 'fes.marketing@gmail.com',
                'password' => 'adminpage',
            ],
        ];

        $this->db->table('admin')->insertBatch($data);
    }
}
