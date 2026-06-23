<?php

namespace App\Controllers;

use App\Models\Inventaris as InventarisModel;
use App\Models\Kategori as KategoriModel;

/**
 * ============================================================
 * InventarisController
 * ------------------------------------------------------------
 * Mengelola seluruh operasi CRUD untuk data Inventaris Barang.
 * 
 * Struktur Method:
 *   1. INDEX   — Menampilkan daftar barang (+ search & filter)
 *   2. CREATE  — Menampilkan form tambah barang baru
 *   3. STORE   — Menyimpan data barang baru ke database
 *   4. EDIT    — Menampilkan form edit barang yang sudah ada
 *   5. UPDATE  — Memperbarui data barang di database
 *   6. DELETE  — Menghapus data barang dari database
 * ============================================================
 */
class InventarisController extends BaseController
{
    /** @var InventarisModel */
    protected $inventarisModel;

    /** @var KategoriModel */
    protected $kategoriModel;

    /**
     * Constructor — Inisialisasi model yang digunakan.
     */
    public function __construct()
    {
        $this->inventarisModel = new InventarisModel();
        $this->kategoriModel   = new KategoriModel();
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  1. INDEX — Menampilkan Daftar Barang Inventaris        ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menampilkan halaman daftar inventaris barang.
     * Mendukung fitur pencarian (search) dan filter berdasarkan kategori.
     *
     * @return string
     */
    public function inventaris()
    {
        $search   = $this->request->getGet('search');
        $kategori = $this->request->getGet('kategori');

        $query = $this->inventarisModel;

        if (!empty($search)) {
            $query = $query->like('nama_alat', $search);
        }

        if (!empty($kategori)) {
            $query = $query->where('kategori', $kategori);
        }

        $data = [
            'list_alat'         => $query->findAll(),
            'kategori_list'     => $this->kategoriModel->findAll(),
            'search'            => $search,
            'kategori_selected' => $kategori,
        ];

        return view('inventaris/index', $data);
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  2. CREATE — Menampilkan Form Tambah Barang Baru        ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menampilkan halaman form untuk menambahkan alat/barang baru.
     * Mengambil daftar kategori dari database untuk dropdown.
     *
     * @return string
     */
    public function tambah()
    {
        $data = [
            'kategori_list' => $this->kategoriModel->findAll(),
        ];

        return view('inventaris/tambah', $data);
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  3. STORE — Menyimpan Data Barang Baru ke Database      ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Memproses penyimpanan data barang baru dari form tambah.
     * Menangani upload file foto barang jika tersedia.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function simpan_alat()
    {
        // Proses upload foto
        $fileFoto = $this->request->getFile('foto_barang');
        $namaFoto = null;

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/', $namaFoto);
        }

        // Simpan data ke database
        $this->inventarisModel->save([
            'nama_alat'   => $this->request->getPost('nama_alat'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'kondisi'     => $this->request->getPost('kondisi'),
            'kategori'    => $this->request->getPost('kategori'),
            'foto_barang' => $namaFoto,
        ]);

        return redirect()->to('/inventaris')->with('success', 'Data berhasil disimpan!');
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  4. EDIT — Menampilkan Form Edit Barang                 ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menampilkan halaman form edit untuk barang yang sudah ada.
     * Menggunakan view khusus edit_alat.php.
     *
     * @param int $id ID barang yang akan diedit
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function edit_inventaris($id)
    {
        $alat = $this->inventarisModel->find($id);

        if (!$alat) {
            return redirect()->to('/inventaris')->with('error', 'Data tidak ditemukan!');
        }

        $data = [
            'alat'          => $alat,
            'kategori_list' => $this->kategoriModel->findAll(),
        ];

        return view('inventaris/edit', $data);
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  5. UPDATE — Memperbarui Data Barang di Database        ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Memproses pembaruan data barang dari form edit.
     * Jika ada foto baru, foto lama akan dihapus dan diganti.
     *
     * @param int $id ID barang yang akan diperbarui
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function update_inventaris($id)
    {
        $alatLama = $this->inventarisModel->find($id);

        if (!$alatLama) {
            return redirect()->to('/inventaris')->with('error', 'Data tidak ditemukan!');
        }

        // Proses upload foto baru (jika ada)
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

        // Update data di database
        $this->inventarisModel->update($id, [
            'nama_alat'   => $this->request->getPost('nama_alat'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'kondisi'     => $this->request->getPost('kondisi'),
            'kategori'    => $this->request->getPost('kategori'),
            'foto_barang' => $namaFoto,
        ]);

        return redirect()->to('/inventaris')->with('success', 'Data berhasil diperbarui!');
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  6. DELETE — Menghapus Data Barang dari Database         ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menghapus data barang berdasarkan ID.
     *
     * @param int $id ID barang yang akan dihapus
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function hapus_inventaris($id)
    {
        $this->inventarisModel->delete($id);

        return redirect()->to(base_url('/inventaris'))->with('success', 'Data inventaris berhasil dihapus');
    }
}