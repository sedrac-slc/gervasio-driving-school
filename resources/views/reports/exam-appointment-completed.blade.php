@extends('layout.reports')

@section('content')
    <h1>{{ $title }}</h1>

    <table>
        <thead>
            <tr>
                <th>Estudante</th>
                <th>Matrícula</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($examAppointments as $exam)
                <tr>
                    <td>{{ $exam->enrolment->student->user->name }}</td>
                    <td>{{ $exam->enrolment->code }}</td>
                    <td>{{ format_date($exam->date) }}</td>
                    <td>{{ format_time($exam->hour) }}</td>
                    <td>
                        <span class="badge">
                            {{ $exam->approved ? 'Aprovado' : 'Concluído' }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="empty">Nenhum registo encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:16px; font-size:10px; color:#6b7280;">
        Total de registos: <strong>{{ $examAppointments->count() }}</strong>
    </div>
@endsection
