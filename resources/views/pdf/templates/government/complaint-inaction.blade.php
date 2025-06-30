@extends('pdf.layout')

@section('content')
    <div class="document-header">
        <div class="header-right">
            <p>
                <strong>До:</strong> {{ $data['higher_authority_name'] }}<br>
                (Назва вищого органу або прокуратури)
            </p>
            <p>
                <strong>Від:</strong> {{ $data['applicant_full_name'] }}
            </p>
            <p>
                Адреса: {{ $data['applicant_address'] }}
            </p>
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Скарга на бездіяльність посадової особи</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Я, {{ $data['applicant_full_name'] }}, звертався(лася) до {{ $data['official_info'] }} з приводу наступного питання: {{ $data['issue_summary'] }}.
        </p>
        <p>
            Моє звернення було зареєстровано {{ \Carbon\Carbon::parse($data['request_date'])->format('d.m.Y') }} (вхідний номер {{ $data['request_ref_number'] }}).
        </p>
        <p>
            Станом на сьогоднішній день, встановлений законом термін для надання відповіді минув, однак жодних дій вчинено не було.
        </p>
        <p>
            Прошу розглянути мою скаргу, визнати бездіяльність посадової особи неправомірною та зобов'язати її вчинити необхідні дії.
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
