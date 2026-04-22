<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * LaporanModel
 *
 * Mengambil data dari tabel-tabel yang sudah ada:
 *   - buku_kunjungan
 *   - sesi_bimbingan
 *   - tindak_lanjut
 *   - pelanggaran (+ kategori_pelanggaran)
 *   - siswa
 *   - laporan_tersimpan (history export)
 *
 * TIDAK ada tabel baru wajib — migration laporan_tersimpan opsional
 * hanya jika fitur "simpan history laporan" dipakai.
 */
class LaporanModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    // ═══════════════════════════════════════════════════════
    // SUMMARY CARDS
    // ═══════════════════════════════════════════════════════

    /**
     * Data untuk 4 kartu ringkasan di atas halaman.
     */
    public function getSummary(int $bulan = 0, int $tahun = 0): array
    {
        $bk = $this->db->table('buku_kunjungan');
        $sb = $this->db->table('sesi_bimbingan');
        $tl = $this->db->table('tindak_lanjut');
        $pl = $this->db->table('pelanggaran');

        if ($tahun > 0) {
            $bk->where('YEAR(tanggal)', $tahun);
            $sb->where('YEAR(tanggal)', $tahun);
            $tl->where('YEAR(tanggal)', $tahun);
            $pl->where('YEAR(tanggal_kejadian)', $tahun);
        }
        if ($bulan > 0) {
            $bk->where('MONTH(tanggal)', $bulan);
            $sb->where('MONTH(tanggal)', $bulan);
            $tl->where('MONTH(tanggal)', $bulan);
            $pl->where('MONTH(tanggal_kejadian)', $bulan);
        }

        return [
            'total_bimbingan'   => $bk->countAllResults(),
            'total_sesi'        => $sb->countAllResults(),
            'total_pelanggaran' => $pl->countAllResults(),
            'total_tindak'      => $tl->countAllResults(),
            'total_siswa'       => $this->db->table('siswa')->countAllResults(),
        ];
    }

    // ═══════════════════════════════════════════════════════
    // TAB RINGKASAN
    // ═══════════════════════════════════════════════════════

    /**
     * Rekap kunjungan per bulan (12 bulan penuh).
     */
    public function getRekapKunjunganPerBulan(int $tahun): array
    {
        $rows = $this->db->table('buku_kunjungan')
            ->select("MONTH(tanggal) as bulan, COUNT(*) as total,
                SUM(CASE WHEN status = 'selesai'          THEN 1 ELSE 0 END) as selesai,
                SUM(CASE WHEN status = 'proses'           THEN 1 ELSE 0 END) as proses,
                SUM(CASE WHEN jenis_kunjungan = 'mandiri'    THEN 1 ELSE 0 END) as mandiri,
                SUM(CASE WHEN jenis_kunjungan = 'panggilan'  THEN 1 ELSE 0 END) as panggilan")
            ->where('YEAR(tanggal)', $tahun)
            ->groupBy('MONTH(tanggal)')
            ->orderBy('MONTH(tanggal)', 'ASC')
            ->get()->getResultArray();

        return $this->fillBulan($rows, ['total', 'selesai', 'proses', 'mandiri', 'panggilan']);
    }

    /**
     * Rekap pelanggaran per bulan (12 bulan penuh).
     */
    public function getRekapPelanggaranPerBulan(int $tahun): array
    {
        $rows = $this->db->table('pelanggaran')
            ->select("MONTH(tanggal_kejadian) as bulan, COUNT(*) as total,
                SUM(CASE WHEN status = 'selesai' THEN 1 ELSE 0 END) as selesai,
                SUM(CASE WHEN status = 'proses'  THEN 1 ELSE 0 END) as proses")
            ->where('YEAR(tanggal_kejadian)', $tahun)
            ->groupBy('MONTH(tanggal_kejadian)')
            ->orderBy('MONTH(tanggal_kejadian)', 'ASC')
            ->get()->getResultArray();

        return $this->fillBulan($rows, ['total', 'selesai', 'proses']);
    }

    /**
     * Rekap sesi bimbingan per bulan.
     */
    public function getRekapSesiPerBulan(int $tahun): array
    {
        $rows = $this->db->table('sesi_bimbingan')
            ->select("MONTH(tanggal) as bulan, COUNT(*) as total,
                SUM(CASE WHEN status = 'selesai'        THEN 1 ELSE 0 END) as selesai,
                SUM(CASE WHEN jenis_sesi = 'individual' THEN 1 ELSE 0 END) as individual,
                SUM(CASE WHEN jenis_sesi = 'kelompok'   THEN 1 ELSE 0 END) as kelompok")
            ->where('YEAR(tanggal)', $tahun)
            ->groupBy('MONTH(tanggal)')
            ->orderBy('MONTH(tanggal)', 'ASC')
            ->get()->getResultArray();

        return $this->fillBulan($rows, ['total', 'selesai', 'individual', 'kelompok']);
    }

    /**
     * Rekap per kelas: gabungan bimbingan + pelanggaran.
     */
    public function getRekapPerKelas(int $bulan = 0, int $tahun = 0): array
    {
        // Ambil semua kelas unik dari tabel siswa
        $kelasList = $this->db->table('siswa')
            ->select('kelas')
            ->distinct()
            ->orderBy('kelas', 'ASC')
            ->get()->getResultArray();

        $hasil = [];
        foreach ($kelasList as $k) {
            $kelas = $k['kelas'];

            // Jumlah siswa di kelas
            $jmlSiswa = $this->db->table('siswa')
                ->where('kelas', $kelas)
                ->countAllResults();

            // Bimbingan kelas ini
            $bkQ = $this->db->table('buku_kunjungan bk')
                ->join('siswa s', 's.id = bk.siswa_id', 'left')
                ->where('s.kelas', $kelas);
            if ($tahun > 0) $bkQ->where('YEAR(bk.tanggal)', $tahun);
            if ($bulan > 0) $bkQ->where('MONTH(bk.tanggal)', $bulan);
            $totalBimbingan = $bkQ->countAllResults();

            // Pelanggaran kelas ini
            $plQ = $this->db->table('pelanggaran p')
                ->join('siswa s', 's.id = p.siswa_id', 'left')
                ->where('s.kelas', $kelas);
            if ($tahun > 0) $plQ->where('YEAR(p.tanggal_kejadian)', $tahun);
            if ($bulan > 0) $plQ->where('MONTH(p.tanggal_kejadian)', $bulan);
            $totalPelanggaran = $plQ->countAllResults();

            // Tindak lanjut kelas ini
            $tlQ = $this->db->table('tindak_lanjut tl')
                ->join('siswa s', 's.id = tl.siswa_id', 'left')
                ->where('s.kelas', $kelas);
            if ($tahun > 0) $tlQ->where('YEAR(tl.tanggal)', $tahun);
            if ($bulan > 0) $tlQ->where('MONTH(tl.tanggal)', $bulan);
            $totalTindak = $tlQ->countAllResults();

            // Status kelas
            $status = 'baik';
            if ($totalPelanggaran >= 10 || ($totalBimbingan > 0 && $totalPelanggaran / max($jmlSiswa, 1) > 0.3)) {
                $status = 'perlu_perhatian';
            } elseif ($totalPelanggaran >= 5) {
                $status = 'perhatian';
            }

            $hasil[] = [
                'kelas'             => $kelas,
                'jumlah_siswa'      => $jmlSiswa,
                'total_bimbingan'   => $totalBimbingan,
                'total_pelanggaran' => $totalPelanggaran,
                'total_tindak'      => $totalTindak,
                'status'            => $status,
            ];
        }

        return $hasil;
    }

    /**
     * Distribusi kategori bimbingan (jenis_bimbingan di buku_kunjungan).
     * Kolom jenis_bimbingan bisa berisi nilai tunggal atau koma-separated.
     */
    public function getDistribusiJenisBimbingan(int $bulan = 0, int $tahun = 0): array
    {
        $jenis = ['pribadi', 'sosial', 'belajar', 'karir'];

        $builder = $this->db->table('buku_kunjungan');
        if ($tahun > 0) $builder->where('YEAR(tanggal)', $tahun);
        if ($bulan > 0) $builder->where('MONTH(tanggal)', $bulan);
        $rows = $builder->select('jenis_bimbingan')->get()->getResultArray();

        $count = array_fill_keys($jenis, 0);
        foreach ($rows as $r) {
            if (empty($r['jenis_bimbingan'])) continue;
            foreach (explode(',', $r['jenis_bimbingan']) as $j) {
                $j = trim(strtolower($j));
                if (isset($count[$j])) $count[$j]++;
            }
        }

        $total = array_sum($count) ?: 1;
        $hasil = [];
        foreach ($jenis as $j) {
            $hasil[] = [
                'jenis'   => ucfirst($j),
                'total'   => $count[$j],
                'persen'  => round($count[$j] / $total * 100),
            ];
        }
        return $hasil;
    }

    /**
     * Distribusi kategori pelanggaran.
     */
    public function getDistribusiKategoriPelanggaran(int $bulan = 0, int $tahun = 0): array
    {
        $builder = $this->db->table('pelanggaran p')
            ->select('kp.nama_kategori as kategori, COUNT(*) as total')
            ->join('kategori_pelanggaran kp', 'kp.id = p.kategori_id', 'left')
            ->groupBy('p.kategori_id')
            ->orderBy('total', 'DESC');

        if ($tahun > 0) $builder->where('YEAR(p.tanggal_kejadian)', $tahun);
        if ($bulan > 0) $builder->where('MONTH(p.tanggal_kejadian)', $bulan);

        $rows = $builder->get()->getResultArray();
        $total = array_sum(array_column($rows, 'total')) ?: 1;

        foreach ($rows as &$r) {
            $r['persen'] = round($r['total'] / $total * 100);
        }
        return $rows;
    }

    // ═══════════════════════════════════════════════════════
    // TAB LAPORAN BIMBINGAN
    // ═══════════════════════════════════════════════════════

    /**
     * Daftar sesi bimbingan dengan filter + pagination.
     *
     * @param array $filter  ['bulan', 'tahun', 'kelas', 'status', 'search']
     * @param int   $limit
     * @param int   $offset
     */
    public function getDaftarBimbingan(array $filter = [], int $limit = 20, int $offset = 0): array
    {
        $builder = $this->db->table('buku_kunjungan bk')
            ->select('bk.*, s.nama, s.nisn, s.kelas, s.jenis_kelamin')
            ->join('siswa s', 's.id = bk.siswa_id', 'left')
            ->orderBy('bk.tanggal', 'DESC')
            ->orderBy('bk.id', 'DESC');

        $this->applyFilter($builder, $filter, 'bk');
        if (!empty($filter['kelas'])) $builder->where('s.kelas', $filter['kelas']);
        if (!empty($filter['search'])) {
            $builder->groupStart()
                ->like('s.nama', $filter['search'])
                ->orLike('s.nisn', $filter['search'])
                ->groupEnd();
        }

        return $builder->limit($limit, $offset)->get()->getResultArray();
    }

    public function countDaftarBimbingan(array $filter = []): int
    {
        $builder = $this->db->table('buku_kunjungan bk')
            ->join('siswa s', 's.id = bk.siswa_id', 'left');

        $this->applyFilter($builder, $filter, 'bk');
        if (!empty($filter['kelas']))  $builder->where('s.kelas', $filter['kelas']);
        if (!empty($filter['search'])) {
            $builder->groupStart()
                ->like('s.nama', $filter['search'])
                ->orLike('s.nisn', $filter['search'])
                ->groupEnd();
        }

        return $builder->countAllResults();
    }

    // ═══════════════════════════════════════════════════════
    // TAB LAPORAN PELANGGARAN
    // ═══════════════════════════════════════════════════════

    /**
     * Daftar pelanggaran dengan filter + pagination.
     */
    public function getDaftarPelanggaran(array $filter = [], int $limit = 20, int $offset = 0): array
    {
        $builder = $this->db->table('pelanggaran p')
            ->select('p.*, s.nama, s.nisn, s.kelas, kp.nama_kategori as kategori, kp.bobot_poin')
            ->join('siswa s', 's.id = p.siswa_id', 'left')
            ->join('kategori_pelanggaran kp', 'kp.id = p.kategori_id', 'left')
            ->orderBy('p.tanggal_kejadian', 'DESC')
            ->orderBy('p.id', 'DESC');

        $this->applyFilterPelanggaran($builder, $filter, 'p');
        if (!empty($filter['kelas'])) $builder->where('s.kelas', $filter['kelas']);
        if (!empty($filter['search'])) {
            $builder->groupStart()
                ->like('s.nama', $filter['search'])
                ->orLike('s.nisn', $filter['search'])
                ->groupEnd();
        }

        return $builder->limit($limit, $offset)->get()->getResultArray();
    }

    public function countDaftarPelanggaran(array $filter = []): int
    {
        $builder = $this->db->table('pelanggaran p')
            ->join('siswa s', 's.id = p.siswa_id', 'left')
            ->join('kategori_pelanggaran kp', 'kp.id = p.kategori_id', 'left');

        $this->applyFilterPelanggaran($builder, $filter, 'p');
        if (!empty($filter['kelas']))  $builder->where('s.kelas', $filter['kelas']);
        if (!empty($filter['search'])) {
            $builder->groupStart()
                ->like('s.nama', $filter['search'])
                ->orLike('s.nisn', $filter['search'])
                ->groupEnd();
        }

        return $builder->countAllResults();
    }

    // ═══════════════════════════════════════════════════════
    // EXPORT DATA
    // ═══════════════════════════════════════════════════════

    /**
     * Semua data bimbingan untuk export (tanpa limit).
     */
    public function getAllBimbinganForExport(array $filter = []): array
    {
        return $this->getDaftarBimbingan($filter, 9999, 0);
    }

    /**
     * Semua data pelanggaran untuk export (tanpa limit).
     */
    public function getAllPelanggaranForExport(array $filter = []): array
    {
        return $this->getDaftarPelanggaran($filter, 9999, 0);
    }

    /**
     * Ringkasan lengkap per kelas untuk export rekap.
     */
    public function getAllRekapKelasForExport(int $bulan = 0, int $tahun = 0): array
    {
        return $this->getRekapPerKelas($bulan, $tahun);
    }

    // ═══════════════════════════════════════════════════════
    // HELPER
    // ═══════════════════════════════════════════════════════

    /**
     * Daftar tahun unik dari data.
     */
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

    /**
     * Daftar kelas unik dari tabel siswa.
     */
    public function getKelasList(): array
    {
        return $this->db->table('siswa')
            ->select('kelas')
            ->distinct()
            ->orderBy('kelas', 'ASC')
            ->get()->getColumn('kelas');
    }

    /**
     * Isi array 12 bulan dengan 0 untuk bulan yang tidak ada data.
     */
    private function fillBulan(array $rows, array $fields): array
    {
        $default = array_fill_keys($fields, 0);
        $map = [];
        foreach ($rows as $r) {
            $map[(int)$r['bulan']] = array_intersect_key($r, array_flip($fields));
        }

        $hasil = [];
        for ($i = 1; $i <= 12; $i++) {
            $hasil[] = array_merge(['bulan' => $i], $default, $map[$i] ?? []);
        }
        return $hasil;
    }

    /**
     * Apply filter bulan/tahun/status ke query buku_kunjungan/sesi_bimbingan.
     */
    private function applyFilter($builder, array $filter, string $alias = 'bk'): void
    {
        if (!empty($filter['tahun'])) $builder->where("YEAR({$alias}.tanggal)", $filter['tahun']);
        if (!empty($filter['bulan'])) $builder->where("MONTH({$alias}.tanggal)", $filter['bulan']);
        if (!empty($filter['status'])) $builder->where("{$alias}.status", $filter['status']);
    }

    /**
     * Apply filter bulan/tahun/status ke query pelanggaran.
     */
    private function applyFilterPelanggaran($builder, array $filter, string $alias = 'p'): void
    {
        if (!empty($filter['tahun'])) $builder->where("YEAR({$alias}.tanggal_kejadian)", $filter['tahun']);
        if (!empty($filter['bulan'])) $builder->where("MONTH({$alias}.tanggal_kejadian)", $filter['bulan']);
        if (!empty($filter['status'])) $builder->where("{$alias}.status", $filter['status']);
        if (!empty($filter['kategori'])) $builder->where("{$alias}.kategori_id", $filter['kategori']);
    }
}