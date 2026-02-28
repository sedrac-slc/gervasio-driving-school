<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ExamAppointment;
use App\Models\Instructor;
use App\Models\Secretary;
use App\Models\Student;
use App\Models\Vehicle;
use App\Models\Lesson;

class ReportController extends Controller
{
    public function lesson()
    {
        $lessons = Lesson::orderBy('created_at', 'desc')->get();
        return Pdf::loadView('reports.lesson', ['lessons' => $lessons])->stream('relatorio-licoes.pdf');
    }

    public function student()
    {
        $students = Student::with('user')->orderBy('created_at', 'desc')->get();
        return Pdf::loadView('reports.student', ['students' => $students])->stream('relatorio-estudantes.pdf');
    }

    public function secretary()
    {
        $secretaries = Secretary::with('user')->orderBy('created_at', 'desc')->get();
        return Pdf::loadView('reports.secretary', ['secretaries' => $secretaries])->stream('relatorio-secretarioes.pdf');
    }

    public function instrutor()
    {
        $instructors = Instructor::with('user')->orderBy('created_at', 'desc')->get();
        return Pdf::loadView('reports.instructor', ['instructors' => $instructors])->stream('relatorio-instrutores.pdf');
    }

    public function examAppointmentApproved()
    {
        $examAppointments = ExamAppointment::with('enrolment.student.user')
            ->where('approved', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return Pdf::loadView('reports.exam-appointment-approved', [
            'examAppointments' => $examAppointments,
            'title'            => 'Marcações de Exame Aprovadas',
        ])->stream('marcacoes-aprovadas.pdf');
    }

    public function examAppointmentCompleted()
    {
        $examAppointments = ExamAppointment::with('enrolment.student.user')
            ->where('completed', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return Pdf::loadView('reports.exam-appointment-completed', [
            'examAppointments' => $examAppointments,
            'title'            => 'Marcações de Exame Concluídas',
        ])->stream('marcacoes-concluidas.pdf');
    }
}
