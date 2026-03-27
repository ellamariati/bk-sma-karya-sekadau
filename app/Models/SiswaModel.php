<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table         = 'siswa';
    protected $primaryKey    = 'id';
    protected $useAutoIncrement = true;
    protected $returnType    = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nisn', 'nama', 'kelas', 'jurusan',
        'jk', 'foto', 'no_hp_ortu', 'status',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // ──────────────────────────────────────────
    // Helper: jumlah siswa yang punya pelanggaran
    // ──────────────────────────────────────────
    public function getSiswaBermasalah(): int
    {
        return (int) $this->db->table('siswa s')
            ->select('COUNT(DISTINCT s.id) as total')
            ->join('pelanggaran p', 'p.siswa_id = s.id', 'inner')
            ->get()
            ->getRow()
            ->total;
    }

    // ──────────────────────────────────────────
    // Ambil semua siswa + total poin pelanggaran
    // Untuk keperluan view (tanpa paginate)
    // ──────────────────────────────────────────
    public function getAllWithPoin(): array
    {
        return $this->db->table('siswa s')
            ->select('s.*, COALESCE(SUM(p.poin), 0) as total_poin')
            ->join('pelanggaran p', 'p.siswa_id = s.id', 'left')
            ->groupBy('s.id')
            ->orderBy('s.nama', 'ASC')
            ->get()
            ->getResultArray();
    }

    // ──────────────────────────────────────────
    // Cek NISN unik saat update (exclude id sendiri)
    // ──────────────────────────────────────────
    public function isNisnUnique(string $nisn, int $excludeId = 0): bool
    {
        return $this->where('nisn', $nisn)
            ->where('id !=', $excludeId)
            ->countAllResults() === 0;
    }

    // ──────────────────────────────────────────
    // Helper: derive jurusan dari kelas (A/B=MIPA, lainnya=IPS)
    // ──────────────────────────────────────────
    public static function jurusanFromKelas(string $kelas): string
    {
        preg_match('/([A-Fa-f])\s*$/', $kelas, $m);
        if (!$m) return 'IPS';
        $h = strtoupper($m[1]);
        return ($h === 'A' || $h === 'B') ? 'MIPA' : 'IPS';
    }
}