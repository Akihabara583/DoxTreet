<?php

namespace Database\Seeders\PL;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class PlFreeKartaPobytuTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds for the Polish Karta Pobytu Package 2025-2026.
     */
    public function run(): void
    {
        // Используем категорию для личных и семейных документов
        $catFamily = Category::where('slug', 'personal-family-pl')->firstOrFail();
        $catWork = Category::where('slug', 'work-pl')->firstOrFail();

        $templatesData = [
            // === ПАКЕТ "КАРТА ПОБЫТУ (ПО РАБОТЕ)" ===

            // 1. Wniosek o udzielenie zezwolenia jednolitego (Основное заявление)
            [
                'category_id' => $catWork->id, // ИСПРАВЛЕНО: было $catFamily->id
                'slug' => 'pl-jednolite-zezwolenie-pobyt-praca-2025', // ИСПРАВЛЕНО: новое название
                'access_level' => 'free',
                'fields' => '[
        {"name":"applicant_surname","type":"text","required":true,"labels":{"pl":"Nazwisko","en":"Surname","uk":"Прізвище","de":"Nachname"}},
        {"name":"applicant_name","type":"text","required":true,"labels":{"pl":"Imię","en":"First name","uk":"Ім\'я","de":"Vorname"}},
        {"name":"applicant_birth_date","type":"date","required":true,"labels":{"pl":"Data urodzenia","en":"Date of birth","uk":"Дата народження","de":"Geburtsdatum"}},
        {"name":"applicant_sex","type":"select","options":{"Mężczyzna":"Mężczyzna","Kobieta":"Kobieta"},"required":true,"labels":{"pl":"Płeć","en":"Gender","uk":"Стать","de":"Geschlecht"}},
        {"name":"applicant_birth_place","type":"text","required":true,"labels":{"pl":"Miejsce urodzenia (miasto, kraj)","en":"Place of birth (city, country)","uk":"Місце народження (місто, країна)","de":"Geburtsort (Stadt, Land)"}},
        {"name":"applicant_citizenship","type":"text","required":true,"labels":{"pl":"Obywatelstwo","en":"Citizenship","uk":"Громадянство","de":"Staatsangehörigkeit"}},
        {"name":"applicant_pesel","type":"text","required":false,"labels":{"pl":"PESEL (jeśli nadano)","en":"PESEL (if assigned)","uk":"PESEL (якщо присвоєно)","de":"PESEL (falls zugewiesen)"}},
        {"name":"applicant_height","type":"number","required":true,"labels":{"pl":"Wzrost (cm)","en":"Height (cm)","uk":"Зріст (см)","de":"Größe (cm)"}},
        {"name":"applicant_eyes","type":"text","required":true,"labels":{"pl":"Kolor oczu","en":"Eye color","uk":"Колір очей","de":"Augenfarbe"}},
        {"name":"applicant_address_poland","type":"textarea","required":true,"labels":{"pl":"Adres zamieszkania w Polsce","en":"Address of residence in Poland","uk":"Адреса проживання в Польщі","de":"Wohnadresse in Polen"}},
        {"name":"marital_status","type":"select","options":{"Kawaler/Panna":"Kawaler/Panna","Żonaty/Zamężna":"Żonaty/Zamężna","Rozwiedziony/a":"Rozwiedziony/a","Wdowiec/Wdowa":"Wdowiec/Wdowa"},"required":true,"labels":{"pl":"Stan cywilny","en":"Marital status","uk":"Сімейний стан","de":"Familienstand"}},
        {"name":"children_count","type":"number","required":true,"defaultValue":"0","labels":{"pl":"Liczba dzieci","en":"Number of children","uk":"Кількість дітей","de":"Anzahl der Kinder"}},
        {"name":"planned_stay_from","type":"date","required":true,"labels":{"pl":"Planowany pobyt od","en":"Planned stay from","uk":"Планований побут з","de":"Geplanter Aufenthalt von"}},
        {"name":"planned_stay_to","type":"date","required":true,"labels":{"pl":"Planowany pobyt do","en":"Planned stay until","uk":"Планований побут до","de":"Geplanter Aufenthalt bis"}},
        {"name":"previous_applications","type":"select","options":{"Tak":"Tak","Nie":"Nie"},"required":true,"labels":{"pl":"Czy składał(a) Pan(i) wcześniej wnioski o zezwolenia na pobyt?","en":"Have you previously applied for residence permits?","uk":"Чи подавали Ви раніше заяви на дозвіл на проживання?","de":"Haben Sie bereits früher Anträge auf Aufenthaltserlaubnis gestellt?"}},
        {"name":"residence_purpose","type":"text","required":true,"defaultValue":"Wykonywanie pracy","labels":{"pl":"Cel pobytu w Polsce","en":"Purpose of stay in Poland","uk":"Мета перебування в Польщі","de":"Zweck des Aufenthalts in Polen"}},
        {"name":"passport_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu podróży (paszportu)","en":"Travel document number (passport)","uk":"Номер документа для подорожей (паспорт)","de":"Reisedokument-Nummer (Reisepass)"}},
        {"name":"passport_issued_date","type":"date","required":true,"labels":{"pl":"Data wydania paszportu","en":"Passport issue date","uk":"Дата видачі паспорта","de":"Ausstellungsdatum des Reisepasses"}},
        {"name":"passport_valid_until","type":"date","required":true,"labels":{"pl":"Paszport ważny do","en":"Passport valid until","uk":"Паспорт дійсний до","de":"Reisepass gültig bis"}}
    ]',
                'translations' => [
                    'en' => [
                        'title' => 'Application for unified permit',
                        'description' => 'Main application form for unified permit for temporary residence and work in Poland. Version 2025/2026.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">WNIOSEK O UDZIELENIE CUDZOZIEMCOWI ZEZWOLENIA JEDNOLITEGO</h1><p style="font-size: 12px; margin-top: 5px;">na pobyt czasowy i pracę</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">A. DANE OSOBOWE CUDZOZIEMCA</h3>
                            <p>Nazwisko: <strong>[[applicant_surname]]</strong>, Imię: <strong>[[applicant_name]]</strong></p>
                            <p>Data urodzenia: <strong>[[applicant_birth_date]]</strong>, Płeć: <strong>[[applicant_sex]]</strong></p>
                            <p>Miejsce urodzenia: <strong>[[applicant_birth_place]]</strong>, Obywatelstwo: <strong>[[applicant_citizenship]]</strong></p>
                            <p>Wzrost: [[applicant_height]] cm, Kolor oczu: [[applicant_eyes]]</p>
                            <p>PESEL: [[applicant_pesel]]</p>
                            <p>Stan cywilny: <strong>[[marital_status]]</strong>, Liczba dzieci: [[children_count]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">B. MIEJSCE POBYTU</h3>
                            <p>Adres zamieszkania w Polsce: <strong>[[applicant_address_poland]]</strong></p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">C. OKRES I CEL POBYTU</h3>
                            <p>Planowany okres pobytu: od <strong>[[planned_stay_from]]</strong> do <strong>[[planned_stay_to]]</strong></p>
                            <p>Cel pobytu w Polsce: <strong>[[residence_purpose]]</strong></p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">D. DOKUMENT PODRÓŻY</h3>
                            <p>Paszport nr: <strong>[[passport_number]]</strong></p>
                            <p>Wydany: [[passport_issued_date]], Ważny do: [[passport_valid_until]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">E. POPRZEDNIE WNIOSKI</h3>
                            <p>Czy składał(a) Pan(i) wcześniej wnioski o zezwolenia na pobyt? <strong>[[previous_applications]]</strong></p>

                            <p style="margin-top: 20px; font-size: 10px;">Oświadczam, pod rygorem odpowiedzialności karnej za składanie fałszywych zeznań, że dane zawarte we wniosku są prawdziwe.</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis cudzoziemca)</td></tr></table>'
                    ],
                    'uk' => [
                        'title' => 'Заява про єдиний дозвіл',
                        'description' => 'Основна форма заяви про єдиний дозвіл на тимчасове проживання та роботу в Польщі. Версія 2025/2026.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">WNIOSEK O UDZIELENIE CUDZOZIEMCOWI ZEZWOLENIA JEDNOLITEGO</h1><p style="font-size: 12px; margin-top: 5px;">na pobyt czasowy i pracę</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">A. DANE OSOBOWE CUDZOZIEMCA</h3>
                            <p>Nazwisko: <strong>[[applicant_surname]]</strong>, Imię: <strong>[[applicant_name]]</strong></p>
                            <p>Data urodzenia: <strong>[[applicant_birth_date]]</strong>, Płeć: <strong>[[applicant_sex]]</strong></p>
                            <p>Miejsce urodzenia: <strong>[[applicant_birth_place]]</strong>, Obywatelstwo: <strong>[[applicant_citizenship]]</strong></p>
                            <p>Wzrost: [[applicant_height]] cm, Kolor oczu: [[applicant_eyes]]</p>
                            <p>PESEL: [[applicant_pesel]]</p>
                            <p>Stan cywilny: <strong>[[marital_status]]</strong>, Liczba dzieci: [[children_count]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">B. MIEJSCE POBYTU</h3>
                            <p>Adres zamieszkania w Polsce: <strong>[[applicant_address_poland]]</strong></p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">C. OKRES I CEL POBYTU</h3>
                            <p>Planowany okres pobytu: od <strong>[[planned_stay_from]]</strong> do <strong>[[planned_stay_to]]</strong></p>
                            <p>Cel pobytu w Polsce: <strong>[[residence_purpose]]</strong></p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">D. DOKUMENT PODRÓŻY</h3>
                            <p>Paszport nr: <strong>[[passport_number]]</strong></p>
                            <p>Wydany: [[passport_issued_date]], Ważny do: [[passport_valid_until]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">E. POPRZEDNIE WNIOSKI</h3>
                            <p>Czy składał(a) Pan(i) wcześniej wnioski o zezwolenia na pobyt? <strong>[[previous_applications]]</strong></p>

                            <p style="margin-top: 20px; font-size: 10px;">Oświadczam, pod rygorem odpowiedzialności karnej za składanie fałszywych zeznań, że dane zawarte we wniosku są prawdziwe.</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis cudzoziemca)</td></tr></table>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf einheitliche Genehmigung',
                        'description' => 'Hauptantragsformular für einheitliche Genehmigung für vorübergehenden Aufenthalt und Arbeit in Polen. Version 2025/2026.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">WNIOSEK O UDZIELENIE CUDZOZIEMCOWI ZEZWOLENIA JEDNOLITEGO</h1><p style="font-size: 12px; margin-top: 5px;">na pobyt czasowy i pracę</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">A. DANE OSOBOWE CUDZOZIEMCA</h3>
                            <p>Nazwisko: <strong>[[applicant_surname]]</strong>, Imię: <strong>[[applicant_name]]</strong></p>
                            <p>Data urodzenia: <strong>[[applicant_birth_date]]</strong>, Płeć: <strong>[[applicant_sex]]</strong></p>
                            <p>Miejsce urodzenia: <strong>[[applicant_birth_place]]</strong>, Obywatelstwo: <strong>[[applicant_citizenship]]</strong></p>
                            <p>Wzrost: [[applicant_height]] cm, Kolor oczu: [[applicant_eyes]]</p>
                            <p>PESEL: [[applicant_pesel]]</p>
                            <p>Stan cywilny: <strong>[[marital_status]]</strong>, Liczba dzieci: [[children_count]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">B. MIEJSCE POBYTU</h3>
                            <p>Adres zamieszkania w Polsce: <strong>[[applicant_address_poland]]</strong></p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">C. OKRES I CEL POBYTU</h3>
                            <p>Planowany okres pobytu: od <strong>[[planned_stay_from]]</strong> do <strong>[[planned_stay_to]]</strong></p>
                            <p>Cel pobytu w Polsce: <strong>[[residence_purpose]]</strong></p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">D. DOKUMENT PODRÓŻY</h3>
                            <p>Paszport nr: <strong>[[passport_number]]</strong></p>
                            <p>Wydany: [[passport_issued_date]], Ważny do: [[passport_valid_until]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">E. POPRZEDNIE WNIOSKI</h3>
                            <p>Czy składał(a) Pan(i) wcześniej wnioski o zezwolenia na pobyt? <strong>[[previous_applications]]</strong></p>

                            <p style="margin-top: 20px; font-size: 10px;">Oświadczam, pod rygorem odpowiedzialności karnej za składanie fałszywych zeznań, że dane zawarte we wniosku są prawdziwe.</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis cudzoziemca)</td></tr></table>'

                    ],
                    'pl' => [
                        'title' => 'Wniosek o udzielenie zezwolenia jednolitego',
                        'description' => 'Główny formularz wniosku o udzielenie zezwolenia jednolitego na pobyt czasowy i pracę w Polsce. Wersja 2025/2026.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">WNIOSEK O UDZIELENIE CUDZOZIEMCOWI ZEZWOLENIA JEDNOLITEGO</h1><p style="font-size: 12px; margin-top: 5px;">na pobyt czasowy i pracę</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">A. DANE OSOBOWE CUDZOZIEMCA</h3>
                            <p>Nazwisko: <strong>[[applicant_surname]]</strong>, Imię: <strong>[[applicant_name]]</strong></p>
                            <p>Data urodzenia: <strong>[[applicant_birth_date]]</strong>, Płeć: <strong>[[applicant_sex]]</strong></p>
                            <p>Miejsce urodzenia: <strong>[[applicant_birth_place]]</strong>, Obywatelstwo: <strong>[[applicant_citizenship]]</strong></p>
                            <p>Wzrost: [[applicant_height]] cm, Kolor oczu: [[applicant_eyes]]</p>
                            <p>PESEL: [[applicant_pesel]]</p>
                            <p>Stan cywilny: <strong>[[marital_status]]</strong>, Liczba dzieci: [[children_count]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">B. MIEJSCE POBYTU</h3>
                            <p>Adres zamieszkania w Polsce: <strong>[[applicant_address_poland]]</strong></p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">C. OKRES I CEL POBYTU</h3>
                            <p>Planowany okres pobytu: od <strong>[[planned_stay_from]]</strong> do <strong>[[planned_stay_to]]</strong></p>
                            <p>Cel pobytu w Polsce: <strong>[[residence_purpose]]</strong></p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">D. DOKUMENT PODRÓŻY</h3>
                            <p>Paszport nr: <strong>[[passport_number]]</strong></p>
                            <p>Wydany: [[passport_issued_date]], Ważny do: [[passport_valid_until]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">E. POPRZEDNIE WNIOSKI</h3>
                            <p>Czy składał(a) Pan(i) wcześniej wnioski o zezwolenia na pobyt? <strong>[[previous_applications]]</strong></p>

                            <p style="margin-top: 20px; font-size: 10px;">Oświadczam, pod rygorem odpowiedzialności karnej za składanie fałszywych zeznań, że dane zawarte we wniosku są prawdziwe.</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis cudzoziemca)</td></tr></table>'
                    ]
                ]
            ],

            // 2. Załącznik nr 1 do wniosku (Приложение №1) - УЛУЧШЕННЫЙ
            [
                'category_id' => $catWork->id,
                'slug' => 'pl-karta-pobytu-appendix1-employer-2025',
                'access_level' => 'free',
                'fields' => '[
    {"name":"foreigner_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko cudzoziemca","en":"Foreigner\'s full name","uk":"Ім\'я та прізвище іноземця","de":"Vor- und Nachname des Ausländers"}},
    {"name":"employer_name","type":"text","required":true,"labels":{"pl":"Nazwa pracodawcy","en":"Employer\'s name","uk":"Назва роботодавця","de":"Name des Arbeitgebers"}},
    {"name":"employer_address","type":"textarea","required":true,"labels":{"pl":"Siedziba pracodawcy","en":"Employer\'s address","uk":"Адреса роботодавця","de":"Adresse des Arbeitgebers"}},
    {"name":"employer_nip","type":"text","required":true,"labels":{"pl":"NIP pracodawcy","en":"Employer\'s NIP","uk":"NIP роботодавця","de":"NIP des Arbeitgebers"}},
    {"name":"employer_regon","type":"text","required":true,"labels":{"pl":"REGON pracodawcy","en":"Employer\'s REGON","uk":"REGON роботодавця","de":"REGON des Arbeitgebers"}},
    {"name":"job_position","type":"text","required":true,"labels":{"pl":"Stanowisko","en":"Job position","uk":"Посада","de":"Arbeitsplatz"}},
    {"name":"contract_type","type":"select","options":{"umowa_o_prace":"Umowa o pracę","umowa_zlecenie":"Umowa zlecenie"},"required":true,"labels":{"pl":"Rodzaj umowy","en":"Type of contract","uk":"Тип договору","de":"Art des Vertrags"}},
    {"name":"employment_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia pracy","en":"Employment start date","uk":"Дата початку роботи","de":"Arbeitsbeginn"}},
    {"name":"contract_duration","type":"text","required":true,"labels":{"pl":"Okres trwania umowy","en":"Contract duration","uk":"Тривалість договору","de":"Vertragsdauer"}},
    {"name":"salary_gross","type":"number","required":true,"labels":{"pl":"Wynagrodzenie miesięczne (brutto w PLN)","en":"Monthly salary (gross in PLN)","uk":"Місячна зарплата (брутто в PLN)","de":"Monatsgehalt (brutto in PLN)"}},
    {"name":"working_hours","type":"text","required":true,"labels":{"pl":"Wymiar czasu pracy (np. pełny etat)","en":"Working time (e.g., full-time)","uk":"Обсяг робочого часу (напр., повний робочий день)","de":"Arbeitszeit (z.B. Vollzeit)"}}
]',
                'translations' => [
                    'en' => [
                        'title' => 'Appendix No. 1 to the unified permit application (Work)',
                        'description' => 'Mandatory appendix to the unified permit application based on employment. Filled by the employer.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">ZAŁĄCZNIK NR 1</h1><p style="font-size: 12px;">do wniosku o udzielenie zezwolenia jednolitego</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p><strong>Cudzoziemiec:</strong> [[foreigner_name]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">CZĘŚĆ WYPEŁNIANA PRZEZ PRACODAWCĘ</h3>
                            <p><strong>Nazwa podmiotu powierzającego pracę:</strong> [[employer_name]]</p>
                            <p><strong>Adres siedziby:</strong> [[employer_address]]</p>
                            <p><strong>NIP:</strong> [[employer_nip]], <strong>REGON:</strong> [[employer_regon]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">WARUNKI ZATRUDNIENIA</h3>
                            <p><strong>Stanowisko, na którym cudzoziemiec ma wykonywać pracę:</strong> [[job_position]]</p>
                            <p><strong>Podstawa prawna wykonywania pracy:</strong> [[contract_type]]</p>
                            <p><strong>Data rozpoczęcia pracy:</strong> [[employment_start_date]]</p>
                            <p><strong>Okres zatrudnienia:</strong> [[contract_duration]]</p>
                            <p><strong>Miesięczne wynagrodzenie brutto:</strong> [[salary_gross]] PLN</p>
                            <p><strong>Wymiar czasu pracy:</strong> [[working_hours]]</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis i pieczęć pracodawcy)</td></tr></table>'
                    ],
                    'uk' => [
                        'title' => 'Додаток №1 до заяви про єдиний дозвіл (Робота)',
                        'description' => 'Обов\'язковий додаток до заяви про єдиний дозвіл на основі працевлаштування. Заповнюється роботодавцем.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">ZAŁĄCZNIK NR 1</h1><p style="font-size: 12px;">do wniosku o udzielenie zezwolenia jednolitego</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p><strong>Cudzoziemiec:</strong> [[foreigner_name]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">CZĘŚĆ WYPEŁNIANA PRZEZ PRACODAWCĘ</h3>
                            <p><strong>Nazwa podmiotu powierzającego pracę:</strong> [[employer_name]]</p>
                            <p><strong>Adres siedziby:</strong> [[employer_address]]</p>
                            <p><strong>NIP:</strong> [[employer_nip]], <strong>REGON:</strong> [[employer_regon]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">WARUNKI ZATRUDNIENIA</h3>
                            <p><strong>Stanowisko, na którym cudzoziemiec ma wykonywać pracę:</strong> [[job_position]]</p>
                            <p><strong>Podstawa prawna wykonywania pracy:</strong> [[contract_type]]</p>
                            <p><strong>Data rozpoczęcia pracy:</strong> [[employment_start_date]]</p>
                            <p><strong>Okres zatrudnienia:</strong> [[contract_duration]]</p>
                            <p><strong>Miesięczne wynagrodzenie brutto:</strong> [[salary_gross]] PLN</p>
                            <p><strong>Wymiar czasu pracy:</strong> [[working_hours]]</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis i pieczęć pracodawcy)</td></tr></table>'
                    ],
                    'de' => [
                        'title' => 'Anlage Nr. 1 zum Antrag auf einheitliche Genehmigung (Arbeit)',
                        'description' => 'Obligatorische Anlage zum Antrag auf einheitliche Genehmigung auf Basis der Beschäftigung. Wird vom Arbeitgeber ausgefüllt.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">ZAŁĄCZNIK NR 1</h1><p style="font-size: 12px;">do wniosku o udzielenie zezwolenia jednolitego</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p><strong>Cudzoziemiec:</strong> [[foreigner_name]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">CZĘŚĆ WYPEŁNIANA PRZEZ PRACODAWCĘ</h3>
                            <p><strong>Nazwa podmiotu powierzającego pracę:</strong> [[employer_name]]</p>
                            <p><strong>Adres siedziby:</strong> [[employer_address]]</p>
                            <p><strong>NIP:</strong> [[employer_nip]], <strong>REGON:</strong> [[employer_regon]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">WARUNKI ZATRUDNIENIA</h3>
                            <p><strong>Stanowisko, na którym cudzoziemiec ma wykonywać pracę:</strong> [[job_position]]</p>
                            <p><strong>Podstawa prawna wykonywania pracy:</strong> [[contract_type]]</p>
                            <p><strong>Data rozpoczęcia pracy:</strong> [[employment_start_date]]</p>
                            <p><strong>Okres zatrudnienia:</strong> [[contract_duration]]</p>
                            <p><strong>Miesięczne wynagrodzenie brutto:</strong> [[salary_gross]] PLN</p>
                            <p><strong>Wymiar czasu pracy:</strong> [[working_hours]]</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis i pieczęć pracodawcy)</td></tr></table>'
                    ],
                    'pl' => [
                        'title' => 'Załącznik nr 1 do wniosku o zezwolenie jednolite (Praca)',
                        'description' => 'Obowiązkowy załącznik do wniosku o zezwolenie jednolite na podstawie pracy. Wypełniany przez pracodawcę.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">ZAŁĄCZNIK NR 1</h1><p style="font-size: 12px;">do wniosku o udzielenie zezwolenia jednolitego</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p><strong>Cudzoziemiec:</strong> [[foreigner_name]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">CZĘŚĆ WYPEŁNIANA PRZEZ PRACODAWCĘ</h3>
                            <p><strong>Nazwa podmiotu powierzającego pracę:</strong> [[employer_name]]</p>
                            <p><strong>Adres siedziby:</strong> [[employer_address]]</p>
                            <p><strong>NIP:</strong> [[employer_nip]], <strong>REGON:</strong> [[employer_regon]]</p>

                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">WARUNKI ZATRUDNIENIA</h3>
                            <p><strong>Stanowisko, na którym cudzoziemiec ma wykonywać pracę:</strong> [[job_position]]</p>
                            <p><strong>Podstawa prawna wykonywania pracy:</strong> [[contract_type]]</p>
                            <p><strong>Data rozpoczęcia pracy:</strong> [[employment_start_date]]</p>
                            <p><strong>Okres zatrudnienia:</strong> [[contract_duration]]</p>
                            <p><strong>Miesięczne wynagrodzenie brutto:</strong> [[salary_gross]] PLN</p>
                            <p><strong>Wymiar czasu pracy:</strong> [[working_hours]]</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis i pieczęć pracodawcy)</td></tr></table>'
                    ]
                ]
            ],

            // 3. Oświadczenie o posiadaniu ubezpieczenia zdrowotnego (УЛУЧШЕННАЯ Декларация о страховке)
            [
                'category_id' => $catFamily->id,
                'slug' => 'pl-declaration-health-insurance-2025',
                'access_level' => 'free',
                'fields' => '[
    {"name":"declarant_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko składającego oświadczenie","en":"Declarant\'s full name","uk":"Ім\'я та прізвище заявника","de":"Vor- und Nachname des Antragstellers"}},
    {"name":"declarant_passport","type":"text","required":true,"labels":{"pl":"Seria i numer paszportu","en":"Passport series and number","uk":"Серія та номер паспорта","de":"Reisepassserie und -nummer"}},
    {"name":"insurance_basis","type":"select","options":{"zus_praca":"Ubezpieczenie w ZUS z tytułu umowy o pracę","zus_dzialalnosc":"Ubezpieczenie w ZUS z tytułu działalności gospodarczej","polisa_prywatna":"Polisa ubezpieczenia prywatnego","ubezpieczenie_europejskie":"Europejska Karta Ubezpieczenia Zdrowotnego"},"required":true,"labels":{"pl":"Rodzaj posiadanego ubezpieczenia","en":"Type of insurance","uk":"Тип страхування","de":"Art der Versicherung"}},
    {"name":"insurance_valid_from","type":"date","required":true,"labels":{"pl":"Ubezpieczenie ważne od","en":"Insurance valid from","uk":"Страхування дійсне з","de":"Versicherung gültig ab"}},
    {"name":"insurance_valid_to","type":"date","required":true,"labels":{"pl":"Ubezpieczenie ważne do","en":"Insurance valid until","uk":"Страхування дійсне до","de":"Versicherung gültig bis"}}
]',
                'translations' => [
                    'en' => [
                        'title' => 'Declaration of health insurance',
                        'description' => 'Document in which the foreigner declares that they have health insurance covering the cost of treatment in Poland.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O POSIADANIU UBEZPIECZENIA ZDROWOTNEGO</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8; text-align: justify;">
                            <p>Ja, niżej podpisany/a <strong>[[declarant_name]]</strong>, legitymujący/a się paszportem o numerze <strong>[[declarant_passport]]</strong>, oświadczam, że posiadam ubezpieczenie zdrowotne w rozumieniu ustawy z dnia 27 sierpnia 2004 r. o świadczeniach opieki zdrowotnej finansowanych ze środków publicznych lub potwierdzenie pokrycia przez ubezpieczyciela kosztów leczenia na terytorium Rzeczypospolitej Polskiej.</p>

                            <p><strong>Rodzaj posiadanego ubezpieczenia:</strong> [[insurance_basis]]</p>
                            <p><strong>Okres ważności ubezpieczenia:</strong> od [[insurance_valid_from]] do [[insurance_valid_to]]</p>

                            <p>Oświadczam, że przedmiotowe ubezpieczenie będzie ważne przez cały okres planowanego pobytu na terytorium RP.</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis)</td></tr></table>'
                    ],
                    'uk' => [
                        'title' => 'Декларація про медичне страхування',
                        'description' => 'Документ, в якому іноземець заявляє, що має медичне страхування, що покриває вартість лікування в Польщі.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O POSIADANIU UBEZPIECZENIA ZDROWOTNEGO</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8; text-align: justify;">
                            <p>Ja, niżej podpisany/a <strong>[[declarant_name]]</strong>, legitymujący/a się paszportem o numerze <strong>[[declarant_passport]]</strong>, oświadczam, że posiadam ubezpieczenie zdrowotne w rozumieniu ustawy z dnia 27 sierpnia 2004 r. o świadczeniach opieki zdrowotnej finansowanych ze środków publicznych lub potwierdzenie pokrycia przez ubezpieczyciela kosztów leczenia na terytorium Rzeczypospolitej Polskiej.</p>

                            <p><strong>Rodzaj posiadanego ubezpieczenia:</strong> [[insurance_basis]]</p>
                            <p><strong>Okres ważności ubezpieczenia:</strong> od [[insurance_valid_from]] do [[insurance_valid_to]]</p>

                            <p>Oświadczam, że przedmiotowe ubezpieczenie będzie ważne przez cały okres planowanego pobytu na terytorium RP.</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis)</td></tr></table>'
                    ],
                    'de' => [
                        'title' => 'Erklärung über Krankenversicherung',
                        'description' => 'Dokument, in dem der Ausländer erklärt, dass er eine Krankenversicherung besitzt, die die Behandlungskosten in Polen abdeckt.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O POSIADANIU UBEZPIECZENIA ZDROWOTNEGO</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8; text-align: justify;">
                            <p>Ja, niżej podpisany/a <strong>[[declarant_name]]</strong>, legitymujący/a się paszportem o numerze <strong>[[declarant_passport]]</strong>, oświadczam, że posiadam ubezpieczenie zdrowotne w rozumieniu ustawy z dnia 27 sierpnia 2004 r. o świadczeniach opieki zdrowotnej finansowanych ze środków publicznych lub potwierdzenie pokrycia przez ubezpieczyciela kosztów leczenia na terytorium Rzeczypospolitej Polskiej.</p>

                            <p><strong>Rodzaj posiadanego ubezpieczenia:</strong> [[insurance_basis]]</p>
                            <p><strong>Okres ważności ubezpieczenia:</strong> od [[insurance_valid_from]] do [[insurance_valid_to]]</p>

                            <p>Oświadczam, że przedmiotowe ubezpieczenie będzie ważne przez cały okres planowanego pobytu na terytorium RP.</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis)</td></tr></table>'
                    ],
                    'pl' => [
                        'title' => 'Oświadczenie o posiadaniu ubezpieczenia zdrowotnego',
                        'description' => 'Dokument, w którym cudzoziemiec oświadcza, że posiada ubezpieczenie zdrowotne pokrywające koszty leczenia w Polsce.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O POSIADANIU UBEZPIECZENIA ZDROWOTNEGO</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8; text-align: justify;">
                            <p>Ja, niżej podpisany/a <strong>[[declarant_name]]</strong>, legitymujący/a się paszportem o numerze <strong>[[declarant_passport]]</strong>, oświadczam, że posiadam ubezpieczenie zdrowotne w rozumieniu ustawy z dnia 27 sierpnia 2004 r. o świadczeniach opieki zdrowotnej finansowanych ze środków publicznych lub potwierdzenie pokrycia przez ubezpieczyciela kosztów leczenia na terytorium Rzeczypospolitej Polskiej.</p>

                            <p><strong>Rodzaj posiadanego ubezpieczenia:</strong> [[insurance_basis]]</p>
                            <p><strong>Okres ważności ubezpieczenia:</strong> od [[insurance_valid_from]] do [[insurance_valid_to]]</p>

                            <p>Oświadczam, że przedmiotowe ubezpieczenie będzie ważne przez cały okres planowanego pobytu na terytorium RP.</p>
                        </div>',
                        'footer_html' => '<table style="width: 100%; margin-top: 60px; font-size: 12px;"><tr><td style="width: 50%;">Data: ........................</td><td style="width: 50%; text-align: right;">........................................<br>(Podpis)</td></tr></table>'
                    ]
                ]
            ],

            // 4. Umowa o pracę (УЛУЧШЕННЫЙ Трудовой договор)
            [
                'category_id' => $catWork->id,
                'slug' => 'pl-standard-employment-contract-2025',
                'access_level' => 'free',
                'fields' => '[
    {"name":"agreement_date_place","type":"text","required":true,"labels":{"pl":"Zawarta w (miejscowość), dnia (data)","en":"Concluded in (city), on (date)","uk":"Укладено в (місто), дня (дата)","de":"Abgeschlossen in (Stadt), am (Datum)"}},
    {"name":"employer_details","type":"textarea","required":true,"labels":{"pl":"Dane Pracodawcy (nazwa, adres, NIP, REGON)","en":"Employer\'s Details (name, address, NIP, REGON)","uk":"Дані роботодавця (назва, адреса, NIP, REGON)","de":"Arbeitgeberdaten (Name, Adresse, NIP, REGON)"}},
    {"name":"employee_details","type":"textarea","required":true,"labels":{"pl":"Dane Pracownika (imię, nazwisko, adres, PESEL/paszport)","en":"Employee\'s Details (name, address, PESEL/passport)","uk":"Дані працівника (ім\'я, прізвище, адреса, PESEL/паспорт)","de":"Arbeitnehmerdaten (Name, Adresse, PESEL/Reisepass)"}},
    {"name":"contract_type","type":"select","options":{"na_okres_probny":"na okres próbny","na_czas_okreslony":"na czas określony","na_czas_nieokreslony":"na czas nieokreślony"},"required":true,"labels":{"pl":"Rodzaj umowy o pracę","en":"Type of employment contract","uk":"Тип трудового договору","de":"Art des Arbeitsvertrags"}},
    {"name":"employment_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia pracy","en":"Employment start date","uk":"Дата початку роботи","de":"Arbeitsbeginn"}},
    {"name":"contract_end_date","type":"date","required":false,"labels":{"pl":"Data zakończenia (dla umów na czas określony)","en":"End date (for fixed-term contracts)","uk":"Дата закінчення (для договорів на певний строк)","de":"Enddatum (für befristete Verträge)"}},
    {"name":"probation_period","type":"text","required":false,"labels":{"pl":"Okres próbny (jeśli dotyczy)","en":"Probation period (if applicable)","uk":"Випробувальний період (якщо застосовується)","de":"Probezeit (falls zutreffend)"}},
    {"name":"job_position","type":"text","required":true,"labels":{"pl":"Stanowisko","en":"Job position","uk":"Посада","de":"Arbeitsplatz"}},
    {"name":"work_place","type":"text","required":true,"labels":{"pl":"Miejsce wykonywania pracy","en":"Place of work","uk":"Місце виконання роботи","de":"Arbeitsort"}},
    {"name":"salary_gross","type":"number","required":true,"labels":{"pl":"Wynagrodzenie (brutto miesięcznie w PLN)","en":"Salary (gross per month in PLN)","uk":"Зарплата (брутто щомісяця в PLN)","de":"Gehalt (brutto pro Monat in PLN)"}},
    {"name":"working_hours","type":"text","required":true,"labels":{"pl":"Wymiar czasu pracy","en":"Working time","uk":"Обсяг робочого часу","de":"Arbeitszeit"}},
    {"name":"vacation_days","type":"number","required":true,"defaultValue":"26","labels":{"pl":"Dni urlopu wypoczynkowego","en":"Annual leave days","uk":"Дні щорічної відпустки","de":"Urlaubstage pro Jahr"}},
    {"name":"notice_period","type":"text","required":true,"labels":{"pl":"Okres wypowiedzenia","en":"Notice period","uk":"Період попередження","de":"Kündigungsfrist"}}
]',
                'translations' => [
                    'en' => [
                        'title' => 'Employment contract',
                        'description' => 'Standard employment contract template, which is the basic document confirming employment in Poland.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA O PRACĘ</h1></div><p style="font-size: 12px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <p style="font-size: 12px;">pomiędzy:</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Pracodawcą:</strong><br>[[employer_details]]</p>
                        <p style="font-size: 12px;">a</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Pracownikiem:</strong><br>[[employee_details]]</p>

                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Rodzaj umowy</h3>
                            <p>Strony zawierają umowę o pracę <strong>[[contract_type]]</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 2. Okres zatrudnienia</h3>
                            <p>1. Data rozpoczęcia pracy: <strong>[[employment_start_date]]</strong></p>
                            <p>2. Data zakończenia: <strong>[[contract_end_date]]</strong></p>
                            <p>3. Okres próbny: [[probation_period]]</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 3. Warunki pracy</h3>
                            <p>1. Stanowisko: <strong>[[job_position]]</strong></p>
                            <p>2. Miejsce wykonywania pracy: <strong>[[work_place]]</strong></p>
                            <p>3. Wymiar czasu pracy: <strong>[[working_hours]]</strong></p>

                            <h3 style="text-align: center; font-size: 13px;">§ 4. Wynagrodzenie</h3>
                            <p>Wynagrodzenie miesięczne wynosi: <strong>[[salary_gross]] PLN</strong> brutto.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 5. Urlopy i wypowiedzenie</h3>
                            <p>1. Pracownikowi przysługuje <strong>[[vacation_days]]</strong> dni urlopu wypoczynkowego w roku kalendarzowym.</p>
                            <p>2. Okres wypowiedzenia wynosi: <strong>[[notice_period]]</strong>.</p>
                        </div>',
                        'footer_html' => '
                        <table style="width: 100%; margin-top: 60px; font-size: 12px;">
                            <tr>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Pracodawca)</strong></td>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Pracownik)</strong></td>
                            </tr>
                        </table>'
                    ],
                    'uk' => [
                        'title' => 'Трудовий договір',
                        'description' => 'Стандартний шаблон трудового договору, який є основним документом, що підтверджує працевлаштування в Польщі.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA O PRACĘ</h1></div><p style="font-size: 12px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <p style="font-size: 12px;">pomiędzy:</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Pracodawcą:</strong><br>[[employer_details]]</p>
                        <p style="font-size: 12px;">a</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Pracownikiem:</strong><br>[[employee_details]]</p>

                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Rodzaj umowy</h3>
                            <p>Strony zawierają umowę o pracę <strong>[[contract_type]]</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 2. Okres zatrudnienia</h3>
                            <p>1. Data rozpoczęcia pracy: <strong>[[employment_start_date]]</strong></p>
                            <p>2. Data zakończenia: <strong>[[contract_end_date]]</strong></p>
                            <p>3. Okres próbny: [[probation_period]]</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 3. Warunki pracy</h3>
                            <p>1. Stanowisko: <strong>[[job_position]]</strong></p>
                            <p>2. Miejsce wykonywania pracy: <strong>[[work_place]]</strong></p>
                            <p>3. Wymiar czasu pracy: <strong>[[working_hours]]</strong></p>

                            <h3 style="text-align: center; font-size: 13px;">§ 4. Wynagrodzenie</h3>
                            <p>Wynagrodzenie miesięczne wynosi: <strong>[[salary_gross]] PLN</strong> brutto.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 5. Urlopy i wypowiedzenie</h3>
                            <p>1. Pracownikowi przysługuje <strong>[[vacation_days]]</strong> dni urlopu wypoczynkowego w roku kalendarzowym.</p>
                            <p>2. Okres wypowiedzenia wynosi: <strong>[[notice_period]]</strong>.</p>
                        </div>',
                        'footer_html' => '
                        <table style="width: 100%; margin-top: 60px; font-size: 12px;">
                            <tr>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Pracodawca)</strong></td>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Pracownik)</strong></td>
                            </tr>
                        </table>'
                    ],
                    'de' => [
                        'title' => 'Arbeitsvertrag',
                        'description' => 'Standard-Arbeitsvertragsvorlage, die das Grunddokument zur Bestätigung der Beschäftigung in Polen ist.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA O PRACĘ</h1></div><p style="font-size: 12px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <p style="font-size: 12px;">pomiędzy:</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Pracodawcą:</strong><br>[[employer_details]]</p>
                        <p style="font-size: 12px;">a</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Pracownikiem:</strong><br>[[employee_details]]</p>

                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Rodzaj umowy</h3>
                            <p>Strony zawierają umowę o pracę <strong>[[contract_type]]</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 2. Okres zatrudnienia</h3>
                            <p>1. Data rozpoczęcia pracy: <strong>[[employment_start_date]]</strong></p>
                            <p>2. Data zakończenia: <strong>[[contract_end_date]]</strong></p>
                            <p>3. Okres próbny: [[probation_period]]</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 3. Warunki pracy</h3>
                            <p>1. Stanowisko: <strong>[[job_position]]</strong></p>
                            <p>2. Miejsce wykonywania pracy: <strong>[[work_place]]</strong></p>
                            <p>3. Wymiar czasu pracy: <strong>[[working_hours]]</strong></p>

                            <h3 style="text-align: center; font-size: 13px;">§ 4. Wynagrodzenie</h3>
                            <p>Wynagrodzenie miesięczne wynosi: <strong>[[salary_gross]] PLN</strong> brutto.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 5. Urlopy i wypowiedzenie</h3>
                            <p>1. Pracownikowi przysługuje <strong>[[vacation_days]]</strong> dni urlopu wypoczynkowego w roku kalendarzowym.</p>
                            <p>2. Okres wypowiedzenia wynosi: <strong>[[notice_period]]</strong>.</p>
                        </div>',
                        'footer_html' => '
                        <table style="width: 100%; margin-top: 60px; font-size: 12px;">
                            <tr>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Pracodawca)</strong></td>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Pracownik)</strong></td>
                            </tr>
                        </table>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o pracę',
                        'description' => 'Standardowy wzór umowy o pracę, który jest podstawowym dokumentem potwierdzającym zatrudnienie w Polsce.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA O PRACĘ</h1></div><p style="font-size: 12px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <p style="font-size: 12px;">pomiędzy:</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Pracodawcą:</strong><br>[[employer_details]]</p>
                        <p style="font-size: 12px;">a</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Pracownikiem:</strong><br>[[employee_details]]</p>

                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Rodzaj umowy</h3>
                            <p>Strony zawierają umowę o pracę <strong>[[contract_type]]</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 2. Okres zatrudnienia</h3>
                            <p>1. Data rozpoczęcia pracy: <strong>[[employment_start_date]]</strong></p>
                            <p>2. Data zakończenia: <strong>[[contract_end_date]]</strong></p>
                            <p>3. Okres próbny: [[probation_period]]</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 3. Warunki pracy</h3>
                            <p>1. Stanowisko: <strong>[[job_position]]</strong></p>
                            <p>2. Miejsce wykonywania pracy: <strong>[[work_place]]</strong></p>
                            <p>3. Wymiar czasu pracy: <strong>[[working_hours]]</strong></p>

                            <h3 style="text-align: center; font-size: 13px;">§ 4. Wynagrodzenie</h3>
                            <p>Wynagrodzenie miesięczne wynosi: <strong>[[salary_gross]] PLN</strong> brutto.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 5. Urlopy i wypowiedzenie</h3>
                            <p>1. Pracownikowi przysługuje <strong>[[vacation_days]]</strong> dni urlopu wypoczynkowego w roku kalendarzowym.</p>
                            <p>2. Okres wypowiedzenia wynosi: <strong>[[notice_period]]</strong>.</p>
                        </div>',
                        'footer_html' => '
                        <table style="width: 100%; margin-top: 60px; font-size: 12px;">
                            <tr>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Pracodawca)</strong></td>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Pracownik)</strong></td>
                            </tr>
                        </table>'
                    ]
                ]
            ],

            // 5. Umowa najmu mieszkania (УЛУЧШЕННЫЙ Договор аренды квартиры)
            [
                'category_id' => $catFamily->id,
                'slug' => 'pl-residential-lease-agreement-2025',
                'access_level' => 'free',
                'fields' => '[
    {"name":"agreement_date_place","type":"text","required":true,"labels":{"pl":"Zawarta w (miejscowość), dnia (data)","en":"Concluded in (city), on (date)","uk":"Укладено в (місто), дня (дата)","de":"Abgeschlossen in (Stadt), am (Datum)"}},
    {"name":"landlord_details","type":"textarea","required":true,"labels":{"pl":"Dane Wynajmującego (imię, nazwisko, adres, PESEL)","en":"Landlord\'s Details (name, address, PESEL)","uk":"Дані орендодавця (ім\'я, прізвище, адреса, PESEL)","de":"Vermieter-Details (Name, Adresse, PESEL)"}},
    {"name":"tenant_details","type":"textarea","required":true,"labels":{"pl":"Dane Najemcy (imię, nazwisko, adres, paszport)","en":"Tenant\'s Details (name, address, passport)","uk":"Дані орендаря (ім\'я, прізвище, адреса, паспорт)","de":"Mieter-Details (Name, Adresse, Reisepass)"}},
    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres wynajmowanego lokalu mieszkalnego","en":"Address of the rented residential property","uk":"Адреса орендованого житлового приміщення","de":"Adresse der gemieteten Wohnung"}},
    {"name":"property_description","type":"textarea","required":true,"labels":{"pl":"Opis lokalu (powierzchnia, liczba pokoi)","en":"Property description (area, number of rooms)","uk":"Опис приміщення (площа, кількість кімнат)","de":"Objektbeschreibung (Fläche, Anzahl der Zimmer)"}},
    {"name":"property_ownership_basis","type":"text","required":true,"labels":{"pl":"Podstawa władania lokalem (właściciel, spółdzielnia itp.)","en":"Basis of property ownership","uk":"Основа володіння приміщенням","de":"Grundlage des Eigentums"}},
    {"name":"lease_start","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Lease start date","uk":"Дата початку оренди","de":"Mietbeginn"}},
    {"name":"lease_end","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu","en":"Lease end date","uk":"Дата закінчення оренди","de":"Mietende"}},
    {"name":"rent_amount","type":"number","required":true,"labels":{"pl":"Miesięczny czynsz najmu (PLN)","en":"Monthly rent (PLN)","uk":"Щомісячна орендна плата (PLN)","de":"Monatliche Miete (PLN)"}},
    {"name":"utilities_fee","type":"text","required":true,"labels":{"pl":"Opłaty za media (sposób rozliczania)","en":"Utilities fees (settlement method)","uk":"Плата за комунальні послуги (спосіб розрахунку)","de":"Nebenkosten (Abrechnungsmethode)"}},
    {"name":"payment_day","type":"number","required":true,"labels":{"pl":"Termin płatności (do ... dnia miesiąca)","en":"Payment due (by the ... day of the month)","uk":"Термін оплати (до ... числа місяця)","de":"Zahlungstermin (bis zum ... Tag des Monats)"}},
    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Kaucja (PLN)","en":"Deposit (PLN)","uk":"Застава (PLN)","de":"Kaution (PLN)"}},
    {"name":"inventory_attached","type":"select","options":{"tak":"Tak","nie":"Nie"},"required":true,"labels":{"pl":"Czy załączono protokół zdawczo-odbiorczy?","en":"Is handover protocol attached?","uk":"Чи додано протокол передачі-прийому?","de":"Ist ein Übergabeprotokoll beigefügt?"}}
]',
                'translations' => [
                    'en' => [
                        'title' => 'Residential lease agreement',
                        'description' => 'Standard residential lease agreement, essential for confirming having a place of residence in Poland when applying for a residence card.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA NAJMU LOKALU MIESZKALNEGO</h1></div><p style="font-size: 12px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <p style="font-size: 12px;">pomiędzy:</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Wynajmującym:</strong><br>[[landlord_details]]</p>
                        <p style="font-size: 12px;">a</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Najemcą:</strong><br>[[tenant_details]]</p>

                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Przedmiot umowy</h3>
                            <p>1. Wynajmujący na podstawie: <strong>[[property_ownership_basis]]</strong> oddaje w najem lokal mieszkalny pod adresem: <strong>[[property_address]]</strong>.</p>
                            <p>2. Opis lokalu: [[property_description]].</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 2. Okres najmu</h3>
                            <p>Umowa zostaje zawarta na czas określony od <strong>[[lease_start]]</strong> do <strong>[[lease_end]]</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 3. Czynsz i opłaty</h3>
                            <p>1. Najemca zobowiązuje się płacić miesięczny czynsz w wysokości <strong>[[rent_amount]] PLN</strong>.</p>
                            <p>2. Niezależnie od czynszu, Najemca ponosi koszty zużycia mediów: [[utilities_fee]].</p>
                            <p>3. Płatność następuje z góry do [[payment_day]] dnia każdego miesiąca.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 4. Kaucja</h3>
                            <p>Najemca wpłacił Wynajmującemu kaucję w wysokości <strong>[[deposit_amount]] PLN</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 5. Protokół zdawczo-odbiorczy</h3>
                            <p>Protokół zdawczo-odbiorczy: <strong>[[inventory_attached]]</strong></p>
                        </div>',
                        'footer_html' => '
                        <table style="width: 100%; margin-top: 60px; font-size: 12px;">
                            <tr>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Wynajmujący)</strong></td>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Najemca)</strong></td>
                            </tr>
                        </table>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди житлового приміщення',
                        'description' => 'Стандартний договір оренди житла, необхідний для підтвердження наявності місця проживання в Польщі при подачі заяви на карту побуту.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA NAJMU LOKALU MIESZKALNEGO</h1></div><p style="font-size: 12px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <p style="font-size: 12px;">pomiędzy:</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Wynajmującym:</strong><br>[[landlord_details]]</p>
                        <p style="font-size: 12px;">a</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Najemcą:</strong><br>[[tenant_details]]</p>

                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Przedmiot umowy</h3>
                            <p>1. Wynajmujący na podstawie: <strong>[[property_ownership_basis]]</strong> oddaje w najem lokal mieszkalny pod adresem: <strong>[[property_address]]</strong>.</p>
                            <p>2. Opis lokalu: [[property_description]].</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 2. Okres najmu</h3>
                            <p>Umowa zostaje zawarta na czas określony od <strong>[[lease_start]]</strong> do <strong>[[lease_end]]</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 3. Czynsz i opłaty</h3>
                            <p>1. Najemca zobowiązuje się płacić miesięczny czynsz w wysokości <strong>[[rent_amount]] PLN</strong>.</p>
                            <p>2. Niezależnie od czynszu, Najemca ponosi koszty zużycia mediów: [[utilities_fee]].</p>
                            <p>3. Płatność następuje z góry do [[payment_day]] dnia każdego miesiąca.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 4. Kaucja</h3>
                            <p>Najemca wpłacił Wynajmującemu kaucję w wysokości <strong>[[deposit_amount]] PLN</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 5. Protokół zdawczo-odbiorczy</h3>
                            <p>Protokół zdawczo-odbiorczy: <strong>[[inventory_attached]]</strong></p>
                        </div>',
                        'footer_html' => '
                        <table style="width: 100%; margin-top: 60px; font-size: 12px;">
                            <tr>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Wynajmujący)</strong></td>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Najemca)</strong></td>
                            </tr>
                        </table>'
                    ],
                    'de' => [
                        'title' => 'Mietvertrag für Wohnräume',
                        'description' => 'Standard-Mietvertrag für Wohnräume, erforderlich zur Bestätigung eines Wohnsitzes in Polen bei der Beantragung einer Aufenthaltskarte.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA NAJMU LOKALU MIESZKALNEGO</h1></div><p style="font-size: 12px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <p style="font-size: 12px;">pomiędzy:</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Wynajmującym:</strong><br>[[landlord_details]]</p>
                        <p style="font-size: 12px;">a</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Najemcą:</strong><br>[[tenant_details]]</p>

                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Przedmiot umowy</h3>
                            <p>1. Wynajmujący na podstawie: <strong>[[property_ownership_basis]]</strong> oddaje w najem lokal mieszkalny pod adresem: <strong>[[property_address]]</strong>.</p>
                            <p>2. Opis lokalu: [[property_description]].</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 2. Okres najmu</h3>
                            <p>Umowa zostaje zawarta na czas określony od <strong>[[lease_start]]</strong> do <strong>[[lease_end]]</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 3. Czynsz i opłaty</h3>
                            <p>1. Najemca zobowiązuje się płacić miesięczny czynsz w wysokości <strong>[[rent_amount]] PLN</strong>.</p>
                            <p>2. Niezależnie od czynszu, Najemca ponosi koszty zużycia mediów: [[utilities_fee]].</p>
                            <p>3. Płatność następuje z góry do [[payment_day]] dnia każdego miesiąca.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 4. Kaucja</h3>
                            <p>Najemca wpłacił Wynajmującemu kaucję w wysokości <strong>[[deposit_amount]] PLN</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 5. Protokół zdawczo-odbiorczy</h3>
                            <p>Protokół zdawczo-odbiorczy: <strong>[[inventory_attached]]</strong></p>
                        </div>',
                        'footer_html' => '
                        <table style="width: 100%; margin-top: 60px; font-size: 12px;">
                            <tr>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Wynajmujący)</strong></td>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Najemca)</strong></td>
                            </tr>
                        </table>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu lokalu mieszkalnego',
                        'description' => 'Standardowa umowa najmu mieszkania, niezbędna do potwierdzenia posiadania miejsca zamieszkania w Polsce przy składaniu wniosku o kartę pobytu.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA NAJMU LOKALU MIESZKALNEGO</h1></div><p style="font-size: 12px;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <p style="font-size: 12px;">pomiędzy:</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Wynajmującym:</strong><br>[[landlord_details]]</p>
                        <p style="font-size: 12px;">a</p>
                        <p style="font-size: 12px; line-height: 1.6;"><strong>Najemcą:</strong><br>[[tenant_details]]</p>

                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Przedmiot umowy</h3>
                            <p>1. Wynajmujący na podstawie: <strong>[[property_ownership_basis]]</strong> oddaje w najem lokal mieszkalny pod adresem: <strong>[[property_address]]</strong>.</p>
                            <p>2. Opis lokalu: [[property_description]].</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 2. Okres najmu</h3>
                            <p>Umowa zostaje zawarta na czas określony od <strong>[[lease_start]]</strong> do <strong>[[lease_end]]</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 3. Czynsz i opłaty</h3>
                            <p>1. Najemca zobowiązuje się płacić miesięczny czynsz w wysokości <strong>[[rent_amount]] PLN</strong>.</p>
                            <p>2. Niezależnie od czynszu, Najemca ponosi koszty zużycia mediów: [[utilities_fee]].</p>
                            <p>3. Płatność następuje z góry do [[payment_day]] dnia każdego miesiąca.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 4. Kaucja</h3>
                            <p>Najemca wpłacił Wynajmującemu kaucję w wysokości <strong>[[deposit_amount]] PLN</strong>.</p>

                            <h3 style="text-align: center; font-size: 13px;">§ 5. Protokół zdawczo-odbiorczy</h3>
                            <p>Protokół zdawczo-odbiorczy: <strong>[[inventory_attached]]</strong></p>
                        </div>',
                        'footer_html' => '
                        <table style="width: 100%; margin-top: 60px; font-size: 12px;">
                            <tr>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Wynajmujący)</strong></td>
                                <td style="width: 50%; text-align: center;">..................................<br><strong>(Najemca)</strong></td>
                            </tr>
                        </table>'
                    ]
                ]
            ]
        ];

        foreach ($templatesData as $templateData) {
            $this->createTemplate($templateData['category_id'], $templateData);
        }
    }

    private function createTemplate(int $categoryId, array $data): void
    {
        $template = Template::updateOrCreate(
            ['slug' => $data['slug']],
            [
                'category_id' => $categoryId,
                'is_active' => $data['is_active'] ?? true,
                'access_level' => $data['access_level'] ?? 'free',
                'country_code' => 'PL',
                'fields' => is_string($data['fields']) ? json_decode($data['fields'], true) : $data['fields'],
            ]
        );

        if (isset($data['translations']) && is_array($data['translations'])) {
            foreach ($data['translations'] as $locale => $transData) {
                $template->translations()->updateOrCreate(['locale' => $locale], $transData);
            }
        }
    }
}

