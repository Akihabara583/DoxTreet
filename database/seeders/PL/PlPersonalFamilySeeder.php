<?php

namespace Database\Seeders\PL;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class PlPersonalFamilySeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'personal-family-pl')->first();
        if (!$category) {
            $this->command->error('Category with slug "personal-family-pl" not found.');
            return;
        }

        // Определяем данные для шаблонов документов в новой категории.
        $templatesData = [
            // --- 1. Запрос на получение публичной информации / Request for Public Information ---
            [
                'slug' => 'request-public-info-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Anschrift des Antragstellers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail wnioskodawcy","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail заявника","de":"Telefon und E-Mail des Antragstellers"}},
                    {"name":"public_body_name","type":"text","required":true,"labels":{"pl":"Nazwa organu publicznego","en":"Public Body Name","uk":"Назва публічного органу","de":"Name der Behörde"}},
                    {"name":"public_body_address","type":"text","required":true,"labels":{"pl":"Adres organu publicznego","en":"Public Body Address","uk":"Адреса публічного органу","de":"Adresse der Behörde"}},
                    {"name":"request_subject","type":"text","required":true,"labels":{"pl":"Przedmiot wniosku","en":"Subject of Request","uk":"Предмет запиту","de":"Gegenstand des Antrags"}},
                    {"name":"request_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły wniosku (jakie informacje, cel)","en":"Request details (what information, purpose)","uk":"Деталі запиту (яка інформація, мета)","de":"Details des Antrags (welche Informationen, Zweck)"}},
                    {"name":"desired_form_of_information","type":"text","required":true,"labels":{"pl":"Żądana forma udostępnienia informacji (np. kopia, wgląd)","en":"Desired form of information (e.g., copy, inspection)","uk":"Бажана форма надання інформації (напр., копія, ознайомлення)","de":"Gewünschte Form der Informationen (z.B. Kopie, Einsicht)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o udostępnienie informacji publicznej',
                        'description' => 'Formalny wniosek o udostępnienie informacji publicznej zgodnie z polskim prawem.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O UDOSTĘPNIENIE INFORMACJI PUBLICZNEJ</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> [[request_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Na podstawie art. 2 Ustawy o dostępie do informacji publicznej z dnia 6 września 2001 r. (Dz.U. 2001 nr 112 poz. 1198 z późn. zm.), zwracam się z uprzejmą prośbą o udostępnienie następujących informacji:</p>
                                <p>[[request_details]]</p>
                                <p>Proszę o udostępnienie informacji w formie [[desired_form_of_information]] na adres e-mail/pocztowy wskazany powyżej.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Request for Public Information',
                        'description' => 'A formal request for public information in accordance with Polish law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">REQUEST FOR PUBLIC INFORMATION</h1><p style="font-size: 14px;">Subject: [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table><br/><p>To:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Pursuant to Article 2 of the Act on Access to Public Information of September 6, 2001 (Journal of Laws 2001 No. 112, item 1198, as amended), I kindly request access to the following information:</p>
                                <p>[[request_details]]</p>
                                <p>Please provide the information in [[desired_form_of_information]] format to the email/postal address provided above.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Запит на отримання публічної інформації',
                        'description' => 'Офіційний запит на отримання публічної інформації відповідно до польського законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАПИТ НА ОТРИМАННЯ ПУБЛІЧНОЇ ІНФОРМАЦІЇ</h1><p style="font-size: 14px;">Щодо: [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table><br/><p>До:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>На підставі ст. 2 Закону про доступ до публічної інформації від 6 вересня 2001 р. (Відомості законів 2001 р. № 112, поз. 1198 зі змінами), звертаюся з покірним проханням надати наступну інформацію:</p>
                                <p>[[request_details]]</p>
                                <p>Прошу надати інформацію у формі [[desired_form_of_information]] на електронну адресу/поштову адресу, зазначену вище.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Zugang zu öffentlichen Informationen',
                        'description' => 'Ein formeller Antrag auf Zugang zu öffentlichen Informationen gemäß polnischem Recht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF ZUGANG ZU ÖFFENTLICHEN INFORMATIONEN</h1><p style="font-size: 14px;">Betreff: [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table><br/><p>An:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Gemäß Artikel 2 des Gesetzes über den Zugang zu öffentlichen Informationen vom 6. September 2001 (Gesetzblatt 2001 Nr. 112 Pos. 1198 mit späteren Änderungen) beantrage ich höflich die Bereitstellung der folgenden Informationen:</p>
                                <p>[[request_details]]</p>
                                <p>Bitte stellen Sie die Informationen in [[desired_form_of_information]] an die oben angegebene E-Mail-/Postadresse bereit.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 2. Жалоба на бездействие должностного лица / Complaint about Inaction of an Official ---
            [
                'slug' => 'complaint-official-inaction-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko skarżącego","en":"Complainant\'s Full Name","uk":"ПІБ скаржника","de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres skarżącego","en":"Complainant\'s Address","uk":"Адреса скаржника","de":"Anschrift des Beschwerdeführers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail skarżącego","en":"Complainant\'s Phone & Email","uk":"Телефон та e-mail скаржника","de":"Telefon und E-Mail des Beschwerdeführers"}},
                    {"name":"official_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/stanowisko urzędnika","en":"Official\'s Name/Position","uk":"ПІБ/посада посадової особи","de":"Name/Position des Beamten"}},
                    {"name":"official_body_name","type":"text","required":true,"labels":{"pl":"Nazwa organu/instytucji","en":"Body/Institution Name","uk":"Назва органу/установи","de":"Name der Behörde/Institution"}},
                    {"name":"official_body_address","type":"text","required":true,"labels":{"pl":"Adres organu/instytucji","en":"Body/Institution Address","uk":"Адреса органу/установи","de":"Adresse der Behörde/Institution"}},
                    {"name":"inaction_description","type":"textarea","required":true,"labels":{"pl":"Opis bezczynności/przewlekłego prowadzenia sprawy","en":"Description of inaction/prolonged proceedings","uk":"Опис бездіяльності/затягування справи","de":"Beschreibung der Untätigkeit/Verzögerung des Verfahrens"}},
                    {"name":"date_of_inaction","type":"date","required":true,"labels":{"pl":"Data/okres bezczynności","en":"Date/period of inaction","uk":"Дата/період бездіяльності","de":"Datum/Zeitraum der Untätigkeit"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"pl":"Żądania (np. podjęcie działań, odszkodowanie)","en":"Demands (e.g., action, compensation)","uk":"Вимоги (напр., вжиття заходів, компенсація)","de":"Forderungen (z.B. Maßnahmen, Entschädigung)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Skarga na bezczynność organu/urzędnika',
                        'description' => 'Formalna skarga na bezczynność lub przewlekłe prowadzenie sprawy przez organ administracji publicznej lub urzędnika.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[official_body_name]]</strong><br>[[official_body_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">SKARGA NA BEZCZYNNOŚĆ</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> bezczynności [[official_name]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym składam skargę na bezczynność/przewlekłe prowadzenie sprawy przez [[official_name]] w okresie od [[date_of_inaction]].</p>
                                <p>Opis bezczynności: [[inaction_description]]</p>
                                <p>W związku z powyższym, wnoszę o: [[demands]]</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Complaint about Inaction of an Official',
                        'description' => 'A formal complaint about inaction or prolonged proceedings by a public administration body or official.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>[[official_body_name]]</strong><br>[[official_body_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">COMPLAINT ABOUT INACTION</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Subject:</strong> Inaction of [[official_name]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby submit a complaint regarding the inaction/prolonged proceedings by [[official_name]] from [[date_of_inaction]].</p>
                                <p>Description of inaction: [[inaction_description]]</p>
                                <p>In connection with the above, I demand: [[demands]]</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Скарги на бездіяльність посадової особи',
                        'description' => 'Офіційна скарга на бездіяльність або затягування справи органом державної адміністрації або посадовою особою.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До:<br><strong>[[official_body_name]]</strong><br>[[official_body_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">СКАРГА НА БЕЗДІЯЛЬНІСТЬ</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Щодо:</strong> бездіяльності [[official_name]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим подаю скаргу на бездіяльність/затягування справи з боку [[official_name]] у період з [[date_of_inaction]].</p>
                                <p>Опис бездіяльності: [[inaction_description]]</p>
                                <p>У зв\'язку з вищевикладеним, вимагаю: [[demands]]</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Beschwerde wegen Untätigkeit eines Beamten',
                        'description' => 'Eine formelle Beschwerde wegen Untätigkeit oder überlanger Verfahrensdauer einer öffentlichen Verwaltungsbehörde oder eines Beamten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An:<br><strong>[[official_body_name]]</strong><br>[[official_body_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">BESCHWERDE WEGEN UNTÄTIGKEIT</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Betrifft:</strong> Untätigkeit von [[official_name]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit reiche ich eine Beschwerde wegen Untätigkeit/überlanger Verfahrensdauer von [[official_name]] im Zeitraum vom [[date_of_inaction]] ein.</p>
                                <p>Beschreibung der Untätigkeit: [[inaction_description]]</p>
                                <p>In diesem Zusammenhang fordere ich: [[demands]]</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 3. Заявление на получение справки о несудимости / Application for a Certificate of No Criminal Record ---
            [
                'slug' => 'certificate-no-criminal-record-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Anschrift des Antragstellers"}},
                    {"name":"applicant_pesel","type":"text","required":true,"labels":{"pl":"PESEL wnioskodawcy","en":"Applicant\'s PESEL","uk":"ПЕСЕЛЬ заявника","de":"PESEL des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy","en":"Applicant\'s Date of Birth","uk":"Дата народження заявника","de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_mothers_name","type":"text","required":true,"labels":{"pl":"Imię matki","en":"Mother\'s Name","uk":"Ім\'я матері","de":"Name der Mutter"}},
                    {"name":"applicant_fathers_name","type":"text","required":true,"labels":{"pl":"Imię ojca","en":"Father\'s Name","uk":"Ім\'я батька","de":"Name des Vaters"}},
                    {"name":"purpose_of_certificate","type":"textarea","required":true,"labels":{"pl":"Cel uzyskania zaświadczenia","en":"Purpose of Certificate","uk":"Мета отримання довідки","de":"Zweck der Bescheinigung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o wydanie zaświadczenia o niekaralności',
                        'description' => 'Wniosek do Krajowego Rejestru Karnego o wydanie zaświadczenia o niekaralności.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>Biuro Informacyjne Krajowego Rejestru Karnego</strong><br>ul. Czerniakowska 100<br>00-454 Warszawa</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O WYDANIE ZAŚWIADCZENIA O NIEKARALNOŚCI</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o wydanie zaświadczenia o niekaralności, dotyczącego mojej osoby:</p>
                                <p>Imię i nazwisko: <strong>[[applicant_full_name]]</strong></p>
                                <p>Data urodzenia: [[applicant_dob]]</p>
                                <p>Imię matki: [[applicant_mothers_name]]</p>
                                <p>Imię ojca: [[applicant_fathers_name]]</p>
                                <br/>
                                <p>Cel uzyskania zaświadczenia: [[purpose_of_certificate]]</p>
                                <p>Proszę o przesłanie zaświadczenia na adres wskazany powyżej.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for a Certificate of No Criminal Record',
                        'description' => 'Application to the National Criminal Register for a certificate of no criminal record.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>Information Bureau of the National Criminal Register</strong><br>ul. Czerniakowska 100<br>00-454 Warsaw, Poland</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">APPLICATION FOR A CERTIFICATE OF NO CRIMINAL RECORD</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request the issuance of a certificate of no criminal record concerning myself:</p>
                                <p>Full Name: <strong>[[applicant_full_name]]</strong></p>
                                <p>Date of Birth: [[applicant_dob]]</p>
                                <p>Mother\'s Name: [[applicant_mothers_name]]</p>
                                <p>Father\'s Name: [[applicant_fathers_name]]</p>
                                <br/>
                                <p>Purpose of obtaining the certificate: [[purpose_of_certificate]]</p>
                                <p>Please send the certificate to the address indicated above.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на отримання довідки про несудимість',
                        'description' => 'Заява до Національного реєстру судимостей про видачу довідки про несудимість.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>ПЕСЕЛЬ: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До:<br><strong>Інформаційне бюро Національного реєстру судимостей</strong><br>вул. Черняковська 100<br>00-454 Варшава</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА НА ОТРИМАННЯ ДОВІДКИ ПРО НЕСУДИМІСТЬ</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про видачу довідки про несудимість, що стосується мене:</p>
                                <p>ПІБ: <strong>[[applicant_full_name]]</strong></p>
                                <p>Дата народження: [[applicant_dob]]</p>
                                <p>Ім\'я матері: [[applicant_mothers_name]]</p>
                                <p>Ім\'я батька: [[applicant_fathers_name]]</p>
                                <br/>
                                <p>Мета отримання довідки: [[purpose_of_certificate]]</p>
                                <p>Прошу надіслати довідку на адресу, зазначену вище.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Ausstellung einer Bescheinigung über Straffreiheit',
                        'description' => 'Antrag an das Landesstrafregister auf Ausstellung einer Bescheinigung über Straffreiheit.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An:<br><strong>Informationsbüro des Landesstrafregisters</strong><br>ul. Czerniakowska 100<br>00-454 Warschau</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANTRAG AUF AUSSTELLUNG EINER BESCHEINIGUNG ÜBER STRAFFREIHEIT</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit beantrage ich höflich die Ausstellung einer Bescheinigung über Straffreiheit, betreffend meine Person:</p>
                                <p>Name und Vorname: <strong>[[applicant_full_name]]</strong></p>
                                <p>Geburtsdatum: [[applicant_dob]]</p>
                                <p>Name der Mutter: [[applicant_mothers_name]]</p>
                                <p>Name des Vaters: [[applicant_fathers_name]]</p>
                                <br/>
                                <p>Zweck der Bescheinigung: [[purpose_of_certificate]]</p>
                                <p>Bitte senden Sie die Bescheinigung an die oben angegebene Adresse.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 4. Заявление на получение справки о составе семьи / Application for a Certificate of Family Composition ---
            [
                'slug' => 'certificate-family-composition-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Anschrift des Antragstellers"}},
                    {"name":"purpose_of_certificate","type":"textarea","required":true,"labels":{"pl":"Cel uzyskania zaświadczenia","en":"Purpose of Certificate","uk":"Мета отримання довідки","de":"Zweck der Bescheinigung"}},
                    {"name":"family_members_list","type":"textarea","required":true,"labels":{"pl":"Lista członków rodziny (imię, nazwisko, stopień pokrewieństwa, data urodzenia)","en":"List of family members (name, surname, kinship, date of birth)","uk":"Список членів сім\'ї (ім\'я, прізвище, ступінь споріднення, дата народження)","de":"Liste der Familienmitglieder (Name, Nachname, Verwandtschaftsgrad, Geburtsdatum)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o wydanie zaświadczenia o składzie rodziny',
                        'description' => 'Wniosek o wydanie zaświadczenia o składzie rodziny, często wymagany do różnych celów administracyjnych.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>Urząd Gminy/Miasta w [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O WYDANIE ZAŚWIADCZENIA O SKŁADZIE RODZINY</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o wydanie zaświadczenia o składzie mojej rodziny do celów: [[purpose_of_certificate]].</p>
                                <p>Dane członków rodziny:</p>
                                <pre>[[family_members_list]]</pre>
                                <p>Proszę o przesłanie zaświadczenia na adres wskazany powyżej.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for a Certificate of Family Composition',
                        'description' => 'Application for a certificate of family composition, often required for various administrative purposes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>Municipal Office/City Hall in [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">APPLICATION FOR A CERTIFICATE OF FAMILY COMPOSITION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request the issuance of a certificate of my family composition for the purpose of: [[purpose_of_certificate]].</p>
                                <p>Family members\' data:</p>
                                <pre>[[family_members_list]]</pre>
                                <p>Please send the certificate to the address indicated above.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на отримання довідки про склад сім\'ї',
                        'description' => 'Заява на отримання довідки про склад сім\'ї, часто необхідна для різних адміністративних цілей.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До:<br><strong>Управління гміни/міста у [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА НА ОТРИМАННЯ ДОВІДКИ ПРО СКЛАД СІМ\'Ї</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про видачу довідки про склад моєї сім\'ї для цілей: [[purpose_of_certificate]].</p>
                                <p>Дані членів сім\'ї:</p>
                                <pre>[[family_members_list]]</pre>
                                <p>Прошу надіслати довідку на адресу, зазначену вище.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Ausstellung einer Familienstandsbescheinigung',
                        'description' => 'Antrag auf Ausstellung einer Familienstandsbescheinigung, oft für verschiedene Verwaltungszwecke erforderlich.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An:<br><strong>Gemeinde-/Stadtamt in [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANTRAG AUF AUSSTELLUNG EINER FAMILIENSTANDSBESCHEINIGUNG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit beantrage ich höflich die Ausstellung einer Familienstandsbescheinigung zu folgenden Zwecken: [[purpose_of_certificate]].</p>
                                <p>Angaben zu Familienmitgliedern:</p>
                                <pre>[[family_members_list]]</pre>
                                <p>Bitte senden Sie die Bescheinigung an die oben angegebene Adresse.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 5. Заявление на смену имени/фамилии / Application for Name/Surname Change ---
            [
                'slug' => 'name-surname-change-application-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Anschrift des Antragstellers"}},
                    {"name":"applicant_pesel","type":"text","required":true,"labels":{"pl":"PESEL wnioskodawcy","en":"Applicant\'s PESEL","uk":"ПЕСЕЛЬ заявника","de":"PESEL des Antragstellers"}},
                    {"name":"old_name","type":"text","required":true,"labels":{"pl":"Dotychczasowe imię/nazwisko","en":"Current Name/Surname","uk":"Поточне ім\'я/прізвище","de":"Bisheriger Vorname/Nachname"}},
                    {"name":"new_name","type":"text","required":true,"labels":{"pl":"Nowe imię/nazwisko","en":"New Name/Surname","uk":"Нове ім\'я/прізвище","de":"Neuer Vorname/Nachname"}},
                    {"name":"reason_for_change","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku","en":"Reason for Application","uk":"Обґрунтування заяви","de":"Begründung des Antrags"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o zmianę imienia/nazwiska',
                        'description' => 'Wniosek do Urzędu Stanu Cywilnego o zmianę imienia lub nazwiska.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>Kierownika Urzędu Stanu Cywilnego w [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O ZMIANĘ IMIENIA/NAZWISKA</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o zmianę mojego imienia/nazwiska z <strong>[[old_name]]</strong> na <strong>[[new_name]]</strong>.</p>
                                <p>Uzasadnienie wniosku: [[reason_for_change]]</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Name/Surname Change',
                        'description' => 'Application to the Civil Registry Office for a change of name or surname.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>Head of the Civil Registry Office in [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">APPLICATION FOR NAME/SURNAME CHANGE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request the change of my name/surname from <strong>[[old_name]]</strong> to <strong>[[new_name]]</strong>.</p>
                                <p>Reason for application: [[reason_for_change]]</p>
                                <p>I kindly ask for a positive consideration of my application.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на зміну імені/прізвища',
                        'description' => 'Заява до Управління цивільного стану про зміну імені або прізвища.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>ПЕСЕЛЬ: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До:<br><strong>Керівника Управління цивільного стану у [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА НА ЗМІНУ ІМЕНІ/ПРІЗВИЩА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про зміну мого імені/прізвища з <strong>[[old_name]]</strong> на <strong>[[new_name]]</strong>.</p>
                                <p>Обґрунтування заяви: [[reason_for_change]]</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Namens-/Nachnamensänderung',
                        'description' => 'Antrag an das Standesamt auf Änderung des Vornamens oder Nachnamens.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An:<br><strong>Leiter des Standesamtes in [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANTRAG AUF NAMENS-/NACHNAMENSÄNDERUNG</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit beantrage ich höflich die Änderung meines Vornamens/Nachnamens von <strong>[[old_name]]</strong> in <strong>[[new_name]]</strong>.</p>
                                <p>Begründung des Antrags: [[reason_for_change]]</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 6. Заявление на регистрацию/снятие с регистрации места жительства / Application for Registration/Deregistration of Residence ---
            [
                'slug' => 'residence-registration-deregistration-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address_old","type":"text","required":false,"labels":{"pl":"Dotychczasowy adres zamieszkania (jeśli dotyczy)","en":"Current residence address (if applicable)","uk":"Поточна адреса проживання (якщо застосовно)","de":"Bisherige Wohnadresse (falls zutreffend)"}},
                    {"name":"applicant_address_new","type":"text","required":true,"labels":{"pl":"Nowy adres zamieszkania/adres do zameldowania/wymeldowania","en":"New residence address/address for registration/deregistration","uk":"Нова адреса проживання/адреса для реєстрації/зняття з реєстрації","de":"Neue Wohnadresse/Adresse zur An-/Abmeldung"}},
                    {"name":"action_type","type":"select","options":[{"value":"registration","label":{"pl":"Zameldowanie","en":"Registration","uk":"Реєстрація","de":"Anmeldung"}},{"value":"deregistration","label":{"pl":"Wymeldowanie","en":"Deregistration","uk":"Зняття з реєстрації","de":"Abmeldung"}}],"required":true,"labels":{"pl":"Rodzaj czynności","en":"Type of action","uk":"Тип дії","de":"Art der Handlung"}},
                    {"name":"reason_for_action","type":"textarea","required":false,"labels":{"pl":"Uzasadnienie (opcjonalnie)","en":"Reason (optional)","uk":"Обґрунтування (необов\'язково)","de":"Begründung (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o zameldowanie/wymeldowanie',
                        'description' => 'Wniosek do urzędu gminy/miasta o zameldowanie lub wymeldowanie z miejsca pobytu stałego/czasowego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address_old]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>Wójta/Burmistrza/Prezydenta Miasta w [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O [[action_type]] ZAMIESZKANIA</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o [[action_type]] mnie pod adresem: <strong>[[applicant_address_new]]</strong>.</p>
                                <p>[[reason_for_action]]</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Registration/Deregistration of Residence',
                        'description' => 'Application to the municipal office/city hall for registration or deregistration of permanent/temporary residence.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address_old]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>Mayor/President of the City in [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">APPLICATION FOR [[action_type]] OF RESIDENCE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request to [[action_type]] me at the address: <strong>[[applicant_address_new]]</strong>.</p>
                                <p>[[reason_for_action]]</p>
                                <p>I kindly ask for a positive consideration of my application.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на реєстрацію/зняття з реєстрації місця проживання',
                        'description' => 'Заява до управління гміни/міста про реєстрацію або зняття з реєстрації постійного/тимчасового місця проживання.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address_old]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До:<br><strong>Війта/Бурмістра/Президента міста у [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА НА [[action_type]] МІСЦЯ ПРОЖИВАННЯ</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про [[action_type]] мене за адресою: <strong>[[applicant_address_new]]</strong>.</p>
                                <p>[[reason_for_action]]</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf An-/Abmeldung des Wohnsitzes',
                        'description' => 'Antrag an das Gemeinde-/Stadtamt zur An- oder Abmeldung des Haupt-/Nebenwohnsitzes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address_old]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An:<br><strong>Bürgermeister/Stadtpräsident in [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANTRAG AUF [[action_type]] WOHNSITZES</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit beantrage ich höflich die [[action_type]] unter der Adresse: <strong>[[applicant_address_new]]</strong>.</p>
                                <p>[[reason_for_action]]</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 7. Заявление на получение загранпаспорта (общая форма) / Application for a Foreign Passport (General Form) ---
            [
                'slug' => 'foreign-passport-application-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Anschrift des Antragstellers"}},
                    {"name":"applicant_pesel","type":"text","required":true,"labels":{"pl":"PESEL wnioskodawcy","en":"Applicant\'s PESEL","uk":"ПЕСЕЛЬ заявника","de":"PESEL des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy","en":"Applicant\'s Date of Birth","uk":"Дата народження заявника","de":"Geburtsdatum des Antragstellers"}},
                    {"name":"purpose_of_passport","type":"textarea","required":true,"labels":{"pl":"Cel uzyskania paszportu","en":"Purpose of Passport","uk":"Мета отримання паспорта","de":"Zweck des Reisepasses"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o wydanie paszportu',
                        'description' => 'Ogólny wniosek o wydanie paszportu, składany w urzędzie wojewódzkim.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>Wojewody [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O WYDANIE PASZPORTU</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o wydanie mi paszportu.</p>
                                <p>Moje dane:</p>
                                <p>Imię i nazwisko: <strong>[[applicant_full_name]]</strong></p>
                                <p>Data urodzenia: [[applicant_dob]]</p>
                                <p>Cel uzyskania paszportu: [[purpose_of_passport]]</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for a Foreign Passport (General Form)',
                        'description' => 'General application for a passport, submitted to the Voivodeship Office.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>Voivode of [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">APPLICATION FOR A FOREIGN PASSPORT</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request the issuance of a passport for myself.</p>
                                <p>My data:</p>
                                <p>Full Name: <strong>[[applicant_full_name]]</strong></p>
                                <p>Date of Birth: [[applicant_dob]]</p>
                                <p>Purpose of obtaining the passport: [[purpose_of_passport]]</p>
                                <p>I kindly ask for a positive consideration of my application.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на отримання закордонного паспорта (загальна форма)',
                        'description' => 'Загальна заява на видачу паспорта, що подається до воєводського управління.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>ПЕСЕЛЬ: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До:<br><strong>Воєводи [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА НА ОТРИМАННЯ ЗАКОРДОННОГО ПАСПОРТА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про видачу мені паспорта.</p>
                                <p>Мої дані:</p>
                                <p>ПІБ: <strong>[[applicant_full_name]]</strong></p>
                                <p>Дата народження: [[applicant_dob]]</p>
                                <p>Мета отримання паспорта: [[purpose_of_passport]]</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Ausstellung eines Reisepasses (allgemeine Form)',
                        'description' => 'Allgemeiner Antrag auf Ausstellung eines Reisepasses, einzureichen beim Woiwodschaftsamt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An:<br><strong>Woiwode von [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANTRAG AUF AUSSTELLUNG EINES REISEPASSES</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit beantrage ich höflich die Ausstellung eines Reisepasses für mich.</p>
                                <p>Meine Daten:</p>
                                <p>Name und Vorname: <strong>[[applicant_full_name]]</strong></p>
                                <p>Geburtsdatum: [[applicant_dob]]</p>
                                <p>Zweck der Reisepassausstellung: [[purpose_of_passport]]</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 8. Заявление на получение идентификационного кода (ИНН) / Application for an Identification Code (Tax ID) ---
            [
                'slug' => 'tax-id-application-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Anschrift des Antragstellers"}},
                    {"name":"applicant_pesel","type":"text","required":true,"labels":{"pl":"PESEL wnioskodawcy","en":"Applicant\'s PESEL","uk":"ПЕСЕЛЬ заявника","de":"PESEL des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy","en":"Applicant\'s Date of Birth","uk":"Дата народження заявника","de":"Geburtsdatum des Antragstellers"}},
                    {"name":"purpose_of_tax_id","type":"textarea","required":true,"labels":{"pl":"Cel uzyskania NIP/identyfikatora podatkowego","en":"Purpose of obtaining NIP/tax ID","uk":"Мета отримання ІПН/податкового ідентифікатора","de":"Zweck der Erlangung der Steuer-ID/Steueridentifikationsnummer"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o nadanie numeru identyfikacji podatkowej (NIP/PESEL)',
                        'description' => 'Wniosek o nadanie numeru identyfikacji podatkowej (NIP lub PESEL w zależności od statusu), składany w urzędzie skarbowym.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>Naczelnika Urzędu Skarbowego w [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O NADANIE NUMERU IDENTYFIKACJI PODATKOWEJ</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o nadanie mi numeru identyfikacji podatkowej (NIP/PESEL).</p>
                                <p>Moje dane:</p>
                                <p>Imię i nazwisko: <strong>[[applicant_full_name]]</strong></p>
                                <p>Data urodzenia: [[applicant_dob]]</p>
                                <p>Cel uzyskania NIP/identyfikatora podatkowego: [[purpose_of_tax_id]]</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for an Identification Code (Tax ID)',
                        'description' => 'Application for a tax identification number (NIP or PESEL depending on status), submitted to the tax office.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>Head of the Tax Office in [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">APPLICATION FOR AN IDENTIFICATION CODE (TAX ID)</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request the assignment of a tax identification number (NIP/PESEL) to me.</p>
                                <p>My data:</p>
                                <p>Full Name: <strong>[[applicant_full_name]]</strong></p>
                                <p>Date of Birth: [[applicant_dob]]</p>
                                <p>Purpose of obtaining NIP/tax ID: [[purpose_of_tax_id]]</p>
                                <p>I kindly ask for a positive consideration of my application.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на отримання ідентифікаційного коду (ІПН)',
                        'description' => 'Заява на отримання податкового ідентифікаційного номера (NIP або PESEL залежно від статусу), що подається до податкової інспекції.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>ПЕСЕЛЬ: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До:<br><strong>Начальника податкової інспекції у [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА НА ОТРИМАННЯ ІДЕНТИФІКАЦІЙНОГО КОДУ (ІПН)</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про присвоєння мені податкового ідентифікаційного номера (NIP/PESEL).</p>
                                <p>Мої дані:</p>
                                <p>ПІБ: <strong>[[applicant_full_name]]</strong></p>
                                <p>Дата народження: [[applicant_dob]]</p>
                                <p>Мета отримання ІПН/податкового ідентифікатора: [[purpose_of_tax_id]]</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Erteilung einer Steueridentifikationsnummer (NIP/PESEL)',
                        'description' => 'Antrag auf Erteilung einer Steueridentifikationsnummer (NIP oder PESEL je nach Status), einzureichen beim Finanzamt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>PESEL: [[applicant_pesel]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An:<br><strong>Leiter des Finanzamtes in [[city]]</strong></p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANTRAG AUF ERTEILUNG EINER STEUERIDENTIFIKATIONSNUMMER</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit beantrage ich höflich die Zuteilung einer Steueridentifikationsnummer (NIP/PESEL) für mich.</p>
                                <p>Meine Daten:</p>
                                <p>Name und Vorname: <strong>[[applicant_full_name]]</strong></p>
                                <p>Geburtsdatum: [[applicant_dob]]</p>
                                <p>Zweck der Erlangung der Steuer-ID/Steueridentifikationsnummer: [[purpose_of_tax_id]]</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 9. Заявление о приеме ребенка в детский сад / Application for Child Admission to Kindergarten ---
            [
                'slug' => 'kindergarten-admission-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna","en":"Parent/Guardian Full Name","uk":"ПІБ батьків/опікуна","de":"Vollständiger Name des Elternteils/Vormunds"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania rodzica/opiekuna","en":"Parent/Guardian Residence Address","uk":"Адреса проживання батьків/опікуна","de":"Wohnadresse des Elternteils/Vormunds"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"kindergarten_name","type":"text","required":true,"labels":{"pl":"Nazwa przedszkola","en":"Kindergarten Name","uk":"Назва дитячого садка","de":"Name des Kindergartens"}},
                    {"name":"kindergarten_address","type":"text","required":true,"labels":{"pl":"Adres przedszkola","en":"Kindergarten Address","uk":"Адреса дитячого садка","de":"Adresse des Kindergartens"}},
                    {"name":"desired_start_date","type":"date","required":true,"labels":{"pl":"Proponowana data przyjęcia","en":"Proposed Admission Date","uk":"Пропонована дата зарахування","de":"Vorgeschlagenes Aufnahmedatum"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o przyjęcie dziecka do przedszkola',
                        'description' => 'Wniosek o przyjęcie dziecka do przedszkola publicznego lub niepublicznego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>Dyrektora [[kindergarten_name]]</strong><br>[[kindergarten_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O PRZYJĘCIE DZIECKA DO PRZEDSZKOLA</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o przyjęcie mojego dziecka:</p>
                                <p>Imię i nazwisko: <strong>[[child_full_name]]</strong></p>
                                <p>Data urodzenia: [[child_dob]]</p>
                                <p>do przedszkola [[kindergarten_name]] od dnia <strong>[[desired_start_date]]</strong>.</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Child Admission to Kindergarten',
                        'description' => 'Application for child admission to a public or private kindergarten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>Director of [[kindergarten_name]]</strong><br>[[kindergarten_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">APPLICATION FOR CHILD ADMISSION TO KINDERGARTEN</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request the admission of my child:</p>
                                <p>Full Name: <strong>[[child_full_name]]</strong></p>
                                <p>Date of Birth: [[child_dob]]</p>
                                <p>to [[kindergarten_name]] from <strong>[[desired_start_date]]</strong>.</p>
                                <p>I kindly ask for a positive consideration of my application.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про прийом дитини до дитячого садка',
                        'description' => 'Заява про прийом дитини до державного або приватного дитячого садка.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До:<br><strong>Директора [[kindergarten_name]]</strong><br>[[kindergarten_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА ПРО ПРИЙОМ ДИТИНИ ДО ДИТЯЧОГО САДКА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про прийом моєї дитини:</p>
                                <p>ПІБ: <strong>[[child_full_name]]</strong></p>
                                <p>Дата народження: [[child_dob]]</p>
                                <p>до дитячого садка [[kindergarten_name]] з <strong>[[desired_start_date]]</strong>.</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Aufnahme eines Kindes in den Kindergarten',
                        'description' => 'Antrag auf Aufnahme eines Kindes in einen öffentlichen oder privaten Kindergarten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An:<br><strong>Leiter des Kindergartens [[kindergarten_name]]</strong><br>[[kindergarten_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANTRAG AUF AUFNAHME EINES KINDES IN DEN KINDERGARTEN</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit beantrage ich höflich die Aufnahme meines Kindes:</p>
                                <p>Name und Vorname: <strong>[[child_full_name]]</strong></p>
                                <p>Geburtsdatum: [[child_dob]]</p>
                                <p>in den Kindergarten [[kindergarten_name]] ab dem <strong>[[desired_start_date]]</strong>.</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 10. Заявление о приеме ребенка в школу / Application for Child Admission to School ---
            [
                'slug' => 'school-admission-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna","en":"Parent/Guardian Full Name","uk":"ПІБ батьків/опікуна","de":"Vollständiger Name des Elternteils/Vormunds"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania rodzica/opiekuna","en":"Parent/Guardian Residence Address","uk":"Адреса проживання батьків/опікуна","de":"Wohnadresse des Elternteils/Vormunds"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"school_name","type":"text","required":true,"labels":{"pl":"Nazwa szkoły","en":"School Name","uk":"Назва школи","de":"Name der Schule"}},
                    {"name":"school_address","type":"text","required":true,"labels":{"pl":"Adres szkoły","en":"School Address","uk":"Адреса школи","de":"Adresse der Schule"}},
                    {"name":"desired_class","type":"text","required":true,"labels":{"pl":"Proponowana klasa","en":"Proposed Class","uk":"Пропонований клас","de":"Vorgeschlagene Klasse"}},
                    {"name":"desired_start_date","type":"date","required":true,"labels":{"pl":"Proponowana data przyjęcia","en":"Proposed Admission Date","uk":"Пропонована дата зарахування","de":"Vorgeschlagenes Aufnahmedatum"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o przyjęcie dziecka do szkoły',
                        'description' => 'Wniosek o przyjęcie dziecka do szkoły podstawowej lub ponadpodstawowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>Dyrektora [[school_name]]</strong><br>[[school_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O PRZYJĘCIE DZIECKA DO SZKOŁY</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o przyjęcie mojego dziecka:</p>
                                <p>Imię i nazwisko: <strong>[[child_full_name]]</strong></p>
                                <p>Data urodzenia: [[child_dob]]</p>
                                <p>do klasy <strong>[[desired_class]]</strong> w szkole [[school_name]] od dnia <strong>[[desired_start_date]]</strong>.</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Child Admission to School',
                        'description' => 'Application for child admission to primary or secondary school.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>Director of [[school_name]]</strong><br>[[school_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">APPLICATION FOR CHILD ADMISSION TO SCHOOL</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request the admission of my child:</p>
                                <p>Full Name: <strong>[[child_full_name]]</strong></p>
                                <p>Date of Birth: [[child_dob]]</p>
                                <p>to class <strong>[[desired_class]]</strong> at [[school_name]] from <strong>[[desired_start_date]]</strong>.</p>
                                <p>I kindly ask for a positive consideration of my application.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про прийом дитини до школи',
                        'description' => 'Заява про прийом дитини до початкової або середньої школи.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До:<br><strong>Директора [[school_name]]</strong><br>[[school_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА ПРО ПРИЙОМ ДИТИНИ ДО ШКОЛИ</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про прийом моєї дитини:</p>
                                <p>ПІБ: <strong>[[child_full_name]]</strong></p>
                                <p>Дата народження: [[child_dob]]</p>
                                <p>до класу <strong>[[desired_class]]</strong> у школі [[school_name]] з <strong>[[desired_start_date]]</strong>.</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Aufnahme eines Kindes in die Schule',
                        'description' => 'Antrag auf Aufnahme eines Kindes in die Grund- oder weiterführende Schule.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An:<br><strong>Direktor der Schule [[school_name]]</strong><br>[[school_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANTRAG AUF AUFNAHME EINES KINDES IN DIE SCHULE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit beantrage ich höflich die Aufnahme meines Kindes:</p>
                                <p>Name und Vorname: <strong>[[child_full_name]]</strong></p>
                                <p>Geburtsdatum: [[child_dob]]</p>
                                <p>in die Klasse <strong>[[desired_class]]</strong> an der Schule [[school_name]] ab dem <strong>[[desired_start_date]]</strong>.</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 11. Записка в школу об отсутствии ребенка / Note to School about Child's Absence ---
            [
                'slug' => 'child-absence-note-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"parent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna","en":"Parent/Guardian Full Name","uk":"ПІБ батьків/опікуна","de":"Vollständiger Name des Elternteils/Vormunds"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_class","type":"text","required":true,"labels":{"pl":"Klasa dziecka","en":"Child\'s Class","uk":"Клас дитини","de":"Klasse des Kindes"}},
                    {"name":"school_name","type":"text","required":true,"labels":{"pl":"Nazwa szkoły","en":"School Name","uk":"Назва школи","de":"Name der Schule"}},
                    {"name":"absence_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia nieobecności","en":"Absence Start Date","uk":"Дата початку відсутності","de":"Beginn der Abwesenheit"}},
                    {"name":"absence_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia nieobecności","en":"Absence End Date","uk":"Дата закінчення відсутності","de":"Ende der Abwesenheit"}},
                    {"name":"reason_for_absence","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie nieobecności","en":"Reason for Absence","uk":"Обґрунтування відсутності","de":"Begründung der Abwesenheit"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Usprawiedliwienie nieobecności dziecka w szkole',
                        'description' => 'Oficjalna notatka do szkoły usprawiedliwiająca nieobecność dziecka.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[parent_full_name]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>Dyrekcji/Wychowawcy klasy [[child_class]]</strong><br>[[school_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">USPRAWIEDLIWIENIE NIEOBECNOŚCI DZIECKA</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym usprawiedliwiam nieobecność mojego dziecka, <strong>[[child_full_name]]</strong>, ucznia klasy [[child_class]], w szkole w dniach od <strong>[[absence_start_date]]</strong> do <strong>[[absence_end_date]]</strong>.</p>
                                <p>Powód nieobecności: [[reason_for_absence]]</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Note to School about Child\'s Absence',
                        'description' => 'An official note to school justifying a child\'s absence.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[parent_full_name]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>Management/Class Teacher of Class [[child_class]]</strong><br>[[school_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">NOTE REGARDING CHILD\'S ABSENCE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This is to justify the absence of my child, <strong>[[child_full_name]]</strong>, a student of class [[child_class]], from school from <strong>[[absence_start_date]]</strong> to <strong>[[absence_end_date]]</strong>.</p>
                                <p>Reason for absence: [[reason_for_absence]]</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Записка в школу про відсутність дитини',
                        'description' => 'Офіційна записка до школи, що виправдовує відсутність дитини.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[parent_full_name]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До:<br><strong>Дирекції/Класного керівника класу [[child_class]]</strong><br>[[school_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАПИСКА ПРО ВІДСУТНІСТЬ ДИТИНИ</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим виправдовую відсутність моєї дитини, <strong>[[child_full_name]]</strong>, учня класу [[child_class]], у школі з <strong>[[absence_start_date]]</strong> по <strong>[[absence_end_date]]</strong>.</p>
                                <p>Причина відсутності: [[reason_for_absence]]</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Entschuldigung für die Abwesenheit des Kindes in der Schule',
                        'description' => 'Eine offizielle Notiz an die Schule, die die Abwesenheit eines Kindes entschuldigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[parent_full_name]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An:<br><strong>Direktion/Klassenlehrer der Klasse [[child_class]]</strong><br>[[school_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ENTSCHULDIGUNG FÜR DIE ABWESENHEIT DES KINDES</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit entschuldige ich die Abwesenheit meines Kindes, <strong>[[child_full_name]]</strong>, Schülers der Klasse [[child_class]], in der Schule vom <strong>[[absence_start_date]]</strong> bis zum <strong>[[absence_end_date]]</strong>.</p>
                                <p>Grund der Abwesenheit: [[reason_for_absence]]</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 12. Согласие родителей на выезд ребенка за границу / Parental Consent for Child to Travel Abroad ---
            [
                'slug' => 'parental-travel-consent-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"parent_full_name_1","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna 1","en":"Parent/Guardian Full Name 1","uk":"ПІБ батьків/опікуна 1","de":"Vollständiger Name des Elternteils/Vormunds 1"}},
                    {"name":"parent_id_1","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości rodzica 1","en":"Parent ID Number 1","uk":"Номер посвідчення батьків 1","de":"Ausweisnummer des Elternteils 1"}},
                    {"name":"parent_full_name_2","type":"text","required":false,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna 2 (opcjonalnie)","en":"Parent/Guardian Full Name 2 (optional)","uk":"ПІБ батьків/опікуна 2 (необов\'язково)","de":"Vollständiger Name des Elternteils/Vormunds 2 (optional)"}},
                    {"name":"parent_id_2","type":"text","required":false,"labels":{"pl":"Numer dowodu tożsamości rodzica 2 (opcjonalnie)","en":"Parent ID Number 2 (optional)","uk":"Номер посвідчення батьків 2 (необов\'язково)","de":"Ausweisnummer des Elternteils 2 (optional)"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"child_passport_number","type":"text","required":true,"labels":{"pl":"Numer paszportu dziecka","en":"Child\'s Passport Number","uk":"Номер паспорта дитини","de":"Reisepassnummer des Kindes"}},
                    {"name":"destination_country","type":"text","required":true,"labels":{"pl":"Kraj docelowy","en":"Destination Country","uk":"Країна призначення","de":"Zielland"}},
                    {"name":"travel_purpose","type":"text","required":true,"labels":{"pl":"Cel podróży","en":"Purpose of Travel","uk":"Мета поїздки","de":"Reisezweck"}},
                    {"name":"travel_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia podróży","en":"Travel Start Date","uk":"Дата початку поїздки","de":"Reisebeginn"}},
                    {"name":"travel_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia podróży","en":"Travel End Date","uk":"Дата закінчення поїздки","de":"Reiseende"}},
                    {"name":"accompanying_person_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko osoby towarzyszącej (jeśli dotyczy)","en":"Accompanying Person Full Name (if applicable)","uk":"ПІБ супроводжуючої особи (якщо застосовно)","de":"Vollständiger Name der Begleitperson (falls zutreffend)"}},
                    {"name":"accompanying_person_passport","type":"text","required":false,"labels":{"pl":"Numer paszportu osoby towarzyszącej (jeśli dotyczy)","en":"Accompanying Person Passport Number (if applicable)","uk":"Номер паспорта супроводжуючої особи (якщо застосовно)","de":"Reisepassnummer der Begleitperson (falls zutreffend)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zgoda rodziców na wyjazd dziecka za granicę',
                        'description' => 'Oficjalne oświadczenie rodziców/opiekunów prawnych, zezwalające dziecku na samodzielny wyjazd za granicę lub w towarzystwie innej osoby.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ZGODA RODZICÓW NA WYJAZD DZIECKA ZA GRANICĘ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[parent_full_name_1]]<br>Dowód osobisty: [[parent_id_1]]</p><p>[[parent_full_name_2]]<br>Dowód osobisty: [[parent_id_2]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym ja/my, niżej podpisany/i, wyrażam/y zgodę na wyjazd mojego/naszego małoletniego dziecka:</p>
                                <p>Imię i nazwisko: <strong>[[child_full_name]]</strong></p>
                                <p>Data urodzenia: [[child_dob]]</p>
                                <p>Numer paszportu: [[child_passport_number]]</p>
                                <br/>
                                <p>do kraju: <strong>[[destination_country]]</strong>, w celu: [[travel_purpose]], w okresie od dnia <strong>[[travel_start_date]]</strong> do dnia <strong>[[travel_end_date]]</strong>.</p>
                                <p>Dziecko będzie podróżować [[accompanying_person_full_name]] (numer paszportu: [[accompanying_person_passport]]).</p>
                                <p>Niniejsza zgoda jest udzielona dobrowolnie i świadomie.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name_1]])</p>
                                <br>
                                <p>___________________</p>
                                <p>([[parent_full_name_2]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Parental Consent for Child to Travel Abroad',
                        'description' => 'An official statement from parents/legal guardians authorizing a child to travel abroad independently or accompanied by another person.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">PARENTAL CONSENT FOR CHILD TO TRAVEL ABROAD</h1></div><table width="100%"><tr><td><p>[[parent_full_name_1]]<br>ID: [[parent_id_1]]</p><p>[[parent_full_name_2]]<br>ID: [[parent_id_2]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I/We, the undersigned, hereby give consent for my/our minor child:</p>
                                <p>Full Name: <strong>[[child_full_name]]</strong></p>
                                <p>Date of Birth: [[child_dob]]</p>
                                <p>Passport Number: [[child_passport_number]]</p>
                                <br/>
                                <p>to travel to: <strong>[[destination_country]]</strong>, for the purpose of: [[travel_purpose]], during the period from <strong>[[travel_start_date]]</strong> to <strong>[[travel_end_date]]</strong>.</p>
                                <p>The child will be accompanied by [[accompanying_person_full_name]] (passport number: [[accompanying_person_passport]]).</p>
                                <p>This consent is given voluntarily and knowingly.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name_1]])</p>
                                <br>
                                <p>___________________</p>
                                <p>([[parent_full_name_2]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Згода батьків на виїзд дитини за кордон',
                        'description' => 'Офіційна заява батьків/законних опікунів, що дозволяє дитині самостійно виїжджати за кордон або у супроводі іншої особи.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗГОДА БАТЬКІВ НА ВИЇЗД ДИТИНИ ЗА КОРДОН</h1></div><table width="100%"><tr><td><p>[[parent_full_name_1]]<br>Паспорт: [[parent_id_1]]</p><p>[[parent_full_name_2]]<br>Паспорт: [[parent_id_2]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим я/ми, нижчепідписаний/і, висловлюю/ємо згоду на виїзд моєї/нашої неповнолітньої дитини:</p>
                                <p>ПІБ: <strong>[[child_full_name]]</strong></p>
                                <p>Дата народження: [[child_dob]]</p>
                                <p>Номер паспорта: [[child_passport_number]]</p>
                                <br/>
                                <p>до країни: <strong>[[destination_country]]</strong>, з метою: [[travel_purpose]], у період з <strong>[[travel_start_date]]</strong> по <strong>[[travel_end_date]]</strong>.</p>
                                <p>Дитина подорожуватиме у супроводі [[accompanying_person_full_name]] (номер паспорта: [[accompanying_person_passport]]).</p>
                                <p>Ця згода надана добровільно та свідомо.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name_1]])</p>
                                <br>
                                <p>___________________</p>
                                <p>([[parent_full_name_2]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Elterliche Zustimmung zur Auslandsreise des Kindes',
                        'description' => 'Eine offizielle Erklärung der Eltern/Erziehungsberechtigten, die einem Kind die selbstständige Auslandsreise oder in Begleitung einer anderen Person gestattet.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ELTERLICHE ZUSTIMMUNG ZUR AUSLANDSREISE DES KINDES</h1></div><table width="100%"><tr><td><p>[[parent_full_name_1]]<br>Ausweis: [[parent_id_1]]</p><p>[[parent_full_name_2]]<br>Ausweis: [[parent_id_2]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit erkläre/n ich/wir, der/die Unterzeichnete/n, meine/unsere Zustimmung zur Ausreise meines/unseres minderjährigen Kindes:</p>
                                <p>Name und Vorname: <strong>[[child_full_name]]</strong></p>
                                <p>Geburtsdatum: [[child_dob]]</p>
                                <p>Reisepassnummer: [[child_passport_number]]</p>
                                <br/>
                                <p>in das Land: <strong>[[destination_country]]</strong>, zum Zweck von: [[travel_purpose]], im Zeitraum vom <strong>[[travel_start_date]]</strong> bis zum <strong>[[travel_end_date]]</strong>.</p>
                                <p>Das Kind wird in Begleitung von [[accompanying_person_full_name]] (Reisepassnummer: [[accompanying_person_passport]]) reisen.</p>
                                <p>Diese Zustimmung wird freiwillig und wissentlich erteilt.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name_1]])</p>
                                <br>
                                <p>___________________</p>
                                <p>([[parent_full_name_2]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 13. Согласие на медицинское вмешательство для ребенка / Consent for Medical Intervention for a Child ---
            [
                'slug' => 'medical-intervention-consent-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"parent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna","en":"Parent/Guardian Full Name","uk":"ПІБ батьків/опікуна","de":"Vollständiger Name des Elternteils/Vormunds"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"pl":"Adres rodzica/opiekuna","en":"Parent/Guardian Address","uk":"Адреса батьків/опікуна","de":"Adresse des Elternteils/Vormunds"}},
                    {"name":"parent_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości rodzica","en":"Parent ID Number","uk":"Номер посвідчення батьків","de":"Ausweisnummer des Elternteils"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"medical_procedure_description","type":"textarea","required":true,"labels":{"pl":"Opis procedury medycznej/interwencji","en":"Description of medical procedure/intervention","uk":"Опис медичної процедури/втручання","de":"Beschreibung des medizinischen Verfahrens/Eingriffs"}},
                    {"name":"medical_facility_name","type":"text","required":true,"labels":{"pl":"Nazwa placówki medycznej","en":"Medical Facility Name","uk":"Назва медичного закладу","de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_facility_address","type":"text","required":true,"labels":{"pl":"Adres placówki medycznej","en":"Medical Facility Address","uk":"Адреса медичного закладу","de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"consent_date","type":"date","required":true,"labels":{"pl":"Data udzielenia zgody","en":"Date of Consent","uk":"Дата надання згоди","de":"Datum der Zustimmung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zgoda na medyczne interwencje dla dziecka',
                        'description' => 'Formalna zgoda rodzica/opiekuna prawnego na przeprowadzenie określonej procedury medycznej u dziecka.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ZGODA NA MEDYCZNE INTERWENCJE DLA DZIECKA</h1></div><table width="100%"><tr><td><p>[[parent_full_name]]<br>[[parent_address]]<br>Dowód osobisty: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym ja, niżej podpisany/a, wyrażam zgodę na przeprowadzenie procedury medycznej/interwencji:</p>
                                <p><strong>[[medical_procedure_description]]</strong></p>
                                <p>dla mojego małoletniego dziecka:</p>
                                <p>Imię i nazwisko: <strong>[[child_full_name]]</strong></p>
                                <p>Data urodzenia: [[child_dob]]</p>
                                <p>Procedura zostanie przeprowadzona w [[medical_facility_name]], [[medical_facility_address]].</p>
                                <p>Zgoda jest udzielona w dniu: <strong>[[consent_date]]</strong>.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Consent for Medical Intervention for a Child',
                        'description' => 'Formal consent from a parent/legal guardian for a specific medical procedure to be performed on a child.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">CONSENT FOR MEDICAL INTERVENTION FOR A CHILD</h1></div><table width="100%"><tr><td><p>[[parent_full_name]]<br>[[parent_address]]<br>ID: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned, hereby give consent for the medical procedure/intervention:</p>
                                <p><strong>[[medical_procedure_description]]</strong></p>
                                <p>to be performed on my minor child:</p>
                                <p>Full Name: <strong>[[child_full_name]]</strong></p>
                                <p>Date of Birth: [[child_dob]]</p>
                                <p>The procedure will be performed at [[medical_facility_name]], [[medical_facility_address]].</p>
                                <p>Consent is given on: <strong>[[consent_date]]</strong>.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Згода на медичне втручання для дитини',
                        'description' => 'Формальна згода батьків/законного опікуна на проведення певної медичної процедури дитині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗГОДА НА МЕДИЧНЕ ВТРУЧАННЯ ДЛЯ ДИТИНИ</h1></div><table width="100%"><tr><td><p>[[parent_full_name]]<br>[[parent_address]]<br>Паспорт: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим я, нижчепідписаний/а, висловлюю згоду на проведення медичної процедури/втручання:</p>
                                <p><strong>[[medical_procedure_description]]</strong></p>
                                <p>для моєї неповнолітньої дитини:</p>
                                <p>ПІБ: <strong>[[child_full_name]]</strong></p>
                                <p>Дата народження: [[child_dob]]</p>
                                <p>Процедура буде проведена у [[medical_facility_name]], [[medical_facility_address]].</p>
                                <p>Згода надана: <strong>[[consent_date]]</strong>.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Zustimmung zu medizinischen Eingriffen für ein Kind',
                        'description' => 'Formelle Zustimmung eines Elternteils/Erziehungsberechtigten zur Durchführung eines bestimmten medizinischen Verfahrens an einem Kind.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ZUSTIMMUNG ZU MEDIZINISCHEN EINGRIFFEN FÜR EIN KIND</h1></div><table width="100%"><tr><td><p>[[parent_full_name]]<br>[[parent_address]]<br>Ausweis: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit erkläre ich, der/die Unterzeichnete/n, meine Zustimmung zur Durchführung des medizinischen Verfahrens/Eingriffs:</p>
                                <p><strong>[[medical_procedure_description]]</strong></p>
                                <p>für mein minderjähriges Kind:</p>
                                <p>Name und Vorname: <strong>[[child_full_name]]</strong></p>
                                <p>Geburtsdatum: [[child_dob]]</p>
                                <p>Das Verfahren wird in [[medical_facility_name]], [[medical_facility_address]] durchgeführt.</p>
                                <p>Die Zustimmung wird erteilt am: <strong>[[consent_date]]</strong>.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 14. Соглашение об уплате алиментов / Alimony Payment Agreement ---
            [
                'slug' => 'alimony-payment-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"payer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko zobowiązanego do płacenia alimentów","en":"Payer\'s Full Name","uk":"ПІБ платника аліментів","de":"Vollständiger Name des Unterhaltspflichtigen"}},
                    {"name":"payer_address","type":"text","required":true,"labels":{"pl":"Adres zobowiązanego","en":"Payer\'s Address","uk":"Адреса платника","de":"Adresse des Unterhaltspflichtigen"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko uprawnionego do alimentów","en":"Recipient\'s Full Name","uk":"ПІБ одержувача аліментів","de":"Vollständiger Name des Unterhaltsberechtigten"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres uprawnionego","en":"Recipient\'s Address","uk":"Адреса одержувача","de":"Adresse des Unterhaltsberechtigten"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"alimony_amount","type":"number","required":true,"labels":{"pl":"Kwota alimentów (PLN)","en":"Alimony Amount (PLN)","uk":"Сума аліментів (PLN)","de":"Unterhaltsbetrag (PLN)"}},
                    {"name":"payment_frequency","type":"text","required":true,"labels":{"pl":"Częstotliwość płatności (np. miesięcznie)","en":"Payment Frequency (e.g., monthly)","uk":"Частота платежів (напр., щомісячно)","de":"Zahlungshäufigkeit (z.B. monatlich)"}},
                    {"name":"payment_due_day","type":"number","required":true,"labels":{"pl":"Dzień płatności (np. 10. dzień miesiąca)","en":"Payment Due Day (e.g., 10th day of the month)","uk":"День платежу (напр., 10-й день місяця)","de":"Fälligkeitstag der Zahlung (z.B. 10. des Monats)"}},
                    {"name":"bank_account_number","type":"text","required":true,"labels":{"pl":"Numer konta bankowego","en":"Bank Account Number","uk":"Номер банківського рахунку","de":"Bankkontonummer"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Ugoda alimentacyjna',
                        'description' => 'Formalna ugoda między rodzicami/opiekunami prawnymi w sprawie wysokości i warunków płatności alimentów na dziecko.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">UGODA ALIMENTACYJNA</h1></div><table width="100%"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p>Zobowiązanym do płacenia alimentów: <strong>[[payer_full_name]]</strong>, zamieszkałym/ą w [[payer_address]],</p>
                                <p>a</p>
                                <p>Uprawnionym do alimentów: <strong>[[recipient_full_name]]</strong>, zamieszkałym/ą w [[recipient_address]], działającym/ą w imieniu małoletniego dziecka:</p>
                                <p>Imię i nazwisko dziecka: <strong>[[child_full_name]]</strong>, urodzonego dnia [[child_dob]].</p>
                                <br/>
                                <p>Strony zgodnie ustalają, że kwota alimentów wynosi <strong>[[alimony_amount]] PLN</strong> miesięcznie, płatna [[payment_frequency]] do [[payment_due_day]]. dnia każdego miesiąca na konto bankowe numer: [[bank_account_number]].</p>
                                <p>Ugoda została sporządzona dobrowolnie.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Zobowiązany</p></td>
                                <td width="50%"><p>___________________<br>Uprawniony</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Alimony Payment Agreement',
                        'description' => 'A formal agreement between parents/legal guardians regarding the amount and terms of alimony payments for a child.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ALIMONY PAYMENT AGREEMENT</h1></div><table width="100%"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p>Payer: <strong>[[payer_full_name]]</strong>, residing in [[payer_address]],</p>
                                <p>and</p>
                                <p>Recipient: <strong>[[recipient_full_name]]</strong>, residing in [[recipient_address]], acting on behalf of the minor child:</p>
                                <p>Child\'s Full Name: <strong>[[child_full_name]]</strong>, born on [[child_dob]].</p>
                                <br/>
                                <p>The parties mutually agree that the alimony amount is <strong>[[alimony_amount]] PLN</strong> monthly, payable [[payment_frequency]] by the [[payment_due_day]]th day of each month to bank account number: [[bank_account_number]].</p>
                                <p>The agreement was concluded voluntarily.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Payer</p></td>
                                <td width="50%"><p>___________________<br>Recipient</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про сплату аліментів',
                        'description' => 'Формальна угода між батьками/законними опікунами щодо розміру та умов сплати аліментів на дитину.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">УГОДА ПРО СПЛАТУ АЛІМЕНТІВ</h1></div><table width="100%"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p>Зобов\'язаним до сплати аліментів: <strong>[[payer_full_name]]</strong>, який/яка проживає у [[payer_address]],</p>
                                <p>та</p>
                                <p>Одержувачем аліментів: <strong>[[recipient_full_name]]</strong>, який/яка проживає у [[recipient_address]], що діє від імені неповнолітньої дитини:</p>
                                <p>ПІБ дитини: <strong>[[child_full_name]]</strong>, народженої [[child_dob]].</p>
                                <br/>
                                <p>Сторони за взаємною згодою встановлюють, що сума аліментів становить <strong>[[alimony_amount]] PLN</strong> щомісячно, виплачується [[payment_frequency]] до [[payment_due_day]]. числа кожного місяця на банківський рахунок номер: [[bank_account_number]].</p>
                                <p>Угода укладена добровільно.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Платник</p></td>
                                <td width="50%"><p>___________________<br>Одержувач</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Unterhaltsvereinbarung',
                        'description' => 'Eine formelle Vereinbarung zwischen Eltern/Erziehungsberechtigten über die Höhe und die Bedingungen der Unterhaltszahlungen für ein Kind.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">UNTERHALTSVEREINBARUNG</h1></div><table width="100%"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p>Unterhaltspflichtiger: <strong>[[payer_full_name]]</strong>, wohnhaft in [[payer_address]],</p>
                                <p>und</p>
                                <p>Unterhaltsberechtigter: <strong>[[recipient_full_name]]</strong>, wohnhaft in [[recipient_address]], handelnd im Namen des minderjährigen Kindes:</p>
                                <p>Name und Vorname des Kindes: <strong>[[child_full_name]]</strong>, geboren am [[child_dob]].</p>
                                <br/>
                                <p>Die Parteien vereinbaren einvernehmlich, dass der Unterhaltsbetrag <strong>[[alimony_amount]] PLN</strong> monatlich beträgt, zahlbar [[payment_frequency]] bis zum [[payment_due_day]]. des jeden Monats auf das Bankkonto Nummer: [[bank_account_number]].</p>
                                <p>Die Vereinbarung wurde freiwillig getroffen.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Unterhaltspflichtiger</p></td>
                                <td width="50%"><p>___________________<br>Unterhaltsberechtigter</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 15. Брачный договор (общая структура) / Prenuptial Agreement (General Structure) ---
            [
                'slug' => 'prenuptial-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"party_one_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko strony 1","en":"Party 1 Full Name","uk":"ПІБ сторони 1","de":"Vollständiger Name der Partei 1"}},
                    {"name":"party_one_address","type":"text","required":true,"labels":{"pl":"Adres strony 1","en":"Party 1 Address","uk":"Адреса сторони 1","de":"Adresse der Partei 1"}},
                    {"name":"party_one_pesel_id","type":"text","required":true,"labels":{"pl":"PESEL/Numer dowodu strony 1","en":"PESEL/ID Number of Party 1","uk":"ПЕСЕЛЬ/Номер посвідчення сторони 1","de":"PESEL/Ausweisnummer der Partei 1"}},
                    {"name":"party_two_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko strony 2","en":"Party 2 Full Name","uk":"ПІБ сторони 2","de":"Vollständiger Name der Partei 2"}},
                    {"name":"party_two_address","type":"text","required":true,"labels":{"pl":"Adres strony 2","en":"Party 2 Address","uk":"Адреса сторони 2","de":"Adresse der Partei 2"}},
                    {"name":"party_two_pesel_id","type":"text","required":true,"labels":{"pl":"PESEL/Numer dowodu strony 2","en":"PESEL/ID Number of Party 2","uk":"ПЕСЕЛЬ/Номер посвідчення сторони 2","de":"PESEL/Ausweisnummer der Partei 2"}},
                    {"name":"property_division_rules","type":"textarea","required":true,"labels":{"pl":"Zasady podziału majątku (np. rozdzielność majątkowa)","en":"Rules for property division (e.g., separate property)","uk":"Правила поділу майна (напр., роздільна власність)","de":"Regeln für die Vermögensaufteilung (z.B. Gütertrennung)"}},
                    {"name":"other_provisions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Sonstige Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Intercyza (umowa majątkowa małżeńska)',
                        'description' => 'Ogólna struktura intercyzy, czyli umowy regulującej stosunki majątkowe między małżonkami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">UMOWA MAJĄTKOWA MAŁŻEŃSKA (INTERCYZA)</h1></div><table width="100%"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p>Panem/Panią <strong>[[party_one_full_name]]</strong>, zamieszkałym/ą w [[party_one_address]], PESEL/Dowód: [[party_one_pesel_id]],</p>
                                <p>a</p>
                                <p>Panem/Panią <strong>[[party_two_full_name]]</strong>, zamieszkałym/ą w [[party_two_address]], PESEL/Dowód: [[party_two_pesel_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Strony niniejszej umowy, zamierzające zawrzeć związek małżeński/będące w związku małżeńskim, postanawiają uregulować swoje stosunki majątkowe w następujący sposób:</p>
                                <p>[[property_division_rules]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Inne postanowienia</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą Umową, zastosowanie mają przepisy Kodeksu Rodzinnego i Opiekuńczego.</p>
                                <p>Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Strona 1</p></td>
                                <td width="50%"><p>___________________<br>Strona 2</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Prenuptial Agreement (General Structure)',
                        'description' => 'General structure of a prenuptial agreement, regulating property relations between spouses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">PRENUPTIAL AGREEMENT</h1></div><table width="100%"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p>Mr./Ms. <strong>[[party_one_full_name]]</strong>, residing in [[party_one_address]], PESEL/ID: [[party_one_pesel_id]],</p>
                                <p>and</p>
                                <p>Mr./Ms. <strong>[[party_two_full_name]]</strong>, residing in [[party_two_address]], PESEL/ID: [[party_two_pesel_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The parties to this agreement, intending to enter into marriage/being married, decide to regulate their property relations as follows:</p>
                                <p>[[property_division_rules]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Other Provisions</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Final Provisions</h2>
                                <p>Matters not regulated by this Agreement shall be governed by the provisions of the Family and Guardianship Code.</p>
                                <p>The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Party 1</p></td>
                                <td width="50%"><p>___________________<br>Party 2</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Шлюбний договір (загальна структура)',
                        'description' => 'Загальна структура шлюбного договору, що регулює майнові відносини між подружжям.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ШЛЮБНИЙ ДОГОВІР</h1></div><table width="100%"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p>Паном/Пані <strong>[[party_one_full_name]]</strong>, який/яка проживає у [[party_one_address]], ПЕСЕЛЬ/Паспорт: [[party_one_pesel_id]],</p>
                                <p>та</p>
                                <p>Паном/Пані <strong>[[party_two_full_name]]</strong>, який/яка проживає у [[party_two_address]], ПЕСЕЛЬ/Паспорт: [[party_two_pesel_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Сторони цього договору, які мають намір укласти шлюб/перебувають у шлюбі, вирішують врегулювати свої майнові відносини наступним чином:</p>
                                <p>[[property_division_rules]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Інші положення</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим Договором, застосовуються положення Сімейного та опікунського кодексу.</p>
                                <p>Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Сторона 1</p></td>
                                <td width="50%"><p>___________________<br>Сторона 2</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Ehevertrag (allgemeine Struktur)',
                        'description' => 'Allgemeine Struktur eines Ehevertrags, der die Vermögensverhältnisse zwischen Ehegatten regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">EHEVERTRAG</h1></div><table width="100%"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p>Herrn/Frau <strong>[[party_one_full_name]]</strong>, wohnhaft in [[party_one_address]], PESEL/Ausweis: [[party_one_pesel_id]],</p>
                                <p>und</p>
                                <p>Herrn/Frau <strong>[[party_two_full_name]]</strong>, wohnhaft in [[party_two_address]], PESEL/Ausweis: [[party_two_pesel_id]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Die Parteien dieses Vertrages, die beabsichtigen, die Ehe einzugehen/verheiratet sind, beschließen, ihre Vermögensverhältnisse wie folgt zu regeln:</p>
                                <p>[[property_division_rules]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Sonstige Bestimmungen</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Familien- und Vormundschaftsgesetzbuches Anwendung.</p>
                                <p>Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Partei 1</p></td>
                                <td width="50%"><p>___________________<br>Partei 2</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 16. Заявление о регистрации брака / Application for Marriage Registration ---
            [
                'slug' => 'marriage-registration-application-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name_1","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy 1","en":"Applicant 1 Full Name","uk":"ПІБ заявника 1","de":"Vollständiger Name des Antragstellers 1"}},
                    {"name":"applicant_address_1","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy 1","en":"Applicant 1 Address","uk":"Адреса заявника 1","de":"Anschrift des Antragstellers 1"}},
                    {"name":"applicant_dob_1","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy 1","en":"Applicant 1 Date of Birth","uk":"Дата народження заявника 1","de":"Geburtsdatum des Antragstellers 1"}},
                    {"name":"applicant_full_name_2","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy 2","en":"Applicant 2 Full Name","uk":"ПІБ заявника 2","de":"Vollständiger Name des Antragstellers 2"}},
                    {"name":"applicant_address_2","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy 2","en":"Applicant 2 Address","uk":"Адреса заявника 2","de":"Anschrift des Antragstellers 2"}},
                    {"name":"applicant_dob_2","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy 2","en":"Applicant 2 Date of Birth","uk":"Дата народження заявника 2","de":"Geburtsdatum des Antragstellers 2"}},
                    {"name":"desired_marriage_date","type":"date","required":true,"labels":{"pl":"Proponowana data zawarcia małżeństwa","en":"Proposed Marriage Date","uk":"Пропонована дата укладення шлюбу","de":"Vorgeschlagenes Heiratsdatum"}},
                    {"name":"desired_surname_after_marriage","type":"text","required":true,"labels":{"pl":"Nazwisko po ślubie (np. męża, żony, dwuczłonowe)","en":"Surname after marriage (e.g., husband\'s, wife\'s, hyphenated)","uk":"Прізвище після одруження (напр., чоловіка, дружини, подвійне)","de":"Nachname nach der Heirat (z.B. des Ehemanns, der Ehefrau, Doppelname)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o rejestrację małżeństwa',
                        'description' => 'Wniosek do Urzędu Stanu Cywilnego o rejestrację małżeństwa.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O REJESTRACJĘ MAŁŻEŃSTWA</h1></div><table width="100%"><tr><td><p>Wnioskodawca 1:<br>[[applicant_full_name_1]]<br>[[applicant_address_1]]<br>Urodzony/a: [[applicant_dob_1]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr><tr><td><p>Wnioskodawca 2:<br>[[applicant_full_name_2]]<br>[[applicant_address_2]]<br>Urodzony/a: [[applicant_dob_2]]</p></td><td></td></tr></table><br/><p>Do:<br><strong>Kierownika Urzędu Stanu Cywilnego w [[city]]</strong></p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracamy się z uprzejmą prośbą o rejestrację naszego małżeństwa.</p>
                                <p>Proponowana data zawarcia małżeństwa: <strong>[[desired_marriage_date]]</strong>.</p>
                                <p>Po zawarciu małżeństwa będziemy nosić nazwisko: <strong>[[desired_surname_after_marriage]]</strong>.</p>
                                <p>Oświadczamy, że nie istnieją żadne przeszkody prawne do zawarcia małżeństwa.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wnioskodawca 1</p></td>
                                <td width="50%"><p>___________________<br>Wnioskodawca 2</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Application for Marriage Registration',
                        'description' => 'Application to the Civil Registry Office for marriage registration.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR MARRIAGE REGISTRATION</h1></div><table width="100%"><tr><td><p>Applicant 1:<br>[[applicant_full_name_1]]<br>[[applicant_address_1]]<br>Born: [[applicant_dob_1]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr><tr><td><p>Applicant 2:<br>[[applicant_full_name_2]]<br>[[applicant_address_2]]<br>Born: [[applicant_dob_2]]</p></td><td></td></tr></table><br/><p>To:<br><strong>Head of the Civil Registry Office in [[city]]</strong></p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We hereby kindly request the registration of our marriage.</p>
                                <p>Proposed marriage date: <strong>[[desired_marriage_date]]</strong>.</p>
                                <p>After marriage, we will use the surname: <strong>[[desired_surname_after_marriage]]</strong>.</p>
                                <p>We declare that there are no legal impediments to marriage.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Applicant 1</p></td>
                                <td width="50%"><p>___________________<br>Applicant 2</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про реєстрацію шлюбу',
                        'description' => 'Заява до Управління цивільного стану про реєстрацію шлюбу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА ПРО РЕЄСТРАЦІЮ ШЛЮБУ</h1></div><table width="100%"><tr><td><p>Заявник 1:<br>[[applicant_full_name_1]]<br>[[applicant_address_1]]<br>Народжений/а: [[applicant_dob_1]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr><tr><td><p>Заявник 2:<br>[[applicant_full_name_2]]<br>[[applicant_address_2]]<br>Народжений/а: [[applicant_dob_2]]</p></td><td></td></tr></table><br/><p>До:<br><strong>Керівника Управління цивільного стану у [[city]]</strong></p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаємося з покірним проханням про реєстрацію нашого шлюбу.</p>
                                <p>Пропонована дата укладення шлюбу: <strong>[[desired_marriage_date]]</strong>.</p>
                                <p>Після укладення шлюбу будемо носити прізвище: <strong>[[desired_surname_after_marriage]]</strong>.</p>
                                <p>Заявляємо, що не існує жодних правових перешкод для укладення шлюбу.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник 1</p></td>
                                <td width="50%"><p>___________________<br>Заявник 2</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Eheschließung',
                        'description' => 'Antrag an das Standesamt auf Eheschließung.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF EHESCHLIESSUNG</h1></div><table width="100%"><tr><td><p>Antragsteller 1:<br>[[applicant_full_name_1]]<br>[[applicant_address_1]]<br>Geboren: [[applicant_dob_1]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr><tr><td><p>Antragsteller 2:<br>[[applicant_full_name_2]]<br>[[applicant_address_2]]<br>Geboren: [[applicant_dob_2]]</p></td><td></td></tr></table><br/><p>An:<br><strong>Leiter des Standesamtes in [[city]]</strong></p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir beantragen hiermit höflich die Registrierung unserer Ehe.</p>
                                <p>Vorgeschlagenes Heiratsdatum: <strong>[[desired_marriage_date]]</strong>.</p>
                                <p>Nach der Eheschließung werden wir den Nachnamen: <strong>[[desired_surname_after_marriage]]</strong> tragen.</p>
                                <p>Wir erklären, dass keine rechtlichen Ehehindernisse bestehen.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Antragsteller 1</p></td>
                                <td width="50%"><p>___________________<br>Antragsteller 2</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 17. Заявление о расторжении брака (в ЗАГС) / Application for Divorce (at Civil Registry Office) ---
            [
                'slug' => 'divorce-application-civil-registry-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name_1","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy 1","en":"Applicant 1 Full Name","uk":"ПІБ заявника 1","de":"Vollständiger Name des Antragstellers 1"}},
                    {"name":"applicant_address_1","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy 1","en":"Applicant 1 Address","uk":"Адреса заявника 1","de":"Anschrift des Antragstellers 1"}},
                    {"name":"applicant_full_name_2","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy 2","en":"Applicant 2 Full Name","uk":"ПІБ заявника 2","de":"Vollständiger Name des Antragstellers 2"}},
                    {"name":"applicant_address_2","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy 2","en":"Applicant 2 Address","uk":"Адреса заявника 2","de":"Anschrift des Antragstellers 2"}},
                    {"name":"marriage_date","type":"date","required":true,"labels":{"pl":"Data zawarcia małżeństwa","en":"Marriage Date","uk":"Дата укладення шлюбу","de":"Heiratsdatum"}},
                    {"name":"marriage_place","type":"text","required":true,"labels":{"pl":"Miejsce zawarcia małżeństwa","en":"Place of Marriage","uk":"Місце укладення шлюбу","de":"Heiratsort"}},
                    {"name":"reason_for_divorce","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku o rozwód","en":"Reason for Divorce Application","uk":"Обґрунтування заяви про розлучення","de":"Begründung des Scheidungsantrags"}},
                    {"name":"children_details","type":"textarea","required":false,"labels":{"pl":"Dane dotyczące dzieci (jeśli dotyczy)","en":"Children details (if applicable)","uk":"Дані щодо дітей (якщо застосовно)","de":"Angaben zu Kindern (falls zutreffend)"}},
                    {"name":"alimony_details","type":"textarea","required":false,"labels":{"pl":"Ustalenia dotyczące alimentów (jeśli dotyczy)","en":"Alimony arrangements (if applicable)","uk":"Угоди щодо аліментів (якщо застосовно)","de":"Unterhaltsregelungen (falls zutreffend)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o rozwód (w Urzędzie Stanu Cywilnego)',
                        'description' => 'Wniosek o rozwód składany w Urzędzie Stanu Cywilnego w przypadku braku dzieci i zgodnego stanowiska stron.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O ROZWÓD</h1></div><table width="100%"><tr><td><p>Wnioskodawca 1:<br>[[applicant_full_name_1]]<br>[[applicant_address_1]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr><tr><td><p>Wnioskodawca 2:<br>[[applicant_full_name_2]]<br>[[applicant_address_2]]</p></td><td></td></tr></table><br/><p>Do:<br><strong>Kierownika Urzędu Stanu Cywilnego w [[city]]</strong></p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracamy się z uprzejmą prośbą o rozwiązanie naszego małżeństwa zawartego w dniu <strong>[[marriage_date]]</strong> w [[marriage_place]].</p>
                                <p>Uzasadnienie wniosku: [[reason_for_divorce]]</p>
                                <p>Dzieci z małżeństwa: [[children_details]]</p>
                                <p>Ustalenia dotyczące alimentów: [[alimony_details]]</p>
                                <p>Oświadczamy, że nie istnieją żadne przeszkody prawne do rozwiązania małżeństwa w drodze administracyjnej.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wnioskodawca 1</p></td>
                                <td width="50%"><p>___________________<br>Wnioskodawca 2</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Application for Divorce (at Civil Registry Office)',
                        'description' => 'Application for divorce submitted to the Civil Registry Office in case of no children and mutual consent of the parties.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR DIVORCE</h1></div><table width="100%"><tr><td><p>Applicant 1:<br>[[applicant_full_name_1]]<br>[[applicant_address_1]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr><tr><td><p>Applicant 2:<br>[[applicant_full_name_2]]<br>[[applicant_address_2]]</p></td><td></td></tr></table><br/><p>To:<br><strong>Head of the Civil Registry Office in [[city]]</strong></p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>We hereby kindly request the dissolution of our marriage concluded on <strong>[[marriage_date]]</strong> in [[marriage_place]].</p>
                                <p>Reason for divorce application: [[reason_for_divorce]]</p>
                                <p>Children from marriage: [[children_details]]</p>
                                <p>Alimony arrangements: [[alimony_details]]</p>
                                <p>We declare that there are no legal impediments to the administrative dissolution of the marriage.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Applicant 1</p></td>
                                <td width="50%"><p>___________________<br>Applicant 2</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про розірвання шлюбу (в РАЦС)',
                        'description' => 'Заява про розірвання шлюбу, що подається до Управління цивільного стану у випадку відсутності дітей та взаємної згоди сторін.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА ПРО РОЗІРВАННЯ ШЛЮБУ</h1></div><table width="100%"><tr><td><p>Заявник 1:<br>[[applicant_full_name_1]]<br>[[applicant_address_1]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr><tr><td><p>Заявник 2:<br>[[applicant_full_name_2]]<br>[[applicant_address_2]]</p></td><td></td></tr></table><br/><p>До:<br><strong>Керівника Управління цивільного стану у [[city]]</strong></p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаємося з покірним проханням про розірвання нашого шлюбу, укладеного <strong>[[marriage_date]]</strong> у [[marriage_place]].</p>
                                <p>Обґрунтування заяви про розлучення: [[reason_for_divorce]]</p>
                                <p>Діти від шлюбу: [[children_details]]</p>
                                <p>Угоди щодо аліментів: [[alimony_details]]</p>
                                <p>Заявляємо, що не існує жодних правових перешкод для адміністративного розірвання шлюбу.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник 1</p></td>
                                <td width="50%"><p>___________________<br>Заявник 2</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Scheidung (beim Standesamt)',
                        'description' => 'Antrag auf Scheidung, der beim Standesamt eingereicht wird, wenn keine Kinder vorhanden sind und Einigkeit zwischen den Parteien besteht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF SCHEIDUNG</h1></div><table width="100%"><tr><td><p>Antragsteller 1:<br>[[applicant_full_name_1]]<br>[[applicant_address_1]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr><tr><td><p>Antragsteller 2:<br>[[applicant_full_name_2]]<br>[[applicant_address_2]]</p></td><td></td></tr></table><br/><p>An:<br><strong>Leiter des Standesamtes in [[city]]</strong></p><br/>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wir beantragen hiermit höflich die Auflösung unserer Ehe, die am <strong>[[marriage_date]]</strong> in [[marriage_place]] geschlossen wurde.</p>
                                <p>Begründung des Scheidungsantrags: [[reason_for_divorce]]</p>
                                <p>Kinder aus der Ehe: [[children_details]]</p>
                                <p>Unterhaltsregelungen: [[alimony_details]]</p>
                                <p>Wir erklären, dass keine rechtlichen Hindernisse für die administrative Auflösung der Ehe bestehen.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Antragsteller 1</p></td>
                                <td width="50%"><p>___________________<br>Antragsteller 2</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 18. Расписка в получении денежных средств в долг / Receipt for Money Received as Loan ---
            [
                'slug' => 'loan-receipt-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"receipt_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pokwitowania","en":"Receipt Issue Date","uk":"Дата виставлення розписки","de":"Datum der Quittung"}},
                    {"name":"lender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pożyczkodawcy","en":"Lender\'s Full Name","uk":"ПІБ позикодавця","de":"Vollständiger Name des Darlehensgebers"}},
                    {"name":"lender_address","type":"text","required":true,"labels":{"pl":"Adres pożyczkodawcy","en":"Lender\'s Address","uk":"Адреса позикодавця","de":"Adresse des Darlehensgebers"}},
                    {"name":"borrower_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pożyczkobiorcy","en":"Borrower\'s Full Name","uk":"ПІБ позичальника","de":"Vollständiger Name des Darlehensnehmers"}},
                    {"name":"borrower_address","type":"text","required":true,"labels":{"pl":"Adres pożyczkobiorcy","en":"Borrower\'s Address","uk":"Адреса позичальника","de":"Adresse des Darlehensnehmers"}},
                    {"name":"loan_amount","type":"number","required":true,"labels":{"pl":"Kwota pożyczki (PLN)","en":"Loan Amount (PLN)","uk":"Сума позики (PLN)","de":"Darlehensbetrag (PLN)"}},
                    {"name":"loan_amount_words","type":"text","required":true,"labels":{"pl":"Kwota pożyczki słownie","en":"Loan Amount in Words","uk":"Сума позики словами","de":"Darlehensbetrag in Worten"}},
                    {"name":"repayment_date","type":"date","required":true,"labels":{"pl":"Termin zwrotu pożyczki","en":"Loan Repayment Date","uk":"Термін повернення позики","de":"Rückzahlungsdatum des Darlehens"}},
                    {"name":"interest_rate","type":"text","required":false,"labels":{"pl":"Oprocentowanie (opcjonalnie)","en":"Interest Rate (optional)","uk":"Процентна ставка (необов\'язково)","de":"Zinssatz (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pokwitowanie odbioru pieniędzy w formie pożyczki',
                        'description' => 'Oficjalne pokwitowanie potwierdzające otrzymanie określonej kwoty pieniędzy jako pożyczki.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">POKWITOWANIE</h1></div><table width="100%"><tr><td><p>[[city]], ' . date('d.m.Y') . ' r.</p></td><td style="text-align: right;"><p>Data wystawienia: [[receipt_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[borrower_full_name]]</strong>, zamieszkały/a w [[borrower_address]], niniejszym potwierdzam otrzymanie od Pana/Pani <strong>[[lender_full_name]]</strong>, zamieszkałego/ej w [[lender_address]], kwoty:</p>
                                <p><strong>[[loan_amount]] PLN (słownie: [[loan_amount_words]])</strong></p>
                                <p>tytułem pożyczki.</p>
                                <p>Zobowiązuję się do zwrotu powyższej kwoty do dnia <strong>[[repayment_date]]</strong>.</p>
                                <p>Oprocentowanie pożyczki wynosi: [[interest_rate]].</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[borrower_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Receipt for Money Received as Loan',
                        'description' => 'Official receipt confirming the receipt of a specified amount of money as a loan.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">RECEIPT</h1></div><table width="100%"><tr><td><p>[[city]], ' . date('F j, Y') . '</p></td><td style="text-align: right;"><p>Issue Date: [[receipt_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[borrower_full_name]]</strong>, residing in [[borrower_address]], hereby confirm receipt from Mr./Ms. <strong>[[lender_full_name]]</strong>, residing in [[lender_address]], the amount of:</p>
                                <p><strong>[[loan_amount]] PLN (in words: [[loan_amount_words]])</strong></p>
                                <p>as a loan.</p>
                                <p>I undertake to repay the above amount by <strong>[[repayment_date]]</strong>.</p>
                                <p>Interest rate of the loan: [[interest_rate]].</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[borrower_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Розписка в отриманні грошових коштів у борг',
                        'description' => 'Офіційна розписка, що підтверджує отримання певної суми грошей як позики.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">РОЗПИСКА</h1></div><table width="100%"><tr><td><p>[[city]], ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Дата виставлення: [[receipt_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[borrower_full_name]]</strong>, який/яка проживає у [[borrower_address]], цим підтверджую отримання від Пана/Пані <strong>[[lender_full_name]]</strong>, який/яка проживає у [[lender_address]], суми:</p>
                                <p><strong>[[loan_amount]] PLN (словами: [[loan_amount_words]])</strong></p>
                                <p>у якості позики.</p>
                                <p>Зобов\'язуюся повернути вищезазначену суму до <strong>[[repayment_date]]</strong>.</p>
                                <p>Процентна ставка позики: [[interest_rate]].</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[borrower_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Quittung über den Erhalt von Geld als Darlehen',
                        'description' => 'Offizielle Quittung, die den Erhalt eines bestimmten Geldbetrags als Darlehen bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">QUITTUNG</h1></div><table width="100%"><tr><td><p>[[city]], den ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Ausstellungsdatum: [[receipt_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[borrower_full_name]]</strong>, wohnhaft in [[borrower_address]], bestätige hiermit den Erhalt von Herrn/Frau <strong>[[lender_full_name]]</strong>, wohnhaft in [[lender_address]], des Betrags von:</p>
                                <p><strong>[[loan_amount]] PLN (in Worten: [[loan_amount_words]])</strong></p>
                                <p>als Darlehen.</p>
                                <p>Ich verpflichte mich, den oben genannten Betrag bis zum <strong>[[repayment_date]]</strong> zurückzuzahlen.</p>
                                <p>Der Zinssatz des Darlehens beträgt: [[interest_rate]].</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[borrower_full_name]])</p>
                            </div>'
                    ]
                ]
            ],
            // --- Расписка о возврате денежного долга / Receipt of Money Debt Repayment ---
            [
                'slug' => 'receipt-debt-repayment-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"debtor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dłużnika","en":"Debtor\'s Full Name","uk":"ПІБ боржника","de":"Vollständiger Name des Schuldners"}},
                    {"name":"debtor_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości dłużnika","en":"Debtor\'s ID Number","uk":"Номер посвідчення боржника","de":"Ausweisnummer des Schuldners"}},
                    {"name":"creditor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wierzyciela","en":"Creditor\'s Full Name","uk":"ПІБ кредитора","de":"Vollständiger Name des Gläubigers"}},
                    {"name":"creditor_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości wierzyciela","en":"Creditor\'s ID Number","uk":"Номер посвідчення кредитора","de":"Ausweisnummer des Gläubigers"}},
                    {"name":"repaid_amount","type":"number","required":true,"labels":{"pl":"Kwota zwróconego długu","en":"Amount of Debt Repaid","uk":"Сума поверненого боргу","de":"Betrag der zurückgezahlten Schuld"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"original_loan_date","type":"date","required":true,"labels":{"pl":"Data pierwotnej pożyczki","en":"Original Loan Date","uk":"Дата первинної позики","de":"Datum des ursprünglichen Darlehens"}},
                    {"name":"witness_one_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko świadka 1 (opcjonalnie)","en":"Witness 1 Name (optional)","uk":"ПІБ свідка 1 (необов\'язково)","de":"Name des Zeugen 1 (optional)"}},
                    {"name":"witness_two_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko świadka 2 (opcjonalnie)","en":"Witness 2 Name (optional)","uk":"ПІБ свідка 2 (необов\'язково)","de":"Name des Zeugen 2 (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pokwitowanie zwrotu długu pieniężnego',
                        'description' => 'Dokument potwierdzający zwrot długu pieniężnego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POKWITOWANIE ZWROTU DŁUGU PIENIĘŻNEGO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]]</p></td><td style="text-align: right;"><p>Data: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ja, niżej podpisany/a <strong>[[creditor_full_name]]</strong>, legitymujący/a się dowodem osobistym nr [[creditor_id_number]], niniejszym potwierdzam otrzymanie od Pana/Pani <strong>[[debtor_full_name]]</strong>, legitymującego/ej się dowodem osobistym nr [[debtor_id_number]], kwoty <strong>[[repaid_amount]] [[currency]]</strong> tytułem zwrotu długu wynikającego z pożyczki udzielonej w dniu [[original_loan_date]].</p>
                                <p>Potwierdzam, że z chwilą otrzymania niniejszej kwoty, wszelkie zobowiązania dłużnika wynikające z wyżej wymienionej pożyczki zostały w pełni uregulowane.</p>
                                <br/>
                                <p>Świadkowie (opcjonalnie):</p>
                                <p>1. [[witness_one_name]]</p>
                                <p>2. [[witness_two_name]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wierzyciel (odbierający)</p></td>
                                <td width="50%"><p>___________________<br>Dłużnik (zwracający)</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Receipt of Money Debt Repayment',
                        'description' => 'A document confirming the repayment of a monetary debt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECEIPT OF MONEY DEBT REPAYMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]]</p></td><td style="text-align: right;"><p>Date: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I, the undersigned <strong>[[creditor_full_name]]</strong>, holding ID card no. [[creditor_id_number]], hereby confirm receipt from Mr./Ms. <strong>[[debtor_full_name]]</strong>, holding ID card no. [[debtor_id_number]], the amount of <strong>[[repaid_amount]] [[currency]]</strong> as repayment of the debt arising from the loan granted on [[original_loan_date]].</p>
                                <p>I confirm that upon receipt of this amount, all obligations of the debtor arising from the aforementioned loan have been fully settled.</p>
                                <br/>
                                <p>Witnesses (optional):</p>
                                <p>1. [[witness_one_name]]</p>
                                <p>2. [[witness_two_name]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Creditor (receiving)</p></td>
                                <td width="50%"><p>___________________<br>Debtor (repaying)</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Розписка про повернення грошового боргу',
                        'description' => 'Документ, що підтверджує повернення грошового боргу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РОЗПИСКА ПРО ПОВЕРНЕННЯ ГРОШОВОГО БОРГУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]]</p></td><td style="text-align: right;"><p>Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Я, нижчепідписаний/а <strong>[[creditor_full_name]]</strong>, що посвідчую особу за паспортом № [[creditor_id_number]], цим підтверджую отримання від Пана/Пані <strong>[[debtor_full_name]]</strong>, що посвідчує особу за паспортом № [[debtor_id_number]], суми <strong>[[repaid_amount]] [[currency]]</strong> як повернення боргу, що виник з позики, наданої [[original_loan_date]].</p>
                                <p>Підтверджую, що з моменту отримання цієї суми всі зобов\'язання боржника, що виникли з вищезгаданої позики, були повністю врегульовані.</p>
                                <br/>
                                <p>Свідки (необов\'язково):</p>
                                <p>1. [[witness_one_name]]</p>
                                <p>2. [[witness_two_name]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Кредитор (отримувач)</p></td>
                                <td width="50%"><p>___________________<br>Боржник (повертач)</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Quittung über die Rückzahlung einer Geldschuld',
                        'description' => 'Ein Dokument, das die Rückzahlung einer Geldschuld bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">QUITTUNG ÜBER DIE RÜCKZAHLUNG EINER GELDSCHULD</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]]</p></td><td style="text-align: right;"><p>Datum: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich, der/die Unterzeichnete <strong>[[creditor_full_name]]</strong>, Ausweis-Nr. [[creditor_id_number]], bestätige hiermit den Erhalt von Herrn/Frau <strong>[[debtor_full_name]]</strong>, Ausweis-Nr. [[debtor_id_number]], des Betrags von <strong>[[repaid_amount]] [[currency]]</strong> als Rückzahlung der Schuld aus dem am [[original_loan_date]] gewährten Darlehen.</p>
                                <p>Ich bestätige, dass mit Erhalt dieses Betrags alle Verpflichtungen des Schuldners aus dem vorgenannten Darlehen vollständig beglichen wurden.</p>
                                <br/>
                                <p>Zeugen (optional):</p>
                                <p>1. [[witness_one_name]]</p>
                                <p>2. [[witness_two_name]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Gläubiger (Empfänger)</p></td>
                                <td width="50%"><p>___________________<br>Schuldner (Rückzahler)</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Досудебная претензия о возврате долга / Pre-court Claim for Debt Repayment ---
            [
                'slug' => 'pre-court-debt-claim-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wierzyciela","en":"Claimant\'s Full Name","uk":"ПІБ кредитора","de":"Vollständiger Name des Gläubigers"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres wierzyciela","en":"Claimant\'s Address","uk":"Адреса кредитора","de":"Adresse des Gläubigers"}},
                    {"name":"debtor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dłużnika","en":"Debtor\'s Full Name","uk":"ПІБ боржника","de":"Vollständiger Name des Schuldners"}},
                    {"name":"debtor_address","type":"text","required":true,"labels":{"pl":"Adres dłużnika","en":"Debtor\'s Address","uk":"Адреса боржника","de":"Adresse des Schuldners"}},
                    {"name":"original_loan_date","type":"date","required":true,"labels":{"pl":"Data udzielenia pożyczki","en":"Loan Grant Date","uk":"Дата надання позики","de":"Datum der Darlehensvergabe"}},
                    {"name":"debt_amount","type":"number","required":true,"labels":{"pl":"Kwota długu","en":"Debt Amount","uk":"Сума боргу","de":"Schuldsumme"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"due_date","type":"date","required":true,"labels":{"pl":"Termin spłaty","en":"Due Date","uk":"Термін погашення","de":"Fälligkeitsdatum"}},
                    {"name":"claim_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły roszczenia (opis sytuacji, żądania)","en":"Claim details (situation description, demands)","uk":"Деталі претензії (опис ситуації, вимоги)","de":"Details der Forderung (Situationsbeschreibung, Forderungen)"}},
                    {"name":"deadline_for_repayment","type":"date","required":true,"labels":{"pl":"Termin spłaty długu w odpowiedzi na wezwanie","en":"Deadline for debt repayment in response to demand","uk":"Термін погашення боргу у відповідь на вимогу","de":"Frist zur Schuldentilgung nach Aufforderung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Przedsądowe wezwanie do zapłaty',
                        'description' => 'Formalne wezwanie do zapłaty długu przed skierowaniem sprawy na drogę sądową.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[debtor_full_name]]</strong><br>[[debtor_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">PRZEDSĄDOWE WEZWANIE DO ZAPŁATY</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym wzywam Pana/Panią do natychmiastowej spłaty długu w kwocie <strong>[[debt_amount]] [[currency]]</strong>, wynikającego z pożyczki udzielonej w dniu [[original_loan_date]], której termin spłaty upłynął w dniu [[due_date]].</p>
                                <p>[[claim_details]]</p>
                                <p>W przypadku braku spłaty długu w terminie do dnia <strong>[[deadline_for_repayment]]</strong>, sprawa zostanie skierowana na drogę sądową, co wiązać się będzie z dodatkowymi kosztami.</p>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Pre-court Claim for Debt Repayment',
                        'description' => 'A formal demand for debt repayment before taking legal action.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To:<br><strong>[[debtor_full_name]]</strong><br>[[debtor_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">PRE-COURT CLAIM FOR DEBT REPAYMENT</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby demand immediate repayment of the debt in the amount of <strong>[[debt_amount]] [[currency]]</strong>, arising from the loan granted on [[original_loan_date]], the repayment deadline for which expired on [[due_date]].</p>
                                <p>[[claim_details]]</p>
                                <p>In case of failure to repay the debt by <strong>[[deadline_for_repayment]]</strong>, the matter will be referred to court, which will entail additional costs.</p>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Досудова претензія про повернення боргу',
                        'description' => 'Офіційна вимога про повернення боргу до звернення до суду.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОСУДОВА ПРЕТЕНЗІЯ ПРО ПОВЕРНЕННЯ БОРГУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[debtor_full_name]]</strong><br>[[debtor_address]]</p>
                                <br/>
                                <p>Цим вимагаю негайного погашення боргу в сумі <strong>[[debt_amount]] [[currency]]</strong>, що виник з позики, наданої [[original_loan_date]], термін погашення якої закінчився [[due_date]].</p>
                                <p>[[claim_details]]</p>
                                <p>У разі непогашення боргу до <strong>[[deadline_for_repayment]]</strong>, справа буде передана до суду, що потягне за собою додаткові витрати.</p>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Außergerichtliche Forderung zur Schuldentilgung',
                        'description' => 'Eine formelle Aufforderung zur Schuldentilgung, bevor rechtliche Schritte eingeleitet werden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">AUSSERGERICHTLICHE FORDERUNG ZUR SCHULDENTILGUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[debtor_full_name]]</strong><br>[[debtor_address]]</p>
                                <br/>
                                <p>Hiermit fordere ich Sie zur sofortigen Rückzahlung der Schuld in Höhe von <strong>[[debt_amount]] [[currency]]</strong> auf, die aus dem am [[original_loan_date]] gewährten Darlehen resultiert und dessen Fälligkeitsdatum am [[due_date]] abgelaufen ist.</p>
                                <p>[[claim_details]]</p>
                                <p>Sollte die Schuld nicht bis zum <strong>[[deadline_for_repayment]]</strong> zurückgezahlt werden, wird die Angelegenheit gerichtlich verfolgt, was mit zusätzlichen Kosten verbunden sein wird.</p>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление в банк на реструктуризацию кредита / Application to Bank for Loan Restructuring ---
            [
                'slug' => 'bank-loan-restructuring-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Anschrift des Antragstellers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail wnioskodawcy","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail заявника","de":"Telefon und E-Mail des Antragstellers"}},
                    {"name":"bank_name","type":"text","required":true,"labels":{"pl":"Nazwa banku","en":"Bank Name","uk":"Назва банку","de":"Name der Bank"}},
                    {"name":"bank_address","type":"text","required":true,"labels":{"pl":"Adres banku","en":"Bank Address","uk":"Адреса банку","de":"Adresse der Bank"}},
                    {"name":"loan_number","type":"text","required":true,"labels":{"pl":"Numer umowy kredytowej","en":"Loan Agreement Number","uk":"Номер кредитного договору","de":"Darlehensvertragsnummer"}},
                    {"name":"restructuring_reason","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku o restrukturyzację","en":"Reason for restructuring application","uk":"Обґрунтування заяви про реструктуризацію","de":"Begründung des Restrukturierungsantrags"}},
                    {"name":"proposed_terms","type":"textarea","required":false,"labels":{"pl":"Proponowane warunki restrukturyzacji (opcjonalnie)","en":"Proposed restructuring terms (optional)","uk":"Пропоновані умови реструктуризації (необов\'язково)","de":"Vorgeschlagene Restrukturierungsbedingungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek do banku o restrukturyzację kredytu',
                        'description' => 'Wniosek o zmianę warunków spłaty kredytu w banku.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O RESTRUKTURYZACJĘ KREDYTU</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Numer umowy kredytowej:</strong> [[loan_number]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o restrukturyzację warunków spłaty kredytu o numerze [[loan_number]], zaciągniętego w Państwa Banku.</p>
                                <p>Uzasadnienie wniosku:</p>
                                <p>[[restructuring_reason]]</p>
                                <p>Proponowane warunki restrukturyzacji (opcjonalnie):</p>
                                <p>[[proposed_terms]]</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku i kontakt w celu omówienia szczegółów.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application to Bank for Loan Restructuring',
                        'description' => 'An application to change the terms of loan repayment with a bank.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APPLICATION FOR LOAN RESTRUCTURING</h1><p style="font-size: 14px;"><strong>Loan Agreement Number:</strong> [[loan_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>I hereby kindly request the restructuring of the repayment terms for loan number [[loan_number]], taken out with your Bank.</p>
                                <p>Reason for the application:</p>
                                <p>[[restructuring_reason]]</p>
                                <p>Proposed restructuring terms (optional):</p>
                                <p>[[proposed_terms]]</p>
                                <p>Please kindly consider my application and contact me to discuss the details.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява до банку на реструктуризацію кредиту',
                        'description' => 'Заява про зміну умов погашення кредиту в банку.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА ДО БАНКУ НА РЕСТРУКТУРИЗАЦІЮ КРЕДИТУ</h1><p style="font-size: 14px;"><strong>Номер кредитного договору:</strong> [[loan_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Звертаюся з покірним проханням про реструктуризацію умов погашення кредиту за номером [[loan_number]], отриманого у Вашому Банку.</p>
                                <p>Обґрунтування заяви:</p>
                                <p>[[restructuring_reason]]</p>
                                <p>Пропоновані умови реструктуризації (необов\'язково):</p>
                                <p>[[proposed_terms]]</p>
                                <p>Прошу позитивно розглянути мою заяву та зв\'язатися для обговорення деталей.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag an die Bank auf Kreditrestrukturierung',
                        'description' => 'Ein Antrag auf Änderung der Kreditrückzahlungsbedingungen bei einer Bank.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF KREDITRESTRUKTURIERUNG</h1><p style="font-size: 14px;"><strong>Darlehensvertragsnummer:</strong> [[loan_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Hiermit bitte ich höflich um Restrukturierung der Rückzahlungsbedingungen für das Darlehen Nummer [[loan_number]], das bei Ihrer Bank aufgenommen wurde.</p>
                                <p>Begründung des Antrags:</p>
                                <p>[[restructuring_reason]]</p>
                                <p>Vorgeschlagene Restrukturierungsbedingungen (optional):</p>
                                <p>[[proposed_terms]]</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen und mich zur Besprechung der Details zu kontaktieren.</p>
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

            // --- Заявление в банк о спорной транзакции (чарджбэк) / Application to Bank for Disputed Transaction (Chargeback) ---
            [
                'slug' => 'bank-disputed-transaction-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Anschrift des Antragstellers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail wnioskodawcy","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail заявника","de":"Telefon und E-Mail des Antragstellers"}},
                    {"name":"bank_name","type":"text","required":true,"labels":{"pl":"Nazwa banku","en":"Bank Name","uk":"Назва банку","de":"Name der Bank"}},
                    {"name":"bank_address","type":"text","required":true,"labels":{"pl":"Adres banku","en":"Bank Address","uk":"Адреса банку","de":"Adresse der Bank"}},
                    {"name":"account_number","type":"text","required":true,"labels":{"pl":"Numer rachunku bankowego","en":"Bank Account Number","uk":"Номер банківського рахунку","de":"Bankkontonummer"}},
                    {"name":"transaction_date","type":"date","required":true,"labels":{"pl":"Data spornej transakcji","en":"Disputed Transaction Date","uk":"Дата спірної транзакції","de":"Datum der strittigen Transaktion"}},
                    {"name":"transaction_amount","type":"number","required":true,"labels":{"pl":"Kwota spornej transakcji","en":"Disputed Transaction Amount","uk":"Сума спірної транзакції","de":"Betrag der strittigen Transaktion"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"transaction_description","type":"textarea","required":true,"labels":{"pl":"Opis spornej transakcji i uzasadnienie chargebacku","en":"Description of disputed transaction and chargeback reason","uk":"Опис спірної транзакції та обґрунтування чарджбеку","de":"Beschreibung der strittigen Transaktion und Begründung des Chargebacks"}},
                    {"name":"merchant_name","type":"text","required":false,"labels":{"pl":"Nazwa sprzedawcy/usługodawcy (opcjonalnie)","en":"Merchant/service provider name (optional)","uk":"Назва продавця/постачальника послуг (необов\'язково)","de":"Name des Händlers/Dienstleisters (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek do banku o chargeback (sporna transakcja)',
                        'description' => 'Wniosek do banku o zwrot środków za nieautoryzowaną lub sporną transakcję.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O CHARGEBACK</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Numer rachunku:</strong> [[account_number]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o wszczęcie procedury chargebacku (zwrotu środków) dla spornej transakcji, która miała miejsce w dniu <strong>[[transaction_date]]</strong> na kwotę <strong>[[transaction_amount]] [[currency]]</strong>.</p>
                                <p>Nazwa sprzedawcy/usługodawcy (jeśli znana): [[merchant_name]]</p>
                                <p>Opis spornej transakcji i uzasadnienie:</p>
                                <p>[[transaction_description]]</p>
                                <p>Proszę o jak najszybsze rozpatrzenie mojego wniosku i zwrot środków na mój rachunek bankowy.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application to Bank for Disputed Transaction (Chargeback)',
                        'description' => 'An application to the bank for a refund for an unauthorized or disputed transaction.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APPLICATION FOR CHARGEBACK</h1><p style="font-size: 14px;"><strong>Account Number:</strong> [[account_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>I hereby kindly request to initiate a chargeback procedure (refund) for the disputed transaction that occurred on <strong>[[transaction_date]]</strong> for the amount of <strong>[[transaction_amount]] [[currency]]</strong>.</p>
                                <p>Merchant/service provider name (if known): [[merchant_name]]</p>
                                <p>Description of the disputed transaction and justification:</p>
                                <p>[[transaction_description]]</p>
                                <p>Please process my application as soon as possible and refund the funds to my bank account.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява до банку про спірну транзакцію (чарджбек)',
                        'description' => 'Заява до банку про повернення коштів за несанкціоновану або спірну транзакцію.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА ДО БАНКУ ПРО ЧАРДЖБЕК</h1><p style="font-size: 14px;"><strong>Номер рахунку:</strong> [[account_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Звертаюся з покірним проханням про ініціювання процедури чарджбеку (повернення коштів) для спірної транзакції, яка відбулася <strong>[[transaction_date]]</strong> на суму <strong>[[transaction_amount]] [[currency]]</strong>.</p>
                                <p>Назва продавця/постачальника послуг (якщо відома): [[merchant_name]]</p>
                                <p>Опис спірної транзакції та обґрунтування:</p>
                                <p>[[transaction_description]]</p>
                                <p>Прошу якнайшвидше розглянути мою заяву та повернути кошти на мій банківський рахунок.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag an die Bank auf strittige Transaktion (Chargeback)',
                        'description' => 'Ein Antrag an die Bank auf Rückerstattung für eine nicht autorisierte oder strittige Transaktion.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF CHARGEBACK</h1><p style="font-size: 14px;"><strong>Kontonummer:</strong> [[account_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Hiermit bitte ich höflich um Einleitung eines Chargeback-Verfahrens (Rückerstattung) für die strittige Transaktion, die am <strong>[[transaction_date]]</strong> in Höhe von <strong>[[transaction_amount]] [[currency]]</strong> stattgefunden hat.</p>
                                <p>Name des Händlers/Dienstleisters (falls bekannt): [[merchant_name]]</p>
                                <p>Beschreibung der strittigen Transaktion und Begründung:</p>
                                <p>[[transaction_description]]</p>
                                <p>Bitte bearbeiten Sie meinen Antrag so schnell wie möglich und erstatten Sie die Gelder auf mein Bankkonto zurück.</p>
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

            // --- Заявление на возврат товара надлежащего качества / Application for Return of Goods of Proper Quality ---
            [
                'slug' => 'return-goods-proper-quality-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kupującego","en":"Buyer\'s Full Name","uk":"ПІБ покупця","de":"Vollständiger Name des Käufers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres kupującego","en":"Buyer\'s Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail kupującego","en":"Buyer\'s Phone & Email","uk":"Телефон та e-mail покупця","de":"Telefon und E-Mail des Käufers"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"pl":"Nazwa sprzedawcy","en":"Seller Name","uk":"Назва продавця","de":"Name des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedawcy","en":"Seller Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"product_name","type":"text","required":true,"labels":{"pl":"Nazwa towaru","en":"Product Name","uk":"Назва товару","de":"Name des Produkts"}},
                    {"name":"purchase_date","type":"date","required":true,"labels":{"pl":"Data zakupu","en":"Purchase Date","uk":"Дата покупки","de":"Kaufdatum"}},
                    {"name":"purchase_price","type":"number","required":true,"labels":{"pl":"Cena zakupu","en":"Purchase Price","uk":"Ціна покупки","de":"Kaufpreis"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"reason_for_return","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie zwrotu (np. zmiana zdania, niewłaściwy rozmiar)","en":"Reason for return (e.g., change of mind, wrong size)","uk":"Обґрунтування повернення (напр., зміна рішення, неправильний розмір)","de":"Rückgabegrund (z.B. Meinungsänderung, falsche Größe)"}},
                    {"name":"refund_method","type":"text","required":true,"labels":{"pl":"Preferowana forma zwrotu środków","en":"Preferred refund method","uk":"Бажана форма повернення коштів","de":"Bevorzugte Rückerstattungsmethode"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Oświadczenie o odstąpieniu od umowy (zwrot towaru pełnowartościowego)',
                        'description' => 'Wniosek o zwrot towaru zakupionego na odległość lub poza lokalem przedsiębiorstwa, zgodnie z prawem konsumenckim.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">OŚWIADCZENIE O ODSTĄPIENIU OD UMOWY</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym oświadczam, że odstępuję od umowy sprzedaży towaru: <strong>[[product_name]]</strong>, zakupionego w dniu <strong>[[purchase_date]]</strong> za kwotę <strong>[[purchase_price]] [[currency]]</strong>.</p>
                                <p>Uzasadnienie zwrotu:</p>
                                <p>[[reason_for_return]]</p>
                                <p>Proszę o zwrot kwoty [[purchase_price]] [[currency]] na [[refund_method]].</p>
                                <p>Towar zostanie odesłany/zwrócony w terminie 14 dni od daty złożenia niniejszego oświadczenia.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Return of Goods of Proper Quality',
                        'description' => 'An application for the return of goods purchased remotely or off-premises, in accordance with consumer law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STATEMENT OF WITHDRAWAL FROM CONTRACT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>I hereby declare that I withdraw from the contract for the sale of goods: <strong>[[product_name]]</strong>, purchased on <strong>[[purchase_date]]</strong> for the amount of <strong>[[purchase_price]] [[currency]]</strong>.</p>
                                <p>Reason for return:</p>
                                <p>[[reason_for_return]]</p>
                                <p>Please refund the amount of [[purchase_price]] [[currency]] to [[refund_method]].</p>
                                <p>The goods will be returned/sent back within 14 days from the date of this statement.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на повернення товару належної якості',
                        'description' => 'Заява про повернення товару, придбаного дистанційно або поза торговельним приміщенням, відповідно до закону про захист прав споживачів.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА ПРО ВІДМОВУ ВІД ДОГОВОРУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Цим заявляю, що відмовляюся від договору купівлі-продажу товару: <strong>[[product_name]]</strong>, придбаного <strong>[[purchase_date]]</strong> на суму <strong>[[purchase_price]] [[currency]]</strong>.</p>
                                <p>Обґрунтування повернення:</p>
                                <p>[[reason_for_return]]</p>
                                <p>Прошу повернути суму [[purchase_price]] [[currency]] на [[refund_method]].</p>
                                <p>Товар буде відправлено/повернено протягом 14 днів з дати подання цієї заяви.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Erklärung zum Widerruf des Vertrags (Rückgabe einwandfreier Ware)',
                        'description' => 'Ein Antrag auf Rückgabe von Waren, die im Fernabsatz oder außerhalb von Geschäftsräumen gekauft wurden, gemäß dem Verbraucherrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ERKLÄRUNG ZUM WIDERRUF DES VERTRAGS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Hiermit erkläre ich, dass ich vom Kaufvertrag für die Ware: <strong>[[product_name]]</strong>, gekauft am <strong>[[purchase_date]]</strong> für den Betrag von <strong>[[purchase_price]] [[currency]]</strong>, zurücktrete.</p>
                                <p>Begründung der Rückgabe:</p>
                                <p>[[reason_for_return]]</p>
                                <p>Bitte erstatten Sie den Betrag von [[purchase_price]] [[currency]] auf [[refund_method]].</p>
                                <p>Die Ware wird innerhalb von 14 Tagen ab dem Datum dieser Erklärung zurückgesandt/zurückgegeben.</p>
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

            // --- Претензия на некачественный товар / Claim for Defective Goods ---
            [
                'slug' => 'claim-defective-goods-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kupującego","en":"Buyer\'s Full Name","uk":"ПІБ покупця","de":"Vollständiger Name des Käufers"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres kupującego","en":"Buyer\'s Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"claimant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail kupującego","en":"Buyer\'s Phone & Email","uk":"Телефон та e-mail покупця","de":"Telefon und E-Mail des Käufers"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"pl":"Nazwa sprzedawcy","en":"Seller Name","uk":"Назва продавця","de":"Name des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedawcy","en":"Seller Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"product_name","type":"text","required":true,"labels":{"pl":"Nazwa towaru","en":"Product Name","uk":"Назва товару","de":"Name des Produkts"}},
                    {"name":"purchase_date","type":"date","required":true,"labels":{"pl":"Data zakupu","en":"Purchase Date","uk":"Дата покупки","de":"Kaufdatum"}},
                    {"name":"defect_description","type":"textarea","required":true,"labels":{"pl":"Opis wady towaru","en":"Description of product defect","uk":"Опис дефекту товару","de":"Beschreibung des Produktfehlers"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"pl":"Żądania (np. naprawa, wymiana, zwrot pieniędzy)","en":"Demands (e.g., repair, replacement, refund)","uk":"Вимоги (напр., ремонт, заміна, повернення грошей)","de":"Forderungen (z.B. Reparatur, Umtausch, Rückerstattung)"}},
                    {"name":"attachments","type":"text","required":false,"labels":{"pl":"Załączniki (np. dowód zakupu, zdjęcia wady)","en":"Attachments (e.g., proof of purchase, photos of defect)","uk":"Додатки (напр., доказ покупки, фото дефекту)","de":"Anhänge (z.B. Kaufbeleg, Fotos des Mangels)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Reklamacja towaru wadliwego',
                        'description' => 'Formalna reklamacja dotycząca towaru niezgodnego z umową lub posiadającego wady.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[claimant_full_name]]<br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">REKLAMACJA TOWARU WADLIWEGO</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> [[product_name]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym składam reklamację dotyczącą towaru: <strong>[[product_name]]</strong>, zakupionego w dniu <strong>[[purchase_date]]</strong>.</p>
                                <p>Wada towaru polega na: [[defect_description]]</p>
                                <p>W związku z powyższym, na podstawie przepisów Kodeksu Cywilnego dotyczących rękojmi/gwarancji, żądam: [[demands]]</p>
                                <p>W załączeniu przesyłam [[attachments]].</p>
                                <p>Proszę o rozpatrzenie reklamacji i informację o podjętych działaniach w terminie 14 dni.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Claim for Defective Goods',
                        'description' => 'A formal complaint regarding goods that are non-compliant with the contract or have defects.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CLAIM FOR DEFECTIVE GOODS</h1><p style="font-size: 14px;"><strong>Subject:</strong> [[product_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[claimant_full_name]]<br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>I hereby submit a complaint regarding the goods: <strong>[[product_name]]</strong>, purchased on <strong>[[purchase_date]]</strong>.</p>
                                <p>The defect of the goods consists of: [[defect_description]]</p>
                                <p>In connection with the above, pursuant to the provisions of the Civil Code regarding warranty/guarantee, I demand: [[demands]]</p>
                                <p>Enclosed please find [[attachments]].</p>
                                <p>Please process the complaint and inform me of the actions taken within 14 days.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Претензія на неякісний товар',
                        'description' => 'Офіційна претензія щодо товару, що не відповідає договору або має дефекти.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПРЕТЕНЗІЯ НА НЕЯКІСНИЙ ТОВАР</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[product_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[claimant_full_name]]<br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Цим подаю претензію щодо товару: <strong>[[product_name]]</strong>, придбаного <strong>[[purchase_date]]</strong>.</p>
                                <p>Дефект товару полягає в: [[defect_description]]</p>
                                <p>У зв\'язку з вищевикладеним, на підставі положень Цивільного кодексу щодо гарантії/руки, вимагаю: [[demands]]</p>
                                <p>У додатку надсилаю [[attachments]].</p>
                                <p>Прошу розглянути претензію та повідомити про вжиті заходи протягом 14 днів.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Reklamation mangelhafter Ware',
                        'description' => 'Eine formelle Reklamation bezüglich einer Ware, die nicht vertragsgemäß ist oder Mängel aufweist.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REKLAMATION MANGELHAFTER WARE</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[product_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[claimant_full_name]]<br>[[claimant_address]]<br>[[claimant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Hiermit reklamiere ich die Ware: <strong>[[product_name]]</strong>, gekauft am <strong>[[purchase_date]]</strong>.</p>
                                <p>Der Mangel der Ware besteht in: [[defect_description]]</p>
                                <p>Im Zusammenhang damit fordere ich gemäß den Bestimmungen des Bürgerlichen Gesetzbuches bezüglich Gewährleistung/Garantie: [[demands]]</p>
                                <p>Anbei sende ich Ihnen [[attachments]].</p>
                                <p>Bitte bearbeiten Sie die Reklamation und informieren Sie mich innerhalb von 14 Tagen über die ergriffenen Maßnahmen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Бюджет на месяц (личный/семейный) / Monthly Budget (Personal/Family) ---
            [
                'slug' => 'monthly-budget-pl',
                'fields' => '[
                    {"name":"month_year","type":"text","required":true,"labels":{"pl":"Miesiąc i rok","en":"Month and Year","uk":"Місяць та рік","de":"Monat und Jahr"}},
                    {"name":"budget_type","type":"text","required":true,"labels":{"pl":"Typ budżetu (osobisty/rodzinny)","en":"Budget Type (personal/family)","uk":"Тип бюджету (особистий/сімейний)","de":"Budgettyp (persönlich/familie)"}},
                    {"name":"income_sources","type":"textarea","required":true,"labels":{"pl":"Źródła dochodów (nazwa, kwota)","en":"Income sources (name, amount)","uk":"Джерела доходів (назва, сума)","de":"Einnahmequellen (Name, Betrag)"}},
                    {"name":"total_income","type":"number","required":true,"labels":{"pl":"Całkowity dochód","en":"Total Income","uk":"Загальний дохід","de":"Gesamteinnahmen"}},
                    {"name":"fixed_expenses","type":"textarea","required":true,"labels":{"pl":"Wydatki stałe (nazwa, kwota)","en":"Fixed expenses (name, amount)","uk":"Постійні витрати (назва, сума)","de":"Fixkosten (Name, Betrag)"}},
                    {"name":"variable_expenses","type":"textarea","required":true,"labels":{"pl":"Wydatki zmienne (nazwa, kwota)","en":"Variable expenses (name, amount)","uk":"Змінні витрати (назва, сума)","de":"Variable Ausgaben (Name, Betrag)"}},
                    {"name":"total_expenses","type":"number","required":true,"labels":{"pl":"Całkowite wydatki","en":"Total Expenses","uk":"Загальні витрати","de":"Gesamtausgaben"}},
                    {"name":"balance","type":"number","required":true,"labels":{"pl":"Saldo (dochód - wydatki)","en":"Balance (income - expenses)","uk":"Залишок (дохід - витрати)","de":"Saldo (Einnahmen - Ausgaben)"}},
                    {"name":"notes","type":"textarea","required":false,"labels":{"pl":"Dodatkowe uwagi (opcjonalnie)","en":"Additional notes (optional)","uk":"Додаткові примітки (необов\'язково)","de":"Zusätzliche Anmerkungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Budżet miesięczny (osobisty/rodzinny)',
                        'description' => 'Szablon do planowania i monitorowania osobistego lub rodzinnego budżetu miesięcznego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BUDŻET MIESIĘCZNY</h1><p style="font-size: 14px;">Miesiąc i rok: <strong>[[month_year]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Typ budżetu: <strong>[[budget_type]]</strong></p></td><td style="text-align: right;"><p>Data sporządzenia: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. DOCHODY</h2>
                                <pre>[[income_sources]]</pre>
                                <p><strong>Całkowity dochód: [[total_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. WYDATKI STAŁE</h2>
                                <pre>[[fixed_expenses]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. WYDATKI ZMIENNE</h2>
                                <pre>[[variable_expenses]]</pre>
                                <p><strong>Całkowite wydatki: [[total_expenses]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. SALDO</h2>
                                <p><strong>Saldo na koniec miesiąca: [[balance]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. UWAGI</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Monthly Budget (personal/family)',
                        'description' => 'A template for planning and monitoring a personal or family monthly budget.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MONTHLY BUDGET</h1><p style="font-size: 14px;">Month and Year: <strong>[[month_year]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Budget Type: <strong>[[budget_type]]</strong></p></td><td style="text-align: right;"><p>Date of Preparation: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. INCOME</h2>
                                <pre>[[income_sources]]</pre>
                                <p><strong>Total Income: [[total_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. FIXED EXPENSES</h2>
                                <pre>[[fixed_expenses]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. VARIABLE EXPENSES</h2>
                                <pre>[[variable_expenses]]</pre>
                                <p><strong>Total Expenses: [[total_expenses]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. BALANCE</h2>
                                <p><strong>Balance at end of month: [[balance]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. NOTES</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Бюджет на місяць ([[budget_type]])',
                        'description' => 'Шаблон для планування та моніторингу особистого або сімейного місячного бюджету.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">БЮДЖЕТ НА МІСЯЦЬ</h1><p style="font-size: 14px;">Місяць та рік: <strong>[[month_year]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Тип бюджету: <strong>[[budget_type]]</strong></p></td><td style="text-align: right;"><p>Дата складання: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ДОХОДИ</h2>
                                <pre>[[income_sources]]</pre>
                                <p><strong>Загальний дохід: [[total_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. ПОСТІЙНІ ВИТРАТИ</h2>
                                <pre>[[fixed_expenses]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ЗМІННІ ВИТРАТИ</h2>
                                <pre>[[variable_expenses]]</pre>
                                <p><strong>Загальні витрати: [[total_expenses]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. ЗАЛИШОК</h2>
                                <p><strong>Залишок на кінець місяця: [[balance]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. ПРИМІТКИ</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Monatsbudget (persönlich/familie)',
                        'description' => 'Eine Vorlage zur Planung und Überwachung eines persönlichen oder familiären Monatsbudgets.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MONATSBUDGET</h1><p style="font-size: 14px;">Monat und Jahr: <strong>[[month_year]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Budgettyp: <strong>[[budget_type]]</strong></p></td><td style="text-align: right;"><p>Erstellungsdatum: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. EINNAHMEN</h2>
                                <pre>[[income_sources]]</pre>
                                <p><strong>Gesamteinnahmen: [[total_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. FIXKOSTEN</h2>
                                <pre>[[fixed_expenses]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. VARIABLE AUSGABEN</h2>
                                <pre>[[variable_expenses]]</pre>
                                <p><strong>Gesamtausgaben: [[total_expenses]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. SALDO</h2>
                                <p><strong>Saldo am Monatsende: [[balance]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. ANMERKUNGEN</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Список покупок / Shopping List ---
            [
                'slug' => 'shopping-list-pl',
                'fields' => '[
                    {"name":"list_name","type":"text","required":true,"labels":{"pl":"Nazwa listy","en":"List Name","uk":"Назва списку","de":"Listenname"}},
                    {"name":"list_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia","en":"Date of Creation","uk":"Дата створення","de":"Erstellungsdatum"}},
                    {"name":"items","type":"textarea","required":true,"labels":{"pl":"Pozycje (nazwa, ilość, uwagi)","en":"Items (name, quantity, notes)","uk":"Позиції (назва, кількість, примітки)","de":"Positionen (Name, Menge, Anmerkungen)"}},
                    {"name":"notes","type":"textarea","required":false,"labels":{"pl":"Dodatkowe uwagi (opcjonalnie)","en":"Additional notes (optional)","uk":"Додаткові примітки (необов\'язково)","de":"Zusätzliche Anmerkungen (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Lista zakupów',
                        'description' => 'Prosty szablon do tworzenia list zakupów.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LISTA ZAKUPÓW</h1><p style="font-size: 14px;">Nazwa listy: <strong>[[list_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data sporządzenia: [[list_date]]</p></td><td style="text-align: right;"><p>Miejscowość: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">POZYCJE:</h2>
                                <pre>[[items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">DODATKOWE UWAGI:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Shopping List',
                        'description' => 'A simple template for creating shopping lists.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SHOPPING LIST</h1><p style="font-size: 14px;">List Name: <strong>[[list_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Date of Creation: [[list_date]]</p></td><td style="text-align: right;"><p>City: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ITEMS:</h2>
                                <pre>[[items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ADDITIONAL NOTES:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Список покупок',
                        'description' => 'Простий шаблон для створення списків покупок.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">СПИСОК ПОКУПОК</h1><p style="font-size: 14px;">Назва списку: <strong>[[list_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата створення: [[list_date]]</p></td><td style="text-align: right;"><p>Місто: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПОЗИЦІЇ:</h2>
                                <pre>[[items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ДОДАТКОВІ ПРИМІТКИ:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Einkaufsliste',
                        'description' => 'Eine einfache Vorlage zum Erstellen von Einkaufslisten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EINKAUFSLISTE</h1><p style="font-size: 14px;">Listenname: <strong>[[list_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Erstellungsdatum: [[list_date]]</p></td><td style="text-align: right;"><p>Ort: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">POSITIONEN:</h2>
                                <pre>[[items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ZUSÄTZLICHE ANMERKUNGEN:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Личное благодарственное письмо / Personal Thank You Letter ---
            [
                'slug' => 'personal-thank-you-letter-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_address","type":"text","required":true,"labels":{"pl":"Adres nadawcy","en":"Sender Address","uk":"Адреса відправника","de":"Adresse des Absenders"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbiorcy","en":"Recipient Full Name","uk":"ПІБ одержувача","de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"reason_for_thanks","type":"textarea","required":true,"labels":{"pl":"Powód podziękowania (za co dziękujesz, szczegóły)","en":"Reason for thanks (what you are thanking for, details)","uk":"Причина подяки (за що дякуєте, деталі)","de":"Grund des Dankes (wofür Sie sich bedanken, Details)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Osobisty list z podziękowaniami',
                        'description' => 'Prywatny list wyrażający wdzięczność za pomoc lub wsparcie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[sender_full_name]]<br>[[sender_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">LIST Z PODZIĘKOWANIAMI</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Drogi/Droga [[recipient_full_name]],</p>
                                <p>Chciałbym/Chciałabym Ci serdecznie podziękować za [[reason_for_thanks]].</p>
                                <p>Twoja pomoc/wsparcie/gest wiele dla mnie znaczy.</p>
                                <br/>
                                <p>Z wyrazami wdzięczności,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Personal Thank You Letter',
                        'description' => 'A private letter expressing gratitude for help or support.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PERSONAL THANK YOU LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[sender_full_name]]<br>[[sender_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Dear [[recipient_full_name]],</p>
                                <p>I would like to sincerely thank you for [[reason_for_thanks]].</p>
                                <p>Your help/support/gesture means a lot to me.</p>
                                <br/>
                                <p>With gratitude,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Особистий подячний лист',
                        'description' => 'Приватний лист, що висловлює подяку за допомогу або підтримку.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ОСОБИСТИЙ ПОДЯЧНИЙ ЛИСТ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[sender_full_name]]<br>[[sender_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Дорогий/Дорога [[recipient_full_name]],</p>
                                <p>Хочу щиро подякувати тобі за [[reason_for_thanks]].</p>
                                <p>Твоя допомога/підтримка/жест багато для мене значить.</p>
                                <br/>
                                <p>З вдячністю,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Persönliches Dankesschreiben',
                        'description' => 'Ein privater Brief, der Dankbarkeit für Hilfe oder Unterstützung ausdrückt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PERSÖNLICHES DANKESSCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[sender_full_name]]<br>[[sender_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Liebe/r [[recipient_full_name]],</p>
                                <p>Ich möchte mich herzlich für [[reason_for_thanks]] bedanken.</p>
                                <p>Deine Hilfe/Unterstützung/Geste bedeutet mir sehr viel.</p>
                                <br/>
                                <p>Mit Dankbarkeit,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Личное письмо с извинениями / Personal Apology Letter ---
            [
                'slug' => 'personal-apology-letter-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_address","type":"text","required":true,"labels":{"pl":"Adres nadawcy","en":"Sender Address","uk":"Адреса відправника","de":"Adresse des Absenders"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbiorcy","en":"Recipient Full Name","uk":"ПІБ одержувача","de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"pl":"Opis sytuacji, za którą przepraszasz","en":"Description of the situation you are apologizing for","uk":"Опис ситуації, за яку вибачаєтеся","de":"Beschreibung der Situation, für die Sie sich entschuldigen"}},
                    {"name":"apology_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły przeprosin (wyrażenie skruchy, obietnica poprawy)","en":"Apology details (expression of remorse, promise of improvement)","uk":"Деталі вибачень (вираз каяття, обіцянка покращення)","de":"Entschuldigungsdetails (Ausdruck des Bedauerns, Versprechen der Besserung)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Osobisty list z przeprosinami',
                        'description' => 'Prywatny list wyrażający skruchę i przeprosiny za zaistniałą sytuację.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[sender_full_name]]<br>[[sender_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">LIST Z PRZEPROSINAMI</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Drogi/Droga [[recipient_full_name]],</p>
                                <p>Piszę do Ciebie w związku z sytuacją, która miała miejsce: [[incident_description]].</p>
                                <p>Chciałbym/Chciałabym serdecznie przeprosić za [[apology_details]].</p>
                                <p>Mam nadzieję, że przyjmiesz moje przeprosiny.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Personal Apology Letter',
                        'description' => 'A private letter expressing remorse and apology for a given situation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PERSONAL APOLOGY LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[sender_full_name]]<br>[[sender_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Dear [[recipient_full_name]],</p>
                                <p>I am writing to you regarding the situation that occurred: [[incident_description]].</p>
                                <p>I would like to sincerely apologize for [[apology_details]].</p>
                                <p>I hope you will accept my apologies.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Особистий лист з вибаченнями',
                        'description' => 'Приватний лист, що висловлює каяття та вибачення за ситуацію, що склалася.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ОСОБИСТИЙ ЛИСТ З ВИБАЧЕННЯМИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[sender_full_name]]<br>[[sender_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Дорогий/Дорога [[recipient_full_name]],</p>
                                <p>Пишу тобі у зв\'язку з ситуацією, що сталася: [[incident_description]].</p>
                                <p>Хотів/Хотіла б щиро вибачитися за [[apology_details]].</p>
                                <p>Сподіваюся, ти приймеш мої вибачення.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Persönliches Entschuldigungsschreiben',
                        'description' => 'Ein privater Brief, der Reue und Entschuldigung für eine bestimmte Situation ausdrückt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PERSÖNLICHES ENTSCHULDIGUNGSSCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[sender_full_name]]<br>[[sender_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Liebe/r [[recipient_full_name]],</p>
                                <p>Ich schreibe Ihnen/dir bezüglich der Situation, die stattgefunden hat: [[incident_description]].</p>
                                <p>Ich möchte mich aufrichtig für [[apology_details]] entschuldigen.</p>
                                <p>Ich hoffe, Sie/du werden/wirst meine Entschuldigung annehmen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
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
