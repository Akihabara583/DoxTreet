<?php

namespace Database\Seeders\PL;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class PlStandardCarPurchaseTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds for the Polish Car Purchase Package 2025.
     */
    public function run(): void
    {
        // Используем категорию для юридических документов
        $catLegal = Category::where('slug', 'legal-claims-pl')->firstOrFail();

        $templatesData = [
            // === ПАКЕТ "ПОКУПКА АВТОМОБИЛЯ" ===

            // 1. Договор купли-продажи автомобиля (Umowa kupna-sprzedaży samochodu)
            [
                'category_id' => $catLegal->id,
                'slug' => 'pl-car-purchase-agreement-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"agreement_date_place","type":"text","required":true,"labels":{"pl":"Zawarta w (miejscowość), dnia (data)","en":"Concluded in (city), on (date)","uk":"Укладено в (місто), дня (дата)","de":"Abgeschlossen in (Stadt), am (Datum)"}},
                    {"name":"seller_details","type":"textarea","required":true,"labels":{"pl":"Dane Sprzedającego (imię, nazwisko, adres, PESEL, nr dowodu)","en":"Seller\'s Details (name, address, PESEL, ID number)","uk":"Дані Продавця (ім\'я, прізвище, адреса, PESEL, номер документа)","de":"Verkäuferangaben (Name, Adresse, PESEL, Ausweisnummer)"}},
                    {"name":"buyer_details","type":"textarea","required":true,"labels":{"pl":"Dane Kupującego (imię, nazwisko, adres, PESEL, nr dowodu)","en":"Buyer\'s Details (name, address, PESEL, ID number)","uk":"Дані Покупця (ім\'я, прізвище, адреса, PESEL, номер документа)","de":"Käuferangaben (Name, Adresse, PESEL, Ausweisnummer)"}},
                    {"name":"car_make","type":"text","required":true,"labels":{"pl":"Marka pojazdu","en":"Vehicle Make","uk":"Марка транспортного засобу","de":"Fahrzeugmarke"}},
                    {"name":"car_model","type":"text","required":true,"labels":{"pl":"Model pojazdu","en":"Vehicle Model","uk":"Модель транспортного засобу","de":"Fahrzeugmodell"}},
                    {"name":"car_year","type":"number","required":true,"labels":{"pl":"Rok produkcji","en":"Year of Manufacture","uk":"Рік виробництва","de":"Baujahr"}},
                    {"name":"car_vin","type":"text","required":true,"labels":{"pl":"Numer VIN","en":"VIN Number","uk":"Номер VIN","de":"VIN-Nummer"}},
                    {"name":"car_engine_number","type":"text","required":true,"labels":{"pl":"Numer silnika","en":"Engine Number","uk":"Номер двигуна","de":"Motornummer"}},
                    {"name":"car_engine_capacity","type":"text","required":true,"labels":{"pl":"Pojemność silnika (cm³)","en":"Engine Capacity (cm³)","uk":"Об\'єм двигуна (см³)","de":"Hubraum (cm³)"}},
                    {"name":"car_power","type":"text","required":true,"labels":{"pl":"Moc silnika (kW/KM)","en":"Engine Power (kW/HP)","uk":"Потужність двигуна (кВт/к.с.)","de":"Motorleistung (kW/PS)"}},
                    {"name":"car_reg_number","type":"text","required":true,"labels":{"pl":"Numer rejestracyjny","en":"Registration Number","uk":"Реєстраційний номер","de":"Kennzeichen"}},
                    {"name":"car_mileage","type":"number","required":true,"labels":{"pl":"Przebieg (km)","en":"Mileage (km)","uk":"Пробіг (км)","de":"Kilometerstand (km)"}},
                    {"name":"car_price_amount","type":"number","required":true,"labels":{"pl":"Cena sprzedaży (PLN)","en":"Sale Price (PLN)","uk":"Ціна продажу (PLN)","de":"Verkaufspreis (PLN)"}},
                    {"name":"car_price_words","type":"text","required":true,"labels":{"pl":"Cena sprzedaży (słownie)","en":"Sale Price (in words)","uk":"Ціна продажу (словами)","de":"Verkaufspreis (in Worten)"}},
                    {"name":"additional_equipment","type":"textarea","required":false,"labels":{"pl":"Dodatkowe wyposażenie (opcjonalne)","en":"Additional Equipment (optional)","uk":"Додаткове обладнання (опціонально)","de":"Zusatzausstattung (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa kupna-sprzedaży samochodu',
                        'description' => 'Kompleksowa umowa kupna-sprzedaży pojazdu, zawierająca wszystkie wymagane elementy prawne, niezbędna do przerejestrowania samochodu i rozliczenia podatku PCC.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA KUPNA-SPRZEDAŻY SAMOCHODU</h1></div><p style="font-size: 12px; text-align: center;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <table style="width: 100%; font-size: 12px; margin-bottom: 20px;">
                            <tr>
                                <td style="width: 50%; vertical-align: top;"><strong>SPRZEDAJĄCY:</strong><br>[[seller_details]]</td>
                                <td style="width: 50%; vertical-align: top;"><strong>KUPUJĄCY:</strong><br>[[buyer_details]]</td>
                            </tr>
                        </table>
                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Przedmiot umowy</h3>
                            <p>1. Sprzedający oświadcza, że jest jedynym właścicielem pojazdu marki <strong>[[car_make]]</strong>, model <strong>[[car_model]]</strong>, rok produkcji <strong>[[car_year]]</strong>.</p>
                            <p>2. Dane pojazdu:<br>
                            - Numer VIN: <strong>[[car_vin]]</strong><br>
                            - Numer silnika: <strong>[[car_engine_number]]</strong><br>
                            - Pojemność silnika: <strong>[[car_engine_capacity]] cm³</strong><br>
                            - Moc silnika: <strong>[[car_power]]</strong><br>
                            - Numer rejestracyjny: <strong>[[car_reg_number]]</strong><br>
                            - Przebieg: <strong>[[car_mileage]] km</strong></p>
                            <p>3. Dodatkowe wyposażenie: [[additional_equipment]]</p>
                            <p>4. Sprzedający oświadcza, że pojazd jest wolny od wad prawnych oraz praw osób trzecich, nie jest przedmiotem zabezpieczenia ani egzekucji.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2. Cena i płatność</h3>
                            <p>1. Strony ustalają cenę sprzedaży pojazdu na kwotę <strong>[[car_price_amount]] PLN</strong> (słownie: [[car_price_words]]).</p>
                            <p>2. Kupujący potwierdza odbiór pojazdu wraz z następującymi dokumentami:<br>
                            - Dowód rejestracyjny pojazdu<br>
                            - Karta pojazdu<br>
                            - Kluczyki do pojazdu</p>
                            <p>3. Sprzedający potwierdza otrzymanie całej ww. kwoty w dniu podpisania niniejszej umowy.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3. Odpowiedzialność za wady</h3>
                            <p>1. Sprzedający odpowiada za wady ukryte pojazdu przez okres 6 miesięcy od dnia sprzedaży, z wyłączeniem elementów eksploatacyjnych.</p>
                            <p>2. Kupujący oświadcza, że zapoznał się ze stanem technicznym pojazdu i nie wnosi do niego zastrzeżeń.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4. Postanowienia końcowe</h3>
                            <p>1. Wszelkie koszty związane z zawarciem niniejszej umowy, w tym podatek od czynności cywilnoprawnych (PCC), opłaty notarialne i administracyjne, ponosi Kupujący.</p>
                            <p>2. Kupujący zobowiązuje się do przerejestrowania pojazdu w terminie 30 dni od dnia zakupu.</p>
                            <p>3. Umowa została sporządzona w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>...................................<br><strong>(Podpis Sprzedającego)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>...................................<br><strong>(Podpis Kupującego)</strong></p></div>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Car Purchase Agreement',
                        'description' => 'Comprehensive vehicle purchase agreement containing all required legal elements, necessary for car registration and PCC tax settlement.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA KUPNA-SPRZEDAŻY SAMOCHODU</h1></div><p style="font-size: 12px; text-align: center;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <table style="width: 100%; font-size: 12px; margin-bottom: 20px;">
                            <tr>
                                <td style="width: 50%; vertical-align: top;"><strong>SPRZEDAJĄCY:</strong><br>[[seller_details]]</td>
                                <td style="width: 50%; vertical-align: top;"><strong>KUPUJĄCY:</strong><br>[[buyer_details]]</td>
                            </tr>
                        </table>
                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Przedmiot umowy</h3>
                            <p>1. Sprzedający oświadcza, że jest jedynym właścicielem pojazdu marki <strong>[[car_make]]</strong>, model <strong>[[car_model]]</strong>, rok produkcji <strong>[[car_year]]</strong>.</p>
                            <p>2. Dane pojazdu:<br>
                            - Numer VIN: <strong>[[car_vin]]</strong><br>
                            - Numer silnika: <strong>[[car_engine_number]]</strong><br>
                            - Pojemność silnika: <strong>[[car_engine_capacity]] cm³</strong><br>
                            - Moc silnika: <strong>[[car_power]]</strong><br>
                            - Numer rejestracyjny: <strong>[[car_reg_number]]</strong><br>
                            - Przebieg: <strong>[[car_mileage]] km</strong></p>
                            <p>3. Dodatkowe wyposażenie: [[additional_equipment]]</p>
                            <p>4. Sprzedający oświadcza, że pojazd jest wolny od wad prawnych oraz praw osób trzecich, nie jest przedmiotem zabezpieczenia ani egzekucji.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2. Cena i płatność</h3>
                            <p>1. Strony ustalają cenę sprzedaży pojazdu na kwotę <strong>[[car_price_amount]] PLN</strong> (słownie: [[car_price_words]]).</p>
                            <p>2. Kupujący potwierdza odbiór pojazdu wraz z następującymi dokumentami:<br>
                            - Dowód rejestracyjny pojazdu<br>
                            - Karta pojazdu<br>
                            - Kluczyki do pojazdu</p>
                            <p>3. Sprzedający potwierdza otrzymanie całej ww. kwoty w dniu podpisania niniejszej umowy.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3. Odpowiedzialność za wady</h3>
                            <p>1. Sprzedający odpowiada za wady ukryte pojazdu przez okres 6 miesięcy od dnia sprzedaży, z wyłączeniem elementów eksploatacyjnych.</p>
                            <p>2. Kupujący oświadcza, że zapoznał się ze stanem technicznym pojazdu i nie wnosi do niego zastrzeżeń.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4. Postanowienia końcowe</h3>
                            <p>1. Wszelkie koszty związane z zawarciem niniejszej umowy, w tym podatek od czynności cywilnoprawnych (PCC), opłaty notarialne i administracyjne, ponosi Kupujący.</p>
                            <p>2. Kupujący zobowiązuje się do przerejestrowania pojazdu w terminie 30 dni od dnia zakupu.</p>
                            <p>3. Umowa została sporządzona w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>...................................<br><strong>(Podpis Sprzedającego)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>...................................<br><strong>(Podpis Kupującego)</strong></p></div>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Договір купівлі-продажу автомобіля',
                        'description' => 'Комплексний договір купівлі-продажу транспортного засобу, що містить всі необхідні правові елементи, потрібний для перереєстрації автомобіля та розрахунку податку PCC.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA KUPNA-SPRZEDAŻY SAMOCHODU</h1></div><p style="font-size: 12px; text-align: center;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <table style="width: 100%; font-size: 12px; margin-bottom: 20px;">
                            <tr>
                                <td style="width: 50%; vertical-align: top;"><strong>SPRZEDAJĄCY:</strong><br>[[seller_details]]</td>
                                <td style="width: 50%; vertical-align: top;"><strong>KUPUJĄCY:</strong><br>[[buyer_details]]</td>
                            </tr>
                        </table>
                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Przedmiot umowy</h3>
                            <p>1. Sprzedający oświadcza, że jest jedynym właścicielem pojazdu marki <strong>[[car_make]]</strong>, model <strong>[[car_model]]</strong>, rok produkcji <strong>[[car_year]]</strong>.</p>
                            <p>2. Dane pojazdu:<br>
                            - Numer VIN: <strong>[[car_vin]]</strong><br>
                            - Numer silnika: <strong>[[car_engine_number]]</strong><br>
                            - Pojemność silnika: <strong>[[car_engine_capacity]] cm³</strong><br>
                            - Moc silnika: <strong>[[car_power]]</strong><br>
                            - Numer rejestracyjny: <strong>[[car_reg_number]]</strong><br>
                            - Przebieg: <strong>[[car_mileage]] km</strong></p>
                            <p>3. Dodatkowe wyposażenie: [[additional_equipment]]</p>
                            <p>4. Sprzedający oświadcza, że pojazd jest wolny od wad prawnych oraz praw osób trzecich, nie jest przedmiotem zabezpieczenia ani egzekucji.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2. Cena i płatność</h3>
                            <p>1. Strony ustalają cenę sprzedaży pojazdu na kwotę <strong>[[car_price_amount]] PLN</strong> (słownie: [[car_price_words]]).</p>
                            <p>2. Kupujący potwierdza odbiór pojazdu wraz z następującymi dokumentami:<br>
                            - Dowód rejestracyjny pojazdu<br>
                            - Karta pojazdu<br>
                            - Kluczyki do pojazdu</p>
                            <p>3. Sprzedający potwierdza otrzymanie całej ww. kwoty w dniu podpisania niniejszej umowy.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3. Odpowiedzialność za wady</h3>
                            <p>1. Sprzedający odpowiada za wady ukryte pojazdu przez okres 6 miesięcy od dnia sprzedaży, z wyłączeniem elementów eksploatacyjnych.</p>
                            <p>2. Kupujący oświadcza, że zapoznał się ze stanem technicznym pojazdu i nie wnosi do niego zastrzeżeń.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4. Postanowienia końcowe</h3>
                            <p>1. Wszelkie koszty związane z zawarciem niniejszej umowy, w tym podatek od czynności cywilnoprawnych (PCC), opłaty notarialne i administracyjne, ponosi Kupujący.</p>
                            <p>2. Kupujący zobowiązuje się do przerejestrowania pojazdu w terminie 30 dni od dnia zakupu.</p>
                            <p>3. Umowa została sporządzona w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>...................................<br><strong>(Podpis Sprzedającego)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>...................................<br><strong>(Podpis Kupującego)</strong></p></div>
                        </div>'
                    ],
                    'de' => [
                        'title' => 'Kaufvertrag für Kraftfahrzeug',
                        'description' => 'Umfassender Fahrzeugkaufvertrag mit allen erforderlichen rechtlichen Elementen, notwendig für die Fahrzeugregistrierung und PCC-Steuerabwicklung.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">UMOWA KUPNA-SPRZEDAŻY SAMOCHODU</h1></div><p style="font-size: 12px; text-align: center;">[[agreement_date_place]]</p>',
                        'body_html' => '
                        <table style="width: 100%; font-size: 12px; margin-bottom: 20px;">
                            <tr>
                                <td style="width: 50%; vertical-align: top;"><strong>SPRZEDAJĄCY:</strong><br>[[seller_details]]</td>
                                <td style="width: 50%; vertical-align: top;"><strong>KUPUJĄCY:</strong><br>[[buyer_details]]</td>
                            </tr>
                        </table>
                        <div style="font-size: 12px; line-height: 1.6;">
                            <h3 style="text-align: center; font-size: 13px;">§ 1. Przedmiot umowy</h3>
                            <p>1. Sprzedający oświadcza, że jest jedynym właścicielem pojazdu marki <strong>[[car_make]]</strong>, model <strong>[[car_model]]</strong>, rok produkcji <strong>[[car_year]]</strong>.</p>
                            <p>2. Dane pojazdu:<br>
                            - Numer VIN: <strong>[[car_vin]]</strong><br>
                            - Numer silnika: <strong>[[car_engine_number]]</strong><br>
                            - Pojemność silnika: <strong>[[car_engine_capacity]] cm³</strong><br>
                            - Moc silnika: <strong>[[car_power]]</strong><br>
                            - Numer rejestracyjny: <strong>[[car_reg_number]]</strong><br>
                            - Przebieg: <strong>[[car_mileage]] km</strong></p>
                            <p>3. Dodatkowe wyposażenie: [[additional_equipment]]</p>
                            <p>4. Sprzedający oświadcza, że pojazd jest wolny od wad prawnych oraz praw osób trzecich, nie jest przedmiotem zabezpieczenia ani egzekucji.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 2. Cena i płatność</h3>
                            <p>1. Strony ustalają cenę sprzedaży pojazdu na kwotę <strong>[[car_price_amount]] PLN</strong> (słownie: [[car_price_words]]).</p>
                            <p>2. Kupujący potwierdza odbiór pojazdu wraz z następującymi dokumentami:<br>
                            - Dowód rejestracyjny pojazdu<br>
                            - Karta pojazdu<br>
                            - Kluczyki do pojazdu</p>
                            <p>3. Sprzedający potwierdza otrzymanie całej ww. kwoty w dniu podpisania niniejszej umowy.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 3. Odpowiedzialność za wady</h3>
                            <p>1. Sprzedający odpowiada za wady ukryte pojazdu przez okres 6 miesięcy od dnia sprzedaży, z wyłączeniem elementów eksploatacyjnych.</p>
                            <p>2. Kupujący oświadcza, że zapoznał się ze stanem technicznym pojazdu i nie wnosi do niego zastrzeżeń.</p>
                            <h3 style="text-align: center; font-size: 13px;">§ 4. Postanowienia końcowe</h3>
                            <p>1. Wszelkie koszty związane z zawarciem niniejszej umowy, w tym podatek od czynności cywilnoprawnych (PCC), opłaty notarialne i administracyjne, ponosi Kupujący.</p>
                            <p>2. Kupujący zobowiązuje się do przerejestrowania pojazdu w terminie 30 dni od dnia zakupu.</p>
                            <p>3. Umowa została sporządzona w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.</p>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; display: flex; justify-content: space-between;">
                            <div style="width: 45%; text-align: center;"><p>...................................<br><strong>(Podpis Sprzedającego)</strong></p></div>
                            <div style="width: 45%; text-align: center;"><p>...................................<br><strong>(Podpis Kupującego)</strong></p></div>
                        </div>'
                    ]
                ]
            ],

            // 2. Декларация PCC-3 (улучшенная версия)
            [
                'category_id' => $catLegal->id,
                'slug' => 'pl-pcc3-tax-declaration-car-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"taxpayer_nip_pesel","type":"text","required":true,"labels":{"pl":"NIP / PESEL podatnika (Kupującego)","en":"Taxpayer\'s NIP / PESEL (Buyer)","uk":"NIP / PESEL платника податків (Покупець)","de":"NIP / PESEL des Steuerpflichtigen (Käufer)"}},
                    {"name":"submission_date","type":"date","required":true,"labels":{"pl":"Data złożenia deklaracji","en":"Date of submission","uk":"Дата подання декларації","de":"Datum der Einreichung"}},
                    {"name":"tax_office_name","type":"text","required":true,"labels":{"pl":"Nazwa urzędu skarbowego","en":"Name of the tax office","uk":"Назва податкової інспекції","de":"Name des Finanzamtes"}},
                    {"name":"taxpayer_fullname","type":"text","required":true,"labels":{"pl":"Imię i nazwisko Kupującego","en":"Buyer\'s full name","uk":"Ім\'я та прізвище Покупця","de":"Vor- und Nachname des Käufers"}},
                    {"name":"taxpayer_address","type":"textarea","required":true,"labels":{"pl":"Adres zamieszkania Kupującego","en":"Buyer\'s address","uk":"Адреса проживання Покупця","de":"Wohnadresse des Käufers"}},
                    {"name":"transaction_date","type":"date","required":true,"labels":{"pl":"Data dokonania czynności (zakupu)","en":"Date of transaction (purchase)","uk":"Дата здійснення операції (покупки)","de":"Datum der Transaktion (Kauf)"}},
                    {"name":"car_details_short","type":"text","required":true,"labels":{"pl":"Przedmiot czynności (np. Samochód osobowy Ford Focus, VIN: ...)","en":"Subject of the transaction (e.g., Passenger car Ford Focus, VIN: ...)","uk":"Предмет операції (напр., Легковий автомобіль Ford Focus, VIN: ...)","de":"Gegenstand der Transaktion (z.B. PKW Ford Focus, VIN: ...)"}},
                    {"name":"contract_value","type":"number","required":true,"labels":{"pl":"Wartość umowna pojazdu (PLN)","en":"Contract value of the vehicle (PLN)","uk":"Договірна вартість транспортного засобу (PLN)","de":"Vertragswert des Fahrzeugs (PLN)"}},
                    {"name":"market_value","type":"number","required":true,"labels":{"pl":"Podstawa opodatkowania - wartość rynkowa pojazdu (PLN)","en":"Tax base - market value of the vehicle (PLN)","uk":"База оподаткування - ринкова вартість транспортного засобу (PLN)","de":"Steuergrundlage - Marktwert des Fahrzeugs (PLN)"}},
                    {"name":"tax_amount","type":"number","required":true,"labels":{"pl":"Należny podatek (2% podstawy)","en":"Tax due (2% of the base)","uk":"Належний податок (2% від бази)","de":"Fällige Steuer (2% der Grundlage)"}},
                    {"name":"seller_details","type":"textarea","required":true,"labels":{"pl":"Dane sprzedającego (imię, nazwisko, adres)","en":"Seller\'s details (name, address)","uk":"Дані продавця (ім\'я, прізвище, адреса)","de":"Verkäuferangaben (Name, Adresse)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Deklaracja w sprawie podatku PCC-3',
                        'description' => 'Urzędowa deklaracja PCC-3, którą należy złożyć w urzędzie skarbowym w ciągu 14 dni od zakupu samochodu i opłacić 2% podatku od jego wartości rynkowej. Terminy i stawki obowiązują w 2025 roku.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 14px; font-weight: bold;">PCC-3<br>DEKLARACJA W SPRAWIE PODATKU OD CZYNNOŚCI CYWILNOPRAWNYCH</h1><p style="font-size: 11px; margin-top: 10px;">Podstawa prawna: Art. 10 ust. 1 ustawy z dnia 9 września 2000 r. o podatku od czynności cywilnoprawnych</p></div>',
                        'body_html' => '
                        <div style="font-size: 11px; line-height: 1.4;">
                            <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                                <tr><td style="border: 1px solid #000; padding: 3px; width: 30%;"><strong>1. NIP/PESEL podatnika:</strong></td><td style="border: 1px solid #000; padding: 3px;"><strong>[[taxpayer_nip_pesel]]</strong></td></tr>
                                <tr><td style="border: 1px solid #000; padding: 3px;"><strong>4. Data czynności:</strong></td><td style="border: 1px solid #000; padding: 3px;"><strong>[[transaction_date]]</strong></td></tr>
                            </table>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">A. MIEJSCE I CEL SKŁADANIA DEKLARACJI</h3>
                            <p><strong>5. Urząd skarbowy:</strong> [[tax_office_name]]</p>
                            <p><strong>6. Cel złożenia:</strong> ☑ złożenie deklaracji</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">B. DANE PODATNIKA</h3>
                            <p><strong>8. Rodzaj podatnika:</strong> ☑ osoba fizyczna</p>
                            <p><strong>9. Nazwisko, pierwsze imię:</strong> [[taxpayer_fullname]]</p>
                            <p><strong>B.2. Adres zamieszkania:</strong><br>[[taxpayer_address]]</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">C. PRZEDMIOT OPODATKOWANIA</h3>
                            <p><strong>21. Przedmiot opodatkowania:</strong> ☑ umowa</p>
                            <p><strong>22. Miejsce położenia rzeczy:</strong> ☑ terytorium RP</p>
                            <p><strong>23. Miejsce dokonania czynności:</strong> ☑ terytorium RP</p>
                            <p><strong>24. Treść czynności:</strong><br>Umowa kupna-sprzedaży pojazdu: [[car_details_short]]<br>
                            Sprzedający: [[seller_details]]<br>
                            Wartość umowna: [[contract_value]] PLN</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">D. OBLICZENIE NALEŻNEGO PODATKU</h3>
                            <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
                                <tr style="background: #f5f5f5;">
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Rodzaj czynności</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Podstawa opodatkowania (zł)</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Stawka podatku</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Należny podatek (zł)</strong></td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #000; padding: 3px;">25. Umowa sprzedaży</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;">[[market_value]]</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;">2%</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>[[tax_amount]]</strong></td>
                                </tr>
                            </table>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">F. PODATEK DO ZAPŁATY</h3>
                            <p><strong>54. Kwota podatku do zapłaty: [[tax_amount]] PLN</strong></p>

                            <div style="background: #fffacd; padding: 5px; margin: 10px 0; border: 1px solid #ddd;">
                                <p style="font-size: 10px;"><strong>UWAGA:</strong> Deklarację należy złożyć w terminie 14 dni od dnia powstania obowiązku podatkowego (od daty zawarcia umowy). Podatek należy wpłacić przed złożeniem deklaracji na rachunek urzędu skarbowego.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 40px;">
                            <table style="width: 100%; font-size: 11px;">
                                <tr>
                                    <td style="width: 30%;">67. Data wypełnienia:</td>
                                    <td style="width: 30%;">[[submission_date]]</td>
                                    <td style="width: 40%; text-align: right;">68. Podpis podatnika:<br><br>........................................</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'PCC-3 Tax Declaration',
                        'description' => 'Official PCC-3 declaration to be submitted to the tax office within 14 days of car purchase and pay 2% tax on its market value. Terms and rates applicable in 2025.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 14px; font-weight: bold;">PCC-3<br>DEKLARACJA W SPRAWIE PODATKU OD CZYNNOŚCI CYWILNOPRAWNYCH</h1><p style="font-size: 11px; margin-top: 10px;">Podstawa prawna: Art. 10 ust. 1 ustawy z dnia 9 września 2000 r. o podatku od czynności cywilnoprawnych</p></div>',
                        'body_html' => '
                        <div style="font-size: 11px; line-height: 1.4;">
                            <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                                <tr><td style="border: 1px solid #000; padding: 3px; width: 30%;"><strong>1. NIP/PESEL podatnika:</strong></td><td style="border: 1px solid #000; padding: 3px;"><strong>[[taxpayer_nip_pesel]]</strong></td></tr>
                                <tr><td style="border: 1px solid #000; padding: 3px;"><strong>4. Data czynności:</strong></td><td style="border: 1px solid #000; padding: 3px;"><strong>[[transaction_date]]</strong></td></tr>
                            </table>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">A. MIEJSCE I CEL SKŁADANIA DEKLARACJI</h3>
                            <p><strong>5. Urząd skarbowy:</strong> [[tax_office_name]]</p>
                            <p><strong>6. Cel złożenia:</strong> ☑ złożenie deklaracji</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">B. DANE PODATNIKA</h3>
                            <p><strong>8. Rodzaj podatnika:</strong> ☑ osoba fizyczna</p>
                            <p><strong>9. Nazwisko, pierwsze imię:</strong> [[taxpayer_fullname]]</p>
                            <p><strong>B.2. Adres zamieszkania:</strong><br>[[taxpayer_address]]</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">C. PRZEDMIOT OPODATKOWANIA</h3>
                            <p><strong>21. Przedmiot opodatkowania:</strong> ☑ umowa</p>
                            <p><strong>22. Miejsce położenia rzeczy:</strong> ☑ terytorium RP</p>
                            <p><strong>23. Miejsce dokonania czynności:</strong> ☑ terytorium RP</p>
                            <p><strong>24. Treść czynności:</strong><br>Umowa kupna-sprzedaży pojazdu: [[car_details_short]]<br>
                            Sprzedający: [[seller_details]]<br>
                            Wartość umowna: [[contract_value]] PLN</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">D. OBLICZENIE NALEŻNEGO PODATKU</h3>
                            <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
                                <tr style="background: #f5f5f5;">
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Rodzaj czynności</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Podstawa opodatkowania (zł)</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Stawka podatku</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Należny podatek (zł)</strong></td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #000; padding: 3px;">25. Umowa sprzedaży</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;">[[market_value]]</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;">2%</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>[[tax_amount]]</strong></td>
                                </tr>
                            </table>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">F. PODATEK DO ZAPŁATY</h3>
                            <p><strong>54. Kwota podatku do zapłaty: [[tax_amount]] PLN</strong></p>

                            <div style="background: #fffacd; padding: 5px; margin: 10px 0; border: 1px solid #ddd;">
                                <p style="font-size: 10px;"><strong>UWAGA:</strong> Deklarację należy złożyć w terminie 14 dni od dnia powstania obowiązku podatkowego (od daty zawarcia umowy). Podatek należy wpłacić przed złożeniem deklaracji na rachunek urzędu skarbowego.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 40px;">
                            <table style="width: 100%; font-size: 11px;">
                                <tr>
                                    <td style="width: 30%;">67. Data wypełnienia:</td>
                                    <td style="width: 30%;">[[submission_date]]</td>
                                    <td style="width: 40%; text-align: right;">68. Podpis podatnika:<br><br>........................................</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Декларація податку PCC-3',
                        'description' => 'Офіційна декларація PCC-3, яку необхідно подати до податкової інспекції протягом 14 днів після покупки автомобіля та сплатити 2% податку від його ринкової вартості. Терміни та ставки діють у 2025 році.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 14px; font-weight: bold;">PCC-3<br>DEKLARACJA W SPRAWIE PODATKU OD CZYNNOŚCI CYWILNOPRAWNYCH</h1><p style="font-size: 11px; margin-top: 10px;">Podstawa prawna: Art. 10 ust. 1 ustawy z dnia 9 września 2000 r. o podatku od czynności cywilnoprawnych</p></div>',
                        'body_html' => '
                        <div style="font-size: 11px; line-height: 1.4;">
                            <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                                <tr><td style="border: 1px solid #000; padding: 3px; width: 30%;"><strong>1. NIP/PESEL podatnika:</strong></td><td style="border: 1px solid #000; padding: 3px;"><strong>[[taxpayer_nip_pesel]]</strong></td></tr>
                                <tr><td style="border: 1px solid #000; padding: 3px;"><strong>4. Data czynności:</strong></td><td style="border: 1px solid #000; padding: 3px;"><strong>[[transaction_date]]</strong></td></tr>
                            </table>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">A. MIEJSCE I CEL SKŁADANIA DEKLARACJI</h3>
                            <p><strong>5. Urząd skarbowy:</strong> [[tax_office_name]]</p>
                            <p><strong>6. Cel złożenia:</strong> ☑ złożenie deklaracji</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">B. DANE PODATNIKA</h3>
                            <p><strong>8. Rodzaj podatnika:</strong> ☑ osoba fizyczna</p>
                            <p><strong>9. Nazwisko, pierwsze imię:</strong> [[taxpayer_fullname]]</p>
                            <p><strong>B.2. Adres zamieszkania:</strong><br>[[taxpayer_address]]</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">C. PRZEDMIOT OPODATKOWANIA</h3>
                            <p><strong>21. Przedmiot opodatkowania:</strong> ☑ umowa</p>
                            <p><strong>22. Miejsce położenia rzeczy:</strong> ☑ terytorium RP</p>
                            <p><strong>23. Miejsce dokonania czynności:</strong> ☑ terytorium RP</p>
                            <p><strong>24. Treść czynności:</strong><br>Umowa kupna-sprzedaży pojazdu: [[car_details_short]]<br>
                            Sprzedający: [[seller_details]]<br>
                            Wartość umowna: [[contract_value]] PLN</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">D. OBLICZENIE NALEŻNEGO PODATKU</h3>
                            <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
                                <tr style="background: #f5f5f5;">
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Rodzaj czynności</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Podstawa opodatkowania (zł)</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Stawka podatku</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Należny podatek (zł)</strong></td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #000; padding: 3px;">25. Umowa sprzedaży</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;">[[market_value]]</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;">2%</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>[[tax_amount]]</strong></td>
                                </tr>
                            </table>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">F. PODATEK DO ZAPŁATY</h3>
                            <p><strong>54. Kwota podatku do zapłaty: [[tax_amount]] PLN</strong></p>

                            <div style="background: #fffacd; padding: 5px; margin: 10px 0; border: 1px solid #ddd;">
                                <p style="font-size: 10px;"><strong>UWAGA:</strong> Deklarację należy złożyć w terminie 14 dni od dnia powstania obowiązku podatkowego (od daty zawarcia umowy). Podatek należy wpłacić przed złożeniem deklaracji na rachunek urzędu skarbowego.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 40px;">
                            <table style="width: 100%; font-size: 11px;">
                                <tr>
                                    <td style="width: 30%;">67. Data wypełnienia:</td>
                                    <td style="width: 30%;">[[submission_date]]</td>
                                    <td style="width: 40%; text-align: right;">68. Podpis podatnika:<br><br>........................................</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'de' => [
                        'title' => 'PCC-3 Steuererklärung',
                        'description' => 'Offizielle PCC-3-Erklärung, die innerhalb von 14 Tagen nach dem Autokauf beim Finanzamt eingereicht werden muss und 2% Steuer auf den Marktwert zu zahlen ist. Fristen und Sätze gelten für 2025.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 14px; font-weight: bold;">PCC-3<br>DEKLARACJA W SPRAWIE PODATKU OD CZYNNOŚCI CYWILNOPRAWNYCH</h1><p style="font-size: 11px; margin-top: 10px;">Podstawa prawna: Art. 10 ust. 1 ustawy z dnia 9 września 2000 r. o podatku od czynności cywilnoprawnych</p></div>',
                        'body_html' => '
                        <div style="font-size: 11px; line-height: 1.4;">
                            <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                                <tr><td style="border: 1px solid #000; padding: 3px; width: 30%;"><strong>1. NIP/PESEL podatnika:</strong></td><td style="border: 1px solid #000; padding: 3px;"><strong>[[taxpayer_nip_pesel]]</strong></td></tr>
                                <tr><td style="border: 1px solid #000; padding: 3px;"><strong>4. Data czynności:</strong></td><td style="border: 1px solid #000; padding: 3px;"><strong>[[transaction_date]]</strong></td></tr>
                            </table>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">A. MIEJSCE I CEL SKŁADANIA DEKLARACJI</h3>
                            <p><strong>5. Urząd skarbowy:</strong> [[tax_office_name]]</p>
                            <p><strong>6. Cel złożenia:</strong> ☑ złożenie deklaracji</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">B. DANE PODATNIKA</h3>
                            <p><strong>8. Rodzaj podatnika:</strong> ☑ osoba fizyczna</p>
                            <p><strong>9. Nazwisko, pierwsze imię:</strong> [[taxpayer_fullname]]</p>
                            <p><strong>B.2. Adres zamieszkania:</strong><br>[[taxpayer_address]]</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">C. PRZEDMIOT OPODATKOWANIA</h3>
                            <p><strong>21. Przedmiot opodatkowania:</strong> ☑ umowa</p>
                            <p><strong>22. Miejsce położenia rzeczy:</strong> ☑ terytorium RP</p>
                            <p><strong>23. Miejsce dokonania czynności:</strong> ☑ terytorium RP</p>
                            <p><strong>24. Treść czynności:</strong><br>Umowa kupna-sprzedaży pojazdu: [[car_details_short]]<br>
                            Sprzedający: [[seller_details]]<br>
                            Wartość umowna: [[contract_value]] PLN</p>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">D. OBLICZENIE NALEŻNEGO PODATKU</h3>
                            <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
                                <tr style="background: #f5f5f5;">
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Rodzaj czynności</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Podstawa opodatkowania (zł)</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Stawka podatku</strong></td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Należny podatek (zł)</strong></td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #000; padding: 3px;">25. Umowa sprzedaży</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;">[[market_value]]</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;">2%</td>
                                    <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>[[tax_amount]]</strong></td>
                                </tr>
                            </table>

                            <h3 style="font-size: 12px; background: #f0f0f0; padding: 3px; margin: 15px 0 5px 0;">F. PODATEK DO ZAPŁATY</h3>
                            <p><strong>54. Kwota podatku do zapłaty: [[tax_amount]] PLN</strong></p>

                            <div style="background: #fffacd; padding: 5px; margin: 10px 0; border: 1px solid #ddd;">
                                <p style="font-size: 10px;"><strong>UWAGA:</strong> Deklarację należy złożyć w terminie 14 dni od dnia powstania obowiązku podatkowego (od daty zawarcia umowy). Podatek należy wpłacić przed złożeniem deklaracji na rachunek urzędu skarbowego.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 40px;">
                            <table style="width: 100%; font-size: 11px;">
                                <tr>
                                    <td style="width: 30%;">67. Data wypełnienia:</td>
                                    <td style="width: 30%;">[[submission_date]]</td>
                                    <td style="width: 40%; text-align: right;">68. Podpis podatnika:<br><br>........................................</td>
                                </tr>
                            </table>
                        </div>'
                    ]
                ]
            ],

            // 3. Заявление о регистрации транспортного средства (улучшенное)
            [
                'category_id' => $catLegal->id,
                'slug' => 'pl-vehicle-registration-application-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"owner_details","type":"textarea","required":true,"labels":{"pl":"Dane właściciela (imię, nazwisko, PESEL, adres)","en":"Owner\'s details (name, PESEL, address)","uk":"Дані власника (ім\'я, прізвище, PESEL, адреса)","de":"Eigentümerangaben (Name, PESEL, Adresse)"}},
                    {"name":"co_owner_details","type":"textarea","required":false,"labels":{"pl":"Dane współwłaściciela (jeśli jest)","en":"Co-owner\'s details (if any)","uk":"Дані співвласника (якщо є)","de":"Miteigentümerangaben (falls vorhanden)"}},
                    {"name":"registration_office","type":"text","required":true,"labels":{"pl":"Nazwa organu rejestrującego (np. Wydział Komunikacji Urzędu Miasta)","en":"Name of the registration authority","uk":"Назва органу реєстрації","de":"Name der Registrierungsbehörde"}},
                    {"name":"request_type","type":"select","options":{"rejestracja":"Rejestracja pojazdu","czasowa_rejestracja":"Czasowa rejestracja pojazdu","wyrejestrowanie":"Wyrejestrowanie pojazdu","zmiana_wlasciciela":"Zmiana właściciela"},"required":true,"labels":{"pl":"Wnoszę o","en":"I hereby apply for","uk":"Прошу про","de":"Ich beantrage"}},
                    {"name":"car_vin","type":"text","required":true,"labels":{"pl":"Numer VIN","en":"VIN Number","uk":"Номер VIN","de":"VIN-Nummer"}},
                    {"name":"car_make_model","type":"text","required":true,"labels":{"pl":"Marka i model","en":"Make and model","uk":"Марка та модель","de":"Marke und Modell"}},
                    {"name":"car_year","type":"number","required":true,"labels":{"pl":"Rok produkcji","en":"Year of manufacture","uk":"Рік виробництва","de":"Baujahr"}},
                    {"name":"car_engine_capacity","type":"text","required":true,"labels":{"pl":"Pojemność silnika (cm³)","en":"Engine capacity (cm³)","uk":"Об\'єм двигуна (см³)","de":"Hubraum (cm³)"}},
                    {"name":"current_reg_number","type":"text","required":false,"labels":{"pl":"Dotychczasowy numer rejestracyjny (jeśli był)","en":"Current registration number (if any)","uk":"Поточний реєстраційний номер (якщо був)","de":"Aktuelles Kennzeichen (falls vorhanden)"}},
                    {"name":"insurance_company","type":"text","required":true,"labels":{"pl":"Towarzystwo ubezpieczeniowe (polisa OC)","en":"Insurance company (liability insurance)","uk":"Страхова компанія (страхування відповідальності)","de":"Versicherungsgesellschaft (Haftpflichtversicherung)"}},
                    {"name":"insurance_policy_number","type":"text","required":true,"labels":{"pl":"Numer polisy OC","en":"Insurance policy number","uk":"Номер страхового поліса","de":"Versicherungspolice-Nummer"}},
                    {"name":"technical_inspection_date","type":"date","required":true,"labels":{"pl":"Data ważności przeglądu technicznego","en":"Technical inspection validity date","uk":"Дата дійсності технічного огляду","de":"Gültigkeitsdatum der technischen Prüfung"}},
                    {"name":"attachments_list","type":"textarea","required":true,"labels":{"pl":"Załączniki (dowód własności, dowód rejestracyjny, karta pojazdu, polisa OC, przegląd techniczny, PCC-3)","en":"Attachments (proof of ownership, registration certificate, vehicle card, insurance, technical inspection, PCC-3)","uk":"Додатки (документ про власність, свідоцтво реєстрації, карта транспортного засобу, страховка, техогляд, PCC-3)","de":"Anlagen (Eigentumsnachweis, Zulassungsbescheinigung, Fahrzeugschein, Versicherung, TÜV, PCC-3)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o rejestrację pojazdu',
                        'description' => 'Oficjalny wniosek do Wydziału Komunikacji o zarejestrowanie zakupionego pojazdu na nowego właściciela. Zawiera wszystkie wymagane dane i listę niezbędnych dokumentów.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">WNIOSEK O REJESTRACJĘ / CZASOWĄ REJESTRACJĘ / WYREJESTROWANIE / ZMIANĘ WŁAŚCICIELA POJAZDU</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.5;">
                            <p><strong>Do:</strong> [[registration_office]]</p>
                            <p><strong>Wnoszę o:</strong> [[request_type]]</p>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE WŁAŚCICIELA POJAZDU</h3>
                            <div style="border: 1px solid #ccc; padding: 8px; margin-bottom: 15px;">
                                [[owner_details]]
                            </div>

                            <div style="margin-bottom: 15px;">
                                <strong>Dane współwłaściciela (jeśli jest):</strong><br>
                                [[co_owner_details]]
                            </div>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE POJAZDU</h3>
                            <table style="width: 100%; font-size: 11px; border-collapse: collapse;">
                                <tr><td style="border: 1px solid #ccc; padding: 5px; width: 40%;"><strong>Marka, model:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_make_model]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Rok produkcji:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_year]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Numer VIN:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_vin]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Pojemność silnika:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_engine_capacity]] cm³</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Dotychczasowy nr rejestracyjny:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[current_reg_number]]</td></tr>
                            </table>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE UBEZPIECZENIA I PRZEGLĄDU</h3>
                            <table style="width: 100%; font-size: 11px; border-collapse: collapse;">
                                <tr><td style="border: 1px solid #ccc; padding: 5px; width: 40%;"><strong>Towarzystwo ubezpieczeniowe:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[insurance_company]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Numer polisy OC:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[insurance_policy_number]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Ważność przeglądu technicznego:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[technical_inspection_date]]</td></tr>
                            </table>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">ZAŁĄCZNIKI</h3>
                            <div style="border: 1px solid #ccc; padding: 8px; white-space: pre-wrap; font-size: 11px;">[[attachments_list]]</div>

                            <div style="background: #fffacd; padding: 8px; margin: 15px 0; border: 1px solid #ddd; font-size: 11px;">
                                <p><strong>UWAGI:</strong></p>
                                <p>• Wniosek należy złożyć w terminie 30 dni od daty zakupu pojazdu</p>
                                <p>• Opłata ewidencyjna: 80,50 PLN (2025)</p>
                                <p>• Koszt tablic rejestracyjnych: ok. 80 PLN</p>
                                <p>• Wymagane dokumenty: dowód osobisty, wszystkie załączone dokumenty pojazdu</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Data: ........................</td>
                                    <td style="width: 50%; text-align: right;">Podpis właściciela:<br><br>........................................</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Vehicle Registration Application',
                        'description' => 'Official application to the Communication Department for registering a purchased vehicle to a new owner. Contains all required data and list of necessary documents.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">WNIOSEK O REJESTRACJĘ / CZASOWĄ REJESTRACJĘ / WYREJESTROWANIE / ZMIANĘ WŁAŚCICIELA POJAZDU</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.5;">
                            <p><strong>Do:</strong> [[registration_office]]</p>
                            <p><strong>Wnoszę o:</strong> [[request_type]]</p>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE WŁAŚCICIELA POJAZDU</h3>
                            <div style="border: 1px solid #ccc; padding: 8px; margin-bottom: 15px;">
                                [[owner_details]]
                            </div>

                            <div style="margin-bottom: 15px;">
                                <strong>Dane współwłaściciela (jeśli jest):</strong><br>
                                [[co_owner_details]]
                            </div>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE POJAZDU</h3>
                            <table style="width: 100%; font-size: 11px; border-collapse: collapse;">
                                <tr><td style="border: 1px solid #ccc; padding: 5px; width: 40%;"><strong>Marka, model:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_make_model]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Rok produkcji:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_year]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Numer VIN:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_vin]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Pojemność silnika:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_engine_capacity]] cm³</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Dotychczasowy nr rejestracyjny:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[current_reg_number]]</td></tr>
                            </table>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE UBEZPIECZENIA I PRZEGLĄDU</h3>
                            <table style="width: 100%; font-size: 11px; border-collapse: collapse;">
                                <tr><td style="border: 1px solid #ccc; padding: 5px; width: 40%;"><strong>Towarzystwo ubezpieczeniowe:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[insurance_company]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Numer polisy OC:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[insurance_policy_number]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Ważność przeglądu technicznego:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[technical_inspection_date]]</td></tr>
                            </table>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">ZAŁĄCZNIKI</h3>
                            <div style="border: 1px solid #ccc; padding: 8px; white-space: pre-wrap; font-size: 11px;">[[attachments_list]]</div>

                            <div style="background: #fffacd; padding: 8px; margin: 15px 0; border: 1px solid #ddd; font-size: 11px;">
                                <p><strong>UWAGI:</strong></p>
                                <p>• Wniosek należy złożyć w terminie 30 dni od daty zakupu pojazdu</p>
                                <p>• Opłata ewidencyjna: 80,50 PLN (2025)</p>
                                <p>• Koszt tablic rejestracyjnych: ok. 80 PLN</p>
                                <p>• Wymagane dokumenty: dowód osobisty, wszystkie załączone dokumenty pojazdu</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Data: ........................</td>
                                    <td style="width: 50%; text-align: right;">Podpis właściciela:<br><br>........................................</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про реєстрацію транспортного засобу',
                        'description' => 'Офіційна заява до Відділу комунікацій про реєстрацію придбаного транспортного засобу на нового власника. Містить всі необхідні дані та перелік потрібних документів.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">WNIOSEK O REJESTRACJĘ / CZASOWĄ REJESTRACJĘ / WYREJESTROWANIE / ZMIANĘ WŁAŚCICIELA POJAZDU</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.5;">
                            <p><strong>Do:</strong> [[registration_office]]</p>
                            <p><strong>Wnoszę o:</strong> [[request_type]]</p>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE WŁAŚCICIELA POJAZDU</h3>
                            <div style="border: 1px solid #ccc; padding: 8px; margin-bottom: 15px;">
                                [[owner_details]]
                            </div>

                            <div style="margin-bottom: 15px;">
                                <strong>Dane współwłaściciela (jeśli jest):</strong><br>
                                [[co_owner_details]]
                            </div>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE POJAZDU</h3>
                            <table style="width: 100%; font-size: 11px; border-collapse: collapse;">
                                <tr><td style="border: 1px solid #ccc; padding: 5px; width: 40%;"><strong>Marka, model:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_make_model]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Rok produkcji:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_year]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Numer VIN:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_vin]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Pojemność silnika:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_engine_capacity]] cm³</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Dotychczasowy nr rejestracyjny:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[current_reg_number]]</td></tr>
                            </table>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE UBEZPIECZENIA I PRZEGLĄDU</h3>
                            <table style="width: 100%; font-size: 11px; border-collapse: collapse;">
                                <tr><td style="border: 1px solid #ccc; padding: 5px; width: 40%;"><strong>Towarzystwo ubezpieczeniowe:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[insurance_company]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Numer polisy OC:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[insurance_policy_number]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Ważność przeglądu technicznego:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[technical_inspection_date]]</td></tr>
                            </table>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">ZAŁĄCZNIKI</h3>
                            <div style="border: 1px solid #ccc; padding: 8px; white-space: pre-wrap; font-size: 11px;">[[attachments_list]]</div>

                            <div style="background: #fffacd; padding: 8px; margin: 15px 0; border: 1px solid #ddd; font-size: 11px;">
                                <p><strong>UWAGI:</strong></p>
                                <p>• Wniosek należy złożyć w terminie 30 dni od daty zakupu pojazdu</p>
                                <p>• Opłata ewidencyjna: 80,50 PLN (2025)</p>
                                <p>• Koszt tablic rejestracyjnych: ok. 80 PLN</p>
                                <p>• Wymagane dokumenty: dowód osobisty, wszystkie załączone dokumenty pojazdu</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Data: ........................</td>
                                    <td style="width: 50%; text-align: right;">Podpis właściciela:<br><br>........................................</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Fahrzeugregistrierung',
                        'description' => 'Offizieller Antrag an die Kommunikationsabteilung zur Registrierung eines gekauften Fahrzeugs auf einen neuen Eigentümer. Enthält alle erforderlichen Daten und eine Liste der notwendigen Dokumente.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 20px;"><h1 style="font-size: 16px; font-weight: bold;">WNIOSEK O REJESTRACJĘ / CZASOWĄ REJESTRACJĘ / WYREJESTROWANIE / ZMIANĘ WŁAŚCICIELA POJAZDU</h1></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.5;">
                            <p><strong>Do:</strong> [[registration_office]]</p>
                            <p><strong>Wnoszę o:</strong> [[request_type]]</p>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE WŁAŚCICIELA POJAZDU</h3>
                            <div style="border: 1px solid #ccc; padding: 8px; margin-bottom: 15px;">
                                [[owner_details]]
                            </div>

                            <div style="margin-bottom: 15px;">
                                <strong>Dane współwłaściciela (jeśli jest):</strong><br>
                                [[co_owner_details]]
                            </div>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE POJAZDU</h3>
                            <table style="width: 100%; font-size: 11px; border-collapse: collapse;">
                                <tr><td style="border: 1px solid #ccc; padding: 5px; width: 40%;"><strong>Marka, model:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_make_model]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Rok produkcji:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_year]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Numer VIN:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_vin]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Pojemność silnika:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[car_engine_capacity]] cm³</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Dotychczasowy nr rejestracyjny:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[current_reg_number]]</td></tr>
                            </table>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">DANE UBEZPIECZENIA I PRZEGLĄDU</h3>
                            <table style="width: 100%; font-size: 11px; border-collapse: collapse;">
                                <tr><td style="border: 1px solid #ccc; padding: 5px; width: 40%;"><strong>Towarzystwo ubezpieczeniowe:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[insurance_company]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Numer polisy OC:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[insurance_policy_number]]</td></tr>
                                <tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Ważność przeglądu technicznego:</strong></td><td style="border: 1px solid #ccc; padding: 5px;">[[technical_inspection_date]]</td></tr>
                            </table>

                            <h3 style="font-size: 13px; margin: 20px 0 10px 0; background: #f0f0f0; padding: 5px;">ZAŁĄCZNIKI</h3>
                            <div style="border: 1px solid #ccc; padding: 8px; white-space: pre-wrap; font-size: 11px;">[[attachments_list]]</div>

                            <div style="background: #fffacd; padding: 8px; margin: 15px 0; border: 1px solid #ddd; font-size: 11px;">
                                <p><strong>UWAGI:</strong></p>
                                <p>• Wniosek należy złożyć w terminie 30 dni od daty zakupu pojazdu</p>
                                <p>• Opłata ewidencyjna: 80,50 PLN (2025)</p>
                                <p>• Koszt tablic rejestracyjnych: ok. 80 PLN</p>
                                <p>• Wymagane dokumenty: dowód osobisty, wszystkie załączone dokumenty pojazdu</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Data: ........................</td>
                                    <td style="width: 50%; text-align: right;">Podpis właściciela:<br><br>........................................</td>
                                </tr>
                            </table>
                        </div>'
                    ]
                ]
            ],

            // 4. Доверенность на управление автомобилем (улучшенная)
            [
                'category_id' => $catLegal->id,
                'slug' => 'pl-car-power-of-attorney-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"document_date_place","type":"text","required":true,"labels":{"pl":"Miejscowość i data wystawienia","en":"Place and date of issue","uk":"Місце та дата видачі","de":"Ort und Datum der Ausstellung"}},
                    {"name":"principal_details","type":"textarea","required":true,"labels":{"pl":"Dane Mocodawcy (właściciela)","en":"Principal\'s Details (owner)","uk":"Дані Довірителя (власника)","de":"Angaben des Vollmachtgebers (Eigentümer)"}},
                    {"name":"attorney_details","type":"textarea","required":true,"labels":{"pl":"Dane Pełnomocnika (osoby upoważnionej)","en":"Attorney-in-fact\'s Details (authorized person)","uk":"Дані Довіреної особи (уповноваженої особи)","de":"Angaben des Bevollmächtigten (bevollmächtigte Person)"}},
                    {"name":"car_details_full","type":"textarea","required":true,"labels":{"pl":"Dane pojazdu (marka, model, VIN, nr rej., rok prod.)","en":"Vehicle Details (make, model, VIN, reg. no., year)","uk":"Дані транспортного засобу (марка, модель, VIN, реєстр. номер, рік)","de":"Fahrzeugdaten (Marke, Modell, VIN, Kfz-Kennzeichen, Baujahr)"}},
                    {"name":"scope_of_authority","type":"textarea","required":true,"labels":{"pl":"Zakres pełnomocnictwa","en":"Scope of authority","uk":"Сфера повноважень","de":"Umfang der Vollmacht"}},
                    {"name":"validity_period","type":"text","required":false,"labels":{"pl":"Ważność pełnomocnictwa (opcjonalne)","en":"Validity period (optional)","uk":"Термін дії довіреності (опціонально)","de":"Gültigkeitsdauer (optional)"}},
                    {"name":"special_conditions","type":"textarea","required":false,"labels":{"pl":"Szczególne warunki (opcjonalne)","en":"Special conditions (optional)","uk":"Особливі умови (опціонально)","de":"Besondere Bedingungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pełnomocnictwo do zarządzania pojazdem',
                        'description' => 'Dokument upoważniający wskazaną osobę do wykonywania określonych czynności związanych z pojazdem w imieniu właściciela. Może być notarialnie poświadczone.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 12px; margin-top: 10px;">[[document_date_place]]</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[principal_details]]</strong>
                            </div>

                            <p>zwanym/ą dalej <strong>"Mocodawcą"</strong>, udzielam pełnomocnictwa:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[attorney_details]]</strong>
                            </div>

                            <p>zwanym/ą dalej <strong>"Pełnomocnikiem"</strong>, do wykonywania w moim imieniu następujących czynności:</p>

                            <div style="border: 1px solid #000; padding: 15px; margin: 15px 0;">
                                <h3 style="font-size: 13px; text-align: center; margin-bottom: 10px;">ZAKRES PEŁNOMOCNICTWA</h3>
                                <div style="white-space: pre-wrap;">[[scope_of_authority]]</div>
                            </div>

                            <p>w odniesieniu do pojazdu:</p>
                            <div style="border: 1px solid #ccc; padding: 8px; margin: 10px 0; background: #f0f0f0;">
                                [[car_details_full]]
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Ważność pełnomocnictwa:</strong> [[validity_period]]</p>
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Szczególne warunki:</strong></p>
                                <div style="white-space: pre-wrap; margin-left: 20px;">[[special_conditions]]</div>
                            </div>

                            <div style="background: #fffacd; padding: 10px; margin: 20px 0; border: 1px solid #ddd;">
                                <p style="font-size: 11px;"><strong>UWAGA:</strong> Niniejsze pełnomocnictwo może wymagać poświadczenia notarialnego w zależności od rodzaju wykonywanych czynności. W przypadku sprzedaży pojazdu pełnomocnictwo musi być notarialnie poświadczone.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 80px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Mocodawca:<br><br>........................................<br>(podpis)</td>
                                    <td style="width: 50%; text-align: right;">Pełnomocnik:<br>(potwierdzenie przyjęcia)<br><br>........................................<br>(podpis)</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Vehicle Management',
                        'description' => 'Document authorizing a designated person to perform specific activities related to the vehicle on behalf of the owner. May require notarial authentication.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 12px; margin-top: 10px;">[[document_date_place]]</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[principal_details]]</strong>
                            </div>

                            <p>zwanym/ą dalej <strong>"Mocodawcą"</strong>, udzielam pełnomocnictwa:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[attorney_details]]</strong>
                            </div>

                            <p>zwanym/ą dalej <strong>"Pełnomocnikiem"</strong>, do wykonywania w moim imieniu następujących czynności:</p>

                            <div style="border: 1px solid #000; padding: 15px; margin: 15px 0;">
                                <h3 style="font-size: 13px; text-align: center; margin-bottom: 10px;">ZAKRES PEŁNOMOCNICTWA</h3>
                                <div style="white-space: pre-wrap;">[[scope_of_authority]]</div>
                            </div>

                            <p>w odniesieniu do pojazdu:</p>
                            <div style="border: 1px solid #ccc; padding: 8px; margin: 10px 0; background: #f0f0f0;">
                                [[car_details_full]]
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Ważność pełnomocnictwa:</strong> [[validity_period]]</p>
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Szczególne warunki:</strong></p>
                                <div style="white-space: pre-wrap; margin-left: 20px;">[[special_conditions]]</div>
                            </div>

                            <div style="background: #fffacd; padding: 10px; margin: 20px 0; border: 1px solid #ddd;">
                                <p style="font-size: 11px;"><strong>UWAGA:</strong> Niniejsze pełnomocnictwo może wymagać poświadczenia notarialnego w zależności od rodzaju wykonywanych czynności. W przypadku sprzedaży pojazdu pełnomocnictwo musi być notarialnie poświadczone.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 80px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Mocodawca:<br><br>........................................<br>(podpis)</td>
                                    <td style="width: 50%; text-align: right;">Pełnomocnik:<br>(potwierdzenie przyjęcia)<br><br>........................................<br>(podpis)</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на управління транспортним засобом',
                        'description' => 'Документ, що уповноважує вказану особу виконувати певні дії, пов\'язані з транспортним засобом, від імені власника. Може вимагати нотаріального засвідчення.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 12px; margin-top: 10px;">[[document_date_place]]</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[principal_details]]</strong>
                            </div>

                            <p>zwanym/ą dalej <strong>"Mocodawcą"</strong>, udzielam pełnomocnictwa:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[attorney_details]]</strong>
                            </div>

                            <p>zwanym/ą dalej <strong>"Pełnomocnikiem"</strong>, do wykonywania w moim imieniu następujących czynności:</p>

                            <div style="border: 1px solid #000; padding: 15px; margin: 15px 0;">
                                <h3 style="font-size: 13px; text-align: center; margin-bottom: 10px;">ZAKRES PEŁNOMOCNICTWA</h3>
                                <div style="white-space: pre-wrap;">[[scope_of_authority]]</div>
                            </div>

                            <p>w odniesieniu do pojazdu:</p>
                            <div style="border: 1px solid #ccc; padding: 8px; margin: 10px 0; background: #f0f0f0;">
                                [[car_details_full]]
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Ważność pełnomocnictwa:</strong> [[validity_period]]</p>
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Szczególne warunki:</strong></p>
                                <div style="white-space: pre-wrap; margin-left: 20px;">[[special_conditions]]</div>
                            </div>

                            <div style="background: #fffacd; padding: 10px; margin: 20px 0; border: 1px solid #ddd;">
                                <p style="font-size: 11px;"><strong>UWAGA:</strong> Niniejsze pełnomocnictwo może wymagać poświadczenia notarialnego w zależności od rodzaju wykonywanych czynności. W przypadku sprzedaży pojazdu pełnomocnictwo musi być notarialnie poświadczone.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 80px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Mocodawca:<br><br>........................................<br>(podpis)</td>
                                    <td style="width: 50%; text-align: right;">Pełnomocnik:<br>(potwierdzenie przyjęcia)<br><br>........................................<br>(podpis)</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht für Fahrzeugverwaltung',
                        'description' => 'Dokument, das eine bestimmte Person ermächtigt, bestimmte Tätigkeiten im Zusammenhang mit dem Fahrzeug im Namen des Eigentümers durchzuführen. Kann eine notarielle Beglaubigung erfordern.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 12px; margin-top: 10px;">[[document_date_place]]</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[principal_details]]</strong>
                            </div>

                            <p>zwanym/ą dalej <strong>"Mocodawcą"</strong>, udzielam pełnomocnictwa:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[attorney_details]]</strong>
                            </div>

                            <p>zwanym/ą dalej <strong>"Pełnomocnikiem"</strong>, do wykonywania w moim imieniu następujących czynności:</p>

                            <div style="border: 1px solid #000; padding: 15px; margin: 15px 0;">
                                <h3 style="font-size: 13px; text-align: center; margin-bottom: 10px;">ZAKRES PEŁNOMOCNICTWA</h3>
                                <div style="white-space: pre-wrap;">[[scope_of_authority]]</div>
                            </div>

                            <p>w odniesieniu do pojazdu:</p>
                            <div style="border: 1px solid #ccc; padding: 8px; margin: 10px 0; background: #f0f0f0;">
                                [[car_details_full]]
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Ważność pełnomocnictwa:</strong> [[validity_period]]</p>
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Szczególne warunki:</strong></p>
                                <div style="white-space: pre-wrap; margin-left: 20px;">[[special_conditions]]</div>
                            </div>

                            <div style="background: #fffacd; padding: 10px; margin: 20px 0; border: 1px solid #ddd;">
                                <p style="font-size: 11px;"><strong>UWAGA:</strong> Niniejsze pełnomocnictwo może wymagać poświadczenia notarialnego w zależności od rodzaju wykonywanych czynności. W przypadku sprzedaży pojazdu pełnomocnictwo musi być notarialnie poświadczone.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 80px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Mocodawca:<br><br>........................................<br>(podpis)</td>
                                    <td style="width: 50%; text-align: right;">Pełnomocnik:<br>(potwierdzenie przyjęcia)<br><br>........................................<br>(podpis)</td>
                                </tr>
                            </table>
                        </div>'
                    ]
                ]
            ],

            // 5. Расписка в получении денег (улучшенная)
            [
                'category_id' => $catLegal->id,
                'slug' => 'pl-car-payment-receipt-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"receipt_date_place","type":"text","required":true,"labels":{"pl":"Miejscowość i data","en":"Place and Date","uk":"Місце та дата","de":"Ort und Datum"}},
                    {"name":"recipient_details","type":"textarea","required":true,"labels":{"pl":"Dane otrzymującego (Sprzedawcy)","en":"Recipient\'s Details (Seller)","uk":"Дані одержувача (Продавця)","de":"Empfängerangaben (Verkäufer)"}},
                    {"name":"payer_details","type":"textarea","required":true,"labels":{"pl":"Dane wpłacającego (Kupującego)","en":"Payer\'s Details (Buyer)","uk":"Дані платника (Покупця)","de":"Zahlerangaben (Käufer)"}},
                    {"name":"amount_numeric","type":"number","required":true,"labels":{"pl":"Otrzymana kwota (cyfrowo)","en":"Amount received (numeric)","uk":"Отримана сума (цифрами)","de":"Erhaltener Betrag (numerisch)"}},
                    {"name":"amount_words","type":"text","required":true,"labels":{"pl":"Otrzymana kwota (słownie)","en":"Amount received (in words)","uk":"Отримана сума (словами)","de":"Erhaltener Betrag (in Worten)"}},
                    {"name":"payment_method","type":"select","options":{"gotowka":"Gotówka","przelew":"Przelew bankowy","karta":"Karta płatnicza","czek":"Czek"},"required":true,"labels":{"pl":"Sposób płatności","en":"Payment method","uk":"Спосіб оплати","de":"Zahlungsweise"}},
                    {"name":"payment_for","type":"textarea","required":true,"labels":{"pl":"Tytułem (szczegółowy opis za co)","en":"For (detailed description)","uk":"Титулом (детальний опис за що)","de":"Als (detaillierte Beschreibung wofür)"}},
                    {"name":"witness_details","type":"textarea","required":false,"labels":{"pl":"Dane świadka (opcjonalne)","en":"Witness details (optional)","uk":"Дані свідка (опціонально)","de":"Zeuge (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pokwitowanie odbioru gotówki za samochód',
                        'description' => 'Dokument potwierdzający fakt otrzymania zapłaty za sprzedany pojazd, zawierający wszystkie istotne dane transakcji. Przydatny przy transakcjach gotówkowych i bezgotówkowych.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">POKWITOWANIE ODBIORU PŁATNOŚCI</h1></div><p style="text-align: right; font-size: 12px;">[[receipt_date_place]]</p>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[recipient_details]]</strong>
                            </div>

                            <p>kwituje odbiór od:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[payer_details]]</strong>
                            </div>

                            <div style="text-align: center; margin: 30px 0;">
                                <div style="border: 2px solid #000; padding: 20px; background: #f0f0f0;">
                                    <p style="font-size: 16px; font-weight: bold;">KWOTY W WYSOKOŚCI:</p>
                                    <p style="font-size: 18px; font-weight: bold; color: #000; margin: 10px 0;">[[amount_numeric]] PLN</p>
                                    <p style="font-size: 14px;">(słownie: <strong>[[amount_words]]</strong>)</p>
                                </div>
                            </div>

                            <table style="width: 100%; font-size: 12px; margin: 20px 0;">
                                <tr><td style="width: 30%; font-weight: bold;">Sposób płatności:</td><td>[[payment_method]]</td></tr>
                                <tr><td style="font-weight: bold; vertical-align: top;">Tytułem:</td><td>[[payment_for]]</td></tr>
                            </table>

                            <div style="margin: 30px 0;">
                                <p><strong>Oświadczenie:</strong></p>
                                <p>Niniejszym potwierdzam, że otrzymałem/am powyższą kwotę w całości zgodnie z umową. Nie mam żadnych roszczeń finansowych wobec płatnika z tytułu powyższej transakcji.</p>
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Świadek transakcji:</strong></p>
                                <div style="border: 1px solid #ccc; padding: 8px; background: #f9f9f9;">
                                    [[witness_details]]
                                </div>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Świadek:<br><br>........................................<br>(podpis świadka)</td>
                                    <td style="width: 50%; text-align: right;">Otrzymujący płatność:<br><br>........................................<br>(podpis otrzymującego)</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Cash Receipt for Car Payment',
                        'description' => 'Document confirming receipt of payment for a sold vehicle, containing all essential transaction data. Useful for both cash and cashless transactions.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">POKWITOWANIE ODBIORU PŁATNOŚCI</h1></div><p style="text-align: right; font-size: 12px;">[[receipt_date_place]]</p>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[recipient_details]]</strong>
                            </div>

                            <p>kwituje odbiór od:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[payer_details]]</strong>
                            </div>

                            <div style="text-align: center; margin: 30px 0;">
                                <div style="border: 2px solid #000; padding: 20px; background: #f0f0f0;">
                                    <p style="font-size: 16px; font-weight: bold;">KWOTY W WYSOKOŚCI:</p>
                                    <p style="font-size: 18px; font-weight: bold; color: #000; margin: 10px 0;">[[amount_numeric]] PLN</p>
                                    <p style="font-size: 14px;">(słownie: <strong>[[amount_words]]</strong>)</p>
                                </div>
                            </div>

                            <table style="width: 100%; font-size: 12px; margin: 20px 0;">
                                <tr><td style="width: 30%; font-weight: bold;">Sposób płatności:</td><td>[[payment_method]]</td></tr>
                                <tr><td style="font-weight: bold; vertical-align: top;">Tytułem:</td><td>[[payment_for]]</td></tr>
                            </table>

                            <div style="margin: 30px 0;">
                                <p><strong>Oświadczenie:</strong></p>
                                <p>Niniejszym potwierdzam, że otrzymałem/am powyższą kwotę w całości zgodnie z umową. Nie mam żadnych roszczeń finansowych wobec płatnika z tytułu powyższej transakcji.</p>
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Świadek transakcji:</strong></p>
                                <div style="border: 1px solid #ccc; padding: 8px; background: #f9f9f9;">
                                    [[witness_details]]
                                </div>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Świadek:<br><br>........................................<br>(podpis świadka)</td>
                                    <td style="width: 50%; text-align: right;">Otrzymujący płatność:<br><br>........................................<br>(podpis otrzymującego)</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Розписка про отримання коштів за автомобіль',
                        'description' => 'Документ, що підтверджує факт отримання оплати за проданий транспортний засіб, містить всі істотні дані транзакції. Корисний при готівкових і безготівкових операціях.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">POKWITOWANIE ODBIORU PŁATNOŚCI</h1></div><p style="text-align: right; font-size: 12px;">[[receipt_date_place]]</p>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[recipient_details]]</strong>
                            </div>

                            <p>kwituje odbiór od:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[payer_details]]</strong>
                            </div>

                            <div style="text-align: center; margin: 30px 0;">
                                <div style="border: 2px solid #000; padding: 20px; background: #f0f0f0;">
                                    <p style="font-size: 16px; font-weight: bold;">KWOTY W WYSOKOŚCI:</p>
                                    <p style="font-size: 18px; font-weight: bold; color: #000; margin: 10px 0;">[[amount_numeric]] PLN</p>
                                    <p style="font-size: 14px;">(słownie: <strong>[[amount_words]]</strong>)</p>
                                </div>
                            </div>

                            <table style="width: 100%; font-size: 12px; margin: 20px 0;">
                                <tr><td style="width: 30%; font-weight: bold;">Sposób płatności:</td><td>[[payment_method]]</td></tr>
                                <tr><td style="font-weight: bold; vertical-align: top;">Tytułem:</td><td>[[payment_for]]</td></tr>
                            </table>

                            <div style="margin: 30px 0;">
                                <p><strong>Oświadczenie:</strong></p>
                                <p>Niniejszym potwierdzam, że otrzymałem/am powyższą kwotę w całości zgodnie z umową. Nie mam żadnych roszczeń finansowych wobec płatnika z tytułu powyższej transakcji.</p>
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Świadek transakcji:</strong></p>
                                <div style="border: 1px solid #ccc; padding: 8px; background: #f9f9f9;">
                                    [[witness_details]]
                                </div>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Świadek:<br><br>........................................<br>(podpis świadka)</td>
                                    <td style="width: 50%; text-align: right;">Otrzymujący płatność:<br><br>........................................<br>(podpis otrzymującego)</td>
                                </tr>
                            </table>
                        </div>'
                    ],
                    'de' => [
                        'title' => 'Zahlungsbestätigung für Autoverkauf',
                        'description' => 'Dokument zur Bestätigung des Erhalts der Zahlung für ein verkauftes Fahrzeug, enthält alle wesentlichen Transaktionsdaten. Nützlich für Bar- und bargeldlose Transaktionen.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">POKWITOWANIE ODBIORU PŁATNOŚCI</h1></div><p style="text-align: right; font-size: 12px;">[[receipt_date_place]]</p>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.8;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[recipient_details]]</strong>
                            </div>

                            <p>kwituje odbiór od:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9;">
                                <strong>[[payer_details]]</strong>
                            </div>

                            <div style="text-align: center; margin: 30px 0;">
                                <div style="border: 2px solid #000; padding: 20px; background: #f0f0f0;">
                                    <p style="font-size: 16px; font-weight: bold;">KWOTY W WYSOKOŚCI:</p>
                                    <p style="font-size: 18px; font-weight: bold; color: #000; margin: 10px 0;">[[amount_numeric]] PLN</p>
                                    <p style="font-size: 14px;">(słownie: <strong>[[amount_words]]</strong>)</p>
                                </div>
                            </div>

                            <table style="width: 100%; font-size: 12px; margin: 20px 0;">
                                <tr><td style="width: 30%; font-weight: bold;">Sposób płatności:</td><td>[[payment_method]]</td></tr>
                                <tr><td style="font-weight: bold; vertical-align: top;">Tytułem:</td><td>[[payment_for]]</td></tr>
                            </table>

                            <div style="margin: 30px 0;">
                                <p><strong>Oświadczenie:</strong></p>
                                <p>Niniejszym potwierdzam, że otrzymałem/am powyższą kwotę w całości zgodnie z umową. Nie mam żadnych roszczeń finansowych wobec płatnika z tytułu powyższej transakcji.</p>
                            </div>

                            <div style="margin: 20px 0;">
                                <p><strong>Świadek transakcji:</strong></p>
                                <div style="border: 1px solid #ccc; padding: 8px; background: #f9f9f9;">
                                    [[witness_details]]
                                </div>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">Świadek:<br><br>........................................<br>(podpis świadka)</td>
                                    <td style="width: 50%; text-align: right;">Otrzymujący płatność:<br><br>........................................<br>(podpis otrzymującego)</td>
                                </tr>
                            </table>
                        </div>'
                    ]
                ]
            ],

            // 6. Новый документ: Заявление об отказе от права преимущественной покупки
            [
                'category_id' => $catLegal->id,
                'slug' => 'pl-car-waiver-preemption-right-2025',
                'access_level' => 'standard',
                'fields' => '[
                    {"name":"document_date_place","type":"text","required":true,"labels":{"pl":"Miejscowość i data","en":"Place and Date","uk":"Місце та дата","de":"Ort und Datum"}},
                    {"name":"waiving_person_details","type":"textarea","required":true,"labels":{"pl":"Dane osoby rezygnującej z prawa (współwłaściciel)","en":"Details of person waiving the right (co-owner)","uk":"Дані особи, що відмовляється від права (співвласник)","de":"Angaben der Person, die auf das Recht verzichtet (Miteigentümer)"}},
                    {"name":"selling_owner_details","type":"textarea","required":true,"labels":{"pl":"Dane sprzedającego właściciela","en":"Details of selling owner","uk":"Дані продаючого власника","de":"Angaben des verkaufenden Eigentümers"}},
                    {"name":"car_details","type":"textarea","required":true,"labels":{"pl":"Dane pojazdu (marka, model, VIN, nr rejestracyjny)","en":"Vehicle details (make, model, VIN, registration number)","uk":"Дані транспортного засобу (марка, модель, VIN, реєстраційний номер)","de":"Fahrzeugdaten (Marke, Modell, VIN, Kennzeichen)"}},
                    {"name":"proposed_buyer_details","type":"textarea","required":true,"labels":{"pl":"Dane proponowanego nabywcy","en":"Details of proposed buyer","uk":"Дані запропонованого покупця","de":"Angaben des vorgeschlagenen Käufers"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"pl":"Proponowana cena sprzedaży (PLN)","en":"Proposed sale price (PLN)","uk":"Запропонована ціна продажу (PLN)","de":"Vorgeschlagener Verkaufspreis (PLN)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Oświadczenie o zrzeczeniu się prawa pierwokupu',
                        'description' => 'Dokument wymagany gdy pojazd ma więcej niż jednego właściciela, a jeden z nich chce sprzedać swój udział. Współwłaściciele mają prawo pierwokupu.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O ZRZECZENIU SIĘ PRAWA PIERWOKUPU</h1><p style="font-size: 12px;">[[document_date_place]]</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.7;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #000; padding: 10px; margin: 15px 0;">
                                [[waiving_person_details]]
                            </div>

                            <p>będąc współwłaścicielem pojazdu:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 0; background: #f9f9f9;">
                                [[car_details]]
                            </div>

                            <p>niniejszym oświadczam, że:</p>

                            <ol style="margin: 20px 0; padding-left: 30px;">
                                <li>Zostałem/am poinformowany/a o zamiarze sprzedaży udziału w powyższym pojeździe przez współwłaściciela:</li>
                            </ol>

                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 30px; background: #f0f0f0;">
                                [[selling_owner_details]]
                            </div>

                            <ol start="2" style="margin: 20px 0; padding-left: 30px;">
                                <li>Proponowany nabywca to:</li>
                            </ol>

                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 30px; background: #f0f0f0;">
                                [[proposed_buyer_details]]
                            </div>

                            <ol start="3" style="margin: 20px 0; padding-left: 30px;">
                                <li>Proponowana cena sprzedaży wynosi: <strong>[[sale_price]] PLN</strong></li>
                                <li><strong>ZRZEKAM SIĘ PRAWA PIERWOKUPU</strong> przysługującego mi na podstawie przepisów Kodeksu Cywilnego</li>
                                <li>Wyrażam zgodę na sprzedaż udziału w pojeździe na rzecz wyżej wskazanego nabywcy</li>
                                <li>Niniejsze oświadczenie składam dobrowolnie, przy pełnej świadomości skutków prawnych</li>
                            </ol>

                            <div style="background: #fffacd; border: 1px solid #ddd; padding: 10px; margin: 20px 0;">
                                <p style="font-size: 11px;"><strong>UWAGA PRAWNA:</strong> Prawo pierwokupu przysługuje współwłaścicielowi w terminie 14 dni od zawiadomienia o zamiarze sprzedaży. Zrzeczenie się tego prawa musi być wyrażone w formie pisemnej.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; text-align: right;">
                            <p>........................................<br><strong>(Podpis zrzekającego się prawa pierwokupu)</strong></p>
                        </div>'
                    ],
                    'en' => [
                        'title' => 'Declaration of Waiver of Right of First Refusal',
                        'description' => 'Document required when a vehicle has more than one owner and one of them wants to sell their share. Co-owners have the right of first refusal.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O ZRZECZENIU SIĘ PRAWA PIERWOKUPU</h1><p style="font-size: 12px;">[[document_date_place]]</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.7;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #000; padding: 10px; margin: 15px 0;">
                                [[waiving_person_details]]
                            </div>

                            <p>będąc współwłaścicielem pojazdu:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 0; background: #f9f9f9;">
                                [[car_details]]
                            </div>

                            <p>niniejszym oświadczam, że:</p>

                            <ol style="margin: 20px 0; padding-left: 30px;">
                                <li>Zostałem/am poinformowany/a o zamiarze sprzedaży udziału w powyższym pojeździe przez współwłaściciela:</li>
                            </ol>

                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 30px; background: #f0f0f0;">
                                [[selling_owner_details]]
                            </div>

                            <ol start="2" style="margin: 20px 0; padding-left: 30px;">
                                <li>Proponowany nabywca to:</li>
                            </ol>

                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 30px; background: #f0f0f0;">
                                [[proposed_buyer_details]]
                            </div>

                            <ol start="3" style="margin: 20px 0; padding-left: 30px;">
                                <li>Proponowana cena sprzedaży wynosi: <strong>[[sale_price]] PLN</strong></li>
                                <li><strong>ZRZEKAM SIĘ PRAWA PIERWOKUPU</strong> przysługującego mi na podstawie przepisów Kodeksu Cywilnego</li>
                                <li>Wyrażam zgodę na sprzedaż udziału w pojeździe na rzecz wyżej wskazanego nabywcy</li>
                                <li>Niniejsze oświadczenie składam dobrowolnie, przy pełnej świadomości skutków prawnych</li>
                            </ol>

                            <div style="background: #fffacd; border: 1px solid #ddd; padding: 10px; margin: 20px 0;">
                                <p style="font-size: 11px;"><strong>UWAGA PRAWNA:</strong> Prawo pierwokupu przysługuje współwłaścicielowi w terminie 14 dni od zawiadomienia o zamiarze sprzedaży. Zrzeczenie się tego prawa musi być wyrażone w formie pisemnej.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; text-align: right;">
                            <p>........................................<br><strong>(Podpis zrzekającego się prawa pierwokupu)</strong></p>
                        </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про відмову від права переважної покупки',
                        'description' => 'Документ, необхідний коли транспортний засіб має більше одного власника, а один з них хоче продати свою частку. Співвласники мають право переважної покупки.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O ZRZECZENIU SIĘ PRAWA PIERWOKUPU</h1><p style="font-size: 12px;">[[document_date_place]]</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.7;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #000; padding: 10px; margin: 15px 0;">
                                [[waiving_person_details]]
                            </div>

                            <p>będąc współwłaścicielem pojazdu:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 0; background: #f9f9f9;">
                                [[car_details]]
                            </div>

                            <p>niniejszym oświadczam, że:</p>

                            <ol style="margin: 20px 0; padding-left: 30px;">
                                <li>Zostałem/am poinformowany/a o zamiarze sprzedaży udziału w powyższym pojeździe przez współwłaściciela:</li>
                            </ol>

                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 30px; background: #f0f0f0;">
                                [[selling_owner_details]]
                            </div>

                            <ol start="2" style="margin: 20px 0; padding-left: 30px;">
                                <li>Proponowany nabywca to:</li>
                            </ol>

                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 30px; background: #f0f0f0;">
                                [[proposed_buyer_details]]
                            </div>

                            <ol start="3" style="margin: 20px 0; padding-left: 30px;">
                                <li>Proponowana cena sprzedaży wynosi: <strong>[[sale_price]] PLN</strong></li>
                                <li><strong>ZRZEKAM SIĘ PRAWA PIERWOKUPU</strong> przysługującego mi na podstawie przepisów Kodeksu Cywilnego</li>
                                <li>Wyrażam zgodę na sprzedaż udziału w pojeździe na rzecz wyżej wskazanego nabywcy</li>
                                <li>Niniejsze oświadczenie składam dobrowolnie, przy pełnej świadomości skutków prawnych</li>
                            </ol>

                            <div style="background: #fffacd; border: 1px solid #ddd; padding: 10px; margin: 20px 0;">
                                <p style="font-size: 11px;"><strong>UWAGA PRAWNA:</strong> Prawo pierwokupu przysługuje współwłaścicielowi w terminie 14 dni od zawiadomienia o zamiarze sprzedaży. Zrzeczenie się tego prawa musi być wyrażone w formie pisemnej.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; text-align: right;">
                            <p>........................................<br><strong>(Podpis zrzekającego się prawa pierwokupu)</strong></p>
                        </div>'
                    ],
                    'de' => [
                        'title' => 'Erklärung über den Verzicht auf das Vorkaufsrecht',
                        'description' => 'Dokument, das erforderlich ist, wenn ein Fahrzeug mehr als einen Eigentümer hat und einer von ihnen seinen Anteil verkaufen möchte. Miteigentümer haben ein Vorkaufsrecht.',
                        'header_html' => '<div style="text-align:center; margin-bottom: 30px;"><h1 style="font-size: 16px; font-weight: bold;">OŚWIADCZENIE O ZRZECZENIU SIĘ PRAWA PIERWOKUPU</h1><p style="font-size: 12px;">[[document_date_place]]</p></div>',
                        'body_html' => '
                        <div style="font-size: 12px; line-height: 1.7;">
                            <p>Ja, niżej podpisany/a:</p>
                            <div style="border: 1px solid #000; padding: 10px; margin: 15px 0;">
                                [[waiving_person_details]]
                            </div>

                            <p>będąc współwłaścicielem pojazdu:</p>
                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 0; background: #f9f9f9;">
                                [[car_details]]
                            </div>

                            <p>niniejszym oświadczam, że:</p>

                            <ol style="margin: 20px 0; padding-left: 30px;">
                                <li>Zostałem/am poinformowany/a o zamiarze sprzedaży udziału w powyższym pojeździe przez współwłaściciela:</li>
                            </ol>

                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 30px; background: #f0f0f0;">
                                [[selling_owner_details]]
                            </div>

                            <ol start="2" style="margin: 20px 0; padding-left: 30px;">
                                <li>Proponowany nabywca to:</li>
                            </ol>

                            <div style="border: 1px solid #ccc; padding: 10px; margin: 15px 30px; background: #f0f0f0;">
                                [[proposed_buyer_details]]
                            </div>

                            <ol start="3" style="margin: 20px 0; padding-left: 30px;">
                                <li>Proponowana cena sprzedaży wynosi: <strong>[[sale_price]] PLN</strong></li>
                                <li><strong>ZRZEKAM SIĘ PRAWA PIERWOKUPU</strong> przysługującego mi na podstawie przepisów Kodeksu Cywilnego</li>
                                <li>Wyrażam zgodę na sprzedaż udziału w pojeździe na rzecz wyżej wskazanego nabywcy</li>
                                <li>Niniejsze oświadczenie składam dobrowolnie, przy pełnej świadomości skutków prawnych</li>
                            </ol>

                            <div style="background: #fffacd; border: 1px solid #ddd; padding: 10px; margin: 20px 0;">
                                <p style="font-size: 11px;"><strong>UWAGA PRAWNA:</strong> Prawo pierwokupu przysługuje współwłaścicielowi w terminie 14 dni od zawiadomienia o zamiarze sprzedaży. Zrzeczenie się tego prawa musi być wyrażone w formie pisemnej.</p>
                            </div>
                        </div>',
                        'footer_html' => '
                        <div style="margin-top: 60px; font-size: 12px; text-align: right;">
                            <p>........................................<br><strong>(Podpis zrzekającego się prawa pierwokupu)</strong></p>
                        </div>'
                    ]
                ]
            ]
        ];

        foreach ($templatesData as $templateData) {
            $this->createTemplate($templateData['category_id'], $templateData);
        }
    }

    private function createTemplate(int $categoryId, array $data): void
    {
        $template = Template::updateOrCreate(
            ['slug' => $data['slug']],
            [
                'category_id' => $categoryId,
                'is_active' => $data['is_active'] ?? true,
                'access_level' => $data['access_level'] ?? 'free',
                'country_code' => 'PL',
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
