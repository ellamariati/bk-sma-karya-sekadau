<?php

namespace App\Models;

use CodeIgniter\Model;

class TindaklanjutModel extends Model
{
    protected $table         = 'tindak_lanjut';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'pelanggaran_id', 'siswa_id', 'konselor_id',
        'masalah', 'tindak_lanjut', 'yang_menangani',
        'tanggal', 'ttd', 'status',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // ─────────────────────────────────────────
    // Ambil semua tindak lanjut + nama siswa + kelas
    // ─────────────────────────────────────────
    public function getAllWithSiswa(): array
    {
        return $this->db->table('tindak_lanjut tl')
            ->select('tl.*, s.nama as nama_siswa, s.kelas, s.nisn, s.jurusan')
            ->join('siswa s', 's.id = tl.siswa_id', 'left')
            ->orderBy('tl.tanggal', 'DESC')
            ->get()
            ->getResultArray();
    }

    // ─────────────────────────────────────────
    // Detail satu tindak lanjut + info siswa
    // ─────────────────────────────────────────
    public function getDetailById(int $id): ?array
    {
        $result = $this->db->table('tindak_lanjut tl')
            ->select('tl.*, s.nama as nama_siswa, s.kelas, s.nisn, s.jurusan, s.jk, s.no_hp_ortu')
            ->join('siswa s', 's.id = tl.siswa_id', 'left')
            ->where('tl.id', $id)
            ->get()
            ->getRowArray();
        return $result ?: null;
    }

    // ─────────────────────────────────────────
    // Statistik ringkasan
    // ─────────────────────────────────────────
    public function getStats(): array
    {
        $total    = $this->countAll();
        $proses   = $this->where('status', 'proses')->countAllResults();
        $selesai  = $this->where('status', 'selesai')->countAllResults();
        $bulanIni = $this->db->table('tindak_lanjut')
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)', date('Y'))
            ->countAllResults();

        return compact('total', 'proses', 'selesai', 'bulanIni');
    }
}