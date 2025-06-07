@extends('layout.dash')
@section('body')
    <a href="{{ route('articles.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Adicionar
    </a>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Preço
                    </th>
                    <th colspan="2" scope="col" class="px-6 py-3 text-center">
                        <span>Acção</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $article->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $article->price }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('articles.edit', $article->id) }}" class="font-medium text-xl text-blue-600 dark:text-blue-500 hover:underline">
                                <i class='bxr  bx-edit'></i>
                            </a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-xl text-red-600 dark:text-red-500 hover:underline">
                                <i class='bxr  bx-trash'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
