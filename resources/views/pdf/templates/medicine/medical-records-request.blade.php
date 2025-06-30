@extends('pdf.layout')

@section('content')
    <div class="document-header">
        <div class="header-right">
            <p>
                <strong>Головному лікарю</strong><br>
                {{ $data['clinic_name'] }}<br>
                {{ $data['clinic_head_name'] }}
            </p>
            <p>
                <strong>Від:</strong> {{ $data['patient_full_name'] }}
            </p>
            <p>
                Дата народження: {{ \Carbon\Carbon::parse($data['patient_birth_date'])->format('d.m.Y') }}<br>
                Адреса: {{ $data['patient_address'] }}
            </p>
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Заява про надання копії медичної документації</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Я, {{ $data['patient_full_name'] }}, відповідно до ст. 34, 39-1 Закону України "Основи законодавства України про охорону здоров'я", прошу надати мені засвідчену копію моєї медичної карти (історії хвороби) та всіх результатів обстежень, що стосуються періоду з {{ \Carbon\Carbon::parse($data['period_start_date'])->format('d.m.Y') }} по {{ \Carbon\Carbon::parse($data['period_end_date'])->format('d.m.Y') }}.
        </p>
        <p>
            Копії необхідні для {{ $data['reason'] }}.
        </p>
    </div>

    <div class="signature-section">
        <div class="signature-date">
            <p>{{ \Carbon\Carbon::now()->format('d.m.Y') }}</p>
        </div>
        <div class="signature-name">
            <p>___________________ / Підпис</p>
        </div>
    </div>
    <div class="clear"></div>
@endsection
