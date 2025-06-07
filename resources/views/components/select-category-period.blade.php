<label for="select-period" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
    Seleciona o periódo
</label>
<select id="select-period" name="period"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    value="{{ $clasroom->period ?? '' }}">
    <option value="MORNING">Manhã</option>
    <option value="AFTERNOON">Tarde</option>
    <option value="NIGHT">Noite</option>
</select>
