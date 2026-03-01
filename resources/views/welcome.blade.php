@extends('layout.default')

@php
    $servicos = [
        [
            'color'    => 'bg-blue-300',
            'icon'     => '📋',
            'titulo'   => 'Matrículas Facilitadas',
            'descricao'=> 'O sistema permite ao secretariado gerir de forma simples e rápida a matrícula dos alunos, garantindo organização e eficiência.',
        ],
        [
            'color'    => 'bg-yellow-300',
            'icon'     => '📝',
            'titulo'   => 'Gestão de Exames',
            'descricao'=> 'Com a marcação automatizada de exames teóricos e práticos, o secretariado poupa tempo e evita conflitos de agendamento.',
        ],
        [
            'color'    => 'bg-green-300',
            'icon'     => '💳',
            'titulo'   => 'Controlo de Pagamentos',
            'descricao'=> 'Acompanhe os pagamentos de forma segura e organizada, com histórico detalhado e notificações para alunos e responsáveis.',
        ],
        [
            'color'    => 'bg-red-300',
            'icon'     => '📊',
            'titulo'   => 'Relatórios Automatizados',
            'descricao'=> 'Gere relatórios completos com poucos cliques, otimizando o trabalho do secretariado e facilitando a tomada de decisões.',
        ],
    ];
