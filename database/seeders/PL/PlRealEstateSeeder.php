<?php

namespace Database\Seeders\PL;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class PlRealEstateSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'housing-issues-pl')->first();
        if (!$category) {
            $this->command->error('Category with slug "housing-issues-pl" not found.');
            return;
        }

        // Определяем данные для шаблонов документов в новой категории.
        $templatesData = [
            // --- Договор аренды квартиры (долгосрочный) / Long-term Apartment Lease Agreement ---
            [
                'slug' => 'long-term-apartment-lease-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres Wynajmującego","en":"Landlord\'s Address","uk":"Адреса Орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"landlord_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości Wynajmującego","en":"Landlord\'s ID Number","uk":"Номер посвідчення Орендодавця","de":"Ausweisnummer des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres Najemcy","en":"Tenant\'s Address","uk":"Адреса Орендаря","de":"Adresse des Mieters"}},
                    {"name":"tenant_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości Najemcy","en":"Tenant\'s ID Number","uk":"Номер посвідчення Орендаря","de":"Ausweisnummer des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"property_description","type":"textarea","required":true,"labels":{"pl":"Opis przedmiotu najmu (powierzchnia, liczba pokoi, piętro)","en":"Description of leased property (area, number of rooms, floor)","uk":"Опис предмета оренди (площа, кількість кімнат, поверх)","de":"Beschreibung des Mietobjekts (Fläche, Zimmeranzahl, Etage)"}},
                    {"name":"lease_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Lease Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"lease_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu (jeśli na czas określony)","en":"Lease End Date (if fixed-term)","uk":"Дата закінчення оренди (якщо на визначений термін)","de":"Mietende (falls befristet)"}},
                    {"name":"lease_term_months","type":"number","required":false,"labels":{"pl":"Okres najmu w miesiącach (jeśli na czas określony)","en":"Lease term in months (if fixed-term)","uk":"Термін оренди в місяцях (якщо на визначений термін)","de":"Mietdauer in Monaten (falls befristet)"}},
                    {"name":"rent_amount","type":"number","required":true,"labels":{"pl":"Czynsz miesięczny","en":"Monthly Rent","uk":"Місячна орендна плата","de":"Monatsmiete"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"additional_fees","type":"textarea","required":false,"labels":{"pl":"Dodatkowe opłaty (np. media, czynsz administracyjny)","en":"Additional fees (e.g., utilities, administrative rent)","uk":"Додаткові платежі (напр., комунальні послуги, адміністративна орендна плата)","de":"Zusätzliche Gebühren (z.B. Nebenkosten, Verwaltungsmiete)"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji","en":"Deposit Amount","uk":"Сума застави","de":"Kautionsbetrag"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"pl":"Dzień miesiąca płatności (np. 10. dzień)","en":"Day of the month for payment (e.g., 10th day)","uk":"День місяця оплати (напр., 10-й день)","de":"Zahlungstag im Monat (z.B. 10. Tag)"}},
                    {"name":"bank_account_number","type":"text","required":true,"labels":{"pl":"Numer konta bankowego Wynajmującego","en":"Landlord\'s Bank Account Number","uk":"Номер банківського рахунку Орендодавця","de":"Bankkontonummer des Vermieters"}},
                    {"name":"termination_notice_period","type":"text","required":true,"labels":{"pl":"Okres wypowiedzenia (np. 3 miesiące)","en":"Termination Notice Period (e.g., 3 months)","uk":"Термін розірвання (напр., 3 місяці)","de":"Kündigungsfrist (z.B. 3 Monate)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa najmu mieszkania (długoterminowa)',
                        'description' => 'Standardowa umowa najmu mieszkania na czas nieokreślony lub określony, zgodna z polskim prawem.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU MIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Wynajmującym:</strong> [[landlord_full_name]], zamieszkałym/ą w [[landlord_address]], legitymującym/ą się dowodem osobistym nr [[landlord_id_number]],</p>
                                <p>a</p>
                                <p><strong>Najemcą:</strong> [[tenant_full_name]], zamieszkałym/ą w [[tenant_address]], legitymującym/ą się dowodem osobistym nr [[tenant_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot najmu</h2>
                                <p>1. Wynajmujący oświadcza, że jest właścicielem/posiada prawo do dysponowania nieruchomością położoną pod adresem: <strong>[[property_address]]</strong>.</p>
                                <p>2. Przedmiotem najmu jest [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Okres najmu</h2>
                                <p>1. Umowa zostaje zawarta na czas [[lease_term_months]] od dnia <strong>[[lease_start_date]]</strong> do dnia <strong>[[lease_end_date]]</strong>.</p>
                                <p>2. Po upływie okresu wskazanego w ust. 1, umowa przekształca się w umowę na czas nieokreślony, chyba że strony postanowią inaczej.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Czynsz i opłaty</h2>
                                <p>1. Najemca zobowiązuje się płacić czynsz w wysokości <strong>[[rent_amount]] [[currency]]</strong> miesięcznie.</p>
                                <p>2. Dodatkowe opłaty: [[additional_fees]].</p>
                                <p>3. Płatności będą dokonywane do [[payment_due_day]]. dnia każdego miesiąca na konto bankowe Wynajmującego: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Kaucja</h2>
                                <p>Najemca wpłaca kaucję w wysokości <strong>[[deposit_amount]] [[currency]]</strong>, która zostanie zwrócona po zakończeniu najmu, po potrąceniu ewentualnych należności.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Wypowiedzenie umowy</h2>
                                <p>Każda ze stron może wypowiedzieć niniejszą umowę z zachowaniem [[termination_notice_period]] okresu wypowiedzenia.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego oraz Ustawy o ochronie praw lokatorów, mieszkaniowym zasobie gminy i o zmianie Kodeksu cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Long-term Apartment Lease Agreement',
                        'description' => 'Standard long-term apartment lease agreement for a definite or indefinite period, compliant with Polish law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Landlord:</strong> [[landlord_full_name]], residing at [[landlord_address]], holding ID card no. [[landlord_id_number]],</p>
                                <p>and</p>
                                <p><strong>Tenant:</strong> [[tenant_full_name]], residing at [[tenant_address]], holding ID card no. [[tenant_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of Lease</h2>
                                <p>1. The Landlord declares that they are the owner/have the right to dispose of the property located at: <strong>[[property_address]]</strong>.</p>
                                <p>2. The subject of the lease is [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Lease Term</h2>
                                <p>1. The agreement is concluded for a period of [[lease_term_months]] from <strong>[[lease_start_date]]</strong> to <strong>[[lease_end_date]]</strong>.</p>
                                <p>2. After the period indicated in paragraph 1, the agreement transforms into an indefinite-term agreement, unless the parties agree otherwise.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Rent and Fees</h2>
                                <p>1. The Tenant undertakes to pay rent in the amount of <strong>[[rent_amount]] [[currency]]</strong> per month.</p>
                                <p>2. Additional fees: [[additional_fees]].</p>
                                <p>3. Payments shall be made by the [[payment_due_day]]. day of each month to the Landlord\'s bank account: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Deposit</h2>
                                <p>The Tenant shall pay a deposit of <strong>[[deposit_amount]] [[currency]]</strong>, which shall be returned upon termination of the lease, after deduction of any outstanding amounts.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Termination of Agreement</h2>
                                <p>Either party may terminate this agreement with a [[termination_notice_period]] notice period.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code and the Act on the protection of tenants\' rights, municipal housing resources and amendment of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди квартири (довгостроковий)',
                        'description' => 'Стандартний договір оренди квартири на невизначений або визначений термін, що відповідає польському законодавству.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Орендодавцем:</strong> [[landlord_full_name]], який/яка проживає за адресою [[landlord_address]], що посвідчує особу за паспортом № [[landlord_id_number]],</p>
                                <p>та</p>
                                <p><strong>Орендарем:</strong> [[tenant_full_name]], який/яка проживає за адресою [[tenant_address]], що посвідчує особу за паспортом № [[tenant_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет оренди</h2>
                                <p>1. Орендодавець заявляє, що є власником/має право розпоряджатися нерухомістю, розташованою за адресою: <strong>[[property_address]]</strong>.</p>
                                <p>2. Предметом оренди є [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Термін оренди</h2>
                                <p>1. Договір укладається на термін [[lease_term_months]] з <strong>[[lease_start_date]]</strong> до <strong>[[lease_end_date]]</strong>.</p>
                                <p>2. Після закінчення терміну, зазначеного в п. 1, договір перетворюється на безстроковий, якщо сторони не домовляться інакше.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Орендна плата та платежі</h2>
                                <p>1. Орендар зобов\'язується сплачувати орендну плату у розмірі <strong>[[rent_amount]] [[currency]]</strong> щомісячно.</p>
                                <p>2. Додаткові платежі: [[additional_fees]].</p>
                                <p>3. Платежі здійснюватимуться до [[payment_due_day]]. числа кожного місяця на банківський рахунок Орендодавця: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Застава</h2>
                                <p>Орендар вносить заставу у розмірі <strong>[[deposit_amount]] [[currency]]</strong>, яка буде повернута після закінчення оренди, після вирахування можливих заборгованостей.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Розірвання договору</h2>
                                <p>Кожна зі сторін може розірвати цей договір з дотриманням [[termination_notice_period]] терміну повідомлення.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу та Закону про захист прав орендарів, житловий фонд гміни та про зміну Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Langfristiger Mietvertrag für eine Wohnung',
                        'description' => 'Standard-Mietvertrag für eine Wohnung auf unbestimmte oder bestimmte Zeit, gemäß polnischem Recht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHNUNGSMIETVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Vermieter:</strong> [[landlord_full_name]], wohnhaft in [[landlord_address]], Ausweis-Nr. [[landlord_id_number]],</p>
                                <p>und</p>
                                <p><strong>Mieter:</strong> [[tenant_full_name]], wohnhaft in [[tenant_address]], Ausweis-Nr. [[tenant_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Mietgegenstand</h2>
                                <p>1. Der Vermieter erklärt, Eigentümer der Immobilie zu sein/das Recht zu haben, über die Immobilie zu verfügen, die sich unter der Adresse befindet: <strong>[[property_address]]</strong>.</p>
                                <p>2. Mietgegenstand ist [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Mietdauer</h2>
                                <p>1. Der Vertrag wird für die Dauer von [[lease_term_months]] ab dem <strong>[[lease_start_date]]</strong> bis zum <strong>[[lease_end_date]]</strong> geschlossen.</p>
                                <p>2. Nach Ablauf des in Abs. 1 genannten Zeitraums wandelt sich der Vertrag in einen unbefristeten Vertrag um, es sei denn, die Parteien vereinbaren etwas anderes.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Miete und Gebühren</h2>
                                <p>1. Der Mieter verpflichtet sich, eine Miete in Höhe von <strong>[[rent_amount]] [[currency]]</strong> monatlich zu zahlen.</p>
                                <p>2. Zusätzliche Gebühren: [[additional_fees]].</p>
                                <p>3. Zahlungen sind bis zum [[payment_due_day]]. Tag jedes Monats auf das Bankkonto des Vermieters: [[bank_account_number]] zu leisten.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Kaution</h2>
                                <p>Der Mieter zahlt eine Kaution in Höhe von <strong>[[deposit_amount]] [[currency]]</strong>, die nach Beendigung des Mietverhältnisses nach Abzug etwaiger Forderungen zurückerstattet wird.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Kündigung des Vertrages</h2>
                                <p>Jede Partei kann diesen Vertrag unter Einhaltung einer Kündigungsfrist von [[termination_notice_period]] kündigen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches und des Gesetzes über den Schutz der Mieterrechte, den kommunalen Wohnungsbestand und die Änderung des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор посуточной аренды квартиры / Daily Apartment Rental Agreement ---
            [
                'slug' => 'daily-apartment-rental-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres Wynajmującego","en":"Landlord\'s Address","uk":"Адреса Орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres Najemcy","en":"Tenant\'s Address","uk":"Адреса Орендаря","de":"Adresse des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"check_in_date","type":"date","required":true,"labels":{"pl":"Data zameldowania","en":"Check-in Date","uk":"Дата заїзду","de":"Check-in-Datum"}},
                    {"name":"check_out_date","type":"date","required":true,"labels":{"pl":"Data wymeldowania","en":"Check-out Date","uk":"Дата виїзду","de":"Check-out-Datum"}},
                    {"name":"number_of_nights","type":"number","required":true,"labels":{"pl":"Liczba nocy","en":"Number of Nights","uk":"Кількість ночей","de":"Anzahl der Nächte"}},
                    {"name":"daily_rent_amount","type":"number","required":true,"labels":{"pl":"Czynsz za dobę","en":"Daily Rent Amount","uk":"Добова орендна плата","de":"Tagesmiete"}},
                    {"name":"total_rent_amount","type":"number","required":true,"labels":{"pl":"Całkowity czynsz","en":"Total Rent Amount","uk":"Загальна орендна плата","de":"Gesamtmiete"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"deposit_amount","type":"number","required":false,"labels":{"pl":"Wysokość kaucji (opcjonalnie)","en":"Deposit Amount (optional)","uk":"Сума застави (необов\'язково)","de":"Kautionsbetrag (optional)"}},
                    {"name":"rules_of_stay","type":"textarea","required":false,"labels":{"pl":"Zasady pobytu (np. cisza nocna, zakaz palenia)","en":"Rules of stay (e.g., quiet hours, no smoking)","uk":"Правила проживання (напр., тиха година, заборона куріння)","de":"Hausordnung (z.B. Nachtruhe, Rauchverbot)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa najmu krótkoterminowego (apartament/pokój)',
                        'description' => 'Umowa najmu nieruchomości na krótki okres (np. doby, tygodnie).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU KRÓTKOTERMINOWEGO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Wynajmującym:</strong> [[landlord_full_name]], zamieszkałym/ą w [[landlord_address]],</p>
                                <p>a</p>
                                <p><strong>Najemcą:</strong> [[tenant_full_name]], zamieszkałym/ą w [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot najmu</h2>
                                <p>Przedmiotem najmu jest nieruchomość położona pod adresem: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Okres najmu</h2>
                                <p>Najem rozpoczyna się dnia <strong>[[check_in_date]]</strong> i kończy dnia <strong>[[check_out_date]]</strong> (tj. [[number_of_nights]] nocy).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Czynsz i opłaty</h2>
                                <p>1. Czynsz za dobę wynosi: <strong>[[daily_rent_amount]] [[currency]]</strong>.</p>
                                <p>2. Całkowity czynsz za okres najmu wynosi: <strong>[[total_rent_amount]] [[currency]]</strong>.</p>
                                <p>3. Kaucja: [[deposit_amount]] [[currency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Zasady pobytu</h2>
                                <p>[[rules_of_stay]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Daily Apartment Rental Agreement',
                        'description' => 'Lease agreement for a property for a short period (e.g., days, weeks).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DAILY RENTAL AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Landlord:</strong> [[landlord_full_name]], residing at [[landlord_address]],</p>
                                <p>and</p>
                                <p><strong>Tenant:</strong> [[tenant_full_name]], residing at [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of Lease</h2>
                                <p>The subject of the lease is the property located at: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Lease Term</h2>
                                <p>The lease begins on <strong>[[check_in_date]]</strong> and ends on <strong>[[check_out_date]]</strong> (i.e., [[number_of_nights]] nights).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Rent and Fees</h2>
                                <p>1. The daily rent is: <strong>[[daily_rent_amount]] [[currency]]</strong>.</p>
                                <p>2. The total rent for the lease period is: <strong>[[total_rent_amount]] [[currency]]</strong>.</p>
                                <p>3. Deposit: [[deposit_amount]] [[currency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Rules of Stay</h2>
                                <p>[[rules_of_stay]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір подобової оренди квартири',
                        'description' => 'Договір оренди нерухомості на короткий термін (напр., доби, тижні).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ПОДОБОВОЇ ОРЕНДИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Орендодавцем:</strong> [[landlord_full_name]], який/яка проживає за адресою [[landlord_address]],</p>
                                <p>та</p>
                                <p><strong>Орендарем:</strong> [[tenant_full_name]], який/яка проживає за адресою [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет оренди</h2>
                                <p>Предметом оренди є нерухомість, розташована за адресою: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Термін оренди</h2>
                                <p>Оренда розпочинається <strong>[[check_in_date]]</strong> і закінчується <strong>[[check_out_date]]</strong> (тобто [[number_of_nights]] ночей).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Орендна плата та платежі</h2>
                                <p>1. Орендна плата за добу становить: <strong>[[daily_rent_amount]] [[currency]]</strong>.</p>
                                <p>2. Загальна орендна плата за період оренди становить: <strong>[[total_rent_amount]] [[currency]]</strong>.</p>
                                <p>3. Застава: [[deposit_amount]] [[currency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Правила проживання</h2>
                                <p>[[rules_of_stay]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Täglicher Mietvertrag für eine Wohnung',
                        'description' => 'Mietvertrag für eine Immobilie für einen kurzen Zeitraum (z.B. Tage, Wochen).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TÄGLICHER MIETVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Vermieter:</strong> [[landlord_full_name]], wohnhaft in [[landlord_address]],</p>
                                <p>und</p>
                                <p><strong>Mieter:</strong> [[tenant_full_name]], wohnhaft in [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Mietgegenstand</h2>
                                <p>Mietgegenstand ist die Immobilie unter der Adresse: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Mietdauer</h2>
                                <p>Die Miete beginnt am <strong>[[check_in_date]]</strong> und endet am <strong>[[check_out_date]]</strong> (d.h. [[number_of_nights]] Nächte).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Miete und Gebühren</h2>
                                <p>1. Die Tagesmiete beträgt: <strong>[[daily_rent_amount]] [[currency]]</strong>.</p>
                                <p>2. Die Gesamtmiete für die Mietdauer beträgt: <strong>[[total_rent_amount]] [[currency]]</strong>.</p>
                                <p>3. Kaution: [[deposit_amount]] [[currency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Hausordnung</h2>
                                <p>[[rules_of_stay]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор аренды комнаты / Room Rental Agreement ---
            [
                'slug' => 'room-rental-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres Wynajmującego","en":"Landlord\'s Address","uk":"Адреса Орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres Najemcy","en":"Tenant\'s Address","uk":"Адреса Орендаря","de":"Adresse des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (całego mieszkania/domu)","en":"Property Address (entire apartment/house)","uk":"Адреса нерухомості (всієї квартири/будинку)","de":"Adresse der Immobilie (gesamte Wohnung/Haus)"}},
                    {"name":"room_number_description","type":"textarea","required":true,"labels":{"pl":"Numer/opis wynajmowanego pokoju","en":"Room number/description of rented room","uk":"Номер/опис орендованої кімнати","de":"Zimmernummer/Beschreibung des gemieteten Zimmers"}},
                    {"name":"lease_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Lease Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"lease_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu (jeśli na czas określony)","en":"Lease End Date (if fixed-term)","uk":"Дата закінчення оренди (якщо на визначений термін)","de":"Mietende (falls befristet)"}},
                    {"name":"rent_amount","type":"number","required":true,"labels":{"pl":"Czynsz miesięczny","en":"Monthly Rent","uk":"Місячна орендна плата","de":"Monatsmiete"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"additional_fees","type":"textarea","required":false,"labels":{"pl":"Dodatkowe opłaty (np. media, internet)","en":"Additional fees (e.g., utilities, internet)","uk":"Додаткові платежі (напр., комунальні послуги, інтернет)","de":"Zusätzliche Gebühren (z.B. Nebenkosten, Internet)"}},
                    {"name":"deposit_amount","type":"number","required":false,"labels":{"pl":"Wysokość kaucji (opcjonalnie)","en":"Deposit Amount (optional)","uk":"Сума застави (необов\'язково)","de":"Kautionsbetrag (optional)"}},
                    {"name":"access_to_common_areas","type":"textarea","required":true,"labels":{"pl":"Dostęp do części wspólnych (np. kuchnia, łazienka)","en":"Access to common areas (e.g., kitchen, bathroom)","uk":"Доступ до спільних зон (напр., кухня, ванна кімната)","de":"Zugang zu Gemeinschaftsbereichen (z.B. Küche, Bad)"}},
                    {"name":"rules_of_stay","type":"textarea","required":false,"labels":{"pl":"Zasady współżycia (np. cisza nocna, sprzątanie)","en":"Rules of cohabitation (e.g., quiet hours, cleaning)","uk":"Правила співжиття (напр., тиха година, прибирання)","de":"Regeln des Zusammenlebens (z.B. Nachtruhe, Reinigung)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa najmu pokoju',
                        'description' => 'Umowa najmu pojedynczego pokoju w mieszkaniu lub domu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU POKOJU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Wynajmującym:</strong> [[landlord_full_name]], zamieszkałym/ą w [[landlord_address]],</p>
                                <p>a</p>
                                <p><strong>Najemcą:</strong> [[tenant_full_name]], zamieszkałym/ą w [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot najmu</h2>
                                <p>1. Wynajmujący oddaje Najemcy do użytkowania pokój nr [[room_number_description]] w nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>.</p>
                                <p>2. Najemca ma prawo do korzystania z części wspólnych nieruchomości, takich jak: [[access_to_common_areas]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Okres najmu</h2>
                                <p>Najem rozpoczyna się dnia <strong>[[lease_start_date]]</strong> i kończy dnia <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Czynsz i opłaty</h2>
                                <p>1. Najemca zobowiązuje się płacić czynsz w wysokości <strong>[[rent_amount]] [[currency]]</strong> miesięcznie.</p>
                                <p>2. Dodatkowe opłaty: [[additional_fees]].</p>
                                <p>3. Kaucja: [[deposit_amount]] [[currency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Zasady współżycia</h2>
                                <p>[[rules_of_stay]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Room Rental Agreement',
                        'description' => 'Lease agreement for a single room in an apartment or house.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ROOM RENTAL AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Landlord:</strong> [[landlord_full_name]], residing at [[landlord_address]],</p>
                                <p>and</p>
                                <p><strong>Tenant:</strong> [[tenant_full_name]], residing at [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of Lease</h2>
                                <p>1. The Landlord leases to the Tenant room no. [[room_number_description]] in the property located at: <strong>[[property_address]]</strong>.</p>
                                <p>2. The Tenant has the right to use common areas of the property, such as: [[access_to_common_areas]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Lease Term</h2>
                                <p>The lease begins on <strong>[[lease_start_date]]</strong> and ends on <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Rent and Fees</h2>
                                <p>1. The Tenant undertakes to pay rent in the amount of <strong>[[rent_amount]] [[currency]]</strong> per month.</p>
                                <p>2. Additional fees: [[additional_fees]].</p>
                                <p>3. Deposit: [[deposit_amount]] [[currency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Rules of Cohabitation</h2>
                                <p>[[rules_of_stay]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди кімнати',
                        'description' => 'Договір оренди окремої кімнати в квартирі або будинку.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ КІМНАТИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Орендодавцем:</strong> [[landlord_full_name]], який/яка проживає за адресою [[landlord_address]],</p>
                                <p>та</p>
                                <p><strong>Орендарем:</strong> [[tenant_full_name]], який/яка проживає за адресою [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет оренди</h2>
                                <p>1. Орендодавець передає Орендарю у користування кімнату № [[room_number_description]] у нерухомості, розташованій за адресою: <strong>[[property_address]]</strong>.</p>
                                <p>2. Орендар має право користуватися спільними частинами нерухомості, такими як: [[access_to_common_areas]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Термін оренди</h2>
                                <p>Оренда розпочинається <strong>[[lease_start_date]]</strong> і закінчується <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Орендна плата та платежі</h2>
                                <p>1. Орендар зобов\'язується сплачувати орендну плату у розмірі <strong>[[rent_amount]] [[currency]]</strong> щомісячно.</p>
                                <p>2. Додаткові платежі: [[additional_fees]].</p>
                                <p>3. Застава: [[deposit_amount]] [[currency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Правила співжиття</h2>
                                <p>[[rules_of_stay]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Mietvertrag für ein Zimmer',
                        'description' => 'Mietvertrag für ein einzelnes Zimmer in einer Wohnung oder einem Haus.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETVERTRAG FÜR EIN ZIMMER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Vermieter:</strong> [[landlord_full_name]], wohnhaft in [[landlord_address]],</p>
                                <p>und</p>
                                <p><strong>Mieter:</strong> [[tenant_full_name]], wohnhaft in [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Mietgegenstand</h2>
                                <p>1. Der Vermieter vermietet dem Mieter das Zimmer Nr. [[room_number_description]] in der Immobilie unter der Adresse: <strong>[[property_address]]</strong>.</p>
                                <p>2. Der Mieter hat das Recht, die Gemeinschaftsbereiche der Immobilie zu nutzen, wie zum Beispiel: [[access_to_common_areas]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Mietdauer</h2>
                                <p>Die Miete beginnt am <strong>[[lease_start_date]]</strong> und endet am <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Miete und Gebühren</h2>
                                <p>1. Der Mieter verpflichtet sich, eine Miete in Höhe von <strong>[[rent_amount]] [[currency]]</strong> monatlich zu zahlen.</p>
                                <p>2. Zusätzliche Gebühren: [[additional_fees]].</p>
                                <p>3. Kaution: [[deposit_amount]] [[currency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Regeln des Zusammenlebens</h2>
                                <p>[[rules_of_stay]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор аренды дома / House Lease Agreement ---
            [
                'slug' => 'house-lease-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres Wynajmującego","en":"Landlord\'s Address","uk":"Адреса Орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"landlord_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości Wynajmującego","en":"Landlord\'s ID Number","uk":"Номер посвідчення Орендодавця","de":"Ausweisnummer des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres Najemcy","en":"Tenant\'s Address","uk":"Адреса Орендаря","de":"Adresse des Mieters"}},
                    {"name":"tenant_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości Najemcy","en":"Tenant\'s ID Number","uk":"Номер посвідчення Орендаря","de":"Ausweisnummer des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (domu)","en":"Property Address (house)","uk":"Адреса нерухомості (будинку)","de":"Adresse der Immobilie (Haus)"}},
                    {"name":"land_plot_number","type":"text","required":true,"labels":{"pl":"Numer działki ewidencyjnej","en":"Land plot number","uk":"Номер кадастрової ділянки","de":"Flurstücksnummer"}},
                    {"name":"property_description","type":"textarea","required":true,"labels":{"pl":"Opis przedmiotu najmu (powierzchnia, liczba pokoi, stan)","en":"Description of leased property (area, number of rooms, condition)","uk":"Опис предмета оренди (площа, кількість кімнат, стан)","de":"Beschreibung des Mietobjekts (Fläche, Zimmeranzahl, Zustand)"}},
                    {"name":"lease_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Lease Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"lease_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu (jeśli na czas określony)","en":"Lease End Date (if fixed-term)","uk":"Дата закінчення оренди (якщо на визначений термін)","de":"Mietende (falls befristet)"}},
                    {"name":"rent_amount","type":"number","required":true,"labels":{"pl":"Czynsz miesięczny","en":"Monthly Rent","uk":"Місячна орендна плата","de":"Monatsmiete"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"additional_fees","type":"textarea","required":false,"labels":{"pl":"Dodatkowe opłaty (np. media, podatek od nieruchomości)","en":"Additional fees (e.g., utilities, property tax)","uk":"Додаткові платежі (напр., комунальні послуги, податок на нерухомість)","de":"Zusätzliche Gebühren (z.B. Nebenkosten, Grundsteuer)"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji","en":"Deposit Amount","uk":"Сума застави","de":"Kautionsbetrag"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"pl":"Dzień miesiąca płatności","en":"Day of the month for payment","uk":"День місяця оплати","de":"Zahlungstag im Monat"}},
                    {"name":"bank_account_number","type":"text","required":true,"labels":{"pl":"Numer konta bankowego Wynajmującego","en":"Landlord\'s Bank Account Number","uk":"Номер банківського рахунку Орендодавця","de":"Bankkontonummer des Vermieters"}},
                    {"name":"termination_notice_period","type":"text","required":true,"labels":{"pl":"Okres wypowiedzenia","en":"Termination Notice Period","uk":"Термін розірвання","de":"Kündigungsfrist"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa najmu domu',
                        'description' => 'Standardowa umowa najmu domu na czas określony lub nieokreślony.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU DOMU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Wynajmującym:</strong> [[landlord_full_name]], zamieszkałym/ą w [[landlord_address]], legitymującym/ą się dowodem osobistym nr [[landlord_id_number]],</p>
                                <p>a</p>
                                <p><strong>Najemcą:</strong> [[tenant_full_name]], zamieszkałym/ą w [[tenant_address]], legitymującym/ą się dowodem osobistym nr [[tenant_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot najmu</h2>
                                <p>1. Wynajmujący oświadcza, że jest właścicielem/posiada prawo do dysponowania nieruchomością (domem) położoną pod adresem: <strong>[[property_address]]</strong>, na działce ewidencyjnej nr [[land_plot_number]].</p>
                                <p>2. Przedmiotem najmu jest [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Okres najmu</h2>
                                <p>Umowa zostaje zawarta na czas od dnia <strong>[[lease_start_date]]</strong> do dnia <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Czynsz i opłaty</h2>
                                <p>1. Najemca zobowiązuje się płacić czynsz w wysokości <strong>[[rent_amount]] [[currency]]</strong> miesięcznie.</p>
                                <p>2. Dodatkowe opłaty: [[additional_fees]].</p>
                                <p>3. Płatności będą dokonywane do [[payment_due_day]]. dnia każdego miesiąca na konto bankowe Wynajmującego: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Kaucja</h2>
                                <p>Najemca wpłaca kaucję w wysokości <strong>[[deposit_amount]] [[currency]]</strong>, która zostanie zwrócona po zakończeniu najmu, po potrąceniu ewentualnych należności.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Wypowiedzenie umowy</h2>
                                <p>Każda ze stron może wypowiedzieć niniejszą umowę z zachowaniem [[termination_notice_period]] okresu wypowiedzenia.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'House Lease Agreement',
                        'description' => 'Standard house lease agreement for a definite or indefinite period.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HOUSE LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Landlord:</strong> [[landlord_full_name]], residing at [[landlord_address]], holding ID card no. [[landlord_id_number]],</p>
                                <p>and</p>
                                <p><strong>Tenant:</strong> [[tenant_full_name]], residing at [[tenant_address]], holding ID card no. [[tenant_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of Lease</h2>
                                <p>1. The Landlord declares that they are the owner/have the right to dispose of the property (house) located at: <strong>[[property_address]]</strong>, on land plot no. [[land_plot_number]].</p>
                                <p>2. The subject of the lease is [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Lease Term</h2>
                                <p>The agreement is concluded for the period from <strong>[[lease_start_date]]</strong> to <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Rent and Fees</h2>
                                <p>1. The Tenant undertakes to pay rent in the amount of <strong>[[rent_amount]] [[currency]]</strong> per month.</p>
                                <p>2. Additional fees: [[additional_fees]].</p>
                                <p>3. Payments shall be made by the [[payment_due_day]]. day of each month to the Landlord\'s bank account: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Deposit</h2>
                                <p>The Tenant shall pay a deposit of <strong>[[deposit_amount]] [[currency]]</strong>, which shall be returned upon termination of the lease, after deduction of any outstanding amounts.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Termination of Agreement</h2>
                                <p>Either party may terminate this agreement with a [[termination_notice_period]] notice period.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди будинку',
                        'description' => 'Стандартний договір оренди будинку на визначений або невизначений термін.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ БУДИНКУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Орендодавцем:</strong> [[landlord_full_name]], який/яка проживає за адресою [[landlord_address]], що посвідчує особу за паспортом № [[landlord_id_number]],</p>
                                <p>та</p>
                                <p><strong>Орендарем:</strong> [[tenant_full_name]], який/яка проживає за адресою [[tenant_address]], що посвідчує особу за паспортом № [[tenant_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет оренди</h2>
                                <p>1. Орендодавець заявляє, що є власником/має право розпоряджатися нерухомістю (будинком), розташованою за адресою: <strong>[[property_address]]</strong>, на кадастровій ділянці № [[land_plot_number]].</p>
                                <p>2. Предметом оренди є [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Термін оренди</h2>
                                <p>Договір укладається на термін з <strong>[[lease_start_date]]</strong> до <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Орендна плата та платежі</h2>
                                <p>1. Орендар зобов\'язується сплачувати орендну плату у розмірі <strong>[[rent_amount]] [[currency]]</strong> щомісячно.</p>
                                <p>2. Додаткові платежі: [[additional_fees]].</p>
                                <p>3. Платежі здійснюватимуться до [[payment_due_day]]. числа кожного місяця на банківський рахунок Орендодавця: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Застава</h2>
                                <p>Орендар вносить заставу у розмірі <strong>[[deposit_amount]] [[currency]]</strong>, яка буде повернута після закінчення оренди, після вирахування можливих заборгованостей.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Розірвання договору</h2>
                                <p>Кожна зі сторін може розірвати цей договір з дотриманням [[termination_notice_period]] терміну повідомлення.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Hausmietvertrag',
                        'description' => 'Standard-Hausmietvertrag für eine bestimmte oder unbestimmte Zeit.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HAUSMIETVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Vermieter:</strong> [[landlord_full_name]], wohnhaft in [[landlord_address]], Ausweis-Nr. [[landlord_id_number]],</p>
                                <p>und</p>
                                <p><strong>Mieter:</strong> [[tenant_full_name]], wohnhaft in [[tenant_address]], Ausweis-Nr. [[tenant_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Mietgegenstand</h2>
                                <p>1. Der Vermieter erklärt, Eigentümer der Immobilie (Haus) zu sein/das Recht zu haben, über die Immobilie zu verfügen, die sich unter der Adresse befindet: <strong>[[property_address]]</strong>, auf dem Flurstück Nr. [[land_plot_number]].</p>
                                <p>2. Mietgegenstand ist [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Mietdauer</h2>
                                <p>Der Vertrag wird für den Zeitraum vom <strong>[[lease_start_date]]</strong> bis zum <strong>[[lease_end_date]]</strong> geschlossen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Miete und Gebühren</h2>
                                <p>1. Der Mieter verpflichtet sich, eine Miete in Höhe von <strong>[[rent_amount]] [[currency]]</strong> monatlich zu zahlen.</p>
                                <p>2. Zusätzliche Gebühren: [[additional_fees]].</p>
                                <p>3. Zahlungen sind bis zum [[payment_due_day]]. Tag jedes Monats auf das Bankkonto des Vermieters: [[bank_account_number]] zu leisten.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Kaution</h2>
                                <p>Der Mieter zahlt eine Kaution in Höhe von <strong>[[deposit_amount]] [[currency]]</strong>, die nach Beendigung des Mietverhältnisses nach Abzug etwaiger Forderungen zurückerstattet wird.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Kündigung des Vertrages</h2>
                                <p>Jede Partei kann diesen Vertrag unter Einhaltung einer Kündigungsfrist von [[termination_notice_period]] kündigen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор аренды коммерческого помещения (офис) / Commercial Premises Lease Agreement (Office) ---
            [
                'slug' => 'commercial-office-lease-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy Wynajmującego","en":"Landlord Company Name","uk":"Назва компанії Орендодавця","de":"Firmenname des Vermieters"}},
                    {"name":"landlord_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy Wynajmującego","en":"Landlord Company Address","uk":"Адреса компанії Орендодавця","de":"Adresse der Vermieterfirma"}},
                    {"name":"landlord_nip","type":"text","required":true,"labels":{"pl":"NIP Wynajmującego","en":"Landlord NIP","uk":"ІПН Орендодавця","de":"USt-IdNr. des Vermieters"}},
                    {"name":"tenant_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy Najemcy","en":"Tenant Company Name","uk":"Назва компанії Орендаря","de":"Firmenname des Mieters"}},
                    {"name":"tenant_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy Najemcy","en":"Tenant Company Address","uk":"Адреса компанії Орендаря","de":"Adresse der Mieterfirma"}},
                    {"name":"tenant_nip","type":"text","required":true,"labels":{"pl":"NIP Najemcy","en":"Tenant NIP","uk":"ІПН Орендаря","de":"USt-IdNr. des Mieters"}},
                    {"name":"premises_address","type":"text","required":true,"labels":{"pl":"Adres lokalu komercyjnego","en":"Commercial Premises Address","uk":"Адреса комерційного приміщення","de":"Adresse des Gewerberaums"}},
                    {"name":"premises_description","type":"textarea","required":true,"labels":{"pl":"Opis przedmiotu najmu (powierzchnia, przeznaczenie)","en":"Description of leased premises (area, purpose)","uk":"Опис предмета оренди (площа, призначення)","de":"Beschreibung des Mietobjekts (Fläche, Zweck)"}},
                    {"name":"lease_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Lease Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"lease_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu","en":"Lease End Date","uk":"Дата закінчення оренди","de":"Mietende"}},
                    {"name":"rent_amount","type":"number","required":true,"labels":{"pl":"Czynsz miesięczny netto","en":"Monthly Net Rent","uk":"Місячна орендна плата нетто","de":"Monatliche Nettomiete"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"vat_rate","type":"text","required":true,"labels":{"pl":"Stawka VAT","en":"VAT Rate","uk":"Ставка ПДВ","de":"MwSt.-Satz"}},
                    {"name":"additional_fees","type":"textarea","required":false,"labels":{"pl":"Dodatkowe opłaty (np. media, opłaty eksploatacyjne)","en":"Additional fees (e.g., utilities, operating costs)","uk":"Додаткові платежі (напр., комунальні послуги, експлуатаційні витрати)","de":"Zusätzliche Gebühren (z.B. Nebenkosten, Betriebskosten)"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji","en":"Deposit Amount","uk":"Сума застави","de":"Kautionsbetrag"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"pl":"Dzień miesiąca płatności","en":"Day of the month for payment","uk":"День місяця оплати","de":"Zahlungstag im Monat"}},
                    {"name":"bank_account_number","type":"text","required":true,"labels":{"pl":"Numer konta bankowego Wynajmującego","en":"Landlord\'s Bank Account Number","uk":"Номер банківського рахунку Орендодавця","de":"Bankkontonummer des Vermieters"}},
                    {"name":"termination_notice_period","type":"text","required":true,"labels":{"pl":"Okres wypowiedzenia","en":"Termination Notice Period","uk":"Термін розірвання","de":"Kündigungsfrist"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa najmu lokalu użytkowego (biuro)',
                        'description' => 'Umowa najmu powierzchni komercyjnej przeznaczonej na biuro.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU LOKALU UŻYTKOWEGO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Wynajmującym:</strong> [[landlord_company_name]] z siedzibą w [[landlord_company_address]], NIP: [[landlord_nip]],</p>
                                <p>a</p>
                                <p><strong>Najemcą:</strong> [[tenant_company_name]] z siedzibą w [[tenant_company_address]], NIP: [[tenant_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot najmu</h2>
                                <p>1. Wynajmujący oddaje Najemcy do użytkowania lokal użytkowy położony pod adresem: <strong>[[premises_address]]</strong>.</p>
                                <p>2. Przedmiotem najmu jest [[premises_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Okres najmu</h2>
                                <p>Umowa zostaje zawarta na czas określony od dnia <strong>[[lease_start_date]]</strong> do dnia <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Czynsz i opłaty</h2>
                                <p>1. Najemca zobowiązuje się płacić czynsz w wysokości <strong>[[rent_amount]] [[currency]] netto</strong> miesięcznie, powiększony o podatek VAT w stawce [[vat_rate]].</p>
                                <p>2. Dodatkowe opłaty: [[additional_fees]].</p>
                                <p>3. Płatności będą dokonywane do [[payment_due_day]]. dnia każdego miesiąca na konto bankowe Wynajmującego: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Kaucja</h2>
                                <p>Najemca wpłaca kaucję w wysokości <strong>[[deposit_amount]] [[currency]]</strong>, która zostanie zwrócona po zakończeniu najmu, po potrąceniu ewentualnych należności.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Wypowiedzenie umowy</h2>
                                <p>Każda ze stron może wypowiedzieć niniejszą umowę z zachowaniem [[termination_notice_period]] okresu wypowiedzenia.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Commercial Premises Lease Agreement (Office)',
                        'description' => 'Lease agreement for commercial space intended for an office.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">COMMERCIAL PREMISES LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Landlord:</strong> [[landlord_company_name]] with its registered office in [[landlord_company_address]], NIP: [[landlord_nip]],</p>
                                <p>and</p>
                                <p><strong>Tenant:</strong> [[tenant_company_name]] with its registered office in [[tenant_company_address]], NIP: [[tenant_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of Lease</h2>
                                <p>1. The Landlord leases to the Tenant commercial premises located at: <strong>[[premises_address]]</strong>.</p>
                                <p>2. The subject of the lease is [[premises_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Lease Term</h2>
                                <p>The agreement is concluded for a fixed term from <strong>[[lease_start_date]]</strong> to <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Rent and Fees</h2>
                                <p>1. The Tenant undertakes to pay rent in the amount of <strong>[[rent_amount]] [[currency]] net</strong> per month, plus VAT at the rate of [[vat_rate]].</p>
                                <p>2. Additional fees: [[additional_fees]].</p>
                                <p>3. Payments shall be made by the [[payment_due_day]]. day of each month to the Landlord\'s bank account: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Deposit</h2>
                                <p>The Tenant shall pay a deposit of <strong>[[deposit_amount]] [[currency]]</strong>, which shall be returned upon termination of the lease, after deduction of any outstanding amounts.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Termination of Agreement</h2>
                                <p>Either party may terminate this agreement with a [[termination_notice_period]] notice period.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди комерційного приміщення (офіс)',
                        'description' => 'Договір оренди комерційного приміщення, призначеного для офісу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ КОМЕРЦІЙНОГО ПРИМІЩЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Орендодавцем:</strong> [[landlord_company_name]] з місцезнаходженням у [[landlord_company_address]], ІПН: [[landlord_nip]],</p>
                                <p>та</p>
                                <p><strong>Орендарем:</strong> [[tenant_company_name]] з місцезнаходженням у [[tenant_company_address]], ІПН: [[tenant_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет оренди</h2>
                                <p>1. Орендодавець передає Орендарю у користування комерційне приміщення, розташоване за адресою: <strong>[[premises_address]]</strong>.</p>
                                <p>2. Предметом оренди є [[premises_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Термін оренди</h2>
                                <p>Договір укладається на визначений термін з <strong>[[lease_start_date]]</strong> до <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Орендна плата та платежі</h2>
                                <p>1. Орендар зобов\'язується сплачувати орендну плату у розмірі <strong>[[rent_amount]] [[currency]] нетто</strong> щомісячно, збільшену на податок ПДВ за ставкою [[vat_rate]].</p>
                                <p>2. Додаткові платежі: [[additional_fees]].</p>
                                <p>3. Платежі здійснюватимуться до [[payment_due_day]]. числа кожного місяця на банківський рахунок Орендодавця: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Застава</h2>
                                <p>Орендар вносить заставу у розмірі <strong>[[deposit_amount]] [[currency]]</strong>, яка буде повернута після закінчення оренди, після вирахування можливих заборгованостей.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Розірвання договору</h2>
                                <p>Кожна зі сторін може розірвати цей договір з дотриманням [[termination_notice_period]] терміну повідомлення.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Mietvertrag für Gewerberäume (Büro)',
                        'description' => 'Mietvertrag für Gewerbeflächen, die als Büro genutzt werden sollen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETVERTRAG FÜR GEWERBERÄUME</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Vermieter:</strong> [[landlord_company_name]] mit Sitz in [[landlord_company_address]], NIP: [[landlord_nip]],</p>
                                <p>und</p>
                                <p><strong>Mieter:</strong> [[tenant_company_name]] mit Sitz in [[tenant_company_address]], NIP: [[tenant_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Mietgegenstand</h2>
                                <p>1. Der Vermieter vermietet dem Mieter Gewerberäume unter der Adresse: <strong>[[premises_address]]</strong>.</p>
                                <p>2. Mietgegenstand ist [[premises_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Mietdauer</h2>
                                <p>Der Vertrag wird für einen bestimmten Zeitraum vom <strong>[[lease_start_date]]</strong> bis zum <strong>[[lease_end_date]]</strong> geschlossen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Miete und Gebühren</h2>
                                <p>1. Der Mieter verpflichtet sich, eine Miete in Höhe von <strong>[[rent_amount]] [[currency]] netto</strong> monatlich zu zahlen, zuzüglich Mehrwertsteuer in Höhe von [[vat_rate]].</p>
                                <p>2. Zusätzliche Gebühren: [[additional_fees]].</p>
                                <p>3. Zahlungen sind bis zum [[payment_due_day]]. Tag jedes Monats auf das Bankkonto des Vermieters: [[bank_account_number]] zu leisten.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Kaution</h2>
                                <p>Der Mieter zahlt eine Kaution in Höhe von <strong>[[deposit_amount]] [[currency]]</strong>, die nach Beendigung des Mietverhältnisses nach Abzug etwaiger Forderungen zurückerstattet wird.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Kündigung des Vertrages</h2>
                                <p>Jede Partei kann diesen Vertrag unter Einhaltung einer Kündigungsfrist von [[termination_notice_period]] kündigen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор аренды склада / Warehouse Lease Agreement ---
            [
                'slug' => 'warehouse-lease-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy Wynajmującego","en":"Landlord Company Name","uk":"Назва компанії Орендодавця","de":"Firmenname des Vermieters"}},
                    {"name":"landlord_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy Wynajmującego","en":"Landlord Company Address","uk":"Адреса компанії Орендодавця","de":"Adresse der Vermieterfirma"}},
                    {"name":"landlord_nip","type":"text","required":true,"labels":{"pl":"NIP Wynajmującego","en":"Landlord NIP","uk":"ІПН Орендодавця","de":"USt-IdNr. des Vermieters"}},
                    {"name":"tenant_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy Najemcy","en":"Tenant Company Name","uk":"Назва компанії Орендаря","de":"Firmenname des Mieters"}},
                    {"name":"tenant_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy Najemcy","en":"Tenant Company Address","uk":"Адреса компанії Орендаря","de":"Adresse der Mieterfirma"}},
                    {"name":"tenant_nip","type":"text","required":true,"labels":{"pl":"NIP Najemcy","en":"Tenant NIP","uk":"ІПН Орендаря","de":"USt-IdNr. des Mieters"}},
                    {"name":"warehouse_address","type":"text","required":true,"labels":{"pl":"Adres magazynu","en":"Warehouse Address","uk":"Адреса складу","de":"Adresse des Lagers"}},
                    {"name":"warehouse_description","type":"textarea","required":true,"labels":{"pl":"Opis przedmiotu najmu (powierzchnia, stan, wyposażenie)","en":"Description of leased property (area, condition, equipment)","uk":"Опис предмета оренди (площа, стан, обладнання)","de":"Beschreibung des Mietobjekts (Fläche, Zustand, Ausstattung)"}},
                    {"name":"lease_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Lease Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"lease_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu","en":"Lease End Date","uk":"Дата закінчення оренди","de":"Mietende"}},
                    {"name":"rent_amount","type":"number","required":true,"labels":{"pl":"Czynsz miesięczny netto","en":"Monthly Net Rent","uk":"Місячна орендна плата нетто","de":"Monatliche Nettomiete"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"vat_rate","type":"text","required":true,"labels":{"pl":"Stawka VAT","en":"VAT Rate","uk":"Ставка ПДВ","de":"MwSt.-Satz"}},
                    {"name":"additional_fees","type":"textarea","required":false,"labels":{"pl":"Dodatkowe opłaty (np. media, ubezpieczenie)","en":"Additional fees (e.g., utilities, insurance)","uk":"Додаткові платежі (напр., комунальні послуги, страхування)","de":"Zusätzliche Gebühren (z.B. Nebenkosten, Versicherung)"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji","en":"Deposit Amount","uk":"Сума застави","de":"Kautionsbetrag"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"pl":"Dzień miesiąca płatności","en":"Day of the month for payment","uk":"День місяця оплати","de":"Zahlungstag im Monat"}},
                    {"name":"bank_account_number","type":"text","required":true,"labels":{"pl":"Numer konta bankowego Wynajmującego","en":"Landlord\'s Bank Account Number","uk":"Номер банківського рахунку Орендодавця","de":"Bankkontonummer des Vermieters"}},
                    {"name":"termination_notice_period","type":"text","required":true,"labels":{"pl":"Okres wypowiedzenia","en":"Termination Notice Period","uk":"Термін розірвання","de":"Kündigungsfrist"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa najmu magazynu',
                        'description' => 'Umowa najmu powierzchni magazynowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU MAGAZYNU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Wynajmującym:</strong> [[landlord_company_name]] z siedzibą w [[landlord_company_address]], NIP: [[landlord_nip]],</p>
                                <p>a</p>
                                <p><strong>Najemcą:</strong> [[tenant_company_name]] z siedzibą w [[tenant_company_address]], NIP: [[tenant_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot najmu</h2>
                                <p>1. Wynajmujący oddaje Najemcy do użytkowania magazyn położony pod adresem: <strong>[[warehouse_address]]</strong>.</p>
                                <p>2. Przedmiotem najmu jest [[warehouse_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Okres najmu</h2>
                                <p>Umowa zostaje zawarta na czas określony od dnia <strong>[[lease_start_date]]</strong> do dnia <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Czynsz i opłaty</h2>
                                <p>1. Najemca zobowiązuje się płacić czynsz w wysokości <strong>[[rent_amount]] [[currency]] netto</strong> miesięcznie, powiększony o podatek VAT w stawce [[vat_rate]].</p>
                                <p>2. Dodatkowe opłaty: [[additional_fees]].</p>
                                <p>3. Płatności będą dokonywane do [[payment_due_day]]. dnia każdego miesiąca na konto bankowe Wynajmującego: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Kaucja</h2>
                                <p>Najemca wpłaca kaucję w wysokości <strong>[[deposit_amount]] [[currency]]</strong>, która zostanie zwrócona po zakończeniu najmu, po potrąceniu ewentualnych należności.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Wypowiedzenie umowy</h2>
                                <p>Każda ze stron może wypowiedzieć niniejszą umowę z zachowaniem [[termination_notice_period]] okresu wypowiedzenia.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Warehouse Lease Agreement',
                        'description' => 'Lease agreement for warehouse space.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WAREHOUSE LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Landlord:</strong> [[landlord_company_name]] with its registered office in [[landlord_company_address]], NIP: [[landlord_nip]],</p>
                                <p>and</p>
                                <p><strong>Tenant:</strong> [[tenant_company_name]] with its registered office in [[tenant_company_address]], NIP: [[tenant_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of Lease</h2>
                                <p>1. The Landlord leases to the Tenant the warehouse located at: <strong>[[warehouse_address]]</strong>.</p>
                                <p>2. The subject of the lease is [[warehouse_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Lease Term</h2>
                                <p>The agreement is concluded for a fixed term from <strong>[[lease_start_date]]</strong> to <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Rent and Fees</h2>
                                <p>1. The Tenant undertakes to pay rent in the amount of <strong>[[rent_amount]] [[currency]] net</strong> per month, plus VAT at the rate of [[vat_rate]].</p>
                                <p>2. Additional fees: [[additional_fees]].</p>
                                <p>3. Payments shall be made by the [[payment_due_day]]. day of each month to the Landlord\'s bank account: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Deposit</h2>
                                <p>The Tenant shall pay a deposit of <strong>[[deposit_amount]] [[currency]]</strong>, which shall be returned upon termination of the lease, after deduction of any outstanding amounts.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Termination of Agreement</h2>
                                <p>Either party may terminate this agreement with a [[termination_notice_period]] notice period.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди складу',
                        'description' => 'Договір оренди складського приміщення.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ СКЛАДУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Орендодавцем:</strong> [[landlord_company_name]] з місцезнаходженням у [[landlord_company_address]], ІПН: [[landlord_nip]],</p>
                                <p>та</p>
                                <p><strong>Орендарем:</strong> [[tenant_company_name]] з місцезнаходженням у [[tenant_company_address]], ІПН: [[tenant_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет оренди</h2>
                                <p>1. Орендодавець передає Орендарю у користування склад, розташований за адресою: <strong>[[warehouse_address]]</strong>.</p>
                                <p>2. Предметом оренди є [[warehouse_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Термін оренди</h2>
                                <p>Договір укладається на визначений термін з <strong>[[lease_start_date]]</strong> до <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Орендна плата та платежі</h2>
                                <p>1. Орендар зобов\'язується сплачувати орендну плату у розмірі <strong>[[rent_amount]] [[currency]] нетто</strong> щомісячно, збільшену на податок ПДВ за ставкою [[vat_rate]].</p>
                                <p>2. Додаткові платежі: [[additional_fees]].</p>
                                <p>3. Платежі здійснюватимуться до [[payment_due_day]]. числа кожного місяця на банківський рахунок Орендодавця: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Застава</h2>
                                <p>Орендар вносить заставу у розмірі <strong>[[deposit_amount]] [[currency]]</strong>, яка буде повернута після закінчення оренди, після вирахування можливих заборгованостей.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Розірвання договору</h2>
                                <p>Кожна зі сторін може розірвати цей договір з дотриманням [[termination_notice_period]] терміну повідомлення.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Lagerhallenmietvertrag',
                        'description' => 'Mietvertrag für Lagerflächen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LAGERHALLENMIETVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Vermieter:</strong> [[landlord_company_name]] mit Sitz in [[landlord_company_address]], NIP: [[landlord_nip]],</p>
                                <p>und</p>
                                <p><strong>Mieter:</strong> [[tenant_company_name]] mit Sitz in [[tenant_company_address]], NIP: [[tenant_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Mietgegenstand</h2>
                                <p>1. Der Vermieter vermietet dem Mieter das Lager unter der Adresse: <strong>[[warehouse_address]]</strong>.</p>
                                <p>2. Mietgegenstand ist [[warehouse_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Mietdauer</h2>
                                <p>Der Vertrag wird für einen bestimmten Zeitraum vom <strong>[[lease_start_date]]</strong> bis zum <strong>[[lease_end_date]]</strong> geschlossen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Miete und Gebühren</h2>
                                <p>1. Der Mieter verpflichtet sich, eine Miete in Höhe von <strong>[[rent_amount]] [[currency]] netto</strong> monatlich zu zahlen, zuzüglich Mehrwertsteuer in Höhe von [[vat_rate]].</p>
                                <p>2. Zusätzliche Gebühren: [[additional_fees]].</p>
                                <p>3. Zahlungen sind bis zum [[payment_due_day]]. Tag jedes Monats auf das Bankkonto des Vermieters: [[bank_account_number]] zu leisten.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Kaution</h2>
                                <p>Der Mieter zahlt eine Kaution in Höhe von <strong>[[deposit_amount]] [[currency]]</strong>, die nach Beendigung des Mietverhältnisses nach Abzug etwaiger Forderungen zurückerstattet wird.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Kündigung des Vertrages</h2>
                                <p>Jede Partei kann diesen Vertrag unter Einhaltung einer Kündigungsfrist von [[termination_notice_period]] kündigen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор аренды гаража / Garage Lease Agreement ---
            [
                'slug' => 'garage-lease-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres Wynajmującego","en":"Landlord\'s Address","uk":"Адреса Орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres Najemcy","en":"Tenant\'s Address","uk":"Адреса Орендаря","de":"Adresse des Mieters"}},
                    {"name":"garage_address","type":"text","required":true,"labels":{"pl":"Adres garażu","en":"Garage Address","uk":"Адреса гаража","de":"Adresse der Garage"}},
                    {"name":"garage_description","type":"textarea","required":true,"labels":{"pl":"Opis przedmiotu najmu (powierzchnia, numer, stan)","en":"Description of leased property (area, number, condition)","uk":"Опис предмета оренди (площа, номер, стан)","de":"Beschreibung des Mietobjekts (Fläche, Nummer, Zustand)"}},
                    {"name":"lease_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Lease Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"lease_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu","en":"Lease End Date","uk":"Дата закінчення оренди","de":"Mietende"}},
                    {"name":"rent_amount","type":"number","required":true,"labels":{"pl":"Czynsz miesięczny","en":"Monthly Rent","uk":"Місячна орендна плата","de":"Monatsmiete"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"additional_fees","type":"textarea","required":false,"labels":{"pl":"Dodatkowe opłaty (np. prąd)","en":"Additional fees (e.g., electricity)","uk":"Додаткові платежі (напр., електроенергія)","de":"Zusätzliche Gebühren (z.B. Strom)"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji","en":"Deposit Amount","uk":"Сума застави","de":"Kautionsbetrag"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"pl":"Dzień miesiąca płatności","en":"Day of the month for payment","uk":"День місяця оплати","de":"Zahlungstag im Monat"}},
                    {"name":"bank_account_number","type":"text","required":true,"labels":{"pl":"Numer konta bankowego Wynajmującego","en":"Landlord\'s Bank Account Number","uk":"Номер банківського рахунку Орендодавця","de":"Bankkontonummer des Vermieters"}},
                    {"name":"termination_notice_period","type":"text","required":true,"labels":{"pl":"Okres wypowiedzenia","en":"Termination Notice Period","uk":"Термін розірвання","de":"Kündigungsfrist"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa najmu garażu',
                        'description' => 'Umowa najmu garażu lub miejsca postojowego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU GARAŻU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Wynajmującym:</strong> [[landlord_full_name]], zamieszkałym/ą w [[landlord_address]],</p>
                                <p>a</p>
                                <p><strong>Najemcą:</strong> [[tenant_full_name]], zamieszkałym/ą w [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot najmu</h2>
                                <p>1. Wynajmujący oddaje Najemcy do użytkowania garaż położony pod adresem: <strong>[[garage_address]]</strong>.</p>
                                <p>2. Przedmiotem najmu jest [[garage_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Okres najmu</h2>
                                <p>Umowa zostaje zawarta na czas określony od dnia <strong>[[lease_start_date]]</strong> do dnia <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Czynsz i opłaty</h2>
                                <p>1. Najemca zobowiązuje się płacić czynsz w wysokości <strong>[[rent_amount]] [[currency]]</strong> miesięcznie.</p>
                                <p>2. Dodatkowe opłaty: [[additional_fees]].</p>
                                <p>3. Płatności będą dokonywane do [[payment_due_day]]. dnia każdego miesiąca na konto bankowe Wynajmującego: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Kaucja</h2>
                                <p>Najemca wpłaca kaucję w wysokości <strong>[[deposit_amount]] [[currency]]</strong>, która zostanie zwrócona po zakończeniu najmu, po potrąceniu ewentualnych należności.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Wypowiedzenie umowy</h2>
                                <p>Każda ze stron może wypowiedzieć niniejszą umowę z zachowaniem [[termination_notice_period]] okresu wypowiedzenia.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Garage Lease Agreement',
                        'description' => 'Lease agreement for a garage or parking space.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GARAGE LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Landlord:</strong> [[landlord_full_name]], residing at [[landlord_address]],</p>
                                <p>and</p>
                                <p><strong>Tenant:</strong> [[tenant_full_name]], residing at [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of Lease</h2>
                                <p>1. The Landlord leases to the Tenant the garage located at: <strong>[[garage_address]]</strong>.</p>
                                <p>2. The subject of the lease is [[garage_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Lease Term</h2>
                                <p>The agreement is concluded for a fixed term from <strong>[[lease_start_date]]</strong> to <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Rent and Fees</h2>
                                <p>1. The Tenant undertakes to pay rent in the amount of <strong>[[rent_amount]] [[currency]]</strong> per month.</p>
                                <p>2. Additional fees: [[additional_fees]].</p>
                                <p>3. Payments shall be made by the [[payment_due_day]]. day of each month to the Landlord\'s bank account: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Deposit</h2>
                                <p>The Tenant shall pay a deposit of <strong>[[deposit_amount]] [[currency]]</strong>, which shall be returned upon termination of the lease, after deduction of any outstanding amounts.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Termination of Agreement</h2>
                                <p>Either party may terminate this agreement with a [[termination_notice_period]] notice period.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди гаража',
                        'description' => 'Договір оренди гаража або місця для паркування.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ ГАРАЖА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Орендодавцем:</strong> [[landlord_full_name]], який/яка проживає за адресою [[landlord_address]],</p>
                                <p>та</p>
                                <p><strong>Орендарем:</strong> [[tenant_full_name]], який/яка проживає за адресою [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет оренди</h2>
                                <p>1. Орендодавець передає Орендарю у користування гараж, розташований за адресою: <strong>[[garage_address]]</strong>.</p>
                                <p>2. Предметом оренди є [[garage_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Термін оренди</h2>
                                <p>Договір укладається на визначений термін з <strong>[[lease_start_date]]</strong> до <strong>[[lease_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Орендна плата та платежі</h2>
                                <p>1. Орендар зобов\'язується сплачувати орендну плату у розмірі <strong>[[rent_amount]] [[currency]]</strong> щомісячно.</p>
                                <p>2. Додаткові платежі: [[additional_fees]].</p>
                                <p>3. Платежі здійснюватимуться до [[payment_due_day]]. числа кожного місяця на банківський рахунок Орендодавця: [[bank_account_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Застава</h2>
                                <p>Орендар вносить заставу у розмірі <strong>[[deposit_amount]] [[currency]]</strong>, яка буде повернута після закінчення оренди, після вирахування можливих заборгованостей.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Розірвання договору</h2>
                                <p>Кожна зі сторін може розірвати цей договір з дотриманням [[termination_notice_period]] терміну повідомлення.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Garagenmietvertrag',
                        'description' => 'Mietvertrag für eine Garage oder einen Stellplatz.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GARAGENMIETVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Vermieter:</strong> [[landlord_full_name]], wohnhaft in [[landlord_address]],</p>
                                <p>und</p>
                                <p><strong>Mieter:</strong> [[tenant_full_name]], wohnhaft in [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Mietgegenstand</h2>
                                <p>1. Der Vermieter vermietet dem Mieter die Garage unter der Adresse: <strong>[[garage_address]]</strong>.</p>
                                <p>2. Mietgegenstand ist [[garage_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Mietdauer</h2>
                                <p>Der Vertrag wird für einen bestimmten Zeitraum vom <strong>[[lease_start_date]]</strong> bis zum <strong>[[lease_end_date]]</strong> geschlossen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Miete und Gebühren</h2>
                                <p>1. Der Mieter verpflichtet sich, eine Miete in Höhe von <strong>[[rent_amount]] [[currency]]</strong> monatlich zu zahlen.</p>
                                <p>2. Zusätzliche Gebühren: [[additional_fees]].</p>
                                <p>3. Zahlungen sind bis zum [[payment_due_day]]. Tag jedes Monats auf das Bankkonto des Vermieters: [[bank_account_number]] zu leisten.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Kaution</h2>
                                <p>Der Mieter zahlt eine Kaution in Höhe von <strong>[[deposit_amount]] [[currency]]</strong>, die nach Beendigung des Mietverhältnisses nach Abzug etwaiger Forderungen zurückerstattet wird.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Kündigung des Vertrages</h2>
                                <p>Jede Partei kann diesen Vertrag unter Einhaltung einer Kündigungsfrist von [[termination_notice_period]] kündigen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Акт приема-передачи квартиры при аренде / Apartment Handover Protocol for Lease ---
            [
                'slug' => 'apartment-handover-lease-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"protocol_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia protokołu","en":"Protocol Date","uk":"Дата складання протоколу","de":"Protokolldatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"lease_agreement_date","type":"date","required":true,"labels":{"pl":"Data umowy najmu","en":"Lease Agreement Date","uk":"Дата договору оренди","de":"Mietvertragsdatum"}},
                    {"name":"meter_readings","type":"textarea","required":true,"labels":{"pl":"Stany liczników (prąd, woda, gaz)","en":"Meter readings (electricity, water, gas)","uk":"Показники лічильників (електрика, вода, газ)","de":"Zählerstände (Strom, Wasser, Gas)"}},
                    {"name":"keys_handed_over","type":"textarea","required":true,"labels":{"pl":"Przekazane klucze (liczba, opis)","en":"Keys handed over (number, description)","uk":"Передані ключі (кількість, опис)","de":"Übergebene Schlüssel (Anzahl, Beschreibung)"}},
                    {"name":"property_condition","type":"textarea","required":true,"labels":{"pl":"Stan techniczny nieruchomości i wyposażenia","en":"Technical condition of property and equipment","uk":"Технічний стан нерухомості та обладнання","de":"Technischer Zustand der Immobilie und Ausstattung"}},
                    {"name":"defects_comments","type":"textarea","required":false,"labels":{"pl":"Wady/usterki/uwagi (opcjonalnie)","en":"Defects/faults/comments (optional)","uk":"Дефекти/несправності/примітки (необов\'язково)","de":"Mängel/Fehler/Anmerkungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Protokół zdawczo-odbiorczy nieruchomości (najem)',
                        'description' => 'Dokument sporządzany przy przekazaniu nieruchomości Najemcy, opisujący jej stan i wyposażenie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ZDAWCZO-ODBIORCZY NIERUCHOMOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Dotyczy umowy najmu z dnia: [[lease_agreement_date]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sporządzony w dniu <strong>[[protocol_date]]</strong> pomiędzy:</p>
                                <p><strong>Wynajmującym:</strong> [[landlord_full_name]]</p>
                                <p>a</p>
                                <p><strong>Najemcą:</strong> [[tenant_full_name]]</p>
                                <p>dotyczący nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Stany liczników</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Przekazane klucze</h2>
                                <pre>[[keys_handed_over]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Stan techniczny nieruchomości i wyposażenia</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Wady/usterki/uwagi</h2>
                                <p>[[defects_comments]]</p>
                                <br/>
                                <p>Niniejszy protokół stanowi integralną część umowy najmu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Apartment Handover Protocol (Lease)',
                        'description' => 'Document prepared upon handing over the property to the Tenant, describing its condition and equipment.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROPERTY HANDOVER PROTOCOL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Regarding lease agreement dated: [[lease_agreement_date]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Prepared on <strong>[[protocol_date]]</strong> between:</p>
                                <p><strong>Landlord:</strong> [[landlord_full_name]]</p>
                                <p>and</p>
                                <p><strong>Tenant:</strong> [[tenant_full_name]]</p>
                                <p>concerning the property located at: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Meter Readings</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Keys Handed Over</h2>
                                <pre>[[keys_handed_over]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Technical Condition of Property and Equipment</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Defects/Faults/Comments</h2>
                                <p>[[defects_comments]]</p>
                                <br/>
                                <p>This protocol constitutes an integral part of the lease agreement.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Акт приймання-передачі квартири (оренда)',
                        'description' => 'Документ, що складається при передачі нерухомості Орендарю, описуючи її стан та обладнання.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ ПРИЙМАННЯ-ПЕРЕДАЧІ НЕРУХОМОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Щодо договору оренди від: [[lease_agreement_date]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Складено <strong>[[protocol_date]]</strong> між:</p>
                                <p><strong>Орендодавцем:</strong> [[landlord_full_name]]</p>
                                <p>та</p>
                                <p><strong>Орендарем:</strong> [[tenant_full_name]]</p>
                                <p>щодо нерухомості, розташованої за адресою: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Показники лічильників</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Передані ключі</h2>
                                <pre>[[keys_handed_over]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Технічний стан нерухомості та обладнання</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Дефекти/несправності/примітки</h2>
                                <p>[[defects_comments]]</p>
                                <br/>
                                <p>Цей протокол є невід\'ємною частиною договору оренди.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Wohnungsübergabeprotokoll (Miete)',
                        'description' => 'Dokument, das bei der Übergabe der Immobilie an den Mieter erstellt wird und deren Zustand und Ausstattung beschreibt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">IMMOBILIENÜBERGABEPROTOKOLL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Betrifft Mietvertrag vom: [[lease_agreement_date]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Erstellt am <strong>[[protocol_date]]</strong> zwischen:</p>
                                <p><strong>Vermieter:</strong> [[landlord_full_name]]</p>
                                <p>und</p>
                                <p><strong>Mieter:</strong> [[tenant_full_name]]</p>
                                <p>bezüglich der Immobilie unter der Adresse: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Zählerstände</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Übergebene Schlüssel</h2>
                                <pre>[[keys_handed_over]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Technischer Zustand der Immobilie und Ausstattung</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Mängel/Fehler/Anmerkungen</h2>
                                <p>[[defects_comments]]</p>
                                <br/>
                                <p>Dieses Protokoll ist integraler Bestandteil des Mietvertrags.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Опись имущества при сдаче в аренду / Inventory of Property for Lease ---
            [
                'slug' => 'inventory-lease-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"inventory_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia inwentaryzacji","en":"Inventory Date","uk":"Дата складання інвентаризації","de":"Inventurdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"lease_agreement_date","type":"date","required":true,"labels":{"pl":"Data umowy najmu","en":"Lease Agreement Date","uk":"Дата договору оренди","de":"Mietvertragsdatum"}},
                    {"name":"room_or_area","type":"text","required":true,"labels":{"pl":"Pomieszczenie/obszar (np. salon, kuchnia, sypialnia)","en":"Room/area (e.g., living room, kitchen, bedroom)","uk":"Приміщення/зона (напр., вітальня, кухня, спальня)","de":"Raum/Bereich (z.B. Wohnzimmer, Küche, Schlafzimmer)"}},
                    {"name":"item_list","type":"textarea","required":true,"labels":{"pl":"Lista przedmiotów (nazwa, ilość, stan, uwagi)","en":"List of items (name, quantity, condition, notes)","uk":"Список предметів (назва, кількість, стан, примітки)","de":"Liste der Gegenstände (Name, Menge, Zustand, Anmerkungen)"}},
                    {"name":"general_comments","type":"textarea","required":false,"labels":{"pl":"Ogólne uwagi dotyczące stanu nieruchomości (opcjonalnie)","en":"General comments on property condition (optional)","uk":"Загальні примітки щодо стану нерухомості (необов\'язково)","de":"Allgemeine Anmerkungen zum Zustand der Immobilie (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Protokół inwentaryzacyjny wyposażenia nieruchomości (najem)',
                        'description' => 'Dokument szczegółowo opisujący wyposażenie nieruchomości i jego stan w momencie przekazania Najemcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ INWENTARYZACYJNY WYPOSAŻENIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Dotyczy umowy najmu z dnia: [[lease_agreement_date]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sporządzony w dniu <strong>[[inventory_date]]</strong> pomiędzy:</p>
                                <p><strong>Wynajmującym:</strong> [[landlord_full_name]]</p>
                                <p>a</p>
                                <p><strong>Najemcą:</strong> [[tenant_full_name]]</p>
                                <p>dotyczący wyposażenia nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Wyposażenie pomieszczenia: [[room_or_area]]</h2>
                                <pre>[[item_list]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Ogólne uwagi dotyczące stanu nieruchomości</h2>
                                <p>[[general_comments]]</p>
                                <br/>
                                <p>Niniejszy protokół stanowi integralną część umowy najmu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Inventory of Property Equipment (Lease)',
                        'description' => 'A document detailing the property\'s equipment and its condition at the time of handover to the Tenant.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROPERTY EQUIPMENT INVENTORY PROTOCOL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Regarding lease agreement dated: [[lease_agreement_date]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Prepared on <strong>[[inventory_date]]</strong> between:</p>
                                <p><strong>Landlord:</strong> [[landlord_full_name]]</p>
                                <p>and</p>
                                <p><strong>Tenant:</strong> [[tenant_full_name]]</p>
                                <p>concerning the equipment of the property located at: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Room Equipment: [[room_or_area]]</h2>
                                <pre>[[item_list]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. General Comments on Property Condition</h2>
                                <p>[[general_comments]]</p>
                                <br/>
                                <p>This protocol constitutes an integral part of the lease agreement.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Протокол інвентаризації обладнання нерухомості (оренда)',
                        'description' => 'Документ, що детально описує обладнання нерухомості та її стан на момент передачі Орендарю.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПРОТОКОЛ ІНВЕНТАРИЗАЦІЇ ОБЛАДНАННЯ НЕРУХОМОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Щодо договору оренди від: [[lease_agreement_date]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Складено <strong>[[inventory_date]]</strong> між:</p>
                                <p><strong>Орендодавцем:</strong> [[landlord_full_name]]</p>
                                <p>та</p>
                                <p><strong>Орендарем:</strong> [[tenant_full_name]]</p>
                                <p>щодо обладнання нерухомості, розташованої за адресою: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Обладнання приміщення: [[room_or_area]]</h2>
                                <pre>[[item_list]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Загальні примітки щодо стану нерухомості</h2>
                                <p>[[general_comments]]</p>
                                <br/>
                                <p>Цей протокол є невід\'ємною частиною договору оренди.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Inventarprotokoll der Immobilienausstattung (Miete)',
                        'description' => 'Ein Dokument, das die Ausstattung der Immobilie und ihren Zustand zum Zeitpunkt der Übergabe an den Mieter detailliert beschreibt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">INVENTARPROTOKOLL DER IMMOBILIENAUSSTATTUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Betrifft Mietvertrag vom: [[lease_agreement_date]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Erstellt am <strong>[[inventory_date]]</strong> zwischen:</p>
                                <p><strong>Vermieter:</strong> [[landlord_full_name]]</p>
                                <p>und</p>
                                <p><strong>Mieter:</strong> [[tenant_full_name]]</p>
                                <p>bezüglich der Ausstattung der Immobilie unter der Adresse: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Zimmerausstattung: [[room_or_area]]</h2>
                                <pre>[[item_list]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Allgemeine Anmerkungen zum Zustand der Immobilie</h2>
                                <p>[[general_comments]]</p>
                                <br/>
                                <p>Dieses Protokoll ist integraler Bestandteil des Mietvertrags.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Расписка в получении залога за аренду / Receipt of Rental Deposit ---
            [
                'slug' => 'receipt-rental-deposit-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"receipt_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia pokwitowania","en":"Receipt Date","uk":"Дата складання розписки","de":"Quittungsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres Wynajmującego","en":"Landlord\'s Address","uk":"Адреса Орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres Najemcy","en":"Tenant\'s Address","uk":"Адреса Орендаря","de":"Adresse des Mieters"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Kwota otrzymanej kaucji","en":"Amount of Deposit Received","uk":"Сума отриманої застави","de":"Erhaltener Kautionsbetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"lease_agreement_date","type":"date","required":true,"labels":{"pl":"Data umowy najmu","en":"Lease Agreement Date","uk":"Дата договору оренди","de":"Mietvertragsdatum"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pokwitowanie otrzymania kaucji za najem',
                        'description' => 'Dokument potwierdzający otrzymanie kaucji od Najemcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POKWITOWANIE OTRZYMANIA KAUCJI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[receipt_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[landlord_full_name]]</strong>, zamieszkały/a w [[landlord_address]], niniejszym potwierdzam otrzymanie od Pana/Pani <strong>[[tenant_full_name]]</strong>, zamieszkałego/ej w [[tenant_address]], kwoty <strong>[[deposit_amount]] [[currency]]</strong> tytułem kaucji za najem nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>, zgodnie z umową najmu z dnia [[lease_agreement_date]].</p>
                                <br/>
                                <p>Kaucja zostanie zwrócona Najemcy po zakończeniu najmu, zgodnie z warunkami umowy.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>Wynajmujący (odbierający)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Receipt of Rental Deposit',
                        'description' => 'Document confirming receipt of a deposit from the Tenant.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECEIPT OF RENTAL DEPOSIT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[receipt_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[landlord_full_name]]</strong>, residing at [[landlord_address]], hereby confirm receipt from Mr./Ms. <strong>[[tenant_full_name]]</strong>, residing at [[tenant_address]], the amount of <strong>[[deposit_amount]] [[currency]]</strong> as a deposit for the lease of the property located at: <strong>[[property_address]]</strong>, in accordance with the lease agreement dated [[lease_agreement_date]].</p>
                                <br/>
                                <p>The deposit will be returned to the Tenant upon termination of the lease, in accordance with the terms of the agreement.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>Landlord (receiving)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Розписка про отримання застави за оренду',
                        'description' => 'Документ, що підтверджує отримання застави від Орендаря.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РОЗПИСКА ПРО ОТРИМАННЯ ЗАСТАВИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: [[receipt_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[landlord_full_name]]</strong>, який/яка проживає за адресою [[landlord_address]], цим підтверджую отримання від Пана/Пані <strong>[[tenant_full_name]]</strong>, який/яка проживає за адресою [[tenant_address]], суми <strong>[[deposit_amount]] [[currency]]</strong> як застави за оренду нерухомості, розташованої за адресою: <strong>[[property_address]]</strong>, згідно з договором оренди від [[lease_agreement_date]].</p>
                                <br/>
                                <p>Застава буде повернута Орендарю після закінчення оренди, відповідно до умов договору.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>Орендодавець (отримувач)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Quittung über den Erhalt der Mietkaution',
                        'description' => 'Dokument, das den Erhalt einer Kaution vom Mieter bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">QUITTUNG ÜBER DEN ERHALT DER KAUTION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[receipt_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[landlord_full_name]]</strong>, wohnhaft in [[landlord_address]], bestätige hiermit den Erhalt von Herrn/Frau <strong>[[tenant_full_name]]</strong>, wohnhaft in [[tenant_address]], des Betrags von <strong>[[deposit_amount]] [[currency]]</strong> als Kaution für die Miete der Immobilie unter der Adresse: <strong>[[property_address]]</strong>, gemäß dem Mietvertrag vom [[lease_agreement_date]].</p>
                                <br/>
                                <p>Die Kaution wird dem Mieter nach Beendigung des Mietverhältnisses gemäß den Vertragsbedingungen zurückerstattet.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>Vermieter (Empfänger)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Соглашение о расторжении договора аренды / Lease Termination Agreement ---
            [
                'slug' => 'lease-termination-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia porozumienia","en":"Agreement Date","uk":"Дата укладення угоди","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","de":"Vollständний Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres Wynajmującego","en":"Landlord\'s Address","uk":"Адреса Орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres Najemcy","en":"Tenant\'s Address","uk":"Адреса Орендаря","de":"Adresse des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"original_lease_date","type":"date","required":true,"labels":{"pl":"Data pierwotnej umowy najmu","en":"Original Lease Date","uk":"Дата первинного договору оренди","de":"Datum des ursprünglichen Mietvertrags"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"pl":"Data rozwiązania umowy","en":"Termination Date","uk":"Дата розірвання договору","de":"Kündigungsdatum"}},
                    {"name":"deposit_return_terms","type":"textarea","required":true,"labels":{"pl":"Warunki zwrotu kaucji","en":"Deposit return terms","uk":"Умови повернення застави","de":"Bedingungen für die Kautionsrückzahlung"}},
                    {"name":"other_agreements","type":"textarea","required":false,"labels":{"pl":"Inne uzgodnienia (np. rozliczenie mediów)","en":"Other agreements (e.g., utility settlement)","uk":"Інші домовленості (напр., розрахунок комунальних послуг)","de":"Sonstige Vereinbarungen (z.B. Nebenkostenabrechnung)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Porozumienie o rozwiązaniu umowy najmu',
                        'description' => 'Dokument formalizujący zgodne rozwiązanie umowy najmu przez strony.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POROZUMIENIE O ROZWIĄZANIU UMOWY NAJMU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarte w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Wynajmującym:</strong> [[landlord_full_name]], zamieszkałym/ą w [[landlord_address]],</p>
                                <p>a</p>
                                <p><strong>Najemcą:</strong> [[tenant_full_name]], zamieszkałym/ą w [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot porozumienia</h2>
                                <p>Strony zgodnie postanawiają rozwiązać umowę najmu nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>, zawartą w dniu [[original_lease_date]], z dniem <strong>[[termination_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Warunki rozwiązania</h2>
                                <p>1. Warunki zwrotu kaucji: [[deposit_return_terms]].</p>
                                <p>2. Inne uzgodnienia: [[other_agreements]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Postanowienia końcowe</h2>
                                <p>Niniejsze porozumienie sporządzono w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Lease Termination Agreement',
                        'description' => 'Document formalizing the amicable termination of a lease agreement by the parties.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LEASE TERMINATION AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Landlord:</strong> [[landlord_full_name]], residing at [[landlord_address]],</p>
                                <p>and</p>
                                <p><strong>Tenant:</strong> [[tenant_full_name]], residing at [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of Agreement</h2>
                                <p>The parties mutually agree to terminate the lease agreement for the property located at: <strong>[[property_address]]</strong>, concluded on [[original_lease_date]], effective <strong>[[termination_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Termination Terms</h2>
                                <p>1. Deposit return terms: [[deposit_return_terms]].</p>
                                <p>2. Other agreements: [[other_agreements]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Final Provisions</h2>
                                <p>This agreement has been drawn up in two identical copies, one for each party.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про розірвання договору оренди',
                        'description' => 'Документ, що формалізує згоду сторін на розірвання договору оренди.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА ПРО РОЗІРВАННЯ ДОГОВОРУ ОРЕНДИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Орендодавцем:</strong> [[landlord_full_name]], який/яка проживає за адресою [[landlord_address]],</p>
                                <p>та</p>
                                <p><strong>Орендарем:</strong> [[tenant_full_name]], який/яка проживає за адресою [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет угоди</h2>
                                <p>Сторони за взаємною згодою вирішують розірвати договір оренди нерухомості, розташованої за адресою: <strong>[[property_address]]</strong>, укладений [[original_lease_date]], з <strong>[[termination_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Умови розірвання</h2>
                                <p>1. Умови повернення застави: [[deposit_return_terms]].</p>
                                <p>2. Інші домовленості: [[other_agreements]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Прикінцеві положення</h2>
                                <p>Ця угода складена у двох однакових примірниках, по одному для кожної сторони.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Mietaufhebungsvertrag',
                        'description' => 'Dokument, das die einvernehmliche Beendigung eines Mietvertrags durch die Parteien formalisiert.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETAUFHEBUNGSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Vermieter:</strong> [[landlord_full_name]], wohnhaft in [[landlord_address]],</p>
                                <p>und</p>
                                <p><strong>Mieter:</strong> [[tenant_full_name]], wohnhaft in [[tenant_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Gegenstand der Vereinbarung</h2>
                                <p>Die Parteien vereinbaren einvernehmlich, den Mietvertrag für die Immobilie unter der Adresse: <strong>[[property_address]]</strong>, geschlossen am [[original_lease_date]], zum <strong>[[termination_date]]</strong> zu beenden.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Bedingungen der Beendigung</h2>
                                <p>1. Bedingungen für die Kautionsrückzahlung: [[deposit_return_terms]].</p>
                                <p>2. Sonstige Vereinbarungen: [[other_agreements]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Schlussbestimmungen</h2>
                                <p>Diese Vereinbarung wurde in zwei gleichlautenden Exemplaren ausgefertigt, je eines für jede Partei.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Уведомление о повышении арендной платы / Rent Increase Notification ---
            [
                'slug' => 'rent-increase-notification-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"notification_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia zawiadomienia","en":"Notification Date","uk":"Дата складання повідомлення","de":"Benachrichtigungsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres Wynajmującego","en":"Landlord\'s Address","uk":"Адреса Орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres Najemcy","en":"Tenant\'s Address","uk":"Адреса Орендаря","de":"Adresse des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"current_rent_amount","type":"number","required":true,"labels":{"pl":"Obecna wysokość czynszu","en":"Current Rent Amount","uk":"Поточна сума орендної плати","de":"Aktuelle Miethöhe"}},
                    {"name":"new_rent_amount","type":"number","required":true,"labels":{"pl":"Nowa wysokość czynszu","en":"New Rent Amount","uk":"Нова сума орендної плати","de":"Neue Miethöhe"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"effective_date","type":"date","required":true,"labels":{"pl":"Data wejścia w życie nowej stawki","en":"Effective Date of New Rate","uk":"Дата набрання чинності новою ставкою","de":"Datum des Inkrafttretens des neuen Satzes"}},
                    {"name":"reason_for_increase","type":"textarea","required":false,"labels":{"pl":"Uzasadnienie podwyżki (opcjonalnie)","en":"Reason for increase (optional)","uk":"Обґрунтування підвищення (необов\'язково)","de":"Begründung der Erhöhung (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zawiadomienie o podwyżce czynszu',
                        'description' => 'Formalne zawiadomienie Najemcy o podwyższeniu czynszu najmu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZAWIADOMIENIE O PODWYŻCE CZYNSZU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[landlord_full_name]]<br>[[landlord_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Niniejszym zawiadamiam o podwyższeniu czynszu za najem nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>.</p>
                                <p>Obecna wysokość czynszu wynosi: [[current_rent_amount]] [[currency]].</p>
                                <p>Nowa wysokość czynszu będzie wynosić: <strong>[[new_rent_amount]] [[currency]]</strong> miesięcznie.</p>
                                <p>Nowa stawka czynszu wchodzi w życie z dniem: <strong>[[effective_date]]</strong>.</p>
                                <p>Uzasadnienie podwyżki: [[reason_for_increase]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Rent Increase Notification',
                        'description' => 'Formal notification to the Tenant about a rent increase.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RENT INCREASE NOTIFICATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[landlord_full_name]]<br>[[landlord_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>This is to notify you of a rent increase for the property located at: <strong>[[property_address]]</strong>.</p>
                                <p>The current rent amount is: [[current_rent_amount]] [[currency]].</p>
                                <p>The new rent amount will be: <strong>[[new_rent_amount]] [[currency]]</strong> per month.</p>
                                <p>The new rent rate comes into effect on: <strong>[[effective_date]]</strong>.</p>
                                <p>Reason for increase: [[reason_for_increase]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Повідомлення про підвищення орендної плати',
                        'description' => 'Офіційне повідомлення Орендаря про підвищення орендної плати.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОВІДОМЛЕННЯ ПРО ПІДВИЩЕННЯ ОРЕНДНОЇ ПЛАТИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[landlord_full_name]]<br>[[landlord_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Цим повідомляю про підвищення орендної плати за оренду нерухомості, розташованої за адресою: <strong>[[property_address]]</strong>.</p>
                                <p>Поточна сума орендної плати становить: [[current_rent_amount]] [[currency]].</p>
                                <p>Нова сума орендної плати становитиме: <strong>[[new_rent_amount]] [[currency]]</strong> щомісячно.</p>
                                <p>Нова ставка орендної плати набуває чинності з: <strong>[[effective_date]]</strong>.</p>
                                <p>Обґрунтування підвищення: [[reason_for_increase]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Mietpreiserhöhungsmitteilung',
                        'description' => 'Formelle Mitteilung an den Mieter über eine Mietpreiserhöhung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETPREISERHÖHUNGSMITTEILUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[landlord_full_name]]<br>[[landlord_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Hiermit teile ich Ihnen die Erhöhung der Miete für die Immobilie unter der Adresse: <strong>[[property_address]]</strong> mit.</p>
                                <p>Die aktuelle Miethöhe beträgt: [[current_rent_amount]] [[currency]].</p>
                                <p>Die neue Miethöhe beträgt: <strong>[[new_rent_amount]] [[currency]]</strong> monatlich.</p>
                                <p>Der neue Mietzins tritt in Kraft am: <strong>[[effective_date]]</strong>.</p>
                                <p>Begründung der Erhöhung: [[reason_for_increase]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p>___________________</p>
                                <p>([[landlord_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Требование о погашении задолженности по аренде / Demand for Rent Arrears Payment ---
            [
                'slug' => 'demand-rent-arrears-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"demand_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia wezwania","en":"Demand Date","uk":"Дата складання вимоги","de":"Datum der Mahnung"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres Wynajmującego","en":"Landlord\'s Address","uk":"Адреса Орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Najemcy","en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres Najemcy","en":"Tenant\'s Address","uk":"Адреса Орендаря","de":"Adresse des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"original_lease_date","type":"date","required":true,"labels":{"pl":"Data umowy najmu","en":"Lease Agreement Date","uk":"Дата договору оренди","de":"Mietvertragsdatum"}},
                    {"name":"arrears_period","type":"text","required":true,"labels":{"pl":"Okres zaległości (np. od-do, miesiące)","en":"Arrears period (e.g., from-to, months)","uk":"Період заборгованості (напр., від-до, місяці)","de":"Rückstandszeitraum (z.B. von-bis, Monate)"}},
                    {"name":"arrears_amount","type":"number","required":true,"labels":{"pl":"Kwota zaległego czynszu","en":"Amount of Rent Arrears","uk":"Сума заборгованості з орендної плати","de":"Betrag der Mietrückstände"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"additional_charges","type":"textarea","required":false,"labels":{"pl":"Dodatkowe opłaty (np. odsetki, koszty upomnień)","en":"Additional charges (e.g., interest, reminder fees)","uk":"Додаткові платежі (напр., відсотки, витрати на нагадування)","de":"Zusätzliche Gebühren (z.B. Zinsen, Mahngebühren)"}},
                    {"name":"payment_deadline","type":"date","required":true,"labels":{"pl":"Termin spłaty zaległości","en":"Arrears Payment Deadline","uk":"Термін сплати заборгованості","de":"Frist zur Begleichung der Rückstände"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wezwanie do zapłaty zaległego czynszu',
                        'description' => 'Formalne wezwanie Najemcy do uregulowania zaległości w płatnościach czynszu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WEZWANIE DO ZAPŁATY ZALEGŁEGO CZYNSZU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[landlord_full_name]]<br>[[landlord_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Niniejszym wzywam Pana/Panią do natychmiastowej zapłaty zaległego czynszu za najem nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>, wynikającego z umowy najmu z dnia [[original_lease_date]].</p>
                                <p>Zaległość dotyczy okresu: <strong>[[arrears_period]]</strong> i wynosi: <strong>[[arrears_amount]] [[currency]]</strong>.</p>
                                <p>Dodatkowe opłaty: [[additional_charges]].</p>
                                <p>Całkowita kwota do zapłaty: [[total_amount_due]] [[currency]].</p>
                                <p>Proszę o uregulowanie powyższej kwoty w terminie do dnia <strong>[[payment_deadline]]</strong> na konto bankowe Wynajmującego.</p>
                                <p>W przypadku braku zapłaty w wyznaczonym terminie, sprawa zostanie skierowana na drogę sądową, co wiązać się będzie z dodatkowymi kosztami.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Demand for Rent Arrears Payment',
                        'description' => 'Formal demand to the Tenant to settle outstanding rent payments.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DEMAND FOR RENT ARREARS PAYMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[landlord_full_name]]<br>[[landlord_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>I hereby demand immediate payment of outstanding rent for the property located at: <strong>[[property_address]]</strong>, arising from the lease agreement dated [[original_lease_date]].</p>
                                <p>The arrears concern the period: <strong>[[arrears_period]]</strong> and amount to: <strong>[[arrears_amount]] [[currency]]</strong>.</p>
                                <p>Additional charges: [[additional_charges]].</p>
                                <p>Total amount due: [[total_amount_due]] [[currency]].</p>
                                <p>Please settle the above amount by <strong>[[payment_deadline]]</strong> to the Landlord\'s bank account.</p>
                                <p>In case of non-payment by the specified deadline, the matter will be referred to court, which will entail additional costs.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Вимога про погашення заборгованості з орендної плати',
                        'description' => 'Офіційна вимога до Орендаря про врегулювання заборгованості з орендної плати.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ВИМОГА ПРО ПОГАШЕННЯ ЗАБОРГОВАНОСТІ З ОРЕНДНОЇ ПЛАТИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[landlord_full_name]]<br>[[landlord_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Цим вимагаю негайної сплати заборгованості з орендної плати за оренду нерухомості, розташованої за адресою: <strong>[[property_address]]</strong>, що виникла з договору оренди від [[original_lease_date]].</p>
                                <p>Заборгованість стосується періоду: <strong>[[arrears_period]]</strong> і становить: <strong>[[arrears_amount]] [[currency]]</strong>.</p>
                                <p>Додаткові платежі: [[additional_charges]].</p>
                                <p>Загальна сума до сплати: [[total_amount_due]] [[currency]].</p>
                                <p>Прошу врегулювати вищезазначену суму до <strong>[[payment_deadline]]</strong> на банківський рахунок Орендодавця.</p>
                                <p>У разі несплати у встановлений термін, справа буде передана до суду, що потягне за собою додаткові витрати.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Mahnung zur Begleichung von Mietrückständen',
                        'description' => 'Formelle Aufforderung an den Mieter, ausstehende Mietzahlungen zu begleichen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MAHNUNG ZUR BEGLEICHUNG VON MIETRÜCKSTÄNDEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[landlord_full_name]]<br>[[landlord_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Hiermit fordere ich Sie zur sofortigen Zahlung der ausstehenden Miete für die Immobilie unter der Adresse: <strong>[[property_address]]</strong> auf, die aus dem Mietvertrag vom [[original_lease_date]] resultiert.</p>
                                <p>Die Rückstände betreffen den Zeitraum: <strong>[[arrears_period]]</strong> und belaufen sich auf: <strong>[[arrears_amount]] [[currency]]</strong>.</p>
                                <p>Zusätzliche Gebühren: [[additional_charges]].</p>
                                <p>Gesamtbetrag zur Zahlung: [[total_amount_due]] [[currency]].</p>
                                <p>Bitte begleichen Sie den oben genannten Betrag bis zum <strong>[[payment_deadline]]</strong> auf das Bankkonto des Vermieters.</p>
                                <p>Sollte die Zahlung nicht innerhalb der festgelegten Frist erfolgen, wird die Angelegenheit gerichtlich verfolgt, was mit zusätzlichen Kosten verbunden sein wird.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_full_name]])</p>
                            </div>'
                    ]
                ]
            ],
            // --- Предварительный договор купли-продажи квартиры / Preliminary Apartment Sale Agreement ---
            [
                'slug' => 'preliminary-apartment-sale-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"seller_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko sprzedającego","en":"Seller\'s Full Name","uk":"ПІБ продавця","de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedającego","en":"Seller\'s Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"seller_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości sprzedającego","en":"Seller\'s ID Number","uk":"Номер посвідчення продавця","de":"Ausweisnummer des Verkäufers"}},
                    {"name":"buyer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kupującego","en":"Buyer\'s Full Name","uk":"ПІБ покупця","de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres kupującego","en":"Buyer\'s Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"buyer_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości kupującego","en":"Buyer\'s ID Number","uk":"Номер посвідчення покупця","de":"Ausweisnummer des Käufers"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, miasto)","en":"Property Address (street, number, city)","uk":"Адреса нерухомості (вулиця, номер, місто)","de":"Adresse der Immobilie (Straße, Nummer, Stadt)"}},
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej","en":"Land and Mortgage Register Number","uk":"Номер іпотечної книги","de":"Grundbuchnummer"}},
                    {"name":"apartment_area","type":"number","required":true,"labels":{"pl":"Powierzchnia użytkowa mieszkania (m²)","en":"Usable area of apartment (m²)","uk":"Корисна площа квартири (м²)","de":"Nutzfläche der Wohnung (m²)"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"pl":"Cena sprzedaży (PLN)","en":"Sale Price (PLN)","uk":"Ціна продажу (PLN)","de":"Verkaufspreis (PLN)"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Kwota zadatku","en":"Deposit Amount","uk":"Сума завдатку","de":"Anzahlungsbetrag"}},
                    {"name":"final_agreement_date","type":"date","required":true,"labels":{"pl":"Planowana data zawarcia umowy przyrzeczonej","en":"Planned date of concluding the final agreement","uk":"Планована дата укладення остаточного договору","de":"Geplantes Datum des Abschlusses des endgültigen Vertrags"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne warunki (opcjonalnie)","en":"Other conditions (optional)","uk":"Інші умови (необов\'язково)","de":"Weitere Bedingungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Przedwstępna umowa sprzedaży mieszkania',
                        'description' => 'Umowa określająca warunki przyszłej sprzedaży mieszkania, w tym cenę, termin i zadatek.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PRZEDWSTĘPNA UMOWA SPRZEDAŻY MIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Sprzedającym:</strong> [[seller_full_name]], zamieszkałym/ą w [[seller_address]], legitymującym/ą się dowodem osobistym nr [[seller_id_number]],</p>
                                <p>a</p>
                                <p><strong>Kupującym:</strong> [[buyer_full_name]], zamieszkałym/ą w [[buyer_address]], legitymującym/ą się dowodem osobistym nr [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Sprzedający zobowiązuje się sprzedać, a Kupujący zobowiązuje się kupić lokal mieszkalny położony pod adresem: <strong>[[apartment_address]]</strong>, o powierzchni użytkowej [[apartment_area]] m², dla którego prowadzona jest księga wieczysta nr <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Cena i zadatek</h2>
                                <p>Cena sprzedaży nieruchomości wynosi: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Kupujący wpłacił Sprzedającemu zadatek w kwocie: <strong>[[deposit_amount]] PLN</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Termin zawarcia umowy przyrzeczonej</h2>
                                <p>Strony zobowiązują się do zawarcia umowy przyrzeczonej (ostatecznej umowy sprzedaży) w terminie do dnia <strong>[[final_agreement_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Inne warunki</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Sprzedający</p></td>
                                <td width="50%"><p>___________________<br>Kupujący</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Preliminary Apartment Sale Agreement',
                        'description' => 'An agreement outlining the terms of a future apartment sale, including price, deadline, and deposit.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PRELIMINARY APARTMENT SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Seller:</strong> [[seller_full_name]], residing in [[seller_address]], holding ID number [[seller_id_number]],</p>
                                <p>and</p>
                                <p><strong>Buyer:</strong> [[buyer_full_name]], residing in [[buyer_address]], holding ID number [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The Seller undertakes to sell, and the Buyer undertakes to buy the apartment located at: <strong>[[apartment_address]]</strong>, with a usable area of [[apartment_area]] m², for which Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong> is kept.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Price and Deposit</h2>
                                <p>The sale price of the property is: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>The Buyer paid the Seller a deposit in the amount of: <strong>[[deposit_amount]] PLN</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Deadline for Concluding the Final Agreement</h2>
                                <p>The parties undertake to conclude the final agreement (definitive sale agreement) by <strong>[[final_agreement_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Other Conditions</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Seller</p></td>
                                <td width="50%"><p>___________________<br>Buyer</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Попередній договір купівлі-продажу квартири',
                        'description' => 'Договір, що визначає умови майбутнього продажу квартири, включаючи ціну, термін та завдаток.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОПЕРЕДНІЙ ДОГОВІР КУПІВЛІ-ПРОДАЖУ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Продавцем:</strong> [[seller_full_name]], що проживає за адресою [[seller_address]], який/яка посвідчує особу за паспортом № [[seller_id_number]],</p>
                                <p>та</p>
                                <p><strong>Покупцем:</strong> [[buyer_full_name]], що проживає за адресою [[buyer_address]], який/яка посвідчує особу за паспортом № [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Продавець зобов\'язується продати, а Покупець зобов\'язується купити житлове приміщення, розташоване за адресою: <strong>[[apartment_address]]</strong>, корисною площею [[apartment_area]] м², для якого ведеться іпотечна книга № <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Ціна та завдаток</h2>
                                <p>Ціна продажу нерухомості становить: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Покупець сплатив Продавцю завдаток у сумі: <strong>[[deposit_amount]] PLN</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Термін укладення основного договору</h2>
                                <p>Сторони зобов\'язуються укласти основний договір (остаточний договір купівлі-продажу) до <strong>[[final_agreement_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Інші умови</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Продавець</p></td>
                                <td width="50%"><p>___________________<br>Покупець</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Vorvertrag zum Wohnungskauf',
                        'description' => 'Ein Vertrag, der die Bedingungen für den zukünftigen Verkauf einer Wohnung festlegt, einschließlich Preis, Frist und Anzahlung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VORVERTRAG ZUM WOHNUNGSKAUF</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Verkäufer:</strong> [[seller_full_name]], wohnhaft in [[seller_address]], Ausweis-Nr. [[seller_id_number]],</p>
                                <p>und</p>
                                <p><strong>Käufer:</strong> [[buyer_full_name]], wohnhaft in [[buyer_address]], Ausweis-Nr. [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Der Verkäufer verpflichtet sich, die Wohnung in: <strong>[[apartment_address]]</strong>, mit einer Nutzfläche von [[apartment_area]] m², für die das Grundbuch Nr. <strong>[[land_and_mortgage_register_number]]</strong> geführt wird, zu verkaufen, und der Käufer verpflichtet sich, diese zu kaufen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Preis und Anzahlung</h2>
                                <p>Der Verkaufspreis der Immobilie beträgt: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Der Käufer hat dem Verkäufer eine Anzahlung in Höhe von: <strong>[[deposit_amount]] PLN</strong> geleistet.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Frist für den Abschluss des Hauptvertrags</h2>
                                <p>Die Parteien verpflichten sich, den Hauptvertrag (endgültiger Kaufvertrag) bis zum <strong>[[final_agreement_date]]</strong> abzuschließen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Weitere Bedingungen</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Verkäufer</p></td>
                                <td width="50%"><p>___________________<br>Käufer</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор купли-продажи квартиры / Apartment Sale Agreement ---
            [
                'slug' => 'apartment-sale-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"seller_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko sprzedającego","en":"Seller\'s Full Name","uk":"ПІБ продавця","de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedającego","en":"Seller\'s Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"seller_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości sprzedającego","en":"Seller\'s ID Number","uk":"Номер посвідчення продавця","de":"Ausweisnummer des Verkäufers"}},
                    {"name":"buyer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kupującego","en":"Buyer\'s Full Name","uk":"ПІБ покупця","de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres kupującego","en":"Buyer\'s Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"buyer_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości kupującego","en":"Buyer\'s ID Number","uk":"Номер посвідчення покупця","de":"Ausweisnummer des Käufers"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, miasto)","en":"Property Address (street, number, city)","uk":"Адреса нерухомості (вулиця, номер, місто)","de":"Adresse der Immobilie (Straße, Nummer, Stadt)"}},
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej","en":"Land and Mortgage Register Number","uk":"Номер іпотечної книги","de":"Grundbuchnummer"}},
                    {"name":"apartment_area","type":"number","required":true,"labels":{"pl":"Powierzchnia użytkowa mieszkania (m²)","en":"Usable area of apartment (m²)","uk":"Корисна площа квартири (м²)","de":"Nutzfläche der Wohnung (m²)"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"pl":"Cena sprzedaży (PLN)","en":"Sale Price (PLN)","uk":"Ціна продажу (PLN)","de":"Verkaufspreis (PLN)"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}},
                    {"name":"handover_date","type":"date","required":true,"labels":{"pl":"Data wydania nieruchomości","en":"Property Handover Date","uk":"Дата передачі нерухомості","de":"Übergabedatum der Immobilie"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa sprzedaży mieszkania',
                        'description' => 'Standardowa umowa sprzedaży mieszkania, zawierająca wszystkie kluczowe warunki transakcji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA SPRZEDAŻY MIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Sprzedającym:</strong> [[seller_full_name]], zamieszkałym/ą w [[seller_address]], legitymującym/ą się dowodem osobistym nr [[seller_id_number]],</p>
                                <p>a</p>
                                <p><strong>Kupującym:</strong> [[buyer_full_name]], zamieszkałym/ą w [[buyer_address]], legitymującym/ą się dowodem osobistym nr [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Sprzedający sprzedaje, a Kupujący kupuje lokal mieszkalny położony pod adresem: <strong>[[apartment_address]]</strong>, o powierzchni użytkowej [[apartment_area]] m², dla którego prowadzona jest księga wieczysta nr <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Cena i warunki płatności</h2>
                                <p>Cena sprzedaży nieruchomości wynosi: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Wydanie nieruchomości</h2>
                                <p>Wydanie nieruchomości Kupującemu nastąpi w terminie do dnia <strong>[[handover_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Inne postanowienia</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Sprzedający</p></td>
                                <td width="50%"><p>___________________<br>Kupujący</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Apartment Sale Agreement',
                        'description' => 'A standard apartment sale agreement, containing all key transaction terms.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Seller:</strong> [[seller_full_name]], residing in [[seller_address]], holding ID number [[seller_id_number]],</p>
                                <p>and</p>
                                <p><strong>Buyer:</strong> [[buyer_full_name]], residing in [[buyer_address]], holding ID number [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The Seller sells, and the Buyer buys the apartment located at: <strong>[[apartment_address]]</strong>, with a usable area of [[apartment_area]] m², for which Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong> is kept.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Price and Payment Terms</h2>
                                <p>The sale price of the property is: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Property Handover</h2>
                                <p>The handover of the property to the Buyer will take place by <strong>[[handover_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Other Provisions</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Seller</p></td>
                                <td width="50%"><p>___________________<br>Buyer</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір купівлі-продажу квартири',
                        'description' => 'Стандартний договір купівлі-продажу квартири, що містить усі ключові умови угоди.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР КУПІВЛІ-ПРОДАЖУ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Продавцем:</strong> [[seller_full_name]], що проживає за адресою [[seller_address]], який/яка посвідчує особу за паспортом № [[seller_id_number]],</p>
                                <p>та</p>
                                <p><strong>Покупцем:</strong> [[buyer_full_name]], що проживає за адресою [[buyer_address]], який/яка посвідчує особу за паспортом № [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Продавець продає, а Покупець купує житлове приміщення, розташоване за адресою: <strong>[[apartment_address]]</strong>, корисною площею [[apartment_area]] м², для якого ведеться іпотечна книга № <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Ціна та умови оплати</h2>
                                <p>Ціна продажу нерухомості становить: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Передача нерухомості</h2>
                                <p>Передача нерухомості Покупцеві відбудеться до <strong>[[handover_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Інші положення</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Продавець</p></td>
                                <td width="50%"><p>___________________<br>Покупець</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Wohnungskaufvertrag',
                        'description' => 'Ein Standard-Wohnungskaufvertrag, der alle wichtigen Transaktionsbedingungen enthält.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHNUNGSKAUFVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Verkäufer:</strong> [[seller_full_name]], wohnhaft in [[seller_address]], Ausweis-Nr. [[seller_id_number]],</p>
                                <p>und</p>
                                <p><strong>Käufer:</strong> [[buyer_full_name]], wohnhaft in [[buyer_address]], Ausweis-Nr. [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Der Verkäufer verkauft, und der Käufer kauft die Wohnung in: <strong>[[apartment_address]]</strong>, mit einer Nutzfläche von [[apartment_area]] m², für die das Grundbuch Nr. <strong>[[land_and_mortgage_register_number]]</strong> geführt wird.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Preis und Zahlungsbedingungen</h2>
                                <p>Der Verkaufspreis der Immobilie beträgt: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Übergabe der Immobilie</h2>
                                <p>Die Übergabe der Immobilie an den Käufer erfolgt bis zum <strong>[[handover_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Weitere Bestimmungen</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Verkäufer</p></td>
                                <td width="50%"><p>___________________<br>Käufer</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор купли-продажи дома с земельным участком / House and Land Sale Agreement ---
            [
                'slug' => 'house-land-sale-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"seller_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko sprzedającego","en":"Seller\'s Full Name","uk":"ПІБ продавця","de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedającego","en":"Seller\'s Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"seller_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości sprzedającego","en":"Seller\'s ID Number","uk":"Номер посвідчення продавця","de":"Ausweisnummer des Verkäufers"}},
                    {"name":"buyer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kupującego","en":"Buyer\'s Full Name","uk":"ПІБ покупця","de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres kupującego","en":"Buyer\'s Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"buyer_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości kupującego","en":"Buyer\'s ID Number","uk":"Номер посвідчення покупця","de":"Ausweisnummer des Käufers"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, miasto)","en":"Property Address (street, number, city)","uk":"Адреса нерухомості (вулиця, номер, місто)","de":"Adresse der Immobilie (Straße, Nummer, Stadt)"}},
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej","en":"Land and Mortgage Register Number","uk":"Номер іпотечної книги","de":"Grundbuchnummer"}},
                    {"name":"house_area","type":"number","required":true,"labels":{"pl":"Powierzchnia użytkowa domu (m²)","en":"Usable area of house (m²)","uk":"Корисна площа будинку (м²)","de":"Nutzfläche des Hauses (m²)"}},
                    {"name":"land_area","type":"number","required":true,"labels":{"pl":"Powierzchnia działki (m²)","en":"Land area (m²)","uk":"Площа ділянки (м²)","de":"Grundstücksfläche (m²)"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"pl":"Cena sprzedaży (PLN)","en":"Sale Price (PLN)","uk":"Ціна продажу (PLN)","de":"Verkaufspreis (PLN)"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}},
                    {"name":"handover_date","type":"date","required":true,"labels":{"pl":"Data wydania nieruchomości","en":"Property Handover Date","uk":"Дата передачі нерухомості","de":"Übergabedatum der Immobilie"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa sprzedaży domu z działką',
                        'description' => 'Standardowa umowa sprzedaży domu wraz z przynależącą działką gruntu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA SPRZEDAŻY DOMU Z DZIAŁKĄ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Sprzedającym:</strong> [[seller_full_name]], zamieszkałym/ą w [[seller_address]], legitymującym/ą się dowodem osobistym nr [[seller_id_number]],</p>
                                <p>a</p>
                                <p><strong>Kupującym:</strong> [[buyer_full_name]], zamieszkałym/ą w [[buyer_address]], legitymującym/ą się dowodem osobistym nr [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Sprzedający sprzedaje, a Kupujący kupuje nieruchomość gruntową zabudowaną budynkiem mieszkalnym, położoną pod adresem: <strong>[[property_address]]</strong>, o powierzchni działki [[land_area]] m², oraz powierzchni użytkowej domu [[house_area]] m², dla której prowadzona jest księga wieczysta nr <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Cena i warunki płatności</h2>
                                <p>Cena sprzedaży nieruchomości wynosi: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Wydanie nieruchomości</h2>
                                <p>Wydanie nieruchomości Kupującemu nastąpi w terminie do dnia <strong>[[handover_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Inne postanowienia</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Sprzedający</p></td>
                                <td width="50%"><p>___________________<br>Kupujący</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'House and Land Sale Agreement',
                        'description' => 'A standard agreement for the sale of a house with an accompanying plot of land.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HOUSE AND LAND SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Seller:</strong> [[seller_full_name]], residing in [[seller_address]], holding ID number [[seller_id_number]],</p>
                                <p>and</p>
                                <p><strong>Buyer:</strong> [[buyer_full_name]], residing in [[buyer_address]], holding ID number [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The Seller sells, and the Buyer buys the developed real estate with a residential building, located at: <strong>[[property_address]]</strong>, with a plot area of [[land_area]] m², and a usable house area of [[house_area]] m², for which Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong> is kept.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Price and Payment Terms</h2>
                                <p>The sale price of the property is: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Property Handover</h2>
                                <p>The handover of the property to the Buyer will take place by <strong>[[handover_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Other Provisions</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Seller</p></td>
                                <td width="50%"><p>___________________<br>Buyer</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір купівлі-продажу будинку із земельною ділянкою',
                        'description' => 'Стандартний договір купівлі-продажу будинку разом із прилеглою земельною ділянкою.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР КУПІВЛІ-ПРОДАЖУ БУДИНКУ З ЗЕМЕЛЬНОЮ ДІЛЯНКОЮ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Продавцем:</strong> [[seller_full_name]], що проживає за адресою [[seller_address]], який/яка посвідчує особу за паспортом № [[seller_id_number]],</p>
                                <p>та</p>
                                <p><strong>Покупцем:</strong> [[buyer_full_name]], що проживає за адресою [[buyer_address]], який/яка посвідчує особу за паспортом № [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Продавець продає, а Покупець купує земельну ділянку, забудовану житловим будинком, розташовану за адресою: <strong>[[property_address]]</strong>, площею ділянки [[land_area]] м², та корисною площею будинку [[house_area]] м², для якої ведеться іпотечна книга № <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Ціна та умови оплати</h2>
                                <p>Ціна продажу нерухомості становить: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Передача нерухомості</h2>
                                <p>Передача нерухомості Покупцеві відбудеться до <strong>[[handover_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Інші положення</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Продавець</p></td>
                                <td width="50%"><p>___________________<br>Покупець</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Kaufvertrag Haus mit Grundstück',
                        'description' => 'Ein Standardvertrag für den Verkauf eines Hauses mit einem dazugehörigen Grundstück.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KAUFVERTRAG HAUS MIT GRUNDSTÜCK</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Verkäufer:</strong> [[seller_full_name]], wohnhaft in [[seller_address]], Ausweis-Nr. [[seller_id_number]],</p>
                                <p>und</p>
                                <p><strong>Käufer:</strong> [[buyer_full_name]], wohnhaft in [[buyer_address]], Ausweis-Nr. [[buyer_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Der Verkäufer verkauft, und der Käufer kauft das bebaute Grundstück mit einem Wohngebäude, gelegen in: <strong>[[property_address]]</strong>, mit einer Grundstücksfläche von [[land_area]] m² und einer Nutzfläche des Hauses von [[house_area]] m², für die das Grundbuch Nr. <strong>[[land_and_mortgage_register_number]]</strong> geführt wird.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Preis und Zahlungsbedingungen</h2>
                                <p>Der Verkaufspreis der Immobilie beträgt: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Übergabe der Immobilie</h2>
                                <p>Die Übergabe der Immobilie an den Käufer erfolgt bis zum <strong>[[handover_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Weitere Bestimmungen</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Verkäufer</p></td>
                                <td width="50%"><p>___________________<br>Käufer</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор дарения квартиры / Apartment Donation Agreement ---
            [
                'slug' => 'apartment-donation-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"donor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko darczyńcy","en":"Donor\'s Full Name","uk":"ПІБ дарувальника","de":"Vollständiger Name des Schenkers"}},
                    {"name":"donor_address","type":"text","required":true,"labels":{"pl":"Adres darczyńcy","en":"Donor\'s Address","uk":"Адреса дарувальника","de":"Adresse des Schenkers"}},
                    {"name":"donor_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości darczyńcy","en":"Donor\'s ID Number","uk":"Номер посвідчення дарувальника","de":"Ausweisnummer des Schenkers"}},
                    {"name":"donee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko obdarowanego","en":"Donee\'s Full Name","uk":"ПІБ обдарованого","de":"Vollständiger Name des Beschenkten"}},
                    {"name":"donee_address","type":"text","required":true,"labels":{"pl":"Adres obdarowanego","en":"Donee\'s Address","uk":"Адреса обдарованого","de":"Adresse des Beschenkten"}},
                    {"name":"donee_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości obdarowanego","en":"Donee\'s ID Number","uk":"Номер посвідчення обдарованого","de":"Ausweisnummer des Beschenkten"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, miasto)","en":"Property Address (street, number, city)","uk":"Адреса нерухомості (вулиця, номер, місто)","de":"Adresse der Immobilie (Straße, Nummer, Stadt)"}},
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej","en":"Land and Mortgage Register Number","uk":"Номер іпотечної книги","de":"Grundbuchnummer"}},
                    {"name":"apartment_area","type":"number","required":true,"labels":{"pl":"Powierzchnia użytkowa mieszkania (m²)","en":"Usable area of apartment (m²)","uk":"Корисна площа квартири (м²)","de":"Nutzfläche der Wohnung (m²)"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa darowizny mieszkania',
                        'description' => 'Umowa darowizny, na mocy której darczyńca przekazuje mieszkanie obdarowanemu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA DAROWIZNY MIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Darczyńcą:</strong> [[donor_full_name]], zamieszkałym/ą w [[donor_address]], legitymującym/ą się dowodem osobistym nr [[donor_id_number]],</p>
                                <p>a</p>
                                <p><strong>Obdarowanym:</strong> [[donee_full_name]], zamieszkałym/ą w [[donee_address]], legitymującym/ą się dowodem osobistym nr [[donee_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Darczyńca daruje, a Obdarowany przyjmuje darowiznę lokalu mieszkalnego położonego pod adresem: <strong>[[apartment_address]]</strong>, o powierzchni użytkowej [[apartment_area]] m², dla którego prowadzona jest księga wieczysta nr <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Oświadczenia stron</h2>
                                <p>Darczyńca oświadcza, że darowana nieruchomość jest wolna od obciążeń i roszczeń osób trzecich.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Inne postanowienia</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Darczyńca</p></td>
                                <td width="50%"><p>___________________<br>Obdarowany</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Apartment Donation Agreement',
                        'description' => 'A donation agreement under which the donor transfers an apartment to the donee.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT DONATION AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Donor:</strong> [[donor_full_name]], residing in [[donor_address]], holding ID number [[donor_id_number]],</p>
                                <p>and</p>
                                <p><strong>Donee:</strong> [[donee_full_name]], residing in [[donee_address]], holding ID number [[donee_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The Donor donates, and the Donee accepts the donation of the apartment located at: <strong>[[apartment_address]]</strong>, with a usable area of [[apartment_area]] m², for which Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong> is kept.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Declarations of the Parties</h2>
                                <p>The Donor declares that the donated property is free from encumbrances and third-party claims.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Other Provisions</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Donor</p></td>
                                <td width="50%"><p>___________________<br>Donee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір дарування квартири',
                        'description' => 'Договір дарування, за яким дарувальник передає квартиру обдарованому.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ДАРУВАННЯ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Дарувальником:</strong> [[donor_full_name]], що проживає за адресою [[donor_address]], який/яка посвідчує особу за паспортом № [[donor_id_number]],</p>
                                <p>та</p>
                                <p><strong>Обдарованим:</strong> [[donee_full_name]], що проживає за адресою [[donee_address]], який/яка посвідчує особу за паспортом № [[donee_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Дарувальник дарує, а Обдарований приймає дарунок житлового приміщення, розташованого за адресою: <strong>[[apartment_address]]</strong>, корисною площею [[apartment_area]] м², для якого ведеться іпотечна книга № <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Заяви сторін</h2>
                                <p>Дарувальник заявляє, що подарована нерухомість вільна від обтяжень та претензій третіх осіб.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Інші положення</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Дарувальник</p></td>
                                <td width="50%"><p>___________________<br>Обдарований</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Wohnungs-Schenkungsvertrag',
                        'description' => 'Ein Schenkungsvertrag, durch den der Schenker eine Wohnung an den Beschenkten überträgt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHNUNGS-SCHENKUNGSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Schenker:</strong> [[donor_full_name]], wohnhaft in [[donor_address]], Ausweis-Nr. [[donor_id_number]],</p>
                                <p>und</p>
                                <p><strong>Beschenkter:</strong> [[donee_full_name]], wohnhaft in [[donee_address]], Ausweis-Nr. [[donee_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Der Schenker schenkt, und der Beschenkte nimmt die Schenkung der Wohnung in: <strong>[[apartment_address]]</strong>, mit einer Nutzfläche von [[apartment_area]] m², für die das Grundbuch Nr. <strong>[[land_and_mortgage_register_number]]</strong> geführt wird, an.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Erklärungen der Parteien</h2>
                                <p>Der Schenker erklärt, dass die geschenkte Immobilie frei von Belastungen und Ansprüchen Dritter ist.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Weitere Bestimmungen</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Schenker</p></td>
                                <td width="50%"><p>___________________<br>Beschenkter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор дарения доли в квартире / Apartment Share Donation Agreement ---
            [
                'slug' => 'apartment-share-donation-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsдата"}},
                    {"name":"donor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko darczyńcy","en":"Donor\'s Full Name","uk":"ПІБ дарувальника","de":"Vollständiger Name des Schenkers"}},
                    {"name":"donor_address","type":"text","required":true,"labels":{"pl":"Adres darczyńcy","en":"Donor\'s Address","uk":"Адреса дарувальника","de":"Adresse des Schenkers"}},
                    {"name":"donor_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości darczyńcy","en":"Donor\'s ID Number","uk":"Номер посвідчення дарувальника","de":"Ausweisnummer des Schenkers"}},
                    {"name":"donee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko obdarowanego","en":"Donee\'s Full Name","uk":"ПІБ обдарованого","de":"Vollständiger Name des Beschenkten"}},
                    {"name":"donee_address","type":"text","required":true,"labels":{"pl":"Adres obdarowanego","en":"Donee\'s Address","uk":"Адреса обдарованого","de":"Adresse des Beschenkten"}},
                    {"name":"donee_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości obdarowanego","en":"Donee\'s ID Number","uk":"Номер посвідчення обдарованого","de":"Ausweisnummer des Beschenkten"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, miasto)","en":"Property Address (street, number, city)","uk":"Адреса нерухомості (вулиця, номер, місто)","de":"Adresse der Immobilie (Straße, Nummer, Stadt)"}},
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej","en":"Land and Mortgage Register Number","uk":"Номер іпотечної книги","de":"Grundbuchnummer"}},
                    {"name":"share_fraction","type":"text","required":true,"labels":{"pl":"Wielkość udziału (np. 1/2, 1/4)","en":"Share size (e.g., 1/2, 1/4)","uk":"Розмір частки (напр., 1/2, 1/4)","de":"Anteil (z.B. 1/2, 1/4)"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa darowizny udziału w mieszkaniu',
                        'description' => 'Umowa darowizny, na mocy której darczyńca przekazuje udział w mieszkaniu obdarowanemu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA DAROWIZNY UDZIAŁU W MIESZKANIU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Darczyńcą:</strong> [[donor_full_name]], zamieszkałym/ą w [[donor_address]], legitymującym/ą się dowodem osobistym nr [[donor_id_number]],</p>
                                <p>a</p>
                                <p><strong>Obdarowanym:</strong> [[donee_full_name]], zamieszkałym/ą w [[donee_address]], legitymującym/ą się dowodem osobistym nr [[donee_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Darczyńca daruje, a Obdarowany przyjmuje darowiznę udziału wynoszącego <strong>[[share_fraction]]</strong> w lokalu mieszkalnym położonym pod adresem: <strong>[[apartment_address]]</strong>, dla którego prowadzona jest księga wieczysta nr <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Oświadczenia stron</h2>
                                <p>Darczyńca oświadcza, że darowany udział jest wolny od obciążeń i roszczeń osób trzecich.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Inne postanowienia</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Darczyńca</p></td>
                                <td width="50%"><p>___________________<br>Obdarowany</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Apartment Share Donation Agreement',
                        'description' => 'A donation agreement under which the donor transfers a share in an apartment to the donee.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT SHARE DONATION AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Donor:</strong> [[donor_full_name]], residing in [[donor_address]], holding ID number [[donor_id_number]],</p>
                                <p>and</p>
                                <p><strong>Donee:</strong> [[donee_full_name]], residing in [[donee_address]], holding ID number [[donee_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The Donor donates, and the Donee accepts the donation of a share amounting to <strong>[[share_fraction]]</strong> in the apartment located at: <strong>[[apartment_address]]</strong>, for which Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong> is kept.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Declarations of the Parties</h2>
                                <p>The Donor declares that the donated share is free from encumbrances and third-party claims.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Other Provisions</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Donor</p></td>
                                <td width="50%"><p>___________________<br>Donee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір дарування частки в квартирі',
                        'description' => 'Договір дарування, за яким дарувальник передає частку в квартирі обдарованому.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ДАРУВАННЯ ЧАСТКИ В КВАРТИРІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Дарувальником:</strong> [[donor_full_name]], що проживає за адресою [[donor_address]], який/яка посвідчує особу за паспортом № [[donor_id_number]],</p>
                                <p>та</p>
                                <p><strong>Обдарованим:</strong> [[donee_full_name]], що проживає за адресою [[donee_address]], який/яка посвідчує особу за паспортом № [[donee_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Дарувальник дарує, а Обдарований приймає дарунок частки, що становить <strong>[[share_fraction]]</strong> у житловому приміщенні, розташованому за адресою: <strong>[[apartment_address]]</strong>, для якого ведеться іпотечна книга № <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Заяви сторін</h2>
                                <p>Дарувальник заявляє, що подарована частка вільна від обтяжень та претензій третіх осіб.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Інші положення</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Дарувальник</p></td>
                                <td width="50%"><p>___________________<br>Обдарований</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Schenkungsvertrag über einen Wohnungsanteil',
                        'description' => 'Ein Schenkungsvertrag, durch den der Schenker einen Anteil an einer Wohnung an den Beschenkten überträgt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SCHENKUNGSVERTRAG ÜBER EINEN WOHNUNGSANTEIL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Schenker:</strong> [[donor_full_name]], wohnhaft in [[donor_address]], Ausweis-Nr. [[donor_id_number]],</p>
                                <p>und</p>
                                <p><strong>Beschenkter:</strong> [[donee_full_name]], wohnhaft in [[donee_address]], Ausweis-Nr. [[donee_id_number]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Der Schenker schenkt, und der Beschenkte nimmt die Schenkung eines Anteils von <strong>[[share_fraction]]</strong> an der Wohnung in: <strong>[[apartment_address]]</strong>, für die das Grundbuch Nr. <strong>[[land_and_mortgage_register_number]]</strong> geführt wird, an.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Erklärungen der Parteien</h2>
                                <p>Der Schenker erklärt, dass der geschenkte Anteil frei von Belastungen und Ansprüchen Dritter ist.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Weitere Bestimmungen</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Schenker</p></td>
                                <td width="50%"><p>___________________<br>Beschenkter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Акт приема-передачи недвижимости при продаже / Real Estate Handover Protocol for Sale ---
            [
                'slug' => 'real-estate-handover-protocol-sale-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"protocol_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia protokołu","en":"Protocol Date","uk":"Дата складання протоколу","de":"Datum der Protokollerstellung"}},
                    {"name":"seller_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko sprzedającego","en":"Seller\'s Full Name","uk":"ПІБ продавця","de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedającego","en":"Seller\'s Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"buyer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kupującego","en":"Buyer\'s Full Name","uk":"ПІБ покупця","de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres kupującego","en":"Buyer\'s Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"meter_readings","type":"textarea","required":true,"labels":{"pl":"Stany liczników (prąd, woda, gaz)","en":"Meter readings (electricity, water, gas)","uk":"Показники лічильників (електрика, вода, газ)","de":"Zählerstände (Strom, Wasser, Gas)"}},
                    {"name":"keys_transferred","type":"text","required":true,"labels":{"pl":"Liczba przekazanych kluczy","en":"Number of keys transferred","uk":"Кількість переданих ключів","de":"Anzahl der übergebenen Schlüssel"}},
                    {"name":"property_condition","type":"textarea","required":true,"labels":{"pl":"Stan techniczny nieruchomości","en":"Technical condition of the property","uk":"Технічний стан нерухомості","de":"Technischer Zustand der Immobilie"}},
                    {"name":"other_notes","type":"textarea","required":false,"labels":{"pl":"Inne uwagi (opcjonalnie)","en":"Other notes (optional)","uk":"Інші примітки (необов\'язково)","de":"Weitere Anmerkungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Protokół zdawczo-odbiorczy nieruchomości',
                        'description' => 'Dokument potwierdzający przekazanie nieruchomości od sprzedającego do kupującego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ZDAWCZO-ODBIORCZY NIERUCHOMOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[protocol_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sporządzono pomiędzy:</p>
                                <p><strong>Sprzedającym:</strong> [[seller_full_name]], zamieszkałym/ą w [[seller_address]],</p>
                                <p>a</p>
                                <p><strong>Kupującym:</strong> [[buyer_full_name]], zamieszkałym/ą w [[buyer_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot protokołu</h2>
                                <p>Przedmiotem protokołu jest przekazanie nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Stany liczników</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Przekazane klucze</h2>
                                <p>Przekazano [[keys_transferred]] komplet(ów) kluczy.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Stan techniczny nieruchomości</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Inne uwagi</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Podpisy stron potwierdzają zgodność stanu faktycznego z niniejszym protokołem.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Sprzedający (przekazujący)</p></td>
                                <td width="50%"><p>___________________<br>Kupujący (odbierający)</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Real Estate Handover Protocol for Sale',
                        'description' => 'A document confirming the handover of real estate from the seller to the buyer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REAL ESTATE HANDOVER PROTOCOL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[protocol_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Prepared between:</p>
                                <p><strong>Seller:</strong> [[seller_full_name]], residing in [[seller_address]],</p>
                                <p>and</p>
                                <p><strong>Buyer:</strong> [[buyer_full_name]], residing in [[buyer_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Protocol</h2>
                                <p>The subject of the protocol is the handover of the property located at: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Meter Readings</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Keys Transferred</h2>
                                <p>[[keys_transferred]] set(s) of keys have been transferred.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Technical Condition of the Property</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Other Notes</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>The signatures of the parties confirm the conformity of the factual state with this protocol.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Seller (transferring)</p></td>
                                <td width="50%"><p>___________________<br>Buyer (receiving)</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Акт прийому-передачі нерухомості при продажу',
                        'description' => 'Документ, що підтверджує передачу нерухомості від продавця до покупця.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ ПРИЙОМУ-ПЕРЕДАЧІ НЕРУХОМОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Складено між:</p>
                                <p><strong>Продавцем:</strong> [[seller_full_name]], що проживає за адресою [[seller_address]],</p>
                                <p>та</p>
                                <p><strong>Покупцем:</strong> [[buyer_full_name]], що проживає за адресою [[buyer_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет протоколу</h2>
                                <p>Предметом протоколу є передача нерухомості, розташованої за адресою: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Показники лічильників</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Передані ключі</h2>
                                <p>Передано [[keys_transferred]] комплект(ів) ключів.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Технічний стан нерухомості</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Інші примітки</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Підписи сторін підтверджують відповідність фактичного стану цьому протоколу.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Продавець (передавач)</p></td>
                                <td width="50%"><p>___________________<br>Покупець (отримувач)</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Übergabeprotokoll Immobilie beim Verkauf',
                        'description' => 'Ein Dokument, das die Übergabe einer Immobilie vom Verkäufer an den Käufer bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ÜBERGABEPROTOKOLL IMMOBILIE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[protocol_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Erstellt zwischen:</p>
                                <p><strong>Verkäufer:</strong> [[seller_full_name]], wohnhaft in [[seller_address]],</p>
                                <p>und</p>
                                <p><strong>Käufer:</strong> [[buyer_full_name]], wohnhaft in [[buyer_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Gegenstand des Protokolls</h2>
                                <p>Gegenstand des Protokolls ist die Übergabe der Immobilie in: <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Zählerstände</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Übergebene Schlüssel</h2>
                                <p>Es wurden [[keys_transferred]] Schlüsselset(s) übergeben.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Technischer Zustand der Immobilie</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Weitere Anmerkungen</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Die Unterschriften der Parteien bestätigen die Übereinstimmung des Ist-Zustandes mit diesem Protokoll.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Verkäufer (Übergeber)</p></td>
                                <td width="50%"><p>___________________<br>Käufer (Empfänger)</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Соглашение о задатке / Deposit Agreement ---
            [
                'slug' => 'deposit-agreement-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"payer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wpłacającego zadatek","en":"Payer\'s Full Name","uk":"ПІБ платника завдатку","de":"Vollständiger Name des Einzahlers"}},
                    {"name":"payer_address","type":"text","required":true,"labels":{"pl":"Adres wpłacającego","en":"Payer\'s Address","uk":"Адреса платника","de":"Adresse des Einzahlers"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbierającego zadatek","en":"Recipient\'s Full Name","uk":"ПІБ одержувача завдатку","de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbierającego","en":"Recipient\'s Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Kwota zadatku","en":"Deposit Amount","uk":"Сума завдатку","de":"Anzahlungsbetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"subject_of_agreement","type":"textarea","required":true,"labels":{"pl":"Przedmiot umowy, której dotyczy zadatek (np. kupno mieszkania, samochodu)","en":"Subject of the agreement to which the deposit relates (e.g., apartment purchase, car purchase)","uk":"Предмет договору, до якого стосується завдаток (напр., купівля квартири, автомобіля)","de":"Gegenstand des Vertrags, auf den sich die Anzahlung bezieht (z.B. Wohnungskauf, Autokauf)"}},
                    {"name":"final_agreement_date","type":"date","required":true,"labels":{"pl":"Planowana data zawarcia umowy głównej","en":"Planned date of concluding the main agreement","uk":"Планована дата укладення основного договору","de":"Geplantes Datum des Abschlusses des Hauptvertrags"}},
                    {"name":"consequences_of_non_performance","type":"textarea","required":false,"labels":{"pl":"Konsekwencje niewykonania umowy (opcjonalnie)","en":"Consequences of non-performance of the agreement (optional)","uk":"Наслідки невиконання договору (необов\'язково)","de":"Folgen der Nichterfüllung des Vertrags (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa zadatku',
                        'description' => 'Umowa regulująca wpłatę zadatku na poczet przyszłej umowy (np. kupna-sprzedaży).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA ZADATKU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Wpłacającym zadatek:</strong> [[payer_full_name]], zamieszkałym/ą w [[payer_address]],</p>
                                <p>a</p>
                                <p><strong>Odbierającym zadatek:</strong> [[recipient_full_name]], zamieszkałym/ą w [[recipient_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Wpłacający zadatek przekazuje, a Odbierający zadatek przyjmuje kwotę <strong>[[deposit_amount]] [[currency]]</strong> tytułem zadatku na poczet zawarcia umowy [[subject_of_agreement]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Warunki zadatku</h2>
                                <p>Umowa główna zostanie zawarta w terminie do dnia <strong>[[final_agreement_date]]</strong>.</p>
                                <p>[[consequences_of_non_performance]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wpłacający zadatek</p></td>
                                <td width="50%"><p>___________________<br>Odbierający zadatek</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Deposit Agreement',
                        'description' => 'An agreement regulating the payment of a deposit for a future agreement (e.g., sale and purchase).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DEPOSIT AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Payer of Deposit:</strong> [[payer_full_name]], residing in [[payer_address]],</p>
                                <p>and</p>
                                <p><strong>Recipient of Deposit:</strong> [[recipient_full_name]], residing in [[recipient_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The Payer of Deposit transfers, and the Recipient of Deposit accepts the amount of <strong>[[deposit_amount]] [[currency]]</strong> as a deposit for the conclusion of the [[subject_of_agreement]] agreement.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Deposit Conditions</h2>
                                <p>The main agreement will be concluded by <strong>[[final_agreement_date]]</strong>.</p>
                                <p>[[consequences_of_non_performance]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Payer of Deposit</p></td>
                                <td width="50%"><p>___________________<br>Recipient of Deposit</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про завдаток',
                        'description' => 'Угода, що регулює сплату завдатку на майбутній договір (напр., купівлі-продажу).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА ПРО ЗАВДАТОК</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Платником завдатку:</strong> [[payer_full_name]], що проживає за адресою [[payer_address]],</p>
                                <p>та</p>
                                <p><strong>Отримувачем завдатку:</strong> [[recipient_full_name]], що проживає за адресою [[recipient_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Платник завдатку передає, а Отримувач завдатку приймає суму <strong>[[deposit_amount]] [[currency]]</strong> як завдаток на укладення договору [[subject_of_agreement]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Умови завдатку</h2>
                                <p>Основний договір буде укладено до <strong>[[final_agreement_date]]</strong>.</p>
                                <p>[[consequences_of_non_performance]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Платник завдатку</p></td>
                                <td width="50%"><p>___________________<br>Отримувач завдатку</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Anzahlungsvereinbarung',
                        'description' => 'Eine Vereinbarung, die die Zahlung einer Anzahlung für einen zukünftigen Vertrag (z.B. Kaufvertrag) regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANZAHLUNGSVEREINBARUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Einzahler der Anzahlung:</strong> [[payer_full_name]], wohnhaft in [[payer_address]],</p>
                                <p>und</p>
                                <p><strong>Empfänger der Anzahlung:</strong> [[recipient_full_name]], wohnhaft in [[recipient_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Der Einzahler der Anzahlung übergibt, und der Empfänger der Anzahlung nimmt den Betrag von <strong>[[deposit_amount]] [[currency]]</strong> als Anzahlung für den Abschluss des Vertrags [[subject_of_agreement]] an.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Anzahlungsbedingungen</h2>
                                <p>Der Hauptvertrag wird bis zum <strong>[[final_agreement_date]]</strong> abgeschlossen.</p>
                                <p>[[consequences_of_non_performance]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Einzahler der Anzahlung</p></td>
                                <td width="50%"><p>___________________<br>Empfänger der Anzahlung</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Согласие супруга на продажу недвижимости / Spouse\'s Consent to Property Sale ---
            [
                'slug' => 'spouses-consent-property-sale-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"consent_date","type":"date","required":true,"labels":{"pl":"Data wyrażenia zgody","en":"Consent Date","uk":"Дата надання згоди","de":"Datum der Zustimmung"}},
                    {"name":"consenting_spouse_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka wyrażającego zgodę","en":"Consenting Spouse\'s Full Name","uk":"ПІБ дружини/чоловіка, що дає згоду","de":"Vollständiger Name des zustimmenden Ehepartners"}},
                    {"name":"consenting_spouse_address","type":"text","required":true,"labels":{"pl":"Adres małżonka","en":"Consenting Spouse\'s Address","uk":"Адреса дружини/чоловіка","de":"Adresse des zustimmenden Ehepartners"}},
                    {"name":"consenting_spouse_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości małżonka","en":"Consenting Spouse\'s ID Number","uk":"Номер посвідчення дружини/чоловіка","de":"Ausweisnummer des zustimmenden Ehepartners"}},
                    {"name":"selling_spouse_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka sprzedającego","en":"Selling Spouse\'s Full Name","uk":"ПІБ дружини/чоловіка, що продає","de":"Vollständiger Name des verkaufenden Ehepartners"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej","en":"Land and Mortgage Register Number","uk":"Номер іпотечної книги","de":"Grundbuchnummer"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zgoda małżonka na sprzedaż nieruchomości',
                        'description' => 'Oficjalna zgoda jednego z małżonków na sprzedaż wspólnej nieruchomości.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZGODA MAŁŻONKA NA SPRZEDAŻ NIERUCHOMOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[consent_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[consenting_spouse_full_name]]</strong>, zamieszkały/a w [[consenting_spouse_address]], legitymujący/a się dowodem osobistym nr [[consenting_spouse_id_number]],</p>
                                <p>niniejszym wyrażam zgodę na sprzedaż nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>, dla której prowadzona jest księga wieczysta nr <strong>[[land_and_mortgage_register_number]]</strong>, przez mojego/moją małżonka/małżonkę <strong>[[selling_spouse_full_name]]</strong>.</p>
                                <p>Oświadczam, że jestem świadomy/a skutków prawnych wyrażenia niniejszej zgody.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[consenting_spouse_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Spouse\'s Consent to Property Sale',
                        'description' => 'Official consent of one spouse to sell joint property.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SPOUSE\'S CONSENT TO PROPERTY SALE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[consent_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[consenting_spouse_full_name]]</strong>, residing in [[consenting_spouse_address]], holding ID number [[consenting_spouse_id_number]],</p>
                                <p>hereby give my consent to the sale of the property located at: <strong>[[property_address]]</strong>, for which Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong> is kept, by my spouse <strong>[[selling_spouse_full_name]]</strong>.</p>
                                <p>I declare that I am aware of the legal consequences of giving this consent.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[consenting_spouse_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Згода чоловіка/дружини на продаж нерухомості',
                        'description' => 'Офіційна згода одного з подружжя на продаж спільної нерухомості.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗГОДА ЧОЛОВІКА/ДРУЖИНИ НА ПРОДАЖ НЕРУХОМОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[consenting_spouse_full_name]]</strong>, що проживає за адресою [[consenting_spouse_address]], який/яка посвідчує особу за паспортом № [[consenting_spouse_id_number]],</p>
                                <p>цим надаю згоду на продаж нерухомості, розташованої за адресою: <strong>[[property_address]]</strong>, для якої ведеться іпотечна книга № <strong>[[land_and_mortgage_register_number]]</strong>, моїм/моєю чоловіком/дружиною <strong>[[selling_spouse_full_name]]</strong>.</p>
                                <p>Заявляю, що я усвідомлюю правові наслідки надання цієї згоди.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>([[consenting_spouse_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Zustimmung des Ehepartners zum Immobilienverkauf',
                        'description' => 'Amtliche Zustimmung eines Ehepartners zum Verkauf von Gemeinschaftseigentum.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZUSTIMMUNG DES EHEPARTNERS ZUM IMMOBILIENVERKAUF</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[consent_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[consenting_spouse_full_name]]</strong>, wohnhaft in [[consenting_spouse_address]], Ausweis-Nr. [[consenting_spouse_id_number]],</p>
                                <p>erteile hiermit meine Zustimmung zum Verkauf der Immobilie in: <strong>[[property_address]]</strong>, für die das Grundbuch Nr. <strong>[[land_and_mortgage_register_number]]</strong> geführt wird, durch meinen/meine Ehepartner/in <strong>[[selling_spouse_full_name]]</strong>.</p>
                                <p>Ich erkläre, dass ich mir der rechtlichen Folgen dieser Zustimmung bewusst bin.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[consenting_spouse_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Согласие супруга на покупку недвижимости / Spouse\'s Consent to Property Purchase ---
            [
                'slug' => 'spouses-consent-property-purchase-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"consent_date","type":"date","required":true,"labels":{"pl":"Data wyrażenia zgody","en":"Consent Date","uk":"Дата надання згоди","de":"Datum der Zustimmung"}},
                    {"name":"consenting_spouse_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka wyrażającego zgodę","en":"Consenting Spouse\'s Full Name","uk":"ПІБ дружини/чоловіка, що дає згоду","de":"Vollständiger Name des zustimmenden Ehepartners"}},
                    {"name":"consenting_spouse_address","type":"text","required":true,"labels":{"pl":"Adres małżonka","en":"Consenting Spouse\'s Address","uk":"Адреса дружини/чоловіка","de":"Adresse des zustimmenden Ehepartners"}},
                    {"name":"consenting_spouse_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości małżonka","en":"Consenting Spouse\'s ID Number","uk":"Номер посвідчення дружини/чоловіка","de":"Ausweisnummer des zustimmenden Ehepartners"}},
                    {"name":"buying_spouse_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka kupującego","en":"Buying Spouse\'s Full Name","uk":"ПІБ дружини/чоловіка, що купує","de":"Vollständiger Name des kaufenden Ehepartners"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (planowanej do zakupu)","en":"Property Address (planned for purchase)","uk":"Адреса нерухомості (планованої до покупки)","de":"Adresse der Immobilie (geplant zum Kauf)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zgoda małżonka na zakup nieruchomości',
                        'description' => 'Oficjalna zgoda jednego z małżonków na zakup nieruchomości, która wejdzie do majątku wspólnego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZGODA MAŁŻONKA NA ZAKUP NIERUCHOMOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[consent_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[consenting_spouse_full_name]]</strong>, zamieszkały/a w [[consenting_spouse_address]], legitymujący/a się dowodem osobistym nr [[consenting_spouse_id_number]],</p>
                                <p>niniejszym wyrażam zgodę na zakup nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>, przez mojego/moją małżonka/małżonkę <strong>[[buying_spouse_full_name]]</strong>.</p>
                                <p>Oświadczam, że jestem świadomy/a, iż nabyta nieruchomość wejdzie w skład naszego majątku wspólnego.</p>
                                <p>Oświadczam, że jestem świadomy/a skutków prawnych wyrażenia niniejszej zgody.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[consenting_spouse_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Spouse\'s Consent to Property Purchase',
                        'description' => 'Official consent of one spouse to purchase real estate that will become part of the joint property.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SPOUSE\'S CONSENT TO PROPERTY PURCHASE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[consent_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[consenting_spouse_full_name]]</strong>, residing in [[consenting_spouse_address]], holding ID number [[consenting_spouse_id_number]],</p>
                                <p>hereby give my consent to the purchase of the property located at: <strong>[[property_address]]</strong>, by my spouse <strong>[[buying_spouse_full_name]]</strong>.</p>
                                <p>I declare that I am aware that the acquired property will become part of our joint property.</p>
                                <p>I declare that I am aware of the legal consequences of giving this consent.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[consenting_spouse_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Згода чоловіка/дружини на купівлю нерухомості',
                        'description' => 'Офіційна згода одного з подружжя на купівлю нерухомості, яка увійде до спільного майна.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗГОДА ЧОЛОВІКА/ДРУЖИНИ НА КУПІВЛЮ НЕРУХОМОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[consenting_spouse_full_name]]</strong>, що проживає за адресою [[consenting_spouse_address]], який/яка посвідчує особу за паспортом № [[consenting_spouse_id_number]],</p>
                                <p>цим надаю згоду на купівлю нерухомості, розташованої за адресою: <strong>[[property_address]]</strong>, моїм/моєю чоловіком/дружиною <strong>[[buying_spouse_full_name]]</strong>.</p>
                                <p>Заявляю, що я усвідомлюю, що придбана нерухомість увійде до складу нашого спільного майна.</p>
                                <p>Заявляю, що я усвідомлюю правові наслідки надання цієї згоди.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[consenting_spouse_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Zustimmung des Ehepartners zum Immobilienkauf',
                        'description' => 'Amtliche Zustimmung eines Ehepartners zum Kauf einer Immobilie, die in das gemeinsame Vermögen übergeht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZUSTIMMUNG DES EHEPARTNERS ZUM IMMOBILIENKAUF</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[consent_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[consenting_spouse_full_name]]</strong>, wohnhaft in [[consenting_spouse_address]], Ausweis-Nr. [[consenting_spouse_id_number]],</p>
                                <p>erteile hiermit meine Zustimmung zum Kauf der Immobilie in: <strong>[[property_address]]</strong>, durch meinen/meine Ehepartner/in <strong>[[buying_spouse_full_name]]</strong>.</p>
                                <p>Ich erkläre, dass ich mir bewusst bin, dass die erworbene Immobilie Teil unseres gemeinsamen Vermögens wird.</p>
                                <p>Ich erkläre, dass ich mir der rechtlichen Folgen dieser Zustimmung bewusst bin.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[consenting_spouse_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление в управляющую компанию (ЖЭК, ОСМД) / Application to Management Company (Housing Cooperative, HOA) ---
            [
                'slug' => 'application-management-company-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania wnioskodawcy","en":"Applicant\'s Residential Address","uk":"Адреса проживання заявника","de":"Wohnadresse des Antragstellers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail wnioskodawcy","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail заявника","de":"Telefon und E-Mail des Antragstellers"}},
                    {"name":"management_company_name","type":"text","required":true,"labels":{"pl":"Nazwa zarządcy nieruchomości/spółdzielni","en":"Property Manager/Cooperative Name","uk":"Назва управителя нерухомості/кооперативу","de":"Name der Hausverwaltung/Genossenschaft"}},
                    {"name":"management_company_address","type":"text","required":true,"labels":{"pl":"Adres zarządcy/spółdzielni","en":"Property Manager/Cooperative Address","uk":"Адреса управителя/кооперативу","de":"Adresse der Hausverwaltung/Genossenschaft"}},
                    {"name":"request_subject","type":"text","required":true,"labels":{"pl":"Przedmiot wniosku","en":"Subject of Request","uk":"Предмет запиту","de":"Gegenstand des Antrags"}},
                    {"name":"request_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły wniosku (opis problemu/prośby)","en":"Request details (description of problem/request)","uk":"Деталі запиту (опис проблеми/прохання)","de":"Details des Antrags (Beschreibung des Problems/der Anfrage)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek do zarządcy nieruchomości/spółdzielni',
                        'description' => 'Wniosek do zarządcy budynku lub spółdzielni mieszkaniowej w różnych sprawach.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> [[request_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o [[request_subject]].</p>
                                <p>Szczegóły sprawy:</p>
                                <p>[[request_details]]</p>
                                <p>Proszę o pilne rozpatrzenie mojego wniosku i informację o podjętych działaniach.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application to Management Company (Housing Cooperative, HOA)',
                        'description' => 'An application to a building manager or housing cooperative regarding various matters.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION</h1><p style="font-size: 14px;"><strong>Subject:</strong> [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>I hereby kindly request [[request_subject]].</p>
                                <p>Details of the matter:</p>
                                <p>[[request_details]]</p>
                                <p>Please promptly consider my application and inform me of the actions taken.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява до керуючої компанії (ЖЕК, ОСББ)',
                        'description' => 'Заява до управителя будинку або житлового кооперативу з різних питань.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Звертаюся з покірним проханням про [[request_subject]].</p>
                                <p>Деталі справи:</p>
                                <p>[[request_details]]</p>
                                <p>Прошу терміново розглянути мою заяву та повідомити про вжиті заходи.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag an die Hausverwaltung/Genossenschaft',
                        'description' => 'Ein Antrag an die Hausverwaltung oder Wohnungsbaugenossenschaft in verschiedenen Angelegenheiten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Hiermit bitte ich höflich um [[request_subject]].</p>
                                <p>Details der Angelegenheit:</p>
                                <p>[[request_details]]</p>
                                <p>Bitte bearbeiten Sie meinen Antrag umgehend und informieren Sie mich über die ergriffenen Maßnahmen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление о протечке крыши / Roof Leak Application ---
            [
                'slug' => 'roof-leak-application-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania wnioskodawcy","en":"Applicant\'s Residential Address","uk":"Адреса проживання заявника","de":"Wohnadresse des Antragstellers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail wnioskodawcy","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail заявника","de":"Telefon und E-Mail des Antragstellers"}},
                    {"name":"management_company_name","type":"text","required":true,"labels":{"pl":"Nazwa zarządcy nieruchomości/spółdzielni","en":"Property Manager/Cooperative Name","uk":"Назва управителя нерухомості/кооперативу","de":"Name der Hausverwaltung/Genossenschaft"}},
                    {"name":"management_company_address","type":"text","required":true,"labels":{"pl":"Adres zarządcy/spółdzielni","en":"Property Manager/Cooperative Address","uk":"Адреса управителя/кооперативу","de":"Adresse der Hausverwaltung/Genossenschaft"}},
                    {"name":"leak_location","type":"text","required":true,"labels":{"pl":"Miejsce przecieku (np. kuchnia, łazienka, pokój)","en":"Leak location (e.g., kitchen, bathroom, room)","uk":"Місце протікання (напр., кухня, ванна, кімната)","de":"Ort des Lecks (z.B. Küche, Bad, Zimmer)"}},
                    {"name":"leak_description","type":"textarea","required":true,"labels":{"pl":"Opis przecieku i powstałych szkód","en":"Description of leak and resulting damage","uk":"Опис протікання та завданих збитків","de":"Beschreibung des Lecks und der entstandenen Schäden"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"pl":"Data zauważenia przecieku","en":"Date leak noticed","uk":"Дата виявлення протікання","de":"Datum der Feststellung des Lecks"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zgłoszenie przecieku dachu/zalania',
                        'description' => 'Zgłoszenie do zarządcy nieruchomości o przecieku dachu lub zalaniu, z prośbą o interwencję.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ZGŁOSZENIE PRZECIEKU/ZALANIA</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Adres nieruchomości:</strong> [[applicant_address]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym zgłaszam przeciek dachu/zalanie w lokalu położonym pod adresem [[applicant_address]], które zauważyłem/łam w dniu <strong>[[incident_date]]</strong>.</p>
                                <p>Miejsce przecieku: <strong>[[leak_location]]</strong>.</p>
                                <p>Opis przecieku i powstałych szkód:</p>
                                <p>[[leak_description]]</p>
                                <p>Proszę o pilną interwencję w celu usunięcia awarii oraz oszacowania i naprawy powstałych szkód.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Roof Leak Application',
                        'description' => 'Notification to the property manager about a roof leak or flooding, requesting intervention.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ROOF LEAK / FLOODING NOTIFICATION</h1><p style="font-size: 14px;"><strong>Property Address:</strong> [[applicant_address]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>I hereby report a roof leak/flooding in the premises located at [[applicant_address]], which I noticed on <strong>[[incident_date]]</strong>.</p>
                                <p>Leak location: <strong>[[leak_location]]</strong>.</p>
                                <p>Description of the leak and resulting damage:</p>
                                <p>[[leak_description]]</p>
                                <p>Please intervene urgently to remove the fault and assess and repair the damage.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про протікання даху',
                        'description' => 'Заява до управителя нерухомості про протікання даху або затоплення, з проханням про втручання.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА ПРО ПРОТІКАННЯ ДАХУ/ЗАТОПЛЕННЯ</h1><p style="font-size: 14px;"><strong>Адреса нерухомості:</strong> [[applicant_address]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Цим повідомляю про протікання даху/затоплення у приміщенні, розташованому за адресою [[applicant_address]], яке я помітив/ла <strong>[[incident_date]]</strong>.</p>
                                <p>Місце протікання: <strong>[[leak_location]]</strong>.</p>
                                <p>Опис протікання та завданих збитків:</p>
                                <p>[[leak_description]]</p>
                                <p>Прошу терміново втрутитися для усунення несправності, а також оцінки та ремонту завданих збитків.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Meldung eines Dachlecks/Wasserschadens',
                        'description' => 'Meldung an die Hausverwaltung über ein Dachleck oder einen Wasserschaden mit der Bitte um Intervention.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">MELDUNG EINES DACHLECKS/WASSERSCHADENS</h1><p style="font-size: 14px;"><strong>Immobilienadresse:</strong> [[applicant_address]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Hiermit melde ich ein Dachleck/Wasserschaden in den Räumlichkeiten in [[applicant_address]], das ich am <strong>[[incident_date]]</strong> bemerkt habe.</p>
                                <p>Ort des Lecks: <strong>[[leak_location]]</strong>.</p>
                                <p>Beschreibung des Lecks und der entstandenen Schäden:</p>
                                <p>[[leak_description]]</p>
                                <p>Bitte intervenieren Sie dringend, um den Schaden zu beheben und die entstandenen Schäden zu bewerten und zu reparieren.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Жалоба на соседей (на шум, затопление) / Complaint about Neighbors (Noise, Flooding) ---
            [
                'slug' => 'complaint-neighbors-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"complainant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko skarżącego","en":"Complainant\'s Full Name","uk":"ПІБ скаржника","de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania skarżącego","en":"Complainant\'s Residential Address","uk":"Адреса проживання скаржника","de":"Wohnadresse des Beschwerdeführers"}},
                    {"name":"complainant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail skarżącego","en":"Complainant\'s Phone & Email","uk":"Телефон та e-mail скаржника","de":"Telefon und E-Mail des Beschwerdeführers"}},
                    {"name":"management_company_name","type":"text","required":true,"labels":{"pl":"Nazwa zarządcy nieruchomości/spółdzielni","en":"Property Manager/Cooperative Name","uk":"Назва управителя нерухомості/кооперативу","de":"Name der Hausverwaltung/Genossenschaft"}},
                    {"name":"management_company_address","type":"text","required":true,"labels":{"pl":"Adres zarządcy/spółdzielni","en":"Property Manager/Cooperative Address","uk":"Адреса управителя/кооперативу","de":"Adresse der Hausverwaltung/Genossenschaft"}},
                    {"name":"neighbor_address","type":"text","required":true,"labels":{"pl":"Adres sąsiada (numer mieszkania)","en":"Neighbor\'s Address (apartment number)","uk":"Адреса сусіда (номер квартири)","de":"Adresse des Nachbarn (Wohnungsnummer)"}},
                    {"name":"complaint_type","type":"text","required":true,"labels":{"pl":"Typ skargi (np. hałas, zalanie, nieporządek)","en":"Complaint type (e.g., noise, flooding, mess)","uk":"Тип скарги (напр., шум, затоплення, безлад)","de":"Beschwerdeart (z.B. Lärm, Überschwemmung, Unordnung)"}},
                    {"name":"incident_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły incydentów (daty, godziny, opis)","en":"Incident details (dates, times, description)","uk":"Деталі інцидентів (дати, час, опис)","de":"Details der Vorfälle (Daten, Uhrzeiten, Beschreibung)"}},
                    {"name":"requested_action","type":"textarea","required":true,"labels":{"pl":"Żądane działania","en":"Requested action","uk":"Затребувані дії","de":"Gewünschte Maßnahmen"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Skarga na sąsiada',
                        'description' => 'Formalna skarga na uciążliwe zachowanie sąsiadów, skierowana do zarządcy nieruchomości lub spółdzielni.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">SKARGA NA SĄSIADA</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> Mieszkanie [[neighbor_address]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym składam skargę na uciążliwe zachowanie mieszkańców lokalu nr [[neighbor_address]], dotyczące [[complaint_type]].</p>
                                <p>Szczegóły incydentów:</p>
                                <p>[[incident_details]]</p>
                                <p>W związku z powyższym, proszę o podjęcie następujących działań: [[requested_action]]</p>
                                <p>Proszę o pilne rozpatrzenie mojej skargi i podjęcie stosownych kroków w celu rozwiązania problemu.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Complaint about Neighbors',
                        'description' => 'A formal complaint about disturbing behavior of neighbors, addressed to the property manager or cooperative.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">COMPLAINT ABOUT NEIGHBORS</h1><p style="font-size: 14px;"><strong>Regarding:</strong> Apartment [[neighbor_address]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>I hereby file a complaint regarding the disturbing behavior of the residents of apartment no. [[neighbor_address]], concerning [[complaint_type]].</p>
                                <p>Incident details:</p>
                                <p>[[incident_details]]</p>
                                <p>In connection with the above, I request the following actions to be taken: [[requested_action]]</p>
                                <p>Please promptly consider my complaint and take appropriate steps to resolve the issue.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Скарга на сусідів',
                        'description' => 'Офіційна скарга на обтяжливу поведінку сусідів, адресована управителю нерухомості або кооперативу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">СКАРГА НА СУСІДА</h1><p style="font-size: 14px;"><strong>Щодо:</strong> Квартира [[neighbor_address]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Цим подаю скаргу на обтяжливу поведінку мешканців квартири № [[neighbor_address]], що стосується [[complaint_type]].</p>
                                <p>Деталі інцидентів:</p>
                                <p>[[incident_details]]</p>
                                <p>У зв\'язку з вищевикладеним, прошу вжити наступних заходів: [[requested_action]]</p>
                                <p>Прошу терміново розглянути мою скаргу та вжити відповідних кроків для вирішення проблеми.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Beschwerde über Nachbarn',
                        'description' => 'Eine formelle Beschwerde über störendes Verhalten von Nachbarn, gerichtet an die Hausverwaltung oder Genossenschaft.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">BESCHWERDE ÜBER NACHBARN</h1><p style="font-size: 14px;"><strong>Betreff:</strong> Wohnung [[neighbor_address]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Hiermit reiche ich Beschwerde über das störende Verhalten der Bewohner der Wohnung Nr. [[neighbor_address]] ein, betreffend [[complaint_type]].</p>
                                <p>Details der Vorfälle:</p>
                                <p>[[incident_details]]</p>
                                <p>Im Zusammenhang damit bitte ich um folgende Maßnahmen: [[requested_action]]</p>
                                <p>Bitte bearbeiten Sie meine Beschwerde umgehend und ergreifen Sie entsprechende Schritte zur Lösung des Problems.</p>
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

            // --- Протокол общего собрания жильцов дома / Protocol of General Meeting of House Residents ---
            [
                'slug' => 'protocol-general-meeting-residents-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"meeting_date","type":"date","required":true,"labels":{"pl":"Data zebrania","en":"Meeting Date","uk":"Дата зборів","de":"Datum der Versammlung"}},
                    {"name":"meeting_time","type":"text","required":true,"labels":{"pl":"Godzina rozpoczęcia zebrania","en":"Meeting Start Time","uk":"Час початку зборів","de":"Beginn der Versammlung"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (budynku)","en":"Property Address (building)","uk":"Адреса нерухомості (будівлі)","de":"Adresse der Immobilie (Gebäude)"}},
                    {"name":"organizer_name","type":"text","required":true,"labels":{"pl":"Nazwa organizatora (np. Zarząd Wspólnoty Mieszkaniowej)","en":"Organizer Name (e.g., Housing Community Board)","uk":"Назва організатора (напр., Правління ОСББ)","de":"Name des Veranstalters (z.B. Vorstand der Wohnungseigentümergemeinschaft)"}},
                    {"name":"participants_count","type":"number","required":true,"labels":{"pl":"Liczba obecnych mieszkańców","en":"Number of residents present","uk":"Кількість присутніх мешканців","de":"Anzahl der anwesenden Bewohner"}},
                    {"name":"agenda_items","type":"textarea","required":true,"labels":{"pl":"Porządek obrad (punkty)","en":"Agenda items","uk":"Пункти порядку денного","de":"Tagesordnungspunkte"}},
                    {"name":"resolutions","type":"textarea","required":true,"labels":{"pl":"Podjęte uchwały/decyzje","en":"Resolutions/decisions made","uk":"Прийняті рішення/постанови","de":"Gefasste Beschlüsse/Entscheidungen"}},
                    {"name":"voting_results","type":"textarea","required":false,"labels":{"pl":"Wyniki głosowań (opcjonalnie)","en":"Voting results (optional)","uk":"Результати голосування (необов\'язково)","de":"Abstimmungsergebnisse (optional)"}},
                    {"name":"chairman_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko przewodniczącego zebrania","en":"Chairman\'s Full Name","uk":"ПІБ голови зборів","de":"Vollständiger Name des Versammlungsleiters"}},
                    {"name":"secretary_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko protokolanta","en":"Secretary\'s Full Name","uk":"ПІБ секретаря","de":"Vollständiger Name des Protokollführers"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Protokół z zebrania wspólnoty mieszkaniowej/mieszkańców',
                        'description' => 'Oficjalny protokół dokumentujący przebieg i uchwały podjęte na zebraniu mieszkańców budynku.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ Z ZEBRANIA WSPÓLNOTY MIESZKANIOWEJ/MIESZKAŃCÓW</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[meeting_date]] r., godz. [[meeting_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Adres nieruchomości:</strong> [[property_address]]</p>
                                <p><strong>Organizator:</strong> [[organizer_name]]</p>
                                <p><strong>Liczba obecnych mieszkańców:</strong> [[participants_count]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. PORZĄDEK OBRAD</h2>
                                <pre>[[agenda_items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. PODJĘTE UCHWAŁY/DECYZJE</h2>
                                <pre>[[resolutions]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. WYNIKI GŁOSOWAŃ (opcjonalnie)</h2>
                                <pre>[[voting_results]]</pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Przewodniczący zebrania<br>([[chairman_full_name]])</p></td>
                                <td width="50%"><p>___________________<br>Protokolant<br>([[secretary_full_name]])</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Protocol of General Meeting of House Residents',
                        'description' => 'Official protocol documenting the proceedings and resolutions adopted at a meeting of building residents.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOCOL OF GENERAL MEETING OF RESIDENTS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[meeting_date]], Time: [[meeting_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Property Address:</strong> [[property_address]]</p>
                                <p><strong>Organizer:</strong> [[organizer_name]]</p>
                                <p><strong>Number of residents present:</strong> [[participants_count]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. AGENDA ITEMS</h2>
                                <pre>[[agenda_items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. RESOLUTIONS/DECISIONS MADE</h2>
                                <pre>[[resolutions]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. VOTING RESULTS (optional)</h2>
                                <pre>[[voting_results]]</pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Chairman of the Meeting<br>([[chairman_full_name]])</p></td>
                                <td width="50%"><p>___________________<br>Secretary<br>([[secretary_full_name]])</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Протокол загальних зборів мешканців будинку',
                        'description' => 'Офіційний протокол, що документує хід та рішення, прийняті на зборах мешканців будинку.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПРОТОКОЛ ЗАГАЛЬНИХ ЗБОРІВ МЕШКАНЦІВ БУДИНКУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: [[meeting_date]] р., час: [[meeting_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Адреса нерухомості:</strong> [[property_address]]</p>
                                <p><strong>Організатор:</strong> [[organizer_name]]</p>
                                <p><strong>Кількість присутніх мешканців:</strong> [[participants_count]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ПОРЯДОК ДЕННИЙ</h2>
                                <pre>[[agenda_items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. ПРИЙНЯТІ РІШЕННЯ/ПОСТАНОВИ</h2>
                                <pre>[[resolutions]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. РЕЗУЛЬТАТИ ГОЛОСУВАННЯ (необов\'язково)</h2>
                                <pre>[[voting_results]]</pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Голова зборів<br>([[chairman_full_name]])</p></td>
                                <td width="50%"><p>___________________<br>Секретар<br>([[secretary_full_name]])</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Protokoll der Eigentümerversammlung/Bewohnerversammlung',
                        'description' => 'Offizielles Protokoll, das den Verlauf und die Beschlüsse einer Versammlung der Gebäudebewohner dokumentiert.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKOLL DER EIGENTÜMERVERSAMMLUNG/BEWOHNERVERSAMMLUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[meeting_date]], Uhrzeit: [[meeting_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Immobilienadresse:</strong> [[property_address]]</p>
                                <p><strong>Veranstalter:</strong> [[organizer_name]]</p>
                                <p><strong>Anzahl der anwesenden Bewohner:</strong> [[participants_count]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. TAGESORDNUNGSPUNKTE</h2>
                                <pre>[[agenda_items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. GEFASSTE BESCHLÜSSE/ENTSCHEIDUNGEN</h2>
                                <pre>[[resolutions]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ABSTIMMUNGSERGEBNISSE (optional)</h2>
                                <pre>[[voting_results]]</pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vorsitzender der Versammlung<br>([[chairman_full_name]])</p></td>
                                <td width="50%"><p>___________________<br>Protokollführer<br>([[secretary_full_name]])</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Доверенность на продажу/покупку недвижимости / Power of Attorney for Real Estate Sale/Purchase ---
            [
                'slug' => 'power-of-attorney-real-estate-pl',
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
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej","en":"Land and Mortgage Register Number","uk":"Номер іпотечної книги","de":"Grundbuchnummer"}},
                    {"name":"scope_of_authority","type":"textarea","required":true,"labels":{"pl":"Zakres pełnomocnictwa (np. sprzedaż, zakup, zarządzanie)","en":"Scope of authority (e.g., sale, purchase, management)","uk":"Обсяг повноважень (напр., продаж, купівля, управління)","de":"Umfang der Vollmacht (z.B. Verkauf, Kauf, Verwaltung)"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Okres ważności pełnomocnictwa (opcjonalnie)","en":"Validity period of power of attorney (optional)","uk":"Термін дії довіреності (необов\'язково)","de":"Gültigkeitsdauer der Vollmacht (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pełnomocnictwo do sprzedaży/zakupu nieruchomości',
                        'description' => 'Dokument uprawniający pełnomocnika do działania w imieniu mocodawcy w sprawach związanych ze sprzedażą lub zakupem nieruchomości.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[poa_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[principal_full_name]]</strong>, zamieszkały/a w [[principal_address]], legitymujący/a się dowodem osobistym nr [[principal_id_number]],</p>
                                <p>niniejszym ustanawiam pełnomocnikiem Pana/Panią: <strong>[[agent_full_name]]</strong>, zamieszkałego/ą w [[agent_address]], legitymującego/ą się dowodem osobistym nr [[agent_id_number]],</p>
                                <p>do działania w moim imieniu w zakresie: [[scope_of_authority]] nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>, dla której prowadzona jest księga wieczysta nr <strong>[[land_and_mortgage_register_number]]</strong>.</p>
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
                        'title' => 'Power of Attorney for Real Estate Sale/Purchase',
                        'description' => 'A document authorizing an agent to act on behalf of the principal in matters related to the sale or purchase of real estate.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[principal_full_name]]</strong>, residing in [[principal_address]], holding ID number [[principal_id_number]],</p>
                                <p>hereby appoint Mr./Ms.: <strong>[[agent_full_name]]</strong>, residing in [[agent_address]], holding ID number [[agent_id_number]], as my attorney-in-fact,</p>
                                <p>to act on my behalf in the scope of: [[scope_of_authority]] the property located at: <strong>[[property_address]]</strong>, for which Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong> is kept.</p>
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
                        'title' => 'Довіреність на продаж/купівлю нерухомості',
                        'description' => 'Документ, що уповноважує повіреного діяти від імені довірителя у справах, пов\'язаних з продажем або купівлею нерухомості.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[principal_full_name]]</strong>, що проживає за адресою [[principal_address]], який/яка посвідчує особу за паспортом № [[principal_id_number]],</p>
                                <p>цим призначаю повіреним Пана/Пані: <strong>[[agent_full_name]]</strong>, що проживає за адресою [[agent_address]], який/яка посвідчує особу за паспортом № [[agent_id_number]],</p>
                                <p>для дій від мого імені у сфері: [[scope_of_authority]] нерухомості, розташованої за адресою: <strong>[[property_address]]</strong>, для якої ведеться іпотечна книга № <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <p>Довіреність дійсна [[validity_period]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Довіритель</p></td>
                                <td width="50%"><p>___________________<br>Повірений</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht zum Immobilienverkauf/-kauf',
                        'description' => 'Ein Dokument, das den Bevollmächtigten ermächtigt, im Namen des Vollmachtgebers in Angelegenheiten des Immobilienverkaufs oder -kaufs zu handeln.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[principal_full_name]]</strong>, wohnhaft in [[principal_address]], Ausweis-Nr. [[principal_id_number]],</p>
                                <p>bestelle hiermit Herrn/Frau: <strong>[[agent_full_name]]</strong>, wohnhaft in [[agent_address]], Ausweis-Nr. [[agent_id_number]], zu meinem Bevollmächtigten,</p>
                                <p>um in meinem Namen im Rahmen von: [[scope_of_authority]] die Immobilie in: <strong>[[property_address]]</strong>, für die das Grundbuch Nr. <strong>[[land_and_mortgage_register_number]]</strong> geführt wird, zu handeln.</p>
                                <p>Die Vollmacht ist gültig [[validity_period]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vollmachtgeber</p></td>
                                <td width="50%"><p>___________________<br>Bevollmächtigter</p></td>
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
