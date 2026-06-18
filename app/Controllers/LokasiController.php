<?php

namespace App\Controllers;

use App\Models\Createlokasi as LokasiModel;

/**
 * ============================================================
 * LokasiController
 * ------------------------------------------------------------
 * Mengelola seluruh operasi CRUD untuk data Lokasi Penyimpanan.
 * 
 * Struktur Method:
 *   1. INDEX   — Menampilkan daftar lokasi penyimpanan
 *   2. CREATE  — Menampilkan form tambah lokasi baru
 *   3. STORE   — Menyimpan data lokasi baru ke database
 *   4. EDIT    — Menampilkan form edit lokasi
 *   5. UPDATE  — Memperbarui data lokasi di database
 *   6. DELETE  — Menghapus data lokasi dari database
 * ============================================================
 */
class LokasiController extends BaseController
{
    /** @var LokasiModel */
    protected $lokasiModel;

    /**
     * Constructor — Inisialisasi model yang digunakan.
     */
    public function __construct()
    {
        $this->lokasiModel = new LokasiModel();
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  1. INDEX — Menampilkan Daftar Lokasi Penyimpanan       ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menampilkan halaman daftar semua lokasi penyimpanan.
     *
     * @return string
     */
    public function lokasi()
    {
        $data = [
            'lokasi' => $this->lokasiModel->findAll(),
        ];

        return view('lokasi', $data);
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  2. CREATE — Menampilkan Form Tambah Lokasi Baru        ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menampilkan halaman form untuk menambahkan lokasi baru.
     *
     * @return string
     */
    public function tambah_lokasi()
    {
        return view('tambah_lokasi');
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  3. STORE — Menyimpan Data Lokasi Baru ke Database      ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Memproses penyimpanan data lokasi baru dari form tambah.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function simpan_lokasi()
    {
        $data = [
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'keterangan'  => $this->request->getPost('keterangan'),
        ];

        if ($this->lokasiModel->insert($data)) {
            return redirect()->to('/lokasi')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->withInput();
        }
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  4. EDIT — Menampilkan Form Edit Lokasi                 ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menampilkan halaman form edit untuk lokasi yang sudah ada.
     * Menggunakan view khusus edit_lokasi.php.
     *
     * @param int $id ID lokasi yang akan diedit
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function edit_lokasi($id)
    {
        $lokasi_data = $this->lokasiModel->find($id);

        if (!$lokasi_data) {
            return redirect()->to('/lokasi')->with('error', 'Data tidak ditemukan!');
        }

        $data = [
            'lokasi_data' => $lokasi_data,
        ];

        return view('edit_lokasi', $data);
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  5. UPDATE — Memperbarui Data Lokasi di Database        ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Memproses pembaruan data lokasi dari form edit.
     *
     * @param int $id ID lokasi yang akan diperbarui
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function update_lokasi($id)
    {
        $data = [
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'keterangan'  => $this->request->getPost('keterangan'),
        ];

        if ($this->lokasiModel->update($id, $data)) {
            return redirect()->to('/lokasi')->with('success', 'Data berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data!');
        }
    }

    // ╔══════════════════════════════════════════════════════════╗
    // ║  6. DELETE — Menghapus Data Lokasi dari Database         ║
    // ╚══════════════════════════════════════════════════════════╝

    /**
     * Menghapus data lokasi berdasarkan ID.
     *
     * @param int $id ID lokasi yang akan dihapus
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function hapus_lokasi($id)
    {
        $this->lokasiModel->delete($id);

        return redirect()->to(base_url('/lokasi'))->with('success', 'Data lokasi berhasil dihapus');
    }
}