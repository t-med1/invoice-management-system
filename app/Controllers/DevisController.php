<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DevisModel;
use App\Models\PaimentDevisModel;
use App\Models\ServiceModel;
use App\Models\LigneCommandeModel;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Relancement;
use App\Models\StatusPaiment;
use App\Models\Paiment;
use Dompdf\Dompdf;


class DevisController extends BaseController
{
    public function ajouterdevis()
    {
        $clientmodel = new Client;
        $servicemodel = new ServiceModel;
        $clients = $clientmodel->table('client')->get()->getResult();
        $services = $servicemodel->table('service')->get()->getResult();
        return view('devis/ajouterdevis', ["clients" => $clients, "services" => $services]);
    }
    
    public function storeDevis()
    {
        $devis = new DevisModel;
        $commande = new LigneCommandeModel;
        $paiment = new Paiment;
        $data = [
            'id_devis' => $this->request->getVar('id_devis'),
            'id_client' => $this->request->getVar('id_client'),
            'date_saisie' => $this->request->getVar('date_saisie'),
            'total_ht' => $this->request->getVar('total_ht'),
            'total_ttc' => $this->request->getVar('total_ttc'),
            'modalite_paiement' => $this->request->getVar('modalite_paiement'),
            'etat' => $this->request->getVar('etat'),
        ];
        $devis->insert($data);
        $dataPaiment = [
            'id_devis' => $this->request->getVar('id_devis'),
            'montant_paye' => $this->request->getVar('montant'),
            'montant_rest' => $this->request->getVar('montantRest'),
            'date_dernier_paiment' => $this->request->getVar('datePaiment'),
            'status' => $this->request->getVar('status'),
            'status_litige' => $this->request->getVar('litige'),
            'status_paiment' => $this->request->getVar('status_paiment'),
        ];

        $quantite = $this->request->getVar('qte_commande');
        $services = $this->request->getVar('service');
        $desc = $this->request->getVar('descriptif_devis');
        $prix = $this->request->getVar('prix_unitaire');
        for ($i = 0; $i < count($quantite); $i++) {
            $ligne = [
                'id_service' => $services[$i],
                'id_devis' => $this->request->getVar('id_devis'),
                'qte_commande' => $quantite[$i],
                'description_service' => $desc[$i],
                'prix_unitaire' => $prix[$i],
            ];
            $commande->insert($ligne);
        }
        return redirect()->to('/devis');
    }


    public function showdevis()
    {
        return view('devis/listerdevis');
    }

    public function dash(){
        return view('dash');
    }


    public function liste()
    {
        
        $modelService = new ServiceModel;
        $modelClient = new Client;
        // recupration de tous les donnees
        $columns = array('client.*', 'devis.*');
        $devis = $modelClient
        ->join('devis', 'devis.id_client = client.id_client')
        ->select($columns)
        ->orderBy('devis.id_devis', 'DESC')
        ->get()->getResultArray();
        $liste_devis = [];
        foreach ($devis as $dv) {
            $id=$dv['id_devis'];
            $columns = array('service.titre', 'lignecommande.description_service', 'lignecommande.prix_unitaire', 'lignecommande.qte_commande');
            $infos = $modelService->join('lignecommande', 'service.id_service = lignecommande.id_service')->
            select($columns)->
            where('lignecommande.id_devis',$id)->get()->getResultArray();
            $liste_devis[] = [ 
                'id_devis' => $dv['id_devis'],
                'id_client' => $dv['id_client'],
                'date_saisie' => $dv['date_saisie'],
                'nom' => $dv['nom'],
                'email_client' => $dv['email_client'],
                'numero_telephone' => $dv['numero_telephone'],
                'ville' => $dv['ville'],
                'pays' => $dv['pays'],
                'total_ht' => $dv['total_ht'],
                'total_ttc' => $dv['total_ttc'],
                'modalite_paiement' => $dv['modalite_paiement'],
                'infos'=>$infos,
            ];
        }

        // sending data to the View home
        return view('devis/listerdevis', ['liste_devis' => $liste_devis]);
    }


