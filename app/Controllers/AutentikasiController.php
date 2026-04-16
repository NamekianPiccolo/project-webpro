<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AutentikasiController extends BaseController
{
    public function index()
    {
        //
    }
    public function register_save()
{
    $userModel = new \App\Models\User();

    $data = [
        'nim'          => $this->request->getPost('nim'),
        'nama_lengkap' => $this->request->getPost('nama_lengkap'),
        'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    ];

    $userModel->save($data); // Perintah sakti untuk simpan ke database

    return redirect()->to(base_url('/login'))->with('success', 'Registrasi berhasil!');
}
    public function login_auth()
{
    $userModel = new \App\Models\User();
    $nim = $this->request->getPost('nim');
    $password = $this->request->getPost('password');

    // Cari user berdasarkan NIM
    $user = $userModel->where('nim', $nim)->first();

    if ($user) {
        // Cek apakah password cocok
        if (password_verify($password, $user['password'])) {
            session()->set(['isLoggedIn' => true, 'nama' => $user['username']]);
            return redirect()->to(base_url('/'));
        }
    }

    return redirect()->to(base_url('/login'))->with('error', 'NIM atau Password salah!');
}
}
