@extends('layout.default')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap');

    body { font-family: 'DM Sans', sans-serif; }
    .font-display { font-family: 'Sora', sans-serif; }

    /* Decorative side panel */
    .login-panel {
        background: linear-gradient(145deg, #1e3a8a 0%, #1d4ed8 40%, #2563eb 70%, #3b82f6 100%);
        position: relative;
        overflow: hidden;
    }

    .login-panel::before {
        content: '';
        position: absolute;
        top: -80px; right: -80px;
        width: 320px; height: 320px;
        border-radius: 50%;
        background: rgba(255,255,255,0.06);
    }

    .login-panel::after {
        content: '';
        position: absolute;
        bottom: -60px; left: -60px;
        width: 240px; height: 240px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
    }

    .login-panel-inner {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        width: 80%;
        z-index: 1;
    }

    /* Form fade-in */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeUp 0.6s cubic-bezier(0.22,1,0.36,1) both; }
    .delay-1 { animation-delay: 0.08s; }
    .delay-2 { animation-delay: 0.16s; }
    .delay-3 { animation-delay: 0.24s; }
    .delay-4 { animation-delay: 0.32s; }
    .delay-5 { animation-delay: 0.40s; }

    /* Input focus */
    .input-field:focus {
        box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
        border-color: #3b82f6;
    }

    /* Back link */
    .back-link {
        transition: gap 0.2s, color 0.2s;
    }
    .back-link:hover { color: #2563eb; gap: 0.5rem; }

    /* Submit button shine */
    .btn-submit {
        position: relative;
        overflow: hidden;
        transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    }
    .btn-submit::after {
        content: '';
        position: absolute;
        top: 0; left: -100%;
        width: 60%; height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transform: skewX(-20deg);
        transition: left 0.5s ease;
    }
    .btn-submit:hover::after { left: 150%; }
    .btn-submit:hover { transform: translateY(-1px); box-shadow: 0 8px 20px rgba(37,99,235,0.35); }
    .btn-submit:active { transform: translateY(0); }
</style>
@endpush

<div class="flex justify-center min-h-screen">

    {{-- ── Form Side ── --}}
    <div class="h-screen md:w-1/2 flex justify-center items-center bg-white relative">

        {{-- Back button --}}
        <div class="absolute top-5 left-5">
            <a class="back-link flex gap-2 items-center text-sm text-gray-400 hover:text-blue-600 font-medium px-3 py-2 rounded-xl transition-all" href="/">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Voltar
            </a>
        </div>

        <form class="w-full mx-auto md:px-10 lg:px-32 px-6" action="{{ route('login') }}" method="POST" novalidate>
            @csrf

            {{-- Header --}}
            <div class="fade-up delay-1 mb-8">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center mb-5 shadow-lg shadow-blue-200">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h1 class="font-display font-bold text-2xl text-gray-900 mb-1">Bem‑vindo de volta</h1>
                <p class="text-gray-400 text-sm">Introduza as suas credenciais para continuar</p>
            </div>

            {{-- Email --}}
            <div class="fade-up delay-2 mb-5">
                <x-input-field label="Email" name="email" value="{{ old('email') }}"
                    placeholder="nome@exemplo.com" class="input-field" />
            </div>

            {{-- Password --}}
            <div class="fade-up delay-3 mb-5">
                <x-input-field label="Senha" type="password" name="password" value="{{ old('password') }}" class="input-field" />
            </div>

            {{-- Remember me --}}
            <div class="fade-up delay-4 flex items-center mb-7">
                <input id="remember" type="checkbox" name="remember"
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 text-blue-600
                           focus:ring-2 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 cursor-pointer" />
                <label for="remember" class="ms-2 text-sm text-gray-500 dark:text-gray-300 cursor-pointer select-none">
                    Lembra-se de mim
                </label>
            </div>

            {{-- Submit --}}
            <div class="fade-up delay-5">
                <button type="submit"
                    class="btn-submit w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl py-3 text-sm
                           focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700">
                    Entrar
                </button>
            </div>

            {{-- Errors --}}
            @if ($errors->any())
                <div class="mt-4 p-3 bg-red-50 border border-red-100 rounded-xl text-sm text-red-500">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

        </form>
    </div>

    {{-- ── Decorative Side ── --}}
    <div class="login-page h-screen hidden md:flex md:w-1/2"></div>
</div>
