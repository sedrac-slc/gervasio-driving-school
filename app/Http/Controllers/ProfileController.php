<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function password(Request $request) {
        $request->validate([
            'confirm_password' => 'required',
            'new_password' => 'required',
            'password' => 'required'
        ]);

        if ($request->new_password != $request->confirm_password) {
            flash()->info('A nova senha é diferente da confirmação');
            return redirect()->back();
        }
        $password = auth()->user()->password;
        if (!Hash::check($request->password, $password)) {
            flash()->info('Senha actual incorreta');
            return redirect()->back();
        }
        auth()->user()->update([ "password" => Hash::make($request->new_password)]);
        flash()->success('Senha actualizada com successo');
        return redirect()->back();
    }

}
