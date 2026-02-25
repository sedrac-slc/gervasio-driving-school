<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorRequest;
use Illuminate\Http\Request;
use App\Models\{Instructor, User};
use Exception;

class InstructorController extends Controller
{
    public function panel($instructors)
    {
        $panel = 'Instrutor';
        return view('auth.instructor.index', compact('instructors', 'panel'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::orderBy('created_at', 'desc')->paginate();
        return $this->panel($instructors);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $instructors = Instructor::with('user')
            ->whereHas('user',
                fn($q) => $q->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%")
            )
            ->orderBy('created_at', 'desc')
            ->paginate();
        return $this->panel($instructors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.instructor.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstructorRequest $request)
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
            Instructor::create(array_merge(["user_id" => $user->id], $data));
            flash()->success('Instrutor criado com successo');
            return redirect()->route('instructors.index');
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
        $instructor = Instructor::find($id);
        return view('auth.instructor.form', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstructorRequest $request, string $id)
    {
        try{
            $data = $request->all();
            $instructor = Instructor::find($id);
            $instructor->user->update($data);
            $instructor->update($data);
            flash()->success('Instrutor editado com successo');
            return redirect()->route('instructors.index');
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
            $instructor = Instructor::find($id);
            $instructor->delete();
            $instructor->user->delete();
            flash()->success('Instrutor eliminado com successo');
            return redirect()->route('instructors.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }
}
