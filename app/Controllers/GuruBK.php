<?php

namespace App\Controllers;

use App\Models\GuruBKModel;

class GuruBK extends BaseController
{
    protected $guruBKModel;

    public function __construct()
    {
        $this->guruBKModel = new GuruBKModel();
    }

    // ══════════════════════════════════════════
    //  INDEX — Tampilkan daftar guru BK
    // ══════════════════════════════════════════
    public function index()
    {
        $q      = $this->request->getGet('q')      ?? '';
        $status = $this->request->getGet('status') ?? '';

        $builder = $this->guruBKModel;

        if (!empty($q)) {
            $builder = $builder->groupStart()
                ->like('nama', $q)
                ->orLike('nip', $q)
                ->orLike('email', $q)
                ->groupEnd();
        }

        if (!empty($status)) {
            $builder = $builder->where('status', $status);
        }

        $data = [
            'title'     => 'Data Guru BK',
            'listGuru'  => $builder->orderBy('nama', 'ASC')->findAll(),
            'filter'    => ['q' => $q, 'status' => $status],
            'stats'     => [
                'total'       => $this->guruBKModel->countAll(),
                'aktif'       => $this->guruBKModel->where('status', 'aktif')->countAllResults(),
                'tidak_aktif' => $this->guruBKModel->where('status', 'tidak aktif')->countAllResults(),
            ],
        ];

        return view('guru-bk/index', $data);
    }

    // ══════════════════════════════════════════
    //  SIMPAN — Tambah guru BK baru
    // ══════════════════════════════════════════
    public function simpan()
    {
        $rules = [
            'nip'   => 'required|min_length[5]|is_unique[guru_bk.nip]',
            'nama'  => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[guru_bk.email]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Data tidak valid: ' . implode(', ', $this->validator->getErrors()));
        }

        $this->guruBKModel->insert([
            'nip'            => $this->request->getPost('nip'),
            'nama'           => $this->request->getPost('nama'),
            'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
            'no_hp'          => $this->request->getPost('no_hp'),
            'email'          => $this->request->getPost('email'),
            'kelas_pengampu' => $this->request->getPost('kelas_pengampu'),
            'status'         => $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('guru-bk'))
            ->with('success', '✅ Data guru BK berhasil ditambahkan.');
    }

    // ══════════════════════════════════════════
    //  DETAIL — Ambil 1 data (JSON untuk AJAX)
    // ══════════════════════════════════════════
    public function detail(int $id)
    {
        $row = $this->guruBKModel->find($id);

        if (!$row) {
            return $this->response->setStatusCode(404)
                ->setJSON(['error' => 'Data tidak ditemukan']);
        }

        return $this->response->setJSON($row);
    }

    // ══════════════════════════════════════════
    //  UPDATE — Edit data guru BK
    // ══════════════════════════════════════════
    public function update(int $id)
    {
        $row = $this->guruBKModel->find($id);
        if (!$row) {
            return redirect()->to(base_url('guru-bk'))
                ->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'nip'   => "required|min_length[5]|is_unique[guru_bk.nip,id,{$id}]",
            'nama'  => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[guru_bk.email,id,{$id}]",
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Data tidak valid: ' . implode(', ', $this->validator->getErrors()));
        }

        $this->guruBKModel->update($id, [
            'nip'            => $this->request->getPost('nip'),
            'nama'           => $this->request->getPost('nama'),
            'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
            'no_hp'          => $this->request->getPost('no_hp'),
            'email'          => $this->request->getPost('email'),
            'kelas_pengampu' => $this->request->getPost('kelas_pengampu'),
            'status'         => $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('guru-bk'))
            ->with('success', '✅ Data guru BK berhasil diperbarui.');
    }

    // ══════════════════════════════════════════
    //  HAPUS — Hapus data guru BK
    // ══════════════════════════════════════════
    public function hapus(int $id)
    {
        $row = $this->guruBKModel->find($id);
        if (!$row) {
            return redirect()->to(base_url('guru-bk'))
                ->with('error', 'Data tidak ditemukan.');
        }

        $this->guruBKModel->delete($id);

        return redirect()->to(base_url('guru-bk'))
            ->with('success', '🗑️ Data guru BK berhasil dihapus.');
    }
}