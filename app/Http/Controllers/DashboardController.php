<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamAppointment;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\Vehicle;
use App\Models\Lesson;

class DashboardController extends Controller
{
    public function index()
    {
        $examAppointments = ExamAppointment::with('enrolment.student.user')
            ->where('completed', true)
            ->where('approved', true)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('dashboard', [
            'examAppointments' => $examAppointments,
            'instructor' => Instructor::count(),
            'vehicle' => Vehicle::count(),
            'student' => Student::count(),
            'lesson' => Lesson::count(),
        ]);
    }
}
