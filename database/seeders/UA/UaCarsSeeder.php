<?php

namespace Database\Seeders\UA;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Support\Arr;

class UaCarsSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'automobiles-ua')->first();
        if (!$category) {
            $this->command->error('Category with slug "automobiles" not found.');
            return;
        }

        $templatesData = [
            // --- 1. Договор купли-продажи автомобиля ---
            [
                'slug' => 'car-purchase-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"ПІБ продавця","en":"Seller\'s Full Name", "pl":"Imię i nazwisko sprzedawcy", "de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані продавця","en":"Seller\'s Passport Details", "pl":"Dane paszportowe sprzedawcy", "de":"Passdaten des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"uk":"Адреса проживання продавця","en":"Seller\'s residence address", "pl":"Adres zamieszkania sprzedawcy", "de":"Wohnadresse des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"ПІБ покупця","en":"Buyer\'s Full Name", "pl":"Imię i nazwisko nabywcy", "de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані покупця","en":"Buyer\'s Passport Details", "pl":"Dane paszportowe nabywcy", "de":"Passdaten des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"uk":"Адреса проживання покупця","en":"Buyer\'s residence address", "pl":"Adres zamieszkania nabywcy", "de":"Wohnadresse des Käufers"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"uk":"Марка автомобіля","en":"Car Make", "pl":"Marka samochodu", "de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"uk":"Модель автомобіля","en":"Car Model", "pl":"Model samochodu", "de":"Fahrzeugmodell"}},
                    {"name":"car_year","type":"number","required":true,"labels":{"uk":"Рік випуску","en":"Year of Manufacture", "pl":"Rok produkcji", "de":"Baujahr"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"uk":"VIN-код","en":"VIN", "pl":"Numer VIN", "de":"FIN"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"uk":"Державний номер","en":"License Plate", "pl":"Numer rejestracyjny", "de":"Kennzeichen"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"uk":"Продажна ціна (грн)","en":"Sale Price (UAH)", "pl":"Cena sprzedaży (UAH)", "de":"Verkaufspreis (UAH)"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"uk":"Умови оплати","en":"Payment Terms", "pl":"Warunki płatności", "de":"Zahlungsbedingungen"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір купівлі-продажу автомобіля',
                        'description' => 'Договір про передачу права власності на автомобіль від продавця до покупця.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР КУПІВЛІ-ПРОДАЖУ АВТОМОБІЛЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[seller_name]]</strong>, паспорт: [[seller_passport]], проживаю за адресою: [[seller_address]], надалі "Продавець", з одного боку, та
                                <strong>[[buyer_name]]</strong>, паспорт: [[buyer_passport]], проживаю за адресою: [[buyer_address]], надалі "Покупець", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Продавець передає, а Покупець приймає у власність автомобіль: [[car_make]] [[car_model]], [[car_year]] року випуску, VIN: [[vin_number]], державний номер: [[license_plate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ЦІНА ТА ПОРЯДОК РОЗРАХУНКІВ</h2>
                                <p>2.1. Продажна ціна автомобіля становить <strong>[[sale_price]]</strong> грн.</p>
                                <p>2.2. Умови оплати: [[payment_terms]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ПРОДАВЕЦЬ:</strong></p>
                                            <p>[[seller_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[seller_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ПОКУПЕЦЬ:</strong></p>
                                            <p>[[buyer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[buyer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Car Purchase and Sale Agreement',
                        'description' => 'Agreement on the transfer of car ownership from seller to buyer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CAR PURCHASE AND SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[seller_name]]</strong>, passport: [[seller_passport]], residing at: [[seller_address]], hereinafter "Seller", on the one hand, and
                                <strong>[[buyer_name]]</strong>, passport: [[buyer_passport]], residing at: [[buyer_address]], hereinafter "Buyer", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Seller transfers, and the Buyer accepts ownership of the car: [[car_make]] [[car_model]], year of manufacture [[car_year]], VIN: [[vin_number]], license plate: [[license_plate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. PRICE AND PAYMENT PROCEDURE</h2>
                                <p>2.1. The sale price of the car is <strong>[[sale_price]]</strong> UAH.</p>
                                <p>2.2. Payment terms: [[payment_terms]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>SELLER:</strong></p>
                                            <p>[[seller_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[seller_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>BUYER:</strong></p>
                                            <p>[[buyer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[buyer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa kupna-sprzedaży samochodu',
                        'description' => 'Umowa o przeniesienie prawa własności samochodu od sprzedawcy do nabywcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA KUPNA-SPRZEDAŻY SAMOCHODU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[seller_name]]</strong>, paszport: [[seller_passport]], zamieszkały(a) pod adresem: [[seller_address]], zwany(a) dalej "Sprzedawcą", z jednej strony, oraz
                                <strong>[[buyer_name]]</strong>, paszport: [[buyer_passport]], zamieszkały(a) pod adresem: [[buyer_address]], zwany(a) dalej "Nabywcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Sprzedawca przekazuje, a Nabywca przyjmuje na własność samochód: [[car_make]] [[car_model]], rok produkcji [[car_year]], VIN: [[vin_number]], numer rejestracyjny: [[license_plate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. CENA I ZASADY ROZLICZEŃ</h2>
                                <p>2.1. Cena sprzedaży samochodu wynosi <strong>[[sale_price]]</strong> UAH.</p>
                                <p>2.2. Warunki płatności: [[payment_terms]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>SPRZEDAWCA:</strong></p>
                                            <p>[[seller_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[seller_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>NABYWCA:</strong></p>
                                            <p>[[buyer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[buyer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Kaufvertrag für ein Auto',
                        'description' => 'Vertrag über die Eigentumsübertragung eines Autos vom Verkäufer an den Käufer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KAUFVERTRAG FÜR EIN AUTO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[seller_name]]</strong>, Reisepass: [[seller_passport]], wohnhaft unter der Adresse: [[seller_address]], nachfolgend "Verkäufer" genannt, einerseits, und
                                <strong>[[buyer_name]]</strong>, Reisepass: [[buyer_passport]], wohnhaft unter der Adresse: [[buyer_address]], nachfolgend "Käufer" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Verkäufer überträgt, und der Käufer erwirbt das Eigentum an dem Auto: [[car_make]] [[car_model]], Baujahr [[car_year]], FIN: [[vin_number]], Kennzeichen: [[license_plate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. PREIS UND ZAHLUNGSWEISE</h2>
                                <p>2.1. Der Verkaufspreis des Autos beträgt <strong>[[sale_price]]</strong> UAH.</p>
                                <p>2.2. Zahlungsbedingungen: [[payment_terms]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>VERKÄUFER:</strong></p>
                                            <p>[[seller_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[seller_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>KÄUFER:</strong></p>
                                            <p>[[buyer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[buyer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 2. Акт приема-передачи автомобиля ---
            [
                'slug' => 'car-handover-act-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання акту","en":"City of Act Compilation", "pl":"Miejscowość sporządzenia protokołu", "de":"Ort der Akterstellung"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"ПІБ продавця","en":"Seller\'s Full Name", "pl":"Imię i nazwisko sprzedawcy", "de":"Vollständiger Name des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"ПІБ покупця","en":"Buyer\'s Full Name", "pl":"Imię i nazwisko nabywcy", "de":"Vollständiger Name des Käufers"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"uk":"Марка автомобіля","en":"Car Make", "pl":"Marka samochodu", "de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"uk":"Модель автомобіля","en":"Car Model", "pl":"Model samochodu", "de":"Fahrzeugmodell"}},
                    {"name":"car_year","type":"number","required":true,"labels":{"uk":"Рік випуску","en":"Year of Manufacture", "pl":"Rok produkcji", "de":"Baujahr"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"uk":"VIN-код","en":"VIN", "pl":"Numer VIN", "de":"FIN"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"uk":"Державний номер","en":"License Plate", "pl":"Numer rejestracyjny", "de":"Kennzeichen"}},
                    {"name":"purchase_agreement_date","type":"date","required":true,"labels":{"uk":"Дата договору купівлі-продажу","en":"Purchase Agreement Date", "pl":"Data umowy kupna-sprzedaży", "de":"Datum des Kaufvertrags"}},
                    {"name":"odometer_reading","type":"number","required":true,"labels":{"uk":"Показник одометра (км)","en":"Odometer Reading (km)", "pl":"Stan licznika (km)", "de":"Kilometerstand (km)"}},
                    {"name":"car_condition_description","type":"textarea","required":true,"labels":{"uk":"Опис стану автомобіля (зовнішній вигляд, салон, технічний стан)","en":"Description of Car Condition (exterior, interior, technical condition)", "pl":"Opis stanu samochodu (wygląd zewnętrzny, wnętrze, stan techniczny)", "de":"Beschreibung des Fahrzeugzustands (Exterieur, Interieur, technischer Zustand)"}},
                    {"name":"documents_transferred","type":"textarea","required":true,"labels":{"uk":"Перелік переданих документів (техпаспорт, сервісна книжка)","en":"List of Documents Transferred (vehicle registration certificate, service book)", "pl":"Lista przekazanych dokumentów (dowód rejestracyjny, książka serwisowa)", "de":"Liste der übergebenen Dokumente (Fahrzeugschein, Serviceheft)"}},
                    {"name":"keys_transferred","type":"number","required":true,"labels":{"uk":"Кількість переданих ключів","en":"Number of Keys Transferred", "pl":"Liczba przekazanych kluczy", "de":"Anzahl der übergebenen Schlüssel"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Акт прийому-передачі автомобіля',
                        'description' => 'Документ, що фіксує стан автомобіля та його комплектацію при передачі від продавця до покупця.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ ПРИЙОМУ-ПЕРЕДАЧІ АВТОМОБІЛЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[seller_name]]</strong>, надалі "Продавець", з одного боку, та
                                <strong>[[buyer_name]]</strong>, надалі "Покупець", з іншого боку, склали цей Акт про наступне:</p>
                                <p>1. Продавець передав, а Покупець прийняв автомобіль: [[car_make]] [[car_model]], [[car_year]] року випуску, VIN: [[vin_number]], державний номер: [[license_plate]], згідно з Договором купівлі-продажу від [[purchase_agreement_date]].</p>
                                <p>2. Показник одометра: [[odometer_reading]] км.</p>
                                <p>3. Стан автомобіля: [[car_condition_description]].</p>
                                <p>4. Передано документи: [[documents_transferred]].</p>
                                <p>5. Передано [[keys_transferred]] комплект(ів) ключів.</p>
                                <p>Сторони претензій не мають.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ПРОДАВЕЦЬ:</strong></p>
                                            <p>[[seller_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[seller_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ПОКУПЕЦЬ:</strong></p>
                                            <p>[[buyer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[buyer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Car Handover Act',
                        'description' => 'Document recording the condition of the car and its completeness upon transfer from seller to buyer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CAR HANDOVER ACT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[seller_name]]</strong>, hereinafter "Seller", on the one hand, and
                                <strong>[[buyer_name]]</strong>, hereinafter "Buyer", on the other hand, have drawn up this Act as follows:</p>
                                <p>1. The Seller transferred, and the Buyer accepted the car: [[car_make]] [[car_model]], year of manufacture [[car_year]], VIN: [[vin_number]], license plate: [[license_plate]], in accordance with the Purchase Agreement dated [[purchase_agreement_date]].</p>
                                <p>2. Odometer reading: [[odometer_reading]] km.</p>
                                <p>3. Car condition: [[car_condition_description]].</p>
                                <p>4. Documents transferred: [[documents_transferred]].</p>
                                <p>5. Keys transferred: [[keys_transferred]] set(s).</p>
                                <p>The Parties have no claims.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>SELLER:</strong></p>
                                            <p>[[seller_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[seller_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>BUYER:</strong></p>
                                            <p>[[buyer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[buyer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Protokół odbioru-przekazania samochodu',
                        'description' => 'Dokument rejestrujący stan samochodu i jego wyposażenie w momencie przekazania od sprzedawcy do nabywcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ODBIORU-PRZEKAZANIA SAMOCHODU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[seller_name]]</strong>, zwany(a) dalej "Sprzedawcą", z jednej strony, oraz
                                <strong>[[buyer_name]]</strong>, zwany(a) dalej "Nabywcą", z drugiej strony, sporządziliśmy niniejszy Protokół:</p>
                                <p>1. Sprzedawca przekazał, a Nabywca przyjął samochód: [[car_make]] [[car_model]], rok produkcji [[car_year]], VIN: [[vin_number]], numer rejestracyjny: [[license_plate]], zgodnie z Umową kupna-sprzedaży z dnia [[purchase_agreement_date]].</p>
                                <p>2. Stan licznika: [[odometer_reading]] km.</p>
                                <p>3. Stan samochodu: [[car_condition_description]].</p>
                                <p>4. Przekazano dokumenty: [[documents_transferred]].</p>
                                <p>5. Przekazano [[keys_transferred]] komplet(ów) kluczy.</p>
                                <p>Strony nie mają roszczeń.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>SPRZEDAWCA:</strong></p>
                                            <p>[[seller_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[seller_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>NABYWCA:</strong></p>
                                            <p>[[buyer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[buyer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Fahrzeugübergabeprotokoll',
                        'description' => 'Dokument, das den Zustand des Fahrzeugs und seine Ausstattung bei der Übergabe vom Verkäufer an den Käufer festhält.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FAHRZEUGÜBERGABEPROTOKOLL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[seller_name]]</strong>, nachfolgend "Verkäufer" genannt, einerseits, und
                                <strong>[[buyer_name]]</strong>, nachfolgend "Käufer" genannt, andererseits, haben dieses Protokoll wie folgt erstellt:</p>
                                <p>1. Der Verkäufer hat das Fahrzeug: [[car_make]] [[car_model]], Baujahr [[car_year]], FIN: [[vin_number]], Kennzeichen: [[license_plate]], gemäß dem Kaufvertrag vom [[purchase_agreement_date]] übergeben, und der Käufer hat es übernommen.</p>
                                <p>2. Kilometerstand: [[odometer_reading]] km.</p>
                                <p>3. Zustand des Fahrzeugs: [[car_condition_description]].</p>
                                <p>4. Übergebene Dokumente: [[documents_transferred]].</p>
                                <p>5. Übergebene Schlüssel: [[keys_transferred]] Satz/Sätze.</p>
                                <p>Die Parteien haben keine Ansprüche.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>VERKÄUFER:</strong></p>
                                            <p>[[seller_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[seller_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>KÄUFER:</strong></p>
                                            <p>[[buyer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[buyer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 3. Расписка в получении денег за автомобиль ---
            [
                'slug' => 'receipt-car-payment-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання розписки","en":"City of Receipt Compilation", "pl":"Miejscowość sporządzenia pokwitowania", "de":"Ort der Quittungserstellung"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"ПІБ продавця","en":"Seller\'s Full Name", "pl":"Imię i nazwisko sprzedawcy", "de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані продавця","en":"Seller\'s Passport Details", "pl":"Dane paszportowe sprzedawcy", "de":"Passdaten des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"uk":"Адреса проживання продавця","en":"Seller\'s residence address", "pl":"Adres zamieszkania sprzedawcy", "de":"Wohnadresse des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"ПІБ покупця","en":"Buyer\'s Full Name", "pl":"Imię i nazwisko nabywcy", "de":"Vollständiger Name des Käufers"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"uk":"Марка автомобіля","en":"Car Make", "pl":"Marka samochodu", "de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"uk":"Модель автомобіля","en":"Car Model", "pl":"Model samochodu", "de":"Fahrzeugmodell"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"uk":"Державний номер","en":"License Plate", "pl":"Numer rejestracyjny", "de":"Kennzeichen"}},
                    {"name":"payment_amount","type":"number","required":true,"labels":{"uk":"Сума оплати (грн)","en":"Payment Amount (UAH)", "pl":"Kwota płatności (UAH)", "de":"Zahlungsbetrag (UAH)"}},
                    {"name":"payment_amount_text","type":"text","required":true,"labels":{"uk":"Сума оплати прописом","en":"Payment Amount in Words", "pl":"Kwota płatności słownie", "de":"Zahlungsbetrag in Worten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Розписка в отриманні грошей за автомобіль',
                        'description' => 'Документ, що підтверджує отримання продавцем грошей за автомобіль від покупця.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РОЗПИСКА</h1><p style="font-size: 14px;">в отриманні грошей за автомобіль</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[seller_name]]</strong>, паспорт: [[seller_passport]], проживаю за адресою: [[seller_address]], отримав(ла) від <strong>[[buyer_name]]</strong> грошові кошти у розмірі <strong>[[payment_amount]]</strong> грн ([[payment_amount_text]]) за продаж автомобіля [[car_make]] [[car_model]], державний номер [[license_plate]].</p>
                                <p>Претензій щодо оплати не маю.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис продавця: ___________________ ([[seller_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Receipt of Car Payment',
                        'description' => 'Document confirming the seller\'s receipt of money for a car from the buyer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECEIPT</h1><p style="font-size: 14px;">of car payment</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[seller_name]]</strong>, passport: [[seller_passport]], residing at: [[seller_address]], have received from <strong>[[buyer_name]]</strong> funds in the amount of <strong>[[payment_amount]]</strong> UAH ([[payment_amount_text]]) for the sale of the car [[car_make]] [[car_model]], license plate [[license_plate]].</p>
                                <p>I have no claims regarding payment.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Seller\'s Signature: ___________________ ([[seller_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pokwitowanie odbioru pieniędzy za samochód',
                        'description' => 'Dokument potwierdzający otrzymanie przez sprzedawcę pieniędzy za samochód od nabywcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POKWITOWANIE</h1><p style="font-size: 14px;">odbioru pieniędzy za samochód</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[seller_name]]</strong>, paszport: [[seller_passport]], zamieszkały(a) pod adresem: [[seller_address]], otrzymałem(am) od <strong>[[buyer_name]]</strong> środki pieniężne w wysokości <strong>[[payment_amount]]</strong> UAH ([[payment_amount_text]]) za sprzedaż samochodu [[car_make]] [[car_model]], numer rejestracyjny [[license_plate]].</p>
                                <p>Nie mam roszczeń dotyczących płatności.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis sprzedawcy: ___________________ ([[seller_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Quittung über den Erhalt des Autopreises',
                        'description' => 'Dokument, das den Erhalt des Autopreises vom Käufer durch den Verkäufer bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">QUITTUNG</h1><p style="font-size: 14px;">über den Erhalt des Autopreises</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[seller_name]]</strong>, Reisepass: [[seller_passport]], wohnhaft unter der Adresse: [[seller_address]], habe von <strong>[[buyer_name]]</strong> Gelder in Höhe von <strong>[[payment_amount]]</strong> UAH ([[payment_amount_text]]) für den Verkauf des Autos [[car_make]] [[car_model]], Kennzeichen [[license_plate]], erhalten.</p>
                                <p>Ich habe keine Ansprüche bezüglich der Zahlung.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Verkäufers: ___________________ ([[seller_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 4. Доверенность на управление автомобилем ---
            [
                'slug' => 'power-of-attorney-car-management-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання довіреності","en":"City of Power of Attorney Compilation", "pl":"Miejscowość sporządzenia pełnomocnictwa", "de":"Ort der Vollmachtserstellung"}},
                    {"name":"principal_name","type":"text","required":true,"labels":{"uk":"ПІБ довірителя","en":"Principal\'s Full Name", "pl":"Imię i nazwisko mocodawcy", "de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані довірителя","en":"Principal\'s Passport Details", "pl":"Dane paszportowe mocodawcy", "de":"Passdaten des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"uk":"Адреса проживання довірителя","en":"Principal\'s residence address", "pl":"Adres zamieszkania mocodawcy", "de":"Wohnadresse des Vollmachtgebers"}},
                    {"name":"attorney_name","type":"text","required":true,"labels":{"uk":"ПІБ представника","en":"Attorney\'s Full Name", "pl":"Imię i nazwisko pełnomocnika", "de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"attorney_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані представника","en":"Attorney\'s Passport Details", "pl":"Dane paszportowe pełnomocnika", "de":"Passdaten des Bevollmächtigten"}},
                    {"name":"attorney_address","type":"text","required":true,"labels":{"uk":"Адреса проживання представника","en":"Attorney\'s residence address", "pl":"Adres zamieszkania pełnomocnika", "de":"Wohnadresse des Bevollmächtigten"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"uk":"Марка автомобіля","en":"Car Make", "pl":"Marka samochodu", "de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"uk":"Модель автомобіля","en":"Car Model", "pl":"Model samochodu", "de":"Fahrzeugmodell"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"uk":"VIN-код","en":"VIN", "pl":"Numer VIN", "de":"FIN"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"uk":"Державний номер","en":"License Plate", "pl":"Numer rejestracyjny", "de":"Kennzeichen"}},
                    {"name":"powers_description","type":"textarea","required":true,"labels":{"uk":"Перелік повноважень (напр., керувати, проходити ТО, представляти інтереси в органах)","en":"List of Powers (e.g., drive, undergo maintenance, represent interests in authorities)", "pl":"Wykaz uprawnień (np. prowadzić, przechodzić przeglądy, reprezentować interesy w urzędach)", "de":"Liste der Befugnisse (z.B. fahren, Wartung durchführen, Interessen bei Behörden vertreten)"}},
                    {"name":"validity_months","type":"number","required":true,"labels":{"uk":"Термін дії довіреності (місяців)","en":"Power of Attorney Validity (months)", "pl":"Okres ważności pełnomocnictwa (miesiące)", "de":"Gültigkeitsdauer der Vollmacht (Monate)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Довіреність на управління автомобілем',
                        'description' => 'Документ, що уповноважує одну особу керувати автомобілем від імені власника.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1><p style="font-size: 14px;">на управління автомобілем</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[principal_name]]</strong>, паспорт: [[principal_passport]], проживаю за адресою: [[principal_address]], цим уповноважую:</p>
                                <p><strong>[[attorney_name]]</strong>, паспорт: [[attorney_passport]], проживаю за адресою: [[attorney_address]],</p>
                                <p>керувати та розпоряджатися автомобілем: [[car_make]] [[car_model]], VIN: [[vin_number]], державний номер: [[license_plate]].</p>
                                <p>Повноваження представника: [[powers_description]].</p>
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
                        'title' => 'Power of Attorney for Car Management',
                        'description' => 'Document authorizing one person to drive a car on behalf of the owner.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1><p style="font-size: 14px;">for car management</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[principal_name]]</strong>, passport: [[principal_passport]], residing at: [[principal_address]], hereby authorize:</p>
                                <p><strong>[[attorney_name]]</strong>, passport: [[attorney_passport]], residing at: [[attorney_address]],</p>
                                <p>to drive and dispose of the car: [[car_make]] [[car_model]], VIN: [[vin_number]], license plate: [[license_plate]].</p>
                                <p>Powers of attorney: [[powers_description]].</p>
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
                        'title' => 'Pełnomocnictwo do zarządzania samochodem',
                        'description' => 'Dokument upoważniający jedną osobę do kierowania samochodem w imieniu właściciela.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 14px;">do zarządzania samochodem</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[principal_name]]</strong>, paszport: [[principal_passport]], zamieszkały(a) pod adresem: [[principal_address]], niniejszym upoważniam:</p>
                                <p><strong>[[attorney_name]]</strong>, paszport: [[attorney_passport]], zamieszkały(a) pod adresem: [[attorney_address]],</p>
                                <p>do kierowania i rozporządzania samochodem: [[car_make]] [[car_model]], VIN: [[vin_number]], numer rejestracyjny: [[license_plate]].</p>
                                <p>Zakres pełnomocnictwa: [[powers_description]].</p>
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
                        'title' => 'Vollmacht zur Fahrzeugverwaltung',
                        'description' => 'Dokument, das eine Person ermächtigt, ein Auto im Namen des Eigentümers zu verwalten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1><p style="font-size: 14px;">zur Fahrzeugverwaltung</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[principal_name]]</strong>, Reisepass: [[principal_passport]], wohnhaft unter der Adresse: [[principal_address]], bevollmächtige hiermit:</p>
                                <p><strong>[[attorney_name]]</strong>, Reisepass: [[attorney_passport]], wohnhaft unter der Adresse: [[attorney_address]],</p>
                                <p>das Fahrzeug: [[car_make]] [[car_model]], FIN: [[vin_number]], Kennzeichen: [[license_plate]] zu fahren und darüber zu verfügen.</p>
                                <p>Befugnisse des Bevollmächtigten: [[powers_description]].</p>
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

            // --- 5. Доверенность на продажу автомобиля ---
            [
                'slug' => 'power-of-attorney-car-sale-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання довіреності","en":"City of Power of Attorney Compilation", "pl":"Miejscowość sporządzenia pełnomocnictwa", "de":"Ort der Vollmachtserstellung"}},
                    {"name":"principal_name","type":"text","required":true,"labels":{"uk":"ПІБ довірителя","en":"Principal\'s Full Name", "pl":"Imię i nazwisko mocodawcy", "de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані довірителя","en":"Principal\'s Passport Details", "pl":"Dane paszportowe mocodawcy", "de":"Passdaten des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"uk":"Адреса проживання довірителя","en":"Principal\'s residence address", "pl":"Adres zamieszkania mocodawcy", "de":"Wohnadresse des Vollmachtgebers"}},
                    {"name":"attorney_name","type":"text","required":true,"labels":{"uk":"ПІБ представника","en":"Attorney\'s Full Name", "pl":"Imię i nazwisko pełnomocnika", "de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"attorney_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані представника","en":"Attorney\'s Passport Details", "pl":"Dane paszportowe pełnomocnika", "de":"Passdaten des Bevollmächtigten"}},
                    {"name":"attorney_address","type":"text","required":true,"labels":{"uk":"Адреса проживання представника","en":"Attorney\'s residence address", "pl":"Adres zamieszkania pełnomocnika", "de":"Wohnadresse des Bevollmächtigten"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"uk":"Марка автомобіля","en":"Car Make", "pl":"Marka samochodu", "de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"uk":"Модель автомобіля","en":"Car Model", "pl":"Model samochodu", "de":"Fahrzeugmodell"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"uk":"VIN-код","en":"VIN", "pl":"Numer VIN", "de":"FIN"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"uk":"Державний номер","en":"License Plate", "pl":"Numer rejestracyjny", "de":"Kennzeichen"}},
                    {"name":"sale_terms","type":"textarea","required":true,"labels":{"uk":"Умови продажу (ціна, порядок розрахунків)","en":"Sale Terms (price, payment procedure)", "pl":"Warunki sprzedaży (cena, zasady rozliczeń)", "de":"Verkaufsbedingungen (Preis, Zahlungsweise)"}},
                    {"name":"validity_months","type":"number","required":true,"labels":{"uk":"Термін дії довіреності (місяців)","en":"Power of Attorney Validity (months)", "pl":"Okres ważności pełnomocnictwa (miesiące)", "de":"Gültigkeitsdauer der Vollmacht (Monate)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Довіреність на продаж автомобіля',
                        'description' => 'Документ, що уповноважує одну особу продати автомобіль від імені власника.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1><p style="font-size: 14px;">на продаж автомобіля</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[principal_name]]</strong>, паспорт: [[principal_passport]], проживаю за адресою: [[principal_address]], цим уповноважую:</p>
                                <p><strong>[[attorney_name]]</strong>, паспорт: [[attorney_passport]], проживаю за адресою: [[attorney_address]],</p>
                                <p>продати автомобіль: [[car_make]] [[car_model]], VIN: [[vin_number]], державний номер: [[license_plate]].</p>
                                <p>Умови продажу: [[sale_terms]].</p>
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
                        'title' => 'Power of Attorney for Car Sale',
                        'description' => 'Document authorizing one person to sell a car on behalf of the owner.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1><p style="font-size: 14px;">for car sale</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[principal_name]]</strong>, passport: [[principal_passport]], residing at: [[principal_address]], hereby authorize:</p>
                                <p><strong>[[attorney_name]]</strong>, passport: [[attorney_passport]], residing at: [[attorney_address]],</p>
                                <p>to sell the car: [[car_make]] [[car_model]], VIN: [[vin_number]], license plate: [[license_plate]].</p>
                                <p>Sale terms: [[sale_terms]].</p>
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
                        'title' => 'Pełnomocnictwo do sprzedaży samochodu',
                        'description' => 'Dokument upoważniający jedną osobę do sprzedaży samochodu w imieniu właściciela.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 14px;">do sprzedaży samochodu</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[principal_name]]</strong>, paszport: [[principal_passport]], zamieszkały(a) pod adresem: [[principal_address]], niniejszym upoważniam:</p>
                                <p><strong>[[attorney_name]]</strong>, paszport: [[attorney_passport]], zamieszkały(a) pod adresem: [[attorney_address]],</p>
                                <p>do sprzedaży samochodu: [[car_make]] [[car_model]], VIN: [[vin_number]], numer rejestracyjny: [[license_plate]].</p>
                                <p>Warunki sprzedaży: [[sale_terms]].</p>
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
                        'title' => 'Vollmacht zum Autoverkauf',
                        'description' => 'Dokument, das eine Person ermächtigt, ein Auto im Namen des Eigentümers zu verkaufen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1><p style="font-size: 14px;">zum Autoverkauf</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[principal_name]]</strong>, Reisepass: [[principal_passport]], wohnhaft unter der Adresse: [[principal_address]], bevollmächtige hiermit:</p>
                                <p><strong>[[attorney_name]]</strong>, Reisepass: [[attorney_passport]], wohnhaft unter der Adresse: [[attorney_address]],</p>
                                <p>das Auto: [[car_make]] [[car_model]], FIN: [[vin_number]], Kennzeichen: [[license_plate]] zu verkaufen.</p>
                                <p>Verkaufsbedingungen: [[sale_terms]].</p>
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

            // --- 6. Договор аренды автомобиля ---
            [
                'slug' => 'car-lease-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендодавця","en":"Landlord\'s Passport Details", "pl":"Dane paszportowe wynajmującego", "de":"Passdaten des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендодавця","en":"Landlord\'s residence address", "pl":"Adres zamieszkania wynajmującego", "de":"Wohnadresse des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендаря","en":"Tenant\'s Passport Details", "pl":"Dane paszportowe najemcy", "de":"Passdaten des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендаря","en":"Tenant\'s residence address", "pl":"Adres zamieszkania najemcy", "de":"Wohnadresse des Mieters"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"uk":"Марка автомобіля","en":"Car Make", "pl":"Marka samochodu", "de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"uk":"Модель автомобіля","en":"Car Model", "pl":"Model samochodu", "de":"Fahrzeugmodell"}},
                    {"name":"car_year","type":"number","required":true,"labels":{"uk":"Рік випуску","en":"Year of Manufacture", "pl":"Rok produkcji", "de":"Baujahr"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"uk":"VIN-код","en":"VIN", "pl":"Numer VIN", "de":"FIN"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"uk":"Державний номер","en":"License Plate", "pl":"Numer rejestracyjny", "de":"Kennzeichen"}},
                    {"name":"lease_term_days","type":"number","required":true,"labels":{"uk":"Термін оренди (днів)","en":"Lease Term (days)", "pl":"Okres najmu (dni)", "de":"Mietdauer (Tage)"}},
                    {"name":"rental_amount_per_day","type":"number","required":true,"labels":{"uk":"Сума орендної плати за добу (грн)","en":"Rental Amount per Day (UAH)", "pl":"Kwota czynszu za dobę (UAH)", "de":"Mietbetrag pro Tag (UAH)"}},
                    {"name":"total_rental_amount","type":"number","required":true,"labels":{"uk":"Загальна сума орендної плати (грн)","en":"Total Rental Amount (UAH)", "pl":"Całkowita kwota czynszu (UAH)", "de":"Gesamtmietbetrag (UAH)"}},
                    {"name":"security_deposit","type":"number","required":true,"labels":{"uk":"Розмір застави (грн)","en":"Security Deposit (UAH)", "pl":"Wysokość kaucji (UAH)", "de":"Kaution (UAH)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір оренди автомобіля',
                        'description' => 'Договір про передачу автомобіля в тимчасове користування за плату.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ АВТОМОБІЛЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[landlord_name]]</strong>, паспорт: [[landlord_passport]], проживаю за адресою: [[landlord_address]], надалі "Орендодавець", з одного боку, та
                                <strong>[[tenant_name]]</strong>, паспорт: [[tenant_passport]], проживаю за адресою: [[tenant_address]], надалі "Орендар", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Орендодавець передає, а Орендар приймає в оренду автомобіль: [[car_make]] [[car_model]], [[car_year]] року випуску, VIN: [[vin_number]], державний номер: [[license_plate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ТЕРМІН ОРЕНДИ</h2>
                                <p>2.1. Термін оренди становить <strong>[[lease_term_days]]</strong> днів з дати підписання цього Договору.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ОРЕНДНА ПЛАТА ТА ЗАСТАВА</h2>
                                <p>3.1. Орендна плата становить <strong>[[rental_amount_per_day]]</strong> грн за добу. Загальна сума: <strong>[[total_rental_amount]]</strong> грн.</p>
                                <p>3.2. Розмір застави становить <strong>[[security_deposit]]</strong> грн.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ОРЕНДОДАВЕЦЬ:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ОРЕНДАР:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Car Lease Agreement',
                        'description' => 'Agreement for temporary use of a car for a fee.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CAR LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[landlord_name]]</strong>, passport: [[landlord_passport]], residing at: [[landlord_address]], hereinafter "Lessor", on the one hand, and
                                <strong>[[tenant_name]]</strong>, passport: [[tenant_passport]], residing at: [[tenant_address]], hereinafter "Lessee", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Lessor transfers, and the Lessee accepts for lease the car: [[car_make]] [[car_model]], year of manufacture [[car_year]], VIN: [[vin_number]], license plate: [[license_plate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. LEASE TERM</h2>
                                <p>2.1. The lease term is <strong>[[lease_term_days]]</strong> days from the date of signing this Agreement.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. RENTAL FEE AND SECURITY DEPOSIT</h2>
                                <p>3.1. The rental fee is <strong>[[rental_amount_per_day]]</strong> UAH per day. Total amount: <strong>[[total_rental_amount]]</strong> UAH.</p>
                                <p>3.2. The security deposit is <strong>[[security_deposit]]</strong> UAH.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LESSOR:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>LESSEE:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu samochodu',
                        'description' => 'Umowa o przekazanie samochodu do tymczasowego użytkowania za opłatą.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU SAMOCHODU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[landlord_name]]</strong>, paszport: [[landlord_passport]], zamieszkały(a) pod adresem: [[landlord_address]], zwany(a) dalej "Wynajmującym", z jednej strony, oraz
                                <strong>[[tenant_name]]</strong>, paszport: [[tenant_passport]], zamieszkały(a) pod adresem: [[tenant_address]], zwany(a) dalej "Najemcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Wynajmujący przekazuje, a Najemca przyjmuje w najem samochód: [[car_make]] [[car_model]], rok produkcji [[car_year]], VIN: [[vin_number]], numer rejestracyjny: [[license_plate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. OKRES NAJMU</h2>
                                <p>2.1. Okres najmu wynosi <strong>[[lease_term_days]]</strong> dni od daty podpisania niniejszej Umowy.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. CZYNSZ I KAUCJA</h2>
                                <p>3.1. Czynsz wynosi <strong>[[rental_amount_per_day]]</strong> UAH za dobę. Całkowita kwota: <strong>[[total_rental_amount]]</strong> UAH.</p>
                                <p>3.2. Wysokość kaucji wynosi <strong>[[security_deposit]]</strong> UAH.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>WYNAJMUJĄCY:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>NAJEMCA:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Mietvertrag für ein Auto',
                        'description' => 'Vertrag über die befristete Überlassung eines Autos gegen Entgelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETVERTRAG FÜR EIN AUTO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[landlord_name]]</strong>, Reisepass: [[landlord_passport]], wohnhaft unter der Adresse: [[landlord_address]], nachfolgend "Vermieter" genannt, einerseits, und
                                <strong>[[tenant_name]]</strong>, Reisepass: [[tenant_passport]], wohnhaft unter der Adresse: [[tenant_address]], nachfolgend "Mieter" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Vermieter überlässt, und der Mieter übernimmt zur Miete das Auto: [[car_make]] [[car_model]], Baujahr [[car_year]], FIN: [[vin_number]], Kennzeichen: [[license_plate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. MIETDAUER</h2>
                                <p>2.1. Die Mietdauer beträgt <strong>[[lease_term_days]]</strong> Tage ab dem Datum der Unterzeichnung dieses Vertrags.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. MIETZINS UND KAUTION</h2>
                                <p>3.1. Der Mietzins beträgt <strong>[[rental_amount_per_day]]</strong> UAH pro Tag. Gesamtbetrag: <strong>[[total_rental_amount]]</strong> UAH.</p>
                                <p>3.2. Die Kaution beträgt <strong>[[security_deposit]]</strong> UAH.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>VERMIETER:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>MIETER:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 7. Европротокол (извещение о ДТП) ---
            [
                'slug' => 'europrotocol-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання","en":"City of Compilation", "pl":"Miejscowość sporządzenia", "de":"Ort der Erstellung"}},
                    {"name":"accident_date","type":"date","required":true,"labels":{"uk":"Дата ДТП","en":"Accident Date", "pl":"Data wypadku", "de":"Datum des Unfalls"}},
                    {"name":"accident_time","type":"text","required":true,"labels":{"uk":"Час ДТП","en":"Accident Time", "pl":"Godzina wypadku", "de":"Uhrzeit des Unfalls"}},
                    {"name":"accident_location","type":"text","required":true,"labels":{"uk":"Місце ДТП","en":"Accident Location", "pl":"Miejsce wypadku", "de":"Unfallort"}},
                    {"name":"driver1_name","type":"text","required":true,"labels":{"uk":"ПІБ водія 1","en":"Driver 1 Full Name", "pl":"Imię i nazwisko kierowcy 1", "de":"Vollständiger Name des Fahrers 1"}},
                    {"name":"driver1_license","type":"text","required":true,"labels":{"uk":"Посвідчення водія 1","en":"Driver 1 License", "pl":"Prawo jazdy kierowcy 1", "de":"Führerschein Fahrer 1"}},
                    {"name":"car1_make_model","type":"text","required":true,"labels":{"uk":"Марка, модель авто 1","en":"Car 1 Make, Model", "pl":"Marka, model samochodu 1", "de":"Fahrzeugmarke, Modell 1"}},
                    {"name":"car1_license_plate","type":"text","required":true,"labels":{"uk":"Держ. номер авто 1","en":"Car 1 License Plate", "pl":"Nr rej. samochodu 1", "de":"Kennzeichen Fahrzeug 1"}},
                    {"name":"insurance1_company","type":"text","required":true,"labels":{"uk":"Страхова компанія 1","en":"Insurance Company 1", "pl":"Firma ubezpieczeniowa 1", "de":"Versicherungsgesellschaft 1"}},
                    {"name":"insurance1_policy","type":"text","required":true,"labels":{"uk":"Номер поліса 1","en":"Policy Number 1", "pl":"Numer polisy 1", "de":"Policennummer 1"}},
                    {"name":"driver2_name","type":"text","required":true,"labels":{"uk":"ПІБ водія 2","en":"Driver 2 Full Name", "pl":"Imię i nazwisko kierowcy 2", "de":"Vollständiger Name des Fahrers 2"}},
                    {"name":"driver2_license","type":"text","required":true,"labels":{"uk":"Посвідчення водія 2","en":"Driver 2 License", "pl":"Prawo jazdy kierowcy 2", "de":"Führerschein kierowcy 2"}},
                    {"name":"car2_make_model","type":"text","required":true,"labels":{"uk":"Марка, модель авто 2","en":"Car 2 Make, Model", "pl":"Marka, model samochodu 2", "de":"Fahrzeugmarke, Modell 2"}},
                    {"name":"car2_license_plate","type":"text","required":true,"labels":{"uk":"Держ. номер авто 2","en":"Car 2 License Plate", "pl":"Nr rej. samochodu 2", "de":"Kennzeichen Fahrzeug 2"}},
                    {"name":"insurance2_company","type":"text","required":true,"labels":{"uk":"Страхова компанія 2","en":"Insurance Company 2", "pl":"Firma ubezpieczeniowa 2", "de":"Versicherungsgesellschaft 2"}},
                    {"name":"insurance2_policy","type":"text","required":true,"labels":{"uk":"Номер поліса 2","en":"Policy Number 2", "pl":"Numer polisy 2", "de":"Policennummer 2"}},
                    {"name":"accident_circumstances","type":"textarea","required":true,"labels":{"uk":"Обставини ДТП","en":"Accident Circumstances", "pl":"Okoliczności wypadku", "de":"Unfallumstände"}},
                    {"name":"damage_description","type":"textarea","required":true,"labels":{"uk":"Опис пошкоджень транспортних засобів","en":"Description of Vehicle Damage", "pl":"Opis uszkodzeń pojazdów", "de":"Beschreibung der Fahrzeugschäden"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Європротокол (повідомлення про ДТП)',
                        'description' => 'Спрощений документ для оформлення ДТП без виклику поліції.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЄВРОПРОТОКОЛ</h1><p style="font-size: 14px;">Повідомлення про дорожньо-транспортну пригоду</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Дата ДТП: <strong>[[accident_date]]</strong>, Час: <strong>[[accident_time]]</strong></p>
                                <p>Місце ДТП: <strong>[[accident_location]]</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ТРАНСПОРТНИЙ ЗАСІБ А (Водій 1)</h2>
                                <p>ПІБ водія: <strong>[[driver1_name]]</strong>, Посвідчення водія: [[driver1_license]]</p>
                                <p>Автомобіль: [[car1_make_model]], Держ. номер: [[car1_license_plate]]</p>
                                <p>Страхова компанія: [[insurance1_company]], Поліс: [[insurance1_policy]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ТРАНСПОРТНИЙ ЗАСІБ В (Водій 2)</h2>
                                <p>ПІБ водія: <strong>[[driver2_name]]</strong>, Посвідчення водія: [[driver2_license]]</p>
                                <p>Автомобіль: [[car2_make_model]], Держ. номер: [[car2_license_plate]]</p>
                                <p>Страхова компанія: [[insurance2_company]], Поліс: [[insurance2_policy]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ОБСТАВИНИ ДТП ТА ПОШКОДЖЕННЯ</h2>
                                <p>Обставини ДТП: [[accident_circumstances]]</p>
                                <p>Опис пошкоджень: [[damage_description]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис водія 1: ___________________ ([[driver1_name]])</p>
                                <p>Підпис водія 2: ___________________ ([[driver2_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Europrotocol (Road Accident Notification)',
                        'description' => 'Simplified document for recording a road accident without calling the police.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EUROPROTOCOL</h1><p style="font-size: 14px;">Road Accident Notification</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Accident Date: <strong>[[accident_date]]</strong>, Time: <strong>[[accident_time]]</strong></p>
                                <p>Accident Location: <strong>[[accident_location]]</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">VEHICLE A (Driver 1)</h2>
                                <p>Driver\'s Full Name: <strong>[[driver1_name]]</strong>, Driver\'s License: [[driver1_license]]</p>
                                <p>Car: [[car1_make_model]], License Plate: [[car1_license_plate]]</p>
                                <p>Insurance Company: [[insurance1_company]], Policy: [[insurance1_policy]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">VEHICLE B (Driver 2)</h2>
                                <p>Driver\'s Full Name: <strong>[[driver2_name]]</strong>, Driver\'s License: [[driver2_license]]</p>
                                <p>Car: [[car2_make_model]], License Plate: [[car2_license_plate]]</p>
                                <p>Insurance Company: [[insurance2_company]], Policy: [[insurance2_policy]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ACCIDENT CIRCUMSTANCES AND DAMAGE</h2>
                                <p>Accident Circumstances: [[accident_circumstances]]</p>
                                <p>Damage Description: [[damage_description]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Driver 1 Signature: ___________________ ([[driver1_name]])</p>
                                <p>Driver 2 Signature: ___________________ ([[driver2_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Europrotokół (zgłoszenie wypadku drogowego)',
                        'description' => 'Uproszczony dokument do zgłaszania wypadków drogowych bez wzywania policji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EUROPROTOKÓŁ</h1><p style="font-size: 14px;">Zgłoszenie wypadku drogowego</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Data wypadku: <strong>[[accident_date]]</strong>, Godzina: <strong>[[accident_time]]</strong></p>
                                <p>Miejsce wypadku: <strong>[[accident_location]]</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">POJAZD A (Kierowca 1)</h2>
                                <p>Imię i nazwisko kierowcy: <strong>[[driver1_name]]</strong>, Prawo jazdy: [[driver1_license]]</p>
                                <p>Samochód: [[car1_make_model]], Nr rej.: [[car1_license_plate]]</p>
                                <p>Firma ubezpieczeniowa: [[insurance1_company]], Polisa: [[insurance1_policy]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">POJAZD B (Kierowca 2)</h2>
                                <p>Imię i nazwisko kierowcy: <strong>[[driver2_name]]</strong>, Prawo jazdy: [[driver2_license]]</p>
                                <p>Samochód: [[car2_make_model]], Nr rej.: [[car2_license_plate]]</p>
                                <p>Firma ubezpieczeniowa: [[insurance2_company]], Polisa: [[insurance2_policy]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">OKOLICZNOŚCI WYPADKU I USZKODZENIA</h2>
                                <p>Okoliczności wypadku: [[accident_circumstances]]</p>
                                <p>Opis uszkodzeń: [[damage_description]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis kierowcy 1: ___________________ ([[driver1_name]])</p>
                                <p>Podpis kierowcy 2: ___________________ ([[driver2_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Europrotokoll (Unfallmeldung)',
                        'description' => 'Vereinfachtes Dokument zur Unfallaufnahme ohne Polizeibeteiligung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EUROPROTOKOLL</h1><p style="font-size: 14px;">Unfallmeldung</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Unfalldatum: <strong>[[accident_date]]</strong>, Uhrzeit: <strong>[[accident_time]]</strong></p>
                                <p>Unfallort: <strong>[[accident_location]]</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">FAHRZEUG A (Fahrer 1)</h2>
                                <p>Name des Fahrers: <strong>[[driver1_name]]</strong>, Führerschein: [[driver1_license]]</p>
                                <p>Fahrzeug: [[car1_make_model]], Kennzeichen: [[car1_license_plate]]</p>
                                <p>Versicherungsgesellschaft: [[insurance1_company]], Police: [[insurance1_policy]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">FAHRZEUG B (Fahrer 2)</h2>
                                <p>Name des Fahrers: <strong>[[driver2_name]]</strong>, Führerschein: [[driver2_license]]</p>
                                <p>Fahrzeug: [[car2_make_model]], Kennzeichen: [[car2_license_plate]]</p>
                                <p>Versicherungsgesellschaft: [[insurance2_company]], Police: [[insurance2_policy]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">UNFALLUMSTÄNDE UND SCHÄDEN</h2>
                                <p>Unfallumstände: [[accident_circumstances]]</p>
                                <p>Beschreibung der Schäden: [[damage_description]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift Fahrer 1: ___________________ ([[driver1_name]])</p>
                                <p>Unterschrift Fahrer 2: ___________________ ([[driver2_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 8. Претензия в страховую компанию о выплате возмещения ---
            [
                'slug' => 'claim-insurance-payout-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"insurance_company_name","type":"text","required":true,"labels":{"uk":"Назва страхової компанії","en":"Insurance Company Name", "pl":"Nazwa firmy ubezpieczeniowej", "de":"Name der Versicherungsgesellschaft"}},
                    {"name":"insurance_company_address","type":"text","required":true,"labels":{"uk":"Адреса страхової компанії","en":"Insurance Company Address", "pl":"Adres firmy ubezpieczeniowej", "de":"Adresse der Versicherungsgesellschaft"}},
                    {"name":"claimant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Claimant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"uk":"Адреса заявника","en":"Claimant\'s Address", "pl":"Adres wnioskodawcy", "de":"Adresse des Antragstellers"}},
                    {"name":"claimant_phone","type":"text","required":false,"labels":{"uk":"Телефон заявника","en":"Claimant\'s Phone", "pl":"Telefon wnioskodawcy", "de":"Telefon des Antragstellers"}},
                    {"name":"claimant_email","type":"email","required":false,"labels":{"uk":"Email заявника","en":"Claimant\'s Email", "pl":"E-mail wnioskodawcy", "de":"E-Mail des Antragstellers"}},
                    {"name":"policy_number","type":"text","required":true,"labels":{"uk":"Номер страхового поліса","en":"Insurance Policy Number", "pl":"Numer polisy ubezpieczeniowej", "de":"Versicherungspolicennummer"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"uk":"Дата страхового випадку","en":"Date of Insured Event", "pl":"Data zdarzenia ubezpieczeniowego", "de":"Datum des Versicherungsfalls"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"uk":"Опис страхового випадку та завданої шкоди","en":"Description of Insured Event and Damage Caused", "pl":"Opis zdarzenia ubezpieczeniowego i wyrządzonej szkody", "de":"Beschreibung des Versicherungsfalls und des verursachten Schadens"}},
                    {"name":"claim_amount","type":"number","required":true,"labels":{"uk":"Сума відшкодування (грн)","en":"Claim Amount (UAH)", "pl":"Kwota odszkodowania (UAH)", "de":"Schadensersatzbetrag (UAH)"}},
                    {"name":"claim_amount_text","type":"text","required":true,"labels":{"uk":"Сума відшкодування прописом","en":"Claim Amount in Words", "pl":"Kwota odszkodowania słownie", "de":"Schadensersatzbetrag in Worten"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Вимоги (виплатити відшкодування, провести експертизу)","en":"Demands (pay compensation, conduct expert examination)", "pl":"Żądania (wypłata odszkodowania, przeprowadzenie ekspertyzy)", "de":"Forderungen (Entschädigung zahlen, Gutachten erstellen)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"uk":"Додатки (копія поліса, довідка про ДТП, експертиза)","en":"Attachments (copy of policy, road accident certificate, expert examination)", "pl":"Załączniki (kopia polisy, zaświadczenie o wypadku drogowym, ekspertyza)", "de":"Anhänge (Kopie der Police, Unfallbescheinigung, Gutachten)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Претензія в страхову компанію про виплату відшкодування',
                        'description' => 'Офіційна претензія до страхової компанії з вимогою виплати страхового відшкодування.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[insurance_company_name]]</p>
                                <p style="text-align: right;">[[insurance_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[claimant_name]]</p>
                                <p style="text-align: right;">[[claimant_address]]</p>
                                <p style="text-align: right;">Телефон: [[claimant_phone]]</p>
                                <p style="text-align: right;">Email: [[claimant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ПРЕТЕНЗІЯ</h1>
                                <p style="text-align: center;">про виплату страхового відшкодування</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Згідно зі страховим полісом № [[policy_number]], [[incident_date]] року стався страховий випадок, що полягає у: [[incident_description]].</p>
                                <p>Сума завданої шкоди становить <strong>[[claim_amount]]</strong> грн ([[claim_amount_text]]).</p>
                                <p>На підставі вищевикладеного, вимагаю: [[demands]].</p>
                                <p>Прошу розглянути претензію та виплатити відшкодування у встановлений термін.</p>
                                [[attachments]]<p>Додатки: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис: ___________________ ([[claimant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Claim to Insurance Company for Compensation Payout',
                        'description' => 'Official claim to the insurance company demanding payment of insurance compensation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[insurance_company_name]]</p>
                                <p style="text-align: right;">[[insurance_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[claimant_name]]</p>
                                <p style="text-align: right;">[[claimant_address]]</p>
                                <p style="text-align: right;">Phone: [[claimant_phone]]</p>
                                <p style="text-align: right;">Email: [[claimant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">CLAIM</h1>
                                <p style="text-align: center;">for insurance compensation payout</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>According to insurance policy No. [[policy_number]], on [[incident_date]], an insured event occurred, consisting of: [[incident_description]].</p>
                                <p>The amount of damage caused is <strong>[[claim_amount]]</strong> UAH ([[claim_amount_text]]).</p>
                                <p>Based on the foregoing, I demand: [[demands]].</p>
                                <p>Please consider the claim and pay compensation within the established period.</p>
                                [[attachments]]<p>Attachments: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[claimant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Reklamacja do firmy ubezpieczeniowej o wypłatę odszkodowania',
                        'description' => 'Oficjalna reklamacja do firmy ubezpieczeniowej z żądaniem wypłaty odszkodowania.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[insurance_company_name]]</p>
                                <p style="text-align: right;">[[insurance_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[claimant_name]]</p>
                                <p style="text-align: right;">[[claimant_address]]</p>
                                <p style="text-align: right;">Telefon: [[claimant_phone]]</p>
                                <p style="text-align: right;">E-mail: [[claimant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">REKLAMACJA</h1>
                                <p style="text-align: center;">o wypłatę odszkodowania</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zgodnie z polisą ubezpieczeniową nr [[policy_number]], w dniu [[incident_date]] doszło do zdarzenia ubezpieczeniowego, polegającego na: [[incident_description]].</p>
                                <p>Kwota wyrządzonej szkody wynosi <strong>[[claim_amount]]</strong> UAH ([[claim_amount_text]]).</p>
                                <p>Na podstawie powyższego, żądam: [[demands]].</p>
                                <p>Proszę o rozpatrzenie reklamacji i wypłatę odszkodowania w ustalonym terminie.</p>
                                [[attachments]]<p>Załączniki: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[claimant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Forderung an die Versicherungsgesellschaft auf Schadensersatzzahlung',
                        'description' => 'Offizielle Forderung an die Versicherungsgesellschaft auf Zahlung einer Versicherungsentschädigung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[insurance_company_name]]</p>
                                <p style="text-align: right;">[[insurance_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[claimant_name]]</p>
                                <p style="text-align: right;">[[claimant_address]]</p>
                                <p style="text-align: right;">Telefon: [[claimant_phone]]</p>
                                <p style="text-align: right;">E-Mail: [[claimant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">FORDERUNG</h1>
                                <p style="text-align: center;">auf Zahlung einer Versicherungsentschädigung</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Gemäß Versicherungspolice Nr. [[policy_number]] ereignete sich am [[incident_date]] ein Versicherungsfall, der wie folgt beschrieben wird: [[incident_description]].</p>
                                <p>Der entstandene Schaden beläuft sich auf <strong>[[claim_amount]]</strong> UAH ([[claim_amount_text]]).</p>
                                <p>Aufgrund des oben Gesagten fordere ich: [[demands]].</p>
                                <p>Bitte prüfen Sie die Forderung und zahlen Sie die Entschädigung innerhalb der festgelegten Frist aus.</p>
                                [[attachments]]<p>Anhänge: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[claimant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 9. Журнал учета технического обслуживания автомобиля ---
            [
                'slug' => 'car-maintenance-log-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"car_make","type":"text","required":true,"labels":{"uk":"Марка автомобіля","en":"Car Make", "pl":"Marka samochodu", "de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"uk":"Модель автомобіля","en":"Car Model", "pl":"Model samochodu", "de":"Fahrzeugmodell"}},
                    {"name":"car_year","type":"number","required":true,"labels":{"uk":"Рік випуску","en":"Year of Manufacture", "pl":"Rok produkcji", "de":"Baujahr"}},
                    {"name":"vin_number","type":"text","required":true,"labels":{"uk":"VIN-код","en":"VIN", "pl":"Numer VIN", "de":"FIN"}},
                    {"name":"license_plate","type":"text","required":true,"labels":{"uk":"Державний номер","en":"License Plate", "pl":"Numer rejestracyjny", "de":"Kennzeichen"}},
                    {"name":"maintenance_entries","type":"textarea","required":true,"labels":{"uk":"Записи про ТО (Дата, Пробіг, Вид робіт, Вартість, Виконавець)","en":"Maintenance Entries (Date, Mileage, Type of Work, Cost, Performer)", "pl":"Zapisy dotyczące przeglądów (Data, Przebieg, Rodzaj prac, Koszt, Wykonawca)", "de":"Wartungseinträge (Datum, Kilometerstand, Art der Arbeiten, Kosten, Ausführender)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Журнал обліку технічного обслуговування автомобіля',
                        'description' => 'Документ для ведення обліку проведених технічних обслуговувань автомобіля.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЖУРНАЛ ОБЛІКУ ТЕХНІЧНОГО ОБСЛУГОВУВАННЯ АВТОМОБІЛЯ</h1><p>Марка: [[car_make]] Модель: [[car_model]]</p><p>Рік випуску: [[car_year]] VIN: [[vin_number]]</p><p>Державний номер: [[license_plate]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Дата</th>
                                            <th>Пробіг (км)</th>
                                            <th>Вид робіт</th>
                                            <th>Вартість (грн)</th>
                                            <th>Виконавець</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>01.07.2025</td><td>100000</td><td>Заміна масла</td><td>1500.00</td><td>СТО "Автосервіс"</td></tr> -->
                                        [[maintenance_entries]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Car Maintenance Log',
                        'description' => 'Document for keeping records of car maintenance performed.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CAR MAINTENANCE LOG</h1><p>Make: [[car_make]] Model: [[car_model]]</p><p>Year: [[car_year]] VIN: [[vin_number]]</p><p>License Plate: [[license_plate]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Mileage (km)</th>
                                            <th>Type of Work</th>
                                            <th>Cost (UAH)</th>
                                            <th>Performer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>01.07.2025</td><td>100000</td><td>Oil Change</td><td>1500.00</td><td>Service Station "Autoservice"</td></tr> -->
                                        [[maintenance_entries]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Dziennik obsługi technicznej samochodu',
                        'description' => 'Dokument do prowadzenia ewidencji przeprowadzonych przeglądów technicznych samochodu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK OBSŁUGI TECHNICZNEJ SAMOCHODU</h1><p>Marka: [[car_make]] Model: [[car_model]]</p><p>Rok produkcji: [[car_year]] VIN: [[vin_number]]</p><p>Numer rejestracyjny: [[license_plate]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Przebieg (km)</th>
                                            <th>Rodzaj prac</th>
                                            <th>Koszt (UAH)</th>
                                            <th>Wykonawca</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>01.07.2025</td><td>100000</td><td>Wymiana oleju</td><td>1500.00</td><td>Serwis "Autoserwis"</td></tr> -->
                                        [[maintenance_entries]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Fahrzeugwartungsprotokoll',
                        'description' => 'Dokument zur Führung von Aufzeichnungen über durchgeführte Fahrzeugwartungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FAHRZEUGWARTUNGSPROTOKOLL</h1><p>Marke: [[car_make]] Modell: [[car_model]]</p><p>Baujahr: [[car_year]] FIN: [[vin_number]]</p><p>Kennzeichen: [[license_plate]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Datum</th>
                                            <th>Kilometerstand (km)</th>
                                            <th>Art der Arbeiten</th>
                                            <th>Kosten (UAH)</th>
                                            <th>Ausführender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>01.07.2025</td><td>100000</td><td>Ölwechsel</td><td>1500.00</td><td>Werkstatt "Autoservice"</td></tr> -->
                                        [[maintenance_entries]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
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
