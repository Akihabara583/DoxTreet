@extends('pdf.layout')

@section('content')
    <div class="document-header">
        <div class="header-right">
            <p>
                <strong>Директору школи №</strong> {{ $data['school_number'] }}<br>
                {{ $data['director_name'] }}
            </p>
            <p>
                <strong>Батьків (опікунів):</strong><br>
                {{ $data['parent_name'] }}
            </p>
            <p>
                що проживають за адресою:<br>
                {{ $data['parent_address'] }}
            </p>
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Пояснювальна записка</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Я, {{ $data['parent_name'] }}, повідомляю, що моя дитина, {{ $data['student_name'] }}, учень(учениця) {{ $data['student_class'] }} класу, був(ла) відсутній(я) на заняттях у школі з {{ \Carbon\Carbon::parse($data['start_date'])->format('d.m.Y') }} по {{ \Carbon\Carbon::parse($data['end_date'])->format('d.m.Y') }}.
        </p>
        <p>
            <strong>Причина відсутності:</strong> {{ $data['reason'] }}.
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
