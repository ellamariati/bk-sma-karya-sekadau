<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalKonselingModel extends Model
{
    protected $table            = 'jadwal_konseling';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'siswa_id', 'konselor_id', 'tanggal', 'jam_mulai',
        'jam_selesai', 'keperluan', 'status', 'catatan'
    ];

    // Ambil jadwal dengan join ke tabel siswa
    public function getFiltered($filters = [])
    {
        $builder = $this->db->table('jadwal_konseling jk');
        $builder->select('jk.*, s.nama, s.kelas, s.nisn, s.no_hp_ortu');
        $builder->join('siswa s', 's.id = jk.siswa_id', 'left');

        if (!empty($filters['status'])) {
            $builder->where('jk.status', $filters['status']);
        }

        if (!empty($filters['search'])) {
            $keyword = $filters['search'];
            $builder->groupStart()
                    ->like('s.nama', $keyword)
                    ->orLike('jk.keperluan', $keyword)
                    ->orLike('s.kelas', $keyword)
                    ->groupEnd();
        }

        $sort = $filters['sort'] ?? 'newest';
        if ($sort === 'oldest') {
            $builder->orderBy('jk.tanggal', 'ASC');
        } elseif ($sort === 'name') {
            $builder->orderBy('s.nama', 'ASC');
        } else {
            $builder->orderBy('jk.tanggal', 'DESC');
        }

        return $builder->get()->getResultArray();
    }

    // Summary stats
    public function getSummary()
    {
        return [
            'total'     => $this->countAll(),
            'terjadwal' => $this->where('status', 'menunggu')->countAllResults(),
            'selesai'   => $this->where('status', 'selesai')->countAllResults(),
            'batal'     => $this->where('status', 'batal')->countAllResults(),
        ];
    }

    // Ambil satu jadwal dengan detail siswa
    public function getDetail($id)
    {
        $builder = $this->db->table('jadwal_konseling jk');
        $builder->select('jk.*, s.nama, s.kelas, s.nisn, s.no_hp_ortu, s.jurusan');
        $builder->join('siswa s', 's.id = jk.siswa_id', 'left');
        $builder->where('jk.id', $id);
        return $builder->get()->getRowArray();
    }
}