<?php

namespace Database\Seeders\PL;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class PlLegalDocumentsSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'legal-claims-pl')->first();
        if (!$category) {
            $this->command->error('Category with slug "legal-claims-pl" not found.');
            return;
        }
        // Define the data for new document templates under the 'legal-documents-pl' category.
        $templatesData = [

            // --- Załącznik nr 1 do wniosku o udzielenie zezwolenia na pobyt czasowy i pracę ---
            [
                'slug' => 'attachment-1-karta-pobytu-work-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"employer_name","type":"text","required":true,"labels":{"pl":"Pełna nazwa pracodawcy","uk":"Повна назва роботодавця","en":"Employer\'s Full Name","de":"Vollständiger Name des Arbeitgebers"}},
                    {"name":"employer_address","type":"text","required":true,"labels":{"pl":"Adres siedziby pracodawcy","uk":"Адреса офісу роботодавця","en":"Employer\'s Address","de":"Adresse des Arbeitgebers"}},
                    {"name":"employer_nip","type":"text","required":true,"labels":{"pl":"NIP pracodawcy","uk":"NIP роботодавця","en":"Employer\'s NIP","de":"NIP des Arbeitgebers"}},
                    {"name":"employer_regon","type":"text","required":true,"labels":{"pl":"REGON pracodawcy","uk":"REGON роботодавця","en":"Employer\'s REGON","de":"REGON des Arbeitgebers"}},
                    {"name":"foreigner_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko cudzoziemca","uk":"Ім\'я та прізвище іноземця","en":"Foreigner\'s Full Name","de":"Vollständiger Name des Ausländers"}},
                    {"name":"job_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracy","uk":"Посада","en":"Job Position","de":"Stellenbezeichnung"}},
                    {"name":"work_place","type":"text","required":true,"labels":{"pl":"Miejsce wykonywania pracy","uk":"Місце виконання роботи","en":"Place of Work","de":"Arbeitsort"}},
                    {"name":"salary_brutto","type":"number","required":true,"labels":{"pl":"Wynagrodzenie miesięczne brutto (PLN)","uk":"Місячна зарплата брутто (PLN)","en":"Gross Monthly Salary (PLN)","de":"Monatliches Bruttogehalt (PLN)"}},
                    {"name":"work_hours","type":"text","required":true,"labels":{"pl":"Wymiar czasu pracy (np. pełny etat)","uk":"Робочий час (напр., повна ставка)","en":"Working Hours (e.g., full-time)","de":"Arbeitszeit (z.B. Vollzeit)"}},
                    {"name":"contract_type","type":"text","required":true,"labels":{"pl":"Rodzaj umowy (np. umowa o pracę)","uk":"Тип договору (напр., трудовий договір)","en":"Type of Contract (e.g., employment contract)","de":"Vertragsart (z.B. Arbeitsvertrag)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Załącznik nr 1 - Informacja starosty',
                        'description' => 'Kluczowy dokument wypełniany przez pracodawcę, zawierający warunki zatrudnienia cudzoziemca. Niezbędny do wniosku o kartę pobytu i pracę.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h1 style="text-align: center; font-size: 16px; font-weight: bold;">ZAŁĄCZNIK NR 1</h1>
                            <h2 style="text-align: center; font-size: 14px; margin-top: 0;">DO WNIOSKU O UDZIELENIE ZEZWOLENIA NA POBYT CZASOWY I PRACĘ</h2>
                            <br>
                            <p><strong>I. DANE PODMIOTU POWIERZAJĄCEGO WYKONYWANIE PRACY (PRACODAWCY)</strong></p>
                            <p>1. Pełna nazwa/Imię i nazwisko: <strong>[[employer_name]]</strong></p>
                            <p>2. Adres siedziby: <strong>[[employer_address]]</strong></p>
                            <p>3. NIP: <strong>[[employer_nip]]</strong></p>
                            <p>4. REGON: <strong>[[employer_regon]]</strong></p>
                            <br>
                            <p><strong>II. DANE DOTYCZĄCE WYKONYWANIA PRACY PRZEZ CUDZOZIEMCA</strong></p>
                            <p>1. Imię i nazwisko cudzoziemca: <strong>[[foreigner_full_name]]</strong></p>
                            <p>2. Stanowisko lub rodzaj pracy: <strong>[[job_position]]</strong></p>
                            <p>3. Miejsce wykonywania pracy: <strong>[[work_place]]</strong></p>
                            <p>4. Podstawa prawna wykonywania pracy: <strong>[[contract_type]]</strong></p>
                            <p>5. Wymiar czasu pracy: <strong>[[work_hours]]</strong></p>
                            <p>6. Proponowane wynagrodzenie miesięczne brutto: <strong>[[salary_brutto]] PLN</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; margin-top: 50px; text-align: right;">
                            <p>............................................................</p>
                            <p style="font-size: 10px;"><em>(Data, podpis i pieczęć pracodawcy lub osoby upoważnionej)</em></p>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Додаток № 1 - Інформація старости',
                        'description' => 'Ключовий документ, що заповнюється роботодавцем та містить умови працевлаштування іноземця. Необхідний для заяви на карту побиту та праці.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h1 style="text-align: center; font-size: 16px; font-weight: bold;">ДОДАТОК № 1</h1>
                            <h2 style="text-align: center; font-size: 14px; margin-top: 0;">ДО ЗАЯВИ ПРО НАДАННЯ ДОЗВОЛУ НА ТИМЧАСОВЕ ПРОЖИВАННЯ ТА РОБОТУ</h2>
                            <br>
                            <p><strong>I. ДАНІ СУБ\'ЄКТА, ЩО ДОРУЧАЄ ВИКОНАННЯ РОБОТИ (РОБОТОДАВЦЯ)</strong></p>
                            <p>1. Повна назва/Ім\'я та прізвище: <strong>[[employer_name]]</strong></p>
                            <p>2. Адреса: <strong>[[employer_address]]</strong></p>
                            <p>3. NIP: <strong>[[employer_nip]]</strong></p>
                            <p>4. REGON: <strong>[[employer_regon]]</strong></p>
                            <br>
                            <p><strong>II. ДАНІ ЩОДО ВИКОНАННЯ РОБОТИ ІНОЗЕМЦЕМ</strong></p>
                            <p>1. Ім\'я та прізвище іноземця: <strong>[[foreigner_full_name]]</strong></p>
                            <p>2. Посада або вид роботи: <strong>[[job_position]]</strong></p>
                            <p>3. Місце виконання роботи: <strong>[[work_place]]</strong></p>
                            <p>4. Правова підстава для виконання роботи: <strong>[[contract_type]]</strong></p>
                            <p>5. Робочий час: <strong>[[work_hours]]</strong></p>
                            <p>6. Запропонована місячна заробітна плата брутто: <strong>[[salary_brutto]] PLN</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; margin-top: 50px; text-align: right;">
                            <p>............................................................</p>
                            <p style="font-size: 10px;"><em>(Дата, підпис та печатка роботодавця або уповноваженої особи)</em></p>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Attachment No. 1 - Staroste\'s Information',
                        'description' => 'A key document filled out by the employer, containing the foreigner\'s employment conditions. Essential for the residence and work permit application.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
        <h1 style="text-align: center; font-size: 16px; font-weight: bold;">ATTACHMENT NO. 1</h1>
        <h2 style="text-align: center; font-size: 14px; margin-top: 0;">TO THE APPLICATION FOR A TEMPORARY RESIDENCE AND WORK PERMIT</h2>
        <br>
        <p><strong>I. DATA OF THE ENTITY ENTRUSTING WORK (EMPLOYER)</strong></p>
        <p>1. Full Name: <strong>[[employer_name]]</strong></p>
        <p>2. Registered Office Address: <strong>[[employer_address]]</strong></p>
        <p>3. NIP (Tax Identification Number): <strong>[[employer_nip]]</strong></p>
        <p>4. REGON (Statistical Number): <strong>[[employer_regon]]</strong></p>
        <br>
        <p><strong>II. DATA CONCERNING THE WORK PERFORMED BY THE FOREIGNER</strong></p>
        <p>1. Full name of the foreigner: <strong>[[foreigner_full_name]]</strong></p>
        <p>2. Position or type of work: <strong>[[job_position]]</strong></p>
        <p>3. Place of work: <strong>[[work_place]]</strong></p>
        <p>4. Legal basis for work performance: <strong>[[contract_type]]</strong></p>
        <p>5. Working hours: <strong>[[work_hours]]</strong></p>
        <p>6. Proposed gross monthly salary: <strong>[[salary_brutto]] PLN</strong></p>
        </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; margin-top: 50px; text-align: right;">
        <p>............................................................</p>
        <p style="font-size: 10px;"><em>(Date, signature and stamp of the employer or authorized person)</em></p>
    </div>'
                    ],
                    'de' => [
                        'title' => 'Anlage Nr. 1 - Information des Landrats',
                        'description' => 'Ein Schlüsseldokument, das vom Arbeitgeber ausgefüllt wird und die Beschäftigungsbedingungen des Ausländers enthält. Unverzichtbar für den Antrag auf eine Aufenthalts- und Arbeitserlaubnis.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
        <h1 style="text-align: center; font-size: 16px; font-weight: bold;">ANLAGE NR. 1</h1>
        <h2 style="text-align: center; font-size: 14px; margin-top: 0;">ZUM ANTRAG AUF ERTEILUNG EINER BEFRISTETEN AUFENTHALTS- UND ARBEITSERLAUBNIS</h2>
        <br>
        <p><strong>I. ANGABEN DES ARBEITGEBERS</strong></p>
        <p>1. Vollständiger Name: <strong>[[employer_name]]</strong></p>
        <p>2. Adresse des Firmensitzes: <strong>[[employer_address]]</strong></p>
        <p>3. NIP (Steuer-ID): <strong>[[employer_nip]]</strong></p>
        <p>4. REGON (Statistische Nummer): <strong>[[employer_regon]]</strong></p>
        <br>
        <p><strong>II. ANGABEN ZUR ARBEITSAUSÜBUNG DURCH DEN AUSLÄNDER</strong></p>
        <p>1. Vollständiger Name des Ausländers: <strong>[[foreigner_full_name]]</strong></p>
        <p>2. Position oder Art der Arbeit: <strong>[[job_position]]</strong></p>
        <p>3. Arbeitsort: <strong>[[work_place]]</strong></p>
        <p>4. Rechtsgrundlage der Arbeitsausübung: <strong>[[contract_type]]</strong></p>
        <p>5. Arbeitszeit: <strong>[[work_hours]]</strong></p>
        <p>6. Vorgeschlagenes monatliches Bruttogehalt: <strong>[[salary_brutto]] PLN</strong></p>
        </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; margin-top: 50px; text-align: right;">
        <p>............................................................</p>
        <p style="font-size: 10px;"><em>(Datum, Unterschrift und Stempel des Arbeitgebers oder einer bevollmächtigten Person)</em></p>
    </div>'
                    ],
                ]
            ],
            // --- Umowa najmu mieszkania ---
            [
                'slug' => 'residential-lease-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","uk":"Місто"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","uk":"Дата укладення"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","uk":"ПІБ Орендодавця"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres Wynajmującego","uk":"Адреса Орендодавця"}},
                    {"name":"landlord_id_number","type":"text","required":true,"labels":{"pl":"Seria i nr dowodu/paszportu Wynajmującego","uk":"Серія та номер паспорта Орендодавця"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","uk":"ПІБ Орендаря"}},
                    {"name":"tenant_id_number","type":"text","required":true,"labels":{"pl":"Seria i nr paszportu/karty pobytu Najemcy","uk":"Серія та номер паспорта/карти побиту Орендаря"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres wynajmowanego lokalu","uk":"Адреса орендованого житла"}},
                    {"name":"lease_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","uk":"Дата початку оренди"}},
                    {"name":"lease_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu","uk":"Дата закінчення оренди"}},
                    {"name":"rent_amount","type":"number","required":true,"labels":{"pl":"Czynsz miesięczny (PLN)","uk":"Орендна плата (PLN)"}},
                    {"name":"payment_day","type":"number","required":true,"labels":{"pl":"Dzień płatności czynszu","uk":"День оплати"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa najmu mieszkania',
                        'description' => 'Standardowa umowa najmu lokalu mieszkalnego, wymagana do potwierdzenia miejsca zamieszkania.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                            <h1 style="text-align: center; font-size: 16px;">UMOWA NAJMU LOKALU MIESZKALNEGO</h1>
                            <p>Zawarta w dniu [[agreement_date]] w [[city]] pomiędzy:</p>
                            <p><strong>Wynajmującym:</strong> [[landlord_full_name]], zam. [[landlord_address]], legitymującym się dokumentem [[landlord_id_number]],</p>
                            <p>a</p>
                            <p><strong>Najemcą:</strong> [[tenant_full_name]], legitymującym się dokumentem [[tenant_id_number]].</p>
                            <h2 style="font-size: 14px;">§ 1. Przedmiot umowy</h2>
                            <p>1. Wynajmujący oświadcza, że jest właścicielem lokalu mieszkalnego położonego w [[property_address]].</p>
                            <p>2. Wynajmujący oddaje Najemcy do używania ww. lokal na cele mieszkaniowe.</p>
                            <h2 style="font-size: 14px;">§ 2. Okres najmu</h2>
                            <p>Umowa zostaje zawarta na czas określony od [[lease_start_date]] do [[lease_end_date]].</p>
                            <h2 style="font-size: 14px;">§ 3. Czynsz i opłaty</h2>
                            <p>1. Strony ustalają miesięczny czynsz najmu w wysokości <strong>[[rent_amount]] PLN</strong>.</p>
                            <p>2. Czynsz płatny będzie z góry do [[payment_day]]. dnia każdego miesiąca.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; margin-top: 50px;">
                            <table width="100%">
                                <tr>
                                    <td style="text-align: center;">_________________________<br><em>(Podpis Wynajmującego)</em></td>
                                    <td style="text-align: center;">_________________________<br><em>(Podpis Najemcy)</em></td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди житла',
                        'description' => 'Стандартний договір оренди житлового приміщення, необхідний для підтвердження місця проживання.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                            <h1 style="text-align: center; font-size: 16px;">ДОГОВІР ОРЕНДИ ЖИТЛОВОГО ПРИМІЩЕННЯ</h1>
                            <p>Укладений [[agreement_date]] у м. [[city]] між:</p>
                            <p><strong>Орендодавцем:</strong> [[landlord_full_name]], що проживає за адресою [[landlord_address]], документ [[landlord_id_number]],</p>
                            <p>та</p>
                            <p><strong>Орендарем:</strong> [[tenant_full_name]], документ [[tenant_id_number]].</p>
                            <h2 style="font-size: 14px;">§ 1. Предмет договору</h2>
                            <p>1. Орендодавець заявляє, що є власником житлового приміщення, розташованого за адресою [[property_address]].</p>
                            <p>2. Орендодавець передає Орендарю у користування зазначене приміщення для проживання.</p>
                            <h2 style="font-size: 14px;">§ 2. Термін оренди</h2>
                            <p>Договір укладено на визначений термін з [[lease_start_date]] до [[lease_end_date]].</p>
                            <h2 style="font-size: 14px;">§ 3. Орендна плата</h2>
                            <p>1. Сторони встановлюють щомісячну орендну плату в розмірі <strong>[[rent_amount]] PLN</strong>.</p>
                            <p>2. Орендна плата сплачується авансом до [[payment_day]] числа кожного місяця.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; margin-top: 50px;">
                            <table width="100%">
                                <tr>
                                    <td style="text-align: center;">_________________________<br><em>(Підпис Орендодавця)</em></td>
                                    <td style="text-align: center;">_________________________<br><em>(Підпис Орендаря)</em></td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Residential Lease Agreement',
                        'description' => 'A standard residential lease agreement required to confirm the place of residence.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
        <h1 style="text-align: center; font-size: 16px;">RESIDENTIAL LEASE AGREEMENT</h1>
        <p>Concluded on [[agreement_date]] in [[city]] between:</p>
        <p><strong>The Landlord:</strong> [[landlord_full_name]], residing at [[landlord_address]], ID document No. [[landlord_id_number]],</p>
        <p>and</p>
        <p><strong>The Tenant:</strong> [[tenant_full_name]], ID document No. [[tenant_id_number]].</p>
        <h2 style="font-size: 14px;">§ 1. Subject of the Agreement</h2>
        <p>1. The Landlord declares to be the owner of the residential property located at [[property_address]].</p>
        <p>2. The Landlord leases the aforementioned property to the Tenant for residential purposes.</p>
        <h2 style="font-size: 14px;">§ 2. Lease Term</h2>
        <p>This agreement is concluded for a fixed term from [[lease_start_date]] to [[lease_end_date]].</p>
        <h2 style="font-size: 14px;">§ 3. Rent and Fees</h2>
        <p>1. The parties agree on a monthly rent of <strong>[[rent_amount]] PLN</strong>.</p>
        <p>2. The rent shall be paid in advance by the [[payment_day]]th day of each month.</p>
        </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; margin-top: 50px;">
        <table width="100%">
            <tr>
                <td style="text-align: center;">_________________________<br><em>(Landlord\'s Signature)</em></td>
                <td style="text-align: center;">_________________________<br><em>(Tenant\'s Signature)</em></td>
            </tr>
        </table>
    </div>'
                    ],
                    'de' => [
                        'title' => 'Wohnungsmietvertrag',
                        'description' => 'Ein Standard-Wohnungsmietvertrag, der zur Bestätigung des Wohnsitzes erforderlich ist.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
        <h1 style="text-align: center; font-size: 16px;">WOHNUNGSMIETVERTRAG</h1>
        <p>Abgeschlossen am [[agreement_date]] in [[city]] zwischen:</p>
        <p><strong>dem Vermieter:</strong> [[landlord_full_name]], wohnhaft in [[landlord_address]], Ausweis-Nr. [[landlord_id_number]],</p>
        <p>und</p>
        <p><strong>dem Mieter:</strong> [[tenant_full_name]], Ausweis-Nr. [[tenant_id_number]].</p>
        <h2 style="font-size: 14px;">§ 1. Vertragsgegenstand</h2>
        <p>1. Der Vermieter erklärt, Eigentümer der Wohnung in [[property_address]] zu sein.</p>
        <p>2. Der Vermieter überlässt dem Mieter die vorgenannte Wohnung zu Wohnzwecken.</p>
        <h2 style="font-size: 14px;">§ 2. Mietdauer</h2>
        <p>Der Vertrag wird für eine befristete Zeit vom [[lease_start_date]] bis zum [[lease_end_date]] geschlossen.</p>
        <h2 style="font-size: 14px;">§ 3. Miete und Gebühren</h2>
        <p>1. Die Parteien vereinbaren eine monatliche Miete in Höhe von <strong>[[rent_amount]] PLN</strong>.</p>
        <p>2. Die Miete ist im Voraus bis zum [[payment_day]]. eines jeden Monats zu zahlen.</p>
        </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; margin-top: 50px;">
        <table width="100%">
            <tr>
                <td style="text-align: center;">_________________________<br><em>(Unterschrift des Vermieters)</em></td>
                <td style="text-align: center;">_________________________<br><em>(Unterschrift des Mieters)</em></td>
            </tr>
        </table>
    </div>'
                    ],
                ]
            ],
            // --- НОВЫЙ ШАБЛОН: Декларация о предоставлении жилья ---
            [
                'slug' => 'declaration-accommodation-pl',
        'access_level' => 'free',
                'fields' => '[
        {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","uk":"Місто","en":"City","de":"Ort"}},
        {"name":"declaration_date","type":"date","required":true,"labels":{"pl":"Data","uk":"Дата","en":"Date","de":"Datum"}},
        {"name":"owner_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko właściciela lokalu","uk":"ПІБ власника житла","en":"Property Owner\'s Full Name","de":"Vollständiger Name des Eigentümers"}},
        {"name":"owner_id_number","type":"text","required":true,"labels":{"pl":"Seria i nr dowodu osobistego właściciela","uk":"Серія та номер паспорта власника","en":"Owner\'s ID Card Number","de":"Personalausweisnummer des Eigentümers"}},
        {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres lokalu","uk":"Адреса житла","en":"Property Address","de":"Adresse der Immobilie"}},
        {"name":"foreigner_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko cudzoziemca","uk":"ПІБ іноземця","en":"Foreigner\'s Full Name","de":"Vollständiger Name des Ausländers"}}
    ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Oświadczenie o zapewnieniu miejsca zamieszkania',
                        'description' => 'Dokument, w którym właściciel nieruchomości oświadcza, że zapewnia cudzoziemcowi miejsce zamieszkania pod wskazanym adresem.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.8;">
                <p style="text-align: right;">[[city]], [[declaration_date]] r.</p>
                <br><br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">OŚWIADCZENIE</h1>
                <h2 style="text-align: center; font-size: 14px; margin-top: 0;">o zapewnieniu miejsca zamieszkania</h2>
                <br><br>
                <p style="text-align: justify;">Ja, niżej podpisany/a <strong>[[owner_full_name]]</strong>, legitymujący/a się dowodem osobistym o numerze [[owner_id_number]], oświadczam, że jestem właścicielem/ką lokalu mieszkalnego położonego pod adresem: <strong>[[property_address]]</strong>.</p>
                <p style="text-align: justify;">Niniejszym oświadczam, że zapewniam miejsce zamieszkania Panu/Pani <strong>[[foreigner_full_name]]</strong> w wyżej wymienionym lokalu na czas jego/jej pobytu w Polsce.</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 80px; font-size: 12px; text-align: right;">
                <p>______________________________________</p>
                <p style="margin-right: 50px;"><em>(Czytelny podpis właściciela lokalu)</em></p>
            </div>'
                    ],
                    'uk' => [
                        'title' => 'Декларація про забезпечення місцем проживання',
                        'description' => 'Документ, у якому власник нерухомості заявляє, що забезпечує іноземця місцем проживання за вказаною адресою.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.8;">
                <p style="text-align: right;">[[city]], [[declaration_date]] р.</p>
                <br><br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">ДЕКЛАРАЦІЯ</h1>
                <h2 style="text-align: center; font-size: 14px; margin-top: 0;">про забезпечення місцем проживання</h2>
                <br><br>
                <p style="text-align: justify;">Я, що нижче підписався/лася <strong>[[owner_full_name]]</strong>, документ, що посвідчує особу, № [[owner_id_number]], заявляю, що є власником/цею житлового приміщення, розташованого за адресою: <strong>[[property_address]]</strong>.</p>
                <p style="text-align: justify;">Цим заявляю, що забезпечую місце проживання Пану/Пані <strong>[[foreigner_full_name]]</strong> у вищезгаданому приміщенні на час його/її перебування в Польщі.</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 80px; font-size: 12px; text-align: right;">
                <p>______________________________________</p>
                <p style="margin-right: 50px;"><em>(Розбірливий підпис власника житла)</em></p>
            </div>'
                    ],
                    'en' => [
                        'title' => 'Declaration on Providing Accommodation',
                        'description' => 'A document in which the property owner declares that they are providing the foreigner with a place of residence at the specified address.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.8;">
                <p style="text-align: right;">[[city]], [[declaration_date]]</p>
                <br><br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">DECLARATION</h1>
                <h2 style="text-align: center; font-size: 14px; margin-top: 0;">on Providing a Place of Residence</h2>
                <br><br>
                <p style="text-align: justify;">I, the undersigned, <strong>[[owner_full_name]]</strong>, holding ID card number [[owner_id_number]], declare that I am the owner of the residential property located at: <strong>[[property_address]]</strong>.</p>
                <p style="text-align: justify;">I hereby declare that I provide a place of residence for Mr./Ms. <strong>[[foreigner_full_name]]</strong> in the aforementioned property for the duration of his/her stay in Poland.</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 80px; font-size: 12px; text-align: right;">
                <p>______________________________________</p>
                <p style="margin-right: 50px;"><em>(Legible signature of the property owner)</em></p>
            </div>'
                    ],
                    'de' => [
                        'title' => 'Erklärung über die Bereitstellung einer Unterkunft',
                        'description' => 'Ein Dokument, in dem der Eigentümer der Immobilie erklärt, dass er dem Ausländer eine Unterkunft unter der angegebenen Adresse zur Verfügung stellt.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.8;">
                <p style="text-align: right;">[[city]], den [[declaration_date]]</p>
                <br><br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">ERKLÄRUNG</h1>
                <h2 style="text-align: center; font-size: 14px; margin-top: 0;">über die Bereitstellung einer Unterkunft</h2>
                <br><br>
                <p style="text-align: justify;">Ich, der/die Unterzeichnete, <strong>[[owner_full_name]]</strong>, Inhaber/in des Personalausweises Nr. [[owner_id_number]], erkläre hiermit, dass ich Eigentümer/in der Wohnimmobilie unter der folgenden Adresse bin: <strong>[[property_address]]</strong>.</p>
                <p style="text-align: justify;">Hiermit erkläre ich, dass ich Herrn/Frau <strong>[[foreigner_full_name]]</strong> eine Unterkunft in der oben genannten Immobilie für die Dauer seines/ihres Aufenthalts in Polen zur Verfügung stelle.</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 80px; font-size: 12px; text-align: right;">
                <p>______________________________________</p>
                <p style="margin-right: 50px;"><em>(Leserliche Unterschrift des Eigentümers)</em></p>
            </div>'
                    ]
                ]
            ],

            // --- НОВЫЙ ШАБЛОН: Доверенность на получение карты побыту ---
            [
                'slug' => 'poa-collect-residence-card-pl',
        'access_level' => 'free',
                'fields' => '[
        {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","uk":"Місто","en":"City","de":"Ort"}},
        {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data","uk":"Дата","en":"Date","de":"Datum"}},
        {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy (wnioskodawcy)","uk":"ПІБ довірителя (заявника)","en":"Principal\'s Full Name (applicant)","de":"Vollständiger Name des Vollmachtgebers (Antragsteller)"}},
        {"name":"principal_passport_number","type":"text","required":true,"labels":{"pl":"Seria i numer paszportu mocodawcy","uk":"Серія та номер паспорта довірителя","en":"Principal\'s Passport Series and Number","de":"Seriennummer des Reisepasses des Vollmachtgebers"}},
        {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","uk":"ПІБ повіреного","en":"Agent\'s Full Name","de":"Vollständiger Name des Bevollmächtigten"}},
        {"name":"agent_id_number","type":"text","required":true,"labels":{"pl":"Seria i numer dowodu osobistego/paszportu pełnomocnika","uk":"Серія та номер паспорта повіреного","en":"Agent\'s ID Card/Passport Series and Number","de":"Serien- und Ausweisnummer des Bevollmächtigten"}},
        {"name":"voivodeship_office_name","type":"text","required":true,"labels":{"pl":"Nazwa Urzędu Wojewódzkiego","uk":"Назва Воєводського Управління","en":"Name of the Voivodeship Office","de":"Name des Woiwodschaftsamtes"}}
    ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Upoważnienie do odbioru karty pobytu',
                        'description' => 'Pełnomocnictwo szczególne upoważniające wskazaną osobę do odbioru decyzji oraz karty pobytu w imieniu wnioskodawcy.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.8;">
                <p style="text-align: right;">[[city]], [[poa_date]] r.</p>
                <br><br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">UPOWAŻNIENIE</h1>
                <br><br>
                <p style="text-align: justify;">Ja, niżej podpisany/a <strong>[[principal_full_name]]</strong>, legitymujący/a się paszportem o serii i numerze [[principal_passport_number]], niniejszym upoważniam Pana/Panią <strong>[[agent_full_name]]</strong>, legitymującego/ą się dowodem osobistym/paszportem o serii i numerze [[agent_id_number]], do odbioru w moim imieniu karty pobytu oraz wszelkich dokumentów związanych z moim postępowaniem administracyjnym w <strong>[[voivodeship_office_name]]</strong>.</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 80px; font-size: 12px; text-align: right;">
                <p>______________________________________</p>
                <p style="margin-right: 50px;"><em>(Czytelny podpis mocodawcy)</em></p>
            </div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на отримання карти побиту',
                        'description' => 'Спеціальна довіреність, що уповноважує вказану особу на отримання рішення та карти побиту від імені заявника.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.8;">
                <p style="text-align: right;">[[city]], [[poa_date]] р.</p>
                <br><br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">ДОВІРЕНІСТЬ</h1>
                <br><br>
                <p style="text-align: justify;">Я, що нижче підписався/лася <strong>[[principal_full_name]]</strong>, паспорт серії та номеру [[principal_passport_number]], цим уповноважую Пана/Пані <strong>[[agent_full_name]]</strong>, документ, що посвідчує особу, серії та номеру [[agent_id_number]], на отримання від мого імені карти побиту та будь-яких документів, пов\'язаних з моїм адміністративним провадженням у <strong>[[voivodeship_office_name]]</strong>.</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 80px; font-size: 12px; text-align: right;">
                <p>______________________________________</p>
                <p style="margin-right: 50px;"><em>(Розбірливий підпис довірителя)</em></p>
            </div>'
                    ],
                    'en' => [
                        'title' => 'Authorization to Collect Residence Card',
                        'description' => 'A special power of attorney authorizing the designated person to collect the decision and residence card on behalf of the applicant.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.8;">
                <p style="text-align: right;">[[city]], [[poa_date]]</p>
                <br><br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">AUTHORIZATION</h1>
                <br><br>
                <p style="text-align: justify;">I, the undersigned, <strong>[[principal_full_name]]</strong>, holding passport series and number [[principal_passport_number]], hereby authorize Mr./Ms. <strong>[[agent_full_name]]</strong>, holding ID card/passport series and number [[agent_id_number]], to collect on my behalf the residence card and any documents related to my administrative proceedings at the <strong>[[voivodeship_office_name]]</strong>.</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 80px; font-size: 12px; text-align: right;">
                <p>______________________________________</p>
                <p style="margin-right: 50px;"><em>(Legible signature of the principal)</em></p>
            </div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht zur Abholung der Aufenthaltskarte',
                        'description' => 'Eine spezielle Vollmacht, die eine benannte Person ermächtigt, die Entscheidung und die Aufenthaltskarte im Namen des Antragstellers abzuholen.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.8;">
                <p style="text-align: right;">[[city]], den [[poa_date]]</p>
                <br><br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">VOLLMACHT</h1>
                <br><br>
                <p style="text-align: justify;">Ich, der/die Unterzeichnete, <strong>[[principal_full_name]]</strong>, Inhaber/in des Reisepasses mit der Serie und Nummer [[principal_passport_number]], ermächtige hiermit Herrn/Frau <strong>[[agent_full_name]]</strong>, Inhaber/in des Personalausweises/Reisepasses mit der Serie und Nummer [[agent_id_number]], in meinem Namen die Aufenthaltskarte und alle Dokumente im Zusammenhang mit meinem Verwaltungsverfahren im <strong>[[voivodeship_office_name]]</strong> abzuholen.</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 80px; font-size: 12px; text-align: right;">
                <p>______________________________________</p>
                <p style="margin-right: 50px;"><em>(Leserliche Unterschrift des Vollmachtgebers)</em></p>
            </div>'
                    ]
                ]
            ],

            // --- НОВЫЙ ШАБЛОН: Заявление об ускорении ---
            [
                'slug' => 'request-expedite-decision-karta-pobytu-pl',
        'access_level' => 'free',
                'fields' => '[
        {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","uk":"Місто","en":"City","de":"Ort"}},
        {"name":"request_date","type":"date","required":true,"labels":{"pl":"Data","uk":"Дата","en":"Date","de":"Datum"}},
        {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","uk":"ПІБ заявника","en":"Applicant\'s Full Name","de":"Vollständiger Name des Antragstellers"}},
        {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","uk":"Адреса заявника","en":"Applicant\'s Address","de":"Adresse des Antragstellers"}},
        {"name":"case_number","type":"text","required":true,"labels":{"pl":"Numer sprawy","uk":"Номер справи","en":"Case Number","de":"Aktenzeichen"}},
        {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","uk":"Дата подачі заяви","en":"Application Submission Date","de":"Antragsdatum"}},
        {"name":"voivode_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wojewody","uk":"Ім\'я та прізвище Воєводи","en":"Voivode\'s Full Name","de":"Vollständiger Name des Woiwoden"}},
        {"name":"voivodeship_office_department","type":"text","required":true,"labels":{"pl":"Wydział ds. Cudzoziemców Urzędu Wojewódzkiego","uk":"Відділ у справах іноземців Воєводського Управління","en":"Department for Foreigners of the Voivodeship Office","de":"Abteilung für Ausländer des Woiwodschaftsamtes"}},
        {"name":"reason","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie (np. potrzeba podróży, kończąca się wiza)","uk":"Обґрунтування (напр., необхідність поїздки, закінчення візи)","en":"Justification (e.g., need to travel, expiring visa)","de":"Begründung (z.B. Reisebedarf, ablaufendes Visum)"}}
    ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o przyspieszenie wydania decyzji (Ponaglenie)',
                        'description' => 'Pismo do urzędu z prośbą o przyspieszenie postępowania i wydanie decyzji w sprawie o udzielenie zezwolenia na pobyt.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                <table width="100%"><tr><td width="60%"><p><strong>Wnioskodawca:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]</p></td><td width="40%" style="text-align: right; vertical-align:top;"><p>[[city]], [[request_date]] r.</p></td></tr></table>
                <br><br>
                <p><strong>Sz. P. [[voivode_name]]</strong><br><strong>Wojewoda</strong><br><strong>[[voivodeship_office_department]]</strong></p>
                <br>
                <p><strong>Dotyczy sprawy nr: [[case_number]]</strong></p>
                <br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">PONAGLENIE</h1>
                <h2 style="text-align: center; font-size: 14px; margin-top: 0;">Wniosek o podjęcie działań i przyspieszenie wydania decyzji</h2>
                <br>
                <p>Wnoszę o podjęcie przez organ wszelkich niezbędnych działań w celu niezwłocznego zakończenia postępowania w sprawie o udzielenie mi zezwolenia na pobyt czasowy, wniosek z dnia [[application_date]].</p>
                <h3 style="font-size: 13px; font-weight: bold;">UZASADNIENIE</h3>
                <p style="text-align: justify;">[[reason]]</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: right;">
                <p>Z poważaniem,</p>
                <br><br>
                <p>_________________________</p>
                <p><em>([[applicant_full_name]])</em></p>
            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про прискорення видачі рішення (Клопотання)',
                        'description' => 'Лист до управління з проханням прискорити розгляд справи та видати рішення у справі про надання дозволу на проживання.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                <table width="100%"><tr><td width="60%"><p><strong>Заявник:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]</p></td><td width="40%" style="text-align: right; vertical-align:top;"><p>[[city]], [[request_date]] р.</p></td></tr></table>
                <br><br>
                <p><strong>Шановний Пан/Пані [[voivode_name]]</strong><br><strong>Воєвода</strong><br><strong>[[voivodeship_office_department]]</strong></p>
                <br>
                <p><strong>Стосується справи №: [[case_number]]</strong></p>
                <br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">КЛОПОТАННЯ</h1>
                <h2 style="text-align: center; font-size: 14px; margin-top: 0;">Прохання вжити заходів та прискорити видачу рішення</h2>
                <br>
                <p>Прошу орган вжити всіх необхідних заходів для негайного завершення провадження у справі про надання мені дозволу на тимчасове проживання, заява від [[application_date]].</p>
                <h3 style="font-size: 13px; font-weight: bold;">ОБҐРУНТУВАННЯ</h3>
                <p style="text-align: justify;">[[reason]]</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: right;">
                <p>З повагою,</p>
                <br><br>
                <p>_________________________</p>
                <p><em>([[applicant_full_name]])</em></p>
            </div>'
                    ],
                    'en' => [
                        'title' => 'Request to Expedite Decision (Reminder)',
                        'description' => 'A letter to the office requesting to expedite the proceedings and issue a decision in the residence permit case.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                <table width="100%"><tr><td width="60%"><p><strong>Applicant:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]</p></td><td width="40%" style="text-align: right; vertical-align:top;"><p>[[city]], [[request_date]]</p></td></tr></table>
                <br><br>
                <p><strong>Mr./Ms. [[voivode_name]]</strong><br><strong>Voivode</strong><br><strong>[[voivodeship_office_department]]</strong></p>
                <br>
                <p><strong>Regarding case no.: [[case_number]]</strong></p>
                <br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">REMINDER</h1>
                <h2 style="text-align: center; font-size: 14px; margin-top: 0;">Request to take action and expedite the issuance of a decision</h2>
                <br>
                <p>I request the authority to take all necessary actions to promptly conclude the proceedings regarding my application for a temporary residence permit, submitted on [[application_date]].</p>
                <h3 style="font-size: 13px; font-weight: bold;">JUSTIFICATION</h3>
                <p style="text-align: justify;">[[reason]]</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: right;">
                <p>Sincerely,</p>
                <br><br>
                <p>_________________________</p>
                <p><em>([[applicant_full_name]])</em></p>
            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Beschleunigung der Entscheidung (Untätigkeitsbeschwerde)',
                        'description' => 'Ein Schreiben an die Behörde mit der Bitte, das Verfahren zu beschleunigen und eine Entscheidung im Aufenthaltsgenehmigungsverfahren zu erteilen.',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                <table width="100%"><tr><td width="60%"><p><strong>Antragsteller:</strong><br>[[applicant_full_name]]<br>[[applicant_address]]</p></td><td width="40%" style="text-align: right; vertical-align:top;"><p>[[city]], den [[request_date]]</p></td></tr></table>
                <br><br>
                <p><strong>An den Herrn/Frau [[voivode_name]]</strong><br><strong>Woiwode</strong><br><strong>[[voivodeship_office_department]]</strong></p>
                <br>
                <p><strong>Betreff: Aktenzeichen [[case_number]]</strong></p>
                <br>
                <h1 style="text-align: center; font-size: 16px; font-weight: bold;">UNTÄTIGKEITSBESCHWERDE</h1>
                <h2 style="text-align: center; font-size: 14px; margin-top: 0;">Antrag auf Maßnahmen zur Beschleunigung der Entscheidung</h2>
                <br>
                <p>Ich beantrage, dass die Behörde alle erforderlichen Maßnahmen ergreift, um das Verfahren zur Erteilung einer befristeten Aufenthaltserlaubnis, Antrag vom [[application_date]], unverzüglich abzuschließen.</p>
                <h3 style="font-size: 13px; font-weight: bold;">BEGRÜNDUNG</h3>
                <p style="text-align: justify;">[[reason]]</p>
                </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: right;">
                <p>Mit freundlichen Grüßen,</p>
                <br><br>
                <p>_________________________</p>
                <p><em>([[applicant_full_name]])</em></p>
            </div>'
                    ]
                ]
            ],

        // --- Исковое заявление о взыскании долга по расписке / Statement of Claim for Debt Collection by Receipt ---
            [
                'slug' => 'statement-claim-debt-receipt-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa Sądu","en":"Court Name","uk":"Назва Суду","de":"Name des Gerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres Sądu","en":"Court Address","uk":"Адреса Суду","de":"Adresse des Gerichts"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Powoda","en":"Claimant\'s Full Name","uk":"ПІБ Позивача","de":"Vollständiger Name des Klägers"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres Powoda","en":"Claimant\'s Address","uk":"Адреса Позивача","de":"Adresse des Klägers"}},
                    {"name":"claimant_pesel_nip","type":"text","required":true,"labels":{"pl":"PESEL/NIP Powoda","en":"Claimant\'s PESEL/NIP","uk":"ПЕСЕЛЬ/ІПН Позивача","de":"PESEL/USt-IdNr. des Klägers"}},
                    {"name":"defendant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Pozwanego","en":"Defendant\'s Full Name","uk":"ПІБ Відповідача","de":"Vollständiger Name des Beklagten"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"pl":"Adres Pozwanego","en":"Defendant\'s Address","uk":"Адреса Відповідача","de":"Adresse des Beklagten"}},
                    {"name":"defendant_pesel_nip","type":"text","required":true,"labels":{"pl":"PESEL/NIP Pozwanego","en":"Defendant\'s PESEL/NIP","uk":"ПЕСЕЛЬ/ІПН Відповідача","de":"PESEL/USt-IdNr. des Beklagten"}},
                    {"name":"debt_amount","type":"number","required":true,"labels":{"pl":"Kwota długu","en":"Debt Amount","uk":"Сума боргу","de":"Schuldsumme"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"receipt_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pokwitowania","en":"Receipt Issue Date","uk":"Дата видачі розписки","de":"Datum der Quittungsausstellung"}},
                    {"name":"due_date","type":"date","required":true,"labels":{"pl":"Termin spłaty (z pokwitowania)","en":"Due Date (from receipt)","uk":"Термін погашення (з розписки)","de":"Fälligkeitsdatum (aus Quittung)"}},
                    {"name":"circumstances","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis okoliczności powstania długu i braku spłaty","en":"Detailed description of debt origin and non-repayment","uk":"Детальний опис обставин виникнення боргу та неповернення","de":"Detaillierte Beschreibung der Schuldentstehung und Nichtrückzahlung"}},
                    {"name":"evidence","type":"textarea","required":true,"labels":{"pl":"Dowody (np. kopia pokwitowania, korespondencja)","en":"Evidence (e.g., copy of receipt, correspondence)","uk":"Докази (напр., копія розписки, листування)","de":"Beweismittel (z.B. Kopie der Quittung, Korrespondenz)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (opcjonalnie)","en":"Attachments (optional)","uk":"Додатки (необов\'язково)","de":"Anhänge (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pozew o zapłatę długu z pokwitowania',
                        'description' => 'Wzór pozwu sądowego o odzyskanie długu na podstawie pisemnego pokwitowania.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>Powód:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL/NIP: [[claimant_pesel_nip]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/><br/>
                                <p><strong>Pozwany:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL/NIP: [[defendant_pesel_nip]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">POZEW O ZAPŁATĘ</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Wartość przedmiotu sporu:</strong> [[debt_amount]] [[currency]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym wnoszę o zasądzenie od Pozwanego na rzecz Powoda kwoty <strong>[[debt_amount]] [[currency]]</strong> wraz z odsetkami ustawowymi za opóźnienie od dnia [[due_date]] do dnia zapłaty oraz zwrot kosztów procesu.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">UZASADNIENIE</h2>
                                <p>[[circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">DOWODY</h2>
                                <p>[[evidence]]</p>
                                <br/>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Debt Collection by Receipt',
                        'description' => 'A template for a court claim to recover debt based on a written receipt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>Claimant:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL/NIP: [[claimant_pesel_nip]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/><br/>
                                <p><strong>Defendant:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL/NIP: [[defendant_pesel_nip]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">STATEMENT OF CLAIM FOR PAYMENT</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Value of the dispute:</strong> [[debt_amount]] [[currency]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby request the Court to order the Defendant to pay the Claimant the amount of <strong>[[debt_amount]] [[currency]]</strong> along with statutory interest for delay from [[due_date]] until the date of payment, and reimbursement of litigation costs.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">JUSTIFICATION</h2>
                                <p>[[circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">EVIDENCE</h2>
                                <p>[[evidence]]</p>
                                <br/>
                                <p>Enclosed please find: [[attachments]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Позовна заява про стягнення боргу за розпискою',
                        'description' => 'Зразок позовної заяви до суду про стягнення боргу на підставі письмової розписки.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>Позивач:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>ПЕСЕЛЬ/ІПН: [[claimant_pesel_nip]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/><br/>
                                <p><strong>Відповідач:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>ПЕСЕЛЬ/ІПН: [[defendant_pesel_nip]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ПОЗОВНА ЗАЯВА ПРО СТЯГНЕННЯ</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Вартість предмета спору:</strong> [[debt_amount]] [[currency]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим прошу стягнути з Відповідача на користь Позивача суму <strong>[[debt_amount]] [[currency]]</strong> разом із законними відсотками за прострочення з [[due_date]] до дня оплати та відшкодування судових витрат.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОБҐРУНТУВАННЯ</h2>
                                <p>[[circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ДОКАЗИ</h2>
                                <p>[[evidence]]</p>
                                <br/>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Klage auf Schuldeneintreibung aufgrund einer Quittung',
                        'description' => 'Vorlage für eine Gerichtsklage zur Beitreibung von Schulden auf der Grundlage einer schriftlichen Quittung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">KLAGE AUF ZAHLUNG</h1><p style="font-size: 14px;"><strong>Streitwert:</strong> [[debt_amount]] [[currency]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Kläger:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL/USt-IdNr.: [[claimant_pesel_nip]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Beklagter:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL/USt-IdNr.: [[defendant_pesel_nip]]</p>
                                <br/>
                                <p>Hiermit beantrage ich, dass der Beklagte dem Kläger den Betrag von <strong>[[debt_amount]] [[currency]]</strong> zuzüglich gesetzlicher Verzugszinsen ab dem [[due_date]] bis zum Zahlungstag sowie die Erstattung der Prozesskosten zu zahlen hat.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BEGRÜNDUNG</h2>
                                <p>[[circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BEWEISMITTEL</h2>
                                <p>[[evidence]]</p>
                                <br/>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Исковое заявление о расторжении брака / Statement of Claim for Divorce ---
            [
                'slug' => 'statement-claim-divorce-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa Sądu Okręgowego","en":"District Court Name","uk":"Назва Окружного Суду","de":"Name des Bezirksgerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres Sądu Okręgowego","en":"District Court Address","uk":"Адреса Окружного Суду","de":"Adresse des Bezirksgerichts"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Powoda","en":"Claimant\'s Full Name","uk":"ПІБ Позивача","de":"Vollständiger Name des Klägers"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres Powoda","en":"Claimant\'s Address","uk":"Адреса Позивача","de":"Adresse des Klägers"}},
                    {"name":"claimant_pesel","type":"text","required":true,"labels":{"pl":"PESEL Powoda","en":"Claimant\'s PESEL","uk":"ПЕСЕЛЬ Позивача","de":"PESEL des Klägers"}},
                    {"name":"defendant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Pozwanego","en":"Defendant\'s Full Name","uk":"ПІБ Відповідача","de":"Vollständiger Name des Beklagten"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"pl":"Adres Pozwanego","en":"Defendant\'s Address","uk":"Адреса Відповідача","de":"Adresse des Beklagten"}},
                    {"name":"defendant_pesel","type":"text","required":true,"labels":{"pl":"PESEL Pozwanego","en":"Defendant\'s PESEL","uk":"ПЕСЕЛЬ Відповідача","de":"PESEL des Beklagten"}},
                    {"name":"marriage_date","type":"date","required":true,"labels":{"pl":"Data zawarcia małżeństwa","en":"Marriage Date","uk":"Дата укладення шлюбу","de":"Datum der Eheschließung"}},
                    {"name":"marriage_place","type":"text","required":true,"labels":{"pl":"Miejsce zawarcia małżeństwa","en":"Marriage Place","uk":"Місце укладення шлюбу","de":"Ort der Eheschließung"}},
                    {"name":"children_details","type":"textarea","required":false,"labels":{"pl":"Dane dzieci (imiona, daty urodzenia)","en":"Children details (names, dates of birth)","uk":"Дані дітей (імена, дати народження)","de":"Details zu Kindern (Namen, Geburtsdaten)"}},
                    {"name":"separation_date","type":"date","required":true,"labels":{"pl":"Data faktycznego rozstania","en":"Date of actual separation","uk":"Дата фактичного розлучення","de":"Datum der tatsächlichen Trennung"}},
                    {"name":"reason_for_divorce","type":"textarea","required":true,"labels":{"pl":"Przyczyna rozkładu pożycia małżeńskiego","en":"Reason for marital breakdown","uk":"Причина розпаду сімейного життя","de":"Grund für das Scheitern der Ehe"}},
                    {"name":"fault_declaration","type":"text","required":true,"labels":{"pl":"Orzeczenie o winie (tak/nie/bez orzekania)","en":"Fault declaration (yes/no/no fault)","uk":"Рішення про вину (так/ні/без визначення вини)","de":"Schuldspruch (ja/nein/ohne Schuldspruch)"}},
                    {"name":"alimony_request","type":"textarea","required":false,"labels":{"pl":"Wniosek o alimenty (opcjonalnie)","en":"Alimony request (optional)","uk":"Заява про аліменти (необов\'язково)","de":"Unterhaltsantrag (optional)"}},
                    {"name":"child_custody_request","type":"textarea","required":false,"labels":{"pl":"Wniosek o władzę rodzicielską i kontakty z dziećmi (opcjonalnie)","en":"Child custody and contact request (optional)","uk":"Заява про батьківські права та контакти з дітьми (необов\'язково)","de":"Antrag auf elterliche Sorge und Umgang mit Kindern (optional)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. akt małżeństwa, akty urodzenia dzieci)","en":"Attachments (e.g., marriage certificate, birth certificates of children)","uk":"Додатки (напр., свідоцтво про шлюб, свідоцтва про народження дітей)","de":"Anhänge (z.B. Heiratsurkunde, Geburtsurkunden der Kinder)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pozew o rozwód',
                        'description' => 'Wzór pozwu sądowego o rozwiązanie małżeństwa.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>Powód:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL: [[claimant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/><br/>
                                <p><strong>Pozwany:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL: [[defendant_pesel]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">POZEW O ROZWÓD</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wnoszę o:</p>
                                <ol>
                                    <li>Rozwiązanie małżeństwa zawartego w dniu [[marriage_date]] w [[marriage_place]] pomiędzy [[claimant_full_name]] a [[defendant_full_name]] przez rozwód [[fault_declaration]].</li>
                                    <li>[[alimony_request]]</li>
                                    <li>[[child_custody_request]]</li>
                                </ol>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">UZASADNIENIE</h2>
                                <p>Małżeństwo stron zostało zawarte w dniu [[marriage_date]] w [[marriage_place]]. Od dnia [[separation_date]] strony pozostają w faktycznym rozstaniu.</p>
                                <p>Przyczyna rozkładu pożycia małżeńskiego: [[reason_for_divorce]]</p>
                                <p>[[children_details]]</p>
                                <br/>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Divorce',
                        'description' => 'A template for a court claim to dissolve a marriage.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">STATEMENT OF CLAIM FOR DIVORCE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Claimant:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL: [[claimant_pesel]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Defendant:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL: [[defendant_pesel]]</p>
                                <br/>
                                <p>I request:</p>
                                <ol>
                                    <li>Dissolution of the marriage concluded on [[marriage_date]] in [[marriage_place]] between [[claimant_full_name]] and [[defendant_full_name]] by divorce [[fault_declaration]].</li>
                                    <li>[[alimony_request]]</li>
                                    <li>[[child_custody_request]]</li>
                                </ol>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">JUSTIFICATION</h2>
                                <p>The marriage between the parties was concluded on [[marriage_date]] in [[marriage_place]]. Since [[separation_date]], the parties have been actually separated.</p>
                                <p>Reason for marital breakdown: [[reason_for_divorce]]</p>
                                <p>[[children_details]]</p>
                                <br/>
                                <p>Enclosed please find: [[attachments]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Позовна заява про розірвання шлюбу',
                        'description' => 'Зразок позовної заяви до суду про розірвання шлюбу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ПОЗОВНА ЗАЯВА ПРО РОЗІРВАННЯ ШЛЮБУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Позивач:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>ПЕСЕЛЬ: [[claimant_pesel]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Відповідач:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>ПЕСЕЛЬ: [[defendant_pesel]]</p>
                                <br/>
                                <p>Прошу:</p>
                                <ol>
                                    <li>Розірвати шлюб, укладений [[marriage_date]] в [[marriage_place]] між [[claimant_full_name]] та [[defendant_full_name]] шляхом розлучення [[fault_declaration]].</li>
                                    <li>[[alimony_request]]</li>
                                    <li>[[child_custody_request]]</li>
                                </ol>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОБҐРУНТУВАННЯ</h2>
                                <p>Шлюб сторін був укладений [[marriage_date]] в [[marriage_place]]. З [[separation_date]] сторони перебувають у фактичному розлученні.</p>
                                <p>Причина розпаду сімейного життя: [[reason_for_divorce]]</p>
                                <p>[[children_details]]</p>
                                <br/>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Klage auf Scheidung',
                        'description' => 'Vorlage für eine Gerichtsklage zur Auflösung einer Ehe.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">KLAGE AUF SCHEIDUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Kläger:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL: [[claimant_pesel]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Beklagter:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL: [[defendant_pesel]]</p>
                                <br/>
                                <p>Ich beantrage:</p>
                                <ol>
                                    <li>Auflösung der am [[marriage_date]] in [[marriage_place]] zwischen [[claimant_full_name]] und [[defendant_full_name]] geschlossenen Ehe durch Scheidung [[fault_declaration]].</li>
                                    <li>[[alimony_request]]</li>
                                    <li>[[child_custody_request]]</li>
                                </ol>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BEGRÜNDUNG</h2>
                                <p>Die Ehe der Parteien wurde am [[marriage_date]] in [[marriage_place]] geschlossen. Seit dem [[separation_date]] leben die Parteien faktisch getrennt.</p>
                                <p>Grund für das Scheitern der Ehe: [[reason_for_divorce]]</p>
                                <p>[[children_details]]</p>
                                <br/>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Исковое заявление о взыскании алиментов / Statement of Claim for Alimony Collection ---
            [
                'slug' => 'statement-claim-alimony-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa Sądu Rejonowego/Okręgowego","en":"District/Regional Court Name","uk":"Назва Районного/Окружного Суду","de":"Name des Amts-/Landgerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres Sądu","en":"Court Address","uk":"Адреса Суду","de":"Adresse des Gerichts"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Powoda","en":"Claimant\'s Full Name","uk":"ПІБ Позивача","de":"Vollständiger Name des Klägers"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres Powoda","en":"Claimant\'s Address","uk":"Адреса Позивача","de":"Adresse des Klägers"}},
                    {"name":"claimant_pesel","type":"text","required":true,"labels":{"pl":"PESEL Powoda","en":"Claimant\'s PESEL","uk":"ПЕСЕЛЬ Позивача","de":"PESEL des Klägers"}},
                    {"name":"defendant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Pozwanego","en":"Defendant\'s Full Name","uk":"ПІБ Відповідача","de":"Vollständiger Name des Beklagten"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"pl":"Adres Pozwanego","en":"Defendant\'s Address","uk":"Адреса Відповідача","de":"Adresse des Beklagten"}},
                    {"name":"defendant_pesel","type":"text","required":true,"labels":{"pl":"PESEL Pozwanego","en":"Defendant\'s PESEL","uk":"ПЕСЕЛЬ Відповідача","de":"PESEL des Beklagten"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"alimony_amount","type":"number","required":true,"labels":{"pl":"Żądana kwota alimentów (miesięcznie)","en":"Requested alimony amount (monthly)","uk":"Затребувана сума аліментів (щомісячно)","de":"Beantragter Unterhaltsbetrag (monatlich)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"alimony_reason","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie żądania alimentów (potrzeby dziecka, możliwości zarobkowe zobowiązanego)","en":"Justification for alimony request (child\'s needs, obligor\'s earning capacity)","uk":"Обґрунтування вимоги аліментів (потреби дитини, заробітна спроможність зобов\'язаної особи)","de":"Begründung des Unterhaltsantrags (Bedürfnisse des Kindes, Erwerbsfähigkeit des Verpflichteten)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. akt urodzenia dziecka, dokumenty finansowe)","en":"Attachments (e.g., child\'s birth certificate, financial documents)","uk":"Додатки (напр., свідоцтво про народження дитини, фінансові документи)","de":"Anhänge (z.B. Geburtsurkunde des Kindes, Finanzdokumente)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pozew o alimenty',
                        'description' => 'Wzór pozwu sądowego o zasądzenie alimentów na rzecz dziecka.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>Powód:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL: [[claimant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/><br/>
                                <p><strong>Pozwany:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL: [[defendant_pesel]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">POZEW O ALIMENTY</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dla dziecka:</strong> [[child_full_name]], ur. [[child_dob]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wnoszę o zasądzenie od Pozwanego na rzecz małoletniego/ej [[child_full_name]] alimentów w kwocie <strong>[[alimony_amount]] [[currency]]</strong> miesięcznie, płatnych do 10. dnia każdego miesiąca z góry, z ustawowymi odsetkami w przypadku opóźnienia w płatności którejkolwiek raty, począwszy od dnia wniesienia pozwu.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">UZASADNIENIE</h2>
                                <p>[[alimony_reason]]</p>
                                <br/>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Alimony Collection',
                        'description' => 'A template for a court claim to order alimony for a child.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">STATEMENT OF CLAIM FOR ALIMONY</h1><p style="font-size: 14px;"><strong>For child:</strong> [[child_full_name]], born [[child_dob]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Claimant:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL: [[claimant_pesel]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Defendant:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL: [[defendant_pesel]]</p>
                                <br/>
                                <p>I request the Court to order the Defendant to pay alimony to the minor [[child_full_name]] in the amount of <strong>[[alimony_amount]] [[currency]]</strong> per month, payable by the 10th day of each month in advance, with statutory interest in case of delay in payment of any installment, starting from the date of filing the claim.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">JUSTIFICATION</h2>
                                <p>[[alimony_reason]]</p>
                                <br/>
                                <p>Enclosed please find: [[attachments]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Позовна заява про стягнення аліментів',
                        'description' => 'Зразок позовної заяви до суду про стягнення аліментів на дитину.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ПОЗОВНА ЗАЯВА ПРО СТЯГНЕННЯ АЛІМЕНТІВ</h1><p style="font-size: 14px;"><strong>Для дитини:</strong> [[child_full_name]], нар. [[child_dob]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Позивач:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>ПЕСЕЛЬ: [[claimant_pesel]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Відповідач:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>ПЕСЕЛЬ: [[defendant_pesel]]</p>
                                <br/>
                                <p>Прошу стягнути з Відповідача на користь малолітнього/ї [[child_full_name]] аліменти у розмірі <strong>[[alimony_amount]] [[currency]]</strong> щомісячно, що підлягають сплаті до 10 числа кожного місяця наперед, із законними відсотками у разі прострочення сплати будь-якого платежу, починаючи з дня подання позову.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОБҐРУНТУВАННЯ</h2>
                                <p>[[alimony_reason]]</p>
                                <br/>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Klage auf Unterhaltszahlung',
                        'description' => 'Vorlage für eine Gerichtsklage zur Festsetzung von Unterhaltszahlungen für ein Kind.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">KLAGE AUF UNTERHALTSZAHLUNG</h1><p style="font-size: 14px;"><strong>Für das Kind:</strong> [[child_full_name]], geb. [[child_dob]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Kläger:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL: [[claimant_pesel]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Beklagter:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL: [[defendant_pesel]]</p>
                                <br/>
                                <p>Ich beantrage, dass der Beklagte dem minderjährigen [[child_full_name]] Unterhalt in Höhe von <strong>[[alimony_amount]] [[currency]]</strong> monatlich zu zahlen hat, fällig bis zum 10. eines jeden Monats im Voraus, mit gesetzlichen Zinsen im Falle der Verzögerung der Zahlung einer Rate, beginnend mit dem Datum der Klageerhebung.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BEGRÜNDUNG</h2>
                                <p>[[alimony_reason]]</p>
                                <br/>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Исковое заявление о возмещении ущерба при ДТП / Statement of Claim for Damages in a Road Accident ---
            [
                'slug' => 'statement-claim-road-accident-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa Sądu Rejonowego/Okręgowego","en":"District/Regional Court Name","uk":"Назва Районного/Окружного Суду","de":"Name des Amts-/Landgerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres Sądu","en":"Court Address","uk":"Адреса Суду","de":"Adresse des Gerichts"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Powoda","en":"Claimant\'s Full Name","uk":"ПІБ Позивача","de":"Vollständiger Name des Klägers"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres Powoda","en":"Claimant\'s Address","uk":"Адреса Позивача","de":"Adresse des Klägers"}},
                    {"name":"claimant_pesel_nip","type":"text","required":true,"labels":{"pl":"PESEL/NIP Powoda","en":"Claimant\'s PESEL/NIP","uk":"ПЕСЕЛЬ/ІПН Позивача","de":"PESEL/USt-IdNr. des Klägers"}},
                    {"name":"defendant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Pozwanego","en":"Defendant\'s Full Name","uk":"ПІБ Відповідача","de":"Vollständiger Name des Beklagten"}},
                    {"name":"defendant_address","type":"text","required":true,"labels":{"pl":"Adres Pozwanego","en":"Defendant\'s Address","uk":"Адреса Відповідача","de":"Adresse des Beklagten"}},
                    {"name":"defendant_pesel_nip","type":"text","required":true,"labels":{"pl":"PESEL/NIP Pozwanego","en":"Defendant\'s PESEL/NIP","uk":"ПЕСЕЛЬ/ІПН Відповідача","de":"PESEL/USt-IdNr. des Beklagten"}},
                    {"name":"accident_date","type":"date","required":true,"labels":{"pl":"Data wypadku","en":"Accident Date","uk":"Дата ДТП","de":"Unfalldatum"}},
                    {"name":"accident_place","type":"text","required":true,"labels":{"pl":"Miejsce wypadku","en":"Accident Place","uk":"Місце ДТП","de":"Unfallort"}},
                    {"name":"damage_description","type":"textarea","required":true,"labels":{"pl":"Opis poniesionej szkody (materialnej, osobowej)","en":"Description of incurred damage (material, personal)","uk":"Опис завданої шкоди (матеріальної, особистої)","de":"Beschreibung des erlittenen Schadens (materiell, persönlich)"}},
                    {"name":"damage_amount","type":"number","required":true,"labels":{"pl":"Żądana kwota odszkodowania","en":"Requested compensation amount","uk":"Затребувана сума відшкодування","de":"Beantragter Schadensersatzbetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"circumstances","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis okoliczności wypadku i winy Pozwanego","en":"Detailed description of accident circumstances and Defendant\'s fault","uk":"Детальний опис обставин ДТП та вини Відповідача","de":"Detaillierte Beschreibung der Unfallumstände und der Schuld des Beklagten"}},
                    {"name":"evidence","type":"textarea","required":true,"labels":{"pl":"Dowody (np. notatka policyjna, zdjęcia, opinia rzeczoznawcy)","en":"Evidence (e.g., police report, photos, expert opinion)","uk":"Докази (напр., поліцейський протокол, фотографії, висновок експерта)","de":"Beweismittel (z.B. Polizeibericht, Fotos, Gutachten)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (opcjonalnie)","en":"Attachments (optional)","uk":"Додатки (необов\'язково)","de":"Anhänge (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pozew o odszkodowanie z tytułu wypadku komunikacyjnego',
                        'description' => 'Wzór pozwu sądowego o odszkodowanie za szkody powstałe w wyniku wypadku drogowego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>Powód:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL/NIP: [[claimant_pesel_nip]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/><br/>
                                <p><strong>Pozwany:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL/NIP: [[defendant_pesel_nip]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">POZEW O ODSZKODOWANIE</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Wartość przedmiotu sporu:</strong> [[damage_amount]] [[currency]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym wnoszę o zasądzenie od Pozwanego na rzecz Powoda kwoty <strong>[[damage_amount]] [[currency]]</strong> tytułem odszkodowania za szkody powstałe w wyniku wypadku komunikacyjnego z dnia <strong>[[accident_date]]</strong> w [[accident_place]], wraz z odsetkami ustawowymi za opóźnienie od dnia wniesienia pozwu do dnia zapłaty oraz zwrot kosztów procesu.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">UZASADNIENIE</h2>
                                <p>[[circumstances]]</p>
                                <p>Opis poniesionej szkody: [[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">DOWODY</h2>
                                <p>[[evidence]]</p>
                                <br/>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Damages in a Road Accident',
                        'description' => 'A template for a court claim for damages resulting from a road accident.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">STATEMENT OF CLAIM FOR DAMAGES</h1><p style="font-size: 14px;"><strong>Value of the dispute:</strong> [[damage_amount]] [[currency]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Claimant:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL/NIP: [[claimant_pesel_nip]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Defendant:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL/NIP: [[defendant_pesel_nip]]</p>
                                <br/>
                                <p>I hereby request the Court to order the Defendant to pay the Claimant the amount of <strong>[[damage_amount]] [[currency]]</strong> as compensation for damages incurred as a result of the road accident on <strong>[[accident_date]]</strong> in [[accident_place]], along with statutory interest for delay from the date of filing the claim until the date of payment, and reimbursement of litigation costs.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">JUSTIFICATION</h2>
                                <p>[[circumstances]]</p>
                                <p>Description of incurred damage: [[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">EVIDENCE</h2>
                                <p>[[evidence]]</p>
                                <br/>
                                <p>Enclosed please find: [[attachments]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Позовна заява про відшкодування шкоди при ДТП',
                        'description' => 'Зразок позовної заяви до суду про відшкодування шкоди, що виникла внаслідок дорожньо-транспортної пригоди.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ПОЗОВНА ЗАЯВА ПРО ВІДШКОДУВАННЯ ШКОДИ</h1><p style="font-size: 14px;"><strong>Вартість предмета спору:</strong> [[damage_amount]] [[currency]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Позивач:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>ПЕСЕЛЬ/ІПН: [[claimant_pesel_nip]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Відповідач:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>ПЕСЕЛЬ/ІПН: [[defendant_pesel_nip]]</p>
                                <br/>
                                <p>Цим прошу стягнути з Відповідача на користь Позивача суму <strong>[[damage_amount]] [[currency]]</strong> як відшкодування шкоди, завданої внаслідок дорожньо-транспортної пригоди від <strong>[[accident_date]]</strong> у [[accident_place]], разом із законними відсотками за прострочення з дня подання позову до дня оплати та відшкодування судових витрат.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОБҐРУНТУВАННЯ</h2>
                                <p>[[circumstances]]</p>
                                <p>Опис завданої шкоди: [[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ДОКАЗИ</h2>
                                <p>[[evidence]]</p>
                                <br/>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Klage auf Schadensersatz aus Verkehrsunfall',
                        'description' => 'Vorlage für eine Gerichtsklage auf Schadensersatz aus einem Verkehrsunfall.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">KLAGE AUF SCHADENSERSATZ</h1><p style="font-size: 14px;"><strong>Streitwert:</strong> [[damage_amount]] [[currency]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Kläger:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL/USt-IdNr.: [[claimant_pesel_nip]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Beklagter:</strong><br>[[defendant_full_name]]<br>[[defendant_address]]<br>PESEL/USt-IdNr.: [[defendant_pesel_nip]]</p>
                                <br/>
                                <p>Hiermit beantrage ich, dass der Beklagte dem Kläger den Betrag von <strong>[[damage_amount]] [[currency]]</strong> als Schadensersatz für Schäden, die infolge des Verkehrsunfalls vom <strong>[[accident_date]]</strong> in [[accident_place]] entstanden sind, zuzüglich gesetzlicher Verzugszinsen ab dem Datum der Klageerhebung bis zum Zahlungstag sowie die Erstattung der Prozesskosten zu zahlen hat.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BEGRÜNDUNG</h2>
                                <p>[[circumstances]]</p>
                                <p>Beschreibung des erlittenen Schadens: [[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BEWEISMITTEL</h2>
                                <p>[[evidence]]</p>
                                <br/>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Исковое заявление о защите прав потребителей / Statement of Claim for Consumer Rights Protection ---
            [
                'slug' => 'statement-claim-consumer-rights-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa Sądu Rejonowego/Okręgowego","en":"District/Regional Court Name","uk":"Назва Районного/Окружного Суду","de":"Name des Amts-/Landgerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres Sądu","en":"Court Address","uk":"Адреса Суду","de":"Adresse des Gerichts"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Powoda (Konsumenta)","en":"Claimant\'s Full Name (Consumer)","uk":"ПІБ Позивача (Споживача)","de":"Vollständiger Name des Klägers (Verbraucher)"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres Powoda","en":"Claimant\'s Address","uk":"Адреса Позивача","de":"Adresse des Klägers"}},
                    {"name":"claimant_pesel","type":"text","required":true,"labels":{"pl":"PESEL Powoda","en":"Claimant\'s PESEL","uk":"ПЕСЕЛЬ Позивача","de":"PESEL des Klägers"}},
                    {"name":"defendant_company_name","type":"text","required":true,"labels":{"pl":"Nazwa Pozwanego (Przedsiębiorcy)","en":"Defendant\'s Company Name (Entrepreneur)","uk":"Назва Відповідача (Підприємця)","de":"Firmenname des Beklagten (Unternehmer)"}},
                    {"name":"defendant_company_address","type":"text","required":true,"labels":{"pl":"Adres Pozwanego","en":"Defendant\'s Address","uk":"Адреса Відповідача","de":"Adresse des Beklagten"}},
                    {"name":"product_service_name","type":"text","required":true,"labels":{"pl":"Nazwa produktu/usługi","en":"Product/Service Name","uk":"Назва товару/послуги","de":"Name des Produkts/der Dienstleistung"}},
                    {"name":"purchase_date","type":"date","required":true,"labels":{"pl":"Data zakupu/zawarcia umowy","en":"Purchase/Contract Date","uk":"Дата покупки/укладення договору","de":"Kauf-/Vertragsdatum"}},
                    {"name":"defect_description","type":"textarea","required":true,"labels":{"pl":"Opis wady/problemu i okoliczności","en":"Description of defect/problem and circumstances","uk":"Опис дефекту/проблеми та обставин","de":"Beschreibung des Mangels/Problems und der Umstände"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"pl":"Żądania (np. naprawa, wymiana, zwrot pieniędzy, obniżenie ceny, odszkodowanie)","en":"Demands (e.g., repair, replacement, refund, price reduction, compensation)","uk":"Вимоги (напр., ремонт, заміна, повернення грошей, зниження ціни, компенсація)","de":"Forderungen (z.B. Reparatur, Austausch, Rückerstattung, Preisminderung, Entschädigung)"}},
                    {"name":"previous_attempts","type":"textarea","required":false,"labels":{"pl":"Wcześniejsze próby rozwiązania problemu (opcjonalnie)","en":"Previous attempts to resolve the issue (optional)","uk":"Попередні спроби вирішення проблеми (необов\'язково)","de":"Frühere Versuche zur Problemlösung (optional)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. dowód zakupu, korespondencja, zdjęcia)","en":"Attachments (e.g., proof of purchase, correspondence, photos)","uk":"Додатки (напр., доказ покупки, листування, фотографії)","de":"Anhänge (z.B. Kaufbeleg, Korrespondenz, Fotos)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pozew o ochronę praw konsumenta',
                        'description' => 'Wzór pozwu sądowego w sprawach z zakresu ochrony praw konsumenta.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>Powód:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL: [[claimant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/><br/>
                                <p><strong>Pozwany:</strong><br>[[defendant_company_name]]<br>[[defendant_company_address]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">POZEW O OCHRONĘ PRAW KONSUMENTA</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> [[product_service_name]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym wnoszę o:</p>
                                <p>[[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">UZASADNIENIE</h2>
                                <p>W dniu [[purchase_date]] Powód zakupił/zawarł umowę na [[product_service_name]] od Pozwanego.</p>
                                <p>Wada/problem polega na: [[defect_description]]</p>
                                <p>[[previous_attempts]]</p>
                                <br/>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Statement of Claim for Consumer Rights Protection',
                        'description' => 'A template for a court claim in consumer rights protection cases.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">STATEMENT OF CLAIM FOR CONSUMER RIGHTS PROTECTION</h1><p style="font-size: 14px;"><strong>Subject:</strong> [[product_service_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Claimant:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL: [[claimant_pesel]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Defendant:</strong><br>[[defendant_company_name]]<br>[[defendant_company_address]]</p>
                                <br/>
                                <p>I hereby request:</p>
                                <p>[[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">JUSTIFICATION</h2>
                                <p>On [[purchase_date]], the Claimant purchased/concluded a contract for [[product_service_name]] from the Defendant.</p>
                                <p>The defect/problem is as follows: [[defect_description]]</p>
                                <p>[[previous_attempts]]</p>
                                <br/>
                                <p>Enclosed please find: [[attachments]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Позовна заява про захист прав споживачів',
                        'description' => 'Зразок позовної заяви до суду у справах захисту прав споживачів.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ПОЗОВНА ЗАЯВА ПРО ЗАХИСТ ПРАВ СПОЖИВАЧІВ</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[product_service_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Позивач:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>ПЕСЕЛЬ: [[claimant_pesel]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Відповідач:</strong><br>[[defendant_company_name]]<br>[[defendant_company_address]]</p>
                                <br/>
                                <p>Цим прошу:</p>
                                <p>[[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОБҐРУНТУВАННЯ</h2>
                                <p>[[purchase_date]] Позивач придбав/уклав договір на [[product_service_name]] у Відповідача.</p>
                                <p>Дефект/проблема полягає в: [[defect_description]]</p>
                                <p>[[previous_attempts]]</p>
                                <br/>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Klage auf Verbraucherschutz',
                        'description' => 'Vorlage für eine Gerichtsklage in Verbraucherschutzfällen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">KLAGE AUF VERBRAUCHERSCHUTZ</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[product_service_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Kläger:</strong><br>[[claimant_full_name]]<br>[[claimant_address]]<br>PESEL: [[claimant_pesel]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Beklagter:</strong><br>[[defendant_company_name]]<br>[[defendant_company_address]]</p>
                                <br/>
                                <p>Hiermit beantrage ich:</p>
                                <p>[[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BEGRÜNDUNG</h2>
                                <p>Am [[purchase_date]] hat der Kläger [[product_service_name]] vom Beklagten gekauft/einen Vertrag über [[product_service_name]] mit dem Beklagten geschlossen.</p>
                                <p>Der Mangel/das Problem besteht in: [[defect_description]]</p>
                                <p>[[previous_attempts]]</p>
                                <br/>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Генеральная доверенность / General Power of Attorney ---
            [
                'slug' => 'general-power-of-attorney-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"principal_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości mocodawcy","en":"Principal\'s ID Number","uk":"Номер посвідчення довірителя","de":"Ausweisnummer des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","en":"Agent\'s Full Name","uk":"ПІБ повіреного","de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"agent_address","type":"text","required":true,"labels":{"pl":"Adres pełnomocnika","en":"Agent\'s Address","uk":"Адреса повіреного","de":"Adresse des Bevollmächtigten"}},
                    {"name":"agent_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości pełnomocnika","en":"Agent\'s ID Number","uk":"Номер посвідчення повіреного","de":"Ausweisnummer des Bevollmächtigten"}},
                    {"name":"scope_of_authority","type":"textarea","required":true,"labels":{"pl":"Zakres pełnomocnictwa (ogólny opis uprawnień)","en":"Scope of authority (general description of powers)","uk":"Обсяг повноважень (загальний опис повноважень)","de":"Umfang der Vollmacht (allgemeine Beschreibung der Befugnisse)"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Okres ważności pełnomocnictwa (opcjonalnie)","en":"Validity period of power of attorney (optional)","uk":"Термін дії довіреності (необов\'язково)","de":"Gültigkeitsdauer der Vollmacht (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pełnomocnictwo ogólne',
                        'description' => 'Dokument uprawniający pełnomocnika do działania w szerokim zakresie spraw w imieniu mocodawcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO OGÓLNE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[poa_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[principal_full_name]]</strong>, zamieszkały/a w [[principal_address]], legitymujący/a się dowodem osobistym nr [[principal_id_number]],</p>
                                <p>niniejszym ustanawiam pełnomocnikiem Pana/Panią: <strong>[[agent_full_name]]</strong>, zamieszkałego/ą w [[agent_address]], legitymującego/ą się dowodem osobistym nr [[agent_id_number]],</p>
                                <p>do działania w moim imieniu we wszelkich sprawach, które nie wymagają pełnomocnictwa szczególnego, w tym w szczególności w zakresie: [[scope_of_authority]]</p>
                                <p>Pełnomocnictwo jest ważne [[validity_period]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'General Power of Attorney',
                        'description' => 'A document authorizing an agent to act on behalf of the principal in a wide range of matters.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GENERAL POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[principal_full_name]]</strong>, residing in [[principal_address]], holding ID number [[principal_id_number]],</p>
                                <p>hereby appoint Mr./Ms.: <strong>[[agent_full_name]]</strong>, residing in [[agent_address]], holding ID number [[agent_id_number]], as my attorney-in-fact,</p>
                                <p>to act on my behalf in all matters that do not require a special power of attorney, including in particular: [[scope_of_authority]]</p>
                                <p>This Power of Attorney is valid [[validity_period]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Генеральна довіреність',
                        'description' => 'Документ, що уповноважує повіреного діяти від імені довірителя у широкому колі справ.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ГЕНЕРАЛЬНА ДОВІРЕНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[principal_full_name]]</strong>, що проживає за адресою [[principal_address]], який/яка посвідчує особу за паспортом № [[principal_id_number]],</p>
                                <p>цим призначаю повіреним Пана/Пані: <strong>[[agent_full_name]]</strong>, що проживає за адресою [[agent_address]], який/яка посвідчує особу за паспортом № [[agent_id_number]],</p>
                                <p>для дій від мого імені у всіх справах, які не вимагають спеціальної довіреності, зокрема у сфері: [[scope_of_authority]]</p>
                                <p>Довіреність дійсна [[validity_period]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Generalvollmacht',
                        'description' => 'Ein Dokument, das einen Bevollmächtigten ermächtigt, in einem breiten Spektrum von Angelegenheiten im Namen des Vollmachtgebers zu handeln.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GENERALVOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[principal_full_name]]</strong>, wohnhaft in [[principal_address]], Ausweis-Nr. [[principal_id_number]],</p>
                                <p>bestelle hiermit Herrn/Frau: <strong>[[agent_full_name]]</strong>, wohnhaft in [[agent_address]], Ausweis-Nr. [[agent_id_number]], zu meinem Bevollmächtigten,</p>
                                <p>um in meinem Namen in allen Angelegenheiten zu handeln, die keiner besonderen Vollmacht bedürfen, insbesondere in Bezug auf: [[scope_of_authority]]</p>
                                <p>Die Vollmacht ist gültig [[validity_period]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Доверенность на представление интересов в суде / Power of Attorney for Representation in Court ---
            [
                'slug' => 'poa-representation-court-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"principal_pesel_nip","type":"text","required":true,"labels":{"pl":"PESEL/NIP mocodawcy","en":"Principal\'s PESEL/NIP","uk":"ПЕСЕЛЬ/ІПН довірителя","de":"PESEL/USt-IdNr. des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika (adwokata/radcy prawnego)","en":"Agent\'s Full Name (attorney/legal advisor)","uk":"ПІБ повіреного (адвоката/юрисконсульта)","de":"Vollständiger Name des Bevollmächtigten (Rechtsanwalt/Rechtsbeistand)"}},
                    {"name":"agent_address","type":"text","required":true,"labels":{"pl":"Adres pełnomocnika","en":"Agent\'s Address","uk":"Адреса повіреного","de":"Adresse des Bevollmächtigten"}},
                    {"name":"agent_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości pełnomocnika","en":"Agent\'s ID Number","uk":"Номер посвідчення повіреного","de":"Ausweisnummer des Bevollmächtigten"}},
                    {"name":"case_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły sprawy sądowej (sygnatura, strony, przedmiot)","en":"Court case details (case number, parties, subject)","uk":"Деталі судової справи (номер, сторони, предмет)","de":"Details des Gerichtsverfahrens (Aktenzeichen, Parteien, Gegenstand)"}},
                    {"name":"scope_of_authority","type":"textarea","required":true,"labels":{"pl":"Zakres pełnomocnictwa (np. wnoszenie pism, udział w rozprawach, zawieranie ugód)","en":"Scope of authority (e.g., filing documents, attending hearings, concluding settlements)","uk":"Обсяг повноважень (напр., подання документів, участь у засіданнях, укладення мирових угод)","de":"Umfang der Vollmacht (z.B. Einreichung von Schriftsätzen, Teilnahme an Verhandlungen, Abschluss von Vergleichen)"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Okres ważności pełnomocnictwa (opcjonalnie)","en":"Validity period of power of attorney (optional)","uk":"Термін дії довіреності (необов\'язково)","de":"Gültigkeitsdauer der Vollmacht (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pełnomocnictwo procesowe (do sądu)',
                        'description' => 'Dokument uprawniający adwokata lub radcę prawnego do reprezentowania interesów w postępowaniu sądowym.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO PROCESOWE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[poa_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[principal_full_name]]</strong>, zamieszkały/a w [[principal_address]], PESEL/NIP: [[principal_pesel_nip]],</p>
                                <p>niniejszym ustanawiam pełnomocnikiem procesowym Pana/Panią: <strong>[[agent_full_name]]</strong>, zamieszkałego/ą w [[agent_address]], legitymującego/ą się dowodem osobistym nr [[agent_id_number]],</p>
                                <p>do reprezentowania moich interesów w sprawie: [[case_details]], przed wszystkimi sądami i organami egzekucyjnymi, we wszystkich instancjach, w zakresie: [[scope_of_authority]]</p>
                                <p>Pełnomocnictwo jest ważne [[validity_period]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Representation in Court',
                        'description' => 'A document authorizing an attorney or legal advisor to represent interests in court proceedings.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY FOR COURT PROCEEDINGS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[principal_full_name]]</strong>, residing in [[principal_address]], PESEL/NIP: [[principal_pesel_nip]],</p>
                                <p>hereby appoint Mr./Ms.: <strong>[[agent_full_name]]</strong>, residing in [[agent_address]], holding ID number [[agent_id_number]], as my attorney-in-fact for court proceedings,</p>
                                <p>to represent my interests in the case: [[case_details]], before all courts and enforcement authorities, in all instances, to the extent of: [[scope_of_authority]]</p>
                                <p>This Power of Attorney is valid [[validity_period]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на представництво інтересів у суді',
                        'description' => 'Документ, що уповноважує адвоката або юрисконсульта представляти інтереси в судовому провадженні.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ НА ПРЕДСТАВНИЦТВО В СУДІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[principal_full_name]]</strong>, що проживає за адресою [[principal_address]], ПЕСЕЛЬ/ІПН: [[principal_pesel_nip]],</p>
                                <p>цим призначаю повіреним у судовому процесі Пана/Пані: <strong>[[agent_full_name]]</strong>, що проживає за адресою [[agent_address]], який/яка посвідчує особу за паспортом № [[agent_id_number]],</p>
                                <p>для представництва моїх інтересів у справі: [[case_details]], перед усіма судами та органами виконавчої служби, у всіх інстанціях, у сфері: [[scope_of_authority]]</p>
                                <p>Довіреність дійсна [[validity_period]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Prozessvollmacht (für Gericht)',
                        'description' => 'Ein Dokument, das einen Rechtsanwalt oder Rechtsbeistand ermächtigt, Interessen in Gerichtsverfahren zu vertreten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROZESSVOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[principal_full_name]]</strong>, wohnhaft in [[principal_address]], PESEL/USt-IdNr.: [[principal_pesel_nip]],</p>
                                <p>bestelle hiermit Herrn/Frau: <strong>[[agent_full_name]]</strong>, wohnhaft in [[agent_address]], Ausweis-Nr. [[agent_id_number]], zu meinem Prozessbevollmächtigten,</p>
                                <p>um meine Interessen in der Sache: [[case_details]], vor allen Gerichten und Vollstreckungsbehörden, in allen Instanzen, im Umfang von: [[scope_of_authority]] zu vertreten.</p>
                                <p>Die Vollmacht ist gültig [[validity_period]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Доверенность на получение документов / Power of Attorney for Document Collection ---
            [
                'slug' => 'poa-document-collection-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"principal_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości mocodawcy","en":"Principal\'s ID Number","uk":"Номер посвідчення довірителя","de":"Ausweisnummer des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","en":"Agent\'s Full Name","uk":"ПІБ повіреного","de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"agent_address","type":"text","required":true,"labels":{"pl":"Adres pełnomocnika","en":"Agent\'s Address","uk":"Адреса повіреного","de":"Adresse des Bevollmächtigten"}},
                    {"name":"agent_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości pełnomocnika","en":"Agent\'s ID Number","uk":"Номер посвідчення повіреного","de":"Ausweisnummer des Bevollmächtigten"}},
                    {"name":"document_description","type":"textarea","required":true,"labels":{"pl":"Opis dokumentów do odbioru","en":"Description of documents to be collected","uk":"Опис документів для отримання","de":"Beschreibung der abzuholenden Dokumente"}},
                    {"name":"issuing_authority","type":"text","required":true,"labels":{"pl":"Nazwa urzędu/instytucji wydającej dokumenty","en":"Name of authority/institution issuing documents","uk":"Назва органу/установи, що видає документи","de":"Name der Behörde/Institution, die die Dokumente ausstellt"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Okres ważności pełnomocnictwa (opcjonalnie)","en":"Validity period of power of attorney (optional)","uk":"Термін дії довіреності (необов\'язково)","de":"Gültigkeitsdauer der Vollmacht (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pełnomocnictwo do odbioru dokumentów',
                        'description' => 'Dokument uprawniający pełnomocnika do odbioru określonych dokumentów w imieniu mocodawcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO DO ODBIORU DOKUMENTÓW</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[poa_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[principal_full_name]]</strong>, zamieszkały/a w [[principal_address]], legitymujący/a się dowodem osobistym nr [[principal_id_number]],</p>
                                <p>niniejszym ustanawiam pełnomocnikiem Pana/Panią: <strong>[[agent_full_name]]</strong>, zamieszkałego/ą w [[agent_address]], legitymującego/ą się dowodem osobistym nr [[agent_id_number]],</p>
                                <p>do odbioru w moim imieniu z [[issuing_authority]] następujących dokumentów: [[document_description]]</p>
                                <p>Pełnomocnictwo jest ważne [[validity_period]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Document Collection',
                        'description' => 'A document authorizing an agent to collect specific documents on behalf of the principal.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY FOR DOCUMENT COLLECTION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[principal_full_name]]</strong>, residing in [[principal_address]], holding ID number [[principal_id_number]],</p>
                                <p>hereby appoint Mr./Ms.: <strong>[[agent_full_name]]</strong>, residing in [[agent_address]], holding ID number [[agent_id_number]], as my attorney-in-fact,</p>
                                <p>to collect on my behalf from [[issuing_authority]] the following documents: [[document_description]]</p>
                                <p>This Power of Attorney is valid [[validity_period]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на отримання документів',
                        'description' => 'Документ, що уповноважує повіреного отримувати певні документи від імені довірителя.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ НА ОТРИМАННЯ ДОКУМЕНТІВ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[principal_full_name]]</strong>, що проживає за адресою [[principal_address]], який/яка посвідчує особу за паспортом № [[principal_id_number]],</p>
                                <p>цим призначаю повіреним Пана/Пані: <strong>[[agent_full_name]]</strong>, що проживає за адресою [[agent_address]], який/яка посвідчує особу за паспортом № [[agent_id_number]],</p>
                                <p>для отримання від мого імені з [[issuing_authority]] наступних документів: [[document_description]]</p>
                                <p>Довіреність дійсна [[validity_period]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht zur Abholung von Dokumenten',
                        'description' => 'Ein Dokument, das einen Bevollmächtigten ermächtigt, bestimmte Dokumente im Namen des Vollmachtgebers abzuholen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT ZUR ABHOLUNG VON DOKUMENTEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[principal_full_name]]</strong>, wohnhaft in [[principal_address]], Ausweis-Nr. [[principal_id_number]],</p>
                                <p>bestelle hiermit Herrn/Frau: <strong>[[agent_full_name]]</strong>, wohnhaft in [[agent_address]], Ausweis-Nr. [[agent_id_number]], zu meinem Bevollmächtigten,</p>
                                <p>um in meinem Namen von [[issuing_authority]] folgende Dokumente abzuholen: [[document_description]]</p>
                                <p>Die Vollmacht ist gültig [[validity_period]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Отзыв доверенности / Revocation of Power of Attorney ---
            [
                'slug' => 'revocation-poa-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"revocation_date","type":"date","required":true,"labels":{"pl":"Data odwołania","en":"Revocation Date","uk":"Дата відкликання","de":"Datum des Widerrufs"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"principal_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości mocodawcy","en":"Principal\'s ID Number","uk":"Номер посвідчення довірителя","de":"Ausweisnummer des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","en":"Agent\'s Full Name","uk":"ПІБ повіреного","de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"poa_issue_date","type":"date","required":true,"labels":{"pl":"Data wystawienia odwoływanego pełnomocnictwa","en":"Revoked POA Issue Date","uk":"Дата видачі відкликаної довіреності","de":"Ausstellungsdatum der widerrufenen Vollmacht"}},
                    {"name":"poa_scope","type":"textarea","required":true,"labels":{"pl":"Zakres odwoływanego pełnomocnictwa","en":"Scope of revoked power of attorney","uk":"Обсяг відкликаної довіреності","de":"Umfang der widerrufenen Vollmacht"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Odwołanie pełnomocnictwa',
                        'description' => 'Dokument formalnie odwołujący udzielone wcześniej pełnomocnictwo.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ODWOŁANIE PEŁNOMOCNICTWA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[revocation_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[principal_full_name]]</strong>, zamieszkały/a w [[principal_address]], legitymujący/a się dowodem osobistym nr [[principal_id_number]],</p>
                                <p>niniejszym odwołuję pełnomocnictwo udzielone Panu/Pani: <strong>[[agent_full_name]]</strong>, wystawione w dniu <strong>[[poa_issue_date]]</strong>, w zakresie: [[poa_scope]]</p>
                                <p>Odwołanie pełnomocnictwa staje się skuteczne z chwilą doręczenia niniejszego oświadczenia pełnomocnikowi.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Revocation of Power of Attorney',
                        'description' => 'A document formally revoking a previously granted power of attorney.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REVOCATION OF POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[revocation_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[principal_full_name]]</strong>, residing in [[principal_address]], holding ID number [[principal_id_number]],</p>
                                <p>hereby revoke the power of attorney granted to Mr./Ms.: <strong>[[agent_full_name]]</strong>, issued on <strong>[[poa_issue_date]]</strong>, regarding: [[poa_scope]]</p>
                                <p>The revocation of the power of attorney becomes effective upon delivery of this statement to the agent.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Відкликання довіреності',
                        'description' => 'Документ, що формально відкликає раніше надану довіреність.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ВІДКЛИКАННЯ ДОВІРЕНОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[principal_full_name]]</strong>, що проживає за адресою [[principal_address]], який/яка посвідчує особу за паспортом № [[principal_id_number]],</p>
                                <p>цим відкликаю довіреність, надану Пану/Пані: <strong>[[agent_full_name]]</strong>, видану <strong>[[poa_issue_date]]</strong>, у сфері: [[poa_scope]]</p>
                                <p>Відкликання довіреності набирає чинності з моменту вручення цієї заяви повіреному.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Widerruf der Vollmacht',
                        'description' => 'Ein Dokument, das eine zuvor erteilte Vollmacht formell widerruft.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WIDERRUF DER VOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[revocation_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[principal_full_name]]</strong>, wohnhaft in [[principal_address]], Ausweis-Nr. [[principal_id_number]],</p>
                                <p>widerrufe hiermit die Herrn/Frau: <strong>[[agent_full_name]]</strong>, erteilte Vollmacht, ausgestellt am <strong>[[poa_issue_date]]</strong>, im Umfang von: [[poa_scope]]</p>
                                <p>Der Widerruf der Vollmacht wird mit Zustellung dieser Erklärung an den Bevollmächtigten wirksam.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Завещание (общая форма) / Will (General Form) ---
            [
                'slug' => 'will-general-form-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"will_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia testamentu","en":"Will Date","uk":"Дата складання заповіту","de":"Datum des Testaments"}},
                    {"name":"testator_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko testatora","en":"Testator\'s Full Name","uk":"ПІБ заповідача","de":"Vollständiger Name des Erblassers"}},
                    {"name":"testator_address","type":"text","required":true,"labels":{"pl":"Adres testatora","en":"Testator\'s Address","uk":"Адреса заповідача","de":"Adresse des Erblassers"}},
                    {"name":"testator_pesel","type":"text","required":true,"labels":{"pl":"PESEL testatora","en":"Testator\'s PESEL","uk":"ПЕСЕЛЬ заповідача","de":"PESEL des Erblassers"}},
                    {"name":"heir_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko spadkobiercy","en":"Heir\'s Full Name","uk":"ПІБ спадкоємця","de":"Vollständiger Name des Erben"}},
                    {"name":"heir_address","type":"text","required":true,"labels":{"pl":"Adres spadkobiercy","en":"Heir\'s Address","uk":"Адреса спадкоємця","de":"Adresse des Erben"}},
                    {"name":"inheritance_description","type":"textarea","required":true,"labels":{"pl":"Opis majątku przekazywanego w spadku","en":"Description of property transferred in inheritance","uk":"Опис майна, що передається у спадок","de":"Beschreibung des im Erbe übertragenen Vermögens"}},
                    {"name":"other_provisions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (np. wydziedziczenie, zapisy)","en":"Other provisions (e.g., disinheritance, legacies)","uk":"Інші положення (напр., позбавлення спадщини, заповіти)","de":"Weitere Bestimmungen (z.B. Enterbung, Vermächtnisse)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Testament (forma ogólna)',
                        'description' => 'Ogólny wzór testamentu, w którym testator rozporządza swoim majątkiem na wypadek śmierci.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TESTAMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[will_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[testator_full_name]]</strong>, zamieszkały/a w [[testator_address]], PESEL: [[testator_pesel]], będąc w pełni władz umysłowych, niniejszym sporządzam testament.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Ustanowienie spadkobiercy</h2>
                                <p>Do całości spadku po mnie powołuję <strong>[[heir_full_name]]</strong>, zamieszkałego/ą w [[heir_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Rozporządzenie majątkiem</h2>
                                <p>Majątek, który pozostawiam w spadku, obejmuje: [[inheritance_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Inne postanowienia</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Podpis</h2>
                                <p>Niniejszy testament został sporządzony własnoręcznie i podpisany.</p>
                                <br/>
                                <p>___________________</p>
                                <p>(Własnoręczny podpis testatora)</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">[[testator_full_name]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Will (General Form)',
                        'description' => 'A general template for a will, in which the testator disposes of their property upon death.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LAST WILL AND TESTAMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[will_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[testator_full_name]]</strong>, residing at [[testator_address]], PESEL: [[testator_pesel]], being of sound mind, hereby make this my Last Will and Testament.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Appointment of Heir</h2>
                                <p>I appoint <strong>[[heir_full_name]]</strong>, residing at [[heir_address]], as the sole heir to my entire estate.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Disposition of Property</h2>
                                <p>The property I leave as inheritance includes: [[inheritance_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Other Provisions</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Signature</h2>
                                <p>This will has been personally written and signed by me.</p>
                                <br/>
                                <p>___________________</p>
                                <p>(Testator\'s handwritten signature)</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">[[testator_full_name]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заповіт (загальна форма)',
                        'description' => 'Загальний зразок заповіту, в якому заповідач розпоряджається своїм майном на випадок смерті.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАПОВІТ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[testator_full_name]]</strong>, що проживає за адресою [[testator_address]], ПЕСЕЛЬ: [[testator_pesel]], перебуваючи при повному розумі, цим складаю заповіт.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Призначення спадкоємця</h2>
                                <p>До всієї спадщини після мене закликаю <strong>[[heir_full_name]]</strong>, що проживає за адресою [[heir_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Розпорядження майном</h2>
                                <p>Майно, яке я залишаю у спадок, включає: [[inheritance_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Інші положення</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Підпис</h2>
                                <p>Цей заповіт був складений власноручно та підписаний.</p>
                                <br/>
                                <p>___________________</p>
                                <p>(Власноручний підпис заповідача)</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">[[testator_full_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Testament (allgemeine Form)',
                        'description' => 'Eine allgemeine Vorlage für ein Testament, in dem der Erblasser sein Vermögen für den Todesfall verfügt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TESTAMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[will_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[testator_full_name]]</strong>, wohnhaft in [[testator_address]], PESEL: [[testator_pesel]], bei vollem Besitz meiner geistigen Kräfte, errichte hiermit mein Testament.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Erbeinsetzung</h2>
                                <p>Als Erben meines gesamten Nachlasses setze ich <strong>[[heir_full_name]]</strong>, wohnhaft in [[heir_address]], ein.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Vermögensverfügung</h2>
                                <p>Das Vermögen, das ich als Erbe hinterlasse, umfasst: [[inheritance_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Weitere Bestimmungen</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Unterschrift</h2>
                                <p>Dieses Testament wurde eigenhändig verfasst und unterschrieben.</p>
                                <br/>
                                <p>___________________</p>
                                <p>(Eigenhändige Unterschrift des Erblassers)</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">[[testator_full_name]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- Ходатайство об отложении судебного заседания / Motion for Adjournment of Court Hearing ---
            [
                'slug' => 'motion-adjournment-court-hearing-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"motion_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia wniosku","en":"Motion Date","uk":"Дата складання клопотання","de":"Datum des Antrags"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa Sądu","en":"Court Name","uk":"Назва Суду","de":"Name des Gerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres Sądu","en":"Court Address","uk":"Адреса Суду","de":"Adresse des Gerichts"}},
                    {"name":"case_number","type":"text","required":true,"labels":{"pl":"Sygnatura akt sprawy","en":"Case File Number","uk":"Номер справи","de":"Aktenzeichen"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Powoda","en":"Claimant\'s Full Name","uk":"ПІБ Позивача","de":"Vollständiger Name des Klägers"}},
                    {"name":"defendant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Pozwanego","en":"Defendant\'s Full Name","uk":"ПІБ Відповідача","de":"Vollständiger Name des Beklagten"}},
                    {"name":"hearing_date","type":"date","required":true,"labels":{"pl":"Data planowanej rozprawy","en":"Planned Hearing Date","uk":"Дата запланованого засідання","de":"Datum der geplanten Verhandlung"}},
                    {"name":"reason_for_adjournment","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku o odroczenie","en":"Reason for adjournment request","uk":"Обґрунтування клопотання про відкладення","de":"Begründung des Vertagungsantrags"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. zwolnienie lekarskie, wezwanie)","en":"Attachments (e.g., medical certificate, summons)","uk":"Додатки (напр., лікарняний лист, повістка)","de":"Anhänge (z.B. ärztliches Attest, Vorladung)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o odroczenie rozprawy',
                        'description' => 'Wzór wniosku o odroczenie terminu rozprawy sądowej z podaniem uzasadnienia.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WNIOSEK O ODROCZENIE ROZPRAWY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[motion_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Sygnatura akt sprawy:</strong> [[case_number]]</p>
                                <p><strong>Powód:</strong> [[claimant_full_name]]</p>
                                <p><strong>Pozwany:</strong> [[defendant_full_name]]</p>
                                <br/>
                                <p>Zwracam się z uprzejmą prośbą o odroczenie terminu rozprawy wyznaczonej na dzień <strong>[[hearing_date]]</strong> w sprawie o sygn. akt [[case_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">UZASADNIENIE</h2>
                                <p>[[reason_for_adjournment]]</p>
                                <br/>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Motion for Adjournment of Court Hearing',
                        'description' => 'A template for a motion to adjourn a court hearing with justification.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MOTION FOR ADJOURNMENT OF COURT HEARING</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[motion_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Case File Number:</strong> [[case_number]]</p>
                                <p><strong>Claimant:</strong> [[claimant_full_name]]</p>
                                <p><strong>Defendant:</strong> [[defendant_full_name]]</p>
                                <br/>
                                <p>I hereby kindly request the adjournment of the hearing scheduled for <strong>[[hearing_date]]</strong> in case file no. [[case_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">JUSTIFICATION</h2>
                                <p>[[reason_for_adjournment]]</p>
                                <br/>
                                <p>Enclosed please find: [[attachments]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Клопотання про відкладення судового засідання',
                        'description' => 'Зразок клопотання про відкладення терміну судового засідання із зазначенням обґрунтування.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КЛОПОТАННЯ ПРО ВІДКЛАДЕННЯ СУДОВОГО ЗАСІДАННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Номер справи:</strong> [[case_number]]</p>
                                <p><strong>Позивач:</strong> [[claimant_full_name]]</p>
                                <p><strong>Відповідач:</strong> [[defendant_full_name]]</p>
                                <br/>
                                <p>Звертаюся з покірним проханням про відкладення терміну засідання, призначеного на <strong>[[hearing_date]]</strong> у справі за номером [[case_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОБҐРУНТУВАННЯ</h2>
                                <p>[[reason_for_adjournment]]</p>
                                <br/>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Vertagung der Gerichtsverhandlung',
                        'description' => 'Vorlage für einen Antrag auf Vertagung eines Gerichtstermins mit Begründung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF VERTAGUNG DER GERICHTSVERHANDLUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[motion_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Aktenzeichen:</strong> [[case_number]]</p>
                                <p><strong>Kläger:</strong> [[claimant_full_name]]</p>
                                <p><strong>Beklagter:</strong> [[defendant_full_name]]</p>
                                <br/>
                                <p>Hiermit beantrage ich höflich die Vertagung des für den <strong>[[hearing_date]]</strong> angesetzten Termins in der Sache mit dem Aktenzeichen [[case_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BEGRÜNDUNG</h2>
                                <p>[[reason_for_adjournment]]</p>
                                <br/>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Ходатайство о приобщении документов к делу / Motion for Attachment of Documents to the Case ---
            [
                'slug' => 'motion-attachment-documents-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"motion_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia wniosku","en":"Motion Date","uk":"Дата складання клопотання","de":"Datum des Antrags"}},
                    {"name":"court_name","type":"text","required":true,"labels":{"pl":"Nazwa Sądu","en":"Court Name","uk":"Назва Суду","de":"Name des Gerichts"}},
                    {"name":"court_address","type":"text","required":true,"labels":{"pl":"Adres Sądu","en":"Court Address","uk":"Адреса Суду","de":"Adresse des Gerichts"}},
                    {"name":"case_number","type":"text","required":true,"labels":{"pl":"Sygnatura akt sprawy","en":"Case File Number","uk":"Номер справи","de":"Aktenzeichen"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Powoda","en":"Claimant\'s Full Name","uk":"ПІБ Позивача","de":"Vollständiger Name des Klägers"}},
                    {"name":"defendant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Pozwanego","en":"Defendant\'s Full Name","uk":"ПІБ Відповідача","de":"Vollständiger Name des Beklagten"}},
                    {"name":"documents_to_attach","type":"textarea","required":true,"labels":{"pl":"Lista dokumentów do załączenia (nazwa, data, liczba stron)","en":"List of documents to attach (name, date, number of pages)","uk":"Список документів для долучення (назва, дата, кількість сторінок)","de":"Liste der anzuhängenden Dokumente (Name, Datum, Seitenzahl)"}},
                    {"name":"reason_for_attachment","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku o przyłączenie dokumentów","en":"Reason for motion to attach documents","uk":"Обґрунтування клопотання про долучення документів","de":"Begründung des Antrags auf Beifügung von Dokumenten"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o dopuszczenie dowodów z dokumentów',
                        'description' => 'Wzór wniosku o przyłączenie dodatkowych dokumentów jako dowodów w sprawie sądowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WNIOSEK O DOPUSZCZENIE DOWODÓW Z DOKUMENTÓW</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[motion_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Sygnatura akt sprawy:</strong> [[case_number]]</p>
                                <p><strong>Powód:</strong> [[claimant_full_name]]</p>
                                <p><strong>Pozwany:</strong> [[defendant_full_name]]</p>
                                <br/>
                                <p>Zwracam się z uprzejmą prośbą o dopuszczenie i przeprowadzenie dowodu z niżej wymienionych dokumentów:</p>
                                <pre>[[documents_to_attach]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">UZASADNIENIE</h2>
                                <p>[[reason_for_attachment]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Motion for Attachment of Documents to the Case',
                        'description' => 'A template for a motion to attach additional documents as evidence in a court case.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MOTION FOR ATTACHMENT OF DOCUMENTS TO THE CASE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[motion_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Case File Number:</strong> [[case_number]]</p>
                                <p><strong>Claimant:</strong> [[claimant_full_name]]</p>
                                <p><strong>Defendant:</strong> [[defendant_full_name]]</p>
                                <br/>
                                <p>I hereby kindly request the admission and conduct of evidence from the following documents:</p>
                                <pre>[[documents_to_attach]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">JUSTIFICATION</h2>
                                <p>[[reason_for_attachment]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Клопотання про долучення документів до справи',
                        'description' => 'Зразок клопотання про долучення додаткових документів як доказів у судовій справі.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КЛОПОТАННЯ ПРО ДОЛУЧЕННЯ ДОКУМЕНТІВ ДО СПРАВИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Номер справи:</strong> [[case_number]]</p>
                                <p><strong>Позивач:</strong> [[claimant_full_name]]</p>
                                <p><strong>Відповідач:</strong> [[defendant_full_name]]</p>
                                <br/>
                                <p>Звертаюся з покірним проханням про долучення та проведення доказу з нижчезазначених документів:</p>
                                <pre>[[documents_to_attach]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОБҐРУНТУВАННЯ</h2>
                                <p>[[reason_for_attachment]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Beifügung von Dokumenten zur Akte',
                        'description' => 'Vorlage für einen Antrag auf Beifügung zusätzlicher Dokumente als Beweismittel in einem Gerichtsverfahren.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF BEIFÜGUNG VON DOKUMENTEN ZUR AKTE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[motion_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[court_name]]</strong><br>[[court_address]]</p>
                                <br/>
                                <p><strong>Aktenzeichen:</strong> [[case_number]]</p>
                                <p><strong>Kläger:</strong> [[claimant_full_name]]</p>
                                <p><strong>Beklagter:</strong> [[defendant_full_name]]</p>
                                <br/>
                                <p>Hiermit beantrage ich höflich die Zulassung und Durchführung des Beweises aus den unten aufgeführten Dokumenten:</p>
                                <pre>[[documents_to_attach]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BEGRÜNDUNG</h2>
                                <p>[[reason_for_attachment]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Апелляционная жалоба (структура) / Appeal (Structure) ---
            [
                'slug' => 'appeal-structure-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"appeal_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia apelacji","en":"Appeal Date","uk":"Дата складання апеляції","de":"Datum der Berufung"}},
                    {"name":"court_of_appeal_name","type":"text","required":true,"labels":{"pl":"Nazwa Sądu Apelacyjnego","en":"Court of Appeal Name","uk":"Назва Апеляційного Суду","de":"Name des Berufungsgerichts"}},
                    {"name":"court_of_appeal_address","type":"text","required":true,"labels":{"pl":"Adres Sądu Apelacyjnego","en":"Court of Appeal Address","uk":"Адреса Апеляційного Суду","de":"Adresse des Berufungsgerichts"}},
                    {"name":"court_of_first_instance_name","type":"text","required":true,"labels":{"pl":"Nazwa Sądu I instancji","en":"Court of First Instance Name","uk":"Назва Суду І інстанції","de":"Name des Gerichts erster Instanz"}},
                    {"name":"case_number","type":"text","required":true,"labels":{"pl":"Sygnatura akt sprawy","en":"Case File Number","uk":"Номер справи","de":"Aktenzeichen"}},
                    {"name":"appellant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Apelującego","en":"Appellant\'s Full Name","uk":"ПІБ Апелянта","de":"Vollständiger Name des Berufungsklägers"}},
                    {"name":"appellant_address","type":"text","required":true,"labels":{"pl":"Adres Apelującego","en":"Appellant\'s Address","uk":"Адреса Апелянта","de":"Adresse des Berufungsklägers"}},
                    {"name":"judgment_date","type":"date","required":true,"labels":{"pl":"Data wydania zaskarżonego wyroku","en":"Date of Challenged Judgment","uk":"Дата винесення оскаржуваного рішення","de":"Datum des angefochtenen Urteils"}},
                    {"name":"judgment_court","type":"text","required":true,"labels":{"pl":"Sąd, który wydał wyrok","en":"Court that issued judgment","uk":"Суд, що виніс рішення","de":"Gericht, das das Urteil erlassen hat"}},
                    {"name":"grounds_for_appeal","type":"textarea","required":true,"labels":{"pl":"Zarzuty apelacyjne (naruszenie prawa materialnego/procesowego)","en":"Grounds for appeal (violation of substantive/procedural law)","uk":"Підстави для апеляції (порушення матеріального/процесуального права)","de":"Berufungsgründe (Verstoß gegen materielles/prozessuales Recht)"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"pl":"Wnioski apelacyjne (np. zmiana wyroku, uchylenie wyroku)","en":"Appeal demands (e.g., amendment of judgment, annulment of judgment)","uk":"Апеляційні вимоги (напр., зміна рішення, скасування рішення)","de":"Berufungsanträge (z.B. Änderung des Urteils, Aufhebung des Urteils)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (opcjonalnie)","en":"Attachments (optional)","uk":"Додатки (необов\'язково)","de":"Anhänge (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Apelacja (struktura)',
                        'description' => 'Ogólny wzór apelacji od wyroku sądu pierwszej instancji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>Apelujący:</strong><br>[[appellant_full_name]]<br>[[appellant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[court_of_appeal_name]]</strong><br>[[court_of_appeal_address]]</p>
                                <br/><br/>
                                <p>Za pośrednictwem:<br><strong>[[court_of_first_instance_name]]</strong><br>[[court_of_first_instance_address]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">APELACJA</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Sygnatura akt sprawy:</strong> [[case_number]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym zaskarżam wyrok [[judgment_court]] z dnia <strong>[[judgment_date]]</strong>, sygn. akt [[case_number]], w całości/w części (wskazać zakres).</p>
                                <p>Wnoszę o: [[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ZARZUTY APELACYJNE</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">UZASADNIENIE</h2>
                                <p>Wskazać, dlaczego zarzuty są zasadne i dlaczego wyrok jest błędny.</p>
                                <br/>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[appellant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Appeal (Structure)',
                        'description' => 'A general template for an appeal against a judgment of the court of first instance.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPEAL</h1><p style="font-size: 14px;"><strong>Case File Number:</strong> [[case_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Appellant:</strong><br>[[appellant_full_name]]<br>[[appellant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[court_of_appeal_name]]</strong><br>[[court_of_appeal_address]]</p>
                                <br/>
                                <p>Via:<br><strong>[[court_of_first_instance_name]]</strong><br>[[court_of_first_instance_address]]</p>
                                <br/>
                                <p>I hereby appeal against the judgment of [[judgment_court]] dated <strong>[[judgment_date]]</strong>, case file no. [[case_number]], in its entirety/in part (specify scope).</p>
                                <p>I request: [[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">GROUNDS FOR APPEAL</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">JUSTIFICATION</h2>
                                <p>State why the grounds are justified and why the judgment is erroneous.</p>
                                <br/>
                                <p>Enclosed please find: [[attachments]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[appellant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Апеляційна скарга (структура)',
                        'description' => 'Загальний зразок апеляційної скарги на рішення суду першої інстанції.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">АПЕЛЯЦІЙНА СКАРГА</h1><p style="font-size: 14px;"><strong>Номер справи:</strong> [[case_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Апелянт:</strong><br>[[appellant_full_name]]<br>[[appellant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[court_of_appeal_name]]</strong><br>[[court_of_appeal_address]]</p>
                                <br/>
                                <p>Через:<br><strong>[[court_of_first_instance_name]]</strong><br>[[court_of_first_instance_address]]</p>
                                <br/>
                                <p>Цим оскаржую рішення [[judgment_court]] від <strong>[[judgment_date]]</strong>, справа № [[case_number]], повністю/частково (вказати обсяг).</p>
                                <p>Прошу: [[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">АПЕЛЯЦІЙНІ ПІДСТАВИ</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОБҐРУНТУВАННЯ</h2>
                                <p>Вказати, чому підстави є обґрунтованими та чому рішення є помилковим.</p>
                                <br/>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[appellant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Berufung (Struktur)',
                        'description' => 'Eine allgemeine Vorlage für eine Berufung gegen ein Urteil des Gerichts erster Instanz.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">BERUFUNG</h1><p style="font-size: 14px;"><strong>Aktenzeichen:</strong> [[case_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Berufungskläger:</strong><br>[[appellant_full_name]]<br>[[appellant_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[court_of_appeal_name]]</strong><br>[[court_of_appeal_address]]</p>
                                <br/>
                                <p>Über:<br><strong>[[court_of_first_instance_name]]</strong><br>[[court_of_first_instance_address]]</p>
                                <br/>
                                <p>Hiermit fechte ich das Urteil des [[judgment_court]] vom <strong>[[judgment_date]]</strong>, Az. [[case_number]], ganz/teilweise (Umfang angeben) an.</p>
                                <p>Ich beantrage: [[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BERUFUNGSGRÜNDE</h2>
                                <p>[[grounds_for_appeal]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BEGRÜNDUNG</h2>
                                <p>Begründen Sie, warum die Einwände berechtigt sind und warum das Urteil fehlerhaft ist.</p>
                                <br/>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[appellant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Кассационная жалоба (структура) / Cassation Appeal (Structure) ---
            [
                'slug' => 'cassation-appeal-structure-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"appeal_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia skargi kasacyjnej","en":"Appeal Date","uk":"Дата складання касаційної скарги","de":"Datum der Kassationsbeschwerde"}},
                    {"name":"supreme_court_name","type":"text","required":true,"labels":{"pl":"Nazwa Sądu Najwyższego","en":"Supreme Court Name","uk":"Назва Верховного Суду","de":"Name des Obersten Gerichts"}},
                    {"name":"supreme_court_address","type":"text","required":true,"labels":{"pl":"Adres Sądu Najwyższego","en":"Supreme Court Address","uk":"Адреса Верховного Суду","de":"Adresse des Obersten Gerichts"}},
                    {"name":"court_of_second_instance_name","type":"text","required":true,"labels":{"pl":"Nazwa Sądu II instancji","en":"Court of Second Instance Name","uk":"Назва Суду ІІ інстанції","de":"Name des Gerichts zweiter Instanz"}},
                    {"name":"case_number","type":"text","required":true,"labels":{"pl":"Sygnatura akt sprawy","en":"Case File Number","uk":"Номер справи","de":"Aktenzeichen"}},
                    {"name":"appellant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wnoszącego skargę","en":"Appellant\'s Full Name","uk":"ПІБ Скаржника","de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"appellant_address","type":"text","required":true,"labels":{"pl":"Adres Wnoszącego skargę","en":"Appellant\'s Address","uk":"Адреса Скаржника","de":"Adresse des Beschwerdeführers"}},
                    {"name":"judgment_date","type":"date","required":true,"labels":{"pl":"Data wydania zaskarżonego wyroku/postanowienia","en":"Date of Challenged Judgment/Decision","uk":"Дата винесення оскаржуваного рішення/ухвали","de":"Datum des angefochtenen Urteils/Beschlusses"}},
                    {"name":"judgment_court","type":"text","required":true,"labels":{"pl":"Sąd, który wydał wyrok/postanowienie","en":"Court that issued judgment/decision","uk":"Суд, що виніс рішення/ухвалу","de":"Gericht, das das Urteil/den Beschluss erlassen hat"}},
                    {"name":"grounds_for_cassation","type":"textarea","required":true,"labels":{"pl":"Podstawy skargi kasacyjnej (naruszenie prawa materialnego/procesowego)","en":"Grounds for cassation appeal (violation of substantive/procedural law)","uk":"Підстави для касаційної скарги (порушення матеріального/процесуального права)","de":"Gründe für die Kassationsbeschwerde (Verstoß gegen materielles/prozessuales Recht)"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"pl":"Wnioski kasacyjne (np. uchylenie wyroku, przekazanie sprawy do ponownego rozpoznania)","en":"Cassation demands (e.g., annulment of judgment, remittal for re-examination)","uk":"Касаційні вимоги (напр., скасування рішення, передача справи на новий розгляд)","de":"Kassationsanträge (z.B. Aufhebung des Urteils, Zurückverweisung zur erneuten Verhandlung)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (opcjonalnie)","en":"Attachments (optional)","uk":"Додатки (необов\'язково)","de":"Anhänge (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Skarga kasacyjna (struktura)',
                        'description' => 'Ogólny wzór skargi kasacyjnej od prawomocnego wyroku sądu drugiej instancji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SKARGA KASACYJNA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Wnoszący skargę:</strong><br>[[appellant_full_name]]<br>[[appellant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[supreme_court_name]]</strong><br>[[supreme_court_address]]</p>
                                <br/>
                                <p>Za pośrednictwem:<br><strong>[[court_of_second_instance_name]]</strong><br>[[court_of_second_instance_address]]</p>
                                <br/>
                                <p>Niniejszym zaskarżam prawomocny wyrok/postanowienie [[judgment_court]] z dnia <strong>[[judgment_date]]</strong>, sygn. akt [[case_number]], w całości/w części (wskazać zakres).</p>
                                <p>Wnoszę o: [[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">PODSTAWY SKARGI KASACYJNEJ</h2>
                                <p>[[grounds_for_cassation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">UZASADNIENIE</h2>
                                <p>Wskazać, dlaczego podstawy są zasadne i dlaczego wyrok jest błędny.</p>
                                <br/>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[appellant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Cassation Appeal (Structure)',
                        'description' => 'A general template for a cassation appeal against a final judgment of the court of second instance.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CASSATION APPEAL</h1><p style="font-size: 14px;"><strong>Case File Number:</strong> [[case_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Appellant:</strong><br>[[appellant_full_name]]<br>[[appellant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[supreme_court_name]]</strong><br>[[supreme_court_address]]</p>
                                <br/>
                                <p>Via:<br><strong>[[court_of_second_instance_name]]</strong><br>[[court_of_second_instance_address]]</p>
                                <br/>
                                <p>I hereby appeal against the final judgment/decision of [[judgment_court]] dated <strong>[[judgment_date]]</strong>, case file no. [[case_number]], in its entirety/in part (specify scope).</p>
                                <p>I request: [[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">GROUNDS FOR CASSATION APPEAL</h2>
                                <p>[[grounds_for_cassation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">JUSTIFICATION</h2>
                                <p>State why the grounds are justified and why the judgment is erroneous.</p>
                                <br/>
                                <p>Enclosed please find: [[attachments]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[appellant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Касаційна скарга (структура)',
                        'description' => 'Загальний зразок касаційної скарги на остаточне рішення суду другої інстанції.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КАСАЦІЙНА СКАРГА</h1><p style="font-size: 14px;"><strong>Номер справи:</strong> [[case_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Скаржник:</strong><br>[[appellant_full_name]]<br>[[appellant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[supreme_court_name]]</strong><br>[[supreme_court_address]]</p>
                                <br/>
                                <p>Через:<br><strong>[[court_of_second_instance_name]]</strong><br>[[court_of_second_instance_address]]</p>
                                <br/>
                                <p>Цим оскаржую остаточне рішення/ухвалу [[judgment_court]] від <strong>[[judgment_date]]</strong>, справа № [[case_number]], повністю/частково (вказати обсяг).</p>
                                <p>Прошу: [[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПІДСТАВИ КАСАЦІЙНОЇ СКАРГИ</h2>
                                <p>[[grounds_for_cassation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОБҐРУНТУВАННЯ</h2>
                                <p>Вказати, чому підстави є обґрунтованими та чому рішення є помилковим.</p>
                                <br/>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[appellant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Kassationsbeschwerde (Struktur)',
                        'description' => 'Eine allgemeine Vorlage für eine Kassationsbeschwerde gegen ein rechtskräftiges Urteil des Gerichts zweiter Instanz.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KASSATIONSBESCHWERDE</h1><p style="font-size: 14px;"><strong>Aktenzeichen:</strong> [[case_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>Beschwerdeführer:</strong><br>[[appellant_full_name]]<br>[[appellant_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[supreme_court_name]]</strong><br>[[supreme_court_address]]</p>
                                <br/>
                                <p>Über:<br><strong>[[court_of_second_instance_name]]</strong><br>[[court_of_second_instance_address]]</p>
                                <br/>
                                <p>Hiermit fechte ich das rechtskräftige Urteil/den Beschluss des [[judgment_court]] vom <strong>[[judgment_date]]</strong>, Az. [[case_number]], ganz/teilweise (Umfang angeben) an.</p>
                                <p>Ich beantrage: [[demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">GRÜNDE FÜR DIE KASSATIONSBESCHWERDE</h2>
                                <p>[[grounds_for_cassation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BEGRÜNDUNG</h2>
                                <p>Begründen Sie, warum die Gründe berechtigt sind und warum das Urteil fehlerhaft ist.</p>
                                <br/>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[appellant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],
            // --- Жалоба в прокуратуру / Complaint to the Prosecutor's Office ---
            [
                'slug' => 'complaint-prosecutors-office-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"complainant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko skarżącego","en":"Complainant\'s Full Name","uk":"ПІБ скаржника","de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"pl":"Adres skarżącego","en":"Complainant\'s Address","uk":"Адреса скаржника","de":"Adresse des Beschwerdeführers"}},
                    {"name":"complainant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail skarżącego","en":"Complainant\'s Phone & Email","uk":"Телефон та e-mail скаржника","de":"Telefon und E-Mail des Beschwerdeführers"}},
                    {"name":"prosecutor_office_name","type":"text","required":true,"labels":{"pl":"Nazwa Prokuratury","en":"Prosecutor\'s Office Name","uk":"Назва Прокуратури","de":"Name der Staatsanwaltschaft"}},
                    {"name":"prosecutor_office_address","type":"text","required":true,"labels":{"pl":"Adres Prokuratury","en":"Prosecutor\'s Office Address","uk":"Адреса Прокуратури","de":"Adresse der Staatsanwaltschaft"}},
                    {"name":"complaint_subject","type":"text","required":true,"labels":{"pl":"Przedmiot skargi","en":"Subject of Complaint","uk":"Предмет скарги","de":"Gegenstand der Beschwerde"}},
                    {"name":"complaint_details","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis zdarzenia/problemu","en":"Detailed description of the event/problem","uk":"Детальний опис події/проблеми","de":"Detaillierte Beschreibung des Ereignisses/Problems"}},
                    {"name":"requested_action","type":"textarea","required":true,"labels":{"pl":"Żądane działania/rozstrzygnięcie","en":"Requested actions/resolution","uk":"Затребувані дії/вирішення","de":"Gewünschte Maßnahmen/Lösung"}},
                    {"name":"attachments","type":"text","required":false,"labels":{"pl":"Załączniki (np. dowody)","en":"Attachments (e.g., evidence)","uk":"Додатки (напр., докази)","de":"Anhänge (z.B. Beweismittel)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Skarga do Prokuratury',
                        'description' => 'Formalna skarga skierowana do Prokuratury w sprawie naruszenia prawa lub bezczynności organów.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[prosecutor_office_name]]</strong><br>[[prosecutor_office_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">SKARGA</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> [[complaint_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym składam skargę w sprawie [[complaint_subject]].</p>
                                <p>Szczegółowy opis zdarzenia/problemu:</p>
                                <p>[[complaint_details]]</p>
                                <p>W związku z powyższym, wnoszę o podjęcie następujących działań: [[requested_action]]</p>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <p>Proszę o pilne rozpatrzenie mojej skargi i podjęcie stosownych kroków prawnych.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Complaint to the Prosecutor\'s Office',
                        'description' => 'A formal complaint addressed to the Prosecutor\'s Office regarding a violation of law or inaction of authorities.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">COMPLAINT</h1><p style="font-size: 14px;"><strong>Subject:</strong> [[complaint_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[prosecutor_office_name]]</strong><br>[[prosecutor_office_address]]</p>
                                <br/>
                                <p>I hereby file a complaint regarding [[complaint_subject]].</p>
                                <p>Detailed description of the event/problem:</p>
                                <p>[[complaint_details]]</p>
                                <p>In connection with the above, I request the following actions/resolution: [[requested_action]]</p>
                                <p>Enclosed please find: [[attachments]].</p>
                                <p>Please promptly consider my complaint and take appropriate legal steps.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Скарга до Прокуратури',
                        'description' => 'Формальна скарга, адресована Прокуратурі щодо порушення закону або бездіяльності органів.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">СКАРГА</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[complaint_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[prosecutor_office_name]]</strong><br>[[prosecutor_office_address]]</p>
                                <br/>
                                <p>Цим подаю скаргу у справі [[complaint_subject]].</p>
                                <p>Детальний опис події/проблеми:</p>
                                <p>[[complaint_details]]</p>
                                <p>У зв\'язку з вищевикладеним, прошу вжити наступних дій/вирішення: [[requested_action]]</p>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <p>Прошу терміново розглянути мою скаргу та вжити відповідних правових кроків.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Beschwerde an die Staatsanwaltschaft',
                        'description' => 'Eine formelle Beschwerde an die Staatsanwaltschaft wegen einer Rechtsverletzung oder Untätigkeit von Behörden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">BESCHWERDE</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[complaint_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[prosecutor_office_name]]</strong><br>[[prosecutor_office_address]]</p>
                                <br/>
                                <p>Hiermit reiche ich Beschwerde ein bezüglich [[complaint_subject]].</p>
                                <p>Detaillierte Beschreibung des Ereignisses/Problems:</p>
                                <p>[[complaint_details]]</p>
                                <p>Im Zusammenhang damit fordere ich folgende Maßnahmen/Lösung: [[requested_action]]</p>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <p>Bitte bearbeiten Sie meine Beschwerde umgehend und leiten Sie entsprechende rechtliche Schritte ein.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Мировое соглашение / Settlement Agreement ---
            [
                'slug' => 'settlement-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia ugody","en":"Agreement Date","uk":"Дата укладення угоди","de":"Datum der Vereinbarung"}},
                    {"name":"party_one_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Strony 1","en":"Party 1 Full Name","uk":"ПІБ Сторони 1","de":"Vollständiger Name der Partei 1"}},
                    {"name":"party_one_address","type":"text","required":true,"labels":{"pl":"Adres Strony 1","en":"Party 1 Address","uk":"Адреса Сторони 1","de":"Adresse der Partei 1"}},
                    {"name":"party_one_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości Strony 1","en":"Party 1 ID Number","uk":"Номер посвідчення Сторони 1","de":"Ausweisnummer der Partei 1"}},
                    {"name":"party_two_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Strony 2","en":"Party 2 Full Name","uk":"ПІБ Сторони 2","de":"Vollständiger Name der Partei 2"}},
                    {"name":"party_two_address","type":"text","required":true,"labels":{"pl":"Adres Strony 2","en":"Party 2 Address","uk":"Адреса Сторони 2","de":"Adresse der Partei 2"}},
                    {"name":"party_two_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości Strony 2","en":"Party 2 ID Number","uk":"Номер посвідчення Сторони 2","de":"Ausweisnummer der Partei 2"}},
                    {"name":"subject_of_dispute","type":"textarea","required":true,"labels":{"pl":"Przedmiot sporu/rozbieżności","en":"Subject of dispute/discrepancy","uk":"Предмет спору/розбіжностей","de":"Gegenstand des Streits/der Meinungsverschiedenheit"}},
                    {"name":"settlement_terms","type":"textarea","required":true,"labels":{"pl":"Warunki ugody (szczegółowy opis)","en":"Terms of settlement (detailed description)","uk":"Умови мирової угоди (детальний опис)","de":"Bedingungen des Vergleichs (detaillierte Beschreibung)"}},
                    {"name":"payment_amount","type":"number","required":false,"labels":{"pl":"Kwota płatności (jeśli dotyczy)","en":"Payment amount (if applicable)","uk":"Сума платежу (якщо застосовно)","de":"Zahlungsbetrag (falls zutreffend)"}},
                    {"name":"currency","type":"text","required":false,"labels":{"pl":"Waluta (jeśli dotyczy)","en":"Currency (if applicable)","uk":"Валюта (якщо застосовно)","de":"Währung (falls zutreffend)"}},
                    {"name":"payment_date","type":"date","required":false,"labels":{"pl":"Data płatności (jeśli dotyczy)","en":"Payment date (if applicable)","uk":"Дата платежу (якщо застосовно)","de":"Zahlungsdatum (falls zutreffend)"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Ugoda pozasądowa',
                        'description' => 'Umowa zawierana między stronami w celu polubownego rozwiązania sporu, bez konieczności postępowania sądowego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UGODA POZASĄDOWA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Stroną 1:</strong> [[party_one_full_name]], zamieszkałym/ą w [[party_one_address]], legitymującym/ą się dowodem osobistym nr [[party_one_id_number]],</p>
                                <p>a</p>
                                <p><strong>Stroną 2:</strong> [[party_two_full_name]], zamieszkałym/ą w [[party_two_address]], legitymującym/ą się dowodem osobistym nr [[party_two_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot ugody</h2>
                                <p>Strony niniejszej ugody oświadczają, że istniał między nimi spór/rozbieżności dotyczące: [[subject_of_dispute]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Warunki ugody</h2>
                                <p>Strony zgodnie postanawiają rozwiązać spór na następujących warunkach:</p>
                                <p>[[settlement_terms]]</p>
                                <p>Kwota płatności: [[payment_amount]] [[currency]] (płatne do: [[payment_date]])</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Inne postanowienia</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Postanowienia końcowe</h2>
                                <p>Strony oświadczają, że z chwilą wykonania niniejszej ugody, wszelkie roszczenia wynikające z powyższego sporu wygasają. Ugoda została sporządzona w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Strona 1</p></td>
                                <td width="50%"><p>___________________<br>Strona 2</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Settlement Agreement',
                        'description' => 'An agreement concluded between parties to amicably resolve a dispute without the need for court proceedings.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SETTLEMENT AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Party 1:</strong> [[party_one_full_name]], residing in [[party_one_address]], holding ID number [[party_one_id_number]],</p>
                                <p>and</p>
                                <p><strong>Party 2:</strong> [[party_two_full_name]], residing in [[party_two_address]], holding ID number [[party_two_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of Settlement</h2>
                                <p>The parties to this settlement declare that there was a dispute/discrepancy between them regarding: [[subject_of_dispute]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Terms of Settlement</h2>
                                <p>The parties mutually agree to resolve the dispute on the following terms:</p>
                                <p>[[settlement_terms]]</p>
                                <p>Payment amount: [[payment_amount]] [[currency]] (payable by: [[payment_date]])</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Other Provisions</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Final Provisions</h2>
                                <p>The parties declare that upon execution of this settlement, all claims arising from the above dispute are extinguished. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Party 1</p></td>
                                <td width="50%"><p>___________________<br>Party 2</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Мирова угода',
                        'description' => 'Угода, що укладається між сторонами з метою мирного вирішення спору, без необхідності судового розгляду.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">МИРОВА УГОДА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Стороною 1:</strong> [[party_one_full_name]], що проживає за адресою [[party_one_address]], який/яка посвідчує особу за паспортом № [[party_one_id_number]],</p>
                                <p>та</p>
                                <p><strong>Стороною 2:</strong> [[party_two_full_name]], що проживає за адресою [[party_two_address]], який/яка посвідчує особу за паспортом № [[party_two_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет угоди</h2>
                                <p>Сторони цієї угоди заявляють, що між ними існував спір/розбіжності щодо: [[subject_of_dispute]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Умови угоди</h2>
                                <p>Сторони за взаємною згодою вирішують спір на наступних умовах:</p>
                                <p>[[settlement_terms]]</p>
                                <p>Сума платежу: [[payment_amount]] [[currency]] (сплатити до: [[payment_date]])</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Інші положення</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Прикінцеві положення</h2>
                                <p>Сторони заявляють, що з моменту виконання цієї угоди всі претензії, що виникли з вищезгаданого спору, припиняються. Угода складена у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Сторона 1</p></td>
                                <td width="50%"><p>___________________<br>Сторона 2</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Vergleichsvereinbarung',
                        'description' => 'Eine Vereinbarung zwischen Parteien zur gütlichen Beilegung eines Streits, ohne dass ein Gerichtsverfahren erforderlich ist.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERGLEICHSVEREINBARUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Partei 1:</strong> [[party_one_full_name]], wohnhaft in [[party_one_address]], Ausweis-Nr. [[party_one_id_number]],</p>
                                <p>und</p>
                                <p><strong>Partei 2:</strong> [[party_two_full_name]], wohnhaft in [[party_two_address]], Ausweis-Nr. [[party_two_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Gegenstand des Vergleichs</h2>
                                <p>Die Parteien dieser Vereinbarung erklären, dass zwischen ihnen ein Streit/Meinungsverschiedenheiten bezüglich: [[subject_of_dispute]] bestand.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Vergleichsbedingungen</h2>
                                <p>Die Parteien vereinbaren einvernehmlich, den Streit zu folgenden Bedingungen beizulegen:</p>
                                <p>[[settlement_terms]]</p>
                                <p>Zahlungsbetrag: [[payment_amount]] [[currency]] (zahlbar bis: [[payment_date]])</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Weitere Bestimmungen</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Schlussbestimmungen</h2>
                                <p>Die Parteien erklären, dass mit der Erfüllung dieser Vereinbarung alle Ansprüche aus dem oben genannten Streit erlöschen. Die Vereinbarung wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Partei 1</p></td>
                                <td width="50%"><p>___________________<br>Partei 2</p></td>
                                </tr></table></div>'
                    ]
                ]
            ]

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
                'country_code' => $data['country_code'] ?? 'PL',
                'fields' => json_decode($data['fields'], true),
            ]
        );

        if (isset($data['translations']) && is_array($data['translations'])) {
            foreach ($data['translations'] as $locale => $transData) {
                // Ensure all languages have HTML content by falling back to Polish version if empty
                $transData['header_html'] = $transData['header_html'] ?? ($data['translations']['pl']['header_html'] ?? '');
                $transData['body_html'] = $transData['body_html'] ?? ($data['translations']['pl']['body_html'] ?? '');
                $transData['footer_html'] = $transData['footer_html'] ?? ($data['translations']['pl']['footer_html'] ?? '');

                $template->translations()->updateOrCreate(['locale' => $locale], $transData);
            }
        }
    }
}
