<?php

namespace Database\Seeders\PL;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class PlHealthMedicineSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'medicine-pl')->first();
        if (!$category) {
            $this->command->error('Category with slug "medicine-pl" not found.');
            return;
        }
        $templatesData = [
            // --- Запрос на получение копии медицинской документации / Request for Medical Records Copy ---
            [
                'slug' => 'request-medical-records-copy-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta/wnioskodawcy","en":"Patient\'s/Applicant\'s Full Name","uk":"ПІБ пацієнта/заявника","de":"Vollständiger Name des Patienten/Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania","en":"Residential Address","uk":"Адреса проживання","de":"Wohnadresse"}},
                    {"name":"applicant_pesel","type":"text","required":true,"labels":{"pl":"PESEL pacjenta","en":"Patient\'s PESEL","uk":"ПЕСЕЛЬ пацієнта","de":"PESEL des Patienten"}},
                    {"name":"medical_facility_name","type":"text","required":true,"labels":{"pl":"Nazwa placówki medycznej","en":"Medical Facility Name","uk":"Назва медичного закладу","de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_facility_address","type":"text","required":true,"labels":{"pl":"Adres placówki medycznej","en":"Medical Facility Address","uk":"Адреса медичного закладу","de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"records_period","type":"text","required":true,"labels":{"pl":"Okres, którego dotyczy dokumentacja (np. od-do, konkretna data)","en":"Period covered by documentation (e.g., from-to, specific date)","uk":"Період, до якого стосується документація (напр., від-до, конкретна дата)","de":"Zeitraum, den die Dokumentation betrifft (z.B. von-bis, bestimmtes Datum)"}},
                    {"name":"purpose_of_copy","type":"textarea","required":true,"labels":{"pl":"Cel uzyskania kopii","en":"Purpose of obtaining copy","uk":"Мета отримання копії","de":"Zweck der Kopie"}},
                    {"name":"preferred_format","type":"text","required":true,"labels":{"pl":"Preferowana forma kopii (np. papierowa, elektroniczna)","en":"Preferred copy format (e.g., paper, electronic)","uk":"Бажана форма копії (напр., паперова, електронна)","de":"Bevorzugtes Kopierformat (z.B. Papier, elektronisch)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o udostępnienie dokumentacji medycznej',
                        'description' => 'Oficjalny wniosek o wydanie kopii dokumentacji medycznej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O UDOSTĘPNIENIE DOKUMENTACJI MEDYCZNEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>PESEL: [[applicant_pesel]]<br>[[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Kierownika/Dyrektora<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Zwracam się z uprzejmą prośbą o udostępnienie mi kopii dokumentacji medycznej dotyczącej mojej osoby (lub osoby, której jestem prawnym opiekunem) z okresu [[records_period]].</p>
                                <p>Dokumentacja jest mi potrzebna w celu: [[purpose_of_copy]]</p>
                                <p>Proszę o udostępnienie dokumentacji w formie: [[preferred_format]].</p>
                                <p>Zgodnie z art. 26 ust. 1 Ustawy o prawach pacjenta i Rzeczniku Praw Pacjenta, proszę o przygotowanie dokumentacji do odbioru/przesłanie na wskazany adres.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Request for Medical Records Copy',
                        'description' => 'Official request for a copy of medical records.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">REQUEST FOR MEDICAL RECORDS COPY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>PESEL: [[applicant_pesel]]<br>[[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Head/Director<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>I hereby kindly request a copy of my medical records (or the person for whom I am the legal guardian) for the period [[records_period]].</p>
                                <p>The documentation is needed for the purpose of: [[purpose_of_copy]]</p>
                                <p>Please provide the documentation in the following format: [[preferred_format]].</p>
                                <p>In accordance with Article 26 sec. 1 of the Act on Patient Rights and the Patient Ombudsman, please prepare the documentation for collection/send it to the indicated address.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Запит на отримання копії медичної документації',
                        'description' => 'Офіційний запит на видачу копії медичної документації.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАПИТ НА ОТРИМАННЯ КОПІЇ МЕДИЧНОЇ ДОКУМЕНТАЦІЇ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>ПЕСЕЛЬ: [[applicant_pesel]]<br>[[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br>Керівника/Директора<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Звертаюся з покірним проханням про надання мені копії медичної документації щодо моєї особи (або особи, законним опікуном якої я є) за період [[records_period]].</p>
                                <p>Документація мені потрібна з метою: [[purpose_of_copy]]</p>
                                <p>Прошу надати документацію у формі: [[preferred_format]].</p>
                                <p>Відповідно до ст. 26 п. 1 Закону про права пацієнта та Уповноваженого з прав пацієнта, прошу підготувати документацію до отримання/надіслати на вказану адресу.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Kopie der medizinischen Dokumentation',
                        'description' => 'Offizieller Antrag auf Ausstellung einer Kopie der medizinischen Dokumentation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF KOPIE DER MEDIZINISCHEN DOKUMENTATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>PESEL: [[applicant_pesel]]<br>[[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Leiter/Direktor<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Hiermit beantrage ich höflich die Bereitstellung einer Kopie der medizinischen Dokumentation bezüglich meiner Person (oder der Person, deren gesetzlicher Vormund ich bin) für den Zeitraum [[records_period]].</p>
                                <p>Die Dokumentation benötige ich zu folgendem Zweck: [[purpose_of_copy]]</p>
                                <p>Bitte stellen Sie die Dokumentation in folgender Form zur Verfügung: [[preferred_format]].</p>
                                <p>Gemäß Art. 26 Abs. 1 des Gesetzes über Patientenrechte und den Patientenbeauftragten bitte ich um Vorbereitung der Dokumentation zur Abholung/Zusendung an die angegebene Adresse.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление о прикреплении к поликлинике / Application for Attachment to Polyclinic ---
            [
                'slug' => 'attachment-polyclinic-application-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania","en":"Residential Address","uk":"Адреса проживання","de":"Wohnadresse"}},
                    {"name":"applicant_pesel","type":"text","required":true,"labels":{"pl":"PESEL pacjenta","en":"Patient\'s PESEL","uk":"ПЕСЕЛЬ пацієнта","de":"PESEL des Patienten"}},
                    {"name":"polyclinic_name","type":"text","required":true,"labels":{"pl":"Nazwa przychodni/placówki POZ","en":"Polyclinic/Primary Care Facility Name","uk":"Назва поліклініки/закладу ПМСД","de":"Name der Poliklinik/Primärversorgungseinrichtung"}},
                    {"name":"polyclinic_address","type":"text","required":true,"labels":{"pl":"Adres przychodni/placówki POZ","en":"Polyclinic/Primary Care Facility Address","uk":"Адреса поліклініки/закладу ПМСД","de":"Adresse der Poliklinik/Primärversorgungseinrichtung"}},
                    {"name":"doctor_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko wybranego lekarza POZ (opcjonalnie)","en":"Selected Primary Care Doctor\'s Full Name (optional)","uk":"ПІБ обраного лікаря ПМСД (необов\'язково)","de":"Vollständiger Name des ausgewählten Hausarztes (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Deklaracja wyboru lekarza/pielęgniarki/położnej POZ',
                        'description' => 'Oficjalna deklaracja wyboru lekarza podstawowej opieki zdrowotnej (POZ) w wybranej przychodni.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">DEKLARACJA WYBORU ŚWIADCZENIODAWCY PODSTAWOWEJ OPIEKI ZDROWOTNEJ (POZ)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Pacjent: [[applicant_full_name]]<br>PESEL: [[applicant_pesel]]<br>[[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[polyclinic_name]]</strong><br>[[polyclinic_address]]</p>
                                <br/>
                                <p>Niniejszym dokonuję wyboru świadczeniodawcy podstawowej opieki zdrowotnej (POZ) oraz lekarza POZ:</p>
                                <p>Wybrany lekarz POZ: <strong>[[doctor_full_name]]</strong> (jeśli dotyczy)</p>
                                <p>Oświadczam, że zapoznałem/łam się z informacjami dotyczącymi wyboru i zmiany lekarza POZ.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Attachment to Polyclinic',
                        'description' => 'Official declaration of choice of primary healthcare doctor (POZ) at a selected polyclinic.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">DECLARATION OF CHOICE OF PRIMARY HEALTHCARE PROVIDER (POZ)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: [[applicant_full_name]]<br>PESEL: [[applicant_pesel]]<br>[[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[polyclinic_name]]</strong><br>[[polyclinic_address]]</p>
                                <br/>
                                <p>I hereby declare my choice of primary healthcare provider (POZ) and POZ doctor:</p>
                                <p>Selected POZ Doctor: <strong>[[doctor_full_name]]</strong> (if applicable)</p>
                                <p>I declare that I have read the information regarding the choice and change of POZ doctor.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про прикріплення до поліклініки',
                        'description' => 'Офіційна декларація вибору лікаря первинної медичної допомоги (ПМСД) у вибраній поліклініці.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ДЕКЛАРАЦІЯ ВИБОРУ НАДАВАЧА ПЕРВИННОЇ МЕДИЧНОЇ ДОПОМОГИ (ПМСД)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Пацієнт: [[applicant_full_name]]<br>ПЕСЕЛЬ: [[applicant_pesel]]<br>[[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[polyclinic_name]]</strong><br>[[polyclinic_address]]</p>
                                <br/>
                                <p>Цим я заявляю про вибір надавача первинної медичної допомоги (ПМСД) та лікаря ПМСД:</p>
                                <p>Обраний лікар ПМСД: <strong>[[doctor_full_name]]</strong> (якщо застосовно)</p>
                                <p>Заявляю, що ознайомлений/на з інформацією щодо вибору та зміни лікаря ПМСД.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Zuweisung zu einer Poliklinik',
                        'description' => 'Offizielle Erklärung zur Wahl des Hausarztes (POZ) in einer ausgewählten Poliklinik.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ERKLÄRUNG ZUR WAHL DES HAUSARZTES (POZ)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: [[applicant_full_name]]<br>PESEL: [[applicant_pesel]]<br>[[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[polyclinic_name]]</strong><br>[[polyclinic_address]]</p>
                                <br/>
                                <p>Hiermit erkläre ich meine Wahl des Hausarztes (POZ) und des POZ-Arztes:</p>
                                <p>Ausgewählter POZ-Arzt: <strong>[[doctor_full_name]]</strong> (falls zutreffend)</p>
                                <p>Ich erkläre, dass ich die Informationen zur Wahl und zum Wechsel des POZ-Arztes gelesen habe.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Отказ от медицинского вмешательства / Refusal of Medical Intervention ---
            [
                'slug' => 'refusal-medical-intervention-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"statement_date","type":"date","required":true,"labels":{"pl":"Data oświadczenia","en":"Statement Date","uk":"Дата заяви","de":"Datum der Erklärung"}},
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"patient_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania pacjenta","en":"Patient\'s Residential Address","uk":"Адреса проживання пацієнта","de":"Wohnadresse des Patienten"}},
                    {"name":"patient_pesel","type":"text","required":true,"labels":{"pl":"PESEL pacjenta","en":"Patient\'s PESEL","uk":"ПЕСЕЛЬ пацієнта","de":"PESEL des Patienten"}},
                    {"name":"medical_facility_name","type":"text","required":true,"labels":{"pl":"Nazwa placówki medycznej","en":"Medical Facility Name","uk":"Назва медичного закладу","de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_facility_address","type":"text","required":true,"labels":{"pl":"Adres placówki medycznej","en":"Medical Facility Address","uk":"Адреса медичного закладу","de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"intervention_description","type":"textarea","required":true,"labels":{"pl":"Opis proponowanego zabiegu/interwencji medycznej","en":"Description of proposed procedure/medical intervention","uk":"Опис запропонованої процедури/медичного втручання","de":"Beschreibung des vorgeschlagenen Eingriffs/der medizinischen Intervention"}},
                    {"name":"reason_for_refusal","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie odmowy","en":"Reason for refusal","uk":"Обґрунтування відмови","de":"Begründung der Ablehnung"}},
                    {"name":"doctor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko lekarza informującego","en":"Informing Doctor\'s Full Name","uk":"ПІБ лікаря, що інформує","de":"Vollständiger Name des informierenden Arztes"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Oświadczenie o odmowie poddania się zabiegowi/interwencji medycznej',
                        'description' => 'Oficjalne oświadczenie pacjenta o odmowie poddania się proponowanemu zabiegowi lub interwencji medycznej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">OŚWIADCZENIE O ODMOWIE PODDANIA SIĘ ZABIEGOWI/INTERWENCJI MEDYCZNEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Pacjent: [[patient_full_name]]<br>PESEL: [[patient_pesel]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Kierownika/Dyrektora<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Niniejszym oświadczam, że po zapoznaniu się z informacjami dotyczącymi proponowanego zabiegu/interwencji medycznej, którą jest: [[intervention_description]],</p>
                                <p>odmawiam poddania się temu zabiegowi/interwencji.</p>
                                <p>Uzasadnienie mojej odmowy:</p>
                                <p>[[reason_for_refusal]]</p>
                                <p>Zostałem/łam poinformowany/a przez lekarza [[doctor_full_name]] o możliwych konsekwencjach mojej odmowy.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Refusal of Medical Intervention',
                        'description' => 'Official patient statement refusing a proposed medical procedure or intervention.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">STATEMENT OF REFUSAL OF MEDICAL INTERVENTION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: [[patient_full_name]]<br>PESEL: [[patient_pesel]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Head/Director<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>I hereby declare that after reviewing the information regarding the proposed medical procedure/intervention, which is: [[intervention_description]],</p>
                                <p>I refuse to undergo this procedure/intervention.</p>
                                <p>Reason for my refusal:</p>
                                <p>[[reason_for_refusal]]</p>
                                <p>I have been informed by Doctor [[doctor_full_name]] about the possible consequences of my refusal.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Відмова від медичного втручання',
                        'description' => 'Офіційна заява пацієнта про відмову від запропонованої процедури або медичного втручання.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА ПРО ВІДМОВУ ВІД МЕДИЧНОГО ВТРУЧАННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Пацієнт: [[patient_full_name]]<br>ПЕСЕЛЬ: [[patient_pesel]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br>Керівника/Директора<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Цим заявляю, що після ознайомлення з інформацією щодо запропонованої медичної процедури/втручання, якою є: [[intervention_description]],</p>
                                <p>я відмовляюся від цієї процедури/втручання.</p>
                                <p>Обґрунтування моєї відмови:</p>
                                <p>[[reason_for_refusal]]</p>
                                <p>Я був/ла поінформований/на лікарем [[doctor_full_name]] про можливі наслідки моєї відмови.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Erklärung zur Ablehnung einer medizinischen Intervention',
                        'description' => 'Offizielle Erklärung des Patienten zur Ablehnung einer vorgeschlagenen medizinischen Prozedur oder Intervention.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ERKLÄRUNG ZUR ABLEHNUNG EINER MEDIZINISCHEN INTERVENTION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: [[patient_full_name]]<br>PESEL: [[patient_pesel]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Leiter/Direktor<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Hiermit erkläre ich, dass ich nach Kenntnisnahme der Informationen bezüglich des vorgeschlagenen medizinischen Eingriffs/der Intervention, nämlich: [[intervention_description]],</p>
                                <p>die Durchführung dieses Eingriffs/dieser Intervention ablehne.</p>
                                <p>Begründung meiner Ablehnung:</p>
                                <p>[[reason_for_refusal]]</p>
                                <p>Ich wurde von Arzt [[doctor_full_name]] über die möglichen Konsequenzen meiner Ablehnung informiert.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Согласие на обработку персональных данных (медицинское) / Consent to Personal Data Processing (Medical) ---
            [
                'slug' => 'consent-personal-data-medical-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"consent_date","type":"date","required":true,"labels":{"pl":"Data wyrażenia zgody","en":"Consent Date","uk":"Дата надання згоди","de":"Datum der Zustimmung"}},
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"patient_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania pacjenta","en":"Patient\'s Residential Address","uk":"Адреса проживання пацієнта","de":"Wohnadresse des Patienten"}},
                    {"name":"patient_pesel","type":"text","required":true,"labels":{"pl":"PESEL pacjenta","en":"Patient\'s PESEL","uk":"ПЕСЕЛЬ пацієнта","de":"PESEL des Patienten"}},
                    {"name":"medical_facility_name","type":"text","required":true,"labels":{"pl":"Nazwa placówki medycznej","en":"Medical Facility Name","uk":"Назва медичного закладу","de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_facility_address","type":"text","required":true,"labels":{"pl":"Adres placówki medycznej","en":"Medical Facility Address","uk":"Адреса медичного закладу","de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"data_scope","type":"textarea","required":true,"labels":{"pl":"Zakres danych, na których przetwarzanie wyrażana jest zgoda","en":"Scope of data for which processing consent is given","uk":"Обсяг даних, на обробку яких надається згода","de":"Umfang der Daten, für die die Verarbeitung zugestimmt wird"}},
                    {"name":"purpose_of_processing","type":"textarea","required":true,"labels":{"pl":"Cel przetwarzania danych","en":"Purpose of data processing","uk":"Мета обробки даних","de":"Zweck der Datenverarbeitung"}},
                    {"name":"consent_duration","type":"text","required":false,"labels":{"pl":"Okres ważności zgody (opcjonalnie)","en":"Consent validity period (optional)","uk":"Термін дії згоди (необов\'язково)","de":"Gültigkeitsdauer der Zustimmung (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zgoda na przetwarzanie danych osobowych (medyczne)',
                        'description' => 'Oficjalna zgoda pacjenta na przetwarzanie jego danych osobowych w celach medycznych, zgodna z RODO.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ZGODA NA PRZETWARZANIE DANYCH OSOBOWYCH</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Pacjent: [[patient_full_name]]<br>PESEL: [[patient_pesel]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Kierownika/Dyrektora<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Niniejszym, zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. (RODO), wyrażam zgodę na przetwarzanie moich danych osobowych w zakresie: [[data_scope]],</p>
                                <p>w celu: [[purpose_of_processing]].</p>
                                <p>Zgoda jest ważna [[consent_duration]].</p>
                                <p>Oświadczam, że zostałem/łam poinformowany/a o prawie do wycofania zgody w dowolnym momencie oraz o przysługujących mi prawach wynikających z RODO.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Consent to Personal Data Processing (Medical)',
                        'description' => 'Official patient consent to the processing of their personal data for medical purposes, compliant with GDPR.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">CONSENT TO PERSONAL DATA PROCESSING</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: [[patient_full_name]]<br>PESEL: [[patient_pesel]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Head/Director<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Hereby, in accordance with Regulation (EU) 2016/679 of the European Parliament and of the Council of April 27, 2016 (GDPR), I consent to the processing of my personal data to the extent of: [[data_scope]],</p>
                                <p>for the purpose of: [[purpose_of_processing]].</p>
                                <p>The consent is valid for [[consent_duration]].</p>
                                <p>I declare that I have been informed about the right to withdraw consent at any time and about my rights under the GDPR.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Згода на обробку персональних даних (медична)',
                        'description' => 'Офіційна згода пацієнта на обробку його персональних даних у медичних цілях, згідно з GDPR.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗГОДА НА ОБРОБКУ ПЕРСОНАЛЬНИХ ДАНИХ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Пацієнт: [[patient_full_name]]<br>ПЕСЕЛЬ: [[patient_pesel]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br>Керівника/Директора<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Цим, відповідно до Регламенту (ЄС) 2016/679 Європейського парламенту та Ради від 27 квітня 2016 р. (GDPR), надаю згоду на обробку моїх персональних даних в обсязі: [[data_scope]],</p>
                                <p>з метою: [[purpose_of_processing]].</p>
                                <p>Згода дійсна [[consent_duration]].</p>
                                <p>Заявляю, що я був/ла поінформований/на про право відкликати згоду в будь-який час, а також про мої права, що випливають з GDPR.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Zustimmung zur Verarbeitung personenbezogener Daten (medizinisch)',
                        'description' => 'Offizielle Zustimmung des Patienten zur Verarbeitung seiner personenbezogenen Daten für medizinische Zwecke, gemäß DSGVO.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ZUSTIMMUNG ZUR VERARBEITUNG PERSONENBEZOGENER DATEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Patient: [[patient_full_name]]<br>PESEL: [[patient_pesel]]<br>[[patient_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Leiter/Direktor<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Hiermit willige ich gemäß der Verordnung (EU) 2016/679 des Europäischen Parlaments und des Rates vom 27. April 2016 (DSGVO) in die Verarbeitung meiner personenbezogenen Daten im Umfang von: [[data_scope]],</p>
                                <p>zu folgendem Zweck ein: [[purpose_of_processing]].</p>
                                <p>Die Zustimmung ist gültig [[consent_duration]].</p>
                                <p>Ich erkläre, dass ich über das Recht informiert wurde, die Zustimmung jederzeit zu widerrufen, sowie über meine Rechte gemäß der DSGVO.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[patient_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Жалоба на врача / медицинское учреждение / Complaint about Doctor / Medical Facility ---
            [
                'slug' => 'complaint-doctor-medical-facility-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"complainant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko skarżącego","en":"Complainant\'s Full Name","uk":"ПІБ скаржника","de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania skarżącego","en":"Complainant\'s Residential Address","uk":"Адреса проживання скаржника","de":"Wohnadresse des Beschwerdeführers"}},
                    {"name":"complainant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail skarżącego","en":"Complainant\'s Phone & Email","uk":"Телефон та e-mail скаржника","de":"Telefon und E-Mail des Beschwerdeführers"}},
                    {"name":"medical_facility_name","type":"text","required":true,"labels":{"pl":"Nazwa placówki medycznej","en":"Medical Facility Name","uk":"Назва медичного закладу","de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_facility_address","type":"text","required":true,"labels":{"pl":"Adres placówki medycznej","en":"Medical Facility Address","uk":"Адреса медичного закладу","de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"doctor_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko lekarza (jeśli dotyczy)","en":"Doctor\'s Full Name (if applicable)","uk":"ПІБ лікаря (якщо застосовно)","de":"Vollständiger Name des Arztes (falls zutreffend)"}},
                    {"name":"complaint_subject","type":"text","required":true,"labels":{"pl":"Przedmiot skargi (np. błąd medyczny, niewłaściwe leczenie, złe traktowanie)","en":"Subject of complaint (e.g., medical error, improper treatment, mistreatment)","uk":"Предмет скарги (напр., медична помилка, неналежне лікування, погане ставлення)","de":"Gegenstand der Beschwerde (z.B. ärztlicher Fehler, unsachgemäße Behandlung, Misshandlung)"}},
                    {"name":"incident_details","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis zdarzenia/problemu (data, miejsce, przebieg)","en":"Detailed description of the event/problem (date, place, course)","uk":"Детальний опис події/проблеми (дата, місце, перебіг)","de":"Detaillierte Beschreibung des Ereignisses/Problems (Datum, Ort, Verlauf)"}},
                    {"name":"requested_action","type":"textarea","required":true,"labels":{"pl":"Żądane działania/rozstrzygnięcie","en":"Requested actions/resolution","uk":"Затребувані дії/вирішення","de":"Gewünschte Maßnahmen/Lösung"}},
                    {"name":"attachments","type":"text","required":false,"labels":{"pl":"Załączniki (np. kopie dokumentacji medycznej)","en":"Attachments (e.g., copies of medical records)","uk":"Додатки (напр., копії медичної документації)","de":"Anhänge (z.B. Kopien von Krankenakten)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Skarga na lekarza/placówkę medyczną',
                        'description' => 'Formalna skarga dotycząca jakości usług medycznych lub zachowania personelu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">SKARGA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Kierownika/Dyrektora<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Niniejszym składam skargę dotyczącą [[complaint_subject]], która miała miejsce w placówce [[medical_facility_name]] (lub dotyczyła lekarza [[doctor_full_name]]).</p>
                                <p>Szczegółowy opis zdarzenia/problemu:</p>
                                <p>[[incident_details]]</p>
                                <p>W związku z powyższym, wnoszę o podjęcie następujących działań: [[requested_action]]</p>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <p>Proszę o pilne rozpatrzenie mojej skargi i informację o podjętych krokach.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Complaint about Doctor / Medical Facility',
                        'description' => 'Formal complaint regarding the quality of medical services or staff behavior.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">COMPLAINT</h1><p style="font-size: 14px;"><strong>Subject:</strong> [[complaint_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Head/Director<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>I hereby file a complaint regarding [[complaint_subject]], which occurred at [[medical_facility_name]] (or concerned Doctor [[doctor_full_name]]).</p>
                                <p>Detailed description of the event/problem:</p>
                                <p>[[incident_details]]</p>
                                <p>In connection with the above, I request the following actions: [[requested_action]]</p>
                                <p>Enclosed please find: [[attachments]].</p>
                                <p>Please promptly consider my complaint and inform me of the steps taken.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Скарга на лікаря / медичний заклад',
                        'description' => 'Формальна скарга щодо якості медичних послуг або поведінки персоналу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">СКАРГА</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[complaint_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br>Керівника/Директора<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Цим подаю скаргу щодо [[complaint_subject]], яка мала місце в закладі [[medical_facility_name]] (або стосувалася лікаря [[doctor_full_name]]).</p>
                                <p>Детальний опис події/проблеми:</p>
                                <p>[[incident_details]]</p>
                                <p>У зв\'язку з вищевикладеним, прошу вжити наступних дій: [[requested_action]]</p>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <p>Прошу терміново розглянути мою скаргу та повідомити про вжиті заходи.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Beschwerde über Arzt / medizinische Einrichtung',
                        'description' => 'Formelle Beschwerde bezüglich der Qualität medizinischer Leistungen oder des Verhaltens des Personals.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">BESCHWERDE</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[complaint_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Leiter/Direktor<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p>Hiermit reiche ich Beschwerde ein bezüglich [[complaint_subject]], die in der Einrichtung [[medical_facility_name]] (oder den Arzt [[doctor_full_name]] betreffend) stattgefunden hat.</p>
                                <p>Detaillierte Beschreibung des Ereignisses/Problems:</p>
                                <p>[[incident_details]]</p>
                                <p>Im Zusammenhang damit fordere ich folgende Maßnahmen: [[requested_action]]</p>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <p>Bitte bearbeiten Sie meine Beschwerde umgehend und informieren Sie mich über die ergriffenen Schritte.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Дневник самочувствия (для отслеживания симптомов) / Well-being Diary (for symptom tracking) ---
            [
                'slug' => 'well-being-diary-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"diary_period","type":"text","required":true,"labels":{"pl":"Okres prowadzenia dziennika (np. od-do, miesiąc)","en":"Diary period (e.g., from-to, month)","uk":"Період ведення щоденника (напр., від-до, місяць)","de":"Zeitraum des Tagebuchs (z.B. von-bis, Monat)"}},
                    {"name":"symptoms_to_track","type":"textarea","required":true,"labels":{"pl":"Objawy do monitorowania (np. ból głowy, zmęczenie, nastrój)","en":"Symptoms to monitor (e.g., headache, fatigue, mood)","uk":"Симптоми для моніторингу (напр., головний біль, втома, настрій)","de":"Zu überwachende Symptome (z.B. Kopfschmerzen, Müdigkeit, Stimmung)"}},
                    {"name":"daily_entries_example","type":"textarea","required":false,"labels":{"pl":"Przykładowe wpisy dzienne (data, godzina, objawy, intensywność, uwagi)","en":"Example daily entries (date, time, symptoms, intensity, notes)","uk":"Приклад щоденних записів (дата, час, симптоми, інтенсивність, примітки)","de":"Beispiel für tägliche Einträge (Datum, Uhrzeit, Symptome, Intensität, Anmerkungen)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Dziennik samopoczucia/objawów',
                        'description' => 'Szablon dziennika do monitorowania samopoczucia i objawów zdrowotnych.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK SAMOPOCZUCIA I OBJAWÓW</h1><p style="font-size: 14px;">Pacjent: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Okres: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Data sporządzenia: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
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
                    ],
                    'en' => [
                        'title' => 'Well-being Diary (for symptom tracking)',
                        'description' => 'A diary template for monitoring well-being and health symptoms.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WELL-BEING AND SYMPTOM DIARY</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Period: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Date of Creation: ' . date('F j, Y') . '</p></td></tr></table>',
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
                        'title' => 'Щоденник самопочуття (для відстеження симптомів)',
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
                    'de' => [
                        'title' => 'Wohlbefindenstagebuch (zur Symptomverfolgung)',
                        'description' => 'Eine Tagebuchvorlage zur Überwachung des Wohlbefindens und der Gesundheitssymptome.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHLBEFINDEN- UND SYMPTOMTAGEBUCH</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zeitraum: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Erstellungsdatum: ' . date('d.m.Y') . '</p></td></tr></table>',
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
                    ]
                ]
            ],

            // --- Дневник артериального давления / Blood Pressure Diary ---
            [
                'slug' => 'blood-pressure-diary-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"diary_period","type":"text","required":true,"labels":{"pl":"Okres prowadzenia dziennika (np. od-do, miesiąc)","en":"Diary period (e.g., from-to, month)","uk":"Період ведення щоденника (напр., від-до, місяць)","de":"Zeitraum des Tagebuchs (z.B. von-bis, Monat)"}},
                    {"name":"daily_entries_example","type":"textarea","required":true,"labels":{"pl":"Przykładowe wpisy dzienne (data, godzina, ciśnienie skurczowe, rozkurczowe, tętno, uwagi)","en":"Example daily entries (date, time, systolic, diastolic, pulse, notes)","uk":"Приклад щоденних записів (дата, час, систолічний, діастолічний, пульс, примітки)","de":"Beispiel für tägliche Einträge (Datum, Uhrzeit, systolisch, diastolisch, Puls, Anmerkungen)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Dziennik pomiarów ciśnienia krwi',
                        'description' => 'Szablon dziennika do monitorowania i zapisywania pomiarów ciśnienia krwi.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK POMIARÓW CIŚNIENIA KRWI</h1><p style="font-size: 14px;">Pacjent: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Okres: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Data sporządzenia: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
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
                    ],
                    'en' => [
                        'title' => 'Blood Pressure Diary',
                        'description' => 'A diary template for monitoring and recording blood pressure measurements.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BLOOD PRESSURE DIARY</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Period: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Date of Creation: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Daily Entries:</h2>
                                <pre>
Date | Time | Systolic | Diastolic | Pulse | Notes
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
                    'de' => [
                        'title' => 'Blutdrucktagebuch',
                        'description' => 'Eine Tagebuchvorlage zur Überwachung und Aufzeichnung von Blutdruckmessungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BLUTDRUCK-TAGEBUCH</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zeitraum: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Erstellungsdatum: ' . date('d.m.Y') . '</p></td></tr></table>',
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
                    ]
                ]
            ],

            // --- Дневник головной боли / Headache Diary ---
            [
                'slug' => 'headache-diary-pl',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"patient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pacjenta","en":"Patient\'s Full Name","uk":"ПІБ пацієнта","de":"Vollständiger Name des Patienten"}},
                    {"name":"diary_period","type":"text","required":true,"labels":{"pl":"Okres prowadzenia dziennika (np. od-do, miesiąc)","en":"Diary period (e.g., from-to, month)","uk":"Період ведення щоденника (напр., від-до, місяць)","de":"Zeitraum des Tagebuchs (z.B. von-bis, Monat)"}},
                    {"name":"daily_entries_example","type":"textarea","required":true,"labels":{"pl":"Przykładowe wpisy dzienne (data, godzina, intensywność bólu (1-10), rodzaj bólu, czynniki wyzwalające, leki, uwagi)","en":"Example daily entries (date, time, pain intensity (1-10), type of pain, triggers, medications, notes)","uk":"Приклад щоденних записів (дата, час, інтенсивність болю (1-10), тип болю, тригери, ліки, примітки)","de":"Beispiel für tägliche Einträge (Datum, Uhrzeit, Schmerzintensität (1-10), Art des Schmerzes, Auslöser, Medikamente, Anmerkungen)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Dziennik bólu głowy',
                        'description' => 'Szablon dziennika do monitorowania i zapisywania epizodów bólu głowy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK BÓLU GŁOWY</h1><p style="font-size: 14px;">Pacjent: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Okres: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Data sporządzenia: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
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
                    ],
                    'en' => [
                        'title' => 'Headache Diary',
                        'description' => 'A diary template for monitoring and recording headache episodes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HEADACHE DIARY</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Period: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Date of Creation: ' . date('F j, Y') . '</p></td></tr></table>',
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
                    'de' => [
                        'title' => 'Kopfschmerztagebuch',
                        'description' => 'Eine Tagebuchvorlage zur Überwachung und Aufzeichnung von Kopfschmerzepisoden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KOPFSCHMERZ-TAGEBUCH</h1><p style="font-size: 14px;">Patient: <strong>[[patient_full_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zeitraum: <strong>[[diary_period]]</strong></p></td><td style="text-align: right;"><p>Erstellungsdatum: ' . date('d.m.Y') . '</p></td></tr></table>',
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
