@extends('layout.dash')
@section('body')
    <div id="accordion-collapse" data-accordion="collapse" class="bg-white rounded-lg">
        <h2 id="accordion-collapse-heading-1">
            <button type="button"
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
            @include('auth.category.form')
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
                <x-input-search href="{{ route('categories.search') }}" />
                <x-button-create href="{{ route('categories.store') }}" />
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
                                Preço
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Prestação
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Completado
                            </th>
                            <th colspan="2" scope="col" class="px-6 py-3 text-center">
                                <span>Acção</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"  id="table-name-{{ $category->id }}"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $category->name }}
                                </th>
                                <td class="px-6 py-4" id="table-price-{{ $category->id }}">
                                    {{ $category->price }}
                                </td>
                                <td class="px-6 py-4" id="table-installment-{{ $category->id }}">
                                    {{ $category->installment }}
                                </td>
                                <td class="px-6 py-4" id="table-completed_installment-{{ $category->id }}">
                                    {{ num_format($category->completed_installment) }}
                                </td>
                                <td class="px-6 py-4 text-center flex items-center gap-10 justify-center">
                                    <x-link-edit href="{{ route('categories.update', $category->id) }}" redirect
                                        json="{{ $category->id }}" />
                                    <x-link-delete href="{{ route('categories.destroy', $category->id) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('components.custom.table-links', ['links' => $categories])
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
            const priceInput = form.querySelector('input[name="price"]');
            const installmentInput = form.querySelector('input[name="installment"]');
            const completedInstallmentInput = form.querySelector('input[name="completed_installment"]');

            if (nameInput) nameInput.value = document.querySelector(`#table-name-${id}`).innerHTML.trim() || '';
            if (priceInput) priceInput.value = parseFloat(document.querySelector(`#table-price-${id}`).innerHTML.trim()) ||'';
            if (installmentInput) installmentInput.value = parseFloat(document.querySelector(`#table-installment-${id}`).innerHTML.trim()) ||'';
            if (completedInstallmentInput) completedInstallmentInput.value = parseFloat(document.querySelector(`#table-completed_installment-${id}`).innerHTML.trim()) ||'';

            form.action = link.getAttribute('data-url');

            const methodInput = form.querySelector('input[name="_method"]');

            if (methodInput) {
                methodInput.value = 'PUT';
                const panel = document.querySelector('[data-accordion-target="#accordion-collapse-body-1"] span')
                panel.innerHTML = "Editar"
            }
        }
    </script>
@endsection
