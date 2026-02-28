<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamAppointmentRequest;
use Illuminate\Http\Request;
use App\Models\ExamAppointment;

class ExamAppointmentController extends Controller
{

    public function panel($examAppointments)
    {
        $panel = 'Marcação de exame';
        return view('auth.exam_appointment.index', compact('examAppointments', 'panel'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examAppointments = ExamAppointment::with('enrolment.student.user')
            ->orderBy('created_at', 'desc')
            ->paginate();
        return $this->panel($examAppointments);
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $examAppointments = ExamAppointment::with('enrolment.student.user')
            ->whereHas('enrolment', function ($query) use ($search) {
                $query->where('code', 'LIKE', "%{$search}%");
            })
            ->orWhereHas('enrolment.student.user', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate();
        return $this->panel($examAppointments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.exam_appointment.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamAppointmentRequest $request)
    {
        try{
            ExamAppointment::create($request->all());
            flash()->success('Maracação exame criado com successo');
            return redirect()->route('exam_appointments.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamAppointment $examAppointment)
    {
        return view('auth.exam_appointment.form', compact('examAppointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExamAppointmentRequest $request, string $id)
    {
        try{
            $examAppointment = ExamAppointment::find($id);
            $examAppointment->update($request->all());
            flash()->success('Maracação exame editado com successo');
            return redirect()->route('exam_appointments.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamAppointment $examAppointment)
    {
        try{
            $examAppointment->delete();
            flash()->success('Maracação exame eliminado com successo');
            return redirect()->route('exam_appointments.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }

    public function completed(Request $request, ExamAppointment $examAppointment)
    {
        try{
            $examAppointment->update([ 'completed' => $request->completed ?? true ]);
            flash()->success('Maracação exame editado com sucesso');
            return redirect()->route('exam_appointments.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }

    public function approved(Request $request, ExamAppointment $examAppointment)
    {
        try{
            $examAppointment->update([ 'approved' => $request->approved ?? true ]);
            flash()->success('Maracação exame editado com successo');
            return redirect()->route('exam_appointments.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }

}
