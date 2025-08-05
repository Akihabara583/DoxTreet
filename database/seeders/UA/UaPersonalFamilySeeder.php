<?php

namespace Database\Seeders\UA;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Support\Arr;

class UaPersonalFamilySeeder extends Seeder
{

        // Находим или создаем категорию "Личные и семейные документы"
        // Используем firstOrNew, чтобы сначала найти, а затем установить переводы,
        // и только потом сохранить или обновить.
        public function run(): void
    {
        $category = Category::where('slug', 'personal-family-ua')->first();
        if (!$category) {
            $this->command->error('Category with slug "personal-family" not found.');
            return;
        }


        $templatesData = [
            // --- 1. Запрос на получение публичной информации ---
            [
                'slug' => 'request-public-info-ua',
                'fields' => '[
                    {"name":"recipient_organization","type":"text","required":true,"labels":{"uk":"Назва установи, до якої звертаєтесь","en":"Name of the institution you are contacting", "pl":"Nazwa instytucji, do której się zwracasz", "de":"Name der anzuschreibenden Institution"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса установи","en":"Institution address", "pl":"Adres instytucji", "de":"Adresse der Institution"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"uk":"Адреса заявника","en":"Applicant\'s address", "pl":"Adres wnioskodawcy", "de":"Adresse des Antragstellers"}},
                    {"name":"applicant_phone","type":"text","required":false,"labels":{"uk":"Телефон заявника","en":"Applicant\'s phone", "pl":"Telefon wnioskodawcy", "de":"Telefon des Antragstellers"}},
                    {"name":"applicant_email","type":"email","required":false,"labels":{"uk":"Email заявника","en":"Applicant\'s email", "pl":"E-mail wnioskodawcy", "de":"E-Mail des Antragstellers"}},
                    {"name":"info_description","type":"textarea","required":true,"labels":{"uk":"Опис інформації, яку запитуєте","en":"Description of the information you are requesting", "pl":"Opis informacji, o którą wnioskujesz", "de":"Beschreibung der angeforderten Informationen"}},
                    {"name":"delivery_method","type":"text","required":true,"labels":{"uk":"Спосіб отримання відповіді (напр., поштою, на email)","en":"Method of receiving response (e.g., by mail, by email)", "pl":"Sposób otrzymania odpowiedzi (np. pocztą, e-mailem)", "de":"Methode des Empfangs der Antwort (z.B. per Post, per E-Mail)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Запит на отримання публічної інформації',
                        'description' => 'Офіційний запит до державних органів або установ про надання публічної інформації.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">[[applicant_address]]</p>
                                <p style="text-align: right;">[[applicant_phone]] [[applicant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАПИТ</h1>
                                <p style="text-align: center;">на отримання публічної інформації</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Відповідно до Закону України "Про доступ до публічної інформації", прошу надати наступну публічну інформацію:</p>
                                <p>[[info_description]]</p>
                                <p>Прошу надати відповідь у спосіб: [[delivery_method]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Request for Public Information',
                        'description' => 'Official request to state bodies or institutions for public information.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">[[applicant_address]]</p>
                                <p style="text-align: right;">[[applicant_phone]] [[applicant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">REQUEST</h1>
                                <p style="text-align: center;">for public information</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>In accordance with the Law of Ukraine "On Access to Public Information", I request the following public information:</p>
                                <p>[[info_description]]</p>
                                <p>Please provide the response by: [[delivery_method]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o udostępnienie informacji publicznej',
                        'description' => 'Oficjalny wniosek do organów państwowych lub instytucji o udostępnienie informacji publicznej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">[[applicant_address]]</p>
                                <p style="text-align: right;">[[applicant_phone]] [[applicant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                                <p style="text-align: center;">o udostępnienie informacji publicznej</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zgodnie z Ustawą Ukrainy "O dostępie do informacji publicznej", proszę o udostępnienie następującej informacji publicznej:</p>
                                <p>[[info_description]]</p>
                                <p>Proszę o udzielenie odpowiedzi w sposób: [[delivery_method]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Zugang zu öffentlichen Informationen',
                        'description' => 'Offizieller Antrag an staatliche Behörden oder Institutionen auf Bereitstellung öffentlicher Informationen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">[[applicant_address]]</p>
                                <p style="text-align: right;">[[applicant_phone]] [[applicant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                                <p style="text-align: center;">auf Zugang zu öffentlichen Informationen</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Gemäß dem Gesetz der Ukraine "Über den Zugang zu öffentlichen Informationen" beantrage ich hiermit die Bereitstellung der folgenden öffentlichen Informationen:</p>
                                <p>[[info_description]]</p>
                                <p>Bitte senden Sie die Antwort auf folgende Weise: [[delivery_method]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 2. Жалоба на бездействие должностного лица ---
            [
                'slug' => 'complaint-inaction-official-ua',
                'fields' => '[
                    {"name":"recipient_position","type":"text","required":true,"labels":{"uk":"Посада керівника, до якого звертаєтесь","en":"Position of the head you are addressing", "pl":"Stanowisko kierownika, do którego się zwracasz", "de":"Position des Leiters, an den Sie sich wenden"}},
                    {"name":"recipient_organization","type":"text","required":true,"labels":{"uk":"Назва установи","en":"Institution name", "pl":"Nazwa instytucji", "de":"Name der Institution"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса установи","en":"Institution address", "pl":"Adres instytucji", "de":"Adresse der Institution"}},
                    {"name":"complainant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Complainant\'s Full Name", "pl":"Imię i nazwisko skarżącego", "de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"uk":"Адреса заявника","en":"Complainant\'s address", "pl":"Adres skarżącego", "de":"Adresse des Beschwerdeführers"}},
                    {"name":"complainant_phone","type":"text","required":false,"labels":{"uk":"Телефон заявника","en":"Complainant\'s phone", "pl":"Telefon skarżącego", "de":"Telefon des Beschwerdeführers"}},
                    {"name":"complainant_email","type":"email","required":false,"labels":{"uk":"Email заявника","en":"Complainant\'s email", "pl":"E-mail skarżącego", "de":"E-Mail des Beschwerdeführers"}},
                    {"name":"official_name","type":"text","required":true,"labels":{"uk":"ПІБ посадової особи, на яку скаржитесь","en":"Full Name of the official you are complaining about", "pl":"Imię i nazwisko urzędnika, na którego składasz skargę", "de":"Vollständiger Name des Beamten, über den Sie sich beschweren"}},
                    {"name":"official_position","type":"text","required":true,"labels":{"uk":"Посада посадової особи","en":"Official\'s position", "pl":"Stanowisko urzędnika", "de":"Position des Beamten"}},
                    {"name":"inaction_description","type":"textarea","required":true,"labels":{"uk":"Опис бездіяльності та її наслідків","en":"Description of inaction and its consequences", "pl":"Opis bezczynności i jej konsekwencji", "de":"Beschreibung der Untätigkeit und ihrer Folgen"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Ваші вимоги (напр., притягнути до відповідальності, зобов\'язати вчинити дії)","en":"Your demands (e.g., bring to justice, oblige to act)", "pl":"Twoje żądania (np. pociągnąć do odpowiedzialności, zobowiązać do działania)", "de":"Ihre Forderungen (z.B. zur Rechenschaft ziehen, zum Handeln verpflichten)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Жалоба на бездіяльність посадової особи',
                        'description' => 'Офіційна скарга на бездіяльність або неналежне виконання обов\'язків посадовою особою.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Керівнику [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_position]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[complainant_name]]</p>
                                <p style="text-align: right;">[[complainant_address]]</p>
                                <p style="text-align: right;">[[complainant_phone]] [[complainant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">СКАРГА</h1>
                                <p style="text-align: center;">на бездіяльність посадової особи</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, [[complainant_name]], звертаюся зі скаргою на бездіяльність посадової особи [[official_name]], яка обіймає посаду [[official_position]].</p>
                                <p>Суть бездіяльності: [[inaction_description]]</p>
                                <p>На підставі вищевикладеного, прошу: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Complaint about Inaction of an Official',
                        'description' => 'Official complaint about inaction or improper performance of duties by an official.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Head of [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_position]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[complainant_name]]</p>
                                <p style="text-align: right;">[[complainant_address]]</p>
                                <p style="text-align: right;">[[complainant_phone]] [[complainant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">COMPLAINT</h1>
                                <p style="text-align: center;">about inaction of an official</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, [[complainant_name]], hereby file a complaint regarding the inaction of the official [[official_name]], holding the position of [[official_position]].</p>
                                <p>Details of inaction: [[inaction_description]]</p>
                                <p>Based on the above, I request: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Skarga na bezczynność urzędnika',
                        'description' => 'Oficjalna skarga na bezczynność lub niewłaściwe wykonywanie obowiązków przez urzędnika.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Kierownika [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_position]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[complainant_name]]</p>
                                <p style="text-align: right;">[[complainant_address]]</p>
                                <p style="text-align: right;">[[complainant_phone]] [[complainant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">SKARGA</h1>
                                <p style="text-align: center;">na bezczynność urzędnika</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, [[complainant_name]], składam skargę na bezczynność urzędnika [[official_name]], zajmującego stanowisko [[official_position]].</p>
                                <p>Istota bezczynności: [[inaction_description]]</p>
                                <p>Na podstawie powyższego, proszę: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Beschwerde über Untätigkeit eines Beamten',
                        'description' => 'Offizielle Beschwerde über Untätigkeit oder unsachgemäße Pflichterfüllung eines Beamten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Leiter von [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_position]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[complainant_name]]</p>
                                <p style="text-align: right;">[[complainant_address]]</p>
                                <p style="text-align: right;">[[complainant_phone]] [[complainant_email]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">BESCHWERDE</h1>
                                <p style="text-align: center;">über Untätigkeit eines Beamten</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, [[complainant_name]], reiche hiermit Beschwerde gegen die Untätigkeit des Beamten [[official_name]], der die Position [[official_position]] innehat, ein.</p>
                                <p>Wesentlicher Inhalt der Untätigkeit: [[inaction_description]]</p>
                                <p>Aufgrund des oben Gesagten fordere ich: [[demands]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[complainant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 3. Заявление на получение справки о несудимости ---
            [
                'slug' => 'application-no-criminal-record-ua',
                'fields' => '[
                    {"name":"recipient_organization","type":"text","required":true,"labels":{"uk":"Назва органу, до якого звертаєтесь (напр., МВС України)","en":"Name of the authority you are contacting (e.g., Ministry of Internal Affairs of Ukraine)", "pl":"Nazwa organu, do którego się zwracasz (np. MSW Ukrainy)", "de":"Name der Behörde, an die Sie sich wenden (z.B. Innenministerium der Ukraine)"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса органу","en":"Authority address", "pl":"Adres organu", "de":"Adresse der Behörde"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"uk":"Дата народження заявника","en":"Applicant\'s Date of Birth", "pl":"Data urodzenia wnioskodawcy", "de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані заявника","en":"Applicant\'s Passport Details", "pl":"Dane paszportowe wnioskodawcy", "de":"Passdaten des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"uk":"Адреса реєстрації заявника","en":"Applicant\'s Registered Address", "pl":"Adres zameldowania wnioskodawcy", "de":"Meldeadresse des Antragstellers"}},
                    {"name":"purpose_of_certificate","type":"textarea","required":true,"labels":{"uk":"Мета отримання довідки (напр., для працевлаштування, для отримання візи)","en":"Purpose of obtaining certificate (e.g., for employment, for visa application)", "pl":"Cel uzyskania zaświadczenia (np. do zatrudnienia, do wniosku wizowego)", "de":"Zweck der Bescheinigung (z.B. für Beschäftigung, für Visumantrag)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на отримання довідки про несудимість',
                        'description' => 'Заява про видачу довідки про відсутність судимості.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">дата народження: [[applicant_dob]]</p>
                                <p style="text-align: right;">паспорт: [[applicant_passport]]</p>
                                <p style="text-align: right;">адреса: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу видати мені довідку про відсутність судимості для [[purpose_of_certificate]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for a Certificate of No Criminal Record',
                        'description' => 'Application for issuing a certificate of no criminal record.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">date of birth: [[applicant_dob]]</p>
                                <p style="text-align: right;">passport: [[applicant_passport]]</p>
                                <p style="text-align: right;">address: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to issue me a certificate of no criminal record for [[purpose_of_certificate]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o wydanie zaświadczenia o niekaralności',
                        'description' => 'Wniosek o wydanie zaświadczenia o niekaralności.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">data urodzenia: [[applicant_dob]]</p>
                                <p style="text-align: right;">paszport: [[applicant_passport]]</p>
                                <p style="text-align: right;">adres: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o wydanie mi zaświadczenia o niekaralności w celu [[purpose_of_certificate]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Führungszeugnis',
                        'description' => 'Antrag auf Ausstellung eines Führungszeugnisses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">Geburtsdatum: [[applicant_dob]]</p>
                                <p style="text-align: right;">Reisepass: [[applicant_passport]]</p>
                                <p style="text-align: right;">Adresse: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Ausstellung eines Führungszeugnisses für [[purpose_of_certificate]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 4. Заявление на получение справки о составе семьи ---
            [
                'slug' => 'application-family-composition-ua',
                'fields' => '[
                    {"name":"recipient_organization","type":"text","required":true,"labels":{"uk":"Назва органу, до якого звертаєтесь (напр., ЦНАП, ЖЕК)","en":"Name of the authority you are contacting (e.g., CSC, Housing Office)", "pl":"Nazwa organu, do którego się zwracasz (np. USC, Spółdzielnia Mieszkaniowa)", "de":"Name der Behörde, an die Sie sich wenden (z.B. Bürgeramt, Wohnungsamt)"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса органу","en":"Authority address", "pl":"Adres organu", "de":"Adresse der Behörde"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"uk":"Адреса реєстрації заявника","en":"Applicant\'s Registered Address", "pl":"Adres zameldowania wnioskodawcy", "de":"Meldeadresse des Antragstellers"}},
                    {"name":"purpose_of_certificate","type":"textarea","required":true,"labels":{"uk":"Мета отримання довідки (напр., для оформлення субсидії, для пред\'явлення за місцем вимоги)","en":"Purpose of obtaining certificate (e.g., for subsidy application, for presentation upon request)", "pl":"Cel uzyskania zaświadczenia (np. do wniosku o zasiłek, do przedstawienia na żądanie)", "de":"Zweck der Bescheinigung (z.B. für Subventionsantrag, zur Vorlage auf Verlangen)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на отримання довідки про склад сім\'ї',
                        'description' => 'Заява про видачу довідки про склад сім\'ї або зареєстрованих осіб за адресою.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">який(а) проживає за адресою: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу видати мені довідку про склад сім\'ї (зареєстрованих осіб) за адресою: [[applicant_address]] для [[purpose_of_certificate]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for a Certificate of Family Composition',
                        'description' => 'Application for issuing a certificate of family composition or registered persons at the address.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">residing at: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to issue me a certificate of family composition (registered persons) at the address: [[applicant_address]] for [[purpose_of_certificate]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o wydanie zaświadczenia o składzie rodziny',
                        'description' => 'Wniosek o wydanie zaświadczenia o składzie rodziny lub osobach zameldowanych pod adresem.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">zamieszkałego pod adresem: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o wydanie mi zaświadczenia o składzie rodziny (osobach zameldowanych) pod adresem: [[applicant_address]] w celu [[purpose_of_certificate]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Haushaltsbescheinigung',
                        'description' => 'Antrag auf Ausstellung einer Bescheinigung über die Familienzusammensetzung oder die gemeldeten Personen unter der Adresse.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_position]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">wohnhaft unter der Adresse: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Ausstellung einer Haushaltsbescheinigung (gemeldete Personen) unter der Adresse: [[applicant_address]] für [[purpose_of_certificate]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 5. Заявление на смену имени/фамилии ---
            [
                'slug' => 'application-name-change-ua',
                'fields' => '[
                    {"name":"recipient_organization","type":"text","required":true,"labels":{"uk":"Назва органу РАЦС","en":"Name of Civil Registry Office", "pl":"Nazwa USC", "de":"Name des Standesamtes"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса органу РАЦС","en":"Civil Registry Office address", "pl":"Adres USC", "de":"Adresse des Standesamtes"}},
                    {"name":"applicant_current_name","type":"text","required":true,"labels":{"uk":"Поточне ПІБ заявника","en":"Applicant\'s Current Full Name", "pl":"Obecne imię i nazwisko wnioskodawcy", "de":"Aktueller Name des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"uk":"Дата народження заявника","en":"Applicant\'s Date of Birth", "pl":"Data urodzenia wnioskodawcy", "de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"uk":"Адреса реєстрації заявника","en":"Applicant\'s Registered Address", "pl":"Adres zameldowania wnioskodawcy", "de":"Meldeadresse des Antragstellers"}},
                    {"name":"applicant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані заявника","en":"Applicant\'s Passport Details", "pl":"Dane paszportowe wnioskodawcy", "de":"Passdaten des Antragstellers"}},
                    {"name":"new_name","type":"text","required":true,"labels":{"uk":"Нове ім\'я (якщо змінюєте)","en":"New First Name (if changing)", "pl":"Nowe imię (jeśli zmieniasz)", "de":"Neuer Vorname (falls geändert)"}},
                    {"name":"new_surname","type":"text","required":true,"labels":{"uk":"Нове прізвище (якщо змінюєте)","en":"New Surname (if changing)", "pl":"Nowe nazwisko (jeśli zmieniasz)", "de":"Neuer Nachname (falls geändert)"}},
                    {"name":"reason_for_change","type":"textarea","required":true,"labels":{"uk":"Причина зміни (напр., бажання мати інше ім\'я, у зв\'язку зі шлюбом/розлученням)","en":"Reason for change (e.g., desire for another name, due to marriage/divorce)", "pl":"Przyczyna zmiany (np. chęć posiadania innego imienia, z powodu małżeństwa/rozwodu)", "de":"Grund der Änderung (z.B. Wunsch nach anderem Namen, aufgrund von Heirat/Scheidung)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на зміну імені/прізвища',
                        'description' => 'Заява до органів РАЦС про зміну імені або прізвища.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_current_name]]</p>
                                <p style="text-align: right;">дата народження: [[applicant_dob]]</p>
                                <p style="text-align: right;">адреса: [[applicant_address]]</p>
                                <p style="text-align: right;">паспорт: [[applicant_passport]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу змінити моє ім\'я з "[[applicant_current_name]]" на "[[new_name]] [[new_surname]]".</p>
                                <p>Причина зміни: [[reason_for_change]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_current_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Name/Surname Change',
                        'description' => 'Application to the Civil Registry Office for a change of first name or surname.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_current_name]]</p>
                                <p style="text-align: right;">date of birth: [[applicant_dob]]</p>
                                <p style="text-align: right;">address: [[applicant_address]]</p>
                                <p style="text-align: right;">passport: [[applicant_passport]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to change my name from "[[applicant_current_name]]" to "[[new_name]] [[new_surname]]".</p>
                                <p>Reason for change: [[reason_for_change]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[applicant_current_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o zmianę imienia/nazwiska',
                        'description' => 'Wniosek do urzędu stanu cywilnego o zmianę imienia lub nazwiska.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_current_name]]</p>
                                <p style="text-align: right;">data urodzenia: [[applicant_dob]]</p>
                                <p style="text-align: right;">adres: [[applicant_address]]</p>
                                <p style="text-align: right;">paszport: [[applicant_passport]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o zmianę mojego imienia z "[[applicant_current_name]]" na "[[new_name]] [[new_surname]]".</p>
                                <p>Przyczyna zmiany: [[reason_for_change]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[applicant_current_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Namens-/Nachnamensänderung',
                        'description' => 'Antrag an das Standesamt auf Änderung des Vornamens oder Nachnamens.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_current_name]]</p>
                                <p style="text-align: right;">Geburtsdatum: [[applicant_dob]]</p>
                                <p style="text-align: right;">Adresse: [[applicant_address]]</p>
                                <p style="text-align: right;">Reisepass: [[applicant_passport]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Änderung meines Namens von "[[applicant_current_name]]" auf "[[new_name]] [[new_surname]]".</p>
                                <p>Grund der Änderung: [[reason_for_change]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[applicant_current_name]])</p>
                            </div>'
                    ],
                ]
            ],
            // --- 6. Заявление на регистрацию/снятие с регистрации места жительства ---
            [
                'slug' => 'application-residence-registration-ua',
                'fields' => '[
                    {"name":"recipient_organization","type":"text","required":true,"labels":{"uk":"Назва органу реєстрації (напр., ЦНАП)","en":"Name of registration authority (e.g., CSC)", "pl":"Nazwa organu rejestracji (np. USC)", "de":"Name der Registrierungsbehörde (z.B. Bürgeramt)"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса органу реєстрації","en":"Registration authority address", "pl":"Adres organu rejestracji", "de":"Adresse der Registrierungsbehörde"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"uk":"Дата народження заявника","en":"Applicant\'s Date of Birth", "pl":"Data urodzenia wnioskodawcy", "de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані заявника","en":"Applicant\'s Passport Details", "pl":"Dane paszportowe wnioskodawcy", "de":"Passdaten des Antragstellers"}},
                    {"name":"current_address","type":"text","required":true,"labels":{"uk":"Поточна адреса реєстрації","en":"Current registered address", "pl":"Obecny adres zameldowania", "de":"Aktuelle Meldeadresse"}},
                    {"name":"new_address","type":"text","required":false,"labels":{"uk":"Нова адреса реєстрації (якщо реєстрація)","en":"New registered address (if registering)", "pl":"Nowy adres zameldowania (jeśli rejestracja)", "de":"Neue Meldeadresse (falls Registrierung)"}},
                    {"name":"action_type","type":"text","required":true,"labels":{"uk":"Вид дії (реєстрація/зняття з реєстрації)","en":"Type of action (registration/deregistration)", "pl":"Rodzaj czynności (rejestracja/wyrejestrowanie)", "de":"Art der Aktion (Anmeldung/Abmeldung)"}},
                    {"name":"reason_for_action","type":"textarea","required":true,"labels":{"uk":"Підстава для дії (напр., переїзд, продаж житла)","en":"Reason for action (e.g., relocation, sale of housing)", "pl":"Podstawa czynności (np. przeprowadzka, sprzedaż mieszkania)", "de":"Grund der Aktion (z.B. Umzug, Wohnungsverkauf)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на реєстрацію/зняття з реєстрації місця проживання',
                        'description' => 'Заява до органу реєстрації про реєстрацію або зняття з реєстрації місця проживання.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">дата народження: [[applicant_dob]]</p>
                                <p style="text-align: right;">паспорт: [[applicant_passport]]</p>
                                <p style="text-align: right;">поточна адреса: [[current_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу здійснити [[action_type]] мого місця проживання за адресою: [[new_address]]</p>
                                <p>Підстава: [[reason_for_action]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Residence Registration/Deregistration',
                        'description' => 'Application to the registration authority for registration or deregistration of residence.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">date of birth: [[applicant_dob]]</p>
                                <p style="text-align: right;">passport: [[applicant_passport]]</p>
                                <p style="text-align: right;">current address: [[current_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to perform [[action_type]] of my place of residence at: [[new_address]]</p>
                                <p>Reason: [[reason_for_action]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o zameldowanie/wymeldowanie',
                        'description' => 'Wniosek do organu rejestracji o zameldowanie lub wymeldowanie miejsca zamieszkania.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">data urodzenia: [[applicant_dob]]</p>
                                <p style="text-align: right;">paszport: [[applicant_passport]]</p>
                                <p style="text-align: right;">obecny adres: [[current_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o dokonanie [[action_type]] mojego miejsca zamieszkania pod adresem: [[new_address]]</p>
                                <p>Podstawa: [[reason_for_action]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf An-/Abmeldung des Wohnsitzes',
                        'description' => 'Antrag an die Registrierungsbehörde zur An- oder Abmeldung des Wohnsitzes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_position]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">Geburtsdatum: [[applicant_dob]]</p>
                                <p style="text-align: right;">Reisepass: [[applicant_passport]]</p>
                                <p style="text-align: right;">aktuelle Adresse: [[current_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die [[action_type]] meines Wohnsitzes unter der Adresse: [[new_address]]</p>
                                <p>Grund: [[reason_for_action]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 7. Заявление на получение загранпаспорта (общая форма) ---
            [
                'slug' => 'application-foreign-passport-ua',
                'fields' => '[
                    {"name":"recipient_organization","type":"text","required":true,"labels":{"uk":"Назва органу (напр., ДМС України)","en":"Name of authority (e.g., State Migration Service of Ukraine)", "pl":"Nazwa organu (np. Państwowa Służba Migracyjna Ukrainy)", "de":"Name der Behörde, an die Sie sich wenden (z.B. Staatlicher Migrationsdienst der Ukraine)"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса органу","en":"Authority address", "pl":"Adres organu", "de":"Adresse der Behörde"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"uk":"Дата народження заявника","en":"Applicant\'s Date of Birth", "pl":"Data urodzenia wnioskodawcy", "de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_passport_internal","type":"text","required":true,"labels":{"uk":"Дані внутрішнього паспорта","en":"Internal Passport Details", "pl":"Dane paszportu wewnętrznego", "de":"Details des Inlandspasses"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"uk":"Адреса реєстрації заявника","en":"Applicant\'s Registered Address", "pl":"Adres zameldowania wnioskodawcy", "de":"Meldeadresse des Antragstellers"}},
                    {"name":"purpose_of_passport","type":"textarea","required":true,"labels":{"uk":"Мета отримання закордонного паспорта (напр., для поїздок за кордон)","en":"Purpose of obtaining foreign passport (e.g., for foreign travel)", "pl":"Cel uzyskania paszportu zagranicznego (np. do podróży zagranicznych)", "de":"Zweck der Erlangung eines Reisepasses (z.B. für Auslandsreisen)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на отримання закордонного паспорта (загальна форма)',
                        'description' => 'Заява про видачу паспорта громадянина України для виїзду за кордон.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">дата народження: [[applicant_dob]]</p>
                                <p style="text-align: right;">паспорт: [[applicant_passport_internal]]</p>
                                <p style="text-align: right;">адреса: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу видати мені паспорт громадянина України для виїзду за кордон для [[purpose_of_passport]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for a Foreign Passport (General Form)',
                        'description' => 'Application for issuing a passport of a citizen of Ukraine for travel abroad.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">date of birth: [[applicant_dob]]</p>
                                <p style="text-align: right;">passport: [[applicant_passport_internal]]</p>
                                <p style="text-align: right;">address: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to issue me a passport of a citizen of Ukraine for travel abroad for [[purpose_of_passport]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o wydanie paszportu zagranicznego (forma ogólna)',
                        'description' => 'Wniosek o wydanie paszportu obywatela Ukrainy do wyjazdu za granicę.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">data urodzenia: [[applicant_dob]]</p>
                                <p style="text-align: right;">paszport: [[applicant_passport_internal]]</p>
                                <p style="text-align: right;">adres: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o wydanie mi paszportu obywatela Ukrainy do wyjazdu za granicę w celu [[purpose_of_passport]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Reisepass (allgemeine Form)',
                        'description' => 'Antrag auf Ausstellung eines Reisepasses eines ukrainischen Staatsbürgers für Auslandsreisen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">Geburtsdatum: [[applicant_dob]]</p>
                                <p style="text-align: right;">Reisepass: [[applicant_passport_internal]]</p>
                                <p style="text-align: right;">Adresse: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Ausstellung eines Reisepasses eines ukrainischen Staatsbürgers für Auslandsreisen für [[purpose_of_passport]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 8. Заявление на получение идентификационного кода (ИНН) ---
            [
                'slug' => 'application-tax-id-ua',
                'fields' => '[
                    {"name":"recipient_organization","type":"text","required":true,"labels":{"uk":"Назва органу (напр., ДПС України)","en":"Name of authority (e.g., State Tax Service of Ukraine)", "pl":"Nazwa organu (np. Państwowa Służba Podatkowa Ukrainy)", "de":"Name der Behörde, an die Sie sich wenden (z.B. Staatlicher Steuerdienst der Ukraine)"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса органу","en":"Authority address", "pl":"Adres organu", "de":"Adresse der Behörde"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"uk":"Дата народження заявника","en":"Applicant\'s Date of Birth", "pl":"Data urodzenia wnioskodawcy", "de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані заявника","en":"Applicant\'s Passport Details", "pl":"Dane paszportowe wnioskodawcy", "de":"Passdaten des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"uk":"Адреса реєстрації заявника","en":"Applicant\'s Registered Address", "pl":"Adres zameldowania wnioskodawcy", "de":"Meldeadresse des Antragstellers"}},
                    {"name":"reason_for_inn","type":"textarea","required":true,"labels":{"uk":"Причина отримання ІПН (напр., вперше, втрата, зміна даних)","en":"Reason for obtaining TIN (e.g., first time, loss, data change)", "pl":"Przyczyna uzyskania NIP (np. po raz pierwszy, utrata, zmiana danych)", "de":"Grund für die Erlangung der Steuernummer (z.B. erstmalig, Verlust, Datenänderung)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на отримання ідентифікаційного коду (ІПН)',
                        'description' => 'Заява про видачу картки платника податків (ідентифікаційного коду).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">дата народження: [[applicant_dob]]</p>
                                <p style="text-align: right;">паспорт: [[applicant_passport]]</p>
                                <p style="text-align: right;">адреса: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу видати мені картку платника податків (ідентифікаційний код) у зв\'язку з [[reason_for_inn]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for a Tax ID (TIN)',
                        'description' => 'Application for issuing a taxpayer card (tax identification number).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">date of birth: [[applicant_dob]]</p>
                                <p style="text-align: right;">passport: [[applicant_passport]]</p>
                                <p style="text-align: right;">address: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to issue me a taxpayer card (tax identification number) due to [[reason_for_inn]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o wydanie numeru identyfikacji podatkowej (NIP)',
                        'description' => 'Wniosek o wydanie karty podatnika (numeru identyfikacji podatkowej).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">data urodzenia: [[applicant_dob]]</p>
                                <p style="text-align: right;">paszport: [[applicant_passport]]</p>
                                <p style="text-align: right;">adres: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o wydanie mi karty podatnika (numeru identyfikacji podatkowej) w związku z [[reason_for_inn]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Steuernummer (TIN)',
                        'description' => 'Antrag auf Ausstellung einer Steuerkarte (Steueridentifikationsnummer).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">Geburtsdatum: [[applicant_dob]]</p>
                                <p style="text-align: right;">Reisepass: [[applicant_passport]]</p>
                                <p style="text-align: right;">Adresse: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Ausstellung einer Steuerkarte (Steueridentifikationsnummer) aufgrund von [[reason_for_inn]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 9. Заявление о приеме ребенка в детский сад ---
            [
                'slug' => 'application-kindergarten-ua',
                'fields' => '[
                    {"name":"kindergarten_name","type":"text","required":true,"labels":{"uk":"Назва дитячого садка","en":"Kindergarten Name", "pl":"Nazwa przedszkola", "de":"Name des Kindergartens"}},
                    {"name":"kindergarten_address","type":"text","required":true,"labels":{"uk":"Адреса дитячого садка","en":"Kindergarten address", "pl":"Adres przedszkola", "de":"Adresse des Kindergartens"}},
                    {"name":"parent_name","type":"text","required":true,"labels":{"uk":"ПІБ батька/матері","en":"Parent\'s Full Name", "pl":"Imię i nazwisko rodzica", "de":"Vollständiger Name des Elternteils"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"uk":"Адреса проживання батька/матері","en":"Parent\'s residence address", "pl":"Adres zamieszkania rodzica", "de":"Wohnadresse des Elternteils"}},
                    {"name":"child_name","type":"text","required":true,"labels":{"uk":"ПІБ дитини","en":"Child\'s Full Name", "pl":"Imię i nazwisko dziecka", "de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"uk":"Дата народження дитини","en":"Child\'s Date of Birth", "pl":"Data urodzenia dziecka", "de":"Geburtsdatum des Kindes"}},
                    {"name":"child_birth_certificate","type":"text","required":true,"labels":{"uk":"Серія та номер свідоцтва про народження","en":"Birth Certificate Series and Number", "pl":"Seria i numer aktu urodzenia", "de":"Seriennummer der Geburtsurkunde"}},
                    {"name":"desired_enrollment_date","type":"date","required":true,"labels":{"uk":"Бажана дата зарахування","en":"Desired Enrollment Date", "pl":"Preferowana data przyjęcia", "de":"Gewünschtes Aufnahmedatum"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява про прийом дитини в дитячий сад',
                        'description' => 'Заява про зарахування дитини до дошкільного навчального закладу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Завідувачу [[kindergarten_name]]</p>
                                <p style="text-align: right;">[[kindergarten_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[parent_name]]</p>
                                <p style="text-align: right;">який(а) проживає за адресою: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу зарахувати мою дитину, <strong>[[child_name]]</strong>, [[child_dob]] року народження, свідоцтво про народження серія [[child_birth_certificate]], до Вашого дитячого садка з <strong>[[desired_enrollment_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Child Enrollment in Kindergarten',
                        'description' => 'Application for child enrollment in a preschool educational institution.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Head of [[kindergarten_name]]</p>
                                <p style="text-align: right;">[[kindergarten_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[parent_name]]</p>
                                <p style="text-align: right;">residing at: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to enroll my child, <strong>[[child_name]]</strong>, born on [[child_dob]], birth certificate series [[child_birth_certificate]], in your kindergarten from <strong>[[desired_enrollment_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o przyjęcie dziecka do przedszkola',
                        'description' => 'Wniosek o przyjęcie dziecka do placówki wychowania przedszkolnego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[kindergarten_name]]</p>
                                <p style="text-align: right;">[[kindergarten_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[parent_name]]</p>
                                <p style="text-align: right;">zamieszkałego pod adresem: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o przyjęcie mojego dziecka, <strong>[[child_name]]</strong>, urodzonego [[child_dob]], akt urodzenia seria [[child_birth_certificate]], do Państwa przedszkola od <strong>[[desired_enrollment_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Aufnahme eines Kindes in den Kindergarten',
                        'description' => 'Antrag auf Aufnahme eines Kindes in eine vorschulische Bildungseinrichtung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An die Leitung von [[kindergarten_name]]</p>
                                <p style="text-align: right;">[[kindergarten_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[parent_name]]</p>
                                <p style="text-align: right;">wohnhaft unter der Adresse: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Aufnahme meines Kindes, <strong>[[child_name]]</strong>, geboren am [[child_dob]], Geburtsurkunde Serie [[child_birth_certificate]], in Ihren Kindergarten ab dem <strong>[[desired_enrollment_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 10. Заявление о приеме ребенка в школу ---
            [
                'slug' => 'application-school-ua',
                'fields' => '[
                    {"name":"school_name","type":"text","required":true,"labels":{"uk":"Назва школи","en":"School Name", "pl":"Nazwa szkoły", "de":"Name der Schule"}},
                    {"name":"school_address","type":"text","required":true,"labels":{"uk":"Адреса школи","en":"School address", "pl":"Adres szkoły", "de":"Adresse der Schule"}},
                    {"name":"parent_name","type":"text","required":true,"labels":{"uk":"ПІБ батька/матері","en":"Parent\'s Full Name", "pl":"Imię i nazwisko rodzica", "de":"Vollständiger Name des Elternteils"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"uk":"Адреса проживання батька/матері","en":"Parent\'s residence address", "pl":"Adres zamieszkania rodzica", "de":"Wohnadresse des Elternteils"}},
                    {"name":"child_name","type":"text","required":true,"labels":{"uk":"ПІБ дитини","en":"Child\'s Full Name", "pl":"Imię i nazwisko dziecka", "de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"uk":"Дата народження дитини","en":"Child\'s Date of Birth", "pl":"Data urodzenia dziecka", "de":"Geburtsdatum des Kindes"}},
                    {"name":"child_birth_certificate","type":"text","required":true,"labels":{"uk":"Серія та номер свідоцтва про народження","en":"Birth Certificate Series and Number", "pl":"Seria i numer aktu urodzenia", "de":"Seriennummer der Geburtsurkunde"}},
                    {"name":"grade","type":"text","required":true,"labels":{"uk":"Клас, до якого просите зарахувати","en":"Grade to enroll in", "pl":"Klasa, do której prosisz o przyjęcie", "de":"Klasse, in die eingeschult werden soll"}},
                    {"name":"desired_enrollment_date","type":"date","required":true,"labels":{"uk":"Бажана дата зарахування","en":"Desired Enrollment Date", "pl":"Preferowana data przyjęcia", "de":"Gewünsztes Aufnahmedatum"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява про прийом дитини в школу',
                        'description' => 'Заява про зарахування дитини до загальноосвітнього навчального закладу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[school_name]]</p>
                                <p style="text-align: right;">[[school_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[parent_name]]</p>
                                <p style="text-align: right;">який(а) проживає за адресою: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу зарахувати мою дитину, <strong>[[child_name]]</strong>, [[child_dob]] року народження, свідоцтво про народження серія [[child_birth_certificate]], до [[grade]] класу Вашої школи з <strong>[[desired_enrollment_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Child Enrollment in School',
                        'description' => 'Application for child enrollment in a general education institution.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[school_name]]</p>
                                <p style="text-align: right;">[[school_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[parent_name]]</p>
                                <p style="text-align: right;">residing at: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to enroll my child, <strong>[[child_name]]</strong>, born on [[child_dob]], birth certificate series [[child_birth_certificate]], in the [[grade]] grade of your school from <strong>[[desired_enrollment_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o przyjęcie dziecka do szkoły',
                        'description' => 'Wniosek o przyjęcie dziecka do ogólnokształcącej placówki edukacyjnej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[school_name]]</p>
                                <p style="text-align: right;">[[school_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[parent_name]]</p>
                                <p style="text-align: right;">zamieszkałego pod adresem: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o przyjęcie mojego dziecka, <strong>[[child_name]]</strong>, urodzonego [[child_dob]], akt urodzenia seria [[child_birth_certificate]], do klasy [[grade]] Państwa szkoły od <strong>[[desired_enrollment_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Aufnahme eines Kindes in die Schule',
                        'description' => 'Antrag auf Aufnahme eines Kindes in eine allgemeinbildende Schule.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[school_name]]</p>
                                <p style="text-align: right;">[[school_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[parent_name]]</p>
                                <p style="text-align: right;">wohnhaft unter der Adresse: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Aufnahme meines Kindes, <strong>[[child_name]]</strong>, geboren am [[child_dob]], Geburtsurkunde Serie [[child_birth_certificate]], in die [[grade]]. Klasse Ihrer Schule ab dem <strong>[[desired_enrollment_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 11. Записка в школу об отсутствии ребенка ---
            [
                'slug' => 'absence-note-school-ua',
                'fields' => '[
                    {"name":"school_name","type":"text","required":true,"labels":{"uk":"Назва школи","en":"School Name", "pl":"Nazwa szkoły", "de":"Name der Schule"}},
                    {"name":"school_address","type":"text","required":true,"labels":{"uk":"Адреса школи","en":"School address", "pl":"Adres szkoły", "de":"Adresse der Schule"}},
                    {"name":"parent_name","type":"text","required":true,"labels":{"uk":"ПІБ батька/матері","en":"Parent\'s Full Name", "pl":"Imię i nazwisko rodzica", "de":"Vollständiger Name des Elternteils"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"uk":"Адреса проживання батька/матері","en":"Parent\'s residence address", "pl":"Adres zamieszkania rodzica", "de":"Wohnadresse des Elternteils"}},
                    {"name":"child_name","type":"text","required":true,"labels":{"uk":"ПІБ дитини","en":"Child\'s Full Name", "pl":"Imię i nazwisko dziecka", "de":"Vollständiger Name des Kindes"}},
                    {"name":"child_grade","type":"text","required":true,"labels":{"uk":"Клас дитини","en":"Child\'s Grade", "pl":"Klasa dziecka", "de":"Klasse des Kindes"}},
                    {"name":"absence_start_date","type":"date","required":true,"labels":{"uk":"Дата початку відсутності","en":"Absence Start Date", "pl":"Data rozpoczęcia nieobecności", "de":"Beginn der Abwesenheit"}},
                    {"name":"absence_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення відсутності","en":"Absence End Date", "pl":"Data zakończenia nieobecności", "de":"Ende der Abwesenheit"}},
                    {"name":"reason_for_absence","type":"textarea","required":true,"labels":{"uk":"Причина відсутності","en":"Reason for Absence", "pl":"Przyczyna nieobecności", "de":"Grund der Abwesenheit"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Записка в школу про відсутність дитини',
                        'description' => 'Офіційна записка від батьків до школи про відсутність дитини на заняттях.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[school_name]]</p>
                                <p style="text-align: right;">[[school_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[parent_name]]</p>
                                <p style="text-align: right;">який(а) проживає за адресою: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАПИСКА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу вважати відсутність моєї дитини, <strong>[[child_name]]</strong>, учня(учениці) [[child_grade]] класу, у школі з <strong>[[absence_start_date]]</strong> по <strong>[[absence_end_date]]</strong>, з поважної причини: [[reason_for_absence]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Absence Note to School',
                        'description' => 'Official note from parents to school regarding a child\'s absence from classes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[school_name]]</p>
                                <p style="text-align: right;">[[school_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[parent_name]]</p>
                                <p style="text-align: right;">residing at: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">NOTE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Please excuse my child, <strong>[[child_name]]</strong>, a student of grade [[child_grade]], from school from <strong>[[absence_start_date]]</strong> to <strong>[[absence_end_date]]</strong>, due to: [[reason_for_absence]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zwolnienie z zajęć szkolnych',
                        'description' => 'Oficjalna notatka od rodziców do szkoły o nieobecności dziecka na zajęciach.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[school_name]]</p>
                                <p style="text-align: right;">[[school_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[parent_name]]</p>
                                <p style="text-align: right;">zamieszkałego pod adresem: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ZWOLNIENIE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o usprawiedliwienie nieobecności mojego dziecka, <strong>[[child_name]]</strong>, ucznia(uczennicy) klasy [[child_grade]], w szkole od <strong>[[absence_start_date]]</strong> do <strong>[[absence_end_date]]</strong>, z powodu: [[reason_for_absence]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Entschuldigung für die Schule',
                        'description' => 'Offizielle Notiz der Eltern an die Schule bezüglich der Abwesenheit eines Kindes vom Unterricht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[school_name]]</p>
                                <p style="text-align: right;">[[school_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[parent_name]]</p>
                                <p style="text-align: right;">wohnhaft unter der Adresse: [[parent_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ENTSCHULDIGUNG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Bitte entschuldigen Sie mein Kind, <strong>[[child_name]]</strong>, Schüler(in) der [[child_grade]]. Klasse, vom Schulbesuch vom <strong>[[absence_start_date]]</strong> bis zum <strong>[[absence_end_date]]</strong>, aufgrund von: [[reason_for_absence]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[parent_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 12. Согласие родителей на выезд ребенка за границу ---
            [
                'slug' => 'parental-consent-travel-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"parent_name_full","type":"text","required":true,"labels":{"uk":"ПІБ батька/матері","en":"Parent\'s Full Name", "pl":"Imię i nazwisko rodzica", "de":"Vollständiger Name des Elternteils"}},
                    {"name":"parent_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані батька/матері","en":"Parent\'s Passport Details", "pl":"Dane paszportowe rodzica", "de":"Passdaten des Elternteils"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"uk":"Адреса проживання батька/матері","en":"Parent\'s residence address", "pl":"Adres zamieszkania rodzica", "de":"Wohnadresse des Elternteils"}},
                    {"name":"child_name","type":"text","required":true,"labels":{"uk":"ПІБ дитини","en":"Child\'s Full Name", "pl":"Imię i nazwisko dziecka", "de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"uk":"Дата народження дитини","en":"Child\'s Date of Birth", "pl":"Data urodzenia dziecka", "de":"Geburtsdatum des Kindes"}},
                    {"name":"child_birth_certificate","type":"text","required":true,"labels":{"uk":"Серія та номер свідоцтва про народження дитини","en":"Child\'s Birth Certificate Series and Number", "pl":"Seria i numer aktu urodzenia dziecka", "de":"Seriennummer der Geburtsurkunde des Kindes"}},
                    {"name":"travel_destination","type":"text","required":true,"labels":{"uk":"Країна призначення","en":"Country of Destination", "pl":"Kraj przeznaczenia", "de":"Zielland"}},
                    {"name":"travel_purpose","type":"textarea","required":true,"labels":{"uk":"Мета поїздки","en":"Purpose of Travel", "pl":"Cel podróży", "de":"Zweck der Reise"}},
                    {"name":"travel_start_date","type":"date","required":true,"labels":{"uk":"Дата початку поїздки","en":"Travel Start Date", "pl":"Data rozpoczęcia podróży", "de":"Reisebeginn"}},
                    {"name":"travel_end_date","type":"date","required":true,"labels":{"uk":"Дата закінчення поїздки","en":"Travel End Date", "pl":"Data zakończenia podróży", "de":"Reiseende"}},
                    {"name":"accompanying_person_name","type":"text","required":false,"labels":{"uk":"ПІБ супроводжуючої особи (якщо не батько/мати)","en":"Full Name of Accompanying Person (if not parent)", "pl":"Imię i nazwisko osoby towarzyszącej (jeśli nie rodzic)", "de":"Vollständiger Name der Begleitperson (falls nicht Elternteil)"}},
                    {"name":"accompanying_person_passport","type":"text","required":false,"labels":{"uk":"Паспортні дані супроводжуючої особи","en":"Accompanying Person\'s Passport Details", "pl":"Dane paszportowe osoby towarzyszącej", "de":"Passdaten der Begleitperson"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Згода батьків на виїзд дитини за кордон',
                        'description' => 'Офіційний документ, що підтверджує згоду одного або обох батьків на виїзд дитини за межі України.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА-ЗГОДА</h1><p style="font-size: 14px;">на виїзд дитини за кордон</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[parent_name_full]]</strong>, паспорт: [[parent_passport]], проживаю за адресою: [[parent_address]], цим надаю свою добровільну інформовану згоду на виїзд моєї дитини:</p>
                                <p><strong>[[child_name]]</strong>, [[child_dob]] року народження, свідоцтво про народження серія [[child_birth_certificate]].</p>
                                <p>Мета поїздки: [[travel_purpose]].</p>
                                <p>Країна призначення: <strong>[[travel_destination]]</strong>.</p>
                                <p>Термін поїздки: з <strong>[[travel_start_date]]</strong> по <strong>[[travel_end_date]]</strong>.</p>
                                [[accompanying_person_name]]<p>Супроводжуюча особа: [[accompanying_person_name]], паспорт: [[accompanying_person_passport]].</p>[[/accompanying_person_name]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[parent_name_full]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Parental Consent for Child Travel Abroad',
                        'description' => 'Official document confirming the consent of one or both parents for a child to travel outside Ukraine.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CONSENT STATEMENT</h1><p style="font-size: 14px;">for child travel abroad</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
            <p>I, <strong>[[parent_name_full]]</strong>, passport: [[parent_passport]], residing at: [[parent_address]], hereby give my voluntary informed consent for the travel of my child:</p>
            <p><strong>[[child_name]]</strong>, born on [[child_dob]], birth certificate series [[child_birth_certificate]].</p>
            <p>Purpose of travel: [[travel_purpose]].</p>
            <p>Country of destination: <strong>[[travel_destination]]</strong>.</p>
            <p>Travel period: from <strong>[[travel_start_date]]</strong> to <strong>[[travel_end_date]]</strong>.</p>
            [[accompanying_person_name]]<p>Accompanying person: [[accompanying_person_name]], passport: [[accompanying_person_passport]].</p>[[/accompanying_person_name]]
        </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
            <p>Signature: ___________________ ([[parent_name_full]])</p>
        </div>'
                    ],

                    'pl' => [
                        'title' => 'Zgoda rodziców na wyjazd dziecka za granicę',
                        'description' => 'Oficjalny dokument potwierdzający zgodę jednego lub obojga rodziców na wyjazd dziecka poza granice Ukrainy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OŚWIADCZENIE O ZGODZIE</h1><p style="font-size: 14px;">na wyjazd dziecka za granicę</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
            <p>Ja, <strong>[[parent_name_full]]</strong>, paszport: [[parent_passport]], zamieszkały(a) pod adresem: [[parent_address]], niniejszym wyrażam dobrowolną i świadomą zgodę na wyjazd mojego dziecka:</p>
            <p><strong>[[child_name]]</strong>, urodzonego [[child_dob]], akt urodzenia seria [[child_birth_certificate]].</p>
            <p>Cel podróży: [[travel_purpose]].</p>
            <p>Kraj docelowy: <strong>[[travel_destination]]</strong>.</p>
            <p>Okres podróży: od <strong>[[travel_start_date]]</strong> do <strong>[[travel_end_date]]</strong>.</p>
            [[accompanying_person_name]]<p>Osoba towarzysząca: [[accompanying_person_name]], paszport: [[accompanying_person_passport]].</p>[[/accompanying_person_name]]
        </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
            <p>Podpis: ___________________ ([[parent_name_full]])</p>
        </div>'
                    ],

                    'de' => [
                        'title' => 'Elterliche Zustimmung zur Ausreise des Kindes ins Ausland',
                        'description' => 'Offizielles Dokument, das die Zustimmung eines oder beider Elternteile zur Ausreise eines Kindes aus der Ukraine bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EINVERSTÄNDNISERKLÄRUNG</h1><p style="font-size: 14px;">zur Ausreise des Kindes ins Ausland</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
            <p>Ich, <strong>[[parent_name_full]]</strong>, Reisepass: [[parent_passport]], wohnhaft unter der Adresse: [[parent_address]], erteile hiermit meine freiwillige und informierte Zustimmung zur Reise meines Kindes:</p>
            <p><strong>[[child_name]]</strong>, geboren am [[child_dob]], Geburtsurkunde Serie [[child_birth_certificate]].</p>
            <p>Reisezweck: [[travel_purpose]].</p>
            <p>Zielland: <strong>[[travel_destination]]</strong>.</p>
            <p>Reisezeitraum: vom <strong>[[travel_start_date]]</strong> bis zum <strong>[[travel_end_date]]</strong>.</p>
            [[accompanying_person_name]]<p>Begleitperson: [[accompanying_person_name]], Reisepass: [[accompanying_person_passport]].</p>[[/accompanying_person_name]]
        </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
            <p>Unterschrift: ___________________ ([[parent_name_full]])</p>
        </div>'
                    ],

                ]
            ],
            // --- 14. Соглашение об уплате алиментов ---
            [
                'slug' => 'alimony-agreement-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"payer_name","type":"text","required":true,"labels":{"uk":"ПІБ платника аліментів","en":"Alimony Payer\'s Full Name", "pl":"Imię i nazwisko płatnika alimentów", "de":"Vollständiger Name des Unterhaltszahlers"}},
                    {"name":"payer_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані платника","en":"Payer\'s Passport Details", "pl":"Dane paszportowe płatnika", "de":"Passdaten des Zahlers"}},
                    {"name":"payer_address","type":"text","required":true,"labels":{"uk":"Адреса проживання платника","en":"Payer\'s residence address", "pl":"Adres zamieszkania płatnika", "de":"Wohnadresse des Zahlers"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"ПІБ отримувача аліментів","en":"Alimony Recipient\'s Full Name", "pl":"Imię i nazwisko odbiorcy alimentów", "de":"Vollständiger Name des Unterhaltsempfängers"}},
                    {"name":"recipient_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані отримувача","en":"Recipient\'s Passport Details", "pl":"Dane paszportowe odbiorcy", "de":"Passdaten des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса проживання отримувача","en":"Recipient\'s residence address", "pl":"Adres zamieszkania odbiorcy", "de":"Wohnadresse des Empfängers"}},
                    {"name":"child_name","type":"text","required":true,"labels":{"uk":"ПІБ дитини","en":"Child\'s Full Name", "pl":"Imię i nazwisko dziecka", "de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"uk":"Дата народження дитини","en":"Child\'s Date of Birth", "pl":"Data urodzenia dziecka", "de":"Geburtsdatum des Kindes"}},
                    {"name":"alimony_amount","type":"number","required":true,"labels":{"uk":"Сума аліментів (грн/міс)","en":"Alimony Amount (UAH/month)", "pl":"Kwota alimentów (UAH/miesiąc)", "de":"Unterhaltsbetrag (UAH/Monat)"}},
                    {"name":"payment_frequency","type":"text","required":true,"labels":{"uk":"Періодичність виплат (напр., щомісячно)","en":"Payment Frequency (e.g., monthly)", "pl":"Częstotliwość płatności (np. miesięcznie)", "de":"Zahlungshäufigkeit (z.B. monatlich)"}},
                    {"name":"payment_method","type":"textarea","required":true,"labels":{"uk":"Спосіб виплати (напр., на банківський рахунок)","en":"Payment Method (e.g., to bank account)", "pl":"Sposób wypłaty (np. na konto bankowe)", "de":"Zahlungsmethode (z.B. auf Bankkonto)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Угода про сплату аліментів',
                        'description' => 'Добровільна угода між батьками про порядок та розмір сплати аліментів на дитину.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА</h1><p style="font-size: 14px;">про сплату аліментів</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[payer_name]]</strong>, паспорт: [[payer_passport]], проживаю за адресою: [[payer_address]], надалі "Платник", з одного боку, та
                                <strong>[[recipient_name]]</strong>, паспорт: [[recipient_passport]], проживаю за адресою: [[recipient_address]], надалі "Отримувач", з іншого боку, уклали цю Угоду про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ УГОДИ</h2>
                                <p>1.1. Платник зобов\'язується сплачувати аліменти на утримання дитини <strong>[[child_name]]</strong>, [[child_dob]] року народження.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. РОЗМІР ТА ПОРЯДОК СПЛАТИ</h2>
                                <p>2.1. Розмір аліментів становить <strong>[[alimony_amount]]</strong> грн [[payment_frequency]].</p>
                                <p>2.2. Виплата аліментів здійснюється способом: [[payment_method]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ПЛАТНИК:</strong></p>
                                            <p>[[payer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[payer_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ОТРИМУВАЧ:</strong></p>
                                            <p>[[recipient_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[recipient_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Alimony Payment Agreement',
                        'description' => 'Voluntary agreement between parents on the procedure and amount of alimony payment for a child.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">AGREEMENT</h1><p style="font-size: 14px;">on alimony payment</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[payer_name]]</strong>, passport: [[payer_passport]], residing at: [[payer_address]], hereinafter "Payer", on the one hand, and
                                <strong>[[recipient_name]]</strong>, passport: [[recipient_passport]], residing at: [[recipient_address]], hereinafter "Recipient", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. The Payer undertakes to pay alimony for the maintenance of the child <strong>[[child_name]]</strong>, born on [[child_dob]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. AMOUNT AND PAYMENT PROCEDURE</h2>
                                <p>2.1. The amount of alimony is <strong>[[alimony_amount]]</strong> UAH [[payment_frequency]].</p>
                                <p>2.2. Alimony payments are made by: [[payment_method]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>PAYER:</strong></p>
                                            <p>[[payer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[payer_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>RECIPIENT:</strong></p>
                                            <p>[[recipient_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[recipient_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o płacenie alimentów',
                        'description' => 'Dobrowolna umowa między rodzicami o trybie i wysokości płacenia alimentów na dziecko.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA</h1><p style="font-size: 14px;">o płacenie alimentów</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[payer_name]]</strong>, paszport: [[payer_passport]], zamieszkały(a) pod adresem: [[payer_address]], zwany(a) dalej "Płatnikiem", z jednej strony, oraz
                                <strong>[[recipient_name]]</strong>, paszport: [[recipient_passport]], zamieszkały(a) pod adresem: [[recipient_address]], zwany(a) dalej "Odbiorcą", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Płatnik zobowiązuje się do płacenia alimentów na utrzymanie dziecka <strong>[[child_name]]</strong>, urodzonego [[child_dob]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. WYSOKOŚĆ I SPOSÓB PŁATNOŚCI</h2>
                                <p>2.1. Wysokość alimentów wynosi <strong>[[alimony_amount]]</strong> UAH [[payment_frequency]].</p>
                                <p>2.2. Wypłata alimentów odbywa się w sposób: [[payment_method]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>PŁATNIK:</strong></p>
                                            <p>[[payer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[payer_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ODBIORCA:</strong></p>
                                            <p>[[recipient_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[recipient_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Unterhaltsvereinbarung',
                        'description' => 'Freiwillige Vereinbarung zwischen Eltern über das Verfahren und die Höhe der Unterhaltszahlungen für ein Kind.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VEREINBARUNG</h1><p style="font-size: 14px;">über Unterhaltszahlungen</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[payer_name]]</strong>, Reisepass: [[payer_passport]], wohnhaft unter der Adresse: [[payer_address]], nachfolgend "Zahler" genannt, einerseits, und
                                <strong>[[recipient_name]]</strong>, Reisepass: [[recipient_passport]], wohnhaft unter der Adresse: [[recipient_address]], nachfolgend "Empfänger" genannt, andererseits, haben diese Vereinbarung wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. GEGENSTAND DER VEREINBARUNG</h2>
                                <p>1.1. Der Zahler verpflichtet sich, Unterhalt für die Pflege des Kindes <strong>[[child_name]]</strong>, geboren am [[child_dob]], zu zahlen.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. HÖHE UND ZAHLUNGSWEISE</h2>
                                <p>2.1. Die Höhe des Unterhalts beträgt <strong>[[alimony_amount]]</strong> UAH [[payment_frequency]].</p>
                                <p>2.2. Die Unterhaltszahlungen erfolgen auf folgende Weise: [[payment_method]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ZAHLER:</strong></p>
                                            <p>[[payer_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[payer_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>EMPFÄNGER:</strong></p>
                                            <p>[[recipient_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[recipient_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 15. Брачный договор (общая структура) ---
            [
                'slug' => 'marriage-contract-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"husband_name","type":"text","required":true,"labels":{"uk":"ПІБ чоловіка","en":"Husband\'s Full Name", "pl":"Imię i nazwisko męża", "de":"Vollständiger Name des Ehemanns"}},
                    {"name":"husband_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані чоловіка","en":"Husband\'s Passport Details", "pl":"Dane paszportowe męża", "de":"Passdaten des Ehemanns"}},
                    {"name":"husband_address","type":"text","required":true,"labels":{"uk":"Адреса проживання чоловіка","en":"Husband\'s residence address", "pl":"Adres zamieszkania męża", "de":"Wohnadresse des Ehemanns"}},
                    {"name":"wife_name","type":"text","required":true,"labels":{"uk":"ПІБ дружини","en":"Wife\'s Full Name", "pl":"Imię i nazwisko żony", "de":"Vollständiger Name der Ehefrau"}},
                    {"name":"wife_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані дружини","en":"Wife\'s Passport Details", "pl":"Dane paszportowe żony", "de":"Passdaten der Ehefrau"}},
                    {"name":"wife_address","type":"text","required":true,"labels":{"uk":"Адреса проживання дружини","en":"Wife\'s residence address", "pl":"Adres zamieszkania żony", "de":"Wohnadresse der Ehefrau"}},
                    {"name":"property_division_terms","type":"textarea","required":true,"labels":{"uk":"Умови поділу майна","en":"Property Division Terms", "pl":"Warunki podziału majątku", "de":"Bedingungen der Vermögensaufteilung"}},
                    {"name":"alimony_terms","type":"textarea","required":false,"labels":{"uk":"Умови утримання (аліменти, якщо є)","en":"Maintenance Terms (alimony, if any)", "pl":"Warunki utrzymania (alimenty, jeśli dotyczy)", "de":"Unterhaltsbedingungen (Unterhalt, falls zutreffend)"}},
                    {"name":"other_terms","type":"textarea","required":false,"labels":{"uk":"Інші умови (напр., щодо дітей, спадщини)","en":"Other Terms (e.g., regarding children, inheritance)", "pl":"Inne warunki (np. dotyczące dzieci, dziedziczenia)", "de":"Sonstige Bedingungen (z.B. bezüglich Kinder, Erbschaft)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Шлюбний договір (загальна структура)',
                        'description' => 'Договір, що регулює майнові відносини між подружжям, а також інші питання сімейного життя.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ШЛЮБНИЙ ДОГОВІР</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ми, <strong>[[husband_name]]</strong>, паспорт: [[husband_passport]], проживаю за адресою: [[husband_address]], надалі "Чоловік", з одного боку, та
                                <strong>[[wife_name]]</strong>, паспорт: [[wife_passport]], проживаю за адресою: [[wife_address]], надалі "Дружина", з іншого боку, уклали цей Договір про наступне:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. ПРЕДМЕТ ДОГОВОРУ</h2>
                                <p>1.1. Цей Договір регулює майнові відносини між Сторонами, а також інші питання сімейного життя.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. УМОВИ ПОДІЛУ МАЙНА</h2>
                                <p>[[property_division_terms]]</p>
                                [[alimony_terms]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. УМОВИ УТРИМАННЯ</h2>
                                <p>[[alimony_terms]]</p>[[/alimony_terms]]
                                [[other_terms]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. ІНШІ УМОВИ</h2>
                                <p>[[other_terms]]</p>[[/other_terms]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">ПІДПИСИ СТОРІН</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>ЧОЛОВІК:</strong></p>
                                            <p>[[husband_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[husband_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ДРУЖИНА:</strong></p>
                                            <p>[[wife_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[wife_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Marriage Contract (General Structure)',
                        'description' => 'An agreement regulating property relations between spouses, as well as other issues of family life.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MARRIAGE CONTRACT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We, <strong>[[husband_name]]</strong>, passport: [[husband_passport]], residing at: [[husband_address]], hereinafter "Husband", on the one hand, and
                                <strong>[[wife_name]]</strong>, passport: [[wife_passport]], residing at: [[wife_address]], hereinafter "Wife", on the other hand, have concluded this Agreement as follows:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. SUBJECT OF THE AGREEMENT</h2>
                                <p>1.1. This Agreement regulates property relations between the Parties, as well as other issues of family life.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. PROPERTY DIVISION TERMS</h2>
                                <p>[[property_division_terms]]</p>
                                [[alimony_terms]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. MAINTENANCE TERMS</h2>
                                <p>[[alimony_terms]]</p>[[/alimony_terms]]
                                [[other_terms]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. OTHER TERMS</h2>
                                <p>[[other_terms]]</p>[[/other_terms]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">SIGNATURES OF THE PARTIES</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>HUSBAND:</strong></p>
                                            <p>[[husband_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[husband_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>WIFE:</strong></p>
                                            <p>[[wife_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[wife_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa małżeńska (ogólna struktura)',
                        'description' => 'Umowa regulująca stosunki majątkowe między małżonkami, a także inne kwestie życia rodzinnego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA MAŁŻEŃSKA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>My, <strong>[[husband_name]]</strong>, paszport: [[husband_passport]], zamieszkały(a) pod adresem: [[husband_address]], zwany(a) dalej "Mężem", z jednej strony, oraz
                                <strong>[[wife_name]]</strong>, paszport: [[wife_passport]], zamieszkała(a) pod adresem: [[wife_address]], zwana(a) dalej "Żoną", z drugiej strony, zawarliśmy niniejszą Umowę:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. PRZEDMIOT UMOWY</h2>
                                <p>1.1. Niniejsza Umowa reguluje stosunki majątkowe między Stronami, a także inne kwestie życia rodzinnego.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. WARUNKI PODZIAŁU MAJĄTKU</h2>
                                <p>[[property_division_terms]]</p>
                                [[alimony_terms]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. WARUNKI UTRZYMANIA</h2>
                                <p>[[alimony_terms]]</p>[[/alimony_terms]]
                                [[other_terms]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. INNE WARUNKI</h2>
                                <p>[[other_terms]]</p>[[/other_terms]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">PODPISY STRON</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>MĄŻ:</strong></p>
                                            <p>[[husband_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[husband_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>ŻONA:</strong></p>
                                            <p>[[wife_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[wife_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Ehevertrag (allgemeine Struktur)',
                        'description' => 'Eine Vereinbarung, die die Eigentumsbeziehungen zwischen Ehegatten sowie andere Fragen des Familienlebens regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EHEVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir, <strong>[[husband_name]]</strong>, Reisepass: [[husband_passport]], wohnhaft unter der Adresse: [[husband_address]], nachfolgend "Ehemann" genannt, einerseits, und
                                <strong>[[wife_name]]</strong>, Reisepass: [[wife_passport]], wohnhaft unter der Adresse: [[wife_address]], nachfolgend "Ehefrau" genannt, andererseits, haben diesen Vertrag wie folgt geschlossen:</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">1. GEGENSTAND DES VERTRAGES</h2>
                                <p>1.1. Dieser Vertrag regelt die Eigentumsbeziehungen zwischen den Parteien sowie andere Fragen des Familienlebens.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">2. BEDINGUNGEN DER VERMÖGENSAUFTEILUNG</h2>
                                <p>[[property_division_terms]]</p>
                                [[alimony_terms]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">3. UNTERHALTSBEDINGUNGEN</h2>
                                <p>[[alimony_terms]]</p>[[/alimony_terms]]
                                [[other_terms]]<h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">4. SONSTIGE BEDINGUNGEN</h2>
                                <p>[[other_terms]]</p>[[/other_terms]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <h2 style="font-size: 14px; text-align: center; font-weight: bold;">UNTERSCHRIFTEN DER PARTEIEN</h2>
                                <table width="100%" style="margin-top: 20px; vertical-align: top;">
                                    <tr>
                                        <td width="50%" style="padding-right: 20px;">
                                            <p><strong>EHEMANN:</strong></p>
                                            <p>[[husband_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[husband_name]])</p>
                                        </td>
                                        <td width="50%" style="padding-left: 20px;">
                                            <p><strong>EHEFRAU:</strong></p>
                                            <p>[[wife_name]]</p>
                                            <br/>
                                            <p>___________________</p>
                                            <p>([[wife_name]])</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>'
                    ],
                ]
            ],

            // --- 16. Заявление о регистрации брака ---
            [
                'slug' => 'application-marriage-registration-ua',
                'fields' => '[
                    {"name":"recipient_organization","type":"text","required":true,"labels":{"uk":"Назва органу РАЦС","en":"Name of Civil Registry Office", "pl":"Nazwa USC", "de":"Name des Standesamtes"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса органу РАЦС","en":"Civil Registry Office address", "pl":"Adres USC", "de":"Adresse des Standesamtes"}},
                    {"name":"groom_name","type":"text","required":true,"labels":{"uk":"ПІБ нареченого","en":"Groom\'s Full Name", "pl":"Imię i nazwisko narzeczonego", "de":"Vollständiger Name des Bräutigams"}},
                    {"name":"groom_dob","type":"date","required":true,"labels":{"uk":"Дата народження нареченого","en":"Groom\'s Date of Birth", "pl":"Data urodzenia narzeczonego", "de":"Geburtsdatum des Bräutigams"}},
                    {"name":"groom_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані нареченого","en":"Groom\'s Passport Details", "pl":"Dane paszportowe narzeczonego", "de":"Passdaten des Bräutigams"}},
                    {"name":"groom_address","type":"text","required":true,"labels":{"uk":"Адреса проживання нареченого","en":"Groom\'s residence address", "pl":"Adres zamieszkania narzeczonego", "de":"Wohnadresse des Bräutigams"}},
                    {"name":"bride_name","type":"text","required":true,"labels":{"uk":"ПІБ нареченої","en":"Bride\'s Full Name", "pl":"Imię i nazwisko narzeczonej", "de":"Vollständiger Name der Braut"}},
                    {"name":"bride_dob","type":"date","required":true,"labels":{"uk":"Дата народження нареченої","en":"Bride\'s Date of Birth", "pl":"Data urodzenia narzeczonej", "de":"Geburtsdatum der Braut"}},
                    {"name":"bride_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані нареченої","en":"Bride\'s Passport Details", "pl":"Dane paszportowe narzeczonej", "de":"Passdaten der Braut"}},
                    {"name":"bride_address","type":"text","required":true,"labels":{"uk":"Адреса проживання нареченої","en":"Bride\'s residence address", "pl":"Adres zamieszkania narzeczonej", "de":"Wohnadresse der Braut"}},
                    {"name":"desired_marriage_date","type":"date","required":true,"labels":{"uk":"Бажана дата реєстрації шлюбу","en":"Desired Marriage Registration Date", "pl":"Preferowana data zawarcia małżeństwa", "de":"Gewünschtes Heiratsdatum"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява про реєстрацію шлюбу',
                        'description' => 'Спільна заява наречених до органів РАЦС про реєстрацію шлюбу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">від громадянина(ки) [[groom_name]]</p>
                                <p style="text-align: right;">дата народження: [[groom_dob]]</p>
                                <p style="text-align: right;">паспорт: [[groom_passport]]</p>
                                <p style="text-align: right;">адреса: [[groom_address]]</p>
                                <br/>
                                <p style="text-align: right;">та громадянки(на) [[bride_name]]</p>
                                <p style="text-align: right;">дата народження: [[bride_dob]]</p>
                                <p style="text-align: right;">паспорт: [[bride_passport]]</p>
                                <p style="text-align: right;">адреса: [[bride_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Просимо зареєструвати наш шлюб <strong>[[desired_marriage_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис нареченого: ___________________ ([[groom_name]])</p>
                                <p>Підпис нареченої: ___________________ ([[bride_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Marriage Registration',
                        'description' => 'Joint application of fiancés to the Civil Registry Office for marriage registration.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">from citizen [[groom_name]]</p>
                                <p style="text-align: right;">date of birth: [[groom_dob]]</p>
                                <p style="text-align: right;">passport: [[groom_passport]]</p>
                                <p style="text-align: right;">address: [[groom_address]]</p>
                                <br/>
                                <p style="text-align: right;">and citizen [[bride_name]]</p>
                                <p style="text-align: right;">date of birth: [[bride_dob]]</p>
                                <p style="text-align: right;">passport: [[bride_passport]]</p>
                                <p style="text-align: right;">address: [[bride_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We kindly ask to register our marriage on <strong>[[desired_marriage_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Groom\'s Signature: ___________________ ([[groom_name]])</p>
                                <p>Bride\'s Signature: ___________________ ([[bride_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o rejestrację małżeństwa',
                        'description' => 'Wspólny wniosek narzeczonych do urzędu stanu cywilnego o rejestrację małżeństwa.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">od obywatela(ki) [[groom_name]]</p>
                                <p style="text-align: right;">data urodzenia: [[groom_dob]]</p>
                                <p style="text-align: right;">paszport: [[groom_passport]]</p>
                                <p style="text-align: right;">adres: [[groom_address]]</p>
                                <br/>
                                <p style="text-align: right;">oraz obywatelki(a) [[bride_name]]</p>
                                <p style="text-align: right;">data urodzenia: [[bride_dob]]</p>
                                <p style="text-align: right;">paszport: [[bride_passport]]</p>
                                <p style="text-align: right;">adres: [[bride_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Prosimy o zarejestrowanie naszego małżeństwa w dniu <strong>[[desired_marriage_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis narzeczonego: ___________________ ([[groom_name]])</p>
                                <p>Podpis narzeczonej: ___________________ ([[bride_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Eheschließung',
                        'description' => 'Gemeinsamer Antrag der Verlobten an das Standesamt zur Eheschließung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">von Bürger [[groom_name]]</p>
                                <p style="text-align: right;">Geburtsdatum: [[groom_dob]]</p>
                                <p style="text-align: right;">Reisepass: [[groom_passport]]</p>
                                <p style="text-align: right;">Adresse: [[groom_address]]</p>
                                <br/>
                                <p style="text-align: right;">und Bürgerin [[bride_name]]</p>
                                <p style="text-align: right;">Geburtsdatum: [[bride_dob]]</p>
                                <p style="text-align: right;">Reisepass: [[bride_passport]]</p>
                                <p style="text-align: right;">Adresse: [[bride_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir bitten hiermit um die Registrierung unserer Ehe am <strong>[[desired_marriage_date]]</strong>.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Bräutigams: ___________________ ([[groom_name]])</p>
                                <p>Unterschrift der Braut: ___________________ ([[bride_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 17. Заявление о расторжении брака (в ЗАГС) ---
            [
                'slug' => 'application-divorce-registry-office-ua',
                'fields' => '[
                    {"name":"recipient_organization","type":"text","required":true,"labels":{"uk":"Назва органу РАЦС","en":"Name of Civil Registry Office", "pl":"Nazwa USC", "de":"Name des Standesamtes"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса органу РАЦС","en":"Civil Registry Office address", "pl":"Adres USC", "de":"Adresse des Standesamtes"}},
                    {"name":"husband_name","type":"text","required":true,"labels":{"uk":"ПІБ чоловіка","en":"Husband\'s Full Name", "pl":"Imię i nazwisko męża", "de":"Vollständiger Name des Ehemanns"}},
                    {"name":"husband_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані чоловіка","en":"Husband\'s Passport Details", "pl":"Dane paszportowe męża", "de":"Passdaten des Ehemanns"}},
                    {"name":"husband_address","type":"text","required":true,"labels":{"uk":"Адреса проживання чоловіка","en":"Husband\'s residence address", "pl":"Adres zamieszkania męża", "de":"Wohnadresse des Ehemanns"}},
                    {"name":"wife_name","type":"text","required":true,"labels":{"uk":"ПІБ дружини","en":"Wife\'s Full Name", "pl":"Imię i nazwisko żony", "de":"Vollständiger Name der Ehefrau"}},
                    {"name":"wife_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані дружини","en":"Wife\'s Passport Details", "pl":"Dane paszportowe żony", "de":"Passdaten der Ehefrau"}},
                    {"name":"wife_address","type":"text","required":true,"labels":{"uk":"Адреса проживання дружини","en":"Wife\'s residence address", "pl":"Adres zamieszkania żony", "de":"Wohnadresse der Ehefrau"}},
                    {"name":"marriage_registration_date","type":"date","required":true,"labels":{"uk":"Дата реєстрації шлюбу","en":"Marriage Registration Date", "pl":"Data rejestracji małżeństwa", "de":"Datum der Eheschließung"}},
                    {"name":"marriage_certificate_number","type":"text","required":true,"labels":{"uk":"Номер свідоцтва про шлюб","en":"Marriage Certificate Number", "pl":"Numer aktu małżeństwa", "de":"Nummer der Heiratsurkunde"}},
                    {"name":"children_present","type":"text","required":true,"labels":{"uk":"Наявність спільних дітей (Так/Ні)","en":"Presence of common children (Yes/No)", "pl":"Obecność wspólnych dzieci (Tak/Nie)", "de":"Vorhandensein gemeinsamer Kinder (Ja/Nein)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява про розірвання шлюбу (в РАЦС)',
                        'description' => 'Спільна заява подружжя до органів РАЦС про розірвання шлюбу за взаємною згодою (за відсутності дітей).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">від громадянина(ки) [[husband_name]]</p>
                                <p style="text-align: right;">паспорт: [[husband_passport]]</p>
                                <p style="text-align: right;">адреса: [[husband_address]]</p>
                                <br/>
                                <p style="text-align: right;">та громадянки(на) [[wife_name]]</p>
                                <p style="text-align: right;">паспорт: [[wife_passport]]</p>
                                <p style="text-align: right;">адреса: [[wife_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Просимо розірвати наш шлюб, зареєстрований [[marriage_registration_date]], свідоцтво про шлюб № [[marriage_certificate_number]].</p>
                                <p>Спільних дітей: [[children_present]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис чоловіка: ___________________ ([[husband_name]])</p>
                                <p>Підпис дружини: ___________________ ([[wife_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Divorce (to Registry Office)',
                        'description' => 'Joint application of spouses to the Civil Registry Office for divorce by mutual consent (in the absence of children).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">from citizen [[husband_name]]</p>
                                <p style="text-align: right;">passport: [[husband_passport]]</p>
                                <p style="text-align: right;">address: [[husband_address]]</p>
                                <br/>
                                <p style="text-align: right;">and citizen [[wife_name]]</p>
                                <p style="text-align: right;">passport: [[wife_passport]]</p>
                                <p style="text-align: right;">address: [[wife_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We kindly ask to dissolve our marriage, registered on [[marriage_registration_date]], marriage certificate No. [[marriage_certificate_number]].</p>
                                <p>Common children: [[children_present]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Husband\'s Signature: ___________________ ([[husband_name]])</p>
                                <p>Wife\'s Signature: ___________________ ([[wife_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o rozwód (do USC)',
                        'description' => 'Wspólny wniosek małżonków do urzędu stanu cywilnego o rozwiązanie małżeństwa za obopólną zgodą (w przypadku braku dzieci).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">od obywatela(ki) [[husband_name]]</p>
                                <p style="text-align: right;">paszport: [[husband_passport]]</p>
                                <p style="text-align: right;">adres: [[husband_address]]</p>
                                <br/>
                                <p style="text-align: right;">oraz obywatelki(a) [[wife_name]]</p>
                                <p style="text-align: right;">paszport: [[wife_passport]]</p>
                                <p style="text-align: right;">adres: [[wife_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Prosimy o rozwiązanie naszego małżeństwa, zarejestrowanego [[marriage_registration_date]], akt małżeństwa nr [[marriage_certificate_number]].</p>
                                <p>Wspólne dzieci: [[children_present]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis męża: ___________________ ([[husband_name]])</p>
                                <p>Podpis żony: ___________________ ([[wife_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Scheidung (beim Standesamt)',
                        'description' => 'Gemeinsamer Antrag der Ehegatten beim Standesamt auf Scheidung im gegenseitigen Einvernehmen (ohne Kinder).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[recipient_organization]]</p>
                                <p style="text-align: right;">[[recipient_address]]</p>
                                <br/>
                                <p style="text-align: right;">von Bürger [[husband_name]]</p>
                                <p style="text-align: right;">Reisepass: [[husband_passport]]</p>
                                <p style="text-align: right;">Adresse: [[husband_address]]</p>
                                <br/>
                                <p style="text-align: right;">und Bürgerin [[wife_name]]</p>
                                <p style="text-align: right;">Reisepass: [[wife_passport]]</p>
                                <p style="text-align: right;">Adresse: [[wife_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir bitten hiermit um die Auflösung unserer Ehe, geschlossen am [[marriage_registration_date]], Heiratsurkunde Nr. [[marriage_certificate_number]].</p>
                                <p>Gemeinsame Kinder: [[children_present]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Ehemanns: ___________________ ([[husband_name]])</p>
                                <p>Unterschrift der Ehefrau: ___________________ ([[wife_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 18. Расписка в получении денежных средств в долг ---
            [
                'slug' => 'receipt-money-debt-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"borrower_name","type":"text","required":true,"labels":{"uk":"ПІБ позичальника","en":"Borrower\'s Full Name", "pl":"Imię i nazwisko pożyczkobiorcy", "de":"Vollständiger Name des Kreditnehmers"}},
                    {"name":"borrower_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані позичальника","en":"Borrower\'s Passport Details", "pl":"Dane paszportowe pożyczkobiorcy", "de":"Passdaten des Kreditnehmers"}},
                    {"name":"borrower_address","type":"text","required":true,"labels":{"uk":"Адреса проживання позичальника","en":"Borrower\'s residence address", "pl":"Adres zamieszkania pożyczkobiorcy", "de":"Wohnadresse des Kreditnehmers"}},
                    {"name":"lender_name","type":"text","required":true,"labels":{"uk":"ПІБ позикодавця","en":"Lender\'s Full Name", "pl":"Imię i nazwisko pożyczkodawcy", "de":"Vollständiger Name des Kreditgebers"}},
                    {"name":"loan_amount","type":"number","required":true,"labels":{"uk":"Сума позики (грн)","en":"Loan Amount (UAH)", "pl":"Kwota pożyczki (UAH)", "de":"Darlehensbetrag (UAH)"}},
                    {"name":"loan_amount_text","type":"text","required":true,"labels":{"uk":"Сума позики прописом","en":"Loan Amount in Words", "pl":"Kwota pożyczki słownie", "de":"Darlehensbetrag in Worten"}},
                    {"name":"repayment_date","type":"date","required":true,"labels":{"uk":"Дата повернення позики","en":"Repayment Date", "pl":"Data zwrotu pożyczki", "de":"Rückzahlungsdatum"}},
                    {"name":"interest_rate","type":"number","required":false,"labels":{"uk":"Процентна ставка (%, якщо є)","en":"Interest Rate (%, if any)", "pl":"Oprocentowanie (%, jeśli dotyczy)", "de":"Zinssatz (%, falls zutreffend)"}},
                    {"name":"loan_purpose","type":"textarea","required":false,"labels":{"uk":"Мета позики (за бажанням)","en":"Purpose of Loan (optional)", "pl":"Cel pożyczki (opcjonalnie)", "de":"Zweck des Darlehens (optional)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Розписка в отриманні грошових коштів у борг',
                        'description' => 'Документ, що підтверджує факт отримання грошових коштів у борг та зобов\'язання їх повернути.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РОЗПИСКА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[borrower_name]]</strong>, паспорт: [[borrower_passport]], проживаю за адресою: [[borrower_address]], отримав(ла) від <strong>[[lender_name]]</strong> грошові кошти у розмірі <strong>[[loan_amount]]</strong> грн ([[loan_amount_text]]).</p>
                                <p>Зобов\'язуюсь повернути зазначену суму до <strong>[[repayment_date]]</strong>.</p>
                                [[interest_rate]]<p>За користування коштами встановлюється процентна ставка у розмірі [[interest_rate]]% річних.</p>[[/interest_rate]]
                                [[loan_purpose]]<p>Ці кошти отримані для [[loan_purpose]].</p>[[/loan_purpose]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис позичальника: ___________________ ([[borrower_name]])</p>
                                <p>Підпис позикодавця: ___________________ ([[lender_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Receipt of Money in Debt',
                        'description' => 'A document confirming the receipt of money in debt and the obligation to repay it.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECEIPT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[borrower_name]]</strong>, passport: [[borrower_passport]], residing at: [[borrower_address]], have received from <strong>[[lender_name]]</strong> funds in the amount of <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]).</p>
                                <p>I undertake to repay the specified amount by <strong>[[repayment_date]]</strong>.</p>
                                [[interest_rate]]<p>An interest rate of [[interest_rate]]% per annum is set for the use of funds.</p>[[/interest_rate]]
                                [[loan_purpose]]<p>These funds were received for [[loan_purpose]].</p>[[/loan_purpose]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Borrower\'s Signature: ___________________ ([[borrower_name]])</p>
                                <p>Lender\'s Signature: ___________________ ([[lender_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pokwitowanie odbioru środków pieniężnych w ramach pożyczki',
                        'description' => 'Dokument potwierdzający fakt otrzymania środków pieniężnych w ramach pożyczki i zobowiązanie do ich zwrotu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POKWITOWANIE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[borrower_name]]</strong>, paszport: [[borrower_passport]], zamieszkały(a) pod adresem: [[borrower_address]], otrzymałem(am) od <strong>[[lender_name]]</strong> środki pieniężne w wysokości <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]).</p>
                                <p>Zobowiązuję się zwrócić wskazaną kwotę do <strong>[[repayment_date]]</strong>.</p>
                                [[interest_rate]]<p>Za korzystanie ze środków ustala się oprocentowanie w wysokości [[interest_rate]]% rocznie.</p>[[/interest_rate]]
                                [[loan_purpose]]<p>Środki te zostały otrzymane w celu [[loan_purpose]].</p>[[/loan_purpose]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis pożyczkobiorcy: ___________________ ([[borrower_name]])</p>
                                <p>Podpis pożyczkodawcy: ___________________ ([[lender_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Quittung über den Erhalt von Geld als Darlehen',
                        'description' => 'Ein Dokument, das den Erhalt von Geld als Darlehen und die Verpflichtung zur Rückzahlung bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">QUITTUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[borrower_name]]</strong>, Reisepass: [[borrower_passport]], wohnhaft unter der Adresse: [[borrower_address]], habe von <strong>[[lender_name]]</strong> Gelder in Höhe von <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]) erhalten.</p>
                                <p>Ich verpflichte mich, den angegebenen Betrag bis zum <strong>[[repayment_date]]</strong> zurückzuzahlen.</p>
                                [[interest_rate]]<p>Für die Nutzung der Mittel wird ein Zinssatz von [[interest_rate]]% pro Jahr festgelegt.</p>[[/interest_rate]]
                                [[loan_purpose]]<p>Diese Mittel wurden für [[loan_purpose]] erhalten.</p>[[/loan_purpose]]
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Kreditnehmers: ___________________ ([[borrower_name]])</p>
                                <p>Unterschrift des Kreditgebers: ___________________ ([[lender_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 19. Расписка о возврате денежного долга ---
            [
                'slug' => 'receipt-debt-repayment-ua',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"uk":"Місто укладення","en":"City of Signing", "pl":"Miejscowość zawarcia", "de":"Ort der Unterzeichnung"}},
                    {"name":"lender_name","type":"text","required":true,"labels":{"uk":"ПІБ позикодавця","en":"Lender\'s Full Name", "pl":"Imię i nazwisko pożyczkodawcy", "de":"Vollständiger Name des Kreditgebers"}},
                    {"name":"borrower_name","type":"text","required":true,"labels":{"uk":"ПІБ позичальника","en":"Borrower\'s Full Name", "pl":"Imię i nazwisko pożyczkobiorcy", "de":"Vollständiger Name des Kreditnehmers"}},
                    {"name":"repayment_amount","type":"number","required":true,"labels":{"uk":"Сума повернення (грн)","en":"Repayment Amount (UAH)", "pl":"Kwota zwrotu (UAH)", "de":"Rückzahlungsbetrag (UAH)"}},
                    {"name":"repayment_amount_text","type":"text","required":true,"labels":{"uk":"Сума повернення прописом","en":"Repayment Amount in Words", "pl":"Kwota zwrotu słownie", "de":"Rückzahlungsbetrag in Worten"}},
                    {"name":"loan_date","type":"date","required":true,"labels":{"uk":"Дата отримання позики","en":"Loan Date", "pl":"Data otrzymania pożyczki", "de":"Datum des Darlehens"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Розписка про повернення грошового боргу',
                        'description' => 'Документ, що підтверджує повне або часткове повернення грошового боргу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РОЗПИСКА</h1><p style="font-size: 14px;">про повернення грошового боргу</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>м. [[city]]</p></td><td style="text-align: right;"><p>[[current_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, <strong>[[lender_name]]</strong>, підтверджую отримання від <strong>[[borrower_name]]</strong> грошових коштів у розмірі <strong>[[repayment_amount]]</strong> грн ([[repayment_amount_text]]) в якості повернення боргу за розпискою від [[loan_date]].</p>
                                <p>Претензій щодо повернення боргу не маю.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Підпис позикодавця: ___________________ ([[lender_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Receipt of Debt Repayment',
                        'description' => 'A document confirming full or partial repayment of a monetary debt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECEIPT</h1><p style="font-size: 14px;">of debt repayment</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, <strong>[[lender_name]]</strong>, confirm receipt from <strong>[[borrower_name]]</strong> of funds in the amount of <strong>[[repayment_amount]]</strong> UAH ([[repayment_amount_text]]) as repayment of debt under the receipt dated [[loan_date]].</p>
                                <p>I have no claims regarding debt repayment.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Lender\'s Signature: ___________________ ([[lender_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Pokwitowanie zwrotu długu pieniężnego',
                        'description' => 'Dokument potwierdzający całkowity lub częściowy zwrot długu pieniężnego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POKWITOWANIE</h1><p style="font-size: 14px;">zwrotu długu pieniężnego</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, <strong>[[lender_name]]</strong>, potwierdzam otrzymanie od <strong>[[borrower_name]]</strong> środków pieniężnych w wysokości <strong>[[repayment_amount]]</strong> UAH ([[repayment_amount_text]]) jako zwrot długu z pokwitowania z dnia [[loan_date]].</p>
                                <p>Nie mam roszczeń dotyczących zwrotu długu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis pożyczkodawcy: ___________________ ([[lender_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Quittung über die Rückzahlung von Geldschulden',
                        'description' => 'Ein Dokument, das die vollständige oder teilweise Rückzahlung einer Geldschuld bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">QUITTUNG</h1><p style="font-size: 14px;">über die Rückzahlung von Geldschulden</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: [[current_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, <strong>[[lender_name]]</strong>, bestätige den Erhalt von <strong>[[borrower_name]]</strong> von Geldern in Höhe von <strong>[[repayment_amount]]</strong> UAH ([[repayment_amount_text]]) als Rückzahlung der Schuld gemäß der Quittung vom [[loan_date]].</p>
                                <p>Ich habe keine Ansprüche bezüglich der Rückzahlung der Schuld.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift des Kreditgebers: ___________________ ([[lender_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 20. Досудебная претензия о возврате долга ---
            [
                'slug' => 'pre-trial-claim-debt-ua',
                'fields' => '[
                    {"name":"claimant_name","type":"text","required":true,"labels":{"uk":"ПІБ кредитора","en":"Creditor\'s Full Name", "pl":"Imię i nazwisko wierzyciela", "de":"Vollständiger Name des Gläubigers"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"uk":"Адреса кредитора","en":"Creditor\'s address", "pl":"Adres wierzyciela", "de":"Adresse des Gläubigers"}},
                    {"name":"debtor_name","type":"text","required":true,"labels":{"uk":"ПІБ боржника","en":"Debtor\'s Full Name", "pl":"Imię i nazwisko dłużnika", "de":"Vollständiger Name des Schuldners"}},
                    {"name":"debtor_address","type":"text","required":true,"labels":{"uk":"Адреса боржника","en":"Debtor\'s address", "pl":"Adres dłużnika", "de":"Adresse des Schuldners"}},
                    {"name":"loan_date","type":"date","required":true,"labels":{"uk":"Дата отримання позики","en":"Loan Date", "pl":"Data otrzymania pożyczki", "de":"Datum des Darlehens"}},
                    {"name":"loan_amount","type":"number","required":true,"labels":{"uk":"Сума позики (грн)","en":"Loan Amount (UAH)", "pl":"Kwota pożyczki (UAH)", "de":"Darlehensbetrag (UAH)"}},
                    {"name":"loan_amount_text","type":"text","required":true,"labels":{"uk":"Сума позики прописом","en":"Loan Amount in Words", "pl":"Kwota pożyczki słownie", "de":"Darlehensbetrag in Worten"}},
                    {"name":"repayment_date_due","type":"date","required":true,"labels":{"uk":"Дата повернення за договором/розпискою","en":"Repayment Date (as per agreement/receipt)", "pl":"Data zwrotu (zgodnie z umową/pokwitowaniem)", "de":"Rückzahlungsdatum (gemäß Vertrag/Quittung)"}},
                    {"name":"debt_amount","type":"number","required":true,"labels":{"uk":"Сума заборгованості (грн)","en":"Debt Amount (UAH)", "pl":"Kwota zadłużenia (UAH)", "de":"Schuldsumme (UAH)"}},
                    {"name":"debt_amount_text","type":"text","required":true,"labels":{"uk":"Сума заборгованості прописом","en":"Debt Amount in Words", "pl":"Kwota zadłużenia słownie", "de":"Schuldsumme in Worten"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Ваші вимоги (напр., повернути суму боргу, сплатити проценти)","en":"Your demands (e.g., repay debt amount, pay interest)", "pl":"Twoje żądania (np. zwrot kwoty długu, zapłata odsetek)", "de":"Ihre Forderungen (z.B. Rückzahlung des Schuldbetrags, Zinszahlung)"}},
                    {"name":"response_deadline_days","type":"number","required":true,"labels":{"uk":"Термін для відповіді (днів)","en":"Response Deadline (days)", "pl":"Termin odpowiedzi (dni)", "de":"Antwortfrist (Tage)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Досудова претензія про повернення боргу',
                        'description' => 'Офіційна претензія до боржника з вимогою повернути грошовий борг до звернення до суду.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Кому: [[debtor_name]]</p>
                                <p style="text-align: right;">[[debtor_address]]</p>
                                <br/>
                                <p style="text-align: right;">Від: [[claimant_name]]</p>
                                <p style="text-align: right;">[[claimant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ДОСУДОВА ПРЕТЕНЗІЯ</h1>
                                <p style="text-align: center;">про повернення боргу</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Між мною, [[claimant_name]], та Вами, [[debtor_name]], [[loan_date]] року було укладено договір позики/отримано розписку на суму <strong>[[loan_amount]]</strong> грн ([[loan_amount_text]]).</p>
                                <p>Згідно з умовами договору/розписки, Ви зобов\'язані були повернути борг до [[repayment_date_due]]. Однак, станом на [[current_date]], сума заборгованості становить <strong>[[debt_amount]]</strong> грн ([[debt_amount_text]]).</p>
                                <p>На підставі вищевикладеного, вимагаю: [[demands]].</p>
                                <p>Прошу розглянути цю претензію та надати письмову відповідь у строк до [[response_deadline_days]] календарних днів з моменту її отримання. У разі невиконання вимог, буду змушений(а) звернутися до суду.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[claimant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Pre-Trial Claim for Debt Repayment',
                        'description' => 'Official claim to the debtor demanding repayment of a monetary debt before going to court.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To: [[debtor_name]]</p>
                                <p style="text-align: right;">[[debtor_address]]</p>
                                <br/>
                                <p style="text-align: right;">From: [[claimant_name]]</p>
                                <p style="text-align: right;">[[claimant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">PRE-TRIAL CLAIM</h1>
                                <p style="text-align: center;">for debt repayment</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Between me, [[claimant_name]], and you, [[debtor_name]], on [[loan_date]], a loan agreement was concluded/receipt was issued for the amount of <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]).</p>
                                <p>According to the terms of the agreement/receipt, you were obliged to repay the debt by [[repayment_date_due]]. However, as of [[current_date]], the outstanding debt amounts to <strong>[[debt_amount]]</strong> UAH ([[debt_amount_text]]).</p>
                                <p>Based on the above, I demand: [[demands]].</p>
                                <p>Please consider this claim and provide a written response within [[response_deadline_days]] calendar days from its receipt. In case of non-fulfillment of the demands, I will be forced to apply to court.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[claimant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Przedsądowe wezwanie do zapłaty długu',
                        'description' => 'Oficjalne wezwanie do dłużnika z żądaniem zwrotu długu pieniężnego przed skierowaniem sprawy do sądu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do: [[debtor_name]]</p>
                                <p style="text-align: right;">[[debtor_address]]</p>
                                <br/>
                                <p style="text-align: right;">Od: [[claimant_name]]</p>
                                <p style="text-align: right;">[[claimant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">PRZEDSĄDOWE WEZWANIE DO ZAPŁATY</h1>
                                <p style="text-align: center;">o zwrot długu</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Między mną, [[claimant_name]], a Panem/Panią, [[debtor_name]], w dniu [[loan_date]] została zawarta umowa pożyczki/otrzymano pokwitowanie na kwotę <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]).</p>
                                <p>Zgodnie z warunkami umowy/pokwitowania, był(a) Pan/Pani zobowiązany(a) do zwrotu długu do [[repayment_date_due]]. Jednakże, na dzień [[current_date]], kwota zadłużenia wynosi <strong>[[debt_amount]]</strong> UAH ([[debt_amount_text]]).</p>
                                <p>Na podstawie powyższego, żądam: [[demands]].</p>
                                <p>Proszę o rozpatrzenie niniejszego wezwania i udzielenie pisemnej odpowiedzi w terminie [[response_deadline_days]] dni kalendarzowych od daty jego otrzymania. W przypadku niewypełnienia żądań, będę zmuszony(a) skierować sprawę do sądu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Podpis: ___________________ ([[claimant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Außergerichtliche Forderung zur Rückzahlung von Schulden',
                        'description' => 'Offizielle Forderung an den Schuldner zur Rückzahlung einer Geldschuld vor gerichtlicher Klärung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An: [[debtor_name]]</p>
                                <p style="text-align: right;">[[debtor_address]]</p>
                                <br/>
                                <p style="text-align: right;">Von: [[claimant_name]]</p>
                                <p style="text-align: right;">[[claimant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">AUSSERGERICHTLICHE FORDERUNG</h1>
                                <p style="text-align: center;">zur Rückzahlung von Schulden</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwischen mir, [[claimant_name]], und Ihnen, [[debtor_name]], wurde am [[loan_date]] ein Darlehensvertrag geschlossen/eine Quittung über den Betrag von <strong>[[loan_amount]]</strong> UAH ([[loan_amount_text]]) ausgestellt.</p>
                                <p>Gemäß den Vertrags-/Quittungsbedingungen waren Sie verpflichtet, die Schuld bis zum [[repayment_date_due]] zurückzuzahlen. Zum [[current_date]] beträgt der ausstehende Schuldbetrag jedoch <strong>[[debt_amount]]</strong> UAH ([[debt_amount_text]]).</p>
                                <p>Aufgrund des oben Gesagten fordere ich: [[demands]].</p>
                                <p>Bitte prüfen Sie diese Forderung und geben Sie innerhalb von [[response_deadline_days]] Kalendertagen nach Erhalt eine schriftliche Antwort. Im Falle der Nichterfüllung der Forderungen werde ich gezwungen sein, gerichtliche Schritte einzuleiten.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[claimant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 21. Заявление в банк на реструктуризацию кредита ---
            [
                'slug' => 'application-loan-restructuring-ua',
                'fields' => '[
                    {"name":"bank_name","type":"text","required":true,"labels":{"uk":"Назва банку","en":"Bank Name", "pl":"Nazwa banku", "de":"Bankname"}},
                    {"name":"bank_address","type":"text","required":true,"labels":{"uk":"Адреса банку","en":"Bank address", "pl":"Adres banku", "de":"Bankadresse"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_passport","type":"text","required":true,"labels":{"uk":"Паспортні дані заявника","en":"Applicant\'s Passport Details", "pl":"Dane paszportowe wnioskodawcy", "de":"Passdaten des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"uk":"Адреса проживання заявника","en":"Applicant\'s residence address", "pl":"Adres zamieszkania wnioskodawcy", "de":"Wohnadresse des Antragstellers"}},
                    {"name":"loan_agreement_number","type":"text","required":true,"labels":{"uk":"Номер кредитного договору","en":"Loan Agreement Number", "pl":"Numer umowy kredytowej", "de":"Darlehensvertragsnummer"}},
                    {"name":"loan_agreement_date","type":"date","required":true,"labels":{"uk":"Дата кредитного договору","en":"Loan Agreement Date", "pl":"Data umowy kredytowej", "de":"Datum des Darlehensvertrags"}},
                    {"name":"outstanding_debt","type":"number","required":true,"labels":{"uk":"Сума залишку заборгованості (грн)","en":"Outstanding Debt Amount (UAH)", "pl":"Kwota pozostałego zadłużenia (UAH)", "de":"Höhe der Restschuld (UAH)"}},
                    {"name":"restructuring_reason","type":"textarea","required":true,"labels":{"uk":"Причина реструктуризації","en":"Reason for Restructuring", "pl":"Przyczyna restrukturyzacji", "de":"Grund für die Umstrukturierung"}},
                    {"name":"proposed_terms","type":"textarea","required":true,"labels":{"uk":"Пропоновані умови реструктуризації","en":"Proposed Restructuring Terms", "pl":"Proponowane warunki restrukturyzacji", "de":"Vorgeschlagene Umstrukturierungsbedingungen"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява в банк на реструктуризацію кредиту',
                        'description' => 'Заява позичальника до банку з проханням про зміну умов кредитного договору.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[bank_name]]</p>
                                <p style="text-align: right;">[[bank_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">паспорт: [[applicant_passport]]</p>
                                <p style="text-align: right;">адреса: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу розглянути можливість реструктуризації кредитного договору № [[loan_agreement_number]] від [[loan_agreement_date]].</p>
                                <p>Сума залишку заборгованості становить <strong>[[outstanding_debt]]</strong> грн.</p>
                                <p>Причина реструктуризації: [[restructuring_reason]].</p>
                                <p>Пропоновані умови: [[proposed_terms]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application to Bank for Loan Restructuring',
                        'description' => 'Borrower\'s application to the bank requesting changes to the loan agreement terms.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[bank_name]]</p>
                                <p style="text-align: right;">[[bank_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">passport: [[applicant_passport]]</p>
                                <p style="text-align: right;">address: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to consider the possibility of restructuring loan agreement No. [[loan_agreement_number]] dated [[loan_agreement_date]].</p>
                                <p>The outstanding debt amounts to <strong>[[outstanding_debt]]</strong> UAH.</p>
                                <p>Reason for restructuring: [[restructuring_reason]].</p>
                                <p>Proposed terms: [[proposed_terms]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek do banku o restrukturyzację kredytu',
                        'description' => 'Wniosek kredytobiorcy do banku o zmianę warunków umowy kredytowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[bank_name]]</p>
                                <p style="text-align: right;">[[bank_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">paszport: [[applicant_passport]]</p>
                                <p style="text-align: right;">adres: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o rozpatrzenie możliwości restrukturyzacji umowy kredytowej nr [[loan_agreement_number]] z dnia [[loan_agreement_date]].</p>
                                <p>Kwota pozostałego zadłużenia wynosi <strong>[[outstanding_debt]]</strong> UAH.</p>
                                <p>Przyczyna restrukturyzacji: [[restructuring_reason]].</p>
                                <p>Proponowane warunki: [[proposed_terms]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag an die Bank auf Kreditrestrukturierung',
                        'description' => 'Antrag des Kreditnehmers an die Bank auf Änderung der Darlehensvertragsbedingungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[bank_name]]</p>
                                <p style="text-align: right;">[[bank_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">Reisepass: [[applicant_passport]]</p>
                                <p style="text-align: right;">Adresse: [[applicant_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Prüfung der Möglichkeit einer Restrukturierung des Darlehensvertrags Nr. [[loan_agreement_number]] vom [[loan_agreement_date]].</p>
                                <p>Der ausstehende Schuldbetrag beläuft sich auf <strong>[[outstanding_debt]]</strong> UAH.</p>
                                <p>Grund für die Restrukturierung: [[restructuring_reason]].</p>
                                <p>Vorgeschlagene Bedingungen: [[proposed_terms]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 22. Заявление в банк о спорной транзакции (чарджбэк) ---
            [
                'slug' => 'application-chargeback-ua',
                'fields' => '[
                    {"name":"bank_name","type":"text","required":true,"labels":{"uk":"Назва банку","en":"Bank Name", "pl":"Nazwa banku", "de":"Bankname"}},
                    {"name":"bank_address","type":"text","required":true,"labels":{"uk":"Адреса банку","en":"Bank address", "pl":"Adres banku", "de":"Bankadresse"}},
                    {"name":"applicant_name","type":"text","required":true,"labels":{"uk":"ПІБ заявника","en":"Applicant\'s Full Name", "pl":"Imię i nazwisko wnioskodawcy", "de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_account_number","type":"text","required":true,"labels":{"uk":"Номер рахунку/картки заявника","en":"Applicant\'s Account/Card Number", "pl":"Numer konta/karty wnioskodawcy", "de":"Kontonummer/Kartennummer des Antragstellers"}},
                    {"name":"transaction_date","type":"date","required":true,"labels":{"uk":"Дата спірної транзакції","en":"Disputed Transaction Date", "pl":"Data spornej transakcji", "de":"Datum der strittigen Transaktion"}},
                    {"name":"transaction_amount","type":"number","required":true,"labels":{"uk":"Сума спірної транзакції (грн)","en":"Disputed Transaction Amount (UAH)", "pl":"Kwota spornej transakcji (UAH)", "de":"Betrag der strittigen Transaktion (UAH)"}},
                    {"name":"transaction_recipient","type":"text","required":true,"labels":{"uk":"Отримувач транзакції","en":"Transaction Recipient", "pl":"Odbiorca transakcji", "de":"Empfänger der Transaktion"}},
                    {"name":"reason_for_dispute","type":"textarea","required":true,"labels":{"uk":"Причина оскарження (напр., послуга не надана, товар не отриманий, шахрайство)","en":"Reason for Dispute (e.g., service not provided, goods not received, fraud)", "pl":"Przyczyna sporu (np. usługa nie świadczona, towar nie otrzymany, oszustwo)", "de":"Grund des Einspruchs (z.B. Dienstleistung nicht erbracht, Ware nicht erhalten, Betrug)"}},
                    {"name":"supporting_documents","type":"textarea","required":false,"labels":{"uk":"Додатки (копії чеків, скріншоти)","en":"Attachments (copies of receipts, screenshots)", "pl":"Załączniki (kopie paragonów, zrzuty ekranu)", "de":"Anhänge (Kopien von Belegen, Screenshots)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява в банк про спірну транзакцію (чарджбек)',
                        'description' => 'Заява до банку з проханням про відміну або оскарження транзакції (чарджбек).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">До [[bank_name]]</p>
                                <p style="text-align: right;">[[bank_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[applicant_name]]</p>
                                <p style="text-align: right;">номер рахунку/картки: [[applicant_account_number]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу здійснити процедуру чарджбеку (оскарження) транзакції, що відбулася [[transaction_date]], на суму <strong>[[transaction_amount]]</strong> грн, отримувач: [[transaction_recipient]].</p>
                                <p>Причина оскарження: [[reason_for_dispute]].</p>
                                [[supporting_documents]]<p>Додатки: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application to Bank for Disputed Transaction (Chargeback)',
                        'description' => 'Application to the bank requesting cancellation or dispute of a transaction (chargeback).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To [[bank_name]]</p>
                                <p style="text-align: right;">[[bank_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[applicant_name]]</p>
                                <p style="text-align: right;">account/card number: [[applicant_account_number]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to initiate a chargeback procedure for the transaction that occurred on [[transaction_date]], for the amount of <strong>[[transaction_amount]]</strong> UAH, recipient: [[transaction_recipient]].</p>
                                <p>Reason for dispute: [[reason_for_dispute]].</p>
                                [[supporting_documents]]<p>Attachments: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek do banku o sporną transakcję (chargeback)',
                        'description' => 'Wniosek do banku o anulowanie lub zakwestionowanie transakcji (chargeback).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do [[bank_name]]</p>
                                <p style="text-align: right;">[[bank_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[applicant_name]]</p>
                                <p style="text-align: right;">numer konta/karty: [[applicant_account_number]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o wszczęcie procedury chargebacku (zakwestionowania) transakcji, która miała miejsce w dniu [[transaction_date]], na kwotę <strong>[[transaction_amount]]</strong> UAH, odbiorca: [[transaction_recipient]].</p>
                                <p>Przyczyna sporu: [[reason_for_dispute]].</p>
                                [[supporting_documents]]<p>Załączniki: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag an die Bank auf strittige Transaktion (Chargeback)',
                        'description' => 'Antrag an die Bank auf Stornierung oder Anfechtung einer Transaktion (Chargeback).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An [[bank_name]]</p>
                                <p style="text-align: right;">[[bank_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[applicant_name]]</p>
                                <p style="text-align: right;">Konto-/Kartennummer: [[applicant_account_number]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Einleitung eines Chargeback-Verfahrens für die Transaktion vom [[transaction_date]] über den Betrag von <strong>[[transaction_amount]]</strong> UAH, Empfänger: [[transaction_recipient]].</p>
                                <p>Grund des Einspruchs: [[reason_for_dispute]].</p>
                                [[supporting_documents]]<p>Anhänge: [[supporting_documents]].</p>[[/supporting_documents]]
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[applicant_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 23. Заявление на возврат товара надлежащего качества ---
            [
                'slug' => 'application-goods-return-ua',
                'fields' => '[
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"Назва продавця","en":"Seller Name", "pl":"Nazwa sprzedawcy", "de":"Verkäufername"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"uk":"Адреса продавця","en":"Seller Address", "pl":"Adres sprzedawcy", "de":"Verkäuferadresse"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"ПІБ покупця","en":"Buyer Full Name", "pl":"Imię i nazwisko nabywcy", "de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"uk":"Адреса покупця","en":"Buyer Address", "pl":"Adres nabywcy", "de":"Käuferadresse"}},
                    {"name":"product_name","type":"text","required":true,"labels":{"uk":"Назва товару","en":"Product Name", "pl":"Nazwa towaru", "de":"Produktname"}},
                    {"name":"purchase_date","type":"date","required":true,"labels":{"uk":"Дата покупки","en":"Purchase Date", "pl":"Data zakupu", "de":"Kaufdatum"}},
                    {"name":"purchase_amount","type":"number","required":true,"labels":{"uk":"Вартість товару (грн)","en":"Product Cost (UAH)", "pl":"Wartość towaru (UAH)", "de":"Warenwert (UAH)"}},
                    {"name":"return_reason","type":"textarea","required":true,"labels":{"uk":"Причина повернення (напр., не підійшов за розміром, кольором)","en":"Reason for Return (e.g., wrong size, color)", "pl":"Przyczyna zwrotu (np. nie pasuje rozmiar, kolor)", "de":"Grund der Rücksendung (z.B. falsche Größe, Farbe)"}},
                    {"name":"payment_method","type":"text","required":true,"labels":{"uk":"Спосіб повернення коштів (напр., на банківську картку)","en":"Refund Method (e.g., to bank card)", "pl":"Sposób zwrotu środków (np. na kartę bankową)", "de":"Rückerstattungsmethode (z.B. auf Bankkarte)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Заява на повернення товару належної якості',
                        'description' => 'Заява покупця до продавця про повернення товару належної якості.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[seller_name]]</p>
                                <p style="text-align: right;">[[seller_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[buyer_name]]</p>
                                <p style="text-align: right;">який(а) проживає за адресою: [[buyer_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ЗАЯВА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Прошу прийняти до повернення товар [[product_name]], придбаний [[purchase_date]] року, вартістю <strong>[[purchase_amount]]</strong> грн.</p>
                                <p>Причина повернення: [[return_reason]].</p>
                                <p>Прошу повернути кошти способом: [[payment_method]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[buyer_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Return of Goods of Proper Quality',
                        'description' => 'Buyer\'s application to the seller for the return of goods of proper quality.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[seller_name]]</p>
                                <p style="text-align: right;">[[seller_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[buyer_name]]</p>
                                <p style="text-align: right;">residing at: [[buyer_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I kindly ask to accept the return of the product [[product_name]], purchased on [[purchase_date]], costing <strong>[[purchase_amount]]</strong> UAH.</p>
                                <p>Reason for return: [[return_reason]].</p>
                                <p>Please refund the money by: [[payment_method]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Signature: ___________________ ([[buyer_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o zwrot towaru pełnowartościowego',
                        'description' => 'Wniosek kupującego do sprzedawcy o zwrot towaru pełnowartościowego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[seller_name]]</p>
                                <p style="text-align: right;">[[seller_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[buyer_name]]</p>
                                <p style="text-align: right;">zamieszkałego pod adresem: [[buyer_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">WNIOSEK</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Proszę o przyjęcie zwrotu towaru [[product_name]], zakupionego w dniu [[purchase_date]], o wartości <strong>[[purchase_amount]]</strong> UAH.</p>
                                <p>Przyczyna zwrotu: [[return_reason]].</p>
                                <p>Proszę o zwrot środków w sposób: [[payment_method]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[buyer_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Rückgabe von Waren einwandfreier Qualität',
                        'description' => 'Antrag des Käufers an den Verkäufer auf Rückgabe von Waren einwandfreier Qualität.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[seller_name]]</p>
                                <p style="text-align: right;">[[seller_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[buyer_name]]</p>
                                <p style="text-align: right;">wohnhaft unter der Adresse: [[buyer_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ANTRAG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich beantrage hiermit die Rücknahme des Produkts [[product_name]], gekauft am [[purchase_date]], im Wert von <strong>[[purchase_amount]]</strong> UAH.</p>
                                <p>Grund der Rücksendung: [[return_reason]].</p>
                                <p>Bitte erstatten Sie den Betrag auf folgende Weise: [[payment_method]].</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Unterschrift: ___________________ ([[buyer_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 24. Претензия на некачественный товар ---
            [
                'slug' => 'claim-defective-goods-ua',
                'fields' => '[
                    {"name":"seller_name","type":"text","required":true,"labels":{"uk":"Назва продавця","en":"Seller Name", "pl":"Nazwa sprzedawcy", "de":"Verkäufername"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"uk":"Адреса продавця","en":"Seller Address", "pl":"Adres sprzedawcy", "de":"Verkäuferadresse"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"uk":"ПІБ покупця","en":"Buyer Full Name", "pl":"Imię i nazwisko nabywcy", "de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"uk":"Адреса покупця","en":"Buyer Address", "pl":"Adres nabywcy", "de":"Käuferadresse"}},
                    {"name":"product_name","type":"text","required":true,"labels":{"uk":"Назва товару","en":"Product Name", "pl":"Nazwa towaru", "de":"Produktname"}},
                    {"name":"purchase_date","type":"date","required":true,"labels":{"uk":"Дата покупки","en":"Purchase Date", "pl":"Data zakupu", "de":"Kaufdatum"}},
                    {"name":"product_cost","type":"number","required":true,"labels":{"uk":"Вартість товару (грн)","en":"Product Cost (UAH)", "pl":"Wartość towaru (UAH)", "de":"Warenwert (UAH)"}},
                    {"name":"defect_description","type":"textarea","required":true,"labels":{"uk":"Опис недоліків товару","en":"Description of Product Defects", "pl":"Opis wad towaru", "de":"Beschreibung der Produktmängel"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"uk":"Ваші вимоги (напр., обмін товару, повернення коштів, ремонт)","en":"Your Demands (e.g., product exchange, refund, repair)", "pl":"Twoje żądania (np. wymiana towaru, zwrot pieniędzy, naprawa)", "de":"Ihre Forderungen (z.B. Produktaustausch, Rückerstattung, Reparatur)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Претензія на неякісний товар',
                        'description' => 'Офіційна претензія покупця до продавця щодо неякісного товару.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Директору [[seller_name]]</p>
                                <p style="text-align: right;">[[seller_address]]</p>
                                <br/>
                                <p style="text-align: right;">від [[buyer_name]]</p>
                                <p style="text-align: right;">який(а) проживає за адресою: [[buyer_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">ПРЕТЕНЗІЯ</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Мною, [[buyer_name]], [[purchase_date]] року був придбаний товар [[product_name]], вартістю <strong>[[product_cost]]</strong> грн.</p>
                                <p>Під час експлуатації виявлено наступні недоліки: [[defect_description]].</p>
                                <p>На підставі Закону України "Про захист прав споживачів", вимагаю: [[demands]].</p>
                                <p>У разі відмови, буду змушений(а) звернутися до суду.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Підпис: ___________________ ([[buyer_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Claim for Defective Goods',
                        'description' => 'Official claim from the buyer to the seller regarding defective goods.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">To the Director of [[seller_name]]</p>
                                <p style="text-align: right;">[[seller_address]]</p>
                                <br/>
                                <p style="text-align: right;">from [[buyer_name]]</p>
                                <p style="text-align: right;">residing at: [[buyer_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">CLAIM</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>On [[purchase_date]], I, [[buyer_name]], purchased the product [[product_name]], costing <strong>[[product_cost]]</strong> UAH.</p>
                                <p>During use, the following defects were found: [[defect_description]].</p>
                                <p>Based on the Law of Ukraine "On Consumer Rights Protection", I demand: [[demands]].</p>
                                <p>In case of refusal, I will be forced to apply to court.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Signature: ___________________ ([[buyer_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Reklamacja towaru wadliwego',
                        'description' => 'Oficjalna reklamacja kupującego do sprzedawcy dotycząca towaru wadliwego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Do Dyrektora [[seller_name]]</p>
                                <p style="text-align: right;">[[seller_address]]</p>
                                <br/>
                                <p style="text-align: right;">od [[buyer_name]]</p>
                                <p style="text-align: right;">zamieszkałego pod adresem: [[buyer_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">REKLAMACJA</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, [[buyer_name]], w dniu [[purchase_date]] zakupiłem(am) towar [[product_name]], o wartości <strong>[[product_cost]]</strong> UAH.</p>
                                <p>W trakcie użytkowania stwierdzono następujące wady: [[defect_description]].</p>
                                <p>Na podstawie Ustawy Ukrainy "O ochronie praw konsumentów", żądam: [[demands]].</p>
                                <p>W przypadku odmowy, będę zmuszony(a) skierować sprawę do sądu.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>Podpis: ___________________ ([[buyer_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Mängelrüge für mangelhafte Ware',
                        'description' => 'Offizielle Reklamation des Käufers an den Verkäufer bezüglich mangelhafter Ware.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">An den Direktor von [[seller_name]]</p>
                                <p style="text-align: right;">[[seller_address]]</p>
                                <br/>
                                <p style="text-align: right;">von [[buyer_name]]</p>
                                <p style="text-align: right;">wohnhaft unter der Adresse: [[buyer_address]]</p>
                                <br/>
                                <h1 style="font-size: 20px; font-weight: bold; text-align: center;">MÄNGELRÜGE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, [[buyer_name]], habe am [[purchase_date]] das Produkt [[product_name]] zum Preis von <strong>[[product_cost]]</strong> UAH erworben.</p>
                                <p>Während der Nutzung wurden folgende Mängel festgestellt: [[defect_description]].</p>
                                <p>Auf der Grundlage des Gesetzes der Ukraine "Über den Verbraucherschutz" fordere ich: [[demands]].</p>
                                <p>Im Falle der Ablehnung werde ich gezwungen sein, gerichtliche Schritte einzuleiten.</p>
                                <br/>
                                <p>[[current_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>Unterschrift: ___________________ ([[buyer_name]])</p>
                            </div>'
                    ],
                ]
            ],

            // --- 25. Бюджет на месяц (личный/семейный) ---
            [
                'slug' => 'monthly-budget-ua',
                'fields' => '[
                    {"name":"budget_type","type":"text","required":true,"labels":{"uk":"Тип бюджету (особистий/сімейний)","en":"Budget Type (personal/family)", "pl":"Typ budżetu (osobisty/rodzinny)", "de":"Budgettyp (persönlich/Familie)"}},
                    {"name":"month_year","type":"text","required":true,"labels":{"uk":"Місяць, рік","en":"Month, Year", "pl":"Miesiąc, Rok", "de":"Monat, Jahr"}},
                    {"name":"income_list","type":"textarea","required":true,"labels":{"uk":"Доходи (Джерело, Сума)","en":"Income (Source, Amount)", "pl":"Przychody (Źródło, Kwota)", "de":"Einnahmen (Quelle, Betrag)"}},
                    {"name":"total_income","type":"number","required":true,"labels":{"uk":"Всього доходів (грн)","en":"Total Income (UAH)", "pl":"Łączne przychody (UAH)", "de":"Gesamteinnahmen (UAH)"}},
                    {"name":"expenses_list","type":"textarea","required":true,"labels":{"uk":"Витрати (Категорія, Сума)","en":"Expenses (Category, Amount)", "pl":"Wydatki (Kategoria, Kwota)", "de":"Ausgaben (Kategorie, Betrag)"}},
                    {"name":"total_expenses","type":"number","required":true,"labels":{"uk":"Всього витрат (грн)","en":"Total Expenses (UAH)", "pl":"Łączne wydatki (UAH)", "de":"Gesamtausgaben (UAH)"}},
                    {"name":"balance","type":"number","required":true,"labels":{"uk":"Залишок (Доходи - Витрати)","en":"Balance (Income - Expenses)", "pl":"Saldo (Przychody - Wydatki)", "de":"Saldo (Einnahmen - Ausgaben)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Бюджет на місяць (особистий/сімейний)',
                        'description' => 'Документ для планування та обліку доходів і витрат за місяць.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">БЮДЖЕТ НА МІСЯЦЬ</h1><p>[[budget_type]]</p><p>за [[month_year]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ДОХОДИ</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Джерело</th>
                                            <th>Сума (грн)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>Зарплата</td><td>15000.00</td></tr> -->
                                        [[income_list]]
                                    </tbody>
                                </table>
                                <p style="text-align: right;"><strong>Всього доходів: [[total_income]] грн.</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">ВИТРАТИ</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Категорія</th>
                                            <th>Сума (грн)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Пример строки: <tr><td>Продукти</td><td>5000.00</td></tr> -->
                                        [[expenses_list]]
                                    </tbody>
                                </table>
                                <p style="text-align: right;"><strong>Всього витрат: [[total_expenses]] грн.</strong></p>
                                <br/>
                                <p style="text-align: right;"><strong>Залишок: [[balance]] грн.</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Monthly Budget (Personal/Family)',
                        'description' => 'Document for planning and accounting for monthly income and expenses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MONTHLY BUDGET</h1><p>[[budget_type]]</p><p>for [[month_year]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">INCOME</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Source</th>
                                            <th>Amount (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>Salary</td><td>15000.00</td></tr> -->
                                        [[income_list]]
                                    </tbody>
                                </table>
                                <p style="text-align: right;"><strong>Total Income: [[total_income]] UAH.</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">EXPENSES</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Amount (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row: <tr><td>Groceries</td><td>5000.00</td></tr> -->
                                        [[expenses_list]]
                                    </tbody>
                                </table>
                                <p style="text-align: right;"><strong>Total Expenses: [[total_expenses]] UAH.</strong></p>
                                <br/>
                                <p style="text-align: right;"><strong>Balance: [[balance]] UAH.</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Budżet miesięczny (osobisty/rodzinny)',
                        'description' => 'Dokument do planowania i ewidencji miesięcznych dochodów i wydatków.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BUDŻET MIESIĘCZNY</h1><p>[[budget_type]]</p><p>za [[month_year]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">PRZYCHODY</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Źródło</th>
                                            <th>Kwota (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>Wynagrodzenie</td><td>15000.00</td></tr> -->
                                        [[income_list]]
                                    </tbody>
                                </table>
                                <p style="text-align: right;"><strong>Łączne przychody: [[total_income]] UAH.</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">WYDATKI</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Kategoria</th>
                                            <th>Kwota (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Przykładowy wiersz: <tr><td>Artykuły spożywcze</td><td>5000.00</td></tr> -->
                                        [[expenses_list]]
                                    </tbody>
                                </table>
                                <p style="text-align: right;"><strong>Łączne wydatki: [[total_expenses]] UAH.</strong></p>
                                <br/>
                                <p style="text-align: right;"><strong>Saldo: [[balance]] UAH.</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Monatsbudget (persönlich/Familie)',
                        'description' => 'Dokument zur Planung und Erfassung monatlicher Einnahmen und Ausgaben.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MONATSBUDGET</h1><p>[[budget_type]]</p><p>für [[month_year]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">EINNAHMEN</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Quelle</th>
                                            <th>Betrag (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>Gehalt</td><td>15000.00</td></tr> -->
                                        [[income_list]]
                                    </tbody>
                                </table>
                                <p style="text-align: right;"><strong>Gesamteinnahmen: [[total_income]] UAH.</strong></p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">AUSGABEN</h2>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Kategorie</th>
                                            <th>Betrag (UAH)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Beispielzeile: <tr><td>Lebensmittel</td><td>5000.00</td></tr> -->
                                        [[expenses_list]]
                                    </tbody>
                                </table>
                                <p style="text-align: right;"><strong>Gesamtausgaben: [[total_expenses]] UAH.</strong></p>
                                <br/>
                                <p style="text-align: right;"><strong>Saldo: [[balance]] UAH.</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 26. Список покупок ---
            [
                'slug' => 'shopping-list-ua',
                'fields' => '[
                    {"name":"list_name","type":"text","required":true,"labels":{"uk":"Назва списку","en":"List Name", "pl":"Nazwa listy", "de":"Listenname"}},
                    {"name":"items_list","type":"textarea","required":true,"labels":{"uk":"Перелік товарів (Количество, Название)","en":"List of Items (Quantity, Name)", "pl":"Lista pozycji (Ilość, Nazwa)", "de":"Liste der Artikel (Menge, Name)"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Список покупок',
                        'description' => 'Простий список товарів для покупок.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">СПИСОК ПОКУПОК</h1><p>[[list_name]]</p><p>на [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <ul style="list-style-type: disc; padding-left: 20px;">
                                    [[items_list]]
                                </ul>
                            </div>',
                        'footer_html' => ''
                    ],
                    'en' => [
                        'title' => 'Shopping List',
                        'description' => 'Simple list of items for shopping.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SHOPPING LIST</h1><p>[[list_name]]</p><p>for [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <ul style="list-style-type: disc; padding-left: 20px;">
                                    [[items_list]]
                                </ul>
                            </div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Lista zakupów',
                        'description' => 'Prosta lista pozycji do zakupów.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LISTA ZAKUPÓW</h1><p>[[list_name]]</p><p>na [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <ul style="list-style-type: disc; padding-left: 20px;">
                                    [[items_list]]
                                </ul>
                            </div>',
                        'footer_html' => ''
                    ],
                    'de' => [
                        'title' => 'Einkaufsliste',
                        'description' => 'Einfache Liste der Artikel zum Einkaufen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EINKAUFSLISTE</h1><p>[[list_name]]</p><p>für [[current_date]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <ul style="list-style-type: disc; padding-left: 20px;">
                                    [[items_list]]
                                </ul>
                            </div>',
                        'footer_html' => ''
                    ],
                ]
            ],

            // --- 27. Личное благодарственное письмо ---
            [
                'slug' => 'personal-thank-you-letter-ua',
                'fields' => '[
                    {"name":"sender_name","type":"text","required":true,"labels":{"uk":"ПІБ відправника","en":"Sender Full Name", "pl":"Imię i nazwisko nadawcy", "de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_address","type":"text","required":true,"labels":{"uk":"Адреса відправника","en":"Sender Address", "pl":"Adres nadawcy", "de":"Absenderadresse"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"ПІБ отримувача","en":"Recipient Full Name", "pl":"Imię i nazwisko odbiorcy", "de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса отримувача","en":"Recipient Address", "pl":"Adres odbiorcy", "de":"Empfängeradresse"}},
                    {"name":"thank_you_subject","type":"text","required":true,"labels":{"uk":"Тема листа-подяки","en":"Thank You Letter Subject", "pl":"Temat listu z podziękowaniami", "de":"Betreff des Dankschreibens"}},
                    {"name":"thank_you_body","type":"textarea","required":true,"labels":{"uk":"Зміст подяки","en":"Thank You Content", "pl":"Treść podziękowań", "de":"Inhalt des Dankschreibens"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Особистий подячний лист',
                        'description' => 'Неофіційний лист з висловленням особистої подяки.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Від: [[sender_name]]</p>
                                <p style="text-align: right;">[[sender_address]]</p>
                                <br/>
                                <p>Кому: [[recipient_name]]</p>
                                <p>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">ПОДЯЧНИЙ ЛИСТ</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Тема: [[thank_you_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний(а) [[recipient_name]],</p>
                                <p>[[thank_you_body]]</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px;">
                                <p>[[sender_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Personal Thank You Letter',
                        'description' => 'Informal letter expressing personal gratitude.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">From: [[sender_name]]</p>
                                <p style="text-align: right;">[[sender_address]]</p>
                                <br/>
                                <p>To: [[recipient_name]]</p>
                                <p>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">THANK YOU LETTER</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Subject: [[thank_you_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear [[recipient_name]],</p>
                                <p>[[thank_you_body]]</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[sender_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Osobisty list z podziękowaniami',
                        'description' => 'Nieformalne pismo wyrażające osobistą wdzięczność.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Od: [[sender_name]]</p>
                                <p style="text-align: right;">[[sender_address]]</p>
                                <br/>
                                <p>Do: [[recipient_name]]</p>
                                <p>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">LIST Z PODZIĘKOWANIAMI</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Temat: [[thank_you_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny(a) Panie/Pani [[recipient_name]],</p>
                                <p>[[thank_you_body]]</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[sender_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Persönliches Dankschreiben',
                        'description' => 'Informelles Schreiben, das persönliche Dankbarkeit ausdrückt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Von: [[sender_name]]</p>
                                <p style="text-align: right;">[[sender_address]]</p>
                                <br/>
                                <p>An: [[recipient_name]]</p>
                                <p>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">DANKSCHREIBEN</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Betreff: [[thank_you_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte(r) Herr/Frau [[recipient_name]],</p>
                                <p>[[thank_you_body]]</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[sender_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                ]
            ],

            // --- 28. Личное письмо с извинениями ---
            [
                'slug' => 'personal-apology-letter-ua',
                'fields' => '[
                    {"name":"sender_name","type":"text","required":true,"labels":{"uk":"ПІБ відправника","en":"Sender Full Name", "pl":"Imię i nazwisko nadawcy", "de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_address","type":"text","required":true,"labels":{"uk":"Адреса відправника","en":"Sender Address", "pl":"Adres nadawcy", "de":"Absenderadresse"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"uk":"ПІБ отримувача","en":"Recipient Full Name", "pl":"Imię i nazwisko odbiorcy", "de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"uk":"Адреса отримувача","en":"Recipient Address", "pl":"Adres odbiorcy", "de":"Empfängeradresse"}},
                    {"name":"apology_subject","type":"text","required":true,"labels":{"uk":"Тема листа-вибачення","en":"Apology Letter Subject", "pl":"Temat listu z przeprosinami", "de":"Betreff des Entschuldigungsschreibens"}},
                    {"name":"apology_body","type":"textarea","required":true,"labels":{"uk":"Зміст вибачення","en":"Apology Content", "pl":"Treść przeprosin", "de":"Inhalt der Entschuldigung"}}
                ]',
                'translations' => [
                    'uk' => [
                        'title' => 'Особистий лист з вибаченнями',
                        'description' => 'Неофіційний лист з особистими вибаченнями за допущені помилки або незручності.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Від: [[sender_name]]</p>
                                <p style="text-align: right;">[[sender_address]]</p>
                                <br/>
                                <p>Кому: [[recipient_name]]</p>
                                <p>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">ЛИСТ З ВИБАЧЕННЯМИ</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Тема: [[apology_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний(а) [[recipient_name]],</p>
                                <p>[[apology_body]]</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[sender_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Personal Apology Letter',
                        'description' => 'Informal letter with personal apologies for mistakes or inconveniences caused.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">From: [[sender_name]]</p>
                                <p style="text-align: right;">[[sender_address]]</p>
                                <br/>
                                <p>To: [[recipient_name]]</p>
                                <p>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">APOLOGY LETTER</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Subject: [[apology_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear [[recipient_name]],</p>
                                <p>[[apology_body]]</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[sender_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Osobisty list z przeprosinami',
                        'description' => 'Nieformalne pismo z osobistymi przeprosinami za popełnione błędy lub niedogodności.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Od: [[sender_name]]</p>
                                <p style="text-align: right;">[[sender_address]]</p>
                                <br/>
                                <p>Do: [[recipient_name]]</p>
                                <p>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">LIST Z PRZEPROSINAMI</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Temat: [[apology_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny(a) Panie/Pani [[recipient_name]],</p>
                                <p>[[apology_body]]</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[sender_name]]</p>
                                <p>[[current_date]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Persönliches Entschuldigungsschreiben',
                        'description' => 'Informelles Schreiben mit persönlichen Entschuldigungen für verursachte Fehler oder Unannehmlichkeiten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p style="text-align: right;">Von: [[sender_name]]</p>
                                <p style="text-align: right;">[[sender_address]]</p>
                                <br/>
                                <p>An: [[recipient_name]]</p>
                                <p>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold; text-align: center;">ENTSCHULDIGUNGSSCHREIBEN</h1>
                                <h2 style="font-size: 14px; font-weight: bold; text-align: center;">Betreff: [[apology_subject]]</h2>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte(r) Herr/Frau [[recipient_name]],</p>
                                <p>[[apology_body]]</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <p>[[sender_name]]</p>
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

