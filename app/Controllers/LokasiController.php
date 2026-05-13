<?php

namespace App\Controllers;

class LokasiController extends BaseController
{
    public function lokasi()
    {
        $model = new \App\Models\Createlokasi();
        $data['lokasi'] = $model->findAll();
        return view('lokasi', $data);
    }

    public function tambah_lokasi()
    {
        return view('tambah_lokasi');
    }

    public function simpan_lokasi()
    {
        $model = new \App\Models\Createlokasi();
        $data = [
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'keterangan'  => $this->request->getPost('keterangan'),
        ];

        if ($model->insert($data)) {
            return redirect()->to('/lokasi')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->withInput();
        }
    }

    // ============ FITUR EDIT ============

    public function edit_lokasi($id)
    {
        $model = new \App\Models\Createlokasi();
        // Gunakan nama index 'lokasi_data' agar unik di view
        $data['lokasi_data'] = $model->find($id);

        if (!$data['lokasi_data']) {
            return redirect()->to('/lokasi')->with('error', 'Data tidak ditemukan!');
        }

        // Kembali ke view tambah_lokasi
        return view('tambah_lokasi', $data);
    }

    public function update_lokasi($id)
    {
        $model = new \App\Models\Createlokasi();
        $data = [
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'keterangan'  => $this->request->getPost('keterangan'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/lokasi')->with('success', 'Data berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data!');
        }
    }

    public function hapus_lokasi($id)
    {
        $model = new \App\Models\Createlokasi();
        $model->delete($id);
        return redirect()->to(base_url('/lokasi'))->with('success', 'Data lokasi berhasil dihapus');
    }
}