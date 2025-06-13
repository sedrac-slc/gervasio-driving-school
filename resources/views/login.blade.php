@extends('layout.default')
<div class="h-screen w-screen flex justify-center items-center">
    <div class="absolute top-5 left-5">
        <a class="bg-sky-50 p-2 rounded-2xl flex gap-1 items-center shadow-2xl" href="/">
            <i class='bx  bx-arrow-left-circle'></i>
            <span>Pagina inicial</span>
        </a>
    </div>
    <form class="min-w-[400px] mx-auto bg-sky-50 rounded-2xl p-3 shadow-2xl" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="text-2xl text-center mb-5 font-semibold bg-white p-2 rounded-2xl shadow">Faça autenticação</div>
        <div class="mb-5">
            <x-input-field label="Email" name="email" value="{{ old('email') }}" placeholder="name@flowbite.com"/>
        </div>
        <div class="mb-5">
            <x-input-field label="Senha" type="password" name="password" value="{{ old('password') }}"/>
        </div>
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value=""
                    class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                     />
            </div>
            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Lembra-se de mí
            </label>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Entra</button>
    </form>
</div>
