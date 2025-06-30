@extends('pdf.layout')

@section('content')
    <div class="document-header">
        <div class="header-right">
            <p>
                <strong>До:</strong> {{ $data['tax_authority_name'] }}<br>
                (Назва податкового органу)
            </p>
            <p>
                <strong>Від:</strong> {{ $data['taxpayer_full_name'] }}
            </p>
            <p>
                РНОКПП (ІПН): {{ $data['taxpayer_id_number'] }}
            </p>
            <p>
                Адреса: {{ $data['taxpayer_address'] }}
            </p>
        </div>
    </div>
    <div class="clear"></div>

    <h1 class="document-title">Заява про отримання податкової знижки</h1>

    <div class="content">
        <p style="text-indent: 35px;">
            Я, {{ $data['taxpayer_full_name'] }}, відповідно до статті 166 Податкового кодексу України, прошу надати мені податкову знижку за {{ $data['tax_year'] }} рік у зв'язку з витратами, понесеними на {{ $data['deduction_reason'] }} (наприклад: навчання, іпотека, страхування).
        </p>
        <p>
            Загальна сума витрат, що підлягає включенню до податкової знижки, становить {{ $data['expenses_amount'] }} грн.
        </p>
        <p>
            До заяви додаю наступні підтверджуючі документи:
        </p>
        <ul>
            <li>Копія паспорта та РНОКПП</li>
            <li>Довідка про доходи за звітний рік</li>
            <li>{{ $data['documents_list'] }}</li>
        </ul>
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
