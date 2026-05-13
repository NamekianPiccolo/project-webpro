<?php

namespace App\Controllers;

class KategoriController extends BaseController
{
    public function kategori()
    {
        $model = new \App\Models\Kategori();
        $data['kategori'] = $model->findAll();
        return view('kategori', $data);
    }

    public function tambah_kategori()
    {
        return view('tambah_kategori');
    }

    public function simpan_kategori()
    {
        $model = new \App\Models\Kategori();

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'kode'          => $this->request->getPost('kode'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'status'        => $this->request->getPost('status'),
        ];

        if ($model->insert($data)) {
            return redirect()->to('/kategori')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->withInput();
        }
    }

    // ============ FITUR EDIT ============

    public function edit_kategori($id)
{
    $model = new \App\Models\Kategori();
    // Kita simpan di index 'ktgr' agar tidak bentrok dengan list
    $data['ktgr'] = $model->find($id); 

    if (!$data['ktgr']) {
        return redirect()->to('/kategori')->with('error', 'Data tidak ditemukan!');
    }

    // Arahkan ke view tambah_kategori, bukan edit_kategori
    return view('tambah_kategori', $data);
}

    public function update_kategori($id)
    {
        $model = new \App\Models\Kategori();

        if (!$model->find($id)) {
            return redirect()->to('/kategori')->with('error', 'Data tidak ditemukan!');
        }

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'kode'          => $this->request->getPost('kode'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'status'        => $this->request->getPost('status'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/kategori')->with('success', 'Data berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data!');
        }
    }

    // ====================================

    public function hapus_kategori($id)
    {
        $model = new \App\Models\Kategori();
        $model->delete($id);
        return redirect()->to(base_url('/kategori'))->with('success', 'Data kategori berhasil dihapus');
    }
}