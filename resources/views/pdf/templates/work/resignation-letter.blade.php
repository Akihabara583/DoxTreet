@extends('pdf.layout')

@section('content')
    <div class="document-header">
        <div class="header-right">
            <p>
                <strong>Кому:</strong> {{ $data['director_position'] }}<br>
                {{ $data['director_name'] }}
            </p>
            <p>
                <strong>Від:</strong> {{ $data['employee_position'] }}<br>
                {{ $data['employee_name'] }}
            </p>
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Заява про звільнення</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Прошу звільнити мене з посади {{ $data['employee_position'] }} за власним бажанням
            "{{ \Carbon\Carbon::parse($data['resignation_date'])->format('d') }}" {{ \Carbon\Carbon::parse($data['resignation_date'])->isoFormat('MMMM') }} {{ \Carbon\Carbon::parse($data['resignation_date'])->format('Y') }} року.
        </p>
        <p style="text-indent: 35px;">
            Зобов'язуюсь відпрацювати встановлений законодавством термін 2 (два) тижні.
        </p>
    </div>

    <div class="signature-section">
        <div class="signature-date">
            <p>{{ \Carbon\Carbon::now()->format('d.m.Y') }}</p>
        </div>
        <div class="signature-name">
            <p>___________________ / {{ $data['employee_name_short'] }}</p>
        </div>
    </div>
    <div class="clear"></div>
@endsection