    public function searchs1()
    {
        $keyword = $this->request->getVar('searchNormal'); 


        $modelClient = new Client;
        $modelService =  new ServiceModel;
        $devis = $modelClient
            ->join('devis', 'devis.id_client = client.id_client')
            ->join('lignecommande', 'lignecommande.id_devis = devis.id_devis')
            ->join('service', 'service.id_service = lignecommande.id_service')
            ->select('client.*,devis.*,service.*,lignecommande.*')
            ->where('client.nom', $keyword)
            ->orWhere('devis.id_devis', $keyword)
            ->orWhere('devis.total_ht', $keyword)
            ->get()
            ->getResultArray();
            $liste_devis = [];
            foreach ($devis as $dv) {
                $id=$dv['id_devis'];
                $columns = array('service.titre', 'lignecommande.description_service', 'lignecommande.prix_unitaire', 'lignecommande.qte_commande');
                $infos = $modelService->join('lignecommande', 'service.id_service = lignecommande.id_service')->
                select($columns)->
                where('lignecommande.id_devis',$id)->get()->getResultArray();
                $liste_devis[] = [
                    'id_devis' => $dv['id_devis'],
                    'id_client' => $dv['id_client'],
                    'date_saisie' => $dv['date_saisie'],
                    'nom' => $dv['nom'],
                    'email_client' => $dv['email_client'],
                    'numero_telephone' => $dv['numero_telephone'],
                    'ville' => $dv['ville'],
                    'pays' => $dv['pays'],
                    'total_ht' => $dv['total_ht'],
                    'total_ttc' => $dv['total_ttc'],
                    'modalite_paiement' => $dv['modalite_paiement'],
                    'infos'=>$infos,
                ];
            }
            $liste_devis = array_unique($liste_devis, SORT_REGULAR);
        if (!$devis) {
            echo "<script>alert('Recherche Introuvable');location.href = '/devis';</script>";
        }
        
        return view('devis/search', ['liste_devis' => $liste_devis]);
    }


