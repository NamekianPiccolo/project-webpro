<?php

namespace App\Controllers;

use App\Models\Kategori as KategoriModel;

/**
 * ============================================================
 * KategoriController
 * ------------------------------------------------------------
 * Mengelola seluruh operasi CRUD untuk data Kategori Barang.
 * 
 * Struktur Method:
 *   1. INDEX   — Menampilkan daftar kategori
 *   2. CREATE  — Menampilkan form tambah kategori baru
 *   3. STORE   — Menyimpan data kategori baru ke database
 *   4. EDIT    — Menampilkan form edit kategori
 *   5. UPDATE  — Memperbarui data kategori di database
 *   6. DELETE  — Menghapus data kategori dari database
 * ============================================================
 */
class KategoriController extends BaseController
{
    /** @var KategoriModel */
    protected $kategoriModel;

    /**
     * Constructor — Inisialisasi model yang digunakan.
     */
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  1. INDEX — Menampilkan Daftar Kategori                 ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menampilkan halaman daftar semua kategori barang.
     *
     * @return string
     */
    public function kategori()
    {
        $data = [
            'kategori' => $this->kategoriModel->findAll(),
        ];

        return view('kategori/index', $data);
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  2. CREATE — Menampilkan Form Tambah Kategori Baru      ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menampilkan halaman form untuk menambahkan kategori baru.
     *
     * @return string
     */
    public function tambah_kategori()
    {
        return view('kategori/tambah');
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  3. STORE — Menyimpan Data Kategori Baru ke Database    ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Memproses penyimpanan data kategori baru dari form tambah.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function simpan_kategori()
    {
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'kode'          => $this->request->getPost('kode'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'status'        => $this->request->getPost('status'),
        ];

        if ($this->kategoriModel->insert($data)) {
            return redirect()->to('/kategori')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->withInput();
        }
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  4. EDIT — Menampilkan Form Edit Kategori               ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menampilkan halaman form edit untuk kategori yang sudah ada.
     * Menggunakan view khusus edit_kategori.php.
     *
     * @param int $id ID kategori yang akan diedit
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function edit_kategori($id)
    {
        $ktgr = $this->kategoriModel->find($id);

        if (!$ktgr) {
            return redirect()->to('/kategori')->with('error', 'Data tidak ditemukan!');
        }

        $data = [
            'ktgr' => $ktgr,
        ];

        return view('kategori/edit', $data);
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  5. UPDATE — Memperbarui Data Kategori di Database      ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Memproses pembaruan data kategori dari form edit.
     *
     * @param int $id ID kategori yang akan diperbarui
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function update_kategori($id)
    {
        if (!$this->kategoriModel->find($id)) {
            return redirect()->to('/kategori')->with('error', 'Data tidak ditemukan!');
        }

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'kode'          => $this->request->getPost('kode'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'status'        => $this->request->getPost('status'),
        ];

        if ($this->kategoriModel->update($id, $data)) {
            return redirect()->to('/kategori')->with('success', 'Data berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data!');
        }
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  6. DELETE — Menghapus Data Kategori dari Database       ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menghapus data kategori berdasarkan ID.
     *
     * @param int $id ID kategori yang akan dihapus
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function hapus_kategori($id)
    {
        $this->kategoriModel->delete($id);

        return redirect()->to(base_url('/kategori'))->with('success', 'Data kategori berhasil dihapus');
    }
}