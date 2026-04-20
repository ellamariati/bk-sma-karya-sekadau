<?php

namespace App\Controllers;

use App\Models\RekapBimbinganModel;

class RekapBimbingan extends BaseController
{
    protected $rekapModel;

    public function __construct()
    {
        $this->rekapModel = new RekapBimbinganModel();
    }

    public function index()
    {
        $bulan = (int) ($this->request->getGet('bulan') ?? 0);
        $tahun = (int) ($this->request->getGet('tahun') ?? date('Y'));

        $data = [
            'title'              => 'Rekap Bimbingan',
            'bulan_aktif'        => $bulan,
            'tahun_aktif'        => $tahun,
            'tahun_list'         => $this->rekapModel->getTahunList(),
            'summary'            => $this->rekapModel->getSummary($bulan, $tahun),
            'rekap_bulan'        => $this->rekapModel->getRekapPerBulan($tahun),
            'rekap_jenis'        => $this->rekapModel->getRekapJenisBimbingan($bulan, $tahun),
            'rekap_siswa'        => $this->rekapModel->getRekapPerSiswa($bulan, $tahun, 10),
            'rekap_sesi'         => $this->rekapModel->getRekapSesiPerBulan($tahun),
        ];

        return view('rekap-bimbingan/index', $data);
    }

    public function exportCsv()
    {
        $bulan = (int) ($this->request->getGet('bulan') ?? 0);
        $tahun = (int) ($this->request->getGet('tahun') ?? date('Y'));

        $rekap = $this->rekapModel->getRekapPerSiswa($bulan, $tahun, 999);

        $namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                      'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $periode = $bulan > 0 ? $namaBulan[$bulan] . ' ' . $tahun : 'Tahun ' . $tahun;

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="rekap_bimbingan_' . date('Ymd_His') . '.csv"');
        header('Pragma: no-cache');

        $out = fopen('php://output', 'w');
        fprintf($out, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($out, ['REKAP BIMBINGAN - ' . strtoupper($periode)]);
        fputcsv($out, []);
        fputcsv($out, ['No', 'Nama Siswa', 'NISN', 'Kelas', 'Total Kunjungan', 'Selesai', 'Proses']);

        foreach ($rekap as $i => $row) {
            fputcsv($out, [
                $i + 1,
                $row['nama']    ?? '-',
                $row['nisn']    ?? '-',
                $row['kelas']   ?? '-',
                $row['total'],
                $row['selesai'],
                $row['proses'],
            ]);
        }

        fclose($out);
        exit;
    }
}