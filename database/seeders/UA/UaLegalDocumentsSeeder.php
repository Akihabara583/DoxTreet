<?php

namespace Database\Seeders\UA;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Support\Arr;

class UaLegalDocumentsSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'legal-claims-ua')->first();
        if (!$category) {
            $this->command->error('Category with slug "legal-claims" not found.');
            return;
        }

        $templatesData = [
            // --- 1. Исковое заявление о взыскании долга по расписке ---
            [
                'slug' => 'statement-claim-debt-receipt-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"court_name","type":"text","required":true,"labels":{"uk":"Назва суду","en":"Court Name", "pl":"Nazwa sądu", "de":"Gerichtsname"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"uk":"Адреса суду","en":"Court Address", "pl":"Adres sądu", "de":"Gerichtsadresse"}},
                    {"name":"plaintiff_name","type":"text","required":true,"labels":{"uk":"ПІБ истца","en":"Plaintiff\'s Full Name", "pl":"Imię i nazwisko powoda", "de":"Vollständiger Name des Klägers"}},
                    {"name":"plaintiff_address","type":"text","required":true,"labels":{"uk":"Адреса истца","en":"Plaintiff\'s Address", "pl":"Adres powoda", "de":"Adresse des Klägers"}},
                    {"name":"plaintiff_phone","type":"text","required":false,"labels":{"uk":"Телефон истца","en":"Plaintiff\'s Phone", "pl":"Telefon powoda", "de":"Telefon des Klägers"}},
                    {"name":"defendant_name","type":"text","required":true,"labels":{"uk":"ПІБ ответчика","en":"Defendant\'s Full Name", "pl":"Imię i nazwisko pozwanego", "de":"Vollständiger Name des Beklagten"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"uk":"Адреса ответчика","en":"Defendant\'s Address", "pl":"Adres pozwanego", "de":"Adresse des Beklagten"}},
                    {"name":"loan_date","type":"date","required":true,"labels":{"uk":"Дата расписки/договора займа","en":"Date of Receipt/Loan Agreement", "pl":"Data pokwitowania/umowy pożyczki", "de":"Datum der Quittung/des Darlehensvertrags"}},
                    {"name":"loan_amount","type":"number","required":true,"labels":{"uk":"Сумма долга по расписке (грн)","en":"Debt Amount per Receipt (UAH)", "pl":"Kwota długu z pokwitowania (UAH)", "de":"Schuldbetrag gemäß Quittung (UAH)"}},
                    {"name":"loan_amount_text","type":"text","required":true,"labels":{"uk":"Сумма долга прописью","en":"Debt Amount in Words", "pl":"Kwota długu słownie", "de":"Schuldbetrag in Worten"}},
                    {"name":"repayment_date_due","type":"date","required":true,"labels":{"uk":"Дата, до которой должен был быть возвращен долг","en":"Due Date for Debt Repayment", "pl":"Data, do której dług miał być zwrócony", "de":"Fälligkeitsdatum der Schuldenrückzahlung"}},
                    {"name":"claim_details","type":"textarea","required":true,"labels":{"uk":"Обстоятельства возникновения долга и невозврата","en":"Circumstances of Debt Incurrence and Non-Repayment", "pl":"Okoliczności powstania długu i jego niezwrócenia", "de":"Umstände der Schuldenentstehung und Nichtrückzahlung"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Требования истца (взыскать сумму, проценты, судебные издержки)","en":"Plaintiff\'s Demands (recover amount, interest, court costs)", "pl":"Żądania powoda (odzyskanie kwoty, odsetek, kosztów sądowych)", "de":"Forderungen des Klägers (Betrag, Zinsen, Gerichtskosten)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Позовна заява про стягнення боргу за розпискою',
                        'description' => 'Заява до суду про стягнення грошового боргу, підтвердженого розпискою або договором позики.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Позивач: [[plaintiff_name]]</p>
                                <p>Адреса: [[plaintiff_address]]</p>
                                <p>Телефон: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Відповідач: [[defendant_name]]</p>
                                <p>Адреса: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ПОЗОВНА ЗАЯВА</h1>
                                <p style="text-align: center;">про стягнення боргу за розпискою</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[loan_date]] року між мною та відповідачем [[defendant_name]] було укладено договір позики (або отримано розписку) на суму <strong>[[loan_amount]]</strong> грн ([[loan_amount_text]]).</p>
                                <p>Згідно з умовами, відповідач зобов\'язаний був повернути борг до [[repayment_date_due]].</p>
                                <p>Обставини виникнення та не повернення боргу: [[claim_details]]</p>
                                <p>На підставі вищевикладеного, керуючись ст.ст. 1046, 1049, 1050, 1054 Цивільного кодексу України, ст.ст. 175, 177 Цивільного процесуального кодексу України, прошу суд:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Позивач: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Debt Recovery based on Receipt',
                        'description' => 'Application to the court for recovery of monetary debt confirmed by a receipt or loan agreement.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Plaintiff: [[plaintiff_name]]</p>
                                <p>Address: [[plaintiff_address]]</p>
                                <p>Phone: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Defendant: [[defendant_name]]</p>
                                <p>Address: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">STATEMENT OF CLAIM</h1>
                                <p style="text-align: center;">for debt recovery based on receipt</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>On [[loan_date]], a loan agreement was concluded (or a receipt was issued) between me and the defendant [[defendant_name]] for the amount of <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]).</p>
                                <p>According to the terms, the defendant was obliged to repay the debt by [[repayment_date_due]].</p>
                                <p>Circumstances of debt incurrence and non-repayment: [[claim_details]]</p>
                                <p>Based on the foregoing, guided by Articles 1046, 1049, 1050, 1054 of the Civil Code of Ukraine, Articles 175, 177 of the Civil Procedure Code of Ukraine, I ask the court:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Plaintiff: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pozew o zwrot długu z pokwitowania',
                        'description' => 'Pozew do sądu o zwrot długu pieniężnego potwierdzonego pokwitowaniem lub umową pożyczki.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Powód: [[plaintiff_name]]</p>
                                <p>Adres: [[plaintiff_address]]</p>
                                <p>Telefon: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Pozwany: [[defendant_name]]</p>
                                <p>Adres: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">POZEW</h1>
                                <p style="text-align: center;">o zwrot długu z pokwitowania</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>W dniu [[loan_date]] między mną a pozwanym [[defendant_name]] została zawarta umowa pożyczki (lub otrzymano pokwitowanie) na kwotę <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]).</p>
                                <p>Zgodnie z warunkami, pozwany był zobowiązany zwrócić dług do [[repayment_date_due]].</p>
                                <p>Okoliczności powstania i niezwrócenia długu: [[claim_details]]</p>
                                <p>Na podstawie powyższego, kierując się art. 1046, 1049, 1050, 1054 Kodeksu Cywilnego Ukrainy, art. 175, 177 Kodeksu Postępowania Cywilnego Ukrainy, proszę sąd o:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Powód: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Klage auf Rückzahlung von Schulden gemäß Quittung',
                        'description' => 'Klage auf Rückzahlung von Geldschulden, die durch eine Quittung oder einen Darlehensvertrag bestätigt wurden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Kläger: [[plaintiff_name]]</p>
                                <p>Adresse: [[plaintiff_address]]</p>
                                <p>Telefon: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Beklagter: [[defendant_name]]</p>
                                <p>Adresse: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">KLAGESCHRIFT</h1>
                                <p style="text-align: center;">auf Rückzahlung von Schulden gemäß Quittung</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Am [[loan_date]] wurde zwischen mir und dem Beklagten [[defendant_name]] ein Darlehensvertrag geschlossen (oder eine Quittung ausgestellt) über den Betrag von <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]).</p>
                                <p>Gemäß den Bedingungen war der Beklagte verpflichtet, die Schuld bis zum [[repayment_date_due]] zurückzuzahlen.</p>
                                <p>Umstände der Schuldenentstehung und Nichtrückzahlung: [[claim_details]]</p>
                                <p>Aufgrund des oben Gesagten, gestützt auf die Artikel 1046, 1049, 1050, 1054 des Zivilgesetzbuches der Ukraine und die Artikel 175, 177 der Zivilprozessordnung der Ukraine, bitte ich das Gericht:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kläger: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 2. Исковое заявление о расторжении брака ---
            [
                'slug' => 'statement-claim-divorce-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"court_name","type":"text","required":true,"labels":{"uk":"Назва суду","en":"Court Name", "pl":"Nazwa sądu", "de":"Gerichtsname"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"uk":"Адреса суду","en":"Court Address", "pl":"Adres sądu", "de":"Gerichtsadresse"}},
                    {"name":"plaintiff_name","type":"text","required":true,"labels":{"uk":"ПІБ истца","en":"Plaintiff\'s Full Name", "pl":"Imię i nazwisko powoda", "de":"Vollständiger Name des Klägers"}},
                    {"name":"plaintiff_address","type":"text","required":true,"labels":{"uk":"Адреса истца","en":"Plaintiff\'s Address", "pl":"Adres powoda", "de":"Adresse des Klägers"}},
                    {"name":"plaintiff_phone","type":"text","required":false,"labels":{"uk":"Телефон истца","en":"Plaintiff\'s Phone", "pl":"Telefon powoda", "de":"Telefon des Klägers"}},
                    {"name":"defendant_name","type":"text","required":true,"labels":{"uk":"ПІБ ответчика","en":"Defendant\'s Full Name", "pl":"Imię i nazwisko pozwanego", "de":"Vollständiger Name des Beklagten"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"uk":"Адреса ответчика","en":"Defendant\'s Address", "pl":"Adres pozwanego", "de":"Adresse des Beklagten"}},
                    {"name":"marriage_date","type":"date","required":true,"labels":{"uk":"Дата регистрации брака","en":"Marriage Registration Date", "pl":"Data rejestracji małżeństwa", "de":"Datum der Eheschließung"}},
                    {"name":"marriage_certificate_number","type":"text","required":true,"labels":{"uk":"Номер свидетельства о браке","en":"Marriage Certificate Number", "pl":"Numer aktu małżeństwa", "de":"Nummer der Heiratsurkunde"}},
                    {"name":"children_details","type":"textarea","required":false,"labels":{"uk":"Сведения о несовершеннолетних детях (ПІБ, дата рождения)","en":"Information about minor children (Full Name, Date of Birth)", "pl":"Informacje o małoletnich dzieciach (Imię i Nazwisko, data urodzenia)", "de":"Informationen zu minderjährigen Kindern (Name, Geburtsdatum)"}},
                    {"name":"divorce_reason","type":"textarea","required":true,"labels":{"uk":"Причины расторжения брака","en":"Reasons for Divorce", "pl":"Przyczyny rozwiązania małżeństwa", "de":"Gründe für die Scheidung"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Требования истца (расторгнуть брак, определить место жительства детей, взыскать алименты)","en":"Plaintiff\'s Demands (dissolve marriage, determine child\'s residence, recover alimony)", "pl":"Żądania powoda (rozwiązanie małżeństwa, ustalenie miejsca zamieszkania dzieci, zasądzenie alimentów)", "de":"Forderungen des Klägers (Ehescheidung, Festlegung des Wohnsitzes der Kinder, Unterhaltsforderung)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Позовна заява про розірвання шлюбу',
                        'description' => 'Заява до суду про розірвання шлюбу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Позивач: [[plaintiff_name]]</p>
                                <p>Адреса: [[plaintiff_address]]</p>
                                <p>Телефон: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Відповідач: [[defendant_name]]</p>
                                <p>Адреса: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ПОЗОВНА ЗАЯВА</h1>
                                <p style="text-align: center;">про розірвання шлюбу</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[marriage_date]] року між мною та відповідачем [[defendant_name]] було зареєстровано шлюб, свідоцтво про шлюб № [[marriage_certificate_number]].</p>
                                [[children_details]]<p>Від шлюбу маємо неповнолітніх дітей: [[children_details]]</p>[[/children_details]]
                                <p>Подальше спільне життя та збереження шлюбу неможливі через: [[divorce_reason]]</p>
                                <p>На підставі вищевикладеного, керуючись ст.ст. 110, 112 Сімейного кодексу України, ст.ст. 175, 177 Цивільного процесуального кодексу України, прошу суд:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Позивач: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Divorce',
                        'description' => 'Application to the court for divorce.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STATEMENT OF CLAIM</h1><p style="font-size: 14px;">for divorce</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>To [[court_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>On [[marriage_date]], a marriage was registered between me and the defendant [[defendant_name]], marriage certificate No. [[marriage_certificate_number]].</p>
                                [[children_details]]<p>We have minor children from the marriage: [[children_details]]</p>[[/children_details]]
                                <p>Further cohabitation and preservation of the marriage are impossible due to: [[divorce_reason]]</p>
                                <p>Based on the foregoing, guided by Articles 110, 112 of the Family Code of Ukraine, Articles 175, 177 of the Civil Procedure Code of Ukraine, I ask the court:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Plaintiff: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pozew o rozwód',
                        'description' => 'Pozew o rozwód.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Powód: [[plaintiff_name]]</p>
                                <p>Adres: [[plaintiff_address]]</p>
                                <p>Telefon: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Pozwany: [[defendant_name]]</p>
                                <p>Adres: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">POZEW</h1>
                                <p style="text-align: center;">o rozwód</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>W dniu [[marriage_date]] między mną a pozwanym [[defendant_name]] został zarejestrowany związek małżeński, akt małżeństwa nr [[marriage_certificate_number]].</p>
                                [[children_details]]<p>Z małżeństwa posiadamy małoletnie dzieci: [[children_details]]</p>[[/children_details]]
                                <p>Dalsze wspólne życie i zachowanie małżeństwa są niemożliwe z powodu: [[divorce_reason]]</p>
                                <p>Na podstawie powyższego, kierując się art. 110, 112 Kodeksu rodzinnego Ukrainy, art. 175, 177 Kodeksu postępowania cywilnego Ukrainy, proszę sąd o:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Powód: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Klage auf Scheidung',
                        'description' => 'Klage auf Scheidung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Kläger: [[plaintiff_name]]</p>
                                <p>Adresse: [[plaintiff_address]]</p>
                                <p>Telefon: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Beklagter: [[defendant_name]]</p>
                                <p>Adresse: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">KLAGESCHRIFT</h1>
                                <p style="text-align: center;">auf Scheidung</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Am [[marriage_date]] wurde zwischen mir und dem Beklagten [[defendant_name]] die Ehe geschlossen, Heiratsurkunde Nr. [[marriage_certificate_number]].</p>
                                [[children_details]]<p>Aus der Ehe haben wir minderjährige Kinder: [[children_details]]</p>[[/children_details]]
                                <p>Ein weiteres Zusammenleben und die Aufrechterhaltung der Ehe sind unmöglich aufgrund von: [[divorce_reason]]</p>
                                <p>Aufgrund des oben Gesagten, gestützt auf die Artikel 110, 112 des Familiengesetzbuches der Ukraine und die Artikel 175, 177 der Zivilprozessordnung der Ukraine, bitte ich das Gericht:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kläger: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 3. Исковое заявление о взыскании алиментов ---
            [
                'slug' => 'statement-claim-alimony-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"court_name","type":"text","required":true,"labels":{"uk":"Назва суду","en":"Court Name", "pl":"Nazwa sądu", "de":"Gerichtsname"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"uk":"Адреса суду","en":"Court Address", "pl":"Adres sądu", "de":"Gerichtsadresse"}},
                    {"name":"plaintiff_name","type":"text","required":true,"labels":{"uk":"ПІБ истца","en":"Plaintiff\'s Full Name", "pl":"Imię i nazwisko powoda", "de":"Vollständiger Name des Klägers"}},
                    {"name":"plaintiff_address","type":"text","required":true,"labels":{"uk":"Адреса истца","en":"Plaintiff\'s Address", "pl":"Adres powoda", "de":"Adresse des Klägers"}},
                    {"name":"plaintiff_phone","type":"text","required":false,"labels":{"uk":"Телефон истца","en":"Plaintiff\'s Phone", "pl":"Telefon powoda", "de":"Telefon des Klägers"}},
                    {"name":"defendant_name","type":"text","required":true,"labels":{"uk":"ПІБ ответчика","en":"Defendant\'s Full Name", "pl":"Imię i nazwisko pozwanego", "de":"Vollständiger Name des Beklagten"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"uk":"Адреса ответчика","en":"Defendant\'s Address", "pl":"Adres pozwanego", "de":"Adresse des Beklagten"}},
                    {"name":"child_name","type":"text","required":true,"labels":{"uk":"ПІБ дитини","en":"Child\'s Full Name", "pl":"Imię i nazwisko dziecka", "de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"uk":"Дата народження дитини","en":"Child\'s Date of Birth", "pl":"Data urodzenia dziecka", "de":"Geburtsdatum des Kindes"}},
                    {"name":"alimony_amount_type","type":"text","required":true,"labels":{"uk":"Вид стягнення (частка від доходу / тверда грошова сума)","en":"Type of Recovery (share of income / fixed amount)", "pl":"Rodzaj ściągania (udział w dochodach / stała kwota pieniężna)", "de":"Art der Eintreibung (Anteil am Einkommen / fester Geldbetrag)"}},
                    {"name":"alimony_details","type":"textarea","required":true,"labels":{"uk":"Деталі стягнення (напр., 1/4 від доходу, 2000 грн щомісячно)","en":"Recovery Details (e.g., 1/4 of income, 2000 UAH monthly)", "pl":"Szczegóły ściągania (np. 1/4 dochodu, 2000 UAH miesięcznie)", "de":"Details der Eintreibung (z.B. 1/4 des Einkommens, 2000 UAH monatlich)"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Требования истца (взыскать алименты, судебные издержки)","en":"Plaintiff\'s Demands (recover alimony, court costs)", "pl":"Żądania powoda (zasądzenie alimentów, kosztów sądowych)", "de":"Forderungen des Klägers (Unterhaltsforderung, Gerichtskosten)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Позовна заява про стягнення аліментів',
                        'description' => 'Заява до суду про стягнення аліментів на утримання дитини.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Позивач: [[plaintiff_name]]</p>
                                <p>Адреса: [[plaintiff_address]]</p>
                                <p>Телефон: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Відповідач: [[defendant_name]]</p>
                                <p>Адреса: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ПОЗОВНА ЗАЯВА</h1>
                                <p style="text-align: center;">про стягнення аліментів</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, [[plaintiff_name]], є матір\'ю/батьком дитини <strong>[[child_name]]</strong>, [[child_dob]] року народження.</p>
                                <p>Відповідач [[defendant_name]] є батьком/матір\'ю дитини.</p>
                                <p>Відповідач ухиляється від утримання дитини. Прошу стягнути аліменти у вигляді [[alimony_amount_type]]: [[alimony_details]].</p>
                                <p>На підставі вищевикладеного, керуючись ст.ст. 180, 181, 183, 184 Сімейного кодексу України, ст.ст. 175, 177 Цивільного процесуального кодексу України, прошу суд:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Позивач: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Alimony Recovery',
                        'description' => 'Application to the court for alimony recovery for child support.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Plaintiff: [[plaintiff_name]]</p>
                                <p>Address: [[plaintiff_address]]</p>
                                <p>Phone: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Defendant: [[defendant_name]]</p>
                                <p>Address: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">STATEMENT OF CLAIM</h1>
                                <p style="text-align: center;">for alimony recovery</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, [[plaintiff_name]], am the mother/father of the child <strong>[[child_name]]</strong>, born on [[child_dob]].</p>
                                <p>The defendant [[defendant_name]] is the father/mother of the child.</p>
                                <p>The defendant evades child support. I ask to recover alimony in the form of [[alimony_amount_type]]: [[alimony_details]].</p>
                                <p>Based on the foregoing, guided by Articles 180, 181, 183, 184 of the Family Code of Ukraine, Articles 175, 177 of the Civil Procedure Code of Ukraine, I ask the court:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Plaintiff: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pozew o zasądzenie alimentów',
                        'description' => 'Pozew o zasądzenie alimentów na utrzymanie dziecka.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Powód: [[plaintiff_name]]</p>
                                <p>Adres: [[plaintiff_address]]</p>
                                <p>Telefon: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Pozwany: [[defendant_name]]</p>
                                <p>Adres: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">POZEW</h1>
                                <p style="text-align: center;">o zasądzenie alimentów</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, [[plaintiff_name]], jestem matką/ojcem dziecka <strong>[[child_name]]</strong>, urodzonego [[child_dob]].</p>
                                <p>Pozwany [[defendant_name]] jest ojcem/matką dziecka.</p>
                                <p>Pozwany uchyla się od utrzymania dziecka. Proszę o zasądzenie alimentów w formie [[alimony_amount_type]]: [[alimony_details]].</p>
                                <p>Na podstawie powyższego, kierując się art. 180, 181, 183, 184 Kodeksu rodzinnego Ukrainy, art. 175, 177 Kodeksu postępowania cywilnego Ukrainy, proszę sąd o:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Powód: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Klage auf Unterhaltsforderung',
                        'description' => 'Klage auf Unterhaltsforderung für den Kindesunterhalt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Kläger: [[plaintiff_name]]</p>
                                <p>Adresse: [[plaintiff_address]]</p>
                                <p>Telefon: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Beklagter: [[defendant_name]]</p>
                                <p>Adresse: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">KLAGESCHRIFT</h1>
                                <p style="text-align: center;">auf Unterhaltsforderung</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, [[plaintiff_name]], bin die Mutter/der Vater des Kindes <strong>[[child_name]]</strong>, geboren am [[child_dob]].</p>
                                <p>Der Beklagte [[defendant_name]] ist der Vater/die Mutter des Kindes.</p>
                                <p>Der Beklagte weigert sich, das Kind zu unterhalten. Ich beantrage die Eintreibung von Unterhalt in Form von [[alimony_amount_type]]: [[alimony_details]].</p>
                                <p>Aufgrund des oben Gesagten, gestützt auf die Artikel 180, 181, 183, 184 des Familiengesetzbuches der Ukraine und die Artikel 175, 177 der Zivilprozessordnung der Ukraine, bitte ich das Gericht:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kläger: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 4. Исковое заявление о возмещении ущерба при ДТП ---
            [
                'slug' => 'statement-claim-road-accident-damages-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"court_name","type":"text","required":true,"labels":{"uk":"Назва суду","en":"Court Name", "pl":"Nazwa sądu", "de":"Gerichtsname"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"uk":"Адреса суду","en":"Court Address", "pl":"Adres sądu", "de":"Gerichtsadresse"}},
                    {"name":"plaintiff_name","type":"text","required":true,"labels":{"uk":"ПІБ истца","en":"Plaintiff\'s Full Name", "pl":"Imię i nazwisko powoda", "de":"Vollständiger Name des Klägers"}},
                    {"name":"plaintiff_address","type":"text","required":true,"labels":{"uk":"Адреса истца","en":"Plaintiff\'s Address", "pl":"Adres powoda", "de":"Adresse des Klägers"}},
                    {"name":"plaintiff_phone","type":"text","required":false,"labels":{"uk":"Телефон истца","en":"Plaintiff\'s Phone", "pl":"Telefon powoda", "de":"Telefon des Klägers"}},
                    {"name":"defendant_name","type":"text","required":true,"labels":{"uk":"ПІБ ответчика","en":"Defendant\'s Full Name", "pl":"Imię i nazwisko pozwanego", "de":"Vollständiger Name des Beklagten"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"uk":"Адреса ответчика","en":"Defendant\'s Address", "pl":"Adres pozwanego", "de":"Adresse des Beklagten"}},
                    {"name":"road_accident_date","type":"date","required":true,"labels":{"uk":"Дата ДТП","en":"Road Accident Date", "pl":"Data wypadku drogowego", "de":"Datum des Verkehrsunfalls"}},
                    {"name":"road_accident_location","type":"text","required":true,"labels":{"uk":"Місце ДТП","en":"Road Accident Location", "pl":"Miejsce wypadku drogowego", "de":"Ort des Verkehrsunfalls"}},
                    {"name":"damage_description","type":"textarea","required":true,"labels":{"uk":"Опис завданої шкоди та її розмір","en":"Description of Damage Caused and its Extent", "pl":"Opis wyrządzonej szkody i jej rozmiar", "de":"Beschreibung des verursachten Schadens und dessen Umfang"}},
                    {"name":"responsible_person","type":"text","required":true,"labels":{"uk":"Особа, винна у ДТП","en":"Person Responsible for Road Accident", "pl":"Osoba winna wypadku drogowego", "de":"Verursacher des Verkehrsunfalls"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Требования истца (взыскать сумму ущерба, моральную вреду, судебные издержки)","en":"Plaintiff\'s Demands (recover damage amount, moral damage, court costs)", "pl":"Żądania powoda (odzyskanie kwoty szkody, zadośćuczynienia, kosztów sądowych)", "de":"Forderungen des Klägers (Schadensersatz, Schmerzensgeld, Gerichtskosten)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Позовна заява про відшкодування шкоди при ДТП',
                        'description' => 'Заява до суду про відшкодування матеріальної та/або моральної шкоди, завданої внаслідок ДТП.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Позивач: [[plaintiff_name]]</p>
                                <p>Адреса: [[plaintiff_address]]</p>
                                <p>Телефон: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Відповідач: [[defendant_name]]</p>
                                <p>Адреса: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ПОЗОВНА ЗАЯВА</h1>
                                <p style="text-align: center;">про відшкодування шкоди, завданої внаслідок ДТП</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[road_accident_date]] року за адресою [[road_accident_location]] сталася дорожньо-транспортна пригода за участю мого транспортного засобу та транспортного засобу, яким керував відповідач [[defendant_name]].</p>
                                <p>Внаслідок ДТП мені було завдано шкоду: [[damage_description]].</p>
                                <p>Винуватцем ДТП визнано [[responsible_person]].</p>
                                <p>На підставі вищевикладеного, керуючись ст.ст. 1166, 1187 Цивільного кодексу України, ст.ст. 175, 177 Цивільного процесуального кодексу України, прошу суд:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Позивач: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Compensation for Damages in a Road Accident',
                        'description' => 'Application to the court for compensation for material and/or moral damages caused by a road accident.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STATEMENT OF CLAIM</h1><p style="font-size: 14px;">for compensation for damages in a road accident</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>To [[court_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>On [[road_accident_date]], a road accident occurred at [[road_accident_location]] involving my vehicle and the vehicle driven by the defendant [[defendant_name]].</p>
                                <p>As a result of the road accident, I suffered damage: [[damage_description]].</p>
                                <p>The person responsible for the road accident is [[responsible_person]].</p>
                                <p>Based on the foregoing, guided by Articles 1166, 1187 of the Civil Code of Ukraine, Articles 175, 177 of the Civil Procedure Code of Ukraine, I ask the court:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Plaintiff: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pozew o odszkodowanie za szkody w wypadku drogowym',
                        'description' => 'Pozew o odszkodowanie za szkody materialne i/lub moralne spowodowane wypadkiem drogowym.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Powód: [[plaintiff_name]]</p>
                                <p>Adres: [[plaintiff_address]]</p>
                                <p>Telefon: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Pozwany: [[defendant_name]]</p>
                                <p>Adres: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">POZEW</h1>
                                <p style="text-align: center;">o odszkodowanie za szkody w wypadku drogowym</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>W dniu [[road_accident_date]] pod adresem [[road_accident_location]] doszło do wypadku drogowego z udziałem mojego pojazdu i pojazdu kierowanego przez pozwanego [[defendant_name]].</p>
                                <p>W wyniku wypadku drogowego poniosłem(am) szkodę: [[damage_description]].</p>
                                <p>Sprawcą wypadku drogowego uznano [[responsible_person]].</p>
                                <p>Na podstawie powyższego, kierując się art. 1166, 1187 Kodeksu Cywilnego Ukrainy, art. 175, 177 Kodeksu Postępowania Cywilnego Ukrainy, proszę sąd o:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Powód: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Klage auf Schadensersatz bei Verkehrsunfall',
                        'description' => 'Klage auf Schadensersatz für materielle und/oder immaterielle Schäden, die durch einen Verkehrsunfall verursacht wurden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KLAGESCHRIFT</h1><p style="font-size: 14px;">auf Schadensersatz bei Verkehrsunfall</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>An [[court_name]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Am [[road_accident_date]] ereignete sich am [[road_accident_location]] ein Verkehrsunfall unter Beteiligung meines Fahrzeugs und des vom Beklagten [[defendant_name]] geführten Fahrzeugs.</p>
                                <p>Infolge des Verkehrsunfalls ist mir folgender Schaden entstanden: [[damage_description]].</p>
                                <p>Als Verursacher des Verkehrsunfalls wurde [[responsible_person]] festgestellt.</p>
                                <p>Aufgrund des oben Gesagten, gestützt auf die Artikel 1166, 1187 des Zivilgesetzbuches der Ukraine und die Artikel 175, 177 der Zivilprozessordnung der Ukraine, bitte ich das Gericht:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kläger: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 5. Исковое заявление о защите прав потребителей ---
            [
                'slug' => 'statement-claim-consumer-rights-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"court_name","type":"text","required":true,"labels":{"uk":"Назва суду","en":"Court Name", "pl":"Nazwa sądu", "de":"Gerichtsname"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"uk":"Адреса суду","en":"Court Address", "pl":"Adres sądu", "de":"Gerichtsadresse"}},
                    {"name":"plaintiff_name","type":"text","required":true,"labels":{"uk":"ПІБ истца","en":"Plaintiff\'s Full Name", "pl":"Imię i nazwisko powoda", "de":"Vollständiger Name des Klägers"}},
                    {"name":"plaintiff_address","type":"text","required":true,"labels":{"uk":"Адреса истца","en":"Plaintiff\'s Address", "pl":"Adres powoda", "de":"Adresse des Klägers"}},
                    {"name":"plaintiff_phone","type":"text","required":false,"labels":{"uk":"Телефон истца","en":"Plaintiff\'s Phone", "pl":"Telefon powoda", "de":"Telefon des Klägers"}},
                    {"name":"defendant_name","type":"text","required":true,"labels":{"uk":"Назва ответчика (продавца/исполнителя)","en":"Defendant\'s Name (seller/performer)", "pl":"Nazwa pozwanego (sprzedawcy/wykonawcy)", "de":"Name des Beklagten (Verkäufer/Auftragnehmer)"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"uk":"Адреса ответчика","en":"Defendant\'s Address", "pl":"Adres pozwanego", "de":"Adresse des Beklagten"}},
                    {"name":"product_service_name","type":"text","required":true,"labels":{"uk":"Назва товару/послуги","en":"Product/Service Name", "pl":"Nazwa towaru/usługi", "de":"Produkt-/Dienstleistungsname"}},
                    {"name":"purchase_date","type":"date","required":true,"labels":{"uk":"Дата покупки/замовлення","en":"Purchase/Order Date", "pl":"Data zakupu/zamówienia", "de":"Kauf-/Bestelldatum"}},
                    {"name":"violation_description","type":"textarea","required":true,"labels":{"uk":"Опис порушення прав споживача","en":"Description of Consumer Rights Violation", "pl":"Opis naruszenia praw konsumenta", "de":"Beschreibung der Verbraucherrechtsverletzung"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Требования истца (расторгнуть договор, вернуть деньги, возместить ущерб)","en":"Plaintiff\'s Demands (terminate contract, refund money, compensate damages)", "pl":"Żądania powoda (rozwiązanie umowy, zwrot pieniędzy, odszkodowanie)", "de":"Forderungen des Klägers (Vertragsbeendigung, Geldrückerstattung, Schadensersatz)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Позовна заява про захист прав споживачів',
                        'description' => 'Заява до суду про захист прав споживача, порушених продавцем або виконавцем послуг.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Позивач: [[plaintiff_name]]</p>
                                <p>Адреса: [[plaintiff_address]]</p>
                                <p>Телефон: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Відповідач: [[defendant_name]]</p>
                                <p>Адреса: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ПОЗОВНА ЗАЯВА</h1>
                                <p style="text-align: center;">про захист прав споживачів</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[purchase_date]] року я придбав(ла) у відповідача [[defendant_name]] товар/послугу: [[product_service_name]].</p>
                                <p>Відповідачем було допущено порушення моїх прав як споживача, що полягає у: [[violation_description]].</p>
                                <p>На підставі вищевикладеного, керуючись Законом України "Про захист прав споживачів", ст.ст. 175, 177 Цивільного процесуального кодексу України, прошу суд:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Позивач: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Consumer Rights Protection',
                        'description' => 'Application to the court for consumer rights protection violated by the seller or service provider.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STATEMENT OF CLAIM</h1><p style="font-size: 14px;">for consumer rights protection</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>To [[court_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>On [[purchase_date]], I purchased from the defendant [[defendant_name]] the product/service: [[product_service_name]].</p>
                                <p>The defendant violated my consumer rights, which consists of: [[violation_description]].</p>
                                <p>Based on the foregoing, guided by the Law of Ukraine "On Consumer Rights Protection", Articles 175, 177 of the Civil Procedure Code of Ukraine, I ask the court:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Plaintiff: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pozew o ochronę praw konsumentów',
                        'description' => 'Pozew o ochronę praw konsumenta naruszonych przez sprzedawcę lub usługodawcę.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Powód: [[plaintiff_name]]</p>
                                <p>Adres: [[plaintiff_address]]</p>
                                <p>Telefon: [[plaintiff_phone]]</p>
                                <br/>
                                <p>Pozwany: [[defendant_name]]</p>
                                <p>Adres: [[defendant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">POZEW</h1>
                                <p style="text-align: center;">o ochronę praw konsumentów</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>W dniu [[purchase_date]] zakupiłem(am) u pozwanego [[defendant_name]] towar/usługę: [[product_service_name]].</p>
                                <p>Pozwany naruszył moje prawa jako konsumenta, co polega na: [[violation_description]].</p>
                                <p>Na podstawie powyższego, kierując się Ustawą Ukrainy "O ochronie praw konsumentów", art. 175, 177 Kodeksu postępowania cywilnego Ukrainy, proszę sąd o:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Powód: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Klage auf Verbraucherschutz',
                        'description' => 'Klage auf Verbraucherschutz, verletzt durch den Verkäufer oder Dienstleister.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KLAGESCHRIFT</h1><p style="font-size: 14px;">auf Verbraucherschutz</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>An [[court_name]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Am [[purchase_date]] habe ich von dem Beklagten [[defendant_name]] das Produkt/die Dienstleistung: [[product_service_name]] erworben.</p>
                                <p>Der Beklagte hat meine Verbraucherrechte verletzt, was sich wie folgt darstellt: [[violation_description]].</p>
                                <p>Aufgrund des oben Gesagten, gestützt auf das Gesetz der Ukraine "Über den Verbraucherschutz" und die Artikel 175, 177 der Zivilprozessordnung der Ukraine, bitte ich das Gericht:</p>
                                <p>[[demands]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kläger: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                ]
            ],
            // --- 6. Генеральная доверенность ---
            [
                'slug' => 'general-power-of-attorney-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання довіреності","en":"City of Power of Attorney Compilation", "pl":"Miejscowość sporządzenia pełnomocnictwa", "de":"Ort der Vollmachtserstellung"}},
                    {"name":"principal_name","type":"text","required":true,"labels":{"uk":"ПІБ довірителя","en":"Principal\'s Full Name", "pl":"Imię i nazwisko mocodawcy", "de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані довірителя","en":"Principal\'s Passport Details", "pl":"Dane paszportowe mocodawcy", "de":"Passdaten des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"uk":"Адреса проживання довірителя","en":"Principal\'s residence address", "pl":"Adres zamieszkania mocodawcy", "de":"Wohnadresse des Vollmachtgebers"}},
                    {"name":"attorney_name","type":"text","required":true,"labels":{"uk":"ПІБ представника","en":"Attorney\'s Full Name", "pl":"Imię i nazwisko pełnomocnika", "de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"attorney_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані представника","en":"Attorney\'s Passport Details", "pl":"Dane paszportowe pełnomocnika", "de":"Passdaten des Bevollmächtigten"}},
                    {"name":"attorney_address","type":"text","required":true,"labels":{"uk":"Адреса проживання представника","en":"Attorney\'s residence address", "pl":"Adres zamieszkania pełnomocnika", "de":"Wohnadresse des Bevollmächtigten"}},
                    {"name":"powers_description","type":"textarea","required":true,"labels":{"uk":"Перелік повноважень представника","en":"List of Attorney\'s Powers", "pl":"Wykaz uprawnień pełnomocnika", "de":"Liste der Befugnisse des Bevollmächtigten"}},
                    {"name":"validity_months","type":"number","required":true,"labels":{"uk":"Термін дії довіреності (місяців)","en":"Power of Attorney Validity (months)", "pl":"Okres ważności pełnomocnictwa (miesiące)", "de":"Gültigkeitsdauer der Vollmacht (Monate)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Генеральна довіреність',
                        'description' => 'Документ, що уповноважує одну особу діяти від імені іншої у широкому колі питань.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ГЕНЕРАЛЬНА ДОВІРЕНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[principal_name]]</strong>, паспорт: [[principal_passport]], проживаю за адресою: [[principal_address]], цим уповноважую:</p>
                                <p><strong>[[attorney_name]]</strong>, паспорт: [[attorney_passport]], проживаю за адресою: [[attorney_address]],</p>
                                <p>представляти мої інтереси та здійснювати від мого імені наступні повноваження: [[powers_description]].</p>
                                <p>Довіреність видана строком на <strong>[[validity_months]]</strong> місяців.</p>
                                <p>Довіреність може бути відкликана мною у будь-який час.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис довірителя: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Посвідчувальний напис нотаріуса:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'General Power of Attorney',
                        'description' => 'Document authorizing one person to act on behalf of another in a wide range of matters.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GENERAL POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[principal_name]]</strong>, passport: [[principal_passport]], residing at: [[principal_address]], hereby authorize:</p>
                                <p><strong>[[attorney_name]]</strong>, passport: [[attorney_passport]], residing at: [[attorney_address]],</p>
                                <p>to represent my interests and exercise the following powers on my behalf: [[powers_description]].</p>
                                <p>This power of attorney is issued for a period of <strong>[[validity_months]]</strong> months.</p>
                                <p>This power of attorney may be revoked by me at any time.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Principal\'s Signature: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Notary\'s certification:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pełnomocnictwo ogólne',
                        'description' => 'Dokument upoważniający jedną osobę do działania w imieniu innej w szerokim zakresie spraw.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO OGÓLNE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[principal_name]]</strong>, paszport: [[principal_passport]], zamieszkały(a) pod adresem: [[principal_address]], niniejszym upoważniam:</p>
                                <p><strong>[[attorney_name]]</strong>, paszport: [[attorney_passport]], zamieszkały(a) pod adresem: [[attorney_address]],</p>
                                <p>do reprezentowania moich interesów i wykonywania w moim imieniu następujących uprawnień: [[powers_description]].</p>
                                <p>Pełnomocnictwo wydano na okres <strong>[[validity_months]]</strong> miesięcy.</p>
                                <p>Pełnomocnictwo może być odwołane przeze mnie w każdym czasie.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis mocodawcy: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Poświadczenie notariusza:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Generalvollmacht',
                        'description' => 'Dokument, das eine Person ermächtigt, im Namen einer anderen Person in einem breiten Spektrum von Angelegenheiten zu handeln.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GENERALVOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[principal_name]]</strong>, Reisepass: [[principal_passport]], wohnhaft unter der Adresse: [[principal_address]], bevollmächtige hiermit:</p>
                                <p><strong>[[attorney_name]]</strong>, Reisepass: [[attorney_passport]], wohnhaft unter der Adresse: [[attorney_address]],</p>
                                <p>meine Interessen zu vertreten und in meinem Namen folgende Befugnisse auszuüben: [[powers_description]].</p>
                                <p>Diese Vollmacht wird für einen Zeitraum von <strong>[[validity_months]]</strong> Monaten erteilt.</p>
                                <p>Diese Vollmacht kann von mir jederzeit widerrufen werden.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Vollmachtgebers: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Notarielle Beglaubigung:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 7. Доверенность на представление интересов в суде ---
            [
                'slug' => 'power-of-attorney-court-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання довіреності","en":"City of Power of Attorney Compilation", "pl":"Miejscowość sporządzenia pełnomocnictwa", "de":"Ort der Vollmachtserstellung"}},
                    {"name":"principal_name","type":"text","required":true,"labels":{"uk":"ПІБ довірителя","en":"Principal\'s Full Name", "pl":"Imię i nazwisko mocodawcy", "de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані довірителя","en":"Principal\'s Passport Details", "pl":"Dane paszportowe mocodawcy", "de":"Passdaten des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"uk":"Адреса проживання довірителя","en":"Principal\'s residence address", "pl":"Adres zamieszkania mocodawcy", "de":"Wohnadresse des Vollmachtgebers"}},
                    {"name":"attorney_name","type":"text","required":true,"labels":{"uk":"ПІБ представника","en":"Attorney\'s Full Name", "pl":"Imię i nazwisko pełnomocnika", "de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"attorney_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані представника","en":"Attorney\'s Passport Details", "pl":"Dane paszportowe pełnomocnika", "de":"Passdaten des Bevollmächtigten"}},
                    {"name":"attorney_address","type":"text","required":true,"labels":{"uk":"Адреса проживання представника","en":"Attorney\'s residence address", "pl":"Adres zamieszkania pełnomocnika", "de":"Wohnadresse des Bevollmächtigten"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"uk":"Назва суду","en":"Court Name", "pl":"Nazwa sądu", "de":"Gerichtsname"}},
                    {"name":"case_details","type":"textarea","required":false,"labels":{"uk":"Деталі справи (номер справи, сторони, предмет)","en":"Case Details (case number, parties, subject)", "pl":"Szczegóły sprawy (numer sprawy, strony, przedmiot)", "de":"Falldetails (Aktenzeichen, Parteien, Gegenstand)"}},
                    {"name":"powers_description","type":"textarea","required":true,"labels":{"uk":"Перелік повноважень представника в суді","en":"List of Attorney\'s Powers in Court", "pl":"Wykaz uprawnień pełnomocnika w sądzie", "de":"Liste der Befugnisse des Bevollmächtigten vor Gericht"}},
                    {"name":"validity_months","type":"number","required":true,"labels":{"uk":"Термін дії довіреності (місяців)","en":"Power of Attorney Validity (months)", "pl":"Okres ważności pełnomocnictwa (miesiące)", "de":"Gültigkeitsdauer der Vollmacht (Monate)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Довіреність на представництво інтересів в суді',
                        'description' => 'Документ, що уповноважує одну особу представляти інтереси довірителя в суді.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1><p style="font-size: 14px;">на представництво інтересів в суді</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[principal_name]]</strong>, паспорт: [[principal_passport]], проживаю за адресою: [[principal_address]], цим уповноважую:</p>
                                <p><strong>[[attorney_name]]</strong>, паспорт: [[attorney_passport]], проживаю за адресою: [[attorney_address]],</p>
                                <p>представляти мої інтереси в [[court_name]] [[case_details]] у справі [[case_details]][[/case_details]] з усіма необхідними повноваженнями:</p>
                                <p>[[powers_description]]</p>
                                <p>Довіреність видана строком на <strong>[[validity_months]]</strong> місяців.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис довірителя: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Посвідчувальний напис нотаріуса:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Representation in Court',
                        'description' => 'Document authorizing one person to represent the interests of the principal in court.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1><p style="font-size: 14px;">for representation in court</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[principal_name]]</strong>, passport: [[principal_passport]], residing at: [[principal_address]], hereby authorize:</p>
                                <p><strong>[[attorney_name]]</strong>, passport: [[attorney_passport]], residing at: [[attorney_address]],</p>
                                <p>to represent my interests in [[court_name]] [[case_details]] in case [[case_details]][[/case_details]] with all necessary powers:</p>
                                <p>[[powers_description]]</p>
                                <p>This power of attorney is issued for a period of <strong>[[validity_months]]</strong> months.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Principal\'s Signature: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Notary\'s certification:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pełnomocnictwo do reprezentowania interesów w sądzie',
                        'description' => 'Dokument upoważniający jedną osobę do reprezentowania interesów mocodawcy w sądzie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 14px;">do reprezentowania interesów w sądzie</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[principal_name]]</strong>, paszport: [[principal_passport]], zamieszkały(a) pod adresem: [[principal_address]], niniejszym upoważniam:</p>
                                <p><strong>[[attorney_name]]</strong>, paszport: [[attorney_passport]], zamieszkały(a) pod adresem: [[attorney_address]],</p>
                                <p>do reprezentowania moich interesów w [[court_name]] [[case_details]] w sprawie [[case_details]][[/case_details]] ze wszystkimi niezbędnymi uprawnieniami:</p>
                                <p>[[powers_description]]</p>
                                <p>Pełnomocnictwo wydano na okres <strong>[[validity_months]]</strong> miesięcy.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis mocodawcy: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Poświadczenie notariusza:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht zur Vertretung vor Gericht',
                        'description' => 'Dokument, das eine Person ermächtigt, die Interessen des Vollmachtgebers vor Gericht zu vertreten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1><p style="font-size: 14px;">zur Vertretung vor Gericht</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[principal_name]]</strong>, Reisepass: [[principal_passport]], wohnhaft unter der Adresse: [[principal_address]], bevollmächtige hiermit:</p>
                                <p><strong>[[attorney_name]]</strong>, Reisepass: [[attorney_passport]], wohnhaft unter der Adresse: [[attorney_address]],</p>
                                <p>meine Interessen vor [[court_name]] [[case_details]] im Fall [[case_details]][[/case_details]] mit allen erforderlichen Befugnissen zu vertreten:</p>
                                <p>[[powers_description]]</p>
                                <p>Diese Vollmacht wird für einen Zeitraum von <strong>[[validity_months]]</strong> Monaten erteilt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Vollmachtgebers: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Notarielle Beglaubigung:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 8. Доверенность на получение документов ---
            [
                'slug' => 'power-of-attorney-documents-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання довіреності","en":"City of Power of Attorney Compilation", "pl":"Miejscowość sporządzenia pełnomocnictwa", "de":"Ort der Vollmachtserstellung"}},
                    {"name":"principal_name","type":"text","required":true,"labels":{"uk":"ПІБ довірителя","en":"Principal\'s Full Name", "pl":"Imię i nazwisko mocodawcy", "de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані довірителя","en":"Principal\'s Passport Details", "pl":"Dane paszportowe mocodawcy", "de":"Passdaten des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"uk":"Адреса проживання довірителя","en":"Principal\'s residence address", "pl":"Adres zamieszkania mocodawcy", "de":"Wohnadresse des Vollmachtgebers"}},
                    {"name":"attorney_name","type":"text","required":true,"labels":{"uk":"ПІБ представника","en":"Attorney\'s Full Name", "pl":"Imię i nazwisko pełnomocnika", "de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"attorney_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані представника","en":"Attorney\'s Passport Details", "pl":"Dane paszportowe pełnomocnika", "de":"Passdaten des Bevollmächtigten"}},
                    {"name":"attorney_address","type":"text","required":true,"labels":{"uk":"Адреса проживання представника","en":"Attorney\'s residence address", "pl":"Adres zamieszkania pełnomocnika", "de":"Wohnadresse des Bevollmächtigten"}},
                    {"name":"document_description","type":"textarea","required":true,"labels":{"uk":"Опис документів, які необхідно отримати","en":"Description of Documents to be Obtained", "pl":"Opis dokumentów do uzyskania", "de":"Beschreibung der zu erhaltenden Dokumente"}},
                    {"name":"issuing_authority","type":"text","required":true,"labels":{"uk":"Назва органу, що видає документи","en":"Name of Issuing Authority", "pl":"Nazwa organu wydającego dokumenty", "de":"Name der ausstellenden Behörde"}},
                    {"name":"validity_months","type":"number","required":true,"labels":{"uk":"Термін дії довіреності (місяців)","en":"Power of Attorney Validity (months)", "pl":"Okres ważności pełnomocnictwa (miesiące)", "de":"Gültigkeitsdauer der Vollmacht (Monate)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Довіреність на отримання документів',
                        'description' => 'Документ, що уповноважує одну особу отримати документи від імені іншої.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1><p style="font-size: 14px;">на отримання документів</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[principal_name]]</strong>, паспорт: [[principal_passport]], проживаю за адресою: [[principal_address]], цим уповноважую:</p>
                                <p><strong>[[attorney_name]]</strong>, паспорт: [[attorney_passport]], проживаю за адресою: [[attorney_address]],</p>
                                <p>отримати від [[issuing_authority]] наступні документи: [[document_description]].</p>
                                <p>Довіреність видана строком на <strong>[[validity_months]]</strong> місяців.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис довірителя: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Посвідчувальний напис нотаріуса:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Document Collection',
                        'description' => 'Document authorizing one person to collect documents on behalf of another.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1><p style="font-size: 14px;">for document collection</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[principal_name]]</strong>, passport: [[principal_passport]], residing at: [[principal_address]], hereby authorize:</p>
                                <p><strong>[[attorney_name]]</strong>, passport: [[attorney_passport]], residing at: [[attorney_address]],</p>
                                <p>to collect the following documents from [[issuing_authority]]: [[document_description]].</p>
                                <p>This power of attorney is issued for a period of <strong>[[validity_months]]</strong> months.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Principal\'s Signature: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Notary\'s certification:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pełnomocnictwo do odbioru dokumentów',
                        'description' => 'Dokument upoważniający jedną osobę do odbioru dokumentów w imieniu innej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 14px;">do odbioru dokumentów</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[principal_name]]</strong>, paszport: [[principal_passport]], zamieszkały(a) pod adresem: [[principal_address]], niniejszym upoważniam:</p>
                                <p><strong>[[attorney_name]]</strong>, paszport: [[attorney_passport]], zamieszkały(a) pod adresem: [[attorney_address]],</p>
                                <p>do odbioru od [[issuing_authority]] następujących dokumentów: [[document_description]].</p>
                                <p>Pełnomocnictwo wydano na okres <strong>[[validity_months]]</strong> miesięcy.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis mocodawcy: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Poświadczenie notariusza:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht zur Dokumentenabholung',
                        'description' => 'Dokument, das eine Person ermächtigt, Dokumente im Namen einer anderen Person abzuholen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1><p style="font-size: 14px;">zur Dokumentenabholung</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[principal_name]]</strong>, Reisepass: [[principal_passport]], wohnhaft unter der Adresse: [[principal_address]], bevollmächtige hiermit:</p>
                                <p><strong>[[attorney_name]]</strong>, Reisepass: [[attorney_passport]], wohnhaft unter der Adresse: [[attorney_address]],</p>
                                <p>die folgenden Dokumente von [[issuing_authority]] abzuholen: [[document_description]].</p>
                                <p>Diese Vollmacht wird für einen Zeitraum von <strong>[[validity_months]]</strong> Monaten erteilt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Vollmachtgebers: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Notarielle Beglaubigung:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 9. Отзыв доверенности ---
            [
                'slug' => 'power-of-attorney-revocation-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання відкликання","en":"City of Revocation Compilation", "pl":"Miejscowość sporządzenia odwołania", "de":"Ort der Widerrufserklärung"}},
                    {"name":"principal_name","type":"text","required":true,"labels":{"uk":"ПІБ довірителя","en":"Principal\'s Full Name", "pl":"Imię i nazwisko mocodawcy", "de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані довірителя","en":"Principal\'s Passport Details", "pl":"Dane paszportowe mocodawcy", "de":"Passdaten des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"uk":"Адреса проживання довірителя","en":"Principal\'s residence address", "pl":"Adres zamieszkania mocodawcy", "de":"Wohnadresse des Vollmachtgebers"}},
                    {"name":"attorney_name","type":"text","required":true,"labels":{"uk":"ПІБ представника","en":"Attorney\'s Full Name", "pl":"Imię i nazwisko pełnomocnika", "de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"power_of_attorney_date","type":"date","required":true,"labels":{"uk":"Дата видачі довіреності","en":"Power of Attorney Issue Date", "pl":"Data wydania pełnomocnictwa", "de":"Ausstellungsdatum der Vollmacht"}},
                    {"name":"power_of_attorney_type","type":"text","required":true,"labels":{"uk":"Вид довіреності (напр., генеральна, на представництво в суді)","en":"Type of Power of Attorney (e.g., general, for court representation)", "pl":"Rodzaj pełnomocnictwa (np. ogólne, do reprezentowania w sądzie)", "de":"Art der Vollmacht (z.B. Generalvollmacht, Prozessvollmacht)"}},
                    {"name":"revocation_reason","type":"textarea","required":false,"labels":{"uk":"Причина відкликання (за бажанням)","en":"Reason for Revocation (optional)", "pl":"Przyczyna odwołania (opcjonalnie)", "de":"Grund des Widerrufs (optional)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Відкликання довіреності',
                        'description' => 'Документ, що скасовує дію раніше виданої довіреності.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ВІДКЛИКАННЯ ДОВІРЕНОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[principal_name]]</strong>, паспорт: [[principal_passport]], проживаю за адресою: [[principal_address]], цим повідомляю про відкликання довіреності, виданої мною [[power_of_attorney_date]] року на ім\'я <strong>[[attorney_name]]</strong>, вид довіреності: [[power_of_attorney_type]].</p>
                                [[revocation_reason]]<p>Причина відкликання: [[revocation_reason]].</p>[[/revocation_reason]]
                                <p>З моменту отримання цього відкликання, всі повноваження, надані за вищезазначеною довіреністю, вважаються недійсними.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис довірителя: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Посвідчувальний напис нотаріуса:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney Revocation',
                        'description' => 'Document canceling the validity of a previously issued power of attorney.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REVOCATION OF POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[principal_name]]</strong>, passport: [[principal_passport]], residing at: [[principal_address]], hereby notify about the revocation of the power of attorney issued by me on [[power_of_attorney_date]] in the name of <strong>[[attorney_name]]</strong>, type of power of attorney: [[power_of_attorney_type]].</p>
                                [[revocation_reason]]<p>Reason for revocation: [[revocation_reason]].</p>[[/revocation_reason]]
                                <p>From the moment of receipt of this revocation, all powers granted by the aforementioned power of attorney are considered invalid.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Principal\'s Signature: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Notary\'s certification:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Odwołanie pełnomocnictwa',
                        'description' => 'Dokument anulujący ważność wcześniej wystawionego pełnomocnictwa.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ODWOŁANIE PEŁNOMOCNICTWA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[principal_name]]</strong>, paszport: [[principal_passport]], zamieszkały(a) pod adresem: [[principal_address]], niniejszym informuję o odwołaniu pełnomocnictwa, wydanego przeze mnie w dniu [[power_of_attorney_date]] na rzecz <strong>[[attorney_name]]</strong>, rodzaj pełnomocnictwa: [[power_of_attorney_type]].</p>
                                [[revocation_reason]]<p>Przyczyna odwołania: [[revocation_reason]].</p>[[/revocation_reason]]
                                <p>Z chwilą otrzymania niniejszego odwołania, wszystkie uprawnienia nadane ww. pełnomocnictwem uważa się za nieważne.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis mocodawcy: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Poświadczenie notariusza:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Widerruf der Vollmacht',
                        'description' => 'Dokument, das die Gültigkeit einer zuvor erteilten Vollmacht aufhebt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WIDERRUF DER VOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[principal_name]]</strong>, Reisepass: [[principal_passport]], wohnhaft unter der Adresse: [[principal_address]], teile hiermit den Widerruf der von mir am [[power_of_attorney_date]] zugunsten von <strong>[[attorney_name]]</strong> erteilten Vollmacht, Art der Vollmacht: [[power_of_attorney_type]], mit.</p>
                                [[revocation_reason]]<p>Grund des Widerrufs: [[revocation_reason]].</p>[[/revocation_reason]]
                                <p>Ab dem Zeitpunkt des Erhalts dieses Widerrufs gelten alle durch die vorgenannte Vollmacht erteilten Befugnisse als ungültig.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Vollmachtgebers: ___________________ ([[principal_name]])</p>
                                <br/>
                                <p>Notarielle Beglaubigung:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 10. Завещание (общая форма) ---
            [
                'slug' => 'will-general-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання заповіту","en":"City of Will Compilation", "pl":"Miejscowość sporządzenia testamentu", "de":"Ort der Testamentserstellung"}},
                    {"name":"testator_name","type":"text","required":true,"labels":{"uk":"ПІБ заповідача","en":"Testator\'s Full Name", "pl":"Imię i nazwisko testatora", "de":"Vollständiger Name des Erblassers"}},
                    {"name":"testator_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані заповідача","en":"Testator\'s Passport Details", "pl":"Dane paszportowe testatora", "de":"Passdaten des Erblassers"}},
                    {"name":"testator_address","type":"text","required":true,"labels":{"uk":"Адреса проживання заповідача","en":"Testator\'s residence address", "pl":"Adres zamieszkania testatora", "de":"Wohnadresse des Erblassers"}},
                    {"name":"heir_name","type":"text","required":true,"labels":{"uk":"ПІБ спадкоємця","en":"Heir\'s Full Name", "pl":"Imię i nazwisko spadkobiercy", "de":"Vollständiger Name des Erben"}},
                    {"name":"heir_dob","type":"date","required":false,"labels":{"uk":"Дата народження спадкоємця (якщо відомо)","en":"Heir\'s Date of Birth (if known)", "pl":"Data urodzenia spadkobiercy (jeśli znana)", "de":"Geburtsdatum des Erben (falls bekannt)"}},
                    {"name":"inherited_property_description","type":"textarea","required":true,"labels":{"uk":"Опис майна, що заповідається","en":"Description of Inherited Property", "pl":"Opis mienia dziedziczonego", "de":"Beschreibung des vererbten Vermögens"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"uk":"Інші умови заповіту (напр., заповідальний відказ)","en":"Other Will Conditions (e.g., testamentary refusal)", "pl":"Inne warunki testamentu (np. zapis windykacyjny)", "de":"Sonstige Testamentsbedingungen (z.B. Vermächtnis)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заповіт (загальна форма)',
                        'description' => 'Документ, що визначає порядок переходу майна після смерті заповідача.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАПОВІТ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[testator_name]]</strong>, паспорт: [[testator_passport]], проживаю за адресою: [[testator_address]], цим роблю наступне розпорядження:</p>
                                <p>Все своє майно, що належатиме мені на момент смерті, заповідаю <strong>[[heir_name]]</strong> [[heir_dob]] року народження.</p>
                                <p>Зокрема, заповідаю: [[inherited_property_description]].</p>
                                [[other_conditions]]<p>Інші умови: [[other_conditions]].</p>[[/other_conditions]]
                                <p>Зміст ст.ст. 1233, 1235, 1241 Цивільного кодексу України мені роз\'яснено.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис заповідача: ___________________ ([[testator_name]])</p>
                                <br/>
                                <p>Посвідчувальний напис нотаріуса:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Will (General Form)',
                        'description' => 'Document defining the order of property transfer after the testator\'s death.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WILL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[testator_name]]</strong>, passport: [[testator_passport]], residing at: [[testator_address]], hereby make the following disposition:</p>
                                <p>All my property belonging to me at the time of my death, I bequeath to <strong>[[heir_name]]</strong>, born on [[heir_dob]].</p>
                                <p>Specifically, I bequeath: [[inherited_property_description]].</p>
                                [[other_conditions]]<p>Other conditions: [[other_conditions]].</p>[[/other_conditions]]
                                <p>The content of Articles 1233, 1235, 1241 of the Civil Code of Ukraine has been explained to me.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Testator\'s Signature: ___________________ ([[testator_name]])</p>
                                <br/>
                                <p>Notary\'s certification:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Testament (forma ogólna)',
                        'description' => 'Dokument określający porządek przejścia majątku po śmierci testatora.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TESTAMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[testator_name]]</strong>, paszport: [[testator_passport]], zamieszkały(a) pod adresem: [[testator_address]], niniejszym rozporządzam:</p>
                                <p>Cały mój majątek, który będzie należał do mnie w chwili śmierci, zapisuję <strong>[[heir_name]]</strong>, urodzonemu(ej) [[heir_dob]].</p>
                                <p>W szczególności zapisuję: [[inherited_property_description]].</p>
                                [[other_conditions]]<p>Inne warunki: [[other_conditions]].</p>[[/other_conditions]]
                                <p>Treść art. 1233, 1235, 1241 Kodeksu Cywilnego Ukrainy została mi wyjaśniona.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis testatora: ___________________ ([[testator_name]])</p>
                                <br/>
                                <p>Poświadczenie notariusza:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Testament (allgemeine Form)',
                        'description' => 'Dokument, das die Reihenfolge der Vermögensübertragung nach dem Tod des Erblassers festlegt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TESTAMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[testator_name]]</strong>, Reisepass: [[testator_passport]], wohnhaft unter der Adresse: [[testator_address]], verfüge hiermit Folgendes:</p>
                                <p>Mein gesamtes Vermögen, das mir zum Zeitpunkt meines Todes gehört, vermache ich <strong>[[heir_name]]</strong>, geboren am [[heir_dob]].</p>
                                <p>Insbesondere vermache ich: [[inherited_property_description]].</p>
                                [[other_conditions]]<p>Weitere Bedingungen: [[other_conditions]].</p>[[/other_conditions]]
                                <p>Der Inhalt der Artikel 1233, 1235, 1241 des Zivilgesetzbuches der Ukraine wurde mir erläutert.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Erblassers: ___________________ ([[testator_name]])</p>
                                <br/>
                                <p>Notarielle Beglaubigung:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 11. Ходатайство об отложении судебного заседания ---
            [
                'slug' => 'motion-postpone-hearing-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"court_name","type":"text","required":true,"labels":{"uk":"Назва суду","en":"Court Name", "pl":"Nazwa sądu", "de":"Gerichtsname"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"uk":"Адреса суду","en":"Court Address", "pl":"Adres sądu", "de":"Gerichtsadresse"}},
                    {"name":"case_number","type":"text","required":true,"labels":{"uk":"Номер справи","en":"Case Number", "pl":"Numer sprawy", "de":"Aktenzeichen"}},
                    {"name":"plaintiff_name","type":"text","required":true,"labels":{"uk":"ПІБ истца","en":"Plaintiff\'s Full Name", "pl":"Imię i nazwisko powoda", "de":"Vollständiger Name des Klägers"}},
                    {"name":"defendant_name","type":"text","required":true,"labels":{"uk":"ПІБ ответчика","en":"Defendant\'s Full Name", "pl":"Imię i nazwisko pozwanego", "de":"Vollständiger Name des Beklagten"}},
                    {"name":"hearing_date","type":"date","required":true,"labels":{"uk":"Дата призначеного засідання","en":"Scheduled Hearing Date", "pl":"Data wyznaczonej rozprawy", "de":"Datum der angesetzten Verhandlung"}},
                    {"name":"reason_for_postponement","type":"textarea","required":true,"labels":{"uk":"Причина відкладення (напр., хвороба, відрядження, необхідність збору доказів)","en":"Reason for Postponement (e.g., illness, business trip, need to collect evidence)", "pl":"Przyczyna odroczenia (np. choroba, delegacja, konieczność zebrania dowodów)", "de":"Grund der Vertagung (z.B. Krankheit, Dienstreise, Notwendigkeit der Beweismittelbeschaffung)"}},
                    {"name":"supporting_documents","type":"textarea","required":false,"labels":{"uk":"Додатки (копії документів, що підтверджують причину)","en":"Attachments (copies of documents supporting the reason)", "pl":"Załączniki (kopie dokumentów potwierdzających przyczynę)", "de":"Anhänge (Kopien von Dokumenten, die den Grund belegen)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Клопотання про відкладення судового засідання',
                        'description' => 'Прохання до суду про перенесення дати розгляду справи.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Справа № [[case_number]]</p>
                                <p>Позивач: [[plaintiff_name]]</p>
                                <p>Відповідач: [[defendant_name]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">КЛОПОТАННЯ</h1>
                                <p style="text-align: center;">про відкладення судового засідання</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Повідомляю, що судове засідання у справі № [[case_number]] призначено на [[hearing_date]].</p>
                                <p>Прошу відкласти судове засідання у зв\'язку з: [[reason_for_postponement]].</p>
                                [[supporting_documents]]<p>Додатки: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Motion to Postpone Court Hearing',
                        'description' => 'Request to the court to reschedule the hearing date.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Case No. [[case_number]]</p>
                                <p>Plaintiff: [[plaintiff_name]]</p>
                                <p>Defendant: [[defendant_name]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">MOTION</h1>
                                <p style="text-align: center;">to postpone court hearing</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby inform that the court hearing in case No. [[case_number]] is scheduled for [[hearing_date]].</p>
                                <p>I kindly ask to postpone the court hearing due to: [[reason_for_postponement]].</p>
                                [[supporting_documents]]<p>Attachments: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o odroczenie rozprawy sądowej',
                        'description' => 'Prośba do sądu o przełożenie daty rozpatrzenia sprawy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Sprawa nr [[case_number]]</p>
                                <p>Powód: [[plaintiff_name]]</p>
                                <p>Pozwany: [[defendant_name]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                                <p style="text-align: center;">o odroczenie rozprawy sądowej</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Informuję, że rozprawa sądowa w sprawie nr [[case_number]] została wyznaczona na dzień [[hearing_date]].</p>
                                <p>Proszę o odroczenie rozprawy sądowej z powodu: [[reason_for_postponement]].</p>
                                [[supporting_documents]]<p>Załączniki: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Vertagung der Gerichtsverhandlung',
                        'description' => 'Antrag an das Gericht auf Verschiebung des Verhandlungstermins.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG</h1><p style="font-size: 14px;">auf Vertagung der Gerichtsverhandlung</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich teile hiermit mit, dass die Gerichtsverhandlung im Fall Nr. [[case_number]] für den [[hearing_date]] angesetzt ist.</p>
                                <p>Ich bitte um Vertagung der Gerichtsverhandlung aufgrund von: [[reason_for_postponement]].</p>
                                [[supporting_documents]]<p>Anhänge: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 12. Ходатайство о приобщении документов к делу ---
            [
                'slug' => 'motion-add-documents-to-case-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"court_name","type":"text","required":true,"labels":{"uk":"Назва суду","en":"Court Name", "pl":"Nazwa sądu", "de":"Gerichtsname"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"uk":"Адреса суду","en":"Court Address", "pl":"Adres sądu", "de":"Gerichtsadresse"}},
                    {"name":"case_number","type":"text","required":true,"labels":{"uk":"Номер справи","en":"Case Number", "pl":"Numer sprawy", "de":"Aktenzeichen"}},
                    {"name":"plaintiff_name","type":"text","required":true,"labels":{"uk":"ПІБ истца","en":"Plaintiff\'s Full Name", "pl":"Imię i nazwisko powoda", "de":"Vollständiger Name des Klägers"}},
                    {"name":"defendant_name","type":"text","required":true,"labels":{"uk":"ПІБ ответчика","en":"Defendant\'s Full Name", "pl":"Imię i nazwisko pozwanego", "de":"Vollständiger Name des Beklagten"}},
                    {"name":"documents_description","type":"textarea","required":true,"labels":{"uk":"Опис документів, що приєднуються","en":"Description of Documents to be Added", "pl":"Opis dokumentów do dołączenia", "de":"Beschreibung der hinzuzufügenden Dokumente"}},
                    {"name":"reason_for_adding","type":"textarea","required":true,"labels":{"uk":"Причина приєднання документів","en":"Reason for Adding Documents", "pl":"Przyczyna dołączenia dokumentów", "de":"Grund für das Hinzufügen von Dokumenten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Клопотання про приєднання документів до справи',
                        'description' => 'Прохання до суду про долучення додаткових документів до матеріалів справи.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Справа № [[case_number]]</p>
                                <p>Позивач: [[plaintiff_name]]</p>
                                <p>Відповідач: [[defendant_name]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">КЛОПОТАННЯ</h1>
                                <p style="text-align: center;">про приєднання документів до справи</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>У провадженні [[court_name]] знаходиться цивільна справа № [[case_number]] за позовом [[plaintiff_name]] до [[defendant_name]].</p>
                                <p>Прошу приєднати до матеріалів справи наступні документи: [[documents_description]].</p>
                                <p>Необхідність приєднання документів обґрунтовується: [[reason_for_adding]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Motion to Add Documents to Case',
                        'description' => 'Request to the court to add additional documents to the case file.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MOTION</h1><p style="font-size: 14px;">to add documents to case</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>To [[court_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Civil case No. [[case_number]] is pending before [[court_name]] on the claim of [[plaintiff_name]] against [[defendant_name]].</p>
                                <p>I kindly ask to add the following documents to the case file: [[documents_description]].</p>
                                <p>The necessity of adding documents is justified by: [[reason_for_adding]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o dołączenie dokumentów do sprawy',
                        'description' => 'Prośba do sądu o dołączenie dodatkowych dokumentów do akt sprawy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[court_name]]</p>
                                <p style="text-align: right;">[[court_address]]</p>
                                <br/>
                                <p>Sprawa nr [[case_number]]</p>
                                <p>Powód: [[plaintiff_name]]</p>
                                <p>Pozwany: [[defendant_name]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                                <p style="text-align: center;">o dołączenie dokumentów do sprawy</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Przed [[court_name]] toczy się sprawa cywilna nr [[case_number]] z powództwa [[plaintiff_name]] przeciwko [[defendant_name]].</p>
                                <p>Proszę o dołączenie do akt sprawy następujących dokumentów: [[documents_description]].</p>
                                <p>Konieczność dołączenia dokumentów uzasadnia się: [[reason_for_adding]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Beifügung von Dokumenten zur Akte',
                        'description' => 'Antrag an das Gericht auf Beifügung zusätzlicher Dokumente zu den Gerichtsakten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG</h1><p style="font-size: 14px;">auf Beifügung von Dokumenten zur Akte</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>An [[court_name]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Beim [[court_name]] ist die Zivilsache Nr. [[case_number]] nach Klage von [[plaintiff_name]] gegen [[defendant_name]] anhängig.</p>
                                <p>Ich bitte hiermit, die folgenden Dokumente zu den Akten hinzuzufügen: [[documents_description]].</p>
                                <p>Die Notwendigkeit der Beifügung der Dokumente wird begründet durch: [[reason_for_adding]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[plaintiff_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 13. Апелляционная жалоба (структура) ---
            [
                'slug' => 'appeal-complaint-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"appellate_court_name","type":"text","required":true,"labels":{"uk":"Назва апеляційного суду","en":"Appellate Court Name", "pl":"Nazwa sądu apelacyjnego", "de":"Name des Berufungsgerichts"}},
                    {"name":"appellate_court_address","type":"text","required":true,"labels":{"uk":"Адреса апеляційного суду","en":"Appellate Court Address", "pl":"Adres sądu apelacyjnego", "de":"Adresse des Berufungsgerichts"}},
                    {"name":"complainant_name","type":"text","required":true,"labels":{"uk":"ПІБ скаржника","en":"Complainant\'s Full Name", "pl":"Imię i nazwisko skarżącego", "de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"uk":"Адреса скаржника","en":"Complainant\'s Address", "pl":"Adres skarżącego", "de":"Adresse des Beschwerdeführers"}},
                    {"name":"case_number","type":"text","required":true,"labels":{"uk":"Номер справи","en":"Case Number", "pl":"Numer sprawy", "de":"Aktenzeichen"}},
                    {"name":"first_instance_court_name","type":"text","required":true,"labels":{"uk":"Назва суду першої інстанції","en":"First Instance Court Name", "pl":"Nazwa sądu pierwszej instancji", "de":"Name des erstinstanzlichen Gerichts"}},
                    {"name":"decision_date","type":"date","required":true,"labels":{"uk":"Дата рішення суду першої інстанції","en":"Date of First Instance Court Decision", "pl":"Data orzeczenia sądu pierwszej instancji", "de":"Datum der erstinstanzlichen Gerichtsentscheidung"}},
                    {"name":"disagreement_reason","type":"textarea","required":true,"labels":{"uk":"Підстави для оскарження (неправильне застосування норм права, неповне з\'ясування обставин)","en":"Grounds for Appeal (incorrect application of legal norms, incomplete clarification of circumstances)", "pl":"Podstawy odwołania (niewłaściwe zastosowanie norm prawnych, niepełne wyjaśnienie okoliczności)", "de":"Gründe für die Berufung (falsche Anwendung von Rechtsnormen, unvollständige Sachverhaltsaufklärung)"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Вимоги апеляційної скарги (скасувати рішення, змінити рішення)","en":"Demands of Appeal (cancel decision, change decision)", "pl":"Żądania apelacji (uchylenie orzeczenia, zmiana orzeczenia)", "de":"Forderungen der Berufung (Entscheidung aufheben, Entscheidung ändern)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"uk":"Додатки (копія оскаржуваного рішення, докази)","en":"Attachments (copy of disputed decision, evidence)", "pl":"Załączniki (kopia zaskarżonego orzeczenia, dowody)", "de":"Anhänge (Kopie der angefochtenen Entscheidung, Beweismittel)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Апеляційна скарга (структура)',
                        'description' => 'Документ для оскарження рішення суду першої інстанції в апеляційному порядку.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[appellate_court_name]]</p>
                                <p style="text-align: right;">[[appellate_court_address]]</p>
                                <br/>
                                <p>Скаржник: [[complainant_name]]</p>
                                <p>Адреса: [[complainant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">АПЕЛЯЦІЙНА СКАРГА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>На рішення [[first_instance_court_name]] від [[decision_date]] у справі № [[case_number]].</p>
                                <p>Вважаю рішення суду першої інстанції незаконним та необґрунтованим з наступних підстав: [[disagreement_reason]].</p>
                                <p>На підставі вищевикладеного, керуючись ст.ст. 352, 354 ЦПК України, прошу суд:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Додатки: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Appeal Complaint (Structure)',
                        'description' => 'Document for appealing a first instance court decision.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APPEAL COMPLAINT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>To [[appellate_court_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Regarding the decision of [[first_instance_court_name]] dated [[decision_date]] in case No. [[case_number]].</p>
                                <p>I consider the decision of the first instance court illegal and unfounded on the following grounds: [[disagreement_reason]].</p>
                                <p>Based on the foregoing, guided by Articles 352, 354 of the Civil Procedure Code of Ukraine, I ask the court:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Attachments: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Complainant: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Skarga apelacyjna (struktura)',
                        'description' => 'Dokument do zaskarżenia orzeczenia sądu pierwszej instancji w trybie apelacyjnym.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SKARGA APELACYJNA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Do [[appellate_court_name]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Odnośnie orzeczenia [[first_instance_court_name]] z dnia [[decision_date]] w sprawie nr [[case_number]].</p>
                                <p>Uważam orzeczenie sądu pierwszej instancji za niezgodne z prawem i nieuzasadnione z następujących powodów: [[disagreement_reason]].</p>
                                <p>Na podstawie powyższego, kierując się art. 352, 354 Kodeksu postępowania cywilnego Ukrainy, proszę sąd o:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Załączniki: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Skarżący: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Berufungsbeschwerde (Struktur)',
                        'description' => 'Dokument zur Anfechtung einer erstinstanzlichen Gerichtsentscheidung im Berufungsverfahren.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BERUFUNGSBESCHWERDE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>An [[appellate_court_name]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Betreffend die Entscheidung des [[first_instance_court_name]] vom [[decision_date]] in der Sache Nr. [[case_number]].</p>
                                <p>Ich halte die Entscheidung des erstinstanzlichen Gerichts aus folgenden Gründen für rechtswidrig und unbegründet: [[disagreement_reason]].</p>
                                <p>Aufgrund des oben Gesagten, gestützt auf die Artikel 352, 354 der Zivilprozessordnung der Ukraine, bitte ich das Gericht:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Anhänge: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Beschwerdeführer: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 14. Кассационная жалоба (структура) ---
            [
                'slug' => 'cassation-complaint-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"cassation_court_name","type":"text","required":true,"labels":{"uk":"Назва касаційного суду","en":"Cassation Court Name", "pl":"Nazwa sądu kasacyjnego", "de":"Name des Kassationsgerichts"}},
                    {"name":"cassation_court_address","type":"text","required":true,"labels":{"uk":"Адреса касаційного суду","en":"Cassation Court Address", "pl":"Adres sądu kasacyjnego", "de":"Adresse des Kassationsgerichts"}},
                    {"name":"complainant_name","type":"text","required":true,"labels":{"uk":"ПІБ скаржника","en":"Complainant\'s Full Name", "pl":"Imię i nazwisko skarżącego", "de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"uk":"Адреса скаржника","en":"Complainant\'s Address", "pl":"Adres skarżącego", "de":"Adresse des Beschwerdeführers"}},
                    {"name":"case_number","type":"text","required":true,"labels":{"uk":"Номер справи","en":"Case Number", "pl":"Numer sprawy", "de":"Aktenzeichen"}},
                    {"name":"appellate_court_name","type":"text","required":true,"labels":{"uk":"Назва апеляційного суду","en":"Appellate Court Name", "pl":"Nazwa sądu apelacyjnego", "de":"Name des Berufungsgerichts"}},
                    {"name":"appellate_decision_date","type":"date","required":true,"labels":{"uk":"Дата рішення апеляційного суду","en":"Date of Appellate Court Decision", "pl":"Data orzeczenia sądu apelacyjnego", "de":"Datum der Berufungsgerichtsentscheidung"}},
                    {"name":"disagreement_reason","type":"textarea","required":true,"labels":{"uk":"Підстави для оскарження (порушення норм процесуального права, неправильне застосування норм матеріального права)","en":"Grounds for Appeal (violation of procedural law, incorrect application of substantive law)", "pl":"Podstawy odwołania (naruszenie norm prawa procesowego, niewłaściwe zastosowanie norm prawa materialnego)", "de":"Gründe für die Berufung (Verstoß gegen Verfahrensrecht, falsche Anwendung von materiellem Recht)"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Вимоги касаційної скарги (скасувати рішення, направити на новий розгляд)","en":"Demands of Cassation Appeal (cancel decision, send for new consideration)", "pl":"Żądania skargi kasacyjnej (uchylenie orzeczenia, przekazanie do ponownego rozpatrzenia)", "de":"Forderungen der Kassationsbeschwerde (Entscheidung aufheben, zur erneuten Prüfung zurückverweisen)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"uk":"Додатки (копія оскаржуваного рішення, докази)","en":"Attachments (copy of disputed decision, evidence)", "pl":"Załączniki (kopia zaskarżonego orzeczenia, dowody)", "de":"Anhänge (Kopie der angefochtenen Entscheidung, Beweismittel)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Касаційна скарга (структура)',
                        'description' => 'Документ для оскарження рішення апеляційного суду в касаційному порядку.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КАСАЦІЙНА СКАРГА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>До [[cassation_court_name]]</p></td><td style="text-align: right;"><p>[[cassation_court_address]]</p></td></tr></table><br/><p>Скаржник: [[complainant_name]]</p><p>Адреса: [[complainant_address]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>На рішення [[appellate_court_name]] від [[appellate_decision_date]] у справі № [[case_number]].</p>
                                <p>Вважаю рішення апеляційного суду незаконним та необґрунтованим з наступних підстав: [[disagreement_reason]].</p>
                                <p>На підставі вищевикладеного, керуючись ст.ст. 389, 394 ЦПК України, прошу суд:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Додатки: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Cassation Complaint (Structure)',
                        'description' => 'Document for appealing an appellate court decision in cassation procedure.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CASSATION COMPLAINT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>To [[cassation_court_name]]</p></td><td style="text-align: right;"><p>[[cassation_court_address]]</p></td></tr></table><br/><p>Complainant: [[complainant_name]]</p><p>Address: [[complainant_address]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Regarding the decision of [[appellate_court_name]] dated [[appellate_decision_date]] in case No. [[case_number]].</p>
                                <p>I consider the decision of the appellate court illegal and unfounded on the following grounds: [[disagreement_reason]].</p>
                                <p>Based on the foregoing, guided by Articles 389, 394 of the Civil Procedure Code of Ukraine, I ask the court:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Attachments: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Complainant: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Skarga kasacyjna (struktura)',
                        'description' => 'Dokument do zaskarżenia orzeczenia sądu apelacyjnego w trybie kasacyjnym.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SKARGA KASACYJNA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Do [[cassation_court_name]]</p></td><td style="text-align: right;"><p>[[cassation_court_address]]</p></td></tr></table><br/><p>Skarżący: [[complainant_name]]</p><p>Adres: [[complainant_address]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Odnośnie orzeczenia [[appellate_court_name]] z dnia [[appellate_decision_date]] w sprawie nr [[case_number]].</p>
                                <p>Uważam orzeczenie sądu apelacyjnego za niezgodne z prawem i nieuzasadnione z następujących powodów: [[disagreement_reason]].</p>
                                <p>Na podstawie powyższego, kierując się art. 389, 394 Kodeksu postępowania cywilnego Ukrainy, proszę sąd o:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Załączniki: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Skarżący: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Kassationsbeschwerde (Struktur)',
                        'description' => 'Dokument zur Anfechtung einer Berufungsgerichtsentscheidung im Kassationsverfahren.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KASSATIONSBESCHWERDE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>An [[cassation_court_name]]</p></td><td style="text-align: right;"><p>[[cassation_court_address]]</p></td></tr></table><br/><p>Beschwerdeführer: [[complainant_name]]</p><p>Adresse: [[complainant_address]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Betreffend die Entscheidung des [[appellate_court_name]] vom [[appellate_decision_date]] in der Sache Nr. [[case_number]].</p>
                                <p>Ich halte die Entscheidung des Berufungsgerichts aus folgenden Gründen für rechtswidrig und unbegründet: [[disagreement_reason]].</p>
                                <p>Aufgrund des oben Gesagten, gestützt auf die Artikel 389, 394 der Zivilprozessordnung der Ukraine, bitte ich das Gericht:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Anhänge: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Beschwerdeführer: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 15. Жалоба в прокуратуру ---
            [
                'slug' => 'complaint-prosecutor-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"prosecutor_office_name","type":"text","required":true,"labels":{"uk":"Назва органу прокуратури","en":"Prosecutor\'s Office Name", "pl":"Nazwa prokuratury", "de":"Name der Staatsanwaltschaft"}},
                    {"name":"prosecutor_office_address","type":"text","required":true,"labels":{"uk":"Адреса органу прокуратури","en":"Prosecutor\'s Office Address", "pl":"Adres prokuratury", "de":"Adresse der Staatsanwaltschaft"}},
                    {"name":"complainant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Complainant\'s Full Name", "pl":"Imię i nazwisko skarżącego", "de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"uk":"Адреса заявника","en":"Complainant\'s Address", "pl":"Adres skarżącego", "de":"Adresse des Beschwerdeführers"}},
                    {"name":"complainant_phone","type":"text","required":false,"labels":{"uk":"Телефон заявника","en":"Complainant\'s Phone", "pl":"Telefon skarżącego", "de":"Telefon des Beschwerdeführers"}},
                    {"name":"complainant_email","type":"email","required":false,"labels":{"uk":"Email заявника","en":"Complainant\'s Email", "pl":"E-mail skarżącego", "de":"E-Mail des Beschwerdeführers"}},
                    {"name":"violation_description","type":"textarea","required":true,"labels":{"uk":"Опис порушення закону (ким, коли, що порушено)","en":"Description of Law Violation (by whom, when, what was violated)", "pl":"Opis naruszenia prawa (przez kogo, kiedy, co zostało naruszone)", "de":"Beschreibung der Gesetzesverletzung (von wem, wann, was verletzt wurde)"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Вимоги (провести перевірку, притягнути до відповідальності)","en":"Demands (conduct inspection, bring to justice)", "pl":"Żądania (przeprowadzenie kontroli, pociągnięcie do odpowiedzialności)", "de":"Forderungen (Prüfung durchführen, zur Rechenschaft ziehen)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"uk":"Додатки (копії документів, що підтверджують порушення)","en":"Attachments (copies of documents confirming violation)", "pl":"Załączniki (kopie dokumentów potwierdzających naruszenie)", "de":"Anhänge (Kopien von Dokumenten, die den Verstoß belegen)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Жалоба в прокуратуру',
                        'description' => 'Офіційна скарга до прокуратури про порушення закону.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[prosecutor_office_name]]</p>
                                <p style="text-align: right;">[[prosecutor_office_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[complainant_name]]</p>
                                <p style="text-align: right;">[[complainant_address]]</p>
                                <p style="text-align: right;">Телефон: [[complainant_phone]]</p>
                                <p style="text-align: right;">Email: [[complainant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">СКАРГА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Повідомляю про порушення закону, що полягає у: [[violation_description]].</p>
                                <p>На підставі вищевикладеного, керуючись Законом України "Про прокуратуру", прошу:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Додатки: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Complaint to the Prosecutor\'s Office',
                        'description' => 'Official complaint to the prosecutor\'s office about a violation of law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[prosecutor_office_name]]</p>
                                <p style="text-align: right;">[[prosecutor_office_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[complainant_name]]</p>
                                <p style="text-align: right;">[[complainant_address]]</p>
                                <p style="text-align: right;">Phone: [[complainant_phone]]</p>
                                <p style="text-align: right;">Email: [[complainant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">COMPLAINT</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby report a violation of law, consisting of: [[violation_description]].</p>
                                <p>Based on the foregoing, guided by the Law of Ukraine "On the Prosecutor\'s Office", I request:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Attachments: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Skarga do prokuratury',
                        'description' => 'Oficjalna skarga do prokuratury dotycząca naruszenia prawa.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[prosecutor_office_name]]</p>
                                <p style="text-align: right;">[[prosecutor_office_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[complainant_name]]</p>
                                <p style="text-align: right;">[[complainant_address]]</p>
                                <p style="text-align: right;">Telefon: [[complainant_phone]]</p>
                                <p style="text-align: right;">E-mail: [[complainant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">SKARGA</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zgłaszam naruszenie prawa, polegające na: [[violation_description]].</p>
                                <p>Na podstawie powyższego, kierując się Ustawą Ukrainy "O prokuraturze", proszę o:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Załączniki: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Beschwerde an die Staatsanwaltschaft',
                        'description' => 'Offizielle Beschwerde an die Staatsanwaltschaft wegen eines Rechtsverstoßes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BESCHWERDE</h1><p style="font-size: 14px;">An: [[prosecutor_office_name]]</p><p>[[prosecutor_office_address]]</p><br/><p>Von: [[complainant_name]]</p><p>[[complainant_address]]</p><p>Telefon: [[complainant_phone]]</p><p>E-Mail: [[complainant_email]]</p><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich melde hiermit eine Rechtsverletzung, die sich wie folgt darstellt: [[violation_description]].</p>
                                <p>Aufgrund des oben Gesagten, gestützt auf das Gesetz der Ukraine "Über die Staatsanwaltschaft", bitte ich:</p>
                                <p>[[demands]]</p>
                                [[attachments]]<p>Anhänge: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 16. Мировое соглашение ---
            [
                'slug' => 'amicable-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"uk":"Назва суду","en":"Court Name", "pl":"Nazwa sądu", "de":"Gerichtsname"}},
                    {"name":"case_number","type":"text","required":true,"labels":{"uk":"Номер справи","en":"Case Number", "pl":"Numer sprawy", "de":"Aktenzeichen"}},
                    {"name":"plaintiff_name","type":"text","required":true,"labels":{"uk":"ПІБ истца","en":"Plaintiff\'s Full Name", "pl":"Imię i nazwisko powoda", "de":"Vollständiger Name des Klägers"}},
                    {"name":"plaintiff_address","type":"text","required":true,"labels":{"uk":"Адреса истца","en":"Plaintiff\'s Address", "pl":"Adres powoda", "de":"Adresse des Klägers"}},
                    {"name":"defendant_name","type":"text","required":true,"labels":{"uk":"ПІБ ответчика","en":"Defendant\'s Full Name", "pl":"Imię i nazwisko pozwanego", "de":"Vollständiger Name des Beklagten"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"uk":"Адреса ответчика","en":"Defendant\'s Address", "pl":"Adres pozwanego", "de":"Adresse des Beklagten"}},
                    {"name":"agreement_terms","type":"textarea","required":true,"labels":{"uk":"Умови мирової угоди","en":"Terms of Amicable Agreement", "pl":"Warunki ugody", "de":"Bedingungen der gütlichen Einigung"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Мирова угода',
                        'description' => 'Документ, що фіксує взаємну згоду сторін на врегулювання спору без судового рішення.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">МИРОВА УГОДА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>У справі № [[case_number]], що перебуває у провадженні [[court_name]], за позовом [[plaintiff_name]] до [[defendant_name]], сторони дійшли згоди та уклали цю мирову угоду про наступне:</p>
                                <p>[[agreement_terms]]</p>
                                <p>Сторони підтверджують, що ця мирова угода є остаточною і не підлягає оскарженню.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ПОЗИВАЧ:</strong></p>
                                            <p>[[plaintiff_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[plaintiff_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ВІДПОВІДАЧ:</strong></p>
                                            <p>[[defendant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[defendant_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Amicable Agreement',
                        'description' => 'Document recording the mutual consent of the parties to settle a dispute without a court decision.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">AMICABLE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>In case No. [[case_number]], pending before [[court_name]], on the claim of [[plaintiff_name]] against [[defendant_name]], the parties have reached an agreement and concluded this amicable agreement as follows:</p>
                                <p>[[agreement_terms]]</p>
                                <p>The parties confirm that this amicable agreement is final and not subject to appeal.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>PLAINTIFF:</strong></p>
                                            <p>[[plaintiff_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[plaintiff_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>DEFENDANT:</strong></p>
                                            <p>[[defendant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[defendant_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Ugoda',
                        'description' => 'Dokument rejestrujący wzajemną zgodę stron na uregulowanie sporu bez orzeczenia sądowego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UGODA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>W sprawie nr [[case_number]], toczącej się przed [[court_name]], z powództwa [[plaintiff_name]] przeciwko [[defendant_name]], strony doszły do porozumienia i zawarły niniejszą ugodę:</p>
                                <p>[[agreement_terms]]</p>
                                <p>Strony potwierdzają, że niniejsza ugoda jest ostateczna i nie podlega zaskarżeniu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>POWÓD:</strong></p>
                                            <p>[[plaintiff_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[plaintiff_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>POZWANY:</strong></p>
                                            <p>[[defendant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[defendant_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Gütliche Einigung',
                        'description' => 'Dokument, das die gegenseitige Zustimmung der Parteien zur Beilegung eines Streits ohne Gerichtsentscheidung festhält.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GÜTLICHE EINIGUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>In der Sache Nr. [[case_number]], die beim [[court_name]] anhängig ist, nach Klage von [[plaintiff_name]] gegen [[defendant_name]], haben sich die Parteien geeinigt und diese gütliche Einigung wie folgt geschlossen:</p>
                                <p>[[agreement_terms]]</p>
                                <p>Die Parteien bestätigen, dass diese gütliche Einigung endgültig und nicht anfechtbar ist.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>KLÄGER:</strong></p>
                                            <p>[[plaintiff_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[plaintiff_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>BEKLAGTER:</strong></p>
                                            <p>[[defendant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[defendant_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

        ];

        foreach ($templatesData as $templateData) {
            $this->createTemplate($category->id, $templateData);
        }
    }

    private function createTemplate(int $categoryId, array $data): void
    {
        $template = Template::updateOrCreate(
            ['slug' => $data['slug']],
            [
                'category_id' => $categoryId,
                'is_active' => $data['is_active'] ?? true,
                'country_code' => $data['country_code'] ?? 'UA',
                'fields' => json_decode($data['fields'], true),
            ]
        );

        if (isset($data['translations']) && is_array($data['translations'])) {
            foreach ($data['translations'] as $locale => $transData) {
                // Fill empty HTML fields for other languages from the Ukrainian version
                // This logic is now less critical as we are explicitly adding English HTML
                $transData['header_html'] = $transData['header_html'] ?? ($data['translations']['uk']['header_html'] ?? '');
                $transData['body_html'] = $transData['body_html'] ?? ($data['translations']['uk']['body_html'] ?? '');
                $transData['footer_html'] = $transData['footer_html'] ?? ($data['translations']['uk']['footer_html'] ?? '');

                $template->translations()->updateOrCreate(['locale' => $locale], $transData);
            }
        }
    }
}
