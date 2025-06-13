<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SecretaryRequest;
use Illuminate\Http\Request;
use App\Models\{Secretary, User};
use Exception;

class SecretaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secretaries = Secretary::orderBy('created_at', 'desc')->paginate();
        return view('auth.secretary.index', compact('secretaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.secretary.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SecretaryRequest $request)
    {
        try{
            $request->validate(['password' => 'required', 'confirm' => 'required']);
            $data = $request->all();

            if($data['password'] != $data['confirm']){
                flash()->warning('Senhas são diferentes');
                return back();
            }

            $data['password'] = bcrypt($data['confirm']);
            $user = User::updateOrCreate(['email' => $data['email']], $data);
            Secretary::create(array_merge(["user_id" => $user->id], $data));
            flash()->success('Secretario criado com successo');
            return redirect()->route('secretaries.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $secretary = Secretary::find($id);
        return view('auth.secretary.form', compact('secretary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SecretaryRequest $request, string $id)
    {
        try{
            $data = $request->all();
            $secretary = Secretary::find($id);
            $secretary->user->update($data);
            $secretary->update($data);
            flash()->success('Secretario editado com successo');
            return redirect()->route('secretaries.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $secretary = Secretary::find($id);
            $secretary->delete();
            $secretary->user->delete();
            flash()->success('Secretario eliminado com successo');
            return redirect()->route('secretaries.index');
        }catch(Exception $e){
            dd($e);
            flash()->error('Erro na operação');
            return back();
        }
    }
}
