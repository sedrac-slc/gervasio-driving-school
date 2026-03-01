@extends('layout.reports')

@section('content')
    <h1>Relatório de Pagamentos</h1>

    <table>
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3">
                    Matricula
                </th>
                <th scope="col" class="px-6 py-3">
                    Utilizador
                </th>
                <th scope="col" class="px-6 py-3">
                    Artigo
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payments as $i => $payment)
                <tr>
                    <td>
                        {{ $payment->enrolment->code }}
                    </td>
                    <td>
                        {{ $payment->enrolment->student->user->name }}
                    </td>
                    <td>
                        {{ $payment->article->name }}
                    </td>
                    <td>
                        {{ $payment->article->price }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">Nenhum pagamento encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:16px; font-size:10px; color:#6b7280;">
        Total: <strong>{{ $payments->count() }}</strong> pagamento
    </div>
@endsection
