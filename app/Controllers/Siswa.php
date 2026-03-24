<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\PelanggaranModel;

class Siswa extends BaseController
{
    protected $siswaModel;
    protected $pelanggaranModel;

    public function __construct()
    {
        $this->siswaModel       = new SiswaModel();
        $this->pelanggaranModel = new PelanggaranModel();
    }

    /**
     * Halaman daftar siswa
     */
    public function index()
    {
        $data['total_siswa']      = $this->siswaModel->countAll();
        $data['siswa_aktif']      = $this->siswaModel->countAll();
        $data['siswa_bermasalah'] = $this->siswaModel->getSiswaBermasalah();
        $data['siswa_baru']       = $this->siswaModel->like('kelas', 'X', 'after')->countAllResults();

        $data['list_siswa'] = $this->siswaModel
            ->select('siswa.*, COALESCE(SUM(p.poin),0) as total_poin')
            ->join('pelanggaran p', 'p.siswa_id = siswa.id', 'left')
            ->groupBy('siswa.id')
            ->orderBy('siswa.nama', 'ASC')
            ->paginate(12);

        $data['pager'] = $this->siswaModel->pager;

        return view('siswa/index', $data);
    }

    /**
     * Simpan data siswa baru
     */
    public function simpan()
    {
        $rules = [
            'nisn'    => 'required|min_length[8]|is_unique[siswa.nisn]',
            'nama'    => 'required|min_length[3]',
            'kelas'   => 'required',
            'jurusan' => 'required',
            'jk'      => 'required|in_list[L,P]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->siswaModel->save([
            'nisn'       => $this->request->getPost('nisn'),
            'nama'       => $this->request->getPost('nama'),
            'kelas'      => $this->request->getPost('kelas'),
            'jurusan'    => $this->request->getPost('jurusan'),
            'jk'         => $this->request->getPost('jk'),
            'ttl'        => $this->request->getPost('ttl'),
            'agama'      => $this->request->getPost('agama'),
            'no_hp_ortu' => $this->request->getPost('no_hp_ortu'),
            'alamat'     => $this->request->getPost('alamat'),
            'status'     => 'aktif',
        ]);

        return redirect()->to(base_url('siswa'))
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Detail siswa + riwayat pelanggaran
     */
    public function detail(int $id)
    {
        $data['siswa'] = $this->siswaModel->find($id);

        if (!$data['siswa']) {
            return redirect()->to(base_url('siswa'))
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        $data['pelanggaran'] = $this->pelanggaranModel
            ->where('siswa_id', $id)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $data['total_poin'] = array_sum(array_column($data['pelanggaran'], 'poin'));

        return view('siswa/detail', $data);
    }

    /**
     * Edit data siswa
     */
    public function edit(int $id)
    {
        $data['siswa'] = $this->siswaModel->find($id);

        if (!$data['siswa']) {
            return redirect()->to(base_url('siswa'))
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('siswa/edit', $data);
    }

    /**
     * Update data siswa
     */
    public function update(int $id)
    {
        $rules = [
            'nama'    => 'required|min_length[3]',
            'kelas'   => 'required',
            'jurusan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->siswaModel->update($id, [
            'nama'       => $this->request->getPost('nama'),
            'kelas'      => $this->request->getPost('kelas'),
            'jurusan'    => $this->request->getPost('jurusan'),
            'jk'         => $this->request->getPost('jk'),
            'no_hp_ortu' => $this->request->getPost('no_hp_ortu'),
            'alamat'     => $this->request->getPost('alamat'),
        ]);

        return redirect()->to(base_url('siswa'))
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Hapus data siswa
     */
    public function hapus(int $id)
    {
        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            return redirect()->to(base_url('siswa'))
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        $this->siswaModel->delete($id);

        return redirect()->to(base_url('siswa'))
            ->with('success', 'Data siswa berhasil dihapus.');
    }

    /**
     * Search siswa (AJAX)
     */
    public function search()
    {
        $q = $this->request->getGet('q');

        $result = $this->siswaModel
            ->like('nama', $q)
            ->orLike('nisn', $q)
            ->orLike('kelas', $q)
            ->limit(10)
            ->findAll();

        return $this->response->setJSON($result);
    }
}