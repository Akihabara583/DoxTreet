@extends('pdf.layout')

@section('content')
    <div class="document-header">
        <div class="header-right">
            <p>
                <strong>До:</strong> {{ $data['authority_name'] }}<br>
                (Напр.: Дільничному інспектору, Голові ОСББ)
            </p>
            <p>
                <strong>Від:</strong> {{ $data['applicant_full_name'] }}
            </p>
            <p>
                що проживає за адресою:<br>
                {{ $data['applicant_address'] }}
            </p>
            <p>
                Контактний телефон: {{ $data['applicant_phone'] }}
            </p>
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Скарга на сусідів</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Я, {{ $data['applicant_full_name'] }}, звертаюся до Вас зі скаргою на дії моїх сусідів, що проживають за адресою: {{ $data['neighbor_address'] }}.
        </p>
        <p>
            Суть скарги полягає в наступному:
        </p>
        <p style="text-indent: 35px;">
            {{ $data['incident_description'] }}
        </p>
        <p>
            Прошу вжити відповідних заходів для вирішення цієї ситуації та припинення протиправних дій.
        </p>
    </div>

    <div class="signature-section">
        <div class="signature-date">
            <p>{{ \Carbon\Carbon::now()->format('d.m.Y') }}</p>
        </div>
        <div class="signature-name">
            <p>___________________ / {{ $data['applicant_name_short'] }}</p>
        </div>
    </div>
    <div class="clear"></div>
@endsection
