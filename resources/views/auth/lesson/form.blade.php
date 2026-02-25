<form class="p-2 rounded-2xl" method="POST" action="{{ route('lessons.store') }}" id="form-action">
    @csrf
    @method('POST')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-3">
        <div>
            <x-input-field label="Digita o tópico" name="topic" value="{{ $lesson->topic ?? old('topic') }}" />
        </div>
        <div>
            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Escolha um tipo
            </label>
            <select id="type" name="type"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Seleciona um tipo</option>
                <option value="TEORIC">Teórica</option>
                <option value="DRIVER">Prática</option>
            </select>
        </div>
    </div>
    <x-submit-confirm />
</form>
