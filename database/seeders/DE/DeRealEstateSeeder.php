<?php

namespace Database\Seeders\DE;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class DeRealEstateSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'housing-issues-de')->first();
        if (!$category) {
            $this->command->error('Category with slug "housing-issues-de" not found.');
            return;
        }


        $templatesData = [

// --- Договор аренды квартиры (долгосрочный) / Long-term Apartment Rental Agreement (Mietvertrag) ---
            [
                'slug' => 'long-term-apartment-rental-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko najemcy","en":"Tenant\'s Full Name","uk":"ПІБ орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, piętro, miasto)","en":"Property Address (street, number, floor, city)","uk":"Адреса нерухомості (вулиця, номер, поверх, місто)","de":"Adresse der Immobilie (Straße, Nummer, Etage, Stadt)"}},
                    {"name":"apartment_size","type":"number","required":true,"labels":{"pl":"Powierzchnia mieszkania (m²)","en":"Apartment Size (m²)","uk":"Площа квартири (м²)","de":"Wohnungsgröße (m²)"}},
                    {"name":"number_of_rooms","type":"number","required":true,"labels":{"pl":"Liczba pokoi","en":"Number of Rooms","uk":"Кількість кімнат","de":"Anzahl der Zimmer"}},
                    {"name":"basic_rent","type":"number","required":true,"labels":{"pl":"Czynsz podstawowy (netto)","en":"Basic Rent (net)","uk":"Основна орендна плата (нетто)","de":"Grundmiete (netto)"}},
                    {"name":"utility_costs","type":"number","required":true,"labels":{"pl":"Koszty eksploatacji (Nebenkosten)","en":"Utility Costs (Nebenkosten)","uk":"Комунальні послуги (Nebenkosten)","de":"Nebenkosten"}},
                    {"name":"total_rent","type":"number","required":true,"labels":{"pl":"Czynsz całkowity (brutto)","en":"Total Rent (gross)","uk":"Загальна орендна плата (брутто)","de":"Gesamtmiete (brutto)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji","en":"Deposit Amount","uk":"Розмір застави","de":"Kautionshöhe"}},
                    {"name":"rental_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Rental Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"rental_end_date","type":"date","required":false,"labels":{"pl":"Data zakończenia najmu (jeśli umowa na czas określony)","en":"Rental End Date (if fixed-term contract)","uk":"Дата закінчення оренди (якщо договір на визначений термін)","de":"Mietende (falls befristeter Vertrag)"}},
                    {"name":"notice_period","type":"text","required":true,"labels":{"pl":"Okres wypowiedzenia","en":"Notice Period","uk":"Термін розірвання","de":"Kündigungsfrist"}},
                    {"name":"house_rules_attachment","type":"text","required":false,"labels":{"pl":"Załącznik: Regulamin domu (Hausordnung)","en":"Attachment: House Rules (Hausordnung)","uk":"Додаток: Правила будинку (Hausordnung)","de":"Anhang: Hausordnung"}},
                    {"name":"other_agreements","type":"textarea","required":false,"labels":{"pl":"Inne uzgodnienia (np. remonty, zwierzęta domowe)","en":"Other agreements (e.g., renovations, pets)","uk":"Інші домовленості (напр., ремонти, домашні тварини)","de":"Weitere Vereinbarungen (z.B. Renovierungen, Haustiere)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mietvertrag für eine Wohnung (unbefristet/befristet)',
                        'description' => 'Standard-Mietvertrag für Wohnraum in Deutschland, konform mit dem BGB und Mietrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETVERTRAG</h1><p style="font-size: 14px;">Wohnung in <strong>[[apartment_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mieter: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Mietobjekt</h2>
                                <p>Der Vermieter vermietet an den Mieter die Wohnung in <strong>[[apartment_address]]</strong>, bestehend aus [[number_of_rooms]] Zimmern mit einer Wohnfläche von ca. [[apartment_size]] m².</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Mietzeit</h2>
                                <p>Das Mietverhältnis beginnt am <strong>[[rental_start_date]]</strong>. Es wird [[rental_end_date]] (optional: "auf unbestimmte Zeit" oder "bis zum [[rental_end_date]]") geschlossen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Miete</h2>
                                <p>Die monatliche Grundmiete beträgt <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>Die monatlichen Nebenkosten (Betriebskosten) betragen <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Die Gesamtmiete beträgt somit monatlich <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaution</h2>
                                <p>Die Kaution beträgt <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Kündigung</h2>
                                <p>Die Kündigungsfrist beträgt [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Weitere Vereinbarungen</h2>
                                <p>[[other_agreements]]</p>
                                <p>Die Hausordnung ist Bestandteil dieses Vertrages: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Schlussbestimmungen</h2>
                                <p>Änderungen und Ergänzungen dieses Vertrages bedürfen der Schriftform. Es gilt deutsches Recht.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Apartment Rental Agreement (Long-term)',
                        'description' => 'Standard rental agreement for residential property in Germany, compliant with German Civil Code (BGB) and tenancy law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RENTAL AGREEMENT</h1><p style="font-size: 14px;">Apartment at <strong>[[apartment_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Tenant: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Rental Property</h2>
                                <p>The landlord rents to the tenant the apartment at <strong>[[apartment_address]]</strong>, consisting of [[number_of_rooms]] rooms with a living area of approx. [[apartment_size]] m².</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Rental Period</h2>
                                <p>The tenancy begins on <strong>[[rental_start_date]]</strong>. It is concluded [[rental_end_date]] (optional: "for an indefinite period" or "until [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Rent</h2>
                                <p>The monthly basic rent is <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>The monthly utility costs (Nebenkosten) are <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>The total rent is therefore monthly <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Deposit</h2>
                                <p>The deposit is <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Termination</h2>
                                <p>The notice period is [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Further Agreements</h2>
                                <p>[[other_agreements]]</p>
                                <p>The house rules are part of this contract: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Final Provisions</h2>
                                <p>Amendments and supplements to this contract must be made in writing. German law applies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди квартири (довгостроковий)',
                        'description' => 'Стандартний договір оренди житлового приміщення в Німеччині, що відповідає Цивільному кодексу Німеччини (BGB) та орендному праву.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ</h1><p style="font-size: 14px;">Квартира за адресою <strong>[[apartment_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Орендар: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Об\'єкт оренди</h2>
                                <p>Орендодавець здає в оренду Орендарю квартиру за адресою <strong>[[apartment_address]]</strong>, що складається з [[number_of_rooms]] кімнат житловою площею близько [[apartment_size]] м².</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Термін оренди</h2>
                                <p>Термін оренди починається <strong>[[rental_start_date]]</strong>. Договір укладається [[rental_end_date]] (опціонально: "на невизначений термін" або "до [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Орендна плата</h2>
                                <p>Щомісячна основна орендна плата становить <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>Щомісячні комунальні послуги (Nebenkosten) становлять <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Загальна орендна плата становить щомісячно <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Застава</h2>
                                <p>Застава становить <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Розірвання</h2>
                                <p>Термін розірвання становить [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Додаткові домовленості</h2>
                                <p>[[other_agreements]]</p>
                                <p>Правила будинку є частиною цього договору: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Прикінцеві положення</h2>
                                <p>Зміни та доповнення до цього договору повинні бути зроблені в письмовій формі. Застосовується німецьке право.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu mieszkania (długoterminowa)',
                        'description' => 'Standardowa umowa najmu nieruchomości mieszkalnej w Niemczech, zgodna z BGB i prawem najmu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU</h1><p style="font-size: 14px;">Mieszkanie przy <strong>[[apartment_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Najemca: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Przedmiot najmu</h2>
                                <p>Wynajmujący wynajmuje Najemcy mieszkanie przy <strong>[[apartment_address]]</strong>, składające się z [[number_of_rooms]] pokoi o powierzchni mieszkalnej ok. [[apartment_size]] m².</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Okres najmu</h2>
                                <p>Stosunek najmu rozpoczyna się w dniu <strong>[[rental_start_date]]</strong>. Zostaje zawarty [[rental_end_date]] (opcjonalnie: "na czas nieokreślony" lub "do [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Czynsz</h2>
                                <p>Miesięczny czynsz podstawowy wynosi <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>Miesięczne koszty eksploatacji (Nebenkosten) wynoszą <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Całkowity czynsz wynosi zatem miesięcznie <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaucja</h2>
                                <p>Kaucja wynosi <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Wypowiedzenie</h2>
                                <p>Okres wypowiedzenia wynosi [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Dalsze uzgodnienia</h2>
                                <p>[[other_agreements]]</p>
                                <p>Regulamin domu jest częścią niniejszej umowy: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Postanowienia końcowe</h2>
                                <p>Zmiany i uzupełnienia niniejszej umowy wymagają formy pisemnej. Obowiązuje prawo niemieckie.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Договор посуточной аренды квартиры / Daily Apartment Rental Agreement (Kurzzeitmietvertrag) ---
            [
                'slug' => 'daily-apartment-rental-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko najemcy","en":"Tenant\'s Full Name","uk":"ПІБ орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, piętro, miasto)","en":"Property Address (street, number, floor, city)","uk":"Адреса нерухомості (вулиця, номер, поверх, місто)","de":"Adresse der Immobilie (Straße, Nummer, Etage, Stadt)"}},
                    {"name":"rental_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Rental Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"rental_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu","en":"Rental End Date","uk":"Дата закінчення оренди","de":"Mietende"}},
                    {"name":"total_rental_fee","type":"number","required":true,"labels":{"pl":"Całkowita opłata za najem","en":"Total Rental Fee","uk":"Загальна плата за оренду","de":"Gesamtmietgebühr"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji","en":"Deposit Amount","uk":"Розмір застави","de":"Kautionshöhe"}},
                    {"name":"check_in_time","type":"text","required":true,"labels":{"pl":"Godzina zameldowania (Check-in)","en":"Check-in Time","uk":"Час заїзду (Check-in)","de":"Check-in-Zeit"}},
                    {"name":"check_out_time","type":"text","required":true,"labels":{"pl":"Godzina wymeldowania (Check-out)","en":"Check-out Time","uk":"Час виїзду (Check-out)","de":"Check-out-Zeit"}},
                    {"name":"house_rules_attachment","type":"text","required":false,"labels":{"pl":"Załącznik: Regulamin domu (Hausordnung)","en":"Attachment: House Rules (Hausordnung)","uk":"Додаток: Правила будинку (Hausordnung)","de":"Anhang: Hausordnung"}},
                    {"name":"other_agreements","type":"textarea","required":false,"labels":{"pl":"Inne uzgodnienia","en":"Other agreements","uk":"Інші домовленості","de":"Weitere Vereinbarungen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Kurzzeit-Mietvertrag für eine Wohnung',
                        'description' => 'Mietvertrag für die kurzfristige Anmietung einer Wohnung, z.B. für Ferienwohnungen oder Geschäftsreisen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KURZZEIT-MIETVERTRAG</h1><p style="font-size: 14px;">Wohnung in <strong>[[apartment_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mieter: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Mietobjekt und Mietzeit</h2>
                                <p>Der Vermieter vermietet an den Mieter die Wohnung in <strong>[[apartment_address]]</strong> für den Zeitraum vom <strong>[[rental_start_date]]</strong> bis <strong>[[rental_end_date]]</strong>.</p>
                                <p>Check-in: [[check_in_time]], Check-out: [[check_out_time]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Mietzins und Kaution</h2>
                                <p>Die Gesamtmietgebühr für den genannten Zeitraum beträgt <strong>[[total_rental_fee]] [[currency]]</strong>.</p>
                                <p>Die Kaution beträgt <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Hausordnung und Weitere Vereinbarungen</h2>
                                <p>Die Hausordnung ist Bestandteil dieses Vertrages: [[house_rules_attachment]]</p>
                                <p>Weitere Vereinbarungen: [[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Schlussbestimmungen</h2>
                                <p>Es gilt deutsches Recht. Gerichtsstand ist der Sitz des Vermieters.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Daily Apartment Rental Agreement',
                        'description' => 'Rental agreement for short-term apartment rental, e.g., for holiday apartments or business trips.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SHORT-TERM RENTAL AGREEMENT</h1><p style="font-size: 14px;">Apartment at <strong>[[apartment_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Tenant: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Rental Property and Period</h2>
                                <p>The landlord rents to the tenant the apartment at <strong>[[apartment_address]]</strong> for the period from <strong>[[rental_start_date]]</strong> to <strong>[[rental_end_date]]</strong>.</p>
                                <p>Check-in: [[check_in_time]], Check-out: [[check_out_time]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Rent and Deposit</h2>
                                <p>The total rental fee for the specified period is <strong>[[total_rental_fee]] [[currency]]</strong>.</p>
                                <p>The deposit is <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 House Rules and Further Agreements</h2>
                                <p>The house rules are part of this contract: [[house_rules_attachment]]</p>
                                <p>Further agreements: [[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Final Provisions</h2>
                                <p>German law applies. The place of jurisdiction is the landlord\'s domicile.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір подобової оренди квартири',
                        'description' => 'Договір оренди для короткострокової оренди квартири, напр., для відпустки або відряджень.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КОРОТКОСТРОКОВИЙ ДОГОВІР ОРЕНДИ</h1><p style="font-size: 14px;">Квартира за адресою <strong>[[apartment_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Орендар: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Об\'єкт оренди та термін</h2>
                                <p>Орендодавець здає в оренду Орендарю квартиру за адресою <strong>[[apartment_address]]</strong> на термін з <strong>[[rental_start_date]]</strong> до <strong>[[rental_end_date]]</strong>.</p>
                                <p>Заїзд: [[check_in_time]], Виїзд: [[check_out_time]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Орендна плата та застава</h2>
                                <p>Загальна плата за оренду за зазначений період становить <strong>[[total_rental_fee]] [[currency]]</strong>.</p>
                                <p>Застава становить <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Правила будинку та додаткові домовленості</h2>
                                <p>Правила будинку є частиною цього договору: [[house_rules_attachment]]</p>
                                <p>Додаткові домовленості: [[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Прикінцеві положення</h2>
                                <p>Застосовується німецьке право. Місцем розгляду спорів є місцезнаходження орендодавця.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu mieszkania na krótki termin',
                        'description' => 'Umowa najmu na krótki termin, np. na mieszkania wakacyjne lub podróże służbowe.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU NA KRÓTKI TERMIN</h1><p style="font-size: 14px;">Mieszkanie przy <strong>[[apartment_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Najemca: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Przedmiot najmu i okres najmu</h2>
                                <p>Wynajmujący wynajmuje Najemcy mieszkanie przy <strong>[[apartment_address]]</strong> na okres od <strong>[[rental_start_date]]</strong> do <strong>[[rental_end_date]]</strong>.</p>
                                <p>Godzina zameldowania: [[check_in_time]], Godzina wymeldowania: [[check_out_time]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Czynsz i kaucja</h2>
                                <p>Całkowita opłata za najem za wskazany okres wynosi <strong>[[total_rental_fee]] [[currency]]</strong>.</p>
                                <p>Kaucja wynosi <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Regulamin domu i dalsze uzgodnienia</h2>
                                <p>Regulamin domu jest częścią niniejszej umowy: [[house_rules_attachment]]</p>
                                <p>Dalsze uzgodnienia: [[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Postanowienia końcowe</h2>
                                <p>Obowiązuje prawo niemieckie. Sądem właściwym jest sąd miejsca zamieszkania wynajmującego.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Договор аренды комнаты / Room Rental Agreement (Mietvertrag Zimmer) ---
            [
                'slug' => 'room-rental-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko najemcy","en":"Tenant\'s Full Name","uk":"ПІБ орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"room_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, piętro, miasto)","en":"Property Address (street, number, floor, city)","uk":"Адреса нерухомості (вулиця, номер, поверх, місто)","de":"Adresse der Immobilie (Straße, Nummer, Etage, Stadt)"}},
                    {"name":"room_number","type":"text","required":true,"labels":{"pl":"Numer pokoju","en":"Room Number","uk":"Номер кімнати","de":"Zimmernummer"}},
                    {"name":"room_size","type":"number","required":true,"labels":{"pl":"Powierzchnia pokoju (m²)","en":"Room Size (m²)","uk":"Площа кімнати (м²)","de":"Zimmergröße (m²)"}},
                    {"name":"shared_areas","type":"textarea","required":true,"labels":{"pl":"Wspólne obszary (np. kuchnia, łazienka)","en":"Shared Areas (e.g., kitchen, bathroom)","uk":"Спільні зони (напр., кухня, ванна кімната)","de":"Gemeinschaftsbereiche (z.B. Küche, Bad)"}},
                    {"name":"basic_rent","type":"number","required":true,"labels":{"pl":"Czynsz podstawowy (netto)","en":"Basic Rent (net)","uk":"Основна орендна плата (нетто)","de":"Grundmiete (netto)"}},
                    {"name":"utility_costs","type":"number","required":true,"labels":{"pl":"Koszty eksploatacji (Nebenkosten)","en":"Utility Costs (Nebenkosten)","uk":"Комунальні послуги (Nebenkosten)","de":"Nebenkosten"}},
                    {"name":"total_rent","type":"number","required":true,"labels":{"pl":"Czynsz całkowity (brutto)","en":"Total Rent (gross)","uk":"Загальна орендна плата (брутто)","de":"Gesamtmiete (brutto)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji","en":"Deposit Amount","uk":"Розмір застави","de":"Kautionshöhe"}},
                    {"name":"rental_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Rental Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"rental_end_date","type":"date","required":false,"labels":{"pl":"Data zakończenia najmu (jeśli umowa na czas określony)","en":"Rental End Date (if fixed-term contract)","uk":"Дата закінчення оренди (якщо договір на визначений термін)","de":"Mietende (falls befristeter Vertrag)"}},
                    {"name":"notice_period","type":"text","required":true,"labels":{"pl":"Okres wypowiedzenia","en":"Notice Period","uk":"Термін розірвання","de":"Kündigungsfrist"}},
                    {"name":"house_rules_attachment","type":"text","required":false,"labels":{"pl":"Załącznik: Regulamin domu (Hausordnung)","en":"Attachment: House Rules (Hausordnung)","uk":"Додаток: Правила будинку (Hausordnung)","de":"Anhang: Hausordnung"}},
                    {"name":"other_agreements","type":"textarea","required":false,"labels":{"pl":"Inne uzgodnienia","en":"Other agreements","uk":"Інші домовленості","de":"Weitere Vereinbarungen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mietvertrag für ein Zimmer',
                        'description' => 'Standard-Mietvertrag für ein einzelnes Zimmer in einer Wohnung oder einem Haus in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETVERTRAG ZIMMER</h1><p style="font-size: 14px;">Zimmer Nr. [[room_number]] in <strong>[[room_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mieter: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Mietobjekt</h2>
                                <p>Der Vermieter vermietet an den Mieter das Zimmer Nr. <strong>[[room_number]]</strong> in <strong>[[room_address]]</strong> mit einer Fläche von ca. [[room_size]] m².</p>
                                <p>Gemeinschaftlich genutzte Bereiche: [[shared_areas]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Mietzeit</h2>
                                <p>Das Mietverhältnis beginnt am <strong>[[rental_start_date]]</strong>. Es wird [[rental_end_date]] (optional: "auf unbestimmte Zeit" oder "bis zum [[rental_end_date]]") geschlossen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Miete</h2>
                                <p>Die monatliche Grundmiete beträgt <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>Die monatlichen Nebenkosten betragen <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Die Gesamtmiete beträgt somit monatlich <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaution</h2>
                                <p>Die Kaution beträgt <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Kündigung</h2>
                                <p>Die Kündigungsfrist beträgt [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Weitere Vereinbarungen</h2>
                                <p>[[other_agreements]]</p>
                                <p>Die Hausordnung ist Bestandteil dieses Vertrages: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Schlussbestimmungen</h2>
                                <p>Es gilt deutsches Recht.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Room Rental Agreement',
                        'description' => 'Standard rental agreement for a single room in an apartment or house in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ROOM RENTAL AGREEMENT</h1><p style="font-size: 14px;">Room No. [[room_number]] at <strong>[[room_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Tenant: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Rental Property</h2>
                                <p>The landlord rents to the tenant room No. <strong>[[room_number]]</strong> at <strong>[[room_address]]</strong> with an area of approx. [[room_size]] m².</p>
                                <p>Shared areas: [[shared_areas]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Rental Period</h2>
                                <p>The tenancy begins on <strong>[[rental_start_date]]</strong>. It is concluded [[rental_end_date]] (optional: "for an indefinite period" or "until [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Rent</h2>
                                <p>The monthly basic rent is <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>The monthly utility costs are <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>The total rent is therefore monthly <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Deposit</h2>
                                <p>The deposit is <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Termination</h2>
                                <p>The notice period is [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Further Agreements</h2>
                                <p>[[other_agreements]]</p>
                                <p>The house rules are part of this contract: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Final Provisions</h2>
                                <p>German law applies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди кімнати',
                        'description' => 'Стандартний договір оренди окремої кімнати в квартирі або будинку в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ КІМНАТИ</h1><p style="font-size: 14px;">Кімната № [[room_number]] за адресою <strong>[[room_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Орендар: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Об\'єкт оренди</h2>
                                <p>Орендодавець здає в оренду Орендарю кімнату № <strong>[[room_number]]</strong> за адресою <strong>[[room_address]]</strong> площею близько [[room_size]] м².</p>
                                <p>Спільні зони: [[shared_areas]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Термін оренди</h2>
                                <p>Термін оренди починається <strong>[[rental_start_date]]</strong>. Договір укладається [[rental_end_date]] (опціонально: "на невизначений термін" або "до [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Орендна плата</h2>
                                <p>Щомісячна основна орендна плата становить <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>Щомісячні комунальні послуги становлять <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Загальна орендна плата становить щомісячно <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Застава</h2>
                                <p>Застава становить <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Розірвання</h2>
                                <p>Термін розірвання становить [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Додаткові домовленості</h2>
                                <p>[[other_agreements]]</p>
                                <p>Правила будинку є частиною цього договору: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Прикінцеві положення</h2>
                                <p>Застосовується німецьке право.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu pokoju',
                        'description' => 'Standardowa umowa najmu pojedynczego pokoju w mieszkaniu lub domu w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU POKOJU</h1><p style="font-size: 14px;">Pokój nr [[room_number]] przy <strong>[[room_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Najemca: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Przedmiot najmu</h2>
                                <p>Wynajmujący wynajmuje Najemcy pokój nr <strong>[[room_number]]</strong> przy <strong>[[room_address]]</strong> o powierzchni ok. [[room_size]] m².</p>
                                <p>Wspólne obszary: [[shared_areas]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Okres najmu</h2>
                                <p>Stosunek najmu rozpoczyna się w dniu <strong>[[rental_start_date]]</strong>. Zostaje zawarty [[rental_end_date]] (opcjonalnie: "na czas nieokreślony" lub "do [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Czynsz</h2>
                                <p>Miesięczny czynsz podstawowy wynosi <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>Miesięczne koszty eksploatacji wynoszą <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Całkowity czynsz wynosi zatem miesięcznie <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaucja</h2>
                                <p>Kaucja wynosi <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Wypowiedzenie</h2>
                                <p>Okres wypowiedzenia wynosi [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Dalsze uzgodnienia</h2>
                                <p>[[other_agreements]]</p>
                                <p>Regulamin domu jest częścią niniejszej umowy: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Postanowienia końcowe</h2>
                                <p>Obowiązuje prawo niemieckie.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Договор аренды дома / House Rental Agreement (Mietvertrag Haus) ---
            [
                'slug' => 'house-rental-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko najemcy","en":"Tenant\'s Full Name","uk":"ПІБ орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"house_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, miasto)","en":"Property Address (street, number, city)","uk":"Адреса нерухомості (вулиця, номер, місто)","de":"Adresse der Immobilie (Straße, Nummer, Stadt)"}},
                    {"name":"house_size","type":"number","required":true,"labels":{"pl":"Powierzchnia domu (m²)","en":"House Size (m²)","uk":"Площа будинку (м²)","de":"Hausgröße (m²)"}},
                    {"name":"land_area","type":"number","required":true,"labels":{"pl":"Powierzchnia działki (m²)","en":"Land Area (m²)","uk":"Площа ділянки (м²)","de":"Grundstücksfläche (m²)"}},
                    {"name":"basic_rent","type":"number","required":true,"labels":{"pl":"Czynsz podstawowy (netto)","en":"Basic Rent (net)","uk":"Основна орендна плата (нетто)","de":"Grundmiete (netto)"}},
                    {"name":"utility_costs","type":"number","required":true,"labels":{"pl":"Koszty eksploatacji (Nebenkosten)","en":"Utility Costs (Nebenkosten)","uk":"Комунальні послуги (Nebenkosten)","de":"Nebenkosten"}},
                    {"name":"total_rent","type":"number","required":true,"labels":{"pl":"Czynsz całkowity (brutto)","en":"Total Rent (gross)","uk":"Загальна орендна плата (брутто)","de":"Gesamtmiete (brutto)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji","en":"Deposit Amount","uk":"Розмір застави","de":"Kautionshöhe"}},
                    {"name":"rental_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Rental Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"rental_end_date","type":"date","required":false,"labels":{"pl":"Data zakończenia najmu (jeśli umowa na czas określony)","en":"Rental End Date (if fixed-term contract)","uk":"Дата закінчення оренди (якщо договір на визначений термін)","de":"Mietende (falls befristeter Vertrag)"}},
                    {"name":"notice_period","type":"text","required":true,"labels":{"pl":"Okres wypowiedzenia","en":"Notice Period","uk":"Термін розірвання","de":"Kündigungsfrist"}},
                    {"name":"house_rules_attachment","type":"text","required":false,"labels":{"pl":"Załącznik: Regulamin domu (Hausordnung)","en":"Attachment: House Rules (Hausordnung)","uk":"Додаток: Правила будинку (Hausordnung)","de":"Anhang: Hausordnung"}},
                    {"name":"other_agreements","type":"textarea","required":false,"labels":{"pl":"Inne uzgodnienia","en":"Other agreements","uk":"Інші домовленості","de":"Weitere Vereinbarungen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mietvertrag für ein Haus',
                        'description' => 'Standard-Mietvertrag für ein Einfamilienhaus in Deutschland, konform mit dem BGB und Mietrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETVERTRAG HAUS</h1><p style="font-size: 14px;">Haus in <strong>[[house_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mieter: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Mietobjekt</h2>
                                <p>Der Vermieter vermietet an den Mieter das Haus in <strong>[[house_address]]</strong> mit einer Wohnfläche von ca. [[house_size]] m² und einer Grundstücksfläche von ca. [[land_area]] m².</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Mietzeit</h2>
                                <p>Das Mietverhältnis beginnt am <strong>[[rental_start_date]]</strong>. Es wird [[rental_end_date]] (optional: "auf unbestimmte Zeit" oder "bis zum [[rental_end_date]]") geschlossen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Miete</h2>
                                <p>Die monatliche Grundmiete beträgt <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>Die monatlichen Nebenkosten (Betriebskosten) betragen <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Die Gesamtmiete beträgt somit monatlich <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaution</h2>
                                <p>Die Kaution beträgt <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Kündigung</h2>
                                <p>Die Kündigungsfrist beträgt [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Weitere Vereinbarungen</h2>
                                <p>[[other_agreements]]</p>
                                <p>Die Hausordnung ist Bestandteil dieses Vertrages: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Schlussbestimmungen</h2>
                                <p>Es gilt deutsches Recht.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'House Rental Agreement',
                        'description' => 'Standard rental agreement for a single-family house in Germany, compliant with German Civil Code (BGB) and tenancy law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HOUSE RENTAL AGREEMENT</h1><p style="font-size: 14px;">House at <strong>[[house_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Tenant: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Rental Property</h2>
                                <p>The landlord rents to the tenant the house at <strong>[[house_address]]</strong> with a living area of approx. [[house_size]] m² and a plot area of approx. [[land_area]] m².</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Rental Period</h2>
                                <p>The tenancy begins on <strong>[[rental_start_date]]</strong>. It is concluded [[rental_end_date]] (optional: "for an indefinite period" or "until [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Rent</h2>
                                <p>The monthly basic rent is <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>The monthly utility costs (Nebenkosten) are <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>The total rent is therefore monthly <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Deposit</h2>
                                <p>The deposit is <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Termination</h2>
                                <p>The notice period is [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Further Agreements</h2>
                                <p>[[other_agreements]]</p>
                                <p>The house rules are part of this contract: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Final Provisions</h2>
                                <p>German law applies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди будинку',
                        'description' => 'Стандартний договір оренди односімейного будинку в Німеччині, що відповідає Цивільному кодексу Німеччини (BGB) та орендному праву.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ БУДИНКУ</h1><p style="font-size: 14px;">Будинок за адресою <strong>[[house_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Орендар: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Об\'єкт оренди</h2>
                                <p>Орендодавець здає в оренду Орендарю будинок за адресою <strong>[[house_address]]</strong> житловою площею близько [[house_size]] м² та площею ділянки близько [[land_area]] м².</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Термін оренди</h2>
                                <p>Термін оренди починається <strong>[[rental_start_date]]</strong>. Договір укладається [[rental_end_date]] (опціонально: "на невизначений термін" або "до [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Орендна плата</h2>
                                <p>Щомісячна основна орендна плата становить <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>Щомісячні комунальні послуги (Nebenkosten) становлять <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Загальна орендна плата становить щомісячно <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Застава</h2>
                                <p>Застава становить <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Розірвання</h2>
                                <p>Термін розірвання становить [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Додаткові домовленості</h2>
                                <p>[[other_agreements]]</p>
                                <p>Правила будинку є частиною цього договору: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Прикінцеві положення</h2>
                                <p>Застосовується німецьке право.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu domu',
                        'description' => 'Standardowa umowa najmu domu jednorodzinnego w Niemczech, zgodna z BGB i prawem najmu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU DOMU</h1><p style="font-size: 14px;">Dom przy <strong>[[house_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Najemca: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Przedmiot najmu</h2>
                                <p>Wynajmujący wynajmuje Najemcy dom przy <strong>[[house_address]]</strong> o powierzchni mieszkalnej ok. [[house_size]] m² i powierzchni działki ok. [[land_area]] m².</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Okres najmu</h2>
                                <p>Stosunek najmu rozpoczyna się w dniu <strong>[[rental_start_date]]</strong>. Zostaje zawarty [[rental_end_date]] (opcjonalnie: "na czas nieokreślony" lub "do [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Czynsz</h2>
                                <p>Miesięczny czynsz podstawowy wynosi <strong>[[basic_rent]] [[currency]]</strong>.</p>
                                <p>Miesięczne koszty eksploatacji (Nebenkosten) wynoszą <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Całkowity czynsz wynosi zatem miesięcznie <strong>[[total_rent]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaucja</h2>
                                <p>Kaucja wynosi <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Wypowiedzenie</h2>
                                <p>Okres wypowiedzenia wynosi [[notice_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Dalsze uzgodnienia</h2>
                                <p>[[other_agreements]]</p>
                                <p>Regulamin domu jest częścią niniejszej umowy: [[house_rules_attachment]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 7 Postanowienia końcowe</h2>
                                <p>Obowiązuje prawo niemieckie.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Договор аренды коммерческого помещения (офис) / Commercial Property (Office) Rental Agreement (Gewerbemietvertrag Büro) ---
            [
                'slug' => 'commercial-office-rental-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa wynajmującego","en":"Landlord\'s Name/Company Name","uk":"ПІБ/назва орендодавця","de":"Name/Firmenname des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa najemcy","en":"Tenant\'s Name/Company Name","uk":"ПІБ/назва орендаря","de":"Name/Firmenname des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, piętro, miasto)","en":"Property Address (street, number, floor, city)","uk":"Адреса нерухомості (вулиця, номер, поверх, місто)","de":"Adresse der Immobilie (Straße, Nummer, Etage, Stadt)"}},
                    {"name":"property_type","type":"text","required":true,"labels":{"pl":"Typ lokalu (np. biuro, gabinet)","en":"Type of Premises (e.g., office, practice)","uk":"Тип приміщення (напр., офіс, кабінет)","de":"Art der Räumlichkeiten (z.B. Büro, Praxis)"}},
                    {"name":"property_size","type":"number","required":true,"labels":{"pl":"Powierzchnia lokalu (m²)","en":"Premises Size (m²)","uk":"Площа приміщення (м²)","de":"Größe der Räumlichkeiten (m²)"}},
                    {"name":"basic_rent","type":"number","required":true,"labels":{"pl":"Czynsz podstawowy (netto)","en":"Basic Rent (net)","uk":"Основна орендна плата (нетто)","de":"Grundmiete (netto)"}},
                    {"name":"utility_costs","type":"number","required":true,"labels":{"pl":"Koszty eksploatacji (Nebenkosten)","en":"Utility Costs (Nebenkosten)","uk":"Комунальні послуги (Nebenkosten)","de":"Nebenkosten"}},
                    {"name":"vat_rate","type":"text","required":true,"labels":{"pl":"Stawka VAT (jeśli dotyczy)","en":"VAT Rate (if applicable)","uk":"Ставка ПДВ (якщо застосовно)","de":"Mehrwertsteuersatz (falls zutreffend)"}},
                    {"name":"total_rent_gross","type":"number","required":true,"labels":{"pl":"Czynsz całkowity (brutto)","en":"Total Rent (gross)","uk":"Загальна орендна плата (брутто)","de":"Gesamtmiete (brutto)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji/zabezpieczenia","en":"Deposit/Security Amount","uk":"Розмір застави/забезпечення","de":"Kautions-/Sicherheitsleistung"}},
                    {"name":"rental_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Rental Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"rental_end_date","type":"date","required":false,"labels":{"pl":"Data zakończenia najmu (jeśli umowa na czas określony)","en":"Rental End Date (if fixed-term contract)","uk":"Дата закінчення оренди (якщо договір на визначений термін)","de":"Mietende (falls befristeter Vertrag)"}},
                    {"name":"rental_purpose","type":"textarea","required":true,"labels":{"pl":"Cel najmu (np. prowadzenie biura, gabinetu)","en":"Purpose of Rental (e.g., office, practice)","uk":"Мета оренди (напр., ведення офісу, кабінету)","de":"Mietzweck (z.B. Büro, Praxis)"}},
                    {"name":"other_agreements","type":"textarea","required":false,"labels":{"pl":"Inne uzgodnienia (np. remonty, wyposażenie)","en":"Other agreements (e.g., renovations, equipment)","uk":"Інші домовленості (напр., ремонти, обладнання)","de":"Weitere Vereinbarungen (z.B. Renovierungen, Ausstattung)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Gewerbemietvertrag (Büro/Praxis)',
                        'description' => 'Standard-Mietvertrag für gewerbliche Räumlichkeiten in Deutschland, z.B. Büros oder Praxen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GEWERBEMIETVERTRAG</h1><p style="font-size: 14px;">für <strong>[[property_type]]</strong> in <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mieter: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Mietobjekt und Mietzweck</h2>
                                <p>Der Vermieter vermietet an den Mieter die Gewerberäume in <strong>[[property_address]]</strong>, [[property_type]], mit einer Fläche von ca. [[property_size]] m².</p>
                                <p>Mietzweck: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Mietzeit</h2>
                                <p>Das Mietverhältnis beginnt am <strong>[[rental_start_date]]</strong>. Es wird [[rental_end_date]] (optional: "auf unbestimmte Zeit" oder "bis zum [[rental_end_date]]") geschlossen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Miete und Nebenkosten</h2>
                                <p>Die monatliche Grundmiete beträgt <strong>[[basic_rent]] [[currency]]</strong> (netto).</p>
                                <p>Die monatlichen Nebenkosten betragen <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Die Gesamtmiete (brutto) beträgt <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>Mehrwertsteuersatz: [[vat_rate]] (falls zutreffend).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaution/Sicherheitsleistung</h2>
                                <p>Die Kaution/Sicherheitsleistung beträgt <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Weitere Vereinbarungen</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Schlussbestimmungen</h2>
                                <p>Es gilt deutsches Recht. Änderungen und Ergänzungen bedürfen der Schriftform.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Commercial Property (Office) Rental Agreement',
                        'description' => 'Standard rental agreement for commercial premises in Germany, e.g., offices or practices.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">COMMERCIAL RENTAL AGREEMENT</h1><p style="font-size: 14px;">for <strong>[[property_type]]</strong> at <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Tenant: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Rental Property and Purpose</h2>
                                <p>The landlord leases to the tenant the commercial premises at <strong>[[property_address]]</strong>, [[property_type]], with an area of approx. [[property_size]] m².</p>
                                <p>Purpose of rental: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Rental Period</h2>
                                <p>The tenancy begins on <strong>[[rental_start_date]]</strong>. It is concluded [[rental_end_date]] (optional: "for an indefinite period" or "until [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Rent and Utility Costs</h2>
                                <p>The monthly basic rent is <strong>[[basic_rent]] [[currency]]</strong> (net).</p>
                                <p>The monthly utility costs are <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>The total rent (gross) is <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>VAT rate: [[vat_rate]] (if applicable).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Deposit/Security</h2>
                                <p>The deposit/security is <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Further Agreements</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Final Provisions</h2>
                                <p>German law applies. Amendments and supplements must be made in writing.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди комерційного приміщення (офіс)',
                        'description' => 'Стандартний договір оренди комерційних приміщень у Німеччині, напр., офісів або кабінетів.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ КОМЕРЦІЙНОГО ПРИМІЩЕННЯ</h1><p style="font-size: 14px;">для <strong>[[property_type]]</strong> за адресою <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Орендар: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Об\'єкт оренди та мета оренди</h2>
                                <p>Орендодавець здає в оренду Орендарю комерційні приміщення за адресою <strong>[[property_address]]</strong>, [[property_type]], площею близько [[property_size]] м².</p>
                                <p>Мета оренди: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Термін оренди</h2>
                                <p>Термін оренди починається <strong>[[rental_start_date]]</strong>. Договір укладається [[rental_end_date]] (опціонально: "на невизначений термін" або "до [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Орендна плата та комунальні послуги</h2>
                                <p>Щомісячна основна орендна плата становить <strong>[[basic_rent]] [[currency]]</strong> (нетто).</p>
                                <p>Щомісячні комунальні послуги становлять <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Загальна орендна плата (брутто) становить <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>Ставка ПДВ: [[vat_rate]] (якщо застосовно).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Застава/Забезпечення</h2>
                                <p>Застава/Забезпечення становить <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Додаткові домовленості</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Прикінцеві положення</h2>
                                <p>Застосовується німецьке право. Зміни та доповнення повинні бути зроблені в письмовій формі.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu lokalu użytkowego (biuro/gabinet)',
                        'description' => 'Standardowa umowa najmu lokalu użytkowego w Niemczech, np. biur lub gabinetów.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU LOKALU UŻYTKOWEGO</h1><p style="font-size: 14px;">dla <strong>[[property_type]]</strong> przy <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Najemca: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Przedmiot najmu i cel najmu</h2>
                                <p>Wynajmujący wynajmuje Najemcy lokal użytkowy przy <strong>[[property_address]]</strong>, [[property_type]], o powierzchni ok. [[property_size]] m².</p>
                                <p>Cel najmu: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Okres najmu</h2>
                                <p>Stosunek najmu rozpoczyna się w dniu <strong>[[rental_start_date]]</strong>. Zostaje zawarty [[rental_end_date]] (opcjonalnie: "na czas nieokreślony" lub "do [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Czynsz i koszty eksploatacji</h2>
                                <p>Miesięczny czynsz podstawowy wynosi <strong>[[basic_rent]] [[currency]]</strong> (netto).</p>
                                <p>Miesięczne koszty eksploatacji wynoszą <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Całkowity czynsz (brutto) wynosi <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>Stawka VAT: [[vat_rate]] (jeśli dotyczy).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaucja/Zabezpieczenie</h2>
                                <p>Kaucja/Zabezpieczenie wynosi <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Dalsze uzgodnienia</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Postanowienia końcowe</h2>
                                <p>Obowiązuje prawo niemieckie. Zmiany i uzupełnienia wymagają formy pisemnej.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Договор аренды склада / Warehouse Rental Agreement (Mietvertrag Lager) ---
            [
                'slug' => 'warehouse-rental-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa wynajmującego","en":"Landlord\'s Name/Company Name","uk":"ПІБ/назва орендодавця","de":"Name/Firmenname des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa najemcy","en":"Tenant\'s Name/Company Name","uk":"ПІБ/назва орендаря","de":"Name/Firmenname des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"warehouse_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, miasto)","en":"Property Address (street, number, city)","uk":"Адреса нерухомості (вулиця, номер, місто)","de":"Adresse der Immobilie (Straße, Nummer, Stadt)"}},
                    {"name":"warehouse_size","type":"number","required":true,"labels":{"pl":"Powierzchnia magazynu (m²)","en":"Warehouse Size (m²)","uk":"Площа складу (м²)","de":"Lagergröße (m²)"}},
                    {"name":"basic_rent","type":"number","required":true,"labels":{"pl":"Czynsz podstawowy (netto)","en":"Basic Rent (net)","uk":"Основна орендна плата (нетто)","de":"Grundmiete (netto)"}},
                    {"name":"utility_costs","type":"number","required":true,"labels":{"pl":"Koszty eksploatacji (Nebenkosten)","en":"Utility Costs (Nebenkosten)","uk":"Комунальні послуги (Nebenkosten)","de":"Nebenkosten"}},
                    {"name":"vat_rate","type":"text","required":true,"labels":{"pl":"Stawka VAT (jeśli dotyczy)","en":"VAT Rate (if applicable)","uk":"Ставка ПДВ (якщо застосовно)","de":"Mehrwertsteuersatz (falls zutreffend)"}},
                    {"name":"total_rent_gross","type":"number","required":true,"labels":{"pl":"Czynsz całkowity (brutto)","en":"Total Rent (gross)","uk":"Загальна орендна плата (брутто)","de":"Gesamtmiete (brutto)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji/zabezpieczenia","en":"Deposit/Security Amount","uk":"Розмір застави/забезпечення","de":"Kautions-/Sicherheitsleistung"}},
                    {"name":"rental_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Rental Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"rental_end_date","type":"date","required":false,"labels":{"pl":"Data zakończenia najmu (jeśli umowa na czas określony)","en":"Rental End Date (if fixed-term contract)","uk":"Дата закінчення оренди (якщо договір на визначений термін)","de":"Mietende (falls befristeter Vertrag)"}},
                    {"name":"rental_purpose","type":"textarea","required":true,"labels":{"pl":"Cel najmu (np. przechowywanie towarów)","en":"Purpose of Rental (e.g., goods storage)","uk":"Мета оренди (напр., зберігання товарів)","de":"Mietzweck (z.B. Lagerung von Waren)"}},
                    {"name":"other_agreements","type":"textarea","required":false,"labels":{"pl":"Inne uzgodnienia","en":"Other agreements","uk":"Інші домовлеności","de":"Weitere Vereinbarungen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mietvertrag für ein Lager',
                        'description' => 'Standard-Mietvertrag für Lagerräumlichkeiten in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETVERTRAG LAGER</h1><p style="font-size: 14px;">Lager in <strong>[[warehouse_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mieter: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Mietobjekt und Mietzweck</h2>
                                <p>Der Vermieter vermietet an den Mieter die Lagerräume in <strong>[[warehouse_address]]</strong> mit einer Fläche von ca. [[warehouse_size]] m².</p>
                                <p>Mietzweck: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Mietzeit</h2>
                                <p>Das Mietverhältnis beginnt am <strong>[[rental_start_date]]</strong>. Es wird [[rental_end_date]] (optional: "auf unbestimmte Zeit" oder "bis zum [[rental_end_date]]") geschlossen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Miete und Nebenkosten</h2>
                                <p>Die monatliche Grundmiete beträgt <strong>[[basic_rent]] [[currency]]</strong> (netto).</p>
                                <p>Die monatlichen Nebenkosten betragen <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Die Gesamtmiete (brutto) beträgt <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>Mehrwertsteuersatz: [[vat_rate]] (falls zutreffend).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaution/Sicherheitsleistung</h2>
                                <p>Die Kaution/Sicherheitsleistung beträgt <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Weitere Vereinbarungen</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Schlussbestimmungen</h2>
                                <p>Es gilt deutsches Recht. Änderungen und Ergänzungen bedürfen der Schriftform.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Warehouse Rental Agreement',
                        'description' => 'Standard rental agreement for warehouse premises in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WAREHOUSE RENTAL AGREEMENT</h1><p style="font-size: 14px;">Warehouse at <strong>[[warehouse_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Tenant: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Rental Property and Purpose</h2>
                                <p>The landlord leases to the tenant the warehouse premises at <strong>[[warehouse_address]]</strong> with an area of approx. [[warehouse_size]] m².</p>
                                <p>Purpose of rental: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Rental Period</h2>
                                <p>The tenancy begins on <strong>[[rental_start_date]]</strong>. It is concluded [[rental_end_date]] (optional: "for an indefinite period" or "until [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Rent and Utility Costs</h2>
                                <p>The monthly basic rent is <strong>[[basic_rent]] [[currency]]</strong> (net).</p>
                                <p>The monthly utility costs are <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>The total rent (gross) is <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>VAT rate: [[vat_rate]] (if applicable).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Deposit/Security</h2>
                                <p>The deposit/security is <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Further Agreements</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Final Provisions</h2>
                                <p>German law applies. Amendments and supplements must be made in writing.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди складу',
                        'description' => 'Стандартний договір оренди складських приміщень у Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ СКЛАДУ</h1><p style="font-size: 14px;">Склад за адресою <strong>[[warehouse_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Орендар: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Об\'єкт оренди та мета оренди</h2>
                                <p>Орендодавець здає в оренду Орендарю складські приміщення за адресою <strong>[[warehouse_address]]</strong> площею близько [[warehouse_size]] м².</p>
                                <p>Мета оренди: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Термін оренди</h2>
                                <p>Термін оренди починається <strong>[[rental_start_date]]</strong>. Договір укладається [[rental_end_date]] (опціонально: "на невизначений термін" або "до [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Орендна плата та комунальні послуги</h2>
                                <p>Щомісячна основна орендна плата становить <strong>[[basic_rent]] [[currency]]</strong> (нетто).</p>
                                <p>Щомісячні комунальні послуги становлять <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Загальна орендна плата (брутто) становить <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>Ставка ПДВ: [[vat_rate]] (якщо застосовно).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Застава/Забезпечення</h2>
                                <p>Застава/Забезпечення становить <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Додаткові домовленості</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Прикінцеві положення</h2>
                                <p>Застосовується німецьке право. Зміни та доповнення повинні бути зроблені в письмовій формі.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu magazynu',
                        'description' => 'Standardowa umowa najmu pomieszczeń magazynowych w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU MAGAZYNU</h1><p style="font-size: 14px;">Magazyn przy <strong>[[warehouse_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Najemca: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Przedmiot najmu i cel najmu</h2>
                                <p>Wynajmujący wynajmuje Najemcy pomieszczenia magazynowe przy <strong>[[warehouse_address]]</strong> o powierzchni ok. [[warehouse_size]] m².</p>
                                <p>Cel najmu: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Okres najmu</h2>
                                <p>Stosunek najmu rozpoczyna się w dniu <strong>[[rental_start_date]]</strong>. Zostaje zawarty [[rental_end_date]] (opcjonalnie: "na czas nieokreślony" lub "do [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Czynsz i koszty eksploatacji</h2>
                                <p>Miesięczny czynsz podstawowy wynosi <strong>[[basic_rent]] [[currency]]</strong> (netto).</p>
                                <p>Miesięczne koszty eksploatacji wynoszą <strong>[[utility_costs]] [[currency]]</strong>.</p>
                                <p>Całkowity czynsz (brutto) wynosi <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>Stawka VAT: [[vat_rate]] (jeśli dotyczy).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaucja/Zabezpieczenie</h2>
                                <p>Kaucja/Zabezpieczenie wynosi <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Dalsze uzgodnienia</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Postanowienia końcowe</h2>
                                <p>Obowiązuje prawo niemieckie. Zmiany i uzupełnienia wymagają formy pisemnej.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Договор аренды гаража / Garage Rental Agreement (Mietvertrag Garage) ---
            [
                'slug' => 'garage-rental-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa wynajmującego","en":"Landlord\'s Name/Company Name","uk":"ПІБ/назва орендодавця","de":"Name/Firmenname des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa najemcy","en":"Tenant\'s Name/Company Name","uk":"ПІБ/назва орендаря","de":"Name/Firmenname des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"garage_address","type":"text","required":true,"labels":{"pl":"Adres garażu (ulica, numer, miasto)","en":"Garage Address (street, number, city)","uk":"Адреса гаража (вулиця, номер, місто)","de":"Adresse der Garage (Straße, Nummer, Stadt)"}},
                    {"name":"garage_number","type":"text","required":false,"labels":{"pl":"Numer garażu (opcjonalnie)","en":"Garage Number (optional)","uk":"Номер гаража (необов\'язково)","de":"Garagenummer (optional)"}},
                    {"name":"basic_rent","type":"number","required":true,"labels":{"pl":"Czynsz podstawowy (netto)","en":"Basic Rent (net)","uk":"Основна орендна плата (нетто)","de":"Grundmiete (netto)"}},
                    {"name":"vat_rate","type":"text","required":true,"labels":{"pl":"Stawka VAT (jeśli dotyczy)","en":"VAT Rate (if applicable)","uk":"Ставка ПДВ (якщо застосовно)","de":"Mehrwertsteuersatz (falls zutreffend)"}},
                    {"name":"total_rent_gross","type":"number","required":true,"labels":{"pl":"Czynsz całkowity (brutto)","en":"Total Rent (gross)","uk":"Загальна орендна плата (брутто)","de":"Gesamtmiete (brutto)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Wysokość kaucji/zabezpieczenia","en":"Deposit/Security Amount","uk":"Розмір застави/забезпечення","de":"Kautions-/Sicherheitsleistung"}},
                    {"name":"rental_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Rental Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"rental_end_date","type":"date","required":false,"labels":{"pl":"Data zakończenia najmu (jeśli umowa na czas określony)","en":"Rental End Date (if fixed-term contract)","uk":"Дата закінчення оренди (якщо договір на визначений термін)","de":"Mietende (falls befristeter Vertrag)"}},
                    {"name":"rental_purpose","type":"textarea","required":true,"labels":{"pl":"Cel najmu (np. parkowanie samochodu, przechowywanie)","en":"Purpose of Rental (e.g., car parking, storage)","uk":"Мета оренди (напр., паркування автомобіля, зберігання)","de":"Mietzweck (z.B. Parken von Autos, Lagerung)"}},
                    {"name":"other_agreements","type":"textarea","required":false,"labels":{"pl":"Inne uzgodnienia","en":"Other agreements","uk":"Інші домовленості","de":"Weitere Vereinbarungen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mietvertrag für eine Garage',
                        'description' => 'Standard-Mietvertrag für eine Garage oder Stellplatz in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETVERTRAG GARAGE</h1><p style="font-size: 14px;">Garage Nr. [[garage_number]] in <strong>[[garage_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mieter: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Mietobjekt und Mietzweck</h2>
                                <p>Der Vermieter vermietet an den Mieter die Garage Nr. [[garage_number]] in <strong>[[garage_address]]</strong>.</p>
                                <p>Mietzweck: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Mietzeit</h2>
                                <p>Das Mietverhältnis beginnt am <strong>[[rental_start_date]]</strong>. Es wird [[rental_end_date]] (optional: "auf unbestimmte Zeit" oder "bis zum [[rental_end_date]]") geschlossen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Miete</h2>
                                <p>Die monatliche Grundmiete beträgt <strong>[[basic_rent]] [[currency]]</strong> (netto).</p>
                                <p>Die Gesamtmiete (brutto) beträgt <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>Mehrwertsteuersatz: [[vat_rate]] (falls zutreffend).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaution/Sicherheitsleistung</h2>
                                <p>Die Kaution/Sicherheitsleistung beträgt <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Weitere Vereinbarungen</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Schlussbestimmungen</h2>
                                <p>Es gilt deutsches Recht. Änderungen und Ergänzungen bedürfen der Schriftform.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Garage Rental Agreement',
                        'description' => 'Standard rental agreement for a garage or parking space in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GARAGE RENTAL AGREEMENT</h1><p style="font-size: 14px;">Garage No. [[garage_number]] at <strong>[[garage_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Tenant: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Rental Property and Purpose</h2>
                                <p>The landlord leases to the tenant garage No. [[garage_number]] at <strong>[[garage_address]]</strong>.</p>
                                <p>Purpose of rental: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Rental Period</h2>
                                <p>The tenancy begins on <strong>[[rental_start_date]]</strong>. It is concluded [[rental_end_date]] (optional: "for an indefinite period" or "until [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Rent</h2>
                                <p>The monthly basic rent is <strong>[[basic_rent]] [[currency]]</strong> (net).</p>
                                <p>The total rent (gross) is <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>VAT rate: [[vat_rate]] (if applicable).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Deposit/Security</h2>
                                <p>The deposit/security is <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Further Agreements</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Final Provisions</h2>
                                <p>German law applies. Amendments and supplements must be made in writing.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди гаража',
                        'description' => 'Стандартний договір оренди гаража або паркувального місця в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ ГАРАЖА</h1><p style="font-size: 14px;">Гараж № [[garage_number]] за адресою <strong>[[garage_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Орендар: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Об\'єкт оренди та мета оренди</h2>
                                <p>Орендодавець здає в оренду Орендарю гараж № [[garage_number]] за адресою <strong>[[garage_address]]</strong>.</p>
                                <p>Мета оренди: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Термін оренди</h2>
                                <p>Термін оренди починається <strong>[[rental_start_date]]</strong>. Договір укладається [[rental_end_date]] (опціонально: "на невизначений термін" або "до [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Орендна плата</h2>
                                <p>Щомісячна основна орендна плата становить <strong>[[basic_rent]] [[currency]]</strong> (нетто).</p>
                                <p>Загальна орендна плата (брутто) становить <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>Ставка ПДВ: [[vat_rate]] (якщо застосовно).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Застава/Забезпечення</h2>
                                <p>Застава/Забезпечення становить <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Додаткові домовленості</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Прикінцеві положення</h2>
                                <p>Застосовується німецьке право. Зміни та доповнення повинні бути зроблені в письмовій формі.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu garażu',
                        'description' => 'Standardowa umowa najmu garażu lub miejsca parkingowego w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU GARAŻU</h1><p style="font-size: 14px;">Garaż nr [[garage_number]] przy <strong>[[garage_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Najemca: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Przedmiot najmu i cel najmu</h2>
                                <p>Wynajmujący wynajmuje Najemcy garaż nr [[garage_number]] przy <strong>[[garage_address]]</strong>.</p>
                                <p>Cel najmu: [[rental_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Okres najmu</h2>
                                <p>Stosunek najmu rozpoczyna się w dniu <strong>[[rental_start_date]]</strong>. Zostaje zawarty [[rental_end_date]] (opcjonalnie: "na czas nieokreślony" lub "do [[rental_end_date]]").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Czynsz</h2>
                                <p>Miesięczny czynsz podstawowy wynosi <strong>[[basic_rent]] [[currency]]</strong> (netto).</p>
                                <p>Całkowity czynsz (brutto) wynosi <strong>[[total_rent_gross]] [[currency]]</strong>.</p>
                                <p>Stawka VAT: [[vat_rate]] (jeśli dotyczy).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Kaucja/Zabezpieczenie</h2>
                                <p>Kaucja/Zabezpieczenie wynosi <strong>[[deposit_amount]] [[currency]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Dalsze uzgodnienia</h2>
                                <p>[[other_agreements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Postanowienia końcowe</h2>
                                <p>Obowiązuje prawo niemieckie. Zmiany i uzupełnienia wymagają formy pisemnej.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Акт приема-передачи квартиры при аренде / Apartment Handover Protocol for Rental (Wohnungsübergabeprotokoll bei Mietbeginn) ---
            [
                'slug' => 'apartment-handover-protocol-rental-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"protocol_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia protokołu","en":"Protocol Date","uk":"Дата складання протоколу","de":"Datum der Protokollerstellung"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko najemcy","en":"Tenant\'s Full Name","uk":"ПІБ орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (ulica, numer, piętro, miasto)","en":"Property Address (street, number, floor, city)","uk":"Адреса нерухомості (вулиця, номер, поверх, місто)","de":"Adresse der Immobilie (Straße, Nummer, Etage, Stadt)"}},
                    {"name":"meter_readings","type":"textarea","required":true,"labels":{"pl":"Stany liczników (prąd, woda, gaz, ogrzewanie)","en":"Meter readings (electricity, water, gas, heating)","uk":"Показники лічильників (електрика, вода, газ, опалення)","de":"Zählerstände (Strom, Wasser, Gas, Heizung)"}},
                    {"name":"keys_transferred","type":"text","required":true,"labels":{"pl":"Liczba i rodzaj przekazanych kluczy","en":"Number and type of keys transferred","uk":"Кількість та тип переданих ключів","de":"Anzahl und Art der übergebenen Schlüssel"}},
                    {"name":"apartment_condition_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis stanu mieszkania (pomieszczenia, ściany, podłogi, okna, drzwi, wyposażenie)","en":"Detailed description of apartment condition (rooms, walls, floors, windows, doors, equipment)","uk":"Детальний опис стану квартири (кімнати, стіни, підлога, вікна, двері, обладнання)","de":"Detaillierte Beschreibung des Wohnungszustands (Räume, Wände, Böden, Fenster, Türen, Ausstattung)"}},
                    {"name":"defects_damages","type":"textarea","required":false,"labels":{"pl":"Istniejące wady i uszkodzenia (opcjonalnie)","en":"Existing defects and damages (optional)","uk":"Існуючі дефекти та пошкодження (необов\'язково)","de":"Bestehende Mängel und Schäden (optional)"}},
                    {"name":"other_notes","type":"textarea","required":false,"labels":{"pl":"Inne uwagi","en":"Other notes","uk":"Інші примітки","de":"Weitere Anmerkungen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Wohnungsübergabeprotokoll (bei Mietbeginn)',
                        'description' => 'Detailliertes Protokoll zur Dokumentation des Zustands einer Wohnung bei Mietbeginn, wichtig für spätere Abrechnungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHNUNGSÜBERGABEPROTOKOLL</h1><p style="font-size: 14px;">bei Mietbeginn</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[protocol_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mieter: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Mietobjekt</h2>
                                <p>Übergabe der Wohnung in <strong>[[apartment_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Zählerstände bei Übergabe</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Übergebene Schlüssel</h2>
                                <p>Anzahl und Art der übergebenen Schlüssel: [[keys_transferred]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Zustand der Wohnung</h2>
                                <p>Detaillierte Beschreibung des Zustands (Räume, Wände, Böden, Fenster, Türen, Ausstattung):</p>
                                <p>[[apartment_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Bestehende Mängel und Schäden</h2>
                                <p>[[defects_damages]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Weitere Anmerkungen</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Die Parteien bestätigen mit ihrer Unterschrift die Richtigkeit der Angaben in diesem Protokoll.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Apartment Handover Protocol (at Rental Start)',
                        'description' => 'Detailed protocol to document the condition of an apartment at the start of a tenancy, important for later settlements.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT HANDOVER PROTOCOL</h1><p style="font-size: 14px;">at tenancy start</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[protocol_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Tenant: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Rental Property</h2>
                                <p>Handover of the apartment at <strong>[[apartment_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Meter Readings at Handover</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Keys Transferred</h2>
                                <p>Number and type of keys transferred: [[keys_transferred]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Condition of the Apartment</h2>
                                <p>Detailed description of the condition (rooms, walls, floors, windows, doors, equipment):</p>
                                <p>[[apartment_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Existing Defects and Damages</h2>
                                <p>[[defects_damages]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Other Notes</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>The parties confirm the accuracy of the information in this protocol with their signatures.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Акт прийому-передачі квартири при оренді',
                        'description' => 'Детальний протокол для документування стану квартири на початку оренди, важливий для подальших розрахунків.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ ПРИЙОМУ-ПЕРЕДАЧІ КВАРТИРИ</h1><p style="font-size: 14px;">при початку оренди</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Орендар: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Об\'єкт оренди</h2>
                                <p>Передача квартири за адресою <strong>[[apartment_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Показники лічильників при передачі</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Передані ключі</h2>
                                <p>Кількість та тип переданих ключів: [[keys_transferred]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Стан квартири</h2>
                                <p>Детальний опис стану (кімнати, стіни, підлога, вікна, двері, обладнання):</p>
                                <p>[[apartment_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Існуючі дефекти та пошкодження</h2>
                                <p>[[defects_damages]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Інші примітки</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Сторони підтверджують своїми підписами правильність даних у цьому протоколі.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Protokół zdawczo-odbiorczy mieszkania (przy rozpoczęciu najmu)',
                        'description' => 'Szczegółowy protokół dokumentujący stan mieszkania na początku najmu, ważny dla późniejszych rozliczeń.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ZDAWCZO-ODBIORCZY MIESZKANIA</h1><p style="font-size: 14px;">przy rozpoczęciu najmu</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Najemca: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Przedmiot najmu</h2>
                                <p>Przekazanie mieszkania przy <strong>[[apartment_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Stany liczników przy przekazaniu</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Przekazane klucze</h2>
                                <p>Liczba i rodzaj przekazanych kluczy: [[keys_transferred]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4 Stan mieszkania</h2>
                                <p>Szczegółowy opis stanu (pomieszczenia, ściany, podłogi, okna, drzwi, wyposażenie):</p>
                                <p>[[apartment_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5 Istniejące wady i uszkodzenia</h2>
                                <p>[[defects_damages]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 6 Inne uwagi</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Podpisy stron potwierdzają zgodność stanu faktycznego z niniejszym protokołem.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Опись имущества при сдаче в аренду / Inventory List for Rental (Übergabeprotokoll Inventar) ---
            [
                'slug' => 'inventory-list-rental-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"list_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia listy","en":"List Date","uk":"Дата складання списку","de":"Datum der Liste"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko najemcy","en":"Tenant\'s Full Name","uk":"ПІБ орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"inventory_items","type":"textarea","required":true,"labels":{"pl":"Lista inwentarza (pomieszczenie, przedmiot, stan, uwagi)","en":"Inventory list (room, item, condition, notes)","uk":"Список інвентарю (приміщення, предмет, стан, примітки)","de":"Inventarliste (Raum, Gegenstand, Zustand, Anmerkungen)"}},
                    {"name":"other_notes","type":"textarea","required":false,"labels":{"pl":"Inne uwagi","en":"Other notes","uk":"Інші примітки","de":"Weitere Anmerkungen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Inventarliste / Übergabeprotokoll Inventar',
                        'description' => 'Detaillierte lista des vorhandenen Inventars in einer Mietimmobilie bei Übergabe.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">INVENTARLISTE</h1><p style="font-size: 14px;">für die Immobilie in <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_full_name]]</strong></p><p>Mieter: <strong>[[tenant_full_name]]</strong></p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[list_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Inventar</h2>
                                <pre>
Raum | Gegenstand | Zustand | Anmerkungen
------------------------------------------------------------------
[[inventory_items]]
                                </pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Weitere Anmerkungen</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Die Parteien bestätigen mit ihrer Unterschrift die Richtigkeit und Vollständigkeit dieser Inventarliste.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Inventory List for Rental',
                        'description' => 'Detailed list of existing inventory in a rental property upon handover.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">INVENTORY LIST</h1><p style="font-size: 14px;">for the property at <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_full_name]]</strong></p><p>Tenant: <strong>[[tenant_full_name]]</strong></p></td><td style="text-align: right;"><p>City: [[city]], Date: [[list_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Inventory</h2>
                                <pre>
Room | Item | Condition | Notes
------------------------------------------------------------------
[[inventory_items]]
                                </pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Other Notes</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>The parties confirm the accuracy and completeness of this inventory list with their signatures.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Опис майна при здачі в оренду',
                        'description' => 'Детальний список наявного інвентарю в орендованій нерухомості при передачі.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ОПИС МАЙНА</h1><p style="font-size: 14px;">для нерухомості за адресою <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_full_name]]</strong></p><p>Орендар: <strong>[[tenant_full_name]]</strong></p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Інвентар</h2>
                                <pre>
Приміщення | Предмет | Стан | Примітки
------------------------------------------------------------------
[[inventory_items]]
                                </pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Інші примітки</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Сторони підтверджують своїми підписами правильність та повноту цього списку інвентарю.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Lista inwentarza (przy wynajmie)',
                        'description' => 'Szczegółowa lista istniejącego inwentarza w nieruchomości wynajmowanej przy przekazaniu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LISTA INWENTARZA</h1><p style="font-size: 14px;">dla nieruchomości przy <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_full_name]]</strong></p><p>Najemca: <strong>[[tenant_full_name]]</strong></p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Inwentarz</h2>
                                <pre>
Pomieszczenie | Przedmiot | Stan | Uwagi
------------------------------------------------------------------
[[inventory_items]]
                                </pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Inne uwagi</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Podpisy stron potwierdzają zgodność i kompletność niniejszej listy inwentarza.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Расписка в получении залога за аренду / Receipt for Rental Deposit (Quittung Mietkaution) ---
            [
                'slug' => 'receipt-rental-deposit-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"receipt_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pokwitowania","en":"Receipt Date","uk":"Дата видачі розписки","de":"Datum der Quittung"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wynajmującego (odbierającego)","en":"Landlord\'s Full Name (recipient)","uk":"ПІБ орендодавця (отримувача)","de":"Vollständiger Name des Vermieters (Empfänger)"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko najemcy (wpłacającego)","en":"Tenant\'s Full Name (payer)","uk":"ПІБ орендаря (платника)","de":"Vollständiger Name des Mieters (Zahler)"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Otrzymana kwota kaucji","en":"Amount of Deposit Received","uk":"Отримана сума застави","de":"Erhaltener Kautionsbetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"rental_agreement_date","type":"date","required":true,"labels":{"pl":"Data umowy najmu","en":"Rental Agreement Date","uk":"Дата договору оренди","de":"Datum des Mietvertrags"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Quittung über den Erhalt der Mietkaution',
                        'description' => 'Dokument, das den Erhalt der Mietkaution durch den Vermieter bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">QUITTUNG ÜBER DIE MIETKAUTION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[receipt_date]]</p></td><td style="text-align: right;"><p>Vermieter (Empfänger): <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mieter (Zahler): <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Hiermit bestätigt der Vermieter, [[landlord_full_name]], den Erhalt der Mietkaution in Höhe von <strong>[[deposit_amount]] [[currency]]</strong> von dem Mieter, [[tenant_full_name]].</p>
                                <p>Die Kaution bezieht sich auf das Mietobjekt in <strong>[[apartment_address]]</strong>, gemäß Mietvertrag vom <strong>[[rental_agreement_date]]</strong>.</p>
                                <p>Der Erhalt der Kaution wird hiermit quittiert.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift Vermieter)</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Receipt for Rental Deposit',
                        'description' => 'Document confirming the receipt of the rental deposit by the landlord.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECEIPT FOR RENTAL DEPOSIT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[receipt_date]]</p></td><td style="text-align: right;"><p>Landlord (Recipient): <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Tenant (Payer): <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Hereby, the landlord, [[landlord_full_name]], confirms the receipt of the rental deposit in the amount of <strong>[[deposit_amount]] [[currency]]</strong> from the tenant, [[tenant_full_name]].</p>
                                <p>The deposit relates to the rental property at <strong>[[apartment_address]]</strong>, according to the rental agreement dated <strong>[[rental_agreement_date]]</strong>.</p>
                                <p>Receipt of the deposit is hereby acknowledged.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord\'s Signature</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Розписка про отримання застави за оренду',
                        'description' => 'Документ, що підтверджує отримання орендодавцем застави за оренду.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РОЗПИСКА ПРО ОТРИМАННЯ ЗАСТАВИ ЗА ОРЕНДУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Орендодавець (отримувач): <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Орендар (платник): <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Цим орендодавець, [[landlord_full_name]], підтверджує отримання застави за оренду в сумі <strong>[[deposit_amount]] [[currency]]</strong> від орендаря, [[tenant_full_name]].</p>
                                <p>Застава стосується об\'єкта оренди за адресою <strong>[[apartment_address]]</strong>, згідно з договором оренди від <strong>[[rental_agreement_date]]</strong>.</p>
                                <p>Отримання застави цим підтверджується.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Підпис орендодавця</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Pokwitowanie odbioru kaucji za najem',
                        'description' => 'Dokument potwierdzający otrzymanie kaucji za najem przez wynajmującego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POKWITOWANIE ODBIORU KAUCJI ZA NAJEM</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Wynajmujący (odbierający): <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Najemca (wpłacający): <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Niniejszym wynajmujący, [[landlord_full_name]], potwierdza otrzymanie kaucji w wysokości <strong>[[deposit_amount]] [[currency]]</strong> od najemcy, [[tenant_full_name]].</p>
                                <p>Kaucja dotyczy nieruchomości przy <strong>[[apartment_address]]</strong>, zgodnie z umową najmu z dnia <strong>[[rental_agreement_date]]</strong>.</p>
                                <p>Odbiór kaucji zostaje niniejszym potwierdzony.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Podpis wynajmującego</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Соглашение о расторжении договора аренды / Rental Agreement Termination Agreement (Mietaufhebungsvertrag) ---
            [
                'slug' => 'rental-agreement-termination-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"landlord_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wynajmującego","en":"Landlord\'s Full Name","uk":"ПІБ орендодавця","de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko najemcy","en":"Tenant\'s Full Name","uk":"ПІБ орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"original_rental_agreement_date","type":"date","required":true,"labels":{"pl":"Data pierwotnej umowy najmu","en":"Original Rental Agreement Date","uk":"Дата первинного договору оренди","de":"Datum des ursprünglichen Mietvertrags"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"pl":"Data rozwiązania umowy","en":"Termination Date","uk":"Дата розірвання договору","de":"Datum der Vertragsauflösung"}},
                    {"name":"reason_for_termination","type":"textarea","required":false,"labels":{"pl":"Uzasadnienie rozwiązania (opcjonalnie)","en":"Reason for termination (optional)","uk":"Обґрунтування розірвання (необов\'язково)","de":"Grund der Auflösung (optional)"}},
                    {"name":"agreed_conditions","type":"textarea","required":true,"labels":{"pl":"Uzgodnione warunki rozwiązania (np. rozliczenie kaucji, stan lokalu)","en":"Agreed termination conditions (e.g., deposit settlement, premises condition)","uk":"Узгоджені умови розірвання (напр., розрахунок застави, стан приміщення)","de":"Vereinbarte Auflösungsbedingungen (z.B. Kautionsabrechnung, Zustand der Räumlichkeiten)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mietaufhebungsvertrag',
                        'description' => 'Vereinbarung zwischen Vermieter und Mieter zur einvernehmlichen Beendigung eines Mietverhältnisses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETAUFHEBUNGSVERTRAG</h1><p style="font-size: 14px;">für die Immobilie in <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mieter: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Die Parteien dieses Vertrages, Vermieter und Mieter, vereinbaren hiermit einvernehmlich die Aufhebung des Mietvertrages vom <strong>[[original_rental_agreement_date]]</strong> über die Immobilie in <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Beendigung des Mietverhältnisses</h2>
                                <p>Das Mietverhältnis wird zum <strong>[[termination_date]]</strong> einvernehmlich beendet.</p>
                                <p>Grund der Auflösung (optional): [[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Vereinbarte Bedingungen</h2>
                                <p>Die Parteien einigen sich auf folgende Bedingungen für die Auflösung des Mietverhältnisses:</p>
                                <p>[[agreed_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Schlussbestimmungen</h2>
                                <p>Mit Unterzeichnung dieses Vertrages sind alle gegenseitigen Ansprüche aus dem Mietverhältnis, soweit nicht anders vereinbart, abgegolten. Es gilt deutsches Recht. Der Vertrag wurde in zwei Ausfertigungen erstellt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Rental Agreement Termination Agreement',
                        'description' => 'Agreement between landlord and tenant for the amicable termination of a tenancy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RENTAL AGREEMENT TERMINATION AGREEMENT</h1><p style="font-size: 14px;">for the property at <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Tenant: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>The parties to this agreement, landlord and tenant, hereby amicably agree to terminate the rental agreement dated <strong>[[original_rental_agreement_date]]</strong> for the property at <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Termination of Tenancy</h2>
                                <p>The tenancy will be terminated by mutual agreement on <strong>[[termination_date]]</strong>.</p>
                                <p>Reason for termination (optional): [[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Agreed Conditions</h2>
                                <p>The parties agree on the following conditions for the termination of the tenancy:</p>
                                <p>[[agreed_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Final Provisions</h2>
                                <p>Upon signing this agreement, all mutual claims arising from the tenancy, unless otherwise agreed, are settled. German law applies. The agreement has been drawn up in two copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Landlord</p></td>
                                <td width="50%"><p>___________________<br>Tenant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про розірвання договору оренди',
                        'description' => 'Угода між орендодавцем та орендарем про розірвання орендних відносин за взаємною згодою.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА ПРО РОЗІРВАННЯ ДОГОВОРУ ОРЕНДИ</h1><p style="font-size: 14px;">для нерухомості за адресою <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Орендар: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Сторони цього договору, орендодавець та орендар, цим за взаємною згодою домовляються про розірвання договору оренди від <strong>[[original_rental_agreement_date]]</strong> щодо нерухомості за адресою <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Припинення орендних відносин</h2>
                                <p>Орендні відносини припиняються за взаємною згодою <strong>[[termination_date]]</strong>.</p>
                                <p>Причина розірвання (необов\'язково): [[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Узгоджені умови</h2>
                                <p>Сторони погоджуються на наступні умови розірвання орендних відносин:</p>
                                <p>[[agreed_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Прикінцеві положення</h2>
                                <p>З моменту підписання цього договору всі взаємні претензії, що випливають з орендних відносин, якщо інше не обумовлено, вважаються врегульованими. Застосовується німецьке право. Договір складено у двох примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Porozumienie o rozwiązaniu umowy najmu',
                        'description' => 'Porozumienie między wynajmującym a najemcą w sprawie rozwiązania umowy najmu za obopólną zgodą.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POROZUMIENIE O ROZWIĄZANIU UMOWY NAJMU</h1><p style="font-size: 14px;">dla nieruchomości przy <strong>[[property_address]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_full_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Najemca: <strong>[[tenant_full_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Strony niniejszej umowy, wynajmujący i najemca, niniejszym zgodnie postanawiają o rozwiązaniu umowy najmu z dnia <strong>[[original_rental_agreement_date]]</strong> dotyczącej nieruchomości przy <strong>[[property_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1 Zakończenie stosunku najmu</h2>
                                <p>Stosunek najmu zostaje za obopólną zgodą zakończony z dniem <strong>[[termination_date]]</strong>.</p>
                                <p>Powód rozwiązania (opcjonalnie): [[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2 Uzgodnione warunki</h2>
                                <p>Strony uzgadniają następujące warunki rozwiązania stosunku najmu:</p>
                                <p>[[agreed_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3 Postanowienia końcowe</h2>
                                <p>Z chwilą podpisania niniejszej umowy wszystkie wzajemne roszczenia wynikające ze stosunku najmu, o ile nie uzgodniono inaczej, są zaspokojone. Obowiązuje prawo niemieckie. Umowa została sporządzona w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],
            // --- Уведомление о повышении арендной платы / Notice of Rent Increase (Mieterhöhung) ---
            [
                'slug' => 'rent-increase-notice-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"notice_date","type":"date","required":true,"labels":{"pl":"Data powiadomienia","en":"Notice Date","uk":"Дата повідомлення","de":"Datum der Mitteilung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa wynajmującego","en":"Landlord\'s Name/Company Name","uk":"ПІБ/назва орендодавця","de":"Name/Firmenname des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko najemcy","en":"Tenant\'s Full Name","uk":"ПІБ орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"pl":"Adres mieszkania","en":"Apartment Address","uk":"Адреса квартири","de":"Adresse der Wohnung"}},
                    {"name":"current_rent","type":"number","required":true,"labels":{"pl":"Obecny czynsz (netto)","en":"Current Rent (net)","uk":"Поточна орендна плата (нетто)","de":"Aktuelle Miete (netto)"}},
                    {"name":"new_rent","type":"number","required":true,"labels":{"pl":"Nowy czynsz (netto)","en":"New Rent (net)","uk":"Нова орендна плата (нетто)","de":"Neue Miete (netto)"}},
                    {"name":"increase_effective_date","type":"date","required":true,"labels":{"pl":"Data wejścia w życie podwyżki","en":"Increase Effective Date","uk":"Дата набрання чинності підвищенням","de":"Datum des Inkrafttretens der Erhöhung"}},
                    {"name":"justification","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie podwyżki (np. porównanie z czynszem referencyjnym, modernizacja)","en":"Justification for increase (e.g., comparison with reference rent, modernization)","uk":"Обґрунтування підвищення (напр., порівняння з референтною орендною платою, модернізація)","de":"Begründung der Erhöhung (z.B. Vergleichsmiete, Modernisierung)"}},
                    {"name":"legal_basis","type":"textarea","required":true,"labels":{"pl":"Podstawa prawna podwyżki (np. § 558 BGB)","en":"Legal basis for increase (e.g., § 558 BGB)","uk":"Правова підстава підвищення (напр., § 558 BGB)","de":"Rechtsgrundlage der Erhöhung (z.B. § 558 BGB)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mieterhöhung',
                        'description' => 'Formelle Mitteilung des Vermieters an den Mieter über eine Mieterhöhung, mit Begründung und Rechtsgrundlage nach deutschem Mietrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETERHÖHUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[notice_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[tenant_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Betreff: Mieterhöhung für die Wohnung in <strong>[[apartment_address]]</strong></p>
                                <br/>
                                <p>Sehr geehrte/r Herr/Frau [[tenant_name]],</p>
                                <p>hiermit teile ich Ihnen mit, dass die Nettokaltmiete für die von Ihnen gemietete Wohnung ab dem <strong>[[increase_effective_date]]</strong> von derzeit <strong>[[current_rent]] €</strong> auf <strong>[[new_rent]] €</strong> erhöht wird.</p>
                                <p>Die Erhöhung begründet sich wie folgt: [[justification]]</p>
                                <p>Die rechtliche Grundlage für diese Mieterhöhung ergibt sich aus [[legal_basis]].</p>
                                <p>Bitte prüfen Sie diese Mitteilung. Die erhöhte Miete ist erstmals zum [[increase_effective_date]] fällig.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Notice of Rent Increase',
                        'description' => 'Formal notice from landlord to tenant regarding a rent increase, with justification and legal basis according to German tenancy law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">NOTICE OF RENT INCREASE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[notice_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[tenant_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Subject: Rent Increase for the apartment at <strong>[[apartment_address]]</strong></p>
                                <br/>
                                <p>Dear Mr./Ms. [[tenant_name]],</p>
                                <p>I hereby inform you that the net cold rent for the apartment rented by you will be increased from the current <strong>[[current_rent]] €</strong> to <strong>[[new_rent]] €</strong>, effective from <strong>[[increase_effective_date]]</strong>.</p>
                                <p>The increase is justified as follows: [[justification]]</p>
                                <p>The legal basis for this rent increase results from [[legal_basis]].</p>
                                <p>Please review this notice. The increased rent is due for the first time on [[increase_effective_date]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Повідомлення про підвищення орендної плати',
                        'description' => 'Офіційне повідомлення орендодавця орендарю про підвищення орендної плати, з обґрунтуванням та правовою підставою згідно з німецьким орендним правом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОВІДОМЛЕННЯ ПРО ПІДВИЩЕННЯ ОРЕНДНОЇ ПЛАТИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[tenant_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Тема: Підвищення орендної плати за квартиру за адресою <strong>[[apartment_address]]</strong></p>
                                <br/>
                                <p>Шановний/а Пане/Пані [[tenant_name]],</p>
                                <p>цим повідомляю Вас, що чиста холодна орендна плата за орендовану Вами квартиру буде підвищена з поточної <strong>[[current_rent]] €</strong> до <strong>[[new_rent]] €</strong>, починаючи з <strong>[[increase_effective_date]]</strong>.</p>
                                <p>Підвищення обґрунтовується наступним: [[justification]]</p>
                                <p>Правова підстава для цього підвищення орендної плати випливає з [[legal_basis]].</p>
                                <p>Будь ласка, ознайомтеся з цим повідомленням. Підвищена орендна плата вперше підлягає сплаті [[increase_effective_date]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Powiadomienie o podwyżce czynszu',
                        'description' => 'Formalne powiadomienie wynajmującego do najemcy o podwyżce czynszu, z uzasadnieniem i podstawą prawną zgodnie z niemieckim prawem najmu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWIADOMIENIE O PODWYŻCE CZYNSZU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[tenant_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Temat: Podwyżka czynszu za mieszkanie pod adresem <strong>[[apartment_address]]</strong></p>
                                <br/>
                                <p>Szanowny/a Panie/Pani [[tenant_name]],</p>
                                <p>niniejszym informuję, że czynsz netto za wynajmowane przez Państwa mieszkanie zostanie podwyższony z obecnych <strong>[[current_rent]] €</strong> do <strong>[[new_rent]] €</strong>, ze skutkiem od dnia <strong>[[increase_effective_date]]</strong>.</p>
                                <p>Podwyżka jest uzasadniona w następujący sposób: [[justification]]</p>
                                <p>Podstawa prawna tej podwyżki czynszu wynika z [[legal_basis]].</p>
                                <p>Proszę o zapoznanie się z niniejszym powiadomieniem. Podwyższony czynsz jest płatny po raz pierwszy w dniu [[increase_effective_date]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Требование о погашении задолженности по аренде / Demand for Rent Arrears (Mahnung Mietrückstand) ---
            [
                'slug' => 'demand-rent-arrears-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"demand_date","type":"date","required":true,"labels":{"pl":"Data wezwania","en":"Demand Date","uk":"Дата вимоги","de":"Datum der Mahnung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa wynajmującego","en":"Landlord\'s Name/Company Name","uk":"ПІБ/назва орендодавця","de":"Name/Firmenname des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Landlord\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko najemcy","en":"Tenant\'s Full Name","uk":"ПІБ орендаря","de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Tenant\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"pl":"Adres mieszkania","en":"Apartment Address","uk":"Адреса квартири","de":"Adresse der Wohnung"}},
                    {"name":"arrears_amount","type":"number","required":true,"labels":{"pl":"Kwota zaległego czynszu","en":"Arrears Amount","uk":"Сума заборгованості з орендної плати","de":"Höhe des Mietrückstands"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"due_months","type":"text","required":true,"labels":{"pl":"Miesiące, za które zalega czynsz","en":"Months for which rent is overdue","uk":"Місяці, за які прострочена орендна плата","de":"Monate, für die die Miete überfällig ist"}},
                    {"name":"payment_deadline","type":"date","required":true,"labels":{"pl":"Termin spłaty zaległości","en":"Arrears Payment Deadline","uk":"Термін погашення заборгованості","de":"Frist zur Begleichung des Rückstands"}},
                    {"name":"warning_consequences","type":"textarea","required":true,"labels":{"pl":"Ostrzeżenie o konsekwencjach (np. wypowiedzenie umowy, postępowanie sądowe)","en":"Warning about consequences (e.g., termination, legal action)","uk":"Попередження про наслідки (напр., розірвання договору, судовий розгляд)","de":"Warnung vor Konsequenzen (z.B. Kündigung, Klage)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mahnung Mietrückstand',
                        'description' => 'Formelle Mahnung an den Mieter zur Begleichung von Mietrückständen, mit Fristsetzung und Androhung rechtlicher Schritte.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MAHNUNG MIETRÜCKSTAND</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[landlord_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[demand_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[tenant_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Betreff: Mietrückstand für die Wohnung in <strong>[[apartment_address]]</strong></p>
                                <br/>
                                <p>Sehr geehrte/r Herr/Frau [[tenant_name]],</p>
                                <p>wir müssen Sie darauf hinweisen, dass Sie mit der Zahlung der Miete für die Monate [[due_months]] in Höhe von insgesamt <strong>[[arrears_amount]] [[currency]]</strong> in Verzug sind.</p>
                                <p>Wir fordern Sie hiermit auf, den ausstehenden Betrag bis spätestens <strong>[[payment_deadline]]</strong> auf unser Konto zu überweisen.</p>
                                <p>Wir weisen Sie darauf hin, dass bei Nichteinhaltung dieser Frist [[warning_consequences]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Demand for Rent Arrears',
                        'description' => 'Formal reminder to the tenant for settlement of rent arrears, with deadline and threat of legal action.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DEMAND FOR RENT ARREARS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Landlord: <strong>[[landlord_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[demand_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[tenant_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Subject: Rent Arrears for the apartment at <strong>[[apartment_address]]</strong></p>
                                <br/>
                                <p>Dear Mr./Ms. [[tenant_name]],</p>
                                <p>We must inform you that you are in arrears with the rent payment for the months [[due_months]] in the total amount of <strong>[[arrears_amount]] [[currency]]</strong>.</p>
                                <p>We hereby request you to transfer the outstanding amount to our account by <strong>[[payment_deadline]]</strong> at the latest.</p>
                                <p>Please note that if this deadline is not met, [[warning_consequences]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Вимога про погашення заборгованості з орендної плати',
                        'description' => 'Формальне нагадування орендарю про врегулювання заборгованості з орендної плати, з встановленням терміну та погрозою юридичних кроків.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ВИМОГА ПРО ПОГАШЕННЯ ЗАБОРГОВАНОСТІ З ОРЕНДНОЇ ПЛАТИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[landlord_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[tenant_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Тема: Заборгованість з орендної плати за квартиру за адресою <strong>[[apartment_address]]</strong></p>
                                <br/>
                                <p>Шановний/а Пане/Пані [[tenant_name]],</p>
                                <p>ми повинні повідомити Вам, що Ви маєте заборгованість з орендної плати за місяці [[due_months]] на загальну суму <strong>[[arrears_amount]] [[currency]]</strong>.</p>
                                <p>Цим ми вимагаємо від Вас перерахувати непогашену суму на наш рахунок не пізніше <strong>[[payment_deadline]]</strong>.</p>
                                <p>Звертаємо Вашу увагу, що у разі недотримання цього терміну [[warning_consequences]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Wezwanie do zapłaty zaległego czynszu',
                        'description' => 'Formalne wezwanie do najemcy o uregulowanie zaległego czynszu, z wyznaczeniem terminu i groźbą podjęcia kroków prawnych.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WEZWANIE DO ZAPŁATY ZALEGŁEGO CZYNSZU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[landlord_name]]</strong><br>[[landlord_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[tenant_name]]</strong><br>[[tenant_address]]</p>
                                <br/>
                                <p>Temat: Zaległość czynszowa za mieszkanie pod adresem <strong>[[apartment_address]]</strong></p>
                                <br/>
                                <p>Szanowny/a Panie/Pani [[tenant_name]],</p>
                                <p>musimy Państwa poinformować, że zalegają Państwo z płatnością czynszu za miesiące [[due_months]] w łącznej wysokości <strong>[[arrears_amount]] [[currency]]</strong>.</p>
                                <p>Niniejszym wzywamy Państwa do uregulowania zaległej kwoty na nasze konto najpóźniej do dnia <strong>[[payment_deadline]]</strong>.</p>
                                <p>Informujemy, że w przypadku nieuregulowania płatności w tym terminie [[warning_consequences]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[landlord_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Предварительный договор купли-продажи квартиры / Preliminary Apartment Sale Agreement (Vorvertrag Wohnungskauf) ---
            [
                'slug' => 'preliminary-apartment-sale-agreement-de',
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
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej (Grundbuchblatt-Nr.)","en":"Land and Mortgage Register Number (Grundbuchblatt-Nr.)","uk":"Номер іпотечної книги (Grundbuchblatt-Nr.)","de":"Grundbuchblatt-Nr."}},
                    {"name":"apartment_area","type":"number","required":true,"labels":{"pl":"Powierzchnia użytkowa mieszkania (m²)","en":"Usable area of apartment (m²)","uk":"Корисна площа квартири (м²)","de":"Nutzfläche der Wohnung (m²)"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"pl":"Cena sprzedaży (€)","en":"Sale Price (€)","uk":"Ціна продажу (€)","de":"Verkaufspreis (€)"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Kwota zadatku (Anzahlung)","en":"Deposit Amount","uk":"Сума завдатку","de":"Anzahlungsbetrag"}},
                    {"name":"final_agreement_date","type":"date","required":true,"labels":{"pl":"Planowana data zawarcia umowy głównej (notarialnej)","en":"Planned date of concluding the main (notarized) agreement","uk":"Планована дата укладення основного (нотаріального) договору","de":"Geplantes Datum des Abschlusses des Hauptvertrags (notariell)"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne warunki (opcjonalnie)","en":"Other conditions (optional)","uk":"Інші умови (необов\'язково)","de":"Weitere Bedingungen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Vorvertrag zum Wohnungskauf',
                        'description' => 'Vorvertrag, der die Bedingungen für den zukünftigen Wohnungskauf festlegt, einschließlich Preis, Frist und Anzahlung. Beachten Sie, dass in Deutschland der Kaufvertrag notariell beurkundet werden muss.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VORVERTRAG ZUM WOHNUNGSKAUF</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[agreement_date]]</p></td><td style="text-align: right;"><p>Verkäufer: <strong>[[seller_full_name]]</strong><br>Adresse: [[seller_address]]<br>Ausweis-Nr.: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Käufer: <strong>[[buyer_full_name]]</strong><br>Adresse: [[buyer_address]]<br>Ausweis-Nr.: [[buyer_id_number]]</p>
                                <br/>
                                <p>Betreff: Vorvertrag zum Kauf der Wohnung in <strong>[[apartment_address]]</strong>, Grundbuchblatt-Nr. <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit schließen die Parteien einen Vorvertrag über den Kauf der oben genannten Wohnung mit einer Nutzfläche von [[apartment_area]] m² zu einem Kaufpreis von <strong>[[sale_price]] €</strong>.</p>
                                <p>Der Käufer zahlt eine Anzahlung in Höhe von <strong>[[deposit_amount]] €</strong>.</p>
                                <p>Der Hauptvertrag (notariell) soll bis zum <strong>[[final_agreement_date]]</strong> abgeschlossen werden.</p>
                                <p>Weitere Bedingungen: [[other_conditions]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Verkäufer</p></td>
                                <td width="50%"><p>___________________<br>Käufer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>Dies ist ein Musterdokument und dient nur zu Informationszwecken. Eine rechtliche Beratung durch einen Notar wird dringend empfohlen.</p></div>'
                    ],
                    'en' => [
                        'title' => 'Preliminary Apartment Sale Agreement',
                        'description' => 'Preliminary agreement outlining the terms for a future apartment purchase, including price, deadline, and deposit. Note that in Germany, the purchase agreement must be notarized.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PRELIMINARY APARTMENT SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[agreement_date]]</p></td><td style="text-align: right;"><p>Seller: <strong>[[seller_full_name]]</strong><br>Address: [[seller_address]]<br>ID No.: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Buyer: <strong>[[buyer_full_name]]</strong><br>Address: [[buyer_address]]<br>ID No.: [[buyer_id_number]]</p>
                                <br/>
                                <p>Subject: Preliminary agreement for the purchase of the apartment at <strong>[[apartment_address]]</strong>, Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>The parties hereby conclude a preliminary agreement for the purchase of the above-mentioned apartment with a usable area of [[apartment_area]] m² for a purchase price of <strong>[[sale_price]] €</strong>.</p>
                                <p>The buyer pays a deposit of <strong>[[deposit_amount]] €</strong>.</p>
                                <p>The main (notarized) agreement is to be concluded by <strong>[[final_agreement_date]]</strong>.</p>
                                <p>Other conditions: [[other_conditions]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Seller</p></td>
                                <td width="50%"><p>___________________<br>Buyer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>This is a sample document and for informational purposes only. Legal advice from a notary is strongly recommended.</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Попередній договір купівлі-продажу квартири',
                        'description' => 'Попередній договір, що визначає умови майбутньої купівлі квартири, включаючи ціну, термін та завдаток. Зверніть увагу, що в Німеччині договір купівлі-продажу має бути нотаріально посвідчений.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОПЕРЕДНІЙ ДОГОВІР КУПІВЛІ-ПРОДАЖУ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Продавець: <strong>[[seller_full_name]]</strong><br>Адреса: [[seller_address]]<br>Номер посвідчення: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Покупець: <strong>[[buyer_full_name]]</strong><br>Адреса: [[buyer_address]]<br>Номер посвідчення: [[buyer_id_number]]</p>
                                <br/>
                                <p>Тема: Попередній договір купівлі-продажу квартири за адресою <strong>[[apartment_address]]</strong>, номер іпотечної книги <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим сторони укладають попередній договір купівлі-продажу вищезгаданої квартири корисною площею [[apartment_area]] м² за ціною <strong>[[sale_price]] €</strong>.</p>
                                <p>Покупець сплачує завдаток у розмірі <strong>[[deposit_amount]] €</strong>.</p>
                                <p>Основний (нотаріальний) договір має бути укладений до <strong>[[final_agreement_date]]</strong>.</p>
                                <p>Інші умови: [[other_conditions]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Продавець</p></td>
                                <td width="50%"><p>___________________<br>Покупець</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"> Настійно рекомендується юридична консультація нотаріуса.</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Przedwstępna umowa sprzedaży mieszkania',
                        'description' => 'Umowa przedwstępna określająca warunki przyszłego zakupu mieszkania, w tym cenę, termin i zadatek. Należy pamiętać, że w Niemczech umowa kupna-sprzedaży musi być notarialnie poświadczona.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PRZEDWSTĘPNA UMOWA SPRZEDAŻY MIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Sprzedający: <strong>[[seller_full_name]]</strong><br>Adres: [[seller_address]]<br>Nr dowodu: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Kupujący: <strong>[[buyer_full_name]]</strong><br>Adres: [[buyer_address]]<br>Nr dowodu: [[buyer_id_number]]</p>
                                <br/>
                                <p>Temat: Przedwstępna umowa kupna mieszkania pod adresem <strong>[[apartment_address]]</strong>, numer księgi wieczystej <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym strony zawierają umowę przedwstępną dotyczącą zakupu wyżej wymienionego mieszkania o powierzchni użytkowej [[apartment_area]] m² za cenę zakupu <strong>[[sale_price]] €</strong>.</p>
                                <p>Kupujący wpłaca zadatek w wysokości <strong>[[deposit_amount]] €</strong>.</p>
                                <p>Umowa główna (notarialna) ma zostać zawarta do dnia <strong>[[final_agreement_date]]</strong>.</p>
                                <p>Inne warunki: [[other_conditions]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Sprzedający</p></td>
                                <td width="50%"><p>___________________<br>Kupujący</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>To jest dokument wzorcowy i służy wyłącznie celom informacyjnym. Zdecydowanie zaleca się zasięgnięcie porady prawnej u notariusza.</p></div>'
                    ]
                ]
            ],

            // --- Договор купли-продажи квартиры / Apartment Sale Agreement (Wohnungskaufvertrag) ---
            [
                'slug' => 'apartment-sale-agreement-de',
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
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej (Grundbuchblatt-Nr.)","en":"Land and Mortgage Register Number (Grundbuchblatt-Nr.)","uk":"Номер іпотечної книги (Grundbuchblatt-Nr.)","de":"Grundbuchblatt-Nr."}},
                    {"name":"apartment_area","type":"number","required":true,"labels":{"pl":"Powierzchnia użytkowa mieszkania (m²)","en":"Usable area of apartment (m²)","uk":"Корисна площа квартири (м²)","de":"Nutzfläche der Wohnung (m²)"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"pl":"Cena sprzedaży (€)","en":"Sale Price (€)","uk":"Ціна продажу (€)","de":"Verkaufspreis (€)"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}},
                    {"name":"handover_date","type":"date","required":true,"labels":{"pl":"Data wydania nieruchomości","en":"Property Handover Date","uk":"Дата передачі нерухомості","de":"Übergabedatum der Immobilie"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Wohnungskaufvertrag',
                        'description' => 'Standardmäßiger Kaufvertrag für eine Wohnung, der alle wesentlichen Bedingungen des Geschäfts enthält. Muss in Deutschland notariell beurkundet werden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHNUNGSKAUFVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[agreement_date]]</p></td><td style="text-align: right;"><p>Verkäufer: <strong>[[seller_full_name]]</strong><br>Adresse: [[seller_address]]<br>Ausweis-Nr.: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Käufer: <strong>[[buyer_full_name]]</strong><br>Adresse: [[buyer_address]]<br>Ausweis-Nr.: [[buyer_id_number]]</p>
                                <br/>
                                <p>Betreff: Kaufvertrag über die Wohnung in <strong>[[apartment_address]]</strong>, Grundbuchblatt-Nr. <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit verkaufen der Verkäufer und kaufen der Käufer die oben genannte Wohnung mit einer Nutzfläche von [[apartment_area]] m² zu einem Kaufpreis von <strong>[[sale_price]] €</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <p>Die Übergabe der Wohnung an den Käufer erfolgt bis zum <strong>[[handover_date]]</strong>.</p>
                                <p>Weitere Bestimmungen: [[other_conditions]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Verkäufer</p></td>
                                <td width="50%"><p>___________________<br>Käufer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>Dies ist ein Musterdokument und dient nur zu Informationszwecken. Eine rechtliche Beratung durch einen Notar wird dringend empfohlen.</p></div>'
                    ],
                    'en' => [
                        'title' => 'Apartment Sale Agreement',
                        'description' => 'Standard purchase agreement for an apartment, containing all essential transaction terms. Must be notarized in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[agreement_date]]</p></td><td style="text-align: right;"><p>Seller: <strong>[[seller_full_name]]</strong><br>Address: [[seller_address]]<br>ID No.: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Buyer: <strong>[[buyer_full_name]]</strong><br>Address: [[buyer_address]]<br>ID No.: [[buyer_id_number]]</p>
                                <br/>
                                <p>Subject: Purchase Agreement for the apartment at <strong>[[apartment_address]]</strong>, Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>The Seller hereby sells and the Buyer buys the above-mentioned apartment with a usable area of [[apartment_area]] m² for a purchase price of <strong>[[sale_price]] €</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <p>The handover of the apartment to the Buyer will take place by <strong>[[handover_date]]</strong>.</p>
                                <p>Other provisions: [[other_conditions]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Seller</p></td>
                                <td width="50%"><p>___________________<br>Buyer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>This is a sample document and for informational purposes only. Legal advice from a notary is strongly recommended.</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір купівлі-продажу квартири',
                        'description' => 'Стандартний договір купівлі-продажу квартири, що містить усі суттєві умови угоди. Має бути нотаріально посвідчений у Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР КУПІВЛІ-ПРОДАЖУ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Продавець: <strong>[[seller_full_name]]</strong><br>Адреса: [[seller_address]]<br>Номер посвідчення: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Покупець: <strong>[[buyer_full_name]]</strong><br>Адреса: [[buyer_address]]<br>Номер посвідчення: [[buyer_id_number]]</p>
                                <br/>
                                <p>Тема: Договір купівлі-продажу квартири за адресою <strong>[[apartment_address]]</strong>, номер іпотечної книги <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим Продавець продає, а Покупець купує вищезгадану квартиру корисною площею [[apartment_area]] м² за ціною <strong>[[sale_price]] €</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <p>Передача квартири Покупцю відбудеться до <strong>[[handover_date]]</strong>.</p>
                                <p>Інші положення: [[other_conditions]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Продавець</p></td>
                                <td width="50%"><p>___________________<br>Покупець</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"> Настійно рекомендується юридична консультація нотаріуса.</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa sprzedaży mieszkania',
                        'description' => 'Standardowa umowa sprzedaży mieszkania, zawierająca wszystkie kluczowe warunki transakcji. W Niemczech musi być poświadczona notarialnie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA SPRZEDAŻY MIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Sprzedający: <strong>[[seller_full_name]]</strong><br>Adres: [[seller_address]]<br>Nr dowodu: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Kupujący: <strong>[[buyer_full_name]]</strong><br>Adres: [[buyer_address]]<br>Nr dowodu: [[buyer_id_number]]</p>
                                <br/>
                                <p>Temat: Umowa sprzedaży mieszkania pod adresem <strong>[[apartment_address]]</strong>, numer księgi wieczystej <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym Sprzedający sprzedaje, a Kupujący kupuje wyżej wymienione mieszkanie o powierzchni użytkowej [[apartment_area]] m² za cenę zakupu <strong>[[sale_price]] €</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <p>Wydanie mieszkania Kupującemu nastąpi do dnia <strong>[[handover_date]]</strong>.</p>
                                <p>Inne postanowienia: [[other_conditions]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Sprzedający</p></td>
                                <td width="50%"><p>___________________<br>Kupujący</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>To jest dokument wzorcowy i służy wyłącznie celom informacyjnym. Zdecydowanie zaleca się zasięgnięcie porady prawnej u notariusza.</p></div>'
                    ]
                ]
            ],

            // --- Договор купли-продажи дома с земельным участком / House and Land Sale Agreement (Hauskaufvertrag mit Grundstück) ---
            [
                'slug' => 'house-land-sale-agreement-de',
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
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej (Grundbuchblatt-Nr.)","en":"Land and Mortgage Register Number (Grundbuchblatt-Nr.)","uk":"Номер іпотечної книги (Grundbuchblatt-Nr.)","de":"Grundbuchblatt-Nr."}},
                    {"name":"house_area","type":"number","required":true,"labels":{"pl":"Powierzchnia użytkowa domu (m²)","en":"Usable area of house (m²)","uk":"Корисна площа будинку (м²)","de":"Nutzfläche des Hauses (m²)"}},
                    {"name":"land_area","type":"number","required":true,"labels":{"pl":"Powierzchnia działki (m²)","en":"Land area (m²)","uk":"Площа ділянки (м²)","de":"Grundstücksfläche (m²)"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"pl":"Cena sprzedaży (€)","en":"Sale Price (€)","uk":"Ціна продажу (€)","de":"Verkaufspreis (€)"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}},
                    {"name":"handover_date","type":"date","required":true,"labels":{"pl":"Data wydania nieruchomości","en":"Property Handover Date","uk":"Дата передачі нерухомості","de":"Übergabedatum der Immobilie"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Hauskaufvertrag mit Grundstück',
                        'description' => 'Standardmäßiger Kaufvertrag für ein Haus mit dazugehörigem Grundstück. Muss in Deutschland notariell beurkundet werden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HAUSKAUFVERTRAG MIT GRUNDSTÜCK</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[agreement_date]]</p></td><td style="text-align: right;"><p>Verkäufer: <strong>[[seller_full_name]]</strong><br>Adresse: [[seller_address]]<br>Ausweis-Nr.: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Käufer: <strong>[[buyer_full_name]]</strong><br>Adresse: [[buyer_address]]<br>Ausweis-Nr.: [[buyer_id_number]]</p>
                                <br/>
                                <p>Betreff: Kaufvertrag über das Haus in <strong>[[property_address]]</strong>, Grundbuchblatt-Nr. <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit verkaufen der Verkäufer und kaufen der Käufer die oben genannte Immobilie (Haus mit Grundstück) mit einer Hausfläche von [[house_area]] m² und einer Grundstücksfläche von [[land_area]] m² zu einem Kaufpreis von <strong>[[sale_price]] €</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <p>Die Übergabe der Immobilie an den Käufer erfolgt bis zum <strong>[[handover_date]]</strong>.</p>
                                <p>Weitere Bestimmungen: [[other_conditions]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Verkäufer</p></td>
                                <td width="50%"><p>___________________<br>Käufer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>Dies ist ein Musterdokument und dient nur zu Informationszwecken. Eine rechtliche Beratung durch einen Notar wird dringend empfohlen.</p></div>'
                    ],
                    'en' => [
                        'title' => 'House and Land Sale Agreement',
                        'description' => 'Standard purchase agreement for a house with an accompanying plot of land. Must be notarized in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HOUSE AND LAND SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[agreement_date]]</p></td><td style="text-align: right;"><p>Seller: <strong>[[seller_full_name]]</strong><br>Address: [[seller_address]]<br>ID No.: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Buyer: <strong>[[buyer_full_name]]</strong><br>Address: [[buyer_address]]<br>ID No.: [[buyer_id_number]]</p>
                                <br/>
                                <p>Subject: Purchase Agreement for the house at <strong>[[property_address]]</strong>, Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>The Seller hereby sells and the Buyer buys the above-mentioned property (house with land) with a house area of [[house_area]] m² and a land area of [[land_area]] m² for a purchase price of <strong>[[sale_price]] €</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <p>The handover of the property to the Buyer will take place by <strong>[[handover_date]]</strong>.</p>
                                <p>Other provisions: [[other_conditions]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Seller</p></td>
                                <td width="50%"><p>___________________<br>Buyer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>This is a sample document and for informational purposes only. Legal advice from a notary is strongly recommended.</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір купівлі-продажу будинку із земельною ділянкою',
                        'description' => 'Стандартний договір купівлі-продажу будинку разом із прилеглою земельною ділянкою. Має бути нотаріально посвідчений у Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР КУПІВЛІ-ПРОДАЖУ БУДИНКУ З ЗЕМЕЛЬНОЮ ДІЛЯНКОЮ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Продавець: <strong>[[seller_full_name]]</strong><br>Адреса: [[seller_address]]<br>Номер посвідчення: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Покупець: <strong>[[buyer_full_name]]</strong><br>Адреса: [[buyer_address]]<br>Номер посвідчення: [[buyer_id_number]]</p>
                                <br/>
                                <p>Тема: Договір купівлі-продажу будинку за адресою <strong>[[property_address]]</strong>, номер іпотечної книги <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим Продавець продає, а Покупець купує вищезгадану нерухомість (будинок із земельною ділянкою) площею будинку [[house_area]] м² та площею ділянки [[land_area]] м² за ціною <strong>[[sale_price]] €</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <p>Передача нерухомості Покупцю відбудеться до <strong>[[handover_date]]</strong>.</p>
                                <p>Інші положення: [[other_conditions]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Продавець</p></td>
                                <td width="50%"><p>___________________<br>Покупець</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"> Настійно рекомендується юридична консультація нотаріуса.</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa sprzedaży domu z działką',
                        'description' => 'Standardowa umowa sprzedaży domu wraz z przynależącą działką gruntu. W Niemczech musi być poświadczona notarialnie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA SPRZEDAŻY DOMU Z DZIAŁKĄ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Sprzedający: <strong>[[seller_full_name]]</strong><br>Adres: [[seller_address]]<br>Nr dowodu: [[seller_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Kupujący: <strong>[[buyer_full_name]]</strong><br>Adres: [[buyer_address]]<br>Nr dowodu: [[buyer_id_number]]</p>
                                <br/>
                                <p>Temat: Umowa sprzedaży domu pod adresem <strong>[[property_address]]</strong>, numer księgi wieczystej <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym Sprzedający sprzedaje, a Kupujący kupuje wyżej wymienioną nieruchomość (dom z działką) o powierzchni domu [[house_area]] m² i powierzchni działki [[land_area]] m² za cenę zakupu <strong>[[sale_price]] €</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <p>Wydanie nieruchomości Kupującemu nastąpi do dnia <strong>[[handover_date]]</strong>.</p>
                                <p>Inne postanowienia: [[other_conditions]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Sprzedający</p></td>
                                <td width="50%"><p>___________________<br>Kupujący</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>To jest dokument wzorcowy i służy wyłącznie celom informacyjnym. Zdecydowanie zaleca się zasięgnięcie porady prawnej u notariusza.</p></div>'
                    ]
                ]
            ],

            // --- Договор дарения квартиры / Apartment Donation Agreement (Wohnungsschenkungsvertrag) ---
            [
                'slug' => 'apartment-donation-agreement-de',
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
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej (Grundbuchblatt-Nr.)","en":"Land and Mortgage Register Number (Grundbuchblatt-Nr.)","uk":"Номер іпотечної книги (Grundbuchblatt-Nr.)","de":"Grundbuchblatt-Nr."}},
                    {"name":"apartment_area","type":"number","required":true,"labels":{"pl":"Powierzchnia użytkowa mieszkania (m²)","en":"Usable area of apartment (m²)","uk":"Корисна площа квартири (м²)","de":"Nutzfläche der Wohnung (m²)"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Wohnungsschenkungsvertrag',
                        'description' => 'Schenkungsvertrag, durch den der Schenker eine Wohnung an den Beschenkten überträgt. Muss in Deutschland notariell beurkundet werden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHNUNGSSCHENKUNGSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[agreement_date]]</p></td><td style="text-align: right;"><p>Schenker: <strong>[[donor_full_name]]</strong><br>Adresse: [[donor_address]]<br>Ausweis-Nr.: [[donor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Beschenkter: <strong>[[donee_full_name]]</strong><br>Adresse: [[donee_address]]<br>Ausweis-Nr.: [[donee_id_number]]</p>
                                <br/>
                                <p>Betreff: Schenkungsvertrag über die Wohnung in <strong>[[apartment_address]]</strong>, Grundbuchblatt-Nr. <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit schenkt der Schenker und nimmt der Beschenkte die Schenkung der oben genannten Wohnung mit einer Nutzfläche von [[apartment_area]] m² an.</p>
                                <p>Der Schenker erklärt, dass die geschenkte Immobilie frei von Belastungen und Ansprüchen Dritter ist.</p>
                                <p>Weitere Bestimmungen: [[other_conditions]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Schenker</p></td>
                                <td width="50%"><p>___________________<br>Beschenkter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>Dies ist ein Musterdokument und dient nur zu Informationszwecken. Eine rechtliche Beratung durch einen Notar wird dringend empfohlen.</p></div>'
                    ],
                    'en' => [
                        'title' => 'Apartment Donation Agreement',
                        'description' => 'A donation agreement under which the donor transfers an apartment to the donee. Must be notarized in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT DONATION AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[agreement_date]]</p></td><td style="text-align: right;"><p>Donor: <strong>[[donor_full_name]]</strong><br>Address: [[donor_address]]<br>ID No.: [[donor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Donee: <strong>[[donee_full_name]]</strong><br>Address: [[donee_address]]<br>ID No.: [[donee_id_number]]</p>
                                <br/>
                                <p>Subject: Donation Agreement for the apartment at <strong>[[apartment_address]]</strong>, Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>The Donor hereby donates and the Donee accepts the donation of the above-mentioned apartment with a usable area of [[apartment_area]] m².</p>
                                <p>The Donor declares that the donated property is free from encumbrances and third-party claims.</p>
                                <p>Other provisions: [[other_conditions]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Donor</p></td>
                                <td width="50%"><p>___________________<br>Donee</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>This is a sample document and for informational purposes only. Legal advice from a notary is strongly recommended.</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір дарування квартири',
                        'description' => 'Договір дарування, за яким дарувальник передає квартиру обдарованому. Має бути нотаріально посвідчений у Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ДАРУВАННЯ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Дарувальник: <strong>[[donor_full_name]]</strong><br>Адреса: [[donor_address]]<br>Номер посвідчення: [[donor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Обдарований: <strong>[[donee_full_name]]</strong><br>Адреса: [[donee_address]]<br>Номер посвідчення: [[donee_id_number]]</p>
                                <br/>
                                <p>Тема: Договір дарування квартири за адресою <strong>[[apartment_address]]</strong>, номер іпотечної книги <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим Дарувальник дарує, а Обдарований приймає дарунок вищезгаданої квартири корисною площею [[apartment_area]] м².</p>
                                <p>Дарувальник заявляє, що подарована нерухомість вільна від обтяжень та претензій третіх осіб.</p>
                                <p>Інші положення: [[other_conditions]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Дарувальник</p></td>
                                <td width="50%"><p>___________________<br>Обдарований</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"> Настійно рекомендується юридична консультація нотаріуса.</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa darowizny mieszkania',
                        'description' => 'Umowa darowizny, na mocy której darczyńca przekazuje mieszkanie obdarowanemu. W Niemczech musi być poświadczona notarialnie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA DAROWIZNY MIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Darczyńca: <strong>[[donor_full_name]]</strong><br>Adres: [[donor_address]]<br>Nr dowodu: [[donor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Obdarowany: <strong>[[donee_full_name]]</strong><br>Adres: [[donee_address]]<br>Nr dowodu: [[donee_id_number]]</p>
                                <br/>
                                <p>Temat: Umowa darowizny mieszkania pod adresem <strong>[[apartment_address]]</strong>, numer księgi wieczystej <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym Darczyńca daruje, a Obdarowany przyjmuje darowiznę wyżej wymienionego mieszkania o powierzchni użytkowej [[apartment_area]] m².</p>
                                <p>Darczyńca oświadcza, że darowana nieruchomość jest wolna od obciążeń i roszczeń osób trzecich.</p>
                                <p>Inne postanowienia: [[other_conditions]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Darczyńca</p></td>
                                <td width="50%"><p>___________________<br>Obdarowany</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>To jest dokument wzorcowy i służy wyłącznie celom informacyjnym. Zdecydowanie zaleca się zasięgnięcie porady prawnej u notariusza.</p></div>'
                    ]
                ]
            ],

            // --- Договор дарения доли в квартире / Apartment Share Donation Agreement (Schenkungsvertrag über einen Wohnungsanteil) ---
            [
                'slug' => 'apartment-share-donation-agreement-de',
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
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej (Grundbuchblatt-Nr.)","en":"Land and Mortgage Register Number (Grundbuchblatt-Nr.)","uk":"Номер іпотечної книги (Grundbuchblatt-Nr.)","de":"Grundbuchblatt-Nr."}},
                    {"name":"share_fraction","type":"text","required":true,"labels":{"pl":"Wielkość udziału (np. 1/2, 1/4)","en":"Share size (e.g., 1/2, 1/4)","uk":"Розмір частки (напр., 1/2, 1/4)","de":"Anteil (z.B. 1/2, 1/4)"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Schenkungsvertrag über einen Wohnungsanteil',
                        'description' => 'Schenkungsvertrag, durch den der Schenker einen Anteil an einer Wohnung an den Beschenkten überträgt. Muss in Deutschland notariell beurkundet werden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SCHENKUNGSVERTRAG ÜBER EINEN WOHNUNGSANTEIL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[agreement_date]]</p></td><td style="text-align: right;"><p>Schenker: <strong>[[donor_full_name]]</strong><br>Adresse: [[donor_address]]<br>Ausweis-Nr.: [[donor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Beschenkter: <strong>[[donee_full_name]]</strong><br>Adresse: [[donee_address]]<br>Ausweis-Nr.: [[donee_id_number]]</p>
                                <br/>
                                <p>Betreff: Schenkungsvertrag über den Wohnungsanteil [[share_fraction]] in <strong>[[apartment_address]]</strong>, Grundbuchblatt-Nr. <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit schenkt der Schenker und nimmt der Beschenkte die Schenkung eines Anteils von <strong>[[share_fraction]]</strong> an der oben genannten Wohnung an.</p>
                                <p>Der Schenker erklärt, dass der geschenkte Anteil frei von Belastungen und Ansprüchen Dritter ist.</p>
                                <p>Weitere Bestimmungen: [[other_conditions]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Schenker</p></td>
                                <td width="50%"><p>___________________<br>Beschenkter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>Dies ist ein Musterdokument und dient nur zu Informationszwecken. Eine rechtliche Beratung durch einen Notar wird dringend empfohlen.</p></div>'
                    ],
                    'en' => [
                        'title' => 'Apartment Share Donation Agreement',
                        'description' => 'A donation agreement under which the donor transfers a share in an apartment to the donee. Must be notarized in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT SHARE DONATION AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[agreement_date]]</p></td><td style="text-align: right;"><p>Donor: <strong>[[donor_full_name]]</strong><br>Address: [[donor_address]]<br>ID No.: [[donor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Donee: <strong>[[donee_full_name]]</strong><br>Address: [[donee_address]]<br>ID No.: [[donee_id_number]]</p>
                                <br/>
                                <p>Subject: Donation Agreement for the apartment share [[share_fraction]] in <strong>[[apartment_address]]</strong>, Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>The Donor hereby donates and the Donee accepts the donation of a share amounting to <strong>[[share_fraction]]</strong> in the above-mentioned apartment.</p>
                                <p>The Donor declares that the donated share is free from encumbrances and third-party claims.</p>
                                <p>Other provisions: [[other_conditions]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Donor</p></td>
                                <td width="50%"><p>___________________<br>Donee</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>This is a sample document and for informational purposes only. Legal advice from a notary is strongly recommended.</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір дарування частки в квартирі',
                        'description' => 'Договір дарування, за яким дарувальник передає частку в квартирі обдарованому. Має бути нотаріально посвідчений у Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ДАРУВАННЯ ЧАСТКИ В КВАРТИРІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Дарувальник: <strong>[[donor_full_name]]</strong><br>Адреса: [[donor_address]]<br>Номер посвідчення: [[donor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Обдарований: <strong>[[donee_full_name]]</strong><br>Адреса: [[donee_address]]<br>Номер посвідчення: [[donee_id_number]]</p>
                                <br/>
                                <p>Тема: Договір дарування частки [[share_fraction]] у квартирі за адресою <strong>[[apartment_address]]</strong>, номер іпотечної книги <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим Дарувальник дарує, а Обдарований приймає дарунок частки, що становить <strong>[[share_fraction]]</strong>, у вищезгаданій квартирі.</p>
                                <p>Дарувальник заявляє, що подарована частка вільна від обтяжень та претензій третіх осіб.</p>
                                <p>Інші положення: [[other_conditions]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Дарувальник</p></td>
                                <td width="50%"><p>___________________<br>Обдарований</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"> Настійно рекомендується юридична консультація нотаріуса.</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa darowizny udziału w mieszkaniu',
                        'description' => 'Umowa darowizny, na mocy której darczyńca przekazuje udział w mieszkaniu obdarowanemu. W Niemczech musi być poświadczona notarialnie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA DAROWIZNY UDZIAŁU W MIESZKANIU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Darczyńca: <strong>[[donor_full_name]]</strong><br>Adres: [[donor_address]]<br>Nr dowodu: [[donor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Obdarowany: <strong>[[donee_full_name]]</strong><br>Adres: [[donee_address]]<br>Nr dowodu: [[donee_id_number]]</p>
                                <br/>
                                <p>Temat: Umowa darowizny udziału [[share_fraction]] w mieszkaniu pod adresem <strong>[[apartment_address]]</strong>, numer księgi wieczystej <strong>[[land_and_mortgage_register_number]]</strong></p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym Darczyńca daruje, a Obdarowany przyjmuje darowiznę udziału wynoszącego <strong>[[share_fraction]]</strong> w wyżej wymienionym mieszkaniu.</p>
                                <p>Darczyńca oświadcza, że darowany udział jest wolny od obciążeń i roszczeń osób trzecich.</p>
                                <p>Inne postanowienia: [[other_conditions]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Darczyńca</p></td>
                                <td width="50%"><p>___________________<br>Obdarowany</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>To jest dokument wzorcowy i służy wyłącznie celom informacyjnym. Zdecydowanie zaleca się zasięgnięcie porady prawnej u notariusza.</p></div>'
                    ]
                ]
            ],

            // --- Акт приема-передачи недвижимости при продаже / Real Estate Handover Protocol for Sale (Übergabeprotokoll Immobilie) ---
            [
                'slug' => 'real-estate-handover-protocol-sale-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"protocol_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia protokołu","en":"Protocol Date","uk":"Дата складання протоколу","de":"Datum der Protokollerstellung"}},
                    {"name":"seller_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko sprzedającego","en":"Seller\'s Full Name","uk":"ПІБ продавця","de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedającego","en":"Seller\'s Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"buyer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kupującego","en":"Buyer\'s Full Name","uk":"ПІБ покупця","de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres kupującego","en":"Buyer\'s Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"meter_readings","type":"textarea","required":true,"labels":{"pl":"Stany liczników (prąd, woda, gaz, ogrzewanie)","en":"Meter readings (electricity, water, gas, heating)","uk":"Показники лічильників (електрика, вода, газ, опалення)","de":"Zählerstände (Strom, Wasser, Gas, Heizung)"}},
                    {"name":"keys_transferred","type":"text","required":true,"labels":{"pl":"Liczba przekazanych kluczy","en":"Number of keys transferred","uk":"Кількість переданих ключів","de":"Anzahl der übergebenen Schlüssel"}},
                    {"name":"property_condition","type":"textarea","required":true,"labels":{"pl":"Stan techniczny nieruchomości i ewentualne wady","en":"Technical condition of the property and any defects","uk":"Технічний стан нерухомості та можливі недоліки","de":"Technischer Zustand der Immobilie und eventuelle Mängel"}},
                    {"name":"other_notes","type":"textarea","required":false,"labels":{"pl":"Inne uwagi (np. wyposażenie pozostawione)","en":"Other notes (e.g., equipment left behind)","uk":"Інші примітки (напр., залишене обладнання)","de":"Weitere Anmerkungen (z.B. zurückgelassene Ausstattung)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Übergabeprotokoll Immobilie beim Verkauf',
                        'description' => 'Dokument zur Bestätigung der Übergabe einer Immobilie vom Verkäufer an den Käufer, einschließlich Zählerständen und Zustand.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ÜBERGABEPROTOKOLL IMMOBILIE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[protocol_date]]</p></td><td style="text-align: right;"><p>Verkäufer: <strong>[[seller_full_name]]</strong><br>Adresse: [[seller_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Käufer: <strong>[[buyer_full_name]]</strong><br>Adresse: [[buyer_address]]</p>
                                <br/>
                                <p>Betreff: Übergabeprotokoll für die Immobilie in <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>Hiermit wird die Übergabe der oben genannten Immobilie vom Verkäufer an den Käufer dokumentiert.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Zählerstände bei Übergabe</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Übergebene Schlüssel</h2>
                                <p>Es wurden [[keys_transferred]] Schlüsselset(s) übergeben.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Zustand der Immobilie</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Weitere Anmerkungen</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Die Parteien bestätigen mit ihrer Unterschrift die Richtigkeit der Angaben in diesem Protokoll und den Zustand der Immobilie bei Übergabe.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Verkäufer (Übergeber)</p></td>
                                <td width="50%"><p>___________________<br>Käufer (Empfänger)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Real Estate Handover Protocol for Sale',
                        'description' => 'Document confirming the handover of real estate from the seller to the buyer, including meter readings and condition.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REAL ESTATE HANDOVER PROTOCOL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[protocol_date]]</p></td><td style="text-align: right;"><p>Seller: <strong>[[seller_full_name]]</strong><br>Address: [[seller_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Buyer: <strong>[[buyer_full_name]]</strong><br>Address: [[buyer_address]]</p>
                                <br/>
                                <p>Subject: Handover Protocol for the property at <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>This document records the handover of the above-mentioned property from the seller to the buyer.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Meter Readings at Handover</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Keys Transferred</h2>
                                <p>[[keys_transferred]] set(s) of keys have been transferred.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Condition of the Property</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Other Notes</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>The parties\' signatures confirm the accuracy of the information in this protocol and the condition of the property upon handover.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Seller (Transferor)</p></td>
                                <td width="50%"><p>___________________<br>Buyer (Recipient)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Акт прийому-передачі нерухомості при продажу',
                        'description' => 'Документ, що підтверджує передачу нерухомості від продавця до покупця, включаючи показники лічильників та стан.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ ПРИЙОМУ-ПЕРЕДАЧІ НЕРУХОМОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Продавець: <strong>[[seller_full_name]]</strong><br>Адреса: [[seller_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Покупець: <strong>[[buyer_full_name]]</strong><br>Адреса: [[buyer_address]]</p>
                                <br/>
                                <p>Тема: Акт прийому-передачі нерухомості за адресою <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>Цим документом фіксується передача вищезгаданої нерухомості від продавця до покупця.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Показники лічильників на момент передачі</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Передані ключі</h2>
                                <p>Передано [[keys_transferred]] комплект(ів) ключів.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Стан нерухомості</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Інші примітки</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Підписи сторін підтверджують відповідність інформації в цьому протоколі та стан нерухомості на момент передачі.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Продавець (Передавач)</p></td>
                                <td width="50%"><p>___________________<br>Покупець (Отримувач)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Protokół zdawczo-odbiorczy nieruchomości przy sprzedaży',
                        'description' => 'Dokument potwierdzający przekazanie nieruchomości od sprzedającego do kupującego, w tym stany liczników i stan nieruchomości.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ZDAWCZO-ODBIORCZY NIERUCHOMOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Sprzedający: <strong>[[seller_full_name]]</strong><br>Adres: [[seller_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Kupujący: <strong>[[buyer_full_name]]</strong><br>Adres: [[buyer_address]]</p>
                                <br/>
                                <p>Temat: Protokół zdawczo-odbiorczy nieruchomości pod adresem <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>Niniejszy dokument dokumentuje przekazanie wyżej wymienionej nieruchomości od sprzedającego do kupującego.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Stany liczników przy przekazaniu</h2>
                                <pre>[[meter_readings]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Przekazane klucze</h2>
                                <p>Przekazano [[keys_transferred]] komplet(ów) kluczy.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Stan nieruchomości</h2>
                                <p>[[property_condition]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Inne uwagi</h2>
                                <p>[[other_notes]]</p>
                                <br/>
                                <p>Podpisy stron potwierdzają zgodność danych zawartych w niniejszym protokole oraz stan nieruchomości przy przekazaniu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Sprzedający (przekazujący)</p></td>
                                <td width="50%"><p>___________________<br>Kupujący (odbierający)</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Соглашение о задатке / Deposit Agreement (Reservierungsvereinbarung / Anzahlungsvereinbarung) ---
            [
                'slug' => 'deposit-agreement-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"payer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wpłacającego zadatek","en":"Payer\'s Full Name","uk":"ПІБ платника завдатку","de":"Vollständiger Name des Einzahlers"}},
                    {"name":"payer_address","type":"text","required":true,"labels":{"pl":"Adres wpłacającego","en":"Payer\'s Address","uk":"Адреса платника","de":"Adresse des Einzahlers"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbierającego zadatek","en":"Recipient\'s Full Name","uk":"ПІБ одержувача завдатку","de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbierającego","en":"Recipient\'s Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"deposit_amount","type":"number","required":true,"labels":{"pl":"Kwota zadatku (Anzahlung)","en":"Deposit Amount","uk":"Сума завдатку","de":"Anzahlungsbetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"subject_of_agreement","type":"textarea","required":true,"labels":{"pl":"Przedmiot umowy, której dotyczy zadatek (np. kupno mieszkania, samochodu)","en":"Subject of the agreement to which the deposit relates (e.g., apartment purchase, car purchase)","uk":"Предмет договору, до якого стосується завдаток (напр., купівля квартири, автомобіля)","de":"Gegenstand des Vertrags, auf den sich die Anzahlung bezieht (z.B. Wohnungskauf, Autokauf)"}},
                    {"name":"final_agreement_date","type":"date","required":true,"labels":{"pl":"Planowana data zawarcia umowy głównej","en":"Planned date of concluding the main agreement","uk":"Планована дата укладення основного договору","de":"Geplantes Datum des Abschlusses des Hauptvertrags"}},
                    {"name":"consequences_of_non_performance","type":"textarea","required":false,"labels":{"pl":"Konsekwencje niewykonania umowy (opcjonalnie)","en":"Consequences of non-performance of the agreement (optional)","uk":"Наслідки невиконання договору (необов\'язково)","de":"Folgen der Nichterfüllung des Vertrags (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Reservierungsvereinbarung / Anzahlungsvereinbarung',
                        'description' => 'Vereinbarung über die Zahlung einer Anzahlung für einen zukünftigen Vertrag, insbesondere im Immobilienbereich. Beachten Sie die Formvorschriften für Immobilienverträge in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RESERVIERUNGSVEREINBARUNG / ANZAHLUNGSVEREINBARUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[agreement_date]]</p></td><td style="text-align: right;"><p>Einzahler: <strong>[[payer_full_name]]</strong><br>Adresse: [[payer_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Empfänger: <strong>[[recipient_full_name]]</strong><br>Adresse: [[recipient_address]]</p>
                                <br/>
                                <p>Betreff: Anzahlung für [[subject_of_agreement]]</p>
                                <br/>
                                <p>Hiermit zahlt der Einzahler an den Empfänger eine Anzahlung in Höhe von <strong>[[deposit_amount]] [[currency]]</strong> auf den Abschluss des Vertrages über [[subject_of_agreement]].</p>
                                <p>Der Hauptvertrag soll bis zum <strong>[[final_agreement_date]]</strong> abgeschlossen werden.</p>
                                <p>Folgen bei Nichterfüllung des Vertrages: [[consequences_of_non_performance]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Einzahler</p></td>
                                <td width="50%"><p>___________________<br>Empfänger</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>Dies ist ein Musterdokument und dient nur zu Informationszwecken. Eine rechtliche Beratung wird dringend empfohlen, insbesondere bezüglich der notariellen Beurkundung bei Immobilien.</p></div>'
                    ],
                    'en' => [
                        'title' => 'Deposit Agreement',
                        'description' => 'Agreement regulating the payment of a deposit for a future agreement, especially in the real estate sector. Note the formal requirements for real estate contracts in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DEPOSIT AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[agreement_date]]</p></td><td style="text-align: right;"><p>Payer: <strong>[[payer_full_name]]</strong><br>Address: [[payer_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Recipient: <strong>[[recipient_full_name]]</strong><br>Address: [[recipient_address]]</p>
                                <br/>
                                <p>Subject: Deposit for [[subject_of_agreement]]</p>
                                <br/>
                                <p>Hereby, the Payer pays to the Recipient a deposit of <strong>[[deposit_amount]] [[currency]]</strong> for the conclusion of the agreement regarding [[subject_of_agreement]].</p>
                                <p>The main agreement is to be concluded by <strong>[[final_agreement_date]]</strong>.</p>
                                <p>Consequences of non-performance of the agreement: [[consequences_of_non_performance]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Payer</p></td>
                                <td width="50%"><p>___________________<br>Recipient</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>This is a sample document and for informational purposes only. Legal advice is strongly recommended, especially regarding notarization for real estate.</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про завдаток',
                        'description' => 'Угода, що регулює сплату завдатку за майбутнім договором, зокрема у сфері нерухомості. Зверніть увагу на формальні вимоги до договорів нерухомості в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА ПРО ЗАВДАТОК</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Платник: <strong>[[payer_full_name]]</strong><br>Адреса: [[payer_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Отримувач: <strong>[[recipient_full_name]]</strong><br>Адреса: [[recipient_address]]</p>
                                <br/>
                                <p>Тема: Завдаток за [[subject_of_agreement]]</p>
                                <br/>
                                <p>Цим Платник сплачує Отримувачу завдаток у розмірі <strong>[[deposit_amount]] [[currency]]</strong> за укладення договору щодо [[subject_of_agreement]].</p>
                                <p>Основний договір має бути укладений до <strong>[[final_agreement_date]]</strong>.</p>
                                <p>Наслідки невиконання договору: [[consequences_of_non_performance]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Платник</p></td>
                                <td width="50%"><p>___________________<br>Отримувач</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"> Настійно рекомендується юридична консультація, особливо щодо нотаріального посвідчення для нерухомості.</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa zadatku',
                        'description' => 'Umowa regulująca wpłatę zadatku na poczet przyszłej umowy, zwłaszcza w sektorze nieruchomości. Należy zwrócić uwagę na wymogi formalne dotyczące umów nieruchomości w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA ZADATKU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Wpłacający: <strong>[[payer_full_name]]</strong><br>Adres: [[payer_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Odbierający: <strong>[[recipient_full_name]]</strong><br>Adres: [[recipient_address]]</p>
                                <br/>
                                <p>Temat: Zadatek za [[subject_of_agreement]]</p>
                                <br/>
                                <p>Niniejszym Wpłacający wpłaca, a Odbierający przyjmuje zadatek w wysokości <strong>[[deposit_amount]] [[currency]]</strong> na poczet zawarcia umowy dotyczącej [[subject_of_agreement]].</p>
                                <p>Umowa główna ma zostać zawarta do dnia <strong>[[final_agreement_date]]</strong>.</p>
                                <p>Konsekwencje niewykonania umowy: [[consequences_of_non_performance]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wpłacający</p></td>
                                <td width="50%"><p>___________________<br>Odbierający</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"><p>To jest dokument wzorcowy i służy wyłącznie celom informacyjnym. Zdecydowanie zaleca się zasięgnięcie porady prawnej, zwłaszcza w zakresie notarialnego poświadczenia nieruchomości.</p></div>'
                    ]
                ]
            ],

            // --- Согласие супруга на продажу недвижимости / Spouse's Consent to Property Sale (Ehegattenzustimmung zum Immobilienverkauf) ---
            [
                'slug' => 'spouses-consent-property-sale-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"consent_date","type":"date","required":true,"labels":{"pl":"Data wyrażenia zgody","en":"Consent Date","uk":"Дата надання згоди","de":"Datum der Zustimmung"}},
                    {"name":"consenting_spouse_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka wyrażającego zgodę","en":"Consenting Spouse\'s Full Name","uk":"ПІБ дружини/чоловіка, що дає згоду","de":"Vollständiger Name des zustimmenden Ehepartners"}},
                    {"name":"consenting_spouse_address","type":"text","required":true,"labels":{"pl":"Adres małżonka","en":"Consenting Spouse\'s Address","uk":"Адреса дружини/чоловіка","de":"Adresse des zustimmenden Ehepartners"}},
                    {"name":"consenting_spouse_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości małżonka","en":"Consenting Spouse\'s ID Number","uk":"Номер посвідчення дружини/чоловіка","de":"Ausweisnummer des zustimmenden Ehepartners"}},
                    {"name":"selling_spouse_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka sprzedającego","en":"Selling Spouse\'s Full Name","uk":"ПІБ дружини/чоловіка, що продає","de":"Vollständiger Name des verkaufenden Ehepartners"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej (Grundbuchblatt-Nr.)","en":"Land and Mortgage Register Number (Grundbuchblatt-Nr.)","uk":"Номер іпотечної книги (Grundbuchblatt-Nr.)","de":"Grundbuchblatt-Nr."}},
                    {"name":"legal_basis_consent","type":"textarea","required":true,"labels":{"pl":"Podstawa prawna zgody (np. § 1365 BGB)","en":"Legal basis for consent (e.g., § 1365 BGB)","uk":"Правова підстава згоди (напр., § 1365 BGB)","de":"Rechtsgrundlage der Zustimmung (z.B. § 1365 BGB)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Ehegattenzustimmung zum Immobilienverkauf',
                        'description' => 'Formelle Zustimmung eines Ehepartners zum Verkauf einer Immobilie, die zum gemeinschaftlichen Vermögen gehört, gemäß deutschem Familienrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EHEGATTENZUSTIMMUNG ZUM IMMOBILIENVERKAUF</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[consent_date]]</p></td><td style="text-align: right;"><p>Zustimmender Ehepartner: <strong>[[consenting_spouse_full_name]]</strong><br>Adresse: [[consenting_spouse_address]]<br>Ausweis-Nr.: [[consenting_spouse_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit willige ich, [[consenting_spouse_full_name]], in den Verkauf der Immobilie in <strong>[[property_address]]</strong>, Grundbuchblatt-Nr. <strong>[[land_and_mortgage_register_number]]</strong>, durch meinen Ehepartner <strong>[[selling_spouse_full_name]]</strong> ein.</p>
                                <p>Diese Zustimmung erfolgt gemäß [[legal_basis_consent]].</p>
                                <p>Ich bestätige, dass ich über die rechtlichen Konsequenzen dieser Zustimmung aufgeklärt wurde und diese freiwillig erteile.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[consenting_spouse_full_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Spouse\'s Consent to Property Sale',
                        'description' => 'Formal consent of one spouse to sell a property belonging to the joint assets, according to German family law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SPOUSE\'S CONSENT TO PROPERTY SALE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[consent_date]]</p></td><td style="text-align: right;"><p>Consenting Spouse: <strong>[[consenting_spouse_full_name]]</strong><br>Address: [[consenting_spouse_address]]<br>ID No.: [[consenting_spouse_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[consenting_spouse_full_name]]</strong>, hereby consent to the sale of the property located at <strong>[[property_address]]</strong>, Land and Mortgage Register No. <strong>[[land_and_mortgage_register_number]]</strong>, by my spouse <strong>[[selling_spouse_full_name]]</strong>.</p>
                                <p>This consent is given in accordance with [[legal_basis_consent]].</p>
                                <p>I confirm that I have been informed about the legal consequences of this consent and that I give it voluntarily.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Consenting Spouse</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Згода чоловіка/дружини на продаж нерухомості',
                        'description' => 'Формальна згода одного з подружжя на продаж нерухомості, що належить до спільного майна, згідно з німецьким сімейним правом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗГОДА ЧОЛОВІКА/ДРУЖИНИ НА ПРОДАЖ НЕРУХОМОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Згода чоловіка/дружини: <strong>[[consenting_spouse_full_name]]</strong><br>Адреса: [[consenting_spouse_address]]<br>Номер посвідчення: [[consenting_spouse_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим я, <strong>[[consenting_spouse_full_name]]</strong>, даю згоду на продаж нерухомості, розташованої за адресою <strong>[[property_address]]</strong>, номер іпотечної книги <strong>[[land_and_mortgage_register_number]]</strong>, моїм чоловіком/дружиною <strong>[[selling_spouse_full_name]]</strong>.</p>
                                <p>Ця згода надається відповідно до [[legal_basis_consent]].</p>
                                <p>Я підтверджую, що був/ла поінформований/на про правові наслідки цієї згоди і надаю її добровільно.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Згода чоловіка/дружини</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Zgoda małżonka na sprzedaż nieruchomości',
                        'description' => 'Formalna zgoda jednego z małżonków na sprzedaż nieruchomości należącej do majątku wspólnego, zgodnie z niemieckim prawem rodzinnym.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZGODA MAŁŻONKA NA SPRZEDAŻ NIERUCHOMOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Małżonek wyrażający zgodę: <strong>[[consenting_spouse_full_name]]</strong><br>Adres: [[consenting_spouse_address]]<br>Nr dowodu: [[consenting_spouse_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym ja, <strong>[[consenting_spouse_full_name]]</strong>, wyrażam zgodę na sprzedaż nieruchomości położonej pod adresem <strong>[[property_address]]</strong>, numer księgi wieczystej <strong>[[land_and_mortgage_register_number]]</strong>, przez mojego małżonka <strong>[[selling_spouse_full_name]]</strong>.</p>
                                <p>Zgoda ta jest udzielana zgodnie z [[legal_basis_consent]].</p>
                                <p>Oświadczam, że zostałem/łam poinformowany/a o skutkach prawnych niniejszej zgody i udzielam jej dobrowolnie.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Małżonek wyrażający zgodę</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Согласие супруга на покупку недвижимости / Spouse's Consent to Property Purchase (Ehegattenzustimmung zum Immobilienkauf) ---
            [
                'slug' => 'spouses-consent-property-purchase-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"consent_date","type":"date","required":true,"labels":{"pl":"Data wyrażenia zgody","en":"Consent Date","uk":"Дата надання згоди","de":"Datum der Zustimmung"}},
                    {"name":"consenting_spouse_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka wyrażającego zgodę","en":"Consenting Spouse\'s Full Name","uk":"ПІБ дружини/чоловіка, що дає згоду","de":"Vollständiger Name des zustimmenden Ehepartners"}},
                    {"name":"consenting_spouse_address","type":"text","required":true,"labels":{"pl":"Adres małżonka","en":"Consenting Spouse\'s Address","uk":"Адреса дружини/чоловіка","de":"Adresse des zustimmenden Ehepartners"}},
                    {"name":"consenting_spouse_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości małżonka","en":"Consenting Spouse\'s ID Number","uk":"Номер посвідчення дружини/чоловіка","de":"Ausweisnummer des zustimmenden Ehepartners"}},
                    {"name":"buying_spouse_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka kupującego","en":"Buying Spouse\'s Full Name","uk":"ПІБ дружини/чоловіка, що купує","de":"Vollständiger Name des kaufenden Ehepartners"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (planowanej do zakupu)","en":"Property Address (planned for purchase)","uk":"Адреса нерухомості (планованої до покупки)","de":"Adresse der Immobilie (geplant zum Kauf)"}},
                    {"name":"legal_basis_consent","type":"textarea","required":true,"labels":{"pl":"Podstawa prawna zgody (np. § 1365 BGB)","en":"Legal basis for consent (e.g., § 1365 BGB)","uk":"Правова підстава згоди (напр., § 1365 BGB)","de":"Rechtsgrundlage der Zustimmung (z.B. § 1365 BGB)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Ehegattenzustimmung zum Immobilienkauf',
                        'description' => 'Formelle Zustimmung eines Ehepartners zum Kauf einer Immobilie, die zum gemeinschaftlichen Vermögen gehören soll, gemäß deutschem Familienrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EHEGATTENZUSTIMMUNG ZUM IMMOBILIENKAUF</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[consent_date]]</p></td><td style="text-align: right;"><p>Zustimmender Ehepartner: <strong>[[consenting_spouse_full_name]]</strong><br>Adresse: [[consenting_spouse_address]]<br>Ausweis-Nr.: [[consenting_spouse_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit willige ich, [[consenting_spouse_full_name]], in den Kauf der Immobilie in <strong>[[property_address]]</strong> durch meinen Ehepartner <strong>[[buying_spouse_full_name]]</strong> ein.</p>
                                <p>Diese Zustimmung erfolgt gemäß [[legal_basis_consent]].</p>
                                <p>Ich bestätige, dass ich über die rechtlichen Konsequenzen dieser Zustimmung aufgeklärt wurde und diese freiwillig erteile, insbesondere, dass die erworbene Immobilie Teil unseres gemeinsamen Vermögens wird.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Zustimmender Ehepartner</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Spouse\'s Consent to Property Purchase',
                        'description' => 'Formal consent of one spouse to purchase a property that is to become part of the joint assets, according to German family law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SPOUSE\'S CONSENT TO PROPERTY PURCHASE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[consent_date]]</p></td><td style="text-align: right;"><p>Consenting Spouse: <strong>[[consenting_spouse_full_name]]</strong><br>Address: [[consenting_spouse_address]]<br>ID No.: [[consenting_spouse_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[consenting_spouse_full_name]]</strong>, hereby consent to the purchase of the property located at <strong>[[property_address]]</strong> by my spouse <strong>[[buying_spouse_full_name]]</strong>.</p>
                                <p>This consent is given in accordance with [[legal_basis_consent]].</p>
                                <p>I confirm that I have been informed about the legal consequences of this consent and that I give it voluntarily, especially that the acquired property will become part of our joint property.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Consenting Spouse</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Згода чоловіка/дружини на купівлю нерухомості',
                        'description' => 'Формальна згода одного з подружжя на купівлю нерухомості, яка має увійти до спільного майна, згідно з німецьким сімейним правом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗГОДА ЧОЛОВІКА/ДРУЖИНИ НА КУПІВЛЮ НЕРУХОМОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Згода чоловіка/дружини: <strong>[[consenting_spouse_full_name]]</strong><br>Адреса: [[consenting_spouse_address]]<br>Номер посвідчення: [[consenting_spouse_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим я, <strong>[[consenting_spouse_full_name]]</strong>, даю згоду на купівлю нерухомості, розташованої за адресою <strong>[[property_address]]</strong>, моїм чоловіком/дружиною <strong>[[buying_spouse_full_name]]</strong>.</p>
                                <p>Ця згода надається відповідно до [[legal_basis_consent]].</p>
                                <p>Я підтверджую, що був/ла поінформований/на про правові наслідки цієї згоди і надаю її добровільно, зокрема, що придбана нерухомість увійде до складу нашого спільного майна.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Згода чоловіка/дружини</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Zgoda małżonka na zakup nieruchomości',
                        'description' => 'Formalna zgoda jednego z małżonków na zakup nieruchomości, która ma wejść do majątku wspólnego, zgodnie z niemieckim prawem rodzinnym.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZGODA MAŁŻONKA NA ZAKUP NIERUCHOMOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Małżonek wyrażający zgodę: <strong>[[consenting_spouse_full_name]]</strong><br>Adres: [[consenting_spouse_address]]<br>Nr dowodu: [[consenting_spouse_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym ja, <strong>[[consenting_spouse_full_name]]</strong>, wyrażam zgodę na zakup nieruchomości położonej pod adresem <strong>[[property_address]]</strong>, przez mojego małżonka <strong>[[buying_spouse_full_name]]</strong>.</p>
                                <p>Zgoda ta jest udzielana zgodnie z [[legal_basis_consent]].</p>
                                <p>Oświadczam, że zostałem/łam poinformowany/a o skutkach prawnych niniejszej zgody i udzielam jej dobrowolnie, w szczególności, że nabyta nieruchomość wejdzie w skład naszego majątku wspólnego.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Małżonek wyrażający zgodę</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Заявление в управляющую компанию (ЖЭК, ОСМД) / Application to Management Company (Hausverwaltung, WEG) ---
            [
                'slug' => 'application-management-company-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania wnioskodawcy","en":"Applicant\'s Residential Address","uk":"Адреса проживання заявника","de":"Wohnadresse des Antragstellers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail wnioskodawcy","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail заявника","de":"Telefon und E-Mail des Antragstellers"}},
                    {"name":"management_company_name","type":"text","required":true,"labels":{"pl":"Nazwa zarządcy nieruchomości/wspólnoty mieszkaniowej","en":"Property Manager/Homeowners Association Name","uk":"Назва управителя нерухомості/ОСББ","de":"Name der Hausverwaltung/WEG"}},
                    {"name":"management_company_address","type":"text","required":true,"labels":{"pl":"Adres zarządcy/wspólnoty","en":"Property Manager/Homeowners Association Address","uk":"Адреса управителя/ОСББ","de":"Adresse der Hausverwaltung/WEG"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (budynku/jednostki)","en":"Property Address (building/unit)","uk":"Адреса нерухомості (будівлі/одиниці)","de":"Adresse der Immobilie (Gebäude/Einheit)"}},
                    {"name":"request_subject","type":"text","required":true,"labels":{"pl":"Przedmiot wniosku","en":"Subject of Request","uk":"Предмет запиту","de":"Gegenstand des Antrags"}},
                    {"name":"request_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły wniosku (opis problemu/prośby)","en":"Request details (description of problem/request)","uk":"Деталі запиту (опис проблеми/прохання)","de":"Details des Antrags (Beschreibung des Problems/der Anfrage)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag an die Hausverwaltung / WEG-Verwaltung',
                        'description' => 'Antrag an die Hausverwaltung oder Wohnungseigentümergemeinschaft (WEG) bezüglich verschiedener Anliegen, z.B. Reparaturen, Informationen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AN DIE HAUSVERWALTUNG / WEG-VERWALTUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Betreff: Antrag bezüglich der Immobilie <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit stelle ich einen Antrag bezüglich [[request_subject]].</p>
                                <p>Details meines Anliegens:</p>
                                <p>[[request_details]]</p>
                                <p>Ich bitte Sie höflich um schnelle Bearbeitung meines Anliegens und um eine Rückmeldung.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Application to Management Company / HOA Management',
                        'description' => 'Application to the property management or homeowners association (WEG) regarding various concerns, e.g., repairs, information.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APPLICATION TO MANAGEMENT COMPANY / HOA MANAGEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Applicant: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Subject: Application regarding the property <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby submit an application regarding [[request_subject]].</p>
                                <p>Details of my concern:</p>
                                <p>[[request_details]]</p>
                                <p>I kindly request prompt processing of my request and a response.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Applicant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява до керуючої компанії (ЖЕК, ОСББ)',
                        'description' => 'Заява до керуючої компанії або об\'єднання співвласників багатоквартирного будинку (WEG) щодо різних питань, напр., ремонтів, інформації.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА ДО КЕРУЮЧОЇ КОМПАНІЇ / WEG-УПРАВЛІННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Заявник: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Тема: Заява щодо нерухомості <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю заяву щодо [[request_subject]].</p>
                                <p>Деталі мого звернення:</p>
                                <p>[[request_details]]</p>
                                <p>Прошу Вас швидко розглянути моє звернення та надати відповідь.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek do zarządcy nieruchomości / wspólnoty mieszkaniowej (WEG)',
                        'description' => 'Wniosek do zarządcy nieruchomości lub wspólnoty mieszkaniowej (WEG) dotyczący różnych spraw, np. napraw, informacji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WNIOSEK DO ZARZĄDCY NIERUCHOMOŚCI / WSPÓLNOTY MIESZKANIOWEJ (WEG)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wnioskodawca: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Temat: Wniosek dotyczący nieruchomości <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam wniosek dotyczący [[request_subject]].</p>
                                <p>Szczegóły mojego wniosku:</p>
                                <p>[[request_details]]</p>
                                <p>Proszę o szybkie rozpatrzenie mojego wniosku i o informację zwrotną.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wnioskodawca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Заявление о протечке крыши / Roof Leak Application (Meldung Dachschaden / Wasserschaden) ---
            [
                'slug' => 'roof-leak-application-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania wnioskodawcy","en":"Applicant\'s Residential Address","uk":"Адреса проживання заявника","de":"Wohnadresse des Antragstellers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail wnioskodawcy","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail заявника","de":"Telefon und E-Mail des Antragstellers"}},
                    {"name":"management_company_name","type":"text","required":true,"labels":{"pl":"Nazwa zarządcy nieruchomości/wspólnoty mieszkaniowej","en":"Property Manager/Homeowners Association Name","uk":"Назва управителя нерухомості/ОСББ","de":"Name der Hausverwaltung/WEG"}},
                    {"name":"management_company_address","type":"text","required":true,"labels":{"pl":"Adres zarządcy/wspólnoty","en":"Property Manager/Homeowners Association Address","uk":"Адреса управителя/ОСББ","de":"Adresse der Hausverwaltung/WEG"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (budynku/jednostki)","en":"Property Address (building/unit)","uk":"Адреса нерухомості (будівлі/одиниці)","de":"Adresse der Immobilie (Gebäude/Einheit)"}},
                    {"name":"leak_location","type":"text","required":true,"labels":{"pl":"Miejsce przecieku (np. dach, okno, rura)","en":"Leak location (e.g., roof, window, pipe)","uk":"Місце протікання (напр., дах, вікно, труба)","de":"Ort des Lecks (z.B. Dach, Fenster, Rohr)"}},
                    {"name":"leak_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis przecieku i powstałych szkód","en":"Detailed description of leak and resulting damage","uk":"Детальний опис протікання та завданих збитків","de":"Detaillierte Beschreibung des Lecks und der entstandenen Schäden"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"pl":"Data zauważenia przecieku","en":"Date leak noticed","uk":"Дата виявлення протікання","de":"Datum der Feststellung des Lecks"}},
                    {"name":"requested_action","type":"textarea","required":true,"labels":{"pl":"Żądane działania (np. usunięcie awarii, naprawa szkód)","en":"Requested actions (e.g., fault repair, damage repair)","uk":"Затребувані дії (напр., усунення аварії, ремонт пошкоджень)","de":"Gewünschte Maßnahmen (z.B. Fehlerbehebung, Schadensbehebung)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Meldung eines Dachschadens / Wasserschadens',
                        'description' => 'Meldung an die Hausverwaltung oder WEG-Verwaltung über einen Dach- oder Wasserschaden mit der Bitte um Behebung und Schadensregulierung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MELDUNG EINES DACHSCHADENS / WASSERSCHADENS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Betreff: Meldung eines Wasserschadens in der Immobilie <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit melde ich einen Wasserschaden / Dachschaden in meiner Wohnung / im Gebäude, den ich am <strong>[[incident_date]]</strong> bemerkt habe.</p>
                                <p>Ort des Lecks: <strong>[[leak_location]]</strong>.</p>
                                <p>Detaillierte Beschreibung des Lecks und der entstandenen Schäden:</p>
                                <p>[[leak_description]]</p>
                                <p>Ich bitte Sie höflich um [[requested_action]].</p>
                                <p>Bitte nehmen Sie schnellstmöglich Kontakt mit mir auf, um das weitere Vorgehen zu besprechen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Roof Leak Application',
                        'description' => 'Notification to the property management or HOA management about a roof or water damage, requesting repair and damage settlement.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ROOF LEAK / WATER DAMAGE NOTIFICATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Applicant: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Subject: Notification of water damage at property <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby report a water damage / roof leak in my apartment / building, which I noticed on <strong>[[incident_date]]</strong>.</p>
                                <p>Leak location: <strong>[[leak_location]]</strong>.</p>
                                <p>Detailed description of the leak and resulting damage:</p>
                                <p>[[leak_description]]</p>
                                <p>I kindly request [[requested_action]].</p>
                                <p>Please contact me as soon as possible to discuss the further procedure.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Applicant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про протікання даху',
                        'description' => 'Повідомлення керуючій компанії або управлінню WEG про пошкодження даху або затоплення з проханням про усунення та врегулювання збитків.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОВІДОМЛЕННЯ ПРО ПОШКОДЖЕННЯ ДАХУ / ЗАТОПЛЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Заявник: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Тема: Повідомлення про пошкодження водою в нерухомості <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я повідомляю про пошкодження водою / даху в моїй квартирі / будівлі, яке я помітив/ла <strong>[[incident_date]]</strong>.</p>
                                <p>Місце протікання: <strong>[[leak_location]]</strong>.</p>
                                <p>Детальний опис протікання та завданих збитків:</p>
                                <p>[[leak_description]]</p>
                                <p>Прошу Вас [[requested_action]].</p>
                                <p>Будь ласка, зв\'яжіться зі мною якомога швидше, щоб обговорити подальші дії.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Zgłoszenie przecieku dachu / zalania',
                        'description' => 'Zgłoszenie do zarządcy nieruchomości lub zarządu wspólnoty mieszkaniowej (WEG) o uszkodzeniu dachu lub zalaniu, z prośbą o usunięcie i uregulowanie szkód.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZGŁOSZENIE PRZECIEKU DACHU / ZALANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wnioskodawca: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[management_company_name]]</strong><br>[[management_company_address]]</p>
                                <br/>
                                <p>Temat: Zgłoszenie szkody wodnej w nieruchomości <strong>[[property_address]]</strong></p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym zgłaszam szkodę wodną / przeciek dachu w moim mieszkaniu / budynku, który zauważyłem/łam w dniu <strong>[[incident_date]]</strong>.</p>
                                <p>Miejsce przecieku: <strong>[[leak_location]]</strong>.</p>
                                <p>Szczegółowy opis przecieku i powstałych szkód:</p>
                                <p>[[leak_description]]</p>
                                <p>Proszę o [[requested_action]].</p>
                                <p>Proszę o jak najszybszy kontakt w celu omówienia dalszego postępowania.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wnioskodawca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],
            // --- Жалоба на соседей (на шум, затопление) / Complaint about Neighbors (Noise, Flooding) ---
            [
                'slug' => 'complaint-neighbors-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"complaint_date","type":"date","required":true,"labels":{"pl":"Data złożenia skargi","en":"Complaint Date","uk":"Дата подання скарги","de":"Datum der Beschwerde"}},
                    {"name":"complainant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko skarżącego","en":"Complainant\'s Full Name","uk":"ПІБ скаржника","de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania skarżącego","en":"Complainant\'s Residential Address","uk":"Адреса проживання скаржника","de":"Wohnadresse des Beschwerdeführers"}},
                    {"name":"complainant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail skarżącego","en":"Complainant\'s Phone & Email","uk":"Телефон та e-mail скаржника","de":"Telefon und E-Mail des Beschwerdeführers"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"pl":"Nazwa zarządcy nieruchomości/właściciela","en":"Property Manager/Owner Name","uk":"Назва управителя нерухомості/власника","de":"Name der Hausverwaltung/des Eigentümers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres zarządcy/właściciela","en":"Property Manager/Owner Address","uk":"Адреса управителя/власника","de":"Adresse der Hausverwaltung/des Eigentümers"}},
                    {"name":"neighbor_address_or_unit","type":"text","required":true,"labels":{"pl":"Adres/numer mieszkania sąsiada","en":"Neighbor\'s Address/Unit Number","uk":"Адреса/номер квартири сусіда","de":"Adresse/Wohnungsnummer des Nachbarn"}},
                    {"name":"complaint_type","type":"text","required":true,"labels":{"pl":"Typ skargi (np. hałas, zalanie, nieporządek)","en":"Complaint type (e.g., noise, flooding, mess)","uk":"Тип скарги (напр., шум, затоплення, безлад)","de":"Beschwerdeart (z.B. Lärm, Überschwemmung, Unordnung)"}},
                    {"name":"incident_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły incydentów (daty, godziny, opis, świadkowie)","en":"Incident details (dates, times, description, witnesses)","uk":"Деталі інцидентів (дати, час, опис, свідки)","de":"Details der Vorfälle (Daten, Uhrzeiten, Beschreibung, Zeugen)"}},
                    {"name":"requested_action","type":"textarea","required":true,"labels":{"pl":"Żądane działania (np. upomnienie, interwencja)","en":"Requested action (e.g., warning, intervention)","uk":"Затребувані дії (напр., попередження, втручання)","de":"Gewünschte Maßnahmen (z.B. Abmahnung, Intervention)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. zdjęcia, nagrania, protokoły)","en":"Attachments (e.g., photos, recordings, protocols)","uk":"Додатки (напр., фото, записи, протоколи)","de":"Anhänge (z.B. Fotos, Aufnahmen, Protokolle)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Beschwerde über Nachbarn (Lärm, Überschwemmung etc.)',
                        'description' => 'Formelle Beschwerde über störendes Verhalten von Nachbarn, gerichtet an die Hausverwaltung oder den Eigentümer, gemäß deutschem Mietrecht/WEG-Recht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BESCHWERDE ÜBER NACHBARN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Absender: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[complaint_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[recipient_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit reiche ich Beschwerde über das Verhalten der Bewohner der Wohnung/Einheit [[neighbor_address_or_unit]] ein, betreffend [[complaint_type]].</p>
                                <p>Detaillierte Beschreibung der Vorfälle:</p>
                                <p>[[incident_details]]</p>
                                <p>Ich fordere Sie auf, folgende Maßnahmen zu ergreifen: [[requested_action]]</p>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <p>Ich bitte um eine Bestätigung des Eingangs dieser Beschwerde und um Mitteilung der weiteren Vorgehensweise.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Beschwerdeführer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Complaint about Neighbors (Noise, Flooding, etc.)',
                        'description' => 'Formal complaint about disturbing behavior of neighbors, addressed to the property management or owner, according to German tenancy law/WEG law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">COMPLAINT ABOUT NEIGHBORS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Sender: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[complaint_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[recipient_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby file a complaint regarding the behavior of the residents of apartment/unit [[neighbor_address_or_unit]], concerning [[complaint_type]].</p>
                                <p>Detailed description of the incidents:</p>
                                <p>[[incident_details]]</p>
                                <p>I request you to take the following actions: [[requested_action]]</p>
                                <p>Enclosed please find: [[attachments]].</p>
                                <p>I kindly request a confirmation of receipt of this complaint and information on further proceedings.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Complainant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Скарга на сусідів (шум, затоплення тощо)',
                        'description' => 'Формальна скарга на обтяжливу поведінку сусідів, адресована управителю нерухомості або власнику, згідно з німецьким орендним правом/правом ВМС.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">СКАРГА НА СУСІДІВ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Відправник: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[recipient_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю скаргу на поведінку мешканців квартири/одиниці [[neighbor_address_or_unit]], щодо [[complaint_type]].</p>
                                <p>Детальний опис інцидентів:</p>
                                <p>[[incident_details]]</p>
                                <p>Я вимагаю від Вас вжити наступних заходів: [[requested_action]]</p>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <p>Прошу підтвердити отримання цієї скарги та повідомити про подальші дії.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Скаржник</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Skarga na sąsiadów (hałas, zalanie itp.)',
                        'description' => 'Formalna skarga dotycząca uciążliwego zachowania sąsiadów, skierowana do zarządcy nieruchomości lub właściciela, zgodnie z niemieckim prawem najmu/prawem WEG.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SKARGA NA SĄSIADÓW</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Nadawca: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[recipient_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam skargę dotyczącą zachowania mieszkańców lokalu/jednostki [[neighbor_address_or_unit]], w sprawie [[complaint_type]].</p>
                                <p>Szczegółowy opis incydentów:</p>
                                <p>[[incident_details]]</p>
                                <p>Żądam od Państwa podjęcia następujących działań: [[requested_action]]</p>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <p>Proszę o potwierdzenie otrzymania niniejszej skargi i informację o dalszym postępowaniu.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Skarżący</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Протокол общего собрания жильцов дома / Protocol of General Meeting of House Residents (Protokoll der Eigentümerversammlung) ---
            [
                'slug' => 'protocol-general-meeting-residents-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"meeting_date","type":"date","required":true,"labels":{"pl":"Data zebrania","en":"Meeting Date","uk":"Дата зборів","de":"Datum der Versammlung"}},
                    {"name":"meeting_time","type":"text","required":true,"labels":{"pl":"Godzina rozpoczęcia zebrania","en":"Meeting Start Time","uk":"Час початку зборів","de":"Beginn der Versammlung"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości (budynku)","en":"Property Address (building)","uk":"Адреса нерухомості (будівлі)","de":"Adresse der Immobilie (Gebäude)"}},
                    {"name":"organizer_name","type":"text","required":true,"labels":{"pl":"Nazwa organizatora (np. Zarządca WEG, Zarząd Wspólnoty Mieszkaniowej)","en":"Organizer Name (e.g., WEG Administrator, Housing Community Board)","uk":"Назва організатора (напр., Управитель ВМС, Правління ОСББ)","de":"Name des Veranstalters (z.B. WEG-Verwalter, Vorstand der Wohnungseigentümergemeinschaft)"}},
                    {"name":"participants_count","type":"number","required":true,"labels":{"pl":"Liczba obecnych właścicieli/mieszkańców","en":"Number of owners/residents present","uk":"Кількість присутніх власників/мешканців","de":"Anzahl der anwesenden Eigentümer/Bewohner"}},
                    {"name":"agenda_items","type":"textarea","required":true,"labels":{"pl":"Porządek obrad (punkty)","en":"Agenda items","uk":"Пункти порядку денного","de":"Tagesordnungspunkte"}},
                    {"name":"resolutions","type":"textarea","required":true,"labels":{"pl":"Podjęte uchwały/decyzje","en":"Resolutions/decisions made","uk":"Прийняті рішення/постанови","de":"Gefasste Beschlüsse/Entscheidungen"}},
                    {"name":"voting_results","type":"textarea","required":false,"labels":{"pl":"Wyniki głosowań (opcjonalnie)","en":"Voting results (optional)","uk":"Результаты голосования (необязательно)","de":"Abstimmungsergebnisse (optional)"}},
                    {"name":"chairman_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko przewodniczącego zebrania","en":"Chairman\'s Full Name","uk":"ПІБ голови зборів","de":"Vollständiger Name des Versammlungsleiters"}},
                    {"name":"secretary_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko protokolanta","en":"Secretary\'s Full Name","uk":"ПІБ секретаря","de":"Vollständiger Name des Protokollführers"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Protokoll der Eigentümerversammlung / Bewohnerversammlung',
                        'description' => 'Offizielles Protokoll, das den Verlauf und die Beschlüsse einer Versammlung der Wohnungseigentümer oder Bewohner dokumentiert, gemäß WEG-Gesetz oder Mietrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKOLL DER EIGENTÜMERVERSAMMLUNG / BEWOHNERVERSAMMLUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[meeting_date]], Uhrzeit: [[meeting_time]]</p></td><td style="text-align: right;"><p>Immobilienadresse: <strong>[[property_address]]</strong></p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Veranstalter: <strong>[[organizer_name]]</strong></p>
                                <p>Anzahl der anwesenden Eigentümer/Bewohner: [[participants_count]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Tagesordnung</h2>
                                <pre>[[agenda_items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Gefasste Beschlüsse/Entscheidungen</h2>
                                <pre>[[resolutions]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Abstimmungsergebnisse (optional)</h2>
                                <pre>[[voting_results]]</pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vorsitzender der Versammlung<br>([[chairman_full_name]])</p></td>
                                <td width="50%"><p>___________________<br>Protokollführer<br>([[secretary_full_name]])</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Protocol of General Meeting of House Residents',
                        'description' => 'Official protocol documenting the proceedings and resolutions adopted at a meeting of apartment owners or residents, according to WEG law or tenancy law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOCOL OF GENERAL MEETING OF RESIDENTS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[meeting_date]], Time: [[meeting_time]]</p></td><td style="text-align: right;"><p>Property Address: <strong>[[property_address]]</strong></p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Organizer: <strong>[[organizer_name]]</strong></p>
                                <p>Number of owners/residents present: [[participants_count]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Agenda Items</h2>
                                <pre>[[agenda_items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Resolutions/Decisions Made</h2>
                                <pre>[[resolutions]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Voting Results (optional)</h2>
                                <pre>[[voting_results]]</pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Chairman of the Meeting<br>([[chairman_full_name]])</p></td>
                                <td width="50%"><p>___________________<br>Secretary<br>([[secretary_full_name]])</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Протокол загальних зборів мешканців будинку',
                        'description' => 'Офіційний протокол, що документує хід та рішення, прийняті на зборах власників квартир або мешканців, згідно з Законом про ВМС або орендним правом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПРОТОКОЛ ЗАГАЛЬНИХ ЗБОРІВ МЕШКАНЦІВ БУДИНКУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: [[meeting_date]] р., Час: [[meeting_time]]</p></td><td style="text-align: right;"><p>Адреса нерухомості: <strong>[[property_address]]</strong></p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Організатор: <strong>[[organizer_name]]</strong></p>
                                <p>Кількість присутніх власників/мешканців: [[participants_count]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Порядок денний</h2>
                                <pre>[[agenda_items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Прийняті рішення/постанови</h2>
                                <pre>[[resolutions]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Результати голосування (необов\'язково)</h2>
                                <pre>[[voting_results]]</pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Голова зборів<br>([[chairman_full_name]])</p></td>
                                <td width="50%"><p>___________________<br>Секретар<br>([[secretary_full_name]])</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Protokół zebrania właścicieli / mieszkańców',
                        'description' => 'Oficjalny protokół dokumentujący przebieg i uchwały podjęte na zebraniu właścicieli mieszkań lub mieszkańców, zgodnie z ustawą o WEG lub prawem najmu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ Z ZEBRANIA WŁAŚCICIELI / MIESZKAŃCÓW</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: [[meeting_date]], Godzina: [[meeting_time]]</p></td><td style="text-align: right;"><p>Adres nieruchomości: <strong>[[property_address]]</strong></p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Organizator: <strong>[[organizer_name]]</strong></p>
                                <p>Liczba obecnych właścicieli/mieszkańców: [[participants_count]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Porządek obrad</h2>
                                <pre>[[agenda_items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Podjęte uchwały/decyzje</h2>
                                <pre>[[resolutions]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Wyniki głosowań (opcjonalnie)</h2>
                                <pre>[[voting_results]]</pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Przewodniczący zebrania<br>([[chairman_full_name]])</p></td>
                                <td width="50%"><p>___________________<br>Protokolant<br>([[secretary_full_name]])</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Доверенность на продажу/покупку недвижимости / Power of Attorney for Real Estate Sale/Purchase (Vollmacht für Immobilienangelegenheiten) ---
            [
                'slug' => 'power-of-attorney-real-estate-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"principal_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości mocodawcy (np. dowód osobisty, paszport)","en":"Principal\'s ID Document Type (e.g., ID card, passport)","uk":"Тип документа, що посвідчує особу довірителя (напр., паспорт, закордонний паспорт)","de":"Art des Ausweisdokuments des Vollmachtgebers (z.B. Personalausweis, Reisepass)"}},
                    {"name":"principal_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości mocodawcy","en":"Principal\'s ID Document Number","uk":"Номер документа, що посвідчує особу довірителя","de":"Nummer des Ausweisdokuments des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","en":"Agent\'s Full Name","uk":"ПІБ повіреного","de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"agent_address","type":"text","required":true,"labels":{"pl":"Adres pełnomocnika","en":"Agent\'s Address","uk":"Адреса повіреного","de":"Adresse des Bevollmächtigten"}},
                    {"name":"agent_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości pełnomocnika (np. dowód osobisty, paszport)","en":"Agent\'s ID Document Type (e.g., ID card, passport)","uk":"Тип документа, що посвідчує особу повіреного (напр., паспорт, закордонний паспорт)","de":"Art des Ausweisdokuments des Bevollmächtigten (z.B. Personalausweis, Reisepass)"}},
                    {"name":"agent_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości pełnomocnika","en":"Agent\'s ID Document Number","uk":"Номер документа, що посвідчує особу повіреного","de":"Nummer des Ausweisdokuments des Bevollmächtigten"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"pl":"Adres nieruchomości","en":"Property Address","uk":"Адреса нерухомості","de":"Adresse der Immobilie"}},
                    {"name":"land_and_mortgage_register_number","type":"text","required":true,"labels":{"pl":"Numer księgi wieczystej","en":"Land and Mortgage Register Number","uk":"Номер іпотечної книги","de":"Grundbuchnummer"}},
                    {"name":"scope_of_authority","type":"textarea","required":true,"labels":{"pl":"Zakres pełnomocnictwa (np. sprzedaż, zakup, zarządzanie, reprezentacja przed notariuszem)","en":"Scope of authority (e.g., sale, purchase, management, representation before a notary)","uk":"Обсяг повноважень (напр., продаж, купівля, управління, представництво перед нотаріусом)","de":"Umfang der Vollmacht (z.B. Verkauf, Kauf, Verwaltung, Vertretung vor dem Notar)"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Okres ważności pełnomocnictwa (opcjonalnie)","en":"Validity period of power of attorney (optional)","uk":"Термін дії довіреності (необов\'язково)","de":"Gültigkeitsdauer der Vollmacht (optional)"}},
                    {"name":"notarization_note","type":"textarea","required":true,"labels":{"pl":"Uwaga o konieczności notarialnego poświadczenia","en":"Note on the necessity of notarization","uk":"Примітка про необхідність нотаріального посвідчення","de":"Hinweis zur Notwendigkeit der notariellen Beurkundung"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Vollmacht für Immobilienangelegenheiten (Verkauf/Kauf)',
                        'description' => 'Dokument, das den Bevollmächtigten ermächtigt, im Namen des Vollmachtgebers in Immobilienangelegenheiten zu handeln. Für die Wirksamkeit ist in der Regel eine notarielle Beurkundung erforderlich.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vollmachtgeber: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>Ausweis: [[principal_id_type]] [[principal_id_number]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Bevollmächtigter: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>Ausweis: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>Hiermit erteile ich, [[principal_full_name]], Herrn/Frau [[agent_full_name]] Vollmacht, mich in allen Angelegenheiten betreffend die Immobilie in <strong>[[property_address]]</strong>, eingetragen im Grundbuch unter Nr. <strong>[[land_and_mortgage_register_number]]</strong>, zu vertreten.</p>
                                <p>Der Umfang der Vollmacht umfasst insbesondere: [[scope_of_authority]]</p>
                                <p>Die Vollmacht ist gültig [[validity_period]].</p>
                                <br/>
                                <p><strong>Wichtiger Hinweis:</strong> [[notarization_note]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vollmachtgeber</p></td>
                                <td width="50%"><p>___________________<br>Bevollmächtigter</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Real Estate Matters (Sale/Purchase)',
                        'description' => 'Document authorizing the agent to act on behalf of the principal in real estate matters. Notarization is generally required for validity.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Principal: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>ID: [[principal_id_type]] [[principal_id_number]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Agent: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>ID: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>I, [[principal_full_name]], hereby grant power of attorney to Mr./Ms. [[agent_full_name]] to represent me in all matters concerning the property located at <strong>[[property_address]]</strong>, registered in the Land and Mortgage Register under No. <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <p>The scope of authority includes, in particular: [[scope_of_authority]]</p>
                                <p>This Power of Attorney is valid [[validity_period]].</p>
                                <br/>
                                <p><strong>Important Note:</strong> [[notarization_note]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Principal</p></td>
                                <td width="50%"><p>___________________<br>Agent</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на операції з нерухомістю (продаж/купівля)',
                        'description' => 'Документ, що уповноважує повіреного діяти від імені довірителя у справах, пов\'язаних з нерухомістю. Для чинності, як правило, вимагається нотаріальне посвідчення.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Довіритель: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>Посвідчення: [[principal_id_type]] [[principal_id_number]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Повірений: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>Посвідчення: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>Цим я, [[principal_full_name]], надаю Пану/Пані [[agent_full_name]] довіреність представляти мене у всіх справах, що стосуються нерухомості, розташованої за адресою <strong>[[property_address]]</strong>, зареєстрованої в іпотечній книзі за № <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <p>Обсяг повноважень включає, зокрема: [[scope_of_authority]]</p>
                                <p>Довіреність дійсна [[validity_period]].</p>
                                <br/>
                                <p><strong>Важлива примітка:</strong> [[notarization_note]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Довіритель</p></td>
                                <td width="50%"><p>___________________<br>Повірений</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Pełnomocnictwo do spraw nieruchomości (sprzedaż/zakup)',
                        'description' => 'Dokument uprawniający pełnomocnika do działania w imieniu mocodawcy w sprawach związanych z nieruchomościami. Do ważności zazwyczaj wymagane jest notarialne poświadczenie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Mocodawca: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>Dowód: [[principal_id_type]] [[principal_id_number]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Pełnomocnik: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>Dowód: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>Niniejszym ja, [[principal_full_name]], udzielam Panu/Pani [[agent_full_name]] pełnomocnictwa do reprezentowania mnie we wszelkich sprawach dotyczących nieruchomości położonej pod adresem <strong>[[property_address]]</strong>, wpisanej do księgi wieczystej pod numerem <strong>[[land_and_mortgage_register_number]]</strong>.</p>
                                <p>Zakres pełnomocnictwa obejmuje w szczególności: [[scope_of_authority]]</p>
                                <p>Pełnomocnictwo jest ważne [[validity_period]].</p>
                                <br/>
                                <p><strong>Ważna uwaga:</strong> [[notarization_note]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Mocodawca</p></td>
                                <td width="50%"><p>___________________<br>Pełnomocnik</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
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
                'country_code' => $data['country_code'] ?? 'DE',
                'fields' => json_decode($data['fields'], true),
            ]
        );

        if (isset($data['translations']) && is_array($data['translations'])) {
            foreach ($data['translations'] as $locale => $transData) {

                $transData['header_html'] = $transData['header_html'] ?? ($data['translations']['de']['header_html'] ?? '');
                $transData['body_html'] = $transData['body_html'] ?? ($data['translations']['de']['body_html'] ?? '');
                $transData['footer_html'] = $transData['footer_html'] ?? ($data['translations']['de']['footer_html'] ?? '');

                $template->translations()->updateOrCreate(['locale' => $locale], $transData);
            }
        }
    }
}
