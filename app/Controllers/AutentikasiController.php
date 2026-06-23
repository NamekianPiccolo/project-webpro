<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AutentikasiController extends BaseController
{
    public function index()
    {
        return redirect()->to(base_url('/login'));
    }

    public function register_save()
    {
        $userModel = new \App\Models\User();

        $data = [
            'nim'      => $this->request->getPost('nim'),
            'username' => $this->request->getPost('username'), // Pastikan ini sesuai field di DB Anda
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'customer', // Set default setiap pendaftar baru adalah customer
        ];

        $userModel->save($data);

        return redirect()->to(base_url('/login'))->with('success', 'Registrasi berhasil!');
    }

    public function login_auth()
    {
        $userModel = new \App\Models\User();
        $nim = $this->request->getPost('nim');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan NIM atau Username
        $user = $userModel->groupStart()
                          ->where('nim', $nim)
                          ->orWhere('username', $nim)
                          ->groupEnd()
                          ->first();

        if ($user) {
            // Cek apakah password cocok
            if (password_verify($password, $user['password'])) {
                
                // --- TAMBAHKAN SESSION DI SINI ---
                session()->set([
                    'isLoggedIn' => true,
                    'nim'        => $user['nim'],
                    'nama'       => $user['username'], // Mengambil username dari DB
                    'role'       => $user['role'],     // MENYIMPAN ROLE (admin/customer)
                ]);
                // ---------------------------------

                return redirect()->to(base_url('/'));
            }
        }

        return redirect()->to(base_url('/login'))->with('error', 'NIM atau Password salah!');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}