<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;

class AuthController extends BaseController
{
    public function _construct()
    {
        helper(['url', 'form']);
        // had les deux lignes jdad
        $session = session();
        $this->$session = \Config\Services::session();
        // $this->session = \Config\Services::session();
    }


    public function index()
    {
        return view('login');
    }
    public function login()
    {
        // Récupérer les données postées depuis le formulaire
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Charger le modèle de l'utilisateur
        $userModel = new Admin();
    
        // Vérifier si l'utilisateur existe dans la base de données
        $user = $userModel->where('email', $email)->where('password',$password)->get();
    
        if (!$user->getRow()) {
            // L'utilisateur n'existe pas
            $data['validation'] = "L'adresse e-mail ou le mot de passe est incorrect.";
            return view('login', $data);
        }
    
    
        // Authentifier l'utilisateur en ouvrant une session
        $session = session();
        $session->set('code_admin', $user->getRow()->code_admin);
    
        // Rediriger l'utilisateur vers la page d'accueil
        return view('dash');
    }

    public function register()
    {
        return view('register');
    }
 

    public function enregistrer(){
        $user = new Admin();
        $nomComplet = $this->request->getPost('nomComplet');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password'); 
        $Confirmpassword = $this->request->getPost('Cpass'); 
        if ($password == $Confirmpassword){
            $values = [
                'nom_complet' => $nomComplet,
                'email' => $email,
                'password'=> $password
            ];
            $query = $user->insert($values);
            return view('login');

        }else{
            $data['validation'] = "Le mot de passe et la confirmation du mot de passe ne correspondent pas.";
            
            //pour garder les champs de formulaire rempli aprés l'erreur
            $session = session();
            $session->setFlashdata('formData', $this->request->getPost());

            return view('register', $data);
        }
    }
}
