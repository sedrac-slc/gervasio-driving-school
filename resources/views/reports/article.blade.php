@extends('layout.reports')

@section('content')
    <h1>Relatório de Artigos</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $i => $article)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $article->name }}</td>
                    <td>{{ $article->price }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="empty">Nenhum artigo encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:16px; font-size:10px; color:#6b7280;">
        Total: <strong>{{ $articles->count() }}</strong>
    </div>
@endsection
