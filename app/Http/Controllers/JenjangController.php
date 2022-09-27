<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class JenjangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:konsentrasis'],
        ]);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        Jenjang::create($validatedData);
        toast('Jenjang berhasil ditambahkan', 'success');
        return back();
    }

    public function update(Request $request)
    {
        $jenjang = Jenjang::findOrFail($request->id);
        $validatedData = $request->validate([
            'name' => ['required', 'unique:konsentrasis'],
        ]);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        $jenjang->update($validatedData);
        toast('Jenjang berhasil diupdate', 'success');
        return back();
    }

    public function delete(Request $request)
    {
        $jenjang = Jenjang::findOrFail($request->id);
        if (count($jenjang->pesantrens) != 0) {
            toast('Jenjang gagal dihapus', 'error');
            return back();
        }
        $jenjang->delete();
        toast('Jenjang berhasil dihapus', 'success');
        return back();
    }
}