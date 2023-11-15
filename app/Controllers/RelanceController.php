<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Relancement;
use App\Models\Client;

class RelanceController extends BaseController
{
    public function Relance()
    {
        $session = session();
    
        // Vérifier si l'utilisateur est connecté en tant qu'admin
        
        $db = db_connect(); // connect to the database
    
        // Perform a subquery to retrieve distinct clients
        $subQuery = $db->table('facture')
                      ->select('id_client')
                      ->groupBy('id_client');
    
        // Perform the main query with the subquery to get distinct clients with their relancement information
        $result = $db->table('client')
                    ->join('relancement', 'relancement.id_client = client.id_client')
                    ->whereIn('client.id_client', $subQuery)
                    ->select('client.*, relancement.*')
                    ->get()
                    ->getResultArray();
    
        return view('factures/pages/tables/basicTable', ['result' => $result]);
    }
    
}
