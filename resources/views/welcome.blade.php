@extends('layout.default')
@section('style')
    <style>
        .bg-cars {
            background-image: url('/img/cars-background.png');
            background-size: cover;
        }
    </style>
@endsection

@section('content')
    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700 border-b">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white uppercase">
                    <span class="bg-sky-200 rounded-full px-1">Con</span><span>dução</span>
                </span>
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
    </nav>
    <header class="flex justify-center items-center h-auto md:h-[400px] border-b bg-cars" style="">
        <div class="bg-white opacity-85 rounded-2xl p-2 w-3/6 flex flex-col justify-center items-center">
            <div class="text-xl md:text-6xl tex">Bem vindo!</div>
            <div class="my-4">A escola de condução Gervasio</div>
            <div class="text-center">
                Aqui, a gestão da sua secretaria é a nossa prioridade. Desde a sua inscrição até à marcação das aulas e
                exames, a nossa equipa administrativa está sempre pronta para ajudar. Descomplicamos os processos
                burocráticos para que se possa concentrar no que realmente importa: tornar-se um(a) condutor(a) seguro(a) e
                confiante
            </div>
            <div>
                <a href="/login">
                    Auntenticação
                </a>
            </div>
        </div>
        <div>
            <img class="h-100 w-100 md:150" src="/img/car.png"/>
        </div>
    </header>
@endsection
