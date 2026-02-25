<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use App\Models\{Student, User};
use Exception;

class StudentController extends Controller
{
    public function panel($students)
    {
        $panel = 'Estudante';
        return view('auth.student.index', compact('students', 'panel'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('enrolments')->orderBy('created_at', 'desc')->paginate();
        return $this->panel($students);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $students = Student::with('user', 'enrolments')
            ->whereHas('user',
                fn($q) => $q->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%")
            )->orderBy('created_at', 'desc')
             ->paginate();
        return $this->panel($students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.student.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
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
            Student::create(array_merge(["user_id" => $user->id], $data));
            flash()->success('Estudante criado com successo');
            return redirect()->route('students.index');
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
        $student = Student::find($id);
        return view('auth.student.form', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        try{
            $data = $request->all();
            $student = Student::find($id);
            $student->user->update($data);
            $student->update($data);
            flash()->success('Estudante editado com successo');
            return redirect()->route('students.index');
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
            $student = Student::find($id);
            $student->delete();
            $student->user->delete();
            flash()->success('Estudante eliminado com successo');
            return redirect()->route('students.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }

    public function searchInput(Request $request)
    {
        $term = $request->input('search','');
        $limit = $request->input('limit', 10);
        $students = Student::with('user')
            ->whereHas('user', fn($q) => $q->where('name', 'like', "%{$term}%")->orWhere('email', 'like', "%{$term}%"))
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
        return view('auth.student.partials.search-results', compact('students'));
    }
}
