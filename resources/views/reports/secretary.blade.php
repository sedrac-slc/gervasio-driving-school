@extends('layout.reports')

@section('content')
    <h1>Relatório de Secretários</h1>

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
            @forelse ($secretaries as $i => $secretary)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $secretary->user->name }}</td>
                    <td>{{ $secretary->user->email }}</td>
                    <td>{{ $secretary->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">Nenhum secretário encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:16px; font-size:10px; color:#6b7280;">
        Total: <strong>{{ $secretaries->count() }}</strong> estudantes
    </div>
@endsection
