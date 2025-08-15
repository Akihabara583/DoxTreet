<?php

namespace Database\Seeders\DE;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class DeFamilyPackageSeeder extends Seeder
{
    /**
     * Run the database seeds for the German "Family and Children" Package 2025-2026.
     */
    public function run(): void
    {
        // Предполагаем, что у вас есть эта категория
        $catFamily = Category::where('slug', 'personal-family-de')->firstOrFail();

        $templatesData = [
            // === ПАКЕТ "СЕМЬЯ И ДЕТИ" (PRO) ===

            // 1. Заявление на получение детского пособия (Antrag auf Kindergeld)
            [
                'category_id' => $catFamily->id,
                'slug' => 'de-kindergeld-application-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"applicant_details","type":"textarea","required":true,"labels":{"de":"Angaben zur antragstellenden Person (Name, Anschrift, Geburtsdatum)","en":"Details of the applicant (name, address, date of birth)","pl":"Dane wnioskodawcy (imię i nazwisko, adres, data urodzenia)","uk":"Дані заявника (ім\'я, адреса, дата народження)"}},
                    {"name":"applicant_tax_id","type":"text","required":true,"labels":{"de":"Steuer-Identifikationsnummer der antragstellenden Person","en":"Tax ID of the applicant","pl":"Numer identyfikacji podatkowej wnioskodawcy","uk":"Податковий номер заявника"}},
                    {"name":"partner_details","type":"textarea","required":true,"labels":{"de":"Angaben zum anderen Elternteil / Partner","en":"Details of the other parent / partner","pl":"Dane drugiego rodzica / partnera","uk":"Дані іншого з батьків / партнера"}},
                    {"name":"bank_details_iban","type":"text","required":true,"labels":{"de":"Bankverbindung (IBAN) für die Auszahlung","en":"Bank details (IBAN) for payment","pl":"Dane bankowe (IBAN) do wypłaty","uk":"Банківські реквізити (IBAN) для виплати"}},
                    {"name":"children_details","type":"textarea","required":true,"labels":{"de":"Angaben zu allen Kindern (Name, Geburtsdatum, Steuer-ID)","en":"Details of all children (name, date of birth, Tax ID)","pl":"Dane wszystkich dzieci (imię i nazwisko, data urodzenia, NIP)","uk":"Дані всіх дітей (ім\'я, дата народження, податковий номер)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Kindergeld (KG1)',
                        'description' => 'Offizieller Antrag auf Kindergeld bei der Familienkasse der Bundesagentur für Arbeit. Ein Muss für alle Familien mit Kindern in Deutschland.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Kindergeld</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die<br><strong>Familienkasse</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">3. Angaben zum Betreuungsbedarf</h3>
                            <p>Gewünschter Betreuungsbeginn: <strong>[[desired_start_date]]</strong></p>
                            <p>Gewünschter Betreuungsumfang: <strong>[[weekly_hours]] Stunden/Woche</strong></p>
                            <p>Wunscheinrichtungen (Priorität 1-3):<br><span style="white-space: pre-wrap;">[[kita_preferences]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">4. Begründung des Bedarfs</h3>
                            <p>Berufstätigkeit der Eltern:<br><span style="white-space: pre-wrap;">[[parents_employment_status]]</span></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der Erziehungsberechtigten: _________________________</p></div>'
                    ],
                    'en' => [
                        'title' => 'Child Benefit Application (KG1)',
                        'description' => 'Official application for child benefit at the Family Benefits Office of the Federal Employment Agency. Essential for all families with children in Germany.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Kindergeld</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die<br><strong>Familienkasse</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">1. Angaben zur antragstellenden Person</h3>
                            <p style="white-space: pre-wrap;">[[applicant_details]]</p>
                            <p>Steuer-ID: <strong>[[applicant_tax_id]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">2. Angaben zum Ehegatten / Lebenspartner / anderen Elternteil</h3>
                            <p style="white-space: pre-wrap;">[[partner_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">3. Zahlungsangaben</h3>
                            <p>Das Kindergeld soll auf folgendes Konto überwiesen werden:<br>IBAN: <strong>[[bank_details_iban]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">4. Angaben zu den Kindern</h3>
                            <p style="white-space: pre-wrap;">[[children_details]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der antragstellenden Person: _________________________</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o zasiłek na dziecko (KG1)',
                        'description' => 'Oficjalny wniosek o zasiłek na dziecko w Kasie Rodzinnej Federalnej Agencji Pracy. Obowiązkowy dla wszystkich rodzin z dziećmi w Niemczech.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Kindergeld</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die<br><strong>Familienkasse</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">1. Angaben zur antragstellenden Person</h3>
                            <p style="white-space: pre-wrap;">[[applicant_details]]</p>
                            <p>Steuer-ID: <strong>[[applicant_tax_id]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">2. Angaben zum Ehegatten / Lebenspartner / anderen Elternteil</h3>
                            <p style="white-space: pre-wrap;">[[partner_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">3. Zahlungsangaben</h3>
                            <p>Das Kindergeld soll auf folgendes Konto überwiesen werden:<br>IBAN: <strong>[[bank_details_iban]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">4. Angaben zu den Kindern</h3>
                            <p style="white-space: pre-wrap;">[[children_details]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der antragstellenden Person: _________________________</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на дитячу допомогу (KG1)',
                        'description' => 'Офіційна заява на дитячу допомогу в Сімейній касі Федерального агентства зайнятості. Обов\'язкова для всіх сімей з дітьми в Німеччині.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Kindergeld</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die<br><strong>Familienkasse</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">1. Angaben zur antragstellenden Person</h3>
                            <p style="white-space: pre-wrap;">[[applicant_details]]</p>
                            <p>Steuer-ID: <strong>[[applicant_tax_id]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">2. Angaben zum Ehegatten / Lebenspartner / anderen Elternteil</h3>
                            <p style="white-space: pre-wrap;">[[partner_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">3. Zahlungsangaben</h3>
                            <p>Das Kindergeld soll auf folgendes Konto überwiesen werden:<br>IBAN: <strong>[[bank_details_iban]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">4. Angaben zu den Kindern</h3>
                            <p style="white-space: pre-wrap;">[[children_details]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der antragstellenden Person: _________________________</p></div>'
                    ]
                ]
            ],

            // 2. Заявление на получение родительского пособия (Antrag auf Elterngeld)
            [
                'category_id' => $catFamily->id,
                'slug' => 'de-elterngeld-application-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"child_details","type":"textarea","required":true,"labels":{"de":"Angaben zum Kind (Name, Geburtsdatum)","en":"Child\'s details (name, date of birth)","pl":"Dane dziecka (imię i nazwisko, data urodzenia)","uk":"Дані дитини (ім\'я, дата народження)"}},
                    {"name":"parent1_details","type":"textarea","required":true,"labels":{"de":"Angaben zum 1. Elternteil (Antragsteller)","en":"Details of parent 1 (applicant)","pl":"Dane 1. rodzica (wnioskodawca)","uk":"Дані 1-го з батьків (заявник)"}},
                    {"name":"parent2_details","type":"textarea","required":true,"labels":{"de":"Angaben zum 2. Elternteil","en":"Details of parent 2","pl":"Dane 2. rodzica","uk":"Дані 2-го з батьків"}},
                    {"name":"benefit_period_parent1","type":"textarea","required":true,"labels":{"de":"Bezugszeitraum für Elternteil 1 (von Lebensmonat bis Lebensmonat)","en":"Benefit period for parent 1 (from month of life to month of life)","pl":"Okres pobierania świadczenia dla rodzica 1 (od miesiąca życia do miesiąca życia)","uk":"Період отримання допомоги для 1-го з батьків (від місяця життя до місяця життя)"}},
                    {"name":"benefit_period_parent2","type":"textarea","required":true,"labels":{"de":"Bezugszeitraum für Elternteil 2","en":"Benefit period for parent 2","pl":"Okres pobierania świadczenia dla rodzica 2","uk":"Період отримання допомоги для 2-го з батьків"}},
                    {"name":"income_details","type":"textarea","required":true,"labels":{"de":"Angaben zum Erwerbseinkommen vor der Geburt","en":"Information on earned income before birth","pl":"Informacje o dochodach z pracy przed urodzeniem dziecka","uk":"Інформація про доходи до народження дитини"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Elterngeld',
                        'description' => 'Allgemeiner Antrag auf Elterngeld (Basiselterngeld und ElterngeldPlus). Unterstützt Eltern finanziell nach der Geburt eines Kindes.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Elterngeld</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die zuständige Elterngeldstelle</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">A. Angaben zum Kind</h3>
                            <p style="white-space: pre-wrap;">[[child_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">B. Angaben zu den Eltern</h3>
                            <p><strong>Elternteil 1 (Antragsteller):</strong><br><span style="white-space: pre-wrap;">[[parent1_details]]</span></p>
                            <p><strong>Elternteil 2:</strong><br><span style="white-space: pre-wrap;">[[parent2_details]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">C. Bezugszeiträume</h3>
                            <p>Ich beantrage Elterngeld für folgende Lebensmonate des Kindes:<br><strong>Elternteil 1:</strong> [[benefit_period_parent1]]<br><strong>Elternteil 2:</strong> [[benefit_period_parent2]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift beider Elternteile: _________________________ / _________________________</p></div>'
                    ],
                    'en' => [
                        'title' => 'Parental Allowance Application',
                        'description' => 'General application for parental allowance (basic parental allowance and ElterngeldPlus). Provides financial support to parents after the birth of a child.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Elterngeld</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die zuständige Elterngeldstelle</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">A. Angaben zum Kind</h3>
                            <p style="white-space: pre-wrap;">[[child_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">B. Angaben zu den Eltern</h3>
                            <p><strong>Elternteil 1 (Antragsteller):</strong><br><span style="white-space: pre-wrap;">[[parent1_details]]</span></p>
                            <p><strong>Elternteil 2:</strong><br><span style="white-space: pre-wrap;">[[parent2_details]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">C. Bezugszeiträume</h3>
                            <p>Ich beantrage Elterngeld für folgende Lebensmonate des Kindes:<br><strong>Elternteil 1:</strong> [[benefit_period_parent1]]<br><strong>Elternteil 2:</strong> [[benefit_period_parent2]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift beider Elternteile: _________________________ / _________________________</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o zasiłek rodzicielski',
                        'description' => 'Ogólny wniosek o zasiłek rodzicielski (podstawowy zasiłek rodzicielski i ElterngeldPlus). Zapewnia wsparcie finansowe rodzicom po narodzinach dziecka.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Elterngeld</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die zuständige Elterngeldstelle</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">A. Angaben zum Kind</h3>
                            <p style="white-space: pre-wrap;">[[child_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">B. Angaben zu den Eltern</h3>
                            <p><strong>Elternteil 1 (Antragsteller):</strong><br><span style="white-space: pre-wrap;">[[parent1_details]]</span></p>
                            <p><strong>Elternteil 2:</strong><br><span style="white-space: pre-wrap;">[[parent2_details]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">C. Bezugszeiträume</h3>
                            <p>Ich beantrage Elterngeld für folgende Lebensmonate des Kindes:<br><strong>Elternteil 1:</strong> [[benefit_period_parent1]]<br><strong>Elternteil 2:</strong> [[benefit_period_parent2]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift beider Elternteile: _________________________ / _________________________</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на батьківську допомогу',
                        'description' => 'Загальна заява на батьківську допомогу (базова батьківська допомога та ElterngeldPlus). Забезпечує фінансову підтримку батькам після народження дитини.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Elterngeld</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An die zuständige Elterngeldstelle</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">A. Angaben zum Kind</h3>
                            <p style="white-space: pre-wrap;">[[child_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">B. Angaben zu den Eltern</h3>
                            <p><strong>Elternteil 1 (Antragsteller):</strong><br><span style="white-space: pre-wrap;">[[parent1_details]]</span></p>
                            <p><strong>Elternteil 2:</strong><br><span style="white-space: pre-wrap;">[[parent2_details]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">C. Bezugszeiträume</h3>
                            <p>Ich beantrage Elterngeld für folgende Lebensmonate des Kindes:<br><strong>Elternteil 1:</strong> [[benefit_period_parent1]]<br><strong>Elternteil 2:</strong> [[benefit_period_parent2]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift beider Elternteile: _________________________ / _________________________</p></div>'
                    ]
                ]
            ],

            // 3. Заявление о приеме ребенка в детский сад (Antrag auf einen Kitaplatz)
            [
                'category_id' => $catFamily->id,
                'slug' => 'de-kitaplatz-application-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"child_details","type":"textarea","required":true,"labels":{"de":"Angaben zum Kind (Name, Geburtsdatum, Anschrift)","en":"Child\'s details (name, date of birth, address)","pl":"Dane dziecka (imię, nazwisko, data urodzenia, adres)","uk":"Дані дитини (ім\'я, дата народження, адреса)"}},
                    {"name":"parent1_details","type":"textarea","required":true,"labels":{"de":"Angaben zum Erziehungsberechtigten 1 (Name, Anschrift, Telefon, E-Mail)","en":"Details of parent/guardian 1 (name, address, phone, email)","pl":"Dane opiekuna 1 (imię, nazwisko, adres, telefon, e-mail)","uk":"Дані опікуна 1 (ім\'я, адреса, телефон, e-mail)"}},
                    {"name":"parent2_details","type":"textarea","required":false,"labels":{"de":"Angaben zum Erziehungsberechtigten 2","en":"Details of parent/guardian 2","pl":"Dane opiekuna 2","uk":"Дані опікуна 2"}},
                    {"name":"desired_start_date","type":"date","required":true,"labels":{"de":"Gewünschter Betreuungsbeginn","en":"Desired start date of care","pl":"Oczekiwana data rozpoczęcia opieki","uk":"Бажана дата початку догляду"}},
                    {"name":"weekly_hours","type":"text","required":true,"labels":{"de":"Gewünschter Betreuungsumfang (Stunden pro Woche)","en":"Desired scope of care (hours per week)","pl":"Oczekiwany wymiar opieki (godzin tygodniowo)","uk":"Бажаний обсяг догляду (годин на тиждень)"}},
                    {"name":"kita_preferences","type":"textarea","required":false,"labels":{"de":"Wunscheinrichtungen (Kita 1, Kita 2, Kita 3)","en":"Preferred facilities (Kita 1, Kita 2, Kita 3)","pl":"Preferowane placówki (Przedszkole 1, 2, 3)","uk":"Бажані заклади (Дитячий садок 1, 2, 3)"}},
                    {"name":"parents_employment_status","type":"textarea","required":true,"labels":{"de":"Angaben zur Berufstätigkeit der Eltern","en":"Information on parents\' employment status","pl":"Informacje o zatrudnieniu rodziców","uk":"Інформація про працевлаштування батьків"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf einen Betreuungsplatz (Kitaplatz)',
                        'description' => 'Allgemeiner Antrag auf einen Platz in einer Kindertageseinrichtung (Krippe oder Kindergarten). Wird beim zuständigen Jugendamt oder der Stadtverwaltung eingereicht.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Förderung eines Kindes in einer Kindertageseinrichtung (Kita)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An das zuständige<br><strong>Jugendamt / die Stadtverwaltung</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">1. Angaben zum Kind</h3>
                            <p style="white-space: pre-wrap;">[[child_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">2. Angaben zu den Erziehungsberechtigten</h3>
                            <p><strong>Erziehungsberechtigter 1:</strong><br><span style="white-space: pre-wrap;">[[parent1_details]]</span></p>
                            <p><strong>Erziehungsberechtigter 2:</strong><br><span style="white-space: pre-wrap;">[[parent2_details]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">1. Angaben zur antragstellenden Person</h3>
                            <p style="white-space: pre-wrap;">[[applicant_details]]</p>
                            <p>Steuer-ID: <strong>[[applicant_tax_id]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">2. Angaben zum Ehegatten / Lebenspartner / anderen Elternteil</h3>
                            <p style="white-space: pre-wrap;">[[partner_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">3. Zahlungsangaben</h3>
                            <p>Das Kindergeld soll auf folgendes Konto überwiesen werden:<br>IBAN: <strong>[[bank_details_iban]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">4. Angaben zu den Kindern</h3>
                            <p style="white-space: pre-wrap;">[[children_details]]</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der antragstellenden Person: _________________________</p></div>'
                    ],
                    'en' => [
                        'title' => 'Application for a Childcare Place (Kita Place)',
                        'description' => 'General application for a place in a childcare facility (nursery or kindergarten). Submitted to the responsible youth welfare office or city administration.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Förderung eines Kindes in einer Kindertageseinrichtung (Kita)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An das zuständige<br><strong>Jugendamt / die Stadtverwaltung</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">1. Angaben zum Kind</h3>
                            <p style="white-space: pre-wrap;">[[child_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">2. Angaben zu den Erziehungsberechtigten</h3>
                            <p><strong>Erziehungsberechtigter 1:</strong><br><span style="white-space: pre-wrap;">[[parent1_details]]</span></p>
                            <p><strong>Erziehungsberechtigter 2:</strong><br><span style="white-space: pre-wrap;">[[parent2_details]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">3. Angaben zum Betreuungsbedarf</h3>
                            <p>Gewünschter Betreuungsbeginn: <strong>[[desired_start_date]]</strong></p>
                            <p>Gewünschter Betreuungsumfang: <strong>[[weekly_hours]] Stunden/Woche</strong></p>
                            <p>Wunscheinrichtungen (Priorität 1-3):<br><span style="white-space: pre-wrap;">[[kita_preferences]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">4. Begründung des Bedarfs</h3>
                            <p>Berufstätigkeit der Eltern:<br><span style="white-space: pre-wrap;">[[parents_employment_status]]</span></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der Erziehungsberechtigten: _________________________</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o miejsce w przedszkolu/żłobku (Kita)',
                        'description' => 'Ogólny wniosek o miejsce w placówce opieki nad dzieckiem (żłobek lub przedszkole). Składany w odpowiednim urzędzie ds. młodzieży lub administracji miejskiej.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Förderung eines Kindes in einer Kindertageseinrichtung (Kita)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An das zuständige<br><strong>Jugendamt / die Stadtverwaltung</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">1. Angaben zum Kind</h3>
                            <p style="white-space: pre-wrap;">[[child_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">2. Angaben zu den Erziehungsberechtigten</h3>
                            <p><strong>Erziehungsberechtigter 1:</strong><br><span style="white-space: pre-wrap;">[[parent1_details]]</span></p>
                            <p><strong>Erziehungsberechtigter 2:</strong><br><span style="white-space: pre-wrap;">[[parent2_details]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">3. Angaben zum Betreuungsbedarf</h3>
                            <p>Gewünschter Betreuungsbeginn: <strong>[[desired_start_date]]</strong></p>
                            <p>Gewünschter Betreuungsumfang: <strong>[[weekly_hours]] Stunden/Woche</strong></p>
                            <p>Wunscheinrichtungen (Priorität 1-3):<br><span style="white-space: pre-wrap;">[[kita_preferences]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">4. Begründung des Bedarfs</h3>
                            <p>Berufstätigkeit der Eltern:<br><span style="white-space: pre-wrap;">[[parents_employment_status]]</span></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der Erziehungsberechtigten: _________________________</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на місце в дитячому садку (Kita)',
                        'description' => 'Загальна заява на місце в дитячому закладі (ясла або дитячий садок). Подається до відповідного управління у справах молоді або міської адміністрації.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Förderung eines Kindes in einer Kindertageseinrichtung (Kita)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An das zuständige<br><strong>Jugendamt / die Stadtverwaltung</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">1. Angaben zum Kind</h3>
                            <p style="white-space: pre-wrap;">[[child_details]]</p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">2. Angaben zu den Erziehungsberechtigten</h3>
                            <p><strong>Erziehungsberechtigter 1:</strong><br><span style="white-space: pre-wrap;">[[parent1_details]]</span></p>
                            <p><strong>Erziehungsberechtigter 2:</strong><br><span style="white-space: pre-wrap;">[[parent2_details]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">3. Angaben zum Betreuungsbedarf</h3>
                            <p>Gewünschter Betreuungsbeginn: <strong>[[desired_start_date]]</strong></p>
                            <p>Gewünschter Betreuungsumfang: <strong>[[weekly_hours]] Stunden/Woche</strong></p>
                            <p>Wunscheinrichtungen (Priorität 1-3):<br><span style="white-space: pre-wrap;">[[kita_preferences]]</span></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">4. Begründung des Bedarfs</h3>
                            <p>Berufstätigkeit der Eltern:<br><span style="white-space: pre-wrap;">[[parents_employment_status]]</span></p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der Erziehungsberechtigten: _________________________</p></div>'
                    ]
                ]
            ]

        ];

        foreach ($templatesData as $templateData) {
            $this->createTemplate($catFamily->id, $templateData);
        }
    }

    private function createTemplate(int $categoryId, array $data): void
    {
        // Эта функция должна быть адаптирована к вашей структуре модели
        $template = Template::updateOrCreate(
            ['slug' => $data['slug']],
            [
                'category_id' => $categoryId,
                'is_active' => $data['is_active'] ?? true,
                'access_level' => $data['access_level'],
                'country_code' => 'DE',
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
