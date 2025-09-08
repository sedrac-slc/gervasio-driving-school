@extends('layout.dash')
@php
    use App\Models\Classroom;
    use App\Models\Student;

    $classrooms = Classroom::all();
    $students = Student::all();

@endphp
@section('body')
    <x-link-back href="{{ route('enrolments.index') }}" />
    <form class="max-w-sm mx-auto md:my-5 bg-white p-2 rounded-2xl"
        action="{{ isset($enrolment->id) ? route('enrolments.update', $enrolment->id) : route('enrolments.store') }}"
        method="POST">
        @csrf
        @isset($enrolment)
            @method('PUT')
            <div class="text-xl mb-5">Editar matricula</div>
        @else
            <div class="text-xl mb-5">Criar matricula</div>
        @endisset
        <div class="max-w-sm mx-auto mb-5">
            <label for="classroom_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Escolha a
                turma</label>
            <select id="classroom_id" name="classroom_id" value="{{ $enrolment->classroom->id ?? 0 }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom }}</option>
                @endforeach
            </select>
        </div>
        <div class="max-w-sm mx-auto mb-5">
            <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Escolha o estudante</label>
            <select id="student_id" name="student_id" value="{{ $enrolment->student->id ?? 0 }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student }}</option>
                @endforeach
            </select>
        </div>
        <x-submit-confirm />
    </form>
@endsection
