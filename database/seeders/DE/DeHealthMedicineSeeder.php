<?php

namespace Database\Seeders\DE;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class DeHealthMedicineSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'medicine-de')->first();
        if (!$category) {
            $this->command->error('Category with slug "medicine-de" not found.');
            return;
        }


        $templatesData = [

            // --- Запрос на получение копии медицинской документации / Request for Medical Records Copy (Antrag auf Kopie der Patientenakte) ---
            [
                'slug' => 'request-medical-records-copy-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta/wnioskodawcy","en":"Patient\'s/Applicant\'s Full Name","uk":"ПІБ пацієнта/заявника","de":"Vollständiger Name des Patienten/Antragstellers"}},
                    {"name":"patient_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania","en":"Residential Address","uk":"Адреса проживання","de":"Wohnadresse"}},
                    {"name":"patient_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia pacjenta","en":"Patient\'s Date of Birth","uk":"Дата народження пацієнта","de":"Geburtsdatum des Patienten"}},
                    {"name":"medical_facility_name","type":"text","required":true,"labels":{"pl":"Nazwa placówki medycznej","en":"Medical Facility Name","uk":"Назва медичного закладу","de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_facility_address","type":"text","required":true,"labels":{"pl":"Adres placówki medycznej","en":"Medical Facility Address","uk":"Адреса медичного закладу","de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"records_period","type":"text","required":true,"labels":{"pl":"Okres, którego dotyczy dokumentacja (np. od-do, konkretna data)","en":"Period covered by documentation (e.g., from-to, specific date)","uk":"Період, до якого стосується документація (напр., від-до, конкретна дата)","de":"Zeitraum, den die Dokumentation betrifft (z.B. von-bis, bestimmtes Datum)"}},
                    {"name":"purpose_of_copy","type":"textarea","required":true,"labels":{"pl":"Cel uzyskania kopii","en":"Purpose of obtaining copy","uk":"Мета отримання копії","de":"Zweck der Kopie"}},
                    {"name":"preferred_format","type":"text","required":true,"labels":{"pl":"Preferowana forma kopii (np. papierowa, elektroniczna CD/USB)","en":"Preferred copy format (e.g., paper, electronic CD/USB)","uk":"Бажана форма копії (напр., паперова, електронна CD/USB)","de":"Bevorzugtes Kopierformat (z.B. Papier, elektronisch CD/USB)"}},
                    {"name":"delivery_method","type":"text","required":true,"labels":{"pl":"Preferowany sposób dostarczenia (np. odbiór osobisty, poczta)","en":"Preferred delivery method (e.g., personal collection, mail)","uk":"Бажаний спосіб доставки (напр., особисте отримання, пошта)","de":"Bevorzugte Zustellungsart (z.B. persönliche Abholung, Post)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Kopie der Patientenakte',
                        'description' => 'Offizieller Antrag auf Ausstellung einer Kopie der Patientenakte gemäß § 630g BGB (Bürgerliches Gesetzbuch).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF KOPIE DER PATIENTENAKTE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient/Antragsteller: <strong>[[patient_full_name]]</strong><br>Geb. am: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Leitung der<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich gemäß § 630g BGB die Übersendung einer Kopie meiner Patientenakte (oder der Patientenakte der Person, deren gesetzlicher Vertreter ich bin) für den Zeitraum [[records_period]].</p>
                                <p>Die Dokumentation wird zu folgendem Zweck benötigt: [[purpose_of_copy]]</p>
                                <p>Ich bitte um Bereitstellung der Dokumentation in folgender Form: <strong>[[preferred_format]]</strong>.</p>
                                <p>Die Zustellung soll erfolgen durch: <strong>[[delivery_method]]</strong>.</p>
                                <p>Ich bin bereit, die hierfür anfallenden Kosten (Kopierkosten) zu tragen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Request for Medical Records Copy',
                        'description' => 'Official request for a copy of medical records according to § 630g BGB (German Civil Code).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REQUEST FOR MEDICAL RECORDS COPY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient/Applicant: <strong>[[patient_full_name]]</strong><br>DOB: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Management of<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby request, in accordance with § 630g BGB, a copy of my medical records (or the medical records of the person for whom I am the legal representative) for the period [[records_period]].</p>
                                <p>The documentation is required for the following purpose: [[purpose_of_copy]]</p>
                                <p>Please provide the documentation in the following format: <strong>[[preferred_format]]</strong>.</p>
                                <p>Delivery should be by: <strong>[[delivery_method]]</strong>.</p>
                                <p>I am prepared to bear the associated costs (copying fees).</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Запит на отримання копії медичної документації',
                        'description' => 'Офіційний запит на видачу копії медичної документації згідно з § 630g BGB (Цивільного кодексу Німеччини).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАПИТ НА ОТРИМАННЯ КОПІЇ МЕДИЧНОЇ ДОКУМЕНТАЦІЇ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Пацієнт/Заявник: <strong>[[patient_full_name]]</strong><br>Дата народження: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br>Керівництву<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я, згідно з § 630g BGB, прошу надіслати копію моєї медичної документації (або медичної документації особи, законним представником якої я є) за період [[records_period]].</p>
                                <p>Документація потрібна з наступною метою: [[purpose_of_copy]]</p>
                                <p>Прошу надати документацію у такій формі: <strong>[[preferred_format]]</strong>.</p>
                                <p>Доставка має бути здійснена: <strong>[[delivery_method]]</strong>.</p>
                                <p>Я готовий/а нести відповідні витрати (витрати на копіювання).</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o udostępnienie dokumentacji medycznej',
                        'description' => 'Oficjalny wniosek o wydanie kopii dokumentacji medycznej zgodnie z § 630g BGB (niemieckiego kodeksu cywilnego).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WNIOSEK O UDOSTĘPNIENIE DOKUMENTACJI MEDYCZNEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Pacjent/Wnioskodawca: <strong>[[patient_full_name]]</strong><br>Data ur.: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Kierownictwa<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym, zgodnie z § 630g BGB, wnoszę o przesłanie kopii mojej dokumentacji medycznej (lub dokumentacji medycznej osoby, której jestem przedstawicielem ustawowym) za okres [[records_period]].</p>
                                <p>Dokumentacja jest mi potrzebna w celu: [[purpose_of_copy]]</p>
                                <p>Proszę o udostępnienie dokumentacji w formie: <strong>[[preferred_format]]</strong>.</p>
                                <p>Dostarczenie ma nastąpić poprzez: <strong>[[delivery_method]]</strong>.</p>
                                <p>Jestem gotowy/a ponieść związane z tym koszty (koszty kopiowania).</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление о прикреплении к поликлинике / Application for Attachment to Polyclinic (Antrag auf Aufnahme als Patient) ---
            [
                'slug' => 'attachment-polyclinic-application-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"patient_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania","en":"Residential Address","uk":"Адреса проживання","de":"Wohnadresse"}},
                    {"name":"patient_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia pacjenta","en":"Patient\'s Date of Birth","uk":"Дата народження пацієнта","de":"Geburtsdatum des Patienten"}},
                    {"name":"health_insurance_company","type":"text","required":true,"labels":{"pl":"Nazwa kasy chorych","en":"Health Insurance Company Name","uk":"Назва лікарняної каси","de":"Name der Krankenkasse"}},
                    {"name":"health_insurance_number","type":"text","required":true,"labels":{"pl":"Numer ubezpieczenia zdrowotnego","en":"Health Insurance Number","uk":"Номер медичного страхування","de":"Krankenversicherungsnummer"}},
                    {"name":"medical_facility_name","type":"text","required":true,"labels":{"pl":"Nazwa placówki medycznej/przychodni","en":"Medical Facility/Polyclinic Name","uk":"Назва медичного закладу/поліклініки","de":"Name der medizinischen Einrichtung/Praxis"}},
                    {"name":"medical_facility_address","type":"text","required":true,"labels":{"pl":"Adres placówki medycznej/przychodni","en":"Medical Facility/Polyclinic Address","uk":"Адреса медичного закладу/поліклініки","de":"Adresse der medizinischen Einrichtung/Praxis"}},
                    {"name":"doctor_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko wybranego lekarza (opcjonalnie)","en":"Selected Doctor\'s Full Name (optional)","uk":"ПІБ обраного лікаря (необов\'язково)","de":"Vollständiger Name des ausgewählten Arztes (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Aufnahme als Patient in einer Arztpraxis/Poliklinik',
                        'description' => 'Offizieller Antrag auf Aufnahme als Patient in einer Arztpraxis oder Poliklinik in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF AUFNAHME ALS PATIENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: <strong>[[patient_full_name]]</strong><br>Geb. am: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich meine Aufnahme als Patient in Ihrer Praxis/Einrichtung.</p>
                                <p>Meine Daten:</p>
                                <ul>
                                    <li>Krankenkasse: [[health_insurance_company]]</li>
                                    <li>Versicherungsnummer: [[health_insurance_number]]</li>
                                </ul>
                                <p>Ich wünsche die Behandlung durch Herrn/Frau Dr. [[doctor_full_name]] (falls zutreffend).</p>
                                <p>Ich bitte um Bestätigung meiner Aufnahme und um Vereinbarung eines ersten Termins.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Patient Registration at a Doctor\'s Practice/Polyclinic',
                        'description' => 'Official application for patient registration at a doctor\'s practice or polyclinic in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APPLICATION FOR PATIENT REGISTRATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: <strong>[[patient_full_name]]</strong><br>DOB: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby apply for registration as a patient at your practice/facility.</p>
                                <p>My details:</p>
                                <ul>
                                    <li>Health Insurance Company: [[health_insurance_company]]</li>
                                    <li>Insurance Number: [[health_insurance_number]]</li>
                                </ul>
                                <p>I would like to be treated by Dr. [[doctor_full_name]] (if applicable).</p>
                                <p>I kindly request confirmation of my registration and an appointment for a first consultation.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про прикріплення до поліклініки',
                        'description' => 'Офіційна заява про прикріплення до лікарської практики або поліклініки в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА ПРО ПРИКРІПЛЕННЯ ДО ПОЛІКЛІНІКИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Пацієнт: <strong>[[patient_full_name]]</strong><br>Дата народження: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю заяву про прикріплення мене як пацієнта до Вашої практики/закладу.</p>
                                <p>Мої дані:</p>
                                <ul>
                                    <li>Лікарняна каса: [[health_insurance_company]]</li>
                                    <li>Номер страхування: [[health_insurance_number]]</li>
                                </ul>
                                <p>Я бажаю лікуватися у лікаря [[doctor_full_name]] (якщо застосовно).</p>
                                <p>Прошу підтвердити моє прикріплення та домовитися про перший прийом.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o przyjęcie na pacjenta w przychodni/poliklinice',
                        'description' => 'Oficjalny wniosek o przyjęcie na pacjenta w przychodni lub poliklinice w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WNIOSEK O PRZYJĘCIE NA PACJENTA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Pacjent: <strong>[[patient_full_name]]</strong><br>Data ur.: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam wniosek o przyjęcie mnie na pacjenta w Państwa praktyce/placówce.</p>
                                <p>Moje dane:</p>
                                <ul>
                                    <li>Kasa chorych: [[health_insurance_company]]</li>
                                    <li>Numer ubezpieczenia: [[health_insurance_number]]</li>
                                </ul>
                                <p>Życzę sobie leczenia przez Pana/Panią Dr. [[doctor_full_name]] (jeśli dotyczy).</p>
                                <p>Proszę o potwierdzenie mojego przyjęcia i umówienie pierwszej wizyty.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Отказ от медицинского вмешательства / Refusal of Medical Intervention (Ablehnung einer medizinischen Maßnahme) ---
            [
                'slug' => 'refusal-medical-intervention-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"statement_date","type":"date","required":true,"labels":{"pl":"Data oświadczenia","en":"Statement Date","uk":"Дата заяви","de":"Datum der Erklärung"}},
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"patient_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania pacjenta","en":"Patient\'s Residential Address","uk":"Адреса проживання пацієнта","de":"Wohnadresse des Patienten"}},
                    {"name":"patient_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia pacjenta","en":"Patient\'s Date of Birth","uk":"Дата народження пацієнта","de":"Geburtsdatum des Patienten"}},
                    {"name":"medical_facility_name","type":"text","required":true,"labels":{"pl":"Nazwa placówki medycznej","en":"Medical Facility Name","uk":"Назва медичного закладу","de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_facility_address","type":"text","required":true,"labels":{"pl":"Adres placówki medycznej","en":"Medical Facility Address","uk":"Адреса медичного закладу","de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"intervention_description","type":"textarea","required":true,"labels":{"pl":"Opis proponowanego zabiegu/interwencji medycznej","en":"Description of proposed procedure/medical intervention","uk":"Опис запропонованої процедури/медичного втручання","de":"Beschreibung des vorgeschlagenen Eingriffs/der medizinischen Intervention"}},
                    {"name":"reason_for_refusal","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie odmowy","en":"Reason for refusal","uk":"Обґрунтування відмови","de":"Begründung der Ablehnung"}},
                    {"name":"doctor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko lekarza informującego","en":"Informing Doctor\'s Full Name","uk":"ПІБ лікаря, що інформує","de":"Vollständiger Name des informierenden Arztes"}},
                    {"name":"witness_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko świadka (opcjonalnie)","en":"Witness Full Name (optional)","uk":"ПІБ свідка (необов\'язково)","de":"Vollständiger Name des Zeugen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Ablehnung einer medizinischen Maßnahme',
                        'description' => 'Offizielle Erklärung des Patienten zur Ablehnung einer vorgeschlagenen medizinischen Maßnahme oder Behandlung, gemäß § 630d BGB.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ABLEHNUNG EINER MEDIZINISCHEN MAẞNAHME</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: <strong>[[patient_full_name]]</strong><br>Geb. am: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[statement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Leitung der<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit erkläre ich, [[patient_full_name]], dass ich die mir vorgeschlagene medizinische Maßnahme/Behandlung, nämlich: [[intervention_description]], ablehne.</p>
                                <p>Begründung meiner Ablehnung:</p>
                                <p>[[reason_for_refusal]]</p>
                                <p>Ich wurde von Herrn/Frau Dr. [[doctor_full_name]] über die Art der Maßnahme, ihre Notwendigkeit, ihre Risiken und Nebenwirkungen sowie über die möglichen Folgen meiner Ablehnung umfassend aufgeklärt.</p>
                                <p>Zeuge (optional): [[witness_full_name]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Refusal of Medical Intervention',
                        'description' => 'Official patient statement refusing a proposed medical measure or treatment, according to § 630d BGB.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REFUSAL OF MEDICAL INTERVENTION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: <strong>[[patient_full_name]]</strong><br>DOB: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[statement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Management of<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I, [[patient_full_name]], hereby declare that I refuse the proposed medical measure/treatment, namely: [[intervention_description]].</p>
                                <p>Reason for my refusal:</p>
                                <p>[[reason_for_refusal]]</p>
                                <p>I have been fully informed by Dr. [[doctor_full_name]] about the nature of the measure, its necessity, its risks and side effects, and the possible consequences of my refusal.</p>
                                <p>Witness (optional): [[witness_full_name]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Відмова від медичного втручання',
                        'description' => 'Офіційна заява пацієнта про відмову від запропонованої медичної процедури або лікування, згідно з § 630d BGB.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ВІДМОВА ВІД МЕДИЧНОГО ВТРУЧАННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Пацієнт: <strong>[[patient_full_name]]</strong><br>Дата народження: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: [[statement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br>Керівництву<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я, [[patient_full_name]], заявляю, що відмовляюся від запропонованої мені медичної процедури/лікування, а саме: [[intervention_description]].</p>
                                <p>Обґрунтування моєї відмови:</p>
                                <p>[[reason_for_refusal]]</p>
                                <p>Я був/ла повністю поінформований/на лікарем [[doctor_full_name]] про характер процедури, її необхідність, ризики та побічні ефекти, а також про можливі наслідки моєї відмови.</p>
                                <p>Свідок (необов\'язково): [[witness_full_name]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Oświadczenie o odmowie poddania się zabiegowi/interwencji medycznej',
                        'description' => 'Oficjalne oświadczenie pacjenta o odmowie poddania się proponowanej interwencji medycznej lub leczeniu, zgodnie z § 630d BGB.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OŚWIADCZENIE O ODMOWIE PODDANIA SIĘ ZABIEGOWI/INTERWENCJI MEDYCZNEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Pacjent: <strong>[[patient_full_name]]</strong><br>Data ur.: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: [[statement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Kierownictwa<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym oświadczam, że odmawiam poddania się proponowanej mi interwencji medycznej/leczeniu, którą jest: [[intervention_description]].</p>
                                <p>Uzasadnienie mojej odmowy:</p>
                                <p>[[reason_for_refusal]]</p>
                                <p>Zostałem/łam w pełni poinformowany/a przez Pana/Panią Dr. [[doctor_full_name]] o rodzaju interwencji, jej konieczności, ryzykach i skutkach ubocznych, a także o możliwych konsekwencjach mojej odmowy.</p>
                                <p>Świadek (opcjonalnie): [[witness_full_name]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Согласие на обработку персональных данных (медицинское) / Consent to Personal Data Processing (Medical) (Einwilligung zur Datenverarbeitung nach DSGVO im Gesundheitswesen) ---
            [
                'slug' => 'consent-personal-data-medical-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"consent_date","type":"date","required":true,"labels":{"pl":"Data wyrażenia zgody","en":"Consent Date","uk":"Дата надання згоди","de":"Datum der Einwilligung"}},
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"patient_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania pacjenta","en":"Patient\'s Residential Address","uk":"Адреса проживання пацієнта","de":"Wohnadresse des Patienten"}},
                    {"name":"patient_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia pacjenta","en":"Patient\'s Date of Birth","uk":"Дата народження пацієнта","de":"Geburtsdatum des Patienten"}},
                    {"name":"medical_facility_name","type":"text","required":true,"labels":{"pl":"Nazwa placówki medycznej/lekarza","en":"Medical Facility/Doctor Name","uk":"Назва медичного закладу/лікаря","de":"Name der medizinischen Einrichtung/des Arztes"}},
                    {"name":"medical_facility_address","type":"text","required":true,"labels":{"pl":"Adres placówki medycznej/lekarza","en":"Medical Facility/Doctor Address","uk":"Адреса медичного закладу/лікаря","de":"Adresse der medizinischen Einrichtung/des Arztes"}},
                    {"name":"data_scope","type":"textarea","required":true,"labels":{"pl":"Zakres danych, na których przetwarzanie wyrażana jest zgoda (np. dane medyczne, dane rozliczeniowe)","en":"Scope of data for which processing consent is given (e.g., medical data, billing data)","uk":"Обсяг даних, на обробку яких надається згода (напр., медичні дані, платіжні дані)","de":"Umfang der Daten, für die die Verarbeitung zugestimmt wird (z.B. medizinische Daten, Abrechnungsdaten)"}},
                    {"name":"purpose_of_processing","type":"textarea","required":true,"labels":{"pl":"Cel przetwarzania danych (np. leczenie, rozliczenia, komunikacja)","en":"Purpose of data processing (e.g., treatment, billing, communication)","uk":"Мета обробки даних (напр., лікування, розрахунки, комунікація)","de":"Zweck der Datenverarbeitung (z.B. Behandlung, Abrechnung, Kommunikation)"}},
                    {"name":"data_recipients","type":"textarea","required":false,"labels":{"pl":"Odbiorcy danych (np. inni lekarze, laboratoria, ubezpieczyciele)","en":"Recipients of data (e.g., other doctors, laboratories, insurers)","uk":"Одержувачі даних (напр., інші лікарі, лабораторії, страховики)","de":"Empfänger der Daten (z.B. andere Ärzte, Labore, Versicherer)"}},
                    {"name":"right_to_withdraw_consent","type":"textarea","required":true,"labels":{"pl":"Informacja o prawie do wycofania zgody i jego konsekwencjach","en":"Information on the right to withdraw consent and its consequences","uk":"Інформація про право відкликати згоду та її наслідки","de":"Informationen zum Widerrufsrecht der Einwilligung und dessen Folgen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Einwilligung zur Datenverarbeitung nach DSGVO im Gesundheitswesen',
                        'description' => 'Offizielle Einwilligung des Patienten zur Verarbeitung seiner personenbezogenen Daten für medizinische Zwecke, gemäß DSGVO und BDSG.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EINWILLIGUNG ZUR DATENVERARBEITUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: <strong>[[patient_full_name]]</strong><br>Geb. am: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[consent_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Hiermit willige ich, [[patient_full_name]], gemäß Art. 6 Abs. 1 lit. a DSGVO in die Verarbeitung meiner personenbezogenen Daten im Umfang von: [[data_scope]],</p>
                                <p>zu folgendem Zweck ein: [[purpose_of_processing]].</p>
                                <p>Empfänger der Daten (falls zutreffend): [[data_recipients]]</p>
                                <p>[[right_to_withdraw_consent]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Consent to Data Processing under GDPR in Healthcare',
                        'description' => 'Official patient consent to the processing of their personal data for medical purposes, compliant with GDPR and BDSG.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CONSENT TO DATA PROCESSING</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: <strong>[[patient_full_name]]</strong><br>DOB: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[consent_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I, [[patient_full_name]], hereby consent, in accordance with Art. 6 para. 1 lit. a GDPR, to the processing of my personal data to the extent of: [[data_scope]],</p>
                                <p>for the following purpose: [[purpose_of_processing]].</p>
                                <p>Recipients of data (if applicable): [[data_recipients]]</p>
                                <p>[[right_to_withdraw_consent]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Згода на обробку даних згідно з GDPR у сфері охорони здоров\'я',
                        'description' => 'Офіційна згода пацієнта на обробку його персональних даних у медичних цілях, згідно з GDPR та BDSG.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗГОДА НА ОБРОБКУ ДАНИХ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Пацієнт: <strong>[[patient_full_name]]</strong><br>Дата народження: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: [[consent_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Цим я, [[patient_full_name]], згідно зі ст. 6 абз. 1 літ. a GDPR, надаю згоду на обробку моїх персональних даних в обсязі: [[data_scope]],</p>
                                <p>з наступною метою: [[purpose_of_processing]].</p>
                                <p>Одержувачі даних (якщо застосовно): [[data_recipients]]</p>
                                <p>[[right_to_withdraw_consent]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zgoda na przetwarzanie danych osobowych zgodnie z RODO w służbie zdrowia',
                        'description' => 'Oficjalna zgoda pacjenta na przetwarzanie jego danych osobowych w celach medycznych, zgodna z RODO i BDSG.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZGODA NA PRZETWARZANIE DANYCH OSOBOWYCH</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Pacjent: <strong>[[patient_full_name]]</strong><br>Data ur.: [[patient_dob]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: [[consent_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym, zgodnie z art. 6 ust. 1 lit. a RODO, wyrażam zgodę na przetwarzanie moich danych osobowych w zakresie: [[data_scope]],</p>
                                <p>w następującym celu: [[purpose_of_processing]].</p>
                                <p>Odbiorcy danych (jeśli dotyczy): [[data_recipients]]</p>
                                <p>[[right_to_withdraw_consent]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Жалоба на врача / медицинское учреждение / Complaint about Doctor / Medical Facility (Beschwerde über Arzt / medizinische Einrichtung) ---
            [
                'slug' => 'complaint-doctor-medical-facility-de',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"complaint_date","type":"date","required":true,"labels":{"pl":"Data złożenia skargi","en":"Complaint Date","uk":"Дата подання скарги","de":"Datum der Beschwerde"}},
                    {"name":"complainant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko skarżącego","en":"Complainant\'s Full Name","uk":"ПІБ скаржника","de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania skarżącego","en":"Complainant\'s Residential Address","uk":"Адреса проживання скаржника","de":"Wohnadresse des Beschwerdeführers"}},
                    {"name":"complainant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail skarżącego","en":"Complainant\'s Phone & Email","uk":"Телефон та e-mail скаржника","de":"Telefon und E-Mail des Beschwerdeführers"}},
                    {"name":"medical_facility_name","type":"text","required":true,"labels":{"pl":"Nazwa placówki medycznej","en":"Medical Facility Name","uk":"Назва медичного закладу","de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_facility_address","type":"text","required":true,"labels":{"pl":"Adres placówki medycznej","en":"Medical Facility Address","uk":"Адреса медичного закладу","de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"doctor_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko lekarza (jeśli dotyczy)","en":"Doctor\'s Full Name (if applicable)","uk":"ПІБ лікаря (якщо застосовно)","de":"Vollständiger Name des Arztes (falls zutreffend)"}},
                    {"name":"complaint_subject","type":"text","required":true,"labels":{"pl":"Przedmiot skargi (np. błąd medyczny, niewłaściwe leczenie, złe traktowanie)","en":"Subject of complaint (e.g., medical error, improper treatment, mistreatment)","uk":"Предмет скарги (напр., медична помилка, неналежне лікування, погане ставлення)","de":"Gegenstand der Beschwerde (z.B. ärztlicher Fehler, unsachgemäße Behandlung, Misshandlung)"}},
                    {"name":"incident_details","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis zdarzenia/problemu (data, miejsce, przebieg)","en":"Detailed description of the event/problem (date, place, course)","uk":"Детальний опис події/проблеми (дата, місце, перебіг)","de":"Detaillierte Beschreibung des Ereignisses/Problems (Datum, Ort, Verlauf)"}},
                    {"name":"requested_action","type":"textarea","required":true,"labels":{"pl":"Żądane działania/rozstrzygnięcie","en":"Requested actions/resolution","uk":"Затребувані дії/вирішення","de":"Gewünschte Maßnahmen/Lösung"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. kopie dokumentacji medycznej)","en":"Attachments (e.g., copies of medical records)","uk":"Додатки (напр., копії медичної документації)","de":"Anhänge (z.B. Kopien von Krankenakten)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Beschwerde über Arzt / medizinische Einrichtung',
                        'description' => 'Formelle Beschwerde bezüglich der Qualität medizinischer Leistungen oder des Verhaltens des Personals, z.B. an die Ärztekammer oder Kassenärztliche Vereinigung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BESCHWERDE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Absender: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[complaint_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Leitung der<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit reiche ich Beschwerde ein bezüglich [[complaint_subject]], die in der Einrichtung [[medical_facility_name]] (oder den Arzt [[doctor_full_name]]) stattgefunden hat.</p>
                                <p>Detaillierte Beschreibung des Ereignisses/Problems:</p>
                                <p>[[incident_details]]</p>
                                <p>Ich fordere Sie auf, folgende Maßnahmen zu ergreifen: [[requested_action]]</p>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <p>Ich bitte um eine Bestätigung des Eingangs dieser Beschwerde und um Mitteilung der weiteren Vorgehensweise.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Complaint about Doctor / Medical Facility',
                        'description' => 'Formal complaint regarding the quality of medical services or staff behavior, e.g., to the medical association or statutory health insurance association.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">COMPLAINT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Complainant: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[complaint_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Management of<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby file a complaint regarding [[complaint_subject]], which occurred at [[medical_facility_name]] (or concerned Dr. [[doctor_full_name]]).</p>
                                <p>Detailed description of the event/problem:</p>
                                <p>[[incident_details]]</p>
                                <p>I request you to take the following actions: [[requested_action]]</p>
                                <p>Enclosed please find: [[attachments]].</p>
                                <p>I kindly request a confirmation of receipt of this complaint and information on further proceedings.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Скарга на лікаря / медичний заклад',
                        'description' => 'Формальна скарга щодо якості медичних послуг або поведінки персоналу, напр., до лікарської палати або касової асоціації лікарів.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">СКАРГА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Скаржник: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: [[complaint_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br>Керівництву<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю скаргу щодо [[complaint_subject]], яка мала місце в закладі [[medical_facility_name]] (або стосувалася лікаря [[doctor_full_name]]).</p>
                                <p>Детальний опис події/проблеми:</p>
                                <p>[[incident_details]]</p>
                                <p>Я вимагаю від Вас вжити наступних заходів: [[requested_action]]</p>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <p>Прошу підтвердити отримання цієї скарги та повідомити про подальші дії.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Skarga na lekarza / placówkę medyczną',
                        'description' => 'Formalna skarga dotycząca jakości usług medycznych lub zachowania personelu, np. do izby lekarskiej lub kasy chorych.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SKARGA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Skarżący: <strong>[[complainant_full_name]]</strong><br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: [[complaint_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Kierownictwa<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam skargę dotyczącą [[complaint_subject]], która miała miejsce w placówce [[medical_facility_name]] (lub dotyczyła lekarza [[doctor_full_name]]).</p>
                                <p>Szczegółowy opis zdarzenia/problemu:</p>
                                <p>[[incident_details]]</p>
                                <p>Żądam od Państwa podjęcia następujących działań: [[requested_action]]</p>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <p>Proszę o potwierdzenie otrzymania niniejszej skargi i informację o dalszym postępowaniu.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Дневник самочувствия (для отслеживания симптомов) / Well-being Diary (for symptom tracking) (Befindlichkeitstagebuch / Symptomtagebuch) ---
            [
                'slug' => 'well-being-diary-de',
                'fields' => '[
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"diary_period","type":"text","required":true,"labels":{"pl":"Okres prowadzenia dziennika (np. od-do, miesiąc)","en":"Diary period (e.g., from-to, month)","uk":"Період ведення щоденника (напр., від-до, місяць)","de":"Zeitraum des Tagebuchs (z.B. von-bis, Monat)"}},
                    {"name":"symptoms_to_track","type":"textarea","required":true,"labels":{"pl":"Objawy do monitorowania (np. ból głowy, zmęczenie, nastrój)","en":"Symptoms to monitor (e.g., headache, fatigue, mood)","uk":"Симптоми для моніторингу (напр., головний біль, втома, настрій)","de":"Zu überwachende Symptome (z.B. Kopfschmerzen, Müdigkeit, Stimmung)"}},
                    {"name":"daily_entries_example","type":"textarea","required":false,"labels":{"pl":"Przykładowe wpisy dzienne (data, godzina, objawy, intensywność, uwagi)","en":"Example daily entries (date, time, symptoms, intensity, notes)","uk":"Приклад щоденних записів (дата, час, симптоми, інтенсивність, примітки)","de":"Beispiel für tägliche Einträge (Datum, Uhrzeit, Symptome, Intensität, Anmerkungen)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Befindlichkeitstagebuch / Symptomtagebuch',
                        'description' => 'Vorlage für ein Tagebuch zur Überwachung des Wohlbefindens und der Gesundheitssymptome.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BEFINDLICHKEITSTAGEBUCH / SYMPTOMTAGEBUCH</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zeitraum: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Datum der Erstellung: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Zu überwachende Symptome:</h2>
                                <p>[[symptoms_to_track]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Tägliche Einträge:</h2>
                                <pre>
Datum | Uhrzeit | Symptome | Intensität (1-10) | Anmerkungen
------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Patienten)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Well-being Diary / Symptom Diary',
                        'description' => 'A diary template for monitoring well-being and health symptoms.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WELL-BEING AND SYMPTOM DIARY</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Period: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Date of Creation: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Symptoms to monitor:</h2>
                                <p>[[symptoms_to_track]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Daily Entries:</h2>
                                <pre>
Date | Time | Symptoms | Intensity (1-10) | Notes
------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Patient\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Щоденник самопочуття / Щоденник симптомів',
                        'description' => 'Шаблон щоденника для моніторингу самопочуття та симптомів здоров\'я.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЩОДЕННИК САМОПОЧУТТЯ ТА СИМПТОМІВ</h1><p style="font-size: 14px;">Пацієнт: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Період: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Дата складання: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Симптоми для моніторингу:</h2>
                                <p>[[symptoms_to_track]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Щоденні записи:</h2>
                                <pre>
Дата | Час | Симптоми | Інтенсивність (1-10) | Примітки
------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис пацієнта)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Dziennik samopoczucia / Dziennik objawów',
                        'description' => 'Szablon dziennika do monitorowania samopoczucia i objawów zdrowotnych.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK SAMOPOCZUCIA I OBJAWÓW</h1><p style="font-size: 14px;">Pacjent: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Okres: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Data sporządzenia: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Objawy do monitorowania:</h2>
                                <p>[[symptoms_to_track]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Wpisy dzienne:</h2>
                                <pre>
Data | Godzina | Objawy | Intensywność (1-10) | Uwagi
------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis pacjenta)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Дневник артериального давления / Blood Pressure Diary (Blutdruck-Tagebuch) ---
            [
                'slug' => 'blood-pressure-diary-de',
                'fields' => '[
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"diary_period","type":"text","required":true,"labels":{"pl":"Okres prowadzenia dziennika (np. od-do, miesiąc)","en":"Diary period (e.g., from-to, month)","uk":"Період ведення щоденника (напр., від-до, місяць)","de":"Zeitraum des Tagebuchs (z.B. von-bis, Monat)"}},
                    {"name":"daily_entries_example","type":"textarea","required":true,"labels":{"pl":"Przykładowe wpisy dzienne (data, godzina, ciśnienie skurczowe, rozkurczowe, tętno, uwagi)","en":"Example daily entries (date, time, systolic, diastolic, pulse, notes)","uk":"Приклад щоденних записів (дата, час, систолічний, діастолічний, пульс, примітки)","de":"Beispiel für tägliche Einträge (Datum, Uhrzeit, systolisch, diastolisch, Puls, Anmerkungen)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Blutdruck-Tagebuch',
                        'description' => 'Vorlage für ein Tagebuch zur Überwachung und Aufzeichnung von Blutdruckmessungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BLUTDRUCK-TAGEBUCH</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zeitraum: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Datum der Erstellung: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Tägliche Einträge:</h2>
                                <pre>
Datum | Uhrzeit | Systolisch | Diastolisch | Puls | Anmerkungen
-----------------------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Patienten)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Blood Pressure Diary',
                        'description' => 'A diary template for monitoring and recording blood pressure measurements.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BLOOD PRESSURE DIARY</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Period: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Date of Creation: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Daily Entries:</h2>
                                <pre>
Date | Time | Systolic | Diastolic | Puls | Notes
-----------------------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Patient\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Щоденник артеріального тиску',
                        'description' => 'Шаблон щоденника для моніторингу та запису вимірювань артеріального тиску.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЩОДЕННИК ВИМІРЮВАНЬ АРТЕРІАЛЬНОГО ТИСКУ</h1><p style="font-size: 14px;">Пацієнт: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Період: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Дата складання: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Щоденні записи:</h2>
                                <pre>
Дата | Час | Систолічний | Діастолічний | Пульс | Примітки
-----------------------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис пацієнта)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Dziennik pomiarów ciśnienia krwi',
                        'description' => 'Szablon dziennika do monitorowania i zapisywania pomiarów ciśnienia krwi.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK POMIARÓW CIŚNIENIA KRWI</h1><p style="font-size: 14px;">Pacjent: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Okres: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Data sporządzenia: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Wpisy dzienne:</h2>
                                <pre>
Data | Godzina | Skurczowe | Rozkurczowe | Tętno | Uwagi
-----------------------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis pacjenta)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Дневник головной боли / Headache Diary (Kopfschmerz-Tagebuch) ---
            [
                'slug' => 'headache-diary-de',
                'fields' => '[
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"diary_period","type":"text","required":true,"labels":{"pl":"Okres prowadzenia dziennika (np. od-do, miesiąc)","en":"Diary period (e.g., from-to, month)","uk":"Період ведення щоденника (напр., від-до, місяць)","de":"Zeitraum des Tagebuchs (z.B. von-bis, Monat)"}},
                    {"name":"daily_entries_example","type":"textarea","required":true,"labels":{"pl":"Przykładowe wpisy dzienne (data, godzina, intensywność bólu (1-10), rodzaj bólu, czynniki wyzwalające, leki, uwagi)","en":"Example daily entries (date, time, pain intensity (1-10), type of pain, triggers, medications, notes)","uk":"Приклад щоденних записів (дата, час, інтенсивність болю (1-10), тип болю, тригери, ліки, примітки)","de":"Beispiel für tägliche Einträge (Datum, Uhrzeit, Schmerzintensität (1-10), Art des Schmerzes, Auslöser, Medikamente, Anmerkungen)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Kopfschmerz-Tagebuch',
                        'description' => 'Vorlage für ein Tagebuch zur Überwachung und Aufzeichnung von Kopfschmerzepisoden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KOPFSCHMERZ-TAGEBUCH</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zeitraum: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Datum der Erstellung: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Tägliche Einträge:</h2>
                                <pre>
Datum | Uhrzeit | Intensität (1-10) | Art des Schmerzes | Auslöser | Medikamente | Anmerkungen
------------------------------------------------------------------------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift des Patienten)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Headache Diary',
                        'description' => 'A diary template for monitoring and recording headache episodes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HEADACHE DIARY</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Period: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Date of Creation: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Daily Entries:</h2>
                                <pre>
Date | Time | Intensity (1-10) | Type of Pain | Triggers | Medications | Notes
------------------------------------------------------------------------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Patient\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Щоденник головного болю',
                        'description' => 'Шаблон щоденника для моніторингу та запису епізодів головного болю.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЩОДЕННИК ГОЛОВНОГО БОЛЮ</h1><p style="font-size: 14px;">Пацієнт: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Період: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Дата складання: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Щоденні записи:</h2>
                                <pre>
Дата | Час | Інтенсивність (1-10) | Тип болю | Тригери | Ліки | Примітки
------------------------------------------------------------------------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис пацієнта)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Dziennik bólu głowy',
                        'description' => 'Szablon dziennika do monitorowania i zapisywania epizodów bólu głowy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK BÓLU GŁOWY</h1><p style="font-size: 14px;">Pacjent: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Okres: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Data sporządzenia: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Wpisy dzienne:</h2>
                                <pre>
Data | Godzina | Intensywność (1-10) | Rodzaj bólu | Czynniki wyzwalające | Leki | Uwagi
------------------------------------------------------------------------------------------------------------------------------------
[[daily_entries_example]]
                                </pre>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis pacjenta)</p>
                            </div>'
                    ]
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
