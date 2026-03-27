<?php

namespace App\Controllers;

use App\Models\PelanggaranModel;
use App\Models\SiswaModel;

class Dashboard extends BaseController
{
    protected $pelanggaranModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->pelanggaranModel = new PelanggaranModel();
        $this->siswaModel       = new SiswaModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();

        // ── Stat Cards ──
        $data['stats'] = [
            'total'    => $this->pelanggaranModel->countAll(),
            'baru'     => $this->pelanggaranModel->where('status', 'baru')->countAllResults(),
            'proses'   => $this->pelanggaranModel->where('status', 'proses')->countAllResults(),
            'diproses' => $this->pelanggaranModel->where('status', 'diproses')->countAllResults(),
            // Ringkasan per kategori (untuk card berat/sedang/ringan)
            'berat'    => $this->pelanggaranModel->where('kategori', 'berat')->countAllResults(),
            'sedang'   => $this->pelanggaranModel->where('kategori', 'sedang')->countAllResults(),
            'ringan'   => $this->pelanggaranModel->where('kategori', 'ringan')->countAllResults(),
        ];

        // ── Notifikasi ──
        $data['notifikasi'] = [
            'baru_hari_ini' => $this->pelanggaranModel
                ->where('DATE(created_at)', date('Y-m-d'))
                ->countAllResults(),
            'kritis' => $this->pelanggaranModel
                ->where('poin >=', 75)
                ->where('status', 'baru')
                ->countAllResults(),
            'menunggu_ortu' => $this->pelanggaranModel
                ->where('notif_ortu', 0)
                ->where('poin >=', 50)
                ->countAllResults(),
        ];

        // ── Jenis Pelanggaran Terbanyak (untuk progress bar) ──
        $data['jenis_terbanyak'] = $db->query("
            SELECT
                jenis_pelanggaran AS jenis,
                kategori          AS kat,
                COUNT(*)          AS jumlah
            FROM pelanggaran
            GROUP BY jenis_pelanggaran, kategori
            ORDER BY jumlah DESC
            LIMIT 5
        ")->getResultArray();

        // Hitung persentase relatif terhadap jumlah terbanyak
        if (!empty($data['jenis_terbanyak'])) {
            $max = (int) $data['jenis_terbanyak'][0]['jumlah'];
            foreach ($data['jenis_terbanyak'] as &$j) {
                $j['persen'] = $max > 0 ? round(($j['jumlah'] / $max) * 100) : 0;
            }
            unset($j);
        }

        // ── Siswa dengan Akumulasi Poin Terbanyak ──
        $data['siswa_poin'] = $db->query("
            SELECT
                s.nama,
                s.kelas,
                COALESCE(SUM(p.poin), 0) AS poin,
                CASE
                    WHEN COALESCE(SUM(p.poin), 0) >= 100 THEN '#ef4444'
                    WHEN COALESCE(SUM(p.poin), 0) >= 50  THEN '#f59e0b'
                    ELSE '#1a56db'
                END AS warna
            FROM siswa s
            LEFT JOIN pelanggaran p ON p.siswa_id = s.id
            GROUP BY s.id, s.nama, s.kelas
            HAVING poin > 0
            ORDER BY poin DESC
            LIMIT 5
        ")->getResultArray();

        return view('dashboard/index', $data);
    }
}