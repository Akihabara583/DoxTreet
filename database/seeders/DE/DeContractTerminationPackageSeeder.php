<?php

namespace Database\Seeders\DE;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class DeContractTerminationPackageSeeder extends Seeder
{
    /**
     * Run the database seeds for the German "Contract Termination" Package 2025-2026.
     */
    public function run(): void
    {
        // Предполагаем, что у вас есть эта категория
        $catLegal = Category::where('slug', 'legal-claims-de')->firstOrFail();

        $templatesData = [
            // === ПАКЕТ "РАСТОРЖЕНИЕ ДОГОВОРОВ" (STANDARD) ===

            // 1. Уведомление о расторжении контракта (Kündigung) - универсальное
            [
                'category_id' => $catLegal->id,
                'slug' => 'de-universal-contract-termination-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"sender_details","type":"textarea","required":true,"labels":{"de":"Absender (Ihr Name und Ihre Anschrift)","en":"Sender (Your name and address)","pl":"Nadawca (Twoje imię i nazwisko, adres)","uk":"Відправник (Ваше ім\'я та адреса)"}},
                    {"name":"recipient_details","type":"textarea","required":true,"labels":{"de":"Empfänger (Name und Anschrift des Unternehmens)","en":"Recipient (Company name and address)","pl":"Odbiorca (Nazwa i adres firmy)","uk":"Одержувач (Назва та адреса компанії)"}},
                    {"name":"date_place","type":"text","required":true,"labels":{"de":"Ort, Datum","en":"Place, Date","pl":"Miejscowość, Data","uk":"Місце, Дата"}},
                    {"name":"contract_number","type":"text","required":true,"labels":{"de":"Vertragsnummer / Kundennummer","en":"Contract number / Customer number","pl":"Numer umowy / Numer klienta","uk":"Номер договору / Номер клієнта"}},
                    {"name":"termination_date","type":"text","required":true,"defaultValue":"zum nächstmöglichen Zeitpunkt","labels":{"de":"Kündigungsdatum (z.B. zum nächstmöglichen Zeitpunkt)","en":"Termination date (e.g., to the earliest possible date)","pl":"Data wypowiedzenia (np. w najbliższym możliwym terminie)","uk":"Дата розірвання (напр., до найближчої можливої дати)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Kündigung eines Vertrags (Allgemein)',
                        'description' => 'Universelle Vorlage zur Kündigung von Verträgen wie Mobilfunk, Fitnessstudio, Versicherung etc. Rechtssicher und einfach anzupassen.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[recipient_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Vertrages mit der Nummer: [[contract_number]]
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich den oben genannten Vertrag fristgerecht <strong>[[termination_date]]</strong>.</p>

                                <p style="margin-bottom: 15px;">Bitte senden Sie mir eine schriftliche Bestätigung der Kündigung unter Angabe des Beendigungsdatums an meine oben genannte Adresse zu.</p>

                                <p style="margin-bottom: 30px;">Ich widerspreche der weiteren Nutzung meiner persönlichen Daten zu Werbezwecken nach Vertragsende.</p>

                                <p style="margin-bottom: 60px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Contract Termination (General)',
                        'description' => 'Universal template for terminating contracts such as mobile phone, gym, insurance, etc. Legally compliant and easy to customize.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[recipient_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Vertrages mit der Nummer: [[contract_number]]
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich den oben genannten Vertrag fristgerecht <strong>[[termination_date]]</strong>.</p>

                                <p style="margin-bottom: 15px;">Bitte senden Sie mir eine schriftliche Bestätigung der Kündigung unter Angabe des Beendigungsdatums an meine oben genannte Adresse zu.</p>

                                <p style="margin-bottom: 30px;">Ich widerspreche der weiteren Nutzung meiner persönlichen Daten zu Werbezwecken nach Vertragsende.</p>

                                <p style="margin-bottom: 60px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
                    'pl' => [
                        'title' => 'Wypowiedzenie Umowy (Ogólne)',
                        'description' => 'Uniwersalny szablon do wypowiadania umów takich jak telefon komórkowy, siłownia, ubezpieczenie itp. Zgodny z prawem i łatwy do dostosowania.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[recipient_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Vertrages mit der Nummer: [[contract_number]]
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich den oben genannten Vertrag fristgerecht <strong>[[termination_date]]</strong>.</p>

                                <p style="margin-bottom: 15px;">Bitte senden Sie mir eine schriftliche Bestätigung der Kündigung unter Angabe des Beendigungsdatums an meine oben genannte Adresse zu.</p>

                                <p style="margin-bottom: 30px;">Ich widerspreche der weiteren Nutzung meiner persönlichen Daten zu Werbezwecken nach Vertragsende.</p>

                                <p style="margin-bottom: 60px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Розірвання Договору (Загальне)',
                        'description' => 'Універсальний шаблон для розірвання договорів, таких як мобільний зв\'язок, спортзал, страхування тощо. Юридично коректний та легкий для налаштування.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[recipient_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Vertrages mit der Nummer: [[contract_number]]
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich den oben genannten Vertrag fristgerecht <strong>[[termination_date]]</strong>.</p>

                                <p style="margin-bottom: 15px;">Bitte senden Sie mir eine schriftliche Bestätigung der Kündigung unter Angabe des Beendigungsdatums an meine oben genannte Adresse zu.</p>

                                <p style="margin-bottom: 30px;">Ich widerspreche der weiteren Nutzung meiner persönlichen Daten zu Werbezwecken nach Vertragsende.</p>

                                <p style="margin-bottom: 60px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
                ]
            ],

            // 2. Уведомление о расторжении договора аренды (Kündigung des Mietvertrages)
            [
                'category_id' => $catLegal->id,
                'slug' => 'de-lease-termination-notice-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"tenant_details","type":"textarea","required":true,"labels":{"de":"Absender (Namen und Anschrift aller Mieter)","en":"Sender (Names and address of all tenants)","pl":"Nadawca (Imiona, nazwiska i adres wszystkich najemców)","uk":"Відправник (Імена та адреса всіх орендарів)"}},
                    {"name":"landlord_details","type":"textarea","required":true,"labels":{"de":"Empfänger (Name und Anschrift des Vermieters/Hausverwaltung)","en":"Recipient (Name and address of the landlord/property management)","pl":"Odbiorca (Imię i nazwisko, adres wynajmującego/zarządcy nieruchomości)","uk":"Одержувач (Ім\'я та адреса орендодавця/управляючої компанії)"}},
                    {"name":"date_place","type":"text","required":true,"labels":{"de":"Ort, Datum","en":"Place, Date","pl":"Miejscowość, Data","uk":"Місце, Дата"}},
                    {"name":"property_address","type":"textarea","required":true,"labels":{"de":"Anschrift der Mietwohnung (inkl. Stockwerk/Lage)","en":"Address of the rented apartment (incl. floor/location)","pl":"Adres wynajmowanego mieszkania (w tym piętro/położenie)","uk":"Адреса орендованої квартири (включаючи поверх/розташування)"}},
                    {"name":"lease_start_date","type":"date","required":true,"labels":{"de":"Datum des Mietvertragsbeginns","en":"Date of lease agreement start","pl":"Data rozpoczęcia umowy najmu","uk":"Дата початку договору оренди"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Kündigung des Mietvertrages',
                        'description' => 'Formelle und rechtssichere Kündigung des Mietvertrages für eine Wohnung unter Einhaltung der gesetzlichen Fristen.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[tenant_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[landlord_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Mietvertrages für die Wohnung:<br>
                                [[property_address]]
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;">hiermit kündigen wir (alle oben genannten Mieter) den Mietvertrag vom <strong>[[lease_start_date]]</strong> für die oben genannte Wohnung fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Gemäß der gesetzlichen Kündigungsfrist von drei Monaten wird das Mietverhältnis somit zum <strong>[Datum des Vertragsendes – bitte manuell einfügen]</strong> beendet.</p>

                                <p style="margin-bottom: 15px;">Bitte bestätigen Sie uns den Erhalt dieser Kündigung und das Datum des Vertragsendes schriftlich.</p>

                                <p style="margin-bottom: 30px;">Zwecks Vereinbarung eines Termins für die Wohnungsübergabe werden wir uns rechtzeitig mit Ihnen in Verbindung setzen.</p>

                                <p style="margin-bottom: 60px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 300px; padding-top: 5px;">
                                (Unterschriften aller Mieter)
                            </p>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Lease Agreement Termination',
                        'description' => 'Formal and legally compliant termination of a residential lease agreement in accordance with statutory notice periods.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[tenant_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[landlord_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Mietvertrages für die Wohnung:<br>
                                [[property_address]]
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;">hiermit kündigen wir (alle oben genannten Mieter) den Mietvertrag vom <strong>[[lease_start_date]]</strong> für die oben genannte Wohnung fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Gemäß der gesetzlichen Kündigungsfrist von drei Monaten wird das Mietverhältnis somit zum <strong>[Datum des Vertragsendes – bitte manuell einfügen]</strong> beendet.</p>

                                <p style="margin-bottom: 15px;">Bitte bestätigen Sie uns den Erhalt dieser Kündigung und das Datum des Vertragsendes schriftlich.</p>

                                <p style="margin-bottom: 30px;">Zwecks Vereinbarung eines Termins für die Wohnungsübergabe werden wir uns rechtzeitig mit Ihnen in Verbindung setzen.</p>

                                <p style="margin-bottom: 60px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 300px; padding-top: 5px;">
                                (Unterschriften aller Mieter)
                            </p>
                        </div>'
                    ],
                    'pl' => [
                        'title' => 'Wypowiedzenie Umowy Najmu',
                        'description' => 'Formalne i zgodne z prawem wypowiedzenie umowy najmu mieszkania z zachowaniem ustawowych terminów wypowiedzenia.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[tenant_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[landlord_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Mietvertrages für die Wohnung:<br>
                                [[property_address]]
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;">hiermit kündigen wir (alle oben genannten Mieter) den Mietvertrag vom <strong>[[lease_start_date]]</strong> für die oben genannte Wohnung fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Gemäß der gesetzlichen Kündigungsfrist von drei Monaten wird das Mietverhältnis somit zum <strong>[Datum des Vertragsendes – bitte manuell einfügen]</strong> beendet.</p>

                                <p style="margin-bottom: 15px;">Bitte bestätigen Sie uns den Erhalt dieser Kündigung und das Datum des Vertragsendes schriftlich.</p>

                                <p style="margin-bottom: 30px;">Zwecks Vereinbarung eines Termins für die Wohnungsübergabe werden wir uns rechtzeitig mit Ihnen in Verbindung setzen.</p>

                                <p style="margin-bottom: 60px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 300px; padding-top: 5px;">
                                (Unterschriften aller Mieter)
                            </p>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Розірвання Договору Оренди',
                        'description' => 'Формальне та юридично коректне розірвання договору оренди житла з дотриманням законних термінів повідомлення.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[tenant_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[landlord_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Mietvertrages für die Wohnung:<br>
                                [[property_address]]
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;">hiermit kündigen wir (alle oben genannten Mieter) den Mietvertrag vom <strong>[[lease_start_date]]</strong> für die oben genannte Wohnung fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Gemäß der gesetzlichen Kündigungsfrist von drei Monaten wird das Mietverhältnis somit zum <strong>[Datum des Vertragsendes – bitte manuell einfügen]</strong> beendet.</p>

                                <p style="margin-bottom: 15px;">Bitte bestätigen Sie uns den Erhalt dieser Kündigung und das Datum des Vertragsendes schriftlich.</p>

                                <p style="margin-bottom: 30px;">Zwecks Vereinbarung eines Termins für die Wohnungsübergabe werden wir uns rechtzeitig mit Ihnen in Verbindung setzen.</p>

                                <p style="margin-bottom: 60px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 300px; padding-top: 5px;">
                                (Unterschriften aller Mieter)
                            </p>
                        </div>'
                    ],
                ]
            ],

            // 3. Кündigung Mobilfunkvertrag (мобильная связь)
            [
                'category_id' => $catLegal->id,
                'slug' => 'de-mobile-contract-termination-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"sender_details","type":"textarea","required":true,"labels":{"de":"Absender (Ihr Name und Ihre Anschrift)","en":"Sender (Your name and address)","pl":"Nadawca (Twoje imię i nazwisko, adres)","uk":"Відправник (Ваше ім\'я та адреса)"}},
                    {"name":"provider_details","type":"textarea","required":true,"labels":{"de":"Mobilfunkanbieter (Name und Anschrift)","en":"Mobile provider (Name and address)","pl":"Operator komórkowy (Nazwa i adres)","uk":"Мобільний оператор (Назва та адреса)"}},
                    {"name":"date_place","type":"text","required":true,"labels":{"de":"Ort, Datum","en":"Place, Date","pl":"Miejscowość, Data","uk":"Місце, Дата"}},
                    {"name":"customer_number","type":"text","required":true,"labels":{"de":"Kundennummer","en":"Customer number","pl":"Numer klienta","uk":"Номер клієнта"}},
                    {"name":"phone_number","type":"text","required":true,"labels":{"de":"Handynummer","en":"Mobile phone number","pl":"Numer telefonu komórkowego","uk":"Номер мобільного телефону"}},
                    {"name":"contract_start_date","type":"date","required":false,"labels":{"de":"Vertragsbeginn (optional)","en":"Contract start date (optional)","pl":"Początek umowy (opcjonalnie)","uk":"Початок договору (опціонально)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Kündigung Mobilfunkvertrag',
                        'description' => 'Rechtssichere Kündigung eines Mobilfunkvertrags mit allen erforderlichen Angaben.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[provider_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Mobilfunkvertrags
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;"><strong>Kundennummer:</strong> [[customer_number]]<br>
                                <strong>Handynummer:</strong> [[phone_number]]</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich meinen Mobilfunkvertrag fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Sollte eine Kündigung zum gewünschten Termin nicht möglich sein, kündige ich hilfsweise zum nächstmöglichen Termin.</p>

                                <p style="margin-bottom: 15px;">Bitte senden Sie mir eine schriftliche Bestätigung der Kündigung mit Angabe des Vertragsendes zu.</p>

                                <p style="margin-bottom: 15px;">Die Rufnummernmitnahme behalte ich mir vor.</p>

                                <p style="margin-bottom: 30px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Mobile Phone Contract Termination',
                        'description' => 'Legally compliant termination of a mobile phone contract with all required information.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[provider_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Mobilfunkvertrags
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;"><strong>Kundennummer:</strong> [[customer_number]]<br>
                                <strong>Handynummer:</strong> [[phone_number]]</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich meinen Mobilfunkvertrag fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Sollte eine Kündigung zum gewünschten Termin nicht möglich sein, kündige ich hilfsweise zum nächstmöglichen Termin.</p>

                                <p style="margin-bottom: 15px;">Bitte senden Sie mir eine schriftliche Bestätigung der Kündigung mit Angabe des Vertragsendes zu.</p>

                                <p style="margin-bottom: 15px;">Die Rufnummernmitnahme behalte ich mir vor.</p>

                                <p style="margin-bottom: 30px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
                    'pl' => [
                        'title' => 'Wypowiedzenie Umowy Komórkowej',
                        'description' => 'Zgodne z prawem wypowiedzenie umowy z operatorem komórkowym ze wszystkimi wymaganymi danymi.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[provider_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Mobilfunkvertrags
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;"><strong>Kundennummer:</strong> [[customer_number]]<br>
                                <strong>Handynummer:</strong> [[phone_number]]</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich meinen Mobilfunkvertrag fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Sollte eine Kündigung zum gewünschten Termin nicht möglich sein, kündige ich hilfsweise zum nächstmöglichen Termin.</p>

                                <p style="margin-bottom: 15px;">Bitte senden Sie mir eine schriftliche Bestätigung der Kündigung mit Angabe des Vertragsendes zu.</p>

                                <p style="margin-bottom: 15px;">Die Rufnummernmitnahme behalte ich mir vor.</p>

                                <p style="margin-bottom: 30px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Розірвання Договору Мобільного Зв\'язку',
                        'description' => 'Юридично коректне розірвання договору мобільного зв\'язку з усією необхідною інформацією.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[provider_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung des Mobilfunkvertrags
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;"><strong>Kundennummer:</strong> [[customer_number]]<br>
                                <strong>Handynummer:</strong> [[phone_number]]</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich meinen Mobilfunkvertrag fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Sollte eine Kündigung zum gewünschten Termin nicht möglich sein, kündige ich hilfsweise zum nächstmöglichen Termin.</p>

                                <p style="margin-bottom: 15px;">Bitte senden Sie mir eine schriftliche Bestätigung der Kündigung mit Angabe des Vertragsendes zu.</p>

                                <p style="margin-bottom: 15px;">Die Rufnummernmitnahme behalte ich mir vor.</p>

                                <p style="margin-bottom: 30px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
                ]
            ],

            // 4. Kündigung Fitnessstudio
            [
                'category_id' => $catLegal->id,
                'slug' => 'de-gym-membership-termination-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"sender_details","type":"textarea","required":true,"labels":{"de":"Absender (Ihr Name und Ihre Anschrift)","en":"Sender (Your name and address)","pl":"Nadawca (Twoje imię i nazwisko, adres)","uk":"Відправник (Ваше ім\'я та адреса)"}},
                    {"name":"gym_details","type":"textarea","required":true,"labels":{"de":"Fitnessstudio (Name und Anschrift)","en":"Gym (Name and address)","pl":"Siłownia (Nazwa i adres)","uk":"Спортзал (Назва та адреса)"}},
                    {"name":"date_place","type":"text","required":true,"labels":{"de":"Ort, Datum","en":"Place, Date","pl":"Miejscowość, Data","uk":"Місце, Дата"}},
                    {"name":"membership_number","type":"text","required":true,"labels":{"de":"Mitgliedsnummer","en":"Membership number","pl":"Numer członkowstwa","uk":"Номер членства"}},
                    {"name":"contract_start_date","type":"date","required":false,"labels":{"de":"Vertragsbeginn (falls bekannt)","en":"Contract start date (if known)","pl":"Początek umowy (jeśli znany)","uk":"Початок договору (якщо відомо)"}},
                    {"name":"termination_reason","type":"select","required":false,"options":[{"value":"","label":"Kein besonderer Grund"},{"value":"Umzug","label":"Umzug"},{"value":"Krankheit","label":"Krankheit/Verletzung"},{"value":"Finanzielle Gründe","label":"Finanzielle Gründe"}],"labels":{"de":"Kündigungsgrund (optional)","en":"Reason for termination (optional)","pl":"Powód wypowiedzenia (opcjonalnie)","uk":"Причина розірвання (опціонально)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Kündigung Fitnessstudio-Mitgliedschaft',
                        'description' => 'Professionelle Kündigung der Fitnessstudio-Mitgliedschaft unter Beachtung der Vertragslaufzeit.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[gym_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung der Fitnessstudio-Mitgliedschaft
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;"><strong>Mitgliedsnummer:</strong> [[membership_number]]</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich meine Mitgliedschaft in Ihrem Fitnessstudio fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Sollte eine Kündigung zum gewünschten Termin nicht möglich sein, kündige ich hilfsweise zum nächstmöglichen Termin nach Ablauf der Mindestvertragslaufzeit.</p>

                                <p style="margin-bottom: 15px;">Bitte bestätigen Sie mir schriftlich den Erhalt dieser Kündigung sowie das genaue Datum der Vertragsbeendigung.</p>

                                <p style="margin-bottom: 30px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Gym Membership Termination',
                        'description' => 'Professional termination of gym membership in compliance with contract terms.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[gym_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung der Fitnessstudio-Mitgliedschaft
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;"><strong>Mitgliedsnummer:</strong> [[membership_number]]</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich meine Mitgliedschaft in Ihrem Fitnessstudio fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Sollte eine Kündigung zum gewünschten Termin nicht möglich sein, kündige ich hilfsweise zum nächstmöglichen Termin nach Ablauf der Mindestvertragslaufzeit.</p>

                                <p style="margin-bottom: 15px;">Bitte bestätigen Sie mir schriftlich den Erhalt dieser Kündigung sowie das genaue Datum der Vertragsbeendigung.</p>

                                <p style="margin-bottom: 30px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
                    'pl' => [
                        'title' => 'Wypowiedzenie Członkostwa w Siłowni',
                        'description' => 'Profesjonalne wypowiedzenie członkostwa w siłowni zgodnie z warunkami umowy.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[gym_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung der Fitnessstudio-Mitgliedschaft
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;"><strong>Mitgliedsnummer:</strong> [[membership_number]]</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich meine Mitgliedschaft in Ihrem Fitnessstudio fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Sollte eine Kündigung zum gewünschten Termin nicht möglich sein, kündige ich hilfsweise zum nächstmöglichen Termin nach Ablauf der Mindestvertragslaufzeit.</p>

                                <p style="margin-bottom: 15px;">Bitte bestätigen Sie mir schriftlich den Erhalt dieser Kündigung sowie das genaue Datum der Vertragsbeendigung.</p>

                                <p style="margin-bottom: 30px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Розірвання Членства у Спортзалі',
                        'description' => 'Професійне розірвання членства у спортзалі відповідно до умов договору.',
                        'header_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; margin-bottom: 30px;">
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[sender_details]]</p>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <p style="white-space: pre-wrap; margin: 0;">[[gym_details]]</p>
                            </div>
                            <div style="text-align: right; margin-bottom: 30px;">
                                <p style="margin: 0;">[[date_place]]</p>
                            </div>
                        </div>',
                        'body_html' => '<div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6;">
                            <h2 style="font-size: 14px; font-weight: bold; margin: 20px 0; text-align: center;">
                                Kündigung der Fitnessstudio-Mitgliedschaft
                            </h2>

                            <div style="margin: 30px 0;">
                                <p style="margin-bottom: 20px;">Sehr geehrte Damen und Herren,</p>

                                <p style="margin-bottom: 15px;"><strong>Mitgliedsnummer:</strong> [[membership_number]]</p>

                                <p style="margin-bottom: 15px;">hiermit kündige ich meine Mitgliedschaft in Ihrem Fitnessstudio fristgerecht zum nächstmöglichen Zeitpunkt.</p>

                                <p style="margin-bottom: 15px;">Sollte eine Kündigung zum gewünschten Termin nicht möglich sein, kündige ich hilfsweise zum nächstmöglichen Termin nach Ablauf der Mindestvertragslaufzeit.</p>

                                <p style="margin-bottom: 15px;">Bitte bestätigen Sie mir schriftlich den Erhalt dieser Kündigung sowie das genaue Datum der Vertragsbeendigung.</p>

                                <p style="margin-bottom: 30px;">Mit freundlichen Grüßen</p>
                            </div>
                        </div>',
                        'footer_html' => '<div style="font-family: Arial, sans-serif; margin-top: 60px; text-align: left; font-size: 12px;">
                            <p style="margin: 0; border-top: 1px solid #000; width: 250px; padding-top: 5px;">
                                (Unterschrift)
                            </p>
                        </div>'
                    ],
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
