@extends('pdf.layout')

@section('content')
    <div class="document-header">
        <div class="header-right">
            <p>
                <strong>До:</strong> {{ $data['authority_full_name'] }}<br>
                (Посада та назва органу)
            </p>
            <p>
                <strong>Від:</strong> {{ $data['requester_full_name'] }}
            </p>
            <p>
                Адреса для відповіді:<br>
                {{ $data['requester_address'] }}
            </p>
            <p>
                Email: {{ $data['requester_email'] }}
            </p>
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Запит на отримання публічної інформації</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Відповідно до Закону України "Про доступ до публічної інформації", прошу надати мені наступну інформацію:
        </p>
        <p>
            {{ $data['information_details'] }}
        </p>
        <p style="text-indent: 35px;">
            Прошу надати відповідь у встановлений законом термін на вказану вище поштову або електронну адресу.
        </p>
    </div>

    <div class="signature-section">
        <div class="signature-date">
            <p>{{ \Carbon\Carbon::now()->format('d.m.Y') }}</p>
        </div>
        <div class="signature-name">
            <p>___________________ / {{ $data['requester_name_short'] }}</p>
        </div>
    </div>
    <div class="clear"></div>
@endsection
