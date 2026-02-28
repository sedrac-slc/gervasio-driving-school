@extends('layout.reports')

@section('content')
    <h1>Relatório de Instrutores</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data de registo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($instructors as $i => $instructor)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $instructor->user->name }}</td>
                    <td>{{ $instructor->user->email }}</td>
                    <td>{{ $instructor->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">Nenhum instrutor encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:16px; font-size:10px; color:#6b7280;">
        Total: <strong>{{ $instructors->count() }}</strong> instrutores
    </div>
@endsection
