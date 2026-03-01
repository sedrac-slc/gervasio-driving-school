@extends('layout.dash')
@section('body')
    <div id="accordion-collapse" data-accordion="collapse" class="bg-white rounded-lg">
        <h2 id="accordion-collapse-heading-1">
            <x-accordion-button label="Adicionar" target="accordion-collapse-body-1" />
        </h2>
        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                @include('auth.lesson.form')
            </div>
        </div>

        <h2 id="accordion-collapse-heading-3">
            <button type="button"
                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                aria-controls="accordion-collapse-body-3">
                <span>Relátorio</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="false"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-5 p-2">
                <x-link-report-pdf href="{{ route('report.teoric_lesson') }}" label="Aulas teóricas" />
                <x-link-report-pdf href="{{ route('report.driving_lesson') }}" label="Aulas praticas" />
            </div>
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
                <x-input-search href="{{ route('lessons.search') }}" />
                <div class="flex gap-1">
                    <x-link-report-pdf href="{{ route('report.lesson') }}" label="Exporta" />
                    <x-button-create href="{{ route('lessons.store') }}" />
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md my-3">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400 border-x border-x-[#ccc]">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Tópico
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo
                            </th>
                            <th colspan="1" scope="col" class="px-6 py-3 text-center">
                                <span>Acção</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessons as $lesson)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" id="table-topic-{{ $lesson->id }}"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $lesson->topic }}
                                </th>
                                <td class="px-6 py-4" id="table-type-{{ $lesson->id }}" data-type="{{ $lesson->type }}">
                                    {{ $lesson->labelTopic() }}
                                </td>
                                <td class="px-6 py-4 text-center flex items-center gap-10 justify-center">
                                    <x-link-edit href="{{ route('lessons.update', $lesson->id) }}" redirect
                                        json="{{ $lesson->id }}" />
                                    <x-link-delete href="{{ route('lessons.destroy', $lesson->id) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('components.custom.table-links', ['links' => $lessons])
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
            const topicInput = form.querySelector('input[name="topic"]');
            const typeSelect = form.querySelector('select[name="type"]');

            if (topicInput) topicInput.value = document.querySelector(`#table-topic-${id}`).innerHTML.trim() || '';
            if (typeSelect) {
                const item = document.querySelector(`#table-type-${id}`);
                if (item) {
                    typeSelect.value = item.getAttribute('data-type') || '';
                }
            }

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
