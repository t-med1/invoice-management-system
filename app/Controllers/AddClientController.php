<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Client;
use App\Models\Paiment;
use App\Models\LigneCommandeModel;
use App\Models\Facture;
use App\Models\DevisModel;
use App\Models\Relancement;

class AddClientController extends BaseController
{
    public function index()
    {
        return view('devis/ajouterclient');
    }

    public function store()
    {
        $modelClient = new Client;

        $data =[
            
            'ICE'=> $this->request->getVar('ICE'),
            'nom'=> $this->request->getVar('nom'),
            'email_client'=> $this->request->getVar('email_client'),
            'numero_telephone'=> $this->request->getVar('numero_telephone'),
            'ville'=> $this->request->getVar('ville'),
            'pays'=> $this->request->getVar('pays'),
            'adresse'=> $this->request->getVar('adresse'),
       ];
        $modelClient->insert($data);
        return redirect()->to('/listeClient');
    }

    public function liste(){
        $modelClient = new Client;
        return view('devis/listeclient', ['liste_devis' =>$modelClient ->findAll()]);
    }

    public function edit($id)
    {
        $modelClient = new Client;
        $data['client'] = $modelClient->find($id);
        return view('devis/modifierclient', $data);
    }

    //UPDATE

    public function update($id )
    {
        $modelClient = new Client;
        $data =[
            'id_client'=> $this->request->getVar('id_client'),
            'nom'=> $this->request->getPost('nom'),
            'prenom'=> $this->request->getPost('prenom'),
            'email_client'=> $this->request->getVar('email_client'),
            'numero_telephone'=> $this->request->getVar('numero_telephone'),
            'ville'=> $this->request->getVar('ville'),
            'pays'=> $this->request->getVar('pays'),
       ];
       $modelClient->update($id , $data);
       return redirect()->to('listeClient');
    }
    public function delete($id_client)
    {
        $clientModel = new Client();
        $devisModel = new DevisModel();
        $factureModel = new Facture();
        $paimentModel = new Paiment();
        $ligneCommandeModel = new LigneCommandeModel();
        $relancementModel = new Relancement();
    
        // Supprimer toutes les références dans la table relancement
        $relancements = $relancementModel->where('id_client', $id_client)->get()->getResultArray();
        foreach ($relancements as $relancement) {
            $relancementModel->where('id_relance', $relancement['id_relance'])->delete();
        }
    
        // Récupérer tous les devis associés au client
        $devis = $devisModel->where('id_client', $id_client)->get()->getResultArray();
    
        // Parcourir tous les devis et supprimer les paiements, les factures et les lignes de commande associés
        foreach ($devis as $devi) {
            $facture = $factureModel->where('id_client', $devi['id_client'])->first();
            if ($facture) {
                // Supprimer les paiements associés à la facture
                $paimentModel->where('id_facture', $facture['id_facture'])->delete();
                // Supprimer la facture
                $factureModel->where('id_facture', $facture['id_facture'])->delete();
            }
            // Supprimer les lignes de commande associées au devis
            $ligneCommandeModel->where('id_devis', $devi['id_devis'])->delete();
        }
    
        // Supprimer les devis associés au client
        $devisModel->where('id_client', $id_client)->delete();
        // Supprimer le client
        $clientModel->where('id_client', $id_client)->delete();
    
        return redirect()->to('listeClient');
    }
    public function searchClient(){
        $keyword = $this->request->getVar('searchclient'); 

        $modelClient = new Client;
        $clients = $modelClient
            ->select('client.*')
            ->where('client.nom', $keyword)
            ->orWhere('client.ville', $keyword)
            
            ->get()
            ->getResultArray();

            if (!$clients ) {
                echo "<script>alert('Recherche Introuvable');location.href = '/listeClient';</script>";
            }
            return view('devis/searchclient', ['clients' => $clients]);

    }

}
