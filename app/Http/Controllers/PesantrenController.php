<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Pesantren;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PesantrenController extends Controller
{

    public function index()
    {
        return 'test';
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'pengasuh'  => 'required',
            'alamat'  => 'required',
            'jarak'  => 'required',
            'konsentrasi'  => 'required',
            'jenjang'  => 'required',
            'cp_pendaftaran'  => 'required',
            'pa_pi' => 'required',
            'lurah_pa' => 'required',
            'lurah_pi' => 'required',
            'jumlah_santri_pa' => 'required',
            'jumlah_santri_pi' => 'required',
            'image' => ['required', 'mimes:png,jpg,jpeg', 'max:1024'],
            'content' => 'required',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['nama']);
        $validatedData['instagram'] = $request->instagram;
        $validatedData['facebook'] = $request->facebook;
        $validatedData['youtube'] = $request->youtube;
        $validatedData['website'] = $request->website;
        $validatedData['image'] = AppHelper::instance()->uploadImage($request->image, 'images');
        Pesantren::create($validatedData);
        return $validatedData;
    }

    public function edit($pesantren)
    {
    }

    public function update(Request $request)
    {
    }

    public function delete(Request $request)
    {
    }
}