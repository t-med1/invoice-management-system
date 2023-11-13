<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Facture;
use App\Models\Relancement;
use App\Models\Client;

class RelanceController extends BaseController
{
    public function Relance()
    {
        $session = session();

        // Vérifier si l'utilisateur est connecté en tant qu'admin
        if (!$session->get('nom_complet')) {
            return redirect()->to('/');
        }
        $db = db_connect(); // connect to the database

        // perform a join query between the `Client`, `Facture`, and `Paiment` tables
        $result = $db->table('client')
        ->join('facture', 'facture.id_client = client.id_client')
        ->select('client.*, facture.id_facture, facture.relance_faite')
        ->get()
        ->getResultArray();
    return view('factures/pages/tables/basicTable', ['result' => $result]);
    }
    public function updateRelancement($id_facture)
    {
        $factureModel = new Facture();

        $relance_faite = $this->request->getPost('relance_faite') === 'on';
        $factureModel->updateRelancement($id_facture, $relance_faite);

        return redirect()->to(base_url('/tablesRelance'));
    }

}
