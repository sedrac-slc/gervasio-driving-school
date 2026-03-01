@extends('layout.reports')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500&display=swap');

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'DM Sans', sans-serif;
        background: #f0ebe3;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .receipt-wrapper {
        width: 100%;
        max-width: 560px;
        position: relative;
    }

    .receipt {
        background: #fff;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0,0,0,0.12), 0 4px 16px rgba(0,0,0,0.08);
        position: relative;
    }

    /* Decorative top bar */
    .receipt::before {
        content: '';
        display: block;
        height: 6px;
        background: linear-gradient(90deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
    }

    /* Header */
    .receipt-header {
        background: #1a1a2e;
        color: #fff;
        padding: 2rem 2.5rem 1.8rem;
        position: relative;
        overflow: hidden;
    }

    .receipt-header::after {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 140px;
        height: 140px;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,0.06);
    }

    .receipt-header::before {
        content: '';
        position: absolute;
        top: 20px;
        right: 20px;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,0.04);
    }

    .school-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        margin-bottom: 0.2rem;
    }

    .receipt-label {
        font-size: 0.7rem;
        font-weight: 400;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.5);
        margin-top: 0.5rem;
    }

    .receipt-number {
        font-size: 0.72rem;
        color: rgba(255,255,255,0.35);
        margin-top: 0.3rem;
        letter-spacing: 0.06em;
    }

    /* Status badge */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: rgba(34,197,94,0.15);
        border: 1px solid rgba(34,197,94,0.3);
        color: #4ade80;
        font-size: 0.65rem;
        font-weight: 500;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 0.3rem 0.75rem;
        border-radius: 20px;
        margin-top: 1rem;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        background: #4ade80;
        border-radius: 50%;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
    }

    /* Body */
    .receipt-body {
        padding: 2rem 2.5rem;
    }

    /* Amount highlight */
    .amount-section {
        text-align: center;
        padding: 1.5rem;
        background: #f8f6f2;
        border-radius: 8px;
        margin-bottom: 2rem;
        border: 1px solid #ede8df;
    }

    .amount-label {
        font-size: 0.65rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: #999;
        font-weight: 500;
        margin-bottom: 0.4rem;
    }

    .amount-value {
        font-family: 'Playfair Display', serif;
        font-size: 2.4rem;
        font-weight: 700;
        color: #1a1a2e;
        letter-spacing: -0.02em;
        line-height: 1;
    }

    .amount-currency {
        font-size: 1.1rem;
        font-weight: 600;
        vertical-align: super;
        margin-right: 2px;
    }

    /* Details grid */
    .details-section {
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 0.85rem 0;
        border-bottom: 1px solid #f0ece6;
        gap: 1rem;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-key {
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #aaa;
        flex-shrink: 0;
        padding-top: 1px;
    }

    .detail-value {
        font-size: 0.88rem;
        font-weight: 500;
        color: #1a1a2e;
        text-align: right;
    }

    /* Divider with icon */
    .section-divider {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin: 1.5rem 0;
        color: #ccc;
        font-size: 0.65rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .section-divider::before,
    .section-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #ede8df;
    }

    /* Serrated bottom edge */
    .receipt-tear {
        height: 20px;
        background: #f0ebe3;
        position: relative;
        margin-top: -1px;
    }

    .receipt-tear::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 20px;
        background: radial-gradient(circle at 10px 0, #f0ebe3 10px, #fff 10px);
        background-size: 20px 20px;
        background-repeat: repeat-x;
    }

    /* Footer */
    .receipt-footer {
        padding: 1.5rem 2.5rem 2rem;
        text-align: center;
        border-top: 1px dashed #e8e2d9;
    }

    .footer-date {
        font-size: 0.72rem;
        color: #bbb;
        letter-spacing: 0.06em;
    }

    .footer-note {
        font-size: 0.65rem;
        color: #ccc;
        margin-top: 0.4rem;
        letter-spacing: 0.04em;
    }

    /* Print button (hidden on print) */
    .print-btn {
        display: block;
        width: 100%;
        max-width: 560px;
        margin: 1.5rem auto 0;
        padding: 0.85rem;
        background: #1a1a2e;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.8rem;
        font-weight: 500;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        cursor: pointer;
        transition: background 0.2s;
    }

    .print-btn:hover { background: #0f3460; }

    @media print {
        body { background: #fff; padding: 0; }
        .print-btn { display: none; }
        .receipt { box-shadow: none; }
    }
</style>

<div class="receipt-wrapper">
    <div class="receipt">
        {{-- Header --}}
        <div class="receipt-header">
            <div class="school-name">{{ config('app.name', 'Gervasio Driving School') }}</div>
            <div class="receipt-label">Comprovativo de Pagamento</div>
            <div class="receipt-number">Ref. #{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</div>
            <div class="status-badge">
                <span class="status-dot"></span>
                Pago
            </div>
        </div>

        {{-- Body --}}
        <div class="receipt-body">

            {{-- Valor em destaque --}}
            <div class="amount-section">
                <div class="amount-label">Total Pago</div>
                <div class="amount-value">
                    <span class="amount-currency">Kz</span>{{ number_format($payment->article->price ?? 0, 2, ',', '.') }}
                </div>
            </div>

            {{-- Detalhes do artigo --}}
            <div class="details-section">
                <div class="detail-row">
                    <span class="detail-key">Artigo</span>
                    <span class="detail-value">{{ $payment->article->name ?? '—' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Preço</span>
                    <span class="detail-value">Kz {{ number_format($payment->article->price ?? 0, 2, ',', '.') }}</span>
                </div>
            </div>

            <div class="section-divider">Estudante</div>

            {{-- Detalhes do estudante --}}
            <div class="details-section">
                <div class="detail-row">
                    <span class="detail-key">Nome</span>
                    <span class="detail-value">{{ $payment->enrolment->student->user->name ?? '—' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Turma</span>
                    <span class="detail-value">{{ $payment->enrolment->classroom ?? '—' }}</span>
                </div>
                @if($payment->enrolment->student->bi ?? false)
                <div class="detail-row">
                    <span class="detail-key">Nº BI</span>
                    <span class="detail-value">{{ $payment->enrolment->student->bi }}</span>
                </div>
                @endif
            </div>

        </div>

        {{-- Borda serrilhada + footer --}}
        <div class="receipt-tear"></div>
        <div class="receipt-footer">
            <div class="footer-date">
                Emitido em {{ \Carbon\Carbon::parse($payment->created_at)->format('d \d\e F \d\e Y') }}
            </div>
            <div class="footer-note">Este documento serve como comprovativo oficial de pagamento.</div>
        </div>
    </div>

    <button class="print-btn" onclick="window.print()">🖨 Imprimir Comprovativo</button>
</div>
@endsection
