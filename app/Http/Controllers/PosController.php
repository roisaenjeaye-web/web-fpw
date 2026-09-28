<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        return view('pos.index');
    }

    public function history()
    {
        $transactions = auth()->user()->transactions()->latest()->get();

        return view('pos.history', compact('transactions'));
    }

    public function store(Request $request)
    {
        //
    }
}
