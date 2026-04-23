<?php

namespace App\Controllers;

use App\Models\JadwalKonselingModel;
use App\Models\SiswaModel;

class JadwalKonseling extends BaseController
{
    protected $jadwalModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalKonselingModel();
        $this->siswaModel  = new SiswaModel();
    }

    public function index()
    {
        $summary = $this->jadwalModel->getSummary();

        $data = [
            'title'   => 'Jadwal Konseling',
            'summary' => $summary,
            'stats'   => ['baru' => 0],
        ];

        return view('jadwal/index', $data);
    }

    // AJAX: ambil daftar siswa untuk dropdown
    public function getSiswa()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['message' => 'Forbidden']);
        }

        $siswa = $this->siswaModel
                      ->where('status', 'aktif')
                      ->orderBy('nama', 'ASC')
                      ->findAll();

        return $this->response->setJSON(['status' => 'ok', 'data' => $siswa]);
    }

    // AJAX: ambil semua jadwal dengan filter
    public function getData()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['message' => 'Forbidden']);
        }

        $filters = [
            'status' => $this->request->getGet('status'),
            'search' => $this->request->getGet('search'),
            'sort'   => $this->request->getGet('sort'),
        ];

        $list = $this->jadwalModel->getFiltered($filters);

        return $this->response->setJSON(['status' => 'ok', 'data' => $list]);
    }

    // AJAX: simpan jadwal baru
    public function simpan()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['message' => 'Forbidden']);
        }

        $input = $this->request->getJSON(true);

        $rules = [
            'siswa_id'  => 'required|is_natural_no_zero',
            'tanggal'   => 'required|valid_date[Y-m-d]',
            'jam_mulai' => 'required',
            'keperluan' => 'required|min_length[3]',
        ];

        if (!$this->validateData($input, $rules)) {
            return $this->response->setStatusCode(422)->setJSON([
                'status'  => 'error',
                'message' => 'Harap lengkapi semua field yang wajib diisi!',
                'errors'  => $this->validator->getErrors(),
            ]);
        }

        $this->jadwalModel->insert([
            'siswa_id'    => $input['siswa_id'],
            'tanggal'     => $input['tanggal'],
            'jam_mulai'   => $input['jam_mulai'],
            'jam_selesai' => $input['jam_selesai'] ?? null,
            'keperluan'   => trim($input['keperluan']),
            'status'      => $input['status'] ?? 'menunggu',
            'catatan'     => trim($input['catatan'] ?? ''),
        ]);

        return $this->response->setJSON([
            'status'  => 'ok',
            'message' => 'Jadwal konseling berhasil ditambahkan!',
        ]);
    }

    // AJAX: update jadwal
    public function update($id = null)
    {
        if (!$this->request->isAJAX() || !$id) {
            return $this->response->setStatusCode(403)->setJSON(['message' => 'Forbidden']);
        }

        $jadwal = $this->jadwalModel->find($id);
        if (!$jadwal) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
        }

        $input = $this->request->getJSON(true);

        $this->jadwalModel->update($id, [
            'siswa_id'    => $input['siswa_id'],
            'tanggal'     => $input['tanggal'],
            'jam_mulai'   => $input['jam_mulai'],
            'jam_selesai' => $input['jam_selesai'] ?? null,
            'keperluan'   => trim($input['keperluan']),
            'status'      => $input['status'] ?? 'menunggu',
            'catatan'     => trim($input['catatan'] ?? ''),
        ]);

        return $this->response->setJSON([
            'status'  => 'ok',
            'message' => 'Jadwal berhasil diperbarui!',
        ]);
    }

    // AJAX: hapus jadwal
    public function hapus($id = null)
    {
        if (!$this->request->isAJAX() || !$id) {
            return $this->response->setStatusCode(403)->setJSON(['message' => 'Forbidden']);
        }

        $jadwal = $this->jadwalModel->find($id);
        if (!$jadwal) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
        }

        $this->jadwalModel->delete($id);

        return $this->response->setJSON(['status' => 'ok', 'message' => 'Jadwal berhasil dihapus!']);
    }

    // AJAX: detail jadwal
    public function detail($id = null)
    {
        if (!$this->request->isAJAX() || !$id) {
            return $this->response->setStatusCode(403)->setJSON(['message' => 'Forbidden']);
        }

        $jadwal = $this->jadwalModel->getDetail($id);
        if (!$jadwal) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
        }

        return $this->response->setJSON(['status' => 'ok', 'data' => $jadwal]);
    }
}