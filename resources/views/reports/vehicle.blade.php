@extends('layout.reports')

@section('content')
    <h1>Relatório de Veículo</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>
                    Categoria
                </th>
                <th>
                    Matricula
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vehicles as $i => $vehicle)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>
                        {{ $vehicle->category->name }}
                    </td>
                    <td>
                        {{ $vehicle->license_plate }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="empty">Nenhum veículo encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:16px; font-size:10px; color:#6b7280;">
        Total: <strong>{{ $vehicles->count() }}</strong>
    </div>
@endsection
