<?php

namespace Database\Seeders\DE;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class DeCarsTravelSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'automobiles-de')->first();
        if (!$category) {
            $this->command->error('Category with slug "automobiles-de" not found.');
            return;
        }


        $templatesData = [

// --- Договор купли-продажи автомобиля / Car Sale Agreement (Kaufvertrag Kraftfahrzeug) ---
            [
                'slug' => 'car-sale-agreement-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"seller_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko sprzedającego","en":"Seller\'s Full Name","uk":"ПІБ продавця","de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedającego","en":"Seller\'s Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"seller_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości sprzedającego","en":"Seller\'s ID Document Type","uk":"Тип документа, що посвідчує особу продавця","de":"Art des Ausweisdokuments des Verkäufers"}},
                    {"name":"seller_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości sprzedającego","en":"Seller\'s ID Document Number","uk":"Номер документа, що посвідчує особу продавця","de":"Nummer des Ausweisdokuments des Verkäufers"}},
                    {"name":"buyer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kupującego","en":"Buyer\'s Full Name","uk":"ПІБ покупця","de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres kupującego","en":"Buyer\'s Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"buyer_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości kupującego","en":"Buyer\'s ID Document Type","uk":"Тип документа, що посвідчує особу покупця","de":"Art des Ausweisdokuments des Käufers"}},
                    {"name":"buyer_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości kupującego","en":"Buyer\'s ID Document Number","uk":"Номер документа, що посвідчує особу покупця","de":"Nummer des Ausweisdokuments des Käufers"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"car_year","type":"number","required":true,"labels":{"pl":"Rok produkcji","en":"Year of Manufacture","uk":"Рік випуску","de":"Baujahr"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN","en":"VIN Number","uk":"Номер VIN","de":"FIN-Nummer"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny","en":"License Plate Number","uk":"Номерний знак","de":"Kennzeichen"}},
                    {"name":"odometer_reading","type":"number","required":true,"labels":{"pl":"Przebieg (km)","en":"Odometer Reading (km)","uk":"Пробіг (км)","de":"Kilometerstand (km)"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"pl":"Cena sprzedaży (EUR)","en":"Sale Price (EUR)","uk":"Ціна продажу (EUR)","de":"Verkaufspreis (EUR)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}},
                    {"name":"car_condition_declaration","type":"textarea","required":true,"labels":{"pl":"Oświadczenie o stanie pojazdu (wady, uszkodzenia)","en":"Declaration on vehicle condition (defects, damage)","uk":"Заява про стан транспортного засобу (дефекти, пошкодження)","de":"Zustandserklärung des Fahrzeugs (Mängel, Schäden)"}},
                    {"name":"documents_handed_over","type":"textarea","required":true,"labels":{"pl":"Przekazane dokumenty (np. dowód rejestracyjny, dowód własności)","en":"Documents handed over (e.g., registration certificate, proof of ownership)","uk":"Передані документи (напр., свідоцтво про реєстрацію, документ, що підтверджує право власності)","de":"Übergebene Dokumente (z.B. Zulassungsbescheinigung, Eigentumsnachweis)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Kaufvertrag Kraftfahrzeug',
                        'description' => 'Standardkaufvertrag für ein gebrauchtes Kraftfahrzeug in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KAUFVERTRAG KRAFTFAHRZEUG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Verkäufer: <strong>[[seller_full_name]]</strong><br>[[seller_address]]<br>Ausweis: [[seller_id_type]] [[seller_id_number]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Käufer: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>Ausweis: [[buyer_id_type]] [[buyer_id_number]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Kaufgegenstand</h2>
                                <p>Verkauft wird das Kraftfahrzeug:</p>
                                <ul>
                                    <li>Marke: <strong>[[car_make]]</strong></li>
                                    <li>Modell: <strong>[[car_model]]</strong></li>
                                    <li>Baujahr: <strong>[[car_year]]</strong></li>
                                    <li>Fahrzeug-Identifizierungsnummer (FIN): <strong>[[vin_number]]</strong></li>
                                    <li>Amtliches Kennzeichen: <strong>[[license_plate]]</strong></li>
                                    <li>Kilometerstand: <strong>[[odometer_reading]] km</strong></li>
                                </ul>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Kaufpreis und Zahlungsbedingungen</h2>
                                <p>Der Kaufpreis beträgt: <strong>[[sale_price]] [[currency]]</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Zustand des Fahrzeugs</h2>
                                <p>Der Verkäufer erklärt zum Zustand des Fahrzeugs: [[car_condition_declaration]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Übergabe und Dokumente</h2>
                                <p>Das Fahrzeug wird mit folgenden Dokumenten übergeben: [[documents_handed_over]]</p>
                                <p>Der Käufer bestätigt den Erhalt des Fahrzeugs und der genannten Dokumente.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Schlussbestimmungen</h2>
                                <p>Dieser Vertrag unterliegt deutschem Recht. Mündliche Nebenabreden bestehen nicht.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Verkäufer</p></td>
                                <td width="50%"><p>___________________<br>Käufer</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Car Sale Agreement',
                        'description' => 'Standard car sale agreement for a used vehicle in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CAR SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Seller: <strong>[[seller_full_name]]</strong><br>[[seller_address]]<br>ID: [[seller_id_type]] [[seller_id_number]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Buyer: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>ID: [[buyer_id_type]] [[buyer_id_number]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Subject of Sale</h2>
                                <p>The motor vehicle is sold:</p>
                                <ul>
                                    <li>Make: <strong>[[car_make]]</strong></li>
                                    <li>Model: <strong>[[car_model]]</strong></li>
                                    <li>Year of Manufacture: <strong>[[car_year]]</strong></li>
                                    <li>Vehicle Identification Number (VIN): <strong>[[vin_number]]</strong></li>
                                    <li>License Plate: <strong>[[license_plate]]</strong></li>
                                    <li>Odometer Reading: <strong>[[odometer_reading]] km</strong></li>
                                </ul>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Purchase Price and Payment Terms</h2>
                                <p>The purchase price is: <strong>[[sale_price]] [[currency]]</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Vehicle Condition</h2>
                                <p>The seller declares regarding the vehicle\'s condition: [[car_condition_declaration]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Handover and Documents</h2>
                                <p>The vehicle is handed over with the following documents: [[documents_handed_over]]</p>
                                <p>The buyer confirms receipt of the vehicle and the mentioned documents.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Final Provisions</h2>
                                <p>This contract is subject to German law. No verbal ancillary agreements exist.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Seller</p></td>
                                <td width="50%"><p>___________________<br>Buyer</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір купівлі-продажу автомобіля',
                        'description' => 'Стандартний договір купівлі-продажу вживаного транспортного засобу в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР КУПІВЛІ-ПРОДАЖУ АВТОМОБІЛЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Продавець: <strong>[[seller_full_name]]</strong><br>[[seller_address]]<br>Посвідчення: [[seller_id_type]] [[seller_id_number]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Покупець: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>Посвідчення: [[buyer_id_type]] [[buyer_id_number]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Предмет продажу</h2>
                                <p>Продається транспортний засіб:</p>
                                <ul>
                                    <li>Марка: <strong>[[car_make]]</strong></li>
                                    <li>Модель: <strong>[[car_model]]</strong></li>
                                    <li>Рік випуску: <strong>[[car_year]]</strong></li>
                                    <li>Ідентифікаційний номер транспортного засобу (VIN): <strong>[[vin_number]]</strong></li>
                                    <li>Державний номерний знак: <strong>[[license_plate]]</strong></li>
                                    <li>Показник одометра: <strong>[[odometer_reading]] км</strong></li>
                                </ul>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Ціна покупки та умови оплати</h2>
                                <p>Ціна покупки становить: <strong>[[sale_price]] [[currency]]</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Стан транспортного засобу</h2>
                                <p>Продавець заявляє про стан транспортного засобу: [[car_condition_declaration]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Передача та документи</h2>
                                <p>Транспортний засіб передається з наступними документами: [[documents_handed_over]]</p>
                                <p>Покупець підтверджує отримання транспортного засобу та зазначених документів.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Прикінцеві положення</h2>
                                <p>Цей договір регулюється німецьким законодавством. Усні додаткові домовленості відсутні.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Продавець</p></td>
                                <td width="50%"><p>___________________<br>Покупець</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa kupna-sprzedaży samochodu',
                        'description' => 'Standardowa umowa kupna-sprzedaży pojazdu używanego w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA KUPNA-SPRZEDAŻY SAMOCHODU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Sprzedający: <strong>[[seller_full_name]]</strong><br>[[seller_address]]<br>Dowód: [[seller_id_type]] [[seller_id_number]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Kupujący: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>Dowód: [[buyer_id_type]] [[buyer_id_number]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Przedmiot sprzedaży</h2>
                                <p>Sprzedaje się pojazd mechaniczny:</p>
                                <ul>
                                    <li>Marka: <strong>[[car_make]]</strong></li>
                                    <li>Model: <strong>[[car_model]]</strong></li>
                                    <li>Rok produkcji: <strong>[[car_year]]</strong></li>
                                    <li>Numer identyfikacyjny pojazdu (FIN): <strong>[[vin_number]]</strong></li>
                                    <li>Numer rejestracyjny: <strong>[[license_plate]]</strong></li>
                                    <li>Przebieg: <strong>[[odometer_reading]] km</strong></li>
                                </ul>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Cena zakupu i warunki płatności</h2>
                                <p>Cena zakupu wynosi: <strong>[[sale_price]] [[currency]]</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Stan pojazdu</h2>
                                <p>Sprzedający oświadcza o stanie pojazdu: [[car_condition_declaration]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Przekazanie i dokumenty</h2>
                                <p>Pojazd zostaje przekazany wraz z następującymi dokumentami: [[documents_handed_over]]</p>
                                <p>Kupujący potwierdza odbiór pojazdu i wymienionych dokumentów.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Postanowienia końcowe</h2>
                                <p>Niniejsza umowa podlega prawu niemieckiemu. Nie istnieją żadne ustne uzgodnienia dodatkowe.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Sprzedający</p></td>
                                <td width="50%"><p>___________________<br>Kupujący</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Акт приема-передачи автомобиля / Car Handover Protocol (Übergabeprotokoll Fahrzeug) ---
            [
                'slug' => 'car-handover-protocol-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"protocol_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia protokołu","en":"Protocol Date","uk":"Дата складання протоколу","de":"Datum der Protokollerstellung"}},
                    {"name":"transferor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko przekazującego","en":"Transferor\'s Full Name","uk":"ПІБ передавача","de":"Vollständiger Name des Übergebers"}},
                    {"name":"transferor_address","type":"text","required":true,"labels":{"pl":"Adres przekazującego","en":"Transferor\'s Address","uk":"Адреса передавача","de":"Adresse des Übergebers"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbierającego","en":"Recipient\'s Full Name","uk":"ПІБ отримувача","de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbierającego","en":"Recipient\'s Address","uk":"Адреса отримувача","de":"Adresse des Empfängers"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN","en":"VIN Number","uk":"Номер VIN","de":"FIN-Nummer"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny","en":"License Plate Number","uk":"Номерний знак","de":"Kennzeichen"}},
                    {"name":"odometer_reading","type":"number","required":true,"labels":{"pl":"Aktualny przebieg (km)","en":"Current Odometer Reading (km)","uk":"Поточний пробіг (км)","de":"Aktueller Kilometerstand (km)"}},
                    {"name":"fuel_level","type":"text","required":true,"labels":{"pl":"Poziom paliwa","en":"Fuel Level","uk":"Рівень палива","de":"Kraftstoffstand"}},
                    {"name":"car_condition_description","type":"textarea","required":true,"labels":{"pl":"Opis stanu technicznego i wizualnego pojazdu (uszkodzenia, wyposażenie)","en":"Description of technical and visual condition of vehicle (damage, equipment)","uk":"Опис технічного та візуального стану транспортного засобу (пошкодження, обладнання)","de":"Beschreibung des technischen und optischen Zustands des Fahrzeugs (Schäden, Ausstattung)"}},
                    {"name":"documents_transferred","type":"textarea","required":true,"labels":{"pl":"Przekazane dokumenty (np. dowód rejestracyjny, karta pojazdu, polisa OC)","en":"Documents transferred (e.g., registration certificate, vehicle card, liability insurance policy)","uk":"Передані документи (напр., свідоцтво про реєстрацію, техпаспорт, поліс ОСЦПВ)","de":"Übergebene Dokumente (z.B. Zulassungsbescheinigung, Fahrzeugschein, Haftpflichtversicherung)"}},
                    {"name":"keys_transferred","type":"number","required":true,"labels":{"pl":"Liczba przekazanych kluczy","en":"Number of keys transferred","uk":"Кількість переданих ключів","de":"Anzahl der übergebenen Schlüssel"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Übergabeprotokoll Fahrzeug',
                        'description' => 'Dokument, das die Übergabe eines Fahrzeugs zwischen den Parteien bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ÜBERGABEPROTOKOLL FAHRZEUG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[protocol_date]]</p></td><td style="text-align: right;"><p>Übergeber: <strong>[[transferor_full_name]]</strong><br>[[transferor_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Empfänger: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Gegenstand des Protokolls</h2>
                                <p>Gegenstand des Protokolls ist die Übergabe des Fahrzeugs:</p>
                                <ul>
                                    <li>Marke: <strong>[[car_make]]</strong></li>
                                    <li>Modell: <strong>[[car_model]]</strong></li>
                                    <li>FIN: <strong>[[vin_number]]</strong></li>
                                    <li>Kennzeichen: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Zustand des Fahrzeugs bei Übergabe</h2>
                                <p>Aktueller Kilometerstand: <strong>[[odometer_reading]] km</strong>.</p>
                                <p>Kraftstoffstand: [[fuel_level]].</p>
                                <p>Beschreibung des technischen und optischen Zustands: [[car_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Übergebene Dokumente und Schlüssel</h2>
                                <p>Übergebene Dokumente: [[documents_transferred]]</p>
                                <p>Anzahl der übergebenen Schlüssel: [[keys_transferred]]</p>
                                <br/>
                                <p>Die Parteien bestätigen die Übereinstimmung des Ist-Zustandes mit diesem Protokoll.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Übergeber</p></td>
                                <td width="50%"><p>___________________<br>Empfänger</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Car Handover Protocol',
                        'description' => 'A document confirming the handover of a vehicle between the parties.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CAR HANDOVER PROTOCOL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[protocol_date]]</p></td><td style="text-align: right;"><p>Transferor: <strong>[[transferor_full_name]]</strong><br>[[transferor_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Recipient: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Subject of the Protocol</h2>
                                <p>The subject of the protocol is the handover of the vehicle:</p>
                                <ul>
                                    <li>Make: <strong>[[car_make]]</strong></li>
                                    <li>Model: <strong>[[car_model]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>License Plate: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Vehicle Condition at Handover</h2>
                                <p>Current odometer reading: <strong>[[odometer_reading]] km</strong>.</p>
                                <p>Fuel level: [[fuel_level]].</p>
                                <p>Description of technical and visual condition: [[car_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Documents and Keys Transferred</h2>
                                <p>Documents transferred: [[documents_transferred]]</p>
                                <p>Number of keys transferred: [[keys_transferred]]</p>
                                <br/>
                                <p>The parties confirm the conformity of the factual state with this protocol.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Transferor</p></td>
                                <td width="50%"><p>___________________<br>Recipient</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Акт прийому-передачі автомобіля',
                        'description' => 'Документ, що підтверджує передачу транспортного засобу між сторонами.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ ПРИЙОМУ-ПЕРЕДАЧІ АВТОМОБІЛЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: [[protocol_date]]</p></td><td style="text-align: right;"><p>Передавач: <strong>[[transferor_full_name]]</strong><br>[[transferor_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Отримувач: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Предмет протоколу</h2>
                                <p>Предметом протоколу є передача транспортного засобу:</p>
                                <ul>
                                    <li>Марка: <strong>[[car_make]]</strong></li>
                                    <li>Модель: <strong>[[car_model]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>Номерний знак: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Стан транспортного засобу на момент передачі</h2>
                                <p>Поточний пробіг: <strong>[[odometer_reading]] км</strong>.</p>
                                <p>Рівень палива: [[fuel_level]].</p>
                                <p>Опис технічного та візуального стану: [[car_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Передані документи та ключі</h2>
                                <p>Передані документи: [[documents_transferred]]</p>
                                <p>Кількість переданих ключів: [[keys_transferred]]</p>
                                <br/>
                                <p>Підписи сторін підтверджують відповідність фактичного стану цьому протоколу.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Передавач</p></td>
                                <td width="50%"><p>___________________<br>Отримувач</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Protokół zdawczo-odbiorczy samochodu',
                        'description' => 'Dokument potwierdzający przekazanie pojazdu pomiędzy stronami umowy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ZDAWCZO-ODBIORCZY SAMOCHODU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: [[protocol_date]]</p></td><td style="text-align: right;"><p>Przekazujący: <strong>[[transferor_full_name]]</strong><br>[[transferor_address]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Odbierający: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Przedmiot protokołu</h2>
                                <p>Przedmiotem protokołu jest przekazanie pojazdu:</p>
                                <ul>
                                    <li>Marka: <strong>[[car_make]]</strong></li>
                                    <li>Model: <strong>[[car_model]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>Rejestracja: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Stan pojazdu w chwili przekazania</h2>
                                <p>Aktualny przebieg: <strong>[[odometer_reading]] km</strong>.</p>
                                <p>Poziom paliwa: [[fuel_level]].</p>
                                <p>Opis stanu technicznego i wizualnego: [[car_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Przekazane dokumenty i klucze</h2>
                                <p>Przekazane dokumenty: [[documents_transferred]]</p>
                                <p>Liczba przekazanych kluczy: [[keys_transferred]]</p>
                                <br/>
                                <p>Podpisy stron potwierdzają zgodność stanu faktycznego z niniejszym protokołem.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Przekazujący</p></td>
                                <td width="50%"><p>___________________<br>Odbierający</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Расписка в получении денег за автомобиль / Receipt of Money for Car (Quittung über den Erhalt des Kaufpreises für ein Kraftfahrzeug) ---
            [
                'slug' => 'receipt-money-car-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"receipt_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pokwitowania","en":"Receipt Date","uk":"Дата видачі розписки","de":"Datum der Quittung"}},
                    {"name":"payer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wpłacającego","en":"Payer\'s Full Name","uk":"ПІБ платника","de":"Vollständiger Name des Zahlers"}},
                    {"name":"payer_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości wpłacającego","en":"Payer\'s ID Document Type","uk":"Тип документа, що посвідчує особу платника","de":"Art des Ausweisdokuments des Zahlers"}},
                    {"name":"payer_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości wpłacającego","en":"Payer\'s ID Document Number","uk":"Номер документа, що посвідчує особу платника","de":"Nummer des Ausweisdokuments des Zahlers"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbierającego","en":"Recipient\'s Full Name","uk":"ПІБ отримувача","de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości odbierającego","en":"Recipient\'s ID Document Type","uk":"Тип документа, що посвідчує особу отримувача","de":"Art des Ausweisdokuments des Empfängers"}},
                    {"name":"recipient_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości odbierającego","en":"Recipient\'s ID Document Number","uk":"Номер документа, що посвідчує особу отримувача","de":"Nummer des Ausweisdokuments des Empfängers"}},
                    {"name":"amount_received","type":"number","required":true,"labels":{"pl":"Otrzymana kwota (EUR)","en":"Amount Received (EUR)","uk":"Отримана сума (EUR)","de":"Erhaltener Betrag (EUR)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN pojazdu","en":"Vehicle VIN Number","uk":"Номер VIN транспортного засобу","de":"FIN-Nummer des Fahrzeugs"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny pojazdu","en":"Vehicle License Plate Number","uk":"Номерний знак транспортного засобу","de":"Kennzeichen des Fahrzeugs"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Quittung über den Erhalt des Kaufpreises für ein Kraftfahrzeug',
                        'description' => 'Dokument, das den Erhalt der Zahlung für ein verkauftes Fahrzeug bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">QUITTUNG ÜBER DEN ERHALT DES KAUFPREISES</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[receipt_date]]</p></td><td style="text-align: right;"><p>Empfänger: <strong>[[recipient_full_name]]</strong><br>Ausweis: [[recipient_id_type]] [[recipient_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zahler: <strong>[[payer_full_name]]</strong><br>Ausweis: [[payer_id_type]] [[payer_id_number]]</p>
                                <br/>
                                <p>Hiermit bestätigt der Empfänger, [[recipient_full_name]], den Erhalt von <strong>[[amount_received]] [[currency]]</strong> von dem Zahler, [[payer_full_name]].</p>
                                <p>Der oben genannte Betrag stellt die Zahlung für das Fahrzeug der Marke: <strong>[[car_make]]</strong>, Modell: <strong>[[car_model]]</strong>, FIN-Nummer: <strong>[[vin_number]]</strong>, Kennzeichen: <strong>[[license_plate]]</strong> dar.</p>
                                <p>Mit Erhalt dieses Betrags sind alle finanziellen Verpflichtungen im Zusammenhang mit dem Kauf des angegebenen Fahrzeugs vollständig erfüllt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Empfängers)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Receipt of Money for Car',
                        'description' => 'A document confirming receipt of payment for a sold vehicle.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECEIPT OF MONEY FOR CAR</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[receipt_date]]</p></td><td style="text-align: right;"><p>Recipient: <strong>[[recipient_full_name]]</strong><br>ID: [[recipient_id_type]] [[recipient_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Payer: <strong>[[payer_full_name]]</strong><br>ID: [[payer_id_type]] [[payer_id_number]]</p>
                                <br/>
                                <p>Hereby, the recipient, [[recipient_full_name]], confirms the receipt of <strong>[[amount_received]] [[currency]]</strong> from the payer, [[payer_full_name]].</p>
                                <p>The above amount constitutes payment for the vehicle make: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, VIN number: <strong>[[vin_number]]</strong>, license plate number: <strong>[[license_plate]]</strong>.</p>
                                <p>Upon receipt of this amount, all financial obligations related to the purchase of the indicated vehicle are fully satisfied.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Recipient\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Розписка про отримання грошей за автомобіль',
                        'description' => 'Документ, що підтверджує отримання оплати за проданий транспортний засіб.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РОЗПИСКА ПРО ОТРИМАННЯ ГРОШЕЙ ЗА АВТОМОБІЛЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: [[receipt_date]]</p></td><td style="text-align: right;"><p>Отримувач: <strong>[[recipient_full_name]]</strong><br>Посвідчення: [[recipient_id_type]] [[recipient_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Платник: <strong>[[payer_full_name]]</strong><br>Посвідчення: [[payer_id_type]] [[payer_id_number]]</p>
                                <br/>
                                <p>Цим отримувач, [[recipient_full_name]], підтверджує отримання <strong>[[amount_received]] [[currency]]</strong> від платника, [[payer_full_name]].</p>
                                <p>Вищезазначена сума становить оплату за транспортний засіб марки: <strong>[[car_make]]</strong>, модель: <strong>[[car_model]]</strong>, номер VIN: <strong>[[vin_number]]</strong>, номерний знак: <strong>[[license_plate]]</strong>.</p>
                                <p>Після отримання цієї суми всі фінансові зобов\'язання, пов\'язані з купівлею зазначеного транспортного засобу, повністю виконані.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис отримувача)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pokwitowanie odbioru pieniędzy za samochód',
                        'description' => 'Dokument potwierdzający otrzymanie zapłaty za sprzedany pojazd.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POKWITOWANIE ODBIORU PIENIĘDZY ZA SAMOCHÓD</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: [[receipt_date]]</p></td><td style="text-align: right;"><p>Odbierający: <strong>[[recipient_full_name]]</strong><br>Dowód: [[recipient_id_type]] [[recipient_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wpłacający: <strong>[[payer_full_name]]</strong><br>Dowód: [[payer_id_type]] [[payer_id_number]]</p>
                                <br/>
                                <p>Niniejszym odbierający, [[recipient_full_name]], potwierdza otrzymanie kwoty <strong>[[amount_received]] [[currency]]</strong> od wpłacającego, [[payer_full_name]].</p>
                                <p>Powyższa kwota stanowi zapłatę za pojazd marki: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, numer VIN: <strong>[[vin_number]]</strong>, numer rejestracyjny: <strong>[[license_plate]]</strong>.</p>
                                <p>Z chwilą otrzymania tej kwoty, wszelkie zobowiązania finansowe związane z zakupem wskazanego pojazdu zostały w pełni uregulowane.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis odbierającego)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Доверенность на управление автомобилем / Power of Attorney for Car Management (Vollmacht zur Fahrzeugverwaltung) ---
            [
                'slug' => 'poa-car-management-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"principal_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości mocodawcy","en":"Principal\'s ID Document Type","uk":"Тип документа, що посвідчує особу довірителя","de":"Art des Ausweisdokuments des Vollmachtgebers"}},
                    {"name":"principal_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości mocodawcy","en":"Principal\'s ID Document Number","uk":"Номер документа, що посвідчує особу довірителя","de":"Nummer des Ausweisdokuments des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","en":"Agent\'s Full Name","uk":"ПІБ повіреного","de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"agent_address","type":"text","required":true,"labels":{"pl":"Adres pełnomocnika","en":"Agent\'s Address","uk":"Адреса повіреного","de":"Adresse des Bevollmächtigten"}},
                    {"name":"agent_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości pełnomocnika","en":"Agent\'s ID Document Type","uk":"Тип документа, що посвідчує особу повіреного","de":"Art des Ausweisdokuments des Bevollmächtigten"}},
                    {"name":"agent_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości pełnomocnika","en":"Agent\'s ID Document Number","uk":"Номер документа, що посвідчує особу повіреного","de":"Nummer des Ausweisdokuments des Bevollmächtigten"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN pojazdu","en":"Vehicle VIN Number","uk":"Номер VIN транспортного засобу","de":"FIN-Nummer des Fahrzeugs"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny pojazdu","en":"Vehicle License Plate Number","uk":"Номерний знак транспортного засобу","de":"Kennzeichen des Fahrzeugs"}},
                    {"name":"scope_of_authority","type":"textarea","required":true,"labels":{"pl":"Zakres pełnomocnictwa (np. prowadzenie, parkowanie, reprezentacja w urzędach)","en":"Scope of authority (e.g., driving, parking, representation in offices)","uk":"Обсяг повноважень (напр., керування, паркування, представництво в установах)","de":"Umfang der Vollmacht (z.B. Fahren, Parken, Vertretung bei Behörden)"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Okres ważności pełnomocnictwa (opcjonalnie)","en":"Validity period of power of attorney (optional)","uk":"Термін дії довіреності (необов\'язково)","de":"Gültigkeitsdauer der Vollmacht (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Vollmacht zur Fahrzeugverwaltung',
                        'description' => 'Dokument, das den Bevollmächtigten ermächtigt, ein Fahrzeug im Namen des Eigentümers zu verwalten und zu nutzen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[poa_date]]</p></td><td style="text-align: right;"><p>Vollmachtgeber: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>Ausweis: [[principal_id_type]] [[principal_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Bevollmächtigter: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>Ausweis: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>Hiermit erteile ich, [[principal_full_name]], Herrn/Frau <strong>[[agent_full_name]]</strong> Vollmacht, mich in allen Angelegenheiten betreffend das Kraftfahrzeug:</p>
                                <ul>
                                    <li>Marke: <strong>[[car_make]]</strong></li>
                                    <li>Modell: <strong>[[car_model]]</strong></li>
                                    <li>FIN: <strong>[[vin_number]]</strong></li>
                                    <li>Kennzeichen: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>zu vertreten. Der Umfang der Vollmacht umfasst insbesondere: [[scope_of_authority]]</p>
                                <p>Diese Vollmacht ist gültig [[validity_period]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vollmachtgeber</p></td>
                                <td width="50%"><p>___________________<br>Bevollmächtigter</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Car Management',
                        'description' => 'A document authorizing an agent to manage and use a vehicle on behalf of the owner.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[poa_date]]</p></td><td style="text-align: right;"><p>Principal: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>ID: [[principal_id_type]] [[principal_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Agent: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>ID: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>I, [[principal_full_name]], hereby grant power of attorney to Mr./Ms. <strong>[[agent_full_name]]</strong> to manage and use the vehicle:</p>
                                <ul>
                                    <li>Make: <strong>[[car_make]]</strong></li>
                                    <li>Model: <strong>[[car_model]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>License Plate: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>The scope of authority includes: [[scope_of_authority]]</p>
                                <p>This Power of Attorney is valid [[validity_period]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Principal</p></td>
                                <td width="50%"><p>___________________<br>Agent</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на управління автомобілем',
                        'description' => 'Документ, що уповноважує повіреного на управління та користування транспортним засобом від імені власника.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: [[poa_date]]</p></td><td style="text-align: right;"><p>Довіритель: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>Посвідчення: [[principal_id_type]] [[principal_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Повірений: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>Посвідчення: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>Цим я, [[principal_full_name]], надаю Пану/Пані <strong>[[agent_full_name]]</strong> довіреність на управління та користування транспортним засобом:</p>
                                <ul>
                                    <li>Марка: <strong>[[car_make]]</strong></li>
                                    <li>Модель: <strong>[[car_model]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>Номерний знак: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>Обсяг повноважень включає: [[scope_of_authority]]</p>
                                <p>Довіреність дійсна [[validity_period]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Довіритель</p></td>
                                <td width="50%"><p>___________________<br>Повірений</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Pełnomocnictwo do zarządzania pojazdem',
                        'description' => 'Dokument uprawniający pełnomocnika do zarządzania i korzystania z pojazdu w imieniu właściciela.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: [[poa_date]]</p></td><td style="text-align: right;"><p>Mocodawca: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>Dowód: [[principal_id_type]] [[principal_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Pełnomocnik: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>Dowód: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>Niniejszym ja, [[principal_full_name]], udzielam Panu/Pani <strong>[[agent_full_name]]</strong> pełnomocnictwa do zarządzania i korzystania z pojazdu marki:</p>
                                <ul>
                                    <li>Marka: <strong>[[car_make]]</strong></li>
                                    <li>Model: <strong>[[car_model]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>Rejestracja: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>Zakres pełnomocnictwa obejmuje: [[scope_of_authority]]</p>
                                <p>Niniejsze pełnomocnictwo jest ważne [[validity_period]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Mocodawca</p></td>
                                <td width="50%"><p>___________________<br>Pełnomocnik</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Доверенность на продажу автомобиля / Power of Attorney for Car Sale (Vollmacht zum Autoverkauf) ---
            [
                'slug' => 'poa-car-sale-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"principal_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości mocodawcy","en":"Principal\'s ID Document Type","uk":"Тип документа, що посвідчує особу довірителя","de":"Art des Ausweisdokuments des Vollmachtgebers"}},
                    {"name":"principal_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości mocodawcy","en":"Principal\'s ID Document Number","uk":"Номер документа, що посвідчує особу довірителя","de":"Nummer des Ausweisdokuments des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","en":"Agent\'s Full Name","uk":"ПІБ повіреного","de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"agent_address","type":"text","required":true,"labels":{"pl":"Adres pełnomocnika","en":"Agent\'s Address","uk":"Адреса повіреного","de":"Adresse des Bevollmächtigten"}},
                    {"name":"agent_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości pełnomocnika","en":"Agent\'s ID Document Type","uk":"Тип документа, що посвідчує особу повіреного","de":"Art des Ausweisdokuments des Bevollmächtigten"}},
                    {"name":"agent_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości pełnomocnika","en":"Agent\'s ID Document Number","uk":"Номер документа, що посвідчує особу повіреного","de":"Nummer des Ausweisdokuments des Bevollmächtigten"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN pojazdu","en":"Vehicle VIN Number","uk":"Номер VIN транспортного засобу","de":"FIN-Nummer des Fahrzeugs"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny pojazdu","en":"Vehicle License Plate Number","uk":"Номерний знак транспортного засобу","de":"Kennzeichen des Fahrzeugs"}},
                    {"name":"min_sale_price","type":"number","required":false,"labels":{"pl":"Minimalna cena sprzedaży (opcjonalnie)","en":"Minimum sale price (optional)","uk":"Мінімальна ціна продажу (необов\'язково)","de":"Mindestverkaufspreis (optional)"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Okres ważności pełnomocnictwa (opcjonalnie)","en":"Validity period of power of attorney (optional)","uk":"Термін дії довіреності (необов\'язково)","de":"Gültigkeitsdauer der Vollmacht (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Vollmacht zum Autoverkauf',
                        'description' => 'Dokument, das den Bevollmächtigten ermächtigt, ein Fahrzeug im Namen des Eigentümers zu verkaufen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[poa_date]]</p></td><td style="text-align: right;"><p>Vollmachtgeber: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>Ausweis: [[principal_id_type]] [[principal_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Bevollmächtigter: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>Ausweis: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>Hiermit erteile ich, [[principal_full_name]], Herrn/Frau <strong>[[agent_full_name]]</strong> Vollmacht, das Kraftfahrzeug:</p>
                                <ul>
                                    <li>Marke: <strong>[[car_make]]</strong></li>
                                    <li>Modell: <strong>[[car_model]]</strong></li>
                                    <li>FIN: <strong>[[vin_number]]</strong></li>
                                    <li>Kennzeichen: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>in meinem Namen zu verkaufen.</p>
                                <p>Die Vollmacht umfasst das Recht, den Kaufpreis zu ver verhandeln, Kaufverträge abzuschließen, den Kaufpreis entgegenzunehmen und alle sonstigen zur Durchführung des Verkaufs erforderlichen Handlungen vorzunehmen.</p>
                                <p>Mindestverkaufspreis: [[min_sale_price]] [[currency]] (optional).</p>
                                <p>Diese Vollmacht ist gültig [[validity_period]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vollmachtgeber</p></td>
                                <td width="50%"><p>___________________<br>Bevollmächtigter</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Car Sale',
                        'description' => 'A document authorizing an agent to sell a vehicle on behalf of the owner.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[poa_date]]</p></td><td style="text-align: right;"><p>Principal: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>ID: [[principal_id_type]] [[principal_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Agent: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>ID: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>I, [[principal_full_name]], hereby grant power of attorney to Mr./Ms. <strong>[[agent_full_name]]</strong> to sell the vehicle:</p>
                                <ul>
                                    <li>Make: <strong>[[car_make]]</strong></li>
                                    <li>Model: <strong>[[car_model]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>License Plate: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>on my behalf.</p>
                                <p>The power of attorney includes the right to negotiate the purchase price, conclude purchase agreements, receive the purchase price, and perform all other acts necessary for the effective sale of the vehicle.</p>
                                <p>Minimum sale price: [[min_sale_price]] [[currency]] (optional).</p>
                                <p>This Power of Attorney is valid [[validity_period]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Principal</p></td>
                                <td width="50%"><p>___________________<br>Agent</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на продаж автомобіля',
                        'description' => 'Документ, що уповноважує повіреного на продаж транспортного засобу від імені власника.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: [[poa_date]]</p></td><td style="text-align: right;"><p>Довіритель: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>Посвідчення: [[principal_id_type]] [[principal_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Повірений: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>Посвідчення: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>Цим я, [[principal_full_name]], надаю Пану/Пані <strong>[[agent_full_name]]</strong> довіреність на продаж транспортного засобу:</p>
                                <ul>
                                    <li>Марка: <strong>[[car_make]]</strong></li>
                                    <li>Модель: <strong>[[car_model]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>Номерний знак: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>від мого імені.</p>
                                <p>Довіреність включає право на ведення переговорів щодо ціни, укладення договорів купівлі-продажу, отримання ціни покупки та вчинення всіх інших дій, необхідних для ефективного продажу транспортного засобу.</p>
                                <p>Мінімальна ціна продажу: [[min_sale_price]] [[currency]] (необов\'язково).</p>
                                <p>Довіреність дійсна [[validity_period]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Довіритель</p></td>
                                <td width="50%"><p>___________________<br>Повірений</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Pełnomocnictwo do sprzedaży samochodu',
                        'description' => 'Dokument uprawniający pełnomocnika do sprzedaży pojazdu w imieniu właściciela.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: [[poa_date]]</p></td><td style="text-align: right;"><p>Mocodawca: <strong>[[principal_full_name]]</strong><br>[[principal_address]]<br>Dowód: [[principal_id_type]] [[principal_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Pełnomocnik: <strong>[[agent_full_name]]</strong><br>[[agent_address]]<br>Dowód: [[agent_id_type]] [[agent_id_number]]</p>
                                <br/>
                                <p>Niniejszym ja, [[principal_full_name]], udzielam Panu/Pani <strong>[[agent_full_name]]</strong> pełnomocnictwa do sprzedaży pojazdu marki:</p>
                                <ul>
                                    <li>Marka: <strong>[[car_make]]</strong></li>
                                    <li>Model: <strong>[[car_model]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>Rejestracja: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>w moim imieniu.</p>
                                <p>Pełnomocnictwo obejmuje prawo do negocjowania ceny, zawierania umów kupna-sprzedaży, odbierania zapłaty oraz wszelkich innych czynności niezbędnych do skutecznej sprzedaży pojazdu.</p>
                                <p>Minimalna cena sprzedaży: [[min_sale_price]] [[currency]] (opcjonalnie).</p>
                                <p>Niniejsze pełnomocnictwo jest ważne [[validity_period]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Mocodawca</p></td>
                                <td width="50%"><p>___________________<br>Pełnomocnik</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор аренды автомобиля / Car Rental Agreement (Mietvertrag Kraftfahrzeug) ---
            [
                'slug' => 'car-rental-agreement-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"lessor_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa wynajmującego","en":"Lessor\'s Name/Company Name","uk":"ПІБ/назва орендодавця","de":"Name/Firmenname des Vermieters"}},
                    {"name":"lessor_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Lessor\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"lessor_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości wynajmującego","en":"Lessor\'s ID Document Type","uk":"Тип документа, що посвідчує особу орендодавця","de":"Art des Ausweisdokuments des Vermieters"}},
                    {"name":"lessor_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości wynajmującego","en":"Lessor\'s ID Document Number","uk":"Номер документа, що посвідчує особу орендодавця","de":"Nummer des Ausweisdokuments des Vermieters"}},
                    {"name":"lessee_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa najemcy","en":"Lessee\'s Name/Company Name","uk":"ПІБ/назва орендаря","de":"Name/Firmenname des Mieters"}},
                    {"name":"lessee_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Lessee\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"lessee_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości najemcy","en":"Lessee\'s ID Document Type","uk":"Тип документа, що посвідчує особу орендаря","de":"Art des Ausweisdokuments des Mieters"}},
                    {"name":"lessee_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości najemcy","en":"Lessee\'s ID Document Number","uk":"Номер документа, що посвідчує особу орендаря","de":"Nummer des Ausweisdokuments des Mieters"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"car_year","type":"number","required":true,"labels":{"pl":"Rok produkcji","en":"Year of Manufacture","uk":"Рік випуску","de":"Baujahr"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN","en":"VIN Number","uk":"Номер VIN","de":"FIN-Nummer"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny","en":"License Plate Number","uk":"Номерний знак","de":"Kennzeichen"}},
                    {"name":"rental_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Rental Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"rental_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu","en":"Rental End Date","uk":"Дата закінчення оренди","de":"Mietende"}},
                    {"name":"rental_fee","type":"number","required":true,"labels":{"pl":"Stawka najmu (za dzień/miesiąc)","en":"Rental Fee (per day/month)","uk":"Ставка оренди (за день/місяць)","de":"Mietpreis (pro Tag/Monat)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Waluta","de":"Währung"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}},
                    {"name":"insurance_details","type":"textarea","required":false,"labels":{"pl":"Szczegóły ubezpieczenia (opcjonalnie)","en":"Insurance details (optional)","uk":"Деталі страхування (необов\'язково)","de":"Versicherungsdetails (optional)"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne warunki (opcjonalnie)","en":"Other conditions (optional)","uk":"Інші умови (необов\'язково)","de":"Weitere Bedingungen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mietvertrag Kraftfahrzeug',
                        'description' => 'Standardmietvertrag für ein Kraftfahrzeug in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETVERTRAG KRAFTFAHRZEUG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vermieter: <strong>[[lessor_name]]</strong><br>[[lessor_address]]<br>Ausweis: [[lessor_id_type]] [[lessor_id_number]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Mieter: <strong>[[lessee_name]]</strong><br>[[lessee_address]]<br>Ausweis: [[lessee_id_type]] [[lessee_id_number]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Mietgegenstand</h2>
                                <p>Der Vermieter vermietet an den Mieter das Kraftfahrzeug:</p>
                                <ul>
                                    <li>Marke: <strong>[[car_make]]</strong></li>
                                    <li>Modell: <strong>[[car_model]]</strong></li>
                                    <li>Baujahr: <strong>[[car_year]]</strong></li>
                                    <li>FIN: <strong>[[vin_number]]</strong></li>
                                    <li>Kennzeichen: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>Mietzeitraum: vom <strong>[[rental_start_date]]</strong> bis <strong>[[rental_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Mietzins und Zahlungsbedingungen</h2>
                                <p>Der Mietzins beträgt: <strong>[[rental_fee]] [[currency]]</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Versicherung</h2>
                                <p>[[insurance_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Weitere Bedingungen</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Schlussbestimmungen</h2>
                                <p>Dieser Vertrag unterliegt deutschem Recht. Mündliche Nebenabreden bestehen nicht.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Vermieter</p></td>
                                <td width="50%"><p>___________________<br>Mieter</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Car Rental Agreement',
                        'description' => 'Standard car rental agreement in Germany, specifying rental terms.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CAR RENTAL AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Lessor: <strong>[[lessor_name]]</strong><br>[[lessor_address]]<br>ID: [[lessor_id_type]] [[lessor_id_number]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Lessee: <strong>[[lessee_name]]</strong><br>[[lessee_address]]<br>ID: [[lessee_id_type]] [[lessee_id_number]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Subject of Agreement</h2>
                                <p>The Lessor leases to the Lessee the motor vehicle:</p>
                                <ul>
                                    <li>Make: <strong>[[car_make]]</strong></li>
                                    <li>Model: <strong>[[car_model]]</strong></li>
                                    <li>Year of Manufacture: <strong>[[car_year]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>License Plate: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>Rental period: from <strong>[[rental_start_date]]</strong> to <strong>[[rental_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Rental Fee and Payment Terms</h2>
                                <p>The rental fee is: <strong>[[rental_fee]] [[currency]]</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Insurance</h2>
                                <p>[[insurance_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Other Conditions</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Final Provisions</h2>
                                <p>This contract is subject to German law. No verbal ancillary agreements exist.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Lessor</p></td>
                                <td width="50%"><p>___________________<br>Lessee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди автомобіля',
                        'description' => 'Стандартний договір оренди автомобіля в Німеччині, що визначає умови оренди.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ АВТОМОБІЛЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Орендодавець: <strong>[[lessor_name]]</strong><br>[[lessor_address]]<br>Посвідчення: [[lessor_id_type]] [[lessor_id_number]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Орендар: <strong>[[lessee_name]]</strong><br>[[lessee_address]]<br>Посвідчення: [[lessee_id_type]] [[lessee_id_number]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Предмет договору</h2>
                                <p>Орендодавець передає Орендарю в користування транспортний засіб:</p>
                                <ul>
                                    <li>Марка: <strong>[[car_make]]</strong></li>
                                    <li>Модель: <strong>[[car_model]]</strong></li>
                                    <li>Рік випуску: <strong>[[car_year]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>Номерний знак: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>Термін оренди: з <strong>[[rental_start_date]]</strong> по <strong>[[rental_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Орендна плата та умови оплати</h2>
                                <p>Орендна плата становить: <strong>[[rental_fee]] [[currency]]</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Страхування</h2>
                                <p>[[insurance_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Інші умови</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Прикінцеві положення</h2>
                                <p>Цей договір регулюється німецьким законодавством. Усні додаткові домовленості відсутні.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Орендодавець</p></td>
                                <td width="50%"><p>___________________<br>Орендар</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu samochodu',
                        'description' => 'Standardowa umowa najmu samochodu w Niemczech, określająca warunki wynajmu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU SAMOCHODU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wynajmujący: <strong>[[lessor_name]]</strong><br>[[lessor_address]]<br>Dowód: [[lessor_id_type]] [[lessor_id_number]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Najemca: <strong>[[lessee_name]]</strong><br>[[lessee_address]]<br>Dowód: [[lessee_id_type]] [[lessee_id_number]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Przedmiot umowy</h2>
                                <p>Wynajmujący oddaje Najemcy do używania pojazd marki:</p>
                                <ul>
                                    <li>Marka: <strong>[[car_make]]</strong></li>
                                    <li>Model: <strong>[[car_model]]</strong></li>
                                    <li>Rok produkcji: <strong>[[car_year]]</strong></li>
                                    <li>VIN: <strong>[[vin_number]]</strong></li>
                                    <li>Rejestracja: <strong>[[license_plate]]</strong></li>
                                </ul>
                                <p>Okres najmu: od <strong>[[rental_start_date]]</strong> do <strong>[[rental_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Czynsz najmu i warunki płatności</h2>
                                <p>Czynsz najmu wynosi: <strong>[[rental_fee]] [[currency]]</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Ubezpieczenie</h2>
                                <p>[[insurance_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Inne warunki</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Postanowienia końcowe</h2>
                                <p>Niniejsza umowa podlega prawu niemieckiemu. Ustne uzgodnienia dodatkowe nie istnieją.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wynajmujący</p></td>
                                <td width="50%"><p>___________________<br>Najemca</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Европротокол (извещение о ДТП) / European Accident Statement (Europäischer Unfallbericht) ---
            [
                'slug' => 'european-accident-statement-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"statement_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia oświadczenia","en":"Statement Date","uk":"Дата складання заяви","de":"Datum der Erklärung"}},
                    {"name":"accident_date","type":"date","required":true,"labels":{"pl":"Data wypadku","en":"Accident Date","uk":"Дата ДТП","de":"Unfalldatum"}},
                    {"name":"accident_time","type":"text","required":true,"labels":{"pl":"Godzina wypadku","en":"Accident Time","uk":"Час ДТП","de":"Uhrzeit des Unfalls"}},
                    {"name":"accident_location","type":"text","required":true,"labels":{"pl":"Miejsce wypadku (ulica, miasto)","en":"Accident Location (street, city)","uk":"Місце ДТП (вулиця, місто)","de":"Unfallort (Straße, Stadt)"}},
                    {"name":"witnesses","type":"textarea","required":false,"labels":{"pl":"Świadkowie (imię, nazwisko, kontakt)","en":"Witnesses (name, contact)","uk":"Свідки (ім\'я, прізвище, контакт)","de":"Zeugen (Name, Kontakt)"}},
                    {"name":"vehicle_a_driver_full_name","type":"text","required":true,"labels":{"pl":"Kierujący pojazdem A (imię i nazwisko)","en":"Driver of Vehicle A (full name)","uk":"Водій транспортного засобу А (ПІБ)","de":"Fahrer Fahrzeug A (vollständiger Name)"}},
                    {"name":"vehicle_a_license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny pojazdu A","en":"License Plate Number of Vehicle A","uk":"Номерний знак транспортного засобу А","de":"Kennzeichen Fahrzeug A"}},
                    {"name":"vehicle_a_insurance_company","type":"text","required":true,"labels":{"pl":"Ubezpieczyciel pojazdu A","en":"Insurer of Vehicle A","uk":"Страховик транспортного засобу А","de":"Versicherer Fahrzeug A"}},
                    {"name":"vehicle_a_policy_number","type":"text","required":true,"labels":{"pl":"Numer polisy pojazdu A","en":"Policy Number of Vehicle A","uk":"Номер поліса транспортного засобу А","de":"Policennummer Fahrzeug A"}},
                    {"name":"vehicle_b_driver_full_name","type":"text","required":true,"labels":{"pl":"Kierujący pojazdem B (imię i nazwisko)","en":"Driver of Vehicle B (full name)","uk":"Водій транспортного засобу В (ПІБ)","de":"Fahrer Fahrzeug B (vollständiger Name)"}},
                    {"name":"vehicle_b_license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny pojazdu B","en":"License Plate Number of Vehicle B","uk":"Номерний знак транспортного засобу В","de":"Kennzeichen Fahrzeug B"}},
                    {"name":"vehicle_b_insurance_company","type":"text","required":true,"labels":{"pl":"Ubezpieczyciel pojazdu B","en":"Insurer of Vehicle B","uk":"Страховик транспортного засобу В","de":"Versicherer Fahrzeug B"}},
                    {"name":"vehicle_b_policy_number","type":"text","required":true,"labels":{"pl":"Numer polisy pojazdu B","en":"Policy Number of Vehicle B","uk":"Номер поліса транспортного засобу В","de":"Policennummer Fahrzeug B"}},
                    {"name":"accident_circumstances","type":"textarea","required":true,"labels":{"pl":"Okoliczności wypadku (szczegółowy opis, rysunek)","en":"Circumstances of the accident (detailed description, drawing)","uk":"Обставини ДТП (детальний опис, схема)","de":"Unfallumstände (detaillierte Beschreibung, Skizze)"}},
                    {"name":"damage_description","type":"textarea","required":true,"labels":{"pl":"Opis uszkodzeń pojazdów","en":"Description of vehicle damage","uk":"Опис пошкоджень транспортних засобів","de":"Beschreibung der Fahrzeugschäden"}},
                    {"name":"responsible_party","type":"text","required":true,"labels":{"pl":"Strona odpowiedzialna za wypadek (A/B)","en":"Party responsible for the accident (A/B)","uk":"Сторона, відповідальна за ДТП (А/Б)","de":"Verursacher des Unfalls (A/B)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Europäischer Unfallbericht',
                        'description' => 'Vereinfachter Unfallbericht, der von den Beteiligten ohne Polizeibeteiligung ausgefüllt wird.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EUROPÄISCHER UNFALLBERICHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[statement_date]]</p></td><td style="text-align: right;"><p>Unfalldatum: [[accident_date]], Uhrzeit: [[accident_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Unfallort: <strong>[[accident_location]]</strong></p>
                                <p>Zeugen: [[witnesses]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Fahrzeug A</h2>
                                <p>Fahrer: <strong>[[vehicle_a_driver_full_name]]</strong></p>
                                <p>Kennzeichen: [[vehicle_a_license_plate]]</p>
                                <p>Versicherer: [[vehicle_a_insurance_company]], Pol.-Nr.: [[vehicle_a_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Fahrzeug B</h2>
                                <p>Fahrer: <strong>[[vehicle_b_driver_full_name]]</strong></p>
                                <p>Kennzeichen: [[vehicle_b_license_plate]]</p>
                                <p>Versicherer: [[vehicle_b_insurance_company]], Pol.-Nr.: [[vehicle_b_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Unfallumstände</h2>
                                <p>[[accident_circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Schadensbeschreibung</h2>
                                <p>[[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Verantwortliche Partei</h2>
                                <p>Verantwortlich für den Unfall ist: <strong>Fahrzeug [[responsible_party]]</strong></p>
                                <br/>
                                <p>Die Unterschriften der Parteien bestätigen die Richtigkeit der Daten in diesem Bericht.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Unterschrift Fahrer A</p></td>
                                <td width="50%"><p>___________________<br>Unterschrift Fahrer B</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'European Accident Statement',
                        'description' => 'Simplified road collision report form, filled out by participants without police involvement.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EUROPEAN ACCIDENT STATEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[statement_date]]</p></td><td style="text-align: right;"><p>Accident Date: [[accident_date]], Time: [[accident_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Accident Location: <strong>[[accident_location]]</strong></p>
                                <p>Witnesses: [[witnesses]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Vehicle A</h2>
                                <p>Driver: <strong>[[vehicle_a_driver_full_name]]</strong></p>
                                <p>License Plate: [[vehicle_a_license_plate]]</p>
                                <p>Insurer: [[vehicle_a_insurance_company]], Policy No: [[vehicle_a_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Vehicle B</h2>
                                <p>Driver: <strong>[[vehicle_b_driver_full_name]]</strong></p>
                                <p>License Plate: [[vehicle_b_license_plate]]</p>
                                <p>Insurer: [[vehicle_b_insurance_company]], Policy No: [[vehicle_b_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Circumstances of the Accident</h2>
                                <p>[[accident_circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Description of Damage</h2>
                                <p>[[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Responsible Party</h2>
                                <p>Responsible for the accident: <strong>Vehicle [[responsible_party]]</strong></p>
                                <br/>
                                <p>The signatures of the parties confirm the accuracy of the data in this report.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Driver A Signature</p></td>
                                <td width="50%"><p>___________________<br>Driver B Signature</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Європротокол (повідомлення про ДТП)',
                        'description' => 'Спрощена форма повідомлення про дорожньо-транспортну пригоду, що заповнюється учасниками без участі поліції.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЄВРОПРОТОКОЛ (ПОВІДОМЛЕННЯ ПРО ДТП)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: [[statement_date]]</p></td><td style="text-align: right;"><p>Дата ДТП: [[accident_date]], Час: [[accident_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Місце ДТП: <strong>[[accident_location]]</strong></p>
                                <p>Свідки: [[witnesses]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Транспортний засіб А</h2>
                                <p>Водій: <strong>[[vehicle_a_driver_full_name]]</strong></p>
                                <p>Номерний знак: [[vehicle_a_license_plate]]</p>
                                <p>Страховик: [[vehicle_a_insurance_company]], Поліс №: [[vehicle_a_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Транспортний засіб Б</h2>
                                <p>Водій: <strong>[[vehicle_b_driver_full_name]]</strong></p>
                                <p>Номерний знак: [[vehicle_b_license_plate]]</p>
                                <p>Страховик: [[vehicle_b_insurance_company]], Поліс №: [[vehicle_b_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Обставини ДТП</h2>
                                <p>[[accident_circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Опис пошкоджень</h2>
                                <p>[[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Відповідальна сторона</h2>
                                <p>Відповідальний за ДТП: <strong>Транспортний засіб [[responsible_party]]</strong></p>
                                <br/>
                                <p>Підписи сторін підтверджують відповідність даних, що містяться в цій заяві.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Підпис водія А</p></td>
                                <td width="50%"><p>___________________<br>Підпис водія Б</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Oświadczenie o zdarzeniu drogowym (Europrotokół)',
                        'description' => 'Uproszczony formularz zgłoszenia kolizji drogowej, wypełniany przez uczestników bez udziału policji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OŚWIADCZENIE O ZDARZENIU DROGOWYM</h1><p style="font-size: 14px;">(EUROPROTOKÓŁ)</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: [[statement_date]]</p></td><td style="text-align: right;"><p>Data wypadku: [[accident_date]], Godzina: [[accident_time]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Miejsce wypadku: <strong>[[accident_location]]</strong></p>
                                <p>Świadkowie: [[witnesses]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Pojazd A</h2>
                                <p>Kierujący: <strong>[[vehicle_a_driver_full_name]]</strong></p>
                                <p>Numer rejestracyjny: [[vehicle_a_license_plate]]</p>
                                <p>Ubezpieczyciel: [[vehicle_a_insurance_company]], Polisa nr: [[vehicle_a_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Pojazd B</h2>
                                <p>Kierujący: <strong>[[vehicle_b_driver_full_name]]</strong></p>
                                <p>Numer rejestracyjny: [[vehicle_b_license_plate]]</p>
                                <p>Ubezpieczyciel: [[vehicle_b_insurance_company]], Polisa nr: [[vehicle_b_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Okoliczności wypadku</h2>
                                <p>[[accident_circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Opis uszkodzeń</h2>
                                <p>[[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Strona odpowiedzialna</h2>
                                <p>Za wypadek odpowiedzialny jest: <strong>Pojazd [[responsible_party]]</strong></p>
                                <br/>
                                <p>Podpisy stron potwierdzają zgodność danych zawartych w niniejszym oświadczeniu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Podpis kierującego A</p></td>
                                <td width="50%"><p>___________________<br>Podpis kierującego B</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Претензия в страховую компанию о выплате возмещения / Claim to Insurance Company for Compensation (Schadensmeldung an Versicherung) ---
            [
                'slug' => 'claim-insurance-compensation-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"claim_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia roszczenia","en":"Claim Date","uk":"Дата складання претензії","de":"Datum der Schadensmeldung"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko poszkodowanego/ubezpieczonego","en":"Injured Party\'s/Insured\'s Full Name","uk":"ПІБ потерпілого/застрахованого","de":"Vollständiger Name des Geschädigten/Versicherten"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres poszkodowanego/ubezpieczonego","en":"Injured Party\'s/Insured\'s Address","uk":"Адреса потерпілого/застрахованого","de":"Adresse des Geschädigten/Versicherten"}},
                    {"name":"claimant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail poszkodowanego/ubezpieczonego","en":"Injured Party\'s/Insured\'s Phone & Email","uk":"Телефон та e-mail потерпілого/застрахованого","de":"Telefon und E-Mail des Geschädigten/Versicherten"}},
                    {"name":"insurance_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy ubezpieczeniowej","en":"Insurance Company Name","uk":"Назва страхової компанії","de":"Name der Versicherungsgesellschaft"}},
                    {"name":"insurance_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy ubezpieczeniowej","en":"Insurance Company Address","uk":"Адреса страхової компанії","de":"Adresse der Versicherungsgesellschaft"}},
                    {"name":"policy_number","type":"text","required":true,"labels":{"pl":"Numer polisy ubezpieczeniowej","en":"Insurance Policy Number","uk":"Номер страхового поліса","de":"Versicherungsscheinnummer"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"pl":"Data zdarzenia (wypadku/szkody)","en":"Date of Incident (accident/damage)","uk":"Дата події (ДТП/шкоди)","de":"Datum des Vorfalls (Unfall/Schaden)"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis zdarzenia i powstałej szkody","en":"Detailed description of the incident and resulting damage","uk":"Детальний опис події та завданої шкоди","de":"Detaillierte Beschreibung des Vorfalls und des entstandenen Schadens"}},
                    {"name":"requested_compensation_amount","type":"number","required":true,"labels":{"pl":"Żądana kwota odszkodowania (EUR)","en":"Requested compensation amount (EUR)","uk":"Затребувана суma відшкодування (EUR)","de":"Geforderter Entschädigungsbetrag (EUR)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. protokół policji, zdjęcia, kosztorys naprawy)","en":"Attachments (e.g., police report, photos, repair estimate)","uk":"Додатки (напр., протокол поліції, фото, кошторис ремонту)","de":"Anhänge (z.B. Polizeibericht, Fotos, Reparaturkostenvoranschlag)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Schadensmeldung an Versicherung',
                        'description' => 'Formelle Schadensmeldung zur Geltendmachung von Versicherungsleistungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SCHADENSMELDUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Absender: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[claim_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[insurance_company_name]]</strong><br>[[insurance_company_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit melde ich einen Schaden aus meiner Versicherungspolice Nr. <strong>[[policy_number]]</strong>, der sich am <strong>[[incident_date]]</strong> ereignet hat.</p>
                                <p>Detaillierte Beschreibung des Vorfalls und des entstandenen Schadens:</p>
                                <p>[[incident_description]]</p>
                                <p>Ich fordere eine Entschädigungszahlung in Höhe von: <strong>[[requested_compensation_amount]] [[currency]]</strong>.</p>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <p>Ich bitte um schnelle Bearbeitung meiner Meldung und Auszahlung der Entschädigung.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Claim to Insurance Company for Compensation',
                        'description' => 'Formal claim for compensation payment from an insurance policy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CLAIM FOR COMPENSATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Claimant: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[claim_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[insurance_company_name]]</strong><br>[[insurance_company_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby, as the injured party/insured, submit a claim for compensation payment from policy no. <strong>[[policy_number]]</strong>, in connection with the incident that occurred on <strong>[[incident_date]]</strong>.</p>
                                <p>Detailed description of the incident and resulting damage:</p>
                                <p>[[incident_description]]</p>
                                <p>I demand compensation in the amount of: <strong>[[requested_compensation_amount]] [[currency]]</strong>.</p>
                                <p>Enclosed please find: [[attachments]].</p>
                                <p>Please promptly consider my claim and pay the due compensation.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Претензія до страхової компанії про виплату відшкодування',
                        'description' => 'Формальна претензія про виплату відшкодування за страховим полісом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПРЕТЕНЗІЯ ПРО ВИПЛАТУ ВІДШКОДУВАННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Потерпілий/Застрахований: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: [[claim_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[insurance_company_name]]</strong><br>[[insurance_company_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я, як потерпілий/застрахований, подаю претензію про виплату відшкодування за полісом № <strong>[[policy_number]]</strong>, у зв\'язку з подією, що сталася <strong>[[incident_date]]</strong>.</p>
                                <p>Детальний опис події та завданої шкоди:</p>
                                <p>[[incident_description]]</p>
                                <p>Вимагаю виплати відшкодування в сумі: <strong>[[requested_compensation_amount]] [[currency]]</strong>.</p>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <p>Прошу терміново розглянути мою претензію та виплатити належне відшкодування.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Roszczenie o wypłatę odszkodowania do firmy ubezpieczeniowej',
                        'description' => 'Formalne roszczenie o wypłatę odszkodowania z polisy ubezpieczeniowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ROSZCZENIE O WYPŁATĘ ODSZKODOWANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Poszkodowany/Ubezpieczony: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: [[claim_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[insurance_company_name]]</strong><br>[[insurance_company_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym, jako poszkodowany/ubezpieczony, zgłaszam roszczenie o wypłatę odszkodowania z polisy nr <strong>[[policy_number]]</strong>, w związku ze zdarzeniem, które miało miejsce w dniu <strong>[[incident_date]]</strong>.</p>
                                <p>Szczegółowy opis zdarzenia i powstałej szkody:</p>
                                <p>[[incident_description]]</p>
                                <p>Żądam wypłaty odszkodowania w kwocie: <strong>[[requested_compensation_amount]] [[currency]]</strong>.</p>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <p>Proszę o pilne rozpatrzenie mojego roszczenia i wypłatę należnego odszkodowania.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Журнал учета технического обслуживания автомобиля / Car Maintenance Log (Fahrzeugwartungsprotokoll) ---
            [
                'slug' => 'car-maintenance-log-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"car_owner_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko właściciela pojazdu","en":"Car Owner\'s Full Name","uk":"ПІБ власника автомобіля","de":"Vollständiger Name des Fahrzeughalters"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN","en":"VIN Number","uk":"Номер VIN","de":"FIN-Nummer"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny","en":"License Plate Number","uk":"Номерний знак","de":"Kennzeichen"}},
                    {"name":"log_period","type":"text","required":true,"labels":{"pl":"Okres prowadzenia dziennika (np. od-do, rok)","en":"Log period (e.g., from-to, year)","uk":"Період ведення журналу (напр., від-до, рік)","de":"Zeitraum des Protokolls (z.B. von-bis, Jahr)"}},
                    {"name":"maintenance_entries","type":"textarea","required":true,"labels":{"pl":"Wpisy serwisowe (data, przebieg, rodzaj usługi, koszt, uwagi)","en":"Service entries (date, mileage, type of service, cost, notes)","uk":"Записи про обслуговування (дата, пробіг, вид послуги, вартість, примітки)","de":"Wartungseinträge (Datum, Kilometerstand, Art der Dienstleistung, Kosten, Anmerkungen)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Fahrzeugwartungsprotokoll',
                        'description' => 'Vorlage für ein Protokoll zur Aufzeichnung der Servicehistorie und Wartung eines Fahrzeugs.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FAHRZEUGWARTUNGSPROTOKOLL</h1><p style="font-size: 14px;">Eigentümer: <strong>[[car_owner_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Fahrzeug: <strong>[[car_make]] [[car_model]]</strong></p></td><td style="text-align: right;"><p>FIN: [[vin_number]], Kennzeichen: [[license_plate]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Zeitraum des Protokolls: <strong>[[log_period]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Wartungseinträge:</h2>
                                <pre>
Datum | Kilometerstand (km) | Art der Dienstleistung | Kosten (EUR) | Anmerkungen
-----------------------------------------------------------------------------------------------------
[[maintenance_entries]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Eigentümers)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Car Maintenance Log',
                        'description' => 'A log template for recording vehicle service history and maintenance.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CAR MAINTENANCE LOG</h1><p style="font-size: 14px;">Owner: <strong>[[car_owner_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Vehicle: <strong>[[car_make]] [[car_model]]</strong></p></td><td style="text-align: right;"><p>VIN: [[vin_number]], License Plate: [[license_plate]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Log Period: <strong>[[log_period]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Service Entries:</h2>
                                <pre>
Date | Mileage (km) | Type of Service | Cost (EUR) | Notes
-----------------------------------------------------------------------------------------------------
[[maintenance_entries]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Owner\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Журнал обліку технічного обслуговування автомобіля',
                        'description' => 'Шаблон журналу для реєстрації історії обслуговування та технічного обслуговування транспортного засобу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЖУРНАЛ ОБЛІКУ ТЕХНІЧНОГО ОБСЛУГОВУВАННЯ АВТОМОБІЛЯ</h1><p style="font-size: 14px;">Власник: <strong>[[car_owner_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Транспортний засіб: <strong>[[car_make]] [[car_model]]</strong></p></td><td style="text-align: right;"><p>VIN: [[vin_number]], Реєстрація: [[license_plate]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Період ведення журналу: <strong>[[log_period]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Записи про обслуговування:</h2>
                                <pre>
Дата | Пробіг (км) | Вид послуги | Вартість (EUR) | Примітки
-----------------------------------------------------------------------------------------------------
[[maintenance_entries]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис власника)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Dziennik techniczny samochodu',
                        'description' => 'Szablon dziennika do rejestrowania historii serwisowej i konserwacji pojazdu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK TECHNICZNY SAMOCHODU</h1><p style="font-size: 14px;">Właściciel: <strong>[[car_owner_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Pojazd: <strong>[[car_make]] [[car_model]]</strong></p></td><td style="text-align: right;"><p>VIN: [[vin_number]], Rejestracja: [[license_plate]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Okres prowadzenia dziennika: <strong>[[log_period]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Wpisy serwisowe:</h2>
                                <pre>
Data | Przebieg (km) | Rodzaj usługi | Koszt (EUR) | Uwagi
-----------------------------------------------------------------------------------------------------
[[maintenance_entries]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis właściciela)</p>
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
                'country_code' => $data['country_code'] ?? 'DE',
                'fields' => json_decode($data['fields'], true),
            ]
        );

        if (isset($data['translations']) && is_array($data['translations'])) {
            foreach ($data['translations'] as $locale => $transData) {
                // Ensure all languages have HTML content by falling back to Polish version if empty
                $transData['header_html'] = $transData['header_html'] ?? ($data['translations']['de']['header_html'] ?? '');
                $transData['body_html'] = $transData['body_html'] ?? ($data['translations']['de']['body_html'] ?? '');
                $transData['footer_html'] = $transData['footer_html'] ?? ($data['translations']['de']['footer_html'] ?? '');

                $template->translations()->updateOrCreate(['locale' => $locale], $transData);
            }
        }
    }
}
