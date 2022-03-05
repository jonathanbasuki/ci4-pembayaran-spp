<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'nisn';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nisn', 'nis', 'alamat', 'telp', 'tagihan', 'id_kelas', 'id_spp'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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

    public function getSiswa($id = null)
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.*, spp.*, kelas.*, users.nama');
        $builder->join('users', 'siswa.nisn = users.nisn');
        $builder->join('kelas', 'kelas.id = siswa.id_kelas');
        $builder->join('spp', 'spp.id = siswa.id_spp');

        if ($id != null) {
            $builder->where('nisn', $id);
        }

        return $builder->get();
    }
}
