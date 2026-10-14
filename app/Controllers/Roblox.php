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
        $this->robloxModel->save([
            'nama_game'      => $this->request->getPost('nama_game'),
            'genre'          => $this->request->getPost('genre'),
            'developer'      => $this->request->getPost('developer'),
            'active_players' => $this->request->getPost('active_players')
        ]);

        return redirect()->to('/roblox');
    }

    public function edit($id)
    {
        $data['game'] = $this->robloxModel->find($id);
        return view('roblox/edit', $data);
    }

    public function update($id)
    {
        $this->robloxModel->update($id, [
            'nama_game'      => $this->request->getPost('nama_game'),
            'genre'          => $this->request->getPost('genre'),
            'developer'      => $this->request->getPost('developer'),
            'active_players' => $this->request->getPost('active_players')
        ]);

        return redirect()->to('/roblox');
    }

    public function delete($id)
    {
        $this->robloxModel->delete($id);
        return redirect()->to('/roblox');
    }
}