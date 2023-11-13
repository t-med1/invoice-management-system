<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServiceModel;


class ServiceController extends BaseController
{
  
    public function index()
    {
        return view('devis/ajouterservice');
    }

    public function store()
    {
        $modelService =new ServiceModel ;
        $data =[
            'id_service'=> $this->request->getVar('id_service'),
            'titre'=> $this->request->getVar('titre'),
            'descriptif_devis'=> $this->request->getVar('descriptif_devis'),
            'prix_unitaire'=> $this->request->getVar('prix_unitaire'),
       ];
         $modelService->insert($data);
        $session = session();
        $session->setFlashdata('success', 'Données Ajoutée avec succès.');
        return view('devis/listeservice',['liste' =>$modelService ->findAll()]);
    }

    public function liste(){
        $modelService =new ServiceModel ;
        return view('devis/listeservice', ['liste' =>$modelService ->findAll()]);
    }

    public function edit($id)
    {
        $modelService = new ServiceModel;
        $data['service'] = $modelService->find($id);
        return view('devis/modifierservice', $data);
    }

    //UPDATE

    public function update($id )
    {
        $modelService = new ServiceModel;
        $data =[
            'id_client'=> $this->request->getVar('id_client'),
            'titre'=> $this->request->getVar('titre'),
            'descriptif_devis'=> $this->request->getVar('descriptif_devis'),
            'prix_unitaire'=> $this->request->getVar('prix_unitaire'),
       ];
       $modelService->update($id , $data);
       $session = session();
       $session->setFlashdata('success', 'Données Modifiées avec succès.');
       return redirect()->to('/listeService');
    }
}
