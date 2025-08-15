<?php

namespace Database\Seeders\UA;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Support\Arr;

class UaRealEstateSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'housing-issues-ua')->first();
        if (!$category) {
            $this->command->error('Category with slug "housing-issues" not found.');
            return;
        }

        $templatesData = [
            // --- 1. Договор аренды квартиры (долгосрочный) ---
            [
                'slug' => 'long-term-apartment-lease-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендодавця","en":"Landlord\'s Passport Details", "pl":"Dane paszportowe wynajmującego", "de":"Passdaten des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендодавця","en":"Landlord\'s residence address", "pl":"Adres zamieszkania wynajmującego", "de":"Wohnadresse des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендаря","en":"Tenant\'s Passport Details", "pl":"Dane paszportowe najemcy", "de":"Passdaten des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендаря","en":"Tenant\'s residence address", "pl":"Adres zamieszkania najemcy", "de":"Wohnadresse des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири","en":"Apartment Address", "pl":"Adres mieszkania", "de":"Wohnungsadresse"}},
                    {"name":"apartment_area","type":"number","required":true,"labels":{"uk":"Площа квартири (кв.м)","en":"Apartment Area (sq.m)", "pl":"Powierzchnia mieszkania (mkw.)", "de":"Wohnfläche (qm)"}},
                    {"name":"lease_term_months","type":"number","required":true,"labels":{"uk":"Термін оренди (місяців)","en":"Lease Term (months)", "pl":"Okres najmu (miesięcy)", "de":"Mietdauer (Monate)"}},
                    {"name":"rental_amount","type":"number","required":true,"labels":{"uk":"Сума орендної плати (грн/міс)","en":"Rental Amount (UAH/month)", "pl":"Kwota czynszu (UAH/miesiąc)", "de":"Mietbetrag (UAH/Monat)"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"uk":"День сплати (число місяця)","en":"Payment Due Day (day of month)", "pl":"Dzień płatności (dzień miesiąca)", "de":"Zahlungstermin (Tag des Monats)"}},
                    {"name":"security_deposit","type":"number","required":true,"labels":{"uk":"Розмір застави (грн)","en":"Security Deposit (UAH)", "pl":"Wysokość kaucji (UAH)", "de":"Kaution (UAH)"}},
                    {"name":"utilities_payment","type":"textarea","required":true,"labels":{"uk":"Порядок оплати комунальних послуг","en":"Utilities Payment Procedure", "pl":"Zasady opłacania mediów", "de":"Verfahren zur Zahlung von Nebenkosten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір оренди квартири (довгостроковий)',
                        'description' => 'Договір про довгострокову оренду житлового приміщення.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[landlord_name]]</strong>, паспорт: [[landlord_passport]], проживаю за адресою: [[landlord_address]], надалі "Орендодавець", з одного боку, та
                                <strong>[[tenant_name]]</strong>, паспорт: [[tenant_passport]], проживаю за адресою: [[tenant_address]], надалі "Орендар", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Орендодавець передає, а Орендар приймає в оренду квартиру за адресою: <strong>[[apartment_address]]</strong>, загальною площею [[apartment_area]] кв.м.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ТЕРМІН ОРЕНДИ</h2>
                                <p>2.1. Термін оренди становить <strong>[[lease_term_months]]</strong> місяців з дати підписання цього Договору.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ОРЕНДНА ПЛАТА ТА ПОРЯДОК РОЗРАХУНКІВ</h2>
                                <p>3.1. Орендна плата становить <strong>[[rental_amount]]</strong> грн на місяць. Сплата здійснюється до [[payment_due_day]] числа кожного місяця.</p>
                                <p>3.2. Розмір застави становить <strong>[[security_deposit]]</strong> грн.</p>
                                <p>3.3. Комунальні послуги оплачуються: [[utilities_payment]].</p>
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
                        'title' => 'Long-Term Apartment Lease Agreement',
                        'description' => 'Agreement for long-term lease of a residential property.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[landlord_name]]</strong>, passport: [[landlord_passport]], residing at: [[landlord_address]], hereinafter "Landlord", on the one hand, and
                                <strong>[[tenant_name]]</strong>, passport: [[tenant_passport]], residing at: [[tenant_address]], hereinafter "Tenant", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Landlord transfers, and the Tenant accepts for lease the apartment located at: <strong>[[apartment_address]]</strong>, with a total area of [[apartment_area]] sq.m.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. LEASE TERM</h2>
                                <p>2.1. The lease term is <strong>[[lease_term_months]]</strong> months from the date of signing this Agreement.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. RENTAL FEE AND PAYMENT PROCEDURE</h2>
                                <p>3.1. The rental fee is <strong>[[rental_amount]]</strong> UAH per month. Payment is due by the [[payment_due_day]]th day of each month.</p>
                                <p>3.2. The security deposit is <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Utility payments are made: [[utilities_payment]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LANDLORD:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>TENANT:</strong></p>
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
                        'title' => 'Umowa najmu mieszkania (długoterminowa)',
                        'description' => 'Umowa o długoterminowy najem lokalu mieszkalnego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU MIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[landlord_name]]</strong>, paszport: [[landlord_passport]], zamieszkały(a) pod adresem: [[landlord_address]], zwany(a) dalej "Wynajmującym", z jednej strony, oraz
                                <strong>[[tenant_name]]</strong>, paszport: [[tenant_passport]], zamieszkały(a) pod adresem: [[tenant_address]], zwany(a) dalej "Najemcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Wynajmujący przekazuje, a Najemca przyjmuje w najem mieszkanie położone pod adresem: <strong>[[apartment_address]]</strong>, o łącznej powierzchni [[apartment_area]] mkw.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. OKRES NAJMU</h2>
                                <p>2.1. Okres najmu wynosi <strong>[[lease_term_months]]</strong> miesięcy od daty podpisania niniejszej Umowy.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. CZYNSZ I ZASADY ROZLICZEŃ</h2>
                                <p>3.1. Czynsz wynosi <strong>[[rental_amount]]</strong> UAH miesięcznie. Płatność odbywa się do [[payment_due_day]]. dnia każdego miesiąca.</p>
                                <p>3.2. Wysokość kaucji wynosi <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Opłaty za media są regulowane: [[utilities_payment]].</p>
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
                        'title' => 'Langfristiger Mietvertrag für eine Wohnung',
                        'description' => 'Vertrag über die langfristige Miete einer Wohneinheit.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHNUNGSMIETVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[landlord_name]]</strong>, Reisepass: [[landlord_passport]], wohnhaft unter der Adresse: [[landlord_address]], nachfolgend "Vermieter" genannt, einerseits, und
                                <strong>[[tenant_name]]</strong>, Reisepass: [[tenant_passport]], wohnhaft unter der Adresse: [[tenant_address]], nachfolgend "Mieter" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Vermieter überlässt, und der Mieter übernimmt zur Miete die Wohnung unter der Adresse: <strong>[[apartment_address]]</strong>, mit einer Gesamtfläche von [[apartment_area]] qm.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. MIETDAUER</h2>
                                <p>2.1. Die Mietdauer beträgt <strong>[[lease_term_months]]</strong> Monate ab dem Datum der Unterzeichnung dieses Vertrags.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. MIETZINS UND ZAHLUNGSWEISE</h2>
                                <p>3.1. Der Mietzins beträgt <strong>[[rental_amount]]</strong> UAH pro Monat. Die Zahlung ist bis zum [[payment_due_day]]. Tag jedes Monats fällig.</p>
                                <p>3.2. Die Kaution beträgt <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Nebenkosten werden bezahlt: [[utilities_payment]].</p>
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

            // --- 2. Договор посуточной аренды квартиры ---
            [
                'slug' => 'daily-apartment-lease-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендодавця","en":"Landlord\'s Passport Details", "pl":"Dane paszportowe wynajmującego", "de":"Passdaten des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендодавця","en":"Landlord\'s residence address", "pl":"Adres zamieszkania wynajmującego", "de":"Wohnadresse des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендаря","en":"Tenant\'s Passport Details", "pl":"Dane paszportowe najemcy", "de":"Passdaten des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендаря","en":"Tenant\'s residence address", "pl":"Adres zamieszkania najemcy", "de":"Wohnadresse des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири","en":"Apartment Address", "pl":"Adres mieszkania", "de":"Wohnungsadresse"}},
                    {"name":"check_in_date","type":"date","required":true,"labels":{"uk":"Дата заїзду","en":"Check-in Date", "pl":"Data zameldowania", "de":"Check-in-Datum"}},
                    {"name":"check_out_date","type":"date","required":true,"labels":{"uk":"Дата виїзду","en":"Check-out Date", "pl":"Data wymeldowania", "de":"Check-out-Datum"}},
                    {"name":"rental_amount_per_day","type":"number","required":true,"labels":{"uk":"Сума орендної плати за добу (грн)","en":"Rental Amount per Day (UAH)", "pl":"Kwota czynszu za dobę (UAH)", "de":"Mietbetrag pro Tag (UAH)"}},
                    {"name":"total_rental_amount","type":"number","required":true,"labels":{"uk":"Загальна сума орендної плати (грн)","en":"Total Rental Amount (UAH)", "pl":"Całkowita kwota czynszu (UAH)", "de":"Gesamtmietbetrag (UAH)"}},
                    {"name":"security_deposit","type":"number","required":false,"labels":{"uk":"Розмір застави (грн, якщо є)","en":"Security Deposit (UAH, if any)", "pl":"Wysokość kaucji (UAH, jeśli dotyczy)", "de":"Kaution (UAH, falls zutreffend)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір посуточної оренди квартири',
                        'description' => 'Договір про короткострокову оренду житлового приміщення (посуточно).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ПОСУТОЧНОЇ ОРЕНДИ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[landlord_name]]</strong>, паспорт: [[landlord_passport]], проживаю за адресою: [[landlord_address]], надалі "Орендодавець", з одного боку, та
                                <strong>[[tenant_name]]</strong>, паспорт: [[tenant_passport]], проживаю за адресою: [[tenant_address]], надалі "Орендар", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Орендодавець передає, а Орендар приймає в оренду квартиру за адресою: <strong>[[apartment_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ТЕРМІН ОРЕНДИ</h2>
                                <p>2.1. Термін оренди: з <strong>[[check_in_date]]</strong> по <strong>[[check_out_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ОРЕНДНА ПЛАТА ТА ПОРЯДОК РОЗРАХУНКІВ</h2>
                                <p>3.1. Орендна плата становить <strong>[[rental_amount_per_day]]</strong> грн за добу. Загальна сума: <strong>[[total_rental_amount]]</strong> грн.</p>
                                [[security_deposit]]<p>3.2. Розмір застави: <strong>[[security_deposit]]</strong> грн.</p>[[/security_deposit]]
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
                        'title' => 'Daily Apartment Lease Agreement',
                        'description' => 'Agreement for short-term lease of a residential property (daily).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DAILY APARTMENT LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[landlord_name]]</strong>, passport: [[landlord_passport]], residing at: [[landlord_address]], hereinafter "Landlord", on the one hand, and
                                <strong>[[tenant_name]]</strong>, passport: [[tenant_passport]], residing at: [[tenant_address]], hereinafter "Tenant", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Landlord transfers, and the Tenant accepts for lease the apartment located at: <strong>[[apartment_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. LEASE TERM</h2>
                                <p>2.1. Lease term: from <strong>[[check_in_date]]</strong> to <strong>[[check_out_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. RENTAL FEE AND PAYMENT PROCEDURE</h2>
                                <p>3.1. The rental fee is <strong>[[rental_amount_per_day]]</strong> UAH per day. Total amount: <strong>[[total_rental_amount]]</strong> UAH.</p>
                                [[security_deposit]]<p>3.2. Security deposit: <strong>[[security_deposit]]</strong> UAH.</p>[[/security_deposit]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LANDLORD:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>TENANT:</strong></p>
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
                        'title' => 'Umowa najmu mieszkania na doby',
                        'description' => 'Umowa o krótkoterminowy najem lokalu mieszkalnego (na doby).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU MIESZKANIA NA DOBY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[landlord_name]]</strong>, paszport: [[landlord_passport]], zamieszkały(a) pod adresem: [[landlord_address]], zwany(a) dalej "Wynajmującym", z jednej strony, oraz
                                <strong>[[tenant_name]]</strong>, paszport: [[tenant_passport]], zamieszkały(a) pod adresem: [[tenant_address]], zwany(a) dalej "Najemcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Wynajmujący przekazuje, a Najemca przyjmuje w najem mieszkanie położone pod adresem: <strong>[[apartment_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. OKRES NAJMU</h2>
                                <p>2.1. Okres najmu: od <strong>[[check_in_date]]</strong> do <strong>[[check_out_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. CZYNSZ I ZASADY ROZLICZEŃ</h2>
                                <p>3.1. Czynsz wynosi <strong>[[rental_amount_per_day]]</strong> UAH za dobę. Całkowita kwota: <strong>[[total_rental_amount]]</strong> UAH.</p>
                                [[security_deposit]]<p>3.2. Wysokość kaucji: <strong>[[security_deposit]]</strong> UAH.</p>[[/security_deposit]]
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
                        'title' => 'Täglicher Wohnungsmietvertrag',
                        'description' => 'Vertrag über die kurzfristige Miete einer Wohneinheit (täglich).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TÄGLICHER WOHNUNGSMIETVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[landlord_name]]</strong>, Reisepass: [[landlord_passport]], wohnhaft unter der Adresse: [[landlord_address]], nachfolgend "Vermieter" genannt, einerseits, und
                                <strong>[[tenant_name]]</strong>, Reisepass: [[tenant_passport]], wohnhaft unter der Adresse: [[tenant_address]], nachfolgend "Mieter" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Vermieter überlässt, und der Mieter übernimmt zur Miete die Wohnung unter der Adresse: <strong>[[apartment_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. MIETDAUER</h2>
                                <p>2.1. Mietdauer: vom <strong>[[check_in_date]]</strong> bis zum <strong>[[check_out_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. MIETZINS UND ZAHLUNGSWEISE</h2>
                                <p>3.1. Der Mietzins beträgt <strong>[[rental_amount_per_day]]</strong> UAH pro Tag. Gesamtbetrag: <strong>[[total_rental_amount]]</strong> UAH.</p>
                                [[security_deposit]]<p>3.2. Kaution: <strong>[[security_deposit]]</strong> UAH.</p>[[/security_deposit]]
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

            // --- 3. Договор аренды комнаты ---
            [
                'slug' => 'room-lease-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендодавця","en":"Landlord\'s Passport Details", "pl":"Dane paszportowe wynajmującego", "de":"Passdaten des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендодавця","en":"Landlord\'s residence address", "pl":"Adres zamieszkania wynajmującego", "de":"Wohnadresse des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендаря","en":"Tenant\'s Passport Details", "pl":"Dane paszportowe najemcy", "de":"Passdaten des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендаря","en":"Tenant\'s residence address", "pl":"Adres zamieszkania najemcy", "de":"Wohnadresse des Mieters"}},
                    {"name":"room_address","type":"text","required":true,"labels":{"uk":"Адреса квартири/будинку, де знаходиться кімната","en":"Address of apartment/house where room is located", "pl":"Adres mieszkania/domu, w którym znajduje się pokój", "de":"Adresse der Wohnung/des Hauses, in der sich das Zimmer befindet"}},
                    {"name":"room_number","type":"text","required":false,"labels":{"uk":"Номер кімнати (якщо є)","en":"Room Number (if any)", "pl":"Numer pokoju (jeśli dotyczy)", "de":"Zimmernummer (falls zutreffend)"}},
                    {"name":"lease_term_months","type":"number","required":true,"labels":{"uk":"Термін оренди (місяців)","en":"Lease Term (months)", "pl":"Okres najmu (miesięcy)", "de":"Mietdauer (Monate)"}},
                    {"name":"rental_amount","type":"number","required":true,"labels":{"uk":"Сума орендної плати (грн/міс)","en":"Rental Amount (UAH/month)", "pl":"Kwota czynszu (UAH/miesiąc)", "de":"Mietbetrag (UAH/Monat)"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"uk":"День сплати (число місяця)","en":"Payment Due Day (day of month)", "pl":"Dzień płatności (dzień miesiąca)", "de":"Zahlungstermin (Tag des Monats)"}},
                    {"name":"security_deposit","type":"number","required":true,"labels":{"uk":"Розмір застави (грн)","en":"Security Deposit (UAH)", "pl":"Wysokość kaucji (UAH)", "de":"Kaution (UAH)"}},
                    {"name":"utilities_payment","type":"textarea","required":true,"labels":{"uk":"Порядок оплати комунальних послуг","en":"Utilities Payment Procedure", "pl":"Zasady opłacania mediów", "de":"Verfahren zur Zahlung von Nebenkosten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір оренди кімнати',
                        'description' => 'Договір про оренду окремої кімнати в житловому приміщенні.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ КІМНАТИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[landlord_name]]</strong>, паспорт: [[landlord_passport]], проживаю за адресою: [[landlord_address]], надалі "Орендодавець", з одного боку, та
                                <strong>[[tenant_name]]</strong>, паспорт: [[tenant_passport]], проживаю за адресою: [[tenant_address]], надалі "Орендар", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Орендодавець передає, а Орендар приймає в оренду кімнату [[room_number]] у квартирі/будинку за адресою: <strong>[[room_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ТЕРМІН ОРЕНДИ</h2>
                                <p>2.1. Термін оренди становить <strong>[[lease_term_months]]</strong> місяців з дати підписання цього Договору.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ОРЕНДНА ПЛАТА ТА ПОРЯДОК РОЗРАХУНКІВ</h2>
                                <p>3.1. Орендна плата становить <strong>[[rental_amount]]</strong> грн на місяць. Сплата здійснюється до [[payment_due_day]] числа кожного місяця.</p>
                                <p>3.2. Розмір застави становить <strong>[[security_deposit]]</strong> грн.</p>
                                <p>3.3. Комунальні послуги оплачуються: [[utilities_payment]].</p>
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
                        'title' => 'Room Lease Agreement',
                        'description' => 'Agreement for leasing a separate room in a residential property.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ROOM LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[landlord_name]]</strong>, passport: [[landlord_passport]], residing at: [[landlord_address]], hereinafter "Landlord", on the one hand, and
                                <strong>[[tenant_name]]</strong>, passport: [[tenant_passport]], residing at: [[tenant_address]], hereinafter "Tenant", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Landlord transfers, and the Tenant accepts for lease room [[room_number]] in the apartment/house located at: <strong>[[room_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. LEASE TERM</h2>
                                <p>2.1. The lease term is <strong>[[lease_term_months]]</strong> months from the date of signing this Agreement.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. RENTAL FEE AND PAYMENT PROCEDURE</h2>
                                <p>3.1. The rental fee is <strong>[[rental_amount]]</strong> UAH per month. Payment is due by the [[payment_due_day]]th day of each month.</p>
                                <p>3.2. The security deposit is <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Utility payments are made: [[utilities_payment]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LANDLORD:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>TENANT:</strong></p>
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
                        'title' => 'Umowa najmu pokoju',
                        'description' => 'Umowa o najem oddzielnego pokoju w lokalu mieszkalnym.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU POKOJU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[landlord_name]]</strong>, paszport: [[landlord_passport]], zamieszkały(a) pod adresem: [[landlord_address]], zwany(a) dalej "Wynajmującym", z jednej strony, oraz
                                <strong>[[tenant_name]]</strong>, paszport: [[tenant_passport]], zamieszkały(a) pod adresem: [[tenant_address]], zwany(a) dalej "Najemcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Wynajmujący przekazuje, a Najemca przyjmuje w najem pokój [[room_number]] w mieszkaniu/domu położonym pod adresem: <strong>[[room_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. OKRES NAJMU</h2>
                                <p>2.1. Okres najmu wynosi <strong>[[lease_term_months]]</strong> miesięcy od daty podpisania niniejszej Umowy.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. CZYNSZ I ZASADY ROZLICZEŃ</h2>
                                <p>3.1. Czynsz wynosi <strong>[[rental_amount]]</strong> UAH miesięcznie. Płatność odbywa się do [[payment_due_day]]. dnia każdego miesiąca.</p>
                                <p>3.2. Wysokość kaucji wynosi <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Opłaty za media są regulowane: [[utilities_payment]].</p>
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
                        'title' => 'Zimmer-Mietvertrag',
                        'description' => 'Vertrag über die Miete eines separaten Zimmers in einer Wohneinheit.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZIMMER-MIETVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[landlord_name]]</strong>, Reisepass: [[landlord_passport]], wohnhaft unter der Adresse: [[landlord_address]], nachfolgend "Vermieter" genannt, einerseits, und
                                <strong>[[tenant_name]]</strong>, Reisepass: [[tenant_passport]], wohnhaft unter der Adresse: [[tenant_address]], nachfolgend "Mieter" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Vermieter überlässt, und der Mieter übernimmt zur Miete das Zimmer [[room_number]] in der Wohnung/dem Haus unter der Adresse: <strong>[[room_address]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. MIETDAUER</h2>
                                <p>2.1. Die Mietdauer beträgt <strong>[[lease_term_months]]</strong> Monate ab dem Datum der Unterzeichnung dieses Vertrags.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. MIETZINS UND ZAHLUNGSWEISE</h2>
                                <p>3.1. Der Mietzins beträgt <strong>[[rental_amount]]</strong> UAH pro Monat. Die Zahlung ist bis zum [[payment_due_day]]. Tag jedes Monats fällig.</p>
                                <p>3.2. Die Kaution beträgt <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Nebenkosten werden bezahlt: [[utilities_payment]].</p>
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

            // --- 4. Договор аренды дома ---
            [
                'slug' => 'house-lease-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендодавця","en":"Landlord\'s Passport Details", "pl":"Dane paszportowe wynajmującego", "de":"Passdaten des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендодавця","en":"Landlord\'s residence address", "pl":"Adres zamieszkania wynajmującego", "de":"Wohnadresse des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендаря","en":"Tenant\'s Passport Details", "pl":"Dane paszportowe najemcy", "de":"Passdaten des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендаря","en":"Tenant\'s residence address", "pl":"Adres zamieszkania najemcy", "de":"Wohnadresse des Mieters"}},
                    {"name":"house_address","type":"text","required":true,"labels":{"uk":"Адреса будинку","en":"House Address", "pl":"Adres domu", "de":"Hausadresse"}},
                    {"name":"house_area","type":"number","required":true,"labels":{"uk":"Площа будинку (кв.м)","en":"House Area (sq.m)", "pl":"Powierzchnia domu (mkw.)", "de":"Hausfläche (qm)"}},
                    {"name":"land_area","type":"number","required":false,"labels":{"uk":"Площа земельної ділянки (соток)","en":"Land Area (ares)", "pl":"Powierzchnia działki (ary)", "de":"Grundstücksfläche (Ar)"}},
                    {"name":"lease_term_months","type":"number","required":true,"labels":{"uk":"Термін оренди (місяців)","en":"Lease Term (months)", "pl":"Okres najmu (miesięcy)", "de":"Mietdauer (Monate)"}},
                    {"name":"rental_amount","type":"number","required":true,"labels":{"uk":"Сума орендної плати (грн/міс)","en":"Rental Amount (UAH/month)", "pl":"Kwota czynszu (UAH/miesiąc)", "de":"Mietbetrag (UAH/Monat)"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"uk":"День сплати (число місяця)","en":"Payment Due Day (day of month)", "pl":"Dzień płatności (dzień miesiąca)", "de":"Zahlungstermin (Tag des Monats)"}},
                    {"name":"security_deposit","type":"number","required":true,"labels":{"uk":"Розмір застави (грн)","en":"Security Deposit (UAH)", "pl":"Wysokość kaucji (UAH)", "de":"Kaution (UAH)"}},
                    {"name":"utilities_payment","type":"textarea","required":true,"labels":{"uk":"Порядок оплати комунальних послуг","en":"Utilities Payment Procedure", "pl":"Zasady opłacania mediów", "de":"Verfahren zur Zahlung von Nebenkosten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір оренди будинку',
                        'description' => 'Договір про оренду житлового будинку з земельною ділянкою.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ БУДИНКУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[landlord_name]]</strong>, паспорт: [[landlord_passport]], проживаю за адресою: [[landlord_address]], надалі "Орендодавець", з одного боку, та
                                <strong>[[tenant_name]]</strong>, паспорт: [[tenant_passport]], проживаю за адресою: [[tenant_address]], надалі "Орендар", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Орендодавець передає, а Орендар приймає в оренду будинок за адресою: <strong>[[house_address]]</strong>, загальною площею [[house_area]] кв.м. [[land_area]] із земельною ділянкою площею [[land_area]] соток.[[/land_area]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ТЕРМІН ОРЕНДИ</h2>
                                <p>2.1. Термін оренди становить <strong>[[lease_term_months]]</strong> місяців з дати підписання цього Договору.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ОРЕНДНА ПЛАТА ТА ПОРЯДОК РОЗРАХУНКІВ</h2>
                                <p>3.1. Орендна плата становить <strong>[[rental_amount]]</strong> грн на місяць. Сплата здійснюється до [[payment_due_day]] числа кожного місяця.</p>
                                <p>3.2. Розмір застави становить <strong>[[security_deposit]]</strong> грн.</p>
                                <p>3.3. Комунальні послуги оплачуються: [[utilities_payment]].</p>
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
                        'title' => 'House Lease Agreement',
                        'description' => 'Agreement for leasing a residential house with a land plot.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HOUSE LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[landlord_name]]</strong>, passport: [[landlord_passport]], residing at: [[landlord_address]], hereinafter "Landlord", on the one hand, and
                                <strong>[[tenant_name]]</strong>, passport: [[tenant_passport]], residing at: [[tenant_address]], hereinafter "Tenant", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Landlord transfers, and the Tenant accepts for lease the house located at: <strong>[[house_address]]</strong>, with a total area of [[house_area]] sq.m. [[land_area]] with a land plot of [[land_area]] ares.[[/land_area]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. LEASE TERM</h2>
                                <p>2.1. The lease term is <strong>[[lease_term_months]]</strong> months from the date of signing this Agreement.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. RENTAL FEE AND PAYMENT PROCEDURE</h2>
                                <p>3.1. The rental fee is <strong>[[rental_amount]]</strong> UAH per month. Payment is due by the [[payment_due_day]]th day of each month.</p>
                                <p>3.2. The security deposit is <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Utility payments are made: [[utilities_payment]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LANDLORD:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>TENANT:</strong></p>
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
                        'title' => 'Umowa najmu domu',
                        'description' => 'Umowa o najem domu mieszkalnego z działką gruntową.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU DOMU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[landlord_name]]</strong>, paszport: [[landlord_passport]], zamieszkały(a) pod adresem: [[landlord_address]], zwany(a) dalej "Wynajmującym", z jednej strony, oraz
                                <strong>[[tenant_name]]</strong>, paszport: [[tenant_passport]], zamieszkały(a) pod adresem: [[tenant_address]], zwany(a) dalej "Najemcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Wynajmujący przekazuje, a Najemca przyjmuje w najem dom położony pod adresem: <strong>[[house_address]]</strong>, o łącznej powierzchni [[house_area]] mkw. [[land_area]] wraz z działką o powierzchni [[land_area]] arów.[[/land_area]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. OKRES NAJMU</h2>
                                <p>2.1. Okres najmu wynosi <strong>[[lease_term_months]]</strong> miesięcy od daty podpisania niniejszej Umowy.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. CZYNSZ I ZASADY ROZLICZEŃ</h2>
                                <p>3.1. Czynsz wynosi <strong>[[rental_amount]]</strong> UAH miesięcznie. Płatność odbywa się do [[payment_due_day]]. dnia każdego miesiąca.</p>
                                <p>3.2. Wysokość kaucji wynosi <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Opłaty za media są regulowane: [[utilities_payment]].</p>
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
                        'title' => 'Hausmietvertrag',
                        'description' => 'Vertrag über die Miete eines Wohnhauses mit Grundstück.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HAUSMIETVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[landlord_name]]</strong>, Reisepass: [[landlord_passport]], wohnhaft unter der Adresse: [[landlord_address]], nachfolgend "Vermieter" genannt, einerseits, und
                                <strong>[[tenant_name]]</strong>, Reisepass: [[tenant_passport]], wohnhaft unter der Adresse: [[tenant_address]], nachfolgend "Mieter" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Vermieter überlässt, und der Mieter übernimmt zur Miete das Haus unter der Adresse: <strong>[[house_address]]</strong>, mit einer Gesamtfläche von [[house_area]] qm. [[land_area]] mit einem Grundstück von [[land_area]] Ar.[[/land_area]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. MIETDAUER</h2>
                                <p>2.1. Die Mietdauer beträgt <strong>[[lease_term_months]]</strong> Monate ab dem Datum der Unterzeichnung dieses Vertrags.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. MIETZINS UND ZAHLUNGSWEISE</h2>
                                <p>3.1. Der Mietzins beträgt <strong>[[rental_amount]]</strong> UAH pro Monat. Die Zahlung ist bis zum [[payment_due_day]]. Tag jedes Monats fällig.</p>
                                <p>3.2. Die Kaution beträgt <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Nebenkosten werden bezahlt: [[utilities_payment]].</p>
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

            // --- 5. Договор аренды коммерческого помещения (офис) ---
            [
                'slug' => 'commercial-premises-lease-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"Назва орендодавця (ЮО)","en":"Landlord Name (Legal Entity)", "pl":"Nazwa wynajmującego (Osoba prawna)", "de":"Name des Vermieters (Juristische Person)"}},
                    {"name":"landlord_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника орендодавця","en":"Landlord Director Full Name", "pl":"Imię i nazwisko dyrektora wynajmującego", "de":"Vollständiger Name des Vermieter-Direktors"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"Назва орендаря (ЮО)","en":"Tenant Name (Legal Entity)", "pl":"Nazwa najemcy (Osoba prawna)", "de":"Name des Mieters (Juristische Person)"}},
                    {"name":"tenant_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника орендаря","en":"Tenant Director Full Name", "pl":"Imię i nazwisko dyrektora najemcy", "de":"Vollständiger Name des Mieter-Direktors"}},
                    {"name":"premises_address","type":"text","required":true,"labels":{"uk":"Адреса приміщення","en":"Premises Address", "pl":"Adres lokalu", "de":"Adresse des Objekts"}},
                    {"name":"premises_area","type":"number","required":true,"labels":{"uk":"Площа приміщення (кв.м)","en":"Premises Area (sq.m)", "pl":"Powierzchnia lokalu (mkw.)", "de":"Fläche des Objekts (qm)"}},
                    {"name":"lease_term_months","type":"number","required":true,"labels":{"uk":"Термін оренди (місяців)","en":"Lease Term (months)", "pl":"Okres najmu (miesięcy)", "de":"Mietdauer (Monate)"}},
                    {"name":"rental_amount","type":"number","required":true,"labels":{"uk":"Сума орендної плати (грн/міс)","en":"Rental Amount (UAH/month)", "pl":"Kwota czynszu (UAH/miesiąc)", "de":"Mietbetrag (UAH/Monat)"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"uk":"День сплати (число місяця)","en":"Payment Due Day (day of month)", "pl":"Dzień płatności (dzień miesiąca)", "de":"Zahlungstermin (Tag des Monats)"}},
                    {"name":"security_deposit","type":"number","required":true,"labels":{"uk":"Розмір застави (грн)","en":"Security Deposit (UAH)", "pl":"Wysokość kaucji (UAH)", "de":"Kaution (UAH)"}},
                    {"name":"utilities_payment","type":"textarea","required":true,"labels":{"uk":"Порядок оплати комунальних послуг","en":"Utilities Payment Procedure", "pl":"Zasady opłacania mediów", "de":"Verfahren zur Zahlung von Nebenkosten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір оренди комерційного приміщення (офіс)',
                        'description' => 'Договір про оренду нежитлового приміщення для комерційних цілей (офіс).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ КОМЕРЦІЙНОГО ПРИМІЩЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[landlord_name]]</strong>, в особі керівника [[landlord_director]], надалі "Орендодавець", з одного боку, та
                                <strong>[[tenant_name]]</strong>, в особі керівника [[tenant_director]], надалі "Орендар", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Орендодавець передає, а Орендар приймає в оренду комерційне приміщення за адресою: <strong>[[premises_address]]</strong>, загальною площею [[premises_area]] кв.м.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ТЕРМІН ОРЕНДИ</h2>
                                <p>2.1. Термін оренди становить <strong>[[lease_term_months]]</strong> місяців з дати підписання цього Договору.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ОРЕНДНА ПЛАТА ТА ПОРЯДОК РОЗРАХУНКІВ</h2>
                                <p>3.1. Орендна плата становить <strong>[[rental_amount]]</strong> грн на місяць. Сплата здійснюється до [[payment_due_day]] числа кожного місяця.</p>
                                <p>3.2. Розмір застави становить <strong>[[security_deposit]]</strong> грн.</p>
                                <p>3.3. Комунальні послуги оплачуються: [[utilities_payment]].</p>
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
                                            <p>([[landlord_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ОРЕНДАР:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Commercial Premises Lease Agreement (Office)',
                        'description' => 'Agreement for leasing non-residential premises for commercial purposes (office).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">COMMERCIAL PREMISES LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[landlord_name]]</strong>, represented by its head [[landlord_director]], hereinafter "Landlord", on the one hand, and
                                <strong>[[tenant_name]]</strong>, represented by its head [[tenant_director]], hereinafter "Tenant", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Landlord transfers, and the Tenant accepts for lease commercial premises located at: <strong>[[premises_address]]</strong>, with a total area of [[premises_area]] sq.m.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. LEASE TERM</h2>
                                <p>2.1. The lease term is <strong>[[lease_term_months]]</strong> months from the date of signing this Agreement.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. RENTAL FEE AND PAYMENT PROCEDURE</h2>
                                <p>3.1. The rental fee is <strong>[[rental_amount]]</strong> UAH per month. Payment is due by the [[payment_due_day]]th day of each month.</p>
                                <p>3.2. The security deposit is <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Utility payments are made: [[utilities_payment]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LANDLORD:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>TENANT:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu lokalu użytkowego (biuro)',
                        'description' => 'Umowa o najem lokalu niemieszkalnego w celach komercyjnych (biuro).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU LOKALU UŻYTKOWEGO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[landlord_name]]</strong>, reprezentowany przez kierownika [[landlord_director]], zwany(a) dalej "Wynajmującym", z jednej strony, oraz
                                <strong>[[tenant_name]]</strong>, reprezentowany przez kierownika [[tenant_director]], zwany(a) dalej "Najemcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Wynajmujący przekazuje, a Najemca przyjmuje w najem lokal użytkowy położony pod adresem: <strong>[[premises_address]]</strong>, o łącznej powierzchni [[premises_area]] mkw.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. OKRES NAJMU</h2>
                                <p>2.1. Okres najmu wynosi <strong>[[lease_term_months]]</strong> miesięcy od daty podpisania niniejszej Umowy.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. CZYNSZ I ZASADY ROZLICZEŃ</h2>
                                <p>3.1. Czynsz wynosi <strong>[[rental_amount]]</strong> UAH miesięcznie. Płatność odbywa się do [[payment_due_day]]. dnia każdego miesiąca.</p>
                                <p>3.2. Wysokość kaucji wynosi <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Opłaty za media są regulowane: [[utilities_payment]].</p>
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
                                            <p>([[landlord_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>NAJEMCA:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Mietvertrag für Gewerberäume (Büro)',
                        'description' => 'Vertrag über die Miete von Nichtwohnräumen für gewerbliche Zwecke (Büro).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MIETVERTRAG FÜR GEWERBERÄUME</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[landlord_name]]</strong>, vertreten durch den Leiter [[landlord_director]], nachfolgend "Vermieter" genannt, einerseits, und
                                <strong>[[tenant_name]]</strong>, vertreten durch den Leiter [[tenant_director]], nachfolgend "Mieter" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Vermieter überlässt, und der Mieter übernimmt zur Miete Gewerberäume unter der Adresse: <strong>[[premises_address]]</strong>, mit einer Gesamtfläche von [[premises_area]] qm.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. MIETDAUER</h2>
                                <p>2.1. Die Mietdauer beträgt <strong>[[lease_term_months]]</strong> Monate ab dem Datum der Unterzeichnung dieses Vertrags.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. MIETZINS UND ZAHLUNGSWEISE</h2>
                                <p>3.1. Der Mietzins beträgt <strong>[[rental_amount]]</strong> UAH pro Monat. Die Zahlung ist bis zum [[payment_due_day]]. Tag jedes Monats fällig.</p>
                                <p>3.2. Die Kaution beträgt <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Nebenkosten werden bezahlt: [[utilities_payment]].</p>
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
                                            <p>([[landlord_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>MIETER:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 6. Договор аренды склада ---
            [
                'slug' => 'warehouse-lease-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"Назва орендодавця (ЮО)","en":"Landlord Name (Legal Entity)", "pl":"Nazwa wynajmującego (Osoba prawna)", "de":"Name des Vermieters (Juristische Person)"}},
                    {"name":"landlord_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника орендодавця","en":"Landlord Director Full Name", "pl":"Imię i nazwisko dyrektora wynajmującego", "de":"Vollständiger Name des Vermieter-Direktors"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"Назва орендаря (ЮО)","en":"Tenant Name (Legal Entity)", "pl":"Nazwa najemcy (Osoba prawna)", "de":"Name des Mieters (Juristische Person)"}},
                    {"name":"tenant_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника орендаря","en":"Tenant Director Full Name", "pl":"Imię i nazwisko dyrektora najemcy", "de":"Vollständiger Name des Mieter-Direktors"}},
                    {"name":"warehouse_address","type":"text","required":true,"labels":{"uk":"Адреса складу","en":"Warehouse Address", "pl":"Adres magazynu", "de":"Lageradresse"}},
                    {"name":"warehouse_area","type":"number","required":true,"labels":{"uk":"Площа складу (кв.м)","en":"Warehouse Area (sq.m)", "pl":"Powierzchnia magazynu (mkw.)", "de":"Lagerfläche (qm)"}},
                    {"name":"lease_term_months","type":"number","required":true,"labels":{"uk":"Термін оренди (місяців)","en":"Lease Term (months)", "pl":"Okres najmu (miesięcy)", "de":"Mietdauer (Monate)"}},
                    {"name":"rental_amount","type":"number","required":true,"labels":{"uk":"Сума орендної плати (грн/міс)","en":"Rental Amount (UAH/month)", "pl":"Kwota czynszu (UAH/miesiąc)", "de":"Mietbetrag (UAH/Monat)"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"uk":"День сплати (число місяця)","en":"Payment Due Day (day of month)", "pl":"Dzień płatności (dzień miesiąca)", "de":"Zahlungstermin (Tag des Monats)"}},
                    {"name":"security_deposit","type":"number","required":true,"labels":{"uk":"Розмір застави (грн)","en":"Security Deposit (UAH)", "pl":"Wysokość kaucji (UAH)", "de":"Kaution (UAH)"}},
                    {"name":"utilities_payment","type":"textarea","required":true,"labels":{"uk":"Порядок оплати комунальних послуг","en":"Utilities Payment Procedure", "pl":"Zasady opłacania mediów", "de":"Verfahren zur Zahlung von Nebenkosten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір оренди складу',
                        'description' => 'Договір про оренду складського приміщення.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ СКЛАДУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[landlord_name]]</strong>, в особі керівника [[landlord_director]], надалі "Орендодавець", з одного боку, та
                                <strong>[[tenant_name]]</strong>, в особі керівника [[tenant_director]], надалі "Орендар", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Орендодавець передає, а Орендар приймає в оренду складське приміщення за адресою: <strong>[[warehouse_address]]</strong>, загальною площею [[warehouse_area]] кв.м.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ТЕРМІН ОРЕНДИ</h2>
                                <p>2.1. Термін оренди становить <strong>[[lease_term_months]]</strong> місяців з дати підписання цього Договору.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ОРЕНДНА ПЛАТА ТА ПОРЯДОК РОЗРАХУНКІВ</h2>
                                <p>3.1. Орендна плата становить <strong>[[rental_amount]]</strong> грн на місяць. Сплата здійснюється до [[payment_due_day]] числа кожного місяця.</p>
                                <p>3.2. Розмір застави становить <strong>[[security_deposit]]</strong> грн.</p>
                                <p>3.3. Комунальні послуги оплачуються: [[utilities_payment]].</p>
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
                                            <p>([[landlord_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ОРЕНДАР:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Warehouse Lease Agreement',
                        'description' => 'Agreement for leasing a warehouse premises.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WAREHOUSE LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[landlord_name]]</strong>, represented by its head [[landlord_director]], hereinafter "Landlord", on the one hand, and
                                <strong>[[tenant_name]]</strong>, represented by its head [[tenant_director]], hereinafter "Tenant", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Landlord transfers, and the Tenant accepts for lease warehouse premises located at: <strong>[[warehouse_address]]</strong>, with a total area of [[warehouse_area]] sq.m.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. LEASE TERM</h2>
                                <p>2.1. The lease term is <strong>[[lease_term_months]]</strong> months from the date of signing this Agreement.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. RENTAL FEE AND PAYMENT PROCEDURE</h2>
                                <p>3.1. The rental fee is <strong>[[rental_amount]]</strong> UAH per month. Payment is due by the [[payment_due_day]]th day of each month.</p>
                                <p>3.2. The security deposit is <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Utility payments are made: [[utilities_payment]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LANDLORD:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>TENANT:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa najmu magazynu',
                        'description' => 'Umowa o najem pomieszczenia magazynowego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU MAGAZYNU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[landlord_name]]</strong>, reprezentowany przez kierownika [[landlord_director]], zwany(a) dalej "Wynajmującym", z jednej strony, oraz
                                <strong>[[tenant_name]]</strong>, reprezentowany przez kierownika [[tenant_director]], zwany(a) dalej "Najemcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Wynajmujący przekazuje, a Najemca przyjmuje w najem pomieszczenie magazynowe położone pod adresem: <strong>[[warehouse_address]]</strong>, o łącznej powierzchni [[warehouse_area]] mkw.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. OKRES NAJMU</h2>
                                <p>2.1. Okres najmu wynosi <strong>[[lease_term_months]]</strong> miesięcy od daty podpisania niniejszej Umowy.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. CZYNSZ I ZASADY ROZLICZEŃ</h2>
                                <p>3.1. Czynsz wynosi <strong>[[rental_amount]]</strong> UAH miesięcznie. Płatność odbywa się do [[payment_due_day]]. dnia każdego miesiąca.</p>
                                <p>3.2. Wysokość kaucji wynosi <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Opłaty za media są regulowane: [[utilities_payment]].</p>
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
                                            <p>([[landlord_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>NAJEMCA:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Lager-Mietvertrag',
                        'description' => 'Vertrag über die Miete eines Lagerraums.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LAGER-MIETVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[landlord_name]]</strong>, vertreten durch den Leiter [[landlord_director]], nachfolgend "Vermieter" genannt, einerseits, und
                                <strong>[[tenant_name]]</strong>, vertreten durch den Leiter [[tenant_director]], nachfolgend "Mieter" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Vermieter überlässt, und der Mieter übernimmt zur Miete Lagerflächen unter der Adresse: <strong>[[warehouse_address]]</strong>, mit einer Gesamtfläche von [[warehouse_area]] qm.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. MIETDAUER</h2>
                                <p>2.1. Die Mietdauer beträgt <strong>[[lease_term_months]]</strong> Monate ab dem Datum der Unterzeichnung dieses Vertrags.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. MIETZINS UND ZAHLUNGSWEISE</h2>
                                <p>3.1. Der Mietzins beträgt <strong>[[rental_amount]]</strong> UAH pro Monat. Die Zahlung ist bis zum [[payment_due_day]]. Tag jedes Monats fällig.</p>
                                <p>3.2. Die Kaution beträgt <strong>[[security_deposit]]</strong> UAH.</p>
                                <p>3.3. Nebenkosten werden bezahlt: [[utilities_payment]].</p>
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
                                            <p>([[landlord_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>MIETER:</strong></p>
                                            <p>[[tenant_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[tenant_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 7. Договор аренды гаража ---
            [
                'slug' => 'garage-lease-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"landlord_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендодавця","en":"Landlord\'s Passport Details", "pl":"Dane paszportowe wynajmującego", "de":"Passdaten des Vermieters"}},
                    {"name":"landlord_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендодавця","en":"Landlord\'s residence address", "pl":"Adres zamieszkania wynajmującego", "de":"Wohnadresse des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"tenant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані орендаря","en":"Tenant\'s Passport Details", "pl":"Dane paszportowe najemcy", "de":"Passdaten des Mieters"}},
                    {"name":"tenant_address","type":"text","required":true,"labels":{"uk":"Адреса проживання орендаря","en":"Tenant\'s residence address", "pl":"Adres zamieszkania najemcy", "de":"Wohnadresse des Mieters"}},
                    {"name":"garage_address","type":"text","required":true,"labels":{"uk":"Адреса гаража","en":"Garage Address", "pl":"Adres garażu", "de":"Garagenadresse"}},
                    {"name":"garage_area","type":"number","required":true,"labels":{"uk":"Площа гаража (кв.м)","en":"Garage Area (sq.m)", "pl":"Powierzchnia garażu (mkw.)", "de":"Garagenfläche (qm)"}},
                    {"name":"lease_term_months","type":"number","required":true,"labels":{"uk":"Термін оренди (місяців)","en":"Lease Term (months)", "pl":"Okres najmu (miesięcy)", "de":"Mietdauer (Monate)"}},
                    {"name":"rental_amount","type":"number","required":true,"labels":{"uk":"Сума орендної плати (грн/міс)","en":"Rental Amount (UAH/month)", "pl":"Kwota czynszu (UAH/miesiąc)", "de":"Mietbetrag (UAH/Monat)"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"uk":"День сплати (число місяця)","en":"Payment Due Day (day of month)", "pl":"Dzień płatności (dzień miesiąca)", "de":"Zahlungstermin (Tag des Monats)"}},
                    {"name":"security_deposit","type":"number","required":true,"labels":{"uk":"Розмір застави (грн)","en":"Security Deposit (UAH)", "pl":"Wysokość kaucji (UAH)", "de":"Kaution (UAH)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір оренди гаража',
                        'description' => 'Договір про оренду гаражного приміщення.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОРЕНДИ ГАРАЖА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[landlord_name]]</strong>, паспорт: [[landlord_passport]], проживаю за адресою: [[landlord_address]], надалі "Орендодавець", з одного боку, та
                                <strong>[[tenant_name]]</strong>, паспорт: [[tenant_passport]], проживаю за адресою: [[tenant_address]], надалі "Орендар", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Орендодавець передає, а Орендар приймає в оренду гараж за адресою: <strong>[[garage_address]]</strong>, загальною площею [[garage_area]] кв.м.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ТЕРМІН ОРЕНДИ</h2>
                                <p>2.1. Термін оренди становить <strong>[[lease_term_months]]</strong> місяців з дати підписання цього Договору.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ОРЕНДНА ПЛАТА ТА ПОРЯДОК РОЗРАХУНКІВ</h2>
                                <p>3.1. Орендна плата становить <strong>[[rental_amount]]</strong> грн на місяць. Сплата здійснюється до [[payment_due_day]] числа кожного місяця.</p>
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
                        'title' => 'Garage Lease Agreement',
                        'description' => 'Agreement for leasing a garage premises.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GARAGE LEASE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[landlord_name]]</strong>, passport: [[landlord_passport]], residing at: [[landlord_address]], hereinafter "Landlord", on the one hand, and
                                <strong>[[tenant_name]]</strong>, passport: [[tenant_passport]], residing at: [[tenant_address]], hereinafter "Tenant", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Landlord transfers, and the Tenant accepts for lease the garage located at: <strong>[[garage_address]]</strong>, with a total area of [[garage_area]] sq.m.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. LEASE TERM</h2>
                                <p>2.1. The lease term is <strong>[[lease_term_months]]</strong> months from the date of signing this Agreement.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. RENTAL FEE AND PAYMENT PROCEDURE</h2>
                                <p>3.1. The rental fee is <strong>[[rental_amount]]</strong> UAH per month. Payment is due by the [[payment_due_day]]th day of each month.</p>
                                <p>3.2. The security deposit is <strong>[[security_deposit]]</strong> UAH.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LANDLORD:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>TENANT:</strong></p>
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
                        'title' => 'Umowa najmu garażu',
                        'description' => 'Umowa o najem pomieszczenia garażowego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NAJMU GARAŻU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[landlord_name]]</strong>, paszport: [[landlord_passport]], zamieszkały(a) pod adresem: [[landlord_address]], zwany(a) dalej "Wynajmującym", z jednej strony, oraz
                                <strong>[[tenant_name]]</strong>, paszport: [[tenant_passport]], zamieszkały(a) pod adresem: [[tenant_address]], zwany(a) dalej "Najemcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Wynajmujący przekazuje, a Najemca przyjmuje w najem garaż położony pod adresem: <strong>[[garage_address]]</strong>, o łącznej powierzchni [[garage_area]] mkw.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. OKRES NAJMU</h2>
                                <p>2.1. Okres najmu wynosi <strong>[[lease_term_months]]</strong> miesięcy od daty podpisania niniejszej Umowy.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. CZYNSZ I ZASADY ROZLICZEŃ</h2>
                                <p>3.1. Czynsz wynosi <strong>[[rental_amount]]</strong> UAH miesięcznie. Płatność odbywa się do [[payment_due_day]]. dnia każdego miesiąca.</p>
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
                        'title' => 'Garagen-Mietvertrag',
                        'description' => 'Vertrag über die Miete einer Garage.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GARAGEN-MIETVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[landlord_name]]</strong>, Reisepass: [[landlord_passport]], wohnhaft unter der Adresse: [[landlord_address]], nachfolgend "Vermieter" genannt, einerseits, und
                                <strong>[[tenant_name]]</strong>, Reisepass: [[tenant_passport]], wohnhaft unter der Adresse: [[tenant_address]], nachfolgend "Mieter" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Vermieter überlässt, und der Mieter übernimmt zur Miete die Garage unter der Adresse: <strong>[[garage_address]]</strong>, mit einer Gesamtfläche von [[garage_area]] qm.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. MIETDAUER</h2>
                                <p>2.1. Die Mietdauer beträgt <strong>[[lease_term_months]]</strong> Monate ab dem Datum der Unterzeichnung dieses Vertrags.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. MIETZINS UND ZAHLUNGSWEISE</h2>
                                <p>3.1. Der Mietzins beträgt <strong>[[rental_amount]]</strong> UAH pro Monat. Die Zahlung ist bis zum [[payment_due_day]]. Tag jedes Monats fällig.</p>
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

            // --- 8. Акт приема-передачи квартиры при аренде ---
            [
                'slug' => 'apartment-handover-act-lease-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання акту","en":"City of Act Compilation", "pl":"Miejscowość sporządzenia protokołu", "de":"Ort der Akterstellung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири","en":"Apartment Address", "pl":"Adres mieszkania", "de":"Wohnungsadresse"}},
                    {"name":"lease_agreement_date","type":"date","required":true,"labels":{"uk":"Дата договору оренди","en":"Lease Agreement Date", "pl":"Data umowy najmu", "de":"Datum des Mietvertrags"}},
                    {"name":"meter_readings","type":"textarea","required":true,"labels":{"uk":"Показники лічильників (світло, вода, газ)","en":"Meter Readings (electricity, water, gas)", "pl":"Odczyty liczników (prąd, woda, gaz)", "de":"Zählerstände (Strom, Wasser, Gas)"}},
                    {"name":"condition_description","type":"textarea","required":true,"labels":{"uk":"Опис стану квартири та майна","en":"Description of Apartment and Property Condition", "pl":"Opis stanu mieszkania i mienia", "de":"Beschreibung des Zustands der Wohnung und des Eigentums"}},
                    {"name":"keys_transferred","type":"number","required":true,"labels":{"uk":"Кількість переданих ключів","en":"Number of Keys Transferred", "pl":"Liczba przekazanych kluczy", "de":"Anzahl der übergebenen Schlüssel"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Акт прийому-передачі квартири при оренді',
                        'description' => 'Документ, що фіксує стан квартири та майна при передачі в оренду.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ ПРИЙОМУ-ПЕРЕДАЧІ КВАРТИРИ</h1><p>при оренді</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[landlord_name]]</strong>, надалі "Орендодавець", з одного боку, та
                                <strong>[[tenant_name]]</strong>, надалі "Орендар", з іншого боку, склали цей Акт про наступне:</p>
                                <p>1. Орендодавець передав, а Орендар прийняв квартиру за адресою: <strong>[[apartment_address]]</strong>, згідно з Договором оренди від [[lease_agreement_date]].</p>
                                <p>2. Показники лічильників на момент передачі:</p>
                                <p>[[meter_readings]]</p>
                                <p>3. Стан квартири та майна: [[condition_description]].</p>
                                <p>4. Передано [[keys_transferred]] комплект(ів) ключів.</p>
                                <p>Сторони претензій не мають.</p>
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
                        'title' => 'Apartment Handover Act (Lease)',
                        'description' => 'Document recording the condition of the apartment and property upon transfer for lease.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT HANDOVER ACT</h1><p>for lease</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[landlord_name]]</strong>, hereinafter "Landlord", on the one hand, and
                                <strong>[[tenant_name]]</strong>, hereinafter "Tenant", on the other hand, have drawn up this Act as follows:</p>
                                <p>1. The Landlord transferred, and the Tenant accepted the apartment located at: <strong>[[apartment_address]]</strong>, in accordance with the Lease Agreement dated [[lease_agreement_date]].</p>
                                <p>2. Meter readings at the time of handover:</p>
                                <p>[[meter_readings]]</p>
                                <p>3. Condition of the apartment and property: [[condition_description]].</p>
                                <p>4. [[keys_transferred]] set(s) of keys transferred.</p>
                                <p>The Parties have no claims.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LANDLORD:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>TENANT:</strong></p>
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
                        'title' => 'Protokół odbioru-przekazania mieszkania przy najmie',
                        'description' => 'Dokument rejestrujący stan mieszkania i mienia w momencie przekazania do najmu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ODBIORU-PRZEKAZANIA MIESZKANIA</h1><p>przy najmie</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[landlord_name]]</strong>, zwany(a) dalej "Wynajmującym", z jednej strony, oraz
                                <strong>[[tenant_name]]</strong>, zwany(a) dalej "Najemcą", z drugiej strony, sporządziliśmy niniejszy Protokół:</p>
                                <p>1. Wynajmujący przekazał, a Najemca przyjął mieszkanie położone pod adresem: <strong>[[apartment_address]]</strong>, zgodnie z Umową najmu z dnia [[lease_agreement_date]].</p>
                                <p>2. Odczyty liczników w momencie przekazania:</p>
                                <p>[[meter_readings]]</p>
                                <p>3. Stan mieszkania i mienia: [[condition_description]].</p>
                                <p>4. Przekazano [[keys_transferred]] komplet(ów) kluczy.</p>
                                <p>Strony nie mają roszczeń.</p>
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
                        'title' => 'Wohnungsübergabeprotokoll (Miete)',
                        'description' => 'Dokument, das den Zustand der Wohnung und des Eigentums bei der Übergabe zur Miete festhält.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHNUNGSÜBERGABEPROTOKOLL</h1><p>für Miete</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[landlord_name]]</strong>, nachfolgend "Vermieter" genannt, einerseits, und
                                <strong>[[tenant_name]]</strong>, nachfolgend "Mieter" genannt, andererseits, haben dieses Protokoll wie folgt erstellt:</p>
                                <p>1. Der Vermieter hat die Wohnung unter der Adresse: <strong>[[apartment_address]]</strong>, gemäß dem Mietvertrag vom [[lease_agreement_date]] übergeben, und der Mieter hat sie übernommen.</p>
                                <p>2. Zählerstände zum Zeitpunkt der Übergabe:</p>
                                <p>[[meter_readings]]</p>
                                <p>3. Zustand der Wohnung und des Eigentums: [[condition_description]].</p>
                                <p>4. [[keys_transferred]] Schlüsselset(s) übergeben.</p>
                                <p>Die Parteien haben keine Ansprüche.</p>
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

            // --- 9. Опись имущества при сдаче в аренду ---
            [
                'slug' => 'property-inventory-lease-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання опису","en":"City of Inventory Compilation", "pl":"Miejscowość sporządzenia inwentarza", "de":"Ort der Inventarerstellung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири","en":"Apartment Address", "pl":"Adres mieszkania", "de":"Wohnungsadresse"}},
                    {"name":"lease_agreement_date","type":"date","required":true,"labels":{"uk":"Дата договору оренди","en":"Lease Agreement Date", "pl":"Data umowy najmu", "de":"Datum des Mietvertrags"}},
                    {"name":"inventory_list","type":"textarea","required":true,"labels":{"uk":"Перелік майна (Назва, Кількість, Стан)","en":"List of Property (Name, Quantity, Condition)", "pl":"Lista mienia (Nazwa, Ilość, Stan)", "de":"Inventarliste (Name, Menge, Zustand)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Опис майна при здачі в оренду',
                        'description' => 'Документ, що деталізує перелік та стан майна, що передається разом з орендованим приміщенням.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ОПИС МАЙНА</h1><p>при здачі в оренду квартири</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Ми, <strong>[[landlord_name]]</strong>, надалі "Орендодавець", з одного боку, та
                                <strong>[[tenant_name]]</strong>, надалі "Орендар", з іншого боку, склали цей Опис до Договору оренди від [[lease_agreement_date]] щодо квартири за адресою: <strong>[[apartment_address]]</strong>.</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Назва майна</th>
                                            <th>Кількість</th>
                                            <th>Стан</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>1</td><td>Диван</td><td>1</td><td>Добрий</td></tr> -->
                                        [[inventory_list]]
                                    </tbody>
                                </table>
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
                        'title' => 'Property Inventory (Lease)',
                        'description' => 'Document detailing the list and condition of property transferred with the leased premises.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROPERTY INVENTORY</h1><p>for apartment lease</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>We, <strong>[[landlord_name]]</strong>, hereinafter "Landlord", on the one hand, and
                                <strong>[[tenant_name]]</strong>, hereinafter "Tenant", on the other hand, have drawn up this Inventory to the Lease Agreement dated [[lease_agreement_date]] for the apartment located at: <strong>[[apartment_address]]</strong>.</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Property Name</th>
                                            <th>Quantity</th>
                                            <th>Condition</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>1</td><td>Sofa</td><td>1</td><td>Good</td></tr> -->
                                        [[inventory_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LANDLORD:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>TENANT:</strong></p>
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
                        'title' => 'Inwentarz mienia przy najmie',
                        'description' => 'Dokument szczegółowo opisujący wykaz i stan mienia przekazywanego wraz z wynajmowanym lokalem.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">INWENTARZ MIENIA</h1><p>przy najmie mieszkania</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>My, <strong>[[landlord_name]]</strong>, zwany(a) dalej "Wynajmującym", z jednej strony, oraz
                                <strong>[[tenant_name]]</strong>, zwany(a) dalej "Najemcą", z drugiej strony, sporządziliśmy niniejszy Inwentarz do Umowy najmu z dnia [[lease_agreement_date]] dotyczącej mieszkania położonego pod adresem: <strong>[[apartment_address]]</strong>.</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Lp.</th>
                                            <th>Nazwa mienia</th>
                                            <th>Ilość</th>
                                            <th>Stan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>1</td><td>Kanapa</td><td>1</td><td>Dobry</td></tr> -->
                                        [[inventory_list]]
                                    </tbody>
                                </table>
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
                        'title' => 'Inventarverzeichnis (Miete)',
                        'description' => 'Dokument, das die Liste und den Zustand des Eigentums detailliert beschreibt, das mit den gemieteten Räumlichkeiten übergeben wird.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">INVENTARVERZEICHNIS</h1><p>für Wohnungsmiete</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Wir, <strong>[[landlord_name]]</strong>, nachfolgend "Vermieter" genannt, einerseits, und
                                <strong>[[tenant_name]]</strong>, nachfolgend "Mieter" genannt, andererseits, haben dieses Inventar zum Mietvertrag vom [[lease_agreement_date]] für die Wohnung unter der Adresse: <strong>[[apartment_address]]</strong> erstellt.</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Nr.</th>
                                            <th>Name des Eigentums</th>
                                            <th>Menge</th>
                                            <th>Zustand</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>1</td><td>Sofa</td><td>1</td><td>Gut</td></tr> -->
                                        [[inventory_list]]
                                    </tbody>
                                </table>
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

            // --- 10. Расписка в получении залога за аренду ---
            [
                'slug' => 'receipt-security-deposit-lease-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання розписки","en":"City of Receipt Compilation", "pl":"Miejscowość sporządzenia pokwitowania", "de":"Ort der Quittungserstellung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири","en":"Apartment Address", "pl":"Adres mieszkania", "de":"Wohnungsadresse"}},
                    {"name":"security_deposit_amount","type":"number","required":true,"labels":{"uk":"Сума застави (грн)","en":"Security Deposit Amount (UAH)", "pl":"Kwota kaucji (UAH)", "de":"Kautionsbetrag (UAH)"}},
                    {"name":"security_deposit_amount_text","type":"text","required":true,"labels":{"uk":"Сума застави прописом","en":"Security Deposit Amount in Words", "pl":"Kwota kaucji słownie", "de":"Kautionsbetrag in Worten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Розписка в отриманні застави за оренду',
                        'description' => 'Документ, що підтверджує отримання орендодавцем застави від орендаря.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РОЗПИСКА</h1><p style="font-size: 14px;">в отриманні застави за оренду</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[landlord_name]]</strong>, отримав(ла) від <strong>[[tenant_name]]</strong> заставу за оренду квартири за адресою: <strong>[[apartment_address]]</strong>, у розмірі <strong>[[security_deposit_amount]]</strong> грн ([[security_deposit_amount_text]]).</p>
                                <p>Застава отримана згідно з умовами Договору оренди.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис орендодавця: ___________________ ([[landlord_name]])</p>
                                <p>Підпис орендаря: ___________________ ([[tenant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Receipt of Security Deposit for Lease',
                        'description' => 'Document confirming the landlord\'s receipt of a security deposit from the tenant.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECEIPT</h1><p style="font-size: 14px;">of security deposit for lease</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[landlord_name]]</strong>, have received from <strong>[[tenant_name]]</strong> a security deposit for the apartment lease at: <strong>[[apartment_address]]</strong>, in the amount of <strong>[[security_deposit_amount]]</strong> UAH ([[security_deposit_amount_text]]).</p>
                                <p>The deposit was received in accordance with the terms of the Lease Agreement.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Landlord\'s Signature: ___________________ ([[landlord_name]])</p>
                                <p>Tenant\'s Signature: ___________________ ([[tenant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pokwitowanie odbioru kaucji za najem',
                        'description' => 'Dokument potwierdzający otrzymanie przez wynajmującego kaucji od najemcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POKWITOWANIE</h1><p style="font-size: 14px;">odbioru kaucji za najem</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[landlord_name]]</strong>, otrzymałem(am) od <strong>[[tenant_name]]</strong> kaucję za najem mieszkania położonego pod adresem: <strong>[[apartment_address]]</strong>, w wysokości <strong>[[security_deposit_amount]]</strong> UAH ([[security_deposit_amount_text]]).</p>
                                <p>Kaucja została otrzymana zgodnie z warunkami Umowy najmu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis wynajmującego: ___________________ ([[landlord_name]])</p>
                                <p>Podpis najemcy: ___________________ ([[tenant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Quittung über den Erhalt der Kaution für die Miete',
                        'description' => 'Dokument, das den Erhalt einer Kaution vom Mieter durch den Vermieter bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">QUITTUNG</h1><p style="font-size: 14px;">über den Erhalt der Kaution für die Miete</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[landlord_name]]</strong>, habe von <strong>[[tenant_name]]</strong> eine Kaution für die Miete der Wohnung unter der Adresse: <strong>[[apartment_address]]</strong>, in Höhe von <strong>[[security_deposit_amount]]</strong> UAH ([[security_deposit_amount_text]]) erhalten.</p>
                                <p>Die Kaution wurde gemäß den Bedingungen des Mietvertrags erhalten.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Vermieters: ___________________ ([[landlord_name]])</p>
                                <p>Unterschrift des Mieters: ___________________ ([[tenant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 11. Соглашение о расторжении договора аренды ---
            [
                'slug' => 'lease-termination-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири/приміщення","en":"Apartment/Premises Address", "pl":"Adres mieszkania/lokalu", "de":"Wohnungs-/Objektadresse"}},
                    {"name":"lease_agreement_date","type":"date","required":true,"labels":{"uk":"Дата договору оренди","en":"Lease Agreement Date", "pl":"Data umowy najmu", "de":"Datum des Mietvertrags"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"uk":"Дата розірвання договору","en":"Termination Date", "pl":"Data rozwiązania umowy", "de":"Kündigungsdatum"}},
                    {"name":"mutual_claims","type":"textarea","required":false,"labels":{"uk":"Взаємні претензії (якщо є)","en":"Mutual Claims (if any)", "pl":"Wzajemne roszczenia (jeśli dotyczy)", "de":"Gegenseitige Ansprüche (falls zutreffend)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Угода про розірвання договору оренди',
                        'description' => 'Документ, що фіксує взаємну згоду сторін на дострокове розірвання договору оренди.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА</h1><p style="font-size: 14px;">про розірвання договору оренди</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[landlord_name]]</strong>, надалі "Орендодавець", з одного боку, та
                                <strong>[[tenant_name]]</strong>, надалі "Орендар", з іншого боку, уклали цю Угоду про розірвання Договору оренди від [[lease_agreement_date]] щодо квартири/приміщення за адресою: <strong>[[apartment_address]]</strong>, про наступне:</p>
                                <p>1. Договір оренди розривається за згодою сторін <strong>[[termination_date]]</strong>.</p>
                                [[mutual_claims]]<p>2. Взаємні претензії: [[mutual_claims]].</p>[[/mutual_claims]]
                                <p>3. Сторони підтверджують відсутність інших взаємних претензій.</p>
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
                        'title' => 'Lease Termination Agreement',
                        'description' => 'Document recording the mutual consent of the parties to early termination of the lease agreement.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">AGREEMENT</h1><p style="font-size: 14px;">on lease termination</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[landlord_name]]</strong>, hereinafter "Landlord", on the one hand, and
                                <strong>[[tenant_name]]</strong>, hereinafter "Tenant", on the other hand, have concluded this Agreement on termination of the Lease Agreement dated [[lease_agreement_date]] for the apartment/premises located at: <strong>[[apartment_address]]</strong>, as follows:</p>
                                <p>1. The lease agreement is terminated by mutual agreement on <strong>[[termination_date]]</strong>.</p>
                                [[mutual_claims]]<p>2. Mutual claims: [[mutual_claims]].</p>[[/mutual_claims]]
                                <p>3. The Parties confirm the absence of other mutual claims.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LANDLORD:</strong></p>
                                            <p>[[landlord_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[landlord_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>TENANT:</strong></p>
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
                        'title' => 'Porozumienie o rozwiązaniu umowy najmu',
                        'description' => 'Dokument rejestrujący wzajemną zgodę stron na wcześniejsze rozwiązanie umowy najmu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POROZUMIENIE</h1><p style="font-size: 14px;">o rozwiązaniu umowy najmu</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[landlord_name]]</strong>, zwany(a) dalej "Wynajmującym", z jednej strony, oraz
                                <strong>[[tenant_name]]</strong>, zwany(a) dalej "Najemcą", z drugiej strony, zawarliśmy niniejsze Porozumienie o rozwiązaniu Umowy najmu z dnia [[lease_agreement_date]] dotyczącej mieszkania/lokalu położonego pod adresem: <strong>[[apartment_address]]</strong>, w następujący sposób:</p>
                                <p>1. Umowa najmu zostaje rozwiązana za porozumieniem stron z dniem <strong>[[termination_date]]</strong>.</p>
                                [[mutual_claims]]<p>2. Wzajemne roszczenia: [[mutual_claims]].</p>[[/mutual_claims]]
                                <p>3. Strony potwierdzają brak innych wzajemnych roszczeń.</p>
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
                        'title' => 'Mietaufhebungsvertrag',
                        'description' => 'Dokument, das die gegenseitige Zustimmung der Parteien zur vorzeitigen Beendigung des Mietvertrags festhält.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERTRAG</h1><p style="font-size: 14px;">über die Mietaufhebung</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[landlord_name]]</strong>, nachfolgend "Vermieter" genannt, einerseits, und
                                <strong>[[tenant_name]]</strong>, nachfolgend "Mieter" genannt, andererseits, haben diese Vereinbarung zur Beendigung des Mietvertrags vom [[lease_agreement_date]] bezüglich der Wohnung/des Objekts unter der Adresse: <strong>[[apartment_address]]</strong>, wie folgt geschlossen:</p>
                                <p>1. Der Mietvertrag wird im gegenseitigen Einvernehmen zum <strong>[[termination_date]]</strong> beendet.</p>
                                [[mutual_claims]]<p>2. Gegenseitige Ansprüche: [[mutual_claims]].</p>[[/mutual_claims]]
                                <p>3. Die Parteien bestätigen das Fehlen weiterer gegenseitiger Ansprüche.</p>
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

            // --- 12. Уведомление о повышении арендной платы ---
            [
                'slug' => 'rent-increase-notice-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання повідомлення","en":"City of Notice Compilation", "pl":"Miejscowość sporządzenia zawiadomienia", "de":"Ort der Benachrichtigungserstellung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири/приміщення","en":"Apartment/Premises Address", "pl":"Adres mieszkania/lokalu", "de":"Wohnungs-/Objektadresse"}},
                    {"name":"lease_agreement_date","type":"date","required":true,"labels":{"uk":"Дата договору оренди","en":"Lease Agreement Date", "pl":"Data umowy najmu", "de":"Datum des Mietvertrags"}},
                    {"name":"old_rental_amount","type":"number","required":true,"labels":{"uk":"Поточна сума орендної плати (грн/міс)","en":"Current Rental Amount (UAH/month)", "pl":"Obecna kwota czynszu (UAH/miesiąc)", "de":"Aktueller Mietbetrag (UAH/Monat)"}},
                    {"name":"new_rental_amount","type":"number","required":true,"labels":{"uk":"Нова сума орендної плати (грн/міс)","en":"New Rental Amount (UAH/month)", "pl":"Nowa kwota czynszu (UAH/miesiąc)", "de":"Neuer Mietbetrag (UAH/Monat)"}},
                    {"name":"effective_date","type":"date","required":true,"labels":{"uk":"Дата набрання чинності нової плати","en":"New Rent Effective Date", "pl":"Data wejścia w życie nowej opłaty", "de":"Datum des Inkrafttretens der neuen Miete"}},
                    {"name":"reason_for_increase","type":"textarea","required":false,"labels":{"uk":"Причина підвищення (за бажанням)","en":"Reason for Increase (optional)", "pl":"Przyczyna podwyżki (opcjonalnie)", "de":"Grund der Erhöhung (optional)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Повідомлення про підвищення орендної плати',
                        'description' => 'Офіційне повідомлення орендодавця орендарю про підвищення орендної плати.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОВІДОМЛЕННЯ</h1><p style="font-size: 14px;">про підвищення орендної плати</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний(а) [[tenant_name]],</p>
                                <p>Цим повідомляємо Вас про підвищення орендної плати за квартиру/приміщення за адресою: <strong>[[apartment_address]]</strong>, згідно з Договором оренди від [[lease_agreement_date]].</p>
                                <p>Поточна орендна плата становить <strong>[[old_rental_amount]]</strong> грн на місяць.</p>
                                <p>Нова орендна плата становитиме <strong>[[new_rental_amount]]</strong> грн на місяць, починаючи з <strong>[[effective_date]]</strong>.</p>
                                [[reason_for_increase]]<p>Причина підвищення: [[reason_for_increase]].</p>[[/reason_for_increase]]
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Орендодавець: ___________________ ([[landlord_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Rent Increase Notice',
                        'description' => 'Official notice from landlord to tenant about a rent increase.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">NOTICE</h1><p style="font-size: 14px;">of rent increase</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear [[tenant_name]],</p>
                                <p>This is to inform you of a rent increase for the apartment/premises located at: <strong>[[apartment_address]]</strong>, according to the Lease Agreement dated [[lease_agreement_date]].</p>
                                <p>The current rent is <strong>[[old_rental_amount]]</strong> UAH per month.</p>
                                <p>The new rent will be <strong>[[new_rental_amount]]</strong> UAH per month, effective from <strong>[[effective_date]]</strong>.</p>
                                [[reason_for_increase]]<p>Reason for increase: [[reason_for_increase]].</p>[[/reason_for_increase]]
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Landlord: ___________________ ([[landlord_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zawiadomienie o podwyższeniu czynszu',
                        'description' => 'Oficjalne zawiadomienie wynajmującego do najemcy o podwyższeniu czynszu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZAWIADOMIENIE</h1><p style="font-size: 14px;">o podwyższeniu czynszu</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny(a) Panie/Pani [[tenant_name]],</p>
                                <p>Niniejszym informujemy o podwyższeniu czynszu za mieszkanie/lokal położony(e) pod adresem: <strong>[[apartment_address]]</strong>, zgodnie z Umową najmu z dnia [[lease_agreement_date]].</p>
                                <p>Obecny czynsz wynosi <strong>[[old_rental_amount]]</strong> UAH miesięcznie.</p>
                                <p>Nowy czynsz będzie wynosił <strong>[[new_rental_amount]]</strong> UAH miesięcznie, począwszy od <strong>[[effective_date]]</strong>.</p>
                                [[reason_for_increase]]<p>Przyczyna podwyżki: [[reason_for_increase]].</p>[[/reason_for_increase]]
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Wynajmujący: ___________________ ([[landlord_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Mietpreiserhöhungsmitteilung',
                        'description' => 'Offizielle Mitteilung des Vermieters an den Mieter über eine Mietpreiserhöhung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MITTEILUNG</h1><p style="font-size: 14px;">über Mietpreiserhöhung</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte(r) Herr/Frau [[tenant_name]],</p>
                                <p>Hiermit informieren wir Sie über eine Mietpreiserhöhung für die Wohnung/das Objekt unter der Adresse: <strong>[[apartment_address]]</strong>, gemäß dem Mietvertrag vom [[lease_agreement_date]].</p>
                                <p>Die aktuelle Miete beträgt <strong>[[old_rental_amount]]</strong> UAH pro Monat.</p>
                                <p>Die neue Miete beträgt <strong>[[new_rental_amount]]</strong> UAH pro Monat, gültig ab dem <strong>[[effective_date]]</strong>.</p>
                                [[reason_for_increase]]<p>Grund der Erhöhung: [[reason_for_increase]].</p>[[/reason_for_increase]]
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Vermieter: ___________________ ([[landlord_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 13. Требование о погашении задолженности по аренде ---
            [
                'slug' => 'rent-debt-demand-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання вимоги","en":"City of Demand Compilation", "pl":"Miejscowość sporządzenia wezwania", "de":"Ort der Mahnungserstellung"}},
                    {"name":"landlord_name","type":"text","required":true,"labels":{"uk":"ПІБ орендодавця","en":"Landlord\'s Full Name", "pl":"Imię i nazwisko wynajmującego", "de":"Vollständiger Name des Vermieters"}},
                    {"name":"tenant_name","type":"text","required":true,"labels":{"uk":"ПІБ орендаря","en":"Tenant\'s Full Name", "pl":"Imię i nazwisko najemcy", "de":"Vollständiger Name des Mieters"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири/приміщення","en":"Apartment/Premises Address", "pl":"Adres mieszkania/lokalu", "de":"Wohnungs-/Objektadresse"}},
                    {"name":"lease_agreement_date","type":"date","required":true,"labels":{"uk":"Дата договору оренди","en":"Lease Agreement Date", "pl":"Data umowy najmu", "de":"Datum des Mietvertrags"}},
                    {"name":"debt_period_start","type":"text","required":true,"labels":{"uk":"Період заборгованості (з)","en":"Debt Period (from)", "pl":"Okres zadłużenia (od)", "de":"Schuldzeitraum (von)"}},
                    {"name":"debt_period_end","type":"text","required":true,"labels":{"uk":"Період заборгованості (по)","en":"Debt Period (to)", "pl":"Okres zadłużenia (do)", "de":"Schuldzeitraum (bis)"}},
                    {"name":"debt_amount","type":"number","required":true,"labels":{"uk":"Сума заборгованості (грн)","en":"Debt Amount (UAH)", "pl":"Kwota zadłużenia (UAH)", "de":"Schuldsumme (UAH)"}},
                    {"name":"payment_deadline_days","type":"number","required":true,"labels":{"uk":"Термін погашення (днів)","en":"Repayment Deadline (days)", "pl":"Termin spłaty (dni)", "de":"Rückzahlungsfrist (Tage)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Вимога про погашення заборгованості по оренді',
                        'description' => 'Офіційна вимога орендодавця орендарю про погашення заборгованості по орендній платі.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ВИМОГА</h1><p style="font-size: 14px;">про погашення заборгованості по оренді</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний(а) [[tenant_name]],</p>
                                <p>Згідно з Договором оренди від [[lease_agreement_date]] щодо квартири/приміщення за адресою: <strong>[[apartment_address]]</strong>, у Вас виникла заборгованість по орендній платі за період з [[debt_period_start]] по [[debt_period_end]] у розмірі <strong>[[debt_amount]]</strong> грн.</p>
                                <p>Вимагаємо погасити зазначену заборгованість у строк до [[payment_deadline_days]] календарних днів з моменту отримання цієї вимоги.</p>
                                <p>У разі невиконання вимоги, будемо змушені звернутися до суду та/або розірвати договір оренди.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Орендодавець: ___________________ ([[landlord_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Demand for Rent Debt Repayment',
                        'description' => 'Official demand from landlord to tenant for repayment of rent arrears.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DEMAND</h1><p style="font-size: 14px;">for rent debt repayment</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear [[tenant_name]],</p>
                                <p>According to the Lease Agreement dated [[lease_agreement_date]] for the apartment/premises at: <strong>[[apartment_address]]</strong>, you have accumulated rent arrears for the period from [[debt_period_start]] to [[debt_period_end]] in the amount of <strong>[[debt_amount]]</strong> UAH.</p>
                                <p>We demand that you repay the specified debt within [[payment_deadline_days]] calendar days from the date of receipt of this demand.</p>
                                <p>In case of non-compliance, we will be forced to apply to court and/or terminate the lease agreement.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Landlord: ___________________ ([[landlord_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wezwanie do zapłaty zaległego czynszu',
                        'description' => 'Oficjalne wezwanie wynajmującego do najemcy o spłatę zaległości czynszowych.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WEZWANIE</h1><p style="font-size: 14px;">do zapłaty zaległego czynszu</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny(a) Panie/Pani [[tenant_name]],</p>
                                <p>Zgodnie z Umową najmu z dnia [[lease_agreement_date]] dotyczącą mieszkania/lokalu pod adresem: <strong>[[apartment_address]]</strong>, powstało zadłużenie z tytułu czynszu za okres od [[debt_period_start]] do [[debt_period_end]] w wysokości <strong>[[debt_amount]]</strong> UAH.</p>
                                <p>Żądamy spłaty wskazanego zadłużenia w terminie [[payment_deadline_days]] dni kalendarzowych od daty otrzymania niniejszego wezwania.</p>
                                <p>W przypadku niewypełnienia żądania, będziemy zmuszeni skierować sprawę do sądu i/lub rozwiązać umowę najmu.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Wynajmujący: ___________________ ([[landlord_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Mahnung zur Mietrückzahlung',
                        'description' => 'Offizielle Mahnung des Vermieters an den Mieter zur Rückzahlung von Mietrückständen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MAHNUNG</h1><p style="font-size: 14px;">zur Mietrückzahlung</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte(r) Herr/Frau [[tenant_name]],</p>
                                <p>Gemäß dem Mietvertrag vom [[lease_agreement_date]] für die Wohnung/das Objekt unter der Adresse: <strong>[[apartment_address]]</strong>, haben Sie Mietrückstände für den Zeitraum vom [[debt_period_start]] bis zum [[debt_period_end]] in Höhe von <strong>[[debt_amount]]</strong> UAH angesammelt.</p>
                                <p>Wir fordern Sie auf, die genannte Schuld innerhalb von [[payment_deadline_days]] Kalendertagen ab Erhalt dieser Mahnung zu begleichen.</p>
                                <p>Im Falle der Nichteinhaltung werden wir gezwungen sein, gerichtliche Schritte einzuleiten und/oder den Mietvertrag zu kündigen.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Vermieter: ___________________ ([[landlord_name]])</p>
                            </div>'
                    ],
                ]
            ],
            // --- 14. Предварительный договор купли-продажи квартиры ---
            [
                'slug' => 'preliminary-apartment-purchase-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"ПІБ продавця","en":"Seller\'s Full Name", "pl":"Imię i nazwisko sprzedawcy", "de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані продавця","en":"Seller\'s Passport Details", "pl":"Dane paszportowe sprzedawcy", "de":"Passdaten des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"uk":"Адреса проживання продавця","en":"Seller\'s residence address", "pl":"Adres zamieszkania sprzedawcy", "de":"Wohnadresse des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"ПІБ покупця","en":"Buyer\'s Full Name", "pl":"Imię i nazwisko nabywcy", "de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані покупця","en":"Buyer\'s Passport Details", "pl":"Dane paszportowe nabywcy", "de":"Passdaten des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"uk":"Адреса проживання покупця","en":"Buyer\'s residence address", "pl":"Adres zamieszkania nabywcy", "de":"Wohnadresse des Käufers"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири","en":"Apartment Address", "pl":"Adres mieszkania", "de":"Wohnungsadresse"}},
                    {"name":"apartment_area","type":"number","required":true,"labels":{"uk":"Площа квартири (кв.м)","en":"Apartment Area (sq.m)", "pl":"Powierzchnia mieszkania (mkw.)", "de":"Wohnfläche (qm)"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"uk":"Продажна ціна (грн)","en":"Sale Price (UAH)", "pl":"Cena sprzedaży (UAH)", "de":"Verkaufspreis (UAH)"}},
                    {"name":"earnest_money_amount","type":"number","required":true,"labels":{"uk":"Сума задатку (грн)","en":"Earnest Money Amount (UAH)", "pl":"Kwota zadatku (UAH)", "de":"Anzahlungsbetrag (UAH)"}},
                    {"name":"main_contract_date","type":"date","required":true,"labels":{"uk":"Дата укладення основного договору","en":"Main Contract Date", "pl":"Data zawarcia umowy głównej", "de":"Datum des Hauptvertrags"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Попередній договір купівлі-продажу квартири',
                        'description' => 'Договір, що фіксує наміри сторін укласти основний договір купівлі-продажу квартири в майбутньому.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОПЕРЕДНІЙ ДОГОВІР КУПІВЛІ-ПРОДАЖУ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[seller_name]]</strong>, паспорт: [[seller_passport]], проживаю за адресою: [[seller_address]], надалі "Продавець", з одного боку, та
                                <strong>[[buyer_name]]</strong>, паспорт: [[buyer_passport]], проживаю за адресою: [[buyer_address]], надалі "Покупець", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Сторони зобов\'язуються укласти в майбутньому договір купівлі-продажу квартири за адресою: <strong>[[apartment_address]]</strong>, загальною площею [[apartment_area]] кв.м.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ЦІНА ТА ЗАДАТОК</h2>
                                <p>2.1. Продажна ціна квартири становить <strong>[[sale_price]]</strong> грн.</p>
                                <p>2.2. Покупець передає Продавцю задаток у розмірі <strong>[[earnest_money_amount]]</strong> грн.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ТЕРМІН УКЛАДЕННЯ ОСНОВНОГО ДОГОВОРУ</h2>
                                <p>3.1. Основний договір купівлі-продажу має бути укладений до <strong>[[main_contract_date]]</strong>.</p>
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
                        'title' => 'Preliminary Apartment Purchase and Sale Agreement',
                        'description' => 'Agreement recording the parties\' intentions to conclude a main apartment purchase and sale agreement in the future.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PRELIMINARY APARTMENT PURCHASE AND SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[seller_name]]</strong>, passport: [[seller_passport]], residing at: [[seller_address]], hereinafter "Seller", on the one hand, and
                                <strong>[[buyer_name]]</strong>, passport: [[buyer_passport]], residing at: [[buyer_address]], hereinafter "Buyer", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Parties undertake to conclude in the future an apartment purchase and sale agreement for the apartment located at: <strong>[[apartment_address]]</strong>, with a total area of [[apartment_area]] sq.m.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. PRICE AND EARNEST MONEY</h2>
                                <p>2.1. The sale price of the apartment is <strong>[[sale_price]]</strong> UAH.</p>
                                <p>2.2. The Buyer transfers to the Seller earnest money in the amount of <strong>[[earnest_money_amount]]</strong> UAH.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. DEADLINE FOR CONCLUDING THE MAIN AGREEMENT</h2>
                                <p>3.1. The main purchase and sale agreement must be concluded by <strong>[[main_contract_date]]</strong>.</p>
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
                        'title' => 'Przedwstępna umowa sprzedaży mieszkania',
                        'description' => 'Umowa rejestrująca zamiary stron zawarcia głównej umowy sprzedaży mieszkania w przyszłości.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PRZEDWSTĘPNA UMOWA SPRZEDAŻY MIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[seller_name]]</strong>, paszport: [[seller_passport]], zamieszkały(a) pod adresem: [[seller_address]], zwany(a) dalej "Sprzedawcą", z jednej strony, oraz
                                <strong>[[buyer_name]]</strong>, paszport: [[buyer_passport]], zamieszkały(a) pod adresem: [[buyer_address]], zwany(a) dalej "Nabywcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Strony zobowiązują się do zawarcia w przyszłości umowy sprzedaży mieszkania położonego pod adresem: <strong>[[apartment_address]]</strong>, o łącznej powierzchni [[apartment_area]] mkw.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. CENA I ZADATEK</h2>
                                <p>2.1. Cena sprzedaży mieszkania wynosi <strong>[[sale_price]]</strong> UAH.</p>
                                <p>2.2. Nabywca przekazuje Sprzedawcy zadatek w wysokości <strong>[[earnest_money_amount]]</strong> UAH.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. TERMIN ZAWARCIA UMOWY GŁÓWNEJ</h2>
                                <p>3.1. Główna umowa sprzedaży powinna zostać zawarta do <strong>[[main_contract_date]]</strong>.</p>
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
                        'title' => 'Vorvertrag über den Kauf und Verkauf einer Wohnung',
                        'description' => 'Vertrag, der die Absicht der Parteien festhält, in Zukunft einen Hauptvertrag über den Kauf und Verkauf einer Wohnung abzuschließen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VORVERTRAG ÜBER DEN KAUF UND VERKAUF EINER WOHNUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[seller_name]]</strong>, Reisepass: [[seller_passport]], wohnhaft unter der Adresse: [[seller_address]], nachfolgend "Verkäufer" genannt, einerseits, und
                                <strong>[[buyer_name]]</strong>, Reisepass: [[buyer_passport]], wohnhaft unter der Adresse: [[buyer_address]], nachfolgend "Käufer" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Die Parteien verpflichten sich, in Zukunft einen Kaufvertrag über die Wohnung unter der Adresse: <strong>[[apartment_address]]</strong>, mit einer Gesamtfläche von [[apartment_area]] qm, abzuschließen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. PREIS UND ANZAHLUNG</h2>
                                <p>2.1. Der Verkaufspreis der Wohnung beträgt <strong>[[sale_price]]</strong> UAH.</p>
                                <p>2.2. Der Käufer überweist dem Verkäufer eine Anzahlung in Höhe von <strong>[[earnest_money_amount]]</strong> UAH.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. FRIST FÜR DEN ABSCHLUSS DES HAUPTVERTRAGES</h2>
                                <p>3.1. Der Hauptkaufvertrag muss bis zum <strong>[[main_contract_date]]</strong> abgeschlossen werden.</p>
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

            // --- 15. Договор купли-продажи квартиры ---
            [
                'slug' => 'apartment-purchase-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"ПІБ продавця","en":"Seller\'s Full Name", "pl":"Imię i nazwisko sprzedawcy", "de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані продавця","en":"Seller\'s Passport Details", "pl":"Dane paszportowe sprzedawcy", "de":"Passdaten des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"uk":"Адреса проживання продавця","en":"Seller\'s residence address", "pl":"Adres zamieszkania sprzedawcy", "de":"Wohnadresse des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"ПІБ покупця","en":"Buyer\'s Full Name", "pl":"Imię i nazwisko nabywcy", "de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані покупця","en":"Buyer\'s Passport Details", "pl":"Dane paszportowe nabywcy", "de":"Passdaten des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"uk":"Адреса проживання покупця","en":"Buyer\'s residence address", "pl":"Adres zamieszkania nabywcy", "de":"Wohnadresse des Käufers"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири","en":"Apartment Address", "pl":"Adres mieszkania", "de":"Wohnungsadresse"}},
                    {"name":"apartment_area","type":"number","required":true,"labels":{"uk":"Площа квартири (кв.м)","en":"Apartment Area (sq.m)", "pl":"Powierzchnia mieszkania (mkw.)", "de":"Wohnfläche (qm)"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"uk":"Продажна ціна (грн)","en":"Sale Price (UAH)", "pl":"Cena sprzedaży (UAH)", "de":"Verkaufspreis (UAH)"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"uk":"Умови оплати","en":"Payment Terms", "pl":"Warunki płatności", "de":"Zahlungsbedingungen"}},
                    {"name":"ownership_document","type":"text","required":true,"labels":{"uk":"Документ, що підтверджує право власності","en":"Document Confirming Ownership", "pl":"Dokument potwierdzający prawo własności", "de":"Eigentumsnachweis"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір купівлі-продажу квартири',
                        'description' => 'Договір про передачу права власності на квартиру від продавця до покупця.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР КУПІВЛІ-ПРОДАЖУ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[seller_name]]</strong>, паспорт: [[seller_passport]], проживаю за адресою: [[seller_address]], надалі "Продавець", з одного боку, та
                                <strong>[[buyer_name]]</strong>, паспорт: [[buyer_passport]], проживаю за адресою: [[buyer_address]], надалі "Покупець", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Продавець передає, а Покупець приймає у власність квартиру за адресою: <strong>[[apartment_address]]</strong>, загальною площею [[apartment_area]] кв.м., на підставі [[ownership_document]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ЦІНА ТА ПОРЯДОК РОЗРАХУНКІВ</h2>
                                <p>2.1. Продажна ціна квартири становить <strong>[[sale_price]]</strong> грн.</p>
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
                        'title' => 'Apartment Purchase and Sale Agreement',
                        'description' => 'Agreement on the transfer of ownership of an apartment from seller to buyer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT PURCHASE AND SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[seller_name]]</strong>, passport: [[seller_passport]], residing at: [[seller_address]], hereinafter "Seller", on the one hand, and
                                <strong>[[buyer_name]]</strong>, passport: [[buyer_passport]], residing at: [[buyer_address]], hereinafter "Buyer", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Seller transfers, and the Buyer accepts ownership of the apartment located at: <strong>[[apartment_address]]</strong>, with a total area of [[apartment_area]] sq.m., based on [[ownership_document]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. PRICE AND PAYMENT PROCEDURE</h2>
                                <p>2.1. The sale price of the apartment is <strong>[[sale_price]]</strong> UAH.</p>
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
                        'title' => 'Umowa kupna-sprzedaży mieszkania',
                        'description' => 'Umowa o przeniesienie prawa własności mieszkania od sprzedawcy do nabywcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA KUPNA-SPRZEDAŻY MIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[seller_name]]</strong>, paszport: [[seller_passport]], zamieszkały(a) pod adresem: [[seller_address]], zwany(a) dalej "Sprzedawcą", z jednej strony, oraz
                                <strong>[[buyer_name]]</strong>, paszport: [[buyer_passport]], zamieszkały(a) pod adresem: [[buyer_address]], zwany(a) dalej "Nabywcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Sprzedawca przekazuje, a Nabywca przyjmuje na własność mieszkanie położone pod adresem: <strong>[[apartment_address]]</strong>, o łącznej powierzchni [[apartment_area]] mkw., na podstawie [[ownership_document]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. CENA I ZASADY ROZLICZEŃ</h2>
                                <p>2.1. Cena sprzedaży mieszkania wynosi <strong>[[sale_price]]</strong> UAH.</p>
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
                        'title' => 'Wohnungskaufvertrag',
                        'description' => 'Vertrag über die Eigentumsübertragung einer Wohnung vom Verkäufer an den Käufer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHNUNGSKAUFVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[seller_name]]</strong>, Reisepass: [[seller_passport]], wohnhaft unter der Adresse: [[seller_address]], nachfolgend "Verkäufer" genannt, einerseits, und
                                <strong>[[buyer_name]]</strong>, Reisepass: [[buyer_passport]], wohnhaft unter der Adresse: [[buyer_address]], nachfolgend "Käufer" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Verkäufer überträgt, und der Käufer erwirbt das Eigentum an der Wohnung unter der Adresse: <strong>[[apartment_address]]</strong>, mit einer Gesamtfläche von [[apartment_area]] qm, auf der Grundlage von [[ownership_document]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. PREIS UND ZAHLUNGSWEISE</h2>
                                <p>2.1. Der Verkaufspreis der Wohnung beträgt <strong>[[sale_price]]</strong> UAH.</p>
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

            // --- 16. Договор купли-продажи дома с земельным участком ---
            [
                'slug' => 'house-land-purchase-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"ПІБ продавця","en":"Seller\'s Full Name", "pl":"Imię i nazwisko sprzedawcy", "de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані продавця","en":"Seller\'s Passport Details", "pl":"Dane paszportowe sprzedawcy", "de":"Passdaten des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"uk":"Адреса проживання продавця","en":"Seller\'s residence address", "pl":"Adres zamieszkania sprzedawcy", "de":"Wohnadresse des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"ПІБ покупця","en":"Buyer\'s Full Name", "pl":"Imię i nazwisko nabywcy", "de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані покупця","en":"Buyer\'s Passport Details", "pl":"Dane paszportowe nabywcy", "de":"Passdaten des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"uk":"Адреса проживання покупця","en":"Buyer\'s residence address", "pl":"Adres zamieszkania nabywcy", "de":"Wohnadresse des Käufers"}},
                    {"name":"house_address","type":"text","required":true,"labels":{"uk":"Адреса будинку","en":"House Address", "pl":"Adres domu", "de":"Hausadresse"}},
                    {"name":"house_area","type":"number","required":true,"labels":{"uk":"Площа будинку (кв.м)","en":"House Area (sq.m)", "pl":"Powierzchnia domu (mkw.)", "de":"Hausfläche (qm)"}},
                    {"name":"land_area","type":"number","required":true,"labels":{"uk":"Площа земельної ділянки (соток)","en":"Land Area (ares)", "pl":"Powierzchnia działki (ary)", "de":"Grundstücksfläche (Ar)"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"uk":"Продажна ціна (грн)","en":"Sale Price (UAH)", "pl":"Cena sprzedaży (UAH)", "de":"Verkaufspreis (UAH)"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"uk":"Умови оплати","en":"Payment Terms", "pl":"Warunki płatności", "de":"Zahlungsbedingungen"}},
                    {"name":"ownership_document_house","type":"text","required":true,"labels":{"uk":"Документ, що підтверджує право власності на будинок","en":"Document Confirming House Ownership", "pl":"Dokument potwierdzający prawo własności domu", "de":"Nachweis des Hauseigentums"}},
                    {"name":"ownership_document_land","type":"text","required":true,"labels":{"uk":"Документ, що підтверджує право власності на земельну ділянку","en":"Document Confirming Land Ownership", "pl":"Dokument potwierdzający prawo własności działki", "de":"Nachweis des Grundstückseigentums"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір купівлі-продажу будинку з земельною ділянкою',
                        'description' => 'Договір про передачу права власності на будинок та земельну ділянку від продавця до покупця.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР КУПІВЛІ-ПРОДАЖУ БУДИНКУ З ЗЕМЕЛЬНОЮ ДІЛЯНКОЮ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[seller_name]]</strong>, паспорт: [[seller_passport]], проживаю за адресою: [[seller_address]], надалі "Продавець", з одного боку, та
                                <strong>[[buyer_name]]</strong>, паспорт: [[buyer_passport]], проживаю за адресою: [[buyer_address]], надалі "Покупець", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Продавець передає, а Покупець приймає у власність будинок за адресою: <strong>[[house_address]]</strong>, загальною площею [[house_area]] кв.м., на підставі [[ownership_document_house]], та земельну ділянку площею [[land_area]] соток, на підставі [[ownership_document_land]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ЦІНА ТА ПОРЯДОК РОЗРАХУНКІВ</h2>
                                <p>2.1. Продажна ціна будинку та земельної ділянки становить <strong>[[sale_price]]</strong> грн.</p>
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
                        'title' => 'House and Land Purchase and Sale Agreement',
                        'description' => 'Agreement on the transfer of ownership of a house and land plot from seller to buyer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HOUSE AND LAND PURCHASE AND SALE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[seller_name]]</strong>, passport: [[seller_passport]], residing at: [[seller_address]], hereinafter "Seller", on the one hand, and
                                <strong>[[buyer_name]]</strong>, passport: [[buyer_passport]], residing at: [[buyer_address]], hereinafter "Buyer", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Seller transfers, and the Buyer accepts ownership of the house located at: <strong>[[house_address]]</strong>, with a total area of [[house_area]] sq.m., based on [[ownership_document_house]], and the land plot of [[land_area]] ares, based on [[ownership_document_land]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. PRICE AND PAYMENT PROCEDURE</h2>
                                <p>2.1. The sale price of the house and land plot is <strong>[[sale_price]]</strong> UAH.</p>
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
                        'title' => 'Umowa kupna-sprzedaży domu z działką gruntową',
                        'description' => 'Umowa o przeniesienie prawa własności domu i działki gruntowej od sprzedawcy do nabywcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA KUPNA-SPRZEDAŻY DOMU Z DZIAŁKĄ GRUNTOWĄ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[seller_name]]</strong>, paszport: [[seller_passport]], zamieszkały(a) pod adresem: [[seller_address]], zwany(a) dalej "Sprzedawcą", z jednej strony, oraz
                                <strong>[[buyer_name]]</strong>, paszport: [[buyer_passport]], zamieszkały(a) pod adresem: [[buyer_address]], zwany(a) dalej "Nabywcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Sprzedawca przekazuje, a Nabywca przyjmuje na własność dom położony pod adresem: <strong>[[house_address]]</strong>, o łącznej powierzchni [[house_area]] mkw., na podstawie [[ownership_document_house]], oraz działkę gruntową o powierzchni [[land_area]] arów, na podstawie [[ownership_document_land]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. CENA I ZASADY ROZLICZEŃ</h2>
                                <p>2.1. Cena sprzedaży domu i działki gruntowej wynosi <strong>[[sale_price]]</strong> UAH.</p>
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
                        'title' => 'Kaufvertrag für Haus mit Grundstück',
                        'description' => 'Vertrag über die Eigentumsübertragung eines Hauses und eines Grundstücks vom Verkäufer an den Käufer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KAUFVERTRAG FÜR HAUS MIT GRUNDSTÜCK</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[seller_name]]</strong>, Reisepass: [[seller_passport]], wohnhaft unter der Adresse: [[seller_address]], nachfolgend "Verkäufer" genannt, einerseits, und
                                <strong>[[buyer_name]]</strong>, Reisepass: [[buyer_passport]], wohnhaft unter der Adresse: [[buyer_address]], nachfolgend "Käufer" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Verkäufer überträgt, und der Käufer erwirbt das Eigentum an dem Haus unter der Adresse: <strong>[[house_address]]</strong>, mit einer Gesamtfläche von [[house_area]] qm, auf der Grundlage von [[ownership_document_house]], und dem Grundstück von [[land_area]] Ar, auf der Grundlage von [[ownership_document_land]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. PREIS UND ZAHLUNGSWEISE</h2>
                                <p>2.1. Der Verkaufspreis des Hauses und des Grundstücks beträgt <strong>[[sale_price]]</strong> UAH.</p>
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

            // --- 17. Договор дарения квартиры ---
            [
                'slug' => 'apartment-gift-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"donor_name","type":"text","required":true,"labels":{"uk":"ПІБ дарувальника","en":"Donor\'s Full Name", "pl":"Imię i nazwisko darczyńcy", "de":"Vollständiger Name des Schenkers"}},
                    {"name":"donor_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані дарувальника","en":"Donor\'s Passport Details", "pl":"Dane paszportowe darczyńcy", "de":"Passdaten des Schenkers"}},
                    {"name":"donor_address","type":"text","required":true,"labels":{"uk":"Адреса проживання дарувальника","en":"Donor\'s residence address", "pl":"Adres zamieszkania darczyńcy", "de":"Wohnadresse des Schenkers"}},
                    {"name":"donee_name","type":"text","required":true,"labels":{"uk":"ПІБ обдаровуваного","en":"Donee\'s Full Name", "pl":"Imię i nazwisko obdarowanego", "de":"Vollständiger Name des Beschenkten"}},
                    {"name":"donee_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані обдаровуваного","en":"Donee\'s Passport Details", "pl":"Dane paszportowe obdarowanego", "de":"Passdaten des Beschenkten"}},
                    {"name":"donee_address","type":"text","required":true,"labels":{"uk":"Адреса проживання обдаровуваного","en":"Donee\'s residence address", "pl":"Adres zamieszkania obdarowanego", "de":"Wohnadresse des Beschenkten"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири","en":"Apartment Address", "pl":"Adres mieszkania", "de":"Wohnungsadresse"}},
                    {"name":"apartment_area","type":"number","required":true,"labels":{"uk":"Площа квартири (кв.м)","en":"Apartment Area (sq.m)", "pl":"Powierzchnia mieszkania (mkw.)", "de":"Wohnfläche (qm)"}},
                    {"name":"ownership_document","type":"text","required":true,"labels":{"uk":"Документ, що підтверджує право власності","en":"Document Confirming Ownership", "pl":"Dokument potwierdzający prawo własności", "de":"Eigentumsnachweis"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір дарування квартири',
                        'description' => 'Договір про безоплатну передачу права власності на квартиру від дарувальника до обдаровуваного.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ДАРУВАННЯ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[donor_name]]</strong>, паспорт: [[donor_passport]], проживаю за адресою: [[donor_address]], надалі "Дарувальник", з одного боку, та
                                <strong>[[donee_name]]</strong>, паспорт: [[donee_passport]], проживаю за адресою: [[donee_address]], надалі "Обдаровуваний", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Дарувальник безоплатно передає, а Обдаровуваний приймає у власність квартиру за адресою: <strong>[[apartment_address]]</strong>, загальною площею [[apartment_area]] кв.м., на підставі [[ownership_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ДАРУВАЛЬНИК:</strong></p>
                                            <p>[[donor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donor_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ОБДАРОВУВАНИЙ:</strong></p>
                                            <p>[[donee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Apartment Gift Agreement',
                        'description' => 'Agreement on the gratuitous transfer of ownership of an apartment from donor to donee.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT GIFT AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[donor_name]]</strong>, passport: [[donor_passport]], residing at: [[donor_address]], hereinafter "Donor", on the one hand, and
                                <strong>[[donee_name]]</strong>, passport: [[donee_passport]], residing at: [[donee_address]], hereinafter "Donee", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Donor gratuitously transfers, and the Donee accepts ownership of the apartment located at: <strong>[[apartment_address]]</strong>, with a total area of [[apartment_area]] sq.m., based on [[ownership_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>DONOR:</strong></p>
                                            <p>[[donor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donor_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>DONEE:</strong></p>
                                            <p>[[donee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa darowizny mieszkania',
                        'description' => 'Umowa o bezpłatne przeniesienie prawa własności mieszkania od darczyńcy do obdarowanego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA DAROWIZNY MIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[donor_name]]</strong>, paszport: [[donor_passport]], zamieszkały(a) pod adresem: [[donor_address]], zwany(a) dalej "Darczyńcą", z jednej strony, oraz
                                <strong>[[donee_name]]</strong>, paszport: [[donee_passport]], zamieszkały(a) pod adresem: [[donee_address]], zwany(a) dalej "Obdarowanym", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Darczyńca bezpłatnie przekazuje, a Obdarowany przyjmuje na własność mieszkanie położone pod adresem: <strong>[[apartment_address]]</strong>, o łącznej powierzchni [[apartment_area]] mkw., na podstawie [[ownership_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>DARCZYŃCA:</strong></p>
                                            <p>[[donor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donor_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>OBDAROWANY:</strong></p>
                                            <p>[[donee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Wohnungsgeschenkvertrag',
                        'description' => 'Vertrag über die unentgeltliche Übertragung des Eigentums an einer Wohnung vom Schenker an den Beschenkten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHNUNGSGESCHENKVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[donor_name]]</strong>, Reisepass: [[donor_passport]], wohnhaft unter der Adresse: [[donor_address]], nachfolgend "Schenker" genannt, einerseits, und
                                <strong>[[donee_name]]</strong>, Reisepass: [[donee_passport]], wohnhaft unter der Adresse: [[donee_address]], nachfolgend "Beschenkter" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Schenker überträgt unentgeltlich, und der Beschenkte erwirbt das Eigentum an der Wohnung unter der Adresse: <strong>[[apartment_address]]</strong>, mit einer Gesamtfläche von [[apartment_area]] qm, auf der Grundlage von [[ownership_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>SCHENKER:</strong></p>
                                            <p>[[donor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donor_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>BESCHENKTER:</strong></p>
                                            <p>[[donee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 18. Договор дарения доли в квартире ---
            [
                'slug' => 'apartment-share-gift-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"donor_name","type":"text","required":true,"labels":{"uk":"ПІБ дарувальника","en":"Donor\'s Full Name", "pl":"Imię i nazwisko darczyńcy", "de":"Vollständiger Name des Schenkers"}},
                    {"name":"donor_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані дарувальника","en":"Donor\'s Passport Details", "pl":"Dane paszportowe darczyńcy", "de":"Passdaten des Schenkers"}},
                    {"name":"donor_address","type":"text","required":true,"labels":{"uk":"Адреса проживання дарувальника","en":"Donor\'s residence address", "pl":"Adres zamieszkania darczyńcy", "de":"Wohnadresse des Schenkers"}},
                    {"name":"donee_name","type":"text","required":true,"labels":{"uk":"ПІБ обдаровуваного","en":"Donee\'s Full Name", "pl":"Imię i nazwisko obdarowanego", "de":"Vollständiger Name des Beschenkten"}},
                    {"name":"donee_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані обдаровуваного","en":"Donee\'s Passport Details", "pl":"Dane paszportowe obdarowanego", "de":"Passdaten des Beschenkten"}},
                    {"name":"donee_address","type":"text","required":true,"labels":{"uk":"Адреса проживання обдаровуваного","en":"Donee\'s residence address", "pl":"Adres zamieszkania obdarowanego", "de":"Wohnadresse des Beschenkten"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири","en":"Apartment Address", "pl":"Adres mieszkania", "de":"Wohnungsadresse"}},
                    {"name":"share_size","type":"text","required":true,"labels":{"uk":"Розмір частки (напр., 1/2, 1/3)","en":"Share Size (e.g., 1/2, 1/3)", "pl":"Rozmiar udziału (np. 1/2, 1/3)", "de":"Anteilgröße (z.B. 1/2, 1/3)"}},
                    {"name":"ownership_document","type":"text","required":true,"labels":{"uk":"Документ, що підтверджує право власності","en":"Document Confirming Ownership", "pl":"Dokument potwierdzający prawo własności", "de":"Eigentumsnachweis"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір дарування частки в квартирі',
                        'description' => 'Договір про безоплатну передачу права власності на частку в квартирі від дарувальника до обдаровуваного.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ДАРУВАННЯ ЧАСТКИ В КВАРТИРІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[donor_name]]</strong>, паспорт: [[donor_passport]], проживаю за адресою: [[donor_address]], надалі "Дарувальник", з одного боку, та
                                <strong>[[donee_name]]</strong>, паспорт: [[donee_passport]], проживаю за адресою: [[donee_address]], надалі "Обдаровуваний", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Дарувальник безоплатно передає, а Обдаровуваний приймає у власність частку [[share_size]] у квартирі за адресою: <strong>[[apartment_address]]</strong>, на підставі [[ownership_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ДАРУВАЛЬНИК:</strong></p>
                                            <p>[[donor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donor_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ОБДАРОВУВАНИЙ:</strong></p>
                                            <p>[[donee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Apartment Share Gift Agreement',
                        'description' => 'Agreement on the gratuitous transfer of ownership of a share in an apartment from donor to donee.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APARTMENT SHARE GIFT AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[donor_name]]</strong>, passport: [[donor_passport]], residing at: [[donor_address]], hereinafter "Donor", on the one hand, and
                                <strong>[[donee_name]]</strong>, passport: [[donee_passport]], residing at: [[donee_address]], hereinafter "Donee", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Donor gratuitously transfers, and the Donee accepts ownership of share [[share_size]] in the apartment located at: <strong>[[apartment_address]]</strong>, based on [[ownership_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>DONOR:</strong></p>
                                            <p>[[donor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donor_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>DONEE:</strong></p>
                                            <p>[[donee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa darowizny udziału w mieszkaniu',
                        'description' => 'Umowa o bezpłatne przeniesienie prawa własności udziału w mieszkaniu od darczyńcy do obdarowanego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA DAROWIZNY UDZIAŁU W MIESZKANIU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[donor_name]]</strong>, paszport: [[donor_passport]], zamieszkały(a) pod adresem: [[donor_address]], zwany(a) dalej "Darczyńcą", z jednej strony, oraz
                                <strong>[[donee_name]]</strong>, paszport: [[donee_passport]], zamieszkały(a) pod adresem: [[donee_address]], zwany(a) dalej "Obdarowanym", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Darczyńca bezpłatnie przekazuje, a Obdarowany przyjmuje na własność udział [[share_size]] w mieszkaniu położonym pod adresem: <strong>[[apartment_address]]</strong>, na podstawie [[ownership_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>DARCZYŃCA:</strong></p>
                                            <p>[[donor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donor_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>OBDAROWANY:</strong></p>
                                            <p>[[donee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Schenkungsvertrag für Wohnungsanteil',
                        'description' => 'Vertrag über die unentgeltliche Übertragung des Eigentums an einem Anteil an einer Wohnung vom Schenker an den Beschenkten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SCHENKUNGSVERTRAG FÜR WOHNUNGSANTEIL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[donor_name]]</strong>, Reisepass: [[donor_passport]], wohnhaft unter der Adresse: [[donor_address]], nachfolgend "Schenker" genannt, einerseits, und
                                <strong>[[donee_name]]</strong>, Reisepass: [[donee_passport]], wohnhaft unter der Adresse: [[donee_address]], nachfolgend "Beschenkter" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Schenker überträgt unentgeltlich, und der Beschenkte erwirbt das Eigentum an dem Anteil [[share_size]] an der Wohnung unter der Adresse: <strong>[[apartment_address]]</strong>, auf der Grundlage von [[ownership_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>SCHENKER:</strong></p>
                                            <p>[[donor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donor_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>BESCHENKTER:</strong></p>
                                            <p>[[donee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[donee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 19. Акт приема-передачи недвижимости при продаже ---
            [
                'slug' => 'real-estate-handover-act-sale-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання акту","en":"City of Act Compilation", "pl":"Miejscowość sporządzenia protokołu", "de":"Ort der Akterstellung"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"ПІБ продавця","en":"Seller\'s Full Name", "pl":"Imię i nazwisko sprzedawcy", "de":"Vollständiger Name des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"ПІБ покупця","en":"Buyer\'s Full Name", "pl":"Imię i nazwisko nabywcy", "de":"Vollständiger Name des Käufers"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"uk":"Адреса нерухомості","en":"Property Address", "pl":"Adres nieruchomości", "de":"Immobilienadresse"}},
                    {"name":"purchase_agreement_date","type":"date","required":true,"labels":{"uk":"Дата договору купівлі-продажу","en":"Purchase Agreement Date", "pl":"Data umowy kupna-sprzedaży", "de":"Datum des Kaufvertrags"}},
                    {"name":"meter_readings","type":"textarea","required":true,"labels":{"uk":"Показники лічильників (світло, вода, газ)","en":"Meter Readings (electricity, water, gas)", "pl":"Odczyty liczników (prąd, woda, gaz)", "de":"Zählerstände (Strom, Wasser, Gas)"}},
                    {"name":"condition_description","type":"textarea","required":true,"labels":{"uk":"Опис стану нерухомості","en":"Description of Property Condition", "pl":"Opis stanu nieruchomości", "de":"Beschreibung des Zustands der Immobilie"}},
                    {"name":"keys_transferred","type":"number","required":true,"labels":{"uk":"Кількість переданих ключів","en":"Number of Keys Transferred", "pl":"Liczba przekazanych kluczy", "de":"Anzahl der übergebenen Schlüssel"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Акт прийому-передачі нерухомості при продажу',
                        'description' => 'Документ, що фіксує факт передачі нерухомості від продавця до покупця після продажу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ ПРИЙОМУ-ПЕРЕДАЧІ НЕРУХОМОСТІ</h1><p>при продажу</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[seller_name]]</strong>, надалі "Продавець", з одного боку, та
                                <strong>[[buyer_name]]</strong>, надалі "Покупець", з іншого боку, склали цей Акт про наступне:</p>
                                <p>1. Продавець передав, а Покупець прийняв нерухомість за адресою: <strong>[[property_address]]</strong>, згідно з Договором купівлі-продажу від [[purchase_agreement_date]].</p>
                                <p>2. Показники лічильників на момент передачі:</p>
                                <p>[[meter_readings]]</p>
                                <p>3. Стан нерухомості: [[condition_description]].</p>
                                <p>4. Передано [[keys_transferred]] комплект(ів) ключів.</p>
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
                        'title' => 'Real Estate Handover Act (Sale)',
                        'description' => 'Document recording the transfer of real estate from seller to buyer after sale.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REAL ESTATE HANDOVER ACT</h1><p>for sale</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[seller_name]]</strong>, hereinafter "Seller", on the one hand, and
                                <strong>[[buyer_name]]</strong>, hereinafter "Buyer", on the other hand, have drawn up this Act as follows:</p>
                                <p>1. The Seller transferred, and the Buyer accepted the real estate located at: <strong>[[property_address]]</strong>, in accordance with the Purchase Agreement dated [[purchase_agreement_date]].</p>
                                <p>2. Meter readings at the time of handover:</p>
                                <p>[[meter_readings]]</p>
                                <p>3. Condition of the real estate: [[condition_description]].</p>
                                <p>4. [[keys_transferred]] set(s) of keys transferred.</p>
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
                        'title' => 'Protokół odbioru-przekazania nieruchomości przy sprzedaży',
                        'description' => 'Dokument rejestrujący fakt przekazania nieruchomości od sprzedawcy do nabywcy po sprzedaży.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ODBIORU-PRZEKAZANIA NIERUCHOMOŚCI</h1><p>przy sprzedaży</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[seller_name]]</strong>, zwany(a) dalej "Sprzedawcą", z jednej strony, oraz
                                <strong>[[buyer_name]]</strong>, zwany(a) dalej "Nabywcą", z drugiej strony, sporządziliśmy niniejszy Protokół:</p>
                                <p>1. Sprzedawca przekazał, a Nabywca przyjął nieruchomość położoną pod adresem: <strong>[[property_address]]</strong>, zgodnie z Umową kupna-sprzedaży z dnia [[purchase_agreement_date]].</p>
                                <p>2. Odczyty liczników w momencie przekazania:</p>
                                <p>[[meter_readings]]</p>
                                <p>3. Stan nieruchomości: [[condition_description]].</p>
                                <p>4. Przekazano [[keys_transferred]] komplet(ów) kluczy.</p>
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
                        'title' => 'Immobilienübergabeprotokoll (Verkauf)',
                        'description' => 'Dokument, das die Übergabe der Immobilie vom Verkäufer an den Käufer nach dem Verkauf festhält.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">IMMOBILIENÜBERGABEPROTOKOLL</h1><p>für Verkauf</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[seller_name]]</strong>, nachfolgend "Verkäufer" genannt, einerseits, und
                                <strong>[[buyer_name]]</strong>, nachfolgend "Käufer" genannt, andererseits, haben dieses Protokoll wie folgt erstellt:</p>
                                <p>1. Der Verkäufer hat die Immobilie unter der Adresse: <strong>[[property_address]]</strong>, gemäß dem Kaufvertrag vom [[purchase_agreement_date]] übergeben, und der Käufer hat sie übernommen.</p>
                                <p>2. Zählerstände zum Zeitpunkt der Übergabe:</p>
                                <p>[[meter_readings]]</p>
                                <p>3. Zustand der Immobilie: [[condition_description]].</p>
                                <p>4. [[keys_transferred]] Schlüsselset(s) übergeben.</p>
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

            // --- 20. Соглашение о задатке ---
            [
                'slug' => 'earnest-money-agreement-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"ПІБ продавця","en":"Seller\'s Full Name", "pl":"Imię i nazwisko sprzedawcy", "de":"Vollständiger Name des Verkäufers"}},
                    {"name":"seller_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані продавця","en":"Seller\'s Passport Details", "pl":"Dane paszportowe sprzedawcy", "de":"Passdaten des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"uk":"Адреса проживання продавця","en":"Seller\'s residence address", "pl":"Adres zamieszkania sprzedawcy", "de":"Wohnadresse des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"ПІБ покупця","en":"Buyer\'s Full Name", "pl":"Imię i nazwisko nabywcy", "de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані покупця","en":"Buyer\'s Passport Details", "pl":"Dane paszportowe nabywcy", "de":"Passdaten des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"uk":"Адреса проживання покупця","en":"Buyer\'s residence address", "pl":"Adres zamieszkania nabywcy", "de":"Wohnadresse des Käufers"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"uk":"Адреса нерухомості","en":"Property Address", "pl":"Adres nieruchomości", "de":"Immobilienadresse"}},
                    {"name":"sale_price","type":"number","required":true,"labels":{"uk":"Продажна ціна (грн)","en":"Sale Price (UAH)", "pl":"Cena sprzedaży (UAH)", "de":"Verkaufspreis (UAH)"}},
                    {"name":"earnest_money_amount","type":"number","required":true,"labels":{"uk":"Сума задатку (грн)","en":"Earnest Money Amount (UAH)", "pl":"Kwota zadatku (UAH)", "de":"Anzahlungsbetrag (UAH)"}},
                    {"name":"main_contract_date","type":"date","required":true,"labels":{"uk":"Дата укладення основного договору","en":"Main Contract Date", "pl":"Data zawarcia umowy głównej", "de":"Datum des Hauptvertrags"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Угода про задаток',
                        'description' => 'Документ, що підтверджує передачу задатку в якості забезпечення виконання зобов\'язань за договором.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА ПРО ЗАДАТОК</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[seller_name]]</strong>, паспорт: [[seller_passport]], проживаю за адресою: [[seller_address]], надалі "Продавець", з одного боку, та
                                <strong>[[buyer_name]]</strong>, паспорт: [[buyer_passport]], проживаю за адресою: [[buyer_address]], надалі "Покупець", з іншого боку, уклали цю Угоду про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ УГОДИ</h2>
                                <p>1.1. В якості забезпечення виконання зобов\'язань за попереднім договором купівлі-продажу нерухомості за адресою: <strong>[[property_address]]</strong>, Продавець отримав від Покупця задаток у розмірі <strong>[[earnest_money_amount]]</strong> грн.</p>
                                <p>1.2. Загальна вартість нерухомості становить <strong>[[sale_price]]</strong> грн.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. УМОВИ</h2>
                                <p>2.1. Основний договір купівлі-продажу має бути укладений до <strong>[[main_contract_date]]</strong>.</p>
                                <p>2.2. У разі невиконання зобов\'язань з вини Покупця, задаток залишається у Продавця. У разі невиконання з вини Продавця, він повертає Покупцю задаток у подвійному розмірі.</p>
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
                        'title' => 'Earnest Money Agreement',
                        'description' => 'Document confirming the transfer of earnest money as security for the fulfillment of obligations under the contract.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EARNEST MONEY AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[seller_name]]</strong>, passport: [[seller_passport]], residing at: [[seller_address]], hereinafter "Seller", on the one hand, and
                                <strong>[[buyer_name]]</strong>, passport: [[buyer_passport]], residing at: [[buyer_address]], hereinafter "Buyer", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. As security for the fulfillment of obligations under the preliminary real estate purchase and sale agreement for the property located at: <strong>[[property_address]]</strong>, the Seller has received from the Buyer earnest money in the amount of <strong>[[earnest_money_amount]]</strong> UAH.</p>
                                <p>1.2. The total value of the real estate is <strong>[[sale_price]]</strong> UAH.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. TERMS</h2>
                                <p>2.1. The main purchase and sale agreement must be concluded by <strong>[[main_contract_date]]</strong>.</p>
                                <p>2.2. In case of non-fulfillment of obligations due to the Buyer\'s fault, the earnest money remains with the Seller. In case of non-fulfillment due to the Seller\'s fault, the Seller returns the earnest money to the Buyer in double the amount.</p>
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
                        'title' => 'Umowa o zadatek',
                        'description' => 'Dokument potwierdzający przekazanie zadatku jako zabezpieczenie wykonania zobowiązań z umowy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O ZADATEK</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[seller_name]]</strong>, paszport: [[seller_passport]], zamieszkały(a) pod adresem: [[seller_address]], zwany(a) dalej "Sprzedawcą", z jednej strony, oraz
                                <strong>[[buyer_name]]</strong>, paszport: [[buyer_passport]], zamieszkały(a) pod adresem: [[buyer_address]], zwany(a) dalej "Nabywcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. W celu zabezpieczenia wykonania zobowiązań z przedwstępnej umowy sprzedaży nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>, Sprzedawca otrzymał od Nabywcy zadatek w wysokości <strong>[[earnest_money_amount]]</strong> UAH.</p>
                                <p>1.2. Całkowita wartość nieruchomości wynosi <strong>[[sale_price]]</strong> UAH.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. WARUNKI</h2>
                                <p>2.1. Główna umowa sprzedaży powinna zostać zawarta do <strong>[[main_contract_date]]</strong>.</p>
                                <p>2.2. W przypadku niewykonania zobowiązań z winy Nabywcy, zadatek pozostaje u Sprzedawcy. W przypadku niewykonania z winy Sprzedawcy, zwraca on Nabywcy zadatek w podwójnej wysokości.</p>
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
                        'title' => 'Anzahlungsvereinbarung',
                        'description' => 'Dokument, das die Übertragung einer Anzahlung als Sicherheit für die Erfüllung von Verpflichtungen aus einem Vertrag bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANZAHLUNGSVEREINBARUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[seller_name]]</strong>, Reisepass: [[seller_passport]], wohnhaft unter der Adresse: [[seller_address]], nachfolgend "Verkäufer" genannt, einerseits, und
                                <strong>[[buyer_name]]</strong>, Reisepass: [[buyer_passport]], wohnhaft unter der Adresse: [[buyer_address]], nachfolgend "Käufer" genannt, andererseits, haben diese Vereinbarung wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Zur Sicherung der Erfüllung der Verpflichtungen aus dem Vorvertrag über den Kauf und Verkauf der Immobilie unter der Adresse: <strong>[[property_address]]</strong>, hat der Verkäufer vom Käufer eine Anzahlung in Höhe von <strong>[[earnest_money_amount]]</strong> UAH erhalten.</p>
                                <p>1.2. Der Gesamtwert der Immobilie beträgt <strong>[[sale_price]]</strong> UAH.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. BEDINGUNGEN</h2>
                                <p>2.1. Der Hauptkaufvertrag muss bis zum <strong>[[main_contract_date]]</strong> abgeschlossen werden.</p>
                                <p>2.2. Im Falle der Nichterfüllung der Verpflichtungen aufgrund des Verschuldens des Käufers verbleibt die Anzahlung beim Verkäufer. Im Falle der Nichterfüllung aufgrund des Verschuldens des Verkäufers zahlt dieser die Anzahlung in doppelter Höhe an den Käufer zurück.</p>
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

            // --- 21. Согласие супруга на продажу недвижимости ---
            [
                'slug' => 'spousal-consent-property-sale-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання згоди","en":"City of Consent Compilation", "pl":"Miejscowość sporządzenia zgody", "de":"Ort der Zustimmungserklärung"}},
                    {"name":"consenting_spouse_name","type":"text","required":true,"labels":{"uk":"ПІБ дружини/чоловіка, що дає згоду","en":"Consenting Spouse\'s Full Name", "pl":"Imię i nazwisko małżonka wyrażającego zgodę", "de":"Vollständiger Name des zustimmenden Ehepartners"}},
                    {"name":"consenting_spouse_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані дружини/чоловіка","en":"Consenting Spouse\'s Passport Details", "pl":"Dane paszportowe małżonka", "de":"Passdaten des zustimmenden Ehepartners"}},
                    {"name":"consenting_spouse_address","type":"text","required":true,"labels":{"uk":"Адреса проживання дружини/чоловіка","en":"Consenting Spouse\'s residence address", "pl":"Adres zamieszkania małżonka", "de":"Wohnadresse des zustimmenden Ehepartners"}},
                    {"name":"other_spouse_name","type":"text","required":true,"labels":{"uk":"ПІБ дружини/чоловіка, що продає","en":"Other Spouse\'s Full Name (selling)", "pl":"Imię i nazwisko drugiego małżonka (sprzedającego)", "de":"Vollständiger Name des anderen Ehepartners (verkäuflich)"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"uk":"Адреса нерухомості","en":"Property Address", "pl":"Adres nieruchomości", "de":"Immobilienadresse"}},
                    {"name":"marriage_certificate_number","type":"text","required":true,"labels":{"uk":"Номер свідоцтва про шлюб","en":"Marriage Certificate Number", "pl":"Numer aktu małżeństwa", "de":"Nummer der Heiratsurkunde"}},
                    {"name":"marriage_date","type":"date","required":true,"labels":{"uk":"Дата реєстрації шлюбу","en":"Marriage Registration Date", "pl":"Data rejestracji małżeństwa", "de":"Datum der Eheschließung"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Згода чоловіка/дружини на продаж нерухомості',
                        'description' => 'Нотаріально посвідчена згода одного з подружжя на продаж спільного майна.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА-ЗГОДА</h1><p style="font-size: 14px;">на продаж нерухомості</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[consenting_spouse_name]]</strong>, паспорт: [[consenting_spouse_passport]], проживаю за адресою: [[consenting_spouse_address]], цим надаю свою згоду на продаж моїм(єю) чоловіком/дружиною <strong>[[other_spouse_name]]</strong> нерухомості за адресою: <strong>[[property_address]]</strong>.</p>
                                <p>Шлюб зареєстровано [[marriage_date]], свідоцтво про шлюб № [[marriage_certificate_number]].</p>
                                <p>Зміст ст. 65 Сімейного кодексу України мені роз\'яснено.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис: ___________________ ([[consenting_spouse_name]])</p>
                                <br/>
                                <p>Посвідчувальний напис нотаріуса:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Spousal Consent for Property Sale',
                        'description' => 'Notarized consent of one spouse for the sale of joint property.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CONSENT STATEMENT</h1><p style="font-size: 14px;">for property sale</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[consenting_spouse_name]]</strong>, passport: [[consenting_spouse_passport]], residing at: [[consenting_spouse_address]], hereby give my consent for my spouse <strong>[[other_spouse_name]]</strong> to sell the real estate located at: <strong>[[property_address]]</strong>.</p>
                                <p>Marriage registered on [[marriage_date]], marriage certificate No. [[marriage_certificate_number]].</p>
                                <p>The content of Article 65 of the Family Code of Ukraine has been explained to me.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[consenting_spouse_name]])</p>
                                <br/>
                                <p>Notary\'s certification:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zgoda małżonka na sprzedaż nieruchomości',
                        'description' => 'Notarialnie poświadczona zgoda jednego z małżonków na sprzedaż wspólnego majątku.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OŚWIADCZENIE O ZGODZIE</h1><p style="font-size: 14px;">na sprzedaż nieruchomości</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[consenting_spouse_name]]</strong>, paszport: [[consenting_spouse_passport]], zamieszkały(a) pod adresem: [[consenting_spouse_address]], niniejszym wyrażam zgodę na sprzedaż przez mojego(ą) małżonka(ę) <strong>[[other_spouse_name]]</strong> nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>.</p>
                                <p>Małżeństwo zarejestrowano w dniu [[marriage_date]], akt małżeństwa nr [[marriage_certificate_number]].</p>
                                <p>Treść art. 65 Kodeksu rodzinnego Ukrainy została mi wyjaśniona.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[consenting_spouse_name]])</p>
                                <br/>
                                <p>Poświadczenie notariusza:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Ehegattenzustimmung zum Immobilienverkauf',
                        'description' => 'Notariell beglaubigte Zustimmung eines Ehepartners zum Verkauf von Gemeinschaftseigentum.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EINVERSTÄNDNISERKLÄRUNG</h1><p style="font-size: 14px;">zum Immobilienverkauf</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[consenting_spouse_name]]</strong>, Reisepass: [[consenting_spouse_passport]], wohnhaft unter der Adresse: [[consenting_spouse_address]], erteile hiermit meine Zustimmung zum Verkauf der Immobilie unter der Adresse: <strong>[[property_address]]</strong> durch meinen Ehepartner <strong>[[other_spouse_name]]</strong>.</p>
                                <p>Eheschließung am [[marriage_date]], Heiratsurkunde Nr. [[marriage_certificate_number]].</p>
                                <p>Der Inhalt des Artikels 65 des Familiengesetzbuches der Ukraine wurde mir erläutert.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[consenting_spouse_name]])</p>
                                <br/>
                                <p>Notarielle Beglaubigung:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 22. Согласие супруга на покупку недвижимости ---
            [
                'slug' => 'spousal-consent-property-purchase-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання згоди","en":"City of Consent Compilation", "pl":"Miejscowość sporządzenia zgody", "de":"Ort der Zustimmungserklärung"}},
                    {"name":"consenting_spouse_name","type":"text","required":true,"labels":{"uk":"ПІБ дружини/чоловіка, що дає згоду","en":"Consenting Spouse\'s Full Name", "pl":"Imię i nazwisko małżonka wyrażającego zgodę", "de":"Vollständiger Name des zustimmenden Ehepartners"}},
                    {"name":"consenting_spouse_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані дружини/чоловіка","en":"Consenting Spouse\'s Passport Details", "pl":"Dane paszportowe małżonka", "de":"Passdaten des Ehepartners"}},
                    {"name":"consenting_spouse_address","type":"text","required":true,"labels":{"uk":"Адреса проживання дружини/чоловіка","en":"Consenting Spouse\'s residence address", "pl":"Adres zamieszkania małżonka", "de":"Wohnadresse des Ehepartners"}},
                    {"name":"other_spouse_name","type":"text","required":true,"labels":{"uk":"ПІБ дружини/чоловіка, що купує","en":"Other Spouse\'s Full Name (buying)", "pl":"Imię i nazwisko drugiego małżonka (kupującego)", "de":"Vollständiger Name des anderen Ehepartners (käuflich)"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"uk":"Адреса нерухомості","en":"Property Address", "pl":"Adres nieruchomości", "de":"Immobilienadresse"}},
                    {"name":"marriage_certificate_number","type":"text","required":true,"labels":{"uk":"Номер свідоцтва про шлюб","en":"Marriage Certificate Number", "pl":"Numer aktu małżeństwa", "de":"Nummer der Heiratsurkunde"}},
                    {"name":"marriage_date","type":"date","required":true,"labels":{"uk":"Дата реєстрації шлюбу","en":"Marriage Registration Date", "pl":"Data rejestracji małżeństwa", "de":"Datum der Eheschließung"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Згода чоловіка/дружини на покупку нерухомості',
                        'description' => 'Нотаріально посвідчена згода одного з подружжя на покупку спільного майна.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА-ЗГОДА</h1><p style="font-size: 14px;">на покупку нерухомості</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[consenting_spouse_name]]</strong>, паспорт: [[consenting_spouse_passport]], проживаю за адресою: [[consenting_spouse_address]], цим надаю свою згоду на покупку моїм(єю) чоловіком/дружиною <strong>[[other_spouse_name]]</strong> нерухомості за адресою: <strong>[[property_address]]</strong>.</p>
                                <p>Шлюб зареєстровано [[marriage_date]], свідоцтво про шлюб № [[marriage_certificate_number]].</p>
                                <p>Зміст ст. 65 Сімейного кодексу України мені роз\'яснено.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис: ___________________ ([[consenting_spouse_name]])</p>
                                <br/>
                                <p>Посвідчувальний напис нотаріуса:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Spousal Consent for Property Purchase',
                        'description' => 'Notarized consent of one spouse for the purchase of joint property.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CONSENT STATEMENT</h1><p style="font-size: 14px;">for property purchase</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[consenting_spouse_name]]</strong>, passport: [[consenting_spouse_passport]], residing at: [[consenting_spouse_address]], hereby give my consent for my spouse <strong>[[other_spouse_name]]</strong> to purchase the real estate located at: <strong>[[property_address]]</strong>.</p>
                                <p>Marriage registered on [[marriage_date]], marriage certificate No. [[marriage_certificate_number]].</p>
                                <p>The content of Article 65 of the Family Code of Ukraine has been explained to me.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[consenting_spouse_name]])</p>
                                <br/>
                                <p>Notary\'s certification:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zgoda małżonka na zakup nieruchomości',
                        'description' => 'Notarialnie poświadczona zgoda jednego z małżonków na zakup wspólnego majątku.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OŚWIADCZENIE O ZGODZIE</h1><p style="font-size: 14px;">na zakup nieruchomości</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[consenting_spouse_name]]</strong>, paszport: [[consenting_spouse_passport]], zamieszkały(a) pod adresem: [[consenting_spouse_address]], niniejszym wyrażam zgodę na zakup przez mojego(ą) małżonka(ę) <strong>[[other_spouse_name]]</strong> nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>.</p>
                                <p>Małżeństwo zarejestrowano w dniu [[marriage_date]], akt małżeństwa nr [[marriage_certificate_number]].</p>
                                <p>Treść art. 65 Kodeksu rodzinnego Ukrainy została mi wyjaśniona.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[consenting_spouse_name]])</p>
                                <br/>
                                <p>Poświadczenie notariusza:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Ehegattenzustimmung zum Immobilienerwerb',
                        'description' => 'Notariell beglaubigte Zustimmung eines Ehepartners zum Kauf von Gemeinschaftseigentum.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EINVERSTÄNDNISERKLÄRUNG</h1><p style="font-size: 14px;">zum Immobilienerwerb</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[consenting_spouse_name]]</strong>, Reisepass: [[consenting_spouse_passport]], wohnhaft unter der Adresse: [[consenting_spouse_address]], erteile hiermit meine Zustimmung zum Erwerb der Immobilie unter der Adresse: <strong>[[property_address]]</strong> durch meinen Ehepartner <strong>[[other_spouse_name]]</strong>.</p>
                                <p>Eheschließung am [[marriage_date]], Heiratsurkunde Nr. [[marriage_certificate_number]].</p>
                                <p>Der Inhalt des Artikels 65 des Familiengesetzbuches der Ukraine wurde mir erläutert.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[consenting_spouse_name]])</p>
                                <br/>
                                <p>Notarielle Beglaubigung:</p>
                                <p>____________________________________________________________________________________</p>
                            </div>'
                    ],
                ]
            ],
            // --- 23. Заявление в управляющую компанию (ЖЭК, ОСМД) ---
            [
                'slug' => 'application-management-company-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"management_company_name","type":"text","required":true,"labels":{"uk":"Назва управляючої компанії (ЖЕК, ОСББ)","en":"Management Company Name (Housing Office, HOA)", "pl":"Nazwa firmy zarządzającej (Zarząd Budynków Mieszkalnych, Wspólnota Mieszkaniowa)", "de":"Name der Verwaltungsgesellschaft (Wohnungsamt, WEG)"}},
                    {"name":"management_company_address","type":"text","required":true,"labels":{"uk":"Адреса управляючої компанії","en":"Management Company Address", "pl":"Adres firmy zarządzającej", "de":"Adresse der Verwaltungsgesellschaft"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"uk":"Адреса проживання заявника","en":"Applicant\'s residence address", "pl":"Adres zamieszkania wnioskodawcy", "de":"Wohnadresse des Antragstellers"}},
                    {"name":"application_subject","type":"text","required":true,"labels":{"uk":"Тема заяви","en":"Application Subject", "pl":"Temat wniosku", "de":"Betreff des Antrags"}},
                    {"name":"application_body","type":"textarea","required":true,"labels":{"uk":"Зміст заяви","en":"Application Content", "pl":"Treść wniosku", "de":"Inhalt des Antrags"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява в управляючу компанію (ЖЕК, ОСББ)',
                        'description' => 'Загальна форма заяви до управляючої компанії, ЖЕКу або ОСББ.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">який(а) проживає за адресою: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Щодо: [[application_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[application_body]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application to Management Company (Housing Office, HOA)',
                        'description' => 'General application form to a management company, housing office, or HOA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">residing at: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Regarding: [[application_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[application_body]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek do firmy zarządzającej (ZBM, Wspólnota Mieszkaniowa)',
                        'description' => 'Ogólny formularz wniosku do firmy zarządzającej, ZBM lub Wspólnoty Mieszkaniowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">zamieszkałego pod adresem: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Dotyczy: [[application_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[application_body]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag an die Verwaltungsgesellschaft (Wohnungsamt, WEG)',
                        'description' => 'Allgemeines Antragsformular an eine Verwaltungsgesellschaft, das Wohnungsamt oder die WEG.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">wohnhaft unter der Adresse: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Betreff: [[application_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[application_body]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 24. Заявление о протечке крыши ---
            [
                'slug' => 'roof-leak-application-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"management_company_name","type":"text","required":true,"labels":{"uk":"Назва управляючої компанії (ЖЕК, ОСББ)","en":"Management Company Name (Housing Office, HOA)", "pl":"Nazwa firmy zarządzającej (Zarząd Budynków Mieszkalnych, Wspólnota Mieszkaniowa)", "de":"Name der Verwaltungsgesellschaft (Wohnungsamt, WEG)"}},
                    {"name":"management_company_address","type":"text","required":true,"labels":{"uk":"Адреса управляючої компанії","en":"Management Company Address", "pl":"Adres firmy zarządzającej", "de":"Adresse der Verwaltungsgesellschaft"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"apartment_address","type":"text","required":true,"labels":{"uk":"Адреса квартири","en":"Apartment Address", "pl":"Adres mieszkania", "de":"Wohnungsadresse"}},
                    {"name":"leak_date","type":"date","required":true,"labels":{"uk":"Дата виявлення протечки","en":"Leak Detection Date", "pl":"Data wykrycia przecieku", "de":"Datum der Leckageentdeckung"}},
                    {"name":"leak_description","type":"textarea","required":true,"labels":{"uk":"Детальний опис протечки (місце, розмір, наслідки)","en":"Detailed Description of Leak (location, size, consequences)", "pl":"Szczegółowy opis przecieku (miejsce, rozmiar, konsekwencje)", "de":"Detaillierte Beschreibung des Lecks (Ort, Größe, Folgen)"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Вимоги (напр., усунути протечку, відшкодувати збитки)","en":"Demands (e.g., eliminate leak, compensate damages)", "pl":"Żądania (np. usunąć przeciek, zrekompensować szkody)", "de":"Forderungen (z.B. Beseitigung des Lecks, Schadensersatz)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява про протечку даху',
                        'description' => 'Заява до управляючої компанії про виявлення протечки даху та вимогу її усунення.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">який(а) проживає за адресою: [[apartment_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                                <p style="text-align: center;">про протечку даху</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Повідомляю про виявлення протечки даху у квартирі за адресою: <strong>[[apartment_address]]</strong>, [[leak_date]] року.</p>
                                <p>Детальний опис протечки: [[leak_description]].</p>
                                <p>На підставі вищевикладеного, вимагаю: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Roof Leak',
                        'description' => 'Application to the management company regarding a roof leak and a demand for its elimination.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">residing at: [[apartment_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                                <p style="text-align: center;">for roof leak</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby report the detection of a roof leak in the apartment located at: <strong>[[apartment_address]]</strong>, on [[leak_date]].</p>
                                <p>Detailed description of the leak: [[leak_description]].</p>
                                <p>Based on the above, I demand: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o przeciek dachu',
                        'description' => 'Wniosek do firmy zarządzającej dotyczący wykrycia przecieku dachu i żądanie jego usunięcia.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">zamieszkałego pod adresem: [[apartment_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                                <p style="text-align: center;">o przeciek dachu</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zgłaszam wykrycie przecieku dachu w mieszkaniu położonym pod adresem: <strong>[[apartment_address]]</strong>, w dniu [[leak_date]].</p>
                                <p>Szczegółowy opis przecieku: [[leak_description]].</p>
                                <p>Na podstawie powyższego, żądam: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Dachleckage',
                        'description' => 'Antrag an die Verwaltungsgesellschaft bezüglich eines Dachlecks und der Forderung nach dessen Beseitigung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">wohnhaft unter der Adresse: [[apartment_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                                <p style="text-align: center;">auf Dachleckage</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich melde hiermit die Feststellung eines Dachlecks in der Wohnung unter der Adresse: <strong>[[apartment_address]]</strong>, am [[leak_date]].</p>
                                <p>Detaillierte Beschreibung des Lecks: [[leak_description]].</p>
                                <p>Aufgrund des oben Gesagten fordere ich: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 25. Жалоба на соседей (на шум, затопление) ---
            [
                'slug' => 'neighbor-complaint-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"management_company_name","type":"text","required":true,"labels":{"uk":"Назва управляючої компанії (ЖЕК, ОСББ)","en":"Management Company Name (Housing Office, HOA)", "pl":"Nazwa firmy zarządzającej (Zarząd Budynków Mieszkalnych, Wspólnota Mieszkaniowa)", "de":"Name der Verwaltungsgesellschaft (Wohnungsamt, WEG)"}},
                    {"name":"management_company_address","type":"text","required":true,"labels":{"uk":"Адреса управляючої компанії","en":"Management Company Address", "pl":"Adres firmy zarządzającej", "de":"Adresse der Verwaltungsgesellschaft"}},
                    {"name":"complainant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Complainant\'s Full Name", "pl":"Imię i nazwisko skarżącego", "de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"uk":"Адреса проживання заявника","en":"Complainant\'s residence address", "pl":"Adres zamieszkania wnioskodawcy", "de":"Wohnadresse des Beschwerdeführers"}},
                    {"name":"neighbor_address","type":"text","required":true,"labels":{"uk":"Адреса сусідів","en":"Neighbor\'s Address", "pl":"Adres sąsiadów", "de":"Adresse der Nachbarn"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"uk":"Дата інциденту","en":"Incident Date", "pl":"Data incydentu", "de":"Datum des Vorfalls"}},
                    {"name":"incident_type","type":"text","required":true,"labels":{"uk":"Тип інциденту (шум, затоплення, інше)","en":"Incident Type (noise, flooding, other)", "pl":"Rodzaj incydentu (hałas, zalanie, inne)", "de":"Art des Vorfalls (Lärm, Überschwemmung, Sonstiges)"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"uk":"Детальний опис інциденту","en":"Detailed Description of Incident", "pl":"Szczegółowy opis incydentu", "de":"Detaillierte Beschreibung des Vorfalls"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Ваші вимоги (напр., вжити заходів, відшкодувати збитки)","en":"Your Demands (e.g., take action, compensate damages)", "pl":"Twoje żądania (np. podjąć działania, zrekompensować szkody)", "de":"Ihre Forderungen (z.B. Maßnahmen ergreifen, Schäden ersetzen)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Жалоба на сусідів (на шум, затоплення)',
                        'description' => 'Офіційна скарга до управляючої компанії на дії сусідів.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[complainant_name]]</p>
                                <p style="text-align: right;">який(а) проживає за адресою: [[complainant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">СКАРГА</h1>
                                <p style="text-align: center;">на сусідів</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Повідомляю про інцидент, що стався [[incident_date]] року за адресою: [[neighbor_address]], пов\'язаний з [[incident_type]].</p>
                                <p>Детальний опис: [[incident_description]].</p>
                                <p>На підставі вищевикладеного, вимагаю: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Complaint about Neighbors (noise, flooding)',
                        'description' => 'Official complaint to the management company about neighbors\' actions.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[complainant_name]]</p>
                                <p style="text-align: right;">residing at: [[complainant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">COMPLAINT</h1>
                                <p style="text-align: center;">about neighbors</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby report an incident that occurred on [[incident_date]] at: [[neighbor_address]], related to [[incident_type]].</p>
                                <p>Detailed description: [[incident_description]].</p>
                                <p>Based on the above, I demand: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Skarga na sąsiadów (hałas, zalanie)',
                        'description' => 'Oficjalna skarga do firmy zarządzającej na działania sąsiadów.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[complainant_name]]</p>
                                <p style="text-align: right;">zamieszkałego pod adresem: [[complainant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">SKARGA</h1>
                                <p style="text-align: center;">na sąsiadów</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zgłaszam incydent, który miał miejsce w dniu [[incident_date]] pod adresem: [[neighbor_address]], związany z [[incident_type]].</p>
                                <p>Szczegółowy opis: [[incident_description]].</p>
                                <p>Na podstawie powyższego, żądam: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Beschwerde über Nachbarn (Lärm, Überschwemmung)',
                        'description' => 'Offizielle Beschwerde an die Verwaltungsgesellschaft über Handlungen der Nachbarn.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[management_company_name]]</p>
                                <p style="text-align: right;">[[management_company_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[complainant_name]]</p>
                                <p style="text-align: right;">wohnhaft unter der Adresse: [[complainant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">BESCHWERDE</h1>
                                <p style="text-align: center;">über Nachbarn</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich melde hiermit einen Vorfall, der sich am [[incident_date]] unter der Adresse: [[neighbor_address]] ereignet hat, im Zusammenhang mit [[incident_type]].</p>
                                <p>Detaillierte Beschreibung: [[incident_description]].</p>
                                <p>Aufgrund des oben Gesagten fordere ich: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 26. Протокол общего собрания жильцов дома ---
            [
                'slug' => 'residents-meeting-protocol-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто проведення зборів","en":"City of Meeting", "pl":"Miejscowość zebrania", "de":"Ort der Versammlung"}},
                    {"name":"house_address","type":"text","required":true,"labels":{"uk":"Адреса будинку","en":"House Address", "pl":"Adres domu", "de":"Hausadresse"}},
                    {"name":"meeting_date","type":"date","required":true,"labels":{"uk":"Дата проведення зборів","en":"Meeting Date", "pl":"Data zebrania", "de":"Datum der Versammlung"}},
                    {"name":"meeting_time","type":"text","required":true,"labels":{"uk":"Час проведення зборів","en":"Meeting Time", "pl":"Godzina zebrania", "de":"Uhrzeit der Versammlung"}},
                    {"name":"total_apartments","type":"number","required":true,"labels":{"uk":"Всього квартир у будинку","en":"Total Apartments in Building", "pl":"Łączna liczba mieszkań w budynku", "de":"Gesamtzahl der Wohnungen im Gebäude"}},
                    {"name":"present_apartments","type":"number","required":true,"labels":{"uk":"Кількість присутніх квартир","en":"Number of Apartments Present", "pl":"Liczba obecnych mieszkań", "de":"Anzahl der anwesenden Wohnungen"}},
                    {"name":"quorum_present","type":"text","required":true,"labels":{"uk":"Кворум присутній (Так/Ні)","en":"Quorum Present (Yes/No)", "pl":"Kworum obecne (Tak/Nie)", "de":"Quorum vorhanden (Ja/Nein)"}},
                    {"name":"agenda_items","type":"textarea","required":true,"labels":{"uk":"Питання порядку денного та рішення по них","en":"Agenda Items and Decisions", "pl":"Punkty porządku obrad i decyzje", "de":"Tagesordnungspunkte und Beschlüsse"}},
                    {"name":"chairman_name","type":"text","required":true,"labels":{"uk":"ПІБ голови зборів","en":"Chairman\'s Full Name", "pl":"Imię i nazwisko przewodniczącego zebrania", "de":"Vollständiger Name des Vorsitzenden"}},
                    {"name":"secretary_name","type":"text","required":true,"labels":{"uk":"ПІБ секретаря зборів","en":"Secretary\'s Full Name", "pl":"Imię i nazwisko sekretarza zebrania", "de":"Vollständiger Name des Sekretärs"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Протокол загальних зборів жильців будинку',
                        'description' => 'Документ, що фіксує хід та рішення загальних зборів мешканців будинку (ОСББ).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПРОТОКОЛ № __</h1><p style="font-size: 14px;">Загальних зборів співвласників багатоквартирного будинку</p><p>за адресою: [[house_address]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[meeting_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Час проведення зборів: [[meeting_time]].</p>
                                <p>Всього квартир у будинку: [[total_apartments]]. Присутніх квартир: [[present_apartments]].</p>
                                <p>Кворум присутній: [[quorum_present]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ПОРЯДОК ДЕННИЙ ТА РІШЕННЯ</h2>
                                <p>[[agenda_items]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Голова зборів: ___________________ ([[chairman_name]])</p>
                                <p>Секретар зборів: ___________________ ([[secretary_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Protocol of General Meeting of Residents',
                        'description' => 'Document recording the proceedings and decisions of the general meeting of residents of a multi-apartment building (HOA).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOCOL No. __</h1><p style="font-size: 14px;">of the General Meeting of Co-owners of the Apartment Building</p><p>at: [[house_address]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[meeting_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Meeting time: [[meeting_time]].</p>
                                <p>Total apartments in the building: [[total_apartments]]. Apartments present: [[present_apartments]].</p>
                                <p>Quorum present: [[quorum_present]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">AGENDA AND DECISIONS</h2>
                                <p>[[agenda_items]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Chairman of the meeting: ___________________ ([[chairman_name]])</p>
                                <p>Secretary of the meeting: ___________________ ([[secretary_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Protokół ogólnego zebrania mieszkańców budynku',
                        'description' => 'Dokument rejestrujący przebieg i decyzje ogólnego zebrania mieszkańców budynku (wspólnoty mieszkaniowej).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ NR __</h1><p style="font-size: 14px;">Ogólnego zebrania współwłaścicieli budynku wielorodzinnego</p><p>pod adresem: [[house_address]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[meeting_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Godzina rozpoczęcia zebrania: [[meeting_time]].</p>
                                <p>Łączna liczba mieszkań w budynku: [[total_apartments]]. Liczba obecnych mieszkań: [[present_apartments]].</p>
                                <p>Kworum obecne: [[quorum_present]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">PORZĄDEK OBRAD I DECYZJE</h2>
                                <p>[[agenda_items]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Przewodniczący zebrania: ___________________ ([[chairman_name]])</p>
                                <p>Sekretarz zebrania: ___________________ ([[secretary_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Protokoll der Eigentümerversammlung',
                        'description' => 'Dokument, das den Verlauf und die Beschlüsse der Eigentümerversammlung eines Mehrfamilienhauses (WEG) festhält.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKOLL NR. __</h1><p style="font-size: 14px;">der Eigentümerversammlung des Mehrfamilienhauses</p><p>unter der Adresse: [[house_address]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[meeting_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Uhrzeit der Versammlung: [[meeting_time]].</p>
                                <p>Gesamtzahl der Wohnungen im Gebäude: [[total_apartments]]. Anwesende Wohnungen: [[present_apartments]].</p>
                                <p>Quorum vorhanden: [[quorum_present]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">TAGESORDNUNG UND BESCHLÜSSE</h2>
                                <p>[[agenda_items]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Vorsitzender der Versammlung: ___________________ ([[chairman_name]])</p>
                                <p>Sekretär der Versammlung: ___________________ ([[secretary_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 27. Доверенность на продажу/покупку недвижимости ---
            [
                'slug' => 'power-of-attorney-real-estate-ua',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто складання довіреності","en":"City of Power of Attorney Compilation", "pl":"Miejscowość sporządzenia pełnomocnictwa", "de":"Ort der Vollmachtserstellung"}},
                    {"name":"principal_name","type":"text","required":true,"labels":{"uk":"ПІБ довірителя","en":"Principal\'s Full Name", "pl":"Imię i nazwisko mocodawcy", "de":"Vollständiger Name des Vollmachtgebers"}},
                    {"name":"principal_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані довірителя","en":"Principal\'s Passport Details", "pl":"Dane paszportowe mocodawcy", "de":"Passdaten des Vollmachtgebers"}},
                    {"name":"principal_address","type":"text","required":true,"labels":{"uk":"Адреса проживання довірителя","en":"Principal\'s residence address", "pl":"Adres zamieszkania mocodawcy", "de":"Wohnadresse des Vollmachtgebers"}},
                    {"name":"attorney_name","type":"text","required":true,"labels":{"uk":"ПІБ представника","en":"Attorney\'s Full Name", "pl":"Imię i nazwisko pełnomocnika", "de":"Vollständiger Name des Bevollmächtigten"}},
                    {"name":"attorney_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані представника","en":"Attorney\'s Passport Details", "pl":"Dane paszportowe pełnomocnika", "de":"Passdaten des Bevollmächtigten"}},
                    {"name":"attorney_address","type":"text","required":true,"labels":{"uk":"Адреса проживання представника","en":"Attorney\'s residence address", "pl":"Adres zamieszkania pełnomocnika", "de":"Wohnadresse des Bevollmächtigten"}},
                    {"name":"property_address","type":"text","required":true,"labels":{"uk":"Адреса нерухомості","en":"Property Address", "pl":"Adres nieruchomości", "de":"Immobilienadresse"}},
                    {"name":"action_type","type":"text","required":true,"labels":{"uk":"Вид дії (продаж/купівля)","en":"Type of Action (sale/purchase)", "pl":"Rodzaj czynności (sprzedaż/zakup)", "de":"Art der Handlung (Verkauf/Kauf)"}},
                    {"name":"powers_description","type":"textarea","required":true,"labels":{"uk":"Перелік повноважень представника","en":"List of Attorney\'s Powers", "pl":"Wykaz uprawnień pełnomocnika", "de":"Liste der Befugnisse des Bevollmächtigten"}},
                    {"name":"validity_months","type":"number","required":true,"labels":{"uk":"Термін дії довіреності (місяців)","en":"Power of Attorney Validity (months)", "pl":"Okres ważności pełnomocnictwa (miesiące)", "de":"Gültigkeitsdauer der Vollmacht (Monate)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Довіреність на продаж/купівлю нерухомості',
                        'description' => 'Документ, що уповноважує одну особу діяти від імені іншої при операціях з нерухомістю.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1><p style="font-size: 14px;">на [[action_type]] нерухомості</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[principal_name]]</strong>, паспорт: [[principal_passport]], проживаю за адресою: [[principal_address]], цим уповноважую:</p>
                                <p><strong>[[attorney_name]]</strong>, паспорт: [[attorney_passport]], проживаю за адресою: [[attorney_address]],</p>
                                <p>здійснювати [[action_type]] нерухомості за адресою: <strong>[[property_address]]</strong>.</p>
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
                        'title' => 'Power of Attorney for Real Estate Sale/Purchase',
                        'description' => 'Document authorizing one person to act on behalf of another in real estate transactions.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1><p style="font-size: 14px;">for real estate [[action_type]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[principal_name]]</strong>, passport: [[principal_passport]], residing at: [[principal_address]], hereby authorize:</p>
                                <p><strong>[[attorney_name]]</strong>, passport: [[attorney_passport]], residing at: [[attorney_address]],</p>
                                <p>to carry out the [[action_type]] of real estate located at: <strong>[[property_address]]</strong>.</p>
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
                        'title' => 'Pełnomocnictwo do sprzedaży/zakupu nieruchomości',
                        'description' => 'Dokument upoważniający jedną osobę do działania w imieniu innej w transakcjach nieruchomościowych.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 14px;">do [[action_type]] nieruchomości</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[principal_name]]</strong>, paszport: [[principal_passport]], zamieszkały(a) pod adresem: [[principal_address]], niniejszym upoważniam:</p>
                                <p><strong>[[attorney_name]]</strong>, paszport: [[attorney_passport]], zamieszkały(a) pod adresem: [[attorney_address]],</p>
                                <p>do dokonania [[action_type]] nieruchomości położonej pod adresem: <strong>[[property_address]]</strong>.</p>
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
                        'title' => 'Vollmacht für Immobilienverkauf/Kauf',
                        'description' => 'Dokument, das eine Person ermächtigt, im Namen einer anderen Person bei Immobilientransaktionen zu handeln.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1><p style="font-size: 14px;">für Immobilien- [[action_type]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[principal_name]]</strong>, Reisepass: [[principal_passport]], wohnhaft unter der Adresse: [[principal_address]], bevollmächtige hiermit:</p>
                                <p><strong>[[attorney_name]]</strong>, Reisepass: [[attorney_passport]], wohnhaft unter der Adresse: [[attorney_address]],</p>
                                <p>den Immobilien- [[action_type]] unter der Adresse: <strong>[[property_address]]</strong> durchzuführen.</p>
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
