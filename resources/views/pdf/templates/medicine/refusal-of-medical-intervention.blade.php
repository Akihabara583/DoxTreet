@extends('pdf.layout')

@section('content')
    <div class="document-header">
        <div class="header-right">
            <p>
                <strong>Головному лікарю</strong><br>
                {{ $data['clinic_name'] }}
            </p>
            <p>
                Лікуючому лікарю: {{ $data['doctor_name'] }}
            </p>
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Відмова від медичного втручання</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Я, <strong>{{ $data['patient_full_name'] }}</strong> (або представник пацієнта), {{ \Carbon\Carbon::parse($data['patient_birth_date'])->format('d.m.Y') }} року народження, перебуваючи при здоровому глузді та ясній пам'яті, відмовляюся від запропонованого мені медичного втручання:
        </p>
        <p>
            <strong>{{ $data['intervention_name'] }}</strong>.
        </p>
        <p style="text-indent: 35px;">
            Мені було роз'яснено лікарем {{ $data['doctor_name'] }} можливі наслідки моєї відмови для мого здоров'я та життя. Я повністю усвідомлюю ці наслідки та беру на себе всю відповідальність за своє рішення.
        </p>
    </div>

    <div class="signature-section" style="margin-top: 30px;">
        <p>Пацієнт (представник): ___________________ / {{ $data['patient_name_short'] }}</p>
    </div>
    <div class="signature-section">
        <p>Лікар: ___________________ / {{ $data['doctor_name_short'] }}</p>
    </div>
    <div class="signature-section">
        <div class="signature-date">
            <p>Дата: {{ \Carbon\Carbon::now()->format('d.m.Y') }}</p>
        </div>
    </div>
    <div class="clear"></div>
@endsection
