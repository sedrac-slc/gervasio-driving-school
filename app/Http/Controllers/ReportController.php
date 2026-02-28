<?php

namespace App\Http\Controllers;

use Spatie\LaravelPdf\Facades\Pdf;
use App\Models\ExamAppointment;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\Vehicle;
use App\Models\Lesson;

class ReportController extends Controller
{
    public function lesson()
    {
        $lessons = Lesson::orderBy('created_at', 'desc')->get();

        return Pdf::view('reports.lesson', ['lessons' => $lessons])
            ->name('relatorio-licoes.pdf')
            ->inline();
    }

    public function student()
    {
        $students = Student::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return Pdf::view('reports.student', ['students' => $students])
            ->name('relatorio-estudantes.pdf')
            ->inline();
    }

    public function instrutor()
    {
        $instructors = Instructor::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return Pdf::view('reports.instructor', ['instructors' => $instructors])
            ->name('relatorio-instrutores.pdf')
            ->inline();
    }

    public function examAppointmentApproved()
    {
        $examAppointments = ExamAppointment::with('enrolment.student.user')
            ->where('approved', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return Pdf::view('reports.exam-appointment-approved', [
            'examAppointments' => $examAppointments,
            'title'            => 'Marcações de Exame Aprovadas',
        ])
            ->name('marcacoes-aprovadas.pdf')
            ->inline();
    }

    public function examAppointmentCompleted()
    {
        $examAppointments = ExamAppointment::with('enrolment.student.user')
            ->where('completed', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return Pdf::view('reports.exam-appointment-completed', [
            'examAppointments' => $examAppointments,
            'title'            => 'Marcações de Exame Concluídas',
        ])
            ->name('marcacoes-concluidas.pdf')
            ->inline();
    }
}
