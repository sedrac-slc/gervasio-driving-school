@extends('layout.dash')
@section('body')
    <div class="max-w mx-auto flex flex-col gap-10">
        <form class="mx-5 bg-white p-2 rounded-2xl" action="{{ isset(auth()->user()->id) ? route('profile.upate') : '#' }}" method="POST">
            @csrf
            @method('PUT')
            <img class="w-30 h-30 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                src="/img/ferr-studio-G2Qjx1y9aAM-unsplash.jpg" alt="Bordered avatar" />

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 my-5">
                <div class="">
                    <x-input-field label="Nome" name="name" value="{{ auth()->user()->name }}" />
                </div>
                <div class="">
                    <x-input-field label="Email" type="email" name="email" value="{{ auth()->user()->email }}" />
                </div>
            </div>
            <x-submit-confirm />
        </form>

        <form class="mx-5 bg-white p-2 rounded-2xl" action="{{ isset(auth()->user()->id) ? route('profile.password') : '#' }}" method="POST">
            @csrf
            @method('PUT')
            <div class="text-xl font-semibold mt-5">Segurança</div>
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 my-5">
                <div class="">
                    <x-input-field label="Senha actual" type="password" name="password" value="{{ old('password') }}" />
                </div>
                <div class="">
                    <x-input-field label="Senha nova" type="password" name="password" value="{{ old('password') }}" />
                </div>
                <div class="">
                    <x-input-field label="Confirma senha" type="password" name="password" value="{{ old('password') }}" />
                </div>
            </div>
            <x-submit-confirm />
        </form>
    </div>
@endsection
