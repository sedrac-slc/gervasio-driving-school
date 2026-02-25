@extends('layout.dash')
@section('body')
    <div id="accordion-collapse" data-accordion="collapse" class="bg-white rounded-lg">
        <h2 id="accordion-collapse-heading-1">
            <button type="button" onclick="showInputPassword()"
                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                aria-controls="accordion-collapse-body-1">
                <span>Adicionar</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="false"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            @include('auth.instructor.form')
        </div>

        <h2 id="accordion-collapse-heading-2">
            <button type="button"
                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                data-accordion-target="#accordion-collapse-body-2" aria-expanded="true"
                aria-controls="accordion-collapse-body-2">
                <span>Listar</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
            <div class="flex flex-col md:flex-row gap-2 items-center justify-between m-2">
                <x-input-search href="{{ route('instructors.search') }}" />
                <x-button-create href="{{ route('instructors.store') }}" />
            </div>
            <div class="relative overflow-x-auto shadow-md my-3">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400 border-x border-x-[#ccc]">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th colspan="1" scope="col" class="px-6 py-3 text-center">
                                <span>Acção</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instructors as $instructor)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" id="table-name-{{ $instructor->id }}"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $instructor->user->name }}
                                </th>
                                <td class="px-6 py-4" id="table-email-{{ $instructor->id }}">
                                    {{ $instructor->user->email }}
                                </td>
                                <td class="px-6 py-4 text-center flex items-center gap-10 justify-center">
                                    <x-link-edit href="{{ route('instructors.update', $instructor->id) }}" redirect
                                        json="{{ $instructor->id }}" />
                                    <x-link-delete href="{{ route('instructors.destroy', $instructor->id) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('components.custom.table-links', ['links' => $instructors])
            </div>
        </div>
    </div>

    <x-modal-delete />

    <script>
        document.querySelectorAll('.btn-edit').forEach(it => {
            it.addEventListener('click', (event) => {
                formEdit(event)
            })
        })

        function formEdit(event) {
            event.preventDefault();
            const link = event.currentTarget;

            const id = link.getAttribute('data-json');
            const form = document.getElementById('form-action');
            const nameInput = form.querySelector('input[name="name"]');
            const emailInput = form.querySelector('input[name="email"]');

            if (nameInput) nameInput.value = document.querySelector(`#table-name-${id}`).innerHTML.trim() || '';
            if (emailInput) emailInput.value = document.querySelector(`#table-email-${id}`).innerHTML.trim() || '';

            form.action = link.getAttribute('data-url');

            const methodInput = form.querySelector('input[name="_method"]');

            if (methodInput) {
                methodInput.value = 'PUT';
                const panel = document.querySelector('[data-accordion-target="#accordion-collapse-body-1"] span')
                panel.innerHTML = "Editar"
            }

            document.querySelectorAll('.hidden-input-password').forEach(it => {
                if (!it.classList.contains('hidden')) {
                    it.classList.add('hidden');
                    const input = it.querySelector('input')
                    if (input) input.removeAttribute('required');
                }
            })
        }

        function showInputPassword() {
            const form = document.getElementById('form-action');
            const nameInput = form.querySelector('input[name="name"]');
            const emailInput = form.querySelector('input[name="email"]');

            if (nameInput) nameInput.value = '';
            if (emailInput) emailInput.value = '';

            const methodInput = form.querySelector('input[name="_method"]');
            if (methodInput) methodInput.value = 'POST';

            document.querySelectorAll('.hidden-input-password').forEach(it => {
                if (it.classList.contains('hidden')) it.classList.remove('hidden');
            })
        }

        document.getElementById('btn-create').addEventListener('click', () => {
            clearInputForm()
            showInputPassword()
        })
    </script>
@endsection
