<div>
    <label for="search-input-student" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Escolher estudante
    </label>
    <div class="flex gap-1 mt-1">
        <input type="search" id="search-input-student" name="search"
            class="block w-full p-2.5 text-sm text-gray-900 border rounded-lg bg-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Clica no botão" required disabled />
        <button data-modal-target="default-modal-student" data-modal-toggle="default-modal-student"
            class="text-white bg-blue-700 rounded-lg px-4 py-2.5 text-sm font-medium hover:bg-blue-800" type="button">
            Pesquisar
        </button>
    </div>
</div>

<!-- Input hidden para guardar o ID selecionado -->
<input type="hidden" id="student_id" name="student_id" />

<!-- Main modal -->
<div id="default-modal-student" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full md:max-w-5xl max-h-full">
        <div class="relative bg-white border rounded-lg shadow-sm p-4 md:p-6">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b pb-4">
                <h3 class="text-lg font-medium">Pesquisar estudante</h3>
                <button type="button" data-modal-hide="default-modal-student"
                    class="text-gray-500 hover:bg-gray-200 rounded-lg w-9 h-9 flex justify-center items-center">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="py-4">
                <!-- Input de busca com HTMX -->
                <input type="search" id="search-request" name="search" hx-get="{{ route('students.search-input') }}"
                    hx-trigger="keyup changed delay:300ms" hx-target="#search-results" hx-indicator="#search-spinner"
                    class="block w-full p-4 text-sm border rounded-lg bg-gray-50"
                    placeholder="Digite código, nome do estudante..." />

                <!-- Loading indicator -->
                <div id="search-spinner" class="htmx-indicator text-center">
                    <svg class="animate-spin h-5 w-5 mx-auto text-blue-600" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4" />
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                    </svg>
                </div>

                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs uppercase bg-gray-50">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Nome</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Ação</th>
                        </tr>
                    </thead>
                    <tbody id="search-results">
                        <!-- Resultados HTMX aparecem aqui -->
                    </tbody>
                </table>
            </div>

            <!-- Modal footer -->
            <div class="flex items-center border-t pt-4 space-x-4">
                <button data-modal-hide="default-modal-student" type="button"
                    class="text-white bg-blue-700 rounded-lg px-4 py-2.5 text-sm font-medium">
                    Confirmar
                </button>
                <button data-modal-hide="default-modal-student" type="button"
                    class="text-gray-700 bg-gray-200 rounded-lg px-4 py-2.5 text-sm font-medium">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function selectStudent(id, name) {
        document.getElementById('student_id').value = id;
        document.getElementById('search-input-student').value = name;

        const modalEl = document.getElementById('default-modal-student');
        const modal = FlowbiteInstances.getInstance('Modal', 'default-modal-student');

        if (modal) {
            modal.hide();
        } else {
            modalEl.classList.add('hidden');
            modalEl.setAttribute('aria-hidden', 'true');
            modalEl.removeAttribute('aria-modal');
            document.body.classList.remove('overflow-hidden');
        }
    }

    function onEditStudent(id) {
        const studentInput = document.querySelector('#search-input-student');
        if (studentInput) {
            const item2 = document.querySelector(`#table-user-name-${id}`)
            if (item2) document.getElementById('student_id').value = item2.getAttribute('data-id');
            studentInput.value = item2.innerHTML.trim() || ''
        }
    }
</script>
