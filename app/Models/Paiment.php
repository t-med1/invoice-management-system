<?php

namespace App\Models;

use CodeIgniter\Model;

class Paiment extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'paiment';
    protected $primaryKey       = 'id_paiment';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_facture','montant_paye','montant_rest','date_dernier_paiment','status','status_litige','status_paiment'];
    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

}
