@extends('layout.dash')
@section('body')
    <x-link-back href="{{ route('instructors.index') }}" />
    <form class="max-w-sm mx-auto md:my-5 bg-white p-2 rounded-2xl"
        action="{{ isset($instructor->id) ? route('instructors.update', $instructor->id) : route('instructors.store') }}"
        method="POST">
        @csrf
        @isset($instructor)
            @method('PUT')
            <div class="text-xl mb-5">Editar instructor</div>
        @else
            <div class="text-xl mb-5">Criar instructor</div>
        @endisset
        <div class="mb-5">
            <x-input-field label="Digita o nome" name="name" value="{{ $instructor->user->name ?? old('name') }}" />
        </div>
        <div class="mb-5">
            <x-input-field label="Digita o email" type="email" name="email" value="{{ $instructor->user->email ?? old('email') }}" />
        </div>
        @if (!isset($instructor))
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
