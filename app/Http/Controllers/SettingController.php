<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Konsentrasi;
use App\Models\Pesantren;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $konsentrasis = Konsentrasi::orderBy('created_at', 'desc')->get();
        $jenjangs = Jenjang::all();
        return view('pages.admin.setting.settings', [
            'title' => 'Pengaturan',
            'active' => 'settings',
            'konsentrasis' => $konsentrasis,
            'jenjangs' => $jenjangs,
        ]);
    }
}