<?php

namespace Database\Seeders\PL;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class PlCarsTravelSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'automobiles-pl')->first();
        if (!$category) {
            $this->command->error('Category with slug "automobiles-pl" not found.');
            return;
        }
        $templatesData = [
            // --- Договор купли-продажи автомобиля / Car Sale Agreement ---
            [
                'slug' => 'car-sale-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"seller_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko sprzedającego","en":"Seller\'s Full Name","uk":"ПІБ продавця","de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedającego","en":"Seller\'s Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"seller_pesel_nip","type":"text","required":true,"labels":{"pl":"PESEL/NIP sprzedającego","en":"Seller\'s PESEL/NIP","uk":"ПЕСЕЛЬ/ІПН продавця","de":"PESEL/NIP des Verkäufers"}},
                    {"name":"buyer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kupującego","en":"Buyer\'s Full Name","uk":"ПІБ покупця","de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres kupującego","en":"Buyer\'s Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"buyer_pesel_nip","type":"text","required":true,"labels":{"pl":"PESEL/NIP kupującego","en":"Buyer\'s PESEL/NIP","uk":"ПЕСЕЛЬ/ІПН покупця","de":"PESEL/NIP des Käufers"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"car_year","type":"number","required":true,"labels":{"pl":"Rok produkcji","en":"Year of Manufacture","uk":"Рік випуску","de":"Baujahr"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN","en":"VIN Number","uk":"Номер VIN","de":"FIN-Nummer"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny","en":"License Plate Number","uk":"Номерний знак","de":"Kennzeichen"}},
                    {"name":"odometer_reading","type":"number","required":true,"labels":{"pl":"Przebieg (km)","en":"Odometer Reading (km)","uk":"Пробіг (км)","de":"Kilometerstand (km)"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"pl":"Cena sprzedaży (PLN)","en":"Sale Price (PLN)","uk":"Ціна продажу (PLN)","de":"Verkaufspreis (PLN)"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa kupna-sprzedaży samochodu',
                        'description' => 'Standardowa umowa kupna-sprzedaży pojazdu używanego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA KUPNA-SPRZEDAŻY SAMOCHODU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Sprzedającym:</strong> [[seller_full_name]], zamieszkałym/ą w [[seller_address]], PESEL/NIP: [[seller_pesel_nip]],</p>
                                <p>a</p>
                                <p><strong>Kupującym:</strong> [[buyer_full_name]], zamieszkałym/ą w [[buyer_address]], PESEL/NIP: [[buyer_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Sprzedający sprzedaje, a Kupujący kupuje pojazd marki: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, rok produkcji: <strong>[[car_year]]</strong>, numer VIN: <strong>[[vin_number]]</strong>, numer rejestracyjny: <strong>[[license_plate]]</strong>, przebieg: <strong>[[odometer_reading]] km</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Cena i warunki płatności</h2>
                                <p>Cena sprzedaży pojazdu wynosi: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Oświadczenia stron</h2>
                                <p>Sprzedający oświadcza, że pojazd jest jego własnością, wolny od wad prawnych i obciążeń, oraz że nie toczy się żadne postępowanie dotyczące pojazdu.</p>
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
                        'title' => 'Car Sale Agreement',
                        'description' => 'Standard agreement for the sale of a used vehicle.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CAR SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Seller:</strong> [[seller_full_name]], residing in [[seller_address]], PESEL/NIP: [[seller_pesel_nip]],</p>
                                <p>and</p>
                                <p><strong>Buyer:</strong> [[buyer_full_name]], residing in [[buyer_address]], PESEL/NIP: [[buyer_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The Seller sells, and the Buyer buys the vehicle make: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, year of manufacture: <strong>[[car_year]]</strong>, VIN number: <strong>[[vin_number]]</strong>, license plate number: <strong>[[license_plate]]</strong>, odometer reading: <strong>[[odometer_reading]] km</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Price and Payment Terms</h2>
                                <p>The sale price of the vehicle is: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Declarations of the Parties</h2>
                                <p>The Seller declares that the vehicle is their property, free from legal defects and encumbrances, and that no proceedings concerning the vehicle are pending.</p>
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
                        'title' => 'Договір купівлі-продажу автомобіля',
                        'description' => 'Стандартний договір купівлі-продажу вживаного транспортного засобу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР КУПІВЛІ-ПРОДАЖУ АВТОМОБІЛЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Продавцем:</strong> [[seller_full_name]], що проживає за адресою [[seller_address]], ПЕСЕЛЬ/ІПН: [[seller_pesel_nip]],</p>
                                <p>та</p>
                                <p><strong>Покупцем:</strong> [[buyer_full_name]], що проживає за адресою [[buyer_address]], ПЕСЕЛЬ/ІПН: [[buyer_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Продавець продає, а Покупець купує транспортний засіб марки: <strong>[[car_make]]</strong>, модель: <strong>[[car_model]]</strong>, рік випуску: <strong>[[car_year]]</strong>, номер VIN: <strong>[[vin_number]]</strong>, номерний знак: <strong>[[license_plate]]</strong>, пробіг: <strong>[[odometer_reading]] км</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Ціна та умови оплати</h2>
                                <p>Ціна продажу транспортного засобу становить: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Заяви сторін</h2>
                                <p>Продавець заявляє, що транспортний засіб є його власністю, вільний від юридичних вад та обтяжень, а також що жодне провадження щодо транспортного засобу не ведеться.</p>
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
                        'title' => 'Kaufvertrag für ein Kraftfahrzeug',
                        'description' => 'Standardvertrag für den Verkauf eines gebrauchten Fahrzeugs.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KAUFVERTRAG FÜR EIN KRAFTFAHRZEUG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Verkäufer:</strong> [[seller_full_name]], wohnhaft in [[seller_address]], PESEL/NIP: [[seller_pesel_nip]],</p>
                                <p>und</p>
                                <p><strong>Käufer:</strong> [[buyer_full_name]], wohnhaft in [[buyer_address]], PESEL/NIP: [[buyer_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Der Verkäufer verkauft, und der Käufer kauft das Fahrzeug der Marke: <strong>[[car_make]]</strong>, Modell: <strong>[[car_model]]</strong>, Baujahr: <strong>[[car_year]]</strong>, FIN-Nummer: <strong>[[vin_number]]</strong>, Kennzeichen: <strong>[[license_plate]]</strong>, Kilometerstand: <strong>[[odometer_reading]] km</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Preis und Zahlungsbedingungen</h2>
                                <p>Der Verkaufspreis des Fahrzeugs beträgt: <strong>[[sale_price]] PLN</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Erklärungen der Parteien</h2>
                                <p>Der Verkäufer erklärt, dass das Fahrzeug sein Eigentum ist, frei von Rechtsmängeln und Belastungen, und dass kein Verfahren bezüglich des Fahrzeugs anhängig ist.</p>
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

            // --- Акт приема-передачи автомобиля / Car Handover Protocol ---
            [
                'slug' => 'car-handover-protocol-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"protocol_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia protokołu","en":"Protocol Date","uk":"Дата складання протоколу","de":"Datum der Protokollerstellung"}},
                    {"name":"seller_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko przekazującego","en":"Transferor\'s Full Name","uk":"ПІБ передавача","de":"Vollständiger Name des Übergebers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres przekazującego","en":"Transferor\'s Address","uk":"Адреса передавача","de":"Adresse des Übergebers"}},
                    {"name":"buyer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbierającego","en":"Recipient\'s Full Name","uk":"ПІБ отримувача","de":"Vollständiger Name des Empfängers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres odbierającego","en":"Recipient\'s Address","uk":"Адреса отримувача","de":"Adresse des Empfängers"}},
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
                    'pl' => [
                        'title' => 'Protokół zdawczo-odbiorczy samochodu',
                        'description' => 'Dokument potwierdzający przekazanie pojazdu pomiędzy stronami umowy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ZDAWCZO-ODBIORCZY SAMOCHODU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[protocol_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sporządzono pomiędzy:</p>
                                <p><strong>Przekazującym:</strong> [[seller_full_name]], zamieszkałym/ą w [[seller_address]],</p>
                                <p>a</p>
                                <p><strong>Odbierającym:</strong> [[buyer_full_name]], zamieszkałym/ą w [[buyer_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot protokołu</h2>
                                <p>Przedmiotem protokołu jest przekazanie pojazdu:</p>
                                <p>Marka: <strong>[[car_make]]</strong>, Model: <strong>[[car_model]]</strong>, VIN: <strong>[[vin_number]]</strong>, Rejestracja: <strong>[[license_plate]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Stan pojazdu w chwili przekazania</h2>
                                <p>Aktualny przebieg: <strong>[[odometer_reading]] km</strong>.</p>
                                <p>Poziom paliwa: [[fuel_level]].</p>
                                <p>Opis stanu technicznego i wizualnego: [[car_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Przekazane dokumenty i klucze</h2>
                                <p>Przekazane dokumenty: [[documents_transferred]]</p>
                                <p>Liczba przekazanych kluczy: [[keys_transferred]]</p>
                                <br/>
                                <p>Podpisy stron potwierdzają zgodność stanu faktycznego z niniejszym protokołem.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Przekazujący</p></td>
                                <td width="50%"><p>___________________<br>Odbierający</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Car Handover Protocol',
                        'description' => 'A document confirming the handover of a vehicle between parties to an agreement.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CAR HANDOVER PROTOCOL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[protocol_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Prepared between:</p>
                                <p><strong>Transferor:</strong> [[seller_full_name]], residing in [[seller_address]],</p>
                                <p>and</p>
                                <p><strong>Recipient:</strong> [[buyer_full_name]], residing in [[buyer_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Protocol</h2>
                                <p>The subject of the protocol is the handover of the vehicle:</p>
                                <p>Make: <strong>[[car_make]]</strong>, Model: <strong>[[car_model]]</strong>, VIN: <strong>[[vin_number]]</strong>, Registration: <strong>[[license_plate]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Vehicle Condition at Handover</h2>
                                <p>Current odometer reading: <strong>[[odometer_reading]] km</strong>.</p>
                                <p>Fuel level: [[fuel_level]].</p>
                                <p>Description of technical and visual condition: [[car_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Documents and Keys Transferred</h2>
                                <p>Documents transferred: [[documents_transferred]]</p>
                                <p>Number of keys transferred: [[keys_transferred]]</p>
                                <br/>
                                <p>The signatures of the parties confirm the conformity of the factual state with this protocol.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Transferor</p></td>
                                <td width="50%"><p>___________________<br>Recipient</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Акт прийому-передачі автомобіля',
                        'description' => 'Документ, що підтверджує передачу транспортного засобу між сторонами договору.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ ПРИЙОМУ-ПЕРЕДАЧІ АВТОМОБІЛЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Складено між:</p>
                                <p><strong>Передавачем:</strong> [[seller_full_name]], що проживає за адресою [[seller_address]],</p>
                                <p>та</p>
                                <p><strong>Отримувачем:</strong> [[buyer_full_name]], що проживає за адресою [[buyer_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет протоколу</h2>
                                <p>Предметом протоколу є передача транспортного засобу:</p>
                                <p>Марка: <strong>[[car_make]]</strong>, Модель: <strong>[[car_model]]</strong>, VIN: <strong>[[vin_number]]</strong>, Реєстрація: <strong>[[license_plate]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Стан транспортного засобу на момент передачі</h2>
                                <p>Поточний пробіг: <strong>[[odometer_reading]] км</strong>.</p>
                                <p>Рівень палива: [[fuel_level]].</p>
                                <p>Опис технічного та візуального стану: [[car_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Передані документи та ключі</h2>
                                <p>Передані документи: [[documents_transferred]]</p>
                                <p>Кількість переданих ключів: [[keys_transferred]]</p>
                                <br/>
                                <p>Підписи сторін підтверджують відповідність фактичного стану цьому протоколу.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Передавач</p></td>
                                <td width="50%"><p>___________________<br>Отримувач</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Übergabeprotokoll Fahrzeug',
                        'description' => 'Ein Dokument, das die Übergabe eines Fahrzeugs zwischen den Vertragsparteien bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ÜBERGABEPROTOKOLL FAHRZEUG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[protocol_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Erstellt zwischen:</p>
                                <p><strong>Übergeber:</strong> [[seller_full_name]], wohnhaft in [[seller_address]],</p>
                                <p>und</p>
                                <p><strong>Empfänger:</strong> [[buyer_full_name]], wohnhaft in [[buyer_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Gegenstand des Protokolls</h2>
                                <p>Gegenstand des Protokolls ist die Übergabe des Fahrzeugs:</p>
                                <p>Marke: <strong>[[car_make]]</strong>, Modell: <strong>[[car_model]]</strong>, FIN: <strong>[[vin_number]]</strong>, Kennzeichen: <strong>[[license_plate]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Zustand des Fahrzeugs bei Übergabe</h2>
                                <p>Aktueller Kilometerstand: <strong>[[odometer_reading]] km</strong>.</p>
                                <p>Kraftstoffstand: [[fuel_level]].</p>
                                <p>Beschreibung des technischen und optischen Zustands: [[car_condition_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Übergebene Dokumente und Schlüssel</h2>
                                <p>Übergebene Dokumente: [[documents_transferred]]</p>
                                <p>Anzahl der übergebenen Schlüssel: [[keys_transferred]]</p>
                                <br/>
                                <p>Die Unterschriften der Parteien bestätigen die Übereinstimmung des Ist-Zustandes mit diesem Protokoll.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Übergeber</p></td>
                                <td width="50%"><p>___________________<br>Empfänger</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Расписка в получении денег за автомобиль / Receipt of Money for Car ---
            [
                'slug' => 'receipt-money-car-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"receipt_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pokwitowania","en":"Receipt Date","uk":"Дата видачі розписки","de":"Datum der Quittung"}},
                    {"name":"payer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wpłacającego","en":"Payer\'s Full Name","uk":"ПІБ платника","de":"Vollständiger Name des Zahlers"}},
                    {"name":"payer_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości wpłacającego","en":"Payer\'s ID Number","uk":"Номер посвідчення платника","de":"Ausweisnummer des Zahlers"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbierającego","en":"Recipient\'s Full Name","uk":"ПІБ отримувача","de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości odbierającego","en":"Recipient\'s ID Number","uk":"Номер посвідчення отримувача","de":"Ausweisnummer des Empfängers"}},
                    {"name":"amount_received","type":"number","required":true,"labels":{"pl":"Otrzymana kwota (PLN)","en":"Amount Received (PLN)","uk":"Отримана сума (PLN)","de":"Erhaltener Betrag (PLN)"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN pojazdu","en":"Vehicle VIN Number","uk":"Номер VIN транспортного засобу","de":"FIN-Nummer des Fahrzeugs"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny pojazdu","en":"Vehicle License Plate Number","uk":"Номерний знак транспортного засобу","de":"Kennzeichen des Fahrzeugs"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pokwitowanie odbioru pieniędzy za samochód',
                        'description' => 'Dokument potwierdzający otrzymanie zapłaty za sprzedany pojazd.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POKWITOWANIE ODBIORU PIENIĘDZY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[receipt_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[recipient_full_name]]</strong>, legitymujący/a się dowodem osobistym nr [[recipient_id_number]], niniejszym potwierdzam otrzymanie od Pana/Pani <strong>[[payer_full_name]]</strong>, legitymującego/ej się dowodem osobistym nr [[payer_id_number]], kwoty <strong>[[amount_received]] PLN</strong>.</p>
                                <p>Powyższa kwota stanowi zapłatę za pojazd marki: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, numer VIN: <strong>[[vin_number]]</strong>, numer rejestracyjny: <strong>[[license_plate]]</strong>.</p>
                                <p>Potwierdzam, że z chwilą otrzymania niniejszej kwoty, wszelkie zobowiązania finansowe związane z zakupem wskazanego pojazdu zostały w pełni uregulowane.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis odbierającego)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Receipt of Money for Car',
                        'description' => 'A document confirming receipt of payment for a sold vehicle.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECEIPT OF MONEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[receipt_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[recipient_full_name]]</strong>, holding ID card no. [[recipient_id_number]], hereby confirm receipt from Mr./Ms. <strong>[[payer_full_name]]</strong>, holding ID card no. [[payer_id_number]], the amount of <strong>[[amount_received]] PLN</strong>.</p>
                                <p>The above amount constitutes payment for the vehicle make: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, VIN number: <strong>[[vin_number]]</strong>, license plate number: <strong>[[license_plate]]</strong>.</p>
                                <p>I confirm that upon receipt of this amount, all financial obligations related to the purchase of the indicated vehicle have been fully settled.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Recipient\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Розписка про отримання грошей за автомобіль',
                        'description' => 'Документ, що підтверджує отримання оплати за проданий транспортний засіб.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РОЗПИСКА ПРО ОТРИМАННЯ ГРОШЕЙ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[recipient_full_name]]</strong>, що посвідчую особу за паспортом № [[recipient_id_number]], цим підтверджую отримання від Пана/Пані <strong>[[payer_full_name]]</strong>, що посвідчує особу за паспортом № [[payer_id_number]], суми <strong>[[amount_received]] PLN</strong>.</p>
                                <p>Вищезазначена сума становить оплату за транспортний засіб марки: <strong>[[car_make]]</strong>, модель: <strong>[[car_model]]</strong>, номер VIN: <strong>[[vin_number]]</strong>, номерний знак: <strong>[[license_plate]]</strong>.</p>
                                <p>Підтверджую, що з моменту отримання цієї суми всі фінансові зобов\'язання, пов\'язані з купівлею зазначеного транспортного засобу, були повністю врегульовані.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис отримувача)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Quittung über den Erhalt von Geld für ein Kraftfahrzeug',
                        'description' => 'Ein Dokument, das den Erhalt der Zahlung für ein verkauftes Fahrzeug bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">QUITTUNG ÜBER DEN ERHALT VON GELD</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[receipt_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[recipient_full_name]]</strong>, Ausweis-Nr. [[recipient_id_number]], bestätige hiermit den Erhalt von Herrn/Frau <strong>[[payer_full_name]]</strong>, Ausweis-Nr. [[payer_id_number]], des Betrags von <strong>[[amount_received]] PLN</strong>.</p>
                                <p>Der oben genannte Betrag stellt die Zahlung für das Fahrzeug der Marke: <strong>[[car_make]]</strong>, Modell: <strong>[[car_model]]</strong>, FIN-Nummer: <strong>[[vin_number]]</strong>, Kennzeichen: <strong>[[license_plate]]</strong> dar.</p>
                                <p>Ich bestätige, dass mit Erhalt dieses Betrags alle finanziellen Verpflichtungen im Zusammenhang mit dem Kauf des angegebenen Fahrzeugs vollständig beglichen wurden.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Empfängers)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Доверенность на управление автомобилем / Power of Attorney for Car Management ---
            [
                'slug' => 'poa-car-management-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"principal_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości mocodawcy","en":"Principal\'s ID Number","uk":"Номер посвідчення довірителя","de":"Ausweisnummer des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","en":"Agent\'s Full Name","uk":"ПІБ повіреного","de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"agent_address","type":"text","required":true,"labels":{"pl":"Adres pełnomocnika","en":"Agent\'s Address","uk":"Адреса повіреного","de":"Adresse des Bevollmächtigten"}},
                    {"name":"agent_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości pełnomocnika","en":"Agent\'s ID Number","uk":"Номер посвідчення повіреного","de":"Ausweisnummer des Bevollmächtigten"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN pojazdu","en":"Vehicle VIN Number","uk":"Номер VIN транспортного засобу","de":"FIN-Nummer des Fahrzeugs"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny pojazdu","en":"Vehicle License Plate Number","uk":"Номерний знак транспортного засобу","de":"Kennzeichen des Fahrzeugs"}},
                    {"name":"scope_of_authority","type":"textarea","required":true,"labels":{"pl":"Zakres pełnomocnictwa (np. prowadzenie, parkowanie, reprezentacja w urzędach)","en":"Scope of authority (e.g., driving, parking, representation in offices)","uk":"Обсяг повноважень (напр., керування, паркування, представництво в установах)","de":"Umfang der Vollmacht (z.B. Fahren, Parken, Vertretung bei Behörden)"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Okres ważności pełnomocnictwa (opcjonalnie)","en":"Validity period of power of attorney (optional)","uk":"Термін дії довіреності (необов\'язково)","de":"Gültigkeitsdauer der Vollmacht (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pełnomocnictwo do zarządzania pojazdem',
                        'description' => 'Dokument uprawniający pełnomocnika do zarządzania i korzystania z pojazdu w imieniu właściciela.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[poa_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[principal_full_name]]</strong>, zamieszkały/a w [[principal_address]], legitymujący/a się dowodem osobistym nr [[principal_id_number]],</p>
                                <p>niniejszym udzielam pełnomocnictwa Panu/Pani: <strong>[[agent_full_name]]</strong>, zamieszkałemu/ej w [[agent_address]], legitymującemu/ej się dowodem osobistym nr [[agent_id_number]],</p>
                                <p>do zarządzania i korzystania z pojazdu marki: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, numer VIN: <strong>[[vin_number]]</strong>, numer rejestracyjny: <strong>[[license_plate]]</strong>.</p>
                                <p>Zakres pełnomocnictwa obejmuje: [[scope_of_authority]]</p>
                                <p>Pełnomocnictwo jest ważne [[validity_period]].</p>
                                <p>Oświadczam, że jestem świadomy/a skutków prawnych udzielenia niniejszego pełnomocnictwa.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Car Management',
                        'description' => 'A document authorizing an agent to manage and use a vehicle on behalf of the owner.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[principal_full_name]]</strong>, residing in [[principal_address]], holding ID number [[principal_id_number]],</p>
                                <p>hereby grant power of attorney to Mr./Ms.: <strong>[[agent_full_name]]</strong>, residing in [[agent_address]], holding ID number [[agent_id_number]],</p>
                                <p>to manage and use the vehicle make: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, VIN number: <strong>[[vin_number]]</strong>, license plate number: <strong>[[license_plate]]</strong>.</p>
                                <p>The scope of authority includes: [[scope_of_authority]]</p>
                                <p>This Power of Attorney is valid [[validity_period]].</p>
                                <p>I declare that I am aware of the legal consequences of granting this power of attorney.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на управління автомобілем',
                        'description' => 'Документ, що уповноважує повіреного на управління та користування транспортним засобом від імені власника.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[principal_full_name]]</strong>, що проживає за адресою [[principal_address]], який/яка посвідчує особу за паспортом № [[principal_id_number]],</p>
                                <p>цим надаю довіреність Пану/Пані: <strong>[[agent_full_name]]</strong>, що проживає за адресою [[agent_address]], який/яка посвідчує особу за паспортом № [[agent_id_number]],</p>
                                <p>на управління та користування транспортним засобом марки: <strong>[[car_make]]</strong>, модель: <strong>[[car_model]]</strong>, номер VIN: <strong>[[vin_number]]</strong>, номерний знак: <strong>[[license_plate]]</strong>.</p>
                                <p>Обсяг повноважень включає: [[scope_of_authority]]</p>
                                <p>Довіреність дійсна [[validity_period]].</p>
                                <p>Заявляю, що я усвідомлюю правові наслідки надання цієї довіреності.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht zur Fahrzeugverwaltung',
                        'description' => 'Ein Dokument, das den Bevollmächtigten ermächtigt, ein Fahrzeug im Namen des Eigentümers zu verwalten und zu nutzen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[principal_full_name]]</strong>, wohnhaft in [[principal_address]], Ausweis-Nr. [[principal_id_number]],</p>
                                <p>erteile hiermit Herrn/Frau: <strong>[[agent_full_name]]</strong>, wohnhaft in [[agent_address]], Ausweis-Nr. [[agent_id_number]], die Vollmacht,</p>
                                <p>das Fahrzeug der Marke: <strong>[[car_make]]</strong>, Modell: <strong>[[car_model]]</strong>, FIN-Nummer: <strong>[[vin_number]]</strong>, Kennzeichen: <strong>[[license_plate]]</strong> zu verwalten und zu nutzen.</p>
                                <p>Der Umfang der Vollmacht umfasst: [[scope_of_authority]]</p>
                                <p>Die Vollmacht ist gültig [[validity_period]].</p>
                                <p>Ich erkläre, dass ich mir der rechtlichen Folgen der Erteilung dieser Vollmacht bewusst bin.</p>
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

            // --- Доверенность на продажу автомобиля / Power of Attorney for Car Sale ---
            [
                'slug' => 'poa-car-sale-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pełnomocnictwa","en":"POA Date","uk":"Дата видачі довіреності","de":"Datum der Vollmacht"}},
                    {"name":"principal_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko mocodawcy","en":"Principal\'s Full Name","uk":"ПІБ довірителя","de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"pl":"Adres mocodawcy","en":"Principal\'s Address","uk":"Адреса довірителя","de":"Adresse des Vollmachtgebers"}},
                    {"name":"principal_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości mocodawcy","en":"Principal\'s ID Number","uk":"Номер посвідчення довірителя","de":"Ausweisnummer des Vollmachtgebers"}},
                    {"name":"agent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pełnomocnika","en":"Agent\'s Full Name","uk":"ПІБ повіреного","de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"agent_address","type":"text","required":true,"labels":{"pl":"Adres pełnomocnika","en":"Agent\'s Address","uk":"Адреса повіреного","de":"Adresse des Bevollmächtigten"}},
                    {"name":"agent_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości pełnomocnika","en":"Agent\'s ID Number","uk":"Номер посвідчення повіреного","de":"Ausweisnummer des Bevollmächtigten"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN pojazdu","en":"Vehicle VIN Number","uk":"Номер VIN транспортного засобу","de":"FIN-Nummer des Fahrzeugs"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny pojazdu","en":"Vehicle License Plate Number","uk":"Номерний знак транспортного засобу","de":"Kennzeichen des Fahrzeugs"}},
                    {"name":"min_sale_price","type":"number","required":false,"labels":{"pl":"Minimalna cena sprzedaży (opcjonalnie)","en":"Minimum sale price (optional)","uk":"Мінімальна ціна продажу (необов\'язково)","de":"Mindestverkaufspreis (optional)"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Okres ważności pełnomocnictwa (opcjonalnie)","en":"Validity period of power of attorney (optional)","uk":"Термін дії довіреності (необов\'язково)","de":"Gültigkeitsdauer der Vollmacht (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pełnomocnictwo do sprzedaży samochodu',
                        'description' => 'Dokument uprawniający pełnomocnika do sprzedaży pojazdu w imieniu właściciela.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[poa_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[principal_full_name]]</strong>, zamieszkały/a w [[principal_address]], legitymujący/a się dowodem osobistym nr [[principal_id_number]],</p>
                                <p>niniejszym udzielam pełnomocnictwa Panu/Pani: <strong>[[agent_full_name]]</strong>, zamieszkałemu/ej w [[agent_address]], legitymującemu/ej się dowodem osobistym nr [[agent_id_number]],</p>
                                <p>do sprzedaży pojazdu marki: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, numer VIN: <strong>[[vin_number]]</strong>, numer rejestracyjny: <strong>[[license_plate]]</strong>.</p>
                                <p>Pełnomocnictwo obejmuje prawo do negocjowania ceny, podpisywania umów, odbierania zapłaty oraz wszelkich innych czynności niezbędnych do skutecznej sprzedaży pojazdu.</p>
                                <p>Minimalna cena sprzedaży: [[min_sale_price]] PLN (opcjonalnie).</p>
                                <p>Pełnomocnictwo jest ważne [[validity_period]].</p>
                                <p>Oświadczam, że jestem świadomy/a skutków prawnych udzielenia niniejszego pełnomocnictwa.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Car Sale',
                        'description' => 'A document authorizing an agent to sell a vehicle on behalf of the owner.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[principal_full_name]]</strong>, residing in [[principal_address]], holding ID number [[principal_id_number]],</p>
                                <p>hereby grant power of attorney to Mr./Ms.: <strong>[[agent_full_name]]</strong>, residing in [[agent_address]], holding ID number [[agent_id_number]],</p>
                                <p>to sell the vehicle make: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, VIN number: <strong>[[vin_number]]</strong>, license plate number: <strong>[[license_plate]]</strong>.</p>
                                <p>The power of attorney includes the right to negotiate the price, sign contracts, receive payment, and perform all other actions necessary for the effective sale of the vehicle.</p>
                                <p>Minimum sale price: [[min_sale_price]] PLN (optional).</p>
                                <p>This Power of Attorney is valid [[validity_period]].</p>
                                <p>I declare that I am aware of the legal consequences of granting this power of attorney.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на продаж автомобіля',
                        'description' => 'Документ, що уповноважує повіреного на продаж транспортного засобу від імені власника.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[principal_full_name]]</strong>, що проживає за адресою [[principal_address]], який/яка посвідчує особу за паспортом № [[principal_id_number]],</p>
                                <p>цим надаю довіреність Пану/Пані: <strong>[[agent_full_name]]</strong>, що проживає за адресою [[agent_address]], який/яка посвідчує особу за паспортом № [[agent_id_number]],</p>
                                <p>на продаж транспортного засобу марки: <strong>[[car_make]]</strong>, модель: <strong>[[car_model]]</strong>, номер VIN: <strong>[[vin_number]]</strong>, номерний знак: <strong>[[license_plate]]</strong>.</p>
                                <p>Довіреність включає право на ведення переговорів щодо ціни, підписання договорів, отримання оплати та здійснення будь-яких інших дій, необхідних для ефективного продажу транспортного засобу.</p>
                                <p>Мінімальна ціна продажу: [[min_sale_price]] PLN (необов\'язково).</p>
                                <p>Довіреність дійсна [[validity_period]].</p>
                                <p>Заявляю, що я усвідомлюю правові наслідки надання цієї довіреності.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[principal_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht zum Autoverkauf',
                        'description' => 'Ein Dokument, das den Bevollmächtigten ermächtigt, ein Fahrzeug im Namen des Eigentümers zu verkaufen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[poa_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[principal_full_name]]</strong>, wohnhaft in [[principal_address]], Ausweis-Nr. [[principal_id_number]],</p>
                                <p>erteile hiermit Herrn/Frau: <strong>[[agent_full_name]]</strong>, wohnhaft in [[agent_address]], Ausweis-Nr. [[agent_id_number]], die Vollmacht,</p>
                                <p>das Fahrzeug der Marke: <strong>[[car_make]]</strong>, Modell: <strong>[[car_model]]</strong>, FIN-Nummer: <strong>[[vin_number]]</strong>, Kennzeichen: <strong>[[license_plate]]</strong> zu verkaufen.</p>
                                <p>Die Vollmacht umfasst das Recht, den Preis zu verhandeln, Verträge zu unterzeichnen, Zahlungen entgegenzunehmen und alle anderen Handlungen vorzunehmen, die für den wirksamen Verkauf des Fahrzeugs erforderlich sind.</p>
                                <p>Mindestverkaufspreis: [[min_sale_price]] PLN (optional).</p>
                                <p>Die Vollmacht ist gültig [[validity_period]].</p>
                                <p>Ich erkläre, dass ich mir der rechtlichen Folgen der Erteilung dieser Vollmacht bewusst bin.</p>
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

            // --- Договор аренды автомобиля / Car Rental Agreement ---
            [
                'slug' => 'car-rental-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"lessor_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa wynajmującego","en":"Lessor\'s Name/Company Name","uk":"ПІБ/назва орендодавця","de":"Name/Firmenname des Vermieters"}},
                    {"name":"lessor_address","type":"text","required":true,"labels":{"pl":"Adres wynajmującego","en":"Lessor\'s Address","uk":"Адреса орендодавця","de":"Adresse des Vermieters"}},
                    {"name":"lessor_pesel_nip","type":"text","required":true,"labels":{"pl":"PESEL/NIP wynajmującego","en":"Lessor\'s PESEL/NIP","uk":"ПЕСЕЛЬ/ІПН орендодавця","de":"PESEL/NIP des Vermieters"}},
                    {"name":"lessee_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa najemcy","en":"Lessee\'s Name/Company Name","uk":"ПІБ/назва орендаря","de":"Name/Firmenname des Mieters"}},
                    {"name":"lessee_address","type":"text","required":true,"labels":{"pl":"Adres najemcy","en":"Lessee\'s Address","uk":"Адреса орендаря","de":"Adresse des Mieters"}},
                    {"name":"lessee_pesel_nip","type":"text","required":true,"labels":{"pl":"PESEL/NIP najemcy","en":"Lessee\'s PESEL/NIP","uk":"ПЕСЕЛЬ/ІПН орендаря","de":"PESEL/NIP des Mieters"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"car_year","type":"number","required":true,"labels":{"pl":"Rok produkcji","en":"Year of Manufacture","uk":"Рік випуску","de":"Baujahr"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"pl":"Numer VIN","en":"VIN Number","uk":"Номер VIN","de":"FIN-Nummer"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny","en":"License Plate Number","uk":"Номерний знак","de":"Kennzeichen"}},
                    {"name":"rental_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia najmu","en":"Rental Start Date","uk":"Дата початку оренди","de":"Mietbeginn"}},
                    {"name":"rental_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia najmu","en":"Rental End Date","uk":"Дата закінчення оренди","de":"Mietende"}},
                    {"name":"rental_fee","type":"number","required":true,"labels":{"pl":"Stawka najmu (za dzień/miesiąc)","en":"Rental Fee (per day/month)","uk":"Ставка оренди (за день/місяць)","de":"Mietpreis (pro Tag/Monat)"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}},
                    {"name":"insurance_details","type":"textarea","required":false,"labels":{"pl":"Szczegóły ubezpieczenia (opcjonalnie)","en":"Insurance details (optional)","uk":"Деталі страхування (необов\'язково)","de":"Versicherungsdetails (optional)"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne warunki (opcjonalnie)","en":"Other conditions (optional)","uk":"Інші умови (необов\'язково)","de":"Weitere Bedingungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa najmu samochodu',
                        'description' => 'Standardowa umowa najmu samochodu, określająca warunki wynajmu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU SAMOCHODU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Wynajmującym:</strong> [[lessor_name]], adres: [[lessor_address]], PESEL/NIP: [[lessor_pesel_nip]],</p>
                                <p>a</p>
                                <p><strong>Najemcą:</strong> [[lessee_name]], adres: [[lessee_address]], PESEL/NIP: [[lessee_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Wynajmujący oddaje Najemcy do używania pojazd marki: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, rok produkcji: <strong>[[car_year]]</strong>, numer VIN: <strong>[[vin_number]]</strong>, numer rejestracyjny: <strong>[[license_plate]]</strong>.</p>
                                <p>Okres najmu: od <strong>[[rental_start_date]]</strong> do <strong>[[rental_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Czynsz najmu i warunki płatności</h2>
                                <p>Czynsz najmu wynosi: <strong>[[rental_fee]] [[currency]]</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Ubezpieczenie</h2>
                                <p>[[insurance_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Inne warunki</h2>
                                <p>[[other_conditions]]</p>
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
                        'title' => 'Car Rental Agreement',
                        'description' => 'Standard car rental agreement, specifying rental terms.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CAR RENTAL AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Lessor:</strong> [[lessor_name]], address: [[lessor_address]], PESEL/NIP: [[lessor_pesel_nip]],</p>
                                <p>and</p>
                                <p><strong>Lessee:</strong> [[lessee_name]], address: [[lessee_address]], PESEL/NIP: [[lessee_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The Lessor leases to the Lessee the vehicle make: <strong>[[car_make]]</strong>, model: <strong>[[car_model]]</strong>, year of manufacture: <strong>[[car_year]]</strong>, VIN number: <strong>[[vin_number]]</strong>, license plate number: <strong>[[license_plate]]</strong>.</p>
                                <p>Rental period: from <strong>[[rental_start_date]]</strong> to <strong>[[rental_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Rental Fee and Payment Terms</h2>
                                <p>The rental fee is: <strong>[[rental_fee]] [[currency]]</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Insurance</h2>
                                <p>[[insurance_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Other Conditions</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Lessor</p></td>
                                <td width="50%"><p>___________________<br>Lessee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оренди автомобіля',
                        'description' => 'Стандартний договір оренди автомобіля, що визначає умови оренди.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ АВТОМОБІЛЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Орендодавцем:</strong> [[lessor_name]], адреса: [[lessor_address]], ПЕСЕЛЬ/ІПН: [[lessor_pesel_nip]],</p>
                                <p>та</p>
                                <p><strong>Орендарем:</strong> [[lessee_name]], адреса: [[lessee_address]], ПЕСЕЛЬ/ІПН: [[lessee_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Орендодавець передає Орендарю в користування транспортний засіб марки: <strong>[[car_make]]</strong>, модель: <strong>[[car_model]]</strong>, рік випуску: <strong>[[car_year]]</strong>, номер VIN: <strong>[[vin_number]]</strong>, номерний знак: <strong>[[license_plate]]</strong>.</p>
                                <p>Термін оренди: з <strong>[[rental_start_date]]</strong> по <strong>[[rental_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Орендна плата та умови оплати</h2>
                                <p>Орендна плата становить: <strong>[[rental_fee]] [[currency]]</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Страхування</h2>
                                <p>[[insurance_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Інші умови</h2>
                                <p>[[other_conditions]]</p>
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
                        'title' => 'Mietvertrag für ein Kraftfahrzeug',
                        'description' => 'Standard-Mietvertrag für ein Kraftfahrzeug, der die Mietbedingungen festlegt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETVERTRAG FÜR EIN KRAFTFAHRZEUG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Vermieter:</strong> [[lessor_name]], Adresse: [[lessor_address]], PESEL/NIP: [[lessor_pesel_nip]],</p>
                                <p>und</p>
                                <p><strong>Mieter:</strong> [[lessee_name]], Adresse: [[lessee_address]], PESEL/NIP: [[lessee_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Der Vermieter überlässt dem Mieter das Fahrzeug der Marke: <strong>[[car_make]]</strong>, Modell: <strong>[[car_model]]</strong>, Baujahr: <strong>[[car_year]]</strong>, FIN-Nummer: <strong>[[vin_number]]</strong>, Kennzeichen: <strong>[[license_plate]]</strong> zur Nutzung.</p>
                                <p>Mietzeitraum: vom <strong>[[rental_start_date]]</strong> bis zum <strong>[[rental_end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Mietzins und Zahlungsbedingungen</h2>
                                <p>Der Mietzins beträgt: <strong>[[rental_fee]] [[currency]]</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Versicherung</h2>
                                <p>[[insurance_details]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Weitere Bedingungen</h2>
                                <p>[[other_conditions]]</p>
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

            // --- Европротокол (извещение о ДТП) / European Accident Statement ---
            [
                'slug' => 'european-accident-statement-pl',
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
                    'pl' => [
                        'title' => 'Oświadczenie o zdarzeniu drogowym (Europrotokół)',
                        'description' => 'Uproszczony formularz zgłoszenia kolizji drogowej, wypełniany przez uczestników bez udziału policji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OŚWIADCZENIE O ZDARZENIU DROGOWYM</h1><p style="font-size: 14px;">(EUROPROTOKÓŁ)</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[statement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Data wypadku: <strong>[[accident_date]]</strong>, Godzina: <strong>[[accident_time]]</strong></p>
                                <p>Miejsce wypadku: <strong>[[accident_location]]</strong></p>
                                <p>Świadkowie: [[witnesses]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">POJAZD A</h2>
                                <p>Kierujący: <strong>[[vehicle_a_driver_full_name]]</strong></p>
                                <p>Numer rejestracyjny: [[vehicle_a_license_plate]]</p>
                                <p>Ubezpieczyciel: [[vehicle_a_insurance_company]], Polisa nr: [[vehicle_a_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">POJAZD B</h2>
                                <p>Kierujący: <strong>[[vehicle_b_driver_full_name]]</strong></p>
                                <p>Numer rejestracyjny: [[vehicle_b_license_plate]]</p>
                                <p>Ubezpieczyciel: [[vehicle_b_insurance_company]], Polisa nr: [[vehicle_b_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">OKOLICZNOŚCI WYPADKU</h2>
                                <p>[[accident_circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">OPIS USZKODZEŃ</h2>
                                <p>[[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">STRONA ODPOWIEDZIALNA</h2>
                                <p>Za wypadek odpowiedzialny jest: <strong>Pojazd [[responsible_party]]</strong></p>
                                <br/>
                                <p>Podpisy stron potwierdzają zgodność danych zawartych w niniejszym oświadczeniu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Podpis kierującego A</p></td>
                                <td width="50%"><p>___________________<br>Podpis kierującego B</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'European Accident Statement',
                        'description' => 'Simplified road collision report form, filled out by participants without police involvement.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EUROPEAN ACCIDENT STATEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[statement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Accident Date: <strong>[[accident_date]]</strong>, Time: <strong>[[accident_time]]</strong></p>
                                <p>Accident Location: <strong>[[accident_location]]</strong></p>
                                <p>Witnesses: [[witnesses]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">VEHICLE A</h2>
                                <p>Driver: <strong>[[vehicle_a_driver_full_name]]</strong></p>
                                <p>License Plate: [[vehicle_a_license_plate]]</p>
                                <p>Insurer: [[vehicle_a_insurance_company]], Policy No: [[vehicle_a_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">VEHICLE B</h2>
                                <p>Driver: <strong>[[vehicle_b_driver_full_name]]</strong></p>
                                <p>License Plate: [[vehicle_b_license_plate]]</p>
                                <p>Insurer: [[vehicle_b_insurance_company]], Policy No: [[vehicle_b_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">CIRCUMSTANCES OF THE ACCIDENT</h2>
                                <p>[[accident_circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">DESCRIPTION OF DAMAGE</h2>
                                <p>[[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">RESPONSIBLE PARTY</h2>
                                <p>Responsible for the accident: <strong>Vehicle [[responsible_party]]</strong></p>
                                <br/>
                                <p>The signatures of the parties confirm the accuracy of the data contained in this statement.</p>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЄВРОПРОТОКОЛ (ПОВІДОМЛЕННЯ ПРО ДТП)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Дата ДТП: <strong>[[accident_date]]</strong>, Час: <strong>[[accident_time]]</strong></p>
                                <p>Місце ДТП: <strong>[[accident_location]]</strong></p>
                                <p>Свідки: [[witnesses]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ТРАНСПОРТНИЙ ЗАСІБ А</h2>
                                <p>Водій: <strong>[[vehicle_a_driver_full_name]]</strong></p>
                                <p>Номерний знак: [[vehicle_a_license_plate]]</p>
                                <p>Страховик: [[vehicle_a_insurance_company]], Поліс №: [[vehicle_a_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ТРАНСПОРТНИЙ ЗАСІБ Б</h2>
                                <p>Водій: <strong>[[vehicle_b_driver_full_name]]</strong></p>
                                <p>Номерний знак: [[vehicle_b_license_plate]]</p>
                                <p>Страховик: [[vehicle_b_insurance_company]], Поліс №: [[vehicle_b_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОБСТАВИНИ ДТП</h2>
                                <p>[[accident_circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОПИС ПОШКОДЖЕНЬ</h2>
                                <p>[[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ВІДПОВІДАЛЬНА СТОРОНА</h2>
                                <p>Відповідальний за ДТП: <strong>Транспортний засіб [[responsible_party]]</strong></p>
                                <br/>
                                <p>Підписи сторін підтверджують відповідність даних, що містяться в цій заяві.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Підпис водія А</p></td>
                                <td width="50%"><p>___________________<br>Підпис водія Б</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Europäischer Unfallbericht',
                        'description' => 'Vereinfachter Unfallbericht, der von den Beteiligten ohne Polizeibeteiligung ausgefüllt wird.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EUROPÄISCHER UNFALLBERICHT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[statement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Unfalldatum: <strong>[[accident_date]]</strong>, Uhrzeit: <strong>[[accident_time]]</strong></p>
                                <p>Unfallort: <strong>[[accident_location]]</strong></p>
                                <p>Zeugen: [[witnesses]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">FAHRZEUG A</h2>
                                <p>Fahrer: <strong>[[vehicle_a_driver_full_name]]</strong></p>
                                <p>Kennzeichen: [[vehicle_a_license_plate]]</p>
                                <p>Versicherer: [[vehicle_a_insurance_company]], Policennummer: [[vehicle_a_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">FAHRZEUG B</h2>
                                <p>Fahrer: <strong>[[vehicle_b_driver_full_name]]</strong></p>
                                <p>Kennzeichen: [[vehicle_b_license_plate]]</p>
                                <p>Versicherer: [[vehicle_b_insurance_company]], Policennummer: [[vehicle_b_policy_number]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">UNFALLUMSTÄNDE</h2>
                                <p>[[accident_circumstances]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SCHADENSBESCHREIBUNG</h2>
                                <p>[[damage_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">VERANTWORTLICHE PARTEI</h2>
                                <p>Verantwortlich für den Unfall ist: <strong>Fahrzeug [[responsible_party]]</strong></p>
                                <br/>
                                <p>Die Unterschriften der Parteien bestätigen die Richtigkeit der in diesem Bericht enthaltenen Daten.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Unterschrift Fahrer A</p></td>
                                <td width="50%"><p>___________________<br>Unterschrift Fahrer B</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Претензия в страховую компанию о выплате возмещения / Claim to Insurance Company for Compensation ---
            [
                'slug' => 'claim-insurance-compensation-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"claim_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia roszczenia","en":"Claim Date","uk":"Дата складання претензії","de":"Datum der Forderung"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko poszkodowanego/ubezpieczonego","en":"Injured Party\'s/Insured\'s Full Name","uk":"ПІБ потерпілого/застрахованого","de":"Vollständiger Name des Geschädigten/Versicherten"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres poszkodowanego/ubezpieczonego","en":"Injured Party\'s/Insured\'s Address","uk":"Адреса потерпілого/застрахованого","de":"Adresse des Geschädigten/Versicherten"}},
                    {"name":"claimant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail poszkodowanego/ubezpieczonego","en":"Injured Party\'s/Insured\'s Phone & Email","uk":"Телефон та e-mail потерпілого/застрахованого","de":"Telefon und E-Mail des Geschädigten/Versicherten"}},
                    {"name":"insurance_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy ubezpieczeniowej","en":"Insurance Company Name","uk":"Назва страхової компанії","de":"Name der Versicherungsgesellschaft"}},
                    {"name":"insurance_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy ubezpieczeniowej","en":"Insurance Company Address","uk":"Адреса страхової компанії","de":"Adresse der Versicherungsgesellschaft"}},
                    {"name":"policy_number","type":"text","required":true,"labels":{"pl":"Numer polisy ubezpieczeniowej","en":"Insurance Policy Number","uk":"Номер страхового поліса","de":"Versicherungspolicennummer"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"pl":"Data zdarzenia (wypadku/szkody)","en":"Date of Incident (accident/damage)","uk":"Дата події (ДТП/шкоди)","de":"Datum des Vorfalls (Unfall/Schaden)"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis zdarzenia i powstałej szkody","en":"Detailed description of the incident and resulting damage","uk":"Детальний опис події та завданої шкоди","de":"Detaillierte Beschreibung des Vorfalls und des entstandenen Schadens"}},
                    {"name":"requested_compensation_amount","type":"number","required":true,"labels":{"pl":"Żądana kwota odszkodowania (PLN)","en":"Requested compensation amount (PLN)","uk":"Затребувана сума відшкодування (PLN)","de":"Geforderter Entschädigungsbetrag (PLN)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. protokół, zdjęcia, faktury za naprawę)","en":"Attachments (e.g., protocol, photos, repair invoices)","uk":"Додатки (напр., протокол, фото, рахунки за ремонт)","de":"Anhänge (z.B. Protokoll, Fotos, Reparaturrechnungen)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Roszczenie o wypłatę odszkodowania do firmy ubezpieczeniowej',
                        'description' => 'Formalne roszczenie o wypłatę odszkodowania z polisy ubezpieczeniowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ROSZCZENIE O WYPŁATĘ ODSZKODOWANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[claimant_full_name]]<br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[insurance_company_name]]</strong><br>[[insurance_company_address]]</p>
                                <br/>
                                <p>Niniejszym, jako poszkodowany/ubezpieczony, zgłaszam roszczenie o wypłatę odszkodowania z polisy nr <strong>[[policy_number]]</strong>, w związku ze zdarzeniem, które miało miejsce w dniu <strong>[[incident_date]]</strong>.</p>
                                <p>Szczegółowy opis zdarzenia i powstałej szkody:</p>
                                <p>[[incident_description]]</p>
                                <p>Żądam wypłaty odszkodowania w kwocie: <strong>[[requested_compensation_amount]] PLN</strong>.</p>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <p>Proszę o pilne rozpatrzenie mojego roszczenia i wypłatę należnego odszkodowania.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Claim for Compensation to Insurance Company',
                        'description' => 'Formal claim for compensation payment from an insurance policy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CLAIM FOR COMPENSATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[claimant_full_name]]<br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[insurance_company_name]]</strong><br>[[insurance_company_address]]</p>
                                <br/>
                                <p>I hereby, as the injured party/insured, submit a claim for compensation payment from policy no. <strong>[[policy_number]]</strong>, in connection with the incident that occurred on <strong>[[incident_date]]</strong>.</p>
                                <p>Detailed description of the incident and resulting damage:</p>
                                <p>[[incident_description]]</p>
                                <p>I demand compensation in the amount of: <strong>[[requested_compensation_amount]] PLN</strong>.</p>
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
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПРЕТЕНЗІЯ ПРО ВИПЛАТУ ВІДШКОДУВАННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[claimant_full_name]]<br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[insurance_company_name]]</strong><br>[[insurance_company_address]]</p>
                                <br/>
                                <p>Цим, як потерпілий/застрахований, подаю претензію про виплату відшкодування за полісом № <strong>[[policy_number]]</strong>, у зв\'язку з подією, що сталася <strong>[[incident_date]]</strong>.</p>
                                <p>Детальний опис події та завданої шкоди:</p>
                                <p>[[incident_description]]</p>
                                <p>Вимагаю виплати відшкодування в сумі: <strong>[[requested_compensation_amount]] PLN</strong>.</p>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <p>Прошу терміново розглянути мою претензію та виплатити належне відшкодування.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Підпис потерпілого/застрахованого</p></td>
                                <td width="50%"><p>___________________<br>Підпис представника страхової компанії</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Forderung an die Versicherungsgesellschaft auf Entschädigungszahlung',
                        'description' => 'Formelle Forderung auf Entschädigungszahlung aus einer Versicherungspolice.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FORDERUNG AUF ENTSCHÄDIGUNGSZAHLUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[claimant_full_name]]<br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[insurance_company_name]]</strong><br>[[insurance_company_address]]</p>
                                <br/>
                                <p>Hiermit stelle ich, als Geschädigter/Versicherter, einen Anspruch auf Entschädigungszahlung aus der Police Nr. <strong>[[policy_number]]</strong>, im Zusammenhang mit dem Vorfall vom <strong>[[incident_date]]</strong>.</p>
                                <p>Detaillierte Beschreibung des Vorfalls und des entstandenen Schadens:</p>
                                <p>[[incident_description]]</p>
                                <p>Ich fordere eine Entschädigungszahlung in Höhe von: <strong>[[requested_compensation_amount]] PLN</strong>.</p>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <p>Bitte bearbeiten Sie meinen Anspruch umgehend und zahlen Sie die fällige Entschädigung aus.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Unterschrift des Geschädigten/Versicherten</p></td>
                                <td width="50%"><p>___________________<br>Unterschrift des Vertreters der Versicherungsgesellschaft</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Журнал учета технического обслуживания автомобиля / Car Maintenance Log ---
            [
                'slug' => 'car-maintenance-log-pl',
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
                    'pl' => [
                        'title' => 'Dziennik techniczny samochodu',
                        'description' => 'Szablon dziennika do rejestrowania historii serwisowej i konserwacji pojazdu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK TECHNICZNY SAMOCHODU</h1><p style="font-size: 14px;">Właściciel: <strong>[[car_owner_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Pojazd: <strong>[[car_make]] [[car_model]]</strong></p></td><td style="text-align: right;"><p>VIN: [[vin_number]], Rejestracja: [[license_plate]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Okres prowadzenia dziennika: <strong>[[log_period]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Wpisy serwisowe:</h2>
                                <pre>
Data | Przebieg (km) | Rodzaj usługi | Koszt (PLN) | Uwagi
-----------------------------------------------------------------------------------------------------
[[maintenance_entries]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis właściciela)</p>
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
Date | Mileage (km) | Type of Service | Cost (PLN) | Notes
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
Дата | Пробіг (км) | Вид послуги | Вартість (PLN) | Примітки
-----------------------------------------------------------------------------------------------------
[[maintenance_entries]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис власника)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Fahrzeugwartungsprotokoll',
                        'description' => 'Eine Protokollvorlage zur Aufzeichnung der Servicehistorie und Wartung eines Fahrzeugs.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FAHRZEUGWARTUNGSPROTOKOLL</h1><p style="font-size: 14px;">Eigentümer: <strong>[[car_owner_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Fahrzeug: <strong>[[car_make]] [[car_model]]</strong></p></td><td style="text-align: right;"><p>FIN: [[vin_number]], Kennzeichen: [[license_plate]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Zeitraum des Protokolls: <strong>[[log_period]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Wartungseinträge:</h2>
                                <pre>
Datum | Kilometerstand (km) | Art der Dienstleistung | Kosten (PLN) | Anmerkungen
-----------------------------------------------------------------------------------------------------
[[maintenance_entries]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Eigentümers)</p>
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
