@extends('pdf.layout')

@section('content')
    <div class="document-header">
        <div class="header-left">
            <p>
                <strong>Відправник (Кредитор):</strong><br>
                {{ $data['creditor_full_name'] }}<br>
                {{ $data['creditor_address'] }}
            </p>
        </div>
        <div class="header-right">
            <p>
                <strong>Отримувач (Боржник):</strong><br>
                {{ $data['debtor_full_name'] }}<br>
                {{ $data['debtor_address'] }}
            </p>
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Досудова вимога-претензія</h1>

    <div class="content">
        <p>
            Шановний(а) {{ $data['debtor_full_name'] }},
        </p>
        <p style="text-indent: 35px;">
            Повідомляємо Вас, що станом на {{ \Carbon\Carbon::now()->format('d.m.Y') }} за Вами рахується заборгованість перед {{ $data['creditor_full_name'] }} у розмірі <strong>{{ $data['debt_amount'] }}</strong> грн.
        </p>
        <p>
            Заборгованість виникла на підставі: {{ $data['debt_origin'] }} (наприклад: договору позики №123 від 01.01.2024, розписки тощо).
        </p>
        <p>
            Вимагаємо погасити вказану заборгованість у повному обсязі в термін до {{ \Carbon\Carbon::parse($data['payment_due_date'])->format('d.m.Y') }}.
        </p>
        <p>
            У разі невиконання цієї вимоги, ми будемо змушені звернутися до суду для примусового стягнення боргу, що призведе до додаткових судових витрат для Вас.
        </p>
    </div>

    <div class="signature-section">
        <div class="signature-date">
            <p>{{ \Carbon\Carbon::now()->format('d.m.Y') }}</p>
        </div>
        <div class="signature-name">
            <p>З повагою, <br> ___________________ / {{ $data['creditor_name_short'] }}</p>
        </div>
    </div>
    <div class="clear"></div>
@endsection
