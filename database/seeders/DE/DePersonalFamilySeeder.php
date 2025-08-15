<?php

namespace Database\Seeders\DE;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class DePersonalFamilySeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'personal-family-de')->first();
        if (!$category) {
            $this->command->error('Category with slug "personal-family-de" not found.');
            return;
        }


        $templatesData = [

            [
                'slug' => 'request-public-info-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Anschrift des Antragstellers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail wnioskodawcy","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail заявника","de":"Telefon und E-Mail des Antragstellers"}},
                    {"name":"public_body_name","type":"text","required":true,"labels":{"pl":"Nazwa organu publicznego","en":"Public Body Name","uk":"Назва публічного органу","de":"Name der Behörde"}},
                    {"name":"public_body_address","type":"text","required":true,"labels":{"pl":"Adres organu publicznego","en":"Public Body Address","uk":"Адреса публічного органу","de":"Adresse der Behörde"}},
                    {"name":"request_subject","type":"text","required":true,"labels":{"pl":"Przedmiot wniosku","en":"Subject of Request","uk":"Предмет запиту","de":"Gegenstand des Antrags"}},
                    {"name":"request_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły wniosku (jakie informacje, cel, podstawa prawna np. IFG, VIG, UIG)","en":"Request details (what information, purpose, legal basis e.g., IFG, VIG, UIG)","uk":"Деталі запиту (яка інформація, мета, правова підстава, напр., IFG, VIG, UIG)","de":"Details des Antrags (welche Informationen, Zweck, Rechtsgrundlage z.B. IFG, VIG, UIG)"}},
                    {"name":"desired_form_of_information","type":"text","required":true,"labels":{"pl":"Preferowana forma udostępnienia informacji (np. kopia dokumentu, wydruk, plik elektroniczny)","en":"Preferred form of information provision (e.g., copy of document, printout, electronic file)","uk":"Бажана форма надання інформації (напр., копія документа, роздруківка, електронний файл)","de":"Bevorzugte Form der Informationsbereitstellung (z.B. Kopie des Dokuments, Ausdruck, elektronische Datei)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Auskunft nach dem Informationsfreiheitsgesetz (IFG)',
                        'description' => 'Ein formeller Antrag auf Zugang zu öffentlichen Informationen gemäß den deutschen Informationsfreiheitsgesetzen (IFG, VIG, UIG).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF AUSKUNFT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p>
                                <br/>
                                <p><strong>Betreff: Antrag auf Auskunft nach [[request_subject]]</strong></p>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich gemäß den Bestimmungen des [[request_subject]] (z.B. Informationsfreiheitsgesetz des Bundes - IFG, Verbraucherinformationsgesetz - VIG, Umweltinformationsgesetz - UIG) die Herausgabe folgender Informationen:</p>
                                <p>[[request_details]]</p>
                                <p>Ich bitte um Übermittlung der Informationen in der Form: [[desired_form_of_information]].</p>
                                <p>Bitte bestätigen Sie den Eingang meines Antrags und informieren Sie mich über die voraussichtliche Bearbeitungsdauer.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Request for Public Information (IFG/VIG/UIG)',
                        'description' => 'A formal request for access to public information in accordance with German freedom of information laws (IFG, VIG, UIG).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">REQUEST FOR INFORMATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p>
                                <br/>
                                <p><strong>Subject: Request for Information under [[request_subject]]</strong></p>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby request, in accordance with the provisions of the [[request_subject]] (e.g., Federal Freedom of Information Act - IFG, Consumer Information Act - VIG, Environmental Information Act - UIG), the disclosure of the following information:</p>
                                <p>[[request_details]]</p>
                                <p>I request the information to be provided in the format: [[desired_form_of_information]].</p>
                                <p>Please confirm receipt of my application and inform me about the estimated processing time.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Запит на отримання публічної інформації (IFG/VIG/UIG)',
                        'description' => 'Офіційний запит на доступ до публічної інформації відповідно до німецьких законів про свободу інформації (IFG, VIG, UIG).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАПИТ НА ІНФОРМАЦІЮ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p>
                                <br/>
                                <p><strong>Тема: Запит на інформацію згідно з [[request_subject]]</strong></p>
                                <p>Шановні пані та панове,</p>
                                <p>цим я звертаюся з проханням, відповідно до положень [[request_subject]] (напр., Федеральний закон про свободу інформації - IFG, Закон про інформацію для споживачів - VIG, Закон про екологічну інформацію - UIG), про надання наступної інформації:</p>
                                <p>[[request_details]]</p>
                                <p>Прошу надати інформацію у формі: [[desired_form_of_information]].</p>
                                <p>Будь ласка, підтвердіть отримання моєї заяви та повідомте про орієнтовний термін розгляду.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o udostępnienie informacji publicznej (IFG/VIG/UIG)',
                        'description' => 'Formalny wniosek o dostęp do informacji publicznej zgodnie z niemieckimi ustawami o wolności informacji (IFG, VIG, UIG).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O UDOSTĘPNIENIE INFORMACJI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p>
                                <br/>
                                <p><strong>Temat: Wniosek o udostępnienie informacji na podstawie [[request_subject]]</strong></p>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym, zgodnie z przepisami [[request_subject]] (np. Federalna Ustawa o Wolności Informacji - IFG, Ustawa o Informacji Konsumenckiej - VIG, Ustawa o Informacji Środowiskowej - UIG), zwracam się z uprzejmą prośbą o udostępnienie następujących informacji:</p>
                                <p>[[request_details]]</p>
                                <p>Proszę o udostępnienie informacji w formie: [[desired_form_of_information]].</p>
                                <p>Proszę o potwierdzenie otrzymania mojego wniosku i poinformowanie o przewidywanym czasie realizacji.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Жалоба на бездействие должностного лица / Complaint on Inaction of Public Official (Dienstaufsichtsbeschwerde/Untätigkeitsklage) ---
            [
                'slug' => 'complaint-official-inaction-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"complainant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko skarżącego","en":"Complainant\'s Full Name","uk":"ПІБ скаржника","de":"Vollständiger Name des Beschwerdeführers"}},
                    {"name":"complainant_address","type":"text","required":true,"labels":{"pl":"Adres skarżącego","en":"Complainant\'s Address","uk":"Адреса скаржника","de":"Adresse des Beschwerdeführers"}},
                    {"name":"complainant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail skarżącego","en":"Complainant\'s Phone & Email","uk":"Телефон та e-mail скаржника","de":"Telefon und E-Mail des Beschwerdeführers"}},
                    {"name":"public_body_name","type":"text","required":true,"labels":{"pl":"Nazwa organu/instytucji","en":"Public Body/Institution Name","uk":"Назва органу/установи","de":"Name der Behörde/Institution"}},
                    {"name":"public_body_address","type":"text","required":true,"labels":{"pl":"Adres organu/instytucji","en":"Public Body/Institution Address","uk":"Адреса органу/установи","de":"Adresse der Behörde/Institution"}},
                    {"name":"official_name_position","type":"text","required":false,"labels":{"pl":"Imię, nazwisko i stanowisko urzędnika (jeśli znane)","en":"Official\'s Name & Position (if known)","uk":"Ім\'я, прізвище та посада посадовця (якщо відомо)","de":"Name und Position des Beamten (falls bekannt)"}},
                    {"name":"inaction_description","type":"textarea","required":true,"labels":{"pl":"Opis bezczynności/przewlekłości (z datami, numerami spraw)","en":"Description of inaction/prolonged proceedings (with dates, case numbers)","uk":"Опис бездіяльності/зволікання (з датами, номерами справ)","de":"Beschreibung der Untätigkeit/Verzögerung (mit Daten, Aktenzeichen)"}},
                    {"name":"requested_action","type":"textarea","required":true,"labels":{"pl":"Żądane działania (np. podjęcie decyzji, przyspieszenie postępowania)","en":"Requested actions (e.g., decision making, accelerating proceedings)","uk":"Затребувані дії (напр., прийняття рішення, прискорення провадження)","de":"Gewünschte Maßnahmen (z.B. Entscheidungsfindung, Beschleunigung des Verfahrens)"}},
                    {"name":"attachments","type":"text","required":false,"labels":{"pl":"Załączniki (opcjonalnie, np. kopie korespondencji)","en":"Attachments (optional, e.g., copies of correspondence)","uk":"Додатки (необов\'язково, напр., копії кореспонденції)","de":"Anhänge (optional, z.B. Kopien der Korrespondenz)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Dienstaufsichtsbeschwerde / Untätigkeitsklage',
                        'description' => 'Eine formelle Beschwerde wegen Untätigkeit oder Verzögerung von Seiten einer Behörde oder eines Beamten, gemäß deutschem Verwaltungsrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">DIENSTAUFSICHTSBESCHWERDE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p>
                                <br/>
                                <p><strong>Betreff: Beschwerde wegen Untätigkeit / Verzögerung im Verfahren betreffend [[official_name_position]]</strong></p>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit lege ich Dienstaufsichtsbeschwerde / erhebe Untätigkeitsklage wegen der Untätigkeit / Verzögerung in folgender Angelegenheit ein:</p>
                                <p>[[inaction_description]]</p>
                                <p>Ich fordere Sie auf, folgende Maßnahmen zu ergreifen: [[requested_action]]</p>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <p>Ich bitte um eine zeitnahe Bearbeitung meiner Beschwerde und um Information über die eingeleiteten Schritte.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Complaint on Inaction of Public Official (Administrative Complaint/Action for Failure to Act)',
                        'description' => 'A formal complaint about inaction or prolonged proceedings by a public body or official, according to German administrative law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ADMINISTRATIVE COMPLAINT / ACTION FOR FAILURE TO ACT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p>
                                <br/>
                                <p><strong>Subject: Complaint regarding Inaction / Delay in proceedings concerning [[official_name_position]]</strong></p>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby file an administrative complaint / action for failure to act regarding the inaction / delay in the following matter:</p>
                                <p>[[inaction_description]]</p>
                                <p>I request you to take the following actions: [[requested_action]]</p>
                                <p>Enclosed please find: [[attachments]].</p>
                                <p>I kindly request a timely processing of my complaint and information on the steps taken.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Скарга на бездіяльність посадової особи (Адміністративна скарга/Позов про бездіяльність)',
                        'description' => 'Формальна скарга на бездіяльність або зволікання з боку публічного органу або посадовця, відповідно до німецького адміністративного права.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">АДМІНІСТРАТИВНА СКАРГА / ПОЗОВ ПРО БЕЗДІЯЛЬНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p>
                                <br/>
                                <p><strong>Тема: Скарга щодо бездіяльності / зволікання у справі стосовно [[official_name_position]]</strong></p>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю адміністративну скаргу / позов про бездіяльність щодо бездіяльності / зволікання у наступній справі:</p>
                                <p>[[inaction_description]]</p>
                                <p>Я вимагаю від Вас вжити наступних заходів: [[requested_action]]</p>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <p>Прошу своєчасно розглянути мою скаргу та повідомити про вжиті кроки.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Skarga na bezczynność urzędnika / Skarga o przewlekłość postępowania',
                        'description' => 'Formalna skarga na brak działania lub przewlekłość postępowania ze strony organu publicznego lub urzędnika, zgodnie z niemieckim prawem administracyjnym.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">SKARGA NA BEZCZYNNOŚĆ / PRZEWLEKŁOŚĆ POSTĘPOWANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[complainant_full_name]]<br>[[complainant_address]]<br>[[complainant_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[public_body_name]]</strong><br>[[public_body_address]]</p>
                                <br/>
                                <p><strong>Temat: Skarga na bezczynność / przewlekłość postępowania dotycząca [[official_name_position]]</strong></p>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam skargę na bezczynność / przewlekłość postępowania w następującej sprawie:</p>
                                <p>[[inaction_description]]</p>
                                <p>Wnoszę o podjęcie następujących działań: [[requested_action]]</p>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <p>Proszę o terminowe rozpatrzenie mojej skargi i informację o podjętych krokach.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[complainant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление на получение справки о несудимости / Application for Certificate of No Criminal Record (Antrag auf Führungszeugnis) ---
            [
                'slug' => 'certificate-no-criminal-record-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania wnioskodawcy","en":"Applicant\'s Residential Address","uk":"Адреса проживання заявника","de":"Wohnadresse des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy","en":"Applicant\'s Date of Birth","uk":"Дата народження заявника","de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_pob","type":"text","required":true,"labels":{"pl":"Miejsce urodzenia wnioskodawcy","en":"Applicant\'s Place of Birth","uk":"Місце народження заявника","de":"Geburtsort des Antragstellers"}},
                    {"name":"applicant_nationality","type":"text","required":true,"labels":{"pl":"Narodowość wnioskodawcy","en":"Applicant\'s Nationality","uk":"Національність заявника","de":"Nationalität des Antragstellers"}},
                    {"name":"purpose_of_certificate","type":"textarea","required":true,"labels":{"pl":"Cel uzyskania zaświadczenia (np. dla pracodawcy, dla urzędu)","en":"Purpose of obtaining certificate (e.g., for employer, for authority)","uk":"Мета отримання довідки (напр., для роботодавця, для установи)","de":"Zweck der Bescheinigung (z.B. für Arbeitgeber, für Behörde)"}},
                    {"name":"recipient_of_certificate","type":"text","required":true,"labels":{"pl":"Odbiorca zaświadczenia (np. bezpośrednio do pracodawcy/urzędu lub do rąk własnych)","en":"Recipient of certificate (e.g., directly to employer/authority or to own hands)","uk":"Одержувач довідки (напр., безпосередньо роботодавцю/установі або на руки)","de":"Empfänger der Bescheinigung (z.B. direkt an Arbeitgeber/Behörde oder an eigene Hände)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Führungszeugnis',
                        'description' => 'Ein Standardantrag auf Ausstellung eines Führungszeugnisses in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF FÜHRUNGSZEUGNIS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Geburtsdatum: [[applicant_dob]]</p><p>Geburtsort: [[applicant_pob]]</p><p>Nationalität: [[applicant_nationality]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Bundesamt für Justiz<br>Referat IV 2<br>53094 Bonn</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich die Ausstellung eines Führungszeugnisses (gemäß § 30 BZRG).</p>
                                <p>Das Führungszeugnis wird benötigt für: [[purpose_of_certificate]]</p>
                                <p>Das Führungszeugnis soll gesendet werden an: [[recipient_of_certificate]]</p>
                                <br/>
                                <p>Ich bitte um eine zeitnahe Bearbeitung meines Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Certificate of No Criminal Record',
                        'description' => 'A standard application for a certificate of good conduct (Führungszeugnis) in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR CERTIFICATE OF GOOD CONDUCT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Date of Birth: [[applicant_dob]]</p><p>Place of Birth: [[applicant_pob]]</p><p>Nationality: [[applicant_nationality]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>Federal Office of Justice<br>Unit IV 2<br>53094 Bonn</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby apply for the issuance of a certificate of good conduct (pursuant to § 30 BZRG).</p>
                                <p>The certificate is required for: [[purpose_of_certificate]]</p>
                                <p>The certificate should be sent to: [[recipient_of_certificate]]</p>
                                <br/>
                                <p>I kindly request a timely processing of my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на отримання довідки про несудимість',
                        'description' => 'Стандартна заява на отримання довідки про несудимість (Führungszeugnis) у Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА НА ОТРИМАННЯ ДОВІДКИ ПРО НЕСУДИМІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Дата народження: [[applicant_dob]]</p><p>Місце народження: [[applicant_pob]]</p><p>Національність: [[applicant_nationality]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br>Федеральне відомство юстиції<br>Відділ IV 2<br>53094 Бонн</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю заяву на видачу довідки про несудимість (відповідно до § 30 BZRG).</p>
                                <p>Довідка потрібна для: [[purpose_of_certificate]]</p>
                                <p>Довідку слід надіслати на: [[recipient_of_certificate]]</p>
                                <br/>
                                <p>Прошу своєчасно розглянути мою заяву.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o wydanie zaświadczenia o niekaralności (Führungszeugnis)',
                        'description' => 'Standardowy wniosek o wydanie zaświadczenia o niekaralności (Führungszeugnis) w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O WYDANIE ZAŚWIADCZENIA O NIEKARALNOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Data urodzenia: [[applicant_dob]]</p><p>Miejsce urodzenia: [[applicant_pob]]</p><p>Narodowość: [[applicant_nationality]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Bundesamt für Justiz<br>Referat IV 2<br>53094 Bonn</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam wniosek o wydanie zaświadczenia o niekaralności (zgodnie z § 30 BZRG).</p>
                                <p>Zaświadczenie jest potrzebne do: [[purpose_of_certificate]]</p>
                                <p>Zaświadczenie ma zostać wysłane na adres: [[recipient_of_certificate]]</p>
                                <br/>
                                <p>Proszę o terminowe rozpatrzenie mojego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление на получение справки о составе семьи / Application for Certificate of Family Composition (Meldebescheinigung/Haushaltsbescheinigung) ---
            [
                'slug' => 'certificate-family-composition-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania wnioskodawcy","en":"Applicant\'s Residential Address","uk":"Адреса проживання заявника","de":"Wohnadresse des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy","en":"Applicant\'s Date of Birth","uk":"Дата народження заявника","de":"Geburtsdatum des Antragstellers"}},
                    {"name":"purpose_of_certificate","type":"textarea","required":true,"labels":{"pl":"Cel uzyskania zaświadczenia","en":"Purpose of obtaining certificate","uk":"Мета отримання довідки","de":"Zweck der Bescheinigung"}},
                    {"name":"authority_name","type":"text","required":true,"labels":{"pl":"Nazwa organu, do którego składany jest wniosek (np. Bürgeramt)","en":"Name of authority to which the application is submitted (e.g., Bürgeramt)","uk":"Назва органу, до якого подається заява (напр., Bürgeramt)","de":"Name der Behörde, bei der der Antrag gestellt wird (z.B. Bürgeramt)"}},
                    {"name":"authority_address","type":"text","required":true,"labels":{"pl":"Adres organu","en":"Authority Address","uk":"Адреса органу","de":"Adresse der Behörde"}},
                    {"name":"family_members_details","type":"textarea","required":false,"labels":{"pl":"Szczegóły członków rodziny (imię, nazwisko, data urodzenia, stopień pokrewieństwa)","en":"Details of family members (name, surname, date of birth, relationship)","uk":"Деталі членів сім\'ї (ім\'я, прізвище, дата народження, ступінь споріднення)","de":"Details der Familienmitglieder (Name, Nachname, Geburtsdatum, Verwandtschaftsgrad)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Meldebescheinigung / Haushaltsbescheinigung',
                        'description' => 'Ein Antrag auf Ausstellung einer behördlichen Bescheinigung über den Wohnsitz oder die Haushaltszusammensetzung in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF MELDEBESCHEINIGUNG / HAUSHALTSBESCHEINIGUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Geburtsdatum: [[applicant_dob]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich die Ausstellung einer Meldebescheinigung / Haushaltsbescheinigung für die unter meiner Adresse gemeldeten Personen.</p>
                                <p>Die Bescheinigung wird benötigt für: [[purpose_of_certificate]]</p>
                                <p>Folgende Personen gehören zu meinem Haushalt (falls relevant):</p>
                                <pre>[[family_members_details]]</pre>
                                <br/>
                                <p>Ich bitte um eine zeitnahe Bearbeitung meines Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Certificate of Residence / Household Composition',
                        'description' => 'An application for an official certificate of residence or household composition in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR CERTIFICATE OF RESIDENCE / HOUSEHOLD COMPOSITION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Date of Birth: [[applicant_dob]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby apply for the issuance of a certificate of residence / household composition for the persons registered at my address.</p>
                                <p>The certificate is required for: [[purpose_of_certificate]]</p>
                                <p>The following persons belong to my household (if relevant):</p>
                                <pre>[[family_members_details]]</pre>
                                <br/>
                                <p>I kindly request a timely processing of my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на отримання довідки про склад сім\'ї / про реєстрацію місця проживання',
                        'description' => 'Заява на отримання офіційної довідки про місце проживання або склад домогосподарства в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА НА ОТРИМАННЯ ДОВІДКИ ПРО СКЛАД СІМ\'Ї / ПРО РЕЄСТРАЦІЮ МІСЦЯ ПРОЖИВАННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Дата народження: [[applicant_dob]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю заяву на видачу довідки про реєстрацію місця проживання / довідки про склад домогосподарства для осіб, зареєстрованих за моєю адресою.</p>
                                <p>Довідка потрібна для: [[purpose_of_certificate]]</p>
                                <p>До мого домогосподарства належать (якщо актуально) наступні особи:</p>
                                <pre>[[family_members_details]]</pre>
                                <br/>
                                <p>Прошу своєчасно розглянути мою заяву.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o wydanie zaświadczenia o zameldowaniu / składzie gospodarstwa domowego',
                        'description' => 'Wniosek o wydanie urzędowego zaświadczenia o miejscu zamieszkania lub składzie gospodarstwa domowego w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O WYDANIE ZAŚWIADCZENIA O ZAMELDOWANIU / SKŁADZIE GOSPODARSTWA DOMOWEGO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Data urodzenia: [[applicant_dob]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam wniosek o wydanie zaświadczenia o zameldowaniu / zaświadczenia o składzie gospodarstwa domowego dla osób zameldowanych pod moim adresem.</p>
                                <p>Zaświadczenie jest potrzebne do: [[purpose_of_certificate]]</p>
                                <p>Do mojego gospodarstwa domowego należą (jeśli dotyczy) następujące osoby:</p>
                                <pre>[[family_members_details]]</pre>
                                <br/>
                                <p>Proszę o terminowe rozpatrzenie mojego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление на смену имени/фамилии / Application for Name Change (Antrag auf Namensänderung) ---
            [
                'slug' => 'name-change-application-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Obecne imię i nazwisko wnioskodawcy","en":"Applicant\'s Current Full Name","uk":"Поточне ПІБ заявника","de":"Aktueller vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania wnioskodawcy","en":"Applicant\'s Residential Address","uk":"Адреса проживання заявника","de":"Wohnadresse des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy","en":"Applicant\'s Date of Birth","uk":"Дата народження заявника","de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_pob","type":"text","required":true,"labels":{"pl":"Miejsce urodzenia wnioskodawcy","en":"Applicant\'s Place of Birth","uk":"Місце народження заявника","de":"Geburtsort des Antragstellers"}},
                    {"name":"current_name","type":"text","required":true,"labels":{"pl":"Obecne imię i nazwisko","en":"Current Name","uk":"Поточне ім\'я та прізвище","de":"Aktueller Name"}},
                    {"name":"desired_name","type":"text","required":true,"labels":{"pl":"Żądane imię i nazwisko","en":"Desired Name","uk":"Бажане ім\'я та прізвище","de":"Gewünschter Name"}},
                    {"name":"reason_for_change","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku o zmianę imienia/nazwiska","en":"Reason for name change application","uk":"Обґрунтування заяви про зміну імені/прізвища","de":"Begründung des Antrags auf Namensänderung"}},
                    {"name":"authority_name","type":"text","required":true,"labels":{"pl":"Nazwa organu (np. Urząd Stanu Cywilnego)","en":"Name of authority (e.g., Civil Registry Office)","uk":"Назва органу (напр., Орган реєстрації актів цивільного стану)","de":"Name der Behörde (z.B. Standesamt)"}},
                    {"name":"authority_address","type":"text","required":true,"labels":{"pl":"Adres organu","en":"Authority Address","uk":"Адреса органу","de":"Adresse der Behörde"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Namensänderung',
                        'description' => 'Ein Antrag auf Änderung des Vor- oder Nachnamens gemäß dem deutschen Namensänderungsgesetz.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF NAMENSÄNDERUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Geburtsdatum: [[applicant_dob]]</p><p>Geburtsort: [[applicant_pob]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich die Änderung meines Namens von <strong>[[current_name]]</strong> in <strong>[[desired_name]]</strong>.</p>
                                <p>Begründung des Antrags:</p>
                                <p>[[reason_for_change]]</p>
                                <br/>
                                <p>Ich bitte um eine zeitnahe Bearbeitung meines Antrags und um Information über die weiteren Schritte.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Name Change',
                        'description' => 'An application for changing a first or last name according to German name change law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR NAME CHANGE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Date of Birth: [[applicant_dob]]</p><p>Place of Birth: [[applicant_pob]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby apply for the change of my name from <strong>[[current_name]]</strong> to <strong>[[desired_name]]</strong>.</p>
                                <p>Reason for the application:</p>
                                <p>[[reason_for_change]]</p>
                                <br/>
                                <p>I kindly request a timely processing of my application and information on the further steps.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на зміну імені/прізвища',
                        'description' => 'Заява на зміну імені або прізвища відповідно до німецького законодавства про зміну імен.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА НА ЗМІНУ ІМЕНІ/ПРІЗВИЩА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Дата народження: [[applicant_dob]]</p><p>Місце народження: [[applicant_pob]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю заяву на зміну мого імені з <strong>[[current_name]]</strong> на <strong>[[desired_name]]</strong>.</p>
                                <p>Обґрунтування заяви:</p>
                                <p>[[reason_for_change]]</p>
                                <br/>
                                <p>Прошу своєчасно розглянути мою заяву та надати інформацію про подальші кроки.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o zmianę imienia/nazwiska',
                        'description' => 'Wniosek o zmianę imienia lub nazwiska zgodnie z niemiecką ustawą o zmianie nazwisk.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O ZMIANĘ IMIENIA/NAZWISKA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_address]]</p><p>Data urodzenia: [[applicant_dob]]</p><p>Miejsce urodzenia: [[applicant_pob]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam wniosek o zmianę mojego imienia/nazwiska z <strong>[[current_name]]</strong> na <strong>[[desired_name]]</strong>.</p>
                                <p>Uzasadnienie wniosku:</p>
                                <p>[[reason_for_change]]</p>
                                <br/>
                                <p>Proszę o terminowe rozpatrzenie mojego wniosku i informację o dalszych krokach.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление на регистрацию/снятие с регистрации места жительства / Application for Registration/Deregistration of Residence (Anmeldung/Abmeldung des Wohnsitzes) ---
            [
                'slug' => 'residence-registration-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Datum des Antrags"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy","en":"Applicant\'s Date of Birth","uk":"Дата народження заявника","de":"Geburtsdatum des Antragstellers"}},
                    {"name":"current_address","type":"text","required":true,"labels":{"pl":"Obecny adres zamieszkania","en":"Current Residential Address","uk":"Поточна адреса проживання","de":"Aktuelle Wohnadresse"}},
                    {"name":"new_address","type":"text","required":false,"labels":{"pl":"Nowy adres zamieszkania (tylko dla zameldowania)","en":"New Residential Address (for registration only)","uk":"Нова адреса проживання (лише для реєстрації)","de":"Neue Wohnadresse (nur für Anmeldung)"}},
                    {"name":"move_date","type":"date","required":true,"labels":{"pl":"Data zameldowania/wymeldowania","en":"Registration/Deregistration Date","uk":"Дата реєстрації/зняття з реєстрації","de":"An-/Abmeldedatum"}},
                    {"name":"application_type","type":"text","required":true,"labels":{"pl":"Typ wniosku (zameldowanie/wymeldowanie)","en":"Application Type (registration/deregistration)","uk":"Тип заяви (реєстрація/зняття з реєстрації)","de":"Antragstyp (Anmeldung/Abmeldung)"}},
                    {"name":"authority_name","type":"text","required":true,"labels":{"pl":"Nazwa organu (np. Bürgeramt)","en":"Name of authority (e.g., Bürgeramt)","uk":"Назва органу (напр., Bürgeramt)","de":"Name der Behörde (z.B. Bürgeramt)"}},
                    {"name":"authority_address","type":"text","required":true,"labels":{"pl":"Adres organu","en":"Authority Address","uk":"Адреса органу","de":"Adresse der Behörde"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Anmeldung / Abmeldung des Wohnsitzes',
                        'description' => 'Ein Standardformular zur An- oder Abmeldung des Wohnsitzes beim Bürgeramt in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANMELDUNG / ABMELDUNG DES WOHNSITZES</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Geburtsdatum: [[applicant_dob]]</p><p>Aktuelle Adresse: [[current_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit zeige ich meine [[application_type]] meines Wohnsitzes an.</p>
                                <p>Datum des Einzugs / Auszugs: <strong>[[move_date]]</strong></p>
                                <p>Neue Adresse (nur bei Anmeldung): [[new_address]]</p>
                                <br/>
                                <p>Ich bitte um Bestätigung der [[application_type]] und um Ausstellung einer Meldebescheinigung.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Registration / Deregistration of Residence',
                        'description' => 'A standard form for registering or deregistering residence at the Bürgeramt in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">REGISTRATION / DEREGISTRATION OF RESIDENCE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Date of Birth: [[applicant_dob]]</p><p>Current Address: [[current_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby notify you of my [[application_type]] of residence.</p>
                                <p>Date of move-in / move-out: <strong>[[move_date]]</strong></p>
                                <p>New Address (for registration only): [[new_address]]</p>
                                <br/>
                                <p>I kindly request confirmation of the [[application_type]] and issuance of a registration certificate.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на реєстрацію/зняття з реєстрації місця проживання',
                        'description' => 'Стандартна форма для реєстрації або зняття з реєстрації місця проживання в Bürgeramt у Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">РЕЄСТРАЦІЯ / ЗНЯТТЯ З РЕЄСТРАЦІЇ МІСЦЯ ПРОЖИВАННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Дата народження: [[applicant_dob]]</p><p>Поточна адреса: [[current_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я повідомляю про мою [[application_type]] місця проживання.</p>
                                <p>Дата в\'їзду / виїзду: <strong>[[move_date]]</strong></p>
                                <p>Нова адреса (лише для реєстрації): [[new_address]]</p>
                                <br/>
                                <p>Прошу підтвердити [[application_type]] та видати довідку про реєстрацію.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o zameldowanie / wymeldowanie',
                        'description' => 'Standardowy formularz do zameldowania lub wymeldowania miejsca zamieszkania w Bürgeramt w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ZAMELDOWANIE / WYMELDOWANIE MIEJSCA ZAMIESZKANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Data urodzenia: [[applicant_dob]]</p><p>Obecny adres: [[current_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym zgłaszam [[application_type]] mojego miejsca zamieszkania.</p>
                                <p>Data wprowadzenia się / wyprowadzenia się: <strong>[[move_date]]</strong></p>
                                <p>Nowy adres (tylko w przypadku zameldowania): [[new_address]]</p>
                                <br/>
                                <p>Proszę o potwierdzenie [[application_type]] i wydanie zaświadczenia o zameldowaniu.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление на получение загранпаспорта (общая форма) / Application for Passport (General Form) (Antrag auf Reisepass) ---
            [
                'slug' => 'passport-application-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Datum des Antrags"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy","en":"Applicant\'s Date of Birth","uk":"Дата народження заявника","de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_pob","type":"text","required":true,"labels":{"pl":"Miejsce urodzenia wnioskodawcy","en":"Applicant\'s Place of Birth","uk":"Місце народження заявника","de":"Geburtsort des Antragstellers"}},
                    {"name":"applicant_nationality","type":"text","required":true,"labels":{"pl":"Narodowość wnioskodawcy","en":"Applicant\'s Nationality","uk":"Національність заявника","de":"Nationalität des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania wnioskodawcy","en":"Applicant\'s Residential Address","uk":"Адреса проживання заявника","de":"Wohnadresse des Antragstellers"}},
                    {"name":"previous_passport_number","type":"text","required":false,"labels":{"pl":"Numer poprzedniego paszportu (jeśli dotyczy)","en":"Previous Passport Number (if applicable)","uk":"Номер попереднього паспорта (якщо застосовно)","de":"Nummer des vorherigen Reisepasses (falls zutreffend)"}},
                    {"name":"reason_for_new_passport","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku o nowy paszport (np. wygaśnięcie, brak miejsca na wizy, utrata)","en":"Reason for new passport application (e.g., expiry, no space for visas, loss)","uk":"Обґрунтування заяви на новий паспорт (напр., закінчення терміну дії, відсутність місця для віз, втрата)","de":"Begründung des Antrags auf neuen Reisepass (z.B. Ablauf, kein Platz für Visa, Verlust)"}},
                    {"name":"authority_name","type":"text","required":true,"labels":{"pl":"Nazwa organu (np. Bürgeramt, Ausländerbehörde)","en":"Name of authority (e.g., Bürgeramt, Immigration Office)","uk":"Назва органу (напр., Bürgeramt, Імміграційна служба)","de":"Name der Behörde (z.B. Bürgeramt, Ausländerbehörde)"}},
                    {"name":"authority_address","type":"text","required":true,"labels":{"pl":"Adres organu","en":"Authority Address","uk":"Адреса органу","de":"Adresse der Behörde"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Reisepass',
                        'description' => 'Ein Standardantrag auf Ausstellung eines Reisepasses in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF REISEPASS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Geburtsdatum: [[applicant_dob]]</p><p>Geburtsort: [[applicant_pob]]</p><p>Nationalität: [[applicant_nationality]]</p><p>Adresse: [[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich die Ausstellung eines Reisepasses.</p>
                                <p>Nummer des vorherigen Reisepasses: [[previous_passport_number]]</p>
                                <p>Begründung des Antrags: [[reason_for_new_passport]]</p>
                                <br/>
                                <p>Ich bitte um eine zeitnahe Bearbeitung meines Antrags und um Information über die Abholung des Reisepasses.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Passport (General Form)',
                        'description' => 'A standard application for the issuance of a passport in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR PASSPORT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Date of Birth: [[applicant_dob]]</p><p>Place of Birth: [[applicant_pob]]</p><p>Nationality: [[applicant_nationality]]</p><p>Address: [[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby apply for the issuance of a passport.</p>
                                <p>Previous Passport Number: [[previous_passport_number]]</p>
                                <p>Reason for Application: [[reason_for_new_passport]]</p>
                                <br/>
                                <p>I kindly request a timely processing of my application and information on passport collection.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на отримання закордонного паспорта (загальна форма)',
                        'description' => 'Стандартна заява на видачу закордонного паспорта в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА НА ОТРИМАННЯ ЗАКОРДОННОГО ПАСПОРТА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Дата народження: [[applicant_dob]]</p><p>Місце народження: [[applicant_pob]]</p><p>Національність: [[applicant_nationality]]</p><p>Адреса: [[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю заяву на видачу закордонного паспорта.</p>
                                <p>Номер попереднього паспорта: [[previous_passport_number]]</p>
                                <p>Обґрунтування заяви: [[reason_for_new_passport]]</p>
                                <br/>
                                <p>Прошу своєчасно розглянути мою заяву та надати інформацію про отримання паспорта.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o wydanie paszportu (forma ogólna)',
                        'description' => 'Standardowy wniosek o wydanie paszportu w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O WYDANIE PASZPORTU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Data urodzenia: [[applicant_dob]]</p><p>Miejsce urodzenia: [[applicant_pob]]</p><p>Narodowość: [[applicant_nationality]]</p><p>Adres: [[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam wniosek o wydanie paszportu.</p>
                                <p>Numer poprzedniego paszportu: [[previous_passport_number]]</p>
                                <p>Uzasadnienie wniosku: [[reason_for_new_passport]]</p>
                                <br/>
                                <p>Proszę o terminowe rozpatrzenie mojego wniosku i informację o odbiorze paszportu.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление на получение идентификационного кода (ИНН) / Application for Tax Identification Number (Antrag auf Steuer-Identifikationsnummer) ---
            [
                'slug' => 'tax-id-application-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Datum des Antrags"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy","en":"Applicant\'s Date of Birth","uk":"Дата народження заявника","de":"Geburtsdatum des Antragstellers"}},
                    {"name":"applicant_pob","type":"text","required":true,"labels":{"pl":"Miejsce urodzenia wnioskodawcy","en":"Applicant\'s Place of Birth","uk":"Місце народження заявника","de":"Geburtsort des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres zamieszkania wnioskodawcy","en":"Applicant\'s Residential Address","uk":"Адреса проживання заявника","de":"Wohnadresse des Antragstellers"}},
                    {"name":"authority_name","type":"text","required":true,"labels":{"pl":"Nazwa organu (np. Bundeszentralamt für Steuern)","en":"Name of authority (e.g., Federal Central Tax Office)","uk":"Назва органу (напр., Федеральне центральне податкове управління)","de":"Name der Behörde (z.B. Bundeszentralamt für Steuern)"}},
                    {"name":"authority_address","type":"text","required":true,"labels":{"pl":"Adres organu","en":"Authority Address","uk":"Адреса органу","de":"Adresse der Behörde"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Zuteilung einer Steuer-Identifikationsnummer',
                        'description' => 'Antrag auf Zuteilung einer Steuer-Identifikationsnummer (Steuer-ID) in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANTRAG AUF ZUTEILUNG EINER STEUER-IDENTIFIKATIONSNUMMER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Geburtsdatum: [[applicant_dob]]</p><p>Geburtsort: [[applicant_pob]]</p><p>Adresse: [[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich die Zuteilung einer Steuer-Identifikationsnummer.</p>
                                <p>Ich bin in Deutschland gemeldet und benötige die Steuer-ID für steuerliche Zwecke.</p>
                                <br/>
                                <p>Ich bitte um eine zeitnahe Zusendung der Steuer-Identifikationsnummer an meine oben genannte Adresse.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Tax Identification Number',
                        'description' => 'Application for a Tax Identification Number (Steuer-ID) in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR TAX IDENTIFICATION NUMBER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Date of Birth: [[applicant_dob]]</p><p>Place of Birth: [[applicant_pob]]</p><p>Address: [[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby apply for the assignment of a Tax Identification Number.</p>
                                <p>I am registered in Germany and require the Tax ID for tax purposes.</p>
                                <br/>
                                <p>I kindly request a timely dispatch of the Tax Identification Number to my address mentioned above.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на отримання ідентифікаційного коду (ІПН)',
                        'description' => 'Заява на отримання податкового ідентифікаційного номера (Steuer-ID) у Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА НА ОТРИМАННЯ ПОДАТКОВОГО ІДЕНТИФІКАЦІЙНОГО НОМЕРА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Дата народження: [[applicant_dob]]</p><p>Місце народження: [[applicant_pob]]</p><p>Адреса: [[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю заяву на присвоєння податкового ідентифікаційного номера.</p>
                                <p>Я зареєстрований/на в Німеччині і потребую податковий ідентифікатор для податкових цілей.</p>
                                <br/>
                                <p>Прошу своєчасно надіслати податковий ідентифікаційний номер на мою вищезазначену адресу.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o nadanie numeru identyfikacji podatkowej (Steuer-ID)',
                        'description' => 'Wniosek o nadanie numeru identyfikacji podatkowej (Steuer-ID) w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O NADANIE NUMERU IDENTYFIKACJI PODATKOWEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>Data urodzenia: [[applicant_dob]]</p><p>Miejsce urodzenia: [[applicant_pob]]</p><p>Adres: [[applicant_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[authority_name]]</strong><br>[[authority_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam wniosek o nadanie numeru identyfikacji podatkowej.</p>
                                <p>Jestem zameldowany/a w Niemczech i potrzebuję numeru Steuer-ID do celów podatkowych.</p>
                                <br/>
                                <p>Proszę o terminowe przesłanie numeru identyfikacji podatkowej na mój powyżej wskazany adres.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление о приеме ребенка в детский сад / Application for Kindergarten Admission (Anmeldung für einen Kindergartenplatz) ---
            [
                'slug' => 'kindergarten-admission-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Datum des Antrags"}},
                    {"name":"parent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna","en":"Parent\'s/Guardian\'s Full Name","uk":"ПІБ батька/опікуна","de":"Vollständiger Name des Elternteils/Vormunds"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"pl":"Adres rodzica/opiekuna","en":"Parent\'s/Guardian\'s Address","uk":"Адреса батька/опікуна","de":"Adresse des Elternteils/Vormunds"}},
                    {"name":"parent_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail rodzica/opiekuna","en":"Parent\'s/Guardian\'s Phone & Email","uk":"Телефон та e-mail батька/опікуна","de":"Telefon und E-Mail des Elternteils/Vormunds"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"kindergarten_name","type":"text","required":true,"labels":{"pl":"Nazwa przedszkola","en":"Kindergarten Name","uk":"Назва дитячого садка","de":"Name des Kindergartens"}},
                    {"name":"kindergarten_address","type":"text","required":true,"labels":{"pl":"Adres przedszkola","en":"Kindergarten Address","uk":"Адреса дитячого садка","de":"Adresse des Kindergartens"}},
                    {"name":"desired_start_date","type":"date","required":true,"labels":{"pl":"Żądana data rozpoczęcia","en":"Desired Start Date","uk":"Бажана дата початку","de":"Gewünschtes Startdatum"}},
                    {"name":"care_hours","type":"text","required":true,"labels":{"pl":"Wymiar opieki (np. pełny etat, pół etatu)","en":"Care hours (e.g., full-time, part-time)","uk":"Обсяг догляду (напр., повний день, півдня)","de":"Betreuungszeiten (z.B. Vollzeit, Teilzeit)"}},
                    {"name":"reason_for_application","type":"textarea","required":false,"labels":{"pl":"Uzasadnienie wniosku (opcjonalnie)","en":"Reason for application (optional)","uk":"Обґрунтування заяви (необов\'язково)","de":"Begründung des Antrags (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Anmeldung für einen Kindergartenplatz',
                        'description' => 'Ein Standardantrag auf Aufnahme eines Kindes in einen Kindergarten in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANMELDUNG FÜR EINEN KINDERGARTENPLATZ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Elternteil/Vormund: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[kindergarten_name]]</strong><br>[[kindergarten_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit melden wir unser Kind <strong>[[child_full_name]]</strong>, geboren am [[child_dob]], für einen Kindergartenplatz an.</p>
                                <p>Gewünschter Betreuungsbeginn: <strong>[[desired_start_date]]</strong></p>
                                <p>Gewünschte Betreuungszeiten: [[care_hours]]</p>
                                <p>Begründung des Antrags: [[reason_for_application]]</p>
                                <br/>
                                <p>Wir bitten um eine zeitnahe Rückmeldung bezüglich der Verfügbarkeit eines Platzes.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Kindergarten Admission',
                        'description' => 'A standard application for a child\'s admission to a kindergarten in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR KINDERGARTEN ADMISSION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Parent/Guardian: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[kindergarten_name]]</strong><br>[[kindergarten_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>We hereby apply for admission of our child <strong>[[child_full_name]]</strong>, born on [[child_dob]], to your kindergarten.</p>
                                <p>Desired start date: <strong>[[desired_start_date]]</strong></p>
                                <p>Desired care hours: [[care_hours]]</p>
                                <p>Reason for application: [[reason_for_application]]</p>
                                <br/>
                                <p>We kindly request a timely response regarding the availability of a place.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про прийом дитини до дитячого садка',
                        'description' => 'Стандартна заява на прийом дитини до дитячого садка в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА ПРО ПРИЙОМ ДИТИНИ ДО ДИТЯЧОГО САДКА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Батьки/опікун: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[kindergarten_name]]</strong><br>[[kindergarten_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим ми подаємо заяву на прийом нашої дитини <strong>[[child_full_name]]</strong>, народженої [[child_dob]], до Вашого дитячого садка.</p>
                                <p>Бажана дата початку відвідування: <strong>[[desired_start_date]]</strong></p>
                                <p>Бажаний обсяг догляду: [[care_hours]]</p>
                                <p>Обґрунтування заяви: [[reason_for_application]]</p>
                                <br/>
                                <p>Просимо своєчасно повідомити про наявність місця.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o przyjęcie dziecka do przedszkola',
                        'description' => 'Standardowy wniosek o przyjęcie dziecka do przedszkola w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O PRZYJĘCIE DZIECKA DO PRZEDSZKOLA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Rodzic/Opiekun: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[kindergarten_name]]</strong><br>[[kindergarten_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składamy wniosek o przyjęcie naszego dziecka <strong>[[child_full_name]]</strong>, urodzonego dnia [[child_dob]], do Państwa przedszkola.</p>
                                <p>Żądana data rozpoczęcia opieki: <strong>[[desired_start_date]]</strong></p>
                                <p>Żądany wymiar opieki: [[care_hours]]</p>
                                <p>Uzasadnienie wniosku: [[reason_for_application]]</p>
                                <br/>
                                <p>Prosimy o terminową informację zwrotną dotyczącą dostępności miejsca.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление о приеме ребенка в школу / Application for School Admission (Anmeldung für die Schule) ---
            [
                'slug' => 'school-admission-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Datum des Antrags"}},
                    {"name":"parent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna","en":"Parent\'s/Guardian\'s Full Name","uk":"ПІБ батька/опікуна","de":"Vollständiger Name des Elternteils/Vormunds"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"pl":"Adres rodzica/opiekuna","en":"Parent\'s/Guardian\'s Address","uk":"Адреса батька/опікуна","de":"Adresse des Elternteils/Vormunds"}},
                    {"name":"parent_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail rodzica/opiekuna","en":"Parent\'s/Guardian\'s Phone & Email","uk":"Телефон та e-mail батька/опікуна","de":"Telefon und E-Mail des Elternteils/Vormunds"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"school_name","type":"text","required":true,"labels":{"pl":"Nazwa szkoły","en":"School Name","uk":"Назва школи","de":"Name der Schule"}},
                    {"name":"school_address","type":"text","required":true,"labels":{"pl":"Adres szkoły","en":"School Address","uk":"Адреса школи","de":"Adresse der Schule"}},
                    {"name":"desired_start_school_year","type":"text","required":true,"labels":{"pl":"Żądany rok szkolny rozpoczęcia","en":"Desired Start School Year","uk":"Бажаний навчальний рік початку","de":"Gewünschtes Schuljahr des Beginns"}},
                    {"name":"previous_school_name","type":"text","required":false,"labels":{"pl":"Nazwa poprzedniej szkoły (jeśli dotyczy)","en":"Previous School Name (if applicable)","uk":"Назва попередньої школи (якщо застосовно)","de":"Name der vorherigen Schule (falls zutreffend)"}},
                    {"name":"reason_for_application","type":"textarea","required":false,"labels":{"pl":"Uzasadnienie wniosku (opcjonalnie)","en":"Reason for application (optional)","uk":"Обґрунтування заяви (необов\'язково)","de":"Begründung des Antrags (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Anmeldung für die Schule',
                        'description' => 'Ein Standardantrag auf Aufnahme eines Kindes in die Schule in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ANMELDUNG FÜR DIE SCHULE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Elternteil/Vormund: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br>Schulleitung der <strong>[[school_name]]</strong><br>[[school_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit melden wir unser Kind <strong>[[child_full_name]]</strong>, geboren am [[child_dob]], für das Schuljahr <strong>[[desired_start_school_year]]</strong> an Ihrer Schule an.</p>
                                <p>Name der vorherigen Schule: [[previous_school_name]]</p>
                                <p>Begründung des Antrags: [[reason_for_application]]</p>
                                <br/>
                                <p>Wir bitten um eine zeitnahe Rückmeldung bezüglich der Aufnahme unseres Kindes.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for School Admission',
                        'description' => 'A standard application for a child\'s admission to school in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">APPLICATION FOR SCHOOL ADMISSION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Parent/Guardian: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br>School Management of <strong>[[school_name]]</strong><br>[[school_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>We hereby apply for admission of our child <strong>[[child_full_name]]</strong>, born on [[child_dob]], for the school year <strong>[[desired_start_school_year]]</strong> at your school.</p>
                                <p>Previous School Name: [[previous_school_name]]</p>
                                <p>Reason for application: [[reason_for_application]]</p>
                                <br/>
                                <p>We kindly request a timely response regarding the admission of our child.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про прийом дитини до школи',
                        'description' => 'Стандартна заява на прийом дитини до школи в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАЯВА ПРО ПРИЙОМ ДИТИНИ ДО ШКОЛИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Батьки/опікун: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br>Керівництву школи <strong>[[school_name]]</strong><br>[[school_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим ми подаємо заяву на прийом нашої дитини <strong>[[child_full_name]]</strong>, народженої [[child_dob]], до Вашої школи на навчальний рік <strong>[[desired_start_school_year]]</strong>.</p>
                                <p>Назва попередньої школи: [[previous_school_name]]</p>
                                <p>Обґрунтування заяви: [[reason_for_application]]</p>
                                <br/>
                                <p>Просимо своєчасно повідомити про прийом нашої дитини.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o przyjęcie dziecka do szkoły',
                        'description' => 'Standardowy wniosek o przyjęcie dziecka do szkoły w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">WNIOSEK O PRZYJĘCIE DZIECKA DO SZKOŁY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Rodzic/Opiekun: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br>Dyrekcji szkoły <strong>[[school_name]]</strong><br>[[school_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składamy wniosek o przyjęcie naszego dziecka <strong>[[child_full_name]]</strong>, urodzonego dnia [[child_dob]], do Państwa szkoły na rok szkolny <strong>[[desired_start_school_year]]</strong>.</p>
                                <p>Nazwa poprzedniej szkoły: [[previous_school_name]]</p>
                                <p>Uzasadnienie wniosku: [[reason_for_application]]</p>
                                <br/>
                                <p>Prosimy o terminową informację zwrotną dotyczącą przyjęcia naszego dziecka.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Записка в школу об отсутствии ребенка / Note to School about Child Absence (Entschuldigung für die Schule) ---
            [
                'slug' => 'school-absence-note-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"note_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia notatki","en":"Note Date","uk":"Дата складання записки","de":"Datum der Notiz"}},
                    {"name":"parent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna","en":"Parent\'s/Guardian\'s Full Name","uk":"ПІБ батька/опікуна","de":"Vollständiger Name des Elternteils/Vormunds"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_class","type":"text","required":true,"labels":{"pl":"Klasa dziecka","en":"Child\'s Class","uk":"Клас дитини","de":"Klasse des Kindes"}},
                    {"name":"school_name","type":"text","required":true,"labels":{"pl":"Nazwa szkoły","en":"School Name","uk":"Назва школи","de":"Name der Schule"}},
                    {"name":"absence_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia nieobecności","en":"Absence Start Date","uk":"Дата початку відсутності","de":"Beginn der Abwesenheit"}},
                    {"name":"absence_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia nieobecności","en":"Absence End Date","uk":"Дата закінчення відсутності","de":"Ende der Abwesenheit"}},
                    {"name":"reason_for_absence","type":"textarea","required":true,"labels":{"pl":"Przyczyna nieobecności","en":"Reason for Absence","uk":"Причина відсутності","de":"Grund der Abwesenheit"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Entschuldigung für die Schule',
                        'description' => 'Eine formelle Entschuldigung für das Fehlen eines Kindes in der Schule.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ENTSCHULDIGUNG FÜR DIE SCHULE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[parent_full_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An die Klassenleitung der Klasse [[child_class]]<br><strong>[[school_name]]</strong></p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit entschuldige ich das Fehlen meines Kindes <strong>[[child_full_name]]</strong>, aus der Klasse [[child_class]], in der Zeit vom <strong>[[absence_start_date]]</strong> bis einschließlich <strong>[[absence_end_date]]</strong>.</p>
                                <p>Grund der Abwesenheit: [[reason_for_absence]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Note to School about Child Absence',
                        'description' => 'A formal excuse for a child\'s absence from school.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">EXCUSE NOTE FOR SCHOOL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[parent_full_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To the Class Teacher of Class [[child_class]]<br><strong>[[school_name]]</strong></p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby excuse the absence of my child <strong>[[child_full_name]]</strong>, from class [[child_class]], during the period from <strong>[[absence_start_date]]</strong> up to and including <strong>[[absence_end_date]]</strong>.</p>
                                <p>Reason for absence: [[reason_for_absence]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Записка в школу про відсутність дитини',
                        'description' => 'Формальна записка про відсутність дитини в школі.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗАПИСКА ПРО ВІДСУТНІСТЬ ДИТИНИ В ШКОЛІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[parent_full_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Класній керівниці класу [[child_class]]<br><strong>[[school_name]]</strong></p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я виправдовую відсутність моєї дитини <strong>[[child_full_name]]</strong>, з класу [[child_class]], у період з <strong>[[absence_start_date]]</strong> по <strong>[[absence_end_date]]</strong> включно.</p>
                                <p>Причина відсутності: [[reason_for_absence]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zwolnienie z zajęć szkolnych',
                        'description' => 'Formalne zwolnienie z zajęć szkolnych dla dziecka.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ZWOLNIENIE Z ZAJĘĆ SZKOLNYCH</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[parent_full_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do wychowawcy klasy [[child_class]]<br><strong>[[school_name]]</strong></p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym usprawiedliwiam nieobecność mojego dziecka <strong>[[child_full_name]]</strong>, z klasy [[child_class]], w okresie od <strong>[[absence_start_date]]</strong> do <strong>[[absence_end_date]]</strong> włącznie.</p>
                                <p>Powód nieobecności: [[reason_for_absence]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Согласие родителей на выезд ребенка за границу / Parental Consent for Child Travel Abroad (Reisevollmacht für Minderjährige) ---
            [
                'slug' => 'child-travel-consent-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"consent_date","type":"date","required":true,"labels":{"pl":"Data wyrażenia zgody","en":"Consent Date","uk":"Дата надання згоди","de":"Datum der Zustimmung"}},
                    {"name":"parent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna","en":"Parent\'s/Guardian\'s Full Name","uk":"ПІБ батька/опікуна","de":"Vollständiger Name des Elternteils/Vormunds"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"pl":"Adres rodzica/opiekuna","en":"Parent\'s/Guardian\'s Address","uk":"Адреса батька/опікуна","de":"Adresse des Elternteils/Vormunds"}},
                    {"name":"parent_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości rodzica/opiekuna (np. Reisepass/Personalausweis)","en":"Parent\'s/Guardian\'s ID Number (e.g., Passport/ID Card)","uk":"Номер посвідчення батька/опікуна (напр., паспорт/посвідчення особи)","de":"Ausweisnummer des Elternteils/Vormunds (z.B. Reisepass/Personalausweis)"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"child_passport_number","type":"text","required":true,"labels":{"pl":"Numer paszportu dziecka","en":"Child\'s Passport Number","uk":"Номер паспорта дитини","de":"Reisepassnummer des Kindes"}},
                    {"name":"travel_destination","type":"text","required":true,"labels":{"pl":"Kraj/kraje docelowe podróży","en":"Destination Country/Countries","uk":"Країна/країни призначення подорожі","de":"Zielland/-länder der Reise"}},
                    {"name":"travel_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia podróży","en":"Travel Start Date","uk":"Дата початку подорожі","de":"Reisebeginn"}},
                    {"name":"travel_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia podróży","en":"Travel End Date","uk":"Дата закінчення подорожі","de":"Reiseende"}},
                    {"name":"accompanying_person_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko osoby towarzyszącej (jeśli inna niż rodzic)","en":"Accompanying Person\'s Full Name (if other than parent)","uk":"ПІБ супроводжуючої особи (якщо інша, ніж батько)","de":"Vollständiger Name der Begleitperson (falls nicht Elternteil)"}},
                    {"name":"accompanying_person_id_number","type":"text","required":false,"labels":{"pl":"Numer dowodu tożsamości osoby towarzyszącej (opcjonalnie)","en":"Accompanying Person\'s ID Number (optional)","uk":"Номер посвідчення супроводжуючої особи (необов\'язково)","de":"Ausweisnummer der Begleitperson (optional)"}},
                    {"name":"reason_for_travel","type":"textarea","required":false,"labels":{"pl":"Cel podróży (opcjonalnie)","en":"Purpose of travel (optional)","uk":"Мета подорожі (необов\'язково)","de":"Zweck der Reise (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Reisevollmacht für Minderjährige',
                        'description' => 'Eine offizielle Zustimmung eines Elternteils/Vormunds für die Auslandsreise eines minderjährigen Kindes, ggf. mit Begleitperson.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">REISEVOLLMACHT FÜR MINDERJÄHRIGE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ich, der/die Unterzeichnete:<br><strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>Ausweis-Nr.: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>erteile hiermit meine Zustimmung zur Ausreise meines minderjährigen Kindes:</p>
                                <p><strong>[[child_full_name]]</strong>, geboren am [[child_dob]], Reisepass-Nr.: [[child_passport_number]],</p>
                                <p>in das/die Land/Länder: <strong>[[travel_destination]]</strong></p>
                                <p>im Zeitraum vom <strong>[[travel_start_date]]</strong> bis zum <strong>[[travel_end_date]]</strong>.</p>
                                <p>Das Kind reist: [[accompanying_person_full_name]] (Ausweis-Nr.: [[accompanying_person_id_number]])</p>
                                <p>Zweck der Reise: [[reason_for_travel]]</p>
                                <p>Ich erkläre, dass ich mir der rechtlichen Folgen dieser Zustimmung bewusst bin.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Parental Consent for Child Travel Abroad',
                        'description' => 'Official consent of a parent/guardian for a minor child to travel abroad, possibly with an accompanying person.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">PARENTAL CONSENT FOR CHILD TRAVEL ABROAD</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>I, the undersigned:<br><strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>ID No: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>hereby give my consent for my minor child to travel abroad:</p>
                                <p><strong>[[child_full_name]]</strong>, born on [[child_dob]], Passport No: [[child_passport_number]],</p>
                                <p>to the country/countries: <strong>[[travel_destination]]</strong></p>
                                <p>for the period from <strong>[[travel_start_date]]</strong> to <strong>[[travel_end_date]]</strong>.</p>
                                <p>The child will be traveling: [[accompanying_person_full_name]] (ID No: [[accompanying_person_id_number]])</p>
                                <p>Purpose of travel: [[reason_for_travel]]</p>
                                <p>I declare that I am aware of the legal consequences of giving this consent.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Згода батьків на виїзд дитини за кордон',
                        'description' => 'Офіційна згода батьків/опікуна на виїзд неповнолітньої дитини за кордон, можливо, у супроводі іншої особи.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗГОДА БАТЬКІВ НА ВИЇЗД ДИТИНИ ЗА КОРДОН</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Я, нижчепідписаний/а:<br><strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>Паспорт №: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>цим надаю згоду на виїзд моєї неповнолітньої дитини:</p>
                                <p><strong>[[child_full_name]]</strong>, народженої [[child_dob]], Паспорт №: [[child_passport_number]],</p>
                                <p>до країни/країн: <strong>[[travel_destination]]</strong></p>
                                <p>у період з <strong>[[travel_start_date]]</strong> по <strong>[[travel_end_date]]</strong>.</p>
                                <p>Дитина подорожує: [[accompanying_person_full_name]] (Паспорт №: [[accompanying_person_id_number]])</p>
                                <p>Мета подорожі: [[reason_for_travel]]</p>
                                <p>Заявляю, що я усвідомлюю правові наслідки надання цієї згоди.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zgoda rodzica na podróż dziecka za granicę',
                        'description' => 'Oficjalna zgoda rodzica/opiekuna na wyjazd małoletniego dziecka za granicę, ewentualnie z osobą towarzyszącą.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ZGODA RODZICA NA PODRÓŻ DZIECKA ZA GRANICĘ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ja, niżej podpisany/a:<br><strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>Dowód osobisty nr: [[parent_id_number]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>niniejszym wyrażam zgodę na wyjazd mojego małoletniego dziecka:</p>
                                <p><strong>[[child_full_name]]</strong>, urodzonego/ej dnia [[child_dob]], numer paszportu: [[child_passport_number]],</p>
                                <p>do kraju/krajów: <strong>[[travel_destination]]</strong></p>
                                <p>w okresie od dnia <strong>[[travel_start_date]]</strong> do dnia <strong>[[travel_end_date]]</strong>.</p>
                                <p>Dziecko podróżuje: [[accompanying_person_full_name]] (dowód osobisty nr: [[accompanying_person_id_number]])</p>
                                <p>Cel podróży: [[reason_for_travel]]</p>
                                <p>Oświadczam, że jestem świadomy/a skutków prawnych wyrażenia niniejszej zgody.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 50px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Согласие на медицинское вмешательство для ребенка / Consent to Medical Intervention for Child (Einwilligungserklärung für medizinische Maßnahmen bei Minderjährigen) ---
            [
                'slug' => 'consent-medical-intervention-child-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"consent_date","type":"date","required":true,"labels":{"pl":"Data wyrażenia zgody","en":"Consent Date","uk":"Дата надання згоди","de":"Datum der Zustimmung"}},
                    {"name":"parent_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko rodzica/opiekuna","en":"Parent\'s/Guardian\'s Full Name","uk":"ПІБ батька/опікуна","de":"Vollständiger Name des Elternteils/Vormunds"}},
                    {"name":"parent_address","type":"text","required":true,"labels":{"pl":"Adres rodzica/opiekuna","en":"Parent\'s/Guardian\'s Address","uk":"Адреса батька/опікуна","de":"Adresse des Elternteils/Vormunds"}},
                    {"name":"parent_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail rodzica/opiekuna","en":"Parent\'s/Guardian\'s Phone & Email","uk":"Телефон та e-mail батька/опікуна","de":"Telefon und E-Mail des Elternteils/Vormunds"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"ПІБ дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"medical_facility_name","type":"text","required":true,"labels":{"pl":"Nazwa placówki medycznej","en":"Medical Facility Name","uk":"Назва медичного закладу","de":"Name der medizinischen Einrichtung"}},
                    {"name":"medical_facility_address","type":"text","required":true,"labels":{"pl":"Adres placówki medycznej","en":"Medical Facility Address","uk":"Адреса медичного закладу","de":"Adresse der medizinischen Einrichtung"}},
                    {"name":"medical_intervention_description","type":"textarea","required":true,"labels":{"pl":"Opis proponowanego zabiegu/interwencji medycznej","en":"Description of proposed procedure/medical intervention","uk":"Опис запропонованої процедури/медичного втручання","de":"Beschreibung des vorgeschlagenen Eingriffs/der medizinischen Intervention"}},
                    {"name":"doctor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko lekarza prowadzącego","en":"Attending Doctor\'s Full Name","uk":"ПІБ лікуючого лікаря","de":"Vollständiger Name des behandelnden Arztes"}},
                    {"name":"risks_explained","type":"textarea","required":true,"labels":{"pl":"Potwierdzenie zrozumienia ryzyka i alternatyw","en":"Confirmation of understanding risks and alternatives","uk":"Підтвердження розуміння ризиків та альтернатив","de":"Bestätigung des Verständnisses von Risiken und Alternativen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Einwilligungserklärung für medizinische Maßnahmen bei Minderjährigen',
                        'description' => 'Eine offizielle Erklärung der Eltern/Vormunds zur Zustimmung zu medizinischen Maßnahmen bei einem minderjährigen Kind, gemäß deutschem Recht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">EINWILLIGUNGSERKLÄRUNG FÜR MEDIZINISCHE MASSNAHMEN BEI MINDERJÄHRIGEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Elternteil/Vormund: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p><strong>Betreff: Einwilligung in medizinische Maßnahme für [[child_full_name]], geboren am [[child_dob]]</strong></p>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit erkläre ich meine Einwilligung zur Durchführung der folgenden medizinischen Maßnahme an meinem Kind <strong>[[child_full_name]]</strong>:</p>
                                <p>[[medical_intervention_description]]</p>
                                <p>Ich wurde von Herrn/Frau Dr. [[doctor_full_name]] umfassend über Art, Umfang, Notwendigkeit, mögliche Risiken und Nebenwirkungen sowie über Behandlungsalternativen aufgeklärt. Ich habe dies verstanden: [[risks_explained]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Consent to Medical Intervention for Child',
                        'description' => 'An official declaration from a parent/guardian consenting to medical measures for a minor child, according to German law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">CONSENT TO MEDICAL INTERVENTION FOR MINORS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Parent/Guardian: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p><strong>Subject: Consent to medical measure for [[child_full_name]], born on [[child_dob]]</strong></p>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby declare my consent to the performance of the following medical measure on my child <strong>[[child_full_name]]</strong>:</p>
                                <p>[[medical_intervention_description]]</p>
                                <p>I have been fully informed by Dr. [[doctor_full_name]] about the nature, scope, necessity, possible risks and side effects, and alternative treatments. I have understood this: [[risks_explained]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Згода на медичне втручання для дитини',
                        'description' => 'Офіційна заява батьків/опікуна про згоду на медичні заходи для неповнолітньої дитини, відповідно до німецького законодавства.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ЗГОДА НА МЕДИЧНЕ ВТРУЧАННЯ ДЛЯ НЕПОВНОЛІТНІХ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Батьки/опікун: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p><strong>Тема: Згода на медичний захід для [[child_full_name]], народженої [[child_dob]]</strong></p>
                                <p>Шановні пані та панове,</p>
                                <p>цим я заявляю про свою згоду на проведення наступного медичного заходу щодо моєї дитини <strong>[[child_full_name]]</strong>:</p>
                                <p>[[medical_intervention_description]]</p>
                                <p>Я був/ла повністю поінформований/на лікарем [[doctor_full_name]] про характер, обсяг, необхідність, можливі ризики та побічні ефекти, а також про альтернативні методи лікування. Я це зрозумів/ла: [[risks_explained]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zgoda na interwencję medyczną dla dziecka',
                        'description' => 'Oficjalna zgoda rodzica/opiekuna na podjęcie działań medycznych wobec małoletniego dziecka, zgodnie z prawem niemieckim.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 18px; font-weight: bold;">ZGODA NA INTERWENCJĘ MEDYCZNĄ DLA MAŁOLETNICH</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Rodzic/Opiekun: <strong>[[parent_full_name]]</strong><br>[[parent_address]]<br>[[parent_phone_email]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[medical_facility_name]]</strong><br>[[medical_facility_address]]</p>
                                <br/>
                                <p><strong>Temat: Zgoda na interwencję medyczną dla [[child_full_name]], urodzonego dnia [[child_dob]]</strong></p>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym wyrażam zgodę na przeprowadzenie następującej interwencji medycznej u mojego dziecka <strong>[[child_full_name]]</strong>:</p>
                                <p>[[medical_intervention_description]]</p>
                                <p>Zostałem/łam kompleksowo poinformowany/a przez lekarza [[doctor_full_name]] o rodzaju, zakresie, konieczności, możliwych ryzykach i skutkach ubocznych, a także o alternatywnych metodach leczenia. Zrozumiałem/łam to: [[risks_explained]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[parent_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Соглашение об уплате алиментов / Alimony Agreement (Unterhaltsvereinbarung) ---
            [
                'slug' => 'alimony-agreement-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"payer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko zobowiązanego do alimentów","en":"Payer\'s Full Name","uk":"ПІБ платника аліментів","de":"Vollständiger Name des Unterhaltspflichtigen"}},
                    {"name":"payer_address","type":"text","required":true,"labels":{"pl":"Adres zobowiązanego","en":"Payer\'s Address","uk":"Адреса платника","de":"Adresse des Unterhaltspflichtigen"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko uprawnionego do alimentów","en":"Recipient\'s Full Name","uk":"ПІБ одержувача аліментів","de":"Vollständiger Name des Unterhaltsberechtigten"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres uprawnionego","en":"Recipient\'s Address","uk":"Адреса одержувача","de":"Adresse des Unterhaltsberechtigten"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka (jeśli dotyczy)","en":"Child\'s Full Name (if applicable)","uk":"ПІБ дитини (якщо застосовно)","de":"Vollständiger Name des Kindes (falls zutreffend)"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka (jeśli dotyczy)","en":"Child\'s Date of Birth (if applicable)","uk":"Дата народження дитини (якщо застосовно)","de":"Geburtsdatum des Kindes (falls zutreffend)"}},
                    {"name":"alimony_amount","type":"number","required":true,"labels":{"pl":"Kwota alimentów (EUR)","en":"Alimony Amount (EUR)","uk":"Сума аліментів (EUR)","de":"Unterhaltsbetrag (EUR)"}},
                    {"name":"payment_frequency","type":"text","required":true,"labels":{"pl":"Częstotliwość płatności (np. miesięcznie)","en":"Payment Frequency (e.g., monthly)","uk":"Частота платежів (напр., щомісячно)","de":"Zahlungshäufigkeit (z.B. monatlich)"}},
                    {"name":"payment_method","type":"text","required":true,"labels":{"pl":"Sposób płatności (np. przelew na konto)","en":"Payment Method (e.g., bank transfer)","uk":"Спосіб оплати (напр., банківський переказ)","de":"Zahlungsmethode (z.B. Banküberweisung)"}},
                    {"name":"duration_of_obligation","type":"textarea","required":false,"labels":{"pl":"Czas trwania obowiązku alimentacyjnego (opcjonalnie)","en":"Duration of alimony obligation (optional)","uk":"Термін дії аліментного зобов\'язання (необов\'язково)","de":"Dauer der Unterhaltspflicht (optional)"}},
                    {"name":"other_conditions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Unterhaltsvereinbarung',
                        'description' => 'Eine Vereinbarung über die Zahlung von Unterhalt, die zwischen den Parteien privat oder notariell vereinbart werden kann.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UNTERHALTSVEREINBARUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Unterhaltspflichtiger:</strong> [[payer_full_name]], wohnhaft in [[payer_address]],</p>
                                <p>und</p>
                                <p><strong>Unterhaltsberechtigter:</strong> [[recipient_full_name]], wohnhaft in [[recipient_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Gegenstand der Vereinbarung</h2>
                                <p>Der Unterhaltspflichtige verpflichtet sich zur Zahlung von Unterhalt für [[child_full_name]], geboren am [[child_dob]] (falls zutreffend), an den Unterhaltsberechtigten.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Höhe und Zahlungsweise des Unterhalts</h2>
                                <p>Der monatliche Unterhaltsbetrag beläuft sich auf: <strong>[[alimony_amount]] EUR</strong>.</p>
                                <p>Die Zahlung erfolgt [[payment_frequency]] per [[payment_method]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Dauer der Unterhaltspflicht</h2>
                                <p>[[duration_of_obligation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Weitere Bestimmungen</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Schlussbestimmungen</h2>
                                <p>Diese Vereinbarung unterliegt deutschem Recht. Änderungen bedürfen der Schriftform.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Unterhaltspflichtiger</p></td>
                                <td width="50%"><p>___________________<br>Unterhaltsberechtigter</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Alimony Agreement',
                        'description' => 'An agreement on the payment of alimony, which can be agreed privately or notarized between the parties.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ALIMONY AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Payer of Alimony:</strong> [[payer_full_name]], residing in [[payer_address]],</p>
                                <p>and</p>
                                <p><strong>Recipient of Alimony:</strong> [[recipient_full_name]], residing in [[recipient_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The Payer of Alimony undertakes to pay alimony for [[child_full_name]], born on [[child_dob]] (if applicable), to the Recipient of Alimony.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Amount and Method of Alimony Payment</h2>
                                <p>The monthly alimony amount is: <strong>[[alimony_amount]] EUR</strong>.</p>
                                <p>Payment is made [[payment_frequency]] via [[payment_method]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Duration of Alimony Obligation</h2>
                                <p>[[duration_of_obligation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Other Provisions</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Final Provisions</h2>
                                <p>This agreement is governed by German law. Amendments must be made in writing.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Payer of Alimony</p></td>
                                <td width="50%"><p>___________________<br>Recipient of Alimony</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про сплату аліментів',
                        'description' => 'Угода про сплату аліментів, яка може бути укладена між сторонами приватно або нотаріально.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА ПРО СПЛАТУ АЛІМЕНТІВ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Платником аліментів:</strong> [[payer_full_name]], що проживає за адресою [[payer_address]],</p>
                                <p>та</p>
                                <p><strong>Одержувачем аліментів:</strong> [[recipient_full_name]], що проживає за адресою [[recipient_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет угоди</h2>
                                <p>Платник аліментів зобов\'язується сплачувати аліменти на [[child_full_name]], народженої [[child_dob]] (якщо застосовно), Одержувачу аліментів.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Розмір та спосіб сплати аліментів</h2>
                                <p>Щомісячний розмір аліментів становить: <strong>[[alimony_amount]] EUR</strong>.</p>
                                <p>Оплата здійснюється [[payment_frequency]] шляхом [[payment_method]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Термін дії аліментного зобов\'язання</h2>
                                <p>[[duration_of_obligation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Інші положення</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Прикінцеві положення</h2>
                                <p>Ця угода регулюється німецьким законодавством. Зміни повинні бути зроблені в письмовій формі.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Платник аліментів</p></td>
                                <td width="50%"><p>___________________<br>Одержувач аліментів</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa alimentacyjna',
                        'description' => 'Umowa dotycząca płatności alimentów, która może być zawarta między stronami prywatnie lub notarialnie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA ALIMENTACYJNA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Zobowiązanym do alimentów:</strong> [[payer_full_name]], zamieszkałym/ą w [[payer_address]],</p>
                                <p>a</p>
                                <p><strong>Uprawnionym do alimentów:</strong> [[recipient_full_name]], zamieszkałym/ą w [[recipient_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Zobowiązany do alimentów zobowiązuje się do płacenia alimentów na rzecz [[child_full_name]], urodzonego dnia [[child_dob]] (jeśli dotyczy), na rzecz Uprawnionego do alimentów.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Wysokość i sposób płatności alimentów</h2>
                                <p>Miesięczna kwota alimentów wynosi: <strong>[[alimony_amount]] EUR</strong>.</p>
                                <p>Płatność następuje [[payment_frequency]] poprzez [[payment_method]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Czas trwania obowiązku alimentacyjnego</h2>
                                <p>[[duration_of_obligation]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Inne postanowienia</h2>
                                <p>[[other_conditions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Postanowienia końcowe</h2>
                                <p>Niniejsza umowa podlega prawu niemieckiemu. Zmiany wymagają formy pisemnej.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Zobowiązany do alimentów</p></td>
                                <td width="50%"><p>___________________<br>Uprawniony do alimentów</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Брачный договор (общая структура) / Marriage Contract (General Structure) (Ehevertrag) ---
            [
                'slug' => 'marriage-contract-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"spouse_one_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka 1","en":"Spouse 1 Full Name","uk":"ПІБ чоловіка/дружини 1","de":"Vollständiger Name Ehepartner 1"}},
                    {"name":"spouse_one_address","type":"text","required":true,"labels":{"pl":"Adres małżonka 1","en":"Spouse 1 Address","uk":"Адреса чоловіка/дружини 1","de":"Adresse Ehepartner 1"}},
                    {"name":"spouse_one_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia małżonka 1","en":"Spouse 1 Date of Birth","uk":"Дата народження чоловіка/дружини 1","de":"Geburtsdatum Ehepartner 1"}},
                    {"name":"spouse_two_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka 2","en":"Spouse 2 Full Name","uk":"ПІБ чоловіка/дружини 2","de":"Vollständiger Name Ehepartner 2"}},
                    {"name":"spouse_two_address","type":"text","required":true,"labels":{"pl":"Adres małżonka 2","en":"Spouse 2 Address","uk":"Адреса чоловіка/дружини 2","de":"Adresse Ehepartner 2"}},
                    {"name":"spouse_two_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia małżonka 2","en":"Spouse 2 Date of Birth","uk":"Дата народження чоловіка/дружини 2","de":"Geburtsdatum Ehepartner 2"}},
                    {"name":"marriage_date","type":"date","required":false,"labels":{"pl":"Planowana data ślubu (jeśli przed ślubem) / Data ślubu (jeśli po ślubie)","en":"Planned Marriage Date (if pre-marriage) / Marriage Date (if post-marriage)","uk":"Планована дата весілля (якщо до шлюбу) / Дата весілля (якщо після шлюбу)","de":"Geplantes Hochzeitsdatum (falls vor der Hochzeit) / Hochzeitsdatum (falls nach der Hochzeit)"}},
                    {"name":"property_regime","type":"textarea","required":true,"labels":{"pl":"Ustrój majątkowy (np. rozdzielność majątkowa, wspólność majątkowa)","en":"Matrimonial Property Regime (e.g., separation of property, community of property)","uk":"Майновий режим (напр., роздільна власність, спільна власність)","de":"Güterstand (z.B. Gütertrennung, Zugewinngemeinschaft)"}},
                    {"name":"alimony_provisions","type":"textarea","required":false,"labels":{"pl":"Postanowienia dotyczące alimentów (opcjonalnie)","en":"Alimony provisions (optional)","uk":"Положення щодо аліментів (необов\'язково)","de":"Unterhaltsregelungen (optional)"}},
                    {"name":"pension_equalization","type":"textarea","required":false,"labels":{"pl":"Postanowienia dotyczące wyrównania renty (opcjonalnie)","en":"Pension equalization provisions (optional)","uk":"Положення щодо вирівнювання пенсії (необов\'язково)","de":"Versorgungsausgleichsregelungen (optional)"}},
                    {"name":"other_provisions","type":"textarea","required":false,"labels":{"pl":"Inne postanowienia (opcjonalnie)","en":"Other provisions (optional)","uk":"Інші положення (необов\'язково)","de":"Weitere Bestimmungen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Ehevertrag',
                        'description' => 'Ein Ehevertrag zur Regelung der vermögensrechtlichen Verhältnisse der Ehepartner in Deutschland, der notariell beurkundet werden muss.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EHEVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p>Herrn/Frau <strong>[[spouse_one_full_name]]</strong>, geboren am [[spouse_one_dob]], wohnhaft in [[spouse_one_address]],</p>
                                <p>und</p>
                                <p>Herrn/Frau <strong>[[spouse_two_full_name]]</strong>, geboren am [[spouse_two_dob]], wohnhaft in [[spouse_two_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Güterstand</h2>
                                <p>Die Ehepartner vereinbaren folgenden Güterstand: <strong>[[property_regime]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Unterhaltsregelungen</h2>
                                <p>[[alimony_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Versorgungsausgleich</h2>
                                <p>[[pension_equalization]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Sonstige Bestimmungen</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Schlussbestimmungen</h2>
                                <p>Dieser Ehevertrag bedarf zu seiner Wirksamkeit der notariellen Beurkundung. Er unterliegt deutschem Recht.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Ehepartner 1</p></td>
                                <td width="50%"><p>___________________<br>Ehepartner 2</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Marriage Contract (General Structure)',
                        'description' => 'A marriage contract regulating the matrimonial property regime of the spouses in Germany, which must be notarized.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MARRIAGE CONTRACT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p>Mr./Ms. <strong>[[spouse_one_full_name]]</strong>, born on [[spouse_one_dob]], residing in [[spouse_one_address]],</p>
                                <p>and</p>
                                <p>Mr./Ms. <strong>[[spouse_two_full_name]]</strong>, born on [[spouse_two_dob]], residing in [[spouse_two_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Matrimonial Property Regime</h2>
                                <p>The spouses agree on the following matrimonial property regime: <strong>[[property_regime]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Alimony Provisions</h2>
                                <p>[[alimony_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Pension Equalization</h2>
                                <p>[[pension_equalization]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Other Provisions</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Final Provisions</h2>
                                <p>This marriage contract requires notarization to be valid. It is governed by German law.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Spouse 1</p></td>
                                <td width="50%"><p>___________________<br>Spouse 2</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Шлюбний договір (загальна структура)',
                        'description' => 'Шлюбний договір, що регулює майнові відносини подружжя в Німеччині, який має бути нотаріально посвідчений.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ШЛЮБНИЙ ДОГОВІР</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p>Паном/Пані <strong>[[spouse_one_full_name]]</strong>, народженої [[spouse_one_dob]], що проживає за адресою [[spouse_one_address]],</p>
                                <p>та</p>
                                <p>Паном/Пані <strong>[[spouse_two_full_name]]</strong>, народженої [[spouse_two_dob]], що проживає за адресою [[spouse_two_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Майновий режим</h2>
                                <p>Подружжя погоджується на наступний майновий режим: <strong>[[property_regime]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Положення щодо аліментів</h2>
                                <p>[[alimony_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Вирівнювання пенсійних прав</h2>
                                <p>[[pension_equalization]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Інші положення</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Прикінцеві положення</h2>
                                <p>Цей шлюбний договір для своєї дійсності потребує нотаріального посвідчення. Він регулюється німецьким законодавством.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Чоловік/Дружина 1</p></td>
                                <td width="50%"><p>___________________<br>Чоловік/Дружина 2</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa małżeńska (intercyza)',
                        'description' => 'Umowa małżeńska regulująca ustrój majątkowy małżonków w Niemczech, wymagająca notarialnego poświadczenia.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA MAŁŻEŃSKA (INTERCYZA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p>Panem/Panią <strong>[[spouse_one_full_name]]</strong>, urodzonym/ą dnia [[spouse_one_dob]], zamieszkałym/ą w [[spouse_one_address]],</p>
                                <p>a</p>
                                <p>Panem/Panią <strong>[[spouse_two_full_name]]</strong>, urodzonym/ą dnia [[spouse_two_dob]], zamieszkałym/ą w [[spouse_two_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Ustrój majątkowy</h2>
                                <p>Małżonkowie uzgadniają następujący ustrój majątkowy: <strong>[[property_regime]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Postanowienia dotyczące alimentów</h2>
                                <p>[[alimony_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Wyrównanie renty (Versorgungsausgleich)</h2>
                                <p>[[pension_equalization]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 4. Inne postanowienia</h2>
                                <p>[[other_provisions]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 5. Postanowienia końcowe</h2>
                                <p>Niniejsza umowa małżeńska wymaga dla swojej ważności notarialnego poświadczenia. Podlega prawu niemieckiemu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Małżonek 1</p></td>
                                <td width="50%"><p>___________________<br>Małżonek 2</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],
            // --- Заявление о регистрации брака / Application for Marriage Registration ---
            [
                'slug' => 'marriage-registration-application-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"applicant1_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy 1","en":"Applicant 1 Full Name","uk":"ПІБ заявника 1","de":"Vollständiger Name Antragsteller 1"}},
                    {"name":"applicant1_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy 1","en":"Applicant 1 Date of Birth","uk":"Дата народження заявника 1","de":"Geburtsdatum Antragsteller 1"}},
                    {"name":"applicant1_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy 1","en":"Applicant 1 Address","uk":"Адреса заявника 1","de":"Adresse Antragsteller 1"}},
                    {"name":"applicant1_nationality","type":"text","required":true,"labels":{"pl":"Narodowość wnioskodawcy 1","en":"Applicant 1 Nationality","uk":"Громадянство заявника 1","de":"Staatsangehörigkeit Antragsteller 1"}},
                    {"name":"applicant2_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy 2","en":"Applicant 2 Full Name","uk":"ПІБ заявника 2","de":"Vollständiger Name Antragsteller 2"}},
                    {"name":"applicant2_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy 2","en":"Applicant 2 Date of Birth","uk":"Дата народження заявника 2","de":"Geburtsdatum Antragsteller 2"}},
                    {"name":"applicant2_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy 2","en":"Applicant 2 Address","uk":"Адреса заявника 2","de":"Adresse Antragsteller 2"}},
                    {"name":"applicant2_nationality","type":"text","required":true,"labels":{"pl":"Narodowość wnioskodawcy 2","en":"Applicant 2 Nationality","uk":"Громадянство заявника 2","de":"Staatsangehörigkeit Antragsteller 2"}},
                    {"name":"registry_office_name","type":"text","required":true,"labels":{"pl":"Nazwa Urzędu Stanu Cywilnego","en":"Registry Office Name","uk":"Назва РАЦСу","de":"Name des Standesamtes"}},
                    {"name":"registry_office_address","type":"text","required":true,"labels":{"pl":"Adres Urzędu Stanu Cywilnego","en":"Registry Office Address","uk":"Адреса РАЦСу","de":"Adresse des Standesamtes"}},
                    {"name":"desired_marriage_date","type":"date","required":false,"labels":{"pl":"Preferowana data ślubu (opcjonalnie)","en":"Preferred Marriage Date (optional)","uk":"Бажана дата весілля (необов\'язково)","de":"Bevorzugtes Hochzeitsdatum (optional)"}},
                    {"name":"children_details","type":"textarea","required":false,"labels":{"pl":"Dane dzieci z poprzednich związków (jeśli dotyczy)","en":"Children details from previous relationships (if applicable)","uk":"Дані дітей від попередніх шлюбів (якщо застосовно)","de":"Details zu Kindern aus früheren Beziehungen (falls zutreffend)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Anmeldung zur Eheschließung',
                        'description' => 'Offizieller Antrag zur Anmeldung der Eheschließung beim Standesamt in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANMELDUNG ZUR EHESCHLIESSUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller 1: <strong>[[applicant1_full_name]]</strong><br>Geb. am: [[applicant1_dob]]<br>Adresse: [[applicant1_address]]<br>Staatsangehörigkeit: [[applicant1_nationality]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Antragsteller 2: <strong>[[applicant2_full_name]]</strong><br>Geb. am: [[applicant2_dob]]<br>Adresse: [[applicant2_address]]<br>Staatsangehörigkeit: [[applicant2_nationality]]</p>
                                <br/>
                                <p>An:<br><strong>[[registry_office_name]]</strong><br>[[registry_office_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit melden wir, [[applicant1_full_name]] und [[applicant2_full_name]], unsere Absicht zur Eheschließung an.</p>
                                <p>Wir bitten um Prüfung der Voraussetzungen für die Eheschließung und um Terminvereinbarung.</p>
                                <p>Unser bevorzugtes Datum für die Eheschließung ist: [[desired_marriage_date]] (optional).</p>
                                <p>Details zu Kindern aus früheren Beziehungen (falls zutreffend): [[children_details]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Antragsteller 1</p></td>
                                <td width="50%"><p>___________________<br>Antragsteller 2</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Application for Marriage Registration',
                        'description' => 'Official application for marriage registration at the Registry Office in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APPLICATION FOR MARRIAGE REGISTRATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Applicant 1: <strong>[[applicant1_full_name]]</strong><br>DOB: [[applicant1_dob]]<br>Address: [[applicant1_address]]<br>Nationality: [[applicant1_nationality]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Applicant 2: <strong>[[applicant2_full_name]]</strong><br>DOB: [[applicant2_dob]]<br>Address: [[applicant2_address]]<br>Nationality: [[applicant2_nationality]]</p>
                                <br/>
                                <p>To:<br><strong>[[registry_office_name]]</strong><br>[[registry_office_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>We, [[applicant1_full_name]] and [[applicant2_full_name]], hereby apply for the registration of our marriage.</p>
                                <p>We kindly request you to check the prerequisites for marriage and arrange an appointment.</p>
                                <p>Our preferred date for the marriage is: [[desired_marriage_date]] (optional).</p>
                                <p>Details of children from previous relationships (if applicable): [[children_details]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Applicant 1</p></td>
                                <td width="50%"><p>___________________<br>Applicant 2</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про реєстрацію шлюбу',
                        'description' => 'Офіційна заява про реєстрацію шлюбу до РАЦСу в Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА ПРО РЕЄСТРАЦІЮ ШЛЮБУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Заявник 1: <strong>[[applicant1_full_name]]</strong><br>Дата народження: [[applicant1_dob]]<br>Адреса: [[applicant1_address]]<br>Громадянство: [[applicant1_nationality]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Заявник 2: <strong>[[applicant2_full_name]]</strong><br>Дата народження: [[applicant2_dob]]<br>Адреса: [[applicant2_address]]<br>Громадянство: [[applicant2_nationality]]</p>
                                <br/>
                                <p>До:<br><strong>[[registry_office_name]]</strong><br>[[registry_office_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим ми, [[applicant1_full_name]] та [[applicant2_full_name]], заявляємо про наш намір укласти шлюб.</p>
                                <p>Просимо перевірити умови для укладення шлюбу та призначити дату.</p>
                                <p>Наша бажана дата укладення шлюбу: [[desired_marriage_date]] (необов\'язково).</p>
                                <p>Деталі дітей від попередніх шлюбів (якщо застосовно): [[children_details]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник 1</p></td>
                                <td width="50%"><p>___________________<br>Заявник 2</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Zgłoszenie zamiaru zawarcia małżeństwa',
                        'description' => 'Oficjalny wniosek o zgłoszenie zamiaru zawarcia małżeństwa w Urzędzie Stanu Cywilnego w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZGŁOSZENIE ZAMIARU ZAWARCIA MAŁŻEŃSTWA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wnioskodawca 1: <strong>[[applicant1_full_name]]</strong><br>Data ur.: [[applicant1_dob]]<br>Adres: [[applicant1_address]]<br>Narodowość: [[applicant1_nationality]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Wnioskodawca 2: <strong>[[applicant2_full_name]]</strong><br>Data ur.: [[applicant2_dob]]<br>Adres: [[applicant2_address]]<br>Narodowość: [[applicant2_nationality]]</p>
                                <br/>
                                <p>Do:<br><strong>[[registry_office_name]]</strong><br>[[registry_office_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym zgłaszamy, [[applicant1_full_name]] i [[applicant2_full_name]], nasz zamiar zawarcia małżeństwa.</p>
                                <p>Prosimy o sprawdzenie warunków do zawarcia małżeństwa i umówienie terminu.</p>
                                <p>Nasza preferowana data ślubu to: [[desired_marriage_date]] (opcjonalnie).</p>
                                <p>Dane dzieci z poprzednich związków (jeśli dotyczy): [[children_details]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wnioskodawca 1</p></td>
                                <td width="50%"><p>___________________<br>Wnioskodawca 2</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Заявление о расторжении брака (в ЗАГС) / Application for Divorce (to Registry Office) ---
            [
                'slug' => 'divorce-application-registry-office-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant Full Name","uk":"ПІБ заявника","de":"Vollständiger Name Antragsteller"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant Address","uk":"Адреса заявника","de":"Adresse Antragsteller"}},
                    {"name":"applicant_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia wnioskodawcy","en":"Applicant Date of Birth","uk":"Дата народження заявника","de":"Geburtsdatum Antragsteller"}},
                    {"name":"spouse_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko małżonka","en":"Spouse Full Name","uk":"ПІБ чоловіка/дружини","de":"Vollständiger Name Ehepartner"}},
                    {"name":"spouse_address","type":"text","required":true,"labels":{"pl":"Adres małżonka","en":"Spouse Address","uk":"Адреса чоловіка/дружини","de":"Adresse Ehepartner"}},
                    {"name":"marriage_date","type":"date","required":true,"labels":{"pl":"Data zawarcia małżeństwa","en":"Marriage Date","uk":"Дата укладення шлюбу","de":"Datum der Eheschließung"}},
                    {"name":"marriage_place","type":"text","required":true,"labels":{"pl":"Miejsce zawarcia małżeństwa","en":"Marriage Place","uk":"Місце укладення шлюбу","de":"Ort der Eheschließung"}},
                    {"name":"court_decision_date","type":"date","required":true,"labels":{"pl":"Data uprawomocnienia wyroku rozwodowego (jeśli dotyczy)","en":"Date of divorce decree becoming final (if applicable)","uk":"Дата набрання законної сили рішенням суду про розлучення (якщо застосовно)","de":"Datum der Rechtskraft des Scheidungsurteils (falls zutreffend)"}},
                    {"name":"children_details","type":"textarea","required":false,"labels":{"pl":"Dane dzieci (imię, nazwisko, data urodzenia)","en":"Children details (name, DOB)","uk":"Дані дітей (ім\'я, прізвище, дата народження)","de":"Details zu Kindern (Name, Geburtsdatum)"}},
                    {"name":"registry_office_name","type":"text","required":true,"labels":{"pl":"Nazwa Urzędu Stanu Cywilnego","en":"Registry Office Name","uk":"Назва РАЦСу","de":"Name des Standesamtes"}},
                    {"name":"registry_office_address","type":"text","required":true,"labels":{"pl":"Adres Urzędu Stanu Cywilnego","en":"Registry Office Address","uk":"Адреса РАЦСу","de":"Adresse des Standesamtes"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Eintragung der Scheidung ins Eheregister',
                        'description' => 'Antrag an das Standesamt zur Eintragung einer Scheidung ins Eheregister nach einem rechtskräftigen Scheidungsurteil.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF EINTRAGUNG DER SCHEIDUNG INS EHEREGISTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller: <strong>[[applicant_full_name]]</strong><br>Geb. am: [[applicant_dob]]<br>Adresse: [[applicant_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[registry_office_name]]</strong><br>[[registry_office_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich die Eintragung der Scheidung meiner Ehe mit [[spouse_full_name]], geboren am [[spouse_dob]], wohnhaft in [[spouse_address]], ins Eheregister.</p>
                                <p>Die Ehe wurde am <strong>[[marriage_date]]</strong> in <strong>[[marriage_place]]</strong> geschlossen.</p>
                                <p>Das Scheidungsurteil des Gerichts [[court_name]] vom [[court_decision_date]] ist seit dem [[court_decision_date]] rechtskräftig.</p>
                                <p>Details zu gemeinsamen Kindern (falls zutreffend): [[children_details]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Application for Divorce Registration (to Registry Office)',
                        'description' => 'Application to the Registry Office for the registration of a divorce in the marriage register after a final divorce decree.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APPLICATION FOR DIVORCE REGISTRATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Applicant: <strong>[[applicant_full_name]]</strong><br>DOB: [[applicant_dob]]<br>Address: [[applicant_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[registry_office_name]]</strong><br>[[registry_office_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby apply for the registration of the divorce of my marriage with [[spouse_full_name]], born on [[spouse_dob]], residing at [[spouse_address]], in the marriage register.</p>
                                <p>The marriage was concluded on <strong>[[marriage_date]]</strong> in <strong>[[marriage_place]]</strong>.</p>
                                <p>The divorce decree of the court [[court_name]] dated [[court_decision_date]] became final on [[court_decision_date]].</p>
                                <p>Details of common children (if applicable): [[children_details]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Applicant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про розірвання шлюбу (до РАЦСу)',
                        'description' => 'Заява до РАЦСу про реєстрацію розлучення в реєстрі шлюбів після набрання рішенням суду законної сили.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА ПРО РОЗІРВАННЯ ШЛЮБУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Заявник: <strong>[[applicant_full_name]]</strong><br>Дата народження: [[applicant_dob]]<br>Адреса: [[applicant_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[registry_office_name]]</strong><br>[[registry_office_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю заяву про реєстрацію розірвання мого шлюбу з [[spouse_full_name]], народженим/ою [[spouse_dob]], що проживає за адресою [[spouse_address]], у реєстрі шлюбів.</p>
                                <p>Шлюб був укладений <strong>[[marriage_date]]</strong> у <strong>[[marriage_place]]</strong>.</p>
                                <p>Рішення суду [[court_name]] від [[court_decision_date]] про розлучення набрало законної сили [[court_decision_date]].</p>
                                <p>Деталі спільних дітей (якщо застосовно): [[children_details]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o wpis rozwodu do księgi małżeństw',
                        'description' => 'Wniosek do Urzędu Stanu Cywilnego o wpis rozwodu do księgi małżeństw po uprawomocnieniu się wyroku rozwodowego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WNIOSEK O WPIS ROZWODU DO KSIĘGI MAŁŻEŃSTW</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wnioskodawca: <strong>[[applicant_full_name]]</strong><br>Data ur.: [[applicant_dob]]<br>Adres: [[applicant_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[registry_office_name]]</strong><br>[[registry_office_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym wnoszę o wpisanie rozwodu mojego małżeństwa z [[spouse_full_name]], urodzonym/ą dnia [[spouse_dob]], zamieszkałym/ą w [[spouse_address]], do księgi małżeństw.</p>
                                <p>Małżeństwo zostało zawarte w dniu <strong>[[marriage_date]]</strong> w <strong>[[marriage_place]]</strong>.</p>
                                <p>Wyrok rozwodowy sądu [[court_name]] z dnia [[court_decision_date]] uprawomocnił się w dniu [[court_decision_date]].</p>
                                <p>Dane dotyczące wspólnych dzieci (jeśli dotyczy): [[children_details]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wnioskodawca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Расписка в получении денежных средств в долг / Receipt of Money Debt ---
            [
                'slug' => 'receipt-money-debt-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"receipt_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pokwitowania","en":"Receipt Date","uk":"Дата видачі розписки","de":"Datum der Quittung"}},
                    {"name":"debtor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dłużnika","en":"Debtor\'s Full Name","uk":"ПІБ боржника","de":"Vollständiger Name des Schuldners"}},
                    {"name":"debtor_address","type":"text","required":true,"labels":{"pl":"Adres dłużnika","en":"Debtor\'s Address","uk":"Адреса боржника","de":"Adresse des Schuldners"}},
                    {"name":"debtor_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości dłużnika (np. dowód osobisty, paszport)","en":"Debtor\'s ID Document Type (e.g., ID card, passport)","uk":"Тип документа, що посвідчує особу боржника (напр., паспорт, закордонний паспорт)","de":"Art des Ausweisdokuments des Schuldners (z.B. Personalausweis, Reisepass)"}},
                    {"name":"debtor_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości dłużnika","en":"Debtor\'s ID Document Number","uk":"Номер документа, що посвідчує особу боржника","de":"Nummer des Ausweisdokuments des Schuldners"}},
                    {"name":"creditor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wierzyciela","en":"Creditor\'s Full Name","uk":"ПІБ кредитора","de":"Vollständiger Name des Gläubigers"}},
                    {"name":"creditor_address","type":"text","required":true,"labels":{"pl":"Adres wierzyciela","en":"Creditor\'s Address","uk":"Адреса кредитора","de":"Adresse des Gläubigers"}},
                    {"name":"creditor_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości wierzyciela (np. dowód osobisty, paszport)","en":"Creditor\'s ID Document Type (e.g., ID card, passport)","uk":"Тип документа, що посвідчує особу кредитора (напр., паспорт, закордонний паспорт)","de":"Art des Ausweisdokuments des Gläubigers (z.B. Personalausweis, Reisepass)"}},
                    {"name":"creditor_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości wierzyciela","en":"Creditor\'s ID Document Number","uk":"Номер документа, що посвідчує особу кредитора","de":"Nummer des Ausweisdokuments des Gläubigers"}},
                    {"name":"loan_amount","type":"number","required":true,"labels":{"pl":"Kwota pożyczki","en":"Loan Amount","uk":"Сума позики","de":"Darlehensbetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"purpose_of_loan","type":"textarea","required":false,"labels":{"pl":"Cel pożyczki (opcjonalnie)","en":"Purpose of Loan (optional)","uk":"Мета позики (необов\'язково)","de":"Zweck des Darlehens (optional)"}},
                    {"name":"repayment_date","type":"date","required":true,"labels":{"pl":"Termin spłaty","en":"Repayment Date","uk":"Термін погашення","de":"Rückzahlungsdatum"}},
                    {"name":"interest_rate","type":"text","required":false,"labels":{"pl":"Oprocentowanie (opcjonalnie)","en":"Interest Rate (optional)","uk":"Процентна ставка (необов\'язково)","de":"Zinssatz (optional)"}},
                    {"name":"witness1_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko świadka 1 (opcjonalnie)","en":"Witness 1 Full Name (optional)","uk":"ПІБ свідка 1 (необов\'язково)","de":"Vollständiger Name Zeuge 1 (optional)"}},
                    {"name":"witness1_address","type":"text","required":false,"labels":{"pl":"Adres świadka 1 (opcjonalnie)","en":"Witness 1 Address (optional)","uk":"Адреса свідка 1 (необов\'язково)","de":"Adresse Zeuge 1 (optional)"}},
                    {"name":"witness2_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko świadka 2 (opcjonalnie)","en":"Witness 2 Full Name (optional)","uk":"ПІБ свідка 2 (необов\'язково)","de":"Vollständiger Name Zeuge 2 (optional)"}},
                    {"name":"witness2_address","type":"text","required":false,"labels":{"pl":"Adres świadka 2 (opcjonalnie)","en":"Witness 2 Address (optional)","uk":"Адреса свідка 2 (необов\'язково)","de":"Adresse Zeuge 2 (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Schuldschein (Empfangsbestätigung über Darlehen)',
                        'description' => 'Dokument, das den Erhalt eines Gelddarlehens und die Verpflichtung zur Rückzahlung bestätigt, gemäß deutschem Recht (BGB).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SCHULDSSCHEIN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[receipt_date]]</p></td><td style="text-align: right;"><p>Gläubiger: <strong>[[creditor_full_name]]</strong><br>Adresse: [[creditor_address]]<br>Ausweis: [[creditor_id_type]] [[creditor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Schuldner: <strong>[[debtor_full_name]]</strong><br>Adresse: [[debtor_address]]<br>Ausweis: [[debtor_id_type]] [[debtor_id_number]]</p>
                                <br/>
                                <p>Hiermit bestätigt der Schuldner, [[debtor_full_name]], den Erhalt eines Darlehens in Höhe von <strong>[[loan_amount]] [[currency]]</strong> vom Gläubiger, [[creditor_full_name]].</p>
                                <p>Der Zweck des Darlehens ist: [[purpose_of_loan]]</p>
                                <p>Der Darlehensbetrag ist bis spätestens <strong>[[repayment_date]]</strong> vollständig zurückzuzahlen.</p>
                                <p>Der Zinssatz beträgt: [[interest_rate]] (optional).</p>
                                <br/>
                                <p>Zeugen (optional):</p>
                                <p>1. [[witness1_full_name]], [[witness1_address]]</p>
                                <p>2. [[witness2_full_name]], [[witness2_address]]</p>
                                <br/>
                                <p>Dieser Schuldschein unterliegt deutschem Recht, insbesondere den §§ 488 ff. BGB.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Schuldner</p></td>
                                <td width="50%"><p>___________________<br>Gläubiger</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Promissory Note (Receipt of Loan)',
                        'description' => 'Document confirming the receipt of a monetary loan and the obligation to repay it, according to German law (BGB).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROMISSORY NOTE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[receipt_date]]</p></td><td style="text-align: right;"><p>Creditor: <strong>[[creditor_full_name]]</strong><br>Address: [[creditor_address]]<br>ID: [[creditor_id_type]] [[creditor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Debtor: <strong>[[debtor_full_name]]</strong><br>Address: [[debtor_address]]<br>ID: [[debtor_id_type]] [[debtor_id_number]]</p>
                                <br/>
                                <p>Hereby, the debtor, [[debtor_full_name]], confirms the receipt of a loan in the amount of <strong>[[loan_amount]] [[currency]]</strong> from the creditor, [[creditor_full_name]].</p>
                                <p>The purpose of the loan is: [[purpose_of_loan]]</p>
                                <p>The loan amount is to be fully repaid by <strong>[[repayment_date]]</strong> at the latest.</p>
                                <p>The interest rate is: [[interest_rate]] (optional).</p>
                                <br/>
                                <p>Witnesses (optional):</p>
                                <p>1. [[witness1_full_name]], [[witness1_address]]</p>
                                <p>2. [[witness2_full_name]], [[witness2_address]]</p>
                                <br/>
                                <p>This promissory note is subject to German law, particularly §§ 488 et seq. BGB.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Debtor</p></td>
                                <td width="50%"><p>___________________<br>Creditor</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Розписка про отримання грошових коштів у борг',
                        'description' => 'Документ, що підтверджує отримання грошової позики та зобов\'язання її повернути, згідно з німецьким законодавством (BGB).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РОЗПИСКА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Кредитор: <strong>[[creditor_full_name]]</strong><br>Адреса: [[creditor_address]]<br>Посвідчення: [[creditor_id_type]] [[creditor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Боржник: <strong>[[debtor_full_name]]</strong><br>Адреса: [[debtor_address]]<br>Посвідчення: [[debtor_id_type]] [[debtor_id_number]]</p>
                                <br/>
                                <p>Цим боржник, [[debtor_full_name]], підтверджує отримання позики в сумі <strong>[[loan_amount]] [[currency]]</strong> від кредитора, [[creditor_full_name]].</p>
                                <p>Мета позики: [[purpose_of_loan]]</p>
                                <p>Сума позики має бути повністю повернена не пізніше <strong>[[repayment_date]]</strong>.</p>
                                <p>Процентна ставка становить: [[interest_rate]] (необов\'язково).</p>
                                <br/>
                                <p>Свідки (необов\'язково):</p>
                                <p>1. [[witness1_full_name]], [[witness1_address]]</p>
                                <p>2. [[witness2_full_name]], [[witness2_address]]</p>
                                <br/>
                                <p>Ця розписка регулюється німецьким законодавством, зокрема §§ 488 і наступними Цивільного кодексу Німеччини (BGB).</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Боржник</p></td>
                                <td width="50%"><p>___________________<br>Кредитор</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Pokwitowanie odbioru pieniędzy w ramach pożyczki',
                        'description' => 'Dokument potwierdzający otrzymanie pożyczki pieniężnej i zobowiązanie do jej zwrotu, zgodnie z prawem niemieckim (BGB).',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POKWITOWANIE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Wierzyciel: <strong>[[creditor_full_name]]</strong><br>Adres: [[creditor_address]]<br>Dowód: [[creditor_id_type]] [[creditor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dłużnik: <strong>[[debtor_full_name]]</strong><br>Adres: [[debtor_address]]<br>Dowód: [[debtor_id_type]] [[debtor_id_number]]</p>
                                <br/>
                                <p>Niniejszym dłużnik, [[debtor_full_name]], potwierdza otrzymanie pożyczki w wysokości <strong>[[loan_amount]] [[currency]]</strong> od wierzyciela, [[creditor_full_name]].</p>
                                <p>Cel pożyczki: [[purpose_of_loan]]</p>
                                <p>Kwota pożyczki ma zostać w całości zwrócona najpóźniej do dnia <strong>[[repayment_date]]</strong>.</p>
                                <p>Oprocentowanie wynosi: [[interest_rate]] (opcjonalnie).</p>
                                <br/>
                                <p>Świadkowie (opcjonalnie):</p>
                                <p>1. [[witness1_full_name]], [[witness1_address]]</p>
                                <p>2. [[witness2_full_name]], [[witness2_address]]</p>
                                <br/>
                                <p>Niniejsze pokwitowanie podlega prawu niemieckiemu, w szczególności §§ 488 i nast. BGB.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Dłużnik</p></td>
                                <td width="50%"><p>___________________<br>Wierzyciel</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Расписка о возврате денежного долга / Receipt of Money Debt Repayment ---
            [
                'slug' => 'receipt-debt-repayment-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"receipt_date","type":"date","required":true,"labels":{"pl":"Data wystawienia pokwitowania","en":"Receipt Date","uk":"Дата видачі розписки","de":"Datum der Quittung"}},
                    {"name":"debtor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dłużnika","en":"Debtor\'s Full Name","uk":"ПІБ боржника","de":"Vollständiger Name des Schuldners"}},
                    {"name":"debtor_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości dłużnika (np. dowód osobisty, paszport)","en":"Debtor\'s ID Document Type (e.g., ID card, passport)","uk":"Тип документа, що посвідчує особу боржника (напр., паспорт, закордонний паспорт)","de":"Art des Ausweisdokuments des Schuldners (z.B. Personalausweis, Reisepass)"}},
                    {"name":"debtor_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości dłużnika","en":"Debtor\'s ID Document Number","uk":"Номер документа, що посвідчує особу боржника","de":"Nummer des Ausweisdokuments des Schuldners"}},
                    {"name":"creditor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wierzyciela","en":"Creditor\'s Full Name","uk":"ПІБ кредитора","de":"Vollständiger Name des Gläubigers"}},
                    {"name":"creditor_id_type","type":"text","required":true,"labels":{"pl":"Rodzaj dokumentu tożsamości wierzyciela (np. dowód osobisty, paszport)","en":"Creditor\'s ID Document Type (e.g., ID card, passport)","uk":"Тип документа, що посвідчує особу кредитора (напр., паспорт, закордонний паспорт)","de":"Art des Ausweisdokuments des Gläubigers (z.B. Personalausweis, Reisepass)"}},
                    {"name":"creditor_id_number","type":"text","required":true,"labels":{"pl":"Numer dokumentu tożsamości wierzyciela","en":"Creditor\'s ID Document Number","uk":"Номер документа, що посвідчує особу кредитора","de":"Nummer des Ausweisdokuments des Gläubigers"}},
                    {"name":"repaid_amount","type":"number","required":true,"labels":{"pl":"Kwota zwróconego długu","en":"Amount of Debt Repaid","uk":"Сума поверненого боргу","de":"Betrag der zurückgezahlten Schuld"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"original_loan_date","type":"date","required":true,"labels":{"pl":"Data pierwotnej pożyczki/powstania długu","en":"Original Loan/Debt Date","uk":"Дата первинної позики/виникнення боргу","de":"Datum des ursprünglichen Darlehens/der Schuldentstehung"}},
                    {"name":"witness1_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko świadka 1 (opcjonalnie)","en":"Witness 1 Full Name (optional)","uk":"ПІБ свідка 1 (необов\'язково)","de":"Vollständiger Name Zeuge 1 (optional)"}},
                    {"name":"witness1_address","type":"text","required":false,"labels":{"pl":"Adres świadka 1 (opcjonalnie)","en":"Witness 1 Address (optional)","uk":"Адреса свідка 1 (необов\'язково)","de":"Adresse Zeuge 1 (optional)"}},
                    {"name":"witness2_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko świadka 2 (opcjonalnie)","en":"Witness 2 Full Name (optional)","uk":"ПІБ свідка 2 (необов\'язково)","de":"Vollständiger Name Zeuge 2 (optional)"}},
                    {"name":"witness2_address","type":"text","required":false,"labels":{"pl":"Adres świadka 2 (opcjonalnie)","en":"Witness 2 Address (optional)","uk":"Адреса свідка 2 (необов\'язково)","de":"Adresse Zeuge 2 (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Quittung über die Rückzahlung einer Geldschuld',
                        'description' => 'Dokument, das die vollständige Rückzahlung einer Geldschuld bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">QUITTUNG ÜBER DIE RÜCKZAHLUNG EINER GELDSCHULD</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ort: [[city]], Datum: [[receipt_date]]</p></td><td style="text-align: right;"><p>Gläubiger: <strong>[[creditor_full_name]]</strong><br>Ausweis: [[creditor_id_type]] [[creditor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Schuldner: <strong>[[debtor_full_name]]</strong><br>Ausweis: [[debtor_id_type]] [[debtor_id_number]]</p>
                                <br/>
                                <p>Hiermit bestätigt der Gläubiger, [[creditor_full_name]], den Erhalt von <strong>[[repaid_amount]] [[currency]]</strong> von dem Schuldner, [[debtor_full_name]], als vollständige Rückzahlung der Schuld, die aus dem am [[original_loan_date]] entstandenen Darlehen/Schuld resultiert.</p>
                                <p>Mit dieser Zahlung sind alle Forderungen des Gläubigers gegenüber dem Schuldner aus dem vorgenannten Rechtsgrund vollständig erfüllt und abgegolten.</p>
                                <br/>
                                <p>Zeugen (optional):</p>
                                <p>1. [[witness1_full_name]], [[witness1_address]]</p>
                                <p>2. [[witness2_full_name]], [[witness2_address]]</p>
                                <br/>
                                <p>Diese Quittung unterliegt deutschem Recht.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Schuldner</p></td>
                                <td width="50%"><p>___________________<br>Gläubiger</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Receipt of Money Debt Repayment',
                        'description' => 'Document confirming the full repayment of a monetary debt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECEIPT OF MONEY DEBT REPAYMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>City: [[city]], Date: [[receipt_date]]</p></td><td style="text-align: right;"><p>Creditor: <strong>[[creditor_full_name]]</strong><br>ID: [[creditor_id_type]] [[creditor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Debtor: <strong>[[debtor_full_name]]</strong><br>ID: [[debtor_id_type]] [[debtor_id_number]]</p>
                                <br/>
                                <p>Hereby, the creditor, [[creditor_full_name]], confirms the receipt of <strong>[[repaid_amount]] [[currency]]</strong> from the debtor, [[debtor_full_name]], as full repayment of the debt arising from the loan/debt incurred on [[original_loan_date]].</p>
                                <p>With this payment, all claims of the creditor against the debtor arising from the aforementioned legal basis are fully satisfied and settled.</p>
                                <br/>
                                <p>Witnesses (optional):</p>
                                <p>1. [[witness1_full_name]], [[witness1_address]]</p>
                                <p>2. [[witness2_full_name]], [[witness2_address]]</p>
                                <br/>
                                <p>This receipt is subject to German law.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Debtor</p></td>
                                <td width="50%"><p>___________________<br>Creditor</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Розписка про повернення грошового боргу',
                        'description' => 'Документ, що підтверджує повне повернення грошового боргу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РОЗПИСКА ПРО ПОВЕРНЕННЯ ГРОШОВОГО БОРГУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p>Кредитор: <strong>[[creditor_full_name]]</strong><br>Посвідчення: [[creditor_id_type]] [[creditor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Боржник: <strong>[[debtor_full_name]]</strong><br>Посвідчення: [[debtor_id_type]] [[debtor_id_number]]</p>
                                <br/>
                                <p>Цим кредитор, [[creditor_full_name]], підтверджує отримання <strong>[[repaid_amount]] [[currency]]</strong> від боржника, [[debtor_full_name]], як повне повернення боргу, що виник з позики/боргу, наданої/виниклого [[original_loan_date]].</p>
                                <p>Цим платежем усі вимоги кредитора до боржника, що виникли з вищезазначеної правової підстави, повністю задоволені та врегульовані.</p>
                                <br/>
                                <p>Свідки (необов\'язково):</p>
                                <p>1. [[witness1_full_name]], [[witness1_address]]</p>
                                <p>2. [[witness2_full_name]], [[witness2_address]]</p>
                                <br/>
                                <p>Ця розписка регулюється німецьким законодавством.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Боржник</p></td>
                                <td width="50%"><p>___________________<br>Кредитор</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Pokwitowanie zwrotu długu pieniężnego',
                        'description' => 'Dokument potwierdzający całkowity zwrot długu pieniężnego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POKWITOWANIE ZWROTU DŁUGU PIENIĘŻNEGO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p>Wierzyciel: <strong>[[creditor_full_name]]</strong><br>Dowód: [[creditor_id_type]] [[creditor_id_number]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dłużnik: <strong>[[debtor_full_name]]</strong><br>Dowód: [[debtor_id_type]] [[debtor_id_number]]</p>
                                <br/>
                                <p>Niniejszym wierzyciel, [[creditor_full_name]], potwierdza otrzymanie kwoty <strong>[[repaid_amount]] [[currency]]</strong> od dłużnika, [[debtor_full_name]], jako całkowity zwrot długu wynikającego z pożyczki/długu powstałego w dniu [[original_loan_date]].</p>
                                <p>Z tą płatnością wszystkie roszczenia wierzyciela wobec dłużnika, wynikające z wyżej wymienionej podstawy prawnej, są w pełni zaspokojone i rozliczone.</p>
                                <br/>
                                <p>Świadkowie (opcjonalnie):</p>
                                <p>1. [[witness1_full_name]], [[witness1_address]]</p>
                                <p>2. [[witness2_full_name]], [[witness2_address]]</p>
                                <br/>
                                <p>Niniejsze pokwitowanie podlega prawu niemieckiemu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Dłużnik</p></td>
                                <td width="50%"><p>___________________<br>Wierzyciel</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Досудебная претензия о возврате долга / Pre-court Claim for Debt Repayment (Mahnung) ---
            [
                'slug' => 'pre-court-debt-claim-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"claim_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia wezwania","en":"Claim Date","uk":"Дата складання вимоги","de":"Datum der Mahnung"}},
                    {"name":"claimant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wierzyciela/firmy","en":"Creditor\'s/Company\'s Full Name","uk":"ПІБ кредитора/компанії","de":"Vollständiger Name des Gläubigers/der Firma"}},
                    {"name":"claimant_address","type":"text","required":true,"labels":{"pl":"Adres wierzyciela/firmy","en":"Creditor\'s/Company\'s Address","uk":"Адреса кредитора/компанії","de":"Adresse des Gläubigers/der Firma"}},
                    {"name":"debtor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dłużnika/firmy","en":"Debtor\'s/Company\'s Full Name","uk":"ПІБ боржника/компанії","de":"Vollständiger Name des Schuldners/der Firma"}},
                    {"name":"debtor_address","type":"text","required":true,"labels":{"pl":"Adres dłużnika/firmy","en":"Debtor\'s/Company\'s Address","uk":"Адреса боржника/компанії","de":"Adresse des Schuldners/der Firma"}},
                    {"name":"original_debt_reason","type":"textarea","required":true,"labels":{"pl":"Podstawa prawna długu (np. umowa, faktura nr, data)","en":"Legal basis of debt (e.g., contract, invoice no., date)","uk":"Правова підстава боргу (напр., договір, рахунок №, дата)","de":"Rechtsgrundlage der Schuld (z.B. Vertrag, Rechnungsnr., Datum)"}},
                    {"name":"debt_amount","type":"number","required":true,"labels":{"pl":"Kwota długu","en":"Debt Amount","uk":"Сума боргу","de":"Schuldsumme"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"original_due_date","type":"date","required":true,"labels":{"pl":"Pierwotny termin płatności","en":"Original Due Date","uk":"Первинний термін оплати","de":"Ursprüngliches Fälligkeitsdatum"}},
                    {"name":"new_payment_deadline","type":"date","required":true,"labels":{"pl":"Nowy termin płatności","en":"New Payment Deadline","uk":"Новий термін оплати","de":"Neue Zahlungsfrist"}},
                    {"name":"interest_rate","type":"text","required":false,"labels":{"pl":"Odsetki za opóźnienie (opcjonalnie)","en":"Default interest (optional)","uk":"Відсотки за прострочення (необов\'язково)","de":"Verzugszinsen (optional)"}},
                    {"name":"warning_legal_action","type":"textarea","required":true,"labels":{"pl":"Ostrzeżenie o konsekwencjach prawnych","en":"Warning about legal consequences","uk":"Попередження про правові наслідки","de":"Warnung vor rechtlichen Konsequenzen"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mahnung / Zahlungsaufforderung',
                        'description' => 'Formelle Mahnung zur Begleichung einer Schuld vor Einleitung weiterer rechtlicher Schritte in Deutschland.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MAHNUNG / ZAHLUNGSAUFFORDERUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Gläubiger: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[claim_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[debtor_full_name]]</strong><br>[[debtor_address]]</p>
                                <br/>
                                <p>Sehr geehrte/r Herr/Frau [[debtor_full_name]],</p>
                                <p>bezüglich Ihrer fälligen Zahlung aus [[original_debt_reason]] möchten wir Sie hiermit an Ihre offene Forderung in Höhe von <strong>[[debt_amount]] [[currency]]</strong> erinnern. Die ursprüngliche Fälligkeit war der [[original_due_date]].</p>
                                <p>Wir bitten Sie, den ausstehenden Betrag bis spätestens <strong>[[new_payment_deadline]]</strong> auf unser Konto zu überweisen.</p>
                                <p>Wir weisen darauf hin, dass bei Nichteinhaltung dieser Frist Verzugszinsen in Höhe von [[interest_rate]] anfallen können und wir gezwungen sein werden, weitere rechtliche Schritte einzuleiten. [[warning_legal_action]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[claimant_full_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Pre-court Claim for Debt Repayment (Reminder)',
                        'description' => 'Formal reminder for debt settlement before initiating further legal steps in Germany.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REMINDER / PAYMENT REQUEST</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Creditor: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[claim_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To: <strong>[[debtor_full_name]]</strong><br>[[debtor_address]]</p>
                                <br/>
                                <p>Dear Mr./Ms. [[debtor_full_name]],</p>
                                <p>Regarding your overdue payment from [[original_debt_reason]], we hereby remind you of your outstanding claim of <strong>[[debt_amount]] [[currency]]</strong>. The original due date was [[original_due_date]].</p>
                                <p>We kindly ask you to transfer the outstanding amount to our account by <strong>[[new_payment_deadline]]</strong> at the latest.</p>
                                <p>Please note that failure to meet this deadline may result in default interest of [[interest_rate]] and we will be forced to initiate further legal steps. [[warning_legal_action]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Creditor</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Досудова претензія про повернення боргу (Нагадування)',
                        'description' => 'Формальне нагадування про врегулювання боргу перед початком подальших юридичних кроків у Німеччині.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">НАГАДУВАННЯ / ВИМОГА ПРО ОПЛАТУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Кредитор: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому: <strong>[[debtor_full_name]]</strong><br>[[debtor_address]]</p>
                                <br/>
                                <p>Шановний/а Пане/Пані [[debtor_full_name]],</p>
                                <p>щодо Вашої простроченої оплати за [[original_debt_reason]], цим ми нагадуємо Вам про Ваш непогашений борг у розмірі <strong>[[debt_amount]] [[currency]]</strong>. Початковий термін оплати був [[original_due_date]].</p>
                                <p>Просимо Вас перерахувати непогашену суму на наш рахунок не пізніше <strong>[[new_payment_deadline]]</strong>.</p>
                                <p>Звертаємо Вашу увагу, що у разі недотримання цього терміну можуть бути нараховані відсотки за прострочення у розмірі [[interest_rate]], і ми будемо змушені розпочати подальші юридичні дії. [[warning_legal_action]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Кредитор</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Wezwanie do zapłaty (Mahnung)',
                        'description' => 'Formalne wezwanie do uregulowania długu przed podjęciem dalszych kroków prawnych w Niemczech.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WEZWANIE DO ZAPŁATY (MAHNUNG)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wierzyciel: <strong>[[claimant_full_name]]</strong><br>[[claimant_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do: <strong>[[debtor_full_name]]</strong><br>[[debtor_address]]</p>
                                <br/>
                                <p>Szanowny/a Panie/Pani [[debtor_full_name]],</p>
                                <p>w związku z Państwa zaległą płatnością z tytułu [[original_debt_reason]], niniejszym przypominamy o Państwa otwartym zobowiązaniu w wysokości <strong>[[debt_amount]] [[currency]]</strong>. Pierwotny termin płatności upłynął w dniu [[original_due_date]].</p>
                                <p>Prosimy o uregulowanie zaległej kwoty na nasze konto najpóźniej do dnia <strong>[[new_payment_deadline]]</strong>.</p>
                                <p>Informujemy, że w przypadku nieuregulowania płatności w tym terminie, mogą zostać naliczone odsetki za opóźnienie w wysokości [[interest_rate]] i będziemy zmuszeni podjąć dalsze kroki prawne. [[warning_legal_action]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wierzyciel</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Заявление в банк на реструктуризацию кредита / Application to Bank for Loan Restructuring ---
            [
                'slug' => 'bank-loan-restructuring-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Adresse des Antragstellers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail wnioskodawcy","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail заявника","de":"Telefon und E-Mail des Antragstellers"}},
                    {"name":"bank_name","type":"text","required":true,"labels":{"pl":"Nazwa banku","en":"Bank Name","uk":"Назва банку","de":"Name der Bank"}},
                    {"name":"bank_address","type":"text","required":true,"labels":{"pl":"Adres banku","en":"Bank Address","uk":"Адреса банку","de":"Adresse der Bank"}},
                    {"name":"loan_number","type":"text","required":true,"labels":{"pl":"Numer umowy kredytowej","en":"Loan Agreement Number","uk":"Номер кредитного договору","de":"Darlehensvertragsnummer"}},
                    {"name":"restructuring_reason","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku o restrukturyzację","en":"Reason for restructuring application","uk":"Обґрунтування заяви про реструктуризацію","de":"Begründung des Restrukturierungsantrags"}},
                    {"name":"proposed_terms","type":"textarea","required":false,"labels":{"pl":"Proponowane warunki restrukturyzacji (opcjonalnie)","en":"Proposed restructuring terms (optional)","uk":"Пропоновані умови реструктуризації (необов\'язково)","de":"Vorgeschlagene Restrukturierungsbedingungen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Kreditrestrukturierung',
                        'description' => 'Antrag an die Bank zur Änderung der Kreditkonditionen, z.B. bei Zahlungsschwierigkeiten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF KREDITRESTRUKTURIERUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich die Restrukturierung meines Darlehens mit der Nummer <strong>[[loan_number]]</strong>.</p>
                                <p>Begründung meines Antrags:</p>
                                <p>[[restructuring_reason]]</p>
                                <p>Ich schlage folgende Restrukturierungsbedingungen vor (optional):</p>
                                <p>[[proposed_terms]]</p>
                                <p>Ich bitte Sie höflich um Prüfung meines Antrags und um Kontaktaufnahme zur Besprechung der Details.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Application to Bank for Loan Restructuring',
                        'description' => 'Application to the bank for a change in loan conditions, e.g., due to payment difficulties.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APPLICATION FOR LOAN RESTRUCTURING</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Applicant: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby apply for the restructuring of my loan with number <strong>[[loan_number]]</strong>.</p>
                                <p>Reason for my application:</p>
                                <p>[[restructuring_reason]]</p>
                                <p>I propose the following restructuring terms (optional):</p>
                                <p>[[proposed_terms]]</p>
                                <p>I kindly request you to review my application and contact me to discuss the details.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Applicant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява до банку на реструктуризацію кредиту',
                        'description' => 'Заява до банку про зміну умов кредиту, напр., через труднощі з оплатою.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА ДО БАНКУ НА РЕСТРУКТУРИЗАЦІЮ КРЕДИТУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Заявник: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю заяву на реструктуризацію мого кредиту за номером <strong>[[loan_number]]</strong>.</p>
                                <p>Обґрунтування моєї заяви:</p>
                                <p>[[restructuring_reason]]</p>
                                <p>Я пропоную наступні умови реструктуризації (необов\'язково):</p>
                                <p>[[proposed_terms]]</p>
                                <p>Прошу Вас розглянути мою заяву та зв\'язатися зі мною для обговорення деталей.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek do banku o restrukturyzację kredytu',
                        'description' => 'Wniosek do banku o zmianę warunków kredytu, np. w przypadku trudności w spłacie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WNIOSEK O RESTRUKTURYZACJĘ KREDYTU</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wnioskodawca: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam wniosek o restrukturyzację mojego kredytu o numerze <strong>[[loan_number]]</strong>.</p>
                                <p>Uzasadnienie mojego wniosku:</p>
                                <p>[[restructuring_reason]]</p>
                                <p>Proponuję następujące warunki restrukturyzacji (opcjonalnie):</p>
                                <p>[[proposed_terms]]</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku i kontakt w celu omówienia szczegółów.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wnioskodawca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Заявление в банк о спорной транзакции (чарджбэк) / Application to Bank for Disputed Transaction (Chargeback) ---
            [
                'slug' => 'bank-disputed-transaction-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Adresse des Antragstellers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail wnioskodawcy","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail заявника","de":"Telefon und E-Mail des Antragstellers"}},
                    {"name":"bank_name","type":"text","required":true,"labels":{"pl":"Nazwa banku","en":"Bank Name","uk":"Назва банку","de":"Name der Bank"}},
                    {"name":"bank_address","type":"text","required":true,"labels":{"pl":"Adres banku","en":"Bank Address","uk":"Адреса банку","de":"Adresse der Bank"}},
                    {"name":"account_iban","type":"text","required":true,"labels":{"pl":"Numer rachunku (IBAN)","en":"Account Number (IBAN)","uk":"Номер рахунку (IBAN)","de":"Kontonummer (IBAN)"}},
                    {"name":"transaction_date","type":"date","required":true,"labels":{"pl":"Data spornej transakcji","en":"Disputed Transaction Date","uk":"Дата спірної транзакції","de":"Datum der strittigen Transaktion"}},
                    {"name":"transaction_amount","type":"number","required":true,"labels":{"pl":"Kwota spornej transakcji","en":"Disputed Transaction Amount","uk":"Сума спірної транзакції","de":"Betrag der strittigen Transaktion"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"transaction_description","type":"textarea","required":true,"labels":{"pl":"Opis spornej transakcji i uzasadnienie chargebacku","en":"Description of disputed transaction and chargeback reason","uk":"Опис спірної транзакції та обґрунтування чарджбеку","de":"Beschreibung der strittigen Transaktion und Begründung des Chargebacks"}},
                    {"name":"merchant_name","type":"text","required":false,"labels":{"pl":"Nazwa sprzedawcy/usługodawcy (opcjonalnie)","en":"Merchant/service provider name (optional)","uk":"Назва продавця/постачальника послуг (необов\'язково)","de":"Name des Händlers/Dienstleisters (optional)"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. wyciąg bankowy, korespondencja)","en":"Attachments (e.g., bank statement, correspondence)","uk":"Додатки (напр., виписка з банку, листування)","de":"Anhänge (z.B. Kontoauszug, Korrespondenz)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Antrag auf Rückbuchung (Chargeback) / Reklamation einer Transaktion',
                        'description' => 'Antrag an die Bank zur Rückbuchung einer strittigen oder unautorisierten Transaktion, gemäß deutschem Bankrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF RÜCKBUCHUNG (CHARGEBACK)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Antragsteller: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit beantrage ich eine Rückbuchung (Chargeback) für die folgende strittige Transaktion auf meinem Konto <strong>[[account_iban]]</strong>:</p>
                                <p>Datum der Transaktion: <strong>[[transaction_date]]</strong></p>
                                <p>Betrag: <strong>[[transaction_amount]] [[currency]]</strong></p>
                                <p>Händler/Dienstleister (falls bekannt): [[merchant_name]]</p>
                                <p>Beschreibung der strittigen Transaktion und Begründung des Chargebacks:</p>
                                <p>[[transaction_description]]</p>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <p>Ich bitte Sie höflich um schnelle Prüfung meines Antrags und um Rückerstattung des Betrags auf mein Konto.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Application to Bank for Disputed Transaction (Chargeback)',
                        'description' => 'Application to the bank for a chargeback of a disputed or unauthorized transaction, according to German banking law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APPLICATION FOR CHARGEBACK</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Applicant: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby apply for a chargeback for the following disputed transaction on my account <strong>[[account_iban]]</strong>:</p>
                                <p>Transaction Date: <strong>[[transaction_date]]</strong></p>
                                <p>Amount: <strong>[[transaction_amount]] [[currency]]</strong></p>
                                <p>Merchant/Service Provider (if known): [[merchant_name]]</p>
                                <p>Description of the disputed transaction and reason for chargeback:</p>
                                <p>[[transaction_description]]</p>
                                <p>Enclosed please find: [[attachments]].</p>
                                <p>I kindly request a prompt review of my application and a refund of the amount to my account.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Applicant</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява до банку про спірну транзакцію (чарджбек)',
                        'description' => 'Заява до банку про повернення коштів за спірну або несанкціоновану транзакцію, згідно з німецьким банківським законодавством.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА ДО БАНКУ ПРО ЧАРДЖБЕК</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Заявник: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я подаю заяву на повернення коштів (чарджбек) за наступною спірною транзакцією на моєму рахунку <strong>[[account_iban]]</strong>:</p>
                                <p>Дата транзакції: <strong>[[transaction_date]]</strong></p>
                                <p>Сума: <strong>[[transaction_amount]] [[currency]]</strong></p>
                                <p>Продавець/Надавач послуг (якщо відомо): [[merchant_name]]</p>
                                <p>Опис спірної транзакції та обґрунтування чарджбеку:</p>
                                <p>[[transaction_description]]</p>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <p>Прошу Вас швидко розглянути мою заяву та повернути суму на мій рахунок.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Заявник</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek do banku o chargeback (sporna transakcja)',
                        'description' => 'Wniosek do banku o zwrot środków za sporną lub nieautoryzowaną transakcję, zgodnie z niemieckim prawem bankowym.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WNIOSEK O CHARGEBACK</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wnioskodawca: <strong>[[applicant_full_name]]</strong><br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[bank_name]]</strong><br>[[bank_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym składam wniosek o zwrot środków (chargeback) dla następującej spornej transakcji na moim koncie <strong>[[account_iban]]</strong>:</p>
                                <p>Data transakcji: <strong>[[transaction_date]]</strong></p>
                                <p>Kwota: <strong>[[transaction_amount]] [[currency]]</strong></p>
                                <p>Nazwa sprzedawcy/usługodawcy (jeśli znana): [[merchant_name]]</p>
                                <p>Opis spornej transakcji i uzasadnienie chargebacku:</p>
                                <p>[[transaction_description]]</p>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <p>Proszę o szybkie rozpatrzenie mojego wniosku i zwrot środków na moje konto.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wnioskodawca</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Заявление на возврат товара надлежащего качества / Application for Return of Goods of Proper Quality (Widerrufsbelehrung) ---
            [
                'slug' => 'return-goods-proper-quality-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"pl":"Data złożenia wniosku","en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum"}},
                    {"name":"buyer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kupującego","en":"Buyer\'s Full Name","uk":"ПІБ покупця","de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres kupującego","en":"Buyer\'s Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"buyer_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail kupującego","en":"Buyer\'s Phone & Email","uk":"Телефон та e-mail покупця","de":"Telefon und E-Mail des Käufers"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"pl":"Nazwa sprzedawcy","en":"Seller Name","uk":"Назва продавця","de":"Name des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedawcy","en":"Seller Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"product_name","type":"text","required":true,"labels":{"pl":"Nazwa towaru","en":"Product Name","uk":"Назва товару","de":"Name des Produkts"}},
                    {"name":"order_number","type":"text","required":true,"labels":{"pl":"Numer zamówienia/faktury","en":"Order/Invoice Number","uk":"Номер замовлення/рахунку","de":"Bestell-/Rechnungsnummer"}},
                    {"name":"purchase_date","type":"date","required":true,"labels":{"pl":"Data zakupu","en":"Purchase Date","uk":"Дата покупки","de":"Kaufdatum"}},
                    {"name":"purchase_price","type":"number","required":true,"labels":{"pl":"Cena zakupu","en":"Purchase Price","uk":"Ціна покупки","de":"Kaufpreis"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"reason_for_return","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie zwrotu (np. odstąpienie od umowy, niewłaściwy rozmiar)","en":"Reason for return (e.g., withdrawal from contract, wrong size)","uk":"Обґрунтування повернення (напр., відмова від договору, неправильний розмір)","de":"Rückgabegrund (z.B. Widerruf, falsche Größe)"}},
                    {"name":"refund_method","type":"text","required":true,"labels":{"pl":"Preferowana forma zwrotu środków (np. przelew na konto, zwrot na kartę)","en":"Preferred refund method (e.g., bank transfer, card refund)","uk":"Бажана форма повернення коштів (напр., банківський переказ, повернення на картку)","de":"Bevorzugte Rückerstattungsmethode (z.B. Banküberweisung, Kartenrückerstattung)"}},
                    {"name":"return_date","type":"date","required":false,"labels":{"pl":"Data odesłania towaru (jeśli już odesłano)","en":"Date goods returned (if already sent)","uk":"Дата відправлення товару (якщо вже відправлено)","de":"Datum der Warenrücksendung (falls bereits gesendet)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Widerrufserklärung / Antrag auf Rückgabe einwandfreier Ware',
                        'description' => 'Erklärung zum Widerruf eines Kaufvertrags oder zur Rückgabe einwandfreier Ware, insbesondere bei Fernabsatzgeschäften, gemäß deutschem Verbraucherrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WIDERRUFSERKLÄRUNG / ANTRAG AUF RÜCKGABE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Käufer: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>[[buyer_phone_email]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit widerrufe ich den Kaufvertrag über folgende Ware: <strong>[[product_name]]</strong>, Bestell-/Rechnungsnummer: <strong>[[order_number]]</strong>, gekauft am <strong>[[purchase_date]]</strong> zum Preis von <strong>[[purchase_price]] [[currency]]</strong>.</p>
                                <p>Grund der Rückgabe / des Widerrufs:</p>
                                <p>[[reason_for_return]]</p>
                                <p>Ich bitte um Rückerstattung des Kaufpreises von [[purchase_price]] [[currency]] auf folgendem Wege: [[refund_method]].</p>
                                <p>Die Ware wurde am [[return_date]] (falls zutreffend) zurückgesandt.</p>
                                <p>Ich bitte um eine Bestätigung des Widerrufs und der Rücksendung.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[buyer_full_name]])</p>
                            </div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Declaration of Withdrawal / Application for Return of Goods of Proper Quality',
                        'description' => 'Declaration of withdrawal from a purchase contract or return of goods of proper quality, especially for distance selling, according to German consumer law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DECLARATION OF WITHDRAWAL / RETURN APPLICATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Buyer: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>[[buyer_phone_email]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[application_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby withdraw from the purchase contract for the following goods: <strong>[[product_name]]</strong>, Order/Invoice Number: <strong>[[order_number]]</strong>, purchased on <strong>[[purchase_date]]</strong> for the price of <strong>[[purchase_price]] [[currency]]</strong>.</p>
                                <p>Reason for return / withdrawal:</p>
                                <p>[[reason_for_return]]</p>
                                <p>I request a refund of the purchase price of [[purchase_price]] [[currency]] by: [[refund_method]].</p>
                                <p>The goods were returned on [[return_date]] (if applicable).</p>
                                <p>I kindly request a confirmation of the withdrawal and return.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Buyer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про відмову від договору / Заява на повернення товару належної якості',
                        'description' => 'Заява про відмову від договору купівлі-продажу або повернення товару належної якості, особливо для дистанційної торгівлі, згідно з німецьким законодавством про захист прав споживачів.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА ПРО ВІДМОВУ ВІД ДОГОВОРУ / ЗАЯВА НА ПОВЕРНЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Покупець: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>[[buyer_phone_email]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я відмовляюся від договору купівлі-продажу наступного товару: <strong>[[product_name]]</strong>, Номер замовлення/рахунку: <strong>[[order_number]]</strong>, придбаного <strong>[[purchase_date]]</strong> за ціною <strong>[[purchase_price]] [[currency]]</strong>.</p>
                                <p>Причина повернення / відмови:</p>
                                <p>[[reason_for_return]]</p>
                                <p>Прошу повернути вартість покупки [[purchase_price]] [[currency]] наступним чином: [[refund_method]].</p>
                                <p>Товар був повернений [[return_date]] (якщо застосовно).</p>
                                <p>Прошу підтвердити відмову та повернення.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Покупець</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Oświadczenie o odstąpieniu od umowy / Wniosek o zwrot towaru pełnowartościowego',
                        'description' => 'Oświadczenie o odstąpieniu od umowy kupna lub zwrocie towaru pełnowartościowego, zwłaszcza w przypadku sprzedaży na odległość, zgodnie z niemieckim prawem konsumenckim.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OŚWIADCZENIE O ODSTĄPIENIU OD UMOWY / WNIOSEK O ZWROT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Kupujący: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>[[buyer_phone_email]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym odstępuję od umowy kupna następującego towaru: <strong>[[product_name]]</strong>, Numer zamówienia/faktury: <strong>[[order_number]]</strong>, zakupionego w dniu <strong>[[purchase_date]]</strong> za cenę <strong>[[purchase_price]] [[currency]]</strong>.</p>
                                <p>Powód zwrotu / odstąpienia:</p>
                                <p>[[reason_for_return]]</p>
                                <p>Proszę o zwrot ceny zakupu w wysokości [[purchase_price]] [[currency]] w następujący sposób: [[refund_method]].</p>
                                <p>Towar został odesłany w dniu [[return_date]] (jeśli dotyczy).</p>
                                <p>Proszę o potwierdzenie odstąpienia i zwrotu.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Kupujący</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Претензия на некачественный товар / Claim for Defective Goods (Mängelrüge) ---
            [
                'slug' => 'claim-defective-goods-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"claim_date","type":"date","required":true,"labels":{"pl":"Data złożenia reklamacji","en":"Claim Date","uk":"Дата подання претензії","de":"Datum der Mängelrüge"}},
                    {"name":"buyer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko kupującego","en":"Buyer\'s Full Name","uk":"ПІБ покупця","de":"Vollständiger Name des Käufers"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres kupującego","en":"Buyer\'s Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"buyer_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail kupującego","en":"Buyer\'s Phone & Email","uk":"Телефон та e-mail покупця","de":"Telefon und E-Mail des Käufers"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"pl":"Nazwa sprzedawcy","en":"Seller Name","uk":"Назва продавця","de":"Name des Verkäufers"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedawcy","en":"Seller Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"product_name","type":"text","required":true,"labels":{"pl":"Nazwa towaru","en":"Product Name","uk":"Назва товару","de":"Name des Produkts"}},
                    {"name":"order_number","type":"text","required":true,"labels":{"pl":"Numer zamówienia/faktury","en":"Order/Invoice Number","uk":"Номер замовлення/рахунку","de":"Bestell-/Rechnungsnummer"}},
                    {"name":"purchase_date","type":"date","required":true,"labels":{"pl":"Data zakupu","en":"Purchase Date","uk":"Дата покупки","de":"Kaufdatum"}},
                    {"name":"defect_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis wady towaru","en":"Detailed description of product defect","uk":"Детальний опис дефекту товару","de":"Detaillierte Beschreibung des Produktfehlers"}},
                    {"name":"demands","type":"textarea","required":true,"labels":{"pl":"Żądania (np. naprawa, wymiana, obniżenie ceny, odstąpienie od umowy)","en":"Demands (e.g., repair, replacement, price reduction, withdrawal from contract)","uk":"Вимоги (напр., ремонт, заміна, зниження ціни, відмова від договору)","de":"Forderungen (z.B. Reparatur, Umtausch, Minderung, Rücktritt)"}},
                    {"name":"deadline_for_remedy","type":"text","required":true,"labels":{"pl":"Termin na usunięcie wady/spełnienie żądania","en":"Deadline for remedying the defect/fulfilling the demand","uk":"Термін усунення дефекту/виконання вимоги","de":"Frist zur Mängelbeseitigung/Erfüllung der Forderung"}},
                    {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (np. zdjęcia wady, dowód zakupu)","en":"Attachments (e.g., photos of defect, proof of purchase)","uk":"Додатки (напр., фото дефекту, доказ покупки)","de":"Anhänge (z.B. Fotos des Mangels, Kaufbeleg)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Mängelrüge / Reklamation',
                        'description' => 'Formelle Mängelrüge bezüglich mangelhafter Ware, z.B. zur Geltendmachung von Gewährleistungsrechten, gemäß deutschem Kaufrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MÄNGELRÜGE / REKLAMATION</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Käufer: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>[[buyer_phone_email]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[claim_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>hiermit rüge ich Mängel an folgender Ware: <strong>[[product_name]]</strong>, Bestell-/Rechnungsnummer: <strong>[[order_number]]</strong>, gekauft am <strong>[[purchase_date]]</strong>.</p>
                                <p>Detaillierte Beschreibung des Mangels:</p>
                                <p>[[defect_description]]</p>
                                <p>Aufgrund dieses Mangels fordere ich Sie auf, [[demands]] bis spätestens <strong>[[deadline_for_remedy]]</strong>.</p>
                                <p>Anbei sende ich Ihnen: [[attachments]].</p>
                                <p>Ich bitte um eine Bestätigung des Eingangs dieser Mängelrüge und um Mitteilung der weiteren Vorgehensweise.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Käufer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'en' => [
                        'title' => 'Claim for Defective Goods (Complaint)',
                        'description' => 'Formal complaint regarding defective goods, e.g., for asserting warranty rights, according to German sales law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CLAIM FOR DEFECTIVE GOODS / COMPLAINT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Buyer: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>[[buyer_phone_email]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[claim_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby complain about defects in the following goods: <strong>[[product_name]]</strong>, Order/Invoice Number: <strong>[[order_number]]</strong>, purchased on <strong>[[purchase_date]]</strong>.</p>
                                <p>Detailed description of the defect:</p>
                                <p>[[defect_description]]</p>
                                <p>Due to this defect, I request you to [[demands]] by <strong>[[deadline_for_remedy]]</strong> at the latest.</p>
                                <p>Enclosed please find: [[attachments]].</p>
                                <p>I kindly request a confirmation of receipt of this complaint and information on further proceedings.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Buyer</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'uk' => [
                        'title' => 'Претензія на неякісний товар (Рекламація)',
                        'description' => 'Формальна претензія щодо неякісного товару, напр., для пред\'явлення гарантійних прав, згідно з німецьким правом купівлі-продажу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПРЕТЕНЗІЯ НА НЕЯКІСНИЙ ТОВАР / РЕКЛАМАЦІЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Покупець: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>[[buyer_phone_email]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>цим я заявляю про дефекти наступного товару: <strong>[[product_name]]</strong>, Номер замовлення/рахунку: <strong>[[order_number]]</strong>, придбаного <strong>[[purchase_date]]</strong>.</p>
                                <p>Детальний опис дефекту:</p>
                                <p>[[defect_description]]</p>
                                <p>Через цей дефект я вимагаю від Вас [[demands]] не пізніше <strong>[[deadline_for_remedy]]</strong>.</p>
                                <p>У додатку надсилаю: [[attachments]].</p>
                                <p>Прошу підтвердити отримання цієї претензії та повідомити про подальші дії.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Покупець</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ],
                    'pl' => [
                        'title' => 'Reklamacja towaru wadliwego',
                        'description' => 'Formalna reklamacja dotycząca wadliwego towaru, np. w celu dochodzenia praw z tytułu rękojmi, zgodnie z niemieckim prawem sprzedaży.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REKLAMACJA TOWARU WADLIWEGO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Kupujący: <strong>[[buyer_full_name]]</strong><br>[[buyer_address]]<br>[[buyer_phone_email]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do:<br><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>niniejszym reklamuję wady następującego towaru: <strong>[[product_name]]</strong>, Numer zamówienia/faktury: <strong>[[order_number]]</strong>, zakupionego w dniu <strong>[[purchase_date]]</strong>.</p>
                                <p>Szczegółowy opis wady:</p>
                                <p>[[defect_description]]</p>
                                <p>Z powodu tej wady żądam od Państwa [[demands]] najpóźniej do dnia <strong>[[deadline_for_remedy]]</strong>.</p>
                                <p>W załączeniu przesyłam: [[attachments]].</p>
                                <p>Proszę o potwierdzenie otrzymania niniejszej reklamacji i informację o dalszym postępowaniu.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Kupujący</p></td>
                                </tr></table></div><div style="font-family: DejaVu Sans, sans-serif; margin-top: 20px; font-size: 10px; text-align: center; color: #555;"></div>'
                    ]
                ]
            ],

            // --- Бюджет на месяц (личный/семейный) / Monthly Budget (Personal/Family) ---
            [
                'slug' => 'monthly-budget-de',
        'access_level' => 'free',
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
                    'de' => [
                        'title' => 'Monatsbudget ([[budget_type]])',
                        'description' => 'Vorlage zur Planung und Überwachung eines persönlichen oder familiären Monatsbudgets.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MONATSBUDGET</h1><p style="font-size: 14px;">Monat und Jahr: <strong>[[month_year]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Budgettyp: <strong>[[budget_type]]</strong></p></td><td style="text-align: right;"><p>Stand: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Einnahmen</h2>
                                <pre>[[income_sources]]</pre>
                                <p><strong>Gesamteinnahmen: [[total_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Fixkosten</h2>
                                <pre>[[fixed_expenses]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Variable Ausgaben</h2>
                                <pre>[[variable_expenses]]</pre>
                                <p><strong>Gesamtausgaben: [[total_expenses]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Saldo</h2>
                                <p><strong>Saldo am Monatsende: [[balance]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Anmerkungen</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Monthly Budget ([[budget_type]])',
                        'description' => 'A template for planning and monitoring a personal or family monthly budget.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MONTHLY BUDGET</h1><p style="font-size: 14px;">Month and Year: <strong>[[month_year]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Budget Type: <strong>[[budget_type]]</strong></p></td><td style="text-align: right;"><p>As of: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Income</h2>
                                <pre>[[income_sources]]</pre>
                                <p><strong>Total Income: [[total_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Fixed Expenses</h2>
                                <pre>[[fixed_expenses]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Variable Expenses</h2>
                                <pre>[[variable_expenses]]</pre>
                                <p><strong>Total Expenses: [[total_expenses]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Balance</h2>
                                <p><strong>Balance at end of month: [[balance]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Notes</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Бюджет на місяць ([[budget_type]])',
                        'description' => 'Шаблон для планування та моніторингу особистого або сімейного місячного бюджету.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">БЮДЖЕТ НА МІСЯЦЬ</h1><p style="font-size: 14px;">Місяць та рік: <strong>[[month_year]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Тип бюджету: <strong>[[budget_type]]</strong></p></td><td style="text-align: right;"><p>Станом на: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Доходи</h2>
                                <pre>[[income_sources]]</pre>
                                <p><strong>Загальний дохід: [[total_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Постійні витрати</h2>
                                <pre>[[fixed_expenses]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Змінні витрати</h2>
                                <pre>[[variable_expenses]]</pre>
                                <p><strong>Загальні витрати: [[total_expenses]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Залишок</h2>
                                <p><strong>Залишок на кінець місяця: [[balance]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Примітки</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Budżet miesięczny ([[budget_type]])',
                        'description' => 'Szablon do planowania i monitorowania osobistego lub rodzinnego budżetu miesięcznego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BUDŻET MIESIĘCZNY</h1><p style="font-size: 14px;">Miesiąc i rok: <strong>[[month_year]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Typ budżetu: <strong>[[budget_type]]</strong></p></td><td style="text-align: right;"><p>Stan na: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Dochody</h2>
                                <pre>[[income_sources]]</pre>
                                <p><strong>Całkowity dochód: [[total_income]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Wydatki stałe</h2>
                                <pre>[[fixed_expenses]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Wydatki zmienne</h2>
                                <pre>[[variable_expenses]]</pre>
                                <p><strong>Całkowite wydatki: [[total_expenses]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Saldo</h2>
                                <p><strong>Saldo na koniec miesiąca: [[balance]]</strong></p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Uwagi</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Список покупок / Shopping List ---
            [
                'slug' => 'shopping-list-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"list_name","type":"text","required":true,"labels":{"pl":"Nazwa listy","en":"List Name","uk":"Назва списку","de":"Listenname"}},
                    {"name":"list_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia listy","en":"Date of Creation","uk":"Дата створення","de":"Erstellungsdatum"}},
                    {"name":"items","type":"textarea","required":true,"labels":{"pl":"Pozycje (nazwa, ilość, uwagi)","en":"Items (name, quantity, notes)","uk":"Позиції (назва, кількість, примітки)","de":"Positionen (Name, Menge, Anmerkungen)"}},
                    {"name":"notes","type":"textarea","required":false,"labels":{"pl":"Dodatkowe uwagi (opcjonalnie)","en":"Additional notes (optional)","uk":"Додаткові примітки (необов\'язково)","de":"Zusätzliche Anmerkungen (optional)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Einkaufsliste',
                        'description' => 'Eine einfache Vorlage zum Erstellen von Einkaufslisten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EINKAUFSLISTE</h1><p style="font-size: 14px;">Listenname: <strong>[[list_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Erstellungsdatum: [[list_date]]</p></td><td style="text-align: right;"><p>Ort: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Positionen:</h2>
                                <pre>[[items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Zusätzliche Anmerkungen:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Shopping List',
                        'description' => 'A simple template for creating shopping lists.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SHOPPING LIST</h1><p style="font-size: 14px;">List Name: <strong>[[list_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Date of Creation: [[list_date]]</p></td><td style="text-align: right;"><p>City: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Items:</h2>
                                <pre>[[items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Additional Notes:</h2>
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
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Позиції:</h2>
                                <pre>[[items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Додаткові примітки:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис)</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Lista zakupów',
                        'description' => 'Prosty szablon do tworzenia list zakupów.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LISTA ZAKUPÓW</h1><p style="font-size: 14px;">Nazwa listy: <strong>[[list_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data sporządzenia listy: [[list_date]]</p></td><td style="text-align: right;"><p>Miejscowość: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Pozycje:</h2>
                                <pre>[[items]]</pre>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Dodatkowe uwagi:</h2>
                                <p>[[notes]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Личное благодарственное письмо / Personal Thank You Letter ---
            [
                'slug' => 'personal-thank-you-letter-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"letter_date","type":"date","required":true,"labels":{"pl":"Data listu","en":"Letter Date","uk":"Дата листа","de":"Datum des Schreibens"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_address","type":"text","required":true,"labels":{"pl":"Adres nadawcy","en":"Sender Address","uk":"Адреса відправника","de":"Adresse des Absenders"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbiorcy","en":"Recipient Full Name","uk":"ПІБ одержувача","de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"reason_for_thanks","type":"textarea","required":true,"labels":{"pl":"Powód podziękowania (za co dziękujesz, szczegóły)","en":"Reason for thanks (what you are thanking for, details)","uk":"Причина подяки (за що дякуєте, деталі)","de":"Grund des Dankes (wofür Sie sich bedanken, Details)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Persönliches Dankesschreiben',
                        'description' => 'Ein privater Brief, der Dankbarkeit für Hilfe oder Unterstützung ausdrückt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PERSÖNLICHES DANKESSCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Absender: <strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[letter_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Liebe/r [[recipient_full_name]],</p>
                                <p>ich möchte mich herzlich für [[reason_for_thanks]] bedanken.</p>
                                <p>Ihre/Deine Hilfe/Unterstützung/Geste bedeutet mir sehr viel.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Personal Thank You Letter',
                        'description' => 'A private letter expressing gratitude for help or support.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PERSONAL THANK YOU LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Sender: <strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[letter_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Dear [[recipient_full_name]],</p>
                                <p>I would like to sincerely thank you for [[reason_for_thanks]].</p>
                                <p>Your help/support/gesture means a lot to me.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Особистий подячний лист',
                        'description' => 'Приватний лист, що висловлює подяку за допомогу або підтримку.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ОСОБИСТИЙ ПОДЯЧНИЙ ЛИСТ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Відправник: <strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Дорогий/Дорога [[recipient_full_name]],</p>
                                <p>хочу щиро подякувати тобі за [[reason_for_thanks]].</p>
                                <p>Твоя допомога/підтримка/жест багато для мене значить.</p>
                                <br/>
                                <p>З вдячністю,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Osobisty list z podziękowaniami',
                        'description' => 'Prywatny list wyrażający wdzięczność za pomoc lub wsparcie.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OSOBISTY LIST Z PODZIĘKOWANIAMI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Nadawca: <strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Drogi/Droga [[recipient_full_name]],</p>
                                <p>chciałbym/chciałabym Ci serdecznie podziękować za [[reason_for_thanks]].</p>
                                <p>Twoja pomoc/wsparcie/gest wiele dla mnie znaczy.</p>
                                <br/>
                                <p>Z wyrazami wdzięczności,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Личное письмо с извинениями / Personal Apology Letter ---
            [
                'slug' => 'personal-apology-letter-de',
        'access_level' => 'free',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"letter_date","type":"date","required":true,"labels":{"pl":"Data listu","en":"Letter Date","uk":"Дата листа","de":"Datum des Schreibens"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_address","type":"text","required":true,"labels":{"pl":"Adres nadawcy","en":"Sender Address","uk":"Адреса відправника","de":"Adresse des Absenders"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbiorcy","en":"Recipient Full Name","uk":"ПІБ одержувача","de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"pl":"Opis sytuacji, za którą przepraszasz","en":"Description of the situation you are apologizing for","uk":"Опис ситуації, за яку вибачаєтеся","de":"Beschreibung der Situation, für die Sie sich entschuldigen"}},
                    {"name":"apology_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły przeprosin (wyrażenie skruchy, obietnica poprawy)","en":"Apology details (expression of remorse, promise of improvement)","uk":"Деталі вибачень (вираз каяття, обіцянка покращення)","de":"Entschuldigungsdetails (Ausdruck des Bedauerns, Versprechen der Besserung)"}}
                ]',
                'translations' => [
                    'de' => [
                        'title' => 'Persönliches Entschuldigungsschreiben',
                        'description' => 'Ein privater Brief, der Reue und Entschuldigung für eine bestimmte Situation ausdrückt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PERSÖNLICHES ENTSCHULDIGUNGSSCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Absender: <strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td><td style="text-align: right;"><p>Ort: [[city]], Datum: [[letter_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Liebe/r [[recipient_full_name]],</p>
                                <p>ich schreibe Ihnen/dir bezüglich der Situation, die stattgefunden hat: [[incident_description]].</p>
                                <p>Ich möchte mich aufrichtig für [[apology_details]] entschuldigen.</p>
                                <p>Ich hoffe, Sie/du werden/wirst meine Entschuldigung annehmen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Personal Apology Letter',
                        'description' => 'A private letter expressing remorse and apology for a given situation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PERSONAL APOLOGY LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Sender: <strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td><td style="text-align: right;"><p>City: [[city]], Date: [[letter_date]]</p></td></tr></table>',
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
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Особистий лист з вибаченнями',
                        'description' => 'Приватний лист, що висловлює каяття та вибачення за ситуацію, що склалася.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ОСОБИСТИЙ ЛИСТ З ВИБАЧЕННЯМИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Відправник: <strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td><td style="text-align: right;"><p>Місто: [[city]], Дата: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Кому: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Дорогий/Дорога [[recipient_full_name]],</p>
                                <p>пишу тобі у зв\'язку з ситуацією, що сталася: [[incident_description]].</p>
                                <p>Хотів/Хотіла б щиро вибачитися за [[apology_details]].</p>
                                <p>Сподіваюся, ти приймеш мої вибачення.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Osobisty list z przeprosinami',
                        'description' => 'Prywatny list wyrażający skruchę i przeprosiny za zaistniałą sytuację.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OSOBISTY LIST Z PRZEPROSINAMI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Nadawca: <strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], Data: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do: <strong>[[recipient_full_name]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Drogi/Droga [[recipient_full_name]],</p>
                                <p>piszę do Ciebie w związku z sytuacją, która miała miejsce: [[incident_description]].</p>
                                <p>Chciałbym/Chciałabym serdecznie przeprosić za [[apology_details]].</p>
                                <p>Mam nadzieję, że przyjmiesz moje przeprosiny.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;">
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
