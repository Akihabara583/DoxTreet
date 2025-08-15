<?php

namespace Database\Seeders\DE;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class DeAnmeldungTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds for the German "First Steps (Anmeldung)" Package 2025-2026.
     */
    public function run(): void
    {
        // Предполагаем, что у вас есть категория для юридических документов Германии
        $catLegal = Category::where('slug', 'legal-claims-de')->firstOrFail();

        $templatesData = [
            // === ПАКЕТ "ПЕРВЫЕ ШАГИ В ГЕРМАНИИ (ANMELDUNG)" ===

            // 1. Форма регистрации по месту жительства (Anmeldeformular)
            [
                'category_id' => $catLegal->id,
                'slug' => 'de-anmeldeformular-residence-registration-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"reg_city","type":"text","required":true,"labels":{"de":"Stadt/Gemeinde der Anmeldung","en":"City/Municipality of Registration","pl":"Miasto/Gmina zameldowania","uk":"Місто/Муніципалітет реєстрації"}},
                    {"name":"move_in_date","type":"date","required":true,"labels":{"de":"Datum des Einzugs","en":"Date of moving in","pl":"Data wprowadzenia się","uk":"Дата заселення"}},
                    {"name":"address_street_no","type":"text","required":true,"labels":{"de":"Straße, Hausnummer","en":"Street, House number","pl":"Ulica, numer domu","uk":"Вулиця, номер будинку"}},
                    {"name":"address_extra","type":"text","required":false,"labels":{"de":"Adresszusatz (z.B. bei Untermiete)","en":"Address supplement (e.g., for subtenants)","pl":"Dodatek do adresu (np. przy podnajmie)","uk":"Додаток до адреси (напр., для суборенди)"}},
                    {"name":"address_plz_city","type":"text","required":true,"labels":{"de":"PLZ, Ort","en":"Postal code, City","pl":"Kod pocztowy, Miejscowość","uk":"Поштовий індекс, Місто"}},
                    {"name":"main_residence","type":"select","options":{"alleinige_wohnung":"Alleinige Wohnung","hauptwohnung":"Hauptwohnung","nebenwohnung":"Nebenwohnung"},"required":true,"labels":{"de":"Art der Wohnung","en":"Type of residence","pl":"Rodzaj mieszkania","uk":"Тип житла"}},
                    {"name":"surname","type":"text","required":true,"labels":{"de":"Familienname","en":"Surname","pl":"Nazwisko","uk":"Прізвище"}},
                    {"name":"birth_name","type":"text","required":false,"labels":{"de":"Geburtsname","en":"Birth name","pl":"Nazwisko rodowe","uk":"Дівоче прізвище"}},
                    {"name":"first_name","type":"text","required":true,"labels":{"de":"Vorname","en":"First name","pl":"Imię","uk":"Ім\'я"}},
                    {"name":"birth_date","type":"date","required":true,"labels":{"de":"Geburtsdatum","en":"Date of birth","pl":"Data urodzenia","uk":"Дата народження"}},
                    {"name":"birth_place_country","type":"text","required":true,"labels":{"de":"Geburtsort, Geburtsland","en":"Place of birth, Country of birth","pl":"Miejsce urodzenia, Kraj urodzenia","uk":"Місце народження, Країна народження"}},
                    {"name":"sex","type":"select","options":{"m":"männlich","w":"weiblich","d":"divers"},"required":true,"labels":{"de":"Geschlecht","en":"Sex","pl":"Płeć","uk":"Стать"}},
                    {"name":"nationality","type":"text","required":true,"labels":{"de":"Staatsangehörigkeit(en)","en":"Nationality(ies)","pl":"Obywatelstwo(a)","uk":"Громадянство(а)"}},
                    {"name":"marital_status","type":"select","options":{"ledig":"ledig","verheiratet":"verheiratet","verwitwet":"verwitwet","geschieden":"geschieden"},"required":true,"labels":{"de":"Familienstand","en":"Marital status","pl":"Stan cywilny","uk":"Сімейний стан"}},
                    {"name":"passport_id","type":"text","required":true,"labels":{"de":"Pass- oder Ausweisnummer","en":"Passport or ID number","pl":"Numer paszportu lub dowodu osobistego","uk":"Номер паспорта або ID-картки"}},
                    {"name":"previous_address","type":"textarea","required":true,"labels":{"de":"Letzte Wohnung in Deutschland (falls zutreffend)","en":"Last residence in Germany (if applicable)","pl":"Ostatnie miejsce zamieszkania w Niemczech (jeśli dotyczy)","uk":"Останнє місце проживання в Німеччині (якщо застосовно)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Anmeldung bei der Meldebehörde (Anmeldeformular)',
                        'description' => 'Offizielles Formular zur Anmeldung eines Wohnsitzes in Deutschland. Notwendig für alle, die länger als drei Monate bleiben. Gültig für 2025-2026.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Anmeldung bei der Meldebehörde</h1><p style="font-size: 12px;">(gemäß § 17 und § 21 Bundesmeldegesetz - BMG)</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">Angaben zur neuen Wohnung</h3>
                            <p>Einzugsdatum: <strong>[[move_in_date]]</strong></p>
                            <p>Anschrift: <strong>[[address_street_no]], [[address_plz_city]]</strong></p>
                            <p>Die angemeldete Wohnung ist: <strong>[[main_residence]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur anmeldenden Person</h3>
                            <p>Familienname: <strong>[[surname]]</strong></p>
                            <p>Vornamen: <strong>[[first_name]]</strong></p>
                            <p>Geburtsdatum: <strong>[[birth_date]]</strong> in <strong>[[birth_place_country]]</strong></p>
                            <p>Geschlecht: <strong>[[sex]]</strong></p>
                            <p>Staatsangehörigkeiten: <strong>[[nationality]]</strong></p>
                            <p>Familienstand: <strong>[[marital_status]]</strong></p>
                            <p>Pass/ID-Nummer: <strong>[[passport_id]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Letzte Anschrift</h3>
                            <p>Zuzug aus: [[previous_address]]</p>
                            <p style="margin-top: 20px; font-size: 10px;">Ich versichere die Richtigkeit und Vollständigkeit der oben gemachten Angaben.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der meldepflichtigen Person: _________________________</p></div>'
                    ],
                    'en' => [
                        'title' => 'Registration with the Registration Authority (Registration Form)',
                        'description' => 'Official form for registering residence in Germany. Required for everyone staying longer than three months. Valid for 2025-2026.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Anmeldung bei der Meldebehörde</h1><p style="font-size: 12px;">(gemäß § 17 und § 21 Bundesmeldegesetz - BMG)</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">Angaben zur neuen Wohnung</h3>
                            <p>Einzugsdatum: <strong>[[move_in_date]]</strong></p>
                            <p>Anschrift: <strong>[[address_street_no]], [[address_plz_city]]</strong></p>
                            <p>Die angemeldete Wohnung ist: <strong>[[main_residence]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur anmeldenden Person</h3>
                            <p>Familienname: <strong>[[surname]]</strong></p>
                            <p>Vornamen: <strong>[[first_name]]</strong></p>
                            <p>Geburtsdatum: <strong>[[birth_date]]</strong> in <strong>[[birth_place_country]]</strong></p>
                            <p>Geschlecht: <strong>[[sex]]</strong></p>
                            <p>Staatsangehörigkeiten: <strong>[[nationality]]</strong></p>
                            <p>Familienstand: <strong>[[marital_status]]</strong></p>
                            <p>Pass/ID-Nummer: <strong>[[passport_id]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Letzte Anschrift</h3>
                            <p>Zuzug aus: [[previous_address]]</p>
                            <p style="margin-top: 20px; font-size: 10px;">Ich versichere die Richtigkeit und Vollständigkeit der oben gemachten Angaben.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der meldepflichtigen Person: _________________________</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Rejestracja w Urzędzie Meldunkowym (Formularz rejestracyjny)',
                        'description' => 'Oficjalny formularz do rejestracji miejsca zamieszkania w Niemczech. Wymagany dla wszystkich pozostających dłużej niż trzy miesiące. Ważny na lata 2025-2026.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Anmeldung bei der Meldebehörde</h1><p style="font-size: 12px;">(gemäß § 17 und § 21 Bundesmeldegesetz - BMG)</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">Angaben zur neuen Wohnung</h3>
                            <p>Einzugsdatum: <strong>[[move_in_date]]</strong></p>
                            <p>Anschrift: <strong>[[address_street_no]], [[address_plz_city]]</strong></p>
                            <p>Die angemeldete Wohnung ist: <strong>[[main_residence]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur anmeldenden Person</h3>
                            <p>Familienname: <strong>[[surname]]</strong></p>
                            <p>Vornamen: <strong>[[first_name]]</strong></p>
                            <p>Geburtsdatum: <strong>[[birth_date]]</strong> in <strong>[[birth_place_country]]</strong></p>
                            <p>Geschlecht: <strong>[[sex]]</strong></p>
                            <p>Staatsangehörigkeiten: <strong>[[nationality]]</strong></p>
                            <p>Familienstand: <strong>[[marital_status]]</strong></p>
                            <p>Pass/ID-Nummer: <strong>[[passport_id]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Letzte Anschrift</h3>
                            <p>Zuzug aus: [[previous_address]]</p>
                            <p style="margin-top: 20px; font-size: 10px;">Ich versichere die Richtigkeit und Vollständigkeit der oben gemachten Angaben.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der meldepflichtigen Person: _________________________</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Реєстрація в органах реєстрації (Реєстраційна форма)',
                        'description' => 'Офіційна форма для реєстрації місця проживання в Німеччині. Обов\'язкова для всіх, хто залишається більше трьох місяців. Дійсна на 2025-2026 роки.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Anmeldung bei der Meldebehörde</h1><p style="font-size: 12px;">(gemäß § 17 und § 21 Bundesmeldegesetz - BMG)</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px;">Angaben zur neuen Wohnung</h3>
                            <p>Einzugsdatum: <strong>[[move_in_date]]</strong></p>
                            <p>Anschrift: <strong>[[address_street_no]], [[address_plz_city]]</strong></p>
                            <p>Die angemeldete Wohnung ist: <strong>[[main_residence]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Angaben zur anmeldenden Person</h3>
                            <p>Familienname: <strong>[[surname]]</strong></p>
                            <p>Vornamen: <strong>[[first_name]]</strong></p>
                            <p>Geburtsdatum: <strong>[[birth_date]]</strong> in <strong>[[birth_place_country]]</strong></p>
                            <p>Geschlecht: <strong>[[sex]]</strong></p>
                            <p>Staatsangehörigkeiten: <strong>[[nationality]]</strong></p>
                            <p>Familienstand: <strong>[[marital_status]]</strong></p>
                            <p>Pass/ID-Nummer: <strong>[[passport_id]]</strong></p>
                            <h3 style="font-size: 13px; background: #f0f0f0; padding: 5px; margin-top: 15px;">Letzte Anschrift</h3>
                            <p>Zuzug aus: [[previous_address]]</p>
                            <p style="margin-top: 20px; font-size: 10px;">Ich versichere die Richtigkeit und Vollständigkeit der oben gemachten Angaben.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift der meldepflichtigen Person: _________________________</p></div>'
                    ]
                ]
            ],

            // 2. Подтверждение от арендодателя (Wohnungsgeberbestätigung)
            [
                'category_id' => $catLegal->id,
                'slug' => 'de-wohnungsgeberbestaetigung-landlord-confirmation-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"landlord_name","type":"text","required":true,"labels":{"de":"Name des Wohnungsgebers (Vermieter)","en":"Name of the housing provider (Landlord)","pl":"Imię i nazwisko wynajmującego","uk":"Ім\'я та прізвище орендодавця"}},
                    {"name":"landlord_address","type":"textarea","required":true,"labels":{"de":"Anschrift des Wohnungsgebers","en":"Address of the housing provider","pl":"Adres wynajmującego","uk":"Адреса орендодавця"}},
                    {"name":"move_in_date","type":"date","required":true,"labels":{"de":"Einzugsdatum","en":"Move-in date","pl":"Data wprowadzenia się","uk":"Дата заселення"}},
                    {"name":"property_address","type":"textarea","required":true,"labels":{"de":"Anschrift der Wohnung","en":"Address of the apartment","pl":"Adres mieszkania","uk":"Адреса квартири"}},
                    {"name":"tenant_names","type":"textarea","required":true,"labels":{"de":"Namen aller meldepflichtigen Personen (Mieter)","en":"Names of all persons to be registered (Tenants)","pl":"Imiona i nazwiska wszystkich osób meldujących się (najemców)","uk":"Імена та прізвища всіх осіб, що реєструються (орендарів)"}},
                    {"name":"owner_name","type":"text","required":false,"labels":{"de":"Name des Eigentümers (falls abweichend)","en":"Name of the owner (if different)","pl":"Imię i nazwisko właściciela (jeśli inny)","uk":"Ім\'я та прізвище власника (якщо відрізняється)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Wohnungsgeberbestätigung',
                        'description' => 'Gesetzlich vorgeschriebenes Dokument vom Vermieter, das den Einzug bestätigt. Unverzichtbar für die Anmeldung des Wohnsitzes (Anmeldung).',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Wohnungsgeberbestätigung gemäß § 19 Bundesmeldegesetz (BMG)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Hiermit bestätige ich den Einzug der nachstehend aufgeführten Person(en) in die unten genannte Wohnung.</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">1. Name und Anschrift des Wohnungsgebers (Vermieter)</h3>
                            <p><strong>[[landlord_name]]</strong><br>[[landlord_address]]</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">2. Anschrift der Wohnung und Einzugsdatum</h3>
                            <p>Wohnung: <strong>[[property_address]]</strong></p>
                            <p>Einzugsdatum: <strong>[[move_in_date]]</strong></p>
                            <h3 style="font-size: 13px; margin-top: 15px;">3. Namen der meldepflichtigen Personen (Mieter)</h3>
                            <p style="white-space: pre-wrap;"><strong>[[tenant_names]]</strong></p>
                            <p style="margin-top: 20px;">Ich bestätige, dass ich Eigentümer der Wohnung bin oder vom Eigentümer zur Ausstellung dieser Bestätigung beauftragt wurde.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift des Wohnungsgebers: _________________________</p></div>'
                    ],
                    'en' => [
                        'title' => 'Landlord Confirmation (Wohnungsgeberbestätigung)',
                        'description' => 'Legally required document from the landlord confirming move-in. Essential for residence registration (Anmeldung).',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Wohnungsgeberbestätigung gemäß § 19 Bundesmeldegesetz (BMG)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Hiermit bestätige ich den Einzug der nachstehend aufgeführten Person(en) in die unten genannte Wohnung.</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">1. Name und Anschrift des Wohnungsgebers (Vermieter)</h3>
                            <p><strong>[[landlord_name]]</strong><br>[[landlord_address]]</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">2. Anschrift der Wohnung und Einzugsdatum</h3>
                            <p>Wohnung: <strong>[[property_address]]</strong></p>
                            <p>Einzugsdatum: <strong>[[move_in_date]]</strong></p>
                            <h3 style="font-size: 13px; margin-top: 15px;">3. Namen der meldepflichtigen Personen (Mieter)</h3>
                            <p style="white-space: pre-wrap;"><strong>[[tenant_names]]</strong></p>
                            <p style="margin-top: 20px;">Ich bestätige, dass ich Eigentümer der Wohnung bin oder vom Eigentümer zur Ausstellung dieser Bestätigung beauftragt wurde.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift des Wohnungsgebers: _________________________</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Potwierdzenie wynajmującego (Wohnungsgeberbestätigung)',
                        'description' => 'Dokument wymagany przez prawo od wynajmującego, potwierdzający wprowadzenie się. Niezbędny do rejestracji miejsca zamieszkania (Anmeldung).',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Wohnungsgeberbestätigung gemäß § 19 Bundesmeldegesetz (BMG)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Hiermit bestätige ich den Einzug der nachstehend aufgeführten Person(en) in die unten genannte Wohnung.</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">1. Name und Anschrift des Wohnungsgebers (Vermieter)</h3>
                            <p><strong>[[landlord_name]]</strong><br>[[landlord_address]]</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">2. Anschrift der Wohnung und Einzugsdatum</h3>
                            <p>Wohnung: <strong>[[property_address]]</strong></p>
                            <p>Einzugsdatum: <strong>[[move_in_date]]</strong></p>
                            <h3 style="font-size: 13px; margin-top: 15px;">3. Namen der meldepflichtigen Personen (Mieter)</h3>
                            <p style="white-space: pre-wrap;"><strong>[[tenant_names]]</strong></p>
                            <p style="margin-top: 20px;">Ich bestätige, dass ich Eigentümer der Wohnung bin oder vom Eigentümer zur Ausstellung dieser Bestätigung beauftragt wurde.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift des Wohnungsgebers: _________________________</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Підтвердження орендодавця (Wohnungsgeberbestätigung)',
                        'description' => 'Документ, який вимагається законом від орендодавця, що підтверджує заселення. Необхідний для реєстрації місця проживання (Anmeldung).',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Wohnungsgeberbestätigung gemäß § 19 Bundesmeldegesetz (BMG)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Hiermit bestätige ich den Einzug der nachstehend aufgeführten Person(en) in die unten genannte Wohnung.</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">1. Name und Anschrift des Wohnungsgebers (Vermieter)</h3>
                            <p><strong>[[landlord_name]]</strong><br>[[landlord_address]]</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">2. Anschrift der Wohnung und Einzugsdatum</h3>
                            <p>Wohnung: <strong>[[property_address]]</strong></p>
                            <p>Einzugsdatum: <strong>[[move_in_date]]</strong></p>
                            <h3 style="font-size: 13px; margin-top: 15px;">3. Namen der meldepflichtigen Personen (Mieter)</h3>
                            <p style="white-space: pre-wrap;"><strong>[[tenant_names]]</strong></p>
                            <p style="margin-top: 20px;">Ich bestätige, dass ich Eigentümer der Wohnung bin oder vom Eigentümer zur Ausstellung dieser Bestätigung beauftragt wurde.</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 60px; font-size: 12px;"><p>Ort, Datum: _________________________</p><p style="margin-top: 40px;">Unterschrift des Wohnungsgebers: _________________________</p></div>'
                    ]
                ]
            ],

            // 3. Заявление на получение налогового номера (Antrag auf Erteilung einer Steuer-ID)
            [
                'category_id' => $catLegal->id,
                'slug' => 'de-tax-id-application-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"finanzamt_name","type":"text","required":true,"labels":{"de":"Zuständiges Finanzamt","en":"Responsible Tax Office","pl":"Właściwy urząd skarbowy","uk":"Відповідальна податкова інспекція"}},
                    {"name":"surname","type":"text","required":true,"labels":{"de":"Familienname","en":"Surname","pl":"Nazwisko","uk":"Прізвище"}},
                    {"name":"first_name","type":"text","required":true,"labels":{"de":"Vorname","en":"First name","pl":"Imię","uk":"Ім\'я"}},
                    {"name":"address_de","type":"textarea","required":true,"labels":{"de":"Anschrift in Deutschland","en":"Address in Germany","pl":"Adres w Niemczech","uk":"Адреса в Німеччині"}},
                    {"name":"birth_date","type":"date","required":true,"labels":{"de":"Geburtsdatum","en":"Date of birth","pl":"Data urodzenia","uk":"Дата народження"}},
                    {"name":"birth_place","type":"text","required":true,"labels":{"de":"Geburtsort","en":"Place of birth","pl":"Miejsce urodzenia","uk":"Місце народження"}},
                    {"name":"reason","type":"textarea","required":true,"defaultValue":"Aufnahme einer Erwerbstätigkeit","labels":{"de":"Grund der Antragstellung","en":"Reason for application","pl":"Powód złożenia wniosku","uk":"Причина подання заяви"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Erteilung einer steuerlichen Identifikationsnummer',
                        'description' => 'Formular für den Fall, dass die Steuer-ID nicht automatisch nach der Anmeldung zugestellt wurde. Wird für die Arbeitsaufnahme benötigt.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Erteilung einer steuerlichen Identifikationsnummer (IdNr)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An das<br><strong>[[finanzamt_name]]</strong></p>
                            <p style="margin-top: 20px;">Sehr geehrte Damen und Herren,</p>
                            <p>hiermit beantrage ich die Zuteilung einer steuerlichen Identifikationsnummer gemäß § 139b Abgabenordnung (AO).</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">Meine persönlichen Daten:</h3>
                            <p>Familienname: <strong>[[surname]]</strong><br>
                            Vorname: <strong>[[first_name]]</strong><br>
                            Anschrift: <strong>[[address_de]]</strong><br>
                            Geburtsdatum: <strong>[[birth_date]]</strong><br>
                            Geburtsort: <strong>[[birth_place]]</strong></p>
                            <p>Grund der Antragstellung: <strong>[[reason]]</strong></p>
                            <p>Eine Kopie meines Passes sowie meine Anmeldebestätigung liegen diesem Schreiben bei.</p>
                            <p>Mit freundlichen Grüßen</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 80px; text-align: left; font-size: 12px;"><p>_________________________<br>(Unterschrift)</p></div>'
                    ],
                    'en' => [
                        'title' => 'Application for Tax Identification Number',
                        'description' => 'Form for cases where the Tax ID was not automatically delivered after registration. Required for starting employment.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Erteilung einer steuerlichen Identifikationsnummer (IdNr)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An das<br><strong>[[finanzamt_name]]</strong></p>
                            <p style="margin-top: 20px;">Sehr geehrte Damen und Herren,</p>
                            <p>hiermit beantrage ich die Zuteilung einer steuerlichen Identifikationsnummer gemäß § 139b Abgabenordnung (AO).</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">Meine persönlichen Daten:</h3>
                            <p>Familienname: <strong>[[surname]]</strong><br>
                            Vorname: <strong>[[first_name]]</strong><br>
                            Anschrift: <strong>[[address_de]]</strong><br>
                            Geburtsdatum: <strong>[[birth_date]]</strong><br>
                            Geburtsort: <strong>[[birth_place]]</strong></p>
                            <p>Grund der Antragstellung: <strong>[[reason]]</strong></p>
                            <p>Eine Kopie meines Passes sowie meine Anmeldebestätigung liegen diesem Schreiben bei.</p>
                            <p>Mit freundlichen Grüßen</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 80px; text-align: left; font-size: 12px;"><p>_________________________<br>(Unterschrift)</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o nadanie numeru identyfikacji podatkowej',
                        'description' => 'Formularz na wypadek, gdyby numer podatkowy nie został automatycznie dostarczony po rejestracji. Wymagany do podjęcia pracy.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Erteilung einer steuerlichen Identifikationsnummer (IdNr)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An das<br><strong>[[finanzamt_name]]</strong></p>
                            <p style="margin-top: 20px;">Sehr geehrte Damen und Herren,</p>
                            <p>hiermit beantrage ich die Zuteilung einer steuerlichen Identifikationsnummer gemäß § 139b Abgabenordnung (AO).</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">Meine persönlichen Daten:</h3>
                            <p>Familienname: <strong>[[surname]]</strong><br>
                            Vorname: <strong>[[first_name]]</strong><br>
                            Anschrift: <strong>[[address_de]]</strong><br>
                            Geburtsdatum: <strong>[[birth_date]]</strong><br>
                            Geburtsort: <strong>[[birth_place]]</strong></p>
                            <p>Grund der Antragstellung: <strong>[[reason]]</strong></p>
                            <p>Eine Kopie meines Passes sowie meine Anmeldebestätigung liegen diesem Schreiben bei.</p>
                            <p>Mit freundlichen Grüßen</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 80px; text-align: left; font-size: 12px;"><p>_________________________<br>(Unterschrift)</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на отримання податкового ідентифікаційного номера',
                        'description' => 'Форма для випадків, коли податковий ID не був автоматично доставлений після реєстрації. Потрібний для початку трудової діяльності.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">Antrag auf Erteilung einer steuerlichen Identifikationsnummer (IdNr)</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>An das<br><strong>[[finanzamt_name]]</strong></p>
                            <p style="margin-top: 20px;">Sehr geehrte Damen und Herren,</p>
                            <p>hiermit beantrage ich die Zuteilung einer steuerlichen Identifikationsnummer gemäß § 139b Abgabenordnung (AO).</p>
                            <h3 style="font-size: 13px; margin-top: 15px;">Meine persönlichen Daten:</h3>
                            <p>Familienname: <strong>[[surname]]</strong><br>
                            Vorname: <strong>[[first_name]]</strong><br>
                            Anschrift: <strong>[[address_de]]</strong><br>
                            Geburtsdatum: <strong>[[birth_date]]</strong><br>
                            Geburtsort: <strong>[[birth_place]]</strong></p>
                            <p>Grund der Antragstellung: <strong>[[reason]]</strong></p>
                            <p>Eine Kopie meines Passes sowie meine Anmeldebestätigung liegen diesem Schreiben bei.</p>
                            <p>Mit freundlichen Grüßen</p>
                        </div>',
                        'footer_html' => '<div style="margin-top: 80px; text-align: left; font-size: 12px;"><p>_________________________<br>(Unterschrift)</p></div>'
                    ]
                ]
            ],

            // 4. Договор аренды квартиры (Mietvertrag)
            [
                'category_id' => $catLegal->id,
                'slug' => 'de-residential-lease-agreement-2025',
                'access_level' => 'pro',
                'fields' => '[
                    {"name":"landlord_details","type":"textarea","required":true,"labels":{"de":"Vermieter (Name, Anschrift)","en":"Landlord (Name, Address)","pl":"Wynajmujący (Imię i nazwisko, adres)","uk":"Орендодавець (Ім\'я, адреса)"}},
                    {"name":"tenant_details","type":"textarea","required":true,"labels":{"de":"Mieter (Name, Anschrift)","en":"Tenant (Name, Address)","pl":"Najemca (Imię i nazwisko, adres)","uk":"Орендар (Ім\'я, адреса)"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"de":"Anschrift des Mietobjekts","en":"Address of the rental property","pl":"Adres nieruchomości","uk":"Адреса об\'єкта оренди"}},
                    {"name":"property_description","type":"textarea","required":true,"labels":{"de":"Beschreibung (z.B. 2 Zimmer, Küche, Bad, ca. 50 m²)","en":"Description (e.g. 2 rooms, kitchen, bath, approx. 50 m²)","pl":"Opis (np. 2 pokoje, kuchnia, łazienka, ok. 50 m²)","uk":"Опис (напр., 2 кімнати, кухня, ванна, бл. 50 м²)"}},
                    {"name":"lease_start","type":"date","required":true,"labels":{"de":"Beginn des Mietverhältnisses","en":"Start of lease","pl":"Początek najmu","uk":"Початок оренди"}},
                    {"name":"lease_term","type":"select","options":{"unbefristet":"unbefristet","befristet":"befristet bis zum"},"required":true,"labels":{"de":"Dauer des Mietverhältnisses","en":"Term of lease","pl":"Okres najmu","uk":"Термін оренди"}},
                    {"name":"lease_end_date","type":"date","required":false,"labels":{"de":"Enddatum (bei Befristung)","en":"End date (if fixed-term)","pl":"Data zakończenia (dla umowy na czas określony)","uk":"Дата закінчення (для строкового договору)"}},
                    {"name":"rent_cold","type":"number","required":true,"labels":{"de":"Kaltmiete (€)","en":"Cold rent (€)","pl":"Czynsz podstawowy (€)","uk":"Холодна оренда (€)"}},
                    {"name":"rent_nebenkosten","type":"number","required":true,"labels":{"de":"Nebenkostenvorauszahlung (€)","en":"Advance payment for service charges (€)","pl":"Zaliczka na opłaty eksploatacyjne (€)","uk":"Аванс за комунальні послуги (€)"}},
                    {"name":"rent_total","type":"number","required":true,"labels":{"de":"Gesamtmiete (€)","en":"Total rent (€)","pl":"Czynsz całkowity (€)","uk":"Загальна орендна плата (€)"}},
                    {"name":"deposit_kaution","type":"number","required":true,"labels":{"de":"Kaution (€)","en":"Security deposit (€)","pl":"Kaucja (€)","uk":"Завдаток (€)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mietvertrag für Wohnraum',
                        'description' => 'Standardmäßiger, rechtssicherer Mietvertrag für eine langfristige Anmietung einer Wohnung in Deutschland.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">MIETVERTRAG</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p>zwischen</p>
                            <p><strong>Vermieter:</strong><br>[[landlord_details]]</p>
                            <p>und</p>
                            <p><strong>Mieter:</strong><br>[[tenant_details]]</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 1 Mietgegenstand</h3>
                            <p>Vermietet werden in dem Anwesen <strong>[[property_address]]</strong> folgende Räume:<br>[[property_description]]</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2 Mietzeit</h3>
                            <p>Das Mietverhältnis beginnt am <strong>[[lease_start]]</strong>. Es wird auf <strong>[[lease_term]]</strong> [[lease_end_date]] geschlossen.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3 Miete und Nebenkosten</h3>
                            <p>1. Die monatliche Kaltmiete beträgt: <strong>[[rent_cold]] €</strong>.</p>
                            <p>2. Die Vorauszahlung für Betriebskosten beträgt: <strong>[[rent_nebenkosten]] €</strong>.</p>
                            <p>3. Die monatliche Gesamtmiete beträgt somit: <strong>[[rent_total]] €</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4 Kaution</h3>
                            <p>Der Mieter leistet eine Mietsicherheit (Kaution) in Höhe von <strong>[[deposit_kaution]] €</strong>.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Vermieter)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Mieter)</strong></p></div>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Residential Lease Agreement',
                        'description' => 'Standard, legally compliant lease agreement for long-term apartment rental in Germany.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">MIETVERTRAG</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p>zwischen</p>
                            <p><strong>Vermieter:</strong><br>[[landlord_details]]</p>
                            <p>und</p>
                            <p><strong>Mieter:</strong><br>[[tenant_details]]</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 1 Mietgegenstand</h3>
                            <p>Vermietet werden in dem Anwesen <strong>[[property_address]]</strong> folgende Räume:<br>[[property_description]]</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2 Mietzeit</h3>
                            <p>Das Mietverhältnis beginnt am <strong>[[lease_start]]</strong>. Es wird auf <strong>[[lease_term]]</strong> [[lease_end_date]] geschlossen.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3 Miete und Nebenkosten</h3>
                            <p>1. Die monatliche Kaltmiete beträgt: <strong>[[rent_cold]] €</strong>.</p>
                            <p>2. Die Vorauszahlung für Betriebskosten beträgt: <strong>[[rent_nebenkosten]] €</strong>.</p>
                            <p>3. Die monatliche Gesamtmiete beträgt somit: <strong>[[rent_total]] €</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4 Kaution</h3>
                            <p>Der Mieter leistet eine Mietsicherheit (Kaution) in Höhe von <strong>[[deposit_kaution]] €</strong>.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Vermieter)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Mieter)</strong></p></div>
                        </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu mieszkania',
                        'description' => 'Standardowa, zgodna z prawem umowa najmu na długoterminowy wynajem mieszkania w Niemczech.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">MIETVERTRAG</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p>zwischen</p>
                            <p><strong>Vermieter:</strong><br>[[landlord_details]]</p>
                            <p>und</p>
                            <p><strong>Mieter:</strong><br>[[tenant_details]]</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 1 Mietgegenstand</h3>
                            <p>Vermietet werden in dem Anwesen <strong>[[property_address]]</strong> folgende Räume:<br>[[property_description]]</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2 Mietzeit</h3>
                            <p>Das Mietverhältnis beginnt am <strong>[[lease_start]]</strong>. Es wird auf <strong>[[lease_term]]</strong> [[lease_end_date]] geschlossen.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3 Miete und Nebenkosten</h3>
                            <p>1. Die monatliche Kaltmiete beträgt: <strong>[[rent_cold]] €</strong>.</p>
                            <p>2. Die Vorauszahlung für Betriebskosten beträgt: <strong>[[rent_nebenkosten]] €</strong>.</p>
                            <p>3. Die monatliche Gesamtmiete beträgt somit: <strong>[[rent_total]] €</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4 Kaution</h3>
                            <p>Der Mieter leistet eine Mietsicherheit (Kaution) in Höhe von <strong>[[deposit_kaution]] €</strong>.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Vermieter)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Mieter)</strong></p></div>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди житла',
                        'description' => 'Стандартний, юридично сумісний договір оренди для довгострокового найму квартири в Німеччині.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">MIETVERTRAG</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.6;">
                            <p>zwischen</p>
                            <p><strong>Vermieter:</strong><br>[[landlord_details]]</p>
                            <p>und</p>
                            <p><strong>Mieter:</strong><br>[[tenant_details]]</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 1 Mietgegenstand</h3>
                            <p>Vermietet werden in dem Anwesen <strong>[[property_address]]</strong> folgende Räume:<br>[[property_description]]</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2 Mietzeit</h3>
                            <p>Das Mietverhältnis beginnt am <strong>[[lease_start]]</strong>. Es wird auf <strong>[[lease_term]]</strong> [[lease_end_date]] geschlossen.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3 Miete und Nebenkosten</h3>
                            <p>1. Die monatliche Kaltmiete beträgt: <strong>[[rent_cold]] €</strong>.</p>
                            <p>2. Die Vorauszahlung für Betriebskosten beträgt: <strong>[[rent_nebenkosten]] €</strong>.</p>
                            <p>3. Die monatliche Gesamtmiete beträgt somit: <strong>[[rent_total]] €</strong>.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4 Kaution</h3>
                            <p>Der Mieter leistet eine Mietsicherheit (Kaution) in Höhe von <strong>[[deposit_kaution]] €</strong>.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Vermieter)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>_________________________<br><strong>(Unterschrift Mieter)</strong></p></div>
                        </div>'
                    ]
                ]
            ]
        ];

        foreach ($templatesData as $templateData) {
            $this->createTemplate($catLegal->id, $templateData);
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
                'access_level' => $data['access_level'] ?? 'free',
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
