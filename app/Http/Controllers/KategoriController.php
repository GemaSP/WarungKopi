<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Mengambil semua data kategori dari database dan mengurutkannya berdasarkan id secara ascending
        $kategori = Kategori::orderBy('id', 'asc')->get();

        // Menampilkan view 'backend.v_kategori.index' dengan mengirimkan data judul, user, dan kategori
        // ke dalam view tersebut
        // View ini akan menampilkan daftar kategori yang ada di dalam database
        return view('backend.v_kategori.index', [
            'judul' => 'Kategori',
            'user' => $user,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $kategori = $request->validate(
            // Membuat aturan validasi untuk input nama_kategori
            [
                'nama_kategori' => 'required|string|max:255|unique:kategori',
            ],
            // Pesan kesalahan yang ditampilkan jika validasi gagal
            [
                'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
                'nama_kategori.unique' => 'Nama kategori sudah ada',
            ]
        );

        // Simpan data kategori yg telah di validasi ke dalam database
        Kategori::create($kategori);
        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->route('backend.kategori.index')->with('success', 'Kategori dengan nama ' . $request->input('nama_kategori') . ' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = $request->validate(
            [
                'nama_kategori' => 'required|string|unique:kategori',
            ],
            [
                'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
                'nama_kategori.unique' => 'Nama kategori sudah ada',
            ]
        );

        $oldkategori = Kategori::findOrFail($id);

        Kategori::where('id', $id)->update($kategori);
        return redirect()->route('backend.kategori.index')->with('success', 'Kategori dengan nama <strong>' . $oldkategori->nama_kategori . '</strong> telah berhasil diubah menjadi <strong>' . $request->input('nama_kategori') . '</strong>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari data kategori berdasarkan id
        $kategori = Kategori::findOrFail($id);
        // Menghapus data kategori dari database berdasarkan id yang telah dicari
        $kategori->delete();
        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->route('backend.kategori.index')->with('success',  'Kategori dengan nama ' . $kategori->nama_kategori . ' berhasil dihapus');
    }
}
