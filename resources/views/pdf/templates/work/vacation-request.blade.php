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

    <h1 class="document-title">Заява</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Прошу надати мені щорічну оплачувану відпустку з {{ \Carbon\Carbon::parse($data['start_date'])->format('d.m.Y') }} року,
            тривалістю {{ $data['duration_days'] }} календарних днів.
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
