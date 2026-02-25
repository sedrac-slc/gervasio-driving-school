<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function upate(Request $request) {
        $request->validate(['name' => 'required']);
        auth()->user()->update([ 'name' => $request->name ]);
        flash()->success('Actualizar o dados do utilizador');
        return redirect()->back();
    }

}
