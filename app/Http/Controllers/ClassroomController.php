<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use Illuminate\Http\Request;
use App\Models\Classroom;

use Exception;

class ClassroomController extends Controller
{
    public function panel($classrooms)
    {
        $panel = 'Turmas';
        return view('auth.classroom.index', compact('classrooms'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::with('category', 'enrolments')
            ->orderBy('created_at', 'desc')
            ->paginate();
        return $this->panel($classrooms);
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $classrooms = Classroom::with('category', 'enrolments')
            ->orderBy('created_at', 'desc')
            ->paginate();;
        return $this->panel($classrooms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.classroom.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request)
    {
        try{
            Classroom::create($request->all());
            flash()->success('Turma criado com successo');
            return redirect()->route('classrooms.index');
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
        $classroom = Classroom::find($id);
        return view('auth.classroom.form', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassroomRequest $request, string $id)
    {
        try{
            $classroom = Classroom::find($id);
            $classroom->update($request->all());
            flash()->success('Turma editado com successo');
            return redirect()->route('classrooms.index');
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
            $classroom = Classroom::find($id);
            $classroom->delete();
            flash()->success('Turma eliminado com successo');
            return redirect()->route('classrooms.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }
}
