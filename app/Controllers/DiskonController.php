<?php

namespace App\Controllers;

use App\Models\DiskonModel;
use CodeIgniter\Controller;

class DiskonController extends BaseController
{
    protected $diskonModel;

    public function __construct()
    {
        $this->diskonModel = new DiskonModel();
    }

    // Middleware manual untuk cek role
    private function checkAdmin()
    {
        if (session()->get('role') !== 'admin') {
            // Redirect ke halaman lain jika bukan admin
            return redirect()->to('/')->with('failed', 'Akses hanya untuk admin.');
        }
    }

    public function index()
    {
        $adminCheck = $this->checkAdmin();
        if ($adminCheck)
            return $adminCheck;

        $data['diskon'] = $this->diskonModel->findAll();
        return view('v_diskon', $data);
    }

    public function store()
    {
        $adminCheck = $this->checkAdmin();
        if ($adminCheck)
            return $adminCheck;

        $rules = [
            'tanggal' => 'required|is_unique[diskon.tanggal]',
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('failed', 'Validasi gagal. Tanggal tidak boleh sama dan nominal harus angka.');
        }

        $this->diskonModel->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil ditambahkan.');
    }

    public function update($id)
    {
        $adminCheck = $this->checkAdmin();
        if ($adminCheck)
            return $adminCheck;

        $rules = [
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('failed', 'Nominal harus angka.');
        }

        $this->diskonModel->update($id, [
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil diperbarui.');
    }

    public function delete($id)
    {
        $adminCheck = $this->checkAdmin();
        if ($adminCheck)
            return $adminCheck;

        $this->diskonModel->delete($id);
        return redirect()->to('/diskon')->with('success', 'Diskon berhasil dihapus.');
    }
}
