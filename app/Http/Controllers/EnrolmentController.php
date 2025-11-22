<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnrolmentRequest;
use Illuminate\Http\Request;
use App\Models\Enrolment;
use Exception;

class EnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrolments = Enrolment::orderBy('created_at', 'desc')->paginate();
        return view('auth.enrolment.index', compact('enrolments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.enrolment.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnrolmentRequest $request)
    {
        try {
            Enrolment::create($request->all());
            flash()->success('Matricula criado com successo');
            return redirect()->route('enrolments.index');
        } catch (Exception) {
            flash()->error('Erro na operação');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enrolment = Enrolment::find($id);
        return view('auth.enrolment.form', compact('enrolment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnrolmentRequest $request, string $id)
    {
        try {
            $enrolment = Enrolment::find($id);
            $enrolment->update($request->all());
            flash()->success('Matricula editado com successo');
            return redirect()->route('enrolments.index');
        } catch (Exception) {
            flash()->error('Erro na operação');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $enrolment = Enrolment::find($id);
            $enrolment->delete();
            flash()->success('Matricula eliminado com successo');
            return redirect()->route('enrolments.index');
        } catch (Exception) {
            flash()->error('Erro na operação');
            return back();
        }
    }

    public function searchInput(Request $request)
    {
        $term = $request->input('search','');
        $limit = $request->input('limit', 10);
        $enrolments = Enrolment::with(['classroom', 'student'])
            ->with(['classroom.category', 'student.user'])
            ->where('code', 'LIKE', "%{$term}%")
            ->orWhereHas('student.user', function ($query) use ($term) {
                $query->where('name', 'LIKE', "%{$term}%");
            })
            ->orWhereHas('classroom.category', function ($query) use ($term) {
                $query->where('name', 'LIKE', "%{$term}%");
            })
            ->orWhereHas('classroom', function ($query) use ($term) {
                $query->where('period', 'LIKE', "%{$term}%");
            })
            ->limit($limit)
            ->get();

        return view('auth.enrolment.partials.search-results', compact('enrolments'));
    }
}
