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
        // ── Stat Cards ──
        $data['stats'] = [
            'total'    => $this->pelanggaranModel->countAll(),
            'baru'     => $this->pelanggaranModel->where('status','baru')->countAllResults(),
            'proses'   => $this->pelanggaranModel->where('status','proses')->countAllResults(),
            'diproses' => $this->pelanggaranModel->where('status','diproses')->countAllResults(),
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

        // ── Tabel Pelanggaran Terbaru (dari database) ──
        $data['tabel_baru'] = $this->pelanggaranModel
            ->select('pelanggaran.*, siswa.nama as nama_siswa, siswa.kelas, u.nama as nama_konselor')
            ->join('siswa', 'siswa.id = pelanggaran.siswa_id', 'left')
            ->join('users u', 'u.id = pelanggaran.konselor_id', 'left')
            ->where('pelanggaran.status', 'baru')
            ->orderBy('pelanggaran.created_at', 'DESC')
            ->limit(8)
            ->findAll();

        $data['tabel_proses'] = $this->pelanggaranModel
            ->select('pelanggaran.*, siswa.nama as nama_siswa, siswa.kelas, u.nama as nama_konselor')
            ->join('siswa', 'siswa.id = pelanggaran.siswa_id', 'left')
            ->join('users u', 'u.id = pelanggaran.konselor_id', 'left')
            ->where('pelanggaran.status', 'proses')
            ->orderBy('pelanggaran.created_at', 'DESC')
            ->limit(8)
            ->findAll();

        $data['tabel_selesai'] = $this->pelanggaranModel
            ->select('pelanggaran.*, siswa.nama as nama_siswa, siswa.kelas, u.nama as nama_konselor')
            ->join('siswa', 'siswa.id = pelanggaran.siswa_id', 'left')
            ->join('users u', 'u.id = pelanggaran.konselor_id', 'left')
            ->where('pelanggaran.status', 'diproses')
            ->orderBy('pelanggaran.created_at', 'DESC')
            ->limit(8)
            ->findAll();

        // ── List Siswa untuk form tambah ──
        $data['listSiswa'] = $this->siswaModel
            ->select('id, nisn, nama, kelas')
            ->orderBy('nama', 'ASC')
            ->findAll();

        return view('dashboard/index', $data);
    }
}