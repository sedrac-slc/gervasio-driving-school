@extends('layout.reports')

@section('content')
    <h1>Relatório de Categorias</h1>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead>
            <tr>
                <th>
                    Nome
                </th>
                <th>
                    Preço
                </th>
                <th>
                    Prestação
                </th>
                <th>
                    Completado
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->price }}
                    </td>
                    <td>
                        {{ $category->installment }}
                    </td>
                    <td>
                        {{ num_format($category->completed_installment) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">Nenhuma categoria encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:16px; font-size:10px; color:#6b7280;">
        Total: <strong>{{ $categories->count() }}</strong>
    </div>
@endsection
