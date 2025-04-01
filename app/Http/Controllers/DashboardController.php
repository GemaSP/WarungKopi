<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();
        // Menampilkan view 'backend.v_dashboard.index' dengan mengirimkan data judul dan user
        return view('backend.v_dashboard.index', [
            'judul' => 'Dashboard',
            'user' => $user
        ]);
    }
}
