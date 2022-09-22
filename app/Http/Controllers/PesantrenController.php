<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Pesantren;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PesantrenController extends Controller
{

    public function index()
    {
        $pesantrens = Pesantren::orderBy('created_at', 'desc')->get();
        return $pesantrens;
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
        $pesantren = Pesantren::findOrFail($pesantren);
        return $pesantren;
    }

    public function update(Request $request)
    {
        $pesantren = Pesantren::findOrFail($request->id);
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
            'image' => [Rule::requiredIf(function () {
                if (empty($this->request->image)) {
                    return false;
                }
                return true;
            }), 'mimes:png,jpg,jpeg', 'max:1024'],
            'content' => 'required',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['nama']);
        $validatedData['instagram'] = $request->instagram;
        $validatedData['facebook'] = $request->facebook;
        $validatedData['youtube'] = $request->youtube;
        $validatedData['website'] = $request->website;
        if ($request->image) {
            AppHelper::instance()->deleteImage($pesantren->image);
            $validatedData['image'] = AppHelper::instance()->uploadImage($request->image, 'images');
        }
        $pesantren->update($validatedData);
        return $pesantren;
    }

    public function delete(Request $request)
    {
        $pesantren = Pesantren::findOrFail($request->id);
        AppHelper::instance()->deleteImage($pesantren->image);
        $pesantren->delete();
        return 'pesantren has been deleted';
    }
}