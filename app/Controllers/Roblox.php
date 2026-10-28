<?php

namespace App\Controllers;

use App\Models\RobloxModel;

class Roblox extends BaseController
{
    protected $robloxModel;

    public function __construct()
    {
        $this->robloxModel = new RobloxModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $data['game'] = $this->robloxModel
                                 ->like('nama_game', $keyword)
                                 ->orLike('genre', $keyword)
                                 ->orLike('developer', $keyword)
                                 ->findAll();
        } else {
            $data['game'] = $this->robloxModel->findAll();
        }

        return view('roblox/index', $data);
    }

    public function create()
    {
        return view('roblox/create');
    }

    public function store()
    {
        $nama   = $this->request->getPost('nama_game');
        $genre  = $this->request->getPost('genre');
        $dev    = $this->request->getPost('developer');
        $pemain = $this->request->getPost('pemain_aktif') ?? $this->request->getPost('active_players') ?? 0;

        // Validasi 1: Nama Game Wajib Ada & Diawali Huruf
        if (empty($nama)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Nama game tidak boleh kosong!']);
            }
            return redirect()->back()->withInput();
        } else if (!preg_match('/^[a-zA-Z]/', $nama)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Nama game harus diawali dengan huruf!']);
            }
            return redirect()->back()->withInput();
        }

        // VALIDASI BARU: Cek Duplikasi Nama Game di Database MySQL
        $existingGame = $this->robloxModel->where('nama_game', $nama)->first();
        if ($existingGame) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['status' => 'error', 'message' => "Nama game '{$nama}' sudah ada di database!"]);
            }
            return redirect()->back()->withInput()->with('error', "Nama game '{$nama}' sudah ada di database!");
        }

        // Validasi 2: Genre Wajib Ada & Hanya Boleh Huruf/Spasi
        if (empty($genre) || !preg_match('/^[a-zA-Z\s]+$/', $genre)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Genre hanya boleh berisi huruf!']);
            }
            return redirect()->back()->withInput();
        }

        // Validasi 3: Developer Wajib Ada & Diawali Huruf
        if (empty($dev)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Developer tidak boleh kosong!']);
            }
            return redirect()->back()->withInput();
        } else if (!preg_match('/^[a-zA-Z]/', $dev)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Nama developer harus diawali dengan huruf!']);
            }
            return redirect()->back()->withInput();
        }

        // Simpan ke Database MySQL
        $this->robloxModel->save([
            'nama_game'      => $nama,
            'genre'          => $genre,
            'developer'      => $dev,
            'active_players' => (int)$pemain
        ]);

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status'  => 'success', 
                'message' => "Sukses: Data game '{$nama}' berhasil disimpan ke Database!"
            ]);
        }

        return redirect()->to('/roblox');
    }

    public function edit($id)
    {
        $data['game'] = $this->robloxModel->find($id);
        return view('roblox/edit', $data);
    }

    public function update($id)
    {
        $pemain = $this->request->getPost('pemain_aktif') ?? $this->request->getPost('active_players') ?? 0;

        $this->robloxModel->update($id, [
            'nama_game'      => $this->request->getPost('nama_game'),
            'genre'          => $this->request->getPost('genre'),
            'developer'      => $this->request->getPost('developer'),
            'active_players' => (int)$pemain
        ]);

        return redirect()->to('/roblox');
    }

    public function delete($id)
    {
        $this->robloxModel->delete($id);
        return redirect()->to('/roblox');
    }
}