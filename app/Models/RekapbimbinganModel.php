<?php

namespace App\Models;

use CodeIgniter\Model;

class RekapBimbinganModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    // ─────────────────────────────────────────
    // Rekap per bulan dari buku_kunjungan
    // ─────────────────────────────────────────
    public function getRekapPerBulan(int $tahun): array
    {
        $rows = $this->db->table('buku_kunjungan')
            ->select("MONTH(tanggal) as bulan, COUNT(*) as total,
                SUM(CASE WHEN status = 'selesai' THEN 1 ELSE 0 END) as selesai,
                SUM(CASE WHEN status = 'proses' THEN 1 ELSE 0 END) as proses,
                SUM(CASE WHEN jenis_kunjungan = 'mandiri' THEN 1 ELSE 0 END) as mandiri,
                SUM(CASE WHEN jenis_kunjungan = 'panggilan' THEN 1 ELSE 0 END) as panggilan")
            ->where('YEAR(tanggal)', $tahun)
            ->groupBy('MONTH(tanggal)')
            ->orderBy('MONTH(tanggal)', 'ASC')
            ->get()
            ->getResultArray();

        // Map ke 12 bulan
        $hasil = [];
        for ($i = 1; $i <= 12; $i++) {
            $hasil[$i] = [
                'bulan'     => $i,
                'total'     => 0,
                'selesai'   => 0,
                'proses'    => 0,
                'mandiri'   => 0,
                'panggilan' => 0,
            ];
        }
        foreach ($rows as $r) {
            $hasil[(int)$r['bulan']] = [
                'bulan'     => (int)$r['bulan'],
                'total'     => (int)$r['total'],
                'selesai'   => (int)$r['selesai'],
                'proses'    => (int)$r['proses'],
                'mandiri'   => (int)$r['mandiri'],
                'panggilan' => (int)$r['panggilan'],
            ];
        }
        return array_values($hasil);
    }

    // ─────────────────────────────────────────
    // Rekap per jenis bimbingan
    // ─────────────────────────────────────────
    public function getRekapJenisBimbingan(int $bulan = 0, int $tahun = 0): array
    {
        $jenis = ['pribadi', 'sosial', 'belajar', 'karir'];
        $hasil = [];

        $builder = $this->db->table('buku_kunjungan');
        if ($tahun > 0) $builder->where('YEAR(tanggal)', $tahun);
        if ($bulan > 0) $builder->where('MONTH(tanggal)', $bulan);

        $rows = $builder->select('jenis_bimbingan')->get()->getResultArray();

        $count = array_fill_keys($jenis, 0);
        foreach ($rows as $r) {
            if (!$r['jenis_bimbingan']) continue;
            $arr = explode(',', $r['jenis_bimbingan']);
            foreach ($arr as $j) {
                $j = trim($j);
                if (isset($count[$j])) $count[$j]++;
            }
        }

        foreach ($jenis as $j) {
            $hasil[] = ['jenis' => $j, 'total' => $count[$j]];
        }
        return $hasil;
    }

    // ─────────────────────────────────────────
    // Rekap per siswa (top kunjungan)
    // ─────────────────────────────────────────
    public function getRekapPerSiswa(int $bulan = 0, int $tahun = 0, int $limit = 10): array
    {
        $builder = $this->db->table('buku_kunjungan bk')
            ->select('s.nama, s.kelas, s.nisn, COUNT(*) as total,
                SUM(CASE WHEN bk.status = "selesai" THEN 1 ELSE 0 END) as selesai,
                SUM(CASE WHEN bk.status = "proses" THEN 1 ELSE 0 END) as proses')
            ->join('siswa s', 's.id = bk.siswa_id', 'left')
            ->groupBy('bk.siswa_id')
            ->orderBy('total', 'DESC')
            ->limit($limit);

        if ($tahun > 0) $builder->where('YEAR(bk.tanggal)', $tahun);
        if ($bulan > 0) $builder->where('MONTH(bk.tanggal)', $bulan);

        return $builder->get()->getResultArray();
    }

    // ─────────────────────────────────────────
    // Rekap sesi bimbingan per bulan
    // ─────────────────────────────────────────
    public function getRekapSesiPerBulan(int $tahun): array
    {
        $rows = $this->db->table('sesi_bimbingan')
            ->select("MONTH(tanggal) as bulan, COUNT(*) as total,
                SUM(CASE WHEN status = 'selesai' THEN 1 ELSE 0 END) as selesai,
                SUM(CASE WHEN jenis_sesi = 'individual' THEN 1 ELSE 0 END) as individual,
                SUM(CASE WHEN jenis_sesi = 'kelompok' THEN 1 ELSE 0 END) as kelompok,
                SUM(CASE WHEN jenis_sesi = 'klasikal' THEN 1 ELSE 0 END) as klasikal,
                SUM(CASE WHEN jenis_sesi = 'online' THEN 1 ELSE 0 END) as online")
            ->where('YEAR(tanggal)', $tahun)
            ->groupBy('MONTH(tanggal)')
            ->orderBy('MONTH(tanggal)', 'ASC')
            ->get()
            ->getResultArray();

        $hasil = [];
        for ($i = 1; $i <= 12; $i++) {
            $hasil[$i] = ['bulan' => $i, 'total' => 0, 'selesai' => 0,
                          'individual' => 0, 'kelompok' => 0, 'klasikal' => 0, 'online' => 0];
        }
        foreach ($rows as $r) {
            $hasil[(int)$r['bulan']] = [
                'bulan'      => (int)$r['bulan'],
                'total'      => (int)$r['total'],
                'selesai'    => (int)$r['selesai'],
                'individual' => (int)$r['individual'],
                'kelompok'   => (int)$r['kelompok'],
                'klasikal'   => (int)$r['klasikal'],
                'online'     => (int)$r['online'],
            ];
        }
        return array_values($hasil);
    }

    // ─────────────────────────────────────────
    // Summary cards
    // ─────────────────────────────────────────
    public function getSummary(int $bulan = 0, int $tahun = 0): array
    {
        $bk = $this->db->table('buku_kunjungan');
        $sb = $this->db->table('sesi_bimbingan');
        $tl = $this->db->table('tindak_lanjut');

        if ($tahun > 0) {
            $bk->where('YEAR(tanggal)', $tahun);
            $sb->where('YEAR(tanggal)', $tahun);
            $tl->where('YEAR(tanggal)', $tahun);
        }
        if ($bulan > 0) {
            $bk->where('MONTH(tanggal)', $bulan);
            $sb->where('MONTH(tanggal)', $bulan);
            $tl->where('MONTH(tanggal)', $bulan);
        }

        return [
            'total_kunjungan' => $bk->countAllResults(),
            'total_sesi'      => $sb->countAllResults(),
            'total_tindak'    => $tl->countAllResults(),
            'total_siswa'     => $this->db->table('siswa')->countAllResults(),
        ];
    }

    // ─────────────────────────────────────────
    // Daftar tahun yang ada di data
    // ─────────────────────────────────────────
    public function getTahunList(): array
    {
        $rows = $this->db->table('buku_kunjungan')
            ->select('YEAR(tanggal) as tahun')
            ->groupBy('YEAR(tanggal)')
            ->orderBy('tahun', 'DESC')
            ->get()->getResultArray();

        $tahun = array_column($rows, 'tahun');
        if (empty($tahun)) $tahun = [date('Y')];
        return $tahun;
    }
}