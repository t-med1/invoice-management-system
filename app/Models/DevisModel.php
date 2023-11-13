<?php

namespace App\Models;

use CodeIgniter\Model;

class DevisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'devis';
    protected $primaryKey       = 'id_devis';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_devis','id_client','date_saisie','total_ht','total_ttc','modalite_paiement','etat'];



    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function generate_id_devis($dateSaisie)
    {
      // Get the month from the date_saisie
      $month = date('m', strtotime($dateSaisie));
    
      // Generate the prefix for the id_facture
      $prefix = $month .'-';
    
      // Get the maximum id_facture for the selected month
      $max_id_devis = $this->db->table('devis')
                                ->selectMax('id_devis')
                                ->where('SUBSTRING(id_devis, 1, 2)', $month)
                                ->get()
                                ->getRowArray()['id_devis'];
    
      // Increment the id_facture number
      if ($max_id_devis) {
        $id_devis_num = intval(substr($max_id_devis, -3)) + 1;
      } else {
        $id_devis_num = 1;
      }
            
      $id_devis_num_str = sprintf('%03d', $id_devis_num);
    
      // Combine the prefix and id_facture number to create the final id_facture
      $id_devis = $prefix . $id_devis_num_str;
    
      return $id_devis;
    }
}
