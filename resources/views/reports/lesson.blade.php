@extends('layout.reports')

@section('content')
    <h1>Relatório de Lições</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Data de criação</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lessons as $i => $lesson)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $lesson->topic ?? '—' }}</td>
                    <td>{{ $lesson->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">Nenhuma lição encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:16px; font-size:10px; color:#6b7280;">
        Total: <strong>{{ $lessons->count() }}</strong> lições
    </div>
@endsection
