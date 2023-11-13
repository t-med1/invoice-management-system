<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class Facture extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'facture';
    protected $primaryKey       = 'id_facture';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_facture','id_client','ICE','date_saisie','date_emission','date_echeance','relance_faite'];


    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    
    protected $dates = ['date_emission', 'jours_apres_paiment'];

    public function generate_id_facture($dateSaisie)
    {
      // Get the month from the date_saisie
      $month = date('m', strtotime($dateSaisie));
    
      // Generate the prefix for the id_facture
      $prefix = $month .'-';
    
      // Get the maximum id_facture for the selected month
      $max_id_facture = $this->db->table('Facture')
                                ->selectMax('id_facture')
                                ->where('SUBSTRING(id_facture, 1, 2)', $month)
                                ->get()
                                ->getRowArray()['id_facture'];
    
      // Increment the id_facture number
      if ($max_id_facture) {
        $id_facture_num = intval(substr($max_id_facture, -3)) + 1;
      } else {
        $id_facture_num = 1;
      }
            
      $id_facture_num_str = sprintf('%03d', $id_facture_num);
    
      // Combine the prefix and id_facture number to create the final id_facture
      $id_facture = $prefix . $id_facture_num_str;
    
      return $id_facture;
    }
    protected function beforeInsert(array $data) {
      // Get the month from the date_saisie input
      $month = date('m', strtotime($data['date_saisie']));
  
      // Get the max id_facture for this month from the database
      $max_id = $this->db->table('facture')
                          ->selectMax('id_facture')
                          ->like('id_facture', $month.'%', 'after')
                          ->get()
                          ->getRowArray();
  
      // Set the id_facture attribute for this record
      $data['id_facture'] = $month . '-' . str_pad((intval(substr($max_id['id_facture'], 3)) + 1), 3, '0', STR_PAD_LEFT);
  
      return $data;
  }
      // pour modifier le champs du relancement
      public function updateRelancement($id_facture, $relance_faite)
      {
          $this->where('id_facture', $id_facture)->set(['relance_faite' => $relance_faite])->update();
      }
}
