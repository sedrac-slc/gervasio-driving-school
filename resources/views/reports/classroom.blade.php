@extends('layout.reports')

@section('content')
    <h1>Relatório de Turmas</h1>
    <table>
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Periódo</th>
                <th>Hora começo</th>
                <th>Hora termino</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($classrooms as $classroom)
                <tr>
                    <td>{{ $classroom->category->name }}</td>
                    <td>{{ $classroom->period() }}</td>
                    <td>{{ $classroom->starter }}</td>
                    <td>{{ $classroom->finished }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">Nenhuma turma encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        Total: <strong>{{ $classrooms->count() }}</strong>
    </div>
@endsection
