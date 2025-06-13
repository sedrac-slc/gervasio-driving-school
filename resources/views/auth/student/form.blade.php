@extends('layout.dash')
@section('body')
    <x-link-back href="{{ route('students.index') }}" />
    <form class="max-w-sm mx-auto md:my-5 bg-white p-2 rounded-2xl"
        action="{{ isset($student->id) ? route('students.update', $student->id) : route('students.store') }}"
        method="POST">
        @csrf
        @isset($student)
            @method('PUT')
            <div class="text-xl mb-5">Editar estudante</div>
        @else
            <div class="text-xl mb-5">Criar estudante</div>
        @endisset
        <div class="mb-5">
            <x-input-field label="Digita o nome" name="name" value="{{ $student->user->name ?? old('name') }}" />
        </div>
        <div class="mb-5">
            <x-input-field label="Digita o email" type="email" name="email" value="{{ $student->user->email ?? old('email') }}" />
        </div>
        @if (!isset($student))
            <div class="mb-5">
                <x-input-field label="Digita a senha" type="password" name="password" value="{{ old('password') }}" />
            </div>
            <div class="mb-5">
                <x-input-field label="Confirma a senha" type="password" name="confirm" value="{{ old('confirm') }}" />
            </div>
        @endif
        <x-submit-confirm />
    </form>
@endsection
