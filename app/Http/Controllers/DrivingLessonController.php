<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DrivingLessonRequest;
use Illuminate\Http\Request;
use App\Models\DrivingLesson;

use Exception;

class DrivingLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivingLessons = DrivingLesson::orderBy('created_at', 'desc')->paginate();
        return view('auth.driving_lesson.index', compact('drivingLessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.driving_lesson.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DrivingLessonRequest $request)
    {
        try{
            DrivingLesson::create($request->all());
            flash()->success('Aulas de condução criado com successo');
            return redirect()->route('driving_lessons.index');
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
        $classroom = DrivingLesson::find($id);
        return view('auth.driving_lesson.form', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DrivingLessonRequest $request, string $id)
    {
        try{
            $classroom = DrivingLesson::find($id);
            $classroom->update($request->all());
            flash()->success('Aulas de condução editado com successo');
            return redirect()->route('drivingLessons.index');
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
            $classroom = DrivingLesson::find($id);
            $classroom->delete();
            flash()->success('Aulas de condução eliminado com successo');
            return redirect()->route('drivingLessons.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }
}
