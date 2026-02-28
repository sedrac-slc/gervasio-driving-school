  <label for="select-lesson-topic-teoric" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleciona a lição</label>
  <select id="select-lesson-topic-teoric" name="lesson_id"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
      value="{{ $lesson->id ?? '' }}">
      @foreach ($lessons as $lesson)
          <option value="{{ $lesson->id }}">{{ $lesson->topic }}</option>
      @endforeach
  </select>
