<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #1f2937;
            background: #fff;
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #16a34a;
            padding-bottom: 16px;
            margin-bottom: 24px;
        }

        .header .org {
            font-size: 18px;
            font-weight: 700;
            color: #15803d;
        }

        .header .meta {
            text-align: right;
            font-size: 10px;
            color: #6b7280;
            line-height: 1.6;
        }

        h1 {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        thead tr {
            background-color: #15803d;
            color: #fff;
        }

        thead th {
            padding: 8px 12px;
            text-align: left;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tbody td {
            padding: 8px 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 11px;
        }

        .badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 999px;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            background-color: #dcfce7;
            color: #15803d;
            border: 1px solid #86efac;
        }

        .footer {
            margin-top: 32px;
            padding-top: 12px;
            border-top: 1px solid #e5e7eb;
            font-size: 9px;
            color: #9ca3af;
            display: flex;
            justify-content: space-between;
        }

        .empty {
            text-align: center;
            padding: 24px;
            color: #9ca3af;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="org">Escola de Condução</div>
        <div class="meta">
            Gerado em: {{ now()->format('d/m/Y H:i') }}<br>
            Documento interno
        </div>
    </div>

    @yield('content')

    <div class="footer">
        <span>Documento gerado automaticamente pelo sistema</span>
        <span>{{ now()->format('Y') }} &copy; Escola de Condução</span>
    </div>
</body>

</html>
