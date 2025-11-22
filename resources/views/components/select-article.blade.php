  <label for="select-article" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleciona o artigo</label>
  <select id="select-article" name="article_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
  value="{{ $article->id ?? ''}}"
  >
    @foreach ($articles as $article)
        <option value="{{ $article->id }}">
            <span># {{ $article->name }} </span>
            <span class="font-extrabold">( {{ num_format($article->price) }} )</span>
        </option>
    @endforeach
  </select>
