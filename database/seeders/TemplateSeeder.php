<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Support\Arr;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Get all categories once for efficiency, using slug as the key
        $categories = Category::all()->keyBy('slug');

        // --- TEMPLATES ARRAY ---
        // Each element is a single template with all its data and translations.
        $templatesData = [

            //======================================================================
            // Category: 'work' (Бізнес і робота) - 10 templates
            //======================================================================
            [
                'category_slug' => 'work',
                'slug' => 'classic-resume-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"full_name","type":"text","required":true,"labels":{"en":"Full Name","uk":"Повне ім\'я (ПІБ)","pl":"Imię i nazwisko","de":"Vollständiger Name"}},{"name":"desired_position","type":"text","required":true,"labels":{"en":"Desired Position","uk":"Бажана посада","pl":"Oczekiwane stanowisko","de":"Gewünschte Position"}},{"name":"phone","type":"text","required":true,"labels":{"en":"Phone","uk":"Телефон","pl":"Telefon","de":"Telefon"}},{"name":"email","type":"email","required":true,"labels":{"en":"Email","uk":"Email","pl":"Email","de":"Email"}},{"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","pl":"Miasto","de":"Stadt"}},{"name":"work_experience","type":"textarea","required":true,"labels":{"en":"Work Experience","uk":"Досвід роботи","pl":"Doświadczenie zawodowe","de":"Berufserfahrung"}},{"name":"education","type":"textarea","required":true,"labels":{"en":"Education","uk":"Освіта","pl":"Edukacja","de":"Ausbildung"}}]',
                'translations' => [
                    'uk' => ['title' => 'Резюме (класичне)', 'description' => 'Універсальне класичне резюме, що підходить для більшості професій.', 'header_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; width: 100%;"><table width="100%" style="border-bottom: 2px solid #333; padding-bottom: 15px;"><tr><td style="vertical-align: top;"><h1 style="font-size: 28px; margin: 0; padding: 0; color: #1a202c;">[[full_name]]</h1><p style="font-size: 16px; margin: 5px 0 0 0; padding: 0; color: #4a5568;">[[desired_position]]</p></td><td style="vertical-align: top; text-align: right; font-size: 11px; line-height: 1.6;"><p style="margin:0; padding:0; color: #4a5568;">[[phone]]</p><p style="margin:0; padding:0; color: #4a5568;">[[email]]</p><p style="margin:0; padding:0; color: #4a5568;">[[city]]</p></td></tr></table></div>', 'body_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #2d3748;"><h2 style="font-size: 14px; font-weight: bold; color: #2d3748; background-color: #f7fafc; padding: 8px; margin-top: 20px; border-radius: 4px;">ДОСВІД РОБОТИ</h2><div style="padding-left: 8px; padding-top: 5px;">[[work_experience]]</div><h2 style="font-size: 14px; font-weight: bold; color: #2d3748; background-color: #f7fafc; padding: 8px; margin-top: 20px; border-radius: 4px;">ОСВІТА</h2><div style="padding-left: 8px; padding-top: 5px;">[[education]]</div></div>', 'footer_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; text-align: left; padding-top: 10px; margin-top: 30px; font-size: 9px; color: #a0aec0;"><p style="margin: 0; border-top: 1px solid #e2e8f0; padding-top: 10px;">Я, [[full_name]], надаю свою згоду на обробку моїх персональних даних з метою оцінки моєї кандидатури на вакантну посаду.</p></div>'],
                    'en' => ['title' => 'Resume (Classic)', 'description' => 'A universal classic resume suitable for most professions.', 'header_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; width: 100%;"><table width="100%" style="border-bottom: 2px solid #333; padding-bottom: 15px;"><tr><td style="vertical-align: top;"><h1 style="font-size: 28px; margin: 0; padding: 0; color: #1a202c;">[[full_name]]</h1><p style="font-size: 16px; margin: 5px 0 0 0; padding: 0; color: #4a5568;">[[desired_position]]</p></td><td style="vertical-align: top; text-align: right; font-size: 11px; line-height: 1.6;"><p style="margin:0; padding:0; color: #4a5568;">[[phone]]</p><p style="margin:0; padding:0; color: #4a5568;">[[email]]</p><p style="margin:0; padding:0; color: #4a5568;">[[city]]</p></td></tr></table></div>', 'body_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #2d3748;"><h2 style="font-size: 14px; font-weight: bold; color: #2d3748; background-color: #f7fafc; padding: 8px; margin-top: 20px; border-radius: 4px;">WORK EXPERIENCE</h2><div style="padding-left: 8px; padding-top: 5px;">[[work_experience]]</div><h2 style="font-size: 14px; font-weight: bold; color: #2d3748; background-color: #f7fafc; padding: 8px; margin-top: 20px; border-radius: 4px;">EDUCATION</h2><div style="padding-left: 8px; padding-top: 5px;">[[education]]</div></div>', 'footer_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; text-align: left; padding-top: 10px; margin-top: 30px; font-size: 9px; color: #a0aec0;"><p style="margin: 0; border-top: 1px solid #e2e8f0; padding-top: 10px;">I, [[full_name]], consent to the processing of my personal data for the purpose of evaluating my candidacy for the vacant position.</p></div>'],
                    'pl' => ['title' => 'CV (Klasyczne)', 'description' => 'Uniwersalne, klasyczne CV odpowiednie dla większości zawodów.'],
                    'de' => ['title' => 'Lebenslauf (Klassisch)', 'description' => 'Ein universeller, klassischer Lebenslauf, der für die meisten Berufe geeignet ist.'],
                ]
            ],
            [
                'category_slug' => 'work',
                'slug' => 'cover-letter-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"hr_manager_name","type":"text","required":false,"labels":{"en":"HR Manager\'s Name (optional)","uk":"ПІБ HR-менеджера (необов\'язково)","pl":"Imię i nazwisko HR Managera (opcjonalnie)","de":"Name des Personalmanagers (optional)"}},{"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","pl":"Nazwa firmy","de":"Firmenname"}},{"name":"company_address","type":"text","required":false,"labels":{"en":"Company Address (optional)","uk":"Адреса компанії (необов\'язково)","pl":"Adres firmy (opcjonalnie)","de":"Firmenadresse (optional)"}},{"name":"applicant_name","type":"text","required":true,"labels":{"en":"Your Full Name","uk":"Ваше повне ім\'я","pl":"Twoje imię i nazwisko","de":"Ihr vollständiger Name"}},{"name":"applicant_contacts","type":"text","required":true,"labels":{"en":"Your Contacts (Phone, Email)","uk":"Ваші контакти (Телефон, Email)","pl":"Twoje dane kontaktowe (telefon, e-mail)","de":"Ihre Kontaktdaten (Telefon, E-Mail)"}},{"name":"vacant_position","type":"text","required":true,"labels":{"en":"Position You Are Applying For","uk":"Посада, на яку претендуєте","pl":"Stanowisko, o które się ubiegasz","de":"Position, auf die Sie sich bewerben"}},{"name":"letter_body","type":"textarea","required":true,"labels":{"en":"Body of the Letter","uk":"Текст листа","pl":"Treść listu","de":"Text des Briefes"}}]',
                'translations' => [
                    'uk' => ['title' => 'Супровідний лист до резюме', 'description' => 'Документ, що доповнює резюме, де кандидат може детальніше розповісти про свою мотивацію та навички.', 'header_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; padding: 20px 80px 0 50%; text-align: left;"><p style="margin: 0; line-height: 1.5;">[[hr_manager_name]]<br>[[company_name]]<br>[[company_address]]</p></div>', 'body_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; padding: 40px 80px;"><h1 style="font-size: 20px; margin-bottom: 20px;">Шановний(а) [[hr_manager_name]],</h1><p style="text-align: justify; line-height: 1.6;">Звертаюся до Вас щодо вакансії [[vacant_position]], опублікованої на [Назва ресурсу].</p><div style="text-align: justify; line-height: 1.6; margin-top: 15px;">[[letter_body]]</div></div>', 'footer_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; padding: 40px 80px 20px 80px;"><p style="margin: 0;">З повагою,</p><p style="margin-top: 5px;">[[applicant_name]]</p><p style="margin-top: 5px;">[[applicant_contacts]]</p><p style="margin-top: 20px;">[[current_date]]</p></div>'],
                    'en' => ['title' => 'Cover Letter', 'description' => 'A document accompanying a resume where a candidate can elaborate on their motivation and skills.'],
                    'pl' => ['title' => 'List motywacyjny', 'description' => 'Dokument dołączany do CV, w którym kandydat może szczegółowo opisać swoją motywację i umiejętności.'],
                    'de' => ['title' => 'Anschreiben', 'description' => 'Ein Begleitdokument zum Lebenslauf, in dem ein Kandidat seine Motivation und Fähigkeiten näher erläutern kann.'],
                ]
            ],
            [
                'category_slug' => 'work',
                'slug' => 'annual-leave-application-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"director_position","type":"text","required":true,"labels":{"en":"Director\'s Position","uk":"Посада керівника","pl":"Stanowisko dyrektora","de":"Position des Direktors"}},{"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","pl":"Nazwa firmy","de":"Firmenname"}},{"name":"director_name","type":"text","required":true,"labels":{"en":"Director\'s Full Name (Dative)","uk":"ПІБ керівника (в давальному відмінку)","pl":"Imię i nazwisko dyrektora (w celowniku)","de":"Vollständiger Name des Direktors (im Dativ)"}},{"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee\'s Position (Genitive)","uk":"Посада працівника (в родовому відмінку)","pl":"Stanowisko pracownika (w dopełniaczu)","de":"Position des Mitarbeiters (im Genitiv)"}},{"name":"employee_name","type":"text","required":true,"labels":{"en":"Employee\'s Full Name (Genitive)","uk":"ПІБ працівника (в родовому відмінку)","pl":"Imię i nazwisko pracownika (w dopełniaczu)","de":"Vollständiger Name des Mitarbeiters (im Genitiv)"}},{"name":"start_date","type":"date","required":true,"labels":{"en":"Leave Start Date","uk":"Дата початку відпустки","pl":"Data rozpoczęcia urlopu","de":"Beginn des Urlaubs"}},{"name":"duration_days","type":"number","required":true,"labels":{"en":"Duration (calendar days)","uk":"Тривалість (календарних днів)","pl":"Czas trwania (dni kalendarzowych)","de":"Dauer (Kalendertage)"}}]',
                'translations' => [
                    'uk' => ['title' => 'Заява на щорічну основну відпустку', 'description' => 'Офіційна заява працівника на надання щорічної оплачуваної відпустки відповідно до КЗпП України.', 'header_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; padding: 20px 80px 0 50%; text-align: left;"><p style="margin: 0; line-height: 1.5;">[[director_position]]<br>[[company_name]]<br>[[director_name]]</p><p style="margin: 20px 0 0 0; line-height: 1.5;">[[employee_position]]<br>[[employee_name]]</p></div>', 'body_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; text-align: center; padding: 40px 0;"><h1 style="font-size: 24px; margin-bottom: 40px; font-weight: bold;">ЗАЯВА</h1><p style="text-align: justify; line-height: 1.6; padding: 0 80px;">Прошу надати мені щорічну основну відпустку з [[start_date]] року тривалістю [[duration_days]] календарних днів.</p></div>', 'footer_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; padding: 80px 80px 20px 80px;"><table width="100%"><tr><td>[[current_date]]</td><td style="text-align: right;">______________ (підпис)</td></tr></table></div>'],
                    'en' => ['title' => 'Application for Annual Paid Leave', 'description' => 'Official employee application for annual paid leave.'],
                    'pl' => ['title' => 'Wniosek o urlop wypoczynkowy', 'description' => 'Formalny wniosek pracownika o udzielenie corocznego płatnego urlopu wypoczynkowego.'],
                    'de' => ['title' => 'Antrag auf bezahlten Jahresurlaub', 'description' => 'Offizieller Antrag eines Mitarbeiters auf bezahlten Jahresurlaub.'],
                ]
            ],
            [
                'category_slug' => 'work',
                'slug' => 'resignation-letter-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"director_position","type":"text","required":true,"labels":{"en":"Director\'s Position","uk":"Посада керівника","pl":"Stanowisko dyrektora","de":"Position des Direktors"}},{"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","pl":"Nazwa firmy","de":"Firmenname"}},{"name":"director_name","type":"text","required":true,"labels":{"en":"Director\'s Full Name (Dative)","uk":"ПІБ керівника (в давальному відмінку)","pl":"Imię i nazwisko dyrektora (w celowniku)","de":"Vollständiger Name des Direktors (im Dativ)"}},{"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee\'s Position (Genitive)","uk":"Посада працівника (в родовому відмінку)","pl":"Stanowisko pracownika (w dopełniaczu)","de":"Position des Mitarbeiters (im Genitiv)"}},{"name":"employee_name","type":"text","required":true,"labels":{"en":"Employee\'s Full Name (Genitive)","uk":"ПІБ працівника (в родовому відмінку)","pl":"Imię i nazwisko pracownika (w dopełniaczu)","de":"Vollständiger Name des Mitarbeiters (im Genitiv)"}},{"name":"resignation_date","type":"date","required":true,"labels":{"en":"Desired Date of Resignation","uk":"Бажана дата звільнення","pl":"Pożądana data rezygnacji","de":"Gewünschtes Kündigungsdatum"}}]',
                'translations' => [
                    'uk' => ['title' => 'Заява на звільнення за власним бажанням', 'description' => 'Офіційна заява про розірвання трудового договору з ініціативи працівника.', 'header_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; padding: 20px 80px 0 50%; text-align: left;"><p style="margin: 0; line-height: 1.5;">[[director_position]]<br>[[company_name]]<br>[[director_name]]</p><p style="margin: 20px 0 0 0; line-height: 1.5;">[[employee_position]]<br>[[employee_name]]</p></div>', 'body_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; text-align: center; padding: 40px 0;"><h1 style="font-size: 24px; margin-bottom: 40px; font-weight: bold;">ЗАЯВА</h1><p style="text-align: justify; line-height: 1.6; padding: 0 80px;">Прошу звільнити мене з займаної посади за власним бажанням з [[resignation_date]] року.</p></div>', 'footer_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; padding: 80px 80px 20px 80px;"><table width="100%"><tr><td>[[current_date]]</td><td style="text-align: right;">______________ (підпис)</td></tr></table></div>'],
                    'en' => ['title' => 'Resignation Letter', 'description' => 'Official statement of termination of the employment contract at the initiative of the employee.'],
                    'pl' => ['title' => 'Wypowiedzenie umowy o pracę', 'description' => 'Oficjalne oświadczenie o rozwiązaniu umowy o pracę z inicjatywy pracownika.'],
                    'de' => ['title' => 'Kündigungsschreiben', 'description' => 'Offizielle Erklärung zur Beendigung des Arbeitsvertrags auf Initiative des Arbeitnehmers.'],
                ]
            ],
            [
                'category_slug' => 'work',
                'slug' => 'nda-agreement-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","pl":"Miasto","de":"Stadt"}},{"name":"party_one_name","type":"text","required":true,"labels":{"en":"Disclosing Party Name","uk":"Назва Сторони, що розкриває інформацію","pl":"Nazwa Strony ujawniającej","de":"Name der offenlegenden Partei"}},{"name":"party_two_name","type":"text","required":true,"labels":{"en":"Receiving Party Name","uk":"Назва Сторони, що отримує інформацію","pl":"Nazwa Strony otrzymującej","de":"Name der empfangenden Partei"}},{"name":"confidential_info_description","type":"textarea","required":true,"labels":{"en":"Description of Confidential Information","uk":"Опис конфіденційної інформації","pl":"Opis informacji poufnych","de":"Beschreibung der vertraulichen Informationen"}}]',
                'translations' => [
                    'uk' => ['title' => 'Договір про нерозголошення (NDA)', 'description' => 'Юридична угода, що зобов\'язує сторони зберігати певну інформацію в таємниці.'],
                    'en' => ['title' => 'Non-Disclosure Agreement (NDA)', 'description' => 'A legal agreement that obliges parties to keep certain information confidential.'],
                    'pl' => ['title' => 'Umowa o zachowaniu poufności (NDA)', 'description' => 'Umowa prawna zobowiązująca strony do zachowania określonych informacji w tajemnicy.'],
                    'de' => ['title' => 'Geheimhaltungsvereinbarung (NDA)', 'description' => 'Eine rechtliche Vereinbarung, die die Parteien zur Geheimhaltung bestimmter Informationen verpflichtet.'],
                ]
            ],
            [
                'category_slug' => 'work',
                'slug' => 'invoice-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"invoice_number","type":"text","required":true,"labels":{"en":"Invoice #","uk":"Рахунок №","pl":"Faktura nr","de":"Rechnung Nr."}},{"name":"client_name","type":"text","required":true,"labels":{"en":"Client Name","uk":"ПІБ/Назва клієнта","pl":"Imię i nazwisko/Nazwa klienta","de":"Kundenname"}},{"name":"client_address","type":"text","required":true,"labels":{"en":"Client Address","uk":"Адреса клієнта","pl":"Adres klienta","de":"Kundenadresse"}},{"name":"service_description","type":"textarea","required":true,"labels":{"en":"Service/Product Description","uk":"Опис послуги/товару","pl":"Opis usługi/produktu","de":"Beschreibung der Dienstleistung/des Produkts"}},{"name":"quantity","type":"number","required":true,"labels":{"en":"Quantity","uk":"Кількість","pl":"Ilość","de":"Menge"}},{"name":"unit_price","type":"number","required":true,"labels":{"en":"Unit Price","uk":"Ціна за одиницю","pl":"Cena jednostkowa","de":"Stückpreis"}},{"name":"total_amount","type":"number","required":true,"labels":{"en":"Total Amount","uk":"Загальна сума","pl":"Kwota całkowita","de":"Gesamtbetrag"}}]',
                'translations' => [
                    'uk' => ['title' => 'Рахунок на оплату (Інвойс)', 'description' => 'Документ, що надається продавцем покупцю для оплати товарів або послуг.'],
                    'en' => ['title' => 'Invoice', 'description' => 'A document provided by a seller to a buyer for payment of goods or services.'],
                    'pl' => ['title' => 'Faktura', 'description' => 'Dokument dostarczany przez sprzedawcę kupującemu w celu zapłaty za towary lub usługi.'],
                    'de' => ['title' => 'Rechnung', 'description' => 'Ein Dokument, das ein Verkäufer einem Käufer zur Bezahlung von Waren oder Dienstleistungen zur Verfügung stellt.'],
                ]
            ],
            [
                'category_slug' => 'work',
                'slug' => 'acceptance-act-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"act_number","type":"text","required":true,"labels":{"en":"Act #","uk":"Акт №","pl":"Protokół nr","de":"Protokoll Nr."}},{"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","pl":"Miasto","de":"Stadt"}},{"name":"contractor_name","type":"text","required":true,"labels":{"en":"Contractor Name","uk":"Назва/ПІБ Виконавця","pl":"Nazwa/Imię i nazwisko Wykonawcy","de":"Name des Auftragnehmers"}},{"name":"customer_name","type":"text","required":true,"labels":{"en":"Customer Name","uk":"Назва/ПІБ Замовника","pl":"Nazwa/Imię i nazwisko Klienta","de":"Name des Kunden"}},{"name":"service_description","type":"textarea","required":true,"labels":{"en":"Description of Performed Works/Services","uk":"Опис виконаних робіт/наданих послуг","pl":"Opis wykonanych prac/świadczonych usług","de":"Beschreibung der ausgeführten Arbeiten/erbrachten Dienstleistungen"}},{"name":"total_amount","type":"number","required":true,"labels":{"en":"Total Amount (UAH)","uk":"Загальна вартість (грн)","pl":"Całkowita kwota (UAH)","de":"Gesamtbetrag (UAH)"}}]',
                'translations' => [
                    'uk' => ['title' => 'Акт виконаних робіт / наданих послуг', 'description' => 'Документ, що підтверджує факт виконання робіт або надання послуг і відсутність претензій у сторін.'],
                    'en' => ['title' => 'Act of Acceptance', 'description' => 'A document confirming the completion of work or provision of services and the absence of claims from the parties.'],
                    'pl' => ['title' => 'Protokół zdawczo-odbiorczy', 'description' => 'Dokument potwierdzający wykonanie prac lub świadczenie usług oraz brak roszczeń ze strony stron.'],
                    'de' => ['title' => 'Abnahmeprotokoll', 'description' => 'Ein Dokument, das die Fertigstellung von Arbeiten oder die Erbringung von Dienstleistungen und das Fehlen von Ansprüchen der Parteien bestätigt.'],
                ]
            ],
            [
                'category_slug' => 'work',
                'slug' => 'commercial-proposal-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"recipient_company","type":"text","required":true,"labels":{"en":"Recipient Company","uk":"Компанія-отримувач","pl":"Firma odbiorcy","de":"Empfängerfirma"}},{"name":"recipient_contact_person","type":"text","required":true,"labels":{"en":"Contact Person","uk":"Контактна особа","pl":"Osoba kontaktowa","de":"Ansprechpartner"}},{"name":"sender_company","type":"text","required":true,"labels":{"en":"Your Company","uk":"Ваша компанія","pl":"Twoja firma","de":"Ihre Firma"}},{"name":"sender_contact_details","type":"text","required":true,"labels":{"en":"Your Contact Details (Phone, Email)","uk":"Ваші контактні дані (Телефон, Email)","pl":"Twoje dane kontaktowe (telefon, e-mail)","de":"Ihre Kontaktdaten (Telefon, E-Mail)"}},{"name":"proposal_body","type":"textarea","required":true,"labels":{"en":"Body of the Proposal","uk":"Тіло пропозиції","pl":"Treść oferty","de":"Text des Angebots"}}]',
                'translations' => [
                    'uk' => ['title' => 'Комерційна пропозиція', 'description' => 'Структурований шаблон для створення комерційних пропозицій для потенційних клієнтів або партнерів.'],
                    'en' => ['title' => 'Commercial Proposal', 'description' => 'A structured template for creating commercial proposals for potential clients or partners.'],
                    'pl' => ['title' => 'Oferta handlowa', 'description' => 'Ustrukturyzowany szablon do tworzenia ofert handlowych dla potencjalnych klientów lub partnerów.'],
                    'de' => ['title' => 'Kommerzielles Angebot', 'description' => 'Eine strukturierte Vorlage zur Erstellung von kommerziellen Angeboten für potenzielle Kunden oder Partner.'],
                ]
            ],
            [
                'category_slug' => 'work',
                'slug' => 'privacy-policy-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"company_name","type":"text","required":true,"labels":{"en":"Company/Website Name","uk":"Назва компанії / сайту","pl":"Nazwa firmy / strony internetowej","de":"Name des Unternehmens / der Website"}},{"name":"company_address","type":"text","required":true,"labels":{"en":"Company Address","uk":"Адреса компанії","pl":"Adres firmy","de":"Firmenadresse"}},{"name":"contact_email","type":"email","required":true,"labels":{"en":"Contact Email","uk":"Контактний Email","pl":"Kontaktowy adres e-mail","de":"Kontakt-E-Mail"}}]',
                'translations' => [
                    'uk' => ['title' => 'Політика конфіденційності', 'description' => 'Юридичний документ, що пояснює, як сайт або компанія збирає, використовує та захищає персональні дані користувачів.', 'header_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; text-align: center;"><h1 style="font-size: 20px;">ПОЛІТИКА КОНФІДЕНЦІЙНОСТІ</h1><p>Редакція від [[current_date]]</p></div>', 'body_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; text-align: justify; line-height: 1.5; font-size: 12px;"><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">1. Загальні положення</h2><p>1.1. Ця Політика конфіденційності описує порядок збору, обробки та захисту персональних даних користувачів сайту/сервісу <strong>[[company_name]]</strong> (далі – Компанія).</p><p>1.2. Володільцем персональних даних є <strong>[[company_name]]</strong>, що знаходиться за адресою: [[company_address]].</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">2. Які дані ми збираємо</h2><p>2.1. Ми можемо збирати такі категорії персональних даних: ідентифікаційні дані (ПІБ, контактний телефон, адреса електронної пошти), технічні дані (IP-адреса, файли cookie) та інші дані, які ви добровільно надаєте.</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">3. Мета обробки персональних даних</h2><p>3.1. Ваші дані обробляються з метою надання вам доступу до послуг сайту, обробки ваших запитів, інформування про нові продукти та послуги, а також для покращення роботи нашого сервісу.</p><h2 style="font-size: 14px; font-weight: bold; margin-top: 15px;">4. Права суб\'єкта персональних даних</h2><p>4.1. Відповідно до Закону України "Про захист персональних даних", ви маєте право на доступ до своїх даних, їх виправлення, видалення, а також відкликання згоди на їх обробку.</p></div>', 'footer_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; margin-top: 40px; font-size: 12px;"><p>З усіх питань, пов\'язаних з обробкою ваших персональних даних, ви можете звертатися за адресою електронної пошти: [[contact_email]].</p></div>'],
                    'en' => ['title' => 'Privacy Policy', 'description' => 'A legal document that explains how a website or company collects, uses, and protects users\' personal data.'],
                    'pl' => ['title' => 'Polityka prywatności', 'description' => 'Dokument prawny wyjaśniający, w jaki sposób witryna internetowa lub firma gromadzi, wykorzystuje i chroni dane osobowe użytkowników.'],
                    'de' => ['title' => 'Datenschutzerklärung', 'description' => 'Ein Rechtsdokument, das erklärt, wie eine Website oder ein Unternehmen personenbezogene Daten von Nutzern sammelt, verwendet und schützt.'],
                ]
            ],
            [
                'category_slug' => 'work',
                'slug' => 'power-of-attorney-tmc-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","pl":"Miasto","de":"Stadt"}},{"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва підприємства","pl":"Nazwa firmy","de":"Firmenname"}},{"name":"representative_name","type":"text","required":true,"labels":{"en":"Representative\'s Full Name","uk":"ПІБ представника","pl":"Imię i nazwisko przedstawiciela","de":"Vollständiger Name des Vertreters"}},{"name":"representative_passport","type":"text","required":true,"labels":{"en":"Representative\'s Passport Details","uk":"Паспортні дані представника","pl":"Dane paszportowe przedstawiciela","de":"Passdaten des Vertreters"}},{"name":"supplier_name","type":"text","required":true,"labels":{"en":"Supplier Name","uk":"Назва постачальника","pl":"Nazwa dostawcy","de":"Name des Lieferanten"}},{"name":"document_basis","type":"text","required":true,"labels":{"en":"Basis Document (e.g., Invoice #)","uk":"Документ-підстава (напр., Рахунок №)","pl":"Dokument podstawowy (np. faktura nr)","de":"Basisdokument (z. B. Rechnungsnummer)"}}]',
                'translations' => [
                    'uk' => ['title' => 'Довіреність на отримання ТМЦ', 'description' => 'Документ, що уповноважує особу отримати товарно-матеріальні цінності від імені підприємства.'],
                    'en' => ['title' => 'Power of Attorney for Goods Receipt', 'description' => 'A document authorizing a person to receive goods and materials on behalf of a company.'],
                    'pl' => ['title' => 'Pełnomocnictwo do odbioru towarów', 'description' => 'Dokument upoważniający osobę do odbioru towarów i materiałów w imieniu firmy.'],
                    'de' => ['title' => 'Vollmacht zum Warenempfang', 'description' => 'Ein Dokument, das eine Person ermächtigt, Waren und Materialien im Namen eines Unternehmens entgegenzunehmen.'],
                ]
            ],

            //======================================================================
            // Категория: 'housing-issues' (Нерухомість) - 10 шаблонов
            //======================================================================
            [
                'category_slug' => 'housing-issues',
                'slug' => 'long-term-apartment-lease-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","pl":"Miasto","de":"Stadt"}},{"name":"landlord_name","type":"text","required":true,"labels":{"en":"Landlord\'s Full Name","uk":"ПІБ Орендодавця","pl":"Imię i nazwisko Wynajmującego","de":"Vollständiger Name des Vermieters"}},{"name":"landlord_id","type":"text","required":true,"labels":{"en":"Landlord\'s ID/Passport","uk":"Паспортні дані Орендодавця","pl":"Dane dowodu osobistego Wynajmującego","de":"Ausweisdaten des Vermieters"}},{"name":"tenant_name","type":"text","required":true,"labels":{"en":"Tenant\'s Full Name","uk":"ПІБ Орендаря","pl":"Imię i nazwisko Najemcy","de":"Vollständiger Name des Mieters"}},{"name":"tenant_id","type":"text","required":true,"labels":{"en":"Tenant\'s ID/Passport","uk":"Паспортні дані Орендаря","pl":"Dane dowodu osobistego Najemcy","de":"Ausweisdaten des Mieters"}},{"name":"property_address","type":"text","required":true,"labels":{"en":"Property Address","uk":"Адреса квартири","pl":"Adres nieruchomości","de":"Adresse der Immobilie"}},{"name":"rent_amount","type":"number","required":true,"labels":{"en":"Monthly Rent (UAH)","uk":"Місячна орендна плата (грн)","pl":"Miesięczny czynsz (UAH)","de":"Monatliche Miete (UAH)"}},{"name":"lease_term_months","type":"number","required":true,"labels":{"en":"Lease Term (months)","uk":"Термін оренди (місяців)","pl":"Okres najmu (miesiące)","de":"Mietdauer (Monate)"}}]',
                'translations' => [
                    'uk' => ['title' => 'Договір оренди квартири (довгостроковий)', 'description' => 'Юридично грамотний договір для довгострокової оренди житла, що захищає права сторін.', 'header_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; text-align: center;"><h1 style="font-size: 20px;">ДОГОВІР ОРЕНДИ КВАРТИРИ</h1></div><table width="100%" style="font-family: DejaVu Sans, Arial, sans-serif;"><tr><td>м. [[city]]</td><td style="text-align: right;">[[current_date]] р.</td></tr></table>', 'body_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; text-align: justify; line-height: 1.5; font-size: 12px;"><p>Орендодавець, <strong>[[landlord_name]]</strong> (паспорт: [[landlord_id]]), та Орендар, <strong>[[tenant_name]]</strong> (паспорт: [[tenant_id]]), уклали цей Договір про наступне:</p><h2 style="font-size: 14px; text-align: center; font-weight: bold; margin-top: 15px;">1. ПРЕДМЕТ ДОГОВОРУ</h2><p>1.1. Орендодавець передає, а Орендар приймає у тимчасове платне користування квартиру за адресою: <strong>[[property_address]]</strong>.</p><h2 style="font-size: 14px; text-align: center; font-weight: bold; margin-top: 15px;">2. ОРЕНДНА ПЛАТА</h2><p>2.1. Розмір місячної орендної плати становить <strong>[[rent_amount]]</strong> гривень.</p><h2 style="font-size: 14px; text-align: center; font-weight: bold; margin-top: 15px;">3. ТЕРМІН ДІЇ</h2><p>3.1. Термін оренди становить <strong>[[lease_term_months]]</strong> місяців.</p></div>', 'footer_html' => '<div style="font-family: DejaVu Sans, Arial, sans-serif; margin-top: 40px; font-size: 12px;"><h2 style="font-size: 14px; text-align: center; font-weight: bold;">РЕКВІЗИТИ ТА ПІДПИСИ СТОРІН</h2><table width="100%" style="margin-top: 20px;"><tr><td width="50%" style="vertical-align: top;"><strong>ОРЕНДОДАВЕЦЬ:</strong><br><br>[[landlord_name]]<br><br>___________________</td><td width="50%" style="vertical-align: top;"><strong>ОРЕНДАР:</strong><br><br>[[tenant_name]]<br><br>___________________</td></tr></table></div>'],
                    'en' => ['title' => 'Apartment Lease Agreement (Long-Term)', 'description' => 'A legally sound agreement for a long-term residential lease that protects the rights of the parties.'],
                    'pl' => ['title' => 'Umowa najmu mieszkania (długoterminowa)', 'description' => 'Prawnie wiążąca umowa długoterminowego najmu lokalu mieszkalnego, chroniąca prawa stron.'],
                    'de' => ['title' => 'Wohnungsmietvertrag (langfristig)', 'description' => 'Ein rechtsgültiger Vertrag für die langfristige Vermietung von Wohnraum, der die Rechte der Parteien schützt.'],
                ]
            ],
            // ... (еще 9 шаблонов для категории 'housing-issues')

            //======================================================================
            // Категория: 'school-education' (Освіта) - 10 шаблонов
            //======================================================================
            [
                'category_slug' => 'school-education',
                'slug' => 'school-enrollment-application-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"director_name","type":"text","required":true,"labels":{"en":"School Director\'s Full Name (dative)","uk":"Директору школи (в дав. відмінку)","pl":"Dyrektor szkoły (celownik)","de":"Schulleiter (im Dativ)"}},{"name":"school_name","type":"text","required":true,"labels":{"en":"School Name","uk":"Назва школи","pl":"Nazwa szkoły","de":"Name der Schule"}},{"name":"parent_name","type":"text","required":true,"labels":{"en":"Parent\'s Full Name (genitive)","uk":"ПІБ одного з батьків (в род. відмінку)","pl":"Imię i nazwisko rodzica (dopełniacz)","de":"Vollständiger Name eines Elternteils (im Genitiv)"}},{"name":"child_name","type":"text","required":true,"labels":{"en":"Child\'s Full Name","uk":"ПІБ дитини","pl":"Imię i nazwisko dziecka","de":"Vollständiger Name des Kindes"}},{"name":"child_birth_date","type":"date","required":true,"labels":{"en":"Child\'s Date of Birth","uk":"Дата народження дитини","pl":"Data urodzenia dziecka","de":"Geburtsdatum des Kindes"}},{"name":"target_class","type":"text","required":true,"labels":{"en":"Target Class","uk":"Клас, до якого просите зарахувати","pl":"Klasa docelowa","de":"Zielklasse"}}]',
                'translations' => [
                    'uk' => ['title' => 'Заява про прийом дитини до школи', 'description' => 'Офіційна заява від батьків про зарахування дитини до першого або іншого класу навчального закладу.'],
                    'en' => ['title' => 'School Enrollment Application', 'description' => 'Official application from parents to enroll a child in the first or another grade of an educational institution.'],
                    'pl' => ['title' => 'Wniosek o przyjęcie dziecka do szkoły', 'description' => 'Oficjalny wniosek od rodziców o przyjęcie dziecka do pierwszej lub innej klasy placówki oświatowej.'],
                    'de' => ['title' => 'Antrag auf Einschulung', 'description' => 'Offizieller Antrag von Eltern auf Einschulung eines Kindes in die erste oder eine andere Klasse einer Bildungseinrichtung.'],
                ]
            ],
            // ... (еще 9 шаблонов для категории 'school-education')

            //======================================================================
            // Категория: 'legal-claims' (Юридичні документи) - 10 шаблонов
            //======================================================================
            [
                'category_slug' => 'legal-claims',
                'slug' => 'debt-receipt-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","pl":"Miasto","de":"Stadt"}},{"name":"recipient_name","type":"text","required":true,"labels":{"en":"Recipient\'s Full Name","uk":"ПІБ отримувача","pl":"Imię i nazwisko odbiorcy","de":"Vollständiger Name des Empfängers"}},{"name":"recipient_id","type":"text","required":true,"labels":{"en":"Recipient\'s ID/Passport","uk":"Паспортні дані отримувача","pl":"Dane dowodu osobistego odbiorcy","de":"Ausweisdaten des Empfängers"}},{"name":"giver_name","type":"text","required":true,"labels":{"en":"Giver\'s Full Name","uk":"ПІБ позикодавця","pl":"Imię i nazwisko pożyczkodawcy","de":"Vollständiger Name des Gebers"}},{"name":"amount_number","type":"number","required":true,"labels":{"en":"Amount (in numbers)","uk":"Сума (цифрами)","pl":"Kwota (cyframi)","de":"Betrag (in Zahlen)"}},{"name":"amount_words","type":"text","required":true,"labels":{"en":"Amount (in words)","uk":"Сума (прописом)","pl":"Kwota (słownie)","de":"Betrag (in Worten)"}},{"name":"return_date","type":"date","required":true,"labels":{"en":"Repayment Date","uk":"Дата повернення коштів","pl":"Data zwrotu","de":"Rückzahlungsdatum"}}]',
                'translations' => [
                    'uk' => ['title' => 'Розписка про отримання грошових коштів', 'description' => 'Документ, що підтверджує факт отримання грошей в борг та зобов\'язання їх повернути у визначений термін.'],
                    'en' => ['title' => 'Debt Receipt', 'description' => 'A document confirming the receipt of money as a loan and the obligation to repay it by a specified date.'],
                    'pl' => ['title' => 'Pokwitowanie odbioru długu', 'description' => 'Dokument potwierdzający otrzymanie pieniędzy jako pożyczki i zobowiązanie do jej zwrotu w określonym terminie.'],
                    'de' => ['title' => 'Schuldschein', 'description' => 'Ein Dokument, das den Erhalt von Geld als Darlehen und die Verpflichtung zur Rückzahlung bis zu einem bestimmten Datum bestätigt.'],
                ]
            ],
            // ... (еще 9 шаблонов для категории 'legal-claims')

            //======================================================================
            // Категория: 'government-agencies' (Державні установи) - 10 шаблонов
            //======================================================================
            [
                'category_slug' => 'government-agencies',
                'slug' => 'public-information-request-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"authority_full_name","type":"text","required":true,"labels":{"en":"Full Name of Authority/Official (dative)","uk":"Повна назва органу/посадової особи (в дав. відмінку)","pl":"Pełna nazwa organu/urzędnika (celownik)","de":"Vollständiger Name der Behörde/des Beamten (im Dativ)"}},{"name":"requester_full_name","type":"text","required":true,"labels":{"en":"Requester\'s Full Name (genitive)","uk":"ПІБ запитувача (в род. відмінку)","pl":"Imię i nazwisko wnioskodawcy (dopełniacz)","de":"Vollständiger Name des Antragstellers (im Genitiv)"}},{"name":"requester_address","type":"text","required":true,"labels":{"en":"Address for reply","uk":"Адреса для відповіді","pl":"Adres do odpowiedzi","de":"Antwortadresse"}},{"name":"requester_email","type":"email","required":true,"labels":{"en":"Email for reply","uk":"Email для відповіді","pl":"Email do odpowiedzi","de":"Antwort-E-Mail"}},{"name":"information_details","type":"textarea","required":true,"labels":{"en":"Detailed description of the requested information","uk":"Детальний опис інформації, що запитується","pl":"Szczegółowy opis żądanej informacji","de":"Detaillierte Beschreibung der angeforderten Informationen"}}]',
                'translations' => [
                    'uk' => ['title' => 'Запит на отримання публічної інформації', 'description' => 'Форма для звернення до органів державної влади для отримання інформації, що становить суспільний інтерес.'],
                    'en' => ['title' => 'Request for Public Information', 'description' => 'A form for appealing to public authorities to obtain information of public interest.'],
                    'pl' => ['title' => 'Wniosek o udostępnienie informacji publicznej', 'description' => 'Formularz do zwracania się do organów publicznych w celu uzyskania informacji publicznej.'],
                    'de' => ['title' => 'Antrag auf öffentliche Informationen', 'description' => 'Ein Formular zur Beantragung von Informationen von öffentlichem Interesse bei Behörden.'],
                ]
            ],
            // ... (еще 9 шаблонов для категории 'government-agencies')

            //======================================================================
            // Категория: 'medicine' (Медицина) - 10 шаблонов
            //======================================================================
            [
                'category_slug' => 'medicine',
                'slug' => 'medical-records-request-ua',
                'country_code' => 'UA',
                'fields' => '[{"name":"clinic_name","type":"text","required":true,"labels":{"en":"Medical Facility Name","uk":"Назва медичного закладу","pl":"Nazwa placówki medycznej","de":"Name der medizinischen Einrichtung"}},{"name":"clinic_head_name","type":"text","required":true,"labels":{"en":"Head Doctor\'s Full Name (dative)","uk":"ПІБ головного лікаря (в дав. відмінку)","pl":"Imię i nazwisko lekarza naczelnego (celownik)","de":"Vollständiger Name des Chefarztes (im Dativ)"}},{"name":"patient_full_name","type":"text","required":true,"labels":{"en":"Patient\'s Full Name (genitive)","uk":"ПІБ пацієнта (в род. відмінку)","pl":"Imię i nazwisko pacjenta (dopełniacz)","de":"Vollständiger Name des Patienten (im Genitiv)"}},{"name":"patient_birth_date","type":"date","required":true,"labels":{"en":"Patient\'s Date of Birth","uk":"Дата народження пацієнта","pl":"Data urodzenia pacjenta","de":"Geburtsdatum des Patienten"}},{"name":"patient_address","type":"text","required":true,"labels":{"en":"Patient\'s Address","uk":"Адреса пацієнта","pl":"Adres pacjenta","de":"Adresse des Patienten"}},{"name":"period_start_date","type":"date","required":true,"labels":{"en":"Period Start Date","uk":"Дата початку періоду","pl":"Data rozpoczęcia okresu","de":"Anfangsdatum des Zeitraums"}},{"name":"period_end_date","type":"date","required":true,"labels":{"en":"Period End Date","uk":"Дата закінчення періоду","pl":"Data zakończenia okresu","de":"Enddatum des Zeitraums"}}]',
                'translations' => [
                    'uk' => ['title' => 'Запит на отримання медичної документації', 'description' => 'Офіційний запит до медичного закладу про надання копій медичної документації пацієнта.'],
                    'en' => ['title' => 'Request for Medical Records', 'description' => 'A formal request to a medical facility for copies of a patient\'s medical records.'],
                    'pl' => ['title' => 'Wniosek o udostępnienie dokumentacji medycznej', 'description' => 'Formalny wniosek do placówki medycznej o udostępnienie kopii dokumentacji medycznej pacjenta.'],
                    'de' => ['title' => 'Antrag auf Aushändigung von Krankenunterlagen', 'description' => 'Ein formeller Antrag an eine medizinische Einrichtung auf Aushändigung von Kopien der Krankenunterlagen eines Patienten.'],
                ]
            ],
            // ... (еще 9 шаблонов для категории 'medicine')
        ];

        // --- ЦИКЛ СОЗДАНИЯ ШАБЛОНОВ ---
        foreach ($templatesData as $templateData) {
            if (isset($categories[$templateData['category_slug']])) {
                $categoryId = $categories[$templateData['category_slug']]->id;

                $template = Template::updateOrCreate(
                    ['slug' => $templateData['slug']],
                    [
                        'category_id' => $categoryId,
                        'is_active' => $templateData['is_active'] ?? true,
                        'country_code' => $templateData['country_code'] ?? null,
                        'fields' => json_decode($templateData['fields'], true),
                    ]
                );

                if (isset($templateData['translations']) && is_array($templateData['translations'])) {
                    foreach ($templateData['translations'] as $locale => $data) {
                        $template->translations()->updateOrCreate(
                            ['locale' => $locale],
                            $data
                        );
                    }
                }
            }
        }
    }
}
