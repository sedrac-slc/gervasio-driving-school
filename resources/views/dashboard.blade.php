@extends('layout.dash')

@section('body')
<div class="min-h-screen bg-white text-gray-100 p-6 md:p-10">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-extrabold tracking-tight text-black">
            Visão <span class="text-green-400">Geral</span>
        </h1>
        <span class="text-xs font-semibold uppercase tracking-widest px-3 py-1 rounded-full bg-green-400/10 text-green-400 border border-green-400/20">
            Painel Principal
        </span>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">

        <div class="bg-gray-900 border border-white/5 rounded-2xl p-5 hover:-translate-y-1 hover:border-green-400/30 transition-all duration-200">
            <div class="w-9 h-9 rounded-xl bg-green-400/10 flex items-center justify-center text-lg mb-4">🎓</div>
            <p class="text-xs font-semibold uppercase tracking-widest text-gray-500 mb-1">Estudantes</p>
            <p class="text-3xl font-extrabold text-white">{{ $student }}</p>
        </div>

        <div class="bg-gray-900 border border-white/5 rounded-2xl p-5 hover:-translate-y-1 hover:border-green-400/30 transition-all duration-200">
            <div class="w-9 h-9 rounded-xl bg-blue-400/10 flex items-center justify-center text-lg mb-4">👨‍🏫</div>
            <p class="text-xs font-semibold uppercase tracking-widest text-gray-500 mb-1">Instrutores</p>
            <p class="text-3xl font-extrabold text-white">{{ $instructor }}</p>
        </div>

        <div class="bg-gray-900 border border-white/5 rounded-2xl p-5 hover:-translate-y-1 hover:border-green-400/30 transition-all duration-200">
            <div class="w-9 h-9 rounded-xl bg-yellow-400/10 flex items-center justify-center text-lg mb-4">🚗</div>
            <p class="text-xs font-semibold uppercase tracking-widest text-gray-500 mb-1">Veículos</p>
            <p class="text-3xl font-extrabold text-white">{{ $vehicle }}</p>
        </div>

        <div class="bg-gray-900 border border-white/5 rounded-2xl p-5 hover:-translate-y-1 hover:border-green-400/30 transition-all duration-200">
            <div class="w-9 h-9 rounded-xl bg-purple-400/10 flex items-center justify-center text-lg mb-4">📋</div>
            <p class="text-xs font-semibold uppercase tracking-widest text-gray-500 mb-1">Lições</p>
            <p class="text-3xl font-extrabold text-white">{{ $lesson }}</p>
        </div>

    </div>

    {{-- Table Section --}}
    <div class="flex items-center gap-4 mb-4">
        <h2 class="text-sm font-bold text-black whitespace-nowrap">Últimas Marcações Aprovadas</h2>
        <div class="flex-1 h-px bg-green-900"></div>
    </div>

    <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800/60">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-widest text-gray-500">Estudante</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-widest text-gray-500">Matrícula</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-widest text-gray-500">Data</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-widest text-gray-500">Hora</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-widest text-gray-500">Estado</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($examAppointments as $examAppointment)
                    <tr class="hover:bg-gray-800/50 transition-colors duration-150">
                        <td class="px-5 py-4 font-medium text-white">
                            {{ $examAppointment->enrolment->student->user->name }}
                        </td>
                        <td class="px-5 py-4 text-gray-400">
                            {{ $examAppointment->enrolment->code }}
                        </td>
                        <td class="px-5 py-4 text-gray-400">
                            {{ format_date($examAppointment->date) }}
                        </td>
                        <td class="px-5 py-4 text-gray-400">
                            {{ format_time($examAppointment->hour) }}
                        </td>
                        <td class="px-5 py-4">
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wide px-2.5 py-1 rounded-full bg-green-400/10 text-green-400 border border-green-400/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
                                Aprovado
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-10 text-center text-gray-500">
                            Nenhuma marcação encontrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
