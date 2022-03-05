<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nisn', 'tanggal', 'tahun_spp', 'biaya', 'status', 'id_spp'];

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

    public function getPembayaran($nisn = null, $status = null)
    {
        $builder = $this->db->table('pembayaran');
        $builder->select('users.nama, pembayaran.*, spp.tahun, spp.nominal');
        $builder->join('users', 'users.nisn = pembayaran.nisn');
        $builder->join('spp', 'spp.id = pembayaran.id_spp');
        
        if ($status != null) {
            $builder->where('pembayaran.status', $status);
        }

        if ($nisn != null) {
            $builder->where('pembayaran.nisn', $nisn);
        }

        $builder->orderBy('spp.tahun', 'ASC');

        return $builder->get();
    }

    public function setTagihan($nisn = null)
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.*, spp.*, kelas.*, users.nama');
        $builder->join('users', 'siswa.nisn = users.nisn');
        $builder->join('kelas', 'kelas.id = siswa.id_kelas');
        $builder->join('spp', 'spp.id = siswa.id_spp');
        
        if ($nisn == null) {
            $builder->where('tagihan', '0');
        }

        if ($nisn != null) {
            $builder->where('siswa.nisn', $nisn);
        }

        return $builder->get();
    }

    public function getTagihan($nisn = null)
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.*, spp.*');
        $builder->join('spp', 'spp.id = siswa.id_spp');
        $builder->where('siswa.nisn', $nisn);

        return $builder->get();
    }

    public function editTagihan($id)
    {
        $builder = $this->db->table('pembayaran');
        $builder->select('users.nama, spp.tahun, pembayaran.*');
        $builder->join('users', 'users.nisn = pembayaran.nisn');
        $builder->join('spp', 'spp.id = pembayaran.id_spp');
        $builder->where('pembayaran.id', $id);

        return $builder->get();
    }
}
