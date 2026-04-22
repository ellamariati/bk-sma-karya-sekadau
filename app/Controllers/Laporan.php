<?php

namespace App\Controllers;

use App\Models\LaporanModel;

/**
 * Controller: Laporan
 *
 * Mengelola halaman Laporan & Rekap.
 * Semua export (CSV/Excel/PDF) ditangani di sini.
 */
class Laporan extends BaseController
{
    protected LaporanModel $laporanModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
    }

    // ═══════════════════════════════════════════════════════
    // HALAMAN UTAMA
    // ═══════════════════════════════════════════════════════

    public function index(): string
    {
        $bulan  = (int)($this->request->getGet('bulan')  ?? 0);
        $tahun  = (int)($this->request->getGet('tahun')  ?? date('Y'));
        $kelas  = $this->request->getGet('kelas')  ?? '';
        $tab    = $this->request->getGet('tab')    ?? 'ringkasan';   // ringkasan | bimbingan | pelanggaran | ekspor
        $search = $this->request->getGet('search') ?? '';
        $page   = max(1, (int)($this->request->getGet('page') ?? 1));

        $perPage = 15;
        $offset  = ($page - 1) * $perPage;

        $filter = array_filter([
            'bulan'   => $bulan  ?: null,
            'tahun'   => $tahun  ?: null,
            'kelas'   => $kelas  ?: null,
            'search'  => $search ?: null,
        ]);

        // ── Data ringkasan ──────────────────────────────
        $summary       = $this->laporanModel->getSummary($bulan, $tahun);
        $rekapKelas    = $this->laporanModel->getRekapPerKelas($bulan, $tahun);
        $distJenis     = $this->laporanModel->getDistribusiJenisBimbingan($bulan, $tahun);
        $distKategori  = $this->laporanModel->getDistribusiKategoriPelanggaran($bulan, $tahun);
        $rekapBulanan  = $this->laporanModel->getRekapKunjunganPerBulan($tahun);
        $rekapSesi     = $this->laporanModel->getRekapSesiPerBulan($tahun);
        $rekapPelanggaran = $this->laporanModel->getRekapPelanggaranPerBulan($tahun);

        // ── Data tab bimbingan ──────────────────────────
        $daftarBimbingan = $this->laporanModel->getDaftarBimbingan($filter, $perPage, $offset);
        $totalBimbingan  = $this->laporanModel->countDaftarBimbingan($filter);
        $totalPageBimbingan = (int)ceil($totalBimbingan / $perPage);

        // ── Data tab pelanggaran ────────────────────────
        $daftarPelanggaran = $this->laporanModel->getDaftarPelanggaran($filter, $perPage, $offset);
        $totalPelanggaran  = $this->laporanModel->countDaftarPelanggaran($filter);
        $totalPagePelanggaran = (int)ceil($totalPelanggaran / $perPage);

        // ── Helpers ─────────────────────────────────────
        $tahunList  = $this->laporanModel->getTahunList();
        $kelasList  = $this->laporanModel->getKelasList();

        return view('laporan/index', [
            'title'                   => 'Laporan & Rekap',
            // filter aktif
            'bulan_aktif'             => $bulan,
            'tahun_aktif'             => $tahun,
            'kelas_aktif'             => $kelas,
            'tab_aktif'               => $tab,
            'search_aktif'            => $search,
            'page'                    => $page,
            // lookup
            'tahun_list'              => $tahunList,
            'kelas_list'              => $kelasList,
            // summary
            'summary'                 => $summary,
            // ringkasan
            'rekap_kelas'             => $rekapKelas,
            'dist_jenis'              => $distJenis,
            'dist_kategori'           => $distKategori,
            'rekap_bulanan'           => $rekapBulanan,
            'rekap_sesi'              => $rekapSesi,
            'rekap_pelanggaran_bulan' => $rekapPelanggaran,
            // tab bimbingan
            'daftar_bimbingan'        => $daftarBimbingan,
            'total_bimbingan'         => $totalBimbingan,
            'total_page_bimbingan'    => $totalPageBimbingan,
            // tab pelanggaran
            'daftar_pelanggaran'      => $daftarPelanggaran,
            'total_pel'               => $totalPelanggaran,
            'total_page_pel'          => $totalPagePelanggaran,
        ]);
    }

    // ═══════════════════════════════════════════════════════
    // EXPORT CSV — BIMBINGAN
    // ═══════════════════════════════════════════════════════

    public function exportCsvBimbingan(): void
    {
        $filter = $this->getFilterFromRequest();
        $data   = $this->laporanModel->getAllBimbinganForExport($filter);

        $namaBulan = $this->namaBulan();
        $bulan     = (int)($this->request->getGet('bulan') ?? 0);
        $tahun     = (int)($this->request->getGet('tahun') ?? date('Y'));
        $periode   = $bulan > 0 ? $namaBulan[$bulan] . ' ' . $tahun : 'Tahun ' . $tahun;

        $filename = 'laporan_bimbingan_' . date('Ymd_His') . '.csv';

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $out = fopen('php://output', 'w');
        // BOM UTF-8 agar Excel baca karakter Indonesia dengan benar
        fprintf($out, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($out, ['LAPORAN BIMBINGAN — ' . strtoupper($periode)]);
        fputcsv($out, ['Diekspor pada: ' . date('d/m/Y H:i:s')]);
        fputcsv($out, []);
        fputcsv($out, ['No', 'Tanggal', 'Nama Siswa', 'NISN', 'Kelas', 'Jenis Kunjungan', 'Jenis Bimbingan', 'Keterangan', 'Status']);

        foreach ($data as $i => $row) {
            fputcsv($out, [
                $i + 1,
                isset($row['tanggal']) ? date('d/m/Y', strtotime($row['tanggal'])) : '-',
                $row['nama']            ?? '-',
                $row['nisn']            ?? '-',
                $row['kelas']           ?? '-',
                ucfirst($row['jenis_kunjungan'] ?? '-'),
                ucfirst($row['jenis_bimbingan'] ?? '-'),
                $row['keterangan']      ?? '-',
                ucfirst($row['status']  ?? '-'),
            ]);
        }

        fclose($out);
        exit;
    }

    // ═══════════════════════════════════════════════════════
    // EXPORT CSV — PELANGGARAN
    // ═══════════════════════════════════════════════════════

    public function exportCsvPelanggaran(): void
    {
        $filter = $this->getFilterFromRequest();
        $data   = $this->laporanModel->getAllPelanggaranForExport($filter);

        $namaBulan = $this->namaBulan();
        $bulan     = (int)($this->request->getGet('bulan') ?? 0);
        $tahun     = (int)($this->request->getGet('tahun') ?? date('Y'));
        $periode   = $bulan > 0 ? $namaBulan[$bulan] . ' ' . $tahun : 'Tahun ' . $tahun;

        $filename = 'laporan_pelanggaran_' . date('Ymd_His') . '.csv';

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $out = fopen('php://output', 'w');
        fprintf($out, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($out, ['LAPORAN PELANGGARAN — ' . strtoupper($periode)]);
        fputcsv($out, ['Diekspor pada: ' . date('d/m/Y H:i:s')]);
        fputcsv($out, []);
        fputcsv($out, ['No', 'Tanggal', 'Nama Siswa', 'NISN', 'Kelas', 'Kategori', 'Deskripsi', 'Poin', 'Status']);

        foreach ($data as $i => $row) {
            fputcsv($out, [
                $i + 1,
                isset($row['tanggal_kejadian']) ? date('d/m/Y', strtotime($row['tanggal_kejadian'])) : '-',
                $row['nama']           ?? '-',
                $row['nisn']           ?? '-',
                $row['kelas']          ?? '-',
                $row['kategori']       ?? '-',
                $row['deskripsi']      ?? '-',
                $row['bobot_poin']     ?? 0,
                ucfirst($row['status'] ?? '-'),
            ]);
        }

        fclose($out);
        exit;
    }

    // ═══════════════════════════════════════════════════════
    // EXPORT CSV — REKAP PER KELAS
    // ═══════════════════════════════════════════════════════

    public function exportCsvRekap(): void
    {
        $bulan = (int)($this->request->getGet('bulan') ?? 0);
        $tahun = (int)($this->request->getGet('tahun') ?? date('Y'));
        $data  = $this->laporanModel->getAllRekapKelasForExport($bulan, $tahun);

        $namaBulan = $this->namaBulan();
        $periode   = $bulan > 0 ? $namaBulan[$bulan] . ' ' . $tahun : 'Tahun ' . $tahun;
        $filename  = 'rekap_per_kelas_' . date('Ymd_His') . '.csv';

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $out = fopen('php://output', 'w');
        fprintf($out, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($out, ['REKAP PER KELAS — ' . strtoupper($periode)]);
        fputcsv($out, ['Diekspor pada: ' . date('d/m/Y H:i:s')]);
        fputcsv($out, []);
        fputcsv($out, ['Kelas', 'Jumlah Siswa', 'Total Bimbingan', 'Total Pelanggaran', 'Tindak Lanjut', 'Status']);

        foreach ($data as $row) {
            $statusLabel = match($row['status']) {
                'perlu_perhatian' => 'Perlu Perhatian',
                'perhatian'       => 'Perhatian',
                default           => 'Baik',
            };
            fputcsv($out, [
                $row['kelas'],
                $row['jumlah_siswa'],
                $row['total_bimbingan'],
                $row['total_pelanggaran'],
                $row['total_tindak'],
                $statusLabel,
            ]);
        }

        fclose($out);
        exit;
    }

    // ═══════════════════════════════════════════════════════
    // PRIVATE HELPERS
    // ═══════════════════════════════════════════════════════

    private function getFilterFromRequest(): array
    {
        return array_filter([
            'bulan'    => (int)($this->request->getGet('bulan')  ?? 0)  ?: null,
            'tahun'    => (int)($this->request->getGet('tahun')  ?? 0)  ?: null,
            'kelas'    => $this->request->getGet('kelas')  ?? null,
            'status'   => $this->request->getGet('status') ?? null,
            'search'   => $this->request->getGet('search') ?? null,
            'kategori' => $this->request->getGet('kategori') ?? null,
        ]);
    }

    private function namaBulan(): array
    {
        return [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April',   5 => 'Mei',       6 => 'Juni',
            7 => 'Juli',    8 => 'Agustus',   9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];
    }
}