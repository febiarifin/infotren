<?php

namespace App\Http\Controllers;

use App\Models\Konsentrasi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KonsentrasiCotroller extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:konsentrasis'],
        ]);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        Konsentrasi::create($validatedData);
        toast('Konsentrasi berhasil ditambahkan', 'success');
        return back();
    }

    public function update(Request $request)
    {
        $konsentrasi = Konsentrasi::findOrFail($request->id);
        try {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            $validatedData['slug'] = Str::slug($validatedData['name']);
            $konsentrasi->update($validatedData);
            toast('Konsentrasi berhasil diupdate', 'success');
            return back();
        } catch (Exception $e) {
            toast('Konsentrasi gagal diupdate', 'error');
            return back();
        }
    }

    public function delete(Request $request)
    {
        $konsentrasi = Konsentrasi::findOrFail($request->id);
        $konsentrasi->delete();
        toast('Konsentrasi berhasil dihapus', 'success');
        return back();
    }
}