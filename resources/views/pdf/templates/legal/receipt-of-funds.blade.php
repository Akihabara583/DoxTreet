@extends('pdf.layout')

@section('content')
    <h1 class="document-title">Розписка</h1>
    <p style="text-align: center;">м. {{ $data['city'] }}</p>

    <div class="content" style="margin-top: 30px;">
        <p style="text-indent: 35px;">
            Я, <strong>{{ $data['recipient_full_name'] }}</strong>, паспорт серії {{ $data['recipient_passport_series'] }} №{{ $data['recipient_passport_number'] }}, виданий {{ $data['recipient_passport_issuer'] }} {{ \Carbon\Carbon::parse($data['recipient_passport_date'])->format('d.m.Y') }} р., що проживаю за адресою: {{ $data['recipient_address'] }},
        </p>
        <p style="text-indent: 35px;">
            отримав(ла) від громадянина(ки) <strong>{{ $data['payer_full_name'] }}</strong>, що проживає за адресою: {{ $data['payer_address'] }}, грошові кошти в сумі <strong>{{ $data['amount_numeric'] }} ({{ $data['amount_in_words'] }})</strong> {{ $data['currency'] }}.
        </p>
        <p style="text-indent: 35px;">
            Кошти отримані в якості {{ $data['payment_reason'] }}.
        </p>
        <p style="text-indent: 35px;">
            Претензій до {{ $data['payer_full_name'] }} не маю.
        </p>
    </div>

    <div class="signature-section">
        <div class="signature-date">
            <p>{{ \Carbon\Carbon::now()->format('d.m.Y') }}</p>
        </div>
        <div class="signature-name">
            <p>___________________ / {{ $data['recipient_name_short'] }}</p>
        </div>
    </div>
    <div class="clear"></div>
@endsection
