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
        $data['game'] = $this->robloxModel->findAll();
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
        
        // Ambil input baik dinamai 'pemain_aktif' maupun 'active_players'
        $pemain = $this->request->getPost('pemain_aktif') ?? $this->request->getPost('active_players') ?? 0;

        // Validasi Nama Game
        if (empty($nama)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Nama game tidak boleh kosong!']);
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