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
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Заява</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Прошу зарахувати мою дитину, {{ $data['student_name'] }}, {{ $data['student_birth_year'] }} року народження, до {{ $data['target_class'] }} класу вашої школи у зв'язку з переїздом з іншого міста/району.
        </p>
        <p>
            Раніше {{ $data['student_name_short'] }} навчався(лася) у школі № {{ $data['previous_school_number'] }}.
        </p>
        <p>
            До заяви додаю наступні документи:
        </p>
        <ul>
            <li>Особова справа учня</li>
            <li>Медична картка</li>
            <li>Копія свідоцтва про народження</li>
        </ul>
    </div>

    <div class="signature-section">
        <div class="signature-date">
            <p>{{ \Carbon\Carbon::now()->format('d.m.Y') }}</p>
        </div>
        <div class="signature-name">
            <p>___________________ / {{ $data['parent_name_short'] }}</p>
        </div>
    </div>
    <div class="clear"></div>
@endsection
