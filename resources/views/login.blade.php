@extends('layout.default')
<div class=" flex justify-center">
    <div class="h-screen md:w-1/2 flex justify-center items-center">
        <form class="w-full mx-auto rounded-2xl md:px-10 lg:px-32 p-3" action="{{ route('login') }}" method="POST">
            <div class="absolute top-5 left-5">
                <a class="p-2 rounded-2xl flex gap-1 items-center" href="/">
                    <i class="fas fa-angle-left"></i>
                    <span>Voltar</span>
                </a>
            </div>
            @csrf
            <div class="text-2xl text-center mb-5 font-semibold p-2 rounded-2xl">Faça autenticação</div>
            <div class="mb-5">
                <x-input-field label="Email" name="email" value="{{ old('email') }}"
                    placeholder="name@flowbite.com" />
            </div>
            <div class="mb-5">
                <x-input-field label="Senha" type="password" name="password" value="{{ old('password') }}" />
            </div>
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Lembra-se de mí
                </label>
            </div>
            <button type="submit"
                class="text-white w-full! bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Entra
            </button>
        </form>
    </div>
    <div class="login-page h-screen md:w-1/2"></div>
</div>
