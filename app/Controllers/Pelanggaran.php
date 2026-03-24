<?php

namespace App\Controllers;

use App\Models\PelanggaranModel;
use App\Models\SiswaModel;

class Pelanggaran extends BaseController
{
    protected $pelanggaranModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->pelanggaranModel = new PelanggaranModel();
        $this->siswaModel       = new SiswaModel();
    }

    // ══════════════════════════════════════════
    //  INDEX — Tampilkan daftar pelanggaran
    // ══════════════════════════════════════════
public function index()
{
    $tab    = $this->request->getGet('tab')      ?? 'semua';
    $q      = $this->request->getGet('q')        ?? '';
    $kat    = $this->request->getGet('kategori') ?? '';
    $kelas  = $this->request->getGet('kelas')    ?? '';
    $guru   = $this->request->getGet('guru')     ?? '';

    $data['tab_aktif'] = $tab;
    $data['filter']    = [
        'q'        => $q,
        'kategori' => $kat,
        'kelas'    => $kelas,
        'guru'     => $guru,
    ];

    $data['stats'] = [
        'total'    => $this->pelanggaranModel->countAll(),
        'baru'     => $this->_count('baru'),
        'proses'   => $this->_count('proses'),
        'diproses' => $this->_count('diproses'),
    ];

    // Build query dengan filter
    $builder = $this->pelanggaranModel
        ->select('pelanggaran.*, siswa.nama as nama_siswa, siswa.kelas, siswa.nisn, u.nama as nama_konselor')
        ->join('siswa', 'siswa.id = pelanggaran.siswa_id', 'left')
        ->join('users u', 'u.id = pelanggaran.konselor_id', 'left');

    // Filter tab
    if ($tab !== 'semua') {
        $builder->where('pelanggaran.status', $tab);
    }

    // Filter pencarian nama / jenis
    if (!empty($q)) {
        $builder->groupStart()
            ->like('siswa.nama', $q)
            ->orLike('pelanggaran.jenis_pelanggaran', $q)
            ->groupEnd();
    }

    // Filter kategori
    if (!empty($kat)) {
        $builder->where('pelanggaran.kategori', $kat);
    }

    // Filter kelas
    if (!empty($kelas)) {
        $builder->like('siswa.kelas', $kelas, 'after');
    }

    // Filter guru BK
    if (!empty($guru)) {
        $builder->where('pelanggaran.konselor_id', $guru);
    }

    $data['list_pelanggaran'] = $builder
        ->orderBy('pelanggaran.created_at', 'DESC')
        ->findAll();

    $data['listSiswa'] = $this->siswaModel
        ->select('id, nisn, nama, kelas')
        ->orderBy('nama', 'ASC')
        ->findAll();

    return view('pelanggaran/index', $data);
}

    // ══════════════════════════════════════════
    //  SIMPAN — Tambah pelanggaran baru
    // ══════════════════════════════════════════
    public function simpan()
    {
        $rules = [
            'siswa_id'          => 'required|integer',
            'jenis_pelanggaran' => 'required|min_length[3]',
            'tanggal_kejadian'  => 'required|valid_date',
            'poin'              => 'required|integer|greater_than[0]|less_than_equal_to[100]',
            'kategori'          => 'required|in_list[ringan,sedang,berat]',
            'status'            => 'required|in_list[baru,proses,diproses]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Data tidak valid: ' . implode(', ', $this->validator->getErrors()));
        }

        $this->pelanggaranModel->insert([
            'siswa_id'          => $this->request->getPost('siswa_id'),
            'konselor_id'       => $this->request->getPost('konselor_id'),
            'jenis_pelanggaran' => $this->request->getPost('jenis_pelanggaran'),
            'kategori'          => $this->request->getPost('kategori'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'lokasi'            => $this->request->getPost('lokasi'),
            'tanggal_kejadian'  => $this->request->getPost('tanggal_kejadian'),
            'poin'              => (int) $this->request->getPost('poin'),
            'status'            => $this->request->getPost('status'),
            'notif_ortu'        => (int) $this->request->getPost('notif_ortu'),
        ]);

        return redirect()->to(base_url('pelanggaran?tab=semua'))
            ->with('success', '✅ Data pelanggaran berhasil ditambahkan.');
    }

    // ══════════════════════════════════════════
    //  DETAIL — Ambil 1 data (JSON untuk AJAX)
    // ══════════════════════════════════════════
    public function detail(int $id)
    {
        $row = $this->pelanggaranModel
            ->select('pelanggaran.*, siswa.nama as nama_siswa, siswa.kelas, siswa.nisn, u.nama as nama_konselor')
            ->join('siswa', 'siswa.id = pelanggaran.siswa_id', 'left')
            ->join('users u', 'u.id = pelanggaran.konselor_id', 'left')
            ->where('pelanggaran.id', $id)
            ->first();

        if (!$row) {
            return $this->response->setStatusCode(404)
                ->setJSON(['error' => 'Data tidak ditemukan']);
        }

        return $this->response->setJSON($row);
    }

    // ══════════════════════════════════════════
    //  UPDATE — Edit data pelanggaran
    // ══════════════════════════════════════════
    public function update(int $id)
    {
        $row = $this->pelanggaranModel->find($id);
        if (!$row) {
            return redirect()->to(base_url('pelanggaran'))
                ->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'jenis_pelanggaran' => 'required|min_length[3]',
            'tanggal_kejadian'  => 'required|valid_date',
            'poin'              => 'required|integer|greater_than[0]|less_than_equal_to[100]',
            'kategori'          => 'required|in_list[ringan,sedang,berat]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Data tidak valid: ' . implode(', ', $this->validator->getErrors()));
        }

        $this->pelanggaranModel->update($id, [
            'jenis_pelanggaran' => $this->request->getPost('jenis_pelanggaran'),
            'kategori'          => $this->request->getPost('kategori'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'lokasi'            => $this->request->getPost('lokasi'),
            'tanggal_kejadian'  => $this->request->getPost('tanggal_kejadian'),
            'poin'              => (int) $this->request->getPost('poin'),
            'status'            => $this->request->getPost('status'),
            'notif_ortu'        => (int) $this->request->getPost('notif_ortu'),
        ]);

        return redirect()->to(base_url('pelanggaran'))
            ->with('success', '✅ Data pelanggaran berhasil diperbarui.');
    }

    // ══════════════════════════════════════════
    //  STATUS — Update status saja
    // ══════════════════════════════════════════
    public function status(int $id)
    {
        $row = $this->pelanggaranModel->find($id);
        if (!$row) {
            return redirect()->to(base_url('pelanggaran'))
                ->with('error', 'Data tidak ditemukan.');
        }

        $status = $this->request->getPost('status');
        if (!in_array($status, ['baru', 'proses', 'diproses'])) {
            return redirect()->to(base_url('pelanggaran'))
                ->with('error', 'Status tidak valid.');
        }

        $this->pelanggaranModel->update($id, ['status' => $status]);

        $label = ['baru' => 'Baru Masuk', 'proses' => 'Dalam Proses', 'diproses' => 'Sudah Diproses'];

        return redirect()->to(base_url('pelanggaran'))
            ->with('success', '✅ Status berhasil diubah menjadi "'.$label[$status].'".');
    }

    // ══════════════════════════════════════════
    //  HAPUS — Hapus data pelanggaran
    // ══════════════════════════════════════════
    public function hapus(int $id)
    {
        $row = $this->pelanggaranModel->find($id);
        if (!$row) {
            return redirect()->to(base_url('pelanggaran'))
                ->with('error', 'Data tidak ditemukan.');
        }

        $this->pelanggaranModel->delete($id);

        return redirect()->to(base_url('pelanggaran'))
            ->with('success', '🗑️ Data pelanggaran berhasil dihapus.');
    }

    // ══════════════════════════════════════════
    //  HELPER — Hitung berdasar status
    // ══════════════════════════════════════════
    private function _count(string $status): int
    {
        return $this->pelanggaranModel
            ->where('status', $status)
            ->countAllResults();
    }
}