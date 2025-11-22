<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use Illuminate\Http\Request;
use App\Models\Lesson;

use Exception;

class LessonController extends Controller
{

    public function panel($lessons)
    {
        $panel = 'Lições';
        return view('auth.lesson.index', compact('lessons', 'panel'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::orderBy('created_at', 'desc')->paginate();
        return $this->panel($lessons);
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $lessons = Lesson::where('topic','like',"%{$search}%")
            ->orderBy('created_at', 'desc')
            ->paginate();
        return $this->panel($lessons);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.lesson.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LessonRequest $request)
    {
        try{
            Lesson::create($request->all());
            flash()->success('Lição criado com successo');
            return redirect()->route('lessons.index');
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
        $lesson = Lesson::find($id);
        return view('auth.lesson.form', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LessonRequest $request, string $id)
    {
        try{
            $lesson = Lesson::find($id);
            $lesson->update($request->all());
            flash()->success('Lição editado com successo');
            return redirect()->route('lessons.index');
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
            $lesson = Lesson::find($id);
            $lesson->delete();
            flash()->success('Lição eliminado com successo');
            return redirect()->route('lessons.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }
}
