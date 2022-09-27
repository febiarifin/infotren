<?php

namespace App\Http\Controllers;

use App\Models\Pesantren;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pesantrens = Pesantren::all();
        return view('pages.admin.dashboard.dashboard', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'pesantrens' => $pesantrens,
        ]);
    }
}