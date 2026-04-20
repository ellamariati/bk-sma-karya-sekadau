<?php
// app/Controllers/SesiBimbingan.php

namespace App\Controllers;

use App\Models\SesiBimbinganModel;
use App\Models\SiswaModel;
use CodeIgniter\Controller;

class SesiBimbingan extends BaseController
{
    protected SesiBimbinganModel $model;
    protected SiswaModel $siswaModel;

    public function __construct()
    {
        $this->model      = new SesiBimbinganModel();
        $this->siswaModel = new SiswaModel();
    }

    // ── INDEX ──
    public function index(): string
    {
        $filter = [
            'q'          => $this->request->getGet('q'),
            'jenis_sesi' => $this->request->getGet('jenis_sesi'),
            'status'     => $this->request->getGet('status'),
            'kelas'      => $this->request->getGet('kelas'),
        ];

        $data = [
            'list_sesi'    => $this->model->getAllWithSiswa($filter),
            'list_siswa'   => $this->siswaModel->findAll(),
            'list_konselor'=> $this->getListKonselor(),
            'total'        => $this->model->getTotalSesi(),
            'bulan_ini'    => $this->model->getSesiBulanIni(),
            'individual'   => $this->model->getSesiIndividual(),
            'selesai'      => $this->model->getSesiSelesai(),
            'stats'        => ['baru' => 0], // sesuaikan dengan model notifikasi kamu
        ];

        return view('sesi_bimbingan/index', $data);
    }

    // ── SIMPAN (Create) ──
    public function simpan()
    {
        $rules = [
            'siswa_id'    => 'required|integer',
            'konselor'    => 'required',
            'tanggal'     => 'required',
            'waktu_mulai' => 'required',
            'jenis_sesi'  => 'required|in_list[individual,kelompok,klasikal,online]',
            'topik'       => 'required',
            'status'      => 'required|in_list[dijadwalkan,berlangsung,selesai]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors())
                ->with('error', 'Periksa kembali isian form.');
        }

        $this->model->insert([
            'siswa_id'              => $this->request->getPost('siswa_id'),
            'konselor'              => $this->request->getPost('konselor'),
            'tanggal'               => $this->request->getPost('tanggal'),
            'waktu_mulai'           => $this->request->getPost('waktu_mulai'),
            'waktu_selesai'         => $this->request->getPost('waktu_selesai') ?: null,
            'jenis_sesi'            => $this->request->getPost('jenis_sesi'),
            'topik'                 => $this->request->getPost('topik'),
            'catatan'               => $this->request->getPost('catatan') ?: null,
            'rencana_tindak_lanjut' => $this->request->getPost('rencana_tindak_lanjut') ?: null,
            'status'                => $this->request->getPost('status'),
        ]);

        return redirect()->to('sesi-bimbingan')
            ->with('success', 'Sesi bimbingan berhasil ditambahkan.');
    }

    // ── DETAIL (JSON untuk modal) ──
    public function detail(int $id)
    {
        $sesi = $this->model->getWithSiswa($id);

        if (!$sesi) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }

        return $this->response->setJSON(['success' => true, 'data' => $sesi]);
    }

    // ── EDIT (JSON untuk modal) ──
    public function edit(int $id)
    {
        $sesi = $this->model->getWithSiswa($id);

        if (!$sesi) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }

        return $this->response->setJSON(['success' => true, 'data' => $sesi]);
    }

    // ── UPDATE ──
    public function update(int $id)
    {
        $sesi = $this->model->find($id);

        if (!$sesi) {
            return redirect()->to('sesi-bimbingan')->with('error', 'Data tidak ditemukan.');
        }

        $this->model->update($id, [
            'siswa_id'              => $this->request->getPost('siswa_id'),
            'konselor'              => $this->request->getPost('konselor'),
            'tanggal'               => $this->request->getPost('tanggal'),
            'waktu_mulai'           => $this->request->getPost('waktu_mulai'),
            'waktu_selesai'         => $this->request->getPost('waktu_selesai') ?: null,
            'jenis_sesi'            => $this->request->getPost('jenis_sesi'),
            'topik'                 => $this->request->getPost('topik'),
            'catatan'               => $this->request->getPost('catatan') ?: null,
            'rencana_tindak_lanjut' => $this->request->getPost('rencana_tindak_lanjut') ?: null,
            'status'                => $this->request->getPost('status'),
        ]);

        return redirect()->to('sesi-bimbingan')
            ->with('success', 'Sesi bimbingan berhasil diperbarui.');
    }

    // ── TOGGLE STATUS (AJAX) ──
    public function status(int $id)
    {
        $newStatus = $this->request->getPost('status');

        if (!in_array($newStatus, ['dijadwalkan', 'berlangsung', 'selesai'])) {
            return $this->response->setJSON(['success' => false]);
        }

        $this->model->update($id, ['status' => $newStatus]);

        return $this->response->setJSON(['success' => true]);
    }

    // ── HAPUS ──
    public function hapus(int $id)
    {
        $sesi = $this->model->find($id);

        if (!$sesi) {
            return redirect()->to('sesi-bimbingan')->with('error', 'Data tidak ditemukan.');
        }

        $this->model->delete($id);

        return redirect()->to('sesi-bimbingan')
            ->with('success', 'Sesi bimbingan berhasil dihapus.');
    }

    // ── EXPORT CSV ──
    public function export()
    {
        $list = $this->model->getAllWithSiswa();

        $filename = 'sesi_bimbingan_' . date('Ymd_His') . '.csv';

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        // BOM supaya Excel bisa baca UTF-8
        fputs($output, "\xEF\xBB\xBF");

        // Header kolom
        fputcsv($output, [
            'No', 'Nama Siswa', 'Kelas', 'Tanggal',
            'Waktu Mulai', 'Waktu Selesai', 'Jenis Sesi',
            'Topik', 'Konselor', 'Status', 'Catatan', 'Rencana Tindak Lanjut'
        ]);

        foreach ($list as $i => $s) {
            fputcsv($output, [
                $i + 1,
                $s['nama_siswa'] ?? '',
                $s['kelas'] ?? '',
                $s['tanggal'],
                $s['waktu_mulai'],
                $s['waktu_selesai'] ?? '',
                $s['jenis_sesi'],
                $s['topik'],
                $s['konselor'],
                $s['status'],
                $s['catatan'] ?? '',
                $s['rencana_tindak_lanjut'] ?? '',
            ]);
        }

        fclose($output);
        exit;
    }

    // ── Helper: daftar konselor ──
    private function getListKonselor(): array
    {
        // Bisa diganti query dari tabel guru_bk
        return [
            ['nama' => 'Ibu Rina Marlina, S.Pd'],
            ['nama' => 'Bpk. Ahmad Fauzi, S.Pd'],
        ];
    }
}