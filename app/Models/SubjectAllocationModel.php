<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectAllocationModel extends Model
{
    protected $table = 'subject_allocations';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getSection($class_id)
    {
        return $this->db->table('section_allocation')
            ->select('section_allocation.*, section.section_name') 
            ->join('section', 'section_allocation.section_id = section.id')
            ->where(['section_allocation.class_id' => $class_id])
            ->get()
            ->getResult();

    }
}
