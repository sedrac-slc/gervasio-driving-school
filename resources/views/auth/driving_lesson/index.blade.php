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
            @include('auth.driving_lesson.form')
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
                <x-input-search href="{{ route('driving_lessons.search') }}" />
                <x-button-create href="{{ route('driving_lessons.store') }}" />
            </div>
            <div class="relative overflow-x-auto shadow-md my-3">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Instrutor
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Lição
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Matrícula
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estudante
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Veiculo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hora começo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hora termino
                            </th>
                            <th colspan="2" scope="col" class="px-6 py-3 text-center">
                                <span>Acção</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drivingLessons as $drivingLesson)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                    id="table-instructor-{{ $drivingLesson->id }}"
                                    data-id="{{ $drivingLesson->instructor->id }}">
                                    {{ $drivingLesson->instructor->user->name }}
                                </th>
                                <td class="px-6 py-4" id="table-lesson-{{ $drivingLesson->id }}"
                                    data-id="{{ $drivingLesson->lesson->id }}">
                                    {{ $drivingLesson->lesson->topic }}
                                </td>
                                <td class="px-6 py-4" id="table-enrolment-code-{{ $drivingLesson->id }}"
                                    data-id="{{ $drivingLesson->enrolment->id }}">
                                    {{ $drivingLesson->enrolment->code }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $drivingLesson->enrolment->student->user->name }}
                                </td>
                                <td class="px-6 py-4" id="table-vehicle-{{ $drivingLesson->id }}"
                                    data-id="{{ $drivingLesson->vehicle->id }}">
                                    {{ $drivingLesson->vehicle->license_plate }}
                                </td>
                                <td class="px-6 py-4" id="table-starter-{{ $drivingLesson->id }}">
                                    {{ $drivingLesson->starter }}
                                </td>
                                <td class="px-6 py-4" id="table-finished-{{ $drivingLesson->id }}">
                                    {{ $drivingLesson->finished }}
                                </td>
                                <td class="px-6 py-4 text-center flex items-center gap-10 justify-center">
                                    <x-link-edit href="{{ route('driving_lessons.update', $drivingLesson->id) }}" redirect
                                        json="{{ $drivingLesson->id }}" />
                                    <x-link-delete href="{{ route('driving_lessons.destroy', $drivingLesson->id) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('components.custom.table-links', ['links' => $drivingLessons])
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
            const starterInput = form.querySelector('input[name="starter"]');
            const finishedInput = form.querySelector('input[name="finished"]');

            const selectLesson = form.querySelector('select[name="lesson_id"]')
            const selectVehicle = form.querySelector('select[name="vehicle_id"]')
            const selectInstructor = form.querySelector('select[name="instructor_id"]')

            if (starterInput) starterInput.value = document.querySelector(`#table-starter-${id}`).innerHTML.trim() || '';
            if (finishedInput) finishedInput.value = document.querySelector(`#table-finished-${id}`).innerHTML.trim() || '';

            if (selectLesson) {
                const item1 = document.querySelector(`#table-lesson-${id}`)
                if (item1) selectLesson.value = item1.getAttribute('data-id')
            }

            if (selectVehicle) {
                const item2 = document.querySelector(`#table-vehicle-${id}`)
                if (item2) selectVehicle.value = item2.getAttribute('data-id')
            }

            if (selectInstructor) {
                const item3 = document.querySelector(`#table-instructor-${id}`)
                if (item3) selectInstructor.value = item3.getAttribute('data-id')
            }

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
