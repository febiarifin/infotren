<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Jenjang;
use App\Models\Konsentrasi;
use App\Models\Pesantren;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PesantrenController extends Controller
{

    public function index()
    {
        $pesantrens = Pesantren::orderBy('created_at', 'desc')->get();
        return view('pages.admin.pesantren.pesantrens', [
            'title' => 'Manajemen Pesantren',
            'pesantrens' => $pesantrens,
            'active' => 'pesantrens',
        ]);
    }

    public function create()
    {
        $konsentrasis = Konsentrasi::all();
        $jenjangs = Jenjang::all();
        return view('pages.admin.pesantren.create', [
            'title' => 'Tambah Data Pesantren',
            'active' => 'pesantrens',
            'konsentrasis' => $konsentrasis,
            'jenjangs' => $jenjangs,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'pengasuh'  => 'required',
            'alamat'  => 'required',
            'jarak'  => 'required',
            'kontak'  => 'required',
            'pa_pi' => 'required',
            'image' => ['required', 'mimes:png,jpg,jpeg', 'max:1024'],
            'content' => 'required',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['nama']);
        $validatedData['lurah_pa'] = $request->lurah_pa;
        $validatedData['lurah_pi'] = $request->lurah_pi;
        if ($validatedData['pa_pi'] == 'pa_pi') {
            $validatedData['jumlah_santri_pa'] = $request->jumlah_santri_pa;
            $validatedData['jumlah_santri_pi'] = $request->jumlah_santri_pi;
        } else if ($validatedData['pa_pi'] == 'pa') {
            $validatedData['jumlah_santri_pa'] = $request->jumlah_santri_pa;
            $validatedData['jumlah_santri_pi'] = 0;
        } else if ($validatedData['pa_pi'] == 'pi') {
            $validatedData['jumlah_santri_pi'] = $request->jumlah_santri_pi;
            $validatedData['jumlah_santri_pa'] = 0;
        }
        $validatedData['instagram'] = $request->instagram;
        $validatedData['facebook'] = $request->facebook;
        $validatedData['youtube'] = $request->youtube;
        $validatedData['website'] = $request->website;
        $validatedData['image'] = AppHelper::instance()->uploadImage($request->image, 'images');
        $pesantren = Pesantren::create($validatedData);
        $pesantren->konsentrasis()->attach($request->konsentrasi);
        $pesantren->jenjangs()->attach($request->jenjang);
        toast('Data pesantren berhasil ditambahkan', 'success');
        return redirect('pesantrens');
    }

    public function edit($pesantren)
    {
        $konsentrasis = Konsentrasi::all();
        $jenjangs = Jenjang::all();
        $pesantren = Pesantren::findOrFail($pesantren);
        return view('pages.admin.pesantren.edit', [
            'title' => $pesantren->nama,
            'active' => 'pesantrens',
            'pesantren' => $pesantren,
            'konsentrasis' => $konsentrasis,
            'jenjangs' => $jenjangs,
        ]);
    }

    public function update(Request $request)
    {
        $pesantren = Pesantren::findOrFail($request->id);
        $validatedData = $request->validate([
            'nama' => 'required',
            'pengasuh'  => 'required',
            'alamat'  => 'required',
            'jarak'  => 'required',
            'kontak'  => 'required',
            'pa_pi' => 'required',
            'image' => [Rule::requiredIf(function () {
                if (empty($this->request->image)) {
                    return false;
                }
                return true;
            }), 'mimes:png,jpg,jpeg', 'max:1024'],
            'content' => 'required',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['nama']);
        $validatedData['lurah_pa'] = $request->lurah_pa;
        $validatedData['lurah_pi'] = $request->lurah_pi;
        if ($validatedData['pa_pi'] == 'pa_pi') {
            $validatedData['jumlah_santri_pa'] = $request->jumlah_santri_pa;
            $validatedData['jumlah_santri_pi'] = $request->jumlah_santri_pi;
        } else if ($validatedData['pa_pi'] == 'pa') {
            $validatedData['jumlah_santri_pa'] = $request->jumlah_santri_pa;
            $validatedData['jumlah_santri_pi'] = 0;
        } else if ($validatedData['pa_pi'] == 'pi') {
            $validatedData['jumlah_santri_pi'] = $request->jumlah_santri_pi;
            $validatedData['jumlah_santri_pa'] = 0;
        }
        $validatedData['instagram'] = $request->instagram;
        $validatedData['facebook'] = $request->facebook;
        $validatedData['youtube'] = $request->youtube;
        $validatedData['website'] = $request->website;
        if ($request->image) {
            AppHelper::instance()->deleteImage($pesantren->image);
            $validatedData['image'] = AppHelper::instance()->uploadImage($request->image, 'images');
        }
        $pesantren->update($validatedData);
        $pesantren->konsentrasis()->sync($request->konsentrasi);
        $pesantren->jenjangs()->sync($request->jenjang);
        toast('Data pesantren berhasil ditambahkan', 'success');
        return redirect('pesantrens');
    }

    public function delete(Request $request)
    {
        $pesantren = Pesantren::findOrFail($request->id);
        AppHelper::instance()->deleteImage($pesantren->image);
        $pesantren->delete();
        return 'pesantren has been deleted';
    }
}