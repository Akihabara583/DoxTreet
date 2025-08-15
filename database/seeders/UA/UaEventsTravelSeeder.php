<?php

namespace Database\Seeders\UA;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Support\Arr;

class UaEventsTravelSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'events-travel-ua')->first();
        if (!$category) {
            $this->command->error('Category with slug "events-travel" not found.');
            return;
        }


        $templatesData = [
            // --- 1. Приглашение на мероприятие (официальное) ---
            [
                'slug' => 'official-event-invitation-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"organizer_name","type":"text","required":true,"labels":{"uk":"Назва організації-організатора","en":"Organizer Organization Name", "pl":"Nazwa organizacji-organizatora", "de":"Name der veranstaltenden Organisation"}},
                    {"name":"event_name","type":"text","required":true,"labels":{"uk":"Назва заходу","en":"Event Name", "pl":"Nazwa wydarzenia", "de":"Veranstaltungsname"}},
                    {"name":"event_date","type":"date","required":true,"labels":{"uk":"Дата заходу","en":"Event Date", "pl":"Data wydarzenia", "de":"Veranstaltungsdatum"}},
                    {"name":"event_time","type":"text","required":true,"labels":{"uk":"Час заходу","en":"Event Time", "pl":"Godzina wydarzenia", "de":"Veranstaltungszeit"}},
                    {"name":"event_location","type":"text","required":true,"labels":{"uk":"Місце проведення заходу","en":"Event Location", "pl":"Miejsce wydarzenia", "de":"Veranstaltungsort"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"ПІБ запрошеного","en":"Invitee\'s Full Name", "pl":"Imię i nazwisko zaproszonego", "de":"Vollständiger Name des Eingeladenen"}},
                    {"name":"recipient_position","type":"text","required":false,"labels":{"uk":"Посада запрошеного","en":"Invitee\'s Position", "pl":"Stanowisko zaproszonego", "de":"Position des Eingeladenen"}},
                    {"name":"invitation_text","type":"textarea","required":true,"labels":{"uk":"Текст запрошення","en":"Invitation Text", "pl":"Treść zaproszenia", "de":"Einladungstext"}},
                    {"name":"contact_person","type":"text","required":true,"labels":{"uk":"Контактна особа","en":"Contact Person", "pl":"Osoba kontaktowa", "de":"Ansprechpartner"}},
                    {"name":"contact_phone","type":"text","required":false,"labels":{"uk":"Контактний телефон","en":"Contact Phone", "pl":"Telefon kontaktowy", "de":"Telefon des Ansprechpartners"}},
                    {"name":"contact_email","type":"email","required":false,"labels":{"uk":"Контактний Email","en":"Contact Email", "pl":"E-mail kontaktowy", "de":"E-Mail des Ansprechpartners"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Приглашение на мероприятие (официальное)',
                        'description' => 'Официальное приглашение на мероприятие.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ОФІЦІЙНЕ ЗАПРОШЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[organizer_name]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table><br/><p>Шановний(а) [[recipient_name]] [[recipient_position]],</p>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Запрошуємо Вас на <strong>[[event_name]]</strong>, що відбудеться <strong>[[event_date]]</strong> о <strong>[[event_time]]</strong> за адресою: <strong>[[event_location]]</strong>.</p>
                                <p>[[invitation_text]]</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Контактна особа: [[contact_person]]</p>
                                <p>Телефон: [[contact_phone]]</p>
                                <p>Email: [[contact_email]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Official Event Invitation',
                        'description' => 'Official invitation to an event.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFFICIAL INVITATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[organizer_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table><br/><p>Dear [[recipient_name]] [[recipient_position]],</p>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>You are invited to <strong>[[event_name]]</strong>, which will take place on <strong>[[event_date]]</strong> at <strong>[[event_time]]</strong> at: <strong>[[event_location]]</strong>.</p>
                                <p>[[invitation_text]]</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Contact Person: [[contact_person]]</p>
                                <p>Phone: [[contact_phone]]</p>
                                <p>Email: [[contact_email]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Oficjalne zaproszenie na wydarzenie',
                        'description' => 'Oficjalne zaproszenie na wydarzenie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFICJALNE ZAPROSZENIE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[organizer_name]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table><br/><p>Szanowny(a) Panie/Pani [[recipient_name]] [[recipient_position]],</p>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zapraszamy na <strong>[[event_name]]</strong>, które odbędzie się <strong>[[event_date]]</strong> o godzinie <strong>[[event_time]]</strong> pod adresem: <strong>[[event_location]]</strong>.</p>
                                <p>[[invitation_text]]</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Osoba kontaktowa: [[contact_person]]</p>
                                <p>Telefon: [[contact_phone]]</p>
                                <p>E-mail: [[contact_email]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Offizielle Veranstaltungseinladung',
                        'description' => 'Offizielle Einladung zu einer Veranstaltung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFFIZIELLE EINLADUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[organizer_name]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table><br/><p>Sehr geehrte(r) Herr/Frau [[recipient_name]] [[recipient_position]],</p>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir laden Sie herzlich ein zu <strong>[[event_name]]</strong>, das am <strong>[[event_date]]</strong> um <strong>[[event_time]]</strong> in <strong>[[event_location]]</strong> stattfindet.</p>
                                <p>[[invitation_text]]</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Ansprechpartner: [[contact_person]]</p>
                                <p>Telefon: [[contact_phone]]</p>
                                <p>E-Mail: [[contact_email]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 2. Приглашение на день рождения/свадьбу (неофициальное) ---
            [
                'slug' => 'informal-invitation-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"event_type","type":"text","required":true,"labels":{"uk":"Тип події (День народження, Весілля)","en":"Event Type (Birthday, Wedding)", "pl":"Rodzaj wydarzenia (Urodziny, Ślub)", "de":"Ereignistyp (Geburtstag, Hochzeit)"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"Ім\'я запрошеного","en":"Invitee\'s Name", "pl":"Imię zaproszonego", "de":"Name des Eingeladenen"}},
                    {"name":"host_name","type":"text","required":true,"labels":{"uk":"Ім\'я організатора","en":"Host\'s Name", "pl":"Imię organizatora", "de":"Name des Gastgebers"}},
                    {"name":"event_date","type":"date","required":true,"labels":{"uk":"Дата події","en":"Event Date", "pl":"Data wydarzenia", "de":"Veranstaltungsdatum"}},
                    {"name":"event_time","type":"text","required":true,"labels":{"uk":"Час події","en":"Event Time", "pl":"Godzina wydarzenia", "de":"Veranstaltungszeit"}},
                    {"name":"event_location","type":"text","required":true,"labels":{"uk":"Місце проведення","en":"Event Location", "pl":"Miejsce wydarzenia", "de":"Veranstaltungsort"}},
                    {"name":"rsvp_date","type":"date","required":false,"labels":{"uk":"Дата відповіді (RSVP)","en":"RSVP Date", "pl":"Data potwierdzenia obecności (RSVP)", "de":"Datum der Zusage (RSVP)"}},
                    {"name":"rsvp_contact","type":"text","required":false,"labels":{"uk":"Контакт для RSVP","en":"RSVP Contact", "pl":"Kontakt do RSVP", "de":"RSVP-Kontakt"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Приглашение на день рождения/свадьбу (неофициальное)',
                        'description' => 'Неофициальное приглашение на личное мероприятие.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАПРОШЕННЯ</h1><p>на [[event_type]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Привіт, [[recipient_name]]!</p>
                                <p>Запрошуємо тебе на святкування з нагоди [[event_type]], яке відбудеться <strong>[[event_date]]</strong> о <strong>[[event_time]]</strong> за адресою: <strong>[[event_location]]</strong>.</p>
                                <p>Будемо раді бачити тебе!</p>
                                [[rsvp_date]]<p>Просимо підтвердити свою присутність до [[rsvp_date]].</p>[[/rsvp_date]]
                                [[rsvp_contact]]<p>Контакт для RSVP: [[rsvp_contact]].</p>[[/rsvp_contact]]
                                <p>З любов\'ю,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[host_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Informal Invitation (Birthday/Wedding)',
                        'description' => 'Informal invitation to a personal event.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">INVITATION</h1><p>to [[event_type]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hi [[recipient_name]]!</p>
                                <p>You are invited to celebrate [[event_type]] on <strong>[[event_date]]</strong> at <strong>[[event_time]]</strong> at: <strong>[[event_location]]</strong>.</p>
                                <p>We would love to see you there!</p>
                                [[rsvp_date]]<p>Please RSVP by [[rsvp_date]].</p>[[/rsvp_date]]
                                [[rsvp_contact]]<p>RSVP Contact: [[rsvp_contact]].</p>[[/rsvp_contact]]
                                <p>With love,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[host_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Nieformalne zaproszenie (urodziny/ślub)',
                        'description' => 'Nieformalne zaproszenie na wydarzenie prywatne.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZAPROSZENIE</h1><p>na [[event_type]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Cześć [[recipient_name]]!</p>
                                <p>Zapraszamy Cię na uroczystość z okazji [[event_type]], która odbędzie się <strong>[[event_date]]</strong> o godzinie <strong>[[event_time]]</strong> pod adresem: <strong>[[event_location]]</strong>.</p>
                                <p>Będziemy bardzo szczęśliwi, jeśli dołączysz!</p>
                                [[rsvp_date]]<p>Prosimy o potwierdzenie obecności do [[rsvp_date]].</p>[[/rsvp_date]]
                                [[rsvp_contact]]<p>Kontakt do RSVP: [[rsvp_contact]].</p>[[/rsvp_contact]]
                                <p>Z miłością,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[host_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Informelle Einladung (Geburtstag/Hochzeit)',
                        'description' => 'Informelle Einladung zu einer privaten Veranstaltung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EINLADUNG</h1><p>zu [[event_type]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hallo [[recipient_name]]!</p>
                                <p>Wir laden Sie herzlich ein, [[event_type]] am <strong>[[event_date]]</strong> um <strong>[[event_time]]</strong> in <strong>[[event_location]]</strong> zu feiern.</p>
                                <p>Wir würden uns freuen, Sie dort zu sehen!</p>
                                [[rsvp_date]]<p>Bitte antworten Sie bis zum [[rsvp_date]].</p>[[/rsvp_date]]
                                [[rsvp_contact]]<p>RSVP Kontakt: [[rsvp_contact]].</p>[[/rsvp_contact]]
                                <p>Mit Liebe,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[host_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 3. План мероприятия ---
            [
                'slug' => 'event-plan-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"event_name","type":"text","required":true,"labels":{"uk":"Назва заходу","en":"Event Name", "pl":"Nazwa wydarzenia", "de":"Veranstaltungsname"}},
                    {"name":"event_date","type":"date","required":true,"labels":{"uk":"Дата заходу","en":"Event Date", "pl":"Data wydarzenia", "de":"Veranstaltungsdatum"}},
                    {"name":"event_location","type":"text","required":true,"labels":{"uk":"Місце проведення","en":"Event Location", "pl":"Miejsce wydarzenia", "de":"Veranstaltungsort"}},
                    {"name":"organizer_name","type":"text","required":true,"labels":{"uk":"Організатор","en":"Organizer", "pl":"Organizator", "de":"Veranstalter"}},
                    {"name":"plan_details","type":"textarea","required":true,"labels":{"uk":"Детальний план заходу (час, діяльність, відповідальні)","en":"Detailed Event Plan (time, activity, responsible persons)", "pl":"Szczegółowy plan wydarzenia (czas, aktywność, osoby odpowiedzialne)", "de":"Detaillierter Veranstaltungsplan (Zeit, Aktivität, Verantwortliche)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'План заходу',
                        'description' => 'Детальний план організації та проведення заходу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПЛАН ЗАХОДУ</h1><p>Назва: [[event_name]]</p><p>Дата: [[event_date]]</p><p>Місце: [[event_location]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Організатор: [[organizer_name]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Детальний план</h2>
                                <p>[[plan_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Event Plan',
                        'description' => 'Detailed plan for organizing and conducting an event.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EVENT PLAN</h1><p>Name: [[event_name]]</p><p>Date: [[event_date]]</p><p>Location: [[event_location]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Organizer: [[organizer_name]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Detailed Plan</h2>
                                <p>[[plan_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Plan wydarzenia',
                        'description' => 'Szczegółowy plan organizacji i przebiegu wydarzenia.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PLAN WYDARZENIA</h1><p>Nazwa: [[event_name]]</p><p>Data: [[event_date]]</p><p>Miejsce: [[event_location]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Organizator: [[organizer_name]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Szczegółowy plan</h2>
                                <p>[[plan_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Veranstaltungsplan',
                        'description' => 'Detaillierter Plan für die Organisation und Durchführung einer Veranstaltung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERANSTALTUNGSPLAN</h1><p>Name: [[event_name]]</p><p>Datum: [[event_date]]</p><p>Ort: [[event_location]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Veranstalter: [[organizer_name]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Detaillierter Plan</h2>
                                <p>[[plan_details]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 4. Бюджет мероприятия ---
            [
                'slug' => 'event-budget-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"event_name","type":"text","required":true,"labels":{"uk":"Назва заходу","en":"Event Name", "pl":"Nazwa wydarzenia", "de":"Veranstaltungsname"}},
                    {"name":"budget_items","type":"textarea","required":true,"labels":{"uk":"Статті витрат та доходи (Категорія, Сума)","en":"Budget Items (Category, Amount)", "pl":"Pozycje budżetowe (Kategoria, Kwota)", "de":"Budgetposten (Kategorie, Betrag)"}},
                    {"name":"total_income","type":"number","required":true,"labels":{"uk":"Всього доходів (грн)","en":"Total Income (UAH)", "pl":"Łączne przychody (UAH)", "de":"Gesamteinnahmen (UAH)"}},
                    {"name":"total_expenses","type":"number","required":true,"labels":{"uk":"Всього витрат (грн)","en":"Total Expenses (UAH)", "pl":"Łączne wydatki (UAH)", "de":"Gesamtausgaben (UAH)"}},
                    {"name":"balance","type":"number","required":true,"labels":{"uk":"Залишок (Доходи - Витрати)","en":"Balance (Income - Expenses)", "pl":"Saldo (Przychody - Wydatki)", "de":"Saldo (Einnahmen - Ausgaben)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Бюджет заходу',
                        'description' => 'Документ для планування та обліку доходів і витрат на захід.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">БЮДЖЕТ ЗАХОДУ</h1><p>Назва: [[event_name]]</p><p>на [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ДОХОДИ ТА ВИТРАТИ</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Категорія</th>
                                            <th>Сума (грн)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>Доходи від квитків</td><td>10000.00</td></tr><tr><td>Оренда приміщення</td><td>3000.00</td></tr> -->
                                        [[budget_items]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Всього доходів: [[total_income]] грн.</strong></p>
                                <p style="text-align: right;"><strong>Всього витрат: [[total_expenses]] грн.</strong></p>
                                <p style="text-align: right;"><strong>Залишок: [[balance]] грн.</strong></p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'en' => [
                        'title' => 'Event Budget',
                        'description' => 'Document for planning and accounting for event income and expenses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EVENT BUDGET</h1><p>Name: [[event_name]]</p><p>as of [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">INCOME AND EXPENSES</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Amount (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>Ticket Sales</td><td>10000.00</td></tr><tr><td>Venue Rental</td><td>3000.00</td></tr> -->
                                        [[budget_items]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Total Income: [[total_income]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Total Expenses: [[total_expenses]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Balance: [[balance]] UAH.</strong></p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Budżet wydarzenia',
                        'description' => 'Dokument do planowania i ewidencji przychodów i wydatków na wydarzenie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BUDŻET WYDARZENIA</h1><p>Nazwa: [[event_name]]</p><p>na [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">PRZYCHODY I WYDATKI</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Kategoria</th>
                                            <th>Kwota (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>Przychody z biletów</td><td>10000.00</td></tr><tr><td>Wynajem lokalu</td><td>3000.00</td></tr> -->
                                        [[budget_items]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Łączne przychody: [[total_income]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Łączne wydatki: [[total_expenses]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Saldo: [[balance]] UAH.</strong></p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'de' => [
                        'title' => 'Veranstaltungsbudget',
                        'description' => 'Dokument zur Planung und Erfassung von Einnahmen und Ausgaben für eine Veranstaltung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERANSTALTUNGSBUDGET</h1><p>Name: [[event_name]]</p><p>Stand: [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">EINNAHMEN UND AUSGABEN</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Kategorie</th>
                                            <th>Betrag (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>Ticketverkäufe</td><td>10000.00</td></tr><tr><td>Miete des Veranstaltungsortes</td><td>3000.00</td></tr> -->
                                        [[budget_items]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Gesamteinnahmen: [[total_income]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Gesamtausgaben: [[total_expenses]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Saldo: [[balance]] UAH.</strong></p>
                            </div>',
                        'footer_html' => ''
                    ],
                ]
            ],

            // --- 5. Список гостей ---
            [
                'slug' => 'guest-list-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"event_name","type":"text","required":true,"labels":{"uk":"Назва заходу","en":"Event Name", "pl":"Nazwa wydarzenia", "de":"Veranstaltungsname"}},
                    {"name":"event_date","type":"date","required":true,"labels":{"uk":"Дата заходу","en":"Event Date", "pl":"Data wydarzenia", "de":"Veranstaltungsdatum"}},
                    {"name":"guests_list","type":"textarea","required":true,"labels":{"uk":"Список гостей (ПІБ, контакт, примітка)","en":"Guest List (Full Name, Contact, Note)", "pl":"Lista gości (Imię i Nazwisko, kontakt, uwaga)", "de":"Gästeliste (Name, Kontakt, Anmerkung)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Список гостей',
                        'description' => 'Простий список запрошених гостей на захід.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">СПИСОК ГОСТЕЙ</h1><p>Назва заходу: [[event_name]]</p><p>Дата: [[event_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>ПІБ</th>
                                            <th>Контакт</th>
                                            <th>Примітка</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>1</td><td>Іванов І.І.</td><td>+380501234567</td><td>Підтвердив</td></tr> -->
                                        [[guests_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Guest List',
                        'description' => 'Simple list of invited guests for an event.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GUEST LIST</h1><p>Event Name: [[event_name]]</p><p>Date: [[event_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Full Name</th>
                                            <th>Contact</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>1</td><td>Ivanov I.I.</td><td>+380501234567</td><td>Confirmed</td></tr> -->
                                        [[guests_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Lista gości',
                        'description' => 'Prosta lista zaproszonych gości na wydarzenie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LISTA GOŚCI</h1><p>Nazwa wydarzenia: [[event_name]]</p><p>Data: [[event_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Lp.</th>
                                            <th>Imię i Nazwisko</th>
                                            <th>Kontakt</th>
                                            <th>Uwaga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>1</td><td>Kowalski J.</td><td>+48123456789</td><td>Potwierdzono</td></tr> -->
                                        [[guests_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Gästeliste',
                        'description' => 'Einfache Liste der eingeladenen Gäste für eine Veranstaltung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GÄSTELISTE</h1><p>Veranstaltungsname: [[event_name]]</p><p>Datum: [[event_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Nr.</th>
                                            <th>Name</th>
                                            <th>Kontakt</th>
                                            <th>Anmerkung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>1</td><td>Müller M.</td><td>+49123456789</td><td>Bestätigt</td></tr> -->
                                        [[guests_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 6. Договор с ведущим/фотографом/кейтерингом ---
            [
                'slug' => 'event-service-contract-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"customer_name","type":"text","required":true,"labels":{"uk":"Назва Замовника (ЮО/ПІБ)","en":"Customer Name (Legal Entity/Full Name)", "pl":"Nazwa Zamawiającego (Osoba prawna/Imię i Nazwisko)", "de":"Kundenname (Juristische Person/Name)"}},
                    {"name":"customer_details","type":"textarea","required":true,"labels":{"uk":"Реквізити Замовника (ЄДРПОУ/паспорт, адреса)","en":"Customer Details (EDRPOU/passport, address)", "pl":"Dane Zamawiającego (EDRPOU/paszport, adres)", "de":"Kundendaten (EDRPOU/Reisepass, Adresse)"}},
                    {"name":"contractor_name","type":"text","required":true,"labels":{"uk":"Назва Виконавця (ЮО/ПІБ)","en":"Contractor Name (Legal Entity/Full Name)", "pl":"Nazwa Wykonawcy (Osoba prawna/Imię i Nazwisko)", "de":"Name des Auftragnehmers (Juristische Person/Name)"}},
                    {"name":"contractor_details","type":"textarea","required":true,"labels":{"uk":"Реквізити Виконавця (ЄДРПОУ/паспорт, адреса)","en":"Contractor Details (EDRPOU/passport, address)", "pl":"Dane Wykonawcy (EDRPOU/paszport, adres)", "de":"Auftragnehmerdaten (EDRPOU/Reisepass, Adresse)"}},
                    {"name":"service_type","type":"text","required":true,"labels":{"uk":"Вид послуги (ведучий, фотограф, кейтеринг)","en":"Service Type (host, photographer, catering)", "pl":"Rodzaj usługi (prowadzący, fotograf, catering)", "de":"Art der Dienstleistung (Moderator, Fotograf, Catering)"}},
                    {"name":"event_name","type":"text","required":true,"labels":{"uk":"Назва заходу","en":"Event Name", "pl":"Nazwa wydarzenia", "de":"Veranstaltungsname"}},
                    {"name":"service_description","type":"textarea","required":true,"labels":{"uk":"Детальний опис послуг","en":"Detailed Service Description", "pl":"Szczegółowy opis usług", "de":"Detaillierte Leistungsbeschreibung"}},
                    {"name":"service_cost","type":"number","required":true,"labels":{"uk":"Вартість послуг (грн)","en":"Service Cost (UAH)", "pl":"Koszt usług (UAH)", "de":"Kosten der Dienstleistungen (UAH)"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"uk":"Умови оплати","en":"Payment Terms", "pl":"Warunki płatności", "de":"Zahlungsbedingungen"}},
                    {"name":"service_date","type":"date","required":true,"labels":{"uk":"Дата надання послуги","en":"Service Date", "pl":"Data świadczenia usługi", "de":"Datum der Dienstleistung"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір з ведучим/фотографом/кейтерингом',
                        'description' => 'Договір про надання послуг для заходу (ведучий, фотограф, кейтеринг).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ПРО НАДАННЯ ПОСЛУГ</h1><p>([[service_type]])</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[customer_name]]</strong>, [[customer_details]], надалі "Замовник", з одного боку, та
                                <strong>[[contractor_name]]</strong>, [[contractor_details]], надалі "Виконавець", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Виконавець зобов\'язується надати послуги [[service_type]] для заходу "[[event_name]]", що відбудеться [[service_date]].</p>
                                <p>1.2. Детальний опис послуг: [[service_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ВАРТІСТЬ ПОСЛУГ ТА ПОРЯДОК ОПЛАТИ</h2>
                                <p>2.1. Вартість послуг становить <strong>[[service_cost]]</strong> грн.</p>
                                <p>2.2. Умови оплати: [[payment_terms]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ЗАМОВНИК:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ВИКОНАВЕЦЬ:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Event Service Contract (Host/Photographer/Catering)',
                        'description' => 'Contract for providing services for an event (host, photographer, catering).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SERVICE AGREEMENT</h1><p>([[service_type]])</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[customer_name]]</strong>, [[customer_details]], hereinafter "Customer", on the one hand, and
                                <strong>[[contractor_name]]</strong>, [[contractor_details]], hereinafter "Contractor", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Contractor undertakes to provide [[service_type]] services for the event "[[event_name]]", which will take place on [[service_date]].</p>
                                <p>1.2. Detailed description of services: [[service_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. COST OF SERVICES AND PAYMENT PROCEDURE</h2>
                                <p>2.1. The cost of services is <strong>[[service_cost]]</strong> UAH.</p>
                                <p>2.2. Payment terms: [[payment_terms]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>CUSTOMER:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>CONTRACTOR:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa z prowadzącym/fotografem/cateringiem',
                        'description' => 'Umowa o świadczenie usług na wydarzenie (prowadzący, fotograf, catering).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O ŚWIADCZENIE USŁUG</h1><p>([[service_type]])</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[customer_name]]</strong>, [[customer_details]], zwany(a) dalej "Zamawiającym", z jednej strony, oraz
                                <strong>[[contractor_name]]</strong>, [[contractor_details]], zwany(a) dalej "Wykonawcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Wykonawca zobowiązuje się do świadczenia usług [[service_type]] dla wydarzenia "[[event_name]]", które odbędzie się w dniu [[service_date]].</p>
                                <p>1.2. Szczegółowy opis usług: [[service_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. KOSZT USŁUG I ZASADY PŁATNOŚCI</h2>
                                <p>2.1. Koszt usług wynosi <strong>[[service_cost]]</strong> UAH.</p>
                                <p>2.2. Warunki płatności: [[payment_terms]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ZAMAWIAJĄCY:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>WYKONAWCA:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vertrag mit Moderator/Fotograf/Catering',
                        'description' => 'Vertrag über die Erbringung von Dienstleistungen für eine Veranstaltung (Moderator, Fotograf, Catering).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DIENSTLEISTUNGSVERTRAG</h1><p>([[service_type]])</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[customer_name]]</strong>, [[customer_details]], nachfolgend "Auftraggeber" genannt, einerseits, und
                                <strong>[[contractor_name]]</strong>, [[contractor_details]], nachfolgend "Auftragnehmer" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Auftragnehmer verpflichtet sich, Dienstleistungen [[service_type]] für die Veranstaltung "[[event_name]]" zu erbringen, die am [[service_date]] stattfindet.</p>
                                <p>1.2. Detaillierte Beschreibung der Dienstleistungen: [[service_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. KOSTEN DER DIENSTLEISTUNGEN UND ZAHLUNGSWEISE</h2>
                                <p>2.1. Die Kosten der Dienstleistungen betragen <strong>[[service_cost]]</strong> UAH.</p>
                                <p>2.2. Zahlungsbedingungen: [[payment_terms]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>AUFTRAGGEBER:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>AUFTRAGNEHMER:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 7. План путешествия / Маршрут ---
            [
                'slug' => 'travel-plan-route-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"travel_name","type":"text","required":true,"labels":{"uk":"Назва подорожі","en":"Travel Name", "pl":"Nazwa podróży", "de":"Reisename"}},
                    {"name":"travel_start_date","type":"date","required":true,"labels":{"uk":"Дата початку подорожі","en":"Travel Start Date", "pl":"Data rozpoczęcia podróży", "de":"Reisebeginn"}},
                    {"name":"travel_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення подорожі","en":"Travel End Date", "pl":"Data zakończenia podróży", "de":"Reiseende"}},
                    {"name":"destination","type":"text","required":true,"labels":{"uk":"Місце призначення","en":"Destination", "pl":"Miejsce docelowe", "de":"Reiseziel"}},
                    {"name":"route_details","type":"textarea","required":true,"labels":{"uk":"Детальний маршрут (дати, місця, активності)","en":"Detailed Route (dates, locations, activities)", "pl":"Szczegółowa trasa (daty, miejsca, aktywności)", "de":"Detaillierte Reiseroute (Daten, Orte, Aktivitäten)"}},
                    {"name":"accommodation_details","type":"textarea","required":false,"labels":{"uk":"Деталі проживання","en":"Accommodation Details", "pl":"Szczegóły zakwaterowania", "de":"Unterkunftsdetails"}},
                    {"name":"transportation_details","type":"textarea","required":false,"labels":{"uk":"Деталі транспортування","en":"Transportation Details", "pl":"Szczegóły transportu", "de":"Transportdetails"}},
                    {"name":"contact_info","type":"textarea","required":false,"labels":{"uk":"Контактна інформація (екстрені контакти)","en":"Contact Information (emergency contacts)", "pl":"Informacje kontaktowe (kontakty awaryjne)", "de":"Kontaktinformationen (Notfallkontakte)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'План подорожі / Маршрут',
                        'description' => 'Детальний план подорожі з маршрутом, датами, місцями та іншою важливою інформацією.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПЛАН ПОДОРОЖІ / МАРШРУТ</h1><p>Назва подорожі: [[travel_name]]</p><p>Період: з [[travel_start_date]] по [[travel_end_date]]</p><p>Місце призначення: [[destination]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ДЕТАЛЬНИЙ МАРШРУТ</h2>
                                <p>[[route_details]]</p>
                                [[accommodation_details]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ДЕТАЛІ ПРОЖИВАННЯ</h2>
                                <p>[[accommodation_details]]</p>[[/accommodation_details]]
                                [[transportation_details]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ДЕТАЛІ ТРАНСПОРТУВАННЯ</h2>
                                <p>[[transportation_details]]</p>[[/transportation_details]]
                                [[contact_info]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">КОНТАКТНА ІНФОРМАЦІЯ</h2>
                                <p>[[contact_info]]</p>[[/contact_info]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Travel Plan / Itinerary',
                        'description' => 'Detailed travel plan with itinerary, dates, locations, and other important information.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TRAVEL PLAN / ITINERARY</h1><p>Travel Name: [[travel_name]]</p><p>Period: from [[travel_start_date]] to [[travel_end_date]]</p><p>Destination: [[destination]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">DETAILED ITINERARY</h2>
                                <p>[[route_details]]</p>
                                [[accommodation_details]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ACCOMMODATION DETAILS</h2>
                                <p>[[accommodation_details]]</p>[[/accommodation_details]]
                                [[transportation_details]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">TRANSPORTATION DETAILS</h2>
                                <p>[[transportation_details]]</p>[[/transportation_details]]
                                [[contact_info]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">CONTACT INFORMATION</h2>
                                <p>[[contact_info]]</p>[[/contact_info]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Plan podróży / Trasa',
                        'description' => 'Szczegółowy plan podróży z trasą, datami, miejscami i innymi ważnymi informacjami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PLAN PODRÓŻY / TRASA</h1><p>Nazwa podróży: [[travel_name]]</p><p>Okres: od [[travel_start_date]] do [[travel_end_date]]</p><p>Miejsce docelowe: [[destination]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">SZCZEGÓŁOWA TRASA</h2>
                                <p>[[route_details]]</p>
                                [[accommodation_details]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">SZCZEGÓŁY ZAKWATEROWANIA</h2>
                                <p>[[accommodation_details]]</p>[[/accommodation_details]]
                                [[transportation_details]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">SZCZEGÓŁY TRANSPORTU</h2>
                                <p>[[transportation_details]]</p>[[/transportation_details]]
                                [[contact_info]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">INFORMACJE KONTAKTOWE</h2>
                                <p>[[contact_info]]</p>[[/contact_info]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Reiseplan / Reiseroute',
                        'description' => 'Detaillierter Reiseplan mit Reiseroute, Daten, Orten und anderen wichtigen Informationen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REISEPLAN / REISEROUTE</h1><p>Reisename: [[travel_name]]</p><p>Zeitraum: vom [[travel_start_date]] bis [[travel_end_date]]</p><p>Reiseziel: [[destination]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">DETAILLIERTE REISEROUTE</h2>
                                <p>[[route_details]]</p>
                                [[accommodation_details]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">UNTERKUNFTSDETAILS</h2>
                                <p>[[accommodation_details]]</p>[[/accommodation_details]]
                                [[transportation_details]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">TRANSPORTDETAILS</h2>
                                <p>[[transportation_details]]</p>[[/transportation_details]]
                                [[contact_info]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">KONTAKTINFORMATIONEN</h2>
                                <p>[[contact_info]]</p>[[/contact_info]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 8. Бюджет путешествия ---
            [
                'slug' => 'travel-budget-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"travel_name","type":"text","required":true,"labels":{"uk":"Назва подорожі","en":"Travel Name", "pl":"Nazwa podróży", "de":"Reisename"}},
                    {"name":"travel_start_date","type":"date","required":true,"labels":{"uk":"Дата початку подорожі","en":"Travel Start Date", "pl":"Data rozpoczęcia podróży", "de":"Reisebeginn"}},
                    {"name":"travel_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення подорожі","en":"Travel End Date", "pl":"Data zakończenia podróży", "de":"Reiseende"}},
                    {"name":"budget_items","type":"textarea","required":true,"labels":{"uk":"Статті витрат та доходи (Категорія, Сума)","en":"Budget Items (Category, Amount)", "pl":"Pozycje budżetowe (Kategoria, Kwota)", "de":"Budgetposten (Kategorie, Betrag)"}},
                    {"name":"total_income","type":"number","required":true,"labels":{"uk":"Всього доходів (грн)","en":"Total Income (UAH)", "pl":"Łączne przychody (UAH)", "de":"Gesamteinnahmen (UAH)"}},
                    {"name":"total_expenses","type":"number","required":true,"labels":{"uk":"Всього витрат (грн)","en":"Total Expenses (UAH)", "pl":"Łączne wydatki (UAH)", "de":"Gesamtausgaben (UAH)"}},
                    {"name":"balance","type":"number","required":true,"labels":{"uk":"Залишок (Доходи - Витрати)","en":"Balance (Income - Expenses)", "pl":"Saldo (Przychody - Wydatki)", "de":"Saldo (Einnahmen - Ausgaben)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Бюджет подорожі',
                        'description' => 'Документ для планування та обліку доходів і витрат на подорож.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">БЮДЖЕТ ПОДОРОЖІ</h1><p>Назва подорожі: [[travel_name]]</p><p>Період: з [[travel_start_date]] по [[travel_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ДОХОДИ ТА ВИТРАТИ</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Категорія</th>
                                            <th>Сума (грн)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>Доходи від продажу</td><td>5000.00</td></tr><tr><td>Проживання</td><td>2000.00</td></tr> -->
                                        [[budget_items]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Всього доходів: [[total_income]] грн.</strong></p>
                                <p style="text-align: right;"><strong>Всього витрат: [[total_expenses]] грн.</strong></p>
                                <p style="text-align: right;"><strong>Залишок: [[balance]] грн.</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Travel Budget',
                        'description' => 'Document for planning and accounting for travel income and expenses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TRAVEL BUDGET</h1><p>Travel Name: [[travel_name]]</p><p>Period: from [[travel_start_date]] to [[travel_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">INCOME AND EXPENSES</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Amount (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>Sales Income</td><td>5000.00</td></tr><tr><td>Accommodation</td><td>2000.00</td></tr> -->
                                        [[budget_items]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Total Income: [[total_income]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Total Expenses: [[total_expenses]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Balance: [[balance]] UAH.</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Budżet podróży',
                        'description' => 'Dokument do planowania i ewidencji przychodów i wydatków na podróż.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BUDŻET PODRÓŻY</h1><p>Nazwa podróży: [[travel_name]]</p><p>Okres: od [[travel_start_date]] do [[travel_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">PRZYCHODY I WYDATKI</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Kategoria</th>
                                            <th>Kwota (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>Przychody ze sprzedaży</td><td>5000.00</td></tr><tr><td>Zakwaterowanie</td><td>2000.00</td></tr> -->
                                        [[budget_items]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Łączne przychody: [[total_income]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Łączne wydatki: [[total_expenses]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Saldo: [[balance]] UAH.</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Reisebudget',
                        'description' => 'Dokument zur Planung und Erfassung von Einnahmen und Ausgaben für eine Reise.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REISEBUDGET</h1><p>Reisename: [[travel_name]]</p><p>Zeitraum: vom [[travel_start_date]] bis [[travel_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">EINNAHMEN UND AUSGABEN</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Kategorie</th>
                                            <th>Betrag (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>Einnahmen aus Verkäufen</td><td>5000.00</td></tr><tr><td>Unterkunft</td><td>2000.00</td></tr> -->
                                        [[budget_items]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Gesamteinnahmen: [[total_income]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Gesamtausgaben: [[total_expenses]] UAH.</strong></p>
                                <p style="text-align: right;"><strong>Saldo: [[balance]] UAH.</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 9. Список вещей в дорогу ---
            [
                'slug' => 'packing-list-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"trip_name","type":"text","required":true,"labels":{"uk":"Назва поїздки","en":"Trip Name", "pl":"Nazwa podróży", "de":"Reisename"}},
                    {"name":"trip_date","type":"text","required":true,"labels":{"uk":"Дати поїздки","en":"Trip Dates", "pl":"Daty podróży", "de":"Reisedaten"}},
                    {"name":"items_list","type":"textarea","required":true,"labels":{"uk":"Перелік речей (Категория, Вещь, Количество)","en":"List of Items (Category, Item, Quantity)", "pl":"Lista rzeczy (Kategoria, Rzecz, Ilość)", "de":"Packliste (Kategorie, Gegenstand, Menge)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Список речей в дорогу',
                        'description' => 'Простий список речей, які потрібно взяти в подорож.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">СПИСОК РЕЧЕЙ В ДОРОГУ</h1><p>Поїздка: [[trip_name]]</p><p>Дати: [[trip_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>[[items_list]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Packing List',
                        'description' => 'Simple list of items to take on a trip.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PACKING LIST</h1><p>Trip: [[trip_name]]</p><p>Dates: [[trip_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>[[items_list]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Lista rzeczy w drogę',
                        'description' => 'Prosta lista rzeczy do zabrania w podróż.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LISTA RZECZY W DROGĘ</h1><p>Podróż: [[trip_name]]</p><p>Daty: [[trip_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>[[items_list]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Packliste',
                        'description' => 'Einfache Liste der Dinge, die man auf eine Reise mitnehmen sollte.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PACKLISTE</h1><p>Reise: [[trip_name]]</p><p>Daten: [[trip_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>[[items_list]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 10. Доверенность на ребенка для путешествия с третьим лицом ---
            [
                'slug' => 'power-of-attorney-child-travel-third-party-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання довіреності","en":"City of Power of Attorney Compilation", "pl":"Miejscowość sporządzenia pełnomocnictwa", "de":"Ort der Vollmachtserstellung"}},
                    {"name":"parent_name_full","type":"text","required":true,"labels":{"uk":"ПІБ батька/матері, що видає довіреність","en":"Parent\'s Full Name (issuing POA)", "pl":"Imię i nazwisko rodzica (wydającego pełnomocnictwo)", "de":"Vollständiger Name des Elternteils (Vollmachtgeber)"}},
                    {"name":"parent_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані батька/матері","en":"Parent\'s Passport Details", "pl":"Dane paszportowe rodzica", "de":"Passdaten des Elternteils"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"uk":"Адреса проживання батька/матері","en":"Parent\'s residence address", "pl":"Adres zamieszkania rodzica", "de":"Wohnadresse des Elternteils"}},
                    {"name":"child_name","type":"text","required":true,"labels":{"uk":"ПІБ дитини","en":"Child\'s Full Name", "pl":"Imię i nazwisko dziecka", "de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"uk":"Дата народження дитини","en":"Child\'s Date of Birth", "pl":"Data urodzenia dziecka", "de":"Geburtsdatum des Kindes"}},
                    {"name":"child_birth_certificate","type":"text","required":true,"labels":{"uk":"Серія та номер свідоцтва про народження дитини","en":"Child\'s Birth Certificate Series and Number", "pl":"Seria i numer aktu urodzenia dziecka", "de":"Seriennummer der Geburtsurkunde des Kindes"}},
                    {"name":"accompanying_person_name","type":"text","required":true,"labels":{"uk":"ПІБ супроводжуючої особи","en":"Accompanying Person\'s Full Name", "pl":"Imię i nazwisko osoby towarzyszącej", "de":"Vollständiger Name der Begleitperson"}},
                    {"name":"accompanying_person_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані супроводжуючої особи","en":"Accompanying Person\'s Passport Details", "pl":"Dane paszportowe osoby towarzyszącej", "de":"Passdaten der Begleitperson"}},
                    {"name":"travel_destination","type":"text","required":true,"labels":{"uk":"Країна призначення","en":"Country of Destination", "pl":"Kraj przeznaczenia", "de":"Zielland"}},
                    {"name":"travel_purpose","type":"textarea","required":true,"labels":{"uk":"Мета поїздки","en":"Purpose of Travel", "pl":"Cel podróży", "de":"Zweck der Reise"}},
                    {"name":"travel_start_date","type":"date","required":true,"labels":{"uk":"Дата початку поїздки","en":"Travel Start Date", "pl":"Data rozpoczęcia podróży", "de":"Reisebeginn"}},
                    {"name":"travel_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення поїздки","en":"Travel End Date", "pl":"Data zakończenia podróży", "de":"Reiseende"}},
                    {"name":"validity_months","type":"number","required":true,"labels":{"uk":"Термін дії довіреності (місяців)","en":"Power of Attorney Validity (months)", "pl":"Okres ważności pełnomocnictwa (miesiące)", "de":"Gültigkeitsdauer der Vollmacht (Monate)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Довіреність на дитину для подорожі з третьою особою',
                        'description' => 'Нотаріально посвідчена довіреність батьків на супровід дитини третьою особою за кордон.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1><p style="font-size: 14px;">на дитину для подорожі з третьою особою</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[parent_name_full]]</strong>, паспорт: [[parent_passport]], проживаю за адресою: [[parent_address]], цим уповноважую:</p>
                                <p><strong>[[accompanying_person_name]]</strong>, паспорт: [[accompanying_person_passport]],</p>
                                <p>супроводжувати мою дитину: <strong>[[child_name]]</strong>, [[child_dob]] року народження, свідоцтво про народження серія [[child_birth_certificate]],</p>
                                <p>у поїздці до <strong>[[travel_destination]]</strong> з метою [[travel_purpose]] у період з <strong>[[travel_start_date]]</strong> по <strong>[[travel_end_date]]</strong>.</p>
                                <p>Довіреність видана строком на <strong>[[validity_months]]</strong> місяців.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис батька/матері: ___________________ ([[parent_name_full]])</p>
                                <br/>
                                <p>Посвідчувальний напис нотаріуса:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Child Travel with Third Party',
                        'description' => 'Notarized power of attorney from parents for a third party to accompany a child abroad.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1><p style="font-size: 14px;">for child travel with third party</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[parent_name_full]]</strong>, passport: [[parent_passport]], residing at: [[parent_address]], hereby authorize:</p>
                                <p><strong>[[accompanying_person_name]]</strong>, passport: [[accompanying_person_passport]],</p>
                                <p>to accompany my child: <strong>[[child_name]]</strong>, born on [[child_dob]], birth certificate series [[child_birth_certificate]],</p>
                                <p>on a trip to <strong>[[travel_destination]]</strong> for the purpose of [[travel_purpose]] during the period from <strong>[[travel_start_date]]</strong> to <strong>[[travel_end_date]]</strong>.</p>
                                <p>This power of attorney is issued for a period of <strong>[[validity_months]]</strong> months.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Parent\'s Signature: ___________________ ([[parent_name_full]])</p>
                                <br/>
                                <p>Notary\'s certification:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pełnomocnictwo na dziecko do podróży z osobą trzecią',
                        'description' => 'Notarialnie poświadczone pełnomocnictwo rodziców na towarzyszenie dziecku za granicą przez osobę trzecią.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 14px;">na dziecko do podróży z osobą trzecią</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[parent_name_full]]</strong>, paszport: [[parent_passport]], zamieszkały(a) pod adresem: [[parent_address]], niniejszym upoważniam:</p>
                                <p><strong>[[accompanying_person_name]]</strong>, paszport: [[accompanying_person_passport]],</p>
                                <p>do towarzyszenia mojemu dziecku: <strong>[[child_name]]</strong>, urodzonemu [[child_dob]], akt urodzenia seria [[child_birth_certificate]],</p>
                                <p>w podróży do <strong>[[travel_destination]]</strong> w celu [[travel_purpose]] w okresie od <strong>[[travel_start_date]]</strong> do <strong>[[travel_end_date]]</strong>.</p>
                                <p>Pełnomocnictwo wydano na okres <strong>[[validity_months]]</strong> miesięcy.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis rodzica: ___________________ ([[parent_name_full]])</p>
                                <br/>
                                <p>Poświadczenie notariusza:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht für Kindesreise mit Drittperson',
                        'description' => 'Notariell beglaubigte Vollmacht der Eltern für eine Drittperson zur Begleitung eines Kindes ins Ausland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1><p style="font-size: 14px;">für Kindesreise mit Drittperson</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[parent_name_full]]</strong>, Reisepass: [[parent_passport]], wohnhaft unter der Adresse: [[parent_address]], bevollmächtige hiermit:</p>
                                <p><strong>[[accompanying_person_name]]</strong>, Reisepass: [[accompanying_person_passport]],</p>
                                <p>mein Kind: <strong>[[child_name]]</strong>, geboren am [[child_dob]], Geburtsurkunde Serie [[child_birth_certificate]], zu begleiten,</p>
                                <p>auf einer Reise nach <strong>[[travel_destination]]</strong> zum Zweck [[travel_purpose]] im Zeitraum vom <strong>[[travel_start_date]]</strong> bis zum <strong>[[travel_end_date]]</strong>.</p>
                                <p>Diese Vollmacht wird für einen Zeitraum von <strong>[[validity_months]]</strong> Monaten erteilt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Elternteils: ___________________ ([[parent_name_full]])</p>
                                <br/>
                                <p>Notarielle Beglaubigung:</p>
                                <p>____________________________________________________________________________________</p>
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
