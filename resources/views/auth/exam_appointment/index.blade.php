@extends('layout.dash')
@section('body')
    <div id="accordion-collapse" data-accordion="collapse" class="bg-white rounded-lg">
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
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-5">
                <x-link-report-pdf href="{{ route('report.exam-appointment.approved') }}" label="Exames aprovados" />
                <x-link-report-pdf href="{{ route('report.exam-appointment.completed') }}" label="Exames completados" />
            </div>
        </div>

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
            @include('auth.exam_appointment.form')
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
                <x-input-search href="{{ route('exam_appointments.search') }}" />
                <x-button-create href="{{ route('exam_appointments.store') }}" />
            </div>
            <div class="relative overflow-x-auto shadow-md my-3">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Estudante
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Matricula
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data realização
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hora realização
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Completado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aprovado
                            </th>
                            <th colspan="2" scope="col" class="px-6 py-3 text-center">
                                <span>Acção</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($examAppointments as $examAppointment)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $examAppointment->enrolment->student->user->name }}
                                </th>
                                <td class="px-6 py-4" id="table-enrolment-code-{{ $examAppointment->id }}"
                                    data-id="{{ $examAppointment->enrolment->id }}">
                                    {{ $examAppointment->enrolment->code }}
                                </td>
                                <td class="px-6 py-4" id="table-data-{{ $examAppointment->id }}">
                                    {{ format_date($examAppointment->date) }}
                                </td>
                                <td class="px-6 py-4" id="table-hour-{{ $examAppointment->id }}">
                                    {{ format_time($examAppointment->hour) }}
                                </td>
                                <td class="px-6 py-4" id="table-completed-{{ $examAppointment->id }}">
                                    @if ($examAppointment->completed)
                                        <div class="bg bg-green-300 px-2">Sim</div>
                                    @else
                                        <div class="bg bg-red-300 px-2">Não</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4" id="table-approved-{{ $examAppointment->id }}">
                                    @if ($examAppointment->approved)
                                        <div class="bg bg-green-300 px-2">Sim</div>
                                    @else
                                        <div class="bg bg-red-300 px-2">Não</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center flex items-center gap-10 justify-center">
                                    <x-link-edit href="{{ route('exam_appointments.update', $examAppointment->id) }}"
                                        redirect json="{{ $examAppointment->id }}" />
                                    <x-link-delete href="{{ route('exam_appointments.destroy', $examAppointment->id) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('components.custom.table-links', ['links' => $examAppointments])
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
            const dateInput = form.querySelector('input[name="date"]');
            const hourInput = form.querySelector('input[name="hour"]');

            if (dateInput) dateInput.value = document.querySelector(`#table-data-${id}`).innerHTML.trim() || '';
            if (hourInput) hourInput.value = document.querySelector(`#table-hour-${id}`).innerHTML.trim() || '';

            form.action = link.getAttribute('data-url');

            const methodInput = form.querySelector('input[name="_method"]');

            if (methodInput) {
                methodInput.value = 'PUT';
                const panel = document.querySelector('[data-accordion-target="#accordion-collapse-body-1"] span')
                panel.innerHTML = "Editar"
            }

            onEditEnrolment(id)
        }
    </script>
@endsection
