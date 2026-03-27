<?php

namespace App\Controllers;

use App\Models\TindaklanjutModel;
use App\Models\SiswaModel;
use App\Models\PelanggaranModel;

class TindakLanjut extends BaseController
{
    protected $tindakLanjutModel;
    protected $siswaModel;
    protected $pelanggaranModel;

    public function __construct()
    {
        $this->tindakLanjutModel = new TindakLanjutModel();
        $this->siswaModel        = new SiswaModel();
        $this->pelanggaranModel  = new PelanggaranModel();
    }

    // ════════════════════════════════════════
    // INDEX
    // ════════════════════════════════════════
    public function index()
    {
        $stats = $this->tindakLanjutModel->getStats();

        $data['list_tindak_lanjut'] = $this->tindakLanjutModel->getAllWithSiswa();
        $data['list_siswa']         = $this->siswaModel->orderBy('nama', 'ASC')->findAll();
        $data['total']              = $stats['total'];
        $data['proses']             = $stats['proses'];
        $data['selesai']            = $stats['selesai'];
        $data['bulan_ini']          = $stats['bulanIni'];
        $data['stats']              = ['baru' => 0];

        return view('tindak-lanjut/index', $data);
    }

    // ════════════════════════════════════════
    // SIMPAN — Tambah baru
    // ════════════════════════════════════════
    public function simpan()
    {
        $rules = [
            'siswa_id'      => 'required|integer',
            'masalah'       => 'required|min_length[5]',
            'tindak_lanjut' => 'required|min_length[5]',
            'yang_menangani'=> 'required',
            'tanggal'       => 'required|valid_date',
        ];

        $messages = [
            'siswa_id'       => ['required' => 'Siswa wajib dipilih.'],
            'masalah'        => ['required' => 'Masalah wajib diisi.'],
            'tindak_lanjut'  => ['required' => 'Tindak lanjut wajib diisi.'],
            'yang_menangani' => ['required' => 'Pihak yang menangani wajib dipilih.'],
            'tanggal'        => ['required' => 'Tanggal wajib diisi.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->tindakLanjutModel->insert([
            'siswa_id'       => $this->request->getPost('siswa_id'),
            'pelanggaran_id' => $this->request->getPost('pelanggaran_id') ?: null,
            'konselor_id'    => null,
            'masalah'        => $this->request->getPost('masalah'),
            'tindak_lanjut'  => $this->request->getPost('tindak_lanjut'),
            'yang_menangani' => $this->request->getPost('yang_menangani'),
            'tanggal'        => $this->request->getPost('tanggal'),
            'ttd'            => $this->request->getPost('ttd') ?: null,
            'status'         => 'proses',
        ]);

        return redirect()->to(base_url('tindak-lanjut'))
            ->with('success', 'Tindak lanjut berhasil ditambahkan.');
    }

    // ════════════════════════════════════════
    // DETAIL — JSON untuk modal
    // ════════════════════════════════════════
    public function detail(int $id)
    {
        $data = $this->tindakLanjutModel->getDetailById($id);
        if (!$data) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
        return $this->response->setJSON(['success' => true, 'data' => $data]);
    }

    // ════════════════════════════════════════
    // EDIT — JSON untuk modal edit
    // ════════════════════════════════════════
    public function edit(int $id)
    {
        $data = $this->tindakLanjutModel->getDetailById($id);
        if (!$data) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
        return $this->response->setJSON(['success' => true, 'data' => $data]);
    }

    // ════════════════════════════════════════
    // UPDATE
    // ════════════════════════════════════════
    public function update(int $id)
    {
        $tl = $this->tindakLanjutModel->find($id);
        if (!$tl) {
            return redirect()->to(base_url('tindak-lanjut'))->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'siswa_id'      => 'required|integer',
            'masalah'       => 'required|min_length[5]',
            'tindak_lanjut' => 'required|min_length[5]',
            'yang_menangani'=> 'required',
            'tanggal'       => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->tindakLanjutModel->update($id, [
            'siswa_id'       => $this->request->getPost('siswa_id'),
            'masalah'        => $this->request->getPost('masalah'),
            'tindak_lanjut'  => $this->request->getPost('tindak_lanjut'),
            'yang_menangani' => $this->request->getPost('yang_menangani'),
            'tanggal'        => $this->request->getPost('tanggal'),
            'ttd'            => $this->request->getPost('ttd') ?: null,
            'status'         => $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('tindak-lanjut'))
            ->with('success', 'Tindak lanjut berhasil diperbarui.');
    }

    // ════════════════════════════════════════
    // UPDATE STATUS AJAX
    // ════════════════════════════════════════
    public function updateStatus(int $id)
    {
        $status = $this->request->getPost('status');
        if (!in_array($status, ['proses', 'selesai'])) {
            return $this->response->setJSON(['success' => false]);
        }
        $this->tindakLanjutModel->update($id, ['status' => $status]);
        return $this->response->setJSON(['success' => true]);
    }

    // ════════════════════════════════════════
    // HAPUS
    // ════════════════════════════════════════
    public function hapus(int $id)
    {
        $tl = $this->tindakLanjutModel->find($id);
        if (!$tl) {
            return redirect()->to(base_url('tindak-lanjut'))->with('error', 'Data tidak ditemukan.');
        }
        $this->tindakLanjutModel->delete($id);
        return redirect()->to(base_url('tindak-lanjut'))
            ->with('success', 'Tindak lanjut berhasil dihapus.');
    }

    // ════════════════════════════════════════
    // EXPORT CSV
    // ════════════════════════════════════════
    public function export()
    {
        $list = $this->tindakLanjutModel->getAllWithSiswa();

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="tindak_lanjut_' . date('Ymd_His') . '.csv"');
        header('Pragma: no-cache');

        $out = fopen('php://output', 'w');
        fprintf($out, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($out, ['No', 'Tanggal', 'Nama Siswa', 'Kelas', 'Masalah', 'Tindak Lanjut', 'Yang Menangani', 'Status']);

        foreach ($list as $i => $row) {
            fputcsv($out, [
                $i + 1,
                $row['tanggal'],
                $row['nama_siswa'] ?? '-',
                $row['kelas'] ?? '-',
                $row['masalah'],
                $row['tindak_lanjut'],
                $row['yang_menangani'],
                ucfirst($row['status']),
            ]);
        }
        fclose($out);
        exit;
    }
}