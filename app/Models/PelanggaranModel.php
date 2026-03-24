<?php

namespace App\Models;

use CodeIgniter\Model;

class PelanggaranModel extends Model
{
    protected $table      = 'pelanggaran';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'siswa_id',
        'konselor_id',
        'jenis_pelanggaran',
        'kategori',        // ringan | sedang | berat
        'deskripsi',
        'lokasi',
        'tanggal_kejadian',
        'poin',
        'status',          // baru | proses | diproses
        'notif_ortu',      // 0 | 1
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'siswa_id'          => 'required|integer',
        'jenis_pelanggaran' => 'required|min_length[3]',
        'tanggal_kejadian'  => 'required|valid_date',
        'poin'              => 'required|integer|greater_than[0]',
        'status'            => 'required|in_list[baru,proses,diproses]',
    ];

    /**
     * Ambil data lengkap dengan join siswa & konselor
     */
    public function getWithRelasi(array $where = [], int $limit = 0): array
    {
        $builder = $this->db->table('pelanggaran p')
            ->select('p.*, s.nama as nama_siswa, s.kelas, s.nisn, u.nama as nama_konselor')
            ->join('siswa s', 's.id = p.siswa_id', 'left')
            ->join('users u', 'u.id = p.konselor_id', 'left')
            ->orderBy('p.created_at', 'DESC');

        foreach ($where as $k => $v) {
            $builder->where($k, $v);
        }

        if ($limit > 0) {
            $builder->limit($limit);
        }

        return $builder->get()->getResultArray();
    }

    /**
     * Hitung per status
     */
    public function countByStatus(string $status): int
    {
        return $this->where('status', $status)->countAllResults();
    }

    /**
     * Ranking jenis pelanggaran terbanyak
     */
    public function getRanking(int $limit = 6): array
    {
        return $this->db->table('pelanggaran')
            ->select('jenis_pelanggaran, COUNT(*) as total, kategori')
            ->groupBy('jenis_pelanggaran')
            ->orderBy('total', 'DESC')
            ->limit($limit)
            ->get()->getResultArray();
    }
}