@endphp

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap');

    body { font-family: 'DM Sans', sans-serif; }

    .font-display { font-family: 'Sora', sans-serif; }

    /* Fade-up animation */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(28px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-up {
        opacity: 0;
        animation: fadeUp 0.7s cubic-bezier(0.22,1,0.36,1) forwards;
    }

    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.22s; }
    .delay-3 { animation-delay: 0.34s; }
    .delay-4 { animation-delay: 0.46s; }

    /* Floating car */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50%       { transform: translateY(-12px); }
    }
    .car-float { animation: float 4s ease-in-out infinite; }

    /* Service card hover */
    .service-card {
        transition: transform 0.25s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.25s ease;
    }
    .service-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }

    /* Nav brand */
    .brand-letter { transition: color 0.2s; }
    .brand-letter:hover { color: #3b82f6; }

    /* CTA button shine */
    .btn-cta {
        position: relative;
        overflow: hidden;
    }
    .btn-cta::after {
        content: '';
        position: absolute;
        top: 0; left: -100%;
        width: 60%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
        transform: skewX(-20deg);
        transition: left 0.5s ease;
    }
    .btn-cta:hover::after { left: 150%; }
</style>
@endpush

@section('content')

{{-- ════════════════════════════ NAVBAR ════════════════════════════ --}}
<nav class="sticky top-0 z-50 border-b border-gray-200 bg-white/80 backdrop-blur-md dark:bg-gray-900/80 dark:border-gray-700">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto px-4 py-3">

        {{-- Brand --}}
        <a href="#" class="flex items-center gap-2">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                    <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1v-1h3.05a2.5 2.5 0 014.9 0H19a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0017 6h-3V5a1 1 0 00-1-1H3z"/>
                </svg>
            </div>
            <span class="font-display font-700 text-gray-900 dark:text-white tracking-tight text-lg">
                <span class="brand-letter font-extrabold text-blue-600">G</span>ervasio
                <span class="text-gray-400 font-light">·</span>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Condução</span>
            </span>
        </a>

        {{-- Desktop auth --}}
        <div class="hidden md:flex items-center gap-3">
            @auth
                <a href="{{ route('profile') }}"
                   class="btn-cta inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Perfil
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="btn-cta inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-5 py-2 rounded-lg transition-colors duration-200">
                    Entrar
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            @endauth
        </div>

        {{-- Mobile toggle --}}
        <button data-collapse-toggle="navbar-solid-bg" type="button"
            class="md:hidden inline-flex items-center justify-center p-2 w-10 h-10 text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700"
            aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Abrir menu</span>
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
    </div>
</nav>


{{-- ════════════════════════════ HERO ════════════════════════════ --}}
<header class="relative overflow-hidden bg-sky-50 bg-cars border-b border-gray-200">

    {{-- Decorative circles --}}
    <div class="absolute -top-20 -right-20 w-72 h-72 bg-blue-100 rounded-full opacity-50 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-sky-200 rounded-full opacity-40 blur-2xl pointer-events-none"></div>

    <div class="relative max-w-screen-xl mx-auto px-6 py-16 md:py-24 flex flex-col md:flex-row items-center gap-12">

        {{-- Text --}}
        <div class="flex-1 flex flex-col items-center md:items-start text-center md:text-left">

            {{-- Eyebrow --}}
            <div class="animate-fade-up delay-1 inline-flex items-center gap-2 bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1.5 rounded-full mb-6 tracking-wide">
                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                Escola de Condução
            </div>

            <h1 class="animate-fade-up delay-2 font-display font-extrabold text-4xl md:text-6xl text-gray-900 leading-[1.1] tracking-tight mb-5">
                Bem‑vindo à<br>
                <span class="text-blue-600">Gervasio</span>
            </h1>

            <p class="animate-fade-up delay-3 text-gray-500 text-base md:text-lg leading-relaxed max-w-md mb-8">
                Desde a inscrição até à marcação de aulas e exames, a nossa equipa administrativa descomplicamos os processos para que se concentre em tornar-se um(a) condutor(a) seguro(a).
            </p>

            <div class="animate-fade-up delay-4 flex flex-wrap gap-3 justify-center md:justify-start">
                @auth
                    <a href="{{ route('profile') }}"
                       class="btn-cta inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-colors text-sm shadow-lg shadow-blue-200">
                        Aceder ao perfil
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="btn-cta inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-colors text-sm shadow-lg shadow-blue-200">
                        Autenticação
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="#servicos"
                       class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-700 font-semibold px-6 py-3 rounded-xl border border-gray-200 transition-colors text-sm">
                        Saber mais
                    </a>
                @endauth
            </div>
        </div>

        {{-- Car image --}}
        <div class="flex-shrink-0 car-float">
            <img src="/img/car.png" alt="Carro" class="w-72 md:w-[420px] drop-shadow-2xl" />
        </div>
    </div>
</header>


{{-- ════════════════════════════ SERVICES ════════════════════════════ --}}
<section id="servicos" class="max-w-screen-xl mx-auto px-6 py-16 md:py-24">

    {{-- Section header --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12">
        <div>
            <p class="text-blue-600 text-xs font-semibold tracking-widest uppercase mb-2">O que oferecemos</p>
            <h2 class="font-display font-bold text-3xl md:text-4xl text-gray-900 leading-tight">
                Serviços para o<br class="hidden md:block"> secretariado
            </h2>
        </div>
        <p class="text-gray-400 text-sm max-w-xs leading-relaxed">
            Ferramentas pensadas para facilitar a gestão administrativa da sua escola de condução.
        </p>
    </div>

    {{-- Cards grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($servicos as $i => $service)
            <div class="service-card {{ $service['color'] }} rounded-2xl p-6 flex flex-col gap-4 cursor-default">
                {{-- Icon --}}
                <div class="w-12 h-12 bg-white/60 rounded-xl flex items-center justify-center text-2xl shadow-sm">
                    {{ $service['icon'] }}
                </div>
                {{-- Text --}}
                <div>
                    <h3 class="font-display font-bold text-gray-900 text-base mb-2 leading-snug">
                        {{ $service['titulo'] }}
                    </h3>
                    <p class="text-gray-700/80 text-sm leading-relaxed">
                        {{ $service['descricao'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</section>


{{-- ════════════════════════════ FOOTER ════════════════════════════ --}}
<footer class="border-t border-gray-100 bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between gap-3">
        <span class="font-display font-semibold text-gray-400 text-sm tracking-tight">
            © {{ date('Y') }} Gervasio Condução
        </span>
        <span class="text-gray-300 text-xs">Sistema de Gestão de Secretariado</span>
    </div>
</footer>

@endsection
