<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\{
    ExamAppointment,
    Instructor,
    Classroom,
    Secretary,
    Category,
    Vehicle,
    Student,
    Payment,
    Lesson,
    Article
};

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

    public function article()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return Pdf::loadView('reports.article', ['articles' => $articles])->stream('relatorio-articles.pdf');
    }

    public function payment()
    {
        $payments = Payment::with('enrolment', 'article')->orderBy('created_at', 'desc')->get();
        return Pdf::loadView('reports.payment', ['payments' => $payments])->stream('relatorio-payments.pdf');
    }

    public function category()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return Pdf::loadView('reports.category', ['categories' => $categories])->stream('relatorio-categories.pdf');
    }

    public function vehicle()
    {
        $vehicles = Vehicle::orderBy('created_at', 'desc')->get();
        return Pdf::loadView('reports.vehicle', ['vehicles' => $vehicles])->stream('relatorio-vehicles.pdf');
    }

    public function classroom()
    {
        $classrooms =  Classroom::with('category', 'enrolments')->orderBy('created_at', 'desc')->get();
        return Pdf::loadView('reports.classroom', ['classrooms' => $classrooms])->stream('relatorio-articles.pdf');
    }

    public function paymentFile($id) {
        $payment = Payment::with(
            'enrolment.classroom.category',
            'enrolment.student.user',
            'article',
        )->find($id);
        return Pdf::loadView('reports.payment-file', ['payment' => $payment])->stream('relatorio-comprovativo.pdf');
    }

    public function teoricLessons()
    {
        $lessons = Lesson::where('type', Lesson::TEORIC)->orderBy('created_at', 'desc')->get();
        return Pdf::loadView('reports.lesson', [
            'lessons' => $lessons,
            'title' => 'Relatório de aulas teóricas'
        ])->stream('relatorio-licoes.pdf');
    }

    public function drivingLessons()
    {
        $lessons = Lesson::where('type', Lesson::DRIVER)->orderBy('created_at', 'desc')->get();
        return Pdf::loadView('reports.lesson', [
            'lessons' => $lessons,
            'title' => 'Relatório de aulas condução'
        ])->stream('relatorio-licoes.pdf');
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
