@extends('pdf.layout')

@section('content')
    <div class="document-header">
        <div class="header-right">
            <p>
                <strong>Директору школи №</strong> {{ $data['school_number'] }}<br>
                {{ $data['director_name'] }}
            </p>
            <p>
                <strong>Від:</strong><br>
                {{ $data['parent_name'] }}
            </p>
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Скарга</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Доводжу до Вашого відома, що моя дитина, {{ $data['student_name'] }}, учень(учениця) {{ $data['student_class'] }} класу, зазнає систематичного цькування (булінгу) з боку {{ $data['bully_info'] }}.
        </p>
        <p>
            Опис ситуації:
        </p>
        <p style="text-indent: 35px;">
            {{ $data['incident_description'] }}
        </p>
        <p>
            Прошу Вас вжити негайних заходів для припинення булінгу, провести розслідування та забезпечити безпечні умови для навчання моєї дитини відповідно до законодавства України.
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
