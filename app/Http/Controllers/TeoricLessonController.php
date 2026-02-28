<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnrolmentLessonRequest;
use Illuminate\Http\Request;
use App\Models\EnrolmentLesson;

use Exception;

class TeoricLessonController extends Controller
{
    public function panel($teoricLessons)
    {
        $panel = 'Aula de teórica';
        return view('auth.teoric_lesson.index', compact('teoricLessons', 'panel'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teoricLessons = EnrolmentLesson::with('enrolment.student.user', 'lesson')
            ->orderBy('created_at', 'desc')
            ->paginate();
        return $this->panel($teoricLessons);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $teoricLessons = EnrolmentLesson::with('enrolment.student.user', 'lesson')
            ->where('topic','like',"%{$search}%")
            ->orderBy('created_at', 'desc')
            ->paginate();
        return $this->panel($teoricLessons);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.teoric_lesson.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnrolmentLessonRequest $request)
    {
        try{
            $data = $request->only('enrolment_id', 'lesson_id');
            EnrolmentLesson::updateOrCreate($data, $data);
            flash()->success('Aulas de condução criado com successo');
            return redirect()->route('teoric_lessons.index');
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
        $teoricLesson = EnrolmentLesson::find($id);
        return view('auth.teoric_lesson.form', compact('teoricLesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnrolmentLessonRequest $request, string $id)
    {
        try{
            $teoricLesson = EnrolmentLesson::find($id);
            $teoricLesson->update($request->all());
            flash()->success('Aulas de condução editado com successo');
            return redirect()->route('teoric_lessons.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnrolmentLesson $teoricLesson)
    {
        try{
            $teoricLesson->delete();
            flash()->success('Aulas de condução eliminado com successo');
            return redirect()->route('teoric_lessons.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }
}
