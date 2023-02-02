<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Konsentrasi;
use App\Models\Pesantren;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pesantrens = Pesantren::orderBy('created_at', 'desc')->paginate(9);
        $kosentrasis = Konsentrasi::all();
        $jenjangs = Jenjang::all();
        return view('pages.home.home', [
            'title' => config('app.name'),
            'pesantrens' => $pesantrens,
            'konsentrasis' => $kosentrasis,
            'jenjangs' => $jenjangs,
            'active' => 'terbaru',
        ]);
    }

    public function detail($pesantren)
    {
        $pesantren = Pesantren::where('slug', $pesantren)->first();
        return view('pages.home.detail', [
            'title' => $pesantren->nama,
            'pesantren' => $pesantren,
            'active' => ''
        ]);
    }

    public function search(Request $request)
    {
        if ($request->keyword) {
            $pesantrens = Pesantren::where('nama', 'LIKE', '%' . $request->keyword . '%')->get();
        }elseif($request->jenjang){
            $jenjang = Jenjang::where('slug', $request->jenjang)->first();
            $pesantrens = $jenjang->pesantrens;
        }elseif($request->konsentrasi){
            $konsentrasi = Konsentrasi::where('slug', $request->konsentrasi)->first();
            $pesantrens = $konsentrasi->pesantrens;
        }
        $kosentrasis = Konsentrasi::all();
        $jenjangs = Jenjang::all();

        return view('pages.home.search', [
            'title' => 'Kata Kunci : ' . $request->keyword,
            'pesantrens' => $pesantrens,
            'keyword' => 'Pesantren Dengan Keyword ' . $request->keyword,
            'konsentrasis' => $kosentrasis,
            'jenjangs' => $jenjangs,
            'active' => '',
        ]);
    }

    public function pesantrenByKonsentrasi($kosentrasi)
    {
        $kosentrasi = Konsentrasi::where('slug', $kosentrasi)->first();
        $kosentrasis = Konsentrasi::all();
        $jenjangs = Jenjang::all();
        return view('pages.home.search', [
            'title' => 'Kata Kunci : ' . $kosentrasi->name,
            'pesantrens' => $kosentrasi->pesantrens,
            'keyword' => 'Pesantren Dengan Konsentrasi ' . $kosentrasi->name,
            'konsentrasis' => $kosentrasis,
            'jenjangs' => $jenjangs,
            'active' => $kosentrasi->slug
        ]);
    }

    public function pesantrenByJenjang($jenjang)
    {
        $jenjang = Jenjang::where('slug', $jenjang)->first();
        $kosentrasis = Konsentrasi::all();
        $jenjangs = Jenjang::all();
        return view('pages.home.search', [
            'title' => 'Kata Kunci : ' . $jenjang->name,
            'pesantrens' => $jenjang->pesantrens,
            'keyword' => 'Pesantren Dengan Jenjang ' . $jenjang->name,
            'konsentrasis' => $kosentrasis,
            'jenjangs' => $jenjangs,
            'active' => $jenjang->slug
        ]);
    }

    public function test($test)
    {
        $pesantrens = Pesantren::orderBy('created_at', 'desc')->paginate(6);
        $kosentrasis = Konsentrasi::all();
        $jenjangs = Jenjang::all();
        return view('pages.home.search', [
            'title' => 'Pesantren : ' . $test,
            'pesantrens' => $pesantrens,
            'konsentrasis' => $kosentrasis,
            'jenjangs' => $jenjangs,
            'active' => $test,
            'keyword' => 'Pesantren : ' . $test
        ]);
    }
}
