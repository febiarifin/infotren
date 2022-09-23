<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->where('status', 0)->get();
        return $users;
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        // $validatedData =  $request->validate([
        //     'name' => 'required',
        //     'email' => ['required', 'email:dns'],
        // ]);
    }
}