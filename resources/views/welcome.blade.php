@extends('layout.default')
@php
    $servicos = [
        [
            'color' => 'bg-blue-300 p-2  rounded-2xl',
            'titulo' => 'Matrículas Facilitadas',
            'descricao' =>
                'O sistema permite ao secretariado gerir de forma simples e rápida a matrícula dos alunos, garantindo organização e eficiência.',
        ],
        [
            'color' => 'bg-yellow-300 p-2  rounded-2xl',
            'titulo' => 'Gestão de Exames',
            'descricao' =>
                'Com a marcação automatizada de exames teóricos e práticos, o secretariado poupa tempo e evita conflitos de agendamento.',
        ],
        [
            'color' => 'bg-green-300 p-2  rounded-2xl',
            'titulo' => 'Controlo de Pagamentos',
            'descricao' =>
                'Acompanhe os pagamentos de forma segura e organizada, com histórico detalhado e notificações para alunos e responsáveis.',
        ],
        [
            'color' => 'bg-red-300 p-2 rounded-2xl',
            'titulo' => 'Relatórios Automatizados',
            'descricao' =>
                'Gere relatórios completos com poucos cliques, otimizando o trabalho do secretariado e facilitando a tomada de decisões.',
        ],
    ];
@endphp

@section('content')
    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700 border-b">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center  font-semibold whitespace-nowrap dark:text-white uppercase">
                    <span class="bg-sky-200 rounded-full">Con</span><span>dução</span>
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
    <header class="flex justify-center gap-10 items-center h-auto md:h-[400px] border-b border-b-gray-300 bg-cars bg-sky-50"
        style="">
        <div class="w-3/6 flex flex-col justify-center items-center">
            <div class="rounded-2xl p-2 flex flex-col justify-center items-center">
                <div class="text-xl md:text-6xl">Bem vindo!</div>
                <div class="my-4 bg-sky-50">A escola de condução Gervasio</div>
                <div class="text-center bg-sky-50">
                    Aqui, a gestão da sua secretaria é a nossa prioridade. Desde a sua inscrição até à marcação das aulas e
                    exames, a nossa equipa administrativa está sempre pronta para ajudar. Descomplicamos os processos
                    burocráticos para que se possa concentrar no que realmente importa: tornar-se um(a) condutor(a)
                    seguro(a) e confiante
                </div>
            </div>
            <div class="my-4 hidden md:block">
                @auth
                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        href="{{ route('profile') }}">
                        Perfil
                    </a>
                @else
                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        href="{{ route('login') }}">
                        Auntenticação
                    </a>
                @endauth
            </div>
        </div>
        <div>
            <img class="h-100 w-100 md:150" src="/img/car.png" />
        </div>
    </header>
    <section class="my-5 md:my-30 px-10 flex gap-5">
        <div class="w-full flex flex-col gap-5 justify-center md:px-10">
            <div class="text-xl md:text-3xl">Serviços</div>
            <div>
                O sistema é voltado para a gestão dos serviços administrativos da escola de condução, com foco em facilitar
                e organizar as atividades do setor de secretariado
            </div>
        </div>
        <div class="grid gap-10 grid-cols-1 md:grid-cols-2 md:w-7xl">
            @foreach ($servicos as $service)
                <div class={{ $service['color'] }}>
                    <div class="p-4">
                        <div class="mb-3">{{ $service['titulo'] }}</div>
                        <div>{{ $service['descricao'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
