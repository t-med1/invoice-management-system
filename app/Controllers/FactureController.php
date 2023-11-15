<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Facture;
use App\Models\Client;
use App\Models\DevisModel;
use App\Models\LigneCommandeModel;
use App\Models\Paiment;
use App\Models\Relancement;
use App\Models\ServiceModel;


class FactureController extends BaseController
{
    // Methode pour afficher les donnees du tableau facture
    public function index()
    {
        $session = session();
        $ServiceModel = new ServiceModel;
        $modelClient = new Client();
        // recupration de tous les donnees
        $columns = array('facture.*', 'client.*', 'paiment.*', 'devis.*');
        $resultat = $modelClient
            ->join('devis', 'devis.id_client = client.id_client')
            ->join('facture', 'facture.id_client = client.id_client')
            ->join('paiment', 'facture.id_facture = paiment.id_facture')
            ->join('lignecommande', 'lignecommande.id_devis = devis.id_devis')
            ->select($columns)->orderBy('facture.date_saisie', 'DESC')
            ->get()->getResultArray();

        $factures = [];

        foreach ($resultat as $facture) {
            $id = $facture['id_devis'];
            $columns = array('service.titre', 'lignecommande.description_service', 'lignecommande.prix_unitaire', 'lignecommande.qte_commande');
            $infos = $ServiceModel->join('lignecommande', 'service.id_service = lignecommande.id_service')
                ->select($columns)->where('lignecommande.id_devis', $id)->get()->getResultArray();
            array_push($factures, [
                'id_facture' => $facture['id_facture'],
                'id_devis' => $facture['id_devis'],
                'nom' => $facture['nom'],
                'id_client' => $facture['id_client'],
                'id_paiment' => $facture['id_paiment'],
                'date_saisie' => $facture['date_saisie'],
                'total_ht' => $facture['total_ht'],
                'total_ttc' => $facture['total_ttc'],
                'date_emission' => $facture['date_emission'],
                'date_echeance' => $facture['date_echeance'],
                'date_dernier_paiment' => $facture['date_dernier_paiment'] ?? null,
                'montant_paye' => $facture['montant_paye'],
                'status' => $facture['status'],
                'status_litige' => $facture['status_litige'],
                'status_paiment' => $facture['status_paiment'],
                'infos' => $infos,
            ]);
        }
        $factures = array_unique($factures, SORT_REGULAR);
        $factures = array_filter($factures, function($facture, $index) use($factures) {
            for ($i = 0; $i < $index; $i++) {
                if ($facture['id_facture'] == $factures[$i]['id_facture']) {
                    return false;
                }
            }
            return true;
        }, ARRAY_FILTER_USE_BOTH);
        // sending data to the View home
        return view('factures/pages/home', ['factures' => $factures]);
    }



    public function search()
    {
        $keyword = $this->request->getVar('keyword'); // get the search keyword from the input field

        $db = db_connect(); // connect to the database

        // perform a join query between the `Client`, `Facture`, and `Paiment` tables
        $result = $db->table('client')
        ->join('facture', 'facture.id_client = client.id_client')
        ->join('paiment', 'paiment.id_facture = facture.id_facture')
        ->join('devis', 'client.id_client = devis.id_client')
        ->select('client.*, facture.*, paiment.*, devis.*')
        ->distinct() // Utilisez la méthode distinct() pour supprimer les doublons
        ->like('client.nom', $keyword)
        ->orWhere('facture.id_facture', $keyword)
        ->orWhere("devis.total_ht", $keyword)
        ->orWhere('devis.total_ttc', $keyword)
        ->get()
        ->getResultArray();
        if (!$result) {
            echo "<script>alert('Recherche Introuvable');location.href = '/facture';</script>";
        }
        // pass the result data to the view for display
        return view('factures/pages/search', ['result' => $result]);
    }


