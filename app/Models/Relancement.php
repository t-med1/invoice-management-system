<?php

namespace App\Models;

use CodeIgniter\Model;

class Relancement extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'relancement';
    protected $primaryKey       = 'id_relance';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_client','relance_faite'];//En cours de traitement

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';

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

    // pour modifier le champs du relancement
    public function updateRelancement($id_client, $relance_faite)
    {
        $this->where('id_client', $id_client)->set(['relance_faite' => $relance_faite])->update();
    }
}
