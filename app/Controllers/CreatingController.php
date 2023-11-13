<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DevisModel;
use App\Models\StatusPaiment;
use App\Models\Paiment;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Relancement;


class CreatingController extends BaseController
{
    public function createData()
    {
        $factureModel = new Facture();
        $paimentModel = new Paiment();
        $db = db_connect();
    
        // Démarre une transaction
        $db->transStart();
    
        try {
            // Insère des données dans la table Facture
            $factureData = [
                'id_facture' => $this->request->getPost('id_facture'),
                'id_client' => $this->request->getPost('id_client'),
                'date_saisie' => $this->request->getPost('date_saisie'),
                'date_emission' => $this->request->getPost('date_emission'),
                'jours_apres_paiment' => 0,
                'date_echeance' => $this->request->getPost('date_echeance')
            ];
            $factureModel->insert($factureData);
    
            // Insère des données dans la table Paiment
            $paimentData = [
                'id_facture' => $this->request->getPost('id_facture'),
                'montant_paye' => $this->request->getPost('montant'),
                'montant_rest' => $this->request->getPost('montant_rest'),
                'jours_apres_paiment' => 0,
                'date_dernier_paiment' => $this->request->getPost('datePaiment'),
                'status' => $this->request->getPost('status'),
                'status_litige' => $this->request->getPost('status_litige'),
                'status_paiment' => $this->request->getPost('status_paiment')
            ];
            $paimentModel->insert($paimentData);
    
            // Valide la transaction
            $db->transCommit();
    
            // Stocke un message de succès dans la session
            $session = session();
            $session->setFlashdata('success', 'Données ajoutées avec succès.');
    
            // Redirige vers la page de liste des factures
            return redirect()->to('/facture');
        } catch (\Exception $e) {
            // En cas d'erreur, annule la transaction
            $db->transRollback();
    
            // Affiche l'erreur
            die($e->getMessage());
        }
    }

    public function delete_row($id_facture) {
        // Créer des objets de modèle
        $factureModel = new Facture();
        $paiementModel = new Paiment();
    
        // Supprimer les paiements associés à la facture
        $paiements = $paiementModel->where('id_facture', $id_facture)->findAll();
        foreach ($paiements as $paiement) {
            $paiementModel->delete($paiement['id_paiment']);
        }
    
        // Supprimer la facture
        $factureModel->delete($id_facture);
    
        // Stocker le message dans la session
        $session = session();
        $session->setFlashdata('success', 'Facture supprimée avec succès.');
    
        // Rediriger vers la même URL ou une autre page de votre choix
        return redirect()->to('/facture');
    }
    



    public function create()
    {
        $session = session();

        // Vérifier si l'utilisateur est connecté en tant qu'admin
        if (!$session->get('nom_complet')) {
            return redirect()->to('/');
        } else {
            $db = db_connect();
            $query = $db->query('SELECT client.*,devis.* FROM client inner join devis on client.id_client = devis.id_client where devis.total_ttc!=0');
            $dataDevis = $query->getResultArray();
            return view('factures/pages/forms/create', ['dataDevis'=>$dataDevis]);// Pass the generated ID to the view with ID's Devis
        }
    }
    public function generatedId($date_saisie) {
        $model = new Facture();
        $id_facture = $model->generate_id_facture($date_saisie);
        return $this->response->setJSON(['id_facture' => $id_facture])->setContentType('application/json');
    }
    public function generatedDevis($devis_id)
    {
        // Récupération des informations du devis dans la base de données
        $clientModel = new Client();
        $devis_info = $clientModel
        ->join('devis','devis.id_client = client.id_client')
        ->select('client.*,devis.*')
        ->where('devis.id_devis',$devis_id)
        ->get()->getResultArray();
        // Envoi des informations du devis au formulaire sous forme de JSON
        $response = [];
        foreach ($devis_info as $row) {
            $response[] = [
                "id_client" => $row['id_client'],
                "nom" => $row['nom'],
                "ICE" => $row['ICE'],
                'adresse' => $row['adresse'],
                "email_client" => $row['email_client'],
                "numero_telephone" => $row['numero_telephone'],
                "ville" => $row['ville'],
                "pays" => $row['pays'],
                "total_ht" => $row['total_ht'],
                "total_ttc" => $row['total_ttc'],
                
            ];
        }
    
        return $this->response->setJSON($response)->setContentType('application/json');
    }
    
}