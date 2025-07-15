<?php

namespace Database\Seeders\UA;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Support\Arr;

class UaHealthMedicineSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'medicine-ua')->first();
        if (!$category) {
            $this->command->error('Category with slug "medicine" not found.');
            return;
        }

        $templatesData = [
            // --- 1. Запрос на получение копии медицинской документации ---
            [
                'slug' => 'request-medical-records-ua',
                'fields' => '[
                    {"name":"medical_institution_name","type":"text","required":true,"labels":{"uk":"Назва медичного закладу","en":"Medical Institution Name", "pl":"Nazwa placówki medycznej", "de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_institution_address","type":"text","required":true,"labels":{"uk":"Адреса медичного закладу","en":"Medical Institution Address", "pl":"Adres placówki medycznej", "de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"uk":"Дата народження заявника","en":"Applicant\'s Date of Birth", "pl":"Data urodzenia wnioskodawcy", "de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"uk":"Адреса проживання заявника","en":"Applicant\'s Residence Address", "pl":"Adres zamieszkania wnioskodawcy", "de":"Wohnadresse des Antragstellers"}},
                    {"name":"requested_documents","type":"textarea","required":true,"labels":{"uk":"Перелік необхідних документів (напр., історія хвороби, результати аналізів)","en":"List of Required Documents (e.g., medical history, test results)", "pl":"Lista wymaganych dokumentów (np. historia choroby, wyniki badań)", "de":"Liste der benötigten Dokumente (z.B. Krankengeschichte, Testergebnisse)"}},
                    {"name":"request_reason","type":"textarea","required":false,"labels":{"uk":"Причина запиту (за бажанням)","en":"Reason for Request (optional)", "pl":"Przyczyna zapytania (opcjonalnie)", "de":"Grund der Anfrage (optional)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Запит на отримання копії медичної документації',
                        'description' => 'Офіційний запит до медичного закладу про надання копій медичної документації.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Головному лікарю [[medical_institution_name]]</p>
                                <p style="text-align: right;">[[medical_institution_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">дата народження: [[applicant_dob]]</p>
                                <p style="text-align: right;">адреса: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАПИТ</h1>
                                <p style="text-align: center;">на отримання копії медичної документації</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу надати мені копії наступної медичної документації: [[requested_documents]].</p>
                                [[request_reason]]<p>Запит обумовлений: [[request_reason]].</p>[[/request_reason]]
                                <p>Відповідь прошу надати у встановлений законодавством термін.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Request for Copy of Medical Documentation',
                        'description' => 'Official request to a medical institution for copies of medical documentation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Chief Doctor of [[medical_institution_name]]</p>
                                <p style="text-align: right;">[[medical_institution_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">date of birth: [[applicant_dob]]</p>
                                <p style="text-align: right;">address: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">REQUEST</h1>
                                <p style="text-align: center;">for copy of medical documentation</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly request copies of the following medical documentation: [[requested_documents]].</p>
                                [[request_reason]]<p>The request is due to: [[request_reason]].</p>[[/request_reason]]
                                <p>Please provide a response within the period established by law.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o kopię dokumentacji medycznej',
                        'description' => 'Oficjalny wniosek do placówki medycznej o udostępnienie kopii dokumentacji medycznej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Głównego Lekarza [[medical_institution_name]]</p>
                                <p style="text-align: right;">[[medical_institution_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">data urodzenia: [[applicant_dob]]</p>
                                <p style="text-align: right;">adres: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                                <p style="text-align: center;">o kopię dokumentacji medycznej</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o udostępnienie mi kopii następującej dokumentacji medycznej: [[requested_documents]].</p>
                                [[request_reason]]<p>Wniosek jest spowodowany: [[request_reason]].</p>[[/request_reason]]
                                <p>Proszę o udzielenie odpowiedzi w terminie przewidzianym prawem.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Kopie der medizinischen Dokumentation',
                        'description' => 'Offizieller Antrag an eine medizinische Einrichtung auf Bereitstellung von Kopien der medizinischen Dokumentation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Chefarzt von [[medical_institution_name]]</p>
                                <p style="text-align: right;">[[medical_institution_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">Geburtsdatum: [[applicant_dob]]</p>
                                <p style="text-align: right;">Adresse: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                                <p style="text-align: center;">auf Kopie der medizinischen Dokumentation</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit Kopien der folgenden medizinischen Dokumentation: [[requested_documents]].</p>
                                [[request_reason]]<p>Der Antrag ist begründet durch: [[request_reason]].</p>[[/request_reason]]
                                <p>Bitte antworten Sie innerhalb der gesetzlich festgelegten Frist.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 2. Заявление о прикреплении к поликлинике ---
            [
                'slug' => 'application-polyclinic-attachment-ua',
                'fields' => '[
                    {"name":"polyclinic_name","type":"text","required":true,"labels":{"uk":"Назва поліклініки","en":"Polyclinic Name", "pl":"Nazwa przychodni", "de":"Name der Poliklinik"}},
                    {"name":"polyclinic_address","type":"text","required":true,"labels":{"uk":"Адреса поліклініки","en":"Polyclinic Address", "pl":"Adres przychodni", "de":"Adresse der Poliklinik"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"uk":"Дата народження заявника","en":"Applicant\'s Date of Birth", "pl":"Data urodzenia wnioskodawcy", "de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані заявника","en":"Applicant\'s Passport Details", "pl":"Dane paszportowe wnioskodawcy", "de":"Passdaten des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"uk":"Адреса проживання заявника","en":"Applicant\'s Residence Address", "pl":"Adres zamieszkania wnioskodawcy", "de":"Wohnadresse des Antragstellers"}},
                    {"name":"reason_for_attachment","type":"textarea","required":true,"labels":{"uk":"Причина прикріплення (напр., зміна місця проживання, зручність розташування)","en":"Reason for Attachment (e.g., change of residence, convenient location)", "pl":"Przyczyna przypisania (np. zmiana miejsca zamieszkania, dogodna lokalizacja)", "de":"Grund der Zuweisung (z.B. Wohnsitzwechsel, günstige Lage)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява про прикріплення до поліклініки',
                        'description' => 'Заява про прикріплення до медичного закладу для отримання первинної медичної допомоги.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Головному лікарю [[polyclinic_name]]</p>
                                <p style="text-align: right;">[[polyclinic_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">дата народження: [[applicant_dob]]</p>
                                <p style="text-align: right;">паспорт: [[applicant_passport]]</p>
                                <p style="text-align: right;">адреса: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                                <p style="text-align: center;">про прикріплення до поліклініки</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу прикріпити мене до Вашої поліклініки для отримання первинної медичної допомоги.</p>
                                <p>Причина прикріплення: [[reason_for_attachment]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Polyclinic Attachment',
                        'description' => 'Application for attachment to a medical institution for primary medical care.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Chief Doctor of [[polyclinic_name]]</p>
                                <p style="text-align: right;">[[polyclinic_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">date of birth: [[applicant_dob]]</p>
                                <p style="text-align: right;">passport: [[applicant_passport]]</p>
                                <p style="text-align: right;">address: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                                <p style="text-align: center;">for polyclinic attachment</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly request to attach me to your polyclinic for primary medical care.</p>
                                <p>Reason for attachment: [[reason_for_attachment]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o przypisanie do przychodni',
                        'description' => 'Wniosek o przypisanie do placówki medycznej w celu uzyskania podstawowej opieki medycznej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Głównego Lekarza [[polyclinic_name]]</p>
                                <p style="text-align: right;">[[polyclinic_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">data urodzenia: [[applicant_dob]]</p>
                                <p style="text-align: right;">paszport: [[applicant_passport]]</p>
                                <p style="text-align: right;">adres: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                                <p style="text-align: center;">o przypisanie do przychodni</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o przypisanie mnie do Państwa przychodni w celu uzyskania podstawowej opieki medycznej.</p>
                                <p>Przyczyna przypisania: [[reason_for_attachment]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Zuweisung zu einer Poliklinik',
                        'description' => 'Antrag auf Zuweisung zu einer medizinischen Einrichtung zur primären medizinischen Versorgung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Chefarzt von [[polyclinic_name]]</p>
                                <p style="text-align: right;">[[polyclinic_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">Geburtsdatum: [[applicant_dob]]</p>
                                <p style="text-align: right;">Reisepass: [[applicant_passport]]</p>
                                <p style="text-align: right;">Adresse: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                                <p style="text-align: center;">auf Zuweisung zu einer Poliklinik</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit meine Zuweisung zu Ihrer Poliklinik zur primären medizinischen Versorgung.</p>
                                <p>Grund der Zuweisung: [[reason_for_attachment]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 3. Отказ от медицинского вмешательства ---
            [
                'slug' => 'refusal-medical-intervention-ua',
                'fields' => '[
                    {"name":"medical_institution_name","type":"text","required":true,"labels":{"uk":"Назва медичного закладу","en":"Medical Institution Name", "pl":"Nazwa placówki medycznej", "de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_institution_address","type":"text","required":true,"labels":{"uk":"Адреса медичного закладу","en":"Medical Institution Address", "pl":"Adres placówki medycznej", "de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"patient_name","type":"text","required":true,"labels":{"uk":"ПІБ пацієнта","en":"Patient\'s Full Name", "pl":"Imię i nazwisko pacjenta", "de":"Vollständiger Name des Patienten"}},
                    {"name":"patient_dob","type":"date","required":true,"labels":{"uk":"Дата народження пацієнта","en":"Patient\'s Date of Birth", "pl":"Data urodzenia pacjenta", "de":"Geburtsdatum des Patienten"}},
                    {"name":"patient_address","type":"text","required":true,"labels":{"uk":"Адреса проживання пацієнта","en":"Patient\'s Residence Address", "pl":"Adres zamieszkania pacjenta", "de":"Wohnadresse des Patienten"}},
                    {"name":"medical_procedure_description","type":"textarea","required":true,"labels":{"uk":"Опис медичного втручання, від якого відмовляєтесь","en":"Description of Medical Procedure Being Refused", "pl":"Opis interwencji medycznej, której odmawiasz", "de":"Beschreibung des medizinischen Eingriffs, der abgelehnt wird"}},
                    {"name":"refusal_reason","type":"textarea","required":false,"labels":{"uk":"Причина відмови (за бажанням)","en":"Reason for Refusal (optional)", "pl":"Przyczyna odmowy (opcjonalnie)", "de":"Grund der Ablehnung (optional)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Відмова від медичного втручання',
                        'description' => 'Офіційний документ, що фіксує відмову пацієнта від запропонованого медичного втручання.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Головному лікарю [[medical_institution_name]]</p>
                                <p style="text-align: right;">[[medical_institution_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[patient_name]]</p>
                                <p style="text-align: right;">дата народження: [[patient_dob]]</p>
                                <p style="text-align: right;">адреса: [[patient_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА-ВІДМОВА</h1>
                                <p style="text-align: center;">від медичного втручання</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[patient_name]]</strong>, цим підтверджую свою відмову від медичного втручання: [[medical_procedure_description]].</p>
                                <p>Мені роз\'яснено наслідки відмови від зазначеного медичного втручання.</p>
                                [[refusal_reason]]<p>Причина відмови: [[refusal_reason]].</p>[[/refusal_reason]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[patient_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Refusal of Medical Intervention',
                        'description' => 'Official document recording the patient\'s refusal of proposed medical intervention.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Chief Doctor of [[medical_institution_name]]</p>
                                <p style="text-align: right;">[[medical_institution_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[patient_name]]</p>
                                <p style="text-align: right;">date of birth: [[patient_dob]]</p>
                                <p style="text-align: right;">address: [[patient_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">STATEMENT OF REFUSAL</h1>
                                <p style="text-align: center;">of medical intervention</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[patient_name]]</strong>, hereby confirm my refusal of medical intervention: [[medical_procedure_description]].</p>
                                <p>I have been informed about the consequences of refusing the said medical intervention.</p>
                                [[refusal_reason]]<p>Reason for refusal: [[refusal_reason]].</p>[[/refusal_reason]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px;">
                                <p>Signature: ___________________ ([[patient_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Odmowa interwencji medycznej',
                        'description' => 'Oficjalny dokument rejestrujący odmowę pacjenta na proponowaną interwencję medyczną.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Głównego Lekarza [[medical_institution_name]]</p>
                                <p style="text-align: right;">[[medical_institution_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[patient_name]]</p>
                                <p style="text-align: right;">data urodzenia: [[patient_dob]]</p>
                                <p style="text-align: right;">adres: [[patient_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">OŚWIADCZENIE O ODMOWIE</h1>
                                <p style="text-align: center;">interwencji medycznej</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[patient_name]]</strong>, niniejszym potwierdzam moją odmowę interwencji medycznej: [[medical_procedure_description]].</p>
                                <p>Zostałem(am) poinformowany(a) o konsekwencjach odmowy wskazanej interwencji medycznej.</p>
                                [[refusal_reason]]<p>Przyczyna odmowy: [[refusal_reason]].</p>[[/refusal_reason]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[patient_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Ablehnung medizinischer Maßnahmen',
                        'description' => 'Offizielles Dokument, das die Ablehnung des Patienten gegenüber einem vorgeschlagenen medizinischen Eingriff festhält.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Chefarzt von [[medical_institution_name]]</p>
                                <p style="text-align: right;">[[medical_institution_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[patient_name]]</p>
                                <p style="text-align: right;">Geburtsdatum: [[patient_dob]]</p>
                                <p style="text-align: right;">Adresse: [[patient_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ERKLÄRUNG DER ABLEHNUNG</h1>
                                <p style="text-align: center;">medizinischer Maßnahmen</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[patient_name]]</strong>, bestätige hiermit meine Ablehnung des medizinischen Eingriffs: [[medical_procedure_description]].</p>
                                <p>Mir wurden die Folgen der Ablehnung des genannten medizinischen Eingriffs erläutert.</p>
                                [[refusal_reason]]<p>Grund der Ablehnung: [[refusal_reason]].</p>[[/refusal_reason]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[patient_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 4. Согласие на обработку персональных данных (медицинское) ---
            [
                'slug' => 'consent-medical-data-processing-ua',
                'fields' => '[
                    {"name":"medical_institution_name","type":"text","required":true,"labels":{"uk":"Назва медичного закладу","en":"Medical Institution Name", "pl":"Nazwa placówki medycznej", "de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_institution_address","type":"text","required":true,"labels":{"uk":"Адреса медичного закладу","en":"Medical Institution Address", "pl":"Adres placówki medycznej", "de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"patient_name","type":"text","required":true,"labels":{"uk":"ПІБ пацієнта","en":"Patient\'s Full Name", "pl":"Imię i nazwisko pacjenta", "de":"Vollständiger Name des Patienten"}},
                    {"name":"patient_dob","type":"date","required":true,"labels":{"uk":"Дата народження пацієнта","en":"Patient\'s Date of Birth", "pl":"Data urodzenia pacjenta", "de":"Geburtsdatum des Patienten"}},
                    {"name":"patient_address","type":"text","required":true,"labels":{"uk":"Адреса проживання пацієнта","en":"Patient\'s Residence Address", "pl":"Adres zamieszkania pacjenta", "de":"Wohnadresse des Patienten"}},
                    {"name":"data_purpose","type":"textarea","required":true,"labels":{"uk":"Мета обробки даних (напр., для надання медичних послуг, ведення обліку)","en":"Purpose of Data Processing (e.g., for providing medical services, record keeping)", "pl":"Cel przetwarzania danych (np. świadczenie usług medycznych, prowadzenie ewidencji)", "de":"Zweck der Datenverarbeitung (z.B. Erbringung medizinischer Leistungen, Aktenführung)"}},
                    {"name":"data_scope","type":"textarea","required":true,"labels":{"uk":"Обсяг даних, що обробляються (напр., ПІБ, адреса, історія хвороби)","en":"Scope of Data Processed (e.g., Full Name, address, medical history)", "pl":"Zakres przetwarzanych danych (np. Imię i Nazwisko, adres, historia choroby)", "de":"Umfang der verarbeiteten Daten (z.B. Name, Adresse, Krankengeschichte)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Згода на обробку персональних даних (медичне)',
                        'description' => 'Офіційний документ, що підтверджує згоду пацієнта на обробку його персональних даних медичним закладом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗГОДА</h1><p style="font-size: 14px;">на обробку персональних даних</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[medical_institution_name]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[patient_name]]</strong>, дата народження: [[patient_dob]], проживаю за адресою: [[patient_address]], цим надаю свою згоду на обробку моїх персональних даних медичним закладом [[medical_institution_name]], розташованим за адресою: [[medical_institution_address]].</p>
                                <p>Мета обробки даних: [[data_purpose]].</p>
                                <p>Обсяг даних, що обробляються: [[data_scope]].</p>
                                <p>Я ознайомлений(а) зі своїми правами щодо захисту персональних даних.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис: ___________________ ([[patient_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Consent to Personal Data Processing (Medical)',
                        'description' => 'Official document confirming the patient\'s consent to the processing of their personal data by a medical institution.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CONSENT</h1><p style="font-size: 14px;">to personal data processing</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[medical_institution_name]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[patient_name]]</strong>, date of birth: [[patient_dob]], residing at: [[patient_address]], hereby give my consent to the processing of my personal data by the medical institution [[medical_institution_name]], located at: [[medical_institution_address]].</p>
                                <p>Purpose of data processing: [[data_purpose]].</p>
                                <p>Scope of data processed: [[data_scope]].</p>
                                <p>I have been informed of my rights regarding personal data protection.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[patient_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zgoda na przetwarzanie danych osobowych (medyczne)',
                        'description' => 'Oficjalny dokument potwierdzający zgodę pacjenta na przetwarzanie jego danych osobowych przez placówkę medyczną.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZGODA</h1><p style="font-size: 14px;">na przetwarzanie danych osobowych</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[medical_institution_name]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[patient_name]]</strong>, data urodzenia: [[patient_dob]], zamieszkały(a) pod adresem: [[patient_address]], niniejszym wyrażam zgodę na przetwarzanie moich danych osobowych przez placówkę medyczną [[medical_institution_name]], położoną pod adresem: [[medical_institution_address]].</p>
                                <p>Cel przetwarzania danych: [[data_purpose]].</p>
                                <p>Zakres przetwarzanych danych: [[data_scope]].</p>
                                <p>Zostałem(am) poinformowany(a) o moich prawach dotyczących ochrony danych osobowych.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[patient_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Einwilligung zur Verarbeitung personenbezogener Daten (medizinisch)',
                        'description' => 'Offizielles Dokument, das die Zustimmung des Patienten zur Verarbeitung seiner personenbezogenen Daten durch eine medizinische Einrichtung bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EINWILLIGUNG</h1><p style="font-size: 14px;">zur Verarbeitung personenbezogener Daten</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>[[medical_institution_name]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[patient_name]]</strong>, Geburtsdatum: [[patient_dob]], wohnhaft unter der Adresse: [[patient_address]], erteile hiermit meine Zustimmung zur Verarbeitung meiner personenbezogenen Daten durch die medizinische Einrichtung [[medical_institution_name]], ansässig unter der Adresse: [[medical_institution_address]].</p>
                                <p>Zweck der Datenverarbeitung: [[data_purpose]].</p>
                                <p>Umfang der verarbeiteten Daten: [[data_scope]].</p>
                                <p>Ich wurde über meine Rechte bezüglich des Schutzes personenbezogener Daten informiert.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[patient_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 5. Жалоба на врача / медицинское учреждение ---
            [
                'slug' => 'complaint-doctor-medical-institution-ua',
                'fields' => '[
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"Кому (ПІБ керівника або назва установи)","en":"To (Head\'s Full Name or Institution Name)", "pl":"Do (Imię i nazwisko kierownika lub nazwa instytucji)", "de":"An (Name des Leiters oder der Institution)"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса отримувача","en":"Recipient Address", "pl":"Adres odbiorcy", "de":"Adresse des Empfängers"}},
                    {"name":"complainant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Complainant\'s Full Name", "pl":"Imię i nazwisko skarżącego", "de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"uk":"Адреса заявника","en":"Complainant\'s Address", "pl":"Adres skarżącego", "de":"Adresse des Beschwerdeführers"}},
                    {"name":"complainant_phone","type":"text","required":false,"labels":{"uk":"Телефон заявника","en":"Complainant\'s Phone", "pl":"Telefon skarżącego", "de":"Telefon des Beschwerdeführers"}},
                    {"name":"complainant_email","type":"email","required":false,"labels":{"uk":"Email заявника","en":"Complainant\'s Email", "pl":"E-mail skarżącego", "de":"E-Mail des Beschwerdeführers"}},
                    {"name":"doctor_name","type":"text","required":false,"labels":{"uk":"ПІБ лікаря (якщо скарга на лікаря)","en":"Doctor\'s Full Name (if complaining about a doctor)", "pl":"Imię i nazwisko lekarza (jeśli skarga dotyczy lekarza)", "de":"Vollständiger Name des Arztes (falls Beschwerde über Arzt)"}},
                    {"name":"medical_institution_involved","type":"text","required":true,"labels":{"uk":"Назва медичного закладу, де стався інцидент","en":"Name of Medical Institution Involved", "pl":"Nazwa placówki medycznej, w której doszło do incydentu", "de":"Name der beteiligten medizinischen Einrichtung"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"uk":"Дата інциденту","en":"Incident Date", "pl":"Data incydentu", "de":"Datum des Vorfalls"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"uk":"Детальний опис інциденту/порушення","en":"Detailed Description of Incident/Violation", "pl":"Szczegółowy opis incydentu/naruszenia", "de":"Detaillierte Beschreibung des Vorfalls/Verstoßes"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Вимоги (напр., провести перевірку, притягнути до відповідальності, відшкодувати збитки)","en":"Demands (e.g., conduct inspection, bring to justice, compensate damages)", "pl":"Żądania (np. przeprowadzenie kontroli, pociągnięcie do odpowiedzialności, zrekompensowanie szkód)", "de":"Forderungen (Prüfung durchführen, zur Rechenschaft ziehen, Schadensersatz)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"uk":"Додатки (копії медичних документів, чеків)","en":"Attachments (copies of medical documents, receipts)", "pl":"Załączniki (kopie dokumentów medycznych, paragonów)", "de":"Anhänge (Kopien von medizinischen Dokumenten, Quittungen)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Жалоба на лікаря / медичний заклад',
                        'description' => 'Офіційна скарга на дії лікаря або медичного закладу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Кому: [[recipient_name]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[complainant_name]]</p>
                                <p style="text-align: right;">[[complainant_address]]</p>
                                <p style="text-align: right;">Телефон: [[complainant_phone]]</p>
                                <p style="text-align: right;">Email: [[complainant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">СКАРГА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Повідомляю про інцидент/порушення, що стався [[incident_date]] року в [[medical_institution_involved]] [[doctor_name]] за участю лікаря [[doctor_name]][[/doctor_name]].</p>
                                <p>Детальний опис: [[incident_description]].</p>
                                <p>На підставі вищевикладеного, вимагаю: [[demands]].</p>
                                [[attachments]]<p>Додатки: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Complaint about Doctor / Medical Institution',
                        'description' => 'Official complaint about the actions of a doctor or medical institution.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To: [[recipient_name]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[complainant_name]]</p>
                                <p style="text-align: right;">[[complainant_address]]</p>
                                <p style="text-align: right;">Phone: [[complainant_phone]]</p>
                                <p style="text-align: right;">Email: [[complainant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">COMPLAINT</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby report an incident/violation that occurred on [[incident_date]] at [[medical_institution_involved]] [[doctor_name]] involving doctor [[doctor_name]][[/doctor_name]].</p>
                                <p>Detailed description: [[incident_description]].</p>
                                <p>Based on the above, I demand: [[demands]].</p>
                                [[attachments]]<p>Attachments: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px;">
                                <p>Signature: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Skarga na lekarza / placówkę medyczną',
                        'description' => 'Oficjalna skarga na działania lekarza lub placówki medycznej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do: [[recipient_name]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[complainant_name]]</p>
                                <p style="text-align: right;">[[complainant_address]]</p>
                                <p style="text-align: right;">Telefon: [[complainant_phone]]</p>
                                <p style="text-align: right;">E-mail: [[complainant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">SKARGA</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zgłaszam incydent/naruszenie, które miało miejsce w dniu [[incident_date]] w [[medical_institution_involved]] [[doctor_name]] z udziałem lekarza [[doctor_name]][[/doctor_name]].</p>
                                <p>Szczegółowy opis: [[incident_description]].</p>
                                <p>Na podstawie powyższego, żądam: [[demands]].</p>
                                [[attachments]]<p>Załączniki: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Beschwerde über Arzt / medizinische Einrichtung',
                        'description' => 'Offizielle Beschwerde über die Handlungen eines Arztes oder einer medizinischen Einrichtung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An: [[recipient_name]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[complainant_name]]</p>
                                <p style="text-align: right;">[[complainant_address]]</p>
                                <p style="text-align: right;">Telefon: [[complainant_phone]]</p>
                                <p style="text-align: right;">E-Mail: [[complainant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">BESCHWERDE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich melde hiermit einen Vorfall/Verstoß, der sich am [[incident_date]] in [[medical_institution_involved]] [[doctor_name]] unter Beteiligung des Arztes [[doctor_name]][[/doctor_name]] ereignet hat.</p>
                                <p>Detaillierte Beschreibung: [[incident_description]].</p>
                                <p>Aufgrund des oben Gesagten fordere ich: [[demands]].</p>
                                [[attachments]]<p>Anhänge: [[attachments]].</p>[[/attachments]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 6. Дневник самочувствия (для отслеживания симптомов) ---
            [
                'slug' => 'wellbeing-diary-ua',
                'fields' => '[
                    {"name":"patient_name","type":"text","required":true,"labels":{"uk":"ПІБ пацієнта","en":"Patient\'s Full Name", "pl":"Imię i nazwisko pacjenta", "de":"Vollständiger Name des Patienten"}},
                    {"name":"period_start_date","type":"date","required":true,"labels":{"uk":"Початок періоду","en":"Period Start Date", "pl":"Początek okresu", "de":"Beginn des Zeitraums"}},
                    {"name":"period_end_date","type":"date","required":true,"labels":{"uk":"Кінець періоду","en":"Period End Date", "pl":"Koniec okresu", "de":"Ende des Zeitraums"}},
                    {"name":"symptoms_description","type":"textarea","required":true,"labels":{"uk":"Опис симптомів та самопочуття по днях","en":"Description of Symptoms and Well-being by Day", "pl":"Opis objawów i samopoczucia według dni", "de":"Beschreibung der Symptome und des Wohlbefindens pro Tag"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Щоденник самопочуття',
                        'description' => 'Документ для щоденного відстеження симптомів та загального самопочуття.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЩОДЕННИК САМОПОЧУТТЯ</h1><p>Пацієнт: <strong>[[patient_name]]</strong></p><p>Період: з [[period_start_date]] по [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>[[symptoms_description]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Well-being Diary',
                        'description' => 'Document for daily tracking of symptoms and general well-being.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WELL-BEING DIARY</h1><p>Patient: <strong>[[patient_name]]</strong></p><p>Period: from [[period_start_date]] to [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>[[symptoms_description]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Dziennik samopoczucia',
                        'description' => 'Dokument do codziennego śledzenia objawów i ogólnego samopoczucia.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK SAMOPOCZUCIA</h1><p>Pacjent: <strong>[[patient_name]]</strong></p><p>Okres: od [[period_start_date]] do [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>[[symptoms_description]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Wohlbefindenstagebuch',
                        'description' => 'Dokument zur täglichen Verfolgung von Symptomen und des allgemeinen Wohlbefindens.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WOHLBEFINDENSTAGEBUCH</h1><p>Patient: <strong>[[patient_name]]</strong></p><p>Zeitraum: vom [[period_start_date]] bis [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>[[symptoms_description]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 7. Дневник артериального давления ---
            [
                'slug' => 'blood-pressure-diary-ua',
                'fields' => '[
                    {"name":"patient_name","type":"text","required":true,"labels":{"uk":"ПІБ пацієнта","en":"Patient\'s Full Name", "pl":"Imię i nazwisko pacjenta", "de":"Vollständiger Name des Patienten"}},
                    {"name":"period_start_date","type":"date","required":true,"labels":{"uk":"Початок періоду","en":"Period Start Date", "pl":"Początek okresu", "de":"Beginn des Zeitraums"}},
                    {"name":"period_end_date","type":"date","required":true,"labels":{"uk":"Кінець періоду","en":"Period End Date", "pl":"Koniec okresu", "de":"Ende des Zeitraums"}},
                    {"name":"measurements_list","type":"textarea","required":true,"labels":{"uk":"Перелік вимірювань (Дата, Час, Систолічний, Діастолічний, Пульс)","en":"List of Measurements (Date, Time, Systolic, Diastolic, Pulse)", "pl":"Lista pomiarów (Data, Godzina, Skurczowe, Rozkurczowe, Tętno)", "de":"Liste der Messungen (Datum, Uhrzeit, Systolisch, Diastolisch, Puls)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Щоденник артеріального тиску',
                        'description' => 'Документ для щоденного відстеження показників артеріального тиску та пульсу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЩОДЕННИК АРТЕРІАЛЬНОГО ТИСКУ</h1><p>Пацієнт: <strong>[[patient_name]]</strong></p><p>Період: з [[period_start_date]] по [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Дата</th>
                                            <th>Час</th>
                                            <th>Систолічний (мм рт.ст.)</th>
                                            <th>Діастолічний (мм рт.ст.)</th>
                                            <th>Пульс (уд/хв)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>01.07.2025</td><td>08:00</td><td>120</td><td>80</td><td>70</td></tr> -->
                                        [[measurements_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Blood Pressure Diary',
                        'description' => 'Document for daily tracking of blood pressure and pulse readings.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BLOOD PRESSURE DIARY</h1><p>Patient: <strong>[[patient_name]]</strong></p><p>Period: from [[period_start_date]] to [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Systolic (mmHg)</th>
                                            <th>Diastolic (mmHg)</th>
                                            <th>Pulse (bpm)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>01.07.2025</td><td>08:00</td><td>120</td><td>80</td><td>70</td></tr> -->
                                        [[measurements_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Dziennik ciśnienia krwi',
                        'description' => 'Dokument do codziennego śledzenia wskaźników ciśnienia krwi i tętna.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK CIŚNIENIA KRWI</h1><p>Pacjent: <strong>[[patient_name]]</strong></p><p>Okres: od [[period_start_date]] do [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Godzina</th>
                                            <th>Skurczowe (mmHg)</th>
                                            <th>Rozkurczowe (mmHg)</th>
                                            <th>Tętno (uderzeń/min)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>01.07.2025</td><td>08:00</td><td>120</td><td>80</td><td>70</td></tr> -->
                                        [[measurements_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Blutdrucktagebuch',
                        'description' => 'Dokument zur täglichen Verfolgung von Blutdruck- und Pulswerten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BLUTDRUCK-TAGEBUCH</h1><p>Patient: <strong>[[patient_name]]</strong></p><p>Zeitraum: vom [[period_start_date]] bis [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Datum</th>
                                            <th>Uhrzeit</th>
                                            <th>Systolisch (mmHg)</th>
                                            <th>Diastolisch (mmHg)</th>
                                            <th>Puls (Schläge/Min)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>01.07.2025</td><td>08:00</td><td>120</td><td>80</td><td>70</td></tr> -->
                                        [[measurements_list]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-size: 12px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 8. Дневник головной боли ---
            [
                'slug' => 'headache-diary-ua',
                'fields' => '[
                    {"name":"patient_name","type":"text","required":true,"labels":{"uk":"ПІБ пацієнта","en":"Patient\'s Full Name", "pl":"Imię i nazwisko pacjenta", "de":"Vollständiger Name des Patienten"}},
                    {"name":"period_start_date","type":"date","required":true,"labels":{"uk":"Початок періоду","en":"Period Start Date", "pl":"Początek okresu", "de":"Beginn des Zeitraums"}},
                    {"name":"period_end_date","type":"date","required":true,"labels":{"uk":"Кінець періоду","en":"Period End Date", "pl":"Koniec okresu", "de":"Ende des Zeitraums"}},
                    {"name":"headache_entries","type":"textarea","required":true,"labels":{"uk":"Записи про головний біль (Дата, Час, Інтенсивність (1-10), Тривалість, Супутні симптоми, Прийняті ліки)","en":"Headache Entries (Date, Time, Intensity (1-10), Duration, Associated Symptoms, Medications Taken)", "pl":"Zapisy dotyczące bólu głowy (Data, Godzina, Intensywność (1-10), Czas trwania, Objawy towarzyszące, Przyjęte leki)", "de":"Kopfschmerzeinträge (Datum, Uhrzeit, Intensität (1-10), Dauer, Begleitsymptome, eingenommene Medikamente)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Щоденник головного болю',
                        'description' => 'Документ для відстеження епізодів головного болю, їх інтенсивності та супутніх факторів.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЩОДЕННИК ГОЛОВНОГО БОЛЮ</h1><p>Пацієнт: <strong>[[patient_name]]</strong></p><p>Період: з [[period_start_date]] по [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Дата</th>
                                            <th>Час</th>
                                            <th>Інтенсивність (1-10)</th>
                                            <th>Тривалість</th>
                                            <th>Супутні симптоми</th>
                                            <th>Прийняті ліки</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>01.07.2025</td><td>14:30</td><td>7</td><td>2 год</td><td>Нудота</td><td>Ібупрофен</td></tr> -->
                                        [[headache_entries]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Headache Diary',
                        'description' => 'Document for tracking headache episodes, their intensity, and associated factors.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HEADACHE DIARY</h1><p>Patient: <strong>[[patient_name]]</strong></p><p>Period: from [[period_start_date]] to [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Intensity (1-10)</th>
                                            <th>Duration</th>
                                            <th>Associated Symptoms</th>
                                            <th>Medications Taken</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>01.07.2025</td><td>14:30</td><td>7</td><td>2 hrs</td><td>Nausea</td><td>Ibuprofen</td></tr> -->
                                        [[headache_entries]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Dziennik bólu głowy',
                        'description' => 'Dokument do śledzenia epizodów bólu głowy, ich intensywności i czynników towarzyszących.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DZIENNIK BÓLU GŁOWY</h1><p>Pacjent: <strong>[[patient_name]]</strong></p><p>Okres: od [[period_start_date]] do [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Godzina</th>
                                            <th>Intensywność (1-10)</th>
                                            <th>Czas trwania</th>
                                            <th>Objawy towarzyszące</th>
                                            <th>Przyjęte leki</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>01.07.2025</td><td>14:30</td><td>7</td><td>2 godz.</td><td>Nudności</td><td>Ibuprofen</td></tr> -->
                                        [[headache_entries]]
                                    </tbody>
                                </table>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: center;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Kopfschmerztagebuch',
                        'description' => 'Dokument zur Verfolgung von Kopfschmerzepisoden, deren Intensität und begleitenden Faktoren.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KOPFSCHMERZ-TAGEBUCH</h1><p>Patient: <strong>[[patient_name]]</strong></p><p>Zeitraum: vom [[period_start_date]] bis [[period_end_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Datum</th>
                                            <th>Uhrzeit</th>
                                            <th>Intensität (1-10)</th>
                                            <th>Dauer</th>
                                            <th>Begleitsymptome</th>
                                            <th>Eingenommene Medikamente</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>01.07.2025</td><td>14:30</td><td>7</td><td>2 Std.</td><td>Übelkeit</td><td>Ibuprofen</td></tr> -->
                                        [[headache_entries]]
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
