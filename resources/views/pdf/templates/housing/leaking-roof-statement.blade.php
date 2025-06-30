@extends('pdf.layout')

@section('content')
    <div class="document-header">
        <div class="header-right">
            <p>
                <strong>Начальнику</strong> {{ $data['utility_company_name'] }}<br>
                (ЖЕК, ОСББ, управляюча компанія)
            </p>
            <p>
                <strong>Від:</strong> {{ $data['resident_full_name'] }}
            </p>
            <p>
                що проживає за адресою:<br>
                {{ $data['resident_address'] }}
            </p>
            <p>
                Контактний телефон: {{ $data['resident_phone'] }}
            </p>
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Заява-претензія</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Я, {{ $data['resident_full_name'] }}, є власником/наймачем квартири за вказаною вище адресою. Повідомляю Вас, що в моїй квартирі відбувається протікання даху, що почалося приблизно {{ \Carbon\Carbon::parse($data['leak_start_date'])->format('d.m.Y') }}.
        </p>
        <p>
            Місця протікання: {{ $data['leak_locations'] }}.
        </p>
        <p>
            Внаслідок протікання завдано таких збитків: {{ $data['damages_description'] }}.
        </p>
        <p style="text-indent: 35px;">
            Відповідно до чинного законодавства, Ви зобов'язані утримувати будинок у належному технічному стані. Прошу негайно скласти акт протікання та виконати ремонтні роботи для усунення причин протікання.
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
