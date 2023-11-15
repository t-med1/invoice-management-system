<?php

namespace Config;
use App\Controllers\AuthController;
use App\Controllers\ClientController;
use App\Controllers\CreatingController;
use App\Controllers\FactureController;
use App\Controllers\LogginController;
use App\Controllers\PaimentController;
use App\Controllers\RelancementController;
use App\Controllers\StatusPaimentController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
// route pour la page Login
$routes->get('/',[AuthController::class,'index']);

// route pour : Si l'admin = true rediriger vers la page home
$routes->post('/login' , [AuthController::class,'login']);

// route pour la page register
$routes->get('/register',[AuthController::class,'register']);

// route pour ajouter un admin
$routes->post('/registered',[AuthController::class,'enregistrer']);

// route pour rediriger vers le FactureController pour afficher les factures
$routes->get('/facture', [FactureController::class, 'index'], ['as' => 'facture']);

// route pour la Recherche avec : Nom - Total ht - Total TTc
$routes->match(['get', 'post'], '/search', [FactureController::class,'search']);

// route pour la Recherche avec : date
$routes->match(['get', 'post'], '/Bydate', [FactureController::class,'searchByDate']);

// route redirge vers le CreatingController qui permet de creer une nouvelle Facture
$routes->get('createFacture',[CreatingController::class,'create']);

// route redirge vers le CreatingController qui permet generer l"id_facture"
$routes->get('/Controllers/CreatingController/generatedId/(:segment)','CreatingController::generatedId/$1');


// route redirge vers le CreatingController qui permet generer l"id_facture"
$routes->get('/Controllers/FactureController/generatedId/(:segment)','CreatingController::generatedId/$1');

// route redirge vers le CreatingController qui permet d'afficher les infos sur les autres inputs
$routes->get('/Controllers/CreatingController/generatedDevis/(:segment)','CreatingController::generatedDevis/$1');

// route pour sauvgarder les données dans la BD
$routes->post('facture/store', 'CreatingController::createData');

// route qui redirige vers la page editFacture pour modifier la facture selectionner
$routes->get('factureModify/(:num)/(:segment)','FactureController::editFacture/$1/$2');

// route pour sauvgarder les modifications pour la facture selectionner
$routes->post('UpdateFcature/(:segment)','FactureController::updateFacture/$1');

// route pour afficher la table du relencement
$routes->get('/tablesRelance' , 'RelanceController::Relance');

// route : lorsqu'on ckeck une input checkbox redirige vers ce controller pour modifier la valeur du status de relancement
$routes->post('/client/updateRelancement/(:segment)', 'RelanceController::updateRelancement/$1');

// route pour supprimer une Facture
$routes->get('deleteFacture/(:segment)', 'CreatingController::delete_row/$1');


//route pour voir les pages des devis
$routes->get('devis','DevisController::liste');

// route pour creer un nouveau devis
$routes->get('createDevis','DevisController::ajouterdevis');

//routes pour traitement des service sur la page de la creation
$routes->get('/Controllers/DevisController/getServiceInfo/(:num)', 'DevisController::getServiceInfo/$1');

// route redirge vers le CreatingController qui permet generer l"id_facture"
$routes->get('/Controllers/DevisController/generatedIdDevis/(:segment)','DevisController::generatedIdDevis/$1');

// route pour enregister les donnees
$routes->post('/storeDevis','DevisController::storeDevis');

// route pour rechercher par Nom client , Numero devis...
$routes->match(['get', 'post'], 'searchDevis', 'DevisController::searchs1');

// route pour rechercher par Nom client , Numero devis...
$routes->match(['get', 'post'], 'searchDevisByDate', 'DevisController::searchByDates1');

// route pour supprimer un devis
$routes->get('/devisdelete/(:segment)','DevisController::delete/$1');

// route pour voir la ligne à modifier
$routes->get('/modifierdevis/(:segment)','DevisController::edit/$1');

// route pour sauvgarder la modification de cette ligne
$routes->post('/devisUpdate/(:num)/(:segment)','DevisController::update/$1/$2');

// route pour creer un nouveau client
$routes->get('/createClient','AddClientController::index');

// route pour sauvragder un nouveau client
$routes->post('/clientstore','AddClientController::store');

// route pour afficher la liste des client
$routes->get('/listeClient','AddClientController::liste');

// route pour modifier un client
$routes->get('/modifierclient/(:num)','AddClientController::edit/$1');

// route pour sauvgarder les nouveau modification sur un client
$routes->post('update/(:num)','AddClientController::update/$1');

//supprimer client
$routes->get('clientdelete/(:num)','AddClientController::delete/$1');
$routes->match(['get', 'post'], 'searchclient', 'AddClientController::searchClient');

// route pour creer un nouveau service
$routes->get('/createService','ServiceController::index');

// route pour sauvgarder nouveau service
$routes->post('/Servicestore','ServiceController::store');

// route pour afficher la liste des service
$routes->get('/listeService','ServiceController::liste');

// modifier un service
$routes->get('modifierservice/(:num)','ServiceController::edit/$1');

// route pour sauvgarder les modification d'un service
$routes->post('service/update/(:num)','ServiceController::update/$1');

// $routes->get('devis/listerdevis','DevisController::showdevis');
// $routes->get('listerdevis','DevisController::liste');
$routes->get('dash','DevisController::dash');
// afficher devis
$routes->get('devis/affichage/(:segment)','DevisController::list/$1');
//afficher facture
$routes->get('factures/affichageFct/(:segment)','FactureController::listFct/$1');

//autres affichage avec pour le print
$routes->get('devis/affichage2','DevisController::affichage2');
$routes->get('devis/affichage2/(:segment)','DevisController::list2/$1');



