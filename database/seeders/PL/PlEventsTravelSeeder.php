<?php

namespace Database\Seeders\PL;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class PlEventsTravelSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'events-travel-pl')->first();
        if (!$category) {
            $this->command->error('Category with slug "events-travel-pl" not found.');
            return;
        }
        $templatesData = [
            // --- Приглашение на мероприятие (официальное) / Official Event Invitation ---
            [
                'slug' => 'official-event-invitation-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"invitation_date","type":"date","required":true,"labels":{"pl":"Data wystawienia zaproszenia","en":"Invitation Date","uk":"Дата виставлення запрошення","de":"Datum der Einladung"}},
                    {"name":"organizer_name","type":"text","required":true,"labels":{"pl":"Nazwa organizatora/firmy","en":"Organizer/Company Name","uk":"Назва організатора/компанії","de":"Name des Veranstalters/Unternehmens"}},
                    {"name":"organizer_address","type":"text","required":true,"labels":{"pl":"Adres organizatora/firmy","en":"Organizer/Company Address","uk":"Адреса організатора/компанії","de":"Adresse des Veranstalters/Unternehmens"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa odbiorcy","en":"Recipient Name/Company Name","uk":"ПІБ/назва одержувача","de":"Name/Firmenname des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"event_name","type":"text","required":true,"labels":{"pl":"Nazwa wydarzenia","en":"Event Name","uk":"Назва події","de":"Name der Veranstaltung"}},
                    {"name":"event_date","type":"date","required":true,"labels":{"pl":"Data wydarzenia","en":"Event Date","uk":"Дата події","de":"Datum der Veranstaltung"}},
                    {"name":"event_time","type":"text","required":true,"labels":{"pl":"Godzina wydarzenia","en":"Event Time","uk":"Час події","de":"Uhrzeit der Veranstaltung"}},
                    {"name":"event_location","type":"text","required":true,"labels":{"pl":"Miejsce wydarzenia","en":"Event Location","uk":"Місце події","de":"Ort der Veranstaltung"}},
                    {"name":"event_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły wydarzenia (program, cel)","en":"Event details (program, purpose)","uk":"Деталі події (програма, мета)","de":"Veranstaltungsdetails (Programm, Zweck)"}},
                    {"name":"rsvp_details","type":"text","required":false,"labels":{"pl":"Potwierdzenie obecności (RSVP)","en":"RSVP details","uk":"Підтвердження присутності (RSVP)","de":"RSVP-Details"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Oficjalne zaproszenie na wydarzenie',
                        'description' => 'Formalne zaproszenie na wydarzenie, konferencję, galę itp.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZAPROSZENIE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[organizer_name]]</strong><br>[[organizer_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>Mamy zaszczyt zaprosić Państwa na <strong>[[event_name]]</strong>, które odbędzie się:</p>
                                <p>Data: <strong>[[event_date]]</strong></p>
                                <p>Godzina: <strong>[[event_time]]</strong></p>
                                <p>Miejsce: <strong>[[event_location]]</strong></p>
                                <br/>
                                <p>Szczegóły wydarzenia:</p>
                                <p>[[event_details]]</p>
                                <p>Prosimy o potwierdzenie obecności do [[rsvp_details]].</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[organizer_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Official Event Invitation',
                        'description' => 'Formal invitation to an event, conference, gala, etc.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">INVITATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[organizer_name]]</strong><br>[[organizer_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Sir/Madam,</p>
                                <p>We have the honor to invite you to <strong>[[event_name]]</strong>, which will take place on:</p>
                                <p>Date: <strong>[[event_date]]</strong></p>
                                <p>Time: <strong>[[event_time]]</strong></p>
                                <p>Location: <strong>[[event_location]]</strong></p>
                                <br/>
                                <p>Event details:</p>
                                <p>[[event_details]]</p>
                                <p>Please RSVP by [[rsvp_details]].</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[organizer_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Офіційне запрошення на захід',
                        'description' => 'Формальне запрошення на захід, конференцію, гала-вечір тощо.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАПРОШЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[organizer_name]]</strong><br>[[organizer_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановні пані та панове,</p>
                                <p>Маємо честь запросити Вас на <strong>[[event_name]]</strong>, що відбудеться:</p>
                                <p>Дата: <strong>[[event_date]]</strong></p>
                                <p>Час: <strong>[[event_time]]</strong></p>
                                <p>Місце: <strong>[[event_location]]</strong></p>
                                <br/>
                                <p>Деталі події:</p>
                                <p>[[event_details]]</p>
                                <p>Просимо підтвердити присутність до [[rsvp_details]].</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[organizer_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Offizielle Veranstaltungseinladung',
                        'description' => 'Formelle Einladung zu einer Veranstaltung, Konferenz, Gala usw.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EINLADUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[organizer_name]]</strong><br>[[organizer_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>wir beehren uns, Sie zu <strong>[[event_name]]</strong> einzuladen, die stattfinden wird am:</p>
                                <p>Datum: <strong>[[event_date]]</strong></p>
                                <p>Uhrzeit: <strong>[[event_time]]</strong></p>
                                <p>Ort: <strong>[[event_location]]</strong></p>
                                <br/>
                                <p>Veranstaltungsdetails:</p>
                                <p>[[event_details]]</p>
                                <p>Bitte antworten Sie bis [[rsvp_details]].</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[organizer_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Приглашение на день рождения/свадьбу (неофициальное) / Birthday/Wedding Invitation (Informal) ---
            [
                'slug' => 'informal-party-invitation-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"invitation_date","type":"date","required":true,"labels":{"pl":"Data wystawienia zaproszenia","en":"Invitation Date","uk":"Дата виставлення запрошення","de":"Datum der Einladung"}},
                    {"name":"host_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko gospodarza/gospodarzy","en":"Host(s) Name","uk":"ПІБ господаря/господарів","de":"Name des/der Gastgeber"}},
                    {"name":"event_type","type":"text","required":true,"labels":{"pl":"Typ wydarzenia (np. urodziny, ślub, rocznica)","en":"Event Type (e.g., birthday, wedding, anniversary)","uk":"Тип події (напр., день народження, весілля, річниця)","de":"Veranstaltungsart (z.B. Geburtstag, Hochzeit, Jubiläum)"}},
                    {"name":"event_date","type":"date","required":true,"labels":{"pl":"Data wydarzenia","en":"Event Date","uk":"Дата події","de":"Datum der Veranstaltung"}},
                    {"name":"event_time","type":"text","required":true,"labels":{"pl":"Godzina wydarzenia","en":"Event Time","uk":"Час події","de":"Uhrzeit der Veranstaltung"}},
                    {"name":"event_location","type":"text","required":true,"labels":{"pl":"Miejsce wydarzenia","en":"Event Location","uk":"Місце події","de":"Ort der Veranstaltung"}},
                    {"name":"guest_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko zapraszanego","en":"Guest Name","uk":"ПІБ запрошеного","de":"Name des Gastes"}},
                    {"name":"additional_info","type":"textarea","required":false,"labels":{"pl":"Dodatkowe informacje (np. dress code, lista prezentów)","en":"Additional information (e.g., dress code, gift registry)","uk":"Додаткова інформація (напр., дрес-код, список подарунків)","de":"Zusätzliche Informationen (z.B. Dresscode, Geschenkeliste)"}},
                    {"name":"rsvp_contact","type":"text","required":false,"labels":{"pl":"Kontakt do potwierdzenia obecności (RSVP)","en":"RSVP contact details","uk":"Контакт для підтвердження присутності (RSVP)","de":"RSVP-Kontaktdaten"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zaproszenie na urodziny/ślub (nieoficjalne)',
                        'description' => 'Nieformalne zaproszenie na prywatne wydarzenie, takie jak urodziny czy ślub.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZAPROSZENIE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[host_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: center;">
                                <p>Drogi/Droga [[guest_name]],</p>
                                <p>Mamy przyjemność zaprosić Cię na nasze [[event_type]], które odbędzie się:</p>
                                <p>Data: <strong>[[event_date]]</strong></p>
                                <p>Godzina: <strong>[[event_time]]</strong></p>
                                <p>Miejsce: <strong>[[event_location]]</strong></p>
                                <br/>
                                <p>[[additional_info]]</p>
                                <p>Prosimy o potwierdzenie obecności do [[rsvp_contact]].</p>
                                <p>Do zobaczenia!</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: center;">
                                <p>[[host_name]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Birthday/Wedding Invitation (Informal)',
                        'description' => 'Informal invitation to a private event such as a birthday or wedding.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">INVITATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[host_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: center;">
                                <p>Dear [[guest_name]],</p>
                                <p>We are pleased to invite you to our [[event_type]], which will take place on:</p>
                                <p>Date: <strong>[[event_date]]</strong></p>
                                <p>Time: <strong>[[event_time]]</strong></p>
                                <p>Location: <strong>[[event_location]]</strong></p>
                                <br/>
                                <p>[[additional_info]]</p>
                                <p>Please RSVP to [[rsvp_contact]].</p>
                                <p>See you there!</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: center;">
                                <p>[[host_name]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Запрошення на день народження/весілля (неофіційне)',
                        'description' => 'Неофіційне запрошення на приватну подію, таку як день народження або весілля.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАПРОШЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[host_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: center;">
                                <p>Дорогий/Дорога [[guest_name]],</p>
                                <p>Ми раді запросити тебе на наше [[event_type]], яке відбудеться:</p>
                                <p>Дата: <strong>[[event_date]]</strong></p>
                                <p>Час: <strong>[[event_time]]</strong></p>
                                <p>Місце: <strong>[[event_location]]</strong></p>
                                <br/>
                                <p>[[additional_info]]</p>
                                <p>Просимо підтвердити присутність за [[rsvp_contact]].</p>
                                <p>До зустрічі!</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: center;">
                                <p>[[host_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Einladung zum Geburtstag/zur Hochzeit (informell)',
                        'description' => 'Informelle Einladung zu einer privaten Veranstaltung wie einem Geburtstag oder einer Hochzeit.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EINLADUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[host_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: center;">
                                <p>Liebe/r [[guest_name]],</p>
                                <p>Wir freuen uns, Sie/dich zu unserem/unserer [[event_type]] einzuladen, die stattfinden wird am:</p>
                                <p>Datum: <strong>[[event_date]]</strong></p>
                                <p>Uhrzeit: <strong>[[event_time]]</strong></p>
                                <p>Ort: <strong>[[event_location]]</strong></p>
                                <br/>
                                <p>[[additional_info]]</p>
                                <p>Bitte antworte/t an [[rsvp_contact]].</p>
                                <p>Bis bald!</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: center;">
                                <p>[[host_name]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- План мероприятия / Event Plan ---
            [
                'slug' => 'event-plan-pl',
                'fields' => '[
                    {"name":"event_name","type":"text","required":true,"labels":{"pl":"Nazwa wydarzenia","en":"Event Name","uk":"Назва події","de":"Name der Veranstaltung"}},
                    {"name":"plan_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia planu","en":"Plan Date","uk":"Дата складання плану","de":"Datum des Plans"}},
                    {"name":"event_date","type":"date","required":true,"labels":{"pl":"Data wydarzenia","en":"Event Date","uk":"Дата події","de":"Datum der Veranstaltung"}},
                    {"name":"event_time","type":"text","required":true,"labels":{"pl":"Godzina wydarzenia","en":"Event Time","uk":"Час події","de":"Uhrzeit der Veranstaltung"}},
                    {"name":"event_location","type":"text","required":true,"labels":{"pl":"Miejsce wydarzenia","en":"Event Location","uk":"Місце події","de":"Ort der Veranstaltung"}},
                    {"name":"event_purpose","type":"textarea","required":true,"labels":{"pl":"Cel wydarzenia","en":"Event Purpose","uk":"Мета події","de":"Zweck der Veranstaltung"}},
                    {"name":"target_audience","type":"text","required":true,"labels":{"pl":"Grupa docelowa","en":"Target Audience","uk":"Цільова аудиторія","de":"Zielgruppe"}},
                    {"name":"program_schedule","type":"textarea","required":true,"labels":{"pl":"Harmonogram/Program wydarzenia (godzina, aktywność, odpowiedzialny)","en":"Program/Schedule (time, activity, responsible person)","uk":"Розклад/Програма події (час, діяльність, відповідальний)","de":"Programm/Zeitplan (Uhrzeit, Aktivität, Verantwortlicher)"}},
                    {"name":"resources_needed","type":"textarea","required":true,"labels":{"pl":"Potrzebne zasoby (sprzęt, personel, materiały)","en":"Resources needed (equipment, staff, materials)","uk":"Необхідні ресурси (обладнання, персонал, матеріали)","de":"Benötigte Ressourcen (Ausrüstung, Personal, Materialien)"}},
                    {"name":"risk_management","type":"textarea","required":false,"labels":{"pl":"Zarządzanie ryzykiem (potencjalne problemy, rozwiązania)","en":"Risk management (potential problems, solutions)","uk":"Управління ризиками (потенційні проблеми, рішення)","de":"Risikomanagement (potenzielle Probleme, Lösungen)"}},
                    {"name":"contact_person","type":"text","required":true,"labels":{"pl":"Osoba do kontaktu w sprawie planu","en":"Contact Person for the plan","uk":"Контактна особа щодо плану","de":"Ansprechpartner für den Plan"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Plan wydarzenia',
                        'description' => 'Szczegółowy plan organizacji i przebiegu wydarzenia.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PLAN WYDARZENIA</h1><p style="font-size: 14px;">Nazwa wydarzenia: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data sporządzenia planu: [[plan_date]]</p></td><td style="text-align: right;"><p>Data wydarzenia: [[event_date]], godz. [[event_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Miejsce wydarzenia: <strong>[[event_location]]</strong></p>
                                <p>Cel wydarzenia: [[event_purpose]]</p>
                                <p>Grupa docelowa: [[target_audience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. HARMONOGRAM/PROGRAM</h2>
                                <pre>[[program_schedule]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. POTRZEBNE ZASOBY</h2>
                                <p>[[resources_needed]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ZARZĄDZANIE RYZYKIEM</h2>
                                <p>[[risk_management]]</p>
                                <p>Osoba do kontaktu: [[contact_person]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis osoby odpowiedzialnej)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Event Plan',
                        'description' => 'A detailed plan for organizing and conducting an event.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EVENT PLAN</h1><p style="font-size: 14px;">Event Name: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Plan Date: [[plan_date]]</p></td><td style="text-align: right;"><p>Event Date: [[event_date]], Time: [[event_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Event Location: <strong>[[event_location]]</strong></p>
                                <p>Event Purpose: [[event_purpose]]</p>
                                <p>Target Audience: [[target_audience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. PROGRAM/SCHEDULE</h2>
                                <pre>[[program_schedule]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. RESOURCES NEEDED</h2>
                                <p>[[resources_needed]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. RISK MANAGEMENT</h2>
                                <p>[[risk_management]]</p>
                                <p>Contact Person: [[contact_person]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Signature of Responsible Person)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'План заходу',
                        'description' => 'Детальний план організації та проведення заходу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПЛАН ЗАХОДУ</h1><p style="font-size: 14px;">Назва події: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата складання плану: [[plan_date]]</p></td><td style="text-align: right;"><p>Дата події: [[event_date]], час: [[event_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Місце події: <strong>[[event_location]]</strong></p>
                                <p>Мета події: [[event_purpose]]</p>
                                <p>Цільова аудиторія: [[target_audience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. РОЗКЛАД/ПРОГРАМА</h2>
                                <pre>[[program_schedule]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. НЕОБХІДНІ РЕСУРСИ</h2>
                                <p>[[resources_needed]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. УПРАВЛІННЯ РИЗИКАМИ</h2>
                                <p>[[risk_management]]</p>
                                <p>Контактна особа: [[contact_person]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис відповідальної особи)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Veranstaltungsplan',
                        'description' => 'Ein detaillierter Plan für die Organisation und Durchführung einer Veranstaltung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERANSTALTUNGSPLAN</h1><p style="font-size: 14px;">Name der Veranstaltung: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Datum des Plans: [[plan_date]]</p></td><td style="text-align: right;"><p>Datum der Veranstaltung: [[event_date]], Uhrzeit: [[event_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Ort der Veranstaltung: <strong>[[event_location]]</strong></p>
                                <p>Zweck der Veranstaltung: [[event_purpose]]</p>
                                <p>Zielgruppe: [[target_audience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. PROGRAMM/ZEITPLAN</h2>
                                <pre>[[program_schedule]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. BENÖTIGTE RESSOURCEN</h2>
                                <p>[[resources_needed]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. RISIKOMANAGEMENT</h2>
                                <p>[[risk_management]]</p>
                                <p>Ansprechpartner: [[contact_person]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift der verantwortlichen Person)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Бюджет мероприятия / Event Budget ---
            [
                'slug' => 'event-budget-pl',
                'fields' => '[
                    {"name":"event_name","type":"text","required":true,"labels":{"pl":"Nazwa wydarzenia","en":"Event Name","uk":"Назва події","de":"Name der Veranstaltung"}},
                    {"name":"budget_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia budżetu","en":"Budget Date","uk":"Дата складання бюджету","de":"Datum des Budgets"}},
                    {"name":"estimated_income","type":"textarea","required":false,"labels":{"pl":"Szacowane dochody (źródło, kwota)","en":"Estimated income (source, amount)","uk":"Очікувані доходи (джерело, сума)","de":"Geschätzte Einnahmen (Quelle, Betrag)"}},
                    {"name":"total_estimated_income","type":"number","required":false,"labels":{"pl":"Łączny szacowany dochód","en":"Total Estimated Income","uk":"Загальний очікуваний дохід","de":"Geschätzte Gesamteinnahmen"}},
                    {"name":"expense_categories","type":"textarea","required":true,"labels":{"pl":"Kategorie wydatków (nazwa, szacowana kwota)","en":"Expense categories (name, estimated amount)","uk":"Категорії витрат (назва, очікувана сума)","de":"Ausgabenkategorien (Name, geschätzter Betrag)"}},
                    {"name":"total_estimated_expenses","type":"number","required":true,"labels":{"pl":"Łączne szacowane wydatki","en":"Total Estimated Expenses","uk":"Загальні очікувані витрати","de":"Geschätzte Gesamtausgaben"}},
                    {"name":"contingency_fund","type":"number","required":false,"labels":{"pl":"Fundusz awaryjny (%)","en":"Contingency fund (%)","uk":"Резервний фонд (%)","de":"Notfallfonds (%)"}},
                    {"name":"notes","type":"textarea","required":false,"labels":{"pl":"Dodatkowe uwagi","en":"Additional notes","uk":"Додаткові примітки","de":"Zusätzliche Anmerkungen"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Budżet wydarzenia',
                        'description' => 'Szablon do planowania budżetu wydarzenia, uwzględniający dochody i wydatki.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BUDŻET WYDARZENIA</h1><p style="font-size: 14px;">Nazwa wydarzenia: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data sporządzenia budżetu: [[budget_date]]</p></td><td style="text-align: right;"><p>Miejscowość: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. SZACOWANE DOCHODY</h2>
                                <pre>[[estimated_income]]</pre>
                                <p><strong>Łączny szacowany dochód: [[total_estimated_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. KATEGORIE WYDATKÓW</h2>
                                <pre>[[expense_categories]]</pre>
                                <p><strong>Łączne szacowane wydatki: [[total_estimated_expenses]]</strong></p>
                                <p>Fundusz awaryjny: [[contingency_fund]]%</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. DODATKOWE UWAGI</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis osoby odpowiedzialnej)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Event Budget',
                        'description' => 'A template for planning an event budget, including income and expenses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EVENT BUDGET</h1><p style="font-size: 14px;">Event Name: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Budget Date: [[budget_date]]</p></td><td style="text-align: right;"><p>City: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ESTIMATED INCOME</h2>
                                <pre>[[estimated_income]]</pre>
                                <p><strong>Total Estimated Income: [[total_estimated_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. EXPENSE CATEGORIES</h2>
                                <pre>[[expense_categories]]</pre>
                                <p><strong>Total Estimated Expenses: [[total_estimated_expenses]]</strong></p>
                                <p>Contingency fund: [[contingency_fund]]%</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ADDITIONAL NOTES</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Signature of Responsible Person)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Бюджет заходу',
                        'description' => 'Шаблон для планування бюджету заходу, що враховує доходи та витрати.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">БЮДЖЕТ ЗАХОДУ</h1><p style="font-size: 14px;">Назва події: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата складання бюджету: [[budget_date]]</p></td><td style="text-align: right;"><p>Місто: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ОЧІКУВАНІ ДОХОДИ</h2>
                                <pre>[[estimated_income]]</pre>
                                <p><strong>Загальний очікуваний дохід: [[total_estimated_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. КАТЕГОРІЇ ВИТРАТ</h2>
                                <pre>[[expense_categories]]</pre>
                                <p><strong>Загальні очікувані витрати: [[total_estimated_expenses]]</strong></p>
                                <p>Резервний фонд: [[contingency_fund]]%</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ДОДАТКОВІ ПРИМІТКИ</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис відповідальної особи)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Veranstaltungsbudget',
                        'description' => 'Eine Vorlage zur Planung des Veranstaltungsbudgets, einschließlich Einnahmen und Ausgaben.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERANSTALTUNGSBUDGET</h1><p style="font-size: 14px;">Name der Veranstaltung: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Datum des Budgets: [[budget_date]]</p></td><td style="text-align: right;"><p>Ort: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. GESCHÄTZTE EINNAHMEN</h2>
                                <pre>[[estimated_income]]</pre>
                                <p><strong>Geschätzte Gesamteinnahmen: [[total_estimated_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. AUSGABENKATEGORIEN</h2>
                                <pre>[[expense_categories]]</pre>
                                <p><strong>Geschätzte Gesamtausgaben: [[total_estimated_expenses]]</strong></p>
                                <p>Notfallfonds: [[contingency_fund]]%</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ZUSÄTZLICHE ANMERKUNGEN</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift der verantwortlichen Person)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Список гостей / Guest List ---
            [
                'slug' => 'guest-list-pl',
                'fields' => '[
                    {"name":"event_name","type":"text","required":true,"labels":{"pl":"Nazwa wydarzenia","en":"Event Name","uk":"Назва події","de":"Name der Veranstaltung"}},
                    {"name":"list_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia listy","en":"List Date","uk":"Дата складання списку","de":"Datum der Liste"}},
                    {"name":"guests_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły gości (imię i nazwisko, status RSVP, uwagi)","en":"Guest details (name, RSVP status, notes)","uk":"Деталі гостей (ім\'я, прізвище, статус RSVP, примітки)","de":"Gästeliste (Name, RSVP-Status, Anmerkungen)"}},
                    {"name":"total_guests","type":"number","required":true,"labels":{"pl":"Łączna liczba gości","en":"Total number of guests","uk":"Загальна кількість гостей","de":"Gesamtzahl der Gäste"}},
                    {"name":"confirmed_guests","type":"number","required":false,"labels":{"pl":"Potwierdzeni goście (opcjonalnie)","en":"Confirmed guests (optional)","uk":"Підтверджені гості (необов\'язково)","de":"Bestätigte Gäste (optional)"}},
                    {"name":"notes","type":"textarea","required":false,"labels":{"pl":"Dodatkowe uwagi","en":"Additional notes","uk":"Додаткові примітки","de":"Zusätzliche Anmerkungen"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Lista gości',
                        'description' => 'Szablon do tworzenia i zarządzania listą gości na wydarzenie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LISTA GOŚCI</h1><p style="font-size: 14px;">Nazwa wydarzenia: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data sporządzenia listy: [[list_date]]</p></td><td style="text-align: right;"><p>Miejscowość: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Szczegóły gości:</h2>
                                <pre>
Imię i Nazwisko | Status RSVP | Uwagi
--------------------------------------------------
[[guests_details]]
                                </pre>
                                <p><strong>Łączna liczba gości: [[total_guests]]</strong></p>
                                <p>Potwierdzeni goście: [[confirmed_guests]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Dodatkowe uwagi:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis organizatora)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Guest List',
                        'description' => 'A template for creating and managing a guest list for an event.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GUEST LIST</h1><p style="font-size: 14px;">Event Name: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>List Date: [[list_date]]</p></td><td style="text-align: right;"><p>City: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Guest Details:</h2>
                                <pre>
Name | RSVP Status | Notes
--------------------------------------------------
[[guests_details]]
                                </pre>
                                <p><strong>Total number of guests: [[total_guests]]</strong></p>
                                <p>Confirmed guests: [[confirmed_guests]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Additional Notes:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Organizer\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Список гостей',
                        'description' => 'Шаблон для створення та керування списком гостей на захід.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">СПИСОК ГОСТЕЙ</h1><p style="font-size: 14px;">Назва події: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата складання списку: [[list_date]]</p></td><td style="text-align: right;"><p>Місто: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Деталі гостей:</h2>
                                <pre>
Ім\'я та прізвище | Статус RSVP | Примітки
--------------------------------------------------
[[guests_details]]
                                </pre>
                                <p><strong>Загальна кількість гостей: [[total_guests]]</strong></p>
                                <p>Підтверджені гості: [[confirmed_guests]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Додаткові примітки:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис організатора)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Gästeliste',
                        'description' => 'Eine Vorlage zum Erstellen und Verwalten einer Gästeliste für eine Veranstaltung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GÄSTELISTE</h1><p style="font-size: 14px;">Name der Veranstaltung: <strong>[[event_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Datum der Liste: [[list_date]]</p></td><td style="text-align: right;"><p>Ort: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Gästeliste:</h2>
                                <pre>
Name | RSVP Status | Anmerkungen
--------------------------------------------------
[[guests_details]]
                                </pre>
                                <p><strong>Gesamtzahl der Gäste: [[total_guests]]</strong></p>
                                <p>Bestätigte Gäste: [[confirmed_guests]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Zusätzliche Anmerkungen:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Organisators)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Договор с ведущим/фотографом/кейтерингом / Agreement with Host/Photographer/Catering ---
            [
                'slug' => 'service-provider-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"pl":"Nazwa klienta/organizatora","en":"Client/Organizer Name","uk":"Назва клієнта/організатора","de":"Name des Kunden/Veranstalters"}},
                    {"name":"client_address","type":"text","required":true,"labels":{"pl":"Adres klienta/organizatora","en":"Client/Organizer Address","uk":"Адреса клієнта/організатора","de":"Adresse des Kunden/Veranstalters"}},
                    {"name":"service_provider_name","type":"text","required":true,"labels":{"pl":"Nazwa usługodawcy (np. firma cateringowa, imię i nazwisko fotografa)","en":"Service Provider Name (e.g., catering company, photographer\'s name)","uk":"Назва постачальника послуг (напр., кейтерингова компанія, ПІБ фотографа)","de":"Name des Dienstleisters (z.B. Catering-Unternehmen, Name des Fotografen)"}},
                    {"name":"service_provider_address","type":"text","required":true,"labels":{"pl":"Adres usługodawcy","en":"Service Provider Address","uk":"Адреса постачальника послуг","de":"Adresse des Dienstleisters"}},
                    {"name":"service_type","type":"text","required":true,"labels":{"pl":"Rodzaj usługi (np. prowadzenie imprezy, fotografia, catering)","en":"Type of Service (e.g., event hosting, photography, catering)","uk":"Тип послуги (напр., ведення заходу, фотографія, кейтеринг)","de":"Art der Dienstleistung (z.B. Moderation, Fotografie, Catering)"}},
                    {"name":"event_name","type":"text","required":true,"labels":{"pl":"Nazwa wydarzenia","en":"Event Name","uk":"Назва події","de":"Name der Veranstaltung"}},
                    {"name":"event_date","type":"date","required":true,"labels":{"pl":"Data wydarzenia","en":"Event Date","uk":"Дата події","de":"Datum der Veranstaltung"}},
                    {"name":"event_location","type":"text","required":true,"labels":{"pl":"Miejsce wydarzenia","en":"Event Location","uk":"Місце події","de":"Ort der Veranstaltung"}},
                    {"name":"scope_of_services","type":"textarea","required":true,"labels":{"pl":"Szczegółowy zakres usług","en":"Detailed scope of services","uk":"Детальний обсяг послуг","de":"Detaillierter Leistungsumfang"}},
                    {"name":"remuneration_amount","type":"number","required":true,"labels":{"pl":"Kwota wynagrodzenia","en":"Remuneration amount","uk":"Сума винагороди","de":"Vergütungsbetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}},
                    {"name":"cancellation_terms","type":"textarea","required":false,"labels":{"pl":"Warunki anulowania/odstąpienia (opcjonalnie)","en":"Cancellation/withdrawal terms (optional)","uk":"Умови скасування/відмови (необов\'язково)","de":"Stornierungs-/Rücktrittsbedingungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa o świadczenie usług (np. z ведущим/fotografem/cateringiem)',
                        'description' => 'Umowa cywilnoprawna z usługodawcą na potrzeby wydarzenia.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O ŚWIADCZENIE USŁUG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Klientem/Organizatorem:</strong> [[client_name]], adres: [[client_address]],</p>
                                <p>a</p>
                                <p><strong>Usługodawcą:</strong> [[service_provider_name]], adres: [[service_provider_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Przedmiotem umowy jest świadczenie usługi: <strong>[[service_type]]</strong> na potrzeby wydarzenia <strong>[[event_name]]</strong>, które odbędzie się w dniu [[event_date]] w [[event_location]].</p>
                                <p>Szczegółowy zakres usług: [[scope_of_services]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Wynagrodzenie i płatności</h2>
                                <p>Wynagrodzenie za usługę wynosi: <strong>[[remuneration_amount]] [[currency]]</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Warunki anulowania/odstąpienia</h2>
                                <p>[[cancellation_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Klient/Organizator</p></td>
                                <td width="50%"><p>___________________<br>Usługodawca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Agreement with Service Provider (e.g., Host/Photographer/Catering)',
                        'description' => 'A civil law agreement with a service provider for event purposes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SERVICE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Client/Organizer:</strong> [[client_name]], address: [[client_address]],</p>
                                <p>and</p>
                                <p><strong>Service Provider:</strong> [[service_provider_name]], address: [[service_provider_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The subject of the agreement is the provision of the service: <strong>[[service_type]]</strong> for the event <strong>[[event_name]]</strong>, which will take place on [[event_date]] at [[event_location]].</p>
                                <p>Detailed scope of services: [[scope_of_services]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Remuneration and Payments</h2>
                                <p>The remuneration for the service is: <strong>[[remuneration_amount]] [[currency]]</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Cancellation/Withdrawal Terms</h2>
                                <p>[[cancellation_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Client/Organizer</p></td>
                                <td width="50%"><p>___________________<br>Service Provider</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір про надання послуг (напр., з ведучим/фотографом/кейтерингом)',
                        'description' => 'Цивільно-правовий договір з постачальником послуг для потреб заходу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ПРО НАДАННЯ ПОСЛУГ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Клієнтом/Організатором:</strong> [[client_name]], адреса: [[client_address]],</p>
                                <p>та</p>
                                <p><strong>Постачальником послуг:</strong> [[service_provider_name]], адреса: [[service_provider_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Предметом договору є надання послуги: <strong>[[service_type]]</strong> для заходу <strong>[[event_name]]</strong>, який відбудеться [[event_date]] у [[event_location]].</p>
                                <p>Детальний обсяг послуг: [[scope_of_services]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Винагорода та платежі</h2>
                                <p>Винагорода за послугу становить: <strong>[[remuneration_amount]] [[currency]]</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Умови скасування/відмови</h2>
                                <p>[[cancellation_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Клієнт/Організатор</p></td>
                                <td width="50%"><p>___________________<br>Постачальник послуг</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Dienstleistungsvertrag (z.B. mit Moderator/Fotograf/Catering)',
                        'description' => 'Ein zivilrechtlicher Vertrag mit einem Dienstleister für Veranstaltungszwecke.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DIENSTLEISTUNGSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Kunde/Veranstalter:</strong> [[client_name]], Adresse: [[client_address]],</p>
                                <p>und</p>
                                <p><strong>Dienstleister:</strong> [[service_provider_name]], Adresse: [[service_provider_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Gegenstand des Vertrages ist die Erbringung der Dienstleistung: <strong>[[service_type]]</strong> für die Veranstaltung <strong>[[event_name]]</strong>, die am [[event_date]] in [[event_location]] stattfinden wird.</p>
                                <p>Detaillierter Leistungsumfang: [[scope_of_services]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Vergütung und Zahlungen</h2>
                                <p>Die Vergütung für die Dienstleistung beträgt: <strong>[[remuneration_amount]] [[currency]]</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Stornierungs-/Rücktrittsbedingungen</h2>
                                <p>[[cancellation_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Kunde/Veranstalter</p></td>
                                <td width="50%"><p>___________________<br>Dienstleister</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- План путешествия / Маршрут / Travel Plan / Itinerary ---
            [
                'slug' => 'travel-plan-itinerary-pl',
                'fields' => '[
                    {"name":"traveler_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko podróżującego","en":"Traveler\'s Name","uk":"ПІБ подорожуючого","de":"Name des Reisenden"}},
                    {"name":"plan_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia planu","en":"Plan Date","uk":"Дата складання плану","de":"Datum des Plans"}},
                    {"name":"destination","type":"text","required":true,"labels":{"pl":"Cel podróży","en":"Destination","uk":"Пункт призначення","de":"Reiseziel"}},
                    {"name":"travel_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia podróży","en":"Travel Start Date","uk":"Дата початку подорожі","de":"Reisebeginn"}},
                    {"name":"travel_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia podróży","en":"Travel End Date","uk":"Дата закінчення подорожі","de":"Reiseende"}},
                    {"name":"transportation","type":"textarea","required":true,"labels":{"pl":"Transport (loty, pociągi, samochód, szczegóły)","en":"Transportation (flights, trains, car, details)","uk":"Транспорт (рейси, поїзди, автомобіль, деталі)","de":"Transport (Flüge, Züge, Auto, Details)"}},
                    {"name":"accommodation","type":"textarea","required":true,"labels":{"pl":"Zakwaterowanie (nazwa, adres, daty)","en":"Accommodation (name, address, dates)","uk":"Проживання (назва, адреса, дати)","de":"Unterkunft (Name, Adresse, Daten)"}},
                    {"name":"daily_itinerary","type":"textarea","required":true,"labels":{"pl":"Plan dnia (data, godzina, aktywność, miejsce)","en":"Daily itinerary (date, time, activity, location)","uk":"Щоденний маршрут (дата, час, діяльність, місце)","de":"Tagesplan (Datum, Uhrzeit, Aktivität, Ort)"}},
                    {"name":"important_notes","type":"textarea","required":false,"labels":{"pl":"Ważne uwagi (np. wizy, ubezpieczenie, kontakty awaryjne)","en":"Important notes (e.g., visas, insurance, emergency contacts)","uk":"Важливі примітки (напр., візи, страхування, екстрені контакти)","de":"Wichtige Hinweise (z.B. Visa, Versicherung, Notfallkontakte)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Plan podróży / Harmonogram',
                        'description' => 'Szczegółowy plan podróży, zawierający informacje o transporcie, zakwaterowaniu i codziennych aktywnościach.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PLAN PODRÓŻY</h1><p style="font-size: 14px;">Podróżujący: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Cel podróży: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>Data sporządzenia planu: [[plan_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Okres podróży: od <strong>[[travel_start_date]]</strong> do <strong>[[travel_end_date]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. TRANSPORT</h2>
                                <pre>[[transportation]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. ZAKWATEROWANIE</h2>
                                <pre>[[accommodation]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. PLAN DNIA</h2>
                                <pre>[[daily_itinerary]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. WAŻNE UWAGI</h2>
                                <p>[[important_notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis podróżującego)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Travel Plan / Itinerary',
                        'description' => 'A detailed travel plan, including transportation, accommodation, and daily activities.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TRAVEL PLAN</h1><p style="font-size: 14px;">Traveler: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Destination: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>Plan Date: [[plan_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Travel Period: from <strong>[[travel_start_date]]</strong> to <strong>[[travel_end_date]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. TRANSPORTATION</h2>
                                <pre>[[transportation]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. ACCOMMODATION</h2>
                                <pre>[[accommodation]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. DAILY ITINERARY</h2>
                                <pre>[[daily_itinerary]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. IMPORTANT NOTES</h2>
                                <p>[[important_notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Traveler\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'План подорожі / Маршрут',
                        'description' => 'Детальний план подорожі, що містить інформацію про транспорт, проживання та щоденні заходи.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПЛАН ПОДОРОЖІ</h1><p style="font-size: 14px;">Подорожуючий: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Пункт призначення: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>Дата складання плану: [[plan_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Період подорожі: з <strong>[[travel_start_date]]</strong> по <strong>[[travel_end_date]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ТРАНСПОРТ</h2>
                                <pre>[[transportation]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. ПРОЖИВАННЯ</h2>
                                <pre>[[accommodation]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ЩОДЕННИЙ МАРШРУТ</h2>
                                <pre>[[daily_itinerary]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. ВАЖЛИВІ ПРИМІТКИ</h2>
                                <p>[[important_notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис подорожуючого)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Reiseplan / Reiseroute',
                        'description' => 'Ein detaillierter Reiseplan, einschließlich Transport, Unterkunft und täglichen Aktivitäten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REISEPLAN</h1><p style="font-size: 14px;">Reisender: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Reiseziel: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>Datum des Plans: [[plan_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Reisezeitraum: vom <strong>[[travel_start_date]]</strong> bis zum <strong>[[travel_end_date]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. TRANSPORT</h2>
                                <pre>[[transportation]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. UNTERKUNFT</h2>
                                <pre>[[accommodation]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. TAGESPLAN</h2>
                                <pre>[[daily_itinerary]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. WICHTIGE HINWEISE</h2>
                                <p>[[important_notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Reisenden)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Бюджет путешествия / Travel Budget ---
            [
                'slug' => 'travel-budget-pl',
                'fields' => '[
                    {"name":"traveler_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko podróżującego","en":"Traveler\'s Name","uk":"ПІБ подорожуючого","de":"Name des Reisenden"}},
                    {"name":"budget_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia budżetu","en":"Budget Date","uk":"Дата складання бюджету","de":"Datum des Budgets"}},
                    {"name":"destination","type":"text","required":true,"labels":{"pl":"Cel podróży","en":"Destination","uk":"Пункт призначення","de":"Reiseziel"}},
                    {"name":"travel_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia podróży","en":"Travel Start Date","uk":"Дата початку подорожі","de":"Reisebeginn"}},
                    {"name":"travel_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia podróży","en":"Travel End Date","uk":"Дата закінчення подорожі","de":"Reiseende"}},
                    {"name":"estimated_income","type":"textarea","required":false,"labels":{"pl":"Szacowane dochody (źródło, kwota)","en":"Estimated income (source, amount)","uk":"Очікувані доходи (джерело, сума)","de":"Geschätzte Einnahmen (Quelle, Betrag)"}},
                    {"name":"total_estimated_income","type":"number","required":false,"labels":{"pl":"Łączny szacowany dochód","en":"Total Estimated Income","uk":"Загальний очікуваний дохід","de":"Geschätzte Gesamteinnahmen"}},
                    {"name":"expense_categories","type":"textarea","required":true,"labels":{"pl":"Kategorie wydatków (nazwa, szacowana kwota)","en":"Expense categories (name, estimated amount)","uk":"Категорії витрат (назва, очікувана сума)","de":"Ausgabenkategorien (Name, geschätzter Betrag)"}},
                    {"name":"total_estimated_expenses","type":"number","required":true,"labels":{"pl":"Łączne szacowane wydatki","en":"Total Estimated Expenses","uk":"Загальні очікувані витрати","de":"Geschätzte Gesamtausgaben"}},
                    {"name":"contingency_fund","type":"number","required":false,"labels":{"pl":"Fundusz awaryjny (%)","en":"Contingency fund (%)","uk":"Резервний фонд (%)","de":"Notfallfonds (%)"}},
                    {"name":"notes","type":"textarea","required":false,"labels":{"pl":"Dodatkowe uwagi","en":"Additional notes","uk":"Додаткові примітки","de":"Zusätzliche Anmerkungen"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Budżet podróży',
                        'description' => 'Szablon do planowania budżetu podróży, uwzględniający dochody i wydatki.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BUDŻET PODRÓŻY</h1><p style="font-size: 14px;">Podróżujący: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Cel podróży: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>Data sporządzenia budżetu: [[budget_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Okres podróży: od <strong>[[travel_start_date]]</strong> do <strong>[[travel_end_date]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. SZACOWANE DOCHODY</h2>
                                <pre>[[estimated_income]]</pre>
                                <p><strong>Łączny szacowany dochód: [[total_estimated_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. KATEGORIE WYDATKÓW</h2>
                                <pre>[[expense_categories]]</pre>
                                <p><strong>Łączne szacowane wydatki: [[total_estimated_expenses]]</strong></p>
                                <p>Fundusz awaryjny: [[contingency_fund]]%</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. DODATKOWE UWAGI</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis podróżującego)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Travel Budget',
                        'description' => 'A template for planning a travel budget, including income and expenses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TRAVEL BUDGET</h1><p style="font-size: 14px;">Traveler: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Destination: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>Budget Date: [[budget_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Travel Period: from <strong>[[travel_start_date]]</strong> to <strong>[[travel_end_date]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ESTIMATED INCOME</h2>
                                <pre>[[estimated_income]]</pre>
                                <p><strong>Total Estimated Income: [[total_estimated_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. EXPENSE CATEGORIES</h2>
                                <pre>[[expense_categories]]</pre>
                                <p><strong>Total Estimated Expenses: [[total_estimated_expenses]]</strong></p>
                                <p>Contingency fund: [[contingency_fund]]%</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ADDITIONAL NOTES</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Traveler\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Бюджет подорожі',
                        'description' => 'Шаблон для планування бюджету подорожі, що враховує доходи та витрати.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">БЮДЖЕТ ПОДОРОЖІ</h1><p style="font-size: 14px;">Подорожуючий: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Пункт призначення: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>Дата складання бюджету: [[budget_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Період подорожі: з <strong>[[travel_start_date]]</strong> по <strong>[[travel_end_date]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ОЧІКУВАНІ ДОХОДИ</h2>
                                <pre>[[estimated_income]]</pre>
                                <p><strong>Загальний очікуваний дохід: [[total_estimated_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. КАТЕГОРІЇ ВИТРАТ</h2>
                                <pre>[[expense_categories]]</pre>
                                <p><strong>Загальні очікувані витрати: [[total_estimated_expenses]]</strong></p>
                                <p>Резервний фонд: [[contingency_fund]]%</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ДОДАТКОВІ ПРИМІТКИ</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис подорожуючого)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Reisebudget',
                        'description' => 'Eine Vorlage zur Planung eines Reisebudgets, einschließlich Einnahmen und Ausgaben.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REISEBUDGET</h1><p style="font-size: 14px;">Reisender: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Reiseziel: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>Datum des Budgets: [[budget_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Reisezeitraum: vom <strong>[[travel_start_date]]</strong> bis zum <strong>[[travel_end_date]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. GESCHÄTZTE EINNAHMEN</h2>
                                <pre>[[estimated_income]]</pre>
                                <p><strong>Geschätzte Gesamteinnahmen: [[total_estimated_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. AUSGABENKATEGORIEN</h2>
                                <pre>[[expense_categories]]</pre>
                                <p><strong>Geschätzte Gesamtausgaben: [[total_estimated_expenses]]</strong></p>
                                <p>Notfallfonds: [[contingency_fund]]%</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ZUSÄTZLICHE ANMERKUNGEN</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Reisenden)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Список вещей в дорогу / Packing List ---
            [
                'slug' => 'packing-list-pl',
                'fields' => '[
                    {"name":"traveler_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko podróżującego","en":"Traveler\'s Name","uk":"ПІБ подорожуючого","de":"Name des Reisenden"}},
                    {"name":"list_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia listy","en":"List Date","uk":"Дата складання списку","de":"Datum der Liste"}},
                    {"name":"destination","type":"text","required":true,"labels":{"pl":"Cel podróży","en":"Destination","uk":"Пункт призначення","de":"Reiseziel"}},
                    {"name":"travel_duration","type":"text","required":true,"labels":{"pl":"Czas trwania podróży (np. 7 dni)","en":"Travel Duration (e.g., 7 days)","uk":"Тривалість подорожі (напр., 7 днів)","de":"Reisedauer (z.B. 7 Tage)"}},
                    {"name":"items_to_pack","type":"textarea","required":true,"labels":{"pl":"Rzeczy do spakowania (kategoria, nazwa, ilość, status)","en":"Items to pack (category, name, quantity, status)","uk":"Речі для пакування (категорія, назва, кількість, статус)","de":"Gepäckstücke (Kategorie, Name, Menge, Status)"}},
                    {"name":"notes","type":"textarea","required":false,"labels":{"pl":"Dodatkowe uwagi","en":"Additional notes","uk":"Додаткові примітки","de":"Zusätzliche Anmerkungen"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Lista rzeczy do spakowania',
                        'description' => 'Szablon listy rzeczy do spakowania na podróż.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LISTA RZECZY DO SPAKOWANIA</h1><p style="font-size: 14px;">Podróżujący: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Cel podróży: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>Data sporządzenia listy: [[list_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Czas trwania podróży: <strong>[[travel_duration]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Rzeczy do spakowania:</h2>
                                <pre>
Kategoria | Nazwa | Ilość | Status (spakowano/nie)
------------------------------------------------------------------
[[items_to_pack]]
                                </pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Dodatkowe uwagi:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis podróżującego)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Packing List',
                        'description' => 'A template for a packing list for travel.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PACKING LIST</h1><p style="font-size: 14px;">Traveler: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Destination: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>List Date: [[list_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Travel Duration: <strong>[[travel_duration]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Items to Pack:</h2>
                                <pre>
Category | Name | Quantity | Status (packed/not)
------------------------------------------------------------------
[[items_to_pack]]
                                </pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Additional Notes:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Traveler\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Список речей у дорогу',
                        'description' => 'Шаблон списку речей для пакування в подорож.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">СПИСОК РЕЧЕЙ У ДОРОГУ</h1><p style="font-size: 14px;">Подорожуючий: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Пункт призначення: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>Дата складання списку: [[list_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Тривалість подорожі: <strong>[[travel_duration]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Речі для пакування:</h2>
                                <pre>
Категорія | Назва | Кількість | Статус (спаковано/ні)
------------------------------------------------------------------
[[items_to_pack]]
                                </pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Додаткові примітки:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис подорожуючого)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Packliste',
                        'description' => 'Eine Vorlage für eine Packliste für Reisen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PACKLISTE</h1><p style="font-size: 14px;">Reisender: <strong>[[traveler_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Reiseziel: <strong>[[destination]]</strong></p></td><td style="text-align: right;"><p>Datum der Liste: [[list_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Reisedauer: <strong>[[travel_duration]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Gepäckstücke:</h2>
                                <pre>
Kategorie | Name | Menge | Status (gepackt/nicht)
------------------------------------------------------------------
[[items_to_pack]]
                                </pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Zusätzliche Anmerkungen:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Reisenden)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Согласие на выезд ребенка (дубликат из семейной категории) / Child Travel Consent (duplicate from family category) ---
            [
                'slug' => 'child-travel-consent-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"consent_date","type":"date","required":true,"labels":{"pl":"Data wyrażenia zgody","en":"Consent Date","uk":"Дата надання згоди","de":"Datum der Zustimmung"}},
                    {"name":"parent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna","en":"Parent\'s/Guardian\'s Full Name","uk":"ПІБ батька/опікуна","de":"Vollständiger Name des Elternteils/Vormunds"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"pl":"Adres rodzica/opiekuna","en":"Parent\'s/Guardian\'s Address","uk":"Адреса батька/опікуна","de":"Adresse des Elternteils/Vormunds"}},
                    {"name":"parent_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości rodzica/opiekuna","en":"Parent\'s/Guardian\'s ID Number","uk":"Номер посвідчення батька/опікуна","de":"Ausweisnummer des Elternteils/Vormunds"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"travel_destination","type":"text","required":true,"labels":{"pl":"Kraj/kraje docelowe podróży","en":"Destination Country/Countries","uk":"Країна/країни призначення подорожі","de":"Zielland/-länder der Reise"}},
                    {"name":"travel_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia podróży","en":"Travel Start Date","uk":"Дата початку подорожі","de":"Reisebeginn"}},
                    {"name":"travel_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia podróży","en":"Travel End Date","uk":"Дата закінчення подорожі","de":"Reiseende"}},
                    {"name":"accompanying_person_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko osoby towarzyszącej (jeśli inna niż rodzic)","en":"Accompanying Person\'s Full Name (if other than parent)","uk":"ПІБ супроводжуючої особи (якщо інша, ніж батько)","de":"Vollständiger Name der Begleitperson (falls nicht Elternteil)"}},
                    {"name":"accompanying_person_id_number","type":"text","required":false,"labels":{"pl":"Numer dowodu tożsamości osoby towarzyszącej (opcjonalnie)","en":"Accompanying Person\'s ID Number (optional)","uk":"Номер посвідчення супроводжуючої особи (необов\'язково)","de":"Ausweisnummer der Begleitperson (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zgoda rodzica na podróż dziecka za granicę',
                        'description' => 'Oficjalna zgoda rodzica/opiekuna na wyjazd dziecka za granicę.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZGODA RODZICA NA PODRÓŻ DZIECKA ZA GRANICĘ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ja, niżej podpisany/a:<br><strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>Dowód osobisty nr: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym wyrażam zgodę na samodzielny wyjazd / wyjazd w towarzystwie [[accompanying_person_full_name]] (dowód osobisty nr: [[accompanying_person_id_number]]) mojego/mojej małoletniego/ej dziecka:</p>
                                <p><strong>[[child_full_name]]</strong>, urodzonego/ej dnia [[child_dob]],</p>
                                <p>do kraju/krajów: <strong>[[travel_destination]]</strong></p>
                                <p>w okresie od dnia <strong>[[travel_start_date]]</strong> do dnia <strong>[[travel_end_date]]</strong>.</p>
                                <p>Oświadczam, że jestem świadomy/a skutków prawnych wyrażenia niniejszej zgody.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Child Travel Consent',
                        'description' => 'Official consent of a parent/guardian for a child to travel abroad.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PARENTAL CONSENT FOR CHILD TRAVEL ABROAD</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>I, the undersigned:<br><strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>ID No: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby consent to the independent travel / travel accompanied by [[accompanying_person_full_name]] (ID No: [[accompanying_person_id_number]]) of my minor child:</p>
                                <p><strong>[[child_full_name]]</strong>, born on [[child_dob]],</p>
                                <p>to the country/countries: <strong>[[travel_destination]]</strong></p>
                                <p>for the period from <strong>[[travel_start_date]]</strong> to <strong>[[travel_end_date]]</strong>.</p>
                                <p>I declare that I am aware of the legal consequences of giving this consent.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Згода батьків на виїзд дитини за кордон',
                        'description' => 'Офіційна згода батьків/опікуна на виїзд дитини за кордон.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗГОДА БАТЬКІВ НА ВИЇЗД ДИТИНИ ЗА КОРДОН</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Я, нижчепідписаний/а:<br><strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>Паспорт №: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим надаю згоду на самостійний виїзд / виїзд у супроводі [[accompanying_person_full_name]] (паспорт №: [[accompanying_person_id_number]]) моєї/моєї неповнолітньої дитини:</p>
                                <p><strong>[[child_full_name]]</strong>, народженої/го [[child_dob]],</p>
                                <p>до країни/країн: <strong>[[travel_destination]]</strong></p>
                                <p>у період з <strong>[[travel_start_date]]</strong> по <strong>[[travel_end_date]]</strong>.</p>
                                <p>Заявляю, що я усвідомлюю правові наслідки надання цієї згоди.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Zustimmung der Eltern zur Ausreise des Kindes',
                        'description' => 'Amtliche Zustimmung eines Elternteils/Vormunds zur Ausreise des Kindes ins Ausland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZUSTIMMUNG DER ELTERN ZUR AUSREISE DES KINDES INS AUSLAND</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ich, der/die Unterzeichnete:<br><strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>Ausweis-Nr.: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit willige ich in die selbstständige Ausreise / Ausreise in Begleitung von [[accompanying_person_full_name]] (Ausweis-Nr.: [[accompanying_person_id_number]]) meines minderjährigen Kindes ein:</p>
                                <p><strong>[[child_full_name]]</strong>, geboren am [[child_dob]],</p>
                                <p>in das/die Land/Länder: <strong>[[travel_destination]]</strong></p>
                                <p>im Zeitraum vom <strong>[[travel_start_date]]</strong> bis zum <strong>[[travel_end_date]]</strong>.</p>
                                <p>Ich erkläre, dass ich mir der rechtlichen Folgen dieser Zustimmung bewusst bin.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Доверенность на ребенка для путешествия с третьим лицом / Power of Attorney for Child Travel with Third Party ---
            [
                'slug' => 'poa-child-travel-third-party-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"parent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna","en":"Parent\'s/Guardian\'s Full Name","uk":"ПІБ батька/опікуна","de":"Vollständiger Name des Elternteils/Vormunds"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"pl":"Adres rodzica/opiekuna","en":"Parent\'s/Guardian\'s Address","uk":"Адреса батька/опікуна","de":"Adresse des Elternteils/Vormunds"}},
                    {"name":"parent_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości rodzica/opiekuna","en":"Parent\'s/Guardian\'s ID Number","uk":"Номер посвідчення батька/опікуна","de":"Ausweisnummer des Elternteils/Vormunds"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"accompanying_person_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko osoby towarzyszącej","en":"Accompanying Person\'s Full Name","uk":"ПІБ супроводжуючої особи","de":"Vollständiger Name der Begleitperson"}},
                    {"name":"accompanying_person_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości osoby towarzyszącej","en":"Accompanying Person\'s ID Number","uk":"Номер посвідчення супроводжуючої особи","de":"Ausweisnummer der Begleitperson"}},
                    {"name":"travel_destination","type":"text","required":true,"labels":{"pl":"Kraj/kraje docelowe podróży","en":"Destination Country/Countries","uk":"Країна/країни призначення подорожі","de":"Zielland/-länder der Reise"}},
                    {"name":"travel_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia podróży","en":"Travel Start Date","uk":"Дата початку подорожі","de":"Reisebeginn"}},
                    {"name":"travel_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia podróży","en":"Travel End Date","uk":"Дата закінчення подоroży","de":"Reiseende"}},
                    {"name":"scope_of_authority","type":"textarea","required":true,"labels":{"pl":"Zakres pełnomocnictwa (np. opieka medyczna, decyzje w nagłych wypadkach)","en":"Scope of authority (e.g., medical care, emergency decisions)","uk":"Обсяг повноважень (напр., медична допомога, рішення в надзвичайних ситуаціях)","de":"Umfang der Vollmacht (z.B. medizinische Versorgung, Notfallentscheidungen)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pełnomocnictwo dla osoby trzeciej do podróży z dzieckiem',
                        'description' => 'Dokument uprawniający osobę trzecią do opieki nad dzieckiem i podejmowania decyzji w jego imieniu podczas podróży.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[poa_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[parent_full_name]]</strong>, zamieszkały/a w [[parent_address]], legitymujący/a się dowodem osobistym nr [[parent_id_number]],</p>
                                <p>niniejszym udzielam pełnomocnictwa Panu/Pani: <strong>[[accompanying_person_full_name]]</strong>, legitymującemu/ej się dowodem osobistym nr [[accompanying_person_id_number]],</p>
                                <p>do sprawowania opieki nad moim/moją małoletnim/nią dzieckiem:</p>
                                <p><strong>[[child_full_name]]</strong>, urodzonym/ą dnia [[child_dob]],</p>
                                <p>podczas podróży do kraju/krajów: <strong>[[travel_destination]]</strong>, w okresie od dnia <strong>[[travel_start_date]]</strong> do dnia <strong>[[travel_end_date]]</strong>.</p>
                                <p>Zakres pełnomocnictwa obejmuje: [[scope_of_authority]]</p>
                                <p>Oświadczam, że jestem świadomy/a skutków prawnych udzielenia niniejszego pełnomocnictwa.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Child Travel with Third Party',
                        'description' => 'A document authorizing a third party to care for a child and make decisions on their behalf during travel.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[parent_full_name]]</strong>, residing in [[parent_address]], holding ID number [[parent_id_number]],</p>
                                <p>hereby grant power of attorney to Mr./Ms.: <strong>[[accompanying_person_full_name]]</strong>, holding ID number [[accompanying_person_id_number]],</p>
                                <p>to care for my minor child:</p>
                                <p><strong>[[child_full_name]]</strong>, born on [[child_dob]],</p>
                                <p>during travel to the country/countries: <strong>[[travel_destination]]</strong>, for the period from <strong>[[travel_start_date]]</strong> to <strong>[[travel_end_date]]</strong>.</p>
                                <p>The scope of authority includes: [[scope_of_authority]]</p>
                                <p>I declare that I am aware of the legal consequences of granting this power of attorney.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на дитину для подорожі з третьою особою',
                        'description' => 'Документ, що уповноважує третю особу на опіку над дитиною та прийняття рішень від її імені під час подорожі.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[parent_full_name]]</strong>, що проживає за адресою [[parent_address]], який/яка посвідчує особу за паспортом № [[parent_id_number]],</p>
                                <p>цим надаю довіреність Пану/Пані: <strong>[[accompanying_person_full_name]]</strong>, що посвідчує особу за паспортом № [[accompanying_person_id_number]],</p>
                                <p>на здійснення опіки над моєю/моєю неповнолітньою дитиною:</p>
                                <p><strong>[[child_full_name]]</strong>, народженою/го [[child_dob]],</p>
                                <p>під час подорожі до країни/країн: <strong>[[travel_destination]]</strong>, у період з <strong>[[travel_start_date]]</strong> по <strong>[[travel_end_date]]</strong>.</p>
                                <p>Обсяг повноважень включає: [[scope_of_authority]]</p>
                                <p>Заявляю, що я усвідомлюю правові наслідки надання цієї довіреності.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht für die Reise des Kindes mit einer dritten Person',
                        'description' => 'Ein Dokument, das eine dritte Person ermächtigt, sich um ein Kind zu kümmern und in dessen Namen während der Reise Entscheidungen zu treffen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[parent_full_name]]</strong>, wohnhaft in [[parent_address]], Ausweis-Nr. [[parent_id_number]],</p>
                                <p>erteile hiermit Herrn/Frau: <strong>[[accompanying_person_full_name]]</strong>, Ausweis-Nr. [[accompanying_person_id_number]], die Vollmacht,</p>
                                <p>sich um mein minderjähriges Kind zu kümmern:</p>
                                <p><strong>[[child_full_name]]</strong>, geboren am [[child_dob]],</p>
                                <p>während der Reise in das/die Land/Länder: <strong>[[travel_destination]]</strong>, im Zeitraum vom <strong>[[travel_start_date]]</strong> bis zum <strong>[[travel_end_date]]</strong>.</p>
                                <p>Der Umfang der Vollmacht umfasst: [[scope_of_authority]]</p>
                                <p>Ich erkläre, dass ich mir der rechtlichen Folgen der Erteilung dieser Vollmacht bewusst bin.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
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
