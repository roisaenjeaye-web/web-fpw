<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // 1. GET: Menampilkan daftar data supplier
    public function index()
    {
        return 'Halaman Daftar Supplier (Method: GET)';
    }

    // 2. GET: Menampilkan form tambah supplier
    public function create()
    {
        return 'Halaman Form Tambah Supplier (Method: GET)';
    }

    // 3. POST: Menyimpan data supplier baru dari form
    public function store(Request $request)
    {
        // Logika validasi dan simpan data
        return 'Data supplier baru berhasil dikirim via POST dan disimpan!';
    }
}
