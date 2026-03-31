<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuKunjunganModel extends Model
{
    protected $table          = 'buku_kunjungan';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'siswa_id', 'tanggal', 'jam',
        'jenis_kunjungan', 'jenis_bimbingan',
        'keperluan', 'hasil_kunjungan',
        'yang_menangani', 'ttd', 'status',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // ─────────────────────────────────────────
    // Ambil semua kunjungan + info siswa
    // ─────────────────────────────────────────
    public function getAllWithSiswa(): array
    {
        return $this->db->table('buku_kunjungan bk')
            ->select('bk.*, s.nama as nama_siswa, s.kelas, s.nisn, s.jurusan, s.jk, s.no_hp_ortu')
            ->join('siswa s', 's.id = bk.siswa_id', 'left')
            ->orderBy('bk.tanggal', 'DESC')
            ->orderBy('bk.jam', 'DESC')
            ->get()
            ->getResultArray();
    }

    // ─────────────────────────────────────────
    // Detail satu kunjungan + info siswa
    // ─────────────────────────────────────────
    public function getDetailById(int $id): ?array
    {
        $result = $this->db->table('buku_kunjungan bk')
            ->select('bk.*, s.nama as nama_siswa, s.kelas, s.nisn, s.jurusan, s.jk, s.no_hp_ortu')
            ->join('siswa s', 's.id = bk.siswa_id', 'left')
            ->where('bk.id', $id)
            ->get()
            ->getRowArray();

        return $result ?: null;
    }

    // ─────────────────────────────────────────
    // Statistik
    // ─────────────────────────────────────────
    public function getStats(): array
    {
        $total = (int) $this->db->table('buku_kunjungan')->countAllResults();

        $rows = $this->db->table('buku_kunjungan')
            ->select('status, COUNT(*) as jumlah')
            ->groupBy('status')
            ->get()
            ->getResultArray();

        $proses  = 0;
        $selesai = 0;
        foreach ($rows as $r) {
            if ($r['status'] === 'proses')  $proses  = (int) $r['jumlah'];
            if ($r['status'] === 'selesai') $selesai = (int) $r['jumlah'];
        }

        // Mandiri vs Panggilan
        $rows2 = $this->db->table('buku_kunjungan')
            ->select('jenis_kunjungan, COUNT(*) as jumlah')
            ->groupBy('jenis_kunjungan')
            ->get()
            ->getResultArray();

        $mandiri   = 0;
        $panggilan = 0;
        foreach ($rows2 as $r) {
            if ($r['jenis_kunjungan'] === 'mandiri')   $mandiri   = (int) $r['jumlah'];
            if ($r['jenis_kunjungan'] === 'panggilan') $panggilan = (int) $r['jumlah'];
        }

        $bulanIni = (int) $this->db->table('buku_kunjungan')
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)',  date('Y'))
            ->countAllResults();

        return compact('total', 'proses', 'selesai', 'mandiri', 'panggilan', 'bulanIni');
    }
}