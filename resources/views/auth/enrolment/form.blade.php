@extends('layout.dash')
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
        <div class="mb-5">
            <x-input-field label="Digita turma" name="classroom" value="{{ $enrolment->classroom->category->name ?? old('name') }}" />
        </div>
        <div class="mb-5">
            <x-input-field label="Digita estudante" name="student" value="{{ $enrolment->student->user->name ?? old('email') }}" />
        </div>
        <x-submit-confirm />
    </form>
@endsection
