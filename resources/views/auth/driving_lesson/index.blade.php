@extends('layout.dash')
@section('body')
    <x-link-add href="{{ route('classrooms.create') }}" />
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Periódo
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
                @foreach ($classrooms as $classroom)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $classroom->category->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $classroom->period() }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $classroom->starter }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $classroom->finished }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('classrooms.edit', $classroom->id) }}" class="font-medium text-xl text-blue-600 dark:text-blue-500 hover:underline">
                                <i class='bxr  bx-edit'></i>
                            </a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <x-link-delete href="{{ route('classrooms.destroy', $classroom->id) }}"/>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-modal-delete/>
@endsection