    public function searchByDate()
    {
        $date = $this->request->getVar('dateSearch'); // get the input date from the form

        // extract the year and month from the input date
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));

        $db = db_connect();
        // perform a join query between the `Client`, `Facture`, and `Paiment` tables
        $result = $db->table('client')
            ->join('facture', 'facture.id_client = client.id_client')
            ->join('paiment', 'paiment.id_facture = facture.id_facture')
            ->join('devis', 'client.id_client = devis.id_client')
            ->select('client.*, facture.*, paiment.*,devis.*')
            ->where("DATE_FORMAT(devis.date_saisie, '%Y-%m') =", "$year-$month")
            ->get()
            ->getResultArray();
        if (!$result) {
            echo "<script>alert('Recherche Introuvable');location.href = '/facture';</script>";
        }
        // pass the result data to the view for display
        return view('factures/pages/search', ['result' => $result]);
    }
    public function editFacture($id_client, $id_devis)
    {
        // creating new objects from the models
        $modelClient = new Client();
        $facture_model = new Facture();
        $paimet_model = new Paiment();
        $relancement_model = new Relancement();
        $modelDevis = new DevisModel;
        $modelservice = new ServiceModel;
        $ligneCommande = new LigneCommandeModel;


        $client = $modelClient->find($id_client);
        $facture = $facture_model->where('id_client', $id_client)->first();
        $paiment = $paimet_model->join('facture', 'facture.id_facture = paiment.id_facture')->where('facture.id_client', $id_client)->first();
        $devis = $modelDevis->find($id_devis);
        $service = $modelservice->join('lignecommande', 'lignecommande.id_service = service.id_service')->where('lignecommande.id_devis', $id_devis)->first();
        $commande = $ligneCommande->where('id_devis', $id_devis)->first();
        $data = [
            'client' => $client,
            'facture' => $facture,
            'paiment' => $paiment,
            'devis' => $devis,
            'service' => $service,
            'commande' => $commande
        ];
        return view('factures/pages/editFacture', $data);
    }
    public function updateFacture($id_facture)
    {
        // creating new objects from the models
        $facture_model = new Facture();
        $paimet_model = new Paiment();
        $facture_model->set('date_emission', $this->request->getVar('emission'))
            ->set('date_echeance', $this->request->getVar('echeance'))
            ->where('id_facture', $id_facture)
            ->update();
        $paimet_model->set('montant_paye', $this->request->getVar('montant'))
            ->set('montant_rest', $this->request->getVar('montantRest'))
            ->set('date_dernier_paiment', $this->request->getVar('datePaiment'))
            ->set('status', $this->request->getPost('status'))
            ->set('status_litige', $this->request->getVar('litige'))
            ->set('status_paiment', $this->request->getVar('status_paiment'))
            ->where('id_facture', $id_facture)
            ->update();
        // Store the message in the session
        $session = session();
        $session->setFlashdata('success', 'Données Modifiées avec succès.');
        return redirect()->to('/facture');
    }
    public function generatedId($date_saisie)
    {
        $model = new Facture();
        $id_facture = $model->generate_id_facture($date_saisie);
        return $this->response->setJSON(['id_facture' => $id_facture])->setContentType('application/json');
    }


 

    public function listFct($id_facture)
{
    $devismodel = new DevisModel();
    $modelservice = new ServiceModel();
    $modelClient = new Client();
    $lignecommande = new LigneCommandeModel();

    // Récupérer l'id_client à partir de la table facture
    $facturemodel = new Facture();
    $factureData = $facturemodel->find($id_facture);
    $id_client = $factureData['id_client'];

    // Modifier la requête pour sélectionner en utilisant id_client
    $lignecomm = $lignecommande->join("service", 'service.id_service = lignecommande.id_service')
                               ->select("service.*,lignecommande.*")
                               ->where('id_devis', function ($builder) use ($id_client) {
                                   $builder->select('id_devis')
                                           ->from('devis')
                                           ->where('id_client', $id_client);
                               })
                               ->get()
                               ->getResultArray();

    $devis = $devismodel->find($id_facture);
    $service = $modelservice->join('lignecommande', 'lignecommande.id_service = service.id_service')
                            ->join('devis', 'devis.id_devis = lignecommande.id_devis')
                            ->where('devis.id_devis', $id_facture)
                            ->first();
    $client = $modelClient->find($devis['id_client']);

    $data = [
        'devis' => $devis,
        'service' => $service,
        'client' => $client,
        'lignecommande' => $lignecomm
    ];
    return view('factures/pages/affichageFct', $data);
}

}