    public function searchByDates1()
    {
        $date = $this->request->getVar('dateSearch');

        
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));

        $modelClient = new Client;
        $modelService =  new ServiceModel;

        $liste_d = $modelClient->join('devis', 'devis.id_client = client.id_client')
            ->join('lignecommande', 'lignecommande.id_devis = devis.id_devis')
            ->join('service', 'service.id_service = lignecommande.id_service')
            ->select('client.*,devis.*,service.*,lignecommande.*')
            ->where("DATE_FORMAT(date_saisie, '%m-%Y') =", "$month-$year")
            ->get()
            ->getResultArray();
            foreach ($liste_d as $dv) {
                $id=$dv['id_devis'];
                $columns = array('service.titre', 'lignecommande.description_service', 'lignecommande.prix_unitaire', 'lignecommande.qte_commande');
                $infos = $modelService->join('lignecommande', 'service.id_service = lignecommande.id_service')->
                select($columns)->
                where('lignecommande.id_devis',$id)->get()->getResultArray();
                $liste_devis[] = [
                    'id_devis' => $dv['id_devis'],
                    'id_client' => $dv['id_client'],
                    'date_saisie' => $dv['date_saisie'],
                    'nom' => $dv['nom'],
                    'email_client' => $dv['email_client'],
                    'numero_telephone' => $dv['numero_telephone'],
                    'ville' => $dv['ville'],
                    'pays' => $dv['pays'],
                    'total_ht' => $dv['total_ht'],
                    'total_ttc' => $dv['total_ttc'],
                    'modalite_paiement' => $dv['modalite_paiement'],
                    'infos'=>$infos,
                ];
            }
            $liste_devis = array_unique($liste_devis, SORT_REGULAR);
        if (!$liste_d) {
            echo "<script>alert('Recherche Introuvable');location.href = '/devis';</script>";
        }
        
        return view('devis/search', ['liste_devis' => $liste_devis]);
    }


    public function delete($id_devis)
    {
        $lignecommandeModel = new LigneCommandeModel();
        $devisModel = new DevisModel();
        $factureModel = new Facture();
        $relancementModel = new Relancement();
        $paimentModel = new Paiment();
        
        // Récupérer l'ID client associé au devis
        $devis = $devisModel->find($id_devis);
        if ($devis && array_key_exists('id_client', $devis)) {
            $id_client = $devis['id_client'];
        
            // Supprimer toutes les lignes de commande associées au devis
            $lignecommandeModel->where('id_devis', $id_devis)->delete();
            
            // Supprimer toutes les factures associées au devis
            $factures = $factureModel->where('id_client', $id_client)->findAll();
            foreach ($factures as $facture) {
                $paiments = $paimentModel->where('id_facture', $facture['id_facture'])->findAll();
                foreach ($paiments as $paiment) {
                    $paimentModel->delete($paiment['id_paiment']);
                }
                $factureModel->delete($facture['id_facture']);
            }

            // Supprimer les relancements associés au devis
            $relancements = $relancementModel->where('id_client', $id_client)->findAll();
            foreach ($relancements as $relancement) {
                  $relancementModel->delete($relancement['id_relance']);
        }

    
            // Supprimer le devis lui-même
            $devisModel->where('id_devis', $id_devis)->delete();
        }
        
        return redirect()->to('/devis');
    }


    public function edit($id)
    {
        $clienModel = new Client();
        $devismodel = new DevisModel();
        $ligneCommande = new LigneCommandeModel();
        $serviceModel = new ServiceModel();

        // Retrieve the data for the selected row from the database
        $client = $clienModel->join('devis', 'devis.id_client = client.id_client')->select('client.*')->where('devis.id_devis', $id)->groupBy('devis.id_devis')->get()->getResultArray();
        $service = $serviceModel->join('lignecommande', 'lignecommande.id_service = service.id_service')->select('service.id_service')->first();
        $devis = $devismodel->find($id);
        $lignes = $ligneCommande->join('service', 'service.id_service = lignecommande.id_service')->select('ligneCommande.prix_unitaire,ligneCommande.qte_commande,ligneCommande.description_service,service.titre')->where('id_devis', $id)->findAll();
        // Pass the data to the view for editingoin
        $data = [
            'devis' => $devis,
            'lignes' => $lignes,
            'client' => $client,
            'service' => $service,
        ];
        return view('devis/modifierdevis', $data);
    }

    public function update($id_devis)
    {
        $modelDevis = new DevisModel;
        $ligneCommandeModel = new LigneCommandeModel();
        $modelDevis->set('date_saisie', $this->request->getVar('dat_saisie'))
            ->set('total_ht', $this->request->getVar('total_ht'))
            ->set('total_ttc', $this->request->getVar('total_ttc'))
            ->where('id_devis', $id_devis)
            ->update();

        $services = $this->request->getVar('description_service');
        $quantite = $this->request->getVar('qte');
        $price = $this->request->getVar('prix_unitaire');

        if (!empty($services) && !empty($quantite) && !empty($price)) {
            foreach ($quantite as $i => $qte) {
                $serv = isset($services[$i]) ? $services[$i] : '';
                $pr = isset($price[$i]) ? $price[$i] : '';

                $ligneCommandeModel->set('description_service', $serv)
                    ->set('prix_unitaire', $pr)
                    ->set('qte_commande', $qte)
                    ->where('id_service', $i)
                    ->where('id_devis', $id_devis)
                    ->update();
            }
        }

        return redirect()->to('/devis');
    }

    public function getServiceInfo($id_service)
    {
        // Récupération de la description et du prix du service dans la base de données
        $service = new ServiceModel();
        $service_info = $service->find($id_service);

        // Envoi des informations du service au formulaire sous forme de JSON
        $response['description'] = $service_info['descriptif_devis'];
        $response['prix'] = $service_info['prix_unitaire'];
        return $this->response->setJSON($response)->setContentType('application/json');
    }

    public function generatedIdDevis($date_saisie)
    {
        $model = new DevisModel();
        $id_devis = $model->generate_id_devis($date_saisie);
        return $this->response->setJSON(['id_devis' => $id_devis])->setContentType('application/json');
    }

    public function list($id_devis)
    {
        
            $devismodel = new DevisModel();
            $modelservice= new ServiceModel();
            $modelClient = new Client();
            $lignecommande = new LigneCommandeModel();
            $lignecomm = $lignecommande->join("service",'service.id_service = lignecommande.id_service')->select("service.*,lignecommande.*")->where('id_devis',$id_devis)->get()->getResultArray();
           

            $devis = $devismodel->find($id_devis);
            $service = $modelservice->join('lignecommande','lignecommande.id_service = service.id_service')->join('devis','devis.id_devis = lignecommande.id_devis')->where('devis.id_devis', $id_devis)->first();
            $client = $modelClient->find($devis['id_client']);
        
            $data = [
                'devis' => $devis,
                'service' => $service,
                'client' => $client,
                'lignecommande' => $lignecomm
                
            ];
        return view('devis/affichage', $data);
    }



    // public function affichage2(){
    //     return view('devis/affichage2');
    // }


    public function list2($id_devis)
    {
        
            $devismodel = new DevisModel();
            $modelservice= new ServiceModel();
            $modelClient = new Client();
            $lignecommande = new LigneCommandeModel();
            $lignecomm = $lignecommande->join("service",'service.id_service = lignecommande.id_service')->select("service.*,lignecommande.*")->where('id_devis',$id_devis)->get()->getResultArray();
           

            $devis = $devismodel->find($id_devis);
            $service = $modelservice->join('lignecommande','lignecommande.id_service = service.id_service')->join('devis','devis.id_devis = lignecommande.id_devis')->where('devis.id_devis', $id_devis)->first();
            $client = $modelClient->find($devis['id_client']);
        
            $data = [
                'devis' => $devis,
                'service' => $service,
                'client' => $client,
                'lignecommande' => $lignecomm
                
            ];
        return view('devis/affichage2', $data);
    }

}