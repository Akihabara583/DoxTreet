<?php

namespace Database\Seeders\UA;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Support\Arr;

class UaWorkSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'work-ua')->first();
        if (!$category) {
            $this->command->error('Category with slug "work" not found.');
            return;
        }

        $templatesData = [
            // --- 1. Трудовий договір (безстроковий) - ФІНАЛЬНА ВЕРСІЯ ---
            [
                'slug' => 'permanent-employment-contract-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Повна назва роботодавця (ТОВ «Ромашка»)", "en":"Employer Full Name", "pl":"Pełna nazwa pracodawcy", "de":"Vollständiger Name des Arbeitgebers"}},
                    {"name":"company_edrpou","type":"text","required":true,"labels":{"uk":"Код ЄДРПОУ роботодавця", "en":"Employer EDRPOU Code", "pl":"Kod EDRPOU pracodawcy", "de":"EDRPOU-Code des Arbeitgebers"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"uk":"Юридична адреса роботодавця", "en":"Employer Legal Address", "pl":"Adres prawny pracodawcy", "de":"Rechtsanschrift des Arbeitgebers"}},
                    {"name":"director_name","type":"text","required":true,"labels":{"uk":"ПІБ та посада представника (в особі Директора Іванова І.І.)", "en":"Employer Representative (Director John Doe)", "pl":"Imię i nazwisko oraz stanowisko przedstawiciela (np. Dyrektor Jan Kowalski)", "de":"Name und Position des Vertreters (z.B. Direktor Max Mustermann)"}},
                    {"name":"basis_document","type":"text","required":true,"labels":{"uk":"Що діє на підставі (напр., Статуту)", "en":"Acting on the basis of (e.g., Charter)", "pl":"Działający na podstawie (np. Statutu)", "de":"Handelnd auf Grundlage (z.B. der Satzung)"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"uk":"ПІБ працівника", "en":"Employee Name", "pl":"Imię i nazwisko pracownika", "de":"Name des Arbeitnehmers"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"uk":"Адреса реєстрації працівника", "en":"Employee Registered Address", "pl":"Adres zameldowania pracownika", "de":"Meldeadresse des Arbeitnehmers"}},
                    {"name":"employee_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані працівника (Серія, номер, ким і коли виданий)", "en":"Employee Passport Details", "pl":"Dane paszportowe pracownika (Seria, numer, przez kogo i kiedy wydany)", "de":"Passdaten des Arbeitnehmers (Serie, Nummer, ausstellende Behörde und Datum)"}},
                    {"name":"employee_rnekpp","type":"text","required":true,"labels":{"uk":"РНОКПП працівника (ІПН)", "en":"Employee RNEKPP (TIN)", "pl":"RNEKPP pracownika (NIP)", "de":"RNEKPP des Arbeitnehmers (Steuernummer)"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада працівника (згідно зі штатним розписом)", "en":"Employee Position", "pl":"Stanowisko pracownika (zgodnie z etatem)", "de":"Position des Arbeitnehmers (gemäß Stellenplan)"}},
                    {"name":"work_start_date","type":"date","required":true,"labels":{"uk":"Дата початку роботи", "en":"Work Start Date", "pl":"Data rozpoczęcia pracy", "de":"Arbeitsbeginn"}},
                    {"name":"work_schedule","type":"textarea","required":true,"labels":{"uk":"Режим роботи (напр., 5-денний робочий тиждень, з 9:00 до 18:00)", "en":"Work Schedule (e.g., 5-day week, 9:00-18:00)", "pl":"Tryb pracy (np. 5-dniowy tydzień pracy, od 9:00 do 18:00)", "de":"Arbeitszeit (z.B. 5-Tage-Woche, 9:00-18:00 Uhr)"}},
                    {"name":"annual_leave_days","type":"number","required":true,"labels":{"uk":"Тривалість щорічної відпустки (календарних днів)", "en":"Annual Leave Duration (calendar days)", "pl":"Długość urlopu wypoczynkowego (dni kalendarzowych)", "de":"Dauer des Jahresurlaubs (Kalendertage)"}},
                    {"name":"salary_amount","type":"number","required":true,"labels":{"uk":"Розмір посадового окладу (грн, до вирахування податків)", "en":"Salary Amount (UAH, gross)", "pl":"Wysokość wynagrodzenia zasadniczego (UAH, brutto)", "de":"Höhe des Gehalts (UAH, brutto)"}},
                    {"name":"salary_payment_dates","type":"text","required":true,"labels":{"uk":"Дати виплати зарплати (напр., за першу половину місяця - 22 числа, за другу - 7 числа)", "en":"Salary Payment Dates (e.g., for the first half of the month - 22nd, for the second - 7th)", "pl":"Terminy wypłaty wynagrodzenia (np. za pierwszą połowę miesiąca - 22. dnia, za drugą - 7. dnia)", "de":"Gehaltszahlungstermine (z.B. für die erste Monatshälfte - am 22., für die zweite - am 7.)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Трудовий договір (безстроковий)',
                        'description' => 'Всеосяжний офіційний документ, що регулює трудові відносини між працівником та роботодавцем на невизначений термін згідно КЗпП України.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ТРУДОВИЙ ДОГОВІР</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[company_name]]</strong> (код ЄДРПОУ [[company_edrpou]]), надалі "Роботодавець", в особі [[director_name]], що діє на підставі [[basis_document]], з однієї сторони, та
                                громадянин(ка) України <strong>[[employee_name]]</strong> (РНОКПП [[employee_rnekpp]], паспорт: [[employee_passport]]), надалі "Працівник", з іншої сторони, разом іменовані "Сторони", уклали цей договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Працівник приймається на роботу в <strong>[[company_name]]</strong> на посаду <strong>[[employee_position]]</strong>.</p>
                                <p>1.2. Цей договір є безстроковим. Працівник зобов\'язаний приступити до виконання своїх обов\'язків з [[work_start_date]].</p>
                                <p>1.3. Місцем виконання роботи є офіс Роботодавця за адресою: [[company_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ПРАВА ТА ОБОВ\'ЯЗКИ СТОРІН</h2>
                                <p>2.1. <strong>Працівник зобов\'язується:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Сумлінно виконувати свої трудові обов\'язки, покладені на нього цим договором та посадовою інструкцією.</li>
                                    <li>Дотримуватися правил внутрішнього трудового розпорядку, вимог з охорони праці та пожежної безпеки.</li>
                                    <li>Дбайливо ставитися до майна Роботодавця.</li>
                                </ol>
                                <p>2.2. <strong>Працівник має право на:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Безпечні та здорові умови праці.</li>
                                    <li>Своєчасну та в повному обсязі виплату заробітної плати.</li>
                                    <li>Щорічну оплачувану відпустку та інші соціальні гарантії, передбачені законодавством.</li>
                                </ol>
                                <p>2.3. <strong>Роботодавець зобов\'язується:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Забезпечити Працівника роботою згідно з умовами цього договору.</li>
                                    <li>Створити належні умови праці, необхідні для виконання Працівником своїх обов\'язків.</li>
                                    <li>Своєчасно виплачувати Працівнику заробітну плату.</li>
                                </ol>
                                <p>2.4. <strong>Роботодавець має право:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Вимагати від Працівника належного виконання трудових обов\'язків.</li>
                                    <li>Застосовувати до Працівника заходи дисциплінарного стягнення в порядку, встановленому законодавством.</li>
                                </ol>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. РОБОЧИЙ ЧАС ТА ЧАС ВІДПОЧИНКУ</h2>
                                <p>3.1. Працівнику встановлюється такий режим робочого часу: [[work_schedule]].</p>
                                <p>3.2. Працівнику надається щорічна основна оплачувана відпустка тривалістю <strong>[[annual_leave_days]]</strong> календарних днів.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. ОПЛАТА ПРАЦІ</h2>
                                <p>4.1. За виконання трудових обов\'язків Працівнику встановлюється посадовий оклад у розмірі <strong>[[salary_amount]]</strong> гривень на місяць.</p>
                                <p>4.2. Заробітна плата виплачується двічі на місяць в терміни: [[salary_payment_dates]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. ВІДПОВІДАЛЬНІСТЬ СТОРІН І ВИРІШЕННЯ СПОРІВ</h2>
                                <p>5.1. У випадку невиконання або неналежного виконання обов\'язків, передбачених цим договором, Сторони несуть відповідальність згідно з чинним законодавством України.</p>
                                <p>5.2. Усі спори, що виникають між Сторонами, вирішуються шляхом переговорів, а у разі недосягнення згоди – у судовому порядку.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">6. ЗАКЛЮЧНІ ПОЛОЖЕННЯ</h2>
                                <p>6.1. Цей договір складено у двох примірниках, які мають однакову юридичну силу, по одному для кожної зі Сторін.</p>
                                <p>6.2. Умови цього договору можуть бути змінені тільки за взаємною згодою Сторін шляхом укладення додаткової угоди.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">РЕКВІЗИТИ ТА ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>РОБОТОДАВЕЦЬ:</strong></p>
                                            <br/>
                                            <p><strong>[[company_name]]</strong></p>
                                            <p>Адреса: [[company_address]]</p>
                                            <p>Код ЄДРПОУ: [[company_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ПРАЦІВНИК:</strong></p>
                                            <br/>
                                            <p><strong>[[employee_name]]</strong></p>
                                            <p>Адреса: [[employee_address]]</p>
                                            <p>РНОКПП: [[employee_rnekpp]]</p>
                                            <p>Паспорт: [[employee_passport]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Permanent Employment Contract (Full Version)',
                        'description' => 'A comprehensive official document governing the employment relationship between an employee and an employer for an indefinite term according to the Labor Code of Ukraine.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EMPLOYMENT CONTRACT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[company_name]]</strong> (EDRPOU Code [[company_edrpou]]), hereinafter "Employer", represented by [[director_name]], acting on the basis of [[basis_document]], on the one hand, and
                                citizen of Ukraine <strong>[[employee_name]]</strong> (RNEKPP [[employee_rnekpp]], passport: [[employee_passport]]), hereinafter "Employee", on the other hand, collectively referred to as "Parties", have concluded this agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Employee is hired by <strong>[[company_name]]</strong> for the position of <strong>[[employee_position]]</strong>.</p>
                                <p>1.2. This agreement is for an indefinite term. The Employee shall commence duties on [[work_start_date]].</p>
                                <p>1.3. The place of work is the Employer\'s office at: [[company_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. RIGHTS AND OBLIGATIONS OF THE PARTIES</h2>
                                <p>2.1. <strong>The Employee undertakes to:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Conscientiously perform their labor duties assigned by this agreement and job description.</li>
                                    <li>Comply with internal labor regulations, labor protection, and fire safety requirements.</li>
                                    <li>Handle the Employer\'s property with care.</li>
                                </ol>
                                <p>2.2. <strong>The Employee has the right to:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Safe and healthy working conditions.</li>
                                    <li>Timely and full payment of wages.</li>
                                    <li>Annual paid leave and other social guarantees provided by law.</li>
                                </ol>
                                <p>2.3. <strong>The Employer undertakes to:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Provide the Employee with work in accordance with the terms of this agreement.</li>
                                    <li>Create proper working conditions necessary for the Employee to perform their duties.</li>
                                    <li>Pay wages to the Employee in a timely manner.</li>
                                </ol>
                                <p>2.4. <strong>The Employer has the right to:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Demand proper performance of labor duties from the Employee.</li>
                                    <li>Apply disciplinary measures to the Employee in the manner prescribed by law.</li>
                                </ol>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. WORKING HOURS AND REST PERIODS</h2>
                                <p>3.1. The Employee\'s working hours are set as: [[work_schedule]].</p>
                                <p>3.2. The Employee is granted annual basic paid leave lasting <strong>[[annual_leave_days]]</strong> calendar days.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. REMUNERATION</h2>
                                <p>4.1. For the performance of labor duties, the Employee is set a salary of <strong>[[salary_amount]]</strong> UAH per month.</p>
                                <p>4.2. Wages are paid twice a month on the following dates: [[salary_payment_dates]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. RESPONSIBILITY OF THE PARTIES AND DISPUTE RESOLUTION</h2>
                                <p>5.1. In case of non-performance or improper performance of obligations under this agreement, the Parties shall be liable in accordance with the current legislation of Ukraine.</p>
                                <p>5.2. All disputes arising between the Parties shall be resolved through negotiations, and if no agreement is reached – in court.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">6. FINAL PROVISIONS</h2>
                                <p>6.1. This agreement is drawn up in two copies, having equal legal force, one for each Party.</p>
                                <p>6.2. The terms of this agreement may be changed only by mutual agreement of the Parties by concluding an additional agreement.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">DETAILS AND SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>EMPLOYER:</strong></p>
                                            <br/>
                                            <p><strong>[[company_name]]</strong></p>
                                            <p>Address: [[company_address]]</p>
                                            <p>EDRPOU Code: [[company_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>EMPLOYEE:</strong></p>
                                            <br/>
                                            <p><strong>[[employee_name]]</strong></p>
                                            <p>Address: [[employee_address]]</p>
                                            <p>RNEKPP: [[employee_rnekpp]]</p>
                                            <p>Passport: [[employee_passport]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o pracę na czas nieokreślony',
                        'description' => 'Kompleksowy oficjalny dokument regulujący stosunek pracy między pracownikiem a pracodawcą na czas nieokreślony zgodnie z Kodeksem Pracy Ukrainy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O PRACĘ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[company_name]]</strong> (Kod EDRPOU [[company_edrpou]]), zwany dalej "Pracodawcą", reprezentowany przez [[director_name]], działający na podstawie [[basis_document]], z jednej strony, oraz
                                obywatel(ka) Ukrainy <strong>[[employee_name]]</strong> (RNEKPP [[employee_rnekpp]], paszport: [[employee_passport]]), zwany dalej "Pracownikiem", z drugiej strony, łącznie zwani "Stronami", zawarli niniejszą umowę o następujące:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Pracownik jest zatrudniony w <strong>[[company_name]]</strong> na stanowisku <strong>[[employee_position]]</strong>.</p>
                                <p>1.2. Niniejsza umowa jest na czas nieokreślony. Pracownik zobowiązany jest przystąpić do wykonywania swoich obowiązków od [[work_start_date]].</p>
                                <p>1.3. Miejscem wykonywania pracy jest siedziba Pracodawcy pod adresem: [[company_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. PRAWA I OBOWIĄZKI STRON</h2>
                                <p>2.1. <strong>Pracownik zobowiązuje się do:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Sumiennego wykonywania swoich obowiązków pracowniczych nałożonych niniejszą umową i opisem stanowiska.</li>
                                    <li>Przestrzegania regulaminu pracy, wymogów bezpieczeństwa i higieny pracy oraz przepisów przeciwpożarowych.</li>
                                    <li>Dbania o mienie Pracodawcy.</li>
                                </ol>
                                <p>2.2. <strong>Pracownik ma prawo do:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Bezpiecznych i higienicznych warunków pracy.</li>
                                    <li>Terminowej i pełnej wypłaty wynagrodzenia.</li>
                                    <li>Corocznego płatnego urlopu i innych gwarancji socjalnych przewidzianych prawem.</li>
                                </ol>
                                <p>2.3. <strong>Pracodawca zobowiązuje się do:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Zapewnienia Pracownikowi pracy zgodnie z warunkami niniejszej umowy.</li>
                                    <li>Stworzenia odpowiednich warunków pracy, niezbędnych do wykonywania przez Pracownika jego obowiązków.</li>
                                    <li>Terminowego wypłacania Pracownikowi wynagrodzenia.</li>
                                </ol>
                                <p>2.4. <strong>Pracodawca ma prawo do:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Wymagania od Pracownika należytego wykonywania obowiązków pracowniczych.</li>
                                    <li>Stosowania wobec Pracownika środków dyscyplinarnych w trybie przewidzianym prawem.</li>
                                </ol>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. CZAS PRACY I CZAS ODPOCZYNKU</h2>
                                <p>3.1. Pracownikowi ustala się następujący tryb czasu pracy: [[work_schedule]].</p>
                                <p>3.2. Pracownikowi przysługuje coroczny podstawowy płatny urlop w wymiarze <strong>[[annual_leave_days]]</strong> dni kalendarzowych.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. WYNAGRODZENIE</h2>
                                <p>4.1. Za wykonywanie obowiązków pracowniczych Pracownikowi ustala się wynagrodzenie zasadnicze w wysokości <strong>[[salary_amount]]</strong> UAH miesięcznie.</p>
                                <p>4.2. Wynagrodzenie wypłacane jest dwa razy w miesiącu w terminach: [[salary_payment_dates]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. ODPOWIEDZIALNOŚĆ STRON I ROZWIĄZYWANIE SPORÓW</h2>
                                <p>5.1. W przypadku niewykonania lub nienależytego wykonania obowiązków przewidzianych niniejszą umową, Strony ponoszą odpowiedzialność zgodnie z obowiązującym prawem Ukrainy.</p>
                                <p>5.2. Wszelkie spory wynikające między Stronami rozstrzygane są w drodze negocjacji, a w przypadku braku porozumienia – na drodze sądowej.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">6. POSTANOWIENIA KOŃCOWE</h2>
                                <p>6.1. Niniejsza umowa sporządzona została w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze Stron.</p>
                                <p>6.2. Warunki niniejszej umowy mogą być zmienione wyłącznie za obopólną zgodą Stron w drodze zawarcia dodatkowego porozumienia.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">DANE I PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>PRACODAWCA:</strong></p>
                                            <br/>
                                            <p><strong>[[company_name]]</strong></p>
                                            <p>Adres: [[company_address]]</p>
                                            <p>Kod EDRPOU: [[company_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>PRACOWNIK:</strong></p>
                                            <br/>
                                            <p><strong>[[employee_name]]</strong></p>
                                            <p>Adres: [[employee_address]]</p>
                                            <p>RNEKPP: [[employee_rnekpp]]</p>
                                            <p>Paszport: [[employee_passport]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Unbefristeter Arbeitsvertrag',
                        'description' => 'Ein umfassendes offizielles Dokument zur Regelung des Arbeitsverhältnisses zwischen Arbeitnehmer und Arbeitgeber auf unbestimmte Zeit gemäß dem Arbeitsgesetzbuch der Ukraine.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ARBEITSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[company_name]]</strong> (EDRPOU-Code [[company_edrpou]]), nachfolgend "Arbeitgeber" genannt, vertreten durch [[director_name]], handelnd auf der Grundlage von [[basis_document]], einerseits, und
                                ukrainischer Staatsbürger <strong>[[employee_name]]</strong> (RNEKPP [[employee_rnekpp]], Reisepass: [[employee_passport]]), nachfolgend "Arbeitnehmer" genannt, andererseits, gemeinsam als "Parteien" bezeichnet, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Arbeitnehmer wird bei <strong>[[company_name]]</strong> auf der Position <strong>[[employee_position]]</strong> eingestellt.</p>
                                <p>1.2. Dieser Vertrag ist unbefristet. Der Arbeitnehmer ist verpflichtet, seine Aufgaben ab dem [[work_start_date]] aufzunehmen.</p>
                                <p>1.3. Der Arbeitsort ist das Büro des Arbeitgebers unter der Adresse: [[company_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. RECHTE UND PFLICHTEN DER PARTEIEN</h2>
                                <p>2.1. <strong>Der Arbeitnehmer verpflichtet sich:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Seine Arbeitsaufgaben, die ihm durch diesen Vertrag und die Stellenbeschreibung übertragen wurden, gewissenhaft zu erfüllen.</li>
                                    <li>Die internen Arbeitsvorschriften, die Anforderungen an Arbeitsschutz und Brandschutz einzuhalten.</li>
                                    <li>Das Eigentum des Arbeitgebers sorgfältig zu behandeln.</li>
                                </ol>
                                <p>2.2. <strong>Der Arbeitnehmer hat das Recht auf:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Sichere und gesunde Arbeitsbedingungen.</li>
                                    <li>Rechtzeitige und vollständige Gehaltszahlung.</li>
                                    <li>Jährlichen bezahlten Urlaub und andere gesetzlich vorgesehene Sozialleistungen.</li>
                                </ol>
                                <p>2.3. <strong>Der Arbeitgeber verpflichtet sich:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Dem Arbeitnehmer Arbeit gemäß den Bedingungen dieses Vertrags zur Verfügung zu stellen.</li>
                                    <li>Angemessene Arbeitsbedingungen zu schaffen, die für die Erfüllung der Aufgaben des Arbeitnehmers erforderlich sind.</li>
                                    <li>Dem Arbeitnehmer das Gehalt pünktlich auszuzahlen.</li>
                                </ol>
                                <p>2.4. <strong>Der Arbeitgeber hat das Recht:</strong></p>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li>Die ordnungsgemäße Erfüllung der Arbeitsaufgaben vom Arbeitnehmer zu verlangen.</li>
                                    <li>Disziplinarmaßnahmen gegenüber dem Arbeitnehmer in der gesetzlich vorgeschriebenen Weise anzuwenden.</li>
                                </ol>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ARBEITSZEIT UND RUHEZEITEN</h2>
                                <p>3.1. Die Arbeitszeiten des Arbeitnehmers sind wie folgt festgelegt: [[work_schedule]].</p>
                                <p>3.2. Dem Arbeitnehmer wird ein jährlicher bezahlter Grundurlaub von <strong>[[annual_leave_days]]</strong> Kalendertagen gewährt.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. VERGÜTUNG</h2>
                                <p>4.1. Für die Erfüllung der Arbeitsaufgaben wird dem Arbeitnehmer ein Grundgehalt von <strong>[[salary_amount]]</strong> UAH pro Monat festgelegt.</p>
                                <p>4.2. Die Gehälter werden zweimal im Monat zu folgenden Terminen ausgezahlt: [[salary_payment_dates]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. VERANTWORTUNG DER PARTEIEN UND STREITBEILEGUNG</h2>
                                <p>5.1. Im Falle der Nichterfüllung oder unsachgemäßen Erfüllung der in diesem Vertrag vorgesehenen Pflichten haften die Parteien gemäß der geltenden Gesetzgebung der Ukraine.</p>
                                <p>5.2. Alle zwischen den Parteien entstehenden Streitigkeiten werden durch Verhandlungen beigelegt, und falls keine Einigung erzielt wird, gerichtlich.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">6. SCHLUSSBESTIMMUNGEN</h2>
                                <p>6.1. Dieser Vertrag wird in zwei gleichlautenden Exemplaren ausgefertigt, die jeweils die gleiche Rechtskraft besitzen, je eines für jede Partei.</p>
                                <p>6.2. Die Bedingungen dieses Vertrags können nur im gegenseitigen Einvernehmen der Parteien durch Abschluss einer Zusatzvereinbarung geändert werden.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ANGABEN UND UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ARBEITGEBER:</strong></p>
                                            <br/>
                                            <p><strong>[[company_name]]</strong></p>
                                            <p>Адреса: [[company_address]]</p>
                                            <p>Код ЄДРПОУ: [[company_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ARBEITNEHMER:</strong></p>
                                            <br/>
                                            <p><strong>[[employee_name]]</strong></p>
                                            <p>Адреса: [[employee_address]]</p>
                                            <p>РНОКПП: [[employee_rnekpp]]</p>
                                            <p>Паспорт: [[employee_passport]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 2. Договір про нерозголошення (NDA) - ФІНАЛЬНА ВЕРСІЯ ---
            [
                'slug' => 'nda-agreement-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто","en":"City", "pl":"Miejscowość", "de":"Ort"}},
                    {"name":"party_one_full_name","type":"text","required":true,"labels":{"uk":"Повна назва Сторони 1","en":"Party 1 Full Name", "pl":"Pełna nazwa Strony 1", "de":"Vollständiger Name der Partei 1"}},
                    {"name":"party_one_representative","type":"text","required":true,"labels":{"uk":"Представник Сторони 1 (ПІБ, посада)","en":"Party 1 Representative (Name, Position)", "pl":"Przedstawiciel Strony 1 (Imię i nazwisko, stanowisko)", "de":"Vertreter der Partei 1 (Name, Position)"}},
                    {"name":"party_one_basis","type":"text","required":true,"labels":{"uk":"На підставі чого діє Сторона 1","en":"Party 1 Basis of Action", "pl":"Na podstawie czego działa Strona 1", "de":"Grundlage des Handelns der Partei 1"}},
                    {"name":"party_two_full_name","type":"text","required":true,"labels":{"uk":"Повна назва Сторони 2","en":"Party 2 Full Name", "pl":"Pełna nazwa Strony 2", "de":"Vollständiger Name der Partei 2"}},
                    {"name":"party_two_representative","type":"text","required":true,"labels":{"uk":"Представник Сторони 2 (ПІБ, посада)","en":"Party 2 Representative (Name, Position)", "pl":"Przedstawiciel Strony 2 (Imię i nazwisko, stanowisko)", "de":"Vertreter der Partei 2 (Name, Position)"}},
                    {"name":"party_two_basis","type":"text","required":true,"labels":{"uk":"На підставі чого діє Сторона 2","en":"Party 2 Basis of Action", "pl":"Na podstawie czego działa Strona 2", "de":"Grundlage des Handelns der Partei 2"}},
                    {"name":"confidential_info_description","type":"textarea","required":true,"labels":{"uk":"Детальний опис конфіденційної інформації","en":"Detailed Description of Confidential Information", "pl":"Szczegółowy opis informacji poufnych", "de":"Detaillierte Beschreibung vertraulicher Informationen"}},
                    {"name":"purpose","type":"textarea","required":true,"labels":{"uk":"Мета розкриття інформації","en":"Purpose of Disclosure", "pl":"Cel ujawnienia informacji", "de":"Zweck der Offenlegung"}},
                    {"name":"term_years","type":"number","required":true,"labels":{"uk":"Термін нерозголошення (років)","en":"Non-disclosure term (years)", "pl":"Okres poufności (lat)", "de":"Dauer der Vertraulichkeit (Jahre)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір про нерозголошення (NDA)',
                        'description' => 'Юридична угода, що зобов\'язує сторони зберігати певну інформацію в таємниці.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ПРО НЕРОЗГОЛОШЕННЯ КОНФІДЕНЦІЙНОЇ ІНФОРМАЦІЇ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[party_one_full_name]]</strong>, в особі [[party_one_representative]], що діє на підставі [[party_one_basis]] (далі – "Сторона, що розкриває"), та <strong>[[party_two_full_name]]</strong>, в особі [[party_two_representative]], що діє на підставі [[party_two_basis]] (далі – "Сторона, що отримує"), уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Відповідно до умов цього Договору, Сторона, що розкриває, передає, а Сторона, що отримує, приймає та зобов\'язується не розголошувати конфіденційну інформацію, що стала їй відома з метою: [[purpose]].</p>
                                <p>1.2. Під конфіденційною інформацією розуміється: [[confidential_info_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ТЕРМІН ДІЇ</h2>
                                <p>2.1. Зобов\'язання щодо нерозголошення діють протягом <strong>[[term_years]]</strong> років з моменту підписання цього Договору.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>Сторона, що розкриває:</strong></p>
                                            <p>[[party_one_full_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_one_representative]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>Сторона, що отримує:</strong></p>
                                            <p>[[party_two_full_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_two_representative]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Non-Disclosure Agreement (NDA)',
                        'description' => 'A legal agreement that obliges parties to keep certain information confidential.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">NON-DISCLOSURE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[party_one_full_name]]</strong>, represented by [[party_one_representative]], acting on the basis of [[party_one_basis]] (hereinafter – "Disclosing Party"), and <strong>[[party_two_full_name]]</strong>, represented by [[party_two_representative]], acting on the basis of [[party_two_basis]] (hereinafter – "Receiving Party"), have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. In accordance with the terms of this Agreement, the Disclosing Party transfers, and the Receiving Party accepts and undertakes not to disclose confidential information that became known to it for the purpose of: [[purpose]].</p>
                                <p>1.2. Confidential information means: [[confidential_info_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. TERM</h2>
                                <p>2.1. Non-disclosure obligations are valid for <strong>[[term_years]]</strong> years from the date of signing this Agreement.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>Disclosing Party:</strong></p>
                                            <p>[[party_one_full_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_one_representative]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>Receiving Party:</strong></p>
                                            <p>[[party_two_full_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_two_representative]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o zachowaniu poufności (NDA)',
                        'description' => 'Prawna umowa zobowiązująca strony do zachowania poufności określonych informacji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O ZACHOWANIU POUFNOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[party_one_full_name]]</strong>, reprezentowany przez [[party_one_representative]], działający na podstawie [[party_one_basis]] (zwany dalej – "Strona Ujawniająca"), oraz <strong>[[party_two_full_name]]</strong>, reprezentowany przez [[party_two_representative]], działający na podstawie [[party_two_basis]] (zwany dalej – "Strona Otrzymująca"), zawarli niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Zgodnie z warunkami niniejszej Umowy, Strona Ujawniająca przekazuje, a Strona Otrzymująca przyjmuje i zobowiązuje się nie ujawniać informacji poufnych, które stały się jej znane w celu: [[purpose]].</p>
                                <p>1.2. Przez informacje poufne rozumie się: [[confidential_info_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. OKRES OBOWIĄZYWANIA</h2>
                                <p>2.1. Zobowiązania dotyczące zachowania poufności obowiązują przez <strong>[[term_years]]</strong> lat od daty podpisania niniejszej Umowy.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>Strona Ujawniająca:</strong></p>
                                            <p>[[party_one_full_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_one_representative]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>Strona Otrzymująca:</strong></p>
                                            <p>[[party_two_full_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_two_representative]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vertraulichkeitsvereinbarung (NDA)',
                        'description' => 'Eine rechtliche Vereinbarung, die Parteien zur Geheimhaltung bestimmter Informationen verpflichtet.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERTRAULICHKEITSVEREINBARUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[party_one_full_name]]</strong>, vertreten durch [[party_one_representative]], handelnd auf der Grundlage von [[party_one_basis]] (nachfolgend – "Offenlegende Partei"), und <strong>[[party_two_full_name]]</strong>, vertreten durch [[party_two_representative]], handelnd auf der Grundlage von [[party_two_basis]] (nachfolgend – "Empfangende Partei"), haben diese Vereinbarung wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Gemäß den Bedingungen dieser Vereinbarung überträgt die Offenlegende Partei, und die Empfangende Partei akzeptiert und verpflichtet sich, vertrauliche Informationen, die ihr zum Zweck von: [[purpose]] bekannt wurden, nicht offenzulegen.</p>
                                <p>1.2. Unter vertraulichen Informationen versteht man: [[confidential_info_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. LAUFZEIT</h2>
                                <p>2.1. Die Geheimhaltungsverpflichtungen gelten für <strong>[[term_years]]</strong> Jahre ab dem Datum der Unterzeichnung dieser Vereinbarung.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>Offenlegende Partei:</strong></p>
                                            <p>[[party_one_full_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_one_representative]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>Empfangende Partei:</strong></p>
                                            <p>[[party_two_full_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_two_representative]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 3. Резюме (классическое) ---
            [
                'slug' => 'resume-classic-ua',
                'fields' => '[
                    {"name":"full_name","type":"text","required":true,"labels":{"uk":"ПІБ","en":"Full Name", "pl":"Imię i Nazwisko", "de":"Vollständiger Name"}},
                    {"name":"position","type":"text","required":true,"labels":{"uk":"Посада, на яку претендуєте","en":"Desired Position", "pl":"Stanowisko, na które aplikujesz", "de":"Angestrebte Position"}},
                    {"name":"phone","type":"text","required":true,"labels":{"uk":"Телефон","en":"Phone", "pl":"Telefon", "de":"Telefon"}},
                    {"name":"email","type":"email","required":true,"labels":{"uk":"Email","en":"Email", "pl":"E-mail", "de":"E-Mail"}},
                    {"name":"linkedin","type":"text","required":false,"labels":{"uk":"LinkedIn (посилання)","en":"LinkedIn (link)", "pl":"LinkedIn (link)", "de":"LinkedIn (Link)"}},
                    {"name":"summary","type":"textarea","required":true,"labels":{"uk":"Коротка інформація про себе (мета, ключові навички)","en":"Summary (objective, key skills)", "pl":"Podsumowanie (cel, kluczowe umiejętności)", "de":"Zusammenfassung (Ziel, Kernkompetenzen)"}},
                    {"name":"experience","type":"textarea","required":true,"labels":{"uk":"Досвід роботи (компанія, посада, період, обов\'язки)","en":"Work Experience (company, position, period, responsibilities)", "pl":"Doświadczenie zawodowe (firma, stanowisko, okres, obowiązki)", "de":"Berufserfahrung (Firma, Position, Zeitraum, Aufgaben)"}},
                    {"name":"education","type":"textarea","required":true,"labels":{"uk":"Освіта (навчальний заклад, спеціальність, роки навчання)","en":"Education (institution, specialization, years of study)", "pl":"Wykształcenie (uczelnia, specjalność, lata nauki)", "de":"Ausbildung (Institution, Fachrichtung, Studienjahre)"}},
                    {"name":"skills","type":"textarea","required":true,"labels":{"uk":"Навички (технічні, мови, особистісні)","en":"Skills (technical, languages, personal)", "pl":"Umiejętności (techniczne, języki, osobiste)", "de":"Fähigkeiten (technische, Sprachen, persönliche)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Резюме (класичне)',
                        'description' => 'Стандартний формат резюме, що підходить для більшості вакансій, з акцентом на досвід роботи та освіту.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 22px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[position]]</p>
                                <p style="font-size: 12px;">Телефон: [[phone]] | Email: [[email]] [[linkedin]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">КОРОТКО ПРО МЕНЕ</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">ДОСВІД РОБОТИ</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">ОСВІТА</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">НАВИЧКИ</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'en' => [
                        'title' => 'Resume (Classic)',
                        'description' => 'Standard resume format suitable for most job applications, focusing on work experience and education.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 22px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[position]]</p>
                                <p style="font-size: 12px;">Phone: [[phone]] | Email: [[email]] [[linkedin]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">SUMMARY</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">WORK EXPERIENCE</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">EDUCATION</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">SKILLS</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Życiorys (klasyczny)',
                        'description' => 'Standardowy format życiorysu odpowiedni dla większości ofert pracy, z naciskiem na doświadczenie zawodowe i wykształcenie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 22px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[position]]</p>
                                <p style="font-size: 12px;">Telefon: [[phone]] | E-mail: [[email]] [[linkedin]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">PODSUMOWANIE</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">DOŚWIADCZENIE ZAWODOWE</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">WYKSZTAŁCENIE</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">UMIEJĘTNOŚCI</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'de' => [
                        'title' => 'Lebenslauf (klassisch)',
                        'description' => 'Standard-Lebenslauf-Format, geeignet für die meisten Stellenbewerbungen, mit Fokus auf Berufserfahrung und Ausbildung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 22px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[position]]</p>
                                <p style="font-size: 12px;">Telefon: [[phone]] | E-Mail: [[email]] [[linkedin]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">ZUSAMMENFASSUNG</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">BERUFSERFAHRUNG</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">AUSBILDUNG</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:left;">FÄHIGKEITEN</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                ]
            ],

            // --- 4. Заявление о приеме на работу ---
            [
                'slug' => 'job-application-ua',
                'fields' => '[
                    {"name":"director_position","type":"text","required":true,"labels":{"uk":"Посада керівника підприємства","en":"Position of Company Head", "pl":"Stanowisko kierownika firmy", "de":"Position des Unternehmensleiters"}},
                    {"name":"director_name_genitive","type":"text","required":true,"labels":{"uk":"ПІБ керівника у давальному відмінку","en":"Full Name of Company Head (Dative Case)", "pl":"Imię i nazwisko kierownika w celowniku", "de":"Name des Unternehmensleiters (Dativ)"}},
                    {"name":"company_name_full","type":"text","required":true,"labels":{"uk":"Повна назва підприємства","en":"Full Company Name", "pl":"Pełna nazwa firmy", "de":"Vollständiger Firmenname"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"uk":"Адреса реєстрації заявника","en":"Applicant\'s Registered Address", "pl":"Adres zameldowania wnioskodawcy", "de":"Meldeadresse des Antragstellers"}},
                    {"name":"employee_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані заявника","en":"Applicant\'s Passport Details", "pl":"Dane paszportowe wnioskodawcy", "de":"Passdaten des Antragstellers"}},
                    {"name":"employee_rnekpp","type":"text","required":true,"labels":{"uk":"РНОКПП заявника","en":"Applicant\'s RNEKPP (TIN)", "pl":"RNEKPP wnioskodawcy (NIP)", "de":"RNEKPP des Antragstellers (Steuernummer)"}},
                    {"name":"desired_position","type":"text","required":true,"labels":{"uk":"Посада, на яку просите прийняти","en":"Position applied for", "pl":"Stanowisko, na które prosisz o przyjęcie", "de":"Angestrebte Position"}},
                    {"name":"work_start_date","type":"date","required":true,"labels":{"uk":"Дата початку роботи","en":"Work Start Date", "pl":"Data rozpoczęcia pracy", "de":"Arbeitsbeginn"}},
                    {"name":"employment_type","type":"text","required":true,"labels":{"uk":"Вид зайнятості (напр., основне місце роботи, за сумісництвом)","en":"Type of employment (e.g., primary employment, part-time)", "pl":"Rodzaj zatrudnienia (np. główne miejsce pracy, w niepełnym wymiarze godzin)", "de":"Art der Beschäftigung (z.B. Hauptbeschäftigung, Teilzeit)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява про прийом на роботу',
                        'description' => 'Офіційна заява від фізичної особи з проханням про прийняття на роботу на певну посаду.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">від [[employee_full_name]]</p>
                                <p style="text-align: right;">який(а) проживає за адресою: [[employee_address]]</p>
                                <p style="text-align: right;">паспорт: [[employee_passport]]</p>
                                <p style="text-align: right;">РНОКПП: [[employee_rnekpp]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу прийняти мене на роботу в [[company_name_full]] на посаду [[desired_position]] з [[work_start_date]] на умовах [[employment_type]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Підпис: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Job Application',
                        'description' => 'Formal application from an individual requesting employment for a specific position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">from [[employee_full_name]]</p>
                                <p style="text-align: right;">residing at: [[employee_address]]</p>
                                <p style="text-align: right;">passport: [[employee_passport]]</p>
                                <p style="text-align: right;">RNEKPP: [[employee_rnekpp]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to employ me at [[company_name_full]] for the position of [[desired_position]] from [[work_start_date]] under the terms of [[employment_type]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Signature: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Podanie o pracę',
                        'description' => 'Formalne podanie od osoby fizycznej z prośbą o zatrudnienie na określonym stanowisku.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">od [[employee_full_name]]</p>
                                <p style="text-align: right;">zamieszkałego pod adresem: [[employee_address]]</p>
                                <p style="text-align: right;">paszport: [[employee_passport]]</p>
                                <p style="text-align: right;">RNEKPP: [[employee_rnekpp]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">PODANIE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Uprzejmie proszę o przyjęcie mnie do pracy w [[company_name_full]] na stanowisko [[desired_position]] od [[work_start_date]] na warunkach [[employment_type]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Podpis: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Bewerbung um Anstellung',
                        'description' => 'Formale Bewerbung einer Einzelperson um Anstellung in einer bestimmten Position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">von [[employee_full_name]]</p>
                                <p style="text-align: right;">wohnhaft unter der Adresse: [[employee_address]]</p>
                                <p style="text-align: right;">Reisepass: [[employee_passport]]</p>
                                <p style="text-align: right;">RNEKPP: [[employee_rnekpp]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich bitte Sie höflich, mich bei [[company_name_full]] auf die Position [[desired_position]] ab dem [[work_start_date]] zu den Bedingungen von [[employment_type]] einzustellen.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Unterschrift: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 5. Політика конфіденційності ---
            [
                'slug' => 'privacy-policy-ua',
                'fields' => '[{"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва компанії / сайту","en":"Company/Website Name", "pl":"Nazwa firmy / strony internetowej", "de":"Firmen-/Website-Name"}},{"name":"company_address","type":"text","required":true,"labels":{"uk":"Адреса компанії","en":"Company Address", "pl":"Adres firmy", "de":"Firmenadresse"}},{"name":"contact_email","type":"email","required":true,"labels":{"uk":"Контактний Email","en":"Contact Email", "pl":"Kontaktowy adres e-mail", "de":"Kontakt-E-Mail"}}]',
                'translations' => [
                    'uk' => ['title' => 'Політика конфіденційності', 'description' => 'Юридичний документ, що пояснює, як сайт або компанія збирає, використовує та захищає персональні дані користувачів.', 'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px;">ПОЛІТИКА КОНФІДЕНЦІЙНОСТІ</h1><p>Редакція від [[current_date]]</p></div>', 'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: justify; line-height: 1.5; font-size: 12px;"><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">1. Загальні положення</h2><p>1.1. Ця Політика конфіденційності описує порядок збору, обробки та захисту персональних даних користувачів сайту/сервісу <strong>[[company_name]]</strong> (далі – Компанія).</p><p>1.2. Володільцем персональних даних є <strong>[[company_name]]</strong>, що знаходиться за адресою: [[company_address]].</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">2. Які дані ми збираємо</h2><p>2.1. Ми можемо збирати такі категорії персональних даних: ідентифікаційні дані (ПІБ, контактний телефон, адреса електронної пошти), технічні дані (IP-адреса, файли cookie) та інші дані, які ви добровільно надаєте.</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">3. Мета обробки персональних даних</h2><p>3.1. Ваші дані обробляються з метою надання вам доступу до послуг сайту, обробки ваших запитів, інформування про нові продукти та послуги, а також для покращення роботи нашого сервісу.</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">4. Права суб\'єкта персональних даних</h2><p>4.1. Відповідно до Закону України "Про захист персональних даних", ви маєте право на доступ до своїх даних, їх виправлення, видалення, а також відкликання згоди на їх обробку.</p></div>', 'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;"><p>З усіх питань, пов\'язаних з обробкою ваших персональних даних, ви можете звертатися за адресою електронної пошти: [[contact_email]].</p></div>'],
                    'en' => [
                        'title' => 'Privacy Policy',
                        'description' => 'A legal document that explains how a website or company collects, uses, and protects users\' personal data.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px;">PRIVACY POLICY</h1><p>Revision from [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: justify; line-height: 1.5; font-size: 12px;"><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">1. General Provisions</h2><p>1.1. This Privacy Policy describes the procedure for collecting, processing, and protecting personal data of users of the website/service <strong>[[company_name]]</strong> (hereinafter – the Company).</p><p>1.2. The owner of personal data is <strong>[[company_name]]</strong>, located at: [[company_address]].</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">2. What data we collect</h2><p>2.1. We may collect the following categories of personal data: identification data (full name, contact phone, email address), technical data (IP address, cookies), and other data that you voluntarily provide.</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">3. Purpose of personal data processing</h2><p>3.1. Your data is processed to provide you with access to website services, process your requests, inform about new products and services, and improve the operation of our service.</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">4. Rights of the personal data subject</h2><p>4.1. In accordance with the Law of Ukraine "On Personal Data Protection", you have the right to access your data, correct it, delete it, and withdraw consent to its processing.</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;"><p>For all questions related to the processing of your personal data, you can contact us at: [[contact_email]].</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Polityka prywatności',
                        'description' => 'Dokument prawny wyjaśniający, w jaki sposób strona internetowa lub firma zbiera, wykorzystuje i chroni dane osobowe użytkowników.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px;">POLITYKA PRYWATNOŚCI</h1><p>Wersja z dnia [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: justify; line-height: 1.5; font-size: 12px;"><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">1. Postanowienia ogólne</h2><p>1.1. Niniejsza Polityka prywatności opisuje zasady gromadzenia, przetwarzania i ochrony danych osobowych użytkowników strony/serwisu <strong>[[company_name]]</strong> (dalej – Firma).</p><p>1.2. Administratorem danych osobowych jest <strong>[[company_name]]</strong>, z siedzibą pod adresem: [[company_address]].</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">2. Jakie dane zbieramy</h2><p>2.1. Możemy zbierać następujące kategorie danych osobowych: dane identyfikacyjne (imię i nazwisko, numer telefonu, adres e-mail), dane techniczne (adres IP, pliki cookie) oraz inne dane, które dobrowolnie nam przekazujesz.</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">3. Cel przetwarzania danych osobowych</h2><p>3.1. Twoje dane są przetwarzane w celu zapewnienia Ci dostępu do usług strony, obsługi Twoich zapytań, informowania o nowych produktach i usługach, a także w celu poprawy działania naszego serwisu.</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">4. Prawa podmiotu danych osobowych</h2><p>4.1. Zgodnie z ustawą Ukrainy "O ochronie danych osobowych", masz prawo do dostępu do swoich danych, ich poprawiania, usuwania, a także wycofania zgody na ich przetwarzanie.</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;"><p>Wszelkie pytania dotyczące przetwarzania Twoich danych osobowych możesz kierować na adres e-mail: [[contact_email]].</p></div>'
                    ],
                    'de' => [
                        'title' => 'Datenschutzrichtlinie',
                        'description' => 'Ein rechtliches Dokument, das erklärt, wie eine Website oder ein Unternehmen personenbezogene Daten von Benutzern sammelt, verwendet und schützt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px;">DATENSCHUTZRICHTLINIE</h1><p>Stand: [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: justify; line-height: 1.5; font-size: 12px;"><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">1. Allgemeine Bestimmungen</h2><p>1.1. Diese Datenschutzrichtlinie beschreibt das Verfahren zur Erfassung, Verarbeitung und zum Schutz personenbezogener Daten von Benutzern der Website/des Dienstes <strong>[[company_name]]</strong> (nachfolgend – das Unternehmen).</p><p>1.2. Der Inhaber der personenbezogenen Daten ist <strong>[[company_name]]</strong>, ansässig unter der Adresse: [[company_address]].</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">2. Welche Daten wir sammeln</h2><p>2.1. Wir können folgende Kategorien personenbezogener Daten erfassen: Identifikationsdaten (Name, Kontakttelefonnummer, E-Mail-Adresse), technische Daten (IP-Adresse, Cookies) und andere Daten, die Sie freiwillig angeben.</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">3. Zweck der Verarbeitung personenbezogener Daten</h2><p>3.1. Ihre Daten werden verarbeitet, um Ihnen den Zugang zu den Diensten der Website zu ermöglichen, Ihre Anfragen zu bearbeiten, Sie über neue Produkte und Dienstleistungen zu informieren und die Funktionsweise unseres Dienstes zu verbessern.</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">4. Rechte der betroffenen Person</h2><p>4.1. Gemäß dem Gesetz der Ukraine "Über den Schutz personenbezogener Daten" haben Sie das Recht auf Zugang zu Ihren Daten, deren Berichtigung, Löschung sowie den Widerruf der Einwilligung zur Verarbeitung.</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;"><p>Bei allen Fragen zur Verarbeitung Ihrer personenbezogenen Daten können Sie sich an folgende E-Mail-Adresse wenden: [[contact_email]].</p></div>'
                    ],
                ]
            ],

            // --- 6. Акт виконаних робіт / наданих послуг ---
            [
                'slug' => 'acceptance-act-ua',
                'fields' => '[
                    {"name":"act_number","type":"text","required":true,"labels":{"uk":"Акт №","en":"Act #", "pl":"Protokół nr", "de":"Protokoll Nr."}},
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто","en":"City", "pl":"Miejscowość", "de":"Ort"}},
                    {"name":"contract_details","type":"text","required":true,"labels":{"uk":"До договору №__ від __","en":"To contract #__ dated __", "pl":"Do umowy nr__ z dnia __", "de":"Zum Vertrag Nr.__ vom __"}},
                    {"name":"customer_name","type":"text","required":true,"labels":{"uk":"Повна назва/ПІБ Замовника","en":"Customer Full Name", "pl":"Pełna nazwa/Imię i nazwisko Zamawiającego", "de":"Vollständiger Name/Vor- und Nachname des Kunden"}},
                    {"name":"customer_representative","type":"text","required":true,"labels":{"uk":"В особі (посада, ПІБ)","en":"Represented by (Position, Name)", "pl":"W osobie (stanowisko, Imię i nazwisko)", "de":"Vertreten durch (Position, Name)"}},
                    {"name":"contractor_name","type":"text","required":true,"labels":{"uk":"Повна назва/ПІБ Виконавця","en":"Contractor Full Name", "pl":"Pełna nazwa/Imię i nazwisko Wykonawcy", "de":"Vollständiger Name/Vor- und Nachname des Auftragnehmers"}},
                    {"name":"contractor_representative","type":"text","required":true,"labels":{"uk":"В особі (посада, ПІБ)","en":"Represented by (Position, Name)", "pl":"W osobie (stanowisko, Imię i nazwisko)", "de":"Vertreten przez (Position, Name)"}},
                    {"name":"service_description","type":"textarea","required":true,"labels":{"uk":"Опис виконаних робіт/наданих послуг","en":"Description of Performed Works/Services", "pl":"Opis wykonanych prac/świadczonych usług", "de":"Beschreibung der ausgeführten Arbeiten/erbrachten Dienstleistungen"}},
                    {"name":"total_amount","type":"number","required":true,"labels":{"uk":"Загальна вартість (грн)","en":"Total Amount (UAH)", "pl":"Całkowita wartość (UAH)", "de":"Gesamtbetrag (UAH)"}},
                    {"name":"total_amount_text","type":"text","required":true,"labels":{"uk":"Загальна вартість прописом","en":"Total Amount in Words", "pl":"Całkowita wartość słownie", "de":"Gesamtbetrag in Worten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Акт виконаних робіт / наданих послуг',
                        'description' => 'Документ, що підтверджує факт виконання робіт або надання послуг і відсутність претензій у сторін.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ № [[act_number]]</h1><p style="text-align: center; font-size: 14px;">приймання-передачі виконаних робіт (наданих послуг)</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До договору: <strong>[[contract_details]]</strong></p>
                                <p>Ми, що нижче підписалися, представник Замовника <strong>[[customer_name]]</strong>, в особі [[customer_representative]], з одного боку, і представник Виконавця <strong>[[contractor_name]]</strong>, в особі [[contractor_representative]], з іншого боку, склали цей Акт про те, що Виконавцем були належним чином виконані наступні роботи (надані послуги):</p>
                                <p>[[service_description]]</p>
                                <p>Загальна вартість виконаних робіт (послуг) становить <strong>[[total_amount]]</strong> грн ([[total_amount_text]]).</p>
                                <p>Замовник претензій щодо обсягу, якості та строків виконання робіт (надання послуг) не має.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ЗАМОВНИК:</strong></p>
                                            <br/>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_representative]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ВИКОНАВЕЦЬ:</strong></p>
                                            <br/>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_representative]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Act of Acceptance',
                        'description' => 'A document confirming the completion of work or provision of services and the absence of claims from the parties.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ACT NO. [[act_number]]</h1><p style="text-align: center; font-size: 14px;">of Acceptance of Performed Works (Provided Services)</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the agreement: <strong>[[contract_details]]</strong></p>
                                <p>We, the undersigned, the Customer\'s representative <strong>[[customer_name]]</strong>, represented by [[customer_representative]], on the one hand, and the Contractor\'s representative <strong>[[contractor_name]]</strong>, represented by [[contractor_representative]], on the other hand, have drawn up this Act stating that the Contractor has duly performed the following works (provided services):</p>
                                <p>[[service_description]]</p>
                                <p>The total cost of the performed works (services) is <strong>[[total_amount]]</strong> UAH ([[total_amount_text]]).</p>
                                <p>The Customer has no claims regarding the scope, quality, and terms of performance of works (provision of services).</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>CUSTOMER:</strong></p>
                                            <br/>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_representative]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>CONTRACTOR:</strong></p>
                                            <br/>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_representative]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Protokół odbioru prac / usług',
                        'description' => 'Dokument potwierdzający wykonanie prac lub świadczenie usług oraz brak roszczeń ze strony stron.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ NR [[act_number]]</h1><p style="text-align: center; font-size: 14px;">przyjęcia-przekazania wykonanych prac (świadczonych usług)</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do umowy: <strong>[[contract_details]]</strong></p>
                                <p>My, niżej podpisani, przedstawiciel Zamawiającego <strong>[[customer_name]]</strong>, w osobie [[customer_representative]], z jednej strony, oraz przedstawiciel Wykonawcy <strong>[[contractor_name]]</strong>, w osobie [[contractor_representative]], z drugiej strony, sporządziliśmy niniejszy Protokół stwierdzający, że Wykonawca należycie wykonał następujące prace (świadczył usługi):</p>
                                <p>[[service_description]]</p>
                                <p>Całkowita wartość wykonanych prac (usług) wynosi <strong>[[total_amount]]</strong> UAH ([[total_amount_text]]).</p>
                                <p>Zamawiający nie wnosi zastrzeżeń co do zakresu, jakości i terminów wykonania prac (świadczenia usług).</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ZAMAWIAJĄCY:</strong></p>
                                            <br/>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_representative]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>WYKONAWCA:</strong></p>
                                            <br/>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_representative]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Abnahmeprotokoll für Arbeiten / Dienstleistungen',
                        'description' => 'Ein Dokument, das die Erbringung von Arbeiten oder Dienstleistungen und das Fehlen von Ansprüchen der Parteien bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKOLL NR. [[act_number]]</h1><p style="text-align: center; font-size: 14px;">der Abnahme von ausgeführten Arbeiten (erbrachten Dienstleistungen)</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zum Vertrag: <strong>[[contract_details]]</strong></p>
                                <p>Wir, die Unterzeichneten, der Vertreter des Auftraggebers <strong>[[customer_name]]</strong>, vertreten durch [[customer_representative]], einerseits, und der Vertreter des Auftragnehmers <strong>[[contractor_name]]</strong>, vertreten durch [[contractor_representative]], andererseits, haben dieses Protokoll erstellt, in dem bestätigt wird, dass der Auftragnehmer die folgenden Arbeiten (Dienstleistungen) ordnungsgemäß ausgeführt hat:</p>
                                <p>[[service_description]]</p>
                                <p>Die Gesamtkosten der ausgeführten Arbeiten (Dienstleistungen) betragen <strong>[[total_amount]]</strong> UAH ([[total_amount_text]]).</p>
                                <p>Der Auftraggeber hat keine Einwände bezüglich Umfang, Qualität und Fristen der Ausführung der Arbeiten (Erbringung der Dienstleistungen).</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>AUFTRAGGEBER:</strong></p>
                                            <br/>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_representative]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>AUFTRAGNEHMER:</strong></p>
                                            <br/>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_representative]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],
            // --- 7. Доверенность на получение ТМЦ ---
            [
                'slug' => 'power-of-attorney-tmc-ua',
                'fields' => '[{"name":"city","type":"text","required":true,"labels":{"uk":"Місто","en":"City", "pl":"Miejscowość", "de":"Ort"}},{"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa przedsiębiorstwa", "de":"Firmenname"}},{"name":"representative_name","type":"text","required":true,"labels":{"uk":"ПІБ представника","en":"Representative\'s Full Name", "pl":"Imię i nazwisko przedstawiciela", "de":"Name des Vertreters"}},{"name":"representative_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані представника","en":"Representative\'s Passport Details", "pl":"Dane paszportowe przedstawiciela", "de":"Passdaten des Vertreters"}},{"name":"supplier_name","type":"text","required":true,"labels":{"uk":"Назва постачальника","en":"Supplier Name", "pl":"Nazwa dostawcy", "de":"Name des Lieferanten"}},{"name":"document_basis","type":"text","required":true,"labels":{"uk":"Документ-підстава (напр., Рахунок №)","en":"Basis Document (e.g., Invoice #)", "pl":"Dokument-podstawa (np. Faktura nr)", "de":"Basisdokument (z.B. Rechnung Nr.)"}}]',
                'translations' => [
                    'uk' => ['title' => 'Довіреність на отримання ТМЦ', 'description' => 'Документ, що уповноважує особу отримати товарно-матеріальні цінності від імені підприємства.', 'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px;">ДОВІРЕНІСТЬ</h1></div><table width="100%"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>', 'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5; text-align: justify;"><p>Цією довіреністю <strong>[[company_name]]</strong> уповноважує громадянина(ку) <strong>[[representative_name]]</strong> (паспорт: [[representative_passport]]) отримати від <strong>[[supplier_name]]</strong> товарно-матеріальні цінності на підставі документу: [[document_basis]].</p><p>Довіреність дійсна до [[current_date]].</p></div>', 'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;"><p>Підпис представника ___________________ засвідчую.</p><p>Керівник ___________________ / Підпис /</p><p>Головний бухгалтер ___________________ / Підпис /</p></div>'],
                    'en' => [
                        'title' => 'Power of Attorney for Goods Receipt',
                        'description' => 'A document authorizing a person to receive goods and materials on behalf of a company.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px;">POWER OF ATTORNEY</h1></div><table width="100%"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5; text-align: justify;"><p>This power of attorney, <strong>[[company_name]]</strong>, authorizes citizen <strong>[[representative_name]]</strong> (passport: [[representative_passport]]) to receive goods and materials from <strong>[[supplier_name]]</strong> based on the document: [[document_basis]].</p><p>This power of attorney is valid until [[current_date]].</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;"><p>Signature of representative ___________________ certified.</p><p>Head ___________________ / Signature /</p><p>Chief Accountant ___________________ / Signature /</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Pełnomocnictwo do odbioru towarów i materiałów',
                        'description' => 'Dokument upoważniający osobę do odbioru towarów i materiałów w imieniu firmy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px;">PEŁNOMOCNICTWO</h1></div><table width="100%"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5; text-align: justify;"><p>Niniejszym pełnomocnictwem <strong>[[company_name]]</strong> upoważnia obywatela(kę) <strong>[[representative_name]]</strong> (paszport: [[representative_passport]]) do odbioru od <strong>[[supplier_name]]</strong> towarów i materiałów na podstawie dokumentu: [[document_basis]].</p><p>Pełnomocnictwo jest ważne do [[current_date]].</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;"><p>Podpis przedstawiciela ___________________ poświadczam.</p><p>Kierownik ___________________ / Podpis /</p><p>Główny księgowy ___________________ / Podpis /</p></div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht zur Warenannahme',
                        'description' => 'Ein Dokument, das eine Person ermächtigt, Waren und Materialien im Namen eines Unternehmens entgegenzunehmen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px;">VOLLMACHT</h1></div><table width="100%"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5; text-align: justify;"><p>Mit dieser Vollmacht ermächtigt <strong>[[company_name]]</strong> den Bürger <strong>[[representative_name]]</strong> (Reisepass: [[representative_passport]]), von <strong>[[supplier_name]]</strong> Waren und Materialien auf der Grundlage des Dokuments: [[document_basis]] entgegenzunehmen.</p><p>Diese Vollmacht ist gültig bis [[current_date]].</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;"><p>Unterschrift des Vertreters ___________________ beglaubige ich.</p><p>Leiter ___________________ / Unterschrift /</p><p>Hauptbuchhalter ___________________ / Unterschrift /</p></div>'
                    ],
                ]
            ],

            // --- 8. Договор о материальной ответственности ---
            [
                'slug' => 'material-liability-agreement-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Повна назва підприємства","en":"Full Company Name", "pl":"Pełna nazwa firmy", "de":"Vollständiger Firmenname"}},
                    {"name":"director_name","type":"text","required":true,"labels":{"uk":"ПІБ та посада керівника","en":"Full Name and Position of Head", "pl":"Imię i nazwisko oraz stanowisko kierownika", "de":"Name und Position des Leiters"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"uk":"ПІБ працівника","en":"Employee Full Name", "pl":"Imię i nazwisko pracownika", "de":"Vollständiger Name des Arbeitnehmers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада працівника","en":"Employee Position", "pl":"Stanowisko pracownika", "de":"Position des Arbeitnehmers"}},
                    {"name":"liability_description","type":"textarea","required":true,"labels":{"uk":"Опис матеріальних цінностей, за які несеться відповідальність","en":"Description of material assets for which liability is assumed", "pl":"Opis wartości materialnych, za które ponosi się odpowiedzialność", "de":"Beschreibung der materiellen Werte, für die die Haftung übernommen wird"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір про повну матеріальну відповідальність',
                        'description' => 'Документ, що встановлює повну матеріальну відповідальність працівника за збереження довірених йому матеріальних цінностей.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ПРО ПОВНУ ІНДИВІДУАЛЬНУ МАТЕРІАЛЬНУ ВІДПОВІДАЛЬНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Підприємство <strong>[[company_name]]</strong>, в особі [[director_name]], з одного боку, та працівник [[employee_name]], який працює на посаді [[employee_position]], з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Працівник несе повну матеріальну відповідальність за незбереження матеріальних цінностей, перелічених у додатку до цього Договору, а саме: [[liability_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ОБОВ\'ЯЗКИ СТОРІН</h2>
                                <p>2.1. Працівник зобов\'язується дбайливо ставитися до переданих йому матеріальних цінностей, вживати заходів для запобігання шкоди.</p>
                                <p>2.2. Підприємство зобов\'язується створити працівникові умови, необхідні для забезпечення повного збереження довірених йому матеріальних цінностей.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ПІДПРИЄМСТВО:</strong></p>
                                            <p>[[company_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ПРАЦІВНИК:</strong></p>
                                            <p>[[employee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Full Material Liability Agreement',
                        'description' => 'A document establishing full material liability of an employee for the safekeeping of entrusted material assets.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">AGREEMENT ON FULL INDIVIDUAL MATERIAL LIABILITY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>The enterprise <strong>[[company_name]]</strong>, represented by [[director_name]], on the one hand, and the employee [[employee_name]], working as [[employee_position]], on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Employee bears full material liability for the non-preservation of material assets listed in the appendix to this Agreement, namely: [[liability_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. OBLIGATIONS OF THE PARTIES</h2>
                                <p>2.1. The Employee undertakes to carefully treat the material assets entrusted to him, to take measures to prevent damage.</p>
                                <p>2.2. The Enterprise undertakes to create conditions necessary for the Employee to ensure the full preservation of the material assets entrusted to him.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ENTERPRISE:</strong></p>
                                            <p>[[company_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>EMPLOYEE:</strong></p>
                                            <p>[[employee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o pełnej odpowiedzialności materialnej',
                        'description' => 'Dokument ustanawiający pełną odpowiedzialność materialną pracownika za zachowanie powierzonych mu wartości materialnych.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O PEŁNEJ INDYWIDUALNEJ ODPOWIEDZIALNOŚCI MATERIALNEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Przedsiębiorstwo <strong>[[company_name]]</strong>, reprezentowane przez [[director_name]], z jednej strony, oraz pracownik [[employee_name]], zatrudniony na stanowisku [[employee_position]], z drugiej strony, zawarli niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Pracownik ponosi pełną odpowiedzialność materialną za niezachowanie wartości materialnych wymienionych w załączniku do niniejszej Umowy, a mianowicie: [[liability_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. OBOWIĄZKI STRON</h2>
                                <p>2.1. Pracownik zobowiązuje się do dbałego obchodzenia się z powierzonymi mu wartościami materialnymi, podejmowania działań w celu zapobiegania szkodom.</p>
                                <p>2.2. Przedsiębiorstwo zobowiązuje się do stworzenia pracownikowi warunków niezbędnych do zapewnienia pełnego zachowania powierzonych mu wartości materialnych.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>PRZEDSIĘBIORSTWO:</strong></p>
                                            <p>[[company_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>PRACOWNIK:</strong></p>
                                            <p>[[employee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vereinbarung über volle materielle Haftung',
                        'description' => 'Ein Dokument, das die volle materielle Haftung eines Arbeitnehmers für die Aufbewahrung anvertrauter materieller Werte festlegt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VEREINBARUNG ÜBER VOLLE INDIVIDUELLE MATERIELLE HAFTUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Das Unternehmen <strong>[[company_name]]</strong>, vertreten durch [[director_name]], einerseits, und der Arbeitnehmer [[employee_name]], beschäftigt als [[employee_position]], andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Arbeitnehmer übernimmt die volle materielle Haftung für die Nichtbewahrung der im Anhang zu diesem Vertrag aufgeführten materiellen Werte, nämlich: [[liability_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. PFLICHTEN DER PARTEIEN</h2>
                                <p>2.1. Der Arbeitnehmer verpflichtet sich, die ihm übergebenen materiellen Werte sorgfältig zu behandeln und Maßnahmen zur Vermeidung von Schäden zu ergreifen.</p>
                                <p>2.2. Das Unternehmen verpflichtet sich, dem Arbeitnehmer die notwendigen Bedingungen zur vollständigen Sicherstellung der ihm anvertrauten materiellen Werte zu schaffen.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>UNTERNEHMEN:</strong></p>
                                            <p>[[company_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ARBEITNEHMER:</strong></p>
                                            <p>[[employee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],
            // --- 9. Должностная инструкция ---
            [
                'slug' => 'job-description-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"position_name","type":"text","required":true,"labels":{"uk":"Назва посади","en":"Position Name", "pl":"Nazwa stanowiska", "de":"Positionsbezeichnung"}},
                    {"name":"department","type":"text","required":false,"labels":{"uk":"Відділ/Департамент","en":"Department", "pl":"Dział/Departament", "de":"Abteilung"}},
                    {"name":"direct_supervisor","type":"text","required":true,"labels":{"uk":"Безпосередній керівник (посада, ПІБ)","en":"Direct Supervisor (position, full name)", "pl":"Bezpośredni przełożony (stanowisko, imię i nazwisko)", "de":"Direkter Vorgesetzter (Position, Name)"}},
                    {"name":"subordinates","type":"textarea","required":false,"labels":{"uk":"Підлеглі (посади, кількість)","en":"Subordinates (positions, quantity)", "pl":"Podwładni (stanowiska, liczba)", "de":"Untergebene (Positionen, Anzahl)"}},
                    {"name":"general_provisions","type":"textarea","required":true,"labels":{"uk":"Загальні положення","en":"General Provisions", "pl":"Postanowienia ogólne", "de":"Allgemeine Bestimmungen"}},
                    {"name":"responsibilities","type":"textarea","required":true,"labels":{"uk":"Посадові обов\'язки","en":"Job Responsibilities", "pl":"Obowiązki służbowe", "de":"Aufgaben und Verantwortlichkeiten"}},
                    {"name":"rights","type":"textarea","required":true,"labels":{"uk":"Права","en":"Rights", "pl":"Prawa", "de":"Rechte"}},
                    {"name":"responsibility","type":"textarea","required":true,"labels":{"uk":"Відповідальність","en":"Responsibility", "pl":"Odpowiedzialność", "de":"Verantwortung"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Посадова інструкція',
                        'description' => 'Документ, що визначає функції, обов\'язки, права та відповідальність працівника на конкретній посаді.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОСАДОВА ІНСТРУКЦІЯ</h1><p style="font-size: 14px;">[[position_name]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Загальні положення</h2>
                                <p>[[general_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Посадові обов\'язки</h2>
                                <p>[[responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Права</h2>
                                <p>[[rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Відповідальність</h2>
                                <p>[[responsibility]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник підрозділу: ___________________ ([[direct_supervisor]])</p>
                                <p>З інструкцією ознайомлений(а): ___________________ ([[current_date]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Job Description',
                        'description' => 'A document defining the functions, duties, rights, and responsibilities of an employee in a specific position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">JOB DESCRIPTION</h1><p style="font-size: 14px;">[[position_name]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. General Provisions</h2>
                                <p>[[general_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Job Responsibilities</h2>
                                <p>[[responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Rights</h2>
                                <p>[[rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Responsibility</h2>
                                <p>[[responsibility]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Department Head: ___________________ ([[direct_supervisor]])</p>
                                <p>Familiarized with the instructions: ___________________ ([[current_date]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Opis stanowiska pracy',
                        'description' => 'Dokument określający funkcje, obowiązki, prawa i odpowiedzialność pracownika na konkretnym stanowisku.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OPIS STANOWISKA PRACY</h1><p style="font-size: 14px;">[[position_name]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Postanowienia ogólne</h2>
                                <p>[[general_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Obowiązki służbowe</h2>
                                <p>[[responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Prawa</h2>
                                <p>[[rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Odpowiedzialność</h2>
                                <p>[[responsibility]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik działu: ___________________ ([[direct_supervisor]])</p>
                                <p>Zapoznał(a) się z instrukcją: ___________________ ([[current_date]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Stellenbeschreibung',
                        'description' => 'Ein Dokument, das die Funktionen, Pflichten, Rechte und Verantwortlichkeiten eines Mitarbeiters in einer bestimmten Position festlegt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STELLENBESCHREIBUNG</h1><p style="font-size: 14px;">[[position_name]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Allgemeine Bestimmungen</h2>
                                <p>[[general_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Aufgaben und Verantwortlichkeiten</h2>
                                <p>[[responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Rechte</h2>
                                <p>[[rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Verantwortung</h2>
                                <p>[[responsibility]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Abteilungsleiter: ___________________ ([[direct_supervisor]])</p>
                                <p>Mit der Anweisung vertraut gemacht: ___________________ ([[current_date]])</p>
                            </div>'
                    ],

                ]
            ],
            // --- 10. Приказ о приеме на работу ---
            [
                'slug' => 'order-of-employment-ua',
                'fields' => '[
                    {"name":"order_number","type":"text","required":true,"labels":{"uk":"Номер наказу","en":"Order Number", "pl":"Numer rozkazu", "de":"Anordnungsnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"uk":"ПІБ працівника","en":"Employee Full Name", "pl":"Imię i nazwisko pracownika", "de":"Vollständiger Name des Arbeitnehmers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада","en":"Position", "pl":"Stanowisko", "de":"Position"}},
                    {"name":"work_start_date","type":"date","required":true,"labels":{"uk":"Дата початку роботи","en":"Work Start Date", "pl":"Data rozpoczęcia pracy", "de":"Arbeitsbeginn"}},
                    {"name":"salary_amount","type":"number","required":true,"labels":{"uk":"Посадовий оклад (грн)","en":"Salary (UAH)", "pl":"Wynagrodzenie (UAH)", "de":"Gehalt (UAH)"}},
                    {"name":"probation_period_days","type":"number","required":false,"labels":{"uk":"Випробувальний термін (днів, якщо є)","en":"Probation Period (days, if any)", "pl":"Okres próbny (dni, jeśli dotyczy)", "de":"Probezeit (Tage, falls zutreffend)"}},
                    {"name":"basis_document","type":"text","required":true,"labels":{"uk":"Підстава (напр., заява працівника від __)","en":"Basis (e.g., employee application from __)", "pl":"Podstawa (np. wniosek pracownika z dnia __)", "de":"Grundlage (z.B. Antrag des Arbeitnehmers vom __)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Приказ о приеме на работу',
                        'description' => 'Официальный приказ о приеме нового сотрудника на работу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">НАКАЗ</h1><p style="font-size: 14px;">про прийняття на роботу</p><p>№ [[order_number]] від [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прийняти на роботу в <strong>[[company_name]]</strong>:</p>
                                <p>ПІБ: <strong>[[employee_name]]</strong></p>
                                <p>Посада: <strong>[[employee_position]]</strong></p>
                                <p>Дата початку роботи: <strong>[[work_start_date]]</strong></p>
                                <p>Посадовий оклад: <strong>[[salary_amount]]</strong> грн на місяць.</p>
                                [[probation_period_days]]<p>Випробувальний термін: [[probation_period_days]] календарних днів.</p>[[/probation_period_days]]
                                <p>Підстава: [[basis_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник підприємства: ___________________ ([[company_name]])</p>
                                <p>З наказом ознайомлений(а): ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Order of Employment',
                        'description' => 'Official order for the employment of a new employee.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ORDER</h1><p style="font-size: 14px;">on employment</p><p>No. [[order_number]] dated [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To employ at <strong>[[company_name]]</strong>:</p>
                                <p>Full Name: <strong>[[employee_name]]</strong></p>
                                <p>Position: <strong>[[employee_position]]</strong></p>
                                <p>Start Date: <strong>[[work_start_date]]</strong></p>
                                <p>Salary: <strong>[[salary_amount]]</strong> UAH per month.</p>
                                [[probation_period_days]]<p>Probation period: [[probation_period_days]] calendar days.</p>[[/probation_period_days]]
                                <p>Basis: [[basis_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of Enterprise: ___________________ ([[company_name]])</p>
                                <p>Familiarized with the order: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zarządzenie o zatrudnieniu',
                        'description' => 'Oficjalne zarządzenie o zatrudnieniu nowego pracownika.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZARZĄDZENIE</h1><p style="font-size: 14px;">o zatrudnieniu</p><p>Nr [[order_number]] z dnia [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zatrudnić w <strong>[[company_name]]</strong>:</p>
                                <p>Imię i Nazwisko: <strong>[[employee_name]]</strong></p>
                                <p>Stanowisko: <strong>[[employee_position]]</strong></p>
                                <p>Data rozpoczęcia pracy: <strong>[[work_start_date]]</strong></p>
                                <p>Wynagrodzenie zasadnicze: <strong>[[salary_amount]]</strong> UAH miesięcznie.</p>
                                [[probation_period_days]]<p>Okres próbny: [[probation_period_days]] dni kalendarzowych.</p>[[/probation_period_days]]
                                <p>Podstawa: [[basis_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik Przedsiębiorstwa: ___________________ ([[company_name]])</p>
                                <p>Zapoznał(a) się z zarządzeniem: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Einstellungsanordnung',
                        'description' => 'Offizielle Anordnung zur Einstellung eines neuen Mitarbeiters.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANORDNUNG</h1><p style="font-size: 14px;">zur Einstellung</p><p>Nr. [[order_number]] vom [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Einstellung bei <strong>[[company_name]]</strong>:</p>
                                <p>Name: <strong>[[employee_name]]</strong></p>
                                <p>Position: <strong>[[employee_position]]</strong></p>
                                <p>Arbeitsbeginn: <strong>[[work_start_date]]</strong></p>
                                <p>Grundgehalt: <strong>[[salary_amount]]</strong> UAH pro Monat.</p>
                                [[probation_period_days]]<p>Probezeit: [[probation_period_days]] Kalendertage.</p>[[/probation_period_days]]
                                <p>Grundlage: [[basis_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter des Unternehmens: ___________________ ([[company_name]])</p>
                                <p>Mit der Anordnung vertraut gemacht: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 11. Приказ о переводе на другую должность ---
            [
                'slug' => 'order-of-transfer-ua',
                'fields' => '[
                    {"name":"order_number","type":"text","required":true,"labels":{"uk":"Номер наказу","en":"Order Number", "pl":"Numer rozkazu", "de":"Anordnungsnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"uk":"ПІБ працівника","en":"Employee Full Name", "pl":"Imię i nazwisko pracownika", "de":"Vollständiger Name des Arbeitnehmers"}},
                    {"name":"old_position","type":"text","required":true,"labels":{"uk":"Попередня посада","en":"Previous Position", "pl":"Poprzednie stanowisko", "de":"Bisherige Position"}},
                    {"name":"new_position","type":"text","required":true,"labels":{"uk":"Нова посада","en":"New Position", "pl":"Nowe stanowisko", "de":"Neue Position"}},
                    {"name":"transfer_date","type":"date","required":true,"labels":{"uk":"Дата переведення","en":"Transfer Date", "pl":"Data przeniesienia", "de":"Versetzungsdatum"}},
                    {"name":"new_salary_amount","type":"number","required":true,"labels":{"uk":"Новий посадовий оклад (грн)","en":"New Salary (UAH)", "pl":"Nowe wynagrodzenie (UAH)", "de":"Neues Gehalt (UAH)"}},
                    {"name":"reason_for_transfer","type":"textarea","required":true,"labels":{"uk":"Причина переведення","en":"Reason for Transfer", "pl":"Przyczyna przeniesienia", "de":"Grund der Versetzung"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Приказ о переводе на другую должность',
                        'description' => 'Официальный приказ о переводе сотрудника на другую должность.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">НАКАЗ</h1><p style="font-size: 14px;">про переведення на іншу посаду</p><p>№ [[order_number]] від [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Перевести <strong>[[employee_name]]</strong> з посади <strong>[[old_position]]</strong> на посаду <strong>[[new_position]]</strong> в <strong>[[company_name]]</strong> з <strong>[[transfer_date]]</strong>.</p>
                                <p>Встановити посадовий оклад у розмірі <strong>[[new_salary_amount]]</strong> грн на місяць.</p>
                                <p>Причина переведення: [[reason_for_transfer]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник підприємства: ___________________ ([[company_name]])</p>
                                <p>З наказом ознайомлений(а): ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Order of Transfer to Another Position',
                        'description' => 'Official order for the transfer of an employee to another position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ORDER</h1><p style="font-size: 14px;">on transfer to another position</p><p>No. [[order_number]] dated [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Transfer <strong>[[employee_name]]</strong> from the position of <strong>[[old_position]]</strong> to the position of <strong>[[new_position]]</strong> at <strong>[[company_name]]</strong> from <strong>[[transfer_date]]</strong>.</p>
                                <p>Set the salary at <strong>[[new_salary_amount]]</strong> UAH per month.</p>
                                <p>Reason for transfer: [[reason_for_transfer]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of Enterprise: ___________________ ([[company_name]])</p>
                                <p>Familiarized with the order: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zarządzenie o przeniesieniu na inne stanowisko',
                        'description' => 'Oficjalne zarządzenie o przeniesieniu pracownika na inne stanowisko.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZARZĄDZENIE</h1><p style="font-size: 14px;">o przeniesieniu na inne stanowisko</p><p>Nr [[order_number]] z dnia [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Przenieść <strong>[[employee_name]]</strong> ze stanowiska <strong>[[old_position]]</strong> na stanowisko <strong>[[new_position]]</strong> w <strong>[[company_name]]</strong> od <strong>[[transfer_date]]</strong>.</p>
                                <p>Ustalić wynagrodzenie zasadnicze w wysokości <strong>[[new_salary_amount]]</strong> UAH miesięcznie.</p>
                                <p>Przyczyna przeniesienia: [[reason_for_transfer]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik Przedsiębiorstwa: ___________________ ([[company_name]])</p>
                                <p>Zapoznał(a) się z zarządzeniem: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Anordnung zur Versetzung auf eine andere Position',
                        'description' => 'Offizielle Anordnung zur Versetzung eines Mitarbeiters auf eine andere Position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANORDNUNG</h1><p style="font-size: 14px;">zur Versetzung auf eine andere Position</p><p>Nr. [[order_number]] vom [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Versetzung von <strong>[[employee_name]]</strong> von der Position <strong>[[old_position]]</strong> auf die Position <strong>[[new_position]]</strong> bei <strong>[[company_name]]</strong> ab dem <strong>[[transfer_date]]</strong>.</p>
                                <p>Das Gehalt wird auf <strong>[[new_salary_amount]]</strong> UAH pro Monat festgelegt.</p>
                                <p>Grund der Versetzung: [[reason_for_transfer]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter des Unternehmens: ___________________ ([[company_name]])</p>
                                <p>Mit der Anordnung vertraut gemacht: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 12. Заявление на ежегодный оплачиваемый отпуск ---
            [
                'slug' => 'annual-leave-application-ua',
                'fields' => '[
                    {"name":"director_position","type":"text","required":true,"labels":{"uk":"Посада керівника підприємства","en":"Position of Company Head", "pl":"Stanowisko kierownika firmy", "de":"Position des Unternehmensleiters"}},
                    {"name":"director_name_genitive","type":"text","required":true,"labels":{"uk":"ПІБ керівника у давальному відмінку","en":"Full Name of Company Head (Dative Case)", "pl":"Imię i nazwisko kierownika w celowniku", "de":"Name des Unternehmensleiters (Dativ)"}},
                    {"name":"company_name_full","type":"text","required":true,"labels":{"uk":"Повна назва підприємства","en":"Full Company Name", "pl":"Pełna nazwa firmy", "de":"Vollständiger Firmenname"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада заявника","en":"Applicant\'s Position", "pl":"Stanowisko wnioskodawcy", "de":"Position des Antragstellers"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"uk":"Дата початку відпустки","en":"Leave Start Date", "pl":"Data rozpoczęcia urlopu", "de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення відпустки","en":"Leave End Date", "pl":"Data zakończenia urlopu", "de":"Urlaubsende"}},
                    {"name":"leave_days","type":"number","required":true,"labels":{"uk":"Кількість днів відпустки","en":"Number of Leave Days", "pl":"Liczba dni urlopu", "de":"Anzahl der Urlaubstage"}},
                    {"name":"work_period_start","type":"date","required":true,"labels":{"uk":"За період роботи з","en":"For the work period from", "pl":"Za okres pracy od", "de":"Für den Arbeitszeitraum von"}},
                    {"name":"work_period_end","type":"date","required":true,"labels":{"uk":"по","en":"to", "pl":"do", "de":"bis"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на щорічну оплачувану відпустку',
                        'description' => 'Заява працівника про надання щорічної основної оплачуваної відпустки.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">від [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу надати мені щорічну основну оплачувану відпустку тривалістю <strong>[[leave_days]]</strong> календарних днів за період роботи з <strong>[[work_period_start]]</strong> по <strong>[[work_period_end]]</strong> з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Підпис: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Annual Paid Leave',
                        'description' => 'Employee\'s application for annual basic paid leave.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">from [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to grant me annual basic paid leave for <strong>[[leave_days]]</strong> calendar days for the work period from <strong>[[work_period_start]]</strong> to <strong>[[work_period_end]]</strong> from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Signature: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o urlop wypoczynkowy',
                        'description' => 'Wniosek pracownika o udzielenie corocznego podstawowego płatnego urlopu wypoczynkowego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">od [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Uprzejmie proszę o udzielenie mi corocznego podstawowego płatnego urlopu wypoczynkowego w wymiarze <strong>[[leave_days]]</strong> dni kalendarzowych za okres pracy od <strong>[[work_period_start]]</strong> do <strong>[[work_period_end]]</strong> od <strong>[[leave_start_date]]</strong> do <strong>[[leave_end_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Podpis: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Jahresurlaub',
                        'description' => 'Antrag des Arbeitnehmers auf jährlichen bezahlten Grundurlaub.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">von [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Gewährung meines jährlichen bezahlten Grundurlaubs von <strong>[[leave_days]]</strong> Kalendertagen für den Arbeitszeitraum vom <strong>[[work_period_start]]</strong> bis <strong>[[work_period_end]]</strong> vom <strong>[[leave_start_date]]</strong> bis <strong>[[leave_end_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Unterschrift: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 13. Заявление на отпуск за свой счет (без сохранения заработной платы) ---
            [
                'slug' => 'unpaid-leave-application-ua',
                'fields' => '[
                    {"name":"director_position","type":"text","required":true,"labels":{"uk":"Посада керівника підприємства","en":"Position of Company Head", "pl":"Stanowisko kierownika firmy", "de":"Position des Unternehmensleiters"}},
                    {"name":"director_name_genitive","type":"text","required":true,"labels":{"uk":"ПІБ керівника у давальному відмінку","en":"Full Name of Company Head (Dative Case)", "pl":"Imię i nazwisko kierownika w celowniku", "de":"Name des Unternehmensleiters (Dativ)"}},
                    {"name":"company_name_full","type":"text","required":true,"labels":{"uk":"Повна назва підприємства","en":"Full Company Name", "pl":"Pełna nazwa firmy", "de":"Vollständiger Firmenname"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада заявника","en":"Applicant\'s Position", "pl":"Stanowisko wnioskodawcy", "de":"Position des Antragstellers"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"uk":"Дата початку відпустки","en":"Leave Start Date", "pl":"Data rozpoczęcia urlopu", "de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення відпустки","en":"Leave End Date", "pl":"Data zakończenia urlopu", "de":"Urlaubsende"}},
                    {"name":"leave_days","type":"number","required":true,"labels":{"uk":"Кількість днів відпустки","en":"Number of Leave Days", "pl":"Liczba dni urlopu", "de":"Anzahl dni urlopu"}},
                    {"name":"reason_for_leave","type":"textarea","required":true,"labels":{"uk":"Причина відпустки (напр., сімейні обставини)","en":"Reason for Leave (e.g., family circumstances)", "pl":"Przyczyna urlopu (np. okoliczności rodzinne)", "de":"Grund des Urlaubs (z.B. familiäre Umstände)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на відпустку за свій рахунок (без збереження заробітної плати)',
                        'description' => 'Заява працівника про надання відпустки без збереження заробітної плати.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">від [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу надати мені відпустку без збереження заробітної плати тривалістю <strong>[[leave_days]]</strong> календарних днів з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong> у зв\'язку з [[reason_for_leave]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Підпис: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Unpaid Leave',
                        'description' => 'Employee\'s application for leave without pay.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">from [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to grant me unpaid leave for <strong>[[leave_days]]</strong> calendar days from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong> due to [[reason_for_leave]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Signature: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o urlop bezpłatny',
                        'description' => 'Wniosek pracownika o udzielenie urlopu bezpłatnego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">od [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Uprzejmie proszę o udzielenie mi urlopu bezpłatnego w wymiarze <strong>[[leave_days]]</strong> dni kalendarzowych od <strong>[[leave_start_date]]</strong> do <strong>[[leave_end_date]]</strong> z powodu [[reason_for_leave]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Podpis: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf unbezahlten Urlaub',
                        'description' => 'Antrag des Arbeitnehmers auf unbezahlten Urlaub.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">von [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Gewährung von unbezahltem Urlaub für <strong>[[leave_days]]</strong> Kalendertage vom <strong>[[leave_start_date]]</strong> bis <strong>[[leave_end_date]]</strong> aufgrund von [[reason_for_leave]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Unterschrift: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 14. Заявление на учебный отпуск ---
            [
                'slug' => 'study-leave-application-ua',
                'fields' => '[
                    {"name":"director_position","type":"text","required":true,"labels":{"uk":"Посада керівника підприємства","en":"Position of Company Head", "pl":"Stanowisko kierownika firmy", "de":"Position des Unternehmensleiters"}},
                    {"name":"director_name_genitive","type":"text","required":true,"labels":{"uk":"ПІБ керівника у давальному відмінку","en":"Full Name of Company Head (Dative Case)", "pl":"Imię i nazwisko kierownika w celowniku", "de":"Name des Unternehmensleiters (Dativ)"}},
                    {"name":"company_name_full","type":"text","required":true,"labels":{"uk":"Повна назва підприємства","en":"Full Company Name", "pl":"Pełna nazwa firmy", "de":"Vollständiger Firmenname"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада заявника","en":"Applicant\'s Position", "pl":"Stanowisko wnioskodawcy", "de":"Position des Antragstellers"}},
                    {"name":"institution_name","type":"text","required":true,"labels":{"uk":"Назва навчального закладу","en":"Educational Institution Name", "pl":"Nazwa instytucji edukacyjnej", "de":"Name der Bildungseinrichtung"}},
                    {"name":"study_period_start","type":"date","required":true,"labels":{"uk":"Початок навчального періоду","en":"Study Period Start", "pl":"Początek okresu nauki", "de":"Beginn der Studienzeit"}},
                    {"name":"study_period_end","type":"date","required":true,"labels":{"uk":"Кінець навчального періоду","en":"Study Period End", "pl":"Koniec okresu nauki", "de":"Ende der Studienzeit"}},
                    {"name":"leave_days","type":"number","required":true,"labels":{"uk":"Кількість днів відпустки","en":"Number of Leave Days", "pl":"Liczba dni urlopu", "de":"Anzahl der Urlaubstage"}},
                    {"name":"basis_document","type":"text","required":true,"labels":{"uk":"Підстава (напр., виклик-довідка з навчального закладу)","en":"Basis (e.g., certificate from educational institution)", "pl":"Podstawa (np. zaświadczenie z uczelni)", "de":"Grundlage (z.B. Bescheinigung der Bildungseinrichtung)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на навчальну відпустку',
                        'description' => 'Заява працівника про надання додаткової оплачуваної відпустки у зв\'язку з навчанням.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">від [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу надати мені навчальну відпустку тривалістю <strong>[[leave_days]]</strong> календарних днів для складання сесії/іспитів у <strong>[[institution_name]]</strong> з <strong>[[study_period_start]]</strong> по <strong>[[study_period_end]]</strong>.</p>
                                <p>Підстава: [[basis_document]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Підпис: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Study Leave',
                        'description' => 'Employee\'s application for additional paid leave due to study.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">from [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to grant me study leave for <strong>[[leave_days]]</strong> calendar days for taking a session/exams at <strong>[[institution_name]]</strong> from <strong>[[study_period_start]]</strong> to <strong>[[study_period_end]]</strong>.</p>
                                <p>Basis: [[basis_document]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Signature: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o urlop szkoleniowy',
                        'description' => 'Wniosek pracownika o udzielenie dodatkowego płatnego urlopu w związku z nauką.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">od [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Uprzejmie proszę o udzielenie mi urlopu szkoleniowego w wymiarze <strong>[[leave_days]]</strong> dni kalendarzowych na zdawanie sesji/egzaminów w <strong>[[institution_name]]</strong> od <strong>[[study_period_start]]</strong> do <strong>[[study_period_end]]</strong>.</p>
                                <p>Podstawa: [[basis_document]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Podpis: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Bildungsurlaub',
                        'description' => 'Antrag des Arbeitnehmers auf zusätzlichen bezahlten Urlaub aufgrund von Weiterbildung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">von [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Gewährung von Bildungsurlaub für <strong>[[leave_days]]</strong> Kalendertage zur Teilnahme an einer Sitzung/Prüfungen an <strong>[[institution_name]]</strong> vom <strong>[[study_period_start]]</strong> bis <strong>[[study_period_end]]</strong>.</p>
                                <p>Grundlage: [[basis_document]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Unterschrift: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 15. Заявление на отпуск по уходу за ребенком ---
            [
                'slug' => 'childcare-leave-application-ua',
                'fields' => '[
                    {"name":"director_position","type":"text","required":true,"labels":{"uk":"Посада керівника підприємства","en":"Position of Company Head", "pl":"Stanowisko kierownika firmy", "de":"Position des Unternehmensleiters"}},
                    {"name":"director_name_genitive","type":"text","required":true,"labels":{"uk":"ПІБ керівника у давальному відмінку","en":"Full Name of Company Head (Dative Case)", "pl":"Imię i nazwisko kierownika w celowniku", "de":"Name des Unternehmensleiters (Dativ)"}},
                    {"name":"company_name_full","type":"text","required":true,"labels":{"uk":"Повна назва підприємства","en":"Full Company Name", "pl":"Pełna nazwa firmy", "de":"Vollständiger Firmenname"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада заявника","en":"Applicant\'s Position", "pl":"Stanowisko wnioskodawcy", "de":"Position des Antragstellers"}},
                    {"name":"child_name","type":"text","required":true,"labels":{"uk":"ПІБ дитини","en":"Child\'s Full Name", "pl":"Imię i nazwisko dziecka", "de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"uk":"Дата народження дитини","en":"Child\'s Date of Birth", "pl":"Data urodzenia dziecka", "de":"Geburtsdatum des Kindes"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення відпустки (до досягнення дитиною 3/6 років)","en":"Leave End Date (until child reaches 3/6 years old)", "pl":"Data zakończenia urlopu (do ukończenia przez dziecko 3/6 lat)", "de":"Enddatum des Urlaubs (bis zum 3./6. Lebensjahr des Kindes)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на відпустку по догляду за дитиною',
                        'description' => 'Заява працівника про надання відпустки по догляду за дитиною до досягнення нею певного віку.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">від [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу надати мені відпустку по догляду за дитиною <strong>[[child_name]]</strong>, [[child_dob]] року народження, до досягнення нею [[leave_end_date]] року.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Підпис: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Childcare Leave',
                        'description' => 'Employee\'s application for childcare leave until the child reaches a certain age.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">from [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to grant me childcare leave for my child <strong>[[child_name]]</strong>, born on [[child_dob]], until he/she reaches [[leave_end_date]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Signature: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o urlop wychowawczy',
                        'description' => 'Wniosek pracownika o udzielenie urlopu wychowawczego do osiągnięcia przez dziecko określonego wieku.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">od [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Uprzejmie proszę o udzielenie mi urlopu wychowawczego na dziecko <strong>[[child_name]]</strong>, urodzone [[child_dob]], do osiągnięcia przez nie [[leave_end_date]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Podpis: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Elternzeit',
                        'description' => 'Antrag des Arbeitnehmers auf Elternzeit bis zum Erreichen eines bestimmten Alters des Kindes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">von [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Gewährung von Elternzeit für mein Kind <strong>[[child_name]]</strong>, geboren am [[child_dob]], bis zum [[leave_end_date]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Unterschrift: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 16. Приказ на отпуск ---
            [
                'slug' => 'order-for-leave-ua',
                'fields' => '[
                    {"name":"order_number","type":"text","required":true,"labels":{"uk":"Номер наказу","en":"Order Number", "pl":"Numer rozkazu", "de":"Anordnungsnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"uk":"ПІБ працівника","en":"Employee Full Name", "pl":"Imię i nazwisko pracownika", "de":"Vollständiger Name des Arbeitnehmers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада працівника","en":"Employee Position", "pl":"Stanowisko pracownika", "de":"Position des Arbeitnehmers"}},
                    {"name":"leave_type","type":"text","required":true,"labels":{"uk":"Вид відпустки (напр., щорічна основна, без збереження з/п, навчальна, по догляду)","en":"Leave Type (e.g., annual basic, unpaid, study, childcare)", "pl":"Rodzaj urlopu (np. wypoczynkowy, bezpłatny, szkoleniowy, wychowawczy)", "de":"Urlaubsart (z.B. Jahresurlaub, unbezahlter Urlaub, Bildungsurlaub, Elternzeit)"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"uk":"Дата початку відпустки","en":"Leave Start Date", "pl":"Data rozpoczęcia urlopu", "de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення відпустки","en":"Leave End Date", "pl":"Data zakończenia urlopu", "de":"Urlaubsende"}},
                    {"name":"leave_days","type":"number","required":true,"labels":{"uk":"Кількість днів відпустки","en":"Number of Leave Days", "pl":"Liczba dni urlopu", "de":"Anzahl der Urlaubstage"}},
                    {"name":"work_period_start","type":"date","required":false,"labels":{"uk":"За період роботи з (для щорічної)","en":"For the work period from (for annual leave)", "pl":"Za okres pracy od (dla urlopu wypoczynkowego)", "de":"Für den Arbeitszeitraum von (für Jahresurlaub)"}},
                    {"name":"work_period_end","type":"date","required":false,"labels":{"uk":"по (для щорічної)","en":"to (for annual leave)", "pl":"do (dla urlopu wypoczynkowego)", "de":"bis (für Jahresurlaub)"}},
                    {"name":"basis_document","type":"text","required":true,"labels":{"uk":"Підстава (напр., заява працівника від __)","en":"Basis (e.g., employee application from __)", "pl":"Podstawa (np. wniosek pracownika z dnia __)", "de":"Grundlage (z.B. Antrag des Arbeitnehmers vom __)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Приказ на отпуск',
                        'description' => 'Официальный приказ о предоставлении отпуска сотруднику.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">НАКАЗ</h1><p style="font-size: 14px;">про надання відпустки</p><p>№ [[order_number]] від [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Надати <strong>[[employee_name]]</strong>, [[employee_position]], [[leave_type]] відпустку тривалістю <strong>[[leave_days]]</strong> календарних днів [[work_period_start]]за період роботи з [[work_period_start]] по [[work_period_end]][[/work_period_start]] з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>.</p>
                                <p>Підстава: [[basis_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник підприємства: ___________________ ([[company_name]])</p>
                                <p>З наказом ознайомлений(а): ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Order for Leave',
                        'description' => 'Official order for granting leave to an employee.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ORDER</h1><p style="font-size: 14px;">on granting leave</p><p>No. [[order_number]] dated [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Grant <strong>[[employee_name]]</strong>, [[employee_position]], [[leave_type]] leave for <strong>[[leave_days]]</strong> calendar days [[work_period_start]]for the work period from [[work_period_start]] to [[work_period_end]][[/work_period_start]] from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>.</p>
                                <p>Basis: [[basis_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of Enterprise: ___________________ ([[company_name]])</p>
                                <p>Familiarized with the order: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zarządzenie o urlopie',
                        'description' => 'Oficjalne zarządzenie o udzieleniu urlopu pracownikowi.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZARZĄDZENIE</h1><p style="font-size: 14px;">o udzieleniu urlopu</p><p>Nr [[order_number]] z dnia [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Udzielić <strong>[[employee_name]]</strong>, [[employee_position]], [[leave_type]] urlopu w wymiarze <strong>[[leave_days]]</strong> dni kalendarzowych [[work_period_start]]za okres pracy od [[work_period_start]] do [[work_period_end]][[/work_period_start]] od <strong>[[leave_start_date]]</strong> do <strong>[[leave_end_date]]</strong>.</p>
                                <p>Podstawa: [[basis_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik Przedsiębiorstwa: ___________________ ([[company_name]])</p>
                                <p>Zapoznał(a) się z zarządzeniem: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Urlaubsanordnung',
                        'description' => 'Offizielle Anordnung zur Gewährung von Urlaub an einen Mitarbeiter.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANORDNUNG</h1><p style="font-size: 14px;">zur Gewährung von Urlaub</p><p>Nr. [[order_number]] vom [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Gewähren Sie <strong>[[employee_name]]</strong>, [[employee_position]], [[leave_type]] Urlaub für <strong>[[leave_days]]</strong> Kalendertage [[work_period_start]]für den Arbeitszeitraum vom [[work_period_start]] bis [[work_period_end]][[/work_period_start]] vom <strong>[[leave_start_date]]</strong> bis <strong>[[leave_end_date]]</strong>.</p>
                                <p>Grundlage: [[basis_document]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter des Unternehmens: ___________________ ([[company_name]])</p>
                                <p>Mit der Anordnung vertraut gemacht: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 17. Заявление на увольнение по собственному желанию ---
            [
                'slug' => 'resignation-application-ua',
                'fields' => '[
                    {"name":"director_position","type":"text","required":true,"labels":{"uk":"Посада керівника підприємства","en":"Position of Company Head", "pl":"Stanowisko kierownika firmy", "de":"Position des Unternehmensleiters"}},
                    {"name":"director_name_genitive","type":"text","required":true,"labels":{"uk":"ПІБ керівника у давальному відмінку","en":"Full Name of Company Head (Dative Case)", "pl":"Imię i nazwisko kierownika w celowniku", "de":"Name des Unternehmensleiters (Dativ)"}},
                    {"name":"company_name_full","type":"text","required":true,"labels":{"uk":"Повна назва підприємства","en":"Full Company Name", "pl":"Pełna nazwa firmy", "de":"Vollständiger Firmenname"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада заявника","en":"Applicant\'s Position", "pl":"Stanowisko wnioskodawcy", "de":"Position des Antragstellers"}},
                    {"name":"resignation_date","type":"date","required":true,"labels":{"uk":"Дата звільнення (останній робочий день)","en":"Resignation Date (last working day)", "pl":"Data zwolnienia (ostatni dzień pracy)", "de":"Kündigungsdatum (letzter Arbeitstag)"}},
                    {"name":"reason_for_resignation","type":"textarea","required":false,"labels":{"uk":"Причина звільнення (за бажанням)","en":"Reason for Resignation (optional)", "pl":"Przyczyna zwolnienia (opcjonalnie)", "de":"Grund der Kündigung (optional)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на звільнення за власним бажанням',
                        'description' => 'Заява працівника про звільнення з роботи за власним бажанням.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">від [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу звільнити мене з роботи за власним бажанням [[resignation_date]].</p>
                                [[reason_for_resignation]]<p>Причина: [[reason_for_resignation]].</p>[[/reason_for_resignation]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Підпис: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Resignation',
                        'description' => 'Employee\'s application for resignation from work.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">from [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to terminate my employment by my own will on [[resignation_date]].</p>
                                [[reason_for_resignation]]<p>Reason: [[reason_for_resignation]].</p>[[/reason_for_resignation]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Signature: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o rozwiązanie umowy o pracę za wypowiedzeniem',
                        'description' => 'Wniosek pracownika o rozwiązanie umowy o pracę za wypowiedzeniem.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">od [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Uprzejmie proszę o rozwiązanie mojej umowy o pracę za wypowiedzeniem z dniem [[resignation_date]].</p>
                                [[reason_for_resignation]]<p>Przyczyna: [[reason_for_resignation]].</p>[[/reason_for_resignation]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Podpis: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Kündigung des Arbeitsverhältnisses',
                        'description' => 'Antrag des Arbeitnehmers auf Kündigung des Arbeitsverhältnisses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">von [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich bitte hiermit um Beendigung meines Arbeitsverhältnisses zum [[resignation_date]].</p>
                                [[reason_for_resignation]]<p>Grund: [[reason_for_resignation]].</p>[[/reason_for_resignation]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Unterschrift: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 18. Заявление на увольнение по соглашению сторон ---
            [
                'slug' => 'termination-by-agreement-application-ua',
                'fields' => '[
                    {"name":"director_position","type":"text","required":true,"labels":{"uk":"Посада керівника підприємства","en":"Position of Company Head", "pl":"Stanowisko kierownika firmy", "de":"Position des Unternehmensleiters"}},
                    {"name":"director_name_genitive","type":"text","required":true,"labels":{"uk":"ПІБ керівника у давальному відмінку","en":"Full Name of Company Head (Dative Case)", "pl":"Imię i nazwisko kierownika w celowniku", "de":"Name des Unternehmensleiters (Dativ)"}},
                    {"name":"company_name_full","type":"text","required":true,"labels":{"uk":"Повна назва підприємства","en":"Full Company Name", "pl":"Pełna nazwa firmy", "de":"Vollständiger Firmenname"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада заявника","en":"Applicant\'s Position", "pl":"Stanowisko wnioskodawcy", "de":"Position des Antragstellers"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"uk":"Дата звільнення (за згодою сторін)","en":"Termination Date (by mutual agreement)", "pl":"Data zwolnienia (za porozumieniem stron)", "de":"Kündigungsdatum (nach gegenseitiger Vereinbarung)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на звільнення за угодою сторін',
                        'description' => 'Заява працівника про звільнення з роботи за згодою сторін.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">від [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу звільнити мене з роботи за угодою сторін <strong>[[termination_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Підпис: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Termination by Mutual Agreement',
                        'description' => 'Employee\'s application for termination of employment by mutual agreement.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">from [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to terminate my employment by mutual agreement on <strong>[[termination_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Signature: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o rozwiązanie umowy o pracę za porozumieniem stron',
                        'description' => 'Wniosek pracownika o rozwiązanie umowy o pracę za porozumieniem stron.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">od [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Uprzejmie proszę o rozwiązanie mojej umowy o pracę za porozumieniem stron z dniem <strong>[[termination_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Podpis: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Beendigung des Arbeitsverhältnisses im gegenseitigen Einvernehmen',
                        'description' => 'Antrag des Arbeitnehmers auf Beendigung des Arbeitsverhältnisses im gegenseitigen Einvernehmen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[company_name_full]]</p>
                                <p style="text-align: right;">[[director_position]]</p>
                                <p style="text-align: right;">[[director_name_genitive]]</p>
                                <br/>
                                <p style="text-align: right;">von [[employee_full_name]]</p>
                                <p style="text-align: right;">[[employee_position]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich bitte hiermit um Beendigung meines Arbeitsverhältnisses im gegenseitigen Einvernehmen zum <strong>[[termination_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Unterschrift: ___________________ ([[employee_full_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 19. Соглашение о расторжении трудового договора ---
            // (Этот шаблон был последним в предыдущем ответе, новые шаблоны добавляются после него)
            [
                'slug' => 'agreement-on-termination-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Повна назва підприємства","en":"Full Company Name", "pl":"Pełna nazwa firmy", "de":"Vollständiger Firmenname"}},
                    {"name":"director_name","type":"text","required":true,"labels":{"uk":"ПІБ та посада керівника","en":"Full Name and Position of Head", "pl":"Imię i nazwisko oraz stanowisko kierownika", "de":"Name und Position des Leiters"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"uk":"ПІБ працівника","en":"Employee Full Name", "pl":"Imię i nazwisko pracownika", "de":"Vollständiger Name des Arbeitnehmers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада працівника","en":"Employee Position", "pl":"Stanowisko pracownika", "de":"Position des Arbeitnehmers"}},
                    {"name":"employment_contract_date","type":"date","required":true,"labels":{"uk":"Дата укладення трудового договору","en":"Employment Contract Date", "pl":"Data zawarcia umowy o pracę", "de":"Datum des Arbeitsvertrags"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"uk":"Дата розірвання договору","en":"Termination Date", "pl":"Data rozwiązania umowy", "de":"Kündigungsdatum"}},
                    {"name":"compensation_amount","type":"number","required":false,"labels":{"uk":"Сума компенсації (грн, якщо є)","en":"Compensation Amount (UAH, if any)", "pl":"Kwota odszkodowania (UAH, jeśli dotyczy)", "de":"Entschädigungsbetrag (UAH, falls zutreffend)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Угода про розірвання трудового договору',
                        'description' => 'Документ, що фіксує взаємну згоду сторін на припинення трудових відносин.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА</h1><p style="font-size: 14px;">про розірвання трудового договору</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Підприємство <strong>[[company_name]]</strong>, в особі [[director_name]], з одного боку, та працівник [[employee_name]], який працює на посаді [[employee_position]], з іншого боку, уклали цю Угоду про розірвання трудового договору від [[employment_contract_date]] про наступне:</p>
                                <p>1. Трудовий договір, укладений між Сторонами [[employment_contract_date]], розривається за згодою сторін <strong>[[termination_date]]</strong>.</p>
                                [[compensation_amount]]<p>2. Працівнику виплачується компенсація у розмірі <strong>[[compensation_amount]]</strong> грн.</p>[[/compensation_amount]]
                                <p>3. Сторони не мають взаємних претензій один до одного.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ПІДПРИЄМСТВО:</strong></p>
                                            <p>[[company_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ПРАЦІВНИК:</strong></p>
                                            <p>[[employee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Agreement on Termination of Employment Contract',
                        'description' => 'A document recording the mutual consent of the parties to terminate employment relations.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">AGREEMENT</h1><p style="font-size: 14px;">on termination of employment contract</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>The enterprise <strong>[[company_name]]</strong>, represented by [[director_name]], on the one hand, and the employee [[employee_name]], working as [[employee_position]], on the other hand, have concluded this Agreement on termination of employment contract dated [[employment_contract_date]] as follows:</p>
                                <p>1. The employment contract concluded between the Parties on [[employment_contract_date]] is terminated by mutual agreement on <strong>[[termination_date]]</strong>.</p>
                                [[compensation_amount]]<p>2. The employee is paid compensation in the amount of <strong>[[compensation_amount]]</strong> UAH.</p>[[/compensation_amount]]
                                <p>3. The Parties have no mutual claims against each other.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ENTERPRISE:</strong></p>
                                            <p>[[company_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>EMPLOYEE:</strong></p>
                                            <p>[[employee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Porozumienie o rozwiązaniu umowy o pracę',
                        'description' => 'Dokument potwierdzający wzajemną zgodę stron na zakończenie stosunku pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POROZUMIENIE</h1><p style="font-size: 14px;">o rozwiązaniu umowy o pracę</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Przedsiębiorstwo <strong>[[company_name]]</strong>, reprezentowane przez [[director_name]], z jednej strony, oraz pracownik [[employee_name]], zatrudniony na stanowisku [[employee_position]], z drugiej strony, zawarli niniejsze Porozumienie o rozwiązaniu umowy o pracę z dnia [[employment_contract_date]] w następujący sposób:</p>
                                <p>1. Umowa o pracę zawarta między Stronami w dniu [[employment_contract_date]] zostaje rozwiązana za porozumieniem stron z dniem <strong>[[termination_date]]</strong>.</p>
                                [[compensation_amount]]<p>2. Pracownikowi wypłaca się odszkodowanie w wysokości <strong>[[compensation_amount]]</strong> UAH.</p>[[/compensation_amount]]
                                <p>3. Strony nie mają wzajemnych roszczeń wobec siebie.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>PRZEDSIĘBIORSTWO:</strong></p>
                                            <p>[[company_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>PRACOWNIK:</strong></p>
                                            <p>[[employee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vereinbarung zur Beendigung des Arbeitsverhältnisses',
                        'description' => 'Ein Dokument, das die gegenseitige Zustimmung der Parteien zur Beendigung des Arbeitsverhältnisses festhält.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VEREINBARUNG</h1><p style="font-size: 14px;">zur Beendigung des Arbeitsverhältnisses</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Das Unternehmen <strong>[[company_name]]</strong>, vertreten durch [[director_name]], einerseits, und der Arbeitnehmer [[employee_name]], beschäftigt als [[employee_position]], andererseits, haben diese Vereinbarung zur Beendigung des Arbeitsverhältnisses vom [[employment_contract_date]] wie folgt geschlossen:</p>
                                <p>1. Der zwischen den Parteien am [[employment_contract_date]] geschlossene Arbeitsvertrag wird im gegenseitigen Einvernehmen zum <strong>[[termination_date]]</strong> beendet.</p>
                                [[compensation_amount]]<p>2. Dem Arbeitnehmer wird eine Entschädigung in Höhe von <strong>[[compensation_amount]]</strong> UAH gezahlt.</p>[[/compensation_amount]]
                                <p>3. Die Parteien haben keine gegenseitigen Ansprüche.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>UNTERNEHMEN:</strong></p>
                                            <p>[[company_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[director_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ARBEITNEHMER:</strong></p>
                                            <p>[[employee_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[employee_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 20. Приказ об увольнении ---
            [
                'slug' => 'order-of-termination-ua',
                'fields' => '[
                    {"name":"order_number","type":"text","required":true,"labels":{"uk":"Номер наказу","en":"Order Number", "pl":"Numer rozkazu", "de":"Anordnungsnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"uk":"ПІБ працівника","en":"Employee Full Name", "pl":"Imię i nazwisko pracownika", "de":"Vollständiger Name des Arbeitnehmers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада працівника","en":"Employee Position", "pl":"Stanowisko pracownika", "de":"Position des Arbeitnehmers"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"uk":"Дата звільнення","en":"Termination Date", "pl":"Data zwolnienia", "de":"Kündigungsdatum"}},
                    {"name":"basis_for_termination","type":"textarea","required":true,"labels":{"uk":"Підстава звільнення (напр., ст. 38 КЗпП України, заява працівника від __)","en":"Basis for Termination (e.g., Art. 38 of Labor Code of Ukraine, employee application from __)", "pl":"Podstawa zwolnienia (np. art. 38 Kodeksu Pracy Ukrainy, wniosek pracownika z dnia __)", "de":"Grundlage der Kündigung (z.B. Art. 38 Arbeitsgesetzbuch der Ukraine, Antrag des Arbeitnehmers vom __)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Приказ об увольнении',
                        'description' => 'Официальный приказ о прекращении трудовых отношений с сотрудником.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">НАКАЗ</h1><p style="font-size: 14px;">про звільнення</p><p>№ [[order_number]] від [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звільнити <strong>[[employee_name]]</strong>, [[employee_position]], з роботи в <strong>[[company_name]]</strong> [[termination_date]].</p>
                                <p>Підстава: [[basis_for_termination]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник підприємства: ___________________ ([[company_name]])</p>
                                <p>З наказом ознайомлений(а): ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Order of Termination',
                        'description' => 'Official order for terminating employment with an employee.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ORDER</h1><p style="font-size: 14px;">on termination</p><p>No. [[order_number]] dated [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Terminate employment of <strong>[[employee_name]]</strong>, [[employee_position]], at <strong>[[company_name]]</strong> on [[termination_date]].</p>
                                <p>Basis: [[basis_for_termination]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of Enterprise: ___________________ ([[company_name]])</p>
                                <p>Familiarized with the order: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zarządzenie o zwolnieniu',
                        'description' => 'Oficjalne zarządzenie o rozwiązaniu stosunku pracy z pracownikiem.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZARZĄDZENIE</h1><p style="font-size: 14px;">o zwolnieniu</p><p>Nr [[order_number]] z dnia [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwolnić <strong>[[employee_name]]</strong>, [[employee_position]], z pracy w <strong>[[company_name]]</strong> z dniem [[termination_date]].</p>
                                <p>Podstawa: [[basis_for_termination]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik Przedsiębiorstwa: ___________________ ([[company_name]])</p>
                                <p>Zapoznał(a) się z zarządzeniem: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Kündigungsanordnung',
                        'description' => 'Offizielle Anordnung zur Beendigung des Arbeitsverhältnisses mit einem Mitarbeiter.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANORDNUNG</h1><p style="font-size: 14px;">zur Kündigung</p><p>Nr. [[order_number]] vom [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Kündigung des Arbeitsverhältnisses von <strong>[[employee_name]]</strong>, [[employee_position]], bei <strong>[[company_name]]</strong> zum [[termination_date]].</p>
                                <p>Grundlage: [[basis_for_termination]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter des Unternehmens: ___________________ ([[company_name]])</p>
                                <p>Mit der Anordnung vertraut gemacht: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 21. Рекомендательное письмо ---
            [
                'slug' => 'recommendation-letter-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"director_name","type":"text","required":true,"labels":{"uk":"ПІБ та посада керівника","en":"Full Name and Position of Head", "pl":"Imię i nazwisko oraz stanowisko kierownika", "de":"Name und Position des Leiters"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"uk":"ПІБ працівника","en":"Employee Full Name", "pl":"Imię i nazwisko pracownika", "de":"Vollständiger Name des Arbeitnehmers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада працівника","en":"Employee Position", "pl":"Stanowisko pracownika", "de":"Position des Arbeitnehmers"}},
                    {"name":"work_start_date","type":"date","required":true,"labels":{"uk":"Дата початку роботи","en":"Work Start Date", "pl":"Data rozpoczęcia pracy", "de":"Arbeitsbeginn"}},
                    {"name":"work_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення роботи","en":"Work End Date", "pl":"Data zakończenia pracy", "de":"Arbeitsende"}},
                    {"name":"achievements","type":"textarea","required":true,"labels":{"uk":"Опис досягнень та якостей працівника","en":"Description of Employee\'s Achievements and Qualities", "pl":"Opis osiągnięć i cech pracownika", "de":"Beschreibung der Leistungen und Eigenschaften des Mitarbeiters"}},
                    {"name":"recommendation_text","type":"textarea","required":true,"labels":{"uk":"Текст рекомендації (загальний)","en":"Recommendation Text (general)", "pl":"Tekst rekomendacji (ogólny)", "de":"Empfehlungstext (allgemein)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Рекомендаційний лист',
                        'description' => 'Офіційний документ, що містить оцінку професійних якостей та досягнень працівника.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РЕКОМЕНДАЦІЙНИЙ ЛИСТ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим листом підтверджуємо, що <strong>[[employee_name]]</strong> працював(ла) у <strong>[[company_name]]</strong> на посаді [[employee_position]] з [[work_start_date]] по [[work_end_date]].</p>
                                <p>За час роботи [[employee_name]] проявив(ла) себе як [[achievements]].</p>
                                <p>[[recommendation_text]]</p>
                                <p>Рекомендуємо [[employee_name]] для подальшої професійної діяльності.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник: ___________________ ([[director_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Recommendation Letter',
                        'description' => 'Official document containing an assessment of an employee\'s professional qualities and achievements.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECOMMENDATION LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This letter confirms that <strong>[[employee_name]]</strong> worked at <strong>[[company_name]]</strong> as [[employee_position]] from [[work_start_date]] to [[work_end_date]].</p>
                                <p>During their employment, [[employee_name]] demonstrated [[achievements]].</p>
                                <p>[[recommendation_text]]</p>
                                <p>We recommend [[employee_name]] for further professional activity.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head: ___________________ ([[director_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'List referencyjny',
                        'description' => 'Oficjalny dokument zawierający ocenę kwalifikacji zawodowych i osiągnięć pracownika.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIST REFERENCYJNY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym listem potwierdzamy, że <strong>[[employee_name]]</strong> pracował(a) w <strong>[[company_name]]</strong> na stanowisku [[employee_position]] od [[work_start_date]] do [[work_end_date]].</p>
                                <p>W czasie zatrudnienia [[employee_name]] wykazał(a) się [[achievements]].</p>
                                <p>[[recommendation_text]]</p>
                                <p>Rekomendujemy [[employee_name]] do dalszej działalności zawodowej.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik: ___________________ ([[director_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Empfehlungsschreiben',
                        'description' => 'Offizielles Dokument mit einer Bewertung der beruflichen Qualitäten und Leistungen eines Mitarbeiters.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EMPFEHLUNGSSCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit bestätigen wir, dass <strong>[[employee_name]]</strong> bei <strong>[[company_name]]</strong> in der Position [[employee_position]] vom [[work_start_date]] bis [[work_end_date]] tätig war.</p>
                                <p>Während ihrer Tätigkeit hat [[employee_name]] folgende Leistungen und Eigenschaften gezeigt: [[achievements]].</p>
                                <p>[[recommendation_text]]</p>
                                <p>Wir empfehlen [[employee_name]] für die weitere berufliche Tätigkeit.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter: ___________________ ([[director_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 22. Характеристика на сотрудника ---
            [
                'slug' => 'employee-character-reference-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"uk":"ПІБ працівника","en":"Employee Full Name", "pl":"Imię i nazwisko pracownika", "de":"Vollständiger Name des Arbeitnehmers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада працівника","en":"Employee Position", "pl":"Stanowisko pracownika", "de":"Position des Arbeitnehmers"}},
                    {"name":"work_start_date","type":"date","required":true,"labels":{"uk":"Дата початку роботи","en":"Work Start Date", "pl":"Data rozpoczęcia pracy", "de":"Arbeitsbeginn"}},
                    {"name":"work_end_date","type":"date","required":false,"labels":{"uk":"Дата закінчення роботи (якщо звільнений)","en":"Work End Date (if terminated)", "pl":"Data zakończenia pracy (jeśli zwolniony)", "de":"Arbeitsende (falls gekündigt)"}},
                    {"name":"qualities_description","type":"textarea","required":true,"labels":{"uk":"Опис професійних та особистих якостей","en":"Description of Professional and Personal Qualities", "pl":"Opis cech zawodowych i osobistych", "de":"Beschreibung der beruflichen und persönlichen Eigenschaften"}},
                    {"name":"purpose_of_reference","type":"text","required":true,"labels":{"uk":"Призначення характеристики (напр., для пред\'явлення за місцем вимоги)","en":"Purpose of Reference (e.g., for presentation upon request)", "pl":"Cel charakterystyki (np. do przedstawienia na żądanie)", "de":"Zweck der Referenz (z.B. zur Vorlage auf Verlangen)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Характеристика на співробітника',
                        'description' => 'Документ, що містить оцінку професійних та особистих якостей працівника, його діяльності.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ХАРАКТЕРИСТИКА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Надається на <strong>[[employee_name]]</strong>, який(а) працює на посаді [[employee_position]] у <strong>[[company_name]]</strong> з [[work_start_date]] [[work_end_date]] по [[work_end_date]][[/work_end_date]].</p>
                                <p>За час роботи [[employee_name]] проявив(ла) себе як [[qualities_description]].</p>
                                <p>Характеристика видана для [[purpose_of_reference]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник підприємства: ___________________ ([[company_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Employee Character Reference',
                        'description' => 'A document containing an assessment of an employee\'s professional and personal qualities, and their activities.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CHARACTER REFERENCE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Provided for <strong>[[employee_name]]</strong>, who works as [[employee_position]] at <strong>[[company_name]]</strong> from [[work_start_date]] [[work_end_date]] to [[work_end_date]][[/work_end_date]].</p>
                                <p>During their employment, [[employee_name]] demonstrated [[qualities_description]].</p>
                                <p>This reference is issued for [[purpose_of_reference]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of Enterprise: ___________________ ([[company_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Charakterystyka pracownika',
                        'description' => 'Dokument zawierający ocenę cech zawodowych i osobistych pracownika oraz jego działalności.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CHARAKTERYSTYKA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sporządzono dla <strong>[[employee_name]]</strong>, który(a) pracuje na stanowisku [[employee_position]] w <strong>[[company_name]]</strong> od [[work_start_date]] [[work_end_date]] do [[work_end_date]][[/work_end_date]].</p>
                                <p>W czasie zatrudnienia [[employee_name]] wykazał(a) się [[qualities_description]].</p>
                                <p>Charakterystyka wydana w celu [[purpose_of_reference]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik Przedsiębiorstwa: ___________________ ([[company_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Mitarbeiterbeurteilung',
                        'description' => 'Ein Dokument, das eine Bewertung der beruflichen und persönlichen Eigenschaften eines Mitarbeiters und seiner Tätigkeit enthält.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BEURTEILUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ausgestellt für <strong>[[employee_name]]</strong>, der/die in der Position [[employee_position]] bei <strong>[[company_name]]</strong> vom [[work_start_date]] [[work_end_date]] bis [[work_end_date]][[/work_end_date]] tätig ist.</p>
                                <p>Während ihrer Tätigkeit hat [[employee_name]] folgende Leistungen und Eigenschaften gezeigt: [[qualities_description]].</p>
                                <p>Diese Beurteilung wird zur Vorlage bei [[purpose_of_reference]] ausgestellt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter des Unternehmens: ___________________ ([[company_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 23. Служебная записка ---
            [
                'slug' => 'memo-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"to_position","type":"text","required":true,"labels":{"uk":"Кому (посада)","en":"To (position)", "pl":"Do (stanowisko)", "de":"An (Position)"}},
                    {"name":"to_name","type":"text","required":true,"labels":{"uk":"Кому (ПІБ)","en":"To (Full Name)", "pl":"Do (Imię i Nazwisko)", "de":"An (Name)"}},
                    {"name":"from_position","type":"text","required":true,"labels":{"uk":"Від кого (посада)","en":"From (position)", "pl":"Od (stanowisko)", "de":"Von (Position)"}},
                    {"name":"from_name","type":"text","required":true,"labels":{"uk":"Від кого (ПІБ)","en":"From (Full Name)", "pl":"Od (Imię i Nazwisko)", "de":"Von (Name)"}},
                    {"name":"memo_subject","type":"text","required":true,"labels":{"uk":"Тема службової записки","en":"Memo Subject", "pl":"Temat notatki służbowej", "de":"Betreff der Notiz"}},
                    {"name":"memo_body","type":"textarea","required":true,"labels":{"uk":"Зміст службової записки","en":"Memo Content", "pl":"Treść notatki służbowej", "de":"Inhalt der Notiz"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Службова записка',
                        'description' => 'Внутренний документ для обмена информацией между сотрудниками или отделами.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: center;"><strong>[[company_name]]</strong></p>
                                <p style="text-align: right;">Кому: [[to_position]] [[to_name]]</p>
                                <p style="text-align: right;">Від: [[from_position]] [[from_name]]</p>
                                <p style="text-align: right;">Дата: [[current_date]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">СЛУЖБОВА ЗАПИСКА</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Тема: [[memo_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[memo_body]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[from_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Memo',
                        'description' => 'Internal document for exchanging information between employees or departments.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: center;"><strong>[[company_name]]</strong></p>
                                <p style="text-align: right;">To: [[to_position]] [[to_name]]</p>
                                <p style="text-align: right;">From: [[from_position]] [[from_name]]</p>
                                <p style="text-align: right;">Date: [[current_date]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">MEMORANDUM</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Subject: [[memo_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[memo_body]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[from_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Notatka służbowa',
                        'description' => 'Wewnętrzny dokument do wymiany informacji między pracownikami lub działami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: center;"><strong>[[company_name]]</strong></p>
                                <p style="text-align: right;">Do: [[to_position]] [[to_name]]</p>
                                <p style="text-align: right;">Od: [[from_position]] [[from_name]]</p>
                                <p style="text-align: right;">Data: [[current_date]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">NOTATKA SŁUŻBOWA</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Temat: [[memo_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[memo_body]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[from_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Dienstanweisung',
                        'description' => 'Internes Dokument zum Informationsaustausch zwischen Mitarbeitern oder Abteilungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: center;"><strong>[[company_name]]</strong></p>
                                <p style="text-align: right;">An: [[to_position]] [[to_name]]</p>
                                <p style="text-align: right;">Von: [[from_position]] [[from_name]]</p>
                                <p style="text-align: right;">Datum: [[current_date]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">DIENSTANWEISUNG</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Betreff: [[memo_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[memo_body]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[from_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 24. Объяснительная записка ---
            [
                'slug' => 'explanatory-note-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"to_position","type":"text","required":true,"labels":{"uk":"Кому (посада)","en":"To (position)", "pl":"Do (stanowisko)", "de":"An (Position)"}},
                    {"name":"to_name","type":"text","required":true,"labels":{"uk":"Кому (ПІБ)","en":"To (Full Name)", "pl":"Do (Imię i Nazwisko)", "de":"An (Name)"}},
                    {"name":"from_position","type":"text","required":true,"labels":{"uk":"Від кого (посада)","en":"From (position)", "pl":"Od (stanowisko)", "de":"Von (Position)"}},
                    {"name":"from_name","type":"text","required":true,"labels":{"uk":"Від кого (ПІБ)","en":"From (Full Name)", "pl":"Od (Imię i Nazwisko)", "de":"Von (Name)"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"uk":"Дата події","en":"Incident Date", "pl":"Data zdarzenia", "de":"Datum des Vorfalls"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"uk":"Опис обставин події","en":"Description of Incident Circumstances", "pl":"Opis okoliczności zdarzenia", "de":"Beschreibung der Vorfallsdetails"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Пояснювальна записка',
                        'description' => 'Документ, що пояснює причини та обставини певного інциденту або дії.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[company_name]]</p>
                                <p style="text-align: right;">[[to_position]] [[to_name]]</p>
                                <br/>
                                <p style="text-align: right;">від [[from_position]]</p>
                                <p style="text-align: right;">[[from_name]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ПОЯСНЮВАЛЬНА ЗАПИСКА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Щодо події, що сталася [[incident_date]].</p>
                                <p>[[incident_description]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Підпис: ___________________ ([[from_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Explanatory Note',
                        'description' => 'A document explaining the reasons and circumstances of a particular incident or action.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[company_name]]</p>
                                <p style="text-align: right;">[[to_position]] [[to_name]]</p>
                                <br/>
                                <p style="text-align: right;">from [[from_position]]</p>
                                <p style="text-align: right;">[[from_name]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">EXPLANATORY NOTE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Regarding the incident that occurred on [[incident_date]].</p>
                                <p>[[incident_description]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Signature: ___________________ ([[from_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Notatka wyjaśniająca',
                        'description' => 'Dokument wyjaśniający przyczyny i okoliczności określonego zdarzenia lub działania.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[company_name]]</p>
                                <p style="text-align: right;">[[to_position]] [[to_name]]</p>
                                <br/>
                                <p style="text-align: right;">od [[from_position]]</p>
                                <p style="text-align: right;">[[from_name]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">NOTATKA WYJAŚNIAJĄCA</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dotyczy zdarzenia, które miało miejsce w dniu [[incident_date]].</p>
                                <p>[[incident_description]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p style="text-align: right;">Podpis: ___________________ ([[from_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Erläuterung',
                        'description' => 'Ein Dokument, das die Gründe und Umstände eines bestimmten Vorfalls oder einer Handlung erläutert.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[company_name]]</p>
                                <p style="text-align: right;">[[to_position]] [[to_name]]</p>
                                <br/>
                                <p style="text-align: right;">von [[from_position]]</p>
                                <p style="text-align: right;">[[from_name]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ERLÄUTERUNG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Betreffend den Vorfall vom [[incident_date]].</p>
                                <p>[[incident_description]]</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p style="text-align: right;">Unterschrift: ___________________ ([[from_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 25. Табель учета рабочего времени ---
            [
                'slug' => 'timesheet-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"department","type":"text","required":true,"labels":{"uk":"Відділ/Підрозділ","en":"Department", "pl":"Dział/Oddział", "de":"Abteilung"}},
                    {"name":"month_year","type":"text","required":true,"labels":{"uk":"Місяць, рік","en":"Month, Year", "pl":"Miesiąc, Rok", "de":"Monat, Jahr"}},
                    {"name":"employee_data","type":"textarea","required":true,"labels":{"uk":"Дані працівників (ПІБ, посада, відпрацьовані години по днях)","en":"Employee Data (Full Name, Position, Hours worked by day)", "pl":"Dane pracowników (Imię i Nazwisko, stanowisko, przepracowane godziny w dniach)", "de":"Mitarbeiterdaten (Name, Position, geleistete Stunden pro Tag)"}},
                    {"name":"total_hours","type":"number","required":true,"labels":{"uk":"Всього годин за місяць","en":"Total Hours for the Month", "pl":"Łączna liczba godzin w miesiącu", "de":"Gesamtstunden pro Monat"}},
                    {"name":"total_days","type":"number","required":true,"labels":{"uk":"Всього днів за місяць","en":"Total Days for the Month", "pl":"Łączna liczba dni w miesiącu", "de":"Gesamttage pro Monat"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Табель обліку робочого часу',
                        'description' => 'Документ для обліку відпрацьованого часу співробітників.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ТАБЕЛЬ ОБЛІКУ РОБОЧОГО ЧАСУ</h1><p><strong>[[company_name]]</strong></p><p>Відділ: [[department]]</p><p>за [[month_year]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[employee_data]]</p>
                                <p>Всього відпрацьовано: [[total_hours]] годин / [[total_days]] днів.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник підрозділу: ___________________</p>
                                <p>Бухгалтер: ___________________</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Timesheet',
                        'description' => 'Document for tracking employee work hours.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TIMESHEET</h1><p><strong>[[company_name]]</strong></p><p>Department: [[department]]</p><p>for [[month_year]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[employee_data]]</p>
                                <p>Total hours worked: [[total_hours]] hours / [[total_days]] days.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of Department: ___________________</p>
                                <p>Accountant: ___________________</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Karta ewidencji czasu pracy',
                        'description' => 'Dokument do ewidencji czasu pracy pracowników.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KARTA EWIDENCJI CZASU PRACY</h1><p><strong>[[company_name]]</strong></p><p>Dział: [[department]]</p><p>za [[month_year]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[employee_data]]</p>
                                <p>Łącznie przepracowano: [[total_hours]] godzin / [[total_days]] dni.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik Działu: ___________________</p>
                                <p>Księgowy: ___________________</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Stundenzettel',
                        'description' => 'Dokument zur Erfassung der Arbeitszeiten der Mitarbeiter.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STUNDENZETTEL</h1><p><strong>[[company_name]]</strong></p><p>Abteilung: [[department]]</p><p>für [[month_year]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>[[employee_data]]</p>
                                <p>Gesamtstunden: [[total_hours]] Stunden / [[total_days]] Tage.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Abteilungsleiter: ___________________</p>
                                <p>Buchhalter: ___________________</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 26. Командировочное удостоверение ---
            [
                'slug' => 'travel-certificate-ua',
                'fields' => '[
                    {"name":"certificate_number","type":"text","required":true,"labels":{"uk":"Номер посвідчення","en":"Certificate Number", "pl":"Numer zaświadczenia", "de":"Bescheinigungsnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"uk":"ПІБ працівника","en":"Employee Full Name", "pl":"Imię i nazwisko pracownika", "de":"Vollständiger Name des Arbeitnehmers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада працівника","en":"Employee Position", "pl":"Stanowisko pracownika", "de":"Position des Arbeitnehmers"}},
                    {"name":"destination","type":"text","required":true,"labels":{"uk":"Місце відрядження","en":"Destination", "pl":"Miejsce delegacji", "de":"Zielort der Dienstreise"}},
                    {"name":"purpose","type":"textarea","required":true,"labels":{"uk":"Мета відрядження","en":"Purpose of Travel", "pl":"Cel delegacji", "de":"Zweck der Dienstreise"}},
                    {"name":"travel_start_date","type":"date","required":true,"labels":{"uk":"Дата початку відрядження","en":"Travel Start Date", "pl":"Data rozpoczęcia delegacji", "de":"Beginn der Dienstreise"}},
                    {"name":"travel_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення відрядження","en":"Travel End Date", "pl":"Data zakończenia delegacji", "de":"Ende der Dienstreise"}},
                    {"name":"travel_days","type":"number","required":true,"labels":{"uk":"Кількість днів","en":"Number of Days", "pl":"Liczba dni", "de":"Anzahl der Tage"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Командировочне посвідчення',
                        'description' => 'Документ, що підтверджує факт направлення працівника у відрядження.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КОМАНДИРОВОЧНЕ ПОСВІДЧЕННЯ</h1><p><strong>[[company_name]]</strong></p><p>№ [[certificate_number]] від [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Видано <strong>[[employee_name]]</strong>, [[employee_position]], для відрядження до [[destination]].</p>
                                <p>Мета відрядження: [[purpose]].</p>
                                <p>Термін відрядження: з <strong>[[travel_start_date]]</strong> по <strong>[[travel_end_date]]</strong>, тривалістю [[travel_days]] календарних днів.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник підприємства: ___________________ ([[company_name]])</p>
                                <p>Підпис працівника: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Travel Certificate',
                        'description' => 'Document confirming the employee\'s business trip.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TRAVEL CERTIFICATE</h1><p><strong>[[company_name]]</strong></p><p>No. [[certificate_number]] dated [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Issued to <strong>[[employee_name]]</strong>, [[employee_position]], for a business trip to [[destination]].</p>
                                <p>Purpose of travel: [[purpose]].</p>
                                <p>Travel period: from <strong>[[travel_start_date]]</strong> to <strong>[[travel_end_date]]</strong>, for [[travel_days]] calendar days.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of Enterprise: ___________________ ([[company_name]])</p>
                                <p>Employee\'s Signature: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zaświadczenie o delegacji',
                        'description' => 'Dokument potwierdzający fakt skierowania pracownika w podróż służbową.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZAŚWIADCZENIE O DELEGACJI</h1><p><strong>[[company_name]]</strong></p><p>Nr [[certificate_number]] z dnia [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wydano <strong>[[employee_name]]</strong>, [[employee_position]], w celu delegacji do [[destination]].</p>
                                <p>Cel delegacji: [[purpose]].</p>
                                <p>Okres delegacji: od <strong>[[travel_start_date]]</strong> do <strong>[[travel_end_date]]</strong>, na [[travel_days]] dni kalendarzowych.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik Przedsiębiorstwa: ___________________ ([[company_name]])</p>
                                <p>Podpis pracownika: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Dienstreisebescheinigung',
                        'description' => 'Dokument, das die Entsendung eines Mitarbeiters auf eine Dienstreise bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DIENSTREISEBESCHEINIGUNG</h1><p><strong>[[company_name]]</strong></p><p>Nr. [[certificate_number]] vom [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ausgestellt für <strong>[[employee_name]]</strong>, [[employee_position]], zur Dienstreise nach [[destination]].</p>
                                <p>Zweck der Dienstreise: [[purpose]].</p>
                                <p>Dienstreisezeitraum: vom <strong>[[travel_start_date]]</strong> bis <strong>[[travel_end_date]]</strong>, Dauer [[travel_days]] Kalendertage.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter des Unternehmens: ___________________ ([[company_name]])</p>
                                <p>Unterschrift des Mitarbeiters: ___________________ ([[employee_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 27. Коммерческое предложение ---
            [
                'slug' => 'commercial-offer-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва компанії","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"offer_number","type":"text","required":true,"labels":{"uk":"Номер пропозиції","en":"Offer Number", "pl":"Numer oferty", "de":"Angebotsnummer"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"uk":"Назва клієнта / Кому адресовано","en":"Client Name / Addressed to", "pl":"Nazwa klienta / Adresat", "de":"Kundenname / Adressat"}},
                    {"name":"offer_subject","type":"text","required":true,"labels":{"uk":"Тема комерційної пропозиції","en":"Commercial Offer Subject", "pl":"Temat oferty handlowej", "de":"Betreff des Angebots"}},
                    {"name":"offer_body","type":"textarea","required":true,"labels":{"uk":"Зміст комерційної пропозиції (опис послуг/товарів, ціни)","en":"Commercial Offer Content (description of services/goods, prices)", "pl":"Treść oferty handlowej (opis usług/towarów, ceny)", "de":"Inhalt des Angebots (Beschreibung der Dienstleistungen/Waren, Preise)"}},
                    {"name":"validity_date","type":"date","required":false,"labels":{"uk":"Термін дії пропозиції (до)","en":"Offer Validity Date (until)", "pl":"Termin ważności oferty (do)", "de":"Gültigkeitsdatum des Angebots (bis)"}},
                    {"name":"contact_person","type":"text","required":true,"labels":{"uk":"Контактна особа","en":"Contact Person", "pl":"Osoba kontaktowa", "de":"Ansprechpartner"}},
                    {"name":"contact_email","type":"email","required":true,"labels":{"uk":"Email контактної особи","en":"Contact Person Email", "pl":"E-mail osoby kontaktowej", "de":"E-Mail des Ansprechpartners"}},
                    {"name":"contact_phone","type":"text","required":false,"labels":{"uk":"Телефон контактної особи","en":"Contact Person Phone", "pl":"Telefon osoby kontaktowej", "de":"Telefon des Ansprechpartners"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Комерційна пропозиція',
                        'description' => 'Документ, що містить пропозицію товарів або послуг потенційному клієнту.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КОМЕРЦІЙНА ПРОПОЗИЦІЯ</h1><p>№ [[offer_number]] від [[current_date]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Кому: [[client_name]]</p></td><td style="text-align: right;"><p>Від: [[company_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Тема: [[offer_subject]]</h2>
                                <p>Шановні партнери,</p>
                                <p>[[offer_body]]</p>
                                [[validity_date]]<p>Пропозиція дійсна до [[validity_date]].</p>[[/validity_date]]
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Контактна особа: [[contact_person]]</p>
                                <p>Email: [[contact_email]] [[contact_phone]]</p>
                                <p>Телефон: [[contact_phone]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Commercial Offer',
                        'description' => 'A document containing an offer of goods or services to a potential client.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">COMMERCIAL OFFER</h1><p>No. [[offer_number]] dated [[current_date]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>To: [[client_name]]</p></td><td style="text-align: right;"><p>From: [[company_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Subject: [[offer_subject]]</h2>
                                <p>Dear Partners,</p>
                                <p>[[offer_body]]</p>
                                [[validity_date]]<p>Offer valid until [[validity_date]].</p>[[/validity_date]]
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Contact Person: [[contact_person]]</p>
                                <p>Email: [[contact_email]] [[contact_phone]]</p>
                                <p>Phone: [[contact_phone]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Oferta handlowa',
                        'description' => 'Dokument zawierający ofertę towarów lub usług dla potencjalnego klienta.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFERTA HANDLOWA</h1><p>Nr [[offer_number]] z dnia [[current_date]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Do: [[client_name]]</p></td><td style="text-align: right;"><p>Od: [[company_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Temat: [[offer_subject]]</h2>
                                <p>Szanowni Państwo,</p>
                                <p>[[offer_body]]</p>
                                [[validity_date]]<p>Oferta ważna do [[validity_date]].</p>[[/validity_date]]
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Osoba kontaktowa: [[contact_person]]</p>
                                <p>E-mail: [[contact_email]] [[contact_phone]]</p>
                                <p>Telefon: [[contact_phone]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Angebot',
                        'description' => 'Ein Dokument mit einem Angebot von Waren oder Dienstleistungen an einen potenziellen Kunden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANGEBOT</h1><p>Nr. [[offer_number]] vom [[current_date]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>An: [[client_name]]</p></td><td style="text-align: right;"><p>Von: [[company_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Betreff: [[offer_subject]]</h2>
                                <p>Sehr geehrte Partner,</p>
                                <p>[[offer_body]]</p>
                                [[validity_date]]<p>Angebot gültig bis [[validity_date]].</p>[[/validity_date]]
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Ansprechpartner: [[contact_person]]</p>
                                <p>E-Mail: [[contact_email]] [[contact_phone]]</p>
                                <p>Telefon: [[contact_phone]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 28. Письмо-претензия ---
            [
                'slug' => 'claim-letter-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва вашої компанії","en":"Your Company Name", "pl":"Nazwa Twojej firmy", "de":"Name Ihres Unternehmens"}},
                    {"name":"claim_number","type":"text","required":true,"labels":{"uk":"Номер претензії","en":"Claim Number", "pl":"Numer reklamacji", "de":"Reklamationsnummer"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"Кому (назва компанії/ПІБ)","en":"To (Company Name/Full Name)", "pl":"Do (Nazwa firmy/Imię i Nazwisko)", "de":"An (Firmenname/Name)"}},
                    {"name":"contract_number","type":"text","required":true,"labels":{"uk":"Номер договору","en":"Contract Number", "pl":"Numer umowy", "de":"Vertragsnummer"}},
                    {"name":"contract_date","type":"date","required":true,"labels":{"uk":"Дата договору","en":"Contract Date", "pl":"Data umowy", "de":"Vertragsdatum"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"uk":"Опис порушення/інциденту","en":"Description of Violation/Incident", "pl":"Opis naruszenia/incydentu", "de":"Beschreibung der Verletzung/des Vorfalls"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Ваші вимоги","en":"Your Demands", "pl":"Twoje żądania", "de":"Ihre Forderungen"}},
                    {"name":"response_deadline_days","type":"number","required":true,"labels":{"uk":"Термін відповіді (днів)","en":"Response Deadline (days)", "pl":"Termin odpowiedzi (dni)", "de":"Antwortfrist (Tage)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Лист-претензія',
                        'description' => 'Официальное письмо, содержащее претензии к другой стороне и требования об устранении нарушений.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">[[company_name]]</p>
                                <p style="text-align: right;">[[current_date]]</p>
                                <br/>
                                <p>Кому: [[recipient_name]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">ПРЕТЕНЗІЯ № [[claim_number]]</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Згідно з договором № [[contract_number]] від [[contract_date]], Вами було допущено [[incident_description]].</p>
                                <p>На підставі вищевикладеного, вимагаємо: [[demands]].</p>
                                <p>Просимо надати відповідь у строк до [[response_deadline_days]] календарних днів з моменту отримання цієї претензії.</p>
                                <p>У разі ігнорування претензії, будемо змушені звернутися до суду.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>З повагою,</p>
                                <p>Керівник [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Claim Letter',
                        'description' => 'Official letter containing claims against another party and demands for rectification of violations.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">[[company_name]]</p>
                                <p style="text-align: right;">[[current_date]]</p>
                                <br/>
                                <p>To: [[recipient_name]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">CLAIM No. [[claim_number]]</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>According to contract No. [[contract_number]] dated [[contract_date]], you have committed [[incident_description]].</p>
                                <p>Based on the above, we demand: [[demands]].</p>
                                <p>Please provide a response within [[response_deadline_days]] calendar days from the date of receipt of this claim.</p>
                                <p>In case of ignoring the claim, we will be forced to apply to court.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Sincerely,</p>
                                <p>Head of [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pismo reklamacyjne',
                        'description' => 'Oficjalne pismo zawierające roszczenia wobec drugiej strony i żądania usunięcia naruszeń.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">[[company_name]]</p>
                                <p style="text-align: right;">[[current_date]]</p>
                                <br/>
                                <p>Do: [[recipient_name]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">REKLAMACJA NR [[claim_number]]</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zgodnie z umową nr [[contract_number]] z dnia [[contract_date]], dopuściłeś się [[incident_description]].</p>
                                <p>Na podstawie powyższego, żądamy: [[demands]].</p>
                                <p>Prosimy o udzielenie odpowiedzi w terminie [[response_deadline_days]] dni kalendarzowych od daty otrzymania niniejszej reklamacji.</p>
                                <p>W przypadku zignorowania reklamacji, będziemy zmuszeni zwrócić się do sądu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Z poważaniem,</p>
                                <p>Kierownik [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Mahnung',
                        'description' => 'Offizielles Schreiben mit Ansprüchen an die andere Partei und Forderungen zur Behebung von Verstößen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">[[company_name]]</p>
                                <p style="text-align: right;">[[current_date]]</p>
                                <br/>
                                <p>An: [[recipient_name]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">REKLAMATION NR. [[claim_number]]</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Gemäß Vertrag Nr. [[contract_number]] vom [[contract_date]] haben Sie [[incident_description]] begangen.</p>
                                <p>Aufgrund des oben Genannten fordern wir: [[demands]].</p>
                                <p>Bitte antworten Sie innerhalb von [[response_deadline_days]] Kalendertagen ab Erhalt dieser Reklamation.</p>
                                <p>Im Falle der Ignorierung der Reklamation werden wir gezwungen sein, gerichtliche Schritte einzuleiten.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Mit freundlichen Grüßen,</p>
                                <p>Leiter von [[company_name]]: ___________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 29. Гарантийное письмо ---
            [
                'slug' => 'guarantee-letter-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва вашої компанії","en":"Your Company Name", "pl":"Nazwa Twojej firmy", "de":"Name Ihres Unternehmens"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"Кому (назва компанії/ПІБ)","en":"To (Company Name/Full Name)", "pl":"Do (Nazwa firmy/Imię i Nazwisko)", "de":"An (Firmenname/Name)"}},
                    {"name":"guarantee_subject","type":"text","required":true,"labels":{"uk":"Предмет гарантійного листа","en":"Subject of Guarantee Letter", "pl":"Przedmiot listu gwarancyjnego", "de":"Betreff des Garantieschreibens"}},
                    {"name":"guarantee_amount","type":"number","required":false,"labels":{"uk":"Сума гарантії (грн, якщо фінансова)","en":"Guarantee Amount (UAH, if financial)", "pl":"Kwota gwarancji (UAH, jeśli finansowa)", "de":"Garantiebetrag (UAH, falls finanziell)"}},
                    {"name":"guarantee_body","type":"textarea","required":true,"labels":{"uk":"Зміст гарантійного листа","en":"Guarantee Letter Content", "pl":"Treść listu gwarancyjnego", "de":"Inhalt des Garantieschreibens"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Гарантійний лист',
                        'description' => 'Официальный документ, подтверждающий выполнение определенных обязательств или оплату.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ГАРАНТІЙНИЙ ЛИСТ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table><p>Кому: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановні партнери,</p>
                                <p>Цим листом гарантуємо [[guarantee_subject]].</p>
                                [[guarantee_amount]]<p>Сума гарантії становить <strong>[[guarantee_amount]]</strong> грн.</p>[[/guarantee_amount]]
                                <p>[[guarantee_body]]</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Guarantee Letter',
                        'description' => 'Official document confirming the fulfillment of certain obligations or payment.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GUARANTEE LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table><p>To: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Partners,</p>
                                <p>This letter guarantees [[guarantee_subject]].</p>
                                [[guarantee_amount]]<p>The guarantee amount is <strong>[[guarantee_amount]]</strong> UAH.</p>[[/guarantee_amount]]
                                <p>[[guarantee_body]]</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'List gwarancyjny',
                        'description' => 'Oficjalny dokument potwierdzający wykonanie określonych zobowiązań lub płatności.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIST GWARANCYJNY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table><p>Do: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>Niniejszym listem gwarantujemy [[guarantee_subject]].</p>
                                [[guarantee_amount]]<p>Kwota gwarancji wynosi <strong>[[guarantee_amount]]</strong> UAH.</p>[[/guarantee_amount]]
                                <p>[[guarantee_body]]</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Garantieschreiben',
                        'description' => 'Offizielles Dokument, das die Erfüllung bestimmter Verpflichtungen oder Zahlungen bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GARANTIESCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table><p>An: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Partner,</p>
                                <p>Hiermit garantieren wir [[guarantee_subject]].</p>
                                [[guarantee_amount]]<p>Der Garantiebetrag beträgt <strong>[[guarantee_amount]]</strong> UAH.</p>[[/guarantee_amount]]
                                <p>[[guarantee_body]]</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter von [[company_name]]: ___________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 30. Официальный запрос ---
            [
                'slug' => 'official-request-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва вашої компанії","en":"Your Company Name", "pl":"Nazwa Twojej firmy", "de":"Name Ihres Unternehmens"}},
                    {"name":"request_number","type":"text","required":true,"labels":{"uk":"Номер запиту","en":"Request Number", "pl":"Numer zapytania", "de":"Anfragenummer"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"Кому (назва компанії/ПІБ)","en":"To (Company Name/Full Name)", "pl":"Do (Nazwa firmy/Imię i Nazwisko)", "de":"An (Firmenname/Name)"}},
                    {"name":"request_subject","type":"text","required":true,"labels":{"uk":"Тема офіційного запиту","en":"Official Request Subject", "pl":"Temat oficjalnego zapytania", "de":"Betreff der offiziellen Anfrage"}},
                    {"name":"request_body","type":"textarea","required":true,"labels":{"uk":"Зміст офіційного запиту","en":"Official Request Content", "pl":"Treść oficjalnego zapytania", "de":"Inhalt der offiziellen Anfrage"}},
                    {"name":"response_deadline_days","type":"number","required":false,"labels":{"uk":"Термін відповіді (днів, якщо необхідно)","en":"Response Deadline (days, if necessary)", "pl":"Termin odpowiedzi (dni, jeśli konieczne)", "de":"Antwortfrist (Tage, falls erforderlich)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Офіційний запит',
                        'description' => 'Официальный запрос информации или документов от другой организации или лица.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">[[company_name]]</p>
                                <p style="text-align: right;">[[current_date]]</p>
                                <br/>
                                <p>Кому: [[recipient_name]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">ОФІЦІЙНИЙ ЗАПИТ № [[request_number]]</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Тема: [[request_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановні партнери,</p>
                                <p>[[request_body]]</p>
                                [[response_deadline_days]]<p>Просимо надати відповідь у строк до [[response_deadline_days]] календарних днів.</p>[[/response_deadline_days]]
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Official Request',
                        'description' => 'Official request for information or documents from another organization or person.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">[[company_name]]</p>
                                <p style="text-align: right;">[[current_date]]</p>
                                <br/>
                                <p>To: [[recipient_name]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">OFFICIAL REQUEST No. [[request_number]]</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Subject: [[request_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Partners,</p>
                                <p>[[request_body]]</p>
                                [[response_deadline_days]]<p>Please provide a response within [[response_deadline_days]] calendar days.</p>[[/response_deadline_days]]
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Oficjalne zapytanie',
                        'description' => 'Oficjalne zapytanie o informacje lub dokumenty od innej organizacji lub osoby.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">[[company_name]]</p>
                                <p style="text-align: right;">[[current_date]]</p>
                                <br/>
                                <p>Do: [[recipient_name]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">OFICJALNE ZAPYTANIE NR [[request_number]]</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Temat: [[request_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>[[request_body]]</p>
                                [[response_deadline_days]]<p>Prosimy o udzielenie odpowiedzi w terminie [[response_deadline_days]] dni kalendarzowych.</p>[[/response_deadline_days]]
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Offizielle Anfrage',
                        'description' => 'Offizielle Anfrage nach Informationen oder Dokumenten von einer anderen Organisation oder Person.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 16px; font-weight: bold;">OFFIZIELLE ANFRAGE NR. [[request_number]]</h1><p><strong>[[company_name]]</strong></p><p>[[current_date]]</p><p>An: [[recipient_name]]</p><h2 style="font-size: 14px; font-weight: bold; text-align: center;">Betreff: [[request_subject]]</h2></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Partner,</p>
                                <p>[[request_body]]</p>
                                [[response_deadline_days]]<p>Bitte antworten Sie innerhalb von [[response_deadline_days]] Kalendertagen.</p>[[/response_deadline_days]]
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter von [[company_name]]: ___________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 31. Письмо-уведомление ---
            [
                'slug' => 'notification-letter-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва вашої компанії","en":"Your Company Name", "pl":"Nazwa Twojej firmy", "de":"Name Ihres Unternehmens"}},
                    {"name":"notification_number","type":"text","required":true,"labels":{"uk":"Номер повідомлення","en":"Notification Number", "pl":"Numer powiadomienia", "de":"Benachrichtigungsnummer"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"Кому (назва компанії/ПІБ)","en":"To (Company Name/Full Name)", "pl":"Do (Nazwa firmy/Imię i Nazwisko)", "de":"An (Firmenname/Name)"}},
                    {"name":"notification_subject","type":"text","required":true,"labels":{"uk":"Тема повідомлення","en":"Notification Subject", "pl":"Temat powiadomienia", "de":"Betreff der Benachrichtigung"}},
                    {"name":"notification_body","type":"textarea","required":true,"labels":{"uk":"Зміст повідомлення","en":"Notification Content", "pl":"Treść powiadomienia", "de":"Inhalt der Benachrichtigung"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Лист-повідомлення',
                        'description' => 'Официальное письмо, информирующее другую сторону о каком-либо событии, изменении или решении.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">[[company_name]]</p>
                                <p style="text-align: right;">[[current_date]]</p>
                                <br/>
                                <p>Кому: [[recipient_name]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">ПОВІДОМЛЕННЯ № [[notification_number]]</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Тема: [[notification_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановні партнери,</p>
                                <p>[[notification_body]]</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Notification Letter',
                        'description' => 'Official letter informing another party about an event, change, or decision.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">[[company_name]]</p>
                                <p style="text-align: right;">[[current_date]]</p>
                                <br/>
                                <p>To: [[recipient_name]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">NOTIFICATION No. [[notification_number]]</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Subject: [[notification_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Partners,</p>
                                <p>[[notification_body]]</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pismo powiadamiające',
                        'description' => 'Oficjalne pismo informujące drugą stronę o jakimś zdarzeniu, zmianie lub decyzji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">[[company_name]]</p>
                                <p style="text-align: right;">[[current_date]]</p>
                                <br/>
                                <p>Do: [[recipient_name]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">POWIADOMIENIE NR [[notification_number]]</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Temat: [[notification_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>[[notification_body]]</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Benachrichtigungsschreiben',
                        'description' => 'Offizielles Schreiben, das die andere Partei über ein Ereignis, eine Änderung oder eine Entscheidung informiert.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 16px; font-weight: bold;">BENACHRICHTIGUNG NR. [[notification_number]]</h1><p><strong>[[company_name]]</strong></p><p>[[current_date]]</p><p>An: [[recipient_name]]</p><h2 style="font-size: 14px; font-weight: bold; text-align: center;">Betreff: [[notification_subject]]</h2></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Partner,</p>
                                <p>[[notification_body]]</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter von [[company_name]]: ___________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 32. Письмо-извинение ---
            [
                'slug' => 'apology-letter-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва вашої компанії","en":"Your Company Name", "pl":"Nazwa Twojej firmy", "de":"Name Ihres Unternehmens"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"Кому (назва компанії/ПІБ)","en":"To (Company Name/Full Name)", "pl":"Do (Nazwa firmy/Imię i Nazwisko)", "de":"An (Firmenname/Name)"}},
                    {"name":"apology_subject","type":"text","required":true,"labels":{"uk":"Тема листа-вибачення","en":"Apology Letter Subject", "pl":"Temat listu z przeprosinami", "de":"Betreff des Entschuldigungsschreibens"}},
                    {"name":"apology_body","type":"textarea","required":true,"labels":{"uk":"Зміст вибачення","en":"Apology Content", "pl":"Treść przeprosin", "de":"Inhalt der Entschuldigung"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Лист-вибачення',
                        'description' => 'Официальное письмо с извинениями за допущенные ошибки или неудобства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЛИСТ-ВИБАЧЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table><p>Кому: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Тема: [[apology_subject]]</h2>
                                <p>Шановні партнери,</p>
                                <p>[[apology_body]]</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Apology Letter',
                        'description' => 'Official letter of apology for mistakes or inconveniences caused.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APOLOGY LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table><p>To: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Subject: [[apology_subject]]</h2>
                                <p>Dear Partners,</p>
                                <p>[[apology_body]]</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'List z przeprosinami',
                        'description' => 'Oficjalne pismo z przeprosinami za popełnione błędy lub niedogodności.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIST Z PRZEPROSINAMI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table><p>Do: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Temat: [[apology_subject]]</h2>
                                <p>Szanowni Państwo,</p>
                                <p>[[apology_body]]</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Entschuldigungsschreiben',
                        'description' => 'Offizielles Schreiben mit einer Entschuldigung für gemachte Fehler oder Unannehmlichkeiten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ENTSCHULDIGUNGSSCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table><p>An: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Betreff: [[apology_subject]]</h2>
                                <p>Sehr geehrte Partner,</p>
                                <p>[[apology_body]]</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter von [[company_name]]: ___________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 33. Благодарственное письмо ---
            [
                'slug' => 'thank-you-letter-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва вашої компанії","en":"Your Company Name", "pl":"Nazwa Twojej firmy", "de":"Name Ihres Unternehmens"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"Кому (назва компанії/ПІБ)","en":"To (Company Name/Full Name)", "pl":"Do (Nazwa firmy/Imię i Nazwisko)", "de":"An (Firmenname/Name)"}},
                    {"name":"thank_you_subject","type":"text","required":true,"labels":{"uk":"Тема листа-подяки","en":"Thank You Letter Subject", "pl":"Temat listu z podziękowaniami", "de":"Betreff des Dankschreibens"}},
                    {"name":"thank_you_body","type":"textarea","required":true,"labels":{"uk":"Зміст подяки","en":"Thank You Content", "pl":"Treść podziękowań", "de":"Inhalt des Dankschreibens"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Подячний лист',
                        'description' => 'Официальное письмо с выражением благодарности за сотрудничество, помощь или услугу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОДЯЧНИЙ ЛИСТ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table><p>Кому: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Тема: [[thank_you_subject]]</h2>
                                <p>Шановні партнери,</p>
                                <p>[[thank_you_body]]</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Thank You Letter',
                        'description' => 'Official letter expressing gratitude for cooperation, help, or service.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">THANK YOU LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table><p>To: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Subject: [[thank_you_subject]]</h2>
                                <p>Dear Partners,</p>
                                <p>[[thank_you_body]]</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head of [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'List z podziękowaniami',
                        'description' => 'Oficjalne pismo wyrażające wdzięczność za współpracę, pomoc lub usługę.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIST Z PODZIĘKOWANIAMI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table><p>Do: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Temat: [[thank_you_subject]]</h2>
                                <p>Szanowni Państwo,</p>
                                <p>[[thank_you_body]]</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik [[company_name]]: ___________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Dankschreiben',
                        'description' => 'Offizielles Schreiben, das Dankbarkeit für Zusammenarbeit, Hilfe oder Dienstleistung ausdrückt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DANKSCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table><p>An: [[recipient_name]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">Betreff: [[thank_you_subject]]</h2>
                                <p>Sehr geehrte Partner,</p>
                                <p>[[thank_you_body]]</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter von [[company_name]]: ___________________</p>
                            </div>'
                    ],
                ]
            ],
            // --- 34. Счет на оплату (Инвойс) ---
            [
                'slug' => 'invoice-ua',
                'fields' => '[
                    {"name":"invoice_number","type":"text","required":true,"labels":{"uk":"Номер рахунку","en":"Invoice Number", "pl":"Numer faktury", "de":"Rechnungsnummer"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"Назва продавця","en":"Seller Name", "pl":"Nazwa sprzedawcy", "de":"Verkäufername"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"uk":"Адреса продавця","en":"Seller Address", "pl":"Adres sprzedawcy", "de":"Verkäuferadresse"}},
                    {"name":"seller_edrpou","type":"text","required":true,"labels":{"uk":"ЄДРПОУ продавця","en":"Seller EDRPOU", "pl":"EDRPOU sprzedawcy", "de":"EDRPOU des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"Назва покупця","en":"Buyer Name", "pl":"Nazwa nabywcy", "de":"Käufername"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"uk":"Адреса покупця","en":"Buyer Address", "pl":"Adres nabywcy", "de":"Käuferadresse"}},
                    {"name":"buyer_edrpou","type":"text","required":true,"labels":{"uk":"ЄДРПОУ покупця","en":"Buyer EDRPOU", "pl":"EDRPOU nabywcy", "de":"EDRPOU des Käufers"}},
                    {"name":"payment_details","type":"textarea","required":true,"labels":{"uk":"Реквізити для оплати","en":"Payment Details", "pl":"Dane do płatności", "de":"Zahlungsdetails"}},
                    {"name":"items_list","type":"textarea","required":true,"labels":{"uk":"Перелік товарів/послуг (Назва, Кількість, Ціна за од., Сума)","en":"List of Goods/Services (Name, Quantity, Price per unit, Amount)", "pl":"Lista towarów/usług (Nazwa, Ilość, Cena jednostkowa, Kwota)", "de":"Liste der Waren/Dienstleistungen (Name, Menge, Preis pro Einheit, Betrag)"}},
                    {"name":"total_amount","type":"number","required":true,"labels":{"uk":"Загальна сума (грн)","en":"Total Amount (UAH)", "pl":"Całkowita kwota (UAH)", "de":"Gesamtbetrag (UAH)"}},
                    {"name":"total_amount_text","type":"text","required":true,"labels":{"uk":"Загальна сума прописом","en":"Total Amount in Words", "pl":"Całkowita kwota słownie", "de":"Gesamtbetrag in Worten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Рахунок на оплату (Інвойс)',
                        'description' => 'Документ, що виставляється продавцем покупцеві для запиту платежу за товари або послуги.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РАХУНОК НА ОПЛАТУ</h1><p>№ [[invoice_number]] від [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Продавець:</strong> [[seller_name]], ЄДРПОУ: [[seller_edrpou]], Адреса: [[seller_address]]</p>
                                <p><strong>Покупець:</strong> [[buyer_name]], ЄДРПОУ: [[buyer_edrpou]], Адреса: [[buyer_address]]</p>
                                <br/>
                                <p><strong>Реквізити для оплати:</strong></p>
                                <p>[[payment_details]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Назва товару/послуги</th>
                                            <th>Кількість</th>
                                            <th>Ціна за од.</th>
                                            <th>Сума</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>1</td><td>Послуга 1</td><td>1</td><td>100.00</td><td>100.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Всього до сплати: [[total_amount]] грн.</strong></p>
                                <p style="text-align: right;">Сума прописом: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник: ___________________</p>
                                <p>Головний бухгалтер: ___________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Invoice',
                        'description' => 'A document issued by the seller to the buyer to request payment for goods or services.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">INVOICE</h1><p>No. [[invoice_number]] dated [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Seller:</strong> [[seller_name]], EDRPOU: [[seller_edrpou]], Address: [[seller_address]]</p>
                                <p><strong>Buyer:</strong> [[buyer_name]], EDRPOU: [[buyer_edrpou]], Address: [[buyer_address]]</p>
                                <br/>
                                <p><strong>Payment Details:</strong></p>
                                <p>[[payment_details]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>1</td><td>Service 1</td><td>1</td><td>100.00</td><td>100.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Total Due: [[total_amount]] UAH.</strong></p>
                                <p style="text-align: right;">Amount in words: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head: ___________________</p>
                                <p>Chief Accountant: ___________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Faktura',
                        'description' => 'Dokument wystawiany przez sprzedawcę nabywcy w celu żądania zapłaty za towary lub usługi.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FAKTURA</h1><p>Nr [[invoice_number]] z dnia [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Sprzedawca:</strong> [[seller_name]], EDRPOU: [[seller_edrpou]], Adres: [[seller_address]]</p>
                                <p><strong>Nabywca:</strong> [[buyer_name]], EDRPOU: [[buyer_edrpou]], Adres: [[buyer_address]]</p>
                                <br/>
                                <p><strong>Dane do płatności:</strong></p>
                                <p>[[payment_details]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Lp.</th>
                                            <th>Opis</th>
                                            <th>Ilość</th>
                                            <th>Cena jedn.</th>
                                            <th>Kwota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>1</td><td>Usługa 1</td><td>1</td><td>100.00</td><td>100.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Całkowita kwota do zapłaty: [[total_amount]] UAH.</strong></p>
                                <p style="text-align: right;">Kwota słownie: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik: ___________________</p>
                                <p>Główny Księgowy: ___________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Rechnung',
                        'description' => 'Ein Dokument, das vom Verkäufer an den Käufer ausgestellt wird, um die Zahlung für Waren oder Dienstleistungen anzufordern.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECHNUNG</h1><p>Nr. [[invoice_number]] vom [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Verkäufer:</strong> [[seller_name]], EDRPOU: [[seller_edrpou]], Adresse: [[seller_address]]</p>
                                <p><strong>Käufer:</strong> [[buyer_name]], EDRPOU: [[buyer_edrpou]], Adresse: [[buyer_address]]</p>
                                <br/>
                                <p><strong>Zahlungsdetails:</strong></p>
                                <p>[[payment_details]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Nr.</th>
                                            <th>Beschreibung</th>
                                            <th>Menge</th>
                                            <th>Einzelpreis</th>
                                            <th>Betrag</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>1</td><td>Dienstleistung 1</td><td>1</td><td>100.00</td><td>100.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;"><strong>Gesamtbetrag: [[total_amount]] UAH.</strong></p>
                                <p style="text-align: right;">Betrag in Worten: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter: ___________________</p>
                                <p>Hauptbuchhalter: ___________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 35. Счет-фактура ---
            [
                'slug' => 'tax-invoice-ua',
                'fields' => '[
                    {"name":"invoice_number","type":"text","required":true,"labels":{"uk":"Номер податкової накладної","en":"Tax Invoice Number", "pl":"Numer faktury VAT", "de":"Steuerrechnungsnummer"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"Назва продавця","en":"Seller Name", "pl":"Nazwa sprzedawcy", "de":"Verkäufername"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"uk":"Адреса продавця","en":"Seller Address", "pl":"Adres sprzedawcy", "de":"Verkäuferadresse"}},
                    {"name":"seller_inn","type":"text","required":true,"labels":{"uk":"ІПН продавця","en":"Seller TIN", "pl":"NIP sprzedawcy", "de":"Steuernummer des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"Назва покупця","en":"Buyer Name", "pl":"Nazwa nabywcy", "de":"Käufername"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"uk":"Адреса покупця","en":"Buyer Address", "pl":"Adres nabywcy", "de":"Käuferadresse"}},
                    {"name":"buyer_inn","type":"text","required":true,"labels":{"uk":"ІПН покупця","en":"Buyer TIN", "pl":"NIP nabywcy", "de":"Steuernummer des Käufers"}},
                    {"name":"items_list","type":"textarea","required":true,"labels":{"uk":"Перелік товарів/послуг (Назва, Кількість, Ціна без ПДВ, Сума без ПДВ, ПДВ, Сума з ПДВ)","en":"List of Goods/Services (Name, Quantity, Price excl. VAT, Amount excl. VAT, VAT, Amount incl. VAT)", "pl":"Lista towarów/usług (Nazwa, Ilość, Cena netto, Kwota netto, VAT, Kwota brutto)", "de":"Liste der Waren/Dienstleistungen (Name, Menge, Preis exkl. MwSt., Betrag exkl. MwSt., MwSt., Betrag inkl. MwSt.)"}},
                    {"name":"total_amount_excl_vat","type":"number","required":true,"labels":{"uk":"Всього без ПДВ (грн)","en":"Total excl. VAT (UAH)", "pl":"Całkowita kwota netto (UAH)", "de":"Gesamtbetrag exkl. MwSt. (UAH)"}},
                    {"name":"total_vat_amount","type":"number","required":true,"labels":{"uk":"Сума ПДВ (грн)","en":"Total VAT Amount (UAH)", "pl":"Kwota VAT (UAH)", "de":"Gesamt-MwSt.-Betrag (UAH)"}},
                    {"name":"total_amount_incl_vat","type":"number","required":true,"labels":{"uk":"Всього з ПДВ (грн)","en":"Total incl. VAT (UAH)", "pl":"Całkowita kwota brutto (UAH)", "de":"Gesamtbetrag inkl. MwSt. (UAH)"}},
                    {"name":"total_amount_text","type":"text","required":true,"labels":{"uk":"Загальна сума прописом","en":"Total Amount in Words", "pl":"Całkowita kwota słownie", "de":"Gesamtbetrag in Worten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Податкова накладна',
                        'description' => 'Документ, що підтверджує факт продажу товарів або послуг та суму ПДВ.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОДАТКОВА НАКЛАДНА</h1><p>№ [[invoice_number]] від [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Продавець:</strong> [[seller_name]], ІПН: [[seller_inn]], Адреса: [[seller_address]]</p>
                                <p><strong>Покупець:</strong> [[buyer_name]], ІПН: [[buyer_inn]], Адреса: [[buyer_address]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Назва товару/послуги</th>
                                            <th>Кількість</th>
                                            <th>Ціна без ПДВ</th>
                                            <th>Сума без ПДВ</th>
                                            <th>ПДВ</th>
                                            <th>Сума з ПДВ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>1</td><td>Товар 1</td><td>1</td><td>83.33</td><td>83.33</td><td>16.67</td><td>100.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Всього без ПДВ: <strong>[[total_amount_excl_vat]]</strong> грн.</p>
                                <p style="text-align: right;">Сума ПДВ: <strong>[[total_vat_amount]]</strong> грн.</p>
                                <p style="text-align: right;">Всього з ПДВ: <strong>[[total_amount_incl_vat]]</strong> грн.</p>
                                <p style="text-align: right;">Сума прописом: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Керівник: ___________________</p>
                                <p>Головний бухгалтер: ___________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Tax Invoice',
                        'description' => 'A document confirming the sale of goods or services and the amount of VAT.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TAX INVOICE</h1><p>No. [[invoice_number]] dated [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Seller:</strong> [[seller_name]], TIN: [[seller_inn]], Address: [[seller_address]]</p>
                                <p><strong>Buyer:</strong> [[buyer_name]], TIN: [[buyer_inn]], Address: [[buyer_address]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Price excl. VAT</th>
                                            <th>Amount excl. VAT</th>
                                            <th>VAT</th>
                                            <th>Amount incl. VAT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>1</td><td>Item 1</td><td>1</td><td>83.33</td><td>83.33</td><td>16.67</td><td>100.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Total excl. VAT: <strong>[[total_amount_excl_vat]]</strong> UAH.</p>
                                <p style="text-align: right;">Total VAT Amount: <strong>[[total_vat_amount]]</strong> UAH.</p>
                                <p style="text-align: right;">Total incl. VAT: <strong>[[total_amount_incl_vat]]</strong> UAH.</p>
                                <p style="text-align: right;">Amount in words: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Head: ___________________</p>
                                <p>Chief Accountant: ___________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Faktura VAT',
                        'description' => 'Dokument potwierdzający sprzedaż towarów lub usług oraz kwotę VAT.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FAKTURA VAT</h1><p>Nr [[invoice_number]] z dnia [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Sprzedawca:</strong> [[seller_name]], NIP: [[seller_inn]], Adres: [[seller_address]]</p>
                                <p><strong>Nabywca:</strong> [[buyer_name]], NIP: [[buyer_inn]], Adres: [[buyer_address]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Lp.</th>
                                            <th>Opis</th>
                                            <th>Ilość</th>
                                            <th>Cena netto</th>
                                            <th>Kwota netto</th>
                                            <th>VAT</th>
                                            <th>Kwota brutto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>1</td><td>Towar 1</td><td>1</td><td>83.33</td><td>83.33</td><td>16.67</td><td>100.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Całkowita kwota netto: <strong>[[total_amount_excl_vat]]</strong> UAH.</p>
                                <p style="text-align: right;">Kwota VAT: <strong>[[total_vat_amount]]</strong> UAH.</p>
                                <p style="text-align: right;">Całkowita kwota brutto: <strong>[[total_amount_incl_vat]]</strong> UAH.</p>
                                <p style="text-align: right;">Kwota słownie: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Kierownik: ___________________</p>
                                <p>Główny Księgowy: ___________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Steuerrechnung',
                        'description' => 'Ein Dokument, das den Verkauf von Waren oder Dienstleistungen und den Mehrwertsteuerbetrag bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STEUERRECHNUNG</h1><p>Nr. [[invoice_number]] vom [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Verkäufer:</strong> [[seller_name]], St.-Nr.: [[seller_inn]], Adresse: [[seller_address]]</p>
                                <p><strong>Käufer:</strong> [[buyer_name]], St.-Nr.: [[buyer_inn]], Adresse: [[buyer_address]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Nr.</th>
                                            <th>Beschreibung</th>
                                            <th>Menge</th>
                                            <th>Preis exkl. MwSt.</th>
                                            <th>Betrag exkl. MwSt.</th>
                                            <th>MwSt.</th>
                                            <th>Betrag inkl. MwSt.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>1</td><td>Artikel 1</td><td>1</td><td>83.33</td><td>83.33</td><td>16.67</td><td>100.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Gesamtbetrag exkl. MwSt.: <strong>[[total_amount_excl_vat]]</strong> UAH.</p>
                                <p style="text-align: right;">Gesamt-MwSt.-Betrag: <strong>[[total_vat_amount]]</strong> UAH.</p>
                                <p style="text-align: right;">Gesamtbetrag inkl. MwSt.: <strong>[[total_amount_incl_vat]]</strong> UAH.</p>
                                <p style="text-align: right;">Betrag in Worten: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Leiter: ___________________</p>
                                <p>Hauptbuchhalter: ___________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 36. Товарная накладная ---
            [
                'slug' => 'waybill-ua',
                'fields' => '[
                    {"name":"waybill_number","type":"text","required":true,"labels":{"uk":"Номер товарної накладної","en":"Waybill Number", "pl":"Numer listu przewozowego", "de":"Lieferscheinnummer"}},
                    {"name":"shipper_name","type":"text","required":true,"labels":{"uk":"Назва відправника","en":"Shipper Name", "pl":"Nazwa nadawcy", "de":"Absendername"}},
                    {"name":"shipper_address","type":"text","required":true,"labels":{"uk":"Адреса відправника","en":"Shipper Address", "pl":"Adres nadawcy", "de":"Absenderadresse"}},
                    {"name":"consignee_name","type":"text","required":true,"labels":{"uk":"Назва одержувача","en":"Consignee Name", "pl":"Nazwa odbiorcy", "de":"Empfängername"}},
                    {"name":"consignee_address","type":"text","required":true,"labels":{"uk":"Адреса одержувача","en":"Consignee Address", "pl":"Adres odbiorcy", "de":"Empfängeradresse"}},
                    {"name":"items_list","type":"textarea","required":true,"labels":{"uk":"Перелік товарів (Назва, Одиниця виміру, Кількість, Ціна, Сума)","en":"List of Goods (Name, Unit, Quantity, Price, Amount)", "pl":"Lista towarów (Nazwa, Jednostka miary, Ilość, Cena, Kwota)", "de":"Liste der Waren (Name, Einheit, Menge, Preis, Betrag)"}},
                    {"name":"total_quantity","type":"number","required":true,"labels":{"uk":"Всього кількість","en":"Total Quantity", "pl":"Łączna ilość", "de":"Gesamtmenge"}},
                    {"name":"total_amount","type":"number","required":true,"labels":{"uk":"Всього сума (грн)","en":"Total Amount (UAH)", "pl":"Całkowita kwota (UAH)", "de":"Gesamtbetrag (UAH)"}},
                    {"name":"total_amount_text","type":"text","required":true,"labels":{"uk":"Загальна сума прописом","en":"Total Amount in Words", "pl":"Całkowita kwota słownie", "de":"Gesamtbetrag in Worten"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Товарна накладна',
                        'description' => 'Документ, що підтверджує факт відвантаження товарів та їх отримання.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ТОВАРНА НАКЛАДНА</h1><p>№ [[waybill_number]] від [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Відправник:</strong> [[shipper_name]], Адреса: [[shipper_address]]</p>
                                <p><strong>Одержувач:</strong> [[consignee_name]], Адреса: [[consignee_address]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Назва товару</th>
                                            <th>Одиниця виміру</th>
                                            <th>Кількість</th>
                                            <th>Ціна</th>
                                            <th>Сума</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>1</td><td>Товар 1</td><td>шт.</td><td>10</td><td>50.00</td><td>500.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Всього кількість: <strong>[[total_quantity]]</strong></p>
                                <p style="text-align: right;">Всього сума: <strong>[[total_amount]]</strong> грн.</p>
                                <p style="text-align: right;">Сума прописом: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Відпустив: ___________________</p>
                                <p>Прийняв: ___________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Waybill',
                        'description' => 'A document confirming the shipment and receipt of goods.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WAYBILL</h1><p>No. [[waybill_number]] dated [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Shipper:</strong> [[shipper_name]], Address: [[shipper_address]]</p>
                                <p><strong>Consignee:</strong> [[consignee_name]], Address: [[consignee_address]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Description</th>
                                            <th>Unit</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>1</td><td>Item 1</td><td>pcs</td><td>10</td><td>50.00</td><td>500.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Total Quantity: <strong>[[total_quantity]]</strong></p>
                                <p style="text-align: right;">Total Amount: <strong>[[total_amount]]</strong> UAH.</p>
                                <p style="text-align: right;">Amount in words: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Shipped by: ___________________</p>
                                <p>Received by: ___________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'List przewozowy',
                        'description' => 'Dokument potwierdzający fakt wysyłki towarów i ich otrzymania.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIST PRZEWOZOWY</h1><p>Nr [[waybill_number]] z dnia [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Nadawca:</strong> [[shipper_name]], Adres: [[shipper_address]]</p>
                                <p><strong>Odbiorca:</strong> [[consignee_name]], Adres: [[consignee_address]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Lp.</th>
                                            <th>Nazwa towaru</th>
                                            <th>Jedn. miary</th>
                                            <th>Ilość</th>
                                            <th>Cena</th>
                                            <th>Kwota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>1</td><td>Towar 1</td><td>szt.</td><td>10</td><td>50.00</td><td>500.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Łączna ilość: <strong>[[total_quantity]]</strong></p>
                                <p style="text-align: right;">Łączna kwota: <strong>[[total_amount]]</strong> UAH.</p>
                                <p style="text-align: right;">Kwota słownie: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Wydał: ___________________</p>
                                <p>Przyjął: ___________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Lieferschein',
                        'description' => 'Ein Dokument, das den Versand und Empfang von Waren bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIEFERSCHEIN</h1><p>Nr. [[waybill_number]] vom [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Absender:</strong> [[shipper_name]], Adresse: [[shipper_address]]</p>
                                <p><strong>Empfänger:</strong> [[consignee_name]], Adresse: [[consignee_address]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Nr.</th>
                                            <th>Beschreibung</th>
                                            <th>Einheit</th>
                                            <th>Menge</th>
                                            <th>Preis</th>
                                            <th>Betrag</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>1</td><td>Artikel 1</td><td>Stk.</td><td>10</td><td>50.00</td><td>500.00</td></tr> -->
                                        [[items_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Gesamtmenge: <strong>[[total_quantity]]</strong></p>
                                <p style="text-align: right;">Gesamtbetrag: <strong>[[total_amount]]</strong> UAH.</p>
                                <p style="text-align: right;">Betrag in Worten: [[total_amount_text]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Versandt von: ___________________</p>
                                <p>Empfangen von: ___________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 37. Договор займа между юридическими лицами ---
            [
                'slug' => 'loan-agreement-legal-entities-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"lender_name","type":"text","required":true,"labels":{"uk":"Назва позикодавця","en":"Lender Name", "pl":"Nazwa pożyczkodawcy", "de":"Name des Kreditgebers"}},
                    {"name":"lender_edrpou","type":"text","required":true,"labels":{"uk":"ЄДРПОУ позикодавця","en":"Lender EDRPOU", "pl":"EDRPOU pożyczkodawcy", "de":"EDRPOU des Kreditgebers"}},
                    {"name":"lender_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника позикодавця","en":"Lender Director Full Name", "pl":"Imię i nazwisko dyrektora pożyczkodawcy", "de":"Vollständiger Name des Kreditgeber-Direktors"}},
                    {"name":"borrower_name","type":"text","required":true,"labels":{"uk":"Назва позичальника","en":"Borrower Name", "pl":"Nazwa pożyczkobiorcy", "de":"Name des Kreditnehmers"}},
                    {"name":"borrower_edrpou","type":"text","required":true,"labels":{"uk":"ЄДРПОУ позичальника","en":"Borrower EDRPOU", "pl":"EDRPOU pożyczkobiorcy", "de":"EDRPOU des Kreditnehmers"}},
                    {"name":"borrower_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника позичальника","en":"Borrower Director Full Name", "pl":"Imię i nazwisko dyrektora pożyczkobiorcy", "de":"Vollständiger Name des Kreditnehmer-Direktors"}},
                    {"name":"loan_amount","type":"number","required":true,"labels":{"uk":"Сума позики (грн)","en":"Loan Amount (UAH)", "pl":"Kwota pożyczki (UAH)", "de":"Darlehensbetrag (UAH)"}},
                    {"name":"loan_amount_text","type":"text","required":true,"labels":{"uk":"Сума позики прописом","en":"Loan Amount in Words", "pl":"Kwota pożyczki słownie", "de":"Darlehensbetrag in Worten"}},
                    {"name":"repayment_date","type":"date","required":true,"labels":{"uk":"Дата повернення позики","en":"Repayment Date", "pl":"Data zwrotu pożyczki", "de":"Rückzahlungsdatum"}},
                    {"name":"interest_rate","type":"number","required":false,"labels":{"uk":"Процентна ставка (%, якщо є)","en":"Interest Rate (%, if any)", "pl":"Oprocentowanie (%, jeśli dotyczy)", "de":"Zinssatz (%, falls zutreffend)"}},
                    {"name":"loan_purpose","type":"textarea","required":false,"labels":{"uk":"Мета позики (за бажанням)","en":"Purpose of Loan (optional)", "pl":"Cel pożyczki (opcjonalnie)", "de":"Zweck des Darlehens (optional)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір позики між юридичними особами',
                        'description' => 'Договір про надання грошових коштів однією юридичною особою іншій на умовах повернення.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ПОЗИКИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[lender_name]]</strong> (ЄДРПОУ: [[lender_edrpou]]), в особі керівника [[lender_director]], надалі "Позикодавець", з одного боку, та
                                <strong>[[borrower_name]]</strong> (ЄДРПОУ: [[borrower_edrpou]]), в особі керівника [[borrower_director]], надалі "Позичальник", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Позикодавець передає Позичальнику грошові кошти у розмірі <strong>[[loan_amount]]</strong> грн ([[loan_amount_text]]) на умовах повернення до <strong>[[repayment_date]]</strong>.</p>
                                [[interest_rate]]<p>1.2. За користування позикою встановлюється процентна ставка у розмірі [[interest_rate]]% річних.</p>[[/interest_rate]]
                                [[loan_purpose]]<p>1.3. Мета позики: [[loan_purpose]].</p>[[/loan_purpose]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">РЕКВІЗИТИ ТА ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ПОЗИКОДАВЕЦЬ:</strong></p>
                                            <p>[[lender_name]]</p>
                                            <p>ЄДРПОУ: [[lender_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[lender_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ПОЗИЧАЛЬНИК:</strong></p>
                                            <p>[[borrower_name]]</p>
                                            <p>ЄДРПОУ: [[borrower_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[borrower_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Loan Agreement between Legal Entities',
                        'description' => 'Agreement on the provision of funds by one legal entity to another on repayment terms.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LOAN AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[lender_name]]</strong> (EDRPOU: [[lender_edrpou]]), represented by its head [[lender_director]], hereinafter "Lender", on the one hand, and
                                <strong>[[borrower_name]]</strong> (EDRPOU: [[borrower_edrpou]]), represented by its head [[borrower_director]], hereinafter "Borrower", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Lender transfers to the Borrower funds in the amount of <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]) on terms of repayment by <strong>[[repayment_date]]</strong>.</p>
                                [[interest_rate]]<p>1.2. An interest rate of [[interest_rate]]% per annum is set for the use of the loan.</p>[[/interest_rate]]
                                [[loan_purpose]]<p>1.3. Purpose of the loan: [[loan_purpose]].</p>[[/loan_purpose]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">DETAILS AND SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>LENDER:</strong></p>
                                            <p>[[lender_name]]</p>
                                            <p>EDRPOU: [[lender_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[lender_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>BORROWER:</strong></p>
                                            <p>[[borrower_name]]</p>
                                            <p>EDRPOU: [[borrower_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[borrower_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa pożyczki między osobami prawnymi',
                        'description' => 'Umowa o udzielenie środków pieniężnych przez jedną osobę prawną drugiej na warunkach zwrotu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA POŻYCZKI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[lender_name]]</strong> (EDRPOU: [[lender_edrpou]]), reprezentowany przez kierownika [[lender_director]], zwany dalej "Pożyczkodawcą", z jednej strony, oraz
                                <strong>[[borrower_name]]</strong> (EDRPOU: [[borrower_edrpou]]), reprezentowany przez kierownika [[borrower_director]], zwany dalej "Pożyczkobiorcą", z drugiej strony, zawarli niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Pożyczkodawca przekazuje Pożyczkobiorcy środki pieniężne w wysokości <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]) na warunkach zwrotu do <strong>[[repayment_date]]</strong>.</p>
                                [[interest_rate]]<p>1.2. Za korzystanie z pożyczki ustala się oprocentowanie w wysokości [[interest_rate]]% rocznie.</p>[[/interest_rate]]
                                [[loan_purpose]]<p>1.3. Cel pożyczki: [[loan_purpose]].</p>[[/loan_purpose]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">DANE I PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>POŻYCZKODAWCA:</strong></p>
                                            <p>[[lender_name]]</p>
                                            <p>EDRPOU: [[lender_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[lender_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>POŻYCZKOBIORCA:</strong></p>
                                            <p>[[borrower_name]]</p>
                                            <p>EDRPOU: [[borrower_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[borrower_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Darlehensvertrag zwischen juristischen Personen',
                        'description' => 'Vertrag über die Bereitstellung von Geldern durch eine juristische Person an eine andere unter Rückzahlungsbedingungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DARLEHENSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[lender_name]]</strong> (EDRPOU: [[lender_edrpou]]), vertreten durch den Leiter [[lender_director]], nachfolgend "Kreditgeber" genannt, einerseits, und
                                <strong>[[borrower_name]]</strong> (EDRPOU: [[borrower_edrpou]]), vertreten durch den Leiter [[borrower_director]], nachfolgend "Kreditnehmer" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Kreditgeber überlässt dem Kreditnehmer Gelder in Höhe von <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]) unter der Bedingung der Rückzahlung bis zum <strong>[[repayment_date]]</strong>.</p>
                                [[interest_rate]]<p>1.2. Für die Nutzung des Darlehens wird ein Zinssatz von [[interest_rate]]% pro Jahr festgelegt.</p>[[/interest_rate]]
                                [[loan_purpose]]<p>1.3. Zweck des Darlehens: [[loan_purpose]].</p>[[/loan_purpose]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ANGABEN UND UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>KREDITGEBER:</strong></p>
                                            <p>[[lender_name]]</p>
                                            <p>EDRPOU: [[lender_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[lender_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>KREDITNEHMER:</strong></p>
                                            <p>[[borrower_name]]</p>
                                            <p>EDRPOU: [[borrower_edrpou]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[borrower_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 38. Авансовый отчет ---
            [
                'slug' => 'advance-report-ua',
                'fields' => '[
                    {"name":"report_number","type":"text","required":true,"labels":{"uk":"Номер авансового звіту","en":"Report Number", "pl":"Numer raportu zaliczkowego", "de":"Spesenabrechnungsnummer"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва підприємства","en":"Company Name", "pl":"Nazwa firmy", "de":"Firmenname"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"uk":"ПІБ працівника","en":"Employee Full Name", "pl":"Imię i nazwisko pracownika", "de":"Vollständiger Name des Arbeitnehmers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"uk":"Посада працівника","en":"Employee Position", "pl":"Stanowisko pracownika", "de":"Position des Arbeitnehmers"}},
                    {"name":"advance_amount","type":"number","required":true,"labels":{"uk":"Сума виданого авансу (грн)","en":"Advance Amount Issued (UAH)", "pl":"Kwota wypłaconej zaliczki (UAH)", "de":"Ausgezahlter Vorschussbetrag (UAH)"}},
                    {"name":"expenses_list","type":"textarea","required":true,"labels":{"uk":"Перелік витрат (Дата, Опис, Сума)","en":"List of Expenses (Date, Description, Amount)", "pl":"Lista wydatków (Data, Opis, Kwota)", "de":"Liste der Ausgaben (Datum, Beschreibung, Betrag)"}},
                    {"name":"total_expenses","type":"number","required":true,"labels":{"uk":"Всього витрачено (грн)","en":"Total Expenses (UAH)", "pl":"Łącznie wydatkowano (UAH)", "de":"Gesamtausgaben (UAH)"}},
                    {"name":"balance_due","type":"number","required":true,"labels":{"uk":"Залишок/перевитрата (грн)","en":"Balance Due/Overspend (UAH)", "pl":"Saldo/nadwyżka (UAH)", "de":"Restbetrag/Mehrausgaben (UAH)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Авансовий звіт',
                        'description' => 'Документ, що підтверджує витрати працівника, здійснені за рахунок виданих йому авансових коштів.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АВАНСОВИЙ ЗВІТ</h1><p>№ [[report_number]] від [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Підприємство:</strong> [[company_name]]</p>
                                <p><strong>Працівник:</strong> [[employee_name]], [[employee_position]]</p>
                                <p><strong>Сума виданого авансу:</strong> [[advance_amount]] грн.</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Дата</th>
                                            <th>Опис витрати</th>
                                            <th>Сума (грн)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>01.07.2025</td><td>Проїзд</td><td>50.00</td></tr> -->
                                        [[expenses_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Всього витрачено: <strong>[[total_expenses]]</strong> грн.</p>
                                <p style="text-align: right;">Залишок/перевитрата: <strong>[[balance_due]]</strong> грн.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Працівник: ___________________ ([[employee_name]])</p>
                                <p>Бухгалтер: ___________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Advance Report',
                        'description' => 'A document confirming employee expenses incurred from advance funds issued to them.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ADVANCE REPORT</h1><p>No. [[report_number]] dated [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Company:</strong> [[company_name]]</p>
                                <p><strong>Employee:</strong> [[employee_name]], [[employee_position]]</p>
                                <p><strong>Advance Amount Issued:</strong> [[advance_amount]] UAH.</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Expense Description</th>
                                            <th>Amount (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>01.07.2025</td><td>Travel</td><td>50.00</td></tr> -->
                                        [[expenses_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Total Expenses: <strong>[[total_expenses]]</strong> UAH.</p>
                                <p style="text-align: right;">Balance Due/Overspend: <strong>[[balance_due]]</strong> UAH.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Employee: ___________________ ([[employee_name]])</p>
                                <p>Accountant: ___________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Raport zaliczkowy',
                        'description' => 'Dokument potwierdzający wydatki pracownika poniesione z tytułu wypłaconych mu zaliczek.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RAPORT ZALICZKOWY</h1><p>Nr [[report_number]] z dnia [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Firma:</strong> [[company_name]]</p>
                                <p><strong>Pracownik:</strong> [[employee_name]], [[employee_position]]</p>
                                <p><strong>Kwota wypłaconej zaliczki:</strong> [[advance_amount]] UAH.</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Opis wydatku</th>
                                            <th>Kwota (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>01.07.2025</td><td>Przejazd</td><td>50.00</td></tr> -->
                                        [[expenses_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Łącznie wydatkowano: <strong>[[total_expenses]]</strong> UAH.</p>
                                <p style="text-align: right;">Saldo/nadwyżka: <strong>[[balance_due]]</strong> UAH.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Pracownik: ___________________ ([[employee_name]])</p>
                                <p>Księgowy: ___________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Spesenabrechnung',
                        'description' => 'Ein Dokument, das die Ausgaben eines Mitarbeiters bestätigt, die aus ihm ausgehändigten Vorschussgeldern getätigt wurden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SPESENABRECHNUNG</h1><p>Nr. [[report_number]] vom [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Unternehmen:</strong> [[company_name]]</p>
                                <p><strong>Mitarbeiter:</strong> [[employee_name]], [[employee_position]]</p>
                                <p><strong>Ausgezahlter Vorschussbetrag:</strong> [[advance_amount]] UAH.</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Datum</th>
                                            <th>Ausgabenbeschreibung</th>
                                            <th>Betrag (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>01.07.2025</td><td>Fahrtkosten</td><td>50.00</td></tr> -->
                                        [[expenses_list]]
                                    </tbody>
                                </table>
                                <br/>
                                <p style="text-align: right;">Gesamtausgaben: <strong>[[total_expenses]]</strong> UAH.</p>
                                <p style="text-align: right;">Restbetrag/Mehrausgaben: <strong>[[balance_due]]</strong> UAH.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Mitarbeiter: ___________________ ([[employee_name]])</p>
                                <p>Buchhalter: ___________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 39. Протокол разногласий к договору ---
            [
                'slug' => 'disagreement-protocol-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"contract_type","type":"text","required":true,"labels":{"uk":"Вид договору","en":"Contract Type", "pl":"Rodzaj umowy", "de":"Vertragsart"}},
                    {"name":"contract_number","type":"text","required":true,"labels":{"uk":"Номер договору","en":"Contract Number", "pl":"Numer umowy", "de":"Vertragsnummer"}},
                    {"name":"contract_date","type":"date","required":true,"labels":{"uk":"Дата договору","en":"Contract Date", "pl":"Data umowy", "de":"Vertragsdatum"}},
                    {"name":"party_one_name","type":"text","required":true,"labels":{"uk":"Назва Сторони 1","en":"Party 1 Name", "pl":"Nazwa Strony 1", "de":"Name der Partei 1"}},
                    {"name":"party_one_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника Сторони 1","en":"Party 1 Director Full Name", "pl":"Imię i nazwisko dyrektora Strony 1", "de":"Vollständiger Name des Direktors der Partei 1"}},
                    {"name":"party_two_name","type":"text","required":true,"labels":{"uk":"Назва Сторони 2","en":"Party 2 Name", "pl":"Nazwa Strony 2", "de":"Name der Partei 2"}},
                    {"name":"party_two_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника Сторони 2","en":"Party 2 Director Full Name", "pl":"Imię i nazwisko dyrektora Strony 2", "de":"Vollständiger Name des Direktors der Partei 2"}},
                    {"name":"disagreements_list","type":"textarea","required":true,"labels":{"uk":"Перелік розбіжностей (Пункт договору, Редакція Сторони 1, Редакція Сторони 2, Пропозиція узгодження)","en":"List of Disagreements (Contract Clause, Party 1 Version, Party 2 Version, Proposed Resolution)", "pl":"Lista rozbieżności (Punkt umowy, Wersja Strony 1, Wersja Strony 2, Propozycja uzgodnienia)", "de":"Liste der Meinungsverschiedenheiten (Vertragsklausel, Version Partei 1, Version Partei 2, Vorgeschlagene Lösung)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Протокол розбіжностей до договору',
                        'description' => 'Документ, що фіксує неузгоджені пункти договору та пропозиції щодо їх врегулювання.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПРОТОКОЛ РОЗБІЖНОСТЕЙ</h1><p>до [[contract_type]] № [[contract_number]] від [[contract_date]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Ми, що нижче підписалися, <strong>[[party_one_name]]</strong>, в особі керівника [[party_one_director]], з одного боку, та
                                <strong>[[party_two_name]]</strong>, в особі керівника [[party_two_director]], з іншого боку, склали цей Протокол розбіжностей до вищезгаданого договору:</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Пункт договору</th>
                                            <th>Редакція Сторони 1</th>
                                            <th>Редакція Сторони 2</th>
                                            <th>Пропозиція узгодження</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>2.1</td><td>...</td><td>...</td><td>...</td></tr> -->
                                        [[disagreements_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>Сторона 1:</strong></p>
                                            <p>[[party_one_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_one_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>Сторона 2:</strong></p>
                                            <p>[[party_two_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_two_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Protocol of Disagreements to the Contract',
                        'description' => 'A document recording unresolved contract clauses and proposals for their settlement.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOCOL OF DISAGREEMENTS</h1><p>to [[contract_type]] No. [[contract_number]] dated [[contract_date]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>We, the undersigned, <strong>[[party_one_name]]</strong>, represented by its head [[party_one_director]], on the one hand, and
                                <strong>[[party_two_name]]</strong>, represented by its head [[party_two_director]], on the other hand, have drawn up this Protocol of Disagreements to the aforementioned contract:</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Contract Clause</th>
                                            <th>Party 1 Version</th>
                                            <th>Party 2 Version</th>
                                            <th>Proposed Resolution</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>2.1</td><td>...</td><td>...</td><td>...</td></tr> -->
                                        [[disagreements_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>Party 1:</strong></p>
                                            <p>[[party_one_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_one_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>Party 2:</strong></p>
                                            <p>[[party_two_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_two_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Protokół rozbieżności do umowy',
                        'description' => 'Dokument rejestrujący nierozstrzygnięte klauzule umowy i propozycje ich uregulowania.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ROZBIEŻNOŚCI</h1><p>do [[contract_type]] nr [[contract_number]] z dnia [[contract_date]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>My, niżej podpisani, <strong>[[party_one_name]]</strong>, reprezentowany przez kierownika [[party_one_director]], z jednej strony, oraz
                                <strong>[[party_two_name]]</strong>, reprezentowany przez kierownika [[party_two_director]], z drugiej strony, sporządziliśmy niniejszy Protokół rozbieżności do wyżej wymienionej umowy:</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Punkt umowy</th>
                                            <th>Wersja Strony 1</th>
                                            <th>Wersja Strony 2</th>
                                            <th>Propozycja uzgodnienia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>2.1</td><td>...</td><td>...</td><td>...</td></tr> -->
                                        [[disagreements_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>Strona 1:</strong></p>
                                            <p>[[party_one_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_one_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>Strona 2:</strong></p>
                                            <p>[[party_two_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_two_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Protokoll der Meinungsverschiedenheiten zum Vertrag',
                        'description' => 'Ein Dokument, das ungelöste Vertragsklauseln und Vorschläge zu deren Beilegung festhält.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKOLL DER MEINUNGSVERSCHIEDENHEITEN</h1><p>zum [[contract_type]] Nr. [[contract_number]] vom [[contract_date]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Wir, die Unterzeichneten, <strong>[[party_one_name]]</strong>, vertreten durch den Leiter [[party_one_director]], einerseits, und
                                <strong>[[party_two_name]]</strong>, vertreten durch den Leiter [[party_two_director]], andererseits, haben dieses Protokoll der Meinungsverschiedenheiten zum vorgenannten Vertrag erstellt:</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Vertragsklausel</th>
                                            <th>Version Partei 1</th>
                                            <th>Version Partei 2</th>
                                            <th>Vorgeschlagene Lösung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>2.1</td><td>...</td><td>...</td><td>...</td></tr> -->
                                        [[disagreements_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>Partei 1:</strong></p>
                                            <p>[[party_one_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_one_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>Partei 2:</strong></p>
                                            <p>[[party_two_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[party_two_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 40. Договор на разработку программного обеспечения ---
            [
                'slug' => 'software-development-agreement-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"customer_name","type":"text","required":true,"labels":{"uk":"Назва Замовника","en":"Customer Name", "pl":"Nazwa Zamawiającego", "de":"Kundenname"}},
                    {"name":"customer_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника Замовника","en":"Customer Director Full Name", "pl":"Imię i nazwisko dyrektora Zamawiającego", "de":"Vollständiger Name des Kunden-Direktors"}},
                    {"name":"contractor_name","type":"text","required":true,"labels":{"uk":"Назва Виконавця","en":"Contractor Name", "pl":"Nazwa Wykonawcy", "de":"Auftragnehmername"}},
                    {"name":"contractor_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника Виконавця","en":"Contractor Director Full Name", "pl":"Imię i nazwisko dyrektora Wykonawcy", "de":"Vollständiger Name des Auftragnehmer-Direktors"}},
                    {"name":"software_description","type":"textarea","required":true,"labels":{"uk":"Опис програмного забезпечення, що розробляється","en":"Description of Software to be Developed", "pl":"Opis oprogramowania do opracowania", "de":"Beschreibung der zu entwickelnden Software"}},
                    {"name":"development_cost","type":"number","required":true,"labels":{"uk":"Вартість розробки (грн)","en":"Development Cost (UAH)", "pl":"Koszt rozwoju (UAH)", "de":"Entwicklungskosten (UAH)"}},
                    {"name":"development_deadline","type":"date","required":true,"labels":{"uk":"Термін розробки (до)","en":"Development Deadline (until)", "pl":"Termin realizacji (do)", "de":"Entwicklungsfrist (bis)"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"uk":"Умови оплати","en":"Payment Terms", "pl":"Warunki płatności", "de":"Zahlungsbedingungen"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір на розробку програмного забезпечення',
                        'description' => 'Договір про розробку програмного забезпечення, що визначає умови, терміни та вартість робіт.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР</h1><p>на розробку програмного забезпечення</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, в особі керівника [[customer_director]], надалі "Замовник", з одного боку, та
                                <strong>[[contractor_name]]</strong>, в особі керівника [[contractor_director]], надалі "Виконавець", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Виконавець зобов\'язується розробити програмне забезпечення: [[software_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ВАРТІСТЬ ТА ТЕРМІНИ</h2>
                                <p>2.1. Вартість розробки становить <strong>[[development_cost]]</strong> грн.</p>
                                <p>2.2. Термін розробки: до <strong>[[development_deadline]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. УМОВИ ОПЛАТИ</h2>
                                <p>[[payment_terms]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">РЕКВІЗИТИ ТА ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ЗАМОВНИК:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ВИКОНАВЕЦЬ:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Software Development Agreement',
                        'description' => 'Agreement on software development, defining terms, deadlines, and cost of work.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SOFTWARE DEVELOPMENT AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, represented by its head [[customer_director]], hereinafter "Customer", on the one hand, and
                                <strong>[[contractor_name]]</strong>, represented by its head [[contractor_director]], hereinafter "Contractor", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Contractor undertakes to develop software: [[software_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. COST AND DEADLINES</h2>
                                <p>2.1. The development cost is <strong>[[development_cost]]</strong> UAH.</p>
                                <p>2.2. Development deadline: by <strong>[[development_deadline]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. PAYMENT TERMS</h2>
                                <p>[[payment_terms]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">DETAILS AND SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>CUSTOMER:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>CONTRACTOR:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o opracowanie oprogramowania',
                        'description' => 'Umowa o opracowanie oprogramowania, określająca warunki, terminy i koszt prac.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA</h1><p>o opracowanie oprogramowania</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, reprezentowany przez kierownika [[customer_director]], zwany dalej "Zamawiającym", z jednej strony, oraz
                                <strong>[[contractor_name]]</strong>, reprezentowany przez kierownika [[contractor_director]], zwany dalej "Wykonawcą", z drugiej strony, zawarli niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Wykonawca zobowiązuje się do opracowania oprogramowania: [[software_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. KOSZT I TERMINY</h2>
                                <p>2.1. Koszt opracowania wynosi <strong>[[development_cost]]</strong> UAH.</p>
                                <p>2.2. Termin opracowania: do <strong>[[development_deadline]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. WARUNKI PŁATNOŚCI</h2>
                                <p>[[payment_terms]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">DANE I PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ZAMAWIAJĄCY:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>WYKONAWCA:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Softwareentwicklungsvertrag',
                        'description' => 'Vertrag über die Softwareentwicklung, der die Bedingungen, Fristen und Kosten der Arbeiten festlegt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SOFTWAREENTWICKLUNGSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, vertreten durch den Leiter [[customer_director]], nachfolgend "Auftraggeber" genannt, einerseits, und
                                <strong>[[contractor_name]]</strong>, vertreten durch den Leiter [[contractor_director]], nachfolgend "Auftragnehmer" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Auftragnehmer verpflichtet sich, Software zu entwickeln: [[software_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. KOSTEN UND FRISTEN</h2>
                                <p>2.1. Die Entwicklungskosten betragen <strong>[[development_cost]]</strong> UAH.</p>
                                <p>2.2. Entwicklungsfrist: bis zum <strong>[[development_deadline]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ZAHLUNGSBEDINGUNGEN</h2>
                                <p>[[payment_terms]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ANGABEN UND UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>AUFTRAGGEBER:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>AUFTRAGNEHMER:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 41. Договор на создание и поддержку сайта ---
            [
                'slug' => 'website-development-support-agreement-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"customer_name","type":"text","required":true,"labels":{"uk":"Назва Замовника","en":"Customer Name", "pl":"Nazwa Zamawiającego", "de":"Kundenname"}},
                    {"name":"customer_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника Замовника","en":"Customer Director Full Name", "pl":"Imię i nazwisko dyrektora Zamawiającego", "de":"Vollständiger Name des Kunden-Direktors"}},
                    {"name":"contractor_name","type":"text","required":true,"labels":{"uk":"Назва Виконавця","en":"Contractor Name", "pl":"Nazwa Wykonawcy", "de":"Auftragnehmername"}},
                    {"name":"contractor_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника Виконавця","en":"Contractor Director Full Name", "pl":"Imię i nazwisko dyrektora Wykonawcy", "de":"Vollständiger Name des Auftragnehmer-Direktors"}},
                    {"name":"website_description","type":"textarea","required":true,"labels":{"uk":"Опис сайту, що розробляється","en":"Description of Website to be Developed", "pl":"Opis strony internetowej do opracowania", "de":"Beschreibung der zu entwickelnden Website"}},
                    {"name":"development_cost","type":"number","required":true,"labels":{"uk":"Вартість розробки (грн)","en":"Development Cost (UAH)", "pl":"Koszt rozwoju (UAH)", "de":"Entwicklungskosten (UAH)"}},
                    {"name":"development_deadline","type":"date","required":true,"labels":{"uk":"Термін розробки (до)","en":"Development Deadline (until)", "pl":"Termin realizacji (do)", "de":"Entwicklungsfrist (bis)"}},
                    {"name":"support_cost","type":"number","required":false,"labels":{"uk":"Вартість підтримки (грн/міс)","en":"Support Cost (UAH/month)", "pl":"Koszt wsparcia (UAH/miesiąc)", "de":"Supportkosten (UAH/Monat)"}},
                    {"name":"support_terms","type":"textarea","required":false,"labels":{"uk":"Умови підтримки","en":"Support Terms", "pl":"Warunki wsparcia", "de":"Supportbedingungen"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"uk":"Умови оплати","en":"Payment Terms", "pl":"Warunki płatności", "de":"Zahlungsbedingungen"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір на створення та підтримку сайту',
                        'description' => 'Договір про розробку та подальшу технічну підтримку веб-сайту.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР</h1><p>на створення та підтримку сайту</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, в особі керівника [[customer_director]], надалі "Замовник", з одного боку, та
                                <strong>[[contractor_name]]</strong>, в особі керівника [[contractor_director]], надалі "Виконавець", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Виконавець зобов\'язується створити веб-сайт: [[website_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. ВАРТІСТЬ ТА ТЕРМІНИ</h2>
                                <p>2.1. Вартість розробки становить <strong>[[development_cost]]</strong> грн.</p>
                                <p>2.2. Термін розробки: до <strong>[[development_deadline]]</strong>.</p>
                                [[support_cost]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. ПІДТРИМКА САЙТУ</h2>
                                <p>3.1. Вартість підтримки: [[support_cost]] грн/міс.</p>
                                [[support_terms]]<p>3.2. Умови підтримки: [[support_terms]]</p>[[/support_terms]]
                                [[/support_cost]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. УМОВИ ОПЛАТИ</h2>
                                <p>[[payment_terms]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">РЕКВІЗИТИ ТА ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ЗАМОВНИК:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ВИКОНАВЕЦЬ:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Website Development and Support Agreement',
                        'description' => 'Agreement on the development and subsequent technical support of a website.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WEBSITE DEVELOPMENT AND SUPPORT AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, represented by its head [[customer_director]], hereinafter "Customer", on the one hand, and
                                <strong>[[contractor_name]]</strong>, represented by its head [[contractor_director]], hereinafter "Contractor", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Contractor undertakes to create a website: [[website_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. COST AND DEADLINES</h2>
                                <p>2.1. The development cost is <strong>[[development_cost]]</strong> UAH.</p>
                                <p>2.2. Development deadline: by <strong>[[development_deadline]]</strong>.</p>
                                [[support_cost]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. WEBSITE SUPPORT</h2>
                                <p>3.1. Support cost: [[support_cost]] UAH/month.</p>
                                [[support_terms]]<p>3.2. Support terms: [[support_terms]]</p>[[/support_terms]]
                                [[/support_cost]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. PAYMENT TERMS</h2>
                                <p>[[payment_terms]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">DETAILS AND SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>CUSTOMER:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>CONTRACTOR:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o stworzenie i wsparcie strony internetowej',
                        'description' => 'Umowa o opracowanie i późniejsze wsparcie techniczne strony internetowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA</h1><p>o stworzenie i wsparcie strony internetowej</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, reprezentowany przez kierownika [[customer_director]], zwany dalej "Zamawiającym", z jednej strony, oraz
                                <strong>[[contractor_name]]</strong>, reprezentowany przez kierownika [[contractor_director]], zwany dalej "Wykonawcą", z drugiej strony, zawarli niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Wykonawca zobowiązuje się do stworzenia strony internetowej: [[website_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. KOSZT I TERMINY</h2>
                                <p>2.1. Koszt opracowania wynosi <strong>[[development_cost]]</strong> UAH.</p>
                                <p>2.2. Termin opracowania: do <strong>[[development_deadline]]</strong>.</p>
                                [[support_cost]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. WSPARCIE STRONY INTERNETOWEJ</h2>
                                <p>3.1. Koszt wsparcia: [[support_cost]] UAH/miesiąc.</p>
                                [[support_terms]]<p>3.2. Warunki wsparcia: [[support_terms]]</p>[[/support_terms]]
                                [[/support_cost]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. WARUNKI PŁATNOŚCI</h2>
                                <p>[[payment_terms]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">DANE I PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ZAMAWIAJĄCY:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>WYKONAWCA:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vertrag über Website-Entwicklung und -Support',
                        'description' => 'Vertrag über die Entwicklung und anschließende technische Unterstützung einer Website.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERTRAG</h1><p>über Website-Entwicklung und -Support</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, vertreten durch den Leiter [[customer_director]], nachfolgend "Auftraggeber" genannt, einerseits, und
                                <strong>[[contractor_name]]</strong>, vertreten durch den Leiter [[contractor_director]], nachfolgend "Auftragnehmer" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. VERTRAGSGEGENSTAND</h2>
                                <p>1.1. Der Auftragnehmer verpflichtet sich, eine Website zu erstellen: [[website_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. KOSTEN UND FRISTEN</h2>
                                <p>2.1. Die Entwicklungskosten betragen <strong>[[development_cost]]</strong> UAH.</p>
                                <p>2.2. Entwicklungsfrist: bis zum <strong>[[development_deadline]]</strong>.</p>
                                [[support_cost]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. WEBSITE-SUPPORT</h2>
                                <p>3.1. Supportkosten: [[support_cost]] UAH/Monat.</p>
                                [[support_terms]]<p>3.2. Supportbedingungen: [[support_terms]]</p>[[/support_terms]]
                                [[/support_cost]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. ZAHLUNGSBEDINGUNGEN</h2>
                                <p>[[payment_terms]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ANGABEN UND UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>AUFTRAGGEBER:</strong></p>
                                            <p>[[customer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>AUFTRAGNEHMER:</strong></p>
                                            <p>[[contractor_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[contractor_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 42. Техническое задание (ТЗ) на разработку ---
            [
                'slug' => 'technical-specification-ua',
                'fields' => '[
                    {"name":"project_name","type":"text","required":true,"labels":{"uk":"Назва проекту","en":"Project Name", "pl":"Nazwa projektu", "de":"Projektname"}},
                    {"name":"customer_name","type":"text","required":true,"labels":{"uk":"Назва Замовника","en":"Customer Name", "pl":"Nazwa Zamawiającego", "de":"Kundenname"}},
                    {"name":"contractor_name","type":"text","required":true,"labels":{"uk":"Назва Виконавця","en":"Contractor Name", "pl":"Nazwa Wykonawcy", "de":"Auftragnehmername"}},
                    {"name":"tz_number","type":"text","required":true,"labels":{"uk":"Номер ТЗ","en":"TS Number", "pl":"Numer TZ", "de":"TZ-Nummer"}},
                    {"name":"general_information","type":"textarea","required":true,"labels":{"uk":"Загальні відомості про проект","en":"General Project Information", "pl":"Informacje ogólne o projekcie", "de":"Allgemeine Projektinformationen"}},
                    {"name":"functional_requirements","type":"textarea","required":true,"labels":{"uk":"Функціональні вимоги","en":"Functional Requirements", "pl":"Wymagania funkcjonalne", "de":"Funktionale Anforderungen"}},
                    {"name":"non_functional_requirements","type":"textarea","required":false,"labels":{"uk":"Нефункціональні вимоги","en":"Non-functional Requirements", "pl":"Wymagania niefunkcjonalne", "de":"Nicht-funktionale Anforderungen"}},
                    {"name":"development_stages","type":"textarea","required":true,"labels":{"uk":"Етапи розробки та терміни","en":"Development Stages and Deadlines", "pl":"Etapy rozwoju i terminy", "de":"Entwicklungsphasen und Fristen"}},
                    {"name":"acceptance_criteria","type":"textarea","required":true,"labels":{"uk":"Критерії приймання робіт","en":"Acceptance Criteria", "pl":"Kryteria odbioru prac", "de":"Abnahmekriterien"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Технічне завдання (ТЗ) на розробку',
                        'description' => 'Документ, що детально описує вимоги до розробки програмного забезпечення або веб-сайту.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ТЕХНІЧНЕ ЗАВДАННЯ</h1><p>на розробку</p><p>Проект: [[project_name]]</p><p>№ [[tz_number]] від [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>Замовник:</strong> [[customer_name]]</p>
                                <p><strong>Виконавець:</strong> [[contractor_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Загальні відомості</h2>
                                <p>[[general_information]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Функціональні вимоги</h2>
                                <p>[[functional_requirements]]</p>
                                [[non_functional_requirements]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Нефункціональні вимоги</h2>
                                <p>[[non_functional_requirements]]</p>[[/non_functional_requirements]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Етапи розробки та терміни</h2>
                                <p>[[development_stages]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Критерії приймання робіт</h2>
                                <p>[[acceptance_criteria]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Замовник: ___________________</p>
                                <p>Виконавець: ___________________</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Technical Specification (TS) for Development',
                        'description' => 'A document detailing the requirements for software or website development.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TECHNICAL SPECIFICATION</h1><p>for development</p><p>Project: [[project_name]]</p><p>No. [[tz_number]] dated [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>Customer:</strong> [[customer_name]]</p>
                                <p><strong>Contractor:</strong> [[contractor_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. General Information</h2>
                                <p>[[general_information]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Functional Requirements</h2>
                                <p>[[functional_requirements]]</p>
                                [[non_functional_requirements]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Non-functional Requirements</h2>
                                <p>[[non_functional_requirements]]</p>[[/non_functional_requirements]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Development Stages and Deadlines</h2>
                                <p>[[development_stages]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Acceptance Criteria</h2>
                                <p>[[acceptance_criteria]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Customer: ___________________</p>
                                <p>Contractor: ___________________</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Specyfikacja techniczna (TZ) do opracowania',
                        'description' => 'Dokument szczegółowo opisujący wymagania dotyczące opracowania oprogramowania lub strony internetowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SPECYFIKACJA TECHNICZNA</h1><p>do opracowania</p><p>Projekt: [[project_name]]</p><p>Nr [[tz_number]] z dnia [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>Zamawiający:</strong> [[customer_name]]</p>
                                <p><strong>Wykonawca:</strong> [[contractor_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Informacje ogólne</h2>
                                <p>[[general_information]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Wymagania funkcjonalne</h2>
                                <p>[[functional_requirements]]</p>
                                [[non_functional_requirements]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Wymagania niefunkcjonalne</h2>
                                <p>[[non_functional_requirements]]</p>[[/non_functional_requirements]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Etapy rozwoju i terminy</h2>
                                <p>[[development_stages]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Kryteria odbioru prac</h2>
                                <p>[[acceptance_criteria]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Zamawiający: ___________________</p>
                                <p>Wykonawca: ___________________</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Technische Spezifikation (TS) für die Entwicklung',
                        'description' => 'Ein Dokument, das die Anforderungen an die Software- oder Website-Entwicklung detailliert beschreibt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TECHNISCHE SPEZIFIKATION</h1><p>für die Entwicklung</p><p>Projekt: [[project_name]]</p><p>Nr. [[tz_number]] vom [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>Auftraggeber:</strong> [[customer_name]]</p>
                                <p><strong>Auftragnehmer:</strong> [[contractor_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Allgemeine Informationen</h2>
                                <p>[[general_information]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Funktionale Anforderungen</h2>
                                <p>[[functional_requirements]]</p>
                                [[non_functional_requirements]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Nicht-funktionale Anforderungen</h2>
                                <p>[[non_functional_requirements]]</p>[[/non_functional_requirements]]
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Entwicklungsphasen und Fristen</h2>
                                <p>[[development_stages]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Abnahmekriterien</h2>
                                <p>[[acceptance_criteria]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Auftraggeber: ___________________</p>
                                <p>Auftragnehmer: ___________________</p>
                            </div>'
                    ],
                ]
            ],

            // --- 43. Пользовательское соглашение для сайта ---
            [
                'slug' => 'user-agreement-website-ua',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва компанії / сайту","en":"Company/Website Name", "pl":"Nazwa firmy / strony internetowej", "de":"Firmen-/Website-Name"}},
                    {"name":"website_url","type":"text","required":true,"labels":{"uk":"Адреса сайту","en":"Website URL", "pl":"Adres strony internetowej", "de":"Website-URL"}},
                    {"name":"effective_date","type":"date","required":true,"labels":{"uk":"Дата набрання чинності","en":"Effective Date", "pl":"Data wejścia w życie", "de":"Datum des Inkrafttretens"}},
                    {"name":"general_provisions","type":"textarea","required":true,"labels":{"uk":"Загальні положення","en":"General Provisions", "pl":"Postanowienia ogólne", "de":"Allgemeine Bestimmungen"}},
                    {"name":"user_rights_obligations","type":"textarea","required":true,"labels":{"uk":"Права та обов\'язки користувача","en":"User Rights and Obligations", "pl":"Prawa i obowiązki użytkownika", "de":"Nutzerrechte und -pflichten"}},
                    {"name":"company_rights_obligations","type":"textarea","required":true,"labels":{"uk":"Права та обов\'язки компанії","en":"Company Rights and Obligations", "pl":"Prawa i obowiązki firmy", "de":"Rechte und Pflichten des Unternehmens"}},
                    {"name":"liability","type":"textarea","required":true,"labels":{"uk":"Відповідальність сторін","en":"Parties\' Liability", "pl":"Odpowiedzialność stron", "de":"Haftung der Parteien"}},
                    {"name":"dispute_resolution","type":"textarea","required":true,"labels":{"uk":"Вирішення спорів","en":"Dispute Resolution", "pl":"Rozstrzyganie sporów", "de":"Streitbeilegung"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Користувацька угода для сайту',
                        'description' => 'Документ, що регулює відносини між власником сайту та його користувачами.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КОРИСТУВАЦЬКА УГОДА</h1><p>для сайту [[website_url]]</p><p>Дата набрання чинності: [[effective_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Загальні положення</h2>
                                <p>[[general_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Права та обов\'язки користувача</h2>
                                <p>[[user_rights_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Права та обов\'язки [[company_name]]</h2>
                                <p>[[company_rights_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Відповідальність сторін</h2>
                                <p>[[liability]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Вирішення спорів</h2>
                                <p>[[dispute_resolution]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>З повагою, Адміністрація сайту [[company_name]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'User Agreement for Website',
                        'description' => 'A document regulating the relationship between the website owner and its users.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">USER AGREEMENT</h1><p>for website [[website_url]]</p><p>Effective Date: [[effective_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. General Provisions</h2>
                                <p>[[general_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. User Rights and Obligations</h2>
                                <p>[[user_rights_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Rights and Obligations of [[company_name]]</h2>
                                <p>[[company_rights_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Parties\' Liability</h2>
                                <p>[[liability]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Dispute Resolution</h2>
                                <p>[[dispute_resolution]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Sincerely, Website Administration [[company_name]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa użytkownika strony internetowej',
                        'description' => 'Dokument regulujący relacje między właścicielem strony internetowej a jej użytkownikami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA UŻYTKOWNIKA</h1><p>dla strony internetowej [[website_url]]</p><p>Data wejścia w życie: [[effective_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Postanowienia ogólne</h2>
                                <p>[[general_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Prawa i obowiązki użytkownika</h2>
                                <p>[[user_rights_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Prawa i obowiązki firmy [[company_name]]</h2>
                                <p>[[company_rights_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Odpowiedzialność stron</h2>
                                <p>[[liability]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Rozstrzyganie sporów</h2>
                                <p>[[dispute_resolution]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Z poważaniem, Administracja strony internetowej [[company_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Nutzungsvereinbarung für die Website',
                        'description' => 'Ein Dokument, das die Beziehung zwischen dem Website-Betreiber und seinen Nutzern regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">NUTZUNGSVEREINBARUNG</h1><p>für die Website [[website_url]]</p><p>Datum des Inkrafttretens: [[effective_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Allgemeine Bestimmungen</h2>
                                <p>[[general_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Nutzerrechte und -pflichten</h2>
                                <p>[[user_rights_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Rechte und Pflichten von [[company_name]]</h2>
                                <p>[[company_rights_obligations]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Haftung der Parteien</h2>
                                <p>[[liability]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Streitbeilegung</h2>
                                <p>[[dispute_resolution]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Mit freundlichen Grüßen, Website-Administration [[company_name]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 44. Договор оферты ---
            [
                'slug' => 'offer-agreement-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"uk":"Назва вашої компанії","en":"Your Company Name", "pl":"Nazwa Twojej firmy", "de":"Name Ihres Unternehmens"}},
                    {"name":"company_edrpou","type":"text","required":true,"labels":{"uk":"ЄДРПОУ вашої компанії","en":"Your Company EDRPOU", "pl":"EDRPOU Twojej firmy", "de":"EDRPOU Ihres Unternehmens"}},
                    {"name":"director_name","type":"text","required":true,"labels":{"uk":"ПІБ керівника","en":"Director Full Name", "pl":"Imię i nazwisko dyrektora", "de":"Vollständiger Name des Direktors"}},
                    {"name":"offer_subject","type":"text","required":true,"labels":{"uk":"Предмет оферти (опис послуг/товарів)","en":"Subject of Offer (description of services/goods)", "pl":"Przedmiot oferty (opis usług/towarów)", "de":"Gegenstand des Angebots (Beschreibung der Dienstleistungen/Waren)"}},
                    {"name":"offer_terms","type":"textarea","required":true,"labels":{"uk":"Умови оферти","en":"Offer Terms", "pl":"Warunki oferty", "de":"Angebotsbedingungen"}},
                    {"name":"acceptance_procedure","type":"textarea","required":true,"labels":{"uk":"Порядок акцепту (прийняття оферти)","en":"Acceptance Procedure (of offer)", "pl":"Procedura akceptacji (oferty)", "de":"Annahmeverfahren (des Angebots)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір оферти',
                        'description' => 'Публічний договір, що містить усі істотні умови, за якими одна сторона пропонує укласти договір іншій.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОФЕРТИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цей Договір є публічною офертою <strong>[[company_name]]</strong> (ЄДРПОУ: [[company_edrpou]]), в особі керівника [[director_name]], надалі "Продавець/Виконавець", будь-якій особі, надалі "Покупець/Замовник", що прийняла умови цієї оферти.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Предмет оферти</h2>
                                <p>1.1. Продавець/Виконавець пропонує [[offer_subject]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Умови оферти</h2>
                                <p>[[offer_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Порядок акцепту</h2>
                                <p>[[acceptance_procedure]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p><strong>Реквізити Продавця/Виконавця:</strong></p>
                                <p>[[company_name]]</p>
                                <p>ЄДРПОУ: [[company_edrpou]]</p>
                                <p>Керівник: [[director_name]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Offer Agreement',
                        'description' => 'A public agreement containing all essential terms under which one party offers to conclude an agreement with another.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFFER AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This Agreement is a public offer by <strong>[[company_name]]</strong> (EDRPOU: [[company_edrpou]]), represented by its director [[director_name]], hereinafter "Seller/Contractor", to any person, hereinafter "Buyer/Customer", who has accepted the terms of this offer.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Subject of the Offer</h2>
                                <p>1.1. The Seller/Contractor offers [[offer_subject]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Terms of Offer</h2>
                                <p>[[offer_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Acceptance Procedure</h2>
                                <p>[[acceptance_procedure]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p><strong>Seller/Contractor Details:</strong></p>
                                <p>[[company_name]]</p>
                                <p>EDRPOU: [[company_edrpou]]</p>
                                <p>Director: [[director_name]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa oferty',
                        'description' => 'Publiczna umowa zawierająca wszystkie istotne warunki, na których jedna strona oferuje zawarcie umowy drugiej stronie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA OFERTY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejsza Umowa jest ofertą publiczną <strong>[[company_name]]</strong> (EDRPOU: [[company_edrpou]]), reprezentowanej przez kierownika [[director_name]], zwanej dalej "Sprzedawcą/Wykonawcą", każdej osobie, zwanej dalej "Kupującym/Zamawiającym", która zaakceptowała warunki niniejszej oferty.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Przedmiot oferty</h2>
                                <p>1.1. Sprzedawca/Wykonawca oferuje [[offer_subject]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Warunki oferty</h2>
                                <p>[[offer_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Procedura akceptacji</h2>
                                <p>[[acceptance_procedure]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p><strong>Dane Sprzedawcy/Wykonawcy:</strong></p>
                                <p>[[company_name]]</p>
                                <p>EDRPOU: [[company_edrpou]]</p>
                                <p>Kierownik: [[director_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Angebotsvertrag',
                        'description' => 'Ein öffentlicher Vertrag, der alle wesentlichen Bedingungen enthält, zu denen eine Partei einer anderen den Abschluss eines Vertrages anbietet.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANGEBOTSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dieser Vertrag ist ein öffentliches Angebot von <strong>[[company_name]]</strong> (EDRPOU: [[company_edrpou]]), vertreten durch den Leiter [[director_name]], nachfolgend "Verkäufer/Auftragnehmer" genannt, an jede Person, nachfolgend "Käufer/Kunde" genannt, die die Bedingungen dieses Angebots angenommen hat.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Gegenstand des Angebots</h2>
                                <p>1.1. Der Verkäufer/Auftragnehmer bietet [[offer_subject]] an.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Angebotsbedingungen</h2>
                                <p>[[offer_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Annahmeverfahren</h2>
                                <p>[[acceptance_procedure]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p><strong>Details des Verkäufers/Auftragnehmers:</strong></p>
                                <p>[[company_name]]</p>
                                <p>EDRPOU: [[company_edrpou]]</p>
                                <p>Leiter: [[director_name]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 45. Соглашение об уровне обслуживания (SLA) ---
            [
                'slug' => 'service-level-agreement-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"provider_name","type":"text","required":true,"labels":{"uk":"Назва постачальника послуг","en":"Service Provider Name", "pl":"Nazwa dostawcy usług", "de":"Name des Dienstleisters"}},
                    {"name":"provider_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника постачальника","en":"Provider Director Full Name", "pl":"Imię i nazwisko dyrektora dostawcy", "de":"Vollständiger Name des Dienstleister-Direktors"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"uk":"Назва клієнта","en":"Client Name", "pl":"Nazwa klienta", "de":"Kundenname"}},
                    {"name":"client_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника клієнта","en":"Client Director Full Name", "pl":"Imię i nazwisko dyrektora klienta", "de":"Vollständiger Name des Kunden-Direktors"}},
                    {"name":"service_description","type":"textarea","required":true,"labels":{"uk":"Опис послуг, що надаються","en":"Description of Services Provided", "pl":"Opis świadczonych usług", "de":"Beschreibung der erbrachten Dienstleistungen"}},
                    {"name":"service_level_metrics","type":"textarea","required":true,"labels":{"uk":"Метрики рівня обслуговування (доступність, час відповіді тощо)","en":"Service Level Metrics (availability, response time, etc.)", "pl":"Metryki poziomu usług (dostępność, czas odpowiedzi itp.)", "de":"Service-Level-Metriken (Verfügbarkeit, Reaktionszeit usw.)"}},
                    {"name":"responsibilities_provider","type":"textarea","required":true,"labels":{"uk":"Обов\'язки постачальника","en":"Provider Responsibilities", "pl":"Obowiązki dostawcy", "de":"Pflichten des Dienstleisters"}},
                    {"name":"responsibilities_client","type":"textarea","required":true,"labels":{"uk":"Обов\'язки клієнта","en":"Client Responsibilities", "pl":"Obowiązki klienta", "de":"Pflichten des Kunden"}},
                    {"name":"penalties","type":"textarea","required":false,"labels":{"uk":"Штрафні санкції за порушення SLA","en":"Penalties for SLA Violation", "pl":"Kary za naruszenie SLA", "de":"Strafen bei SLA-Verletzung"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Угода про рівень обслуговування (SLA)',
                        'description' => 'Документ, що визначає рівень якості послуг, які постачальник зобов\'язується надавати клієнту.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА ПРО РІВЕНЬ ОБСЛУГОВУВАННЯ (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ця Угода укладена між <strong>[[provider_name]]</strong>, в особі керівника [[provider_director]], надалі "Постачальник", з одного боку, та
                                <strong>[[client_name]]</strong>, в особі керівника [[client_director]], надалі "Клієнт", з іншого боку, про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Предмет Угоди</h2>
                                <p>1.1. Постачальник зобов\'язується надавати Клієнту послуги: [[service_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Метрики рівня обслуговування</h2>
                                <p>[[service_level_metrics]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Обов\'язки Постачальника</h2>
                                <p>[[responsibilities_provider]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Обов\'язки Клієнта</h2>
                                <p>[[responsibilities_client]]</p>
                                [[penalties]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Штрафні санкції</h2>
                                <p>[[penalties]]</p>[[/penalties]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ПОСТАЧАЛЬНИК:</strong></p>
                                            <p>[[provider_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[provider_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>КЛІЄНТ:</strong></p>
                                            <p>[[client_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[client_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Service Level Agreement (SLA)',
                        'description' => 'A document defining the quality level of services that the provider undertakes to provide to the client.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SERVICE LEVEL AGREEMENT (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This Agreement is concluded between <strong>[[provider_name]]</strong>, represented by its head [[provider_director]], hereinafter "Provider", on the one hand, and
                                <strong>[[client_name]]</strong>, represented by its head [[client_director]], hereinafter "Client", on the other hand, as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Subject of the Agreement</h2>
                                <p>1.1. The Provider undertakes to provide the Client with services: [[service_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Service Level Metrics</h2>
                                <p>[[service_level_metrics]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Provider Responsibilities</h2>
                                <p>[[responsibilities_provider]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Client Responsibilities</h2>
                                <p>[[responsibilities_client]]</p>
                                [[penalties]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Penalties</h2>
                                <p>[[penalties]]</p>[[/penalties]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>PROVIDER:</strong></p>
                                            <p>[[provider_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[provider_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>CLIENT:</strong></p>
                                            <p>[[client_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[client_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o poziomie usług (SLA)',
                        'description' => 'Dokument określający poziom jakości usług, które dostawca zobowiązuje się świadczyć klientowi.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O POZIOMIE USŁUG (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejsza Umowa została zawarta pomiędzy <strong>[[provider_name]]</strong>, reprezentowanym przez kierownika [[provider_director]], zwanym dalej "Dostawcą", z jednej strony, a
                                <strong>[[client_name]]</strong>, reprezentowanym przez kierownika [[client_director]], zwanym dalej "Klientem", z drugiej strony, w następujący sposób:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Przedmiot Umowy</h2>
                                <p>1.1. Dostawca zobowiązuje się do świadczenia Klientowi usług: [[service_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Metryki poziomu usług</h2>
                                <p>[[service_level_metrics]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Obowiązki Dostawcy</h2>
                                <p>[[responsibilities_provider]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Obowiązki Klienta</h2>
                                <p>[[responsibilities_client]]</p>
                                [[penalties]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Kary</h2>
                                <p>[[penalties]]</p>[[/penalties]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>DOSTAWCA:</strong></p>
                                            <p>[[provider_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[provider_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>KLIENT:</strong></p>
                                            <p>[[client_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[client_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Service Level Agreement (SLA)',
                        'description' => 'Ein Dokument, das das Qualitätsniveau der Dienstleistungen festlegt, die der Anbieter dem Kunden zusagt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SERVICE LEVEL AGREEMENT (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Diese Vereinbarung wird zwischen <strong>[[provider_name]]</strong>, vertreten durch den Leiter [[provider_director]], nachfolgend "Anbieter" genannt, einerseits, und
                                <strong>[[client_name]]</strong>, vertreten durch den Leiter [[client_director]], nachfolgend "Kunde" genannt, andererseits, wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Gegenstand der Vereinbarung</h2>
                                <p>1.1. Der Anbieter verpflichtet sich, dem Kunden Dienstleistungen zu erbringen: [[service_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Service-Level-Metriken</h2>
                                <p>[[service_level_metrics]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Pflichten des Anbieters</h2>
                                <p>[[responsibilities_provider]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. Pflichten des Kunden</h2>
                                <p>[[responsibilities_client]]</p>
                                [[penalties]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">5. Strafen</h2>
                                <p>[[penalties]]</p>[[/penalties]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ANBIETER:</strong></p>
                                            <p>[[provider_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[provider_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>KUNDE:</strong></p>
                                            <p>[[client_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[client_director]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 46. Договор с фрилансером (Gig-контракт) ---
            [
                'slug' => 'freelancer-gig-contract-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"customer_name","type":"text","required":true,"labels":{"uk":"Назва Замовника","en":"Customer Name", "pl":"Nazwa Zamawiającego", "de":"Kundenname"}},
                    {"name":"customer_director","type":"text","required":true,"labels":{"uk":"ПІБ керівника Замовника","en":"Customer Director Full Name", "pl":"Imię i nazwisko dyrektora Zamawiającego", "de":"Vollständiger Name des Kunden-Direktors"}},
                    {"name":"freelancer_name","type":"text","required":true,"labels":{"uk":"ПІБ фрілансера","en":"Freelancer Full Name", "pl":"Imię i nazwisko freelancera", "de":"Vollständiger Name des Freiberuflers"}},
                    {"name":"freelancer_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані фрілансера","en":"Freelancer Passport Details", "pl":"Dane paszportowe freelancera", "de":"Passdaten des Freiberuflers"}},
                    {"name":"freelancer_rnekpp","type":"text","required":true,"labels":{"uk":"РНОКПП фрілансера","en":"Freelancer RNEKPP (TIN)", "pl":"RNEKPP freelancera (NIP)", "de":"RNEKPP des Freiberuflers (Steuernummer)"}},
                    {"name":"work_description","type":"textarea","required":true,"labels":{"uk":"Опис роботи/послуг фрілансера","en":"Description of Freelancer\'s Work/Services", "pl":"Opis pracy/usług freelancera", "de":"Beschreibung der Arbeit/Dienstleistungen des Freiberuflers"}},
                    {"name":"payment_amount","type":"number","required":true,"labels":{"uk":"Сума оплати (грн)","en":"Payment Amount (UAH)", "pl":"Kwota płatności (UAH)", "de":"Zahlungsbetrag (UAH)"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"uk":"Умови оплати","en":"Payment Terms", "pl":"Warunki płatności", "de":"Zahlungsbedingungen"}},
                    {"name":"deadline","type":"date","required":true,"labels":{"uk":"Термін виконання роботи","en":"Work Deadline", "pl":"Termin wykonania pracy", "de":"Frist für die Arbeit"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Договір з фрілансером (Gig-контракт)',
                        'description' => 'Договір про надання послуг фрілансером, що регулює обсяг робіт, терміни та оплату.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР</h1><p>з фрілансером (Gig-контракт)</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, в особі керівника [[customer_director]], надалі "Замовник", з одного боку, та
                                громадянин(ка) України <strong>[[freelancer_name]]</strong> (паспорт: [[freelancer_passport]], РНОКПП: [[freelancer_rnekpp]]), надалі "Фрілансер", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Предмет Договору</h2>
                                <p>1.1. Фрілансер зобов\'язується виконати роботу (надати послуги): [[work_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Вартість та умови оплати</h2>
                                <p>2.1. Вартість роботи становить <strong>[[payment_amount]]</strong> грн.</p>
                                <p>2.2. Умови оплати: [[payment_terms]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Термін виконання</h2>
                                <p>3.1. Робота має бути виконана до <strong>[[deadline]]</strong>.</p>
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
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ФРІЛАНСЕР:</strong></p>
                                            <p>[[freelancer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[freelancer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Freelancer (Gig) Contract',
                        'description' => 'Contract for services provided by a freelancer, regulating scope of work, deadlines, and payment.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CONTRACT</h1><p>with a Freelancer (Gig Contract)</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, represented by its head [[customer_director]], hereinafter "Customer", on the one hand, and
                                citizen of Ukraine <strong>[[freelancer_name]]</strong> (passport: [[freelancer_passport]], RNEKPP: [[freelancer_rnekpp]]), hereinafter "Freelancer", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Subject of the Agreement</h2>
                                <p>1.1. The Freelancer undertakes to perform work (provide services): [[work_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Cost and Payment Terms</h2>
                                <p>2.1. The cost of work is <strong>[[payment_amount]]</strong> UAH.</p>
                                <p>2.2. Payment terms: [[payment_terms]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Deadline</h2>
                                <p>3.1. The work must be completed by <strong>[[deadline]]</strong>.</p>
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
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>FREELANCER:</strong></p>
                                            <p>[[freelancer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[freelancer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa z freelancerem (Gig-kontrakt)',
                        'description' => 'Umowa o świadczenie usług przez freelancera, regulująca zakres prac, terminy i płatności.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA</h1><p>z freelancerem (Gig-kontrakt)</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, reprezentowany przez kierownika [[customer_director]], zwany dalej "Zamawiającym", z jednej strony, oraz
                                obywatel(ka) Ukrainy <strong>[[freelancer_name]]</strong> (paszport: [[freelancer_passport]], RNEKPP: [[freelancer_rnekpp]]), zwany dalej "Freelancerem", z drugiej strony, zawarli niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Przedmiot Umowy</h2>
                                <p>1.1. Freelancer zobowiązuje się do wykonania pracy (świadczenia usług): [[work_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Koszt i warunki płatności</h2>
                                <p>2.1. Koszt pracy wynosi <strong>[[payment_amount]]</strong> UAH.</p>
                                <p>2.2. Warunki płatności: [[payment_terms]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Termin wykonania</h2>
                                <p>3.1. Praca musi zostać wykonana do <strong>[[deadline]]</strong>.</p>
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
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>FREELANCER:</strong></p>
                                            <p>[[freelancer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[freelancer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Freiberufler-Vertrag (Gig-Vertrag)',
                        'description' => 'Vertrag über Dienstleistungen eines Freiberuflers, der den Arbeitsumfang, Fristen und Zahlungen regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERTRAG</h1><p>mit einem Freiberufler (Gig-Vertrag)</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>[[customer_name]]</strong>, vertreten durch den Leiter [[customer_director]], nachfolgend "Auftraggeber" genannt, einerseits, und
                                ukrainischer Staatsbürger <strong>[[freelancer_name]]</strong> (Reisepass: [[freelancer_passport]], RNEKPP: [[freelancer_rnekpp]]), nachfolgend "Freiberufler" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. Gegenstand des Vertrags</h2>
                                <p>1.1. Der Freiberufler verpflichtet sich, die Arbeit (Dienstleistungen) auszuführen: [[work_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. Kosten und Zahlungsbedingungen</h2>
                                <p>2.1. Die Kosten der Arbeit betragen <strong>[[payment_amount]]</strong> UAH.</p>
                                <p>2.2. Zahlungsbedingungen: [[payment_terms]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. Frist für die Ausführung</h2>
                                <p>3.1. Die Arbeit muss bis zum <strong>[[deadline]]</strong> abgeschlossen sein.</p>
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
                                            <p>([[customer_director]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>FREIBERUFLER:</strong></p>
                                            <p>[[freelancer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[freelancer_name]])</p>
                                        </td>
                                    </tr>
                                </table>
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
