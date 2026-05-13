<?php

namespace App\Controllers;

use App\Models\inventaris as InventarisModel;

class InventarisController extends BaseController
{
    public function inventaris()
    {
        $model = new \App\Models\inventaris();
        $data['list_alat'] = $model->findAll();
        return view('inventaris', $data);
    }

    public function tambah()
    {
        return view('tambah_alat');
    }

    public function simpan_alat()
    {
        $model = new \App\Models\inventaris();

        $fileFoto = $this->request->getFile('foto_barang');
        $namaFoto = null;

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/', $namaFoto);
        }

        $model->save([
            'nama_alat'   => $this->request->getPost('nama_alat'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'kondisi'     => $this->request->getPost('kondisi'),
            'kategori'    => $this->request->getPost('kategori'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'foto_barang' => $namaFoto
        ]);

        return redirect()->to('/inventaris')->with('success', 'Data berhasil disimpan!');
    }

    // ============ FITUR EDIT ============

    public function edit_inventaris($id)
{
    $model = new \App\Models\inventaris();
    $data['alat'] = $model->find($id);

    if (!$data['alat']) {
        return redirect()->to('/inventaris')->with('error', 'Data tidak ditemukan!');
    }

    // Kita kirim ke view yang sama dengan tambah barang
    return view('tambah_alat', $data);
}

    public function update_inventaris($id)
    {
        $model = new \App\Models\inventaris();
        $alatLama = $model->find($id);

        if (!$alatLama) {
            return redirect()->to('/inventaris')->with('error', 'Data tidak ditemukan!');
        }

        $fileFoto = $this->request->getFile('foto_barang');
        $namaFoto = $alatLama['foto_barang']; // Gunakan foto lama sebagai default

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            // Hapus foto lama jika ada
            if ($namaFoto && file_exists('uploads/' . $namaFoto)) {
                unlink('uploads/' . $namaFoto);
            }
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/', $namaFoto);
        }

        $model->update($id, [
            'nama_alat'   => $this->request->getPost('nama_alat'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'kondisi'     => $this->request->getPost('kondisi'),
            'kategori'    => $this->request->getPost('kategori'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'foto_barang' => $namaFoto
        ]);

        return redirect()->to('/inventaris')->with('success', 'Data berhasil diperbarui!');
    }

    // ====================================

    public function hapus_inventaris($id)
    {
        $model = new \App\Models\inventaris();
        $model->delete($id);
        return redirect()->to(base_url('/inventaris'))->with('success', 'Data inventaris berhasil dihapus');
    }
}