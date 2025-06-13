@extends('layout.dash')
@section('body')
    <x-link-back href="{{ route('secretaries.index') }}" />
    <form class="max-w-sm mx-auto md:my-5 bg-white p-2 rounded-2xl"
        action="{{ isset($secretary->id) ? route('secretaries.update', $secretary->id) : route('secretaries.store') }}"
        method="POST">
        @csrf
        @isset($secretary)
            @method('PUT')
            <div class="text-xl mb-5">Editar secretario</div>
        @else
            <div class="text-xl mb-5">Criar secretario</div>
        @endisset
        <div class="mb-5">
            <x-input-field label="Digita o nome" name="name" value="{{ $secretary->user->name ?? old('name') }}" />
        </div>
        <div class="mb-5">
            <x-input-field label="Digita o email" type="email" name="email"
                value="{{ $secretary->user->email ?? old('email') }}" />
        </div>
        @if (!isset($secretary))
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
