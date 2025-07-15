<?php

namespace Database\Seeders\PL;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class PlWorkSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'work-pl')->first();
        if (!$category) {
            $this->command->error('Category with slug "work-pl" not found.');
            return;
        }

        $templatesData = [
            // --- 1. Резюме (классическое) / Resume (Classic) ---
            [
                'slug' => 'resume-classic-pl',
                'fields' => '[
                    {"name":"full_name","type":"text","required":true,"labels":{"pl":"Imię i Nazwisko","en":"Full Name","uk":"Ім\'я та Прізвище","de":"Vollständiger Name"}},
                    {"name":"position","type":"text","required":true,"labels":{"pl":"Stanowisko, na które aplikujesz","en":"Position Applied For","uk":"Посада, на яку претендуєте","de":"Angestrebte Position"}},
                    {"name":"phone","type":"text","required":true,"labels":{"pl":"Telefon","en":"Phone","uk":"Телефон","de":"Telefon"}},
                    {"name":"email","type":"email","required":true,"labels":{"pl":"E-mail","en":"Email","uk":"E-mail","de":"E-Mail"}},
                    {"name":"linkedin","type":"text","required":false,"labels":{"pl":"Profil LinkedIn (link)","en":"LinkedIn Profile (link)","uk":"Профіль LinkedIn (посилання)","de":"LinkedIn-Profil (Link)"}},
                    {"name":"summary","type":"textarea","required":true,"labels":{"pl":"Podsumowanie zawodowe","en":"Professional Summary","uk":"Професійне резюме","de":"Berufliches Profil"}},
                    {"name":"experience","type":"textarea","required":true,"labels":{"pl":"Doświadczenie zawodowe (Firma, Stanowisko, Okres, Obowiązki)","en":"Work Experience (Company, Position, Period, Responsibilities)","uk":"Досвід роботи (Компанія, Посада, Період, Обов\'язки)","de":"Berufserfahrung (Firma, Position, Zeitraum, Aufgaben)"}},
                    {"name":"education","type":"textarea","required":true,"labels":{"pl":"Wykształcenie (Uczelnia, Kierunek, Lata)","en":"Education (University, Field of Study, Years)","uk":"Освіта (Навчальний заклад, Спеціальність, Роки)","de":"Ausbildung (Universität, Studienfach, Jahre)"}},
                    {"name":"skills","type":"textarea","required":true,"labels":{"pl":"Umiejętności (np. języki, technologie)","en":"Skills (e.g., languages, technologies)","uk":"Навички (напр., мови, технології)","de":"Fähigkeiten (z.B. Sprachen, Technologien)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Życiorys (klasyczny)',
                        'description' => 'Standardowy, uniwersalny format życiorysu, odpowiedni dla większości ofert pracy w Polsce, zawierający klauzulę RODO.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 16px; margin-bottom: 15px;">[[position]]</p>
                                <p style="font-size: 12px;">Tel: [[phone]] | E-mail: [[email]] | LinkedIn: [[linkedin]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">PODSUMOWANIE ZAWODOWE</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">DOŚWIADCZENIE ZAWODOWE</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">WYKSZTAŁCENIE</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">UMIEJĘTNOŚCI</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Wyrażam zgodę na przetwarzanie moich danych osobowych dla potrzeb niezbędnych do realizacji procesu rekrutacji (zgodnie z ustawą z dnia 10 maja 2018 roku o ochronie danych osobowych (Dz. Ustaw z 2018, poz. 1000) oraz zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (RODO)).</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Resume (Classic)',
                        'description' => 'A standard, universal resume format, suitable for most job offers in Poland, including the GDPR clause.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 16px; margin-bottom: 15px;">[[position]]</p>
                                <p style="font-size: 12px;">Tel: [[phone]] | E-mail: [[email]] | LinkedIn: [[linkedin]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">PROFESSIONAL SUMMARY</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">WORK EXPERIENCE</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">EDUCATION</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">SKILLS</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>I hereby give consent for my personal data to be processed for the purposes necessary to carry out the recruitment process (in accordance with the Act of May 10, 2018, on the Protection of Personal Data (Journal of Laws 2018, item 1000) and in accordance with Regulation (EU) 2016/679 of the European Parliament and of the Council of April 27, 2016, on the protection of natural persons with regard to the processing of personal data and on the free movement of such data, and repealing Directive 95/46/EC (GDPR)).</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Резюме (класичне)',
                        'description' => 'Стандартний, універсальний формат резюме, підходить для більшості пропозицій роботи в Польщі, містить положення GDPR.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 16px; margin-bottom: 15px;">[[position]]</p>
                                <p style="font-size: 12px;">Тел: [[phone]] | E-mail: [[email]] | LinkedIn: [[linkedin]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">ПРОФЕСІЙНЕ РЕЗЮМЕ</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">ДОСВІД РОБОТИ</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">ОСВІТА</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">НАВИЧКИ</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Я даю згоду на обробку моїх персональних даних для потреб, необхідних для реалізації процесу рекрутації (відповідно до Закону від 10 травня 2018 року про захист персональних даних (Відомості законів від 2018 р., поз. 1000) та відповідно до Регламенту (ЄС) 2016/679 Європейського парламенту та Ради від 27 квітня 2016 р. про захист фізичних осіб у зв\'язку з обробкою персональних даних та про вільне переміщення таких даних, а також про скасування директиви 95/46/ЄС (GDPR)).</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Lebenslauf (klassisch)',
                        'description' => 'Ein Standard-Universal-Lebenslaufformat, das für die meisten Stellenangebote in Polen geeignet ist, einschließlich der DSGVO-Klausel.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 16px; margin-bottom: 15px;">[[position]]</p>
                                <p style="font-size: 12px;">Tel: [[phone]] | E-Mail: [[email]] | LinkedIn: [[linkedin]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">BERUFLICHES PROFIL</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">BERUFSERFAHRUNG</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">AUSBILDUNG</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">FÄHIGKEITEN</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Ich willige hiermit in die Verarbeitung meiner personenbezogenen Daten zum Zwecke der Durchführung des Rekrutierungsprozesses ein (gemäß dem Gesetz vom 10. Mai 2018 über den Schutz personenbezogener Daten (Gesetzblatt 2018, Pos. 1000) und gemäß der Verordnung (EU) 2016/679 des Europäischen Parlaments und des Rates vom 27. April 2016 zum Schutz natürlicher Personen bei der Verarbeitung personenbezogener Daten und zum freien Datenverkehr und zur Aufhebung der Richtlinie 95/46/EG (DSGVO)).</p>
                            </div>'
                    ]
                ]
            ],

            // --- 2. Резюме (хронологическое) / Resume (Chronological) ---
            [
                'slug' => 'resume-chronological-pl',
                'fields' => '[
                    {"name":"full_name","type":"text","required":true,"labels":{"pl":"Imię i Nazwisko","en":"Full Name","uk":"Ім\'я та Прізвище","de":"Vollständiger Name"}},
                    {"name":"position","type":"text","required":true,"labels":{"pl":"Stanowisko docelowe","en":"Target Position","uk":"Цільова посада","de":"Zielposition"}},
                    {"name":"phone","type":"text","required":true,"labels":{"pl":"Telefon","en":"Phone","uk":"Телефон","de":"Telefon"}},
                    {"name":"email","type":"email","required":true,"labels":{"pl":"E-mail","en":"Email","uk":"E-mail","de":"E-Mail"}},
                    {"name":"address","type":"text","required":false,"labels":{"pl":"Adres","en":"Address","uk":"Адреса","de":"Adresse"}},
                    {"name":"summary","type":"textarea","required":true,"labels":{"pl":"Podsumowanie zawodowe","en":"Professional Summary","uk":"Професійне резюме","de":"Berufliches Profil"}},
                    {"name":"experience","type":"textarea","required":true,"labels":{"pl":"Doświadczenie zawodowe (od najnowszego)","en":"Work Experience (from most recent)","uk":"Досвід роботи (від останнього)","de":"Berufserfahrung (von der neuesten)"}},
                    {"name":"education","type":"textarea","required":true,"labels":{"pl":"Wykształcenie","en":"Education","uk":"Освіта","de":"Ausbildung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Życiorys (chronologiczny)',
                        'description' => 'Format CV skupiony na doświadczeniu zawodowym przedstawionym w odwróconej kolejności chronologicznej. Zawiera klauzulę RODO.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">[[full_name]]</h1>
                                <p style="font-size: 12px;">[[address]] | Tel: [[phone]] | E-mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">PODSUMOWANIE ZAWODOWE</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">DOŚWIADCZENIE ZAWODOWE</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">WYKSZTAŁCENIE</h2>
                                <p>[[education]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Wyrażam zgodę na przetwarzanie moich danych osobowych dla potrzeb niezbędnych do realizacji procesu rekrutacji (zgodnie z RODO).</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Resume (Chronological)',
                        'description' => 'A resume format focused on work experience presented in reverse chronological order. Includes the GDPR clause.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">[[full_name]]</h1>
                                <p style="font-size: 12px;">[[address]] | Tel: [[phone]] | E-mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">PROFESSIONAL SUMMARY</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">WORK EXPERIENCE</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">EDUCATION</h2>
                                <p>[[education]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>I consent to the processing of my personal data for the purposes necessary for the recruitment process (in accordance with GDPR).</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Резюме (хронологічне)',
                        'description' => 'Формат резюме, сфокусований на досвіді роботи, представленому у зворотному хронологічному порядку. Містить положення GDPR.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">[[full_name]]</h1>
                                <p style="font-size: 12px;">[[address]] | Тел: [[phone]] | E-mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">ПРОФЕСІЙНЕ РЕЗЮМЕ</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">ДОСВІД РОБОТИ</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">ОСВІТА</h2>
                                <p>[[education]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Я даю згоду на обробку моїх персональних даних для потреб, необхідних для процесу рекрутації (відповідно до GDPR).</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Lebenslauf (chronologisch)',
                        'description' => 'Ein Lebenslaufformat, das sich auf die Berufserfahrung in umgekehrter chronologischer Reihenfolge konzentriert. Enthält die DSGVO-Klausel.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">[[full_name]]</h1>
                                <p style="font-size: 12px;">[[address]] | Tel: [[phone]] | E-Mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">BERUFLICHES PROFIL</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">BERUFSERFAHRUNG</h2>
                                <p>[[experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">AUSBILDUNG</h2>
                                <p>[[education]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Ich willige in die Verarbeitung meiner personenbezogenen Daten für die Zwecke des Rekrutierungsprozesses ein (gemäß DSGVO).</p>
                            </div>'
                    ]
                ]
            ],

            // --- 3. Резюме (функциональное) / Resume (Functional) ---
            [
                'slug' => 'resume-functional-pl',
                'fields' => '[
                    {"name":"full_name","type":"text","required":true,"labels":{"pl":"Imię i Nazwisko","en":"Full Name","uk":"Ім\'я та Прізвище","de":"Vollständiger Name"}},
                    {"name":"phone","type":"text","required":true,"labels":{"pl":"Telefon","en":"Phone","uk":"Телефон","de":"Telefon"}},
                    {"name":"email","type":"email","required":true,"labels":{"pl":"E-mail","en":"Email","uk":"E-mail","de":"E-Mail"}},
                    {"name":"summary","type":"textarea","required":true,"labels":{"pl":"Cel zawodowy","en":"Career Objective","uk":"Професійна мета","de":"Karriereziel"}},
                    {"name":"skills_summary","type":"textarea","required":true,"labels":{"pl":"Podsumowanie umiejętności i kompetencji","en":"Summary of Skills and Competencies","uk":"Ключові навички та компетенції","de":"Zusammenfassung der Fähigkeiten und Kompetenzen"}},
                    {"name":"achievements","type":"textarea","required":true,"labels":{"pl":"Kluczowe osiągnięcia","en":"Key Achievements","uk":"Ключові досягнення","de":"Wichtigste Erfolge"}},
                    {"name":"experience_history","type":"textarea","required":true,"labels":{"pl":"Historia zatrudnienia (skrócona)","en":"Employment History (brief)","uk":"Історія працевлаштування (коротко)","de":"Beruflicher Werdegang (kurz)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Życiorys (funkcjonalny)',
                        'description' => 'Format CV, który podkreśla umiejętności i kompetencje, a nie chronologię zatrudnienia. Idealny przy zmianie branży. Zawiera klauzulę RODO.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">[[full_name]]</h1>
                                <p style="font-size: 12px;">Tel: [[phone]] | E-mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">CEL ZAWODOWY</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">PODSUMOWANIE UMIEJĘTNOŚCI</h2>
                                <p>[[skills_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">KLUCZOWE OSIĄGNIĘCIA</h2>
                                <p>[[achievements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">HISTORIA ZATRUDNIENIA</h2>
                                <p>[[experience_history]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Wyrażam zgodę na przetwarzanie moich danych osobowych dla potrzeb niezbędnych do realizacji procesu rekrutacji (zgodnie z RODO).</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Resume (Functional)',
                        'description' => 'A CV format that emphasizes skills and competencies rather than employment chronology. Ideal for career changes. Includes the GDPR clause.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">[[full_name]]</h1>
                                <p style="font-size: 12px;">Tel: [[phone]] | E-mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">CAREER OBJECTIVE</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">SUMMARY OF SKILLS AND COMPETENCIES</h2>
                                <p>[[skills_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">KEY ACHIEVEMENTS</h2>
                                <p>[[achievements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">EMPLOYMENT HISTORY</h2>
                                <p>[[experience_history]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>I consent to the processing of my personal data for the purposes necessary for the recruitment process (in accordance with GDPR).</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Резюме (функціональне)',
                        'description' => 'Формат резюме, що підкреслює навички та компетенції, а не хронологію працевлаштування. Ідеально підходить при зміні галузі. Містить положення GDPR.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">[[full_name]]</h1>
                                <p style="font-size: 12px;">Тел: [[phone]] | E-mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">ПРОФЕСІЙНА МЕТА</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">КЛЮЧОВІ НАВИЧКИ ТА КОМПЕТЕНЦІЇ</h2>
                                <p>[[skills_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">КЛЮЧОВІ ДОСЯГНЕННЯ</h2>
                                <p>[[achievements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">ІСТОРІЯ ПРАЦЕВЛАШТУВАННЯ</h2>
                                <p>[[experience_history]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Я даю згоду на обробку моїх персональних даних для потреб, необхідних для процесу рекрутації (відповідно до GDPR).</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Lebenslauf (funktional)',
                        'description' => 'Ein Lebenslaufformat, das Fähigkeiten und Kompetenzen statt der chronologischen Beschäftigung hervorhebt. Ideal für den Branchenwechsel. Enthält die DSGVO-Klausel.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;">
                                <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">[[full_name]]</h1>
                                <p style="font-size: 12px;">Tel: [[phone]] | E-Mail: [[email]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">KARRIEREZIEL</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">ZUSAMMENFASSUNG DER FÄHIGKEITEN UND KOMPETENZEN</h2>
                                <p>[[skills_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">WICHTIGSTE ERFOLGE</h2>
                                <p>[[achievements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">BERUFLICHER WERDEGANG</h2>
                                <p>[[experience_history]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 30px; font-size: 9px; text-align: justify; color: #555;">
                                <p>Ich willige in die Verarbeitung meiner personenbezogenen Daten für die Zwecke des Rekrutierungsprozesses ein (gemäß DSGVO).</p>
                            </div>'
                    ]
                ]
            ],

            // --- 4. Сопроводительное письмо к резюме / Cover Letter ---
            [
                'slug' => 'cover-letter-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko aplikanta","en":"Applicant\'s Full Name","uk":"ПІБ апліканта","de":"Vollständiger Name des Bewerbers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres aplikanta","en":"Applicant\'s Address","uk":"Адреса апліканта","de":"Anschrift des Bewerbers"}},
                    {"name":"applicant_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail aplikanta","en":"Applicant\'s Phone & Email","uk":"Телефон та e-mail апліканта","de":"Telefon und E-Mail des Bewerbers"}},
                    {"name":"recipient_name_position","type":"text","required":true,"labels":{"pl":"Imię, nazwisko i stanowisko odbiorcy","en":"Recipient\'s Name & Position","uk":"Ім\'я, прізвище та посада одержувача","de":"Name und Position des Empfängers"}},
                    {"name":"company_name_full","type":"text","required":true,"labels":{"pl":"Pełna nazwa firmy","en":"Full Company Name","uk":"Повна назва компанії","de":"Vollständiger Firmenname"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Firmenanschrift"}},
                    {"name":"position_applied_for","type":"text","required":true,"labels":{"pl":"Stanowisko, na które aplikujesz","en":"Position Applied For","uk":"Посада, на яку претендуєте","de":"Angestrebte Position"}},
                    {"name":"reference_number","type":"text","required":false,"labels":{"pl":"Numer referencyjny ogłoszenia","en":"Job Ad Reference Number","uk":"Номер оголошення","de":"Referenznummer der Stellenanzeige"}},
                    {"name":"letter_body","type":"textarea","required":true,"labels":{"pl":"Treść listu","en":"Body of the letter","uk":"Текст листа","de":"Text des Briefes"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'List motywacyjny',
                        'description' => 'Formalny list dołączany do CV, wyjaśniający motywację do pracy na danym stanowisku.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p><strong>[[recipient_name_position]]</strong><br>[[company_name_full]]<br>[[company_address]]</p>
                                <br/>
                                <p><strong>Dotyczy:</strong> Aplikacja na stanowisko [[position_applied_for]] (nr ref: [[reference_number]])</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>[[letter_body]]</p>
                                <p>W załączeniu przesyłam swoje CV. Z przyjemnością spotkam się z Państwem, aby szerzej zaprezentować swoją kandydaturę.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                                <br><br>
                                <p style="font-size: 9px; color: #555;">Wyrażam zgodę na przetwarzanie moich danych osobowych dla potrzeb niezbędnych do realizacji procesu rekrutacji (zgodnie z RODO).</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Cover Letter',
                        'description' => 'A formal letter accompanying a CV, explaining the motivation for applying for a specific position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p><strong>[[recipient_name_position]]</strong><br>[[company_name_full]]<br>[[company_address]]</p>
                                <br/>
                                <p><strong>Subject:</strong> Application for the position of [[position_applied_for]] (ref no: [[reference_number]])</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Sir/Madam,</p>
                                <p>[[letter_body]]</p>
                                <p>I am attaching my CV. I would be pleased to meet with you to further present my candidature.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                                <br><br>
                                <p style="font-size: 9px; color: #555;">I consent to the processing of my personal data for the purposes necessary to carry out the recruitment process (in accordance with GDPR).</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Супровідний лист',
                        'description' => 'Формальний лист, що додається до резюме, який пояснює мотивацію для роботи на даній посаді.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p><strong>[[recipient_name_position]]</strong><br>[[company_name_full]]<br>[[company_address]]</p>
                                <br/>
                                <p><strong>Щодо:</strong> Заява на посаду [[position_applied_for]] (номер посилання: [[reference_number]])</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановні пані та панове,</p>
                                <p>[[letter_body]]</p>
                                <p>У додатку надсилаю своє резюме. Буду радий зустрітися з Вами, щоб ширше представити свою кандидатуру.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                                <br><br>
                                <p style="font-size: 9px; color: #555;">Я даю згоду на обробку моїх персональних даних для потреб, необхідних для реалізації процесу рекрутації (відповідно до GDPR).</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Anschreiben',
                        'description' => 'Ein formelles Schreiben, das dem Lebenslauf beiliegt und die Motivation für die Bewerbung auf eine bestimmte Position erklärt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone_email]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p><strong>[[recipient_name_position]]</strong><br>[[company_name_full]]<br>[[company_address]]</p>
                                <br/>
                                <p><strong>Betreff:</strong> Bewerbung um die Stelle als [[position_applied_for]] (Referenz-Nr.: [[reference_number]])</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>[[letter_body]]</p>
                                <p>Anbei sende ich Ihnen meinen Lebenslauf. Gerne treffe ich mich mit Ihnen, um meine Kandidatur näher vorzustellen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                                <br><br>
                                <p style="font-size: 9px; color: #555;">Ich willige in die Verarbeitung meiner personenbezogenen Daten für die Durchführung des Rekrutierungsprozesses ein (gemäß DSGVO).</p>
                            </div>'
                    ]
                ]
            ],

            // --- 5. Заявление о приеме на работу / Job Application Statement ---
            [
                'slug' => 'job-application-statement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wnioskodawcy","en":"Applicant\'s Full Name","uk":"ПІБ заявника","de":"Vollständiger Name des Antragstellers"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres wnioskodawcy","en":"Applicant\'s Address","uk":"Адреса заявника","de":"Anschrift des Antragstellers"}},
                    {"name":"recipient_position","type":"text","required":true,"labels":{"pl":"Stanowisko odbiorcy (np. Dyrektor, Prezes Zarządu)","en":"Recipient\'s Position (e.g., Director, CEO)","uk":"Посада одержувача (напр., Директор, Голова правління)","de":"Position des Empfängers (z.B. Direktor, Vorstandsvorsitzender)"}},
                    {"name":"company_name_full","type":"text","required":true,"labels":{"pl":"Pełna nazwa firmy","en":"Full Company Name","uk":"Повна назва компанії","de":"Vollständiger Firmenname"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Firmenanschrift"}},
                    {"name":"desired_position","type":"text","required":true,"labels":{"pl":"Stanowisko, o które się ubiegasz","en":"Position Applied For","uk":"Посада, на яку претендуєте","de":"Angestrebte Position"}},
                    {"name":"work_start_date","type":"date","required":true,"labels":{"pl":"Proponowana data rozpoczęcia pracy","en":"Proposed Start Date","uk":"Запропонована дата початку роботи","de":"Vorgeschlagenes Startdatum"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Podanie o pracę',
                        'description' => 'Bardzo formalne podanie o przyjęcie do pracy, składane bezpośrednio do pracodawcy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p><strong>[[recipient_position]]</strong><br><strong>[[company_name_full]]</strong><br>[[company_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">PODANIE O PRZYJĘCIE DO PRACY</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o zatrudnienie mnie w firmie [[company_name_full]] na stanowisku <strong>[[desired_position]]</strong> od dnia [[work_start_date]].</p>
                                <p>Posiadam niezbędne kwalifikacje i doświadczenie, które szczegółowo opisałem/am w załączonym CV. Jestem osobą zmotywowaną, gotową do podjęcia nowych wyzwań i wniesienia wkładu w rozwój Państwa firmy.</p>
                                <p>Proszę o pozytywne rozpatrzenie mojej prośby.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Job Application Statement',
                        'description' => 'A very formal application for employment, submitted directly to the employer.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p><strong>[[recipient_position]]</strong><br><strong>[[company_name_full]]</strong><br>[[company_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">JOB APPLICATION STATEMENT</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request to be employed by [[company_name_full]] in the position of <strong>[[desired_position]]</strong> starting from [[work_start_date]].</p>
                                <p>I possess the necessary qualifications and experience, which I have detailed in the attached CV. I am a motivated individual, ready to take on new challenges and contribute to the development of your company.</p>
                                <p>I kindly ask for a positive consideration of my request.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про прийняття на роботу',
                        'description' => 'Дуже формальна заява про прийняття на роботу, що подається безпосередньо роботодавцю.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p><strong>[[recipient_position]]</strong><br><strong>[[company_name_full]]</strong><br>[[company_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА ПРО ПРИЙНЯТТЯ НА РОБОТУ</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про працевлаштування мене у компанії [[company_name_full]] на посаду <strong>[[desired_position]]</strong> з [[work_start_date]].</p>
                                <p>Маю необхідні кваліфікації та досвід, які докладно описав(ла) у доданому резюме. Я мотивована особа, готова до нових викликів та внеску у розвиток Вашої компанії.</p>
                                <p>Прошу позитивно розглянути моє прохання.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Bewerbungsschreiben',
                        'description' => 'Ein sehr formelles Bewerbungsschreiben, das direkt an den Arbeitgeber gerichtet ist.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p><strong>[[recipient_position]]</strong><br><strong>[[company_name_full]]</strong><br>[[company_address]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">BEWERBUNGSSCHREIBEN</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit bitte ich höflich um Anstellung bei der Firma [[company_name_full]] auf der Position <strong>[[desired_position]]</strong> ab dem [[work_start_date]].</p>
                                <p>Ich verfüge über die notwendigen Qualifikationen und Erfahrungen, die ich in meinem beigefügten Lebenslauf ausführlich beschrieben habe. Ich bin eine motivierte Person, bereit, neue Herausforderungen anzunehmen und einen Beitrag zur Entwicklung Ihres Unternehmens zu leisten.</p>
                                <p>Ich bitte Sie, mein Anliegen positiv zu prüfen.</p>
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

            // --- 6. Трудовой договор (бессрочный) / Permanent Employment Contract ---
            [
                'slug' => 'permanent-employment-contract-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"employer_name","type":"text","required":true,"labels":{"pl":"Nazwa pracodawcy","en":"Employer Name","uk":"Назва роботодавця","de":"Name des Arbeitgebers"}},
                    {"name":"employer_address","type":"text","required":true,"labels":{"pl":"Adres pracodawcy","en":"Employer Address","uk":"Адреса роботодавця","de":"Anschrift des Arbeitgebers"}},
                    {"name":"employer_nip","type":"text","required":true,"labels":{"pl":"NIP pracodawcy","en":"Employer NIP","uk":"NIP роботодавця","de":"NIP des Arbeitgebers"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Name","uk":"Ім\'я та прізвище працівника","de":"Name des Arbeitnehmers"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Anschrift des Arbeitnehmers"}},
                    {"name":"employee_pesel","type":"text","required":true,"labels":{"pl":"PESEL pracownika","en":"Employee PESEL","uk":"PESEL працівника","de":"PESEL des Arbeitnehmers"}},
                    {"name":"position","type":"text","required":true,"labels":{"pl":"Stanowisko","en":"Position","uk":"Посада","de":"Position"}},
                    {"name":"work_place","type":"text","required":true,"labels":{"pl":"Miejsce pracy","en":"Place of Work","uk":"Місце роботи","de":"Arbeitsort"}},
                    {"name":"work_dimension","type":"text","required":true,"labels":{"pl":"Wymiar czasu pracy (np. pełny etat)","en":"Working Time (e.g., full-time)","uk":"Робочий час (напр., повна ставка)","de":"Arbeitszeit (z.B. Vollzeit)"}},
                    {"name":"salary_gross","type":"number","required":true,"labels":{"pl":"Wynagrodzenie brutto (PLN)","en":"Gross Salary (PLN)","uk":"Валова заробітна плата (PLN)","de":"Bruttogehalt (PLN)"}},
                    {"name":"start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia pracy","en":"Start Date","uk":"Дата початку роботи","de":"Anfangsdatum"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa o pracę na czas nieokreślony',
                        'description' => 'Standardowa umowa o pracę na czas nieokreślony, zgodna z polskim Kodeksem Pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O PRACĘ NA CZAS NIEOKREŚLONY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>[[employer_name]]</strong> z siedzibą w [[employer_address]], NIP: [[employer_nip]], zwanym/ą dalej "Pracodawcą",</p>
                                <p>a</p>
                                <p>Panem/Panią <strong>[[employee_name]]</strong>, zamieszkałym/ą w [[employee_address]], PESEL: [[employee_pesel]], zwanym/ą dalej "Pracownikiem".</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Rodzaj umowy</h2>
                                <p>Pracodawca zatrudnia Pracownika na czas nieokreślony.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Warunki pracy</h2>
                                <p>1. Stanowisko: <strong>[[position]]</strong>.</p>
                                <p>2. Miejsce wykonywania pracy: [[work_place]].</p>
                                <p>3. Wymiar czasu pracy: [[work_dimension]].</p>
                                <p>4. Data rozpoczęcia pracy: <strong>[[start_date]]</strong>.</p>
                                <p>5. Wynagrodzenie: <strong>[[salary_gross]] PLN brutto</strong> miesięcznie.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 3. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Pracy. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Pracodawca</p></td>
                                <td width="50%"><p>___________________<br>Pracownik</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Permanent Employment Contract',
                        'description' => 'A standard permanent employment contract, compliant with the Polish Labor Code.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PERMANENT EMPLOYMENT CONTRACT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>[[employer_name]]</strong> with its registered office in [[employer_address]], NIP: [[employer_nip]], hereinafter referred to as the "Employer",</p>
                                <p>and</p>
                                <p>Mr./Ms. <strong>[[employee_name]]</strong>, residing in [[employee_address]], PESEL: [[employee_pesel]], hereinafter referred to as the "Employee".</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Type of Contract</h2>
                                <p>The Employer employs the Employee for an indefinite period.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Terms of Employment</h2>
                                <p>1. Position: <strong>[[position]]</strong>.</p>
                                <p>2. Place of work: [[work_place]].</p>
                                <p>3. Working time: [[work_dimension]].</p>
                                <p>4. Start date: <strong>[[start_date]]</strong>.</p>
                                <p>5. Remuneration: <strong>[[salary_gross]] PLN gross</strong> per month.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 3. Final Provisions</h2>
                                <p>Matters not regulated by this contract shall be governed by the provisions of the Labor Code. The contract has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employer</p></td>
                                <td width="50%"><p>___________________<br>Employee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Трудовий договір на невизначений термін',
                        'description' => 'Стандартний трудовий договір на невизначений термін, що відповідає Польському трудовому кодексу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ТРУДОВИЙ ДОГОВІР НА НЕВИЗНАЧЕНИЙ ТЕРМІН</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>[[employer_name]]</strong> з місцезнаходженням у [[employer_address]], NIP: [[employer_nip]], надалі іменований "Роботодавець",</p>
                                <p>та</p>
                                <p>Паном/Пані <strong>[[employee_name]]</strong>, який/яка проживає у [[employee_address]], PESEL: [[employee_pesel]], надалі іменований "Працівник".</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Вид договору</h2>
                                <p>Роботодавець наймає Працівника на невизначений термін.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Умови праці</h2>
                                <p>1. Посада: <strong>[[position]]</strong>.</p>
                                <p>2. Місце виконання роботи: [[work_place]].</p>
                                <p>3. Розмір робочого часу: [[work_dimension]].</p>
                                <p>4. Дата початку роботи: <strong>[[start_date]]</strong>.</p>
                                <p>5. Винагорода: <strong>[[salary_gross]] PLN брутто</strong> щомісячно.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 3. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Трудового кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Роботодавець</p></td>
                                <td width="50%"><p>___________________<br>Працівник</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Unbefristeter Arbeitsvertrag',
                        'description' => 'Ein Standard-Arbeitsvertrag auf unbestimmte Zeit, der dem polnischen Arbeitsgesetzbuch entspricht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UNBEFRISTETER ARBEITSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>[[employer_name]]</strong> mit Sitz in [[employer_address]], NIP: [[employer_nip]], im Folgenden "Arbeitgeber" genannt,</p>
                                <p>und</p>
                                <p>Herrn/Frau <strong>[[employee_name]]</strong>, wohnhaft in [[employee_address]], PESEL: [[employee_pesel]], im Folgenden "Arbeitnehmer" genannt.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Vertragsart</h2>
                                <p>Der Arbeitgeber stellt den Arbeitnehmer auf unbestimmte Zeit ein.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Arbeitsbedingungen</h2>
                                <p>1. Position: <strong>[[position]]</strong>.</p>
                                <p>2. Arbeitsort: [[work_place]].</p>
                                <p>3. Arbeitszeit: [[work_dimension]].</p>
                                <p>4. Beginn der Arbeit: <strong>[[start_date]]</strong>.</p>
                                <p>5. Vergütung: <strong>[[salary_gross]] PLN brutto</strong> monatlich.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 3. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Arbeitsgesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Arbeitgeber</p></td>
                                <td width="50%"><p>___________________<br>Arbeitnehmer</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 7. Срочный трудовой договор / Fixed-Term Employment Contract ---
            [
                'slug' => 'fixed-term-employment-contract-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"employer_name","type":"text","required":true,"labels":{"pl":"Nazwa pracodawcy","en":"Employer Name","uk":"Назва роботодавця","de":"Name des Arbeitgebers"}},
                    {"name":"employer_address","type":"text","required":true,"labels":{"pl":"Adres pracodawcy","en":"Employer Address","uk":"Адреса роботодавця","de":"Anschrift des Arbeitgebers"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Name","uk":"Ім\'я та прізвище працівника","de":"Name des Arbeitnehmers"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Anschrift des Arbeitnehmers"}},
                    {"name":"position","type":"text","required":true,"labels":{"pl":"Stanowisko","en":"Position","uk":"Посада","de":"Position"}},
                    {"name":"start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia pracy","en":"Start Date","uk":"Дата початку роботи","de":"Anfangsdatum"}},
                    {"name":"end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia pracy","en":"End Date","uk":"Дата закінчення роботи","de":"Enddatum"}},
                    {"name":"salary_gross","type":"number","required":true,"labels":{"pl":"Wynagrodzenie brutto (PLN)","en":"Gross Salary (PLN)","uk":"Валова заробітна плата (PLN)","de":"Bruttogehalt (PLN)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa o pracę na czas określony',
                        'description' => 'Umowa o pracę zawierana na z góry określony okres, zgodna z polskim Kodeksem Pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O PRACĘ NA CZAS OKREŚLONY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy <strong>[[employer_name]]</strong> (Pracodawca) a Panem/Panią <strong>[[employee_name]]</strong> (Pracownik).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Przedmiot umowy</h2>
                                <p>Pracodawca zatrudnia Pracownika na stanowisku <strong>[[position]]</strong> na czas określony od <strong>[[start_date]]</strong> do <strong>[[end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Wynagrodzenie</h2>
                                <p>Pracownikowi przysługuje wynagrodzenie w wysokości <strong>[[salary_gross]] PLN brutto</strong> miesięcznie.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 3. Okres wypowiedzenia</h2>
                                <p>Strony ustalają, że umowa może być rozwiązana za dwutygodniowym okresem wypowiedzenia.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Pracodawca</p></td>
                                <td width="50%"><p>___________________<br>Pracownik</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Fixed-Term Employment Contract',
                        'description' => 'An employment contract concluded for a predetermined period, compliant with the Polish Labor Code.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FIXED-TERM EMPLOYMENT CONTRACT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between <strong>[[employer_name]]</strong> (Employer) and Mr./Ms. <strong>[[employee_name]]</strong> (Employee).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Subject of the Contract</h2>
                                <p>The Employer employs the Employee in the position of <strong>[[position]]</strong> for a fixed term from <strong>[[start_date]]</strong> to <strong>[[end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Remuneration</h2>
                                <p>The Employee is entitled to remuneration of <strong>[[salary_gross]] PLN gross</strong> per month.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 3. Notice Period</h2>
                                <p>The parties agree that the contract may be terminated with a two-week notice period.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employer</p></td>
                                <td width="50%"><p>___________________<br>Employee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Строковий трудовий договір',
                        'description' => 'Трудовий договір, укладений на заздалегідь визначений термін, що відповідає Польському трудовому кодексу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">СТРОКОВИЙ ТРУДОВИЙ ДОГОВІР</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між <strong>[[employer_name]]</strong> (Роботодавець) та Паном/Пані <strong>[[employee_name]]</strong> (Працівник).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Предмет договору</h2>
                                <p>Роботодавець наймає Працівника на посаду <strong>[[position]]</strong> на визначений термін з <strong>[[start_date]]</strong> до <strong>[[end_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Винагорода</h2>
                                <p>Працівнику належить винагорода у розмірі <strong>[[salary_gross]] PLN брутто</strong> щомісячно.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 3. Строк повідомлення</h2>
                                <p>Сторони погоджуються, що договір може бути розірваний з двотижневим строком повідомлення.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Роботодавець</p></td>
                                <td width="50%"><p>___________________<br>Працівник</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Befristeter Arbeitsvertrag',
                        'description' => 'Ein befristeter Arbeitsvertrag, der dem polnischen Arbeitsgesetzbuch entspricht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BEFRISTETER ARBEITSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen <strong>[[employer_name]]</strong> (Arbeitgeber) und Herrn/Frau <strong>[[employee_name]]</strong> (Arbeitnehmer).</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Vertragsgegenstand</h2>
                                <p>Der Arbeitgeber stellt den Arbeitnehmer auf der Position <strong>[[position]]</strong> befristet vom <strong>[[start_date]]</strong> bis <strong>[[end_date]]</strong> ein.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Vergütung</h2>
                                <p>Der Arbeitnehmer hat Anspruch auf eine Vergütung in Höhe von <strong>[[salary_gross]] PLN brutto</strong> monatlich.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 3. Kündigungsfrist</h2>
                                <p>Die Parteien vereinbaren, dass der Vertrag mit einer zweiwöchigen Kündigungsfrist aufgelöst werden kann.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Arbeitgeber</p></td>
                                <td width="50%"><p>___________________<br>Arbeitnehmer</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 8. Договор о неразглашении (NDA) / NDA Agreement ---
            [
                'slug' => 'nda-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"party_one_name","type":"text","required":true,"labels":{"pl":"Nazwa Strony Ujawniającej","en":"Disclosing Party Name","uk":"Назва Сторони, що розкриває","de":"Name der offenlegenden Partei"}},
                    {"name":"party_two_name","type":"text","required":true,"labels":{"pl":"Nazwa Strony Otrzymującej","en":"Receiving Party Name","uk":"Назва Сторони, що отримує","de":"Name der empfangenden Partei"}},
                    {"name":"confidential_info","type":"textarea","required":true,"labels":{"pl":"Opis Informacji Poufnych","en":"Description of Confidential Information","uk":"Опис Конфіденційної Інформації","de":"Beschreibung der vertraulichen Informationen"}},
                    {"name":"purpose","type":"textarea","required":true,"labels":{"pl":"Cel ujawnienia","en":"Purpose of Disclosure","uk":"Мета розкриття","de":"Zweck der Offenlegung"}},
                    {"name":"term_years","type":"number","required":true,"labels":{"pl":"Okres poufności (w latach)","en":"Confidentiality Period (in years)","uk":"Термін конфіденційності (у роках)","de":"Vertraulichkeitsdauer (in Jahren)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa o zachowaniu poufności (NDA)',
                        'description' => 'Prawna umowa zobowiązująca strony do zachowania w tajemnicy określonych informacji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O ZACHOWANIU POUFNOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>w [[city]]</p></td><td style="text-align: right;"><p>dnia ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zawarta pomiędzy <strong>[[party_one_name]]</strong> ("Strona Ujawniająca") a <strong>[[party_two_name]]</strong> ("Strona Otrzymująca").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Informacje Poufne</h2>
                                <p>Informacje Poufne oznaczają: [[confidential_info]]. Zostają one ujawnione w celu: [[purpose]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Zobowiązania</h2>
                                <p>Strona Otrzymująca zobowiązuje się do zachowania w ścisłej tajemnicy Informacji Poufnych przez okres [[term_years]] lat.</p>
                                <p>W sprawach nieuregulowanych niniejszą Umową, zastosowanie mają przepisy prawa polskiego.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Strona Ujawniająca</p></td>
                                <td width="50%"><p>___________________<br>Strona Otrzymująca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Non-Disclosure Agreement (NDA)',
                        'description' => 'A legal agreement obligating parties to keep certain information confidential.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">NON-DISCLOSURE AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>in [[city]]</p></td><td style="text-align: right;"><p>on ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Concluded between <strong>[[party_one_name]]</strong> ("Disclosing Party") and <strong>[[party_two_name]]</strong> ("Receiving Party").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Confidential Information</h2>
                                <p>Confidential Information means: [[confidential_info]]. It is disclosed for the purpose of: [[purpose]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Obligations</h2>
                                <p>The Receiving Party undertakes to keep the Confidential Information in strict secrecy for a period of [[term_years]] years.</p>
                                <p>Matters not regulated by this Agreement shall be governed by Polish law.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Disclosing Party</p></td>
                                <td width="50%"><p>___________________<br>Receiving Party</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір про нерозголошення (NDA)',
                        'description' => 'Юридична угода, що зобов\'язує сторони зберігати в таємниці певну інформацію.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ПРО НЕРОЗГОЛОШЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>у [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Укладено між <strong>[[party_one_name]]</strong> ("Сторона, що розкриває") та <strong>[[party_two_name]]</strong> ("Сторона, що отримує").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Конфіденційна інформація</h2>
                                <p>Конфіденційна інформація означає: [[confidential_info]]. Вона розкривається з метою: [[purpose]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Зобов\'язання</h2>
                                <p>Сторона, що отримує, зобов\'язується зберігати Конфіденційну інформацію в суворій таємниці протягом [[term_years]] років.</p>
                                <p>У справах, не врегульованих цією Угодою, застосовуються положення польського законодавства.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Сторона, що розкриває</p></td>
                                <td width="50%"><p>___________________<br>Сторона, що отримує</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Geheimhaltungsvereinbarung (NDA)',
                        'description' => 'Eine rechtliche Vereinbarung, die Parteien zur Geheimhaltung bestimmter Informationen verpflichtet.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GEHEIMHALTUNGSVEREINBARUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Abgeschlossen zwischen <strong>[[party_one_name]]</strong> ("Offenlegende Partei") und <strong>[[party_two_name]]</strong> ("Empfangende Partei").</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertrauliche Informationen</h2>
                                <p>Vertrauliche Informationen sind: [[confidential_info]]. Sie werden zum Zweck von: [[purpose]] offengelegt.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Verpflichtungen</h2>
                                <p>Die Empfangende Partei verpflichtet sich, die Vertraulichen Informationen für einen Zeitraum von [[term_years]] Jahren streng geheim zu halten.</p>
                                <p>In Angelegenheiten, die in dieser Vereinbarung nicht geregelt sind, gilt polnisches Recht.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Offenlegende Partei</p></td>
                                <td width="50%"><p>___________________<br>Empfangende Partei</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 9. Договор о материальной ответственности / Material Liability Agreement ---
            [
                'slug' => 'material-liability-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"employer_name","type":"text","required":true,"labels":{"pl":"Nazwa pracodawcy","en":"Employer Name","uk":"Назва роботодавця","de":"Name des Arbeitgebers"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Name","uk":"Ім\'я та прізвище працівника","de":"Name des Arbeitnehmers"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Arbeitnehmers"}},
                    {"name":"property_description","type":"textarea","required":true,"labels":{"pl":"Opis powierzonego mienia","en":"Description of entrusted property","uk":"Опис довіреного майна","de":"Beschreibung des anvertrauten Eigentums"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa o odpowiedzialności materialnej za powierzone mienie',
                        'description' => 'Umowa regulująca odpowiedzialność pracownika za powierzone mu mienie, zgodna z Kodeksem Pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O ODPOWIEDZIALNOŚCI MATERIALNEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>w [[city]]</p></td><td style="text-align: right;"><p>dnia ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zawarta pomiędzy <strong>[[employer_name]]</strong> ("Pracodawca") a Panem/Panią <strong>[[employee_name]]</strong> ("Pracownik"), zatrudnionym na stanowisku [[employee_position]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Pracodawca powierza, a Pracownik przyjmuje pełną odpowiedzialność materialną za następujące mienie: [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Obowiązki Pracownika</h2>
                                <p>Pracownik zobowiązuje się do należytej pieczy nad powierzonym mieniem i jego ochrony przed uszkodzeniem lub utratą.</p>
                                <p>W sprawach nieuregulowanych niniejszą Umową, zastosowanie mają przepisy Kodeksu Pracy.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Pracodawca</p></td>
                                <td width="50%"><p>___________________<br>Pracownik</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Material Liability Agreement for Entrusted Property',
                        'description' => 'An agreement regulating employee\'s liability for entrusted property, compliant with the Labor Code.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MATERIAL LIABILITY AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>in [[city]]</p></td><td style="text-align: right;"><p>on ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Concluded between <strong>[[employer_name]]</strong> ("Employer") and Mr./Ms. <strong>[[employee_name]]</strong> ("Employee"), employed in the position of [[employee_position]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The Employer entrusts, and the Employee accepts full material liability for the following property: [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Employee\'s Obligations</h2>
                                <p>The Employee undertakes to properly care for the entrusted property and protect it from damage or loss.</p>
                                <p>Matters not regulated by this Agreement shall be governed by the provisions of the Labor Code.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employer</p></td>
                                <td width="50%"><p>___________________<br>Employee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір про матеріальну відповідальність за довірене майно',
                        'description' => 'Угода, що регулює відповідальність працівника за довірене йому майно, згідно з Трудовим кодексом.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ПРО МАТЕРІАЛЬНУ ВІДПОВІДАЛЬНІСТЬ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>у [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Укладено між <strong>[[employer_name]]</strong> ("Роботодавець") та Паном/Пані <strong>[[employee_name]]</strong> ("Працівник"), який/яка працює на посаді [[employee_position]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Роботодавець довіряє, а Працівник приймає повну матеріальну відповідальність за таке майно: [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Обов\'язки Працівника</h2>
                                <p>Працівник зобов\'язується належним чином дбати про довірене майно та захищати його від пошкодження або втрати.</p>
                                <p>У справах, не врегульованих цією Угодою, застосовуються положення Трудового кодексу.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Роботодавець</p></td>
                                <td width="50%"><p>___________________<br>Працівник</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Haftungsvereinbarung für anvertrautes Eigentum',
                        'description' => 'Eine Vereinbarung, die die Haftung des Arbeitnehmers für anvertrautes Eigentum gemäß dem Arbeitsgesetzbuch regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">HAFTUNGSVEREINBARUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Abgeschlossen zwischen <strong>[[employer_name]]</strong> ("Arbeitgeber") und Herrn/Frau <strong>[[employee_name]]</strong> ("Arbeitnehmer"), angestellt auf der Position [[employee_position]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Der Arbeitgeber überträgt, und der Arbeitnehmer übernimmt die volle materielle Verantwortung für das folgende Eigentum: [[property_description]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Pflichten des Arbeitnehmers</h2>
                                <p>Der Arbeitnehmer verpflichtet sich, das anvertraute Eigentum sorgfältig zu hüten und es vor Beschädigung oder Verlust zu schützen.</p>
                                <p>In Angelegenheiten, die in dieser Vereinbarung nicht geregelt sind, finden die Bestimmungen des Arbeitsgesetzbuches Anwendung.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Arbeitgeber</p></td>
                                <td width="50%"><p>___________________<br>Arbeitnehmer</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 10. Должностная инструкция / Job Description ---
            [
                'slug' => 'job-description-pl',
                'fields' => '[
                    {"name":"position_name","type":"text","required":true,"labels":{"pl":"Nazwa stanowiska","en":"Position Name","uk":"Назва посади","de":"Positionsbezeichnung"}},
                    {"name":"department","type":"text","required":true,"labels":{"pl":"Dział","en":"Department","uk":"Відділ","de":"Abteilung"}},
                    {"name":"supervisor_position","type":"text","required":true,"labels":{"pl":"Bezpośredni przełożony (stanowisko)","en":"Direct Supervisor (position)","uk":"Безпосередній керівник (посада)","de":"Direkter Vorgesetzter (Position)"}},
                    {"name":"main_purpose","type":"textarea","required":true,"labels":{"pl":"Główny cel stanowiska","en":"Main Purpose of the Position","uk":"Основна мета посади","de":"Hauptzweck der Stelle"}},
                    {"name":"responsibilities","type":"textarea","required":true,"labels":{"pl":"Zakres obowiązków","en":"Scope of Responsibilities","uk":"Коло обов\'язків","de":"Aufgabenbereich"}},
                    {"name":"requirements","type":"textarea","required":true,"labels":{"pl":"Wymagania kwalifikacyjne","en":"Qualification Requirements","uk":"Кваліфікаційні вимоги","de":"Qualifikationsanforderungen"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Opis stanowiska pracy',
                        'description' => 'Dokument określający zakres obowiązków, odpowiedzialności i wymagań na danym stanowisku pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OPIS STANOWISKA PRACY</h1><p style="font-size: 16px;">[[position_name]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Dział:</strong> [[department]]</p>
                                <p><strong>Bezpośredni przełożony:</strong> [[supervisor_position]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. CEL STANOWISKA</h2>
                                <p>[[main_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. ZAKRES OBOWIĄZKÓW</h2>
                                <p>[[responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. WYMAGANIA</h2>
                                <p>[[requirements]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%"><tr>
                                <td width="50%">Zatwierdził(a): ___________________<br>(Przełożony)</td>
                                <td width="50%" style="text-align:right;">Zapoznałem/am się: ___________________<br>(Pracownik, data i podpis)</td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Job Description',
                        'description' => 'A document specifying the scope of duties, responsibilities, and requirements for a given job position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">JOB DESCRIPTION</h1><p style="font-size: 16px;">[[position_name]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Department:</strong> [[department]]</p>
                                <p><strong>Direct Supervisor:</strong> [[supervisor_position]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. POSITION PURPOSE</h2>
                                <p>[[main_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. SCOPE OF RESPONSIBILITIES</h2>
                                <p>[[responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. REQUIREMENTS</h2>
                                <p>[[requirements]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%"><tr>
                                <td width="50%">Approved by: ___________________<br>(Supervisor)</td>
                                <td width="50%" style="text-align:right;">Acknowledged by: ___________________<br>(Employee, date and signature)</td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Посадова інструкція',
                        'description' => 'Документ, що визначає коло обов\'язків, відповідальності та вимог до даної посади.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОСАДОВА ІНСТРУКЦІЯ</h1><p style="font-size: 16px;">[[position_name]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Відділ:</strong> [[department]]</p>
                                <p><strong>Безпосередній керівник:</strong> [[supervisor_position]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. МЕТА ПОСАДИ</h2>
                                <p>[[main_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. КОЛО ОБОВ\'ЯЗКІВ</h2>
                                <p>[[responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ВИМОГИ</h2>
                                <p>[[requirements]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%"><tr>
                                <td width="50%">Затвердив(ла): ___________________<br>(Керівник)</td>
                                <td width="50%" style="text-align:right;">Ознайомився(лась): ___________________<br>(Працівник, дата та підпис)</td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Stellenbeschreibung',
                        'description' => 'Ein Dokument, das den Umfang der Aufgaben, Verantwortlichkeiten und Anforderungen für eine bestimmte Arbeitsstelle festlegt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STELLENBESCHREIBUNG</h1><p style="font-size: 16px;">[[position_name]]</p></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Abteilung:</strong> [[department]]</p>
                                <p><strong>Direkter Vorgesetzter:</strong> [[supervisor_position]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ZWECK DER STELLE</h2>
                                <p>[[main_purpose]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. AUFGABENBEREICH</h2>
                                <p>[[responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ANFORDERUNGEN</h2>
                                <p>[[requirements]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%"><tr>
                                <td width="50%">Genehmigt von: ___________________<br>(Vorgesetzter)</td>
                                <td width="50%" style="text-align:right;">Gelesen und verstanden von: ___________________<br>(Mitarbeiter, Datum und Unterschrift)</td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 11. Приказ о приеме на работу / Order of Employment ---
            [
                'slug' => 'order-of-employment-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"order_number","type":"text","required":true,"labels":{"pl":"Numer zarządzenia","en":"Order Number","uk":"Номер наказу","de":"Anordnungsnummer"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_pesel","type":"text","required":true,"labels":{"pl":"PESEL pracownika","en":"Employee PESEL","uk":"ПЕСЕЛЬ працівника","de":"PESEL des Mitarbeiters"}},
                    {"name":"position","type":"text","required":true,"labels":{"pl":"Stanowisko","en":"Position","uk":"Посада","de":"Position"}},
                    {"name":"employment_type","type":"text","required":true,"labels":{"pl":"Rodzaj umowy o pracę (np. na czas nieokreślony)","en":"Type of employment contract (e.g., indefinite)","uk":"Тип трудового договору (напр., на невизначений термін)","de":"Art des Arbeitsvertrags (z.B. unbefristet)"}},
                    {"name":"start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia pracy","en":"Start Date","uk":"Дата початку роботи","de":"Beginndatum"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zarządzenie o przyjęciu do pracy',
                        'description' => 'Oficjalny dokument wewnętrzny firmy o przyjęciu pracownika na dane stanowisko.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZARZĄDZENIE O PRZYJĘCIU DO PRACY</h1><p style="font-size: 14px;">Numer: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Na podstawie art. 25 Kodeksu Pracy, niniejszym zarządzam przyjęcie do pracy:</p>
                                <p>Pana/Panią: <strong>[[employee_full_name]]</strong></p>
                                <p>PESEL: [[employee_pesel]]</p>
                                <p>Na stanowisko: <strong>[[position]]</strong></p>
                                <p>Rodzaj umowy: [[employment_type]]</p>
                                <p>Data rozpoczęcia pracy: <strong>[[start_date]]</strong></p>
                                <br/>
                                <p>Zarządzenie wchodzi w życie z dniem podpisania.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Podpis upoważnionej osoby)</p>
                                <br>
                                <p>Do wiadomości: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Order of Employment',
                        'description' => 'An official internal company document regarding the employment of an employee for a given position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ORDER OF EMPLOYMENT</h1><p style="font-size: 14px;">Number: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Pursuant to Article 25 of the Labor Code, I hereby order the employment of:</p>
                                <p>Mr./Ms.: <strong>[[employee_full_name]]</strong></p>
                                <p>PESEL: [[employee_pesel]]</p>
                                <p>Position: <strong>[[position]]</strong></p>
                                <p>Type of contract: [[employment_type]]</p>
                                <p>Start date: <strong>[[start_date]]</strong></p>
                                <br/>
                                <p>This order comes into force on the date of signing.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Signature of authorized person)</p>
                                <br>
                                <p>For information: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Наказ про прийняття на роботу',
                        'description' => 'Офіційний внутрішній документ компанії про прийняття працівника на певну посаду.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">НАКАЗ ПРО ПРИЙНЯТТЯ НА РОБОТУ</h1><p style="font-size: 14px;">Номер: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>На підставі ст. 25 Трудового кодексу цим наказую прийняти на роботу:</p>
                                <p>Пана/Пані: <strong>[[employee_full_name]]</strong></p>
                                <p>ПЕСЕЛЬ: [[employee_pesel]]</p>
                                <p>На посаду: <strong>[[position]]</strong></p>
                                <p>Вид договору: [[employment_type]]</p>
                                <p>Дата початку роботи: <strong>[[start_date]]</strong></p>
                                <br/>
                                <p>Наказ набирає чинності з дня підписання.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Підпис уповноваженої особи)</p>
                                <br>
                                <p>До відома: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Anordnung zur Arbeitsaufnahme',
                        'description' => 'Ein offizielles internes Firmendokument zur Einstellung eines Mitarbeiters auf eine bestimmte Position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANORDNUNG ZUR ARBEITSAUFNAHME</h1><p style="font-size: 14px;">Nummer: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Gemäß Artikel 25 des Arbeitsgesetzbuches ordne ich hiermit die Einstellung von an:</p>
                                <p>Herrn/Frau: <strong>[[employee_full_name]]</strong></p>
                                <p>PESEL: [[employee_pesel]]</p>
                                <p>Auf der Position: <strong>[[position]]</strong></p>
                                <p>Vertragsart: [[employment_type]]</p>
                                <p>Beginn der Arbeit: <strong>[[start_date]]</strong></p>
                                <br/>
                                <p>Diese Anordnung tritt mit dem Datum der Unterzeichnung in Kraft.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Unterschrift der bevollmächtigten Person)</p>
                                <br>
                                <p>Zur Kenntnisnahme: [[employee_full_name]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- 12. Приказ о переводе на другую должность / Order of Transfer to Another Position ---
            [
                'slug' => 'order-transfer-position-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"order_number","type":"text","required":true,"labels":{"pl":"Numer zarządzenia","en":"Order Number","uk":"Номер наказу","de":"Anordnungsnummer"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"old_position","type":"text","required":true,"labels":{"pl":"Dotychczasowe stanowisko","en":"Current Position","uk":"Поточна посада","de":"Bisherige Position"}},
                    {"name":"new_position","type":"text","required":true,"labels":{"pl":"Nowe stanowisko","en":"New Position","uk":"Нова посада","de":"Neue Position"}},
                    {"name":"transfer_date","type":"date","required":true,"labels":{"pl":"Data przeniesienia","en":"Transfer Date","uk":"Дата переведення","de":"Versetzungsdatum"}},
                    {"name":"reason_for_transfer","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie przeniesienia","en":"Reason for Transfer","uk":"Обґрунтування переведення","de":"Begründung der Versetzung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zarządzenie o przeniesieniu na inne stanowisko',
                        'description' => 'Oficjalny dokument wewnętrzny firmy dotyczący przeniesienia pracownika na inne stanowisko.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZARZĄDZENIE O PRZENIESIENIU NA INNE STANOWISKO</h1><p style="font-size: 14px;">Numer: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Na podstawie wewnętrznych przepisów pracy oraz w związku z [[reason_for_transfer]], zarządzam przeniesienie:</p>
                                <p>Pana/Pani: <strong>[[employee_full_name]]</strong></p>
                                <p>Z dotychczasowego stanowiska: <strong>[[old_position]]</strong></p>
                                <p>Na stanowisko: <strong>[[new_position]]</strong></p>
                                <p>Z dniem: <strong>[[transfer_date]]</strong></p>
                                <br/>
                                <p>Zarządzenie wchodzi w życie z dniem podpisania.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Podpis upoważnionej osoby)</p>
                                <br>
                                <p>Do wiadomości: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Order of Transfer to Another Position',
                        'description' => 'An official internal company document regarding the transfer of an employee to another position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ORDER OF TRANSFER TO ANOTHER POSITION</h1><p style="font-size: 14px;">Number: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Based on internal work regulations and due to [[reason_for_transfer]], I hereby order the transfer of:</p>
                                <p>Mr./Ms.: <strong>[[employee_full_name]]</strong></p>
                                <p>From current position: <strong>[[old_position]]</strong></p>
                                <p>To new position: <strong>[[new_position]]</strong></p>
                                <p>Effective from: <strong>[[transfer_date]]</strong></p>
                                <br/>
                                <p>This order comes into force on the date of signing.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Signature of authorized person)</p>
                                <br>
                                <p>For information: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Наказ про переведення на іншу посаду',
                        'description' => 'Офіційний внутрішній документ компанії про переведення працівника на іншу посаду.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">НАКАЗ ПРО ПЕРЕВЕДЕННЯ НА ІНШУ ПОСАДУ</h1><p style="font-size: 14px;">Номер: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>На підставі внутрішніх правил праці та у зв\'язку з [[reason_for_transfer]], наказую перевести:</p>
                                <p>Пана/Пані: <strong>[[employee_full_name]]</strong></p>
                                <p>З поточної посади: <strong>[[old_position]]</strong></p>
                                <p>На посаду: <strong>[[new_position]]</strong></p>
                                <p>З дати: <strong>[[transfer_date]]</strong></p>
                                <br/>
                                <p>Наказ набирає чинності з дня підписання.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Підпис уповноваженої особи)</p>
                                <br>
                                <p>До відома: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Anordnung zur Versetzung auf eine andere Position',
                        'description' => 'Ein offizielles internes Firmendokument zur Versetzung eines Mitarbeiters auf eine andere Position.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANORDNUNG ZUR VERSETZUNG AUF EINE ANDERE POSITION</h1><p style="font-size: 14px;">Nummer: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Auf der Grundlage interner Arbeitsvorschriften und im Zusammenhang mit [[reason_for_transfer]] ordne ich hiermit die Versetzung von an:</p>
                                <p>Herrn/Frau: <strong>[[employee_full_name]]</strong></p>
                                <p>Von der bisherigen Position: <strong>[[old_position]]</strong></p>
                                <p>Auf die neue Position: <strong>[[new_position]]</strong></p>
                                <p>Mit Wirkung zum: <strong>[[transfer_date]]</strong></p>
                                <br/>
                                <p>Diese Anordnung tritt mit dem Datum der Unterzeichnung in Kraft.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Unterschrift der bevollmächtigten Person)</p>
                                <br>
                                <p>Zur Kenntnisnahme: [[employee_full_name]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- 13. Заявление на ежегодный оплачиваемый отпуск / Annual Paid Leave Application ---
            [
                'slug' => 'annual-paid-leave-application-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"supervisor_position","type":"text","required":true,"labels":{"pl":"Stanowisko przełożonego (np. Dyrektor Działu)","en":"Supervisor Position (e.g., Department Manager)","uk":"Посада керівника (напр., Керівник відділу)","de":"Vorgesetztenposition (z.B. Abteilungsleiter)"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia urlopu","en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia urlopu","en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende"}},
                    {"name":"leave_days","type":"number","required":true,"labels":{"pl":"Liczba dni urlopu","en":"Number of leave days","uk":"Кількість днів відпустки","de":"Anzahl der Urlaubstage"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o urlop wypoczynkowy',
                        'description' => 'Oficjalny wniosek pracownika o udzielenie płatnego urlopu wypoczynkowego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[supervisor_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O URLOP WYPOCZYNKOWY</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o udzielenie mi urlopu wypoczynkowego w wymiarze [[leave_days]] dni,</p>
                                <p>w okresie od dnia <strong>[[leave_start_date]]</strong> do dnia <strong>[[leave_end_date]]</strong>.</p>
                                <p>Urlop ten zostanie wykorzystany zgodnie z przysługującym mi prawem do urlopu wypoczynkowego.</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Annual Paid Leave Application',
                        'description' => 'An official employee request for annual paid leave.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To: <strong>[[supervisor_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANNUAL PAID LEAVE APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request for annual leave for [[leave_days]] days,</p>
                                <p>for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>.</p>
                                <p>This leave will be taken in accordance with my right to annual leave.</p>
                                <p>I kindly ask for a positive consideration of my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на щорічну оплачувану відпустку',
                        'description' => 'Офіційна заява працівника про надання щорічної оплачуваної відпустки.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До: <strong>[[supervisor_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА НА ЩОРІЧНУ ОПЛАЧУВАНУ ВІДПУСТКУ</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про надання мені щорічної відпустки у розмірі [[leave_days]] днів,</p>
                                <p>у період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>.</p>
                                <p>Ця відпустка буде використана відповідно до мого права на щорічну відпустку.</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Jahresurlaub',
                        'description' => 'Ein offizieller Antrag des Arbeitnehmers auf Jahresurlaub.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An: <strong>[[supervisor_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANTRAG AUF JAHRESURLAUB</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit bitte ich höflich um Gewährung von Jahresurlaub im Umfang von [[leave_days]] Tagen,</p>
                                <p>für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis zum <strong>[[leave_end_date]]</strong>.</p>
                                <p>Dieser Urlaub wird gemäß meinem Anspruch auf Jahresurlaub in Anspruch genommen.</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
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

            // --- 14. Заявление на отпуск за свой счет (без сохранения заработной платы) / Application for Unpaid Leave ---
            [
                'slug' => 'unpaid-leave-application-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"supervisor_position","type":"text","required":true,"labels":{"pl":"Stanowisko przełożonego","en":"Supervisor Position","uk":"Посада керівника","de":"Vorgesetztenposition"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia urlopu","en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia urlopu","en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende"}},
                    {"name":"reason_for_leave","type":"textarea","required":true,"labels":{"pl":"Uzasadnienie wniosku","en":"Reason for Application","uk":"Обґрунтування заяви","de":"Begründung des Antrags"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o urlop bezpłatny',
                        'description' => 'Oficjalny wniosek pracownika o udzielenie urlopu bezpłatnego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[supervisor_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O URLOP BEZPŁATNY</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o udzielenie mi urlopu bezpłatnego w okresie od dnia <strong>[[leave_start_date]]</strong> do dnia <strong>[[leave_end_date]]</strong>, z powodu:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Unpaid Leave',
                        'description' => 'An official employee request for unpaid leave.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To: <strong>[[supervisor_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">APPLICATION FOR UNPAID LEAVE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request for unpaid leave for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>, due to:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>I kindly ask for a positive consideration of my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на відпустку за свій рахунок (без збереження заробітної плати)',
                        'description' => 'Офіційна заява працівника про надання відпустки без збереження заробітної плати.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До: <strong>[[supervisor_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА НА ВІДПУСТКУ БЕЗ ЗБЕРЕЖЕННЯ ЗАРОБІТНОЇ ПЛАТИ</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про надання мені відпустки без збереження заробітної плати у період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>, з причини:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf unbezahlten Urlaub',
                        'description' => 'Ein offizieller Antrag des Arbeitnehmers auf unbezahlten Urlaub.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An: <strong>[[supervisor_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANTRAG AUF UNBEZAHLTEN URLAUB</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit bitte ich höflich um Gewährung von unbezahltem Urlaub für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis zum <strong>[[leave_end_date]]</strong>, aufgrund von:</p>
                                <p>[[reason_for_leave]]</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
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

            // --- 15. Заявление на учебный отпуск / Study Leave Application ---
            [
                'slug' => 'study-leave-application-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"supervisor_position","type":"text","required":true,"labels":{"pl":"Stanowisko przełożonego","en":"Supervisor Position","uk":"Посада керівника","de":"Vorgesetztenposition"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia urlopu","en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia urlopu","en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende"}},
                    {"name":"educational_institution","type":"text","required":true,"labels":{"pl":"Nazwa uczelni/instytucji edukacyjnej","en":"Educational Institution Name","uk":"Назва навчального закладу","de":"Name der Bildungseinrichtung"}},
                    {"name":"purpose_of_leave","type":"textarea","required":true,"labels":{"pl":"Cel urlopu (np. egzaminy, obrona pracy)","en":"Purpose of Leave (e.g., exams, thesis defense)","uk":"Мета відпустки (напр., іспити, захист роботи)","de":"Zweck des Urlaubs (z.B. Prüfungen, Verteidigung der Abschlussarbeit)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o urlop szkoleniowy',
                        'description' => 'Oficjalny wniosek pracownika o udzielenie urlopu szkoleniowego na cele edukacyjne.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[supervisor_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O URLOP SZKOLENIOWY</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o udzielenie mi urlopu szkoleniowego w okresie od dnia <strong>[[leave_start_date]]</strong> do dnia <strong>[[leave_end_date]]</strong>, w związku z moim kształceniem w [[educational_institution]].</p>
                                <p>Celem urlopu jest: [[purpose_of_leave]].</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Study Leave Application',
                        'description' => 'An official employee request for study leave for educational purposes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STUDY LEAVE APPLICATION</h1><p style="font-size: 14px;"></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request for study leave for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>, in connection with my education at [[educational_institution]].</p>
                                <p>The purpose of the leave is: [[purpose_of_leave]].</p>
                                <p>I kindly ask for a positive consideration of my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на навчальну відпустку',
                        'description' => 'Офіційна заява працівника про надання навчальної відпустки для освітніх цілей.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА НА НАВЧАЛЬНУ ВІДПУСТКУ</h1><p style="font-size: 14px;"></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про надання мені навчальної відпустки у період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>, у зв\'язку з моїм навчанням у [[educational_institution]].</p>
                                <p>Мета відпустки: [[purpose_of_leave]].</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Bildungsurlaub',
                        'description' => 'Ein offizieller Antrag des Arbeitnehmers auf Bildungsurlaub für Bildungszwecke.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF BILDUNGSURLAUB</h1><p style="font-size: 14px;"></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit bitte ich höflich um Gewährung von Bildungsurlaub für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis zum <strong>[[leave_end_date]]</strong>, im Zusammenhang mit meiner Ausbildung bei [[educational_institution]].</p>
                                <p>Zweck des Urlaubs ist: [[purpose_of_leave]].</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 16. Заявление на отпуск по уходу за ребенком / Parental Leave Application ---
            [
                'slug' => 'parental-leave-application-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"supervisor_position","type":"text","required":true,"labels":{"pl":"Stanowisko przełożonego","en":"Supervisor Position","uk":"Посада керівника","de":"Vorgesetztenposition"}},
                    {"name":"child_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko dziecka","en":"Child\'s Full Name","uk":"Ім\'я та прізвище дитини","de":"Vollständiger Name des Kindes"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"pl":"Data urodzenia dziecka","en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia urlopu","en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia urlopu","en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o urlop wychowawczy',
                        'description' => 'Oficjalny wniosek pracownika o udzielenie urlopu wychowawczego na opiekę nad dzieckiem.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[supervisor_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O URLOP WYCHOWAWCZY</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o udzielenie mi urlopu wychowawczego na opiekę nad dzieckiem [[child_name]], urodzonym dnia [[child_dob]],</p>
                                <p>w okresie od dnia <strong>[[leave_start_date]]</strong> do dnia <strong>[[leave_end_date]]</strong>.</p>
                                <p>Urlop ten zostanie wykorzystany zgodnie z przysługującymi mi uprawnieniami.</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Parental Leave Application',
                        'description' => 'An official employee request for parental leave to care for a child.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To: <strong>[[supervisor_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">PARENTAL LEAVE APPLICATION</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request for parental leave to care for my child [[child_name]], born on [[child_dob]],</p>
                                <p>for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>.</p>
                                <p>This leave will be taken in accordance with my entitlements.</p>
                                <p>I kindly ask for a positive consideration of my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на відпустку по догляду за дитиною',
                        'description' => 'Офіційна заява працівника про надання відпустки по догляду за дитиною.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЗАЯВА НА ВІДПУСТКУ ПО ДОГЛЯДУ ЗА ДИТИНОЮ</h1><p style="font-size: 14px;"></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про надання мені відпустки по догляду за дитиною [[child_name]], яка народилася [[child_dob]],</p>
                                <p>у період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>.</p>
                                <p>Ця відпустка буде використана відповідно до моїх прав.</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Elternzeit',
                        'description' => 'Ein offizieller Antrag des Arbeitnehmers auf Elternzeit zur Betreuung eines Kindes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANTRAG AUF ELTERNZEIT</h1><p style="font-size: 14px;"></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit bitte ich höflich um Gewährung von Elternzeit zur Betreuung meines Kindes [[child_name]], geboren am [[child_dob]],</p>
                                <p>für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis zum <strong>[[leave_end_date]]</strong>.</p>
                                <p>Dieser Urlaub wird gemäß meinen Ansprüchen genommen.</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
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
            // --- 17. Приказ на отпуск / Order for Leave ---
            [
                'slug' => 'order-for-leave-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"order_number","type":"text","required":true,"labels":{"pl":"Numer zarządzenia","en":"Order Number","uk":"Номер наказу","de":"Anordnungsnummer"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"leave_type","type":"text","required":true,"labels":{"pl":"Rodzaj urlopu (np. wypoczynkowy, bezpłatny)","en":"Type of Leave (e.g., annual, unpaid)","uk":"Тип відпустки (напр., щорічна, без збереження з/п)","de":"Urlaubsart (z.B. Jahresurlaub, unbezahlter Urlaub)"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia urlopu","en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia urlopu","en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende"}},
                    {"name":"leave_days","type":"number","required":true,"labels":{"pl":"Liczba dni urlopu","en":"Number of leave days","uk":"Кількість днів відпустки","de":"Anzahl der Urlaubstage"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zarządzenie o udzieleniu urlopu',
                        'description' => 'Oficjalny dokument wewnętrzny firmy o udzieleniu pracownikowi urlopu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZARZĄDZENIE O UDZIELENIU URLOPU</h1><p style="font-size: 14px;">Numer: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Na podstawie złożonego wniosku, niniejszym zarządzam udzielenie urlopu:</p>
                                <p>Pana/Pani: <strong>[[employee_full_name]]</strong></p>
                                <p>Zatrudnionemu na stanowisku: [[employee_position]]</p>
                                <p>Rodzaj urlopu: <strong>[[leave_type]]</strong></p>
                                <p>W okresie od dnia: <strong>[[leave_start_date]]</strong> do dnia: <strong>[[leave_end_date]]</strong></p>
                                <p>Wymiar urlopu: [[leave_days]] dni</p>
                                <br/>
                                <p>Zarządzenie wchodzi w życie z dniem podpisania.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Podpis upoważnionej osoby)</p>
                                <br>
                                <p>Do wiadomości: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Order for Leave',
                        'description' => 'An official internal company document regarding granting leave to an employee.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ORDER FOR LEAVE</h1><p style="font-size: 14px;">Number: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Based on the submitted application, I hereby order the granting of leave to:</p>
                                <p>Mr./Ms.: <strong>[[employee_full_name]]</strong></p>
                                <p>Employed in the position: [[employee_position]]</p>
                                <p>Type of leave: <strong>[[leave_type]]</strong></p>
                                <p>For the period from: <strong>[[leave_start_date]]</strong> to: <strong>[[leave_end_date]]</strong></p>
                                <p>Number of leave days: [[leave_days]] days</p>
                                <br/>
                                <p>This order comes into force on the date of signing.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Signature of authorized person)</p>
                                <br>
                                <p>For information: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Наказ про надання відпустки',
                        'description' => 'Офіційний внутрішній документ компанії про надання працівнику відпустки.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">НАКАЗ ПРО НАДАННЯ ВІДПУСТКИ</h1><p style="font-size: 14px;">Номер: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>На підставі поданої заяви, цим наказую надати відпустку:</p>
                                <p>Пану/Пані: <strong>[[employee_full_name]]</strong></p>
                                <p>Який/яка працює на посаді: [[employee_position]]</p>
                                <p>Вид відпустки: <strong>[[leave_type]]</strong></p>
                                <p>У період з: <strong>[[leave_start_date]]</strong> по: <strong>[[leave_end_date]]</strong></p>
                                <p>Кількість днів відпустки: [[leave_days]] днів</p>
                                <br/>
                                <p>Наказ набирає чинності з дня підписання.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Підпис уповноваженої особи)</p>
                                <br>
                                <p>До відома: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Anordnung zur Gewährung von Urlaub',
                        'description' => 'Ein offizielles internes Firmendokument zur Gewährung von Urlaub an einen Mitarbeiter.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANORDNUNG ZUR GEWÄHRUNG VON URLAUB</h1><p style="font-size: 14px;">Nummer: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Aufgrund des eingereichten Antrags ordne ich hiermit die Gewährung von Urlaub an:</p>
                                <p>Herrn/Frau: <strong>[[employee_full_name]]</strong></p>
                                <p>Angestellt auf der Position: [[employee_position]]</p>
                                <p>Urlaubsart: <strong>[[leave_type]]</strong></p>
                                <p>Im Zeitraum vom: <strong>[[leave_start_date]]</strong> bis zum: <strong>[[leave_end_date]]</strong></p>
                                <p>Umfang des Urlaubs: [[leave_days]] Tage</p>
                                <br/>
                                <p>Diese Anordnung tritt mit dem Datum der Unterzeichnung in Kraft.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Unterschrift der bevollmächtigten Person)</p>
                                <br>
                                <p>Zur Kenntnisnahme: [[employee_full_name]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- 18. Заявление на увольнение по собственному желанию / Resignation Letter ---
            [
                'slug' => 'resignation-letter-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Anschrift des Mitarbeiters"}},
                    {"name":"applicant_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"recipient_position","type":"text","required":true,"labels":{"pl":"Stanowisko odbiorcy (np. Dyrektor Działu Kadr)","en":"Recipient Position (e.g., HR Director)","uk":"Посада одержувача (напр., Директор відділу кадрів)","de":"Empfängerposition (z.B. Personalleiter)"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"pl":"Data rozwiązania umowy","en":"Termination Date","uk":"Дата розірвання договору","de":"Kündigungsdatum"}},
                    {"name":"notice_period_days","type":"number","required":true,"labels":{"pl":"Okres wypowiedzenia (dni)","en":"Notice Period (days)","uk":"Термін попередження (дні)","de":"Kündigungsfrist (Tage)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wypowiedzenie umowy o pracę (za porozumieniem stron)',
                        'description' => 'Oficjalne oświadczenie pracownika o zamiarze rozwiązania umowy o pracę za porozumieniem stron.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Wypowiedzenie umowy o pracę za porozumieniem stron</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym, za porozumieniem stron, wypowiadam umowę o pracę zawartą w dniu [[start_date]] pomiędzy mną a firmą [[company_name]], z zachowaniem [[notice_period_days]]-dniowego okresu wypowiedzenia.</p>
                                <p>W związku z powyższym, umowa o pracę ulegnie rozwiązaniu z dniem <strong>[[termination_date]]</strong>.</p>
                                <p>Proszę o potwierdzenie przyjęcia niniejszego wypowiedzenia.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Resignation Letter (by mutual agreement)',
                        'description' => 'An official employee statement of intent to terminate the employment contract by mutual agreement.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Resignation Letter (by Mutual Agreement)</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby, by mutual agreement, terminate the employment contract concluded on [[start_date]] between myself and [[company_name]], with a [[notice_period_days]]-day notice period.</p>
                                <p>Therefore, the employment contract will be terminated on <strong>[[termination_date]]</strong>.</p>
                                <p>Please confirm receipt of this resignation.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на звільнення за власним бажанням',
                        'description' => 'Офіційна заява працівника про намір розірвати трудовий договір за власним бажанням.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА НА ЗВІЛЬНЕННЯ ЗА ВЛАСНИМ БАЖАННЯМ</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим, за власним бажанням, розриваю трудовий договір, укладений [[start_date]] між мною та компанією [[company_name]], з дотриманням [[notice_period_days]]-денного терміну попередження.</p>
                                <p>У зв\'язку з вищевикладеним, трудовий договір буде розірвано з <strong>[[termination_date]]</strong>.</p>
                                <p>Прошу підтвердити отримання цієї заяви.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Kündigungsschreiben (einvernehmlich)',
                        'description' => 'Eine offizielle Erklärung des Arbeitnehmers über die Absicht, den Arbeitsvertrag einvernehmlich zu beenden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">Kündigung des Arbeitsvertrags (einvernehmlich)</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit kündige ich den am [[start_date]] zwischen mir und der Firma [[company_name]] geschlossenen Arbeitsvertrag einvernehmlich, unter Einhaltung einer Kündigungsfrist von [[notice_period_days]] Tagen.</p>
                                <p>Demzufolge wird der Arbeitsvertrag zum <strong>[[termination_date]]</strong> aufgelöst.</p>
                                <p>Bitte bestätigen Sie den Erhalt dieser Kündigung.</p>
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

            // --- 19. Заявление на увольнение по соглашению сторон / Application for Termination by Mutual Agreement ---
            [
                'slug' => 'termination-mutual-agreement-application-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"recipient_position","type":"text","required":true,"labels":{"pl":"Stanowisko odbiorcy","en":"Recipient Position","uk":"Посада одержувача","de":"Empfängerposition"}},
                    {"name":"proposed_termination_date","type":"date","required":true,"labels":{"pl":"Proponowana data rozwiązania umowy","en":"Proposed Termination Date","uk":"Пропонована дата розірвання договору","de":"Vorgeschlagenes Kündigungsdatum"}},
                    {"name":"reason","type":"textarea","required":false,"labels":{"pl":"Uzasadnienie (opcjonalnie)","en":"Reason (optional)","uk":"Обґрунтування (необов\'язково)","de":"Begründung (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wniosek o rozwiązanie umowy o pracę za porozumieniem stron',
                        'description' => 'Wniosek pracownika o rozwiązanie umowy o pracę za obopólną zgodą.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WNIOSEK O ROZWIĄZANIE UMOWY O PRACĘ ZA POROZUMIENIEM STRON</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zwracam się z uprzejmą prośbą o rozwiązanie umowy o pracę zawartej w dniu [[start_date]] pomiędzy mną a firmą [[company_name]], za porozumieniem stron, z dniem <strong>[[proposed_termination_date]]</strong>.</p>
                                <p>[[reason]]</p>
                                <p>Proszę o pozytywne rozpatrzenie mojego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Application for Termination of Employment Contract by Mutual Agreement',
                        'description' => 'An employee\'s request to terminate the employment contract by mutual consent.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">APPLICATION FOR TERMINATION OF EMPLOYMENT CONTRACT BY MUTUAL AGREEMENT</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I hereby kindly request to terminate the employment contract concluded on [[start_date]] between myself and [[company_name]], by mutual agreement, effective <strong>[[proposed_termination_date]]</strong>.</p>
                                <p>[[reason]]</p>
                                <p>I kindly ask for a positive consideration of my application.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на звільнення за угодою сторін',
                        'description' => 'Заява працівника про розірвання трудового договору за взаємною згодою.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ЗАЯВА НА ЗВІЛЬНЕННЯ ЗА УГОДОЮ СТОРІН</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Звертаюся з покірним проханням про розірвання трудового договору, укладеного [[start_date]] між мною та компанією [[company_name]], за угодою сторін, з <strong>[[proposed_termination_date]]</strong>.</p>
                                <p>[[reason]]</p>
                                <p>Прошу позитивно розглянути мою заяву.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Beendigung des Arbeitsvertrags im gegenseitigen Einvernehmen',
                        'description' => 'Ein Antrag des Arbeitnehmers auf Beendigung des Arbeitsvertrags im gegenseitigen Einvernehmen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANTRAG AUF BEENDIGUNG DES ARBEITSVERTRAGS IM GEGENSEITIGEN EINVERNEHMEN</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit bitte ich höflich um Beendigung des am [[start_date]] zwischen mir und der Firma [[company_name]] geschlossenen Arbeitsvertrags im gegenseitigen Einvernehmen zum <strong>[[proposed_termination_date]]</strong>.</p>
                                <p>[[reason]]</p>
                                <p>Ich bitte Sie, meinen Antrag positiv zu prüfen.</p>
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

            // --- 20. Соглашение о расторжении трудового договора / Employment Contract Termination Agreement ---
            [
                'slug' => 'employment-contract-termination-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"employer_name","type":"text","required":true,"labels":{"pl":"Nazwa pracodawcy","en":"Employer Name","uk":"Назва роботодавця","de":"Name des Arbeitgebers"}},
                    {"name":"employer_address","type":"text","required":true,"labels":{"pl":"Adres pracodawcy","en":"Employer Address","uk":"Адреса роботодавця","de":"Anschrift des Arbeitgebers"}},
                    {"name":"employee_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Name","uk":"Ім\'я та прізвище працівника","de":"Name des Arbeitnehmers"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"pl":"Adres pracownika","en":"Employee Address","uk":"Адреса працівника","de":"Anschrift des Arbeitnehmers"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"pl":"Data rozwiązania umowy","en":"Termination Date","uk":"Дата розірвання договору","de":"Kündigungsdatum"}},
                    {"name":"reason_for_termination","type":"textarea","required":false,"labels":{"pl":"Przyczyna rozwiązania (opcjonalnie)","en":"Reason for Termination (optional)","uk":"Причина розірвання (необов\'язково)","de":"Grund der Beendigung (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Porozumienie o rozwiązaniu umowy o pracę',
                        'description' => 'Oficjalne porozumienie między pracodawcą a pracownikiem w sprawie rozwiązania umowy o pracę.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POROZUMIENIE O ROZWIĄZANIU UMOWY O PRACĘ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarte w [[city]]</p></td><td style="text-align: right;"><p>dnia ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>[[employer_name]]</strong> z siedzibą w [[employer_address]], zwanym/ą dalej "Pracodawcą",</p>
                                <p>a</p>
                                <p>Panem/Panią <strong>[[employee_name]]</strong>, zamieszkałym/ą w [[employee_address]], zwanym/ą dalej "Pracownikiem".</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Rozwiązanie umowy</h2>
                                <p>Strony zgodnie postanawiają rozwiązać umowę o pracę zawartą w dniu [[start_date]] z dniem <strong>[[termination_date]]</strong>.</p>
                                <p>[[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Postanowienia końcowe</h2>
                                <p>Niniejsze porozumienie sporządzono w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Pracodawca</p></td>
                                <td width="50%"><p>___________________<br>Pracownik</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Employment Contract Termination Agreement',
                        'description' => 'An official agreement between the employer and employee regarding the termination of the employment contract.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EMPLOYMENT CONTRACT TERMINATION AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>[[employer_name]]</strong> with its registered office in [[employer_address]], hereinafter referred to as the "Employer",</p>
                                <p>and</p>
                                <p>Mr./Ms. <strong>[[employee_name]]</strong>, residing in [[employee_address]], hereinafter referred to as the "Employee".</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Termination of Contract</h2>
                                <p>The parties mutually agree to terminate the employment contract concluded on [[start_date]] effective <strong>[[termination_date]]</strong>.</p>
                                <p>[[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Final Provisions</h2>
                                <p>This agreement has been drawn up in two identical copies, one for each party.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employer</p></td>
                                <td width="50%"><p>___________________<br>Employee</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про розірвання трудового договору',
                        'description' => 'Офіційна угода між роботодавцем та працівником щодо розірвання трудового договору.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА ПРО РОЗІРВАННЯ ТРУДОВОГО ДОГОВОРУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>[[employer_name]]</strong> з місцезнаходженням у [[employer_address]], надалі іменований "Роботодавець",</p>
                                <p>та</p>
                                <p>Паном/Пані <strong>[[employee_name]]</strong>, який/яка проживає у [[employee_address]], надалі іменований "Працівник".</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Розірвання договору</h2>
                                <p>Сторони за взаємною згодою вирішують розірвати трудовий договір, укладений [[start_date]], з <strong>[[termination_date]]</strong>.</p>
                                <p>[[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Прикінцеві положення</h2>
                                <p>Ця угода складена у двох однакових примірниках, по одному для кожної сторони.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Роботодавець</p></td>
                                <td width="50%"><p>___________________<br>Працівник</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Vereinbarung zur Beendigung des Arbeitsvertrags',
                        'description' => 'Eine offizielle Vereinbarung zwischen Arbeitgeber und Arbeitnehmer über die Beendigung des Arbeitsvertrags.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VEREINBARUNG ZUR BEENDIGUNG DES ARBEITSVERTRAGS</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>[[employer_name]]</strong> mit Sitz in [[employer_address]], im Folgenden "Arbeitgeber" genannt,</p>
                                <p>und</p>
                                <p>Herrn/Frau <strong>[[employee_name]]</strong>, wohnhaft in [[employee_address]], im Folgenden "Arbeitnehmer" genannt.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 1. Vertragsbeendigung</h2>
                                <p>Die Parteien vereinbaren einvernehmlich, den am [[start_date]] geschlossenen Arbeitsvertrag zum <strong>[[termination_date]]</strong> zu beenden.</p>
                                <p>[[reason_for_termination]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px; text-align:center;">§ 2. Schlussbestimmungen</h2>
                                <p>Diese Vereinbarung wurde in zwei gleichlautenden Exemplaren ausgefertigt, je eines für jede Partei.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Arbeitgeber</p></td>
                                <td width="50%"><p>___________________<br>Arbeitnehmer</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 21. Приказ об увольнении / Order of Dismissal ---
            [
                'slug' => 'order-of-dismissal-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"order_number","type":"text","required":true,"labels":{"pl":"Numer zarządzenia","en":"Order Number","uk":"Номер наказу","de":"Anordnungsnummer"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_pesel","type":"text","required":true,"labels":{"pl":"PESEL pracownika","en":"Employee PESEL","uk":"ПЕСЕЛЬ працівника","de":"PESEL des Mitarbeiters"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"termination_date","type":"date","required":true,"labels":{"pl":"Data rozwiązania umowy","en":"Termination Date","uk":"Дата розірвання договору","de":"Kündigungsdatum"}},
                    {"name":"termination_reason","type":"textarea","required":true,"labels":{"pl":"Podstawa prawna rozwiązania umowy","en":"Legal basis for termination","uk":"Правова підстава розірвання договору","de":"Rechtsgrundlage der Kündigung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Zarządzenie o rozwiązaniu umowy o pracę',
                        'description' => 'Oficjalny dokument wewnętrzny firmy o rozwiązaniu umowy o pracę z pracownikiem.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ZARZĄDZENIE O ROZWIĄZANIU UMOWY O PRACĘ</h1><p style="font-size: 14px;">Numer: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Na podstawie [[termination_reason]], niniejszym zarządzam rozwiązanie umowy o pracę z:</p>
                                <p>Panem/Panią: <strong>[[employee_full_name]]</strong></p>
                                <p>PESEL: [[employee_pesel]]</p>
                                <p>Zatrudnionym na stanowisku: [[employee_position]]</p>
                                <p>Z dniem: <strong>[[termination_date]]</strong></p>
                                <br/>
                                <p>Zarządzenie wchodzi w życie z dniem podpisania.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Podpis upoważnionej osoby)</p>
                                <br>
                                <p>Do wiadomości: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Order of Termination of Employment Contract',
                        'description' => 'An official internal company document regarding the termination of an employee\'s employment contract.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ORDER OF TERMINATION OF EMPLOYMENT CONTRACT</h1><p style="font-size: 14px;">Number: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Based on [[termination_reason]], I hereby order the termination of the employment contract with:</p>
                                <p>Mr./Ms.: <strong>[[employee_full_name]]</strong></p>
                                <p>PESEL: [[employee_pesel]]</p>
                                <p>Employed in the position: [[employee_position]]</p>
                                <p>Effective from: <strong>[[termination_date]]</strong></p>
                                <br/>
                                <p>This order comes into force on the date of signing.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Signature of authorized person)</p>
                                <br>
                                <p>For information: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Наказ про звільнення',
                        'description' => 'Офіційний внутрішній документ компанії про розірвання трудового договору з працівником.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">НАКАЗ ПРО ЗВІЛЬНЕННЯ</h1><p style="font-size: 14px;">Номер: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>На підставі [[termination_reason]], цим наказую розірвати трудовий договір з:</p>
                                <p>Паном/Пані: <strong>[[employee_full_name]]</strong></p>
                                <p>ПЕСЕЛЬ: [[employee_pesel]]</p>
                                <p>Який/яка працює на посаді: [[employee_position]]</p>
                                <p>З дати: <strong>[[termination_date]]</strong></p>
                                <br/>
                                <p>Наказ набирає чинності з дня підписання.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Підпис уповноваженої особи)</p>
                                <br>
                                <p>До відома: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Anordnung zur Kündigung des Arbeitsvertrags',
                        'description' => 'Ein offizielles internes Firmendokument zur Kündigung des Arbeitsvertrags eines Mitarbeiters.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANORDNUNG ZUR KÜNDIGUNG DES ARBEITSVERTRAGS</h1><p style="font-size: 14px;">Nummer: [[order_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Auf der Grundlage von [[termination_reason]] ordne ich hiermit die Kündigung des Arbeitsvertrags mit an:</p>
                                <p>Herrn/Frau: <strong>[[employee_full_name]]</strong></p>
                                <p>PESEL: [[employee_pesel]]</p>
                                <p>Angestellt auf der Position: [[employee_position]]</p>
                                <p>Mit Wirkung zum: <strong>[[termination_date]]</strong></p>
                                <br/>
                                <p>Diese Anordnung tritt mit dem Datum der Unterzeichnung in Kraft.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>(Unterschrift der bevollmächtigten Person)</p>
                                <br>
                                <p>Zur Kenntnisnahme: [[employee_full_name]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- 22. Рекомендательное письмо / Recommendation Letter ---
            [
                'slug' => 'recommendation-letter-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"recommender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko wystawiającego","en":"Recommender Full Name","uk":"ПІБ того, хто надає рекомендацію","de":"Vollständiger Name des Empfehlers"}},
                    {"name":"recommender_position","type":"text","required":true,"labels":{"pl":"Stanowisko wystawiającego","en":"Recommender Position","uk":"Посада того, хто надає рекомендацію","de":"Position des Empfehlers"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"employment_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia pracy","en":"Employment Start Date","uk":"Дата початку роботи","de":"Beginn der Beschäftigung"}},
                    {"name":"employment_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia pracy (jeśli dotyczy)","en":"Employment End Date (if applicable)","uk":"Дата закінчення роботи (якщо застосовно)","de":"Ende der Beschäftigung (falls zutreffend)"}},
                    {"name":"achievements_and_qualities","type":"textarea","required":true,"labels":{"pl":"Opis osiągnięć i cech pracownika","en":"Description of employee\'s achievements and qualities","uk":"Опис досягнень та якостей працівника","de":"Beschreibung der Leistungen und Eigenschaften des Mitarbeiters"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'List referencyjny',
                        'description' => 'Oficjalny list zawierający rekomendację dla byłego lub obecnego pracownika.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIST REFERENCYJNY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[city]], ' . date('d.m.Y') . ' r.</p></td><td style="text-align: right;"><p><strong>[[recommender_full_name]]</strong><br>[[recommender_position]]<br>[[company_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym potwierdzam, że Pan/Pani <strong>[[employee_full_name]]</strong> był/a zatrudniony/a w firmie [[company_name]] na stanowisku <strong>[[employee_position]]</strong> w okresie od [[employment_start_date]] do [[employment_end_date]].</p>
                                <p>W trakcie swojej pracy Pan/Pani [[employee_full_name]] wykazał/a się [[achievements_and_qualities]].</p>
                                <p>Z pełnym przekonaniem rekomenduję Pana/Panią [[employee_full_name]] jako wartościowego i kompetentnego pracownika.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[recommender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Recommendation Letter',
                        'description' => 'An official letter providing a recommendation for a former or current employee.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECOMMENDATION LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[city]], ' . date('F j, Y') . '</p></td><td style="text-align: right;"><p><strong>[[recommender_full_name]]</strong><br>[[recommender_position]]<br>[[company_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This is to confirm that Mr./Ms. <strong>[[employee_full_name]]</strong> was employed by [[company_name]] in the position of <strong>[[employee_position]]</strong> from [[employment_start_date]] to [[employment_end_date]].</p>
                                <p>During their employment, Mr./Ms. [[employee_full_name]] demonstrated [[achievements_and_qualities]].</p>
                                <p>I wholeheartedly recommend Mr./Ms. [[employee_full_name]] as a valuable and competent employee.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[recommender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Рекомендаційний лист',
                        'description' => 'Офіційний лист, що містить рекомендацію для колишнього або поточного працівника.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РЕКОМЕНДАЦІЙНИЙ ЛИСТ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[city]], ' . date('d.m.Y') . ' р.</p></td><td style="text-align: right;"><p><strong>[[recommender_full_name]]</strong><br>[[recommender_position]]<br>[[company_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим підтверджую, що Пан/Пані <strong>[[employee_full_name]]</strong> був/ла працевлаштований/а у компанії [[company_name]] на посаді <strong>[[employee_position]]</strong> у період з [[employment_start_date]] по [[employment_end_date]].</p>
                                <p>Під час своєї роботи Пан/Пані [[employee_full_name]] проявив/ла себе як [[achievements_and_qualities]].</p>
                                <p>З повною впевненістю рекомендую Пана/Пані [[employee_full_name]] як цінного та компетентного працівника.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[recommender_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Empfehlungsschreiben',
                        'description' => 'Ein offizielles Schreiben mit einer Empfehlung für einen ehemaligen oder aktuellen Mitarbeiter.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EMPFEHLUNGSSCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[city]], den ' . date('d.m.Y') . '</p></td><td style="text-align: right;"><p><strong>[[recommender_full_name]]</strong><br>[[recommender_position]]<br>[[company_name]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit bestätige ich, dass Herr/Frau <strong>[[employee_full_name]]</strong> bei der Firma [[company_name]] auf der Position <strong>[[employee_position]]</strong> im Zeitraum vom [[employment_start_date]] bis zum [[employment_end_date]] beschäftigt war.</p>
                                <p>Während seiner/ihrer Tätigkeit hat Herr/Frau [[employee_full_name]] [[achievements_and_qualities]] gezeigt.</p>
                                <p>Ich empfehle Herrn/Frau [[employee_full_name]] mit voller Überzeugung als wertvollen und kompetenten Mitarbeiter.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[recommender_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 23. Характеристика на сотрудника / Employee Performance Review / Character Reference ---
            [
                'slug' => 'employee-performance-review-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"employment_period","type":"text","required":true,"labels":{"pl":"Okres zatrudnienia","en":"Employment Period","uk":"Період працевлаштування","de":"Beschäftigungszeitraum"}},
                    {"name":"responsibilities_summary","type":"textarea","required":true,"labels":{"pl":"Podsumowanie obowiązków","en":"Summary of Responsibilities","uk":"Короткий опис обов\'язків","de":"Zusammenfassung der Aufgaben"}},
                    {"name":"performance_evaluation","type":"textarea","required":true,"labels":{"pl":"Ocena pracy i cech osobistych","en":"Evaluation of work and personal qualities","uk":"Оцінка роботи та особистих якостей","de":"Bewertung der Arbeit und persönlichen Eigenschaften"}},
                    {"name":"reviewer_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko osoby wystawiającej","en":"Reviewer Full Name","uk":"ПІБ того, хто складає характеристику","de":"Vollständiger Name des Erstellers"}},
                    {"name":"reviewer_position","type":"text","required":true,"labels":{"pl":"Stanowisko osoby wystawiającej","en":"Reviewer Position","uk":"Посада того, хто складає характеристику","de":"Position des Erstellers"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Charakterystyka pracownika',
                        'description' => 'Dokument opisujący cechy, umiejętności i osiągnięcia pracownika w miejscu pracy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">CHARAKTERYSTYKA PRACOWNIKA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Charakterystyka dotyczy Pana/Pani: <strong>[[employee_full_name]]</strong></p>
                                <p>Zatrudnionego/ej na stanowisku: [[employee_position]]</p>
                                <p>W okresie: [[employment_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Zakres obowiązków</h2>
                                <p>[[responsibilities_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Ocena pracy i cech osobistych</h2>
                                <p>[[performance_evaluation]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>[[reviewer_full_name]]</p>
                                <p>[[reviewer_position]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Employee Performance Review',
                        'description' => 'A document describing an employee\'s characteristics, skills, and achievements in the workplace.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EMPLOYEE PERFORMANCE REVIEW</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This review concerns Mr./Ms.: <strong>[[employee_full_name]]</strong></p>
                                <p>Employed in the position: [[employee_position]]</p>
                                <p>During the period: [[employment_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Summary of Responsibilities</h2>
                                <p>[[responsibilities_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Evaluation of Work and Personal Qualities</h2>
                                <p>[[performance_evaluation]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>[[reviewer_full_name]]</p>
                                <p>[[reviewer_position]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Характеристика на працівника',
                        'description' => 'Документ, що описує риси, навички та досягнення працівника на робочому місці.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ХАРАКТЕРИСТИКА НА ПРАЦІВНИКА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Характеристика стосується Пана/Пані: <strong>[[employee_full_name]]</strong></p>
                                <p>Працевлаштованого/ої на посаді: [[employee_position]]</p>
                                <p>У період: [[employment_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Короткий опис обов\'язків</h2>
                                <p>[[responsibilities_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Оцінка роботи та особистих якостей</h2>
                                <p>[[performance_evaluation]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>[[reviewer_full_name]]</p>
                                <p>[[reviewer_position]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Mitarbeiterbeurteilung',
                        'description' => 'Ein Dokument, das die Eigenschaften, Fähigkeiten und Leistungen eines Mitarbeiters am Arbeitsplatz beschreibt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">MITARBEITERBEURTEILUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Diese Beurteilung betrifft Herrn/Frau: <strong>[[employee_full_name]]</strong></p>
                                <p>Angestellt auf der Position: [[employee_position]]</p>
                                <p>Im Zeitraum: [[employment_period]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Zusammenfassung der Aufgaben</h2>
                                <p>[[responsibilities_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Bewertung der Arbeit und persönlichen Eigenschaften</h2>
                                <p>[[performance_evaluation]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>[[reviewer_full_name]]</p>
                                <p>[[reviewer_position]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- 24. Служебная записка / Memo / Official Note ---
            [
                'slug' => 'official-memo-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_position","type":"text","required":true,"labels":{"pl":"Stanowisko nadawcy","en":"Sender Position","uk":"Посада відправника","de":"Position des Absenders"}},
                    {"name":"recipient_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbiorcy","en":"Recipient Full Name","uk":"ПІБ одержувача","de":"Vollständiger Name des Empfängers"}},
                    {"name":"recipient_position","type":"text","required":true,"labels":{"pl":"Stanowisko odbiorcy","en":"Recipient Position","uk":"Посада одержувача","de":"Position des Empfängers"}},
                    {"name":"subject","type":"text","required":true,"labels":{"pl":"Temat notatki","en":"Subject of Memo","uk":"Тема записки","de":"Betreff der Notiz"}},
                    {"name":"memo_body","type":"textarea","required":true,"labels":{"pl":"Treść notatki","en":"Body of Memo","uk":"Зміст записки","de":"Inhalt der Notiz"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Notatka służbowa',
                        'description' => 'Wewnętrzny dokument firmy służący do komunikacji między pracownikami lub działami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>Do: <strong>[[recipient_full_name]]</strong><br>[[recipient_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Od: <strong>[[sender_full_name]]</strong><br>[[sender_position]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">NOTATKA SŁUŻBOWA</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Temat:</strong> [[subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny/a Panie/Pani,</p>
                                <p>[[memo_body]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Official Memo',
                        'description' => 'An internal company document used for communication between employees or departments.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFFICIAL MEMO</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>To: <strong>[[recipient_full_name]]</strong><br>[[recipient_position]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>From: <strong>[[sender_full_name]]</strong><br>[[sender_position]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">MEMORANDUM</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Subject:</strong> [[subject]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>[[memo_body]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Службова записка',
                        'description' => 'Внутрішній документ компанії, що використовується для комунікації між працівниками або відділами.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">СЛУЖБОВА ЗАПИСКА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>До: <strong>[[recipient_full_name]]</strong><br>[[recipient_position]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Від: <strong>[[sender_full_name]]</strong><br>[[sender_position]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">СЛУЖБОВА ЗАПИСКА</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Тема:</strong> [[subject]]</p>
                                <br/>
                                <p>Шановний/а Пане/Пані,</p>
                                <p>[[memo_body]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Dienstanweisung / Offizielle Notiz',
                        'description' => 'Ein internes Firmendokument zur Kommunikation zwischen Mitarbeitern oder Abteilungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DIENSTANWEISUNG / OFFICIELLE NOTIZ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>An: <strong>[[recipient_full_name]]</strong><br>[[recipient_position]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Von: <strong>[[sender_full_name]]</strong><br>[[sender_position]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">DIENSTANWEISUNG</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Betreff:</strong> [[subject]]</p>
                                <br/>
                                <p>Sehr geehrte/r Herr/Frau,</p>
                                <p>[[memo_body]]</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 25. Объяснительная записка / Explanation Letter ---
            [
                'slug' => 'explanation-letter-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"applicant_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"recipient_position","type":"text","required":true,"labels":{"pl":"Stanowisko przełożonego","en":"Supervisor Position","uk":"Посада керівника","de":"Vorgesetztenposition"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"pl":"Data zdarzenia","en":"Date of Incident","uk":"Дата події","de":"Datum des Vorfalls"}},
                    {"name":"incident_description","type":"textarea","required":true,"labels":{"pl":"Opis zdarzenia i wyjaśnienia","en":"Description of incident and explanation","uk":"Опис події та пояснення","de":"Beschreibung des Vorfalls und Erklärung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Wyjaśnienie',
                        'description' => 'Oficjalne pismo wyjaśniające okoliczności danego zdarzenia lub sytuacji.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">WYJAŚNIENIE</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>W odpowiedzi na Pańskie/Pani zapytanie dotyczące zdarzenia z dnia [[incident_date]], przedstawiam następujące wyjaśnienia:</p>
                                <p>[[incident_description]]</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Explanation Letter',
                        'description' => 'An official letter explaining the circumstances of a particular event or situation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">EXPLANATION LETTER</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>In response to your inquiry regarding the incident on [[incident_date]], I provide the following explanation:</p>
                                <p>[[incident_description]]</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Пояснювальна записка',
                        'description' => 'Офіційний лист, що пояснює обставини певної події або ситуації.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ПОЯСНЮВАЛЬНА ЗАПИСКА</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>У відповідь на Ваш запит щодо події від [[incident_date]], надаю наступні пояснення:</p>
                                <p>[[incident_description]]</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Erklärungsschreiben',
                        'description' => 'Ein offizielles Schreiben zur Erklärung der Umstände eines bestimmten Ereignisses oder einer Situation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p>[[applicant_full_name]]<br>[[applicant_position]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], den ' . date('d.m.Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>An: <strong>[[recipient_position]]</strong><br>[[company_name]]</p>
                                <br/><br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">ERKLÄRUNGSSCHREIBEN</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Als Antwort auf Ihre Anfrage bezüglich des Vorfalls vom [[incident_date]] gebe ich folgende Erklärungen ab:</p>
                                <p>[[incident_description]]</p>
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

            // --- 26. Табель учета рабочего времени / Timesheet ---
            [
                'slug' => 'timesheet-pl',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"reporting_period","type":"text","required":true,"labels":{"pl":"Okres rozliczeniowy (np. miesiąc i rok)","en":"Reporting Period (e.g., month and year)","uk":"Звітний період (напр., місяць і рік)","de":"Berichtszeitraum (z.B. Monat und Jahr)"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"total_working_hours","type":"number","required":true,"labels":{"pl":"Łączna liczba godzin pracy","en":"Total working hours","uk":"Загальна кількість робочих годин","de":"Gesamtarbeitsstunden"}},
                    {"name":"overtime_hours","type":"number","required":false,"labels":{"pl":"Godziny nadliczbowe (opcjonalnie)","en":"Overtime hours (optional)","uk":"Понаднормові години (необов\'язково)","de":"Überstunden (optional)"}},
                    {"name":"absence_days","type":"number","required":false,"labels":{"pl":"Dni nieobecności (opcjonalnie)","en":"Absence days (optional)","uk":"Дні відсутності (необов\'язково)","de":"Abwesenheitstage (optional)"}},
                    {"name":"approver_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko osoby zatwierdzającej","en":"Approver Full Name","uk":"ПІБ того, хто затверджує","de":"Vollständiger Name des Genehmigers"}},
                    {"name":"approver_position","type":"text","required":true,"labels":{"pl":"Stanowisko osoby zatwierdzającej","en":"Approver Position","uk":"Посада того, хто затверджує","de":"Position des Genehmigers"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Karta ewidencji czasu pracy',
                        'description' => 'Dokument służący do rejestrowania czasu pracy pracownika w danym okresie rozliczeniowym.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KARTA EWIDENCJI CZASU PRACY</h1><p style="font-size: 14px;">[[company_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Okres rozliczeniowy: <strong>[[reporting_period]]</strong></p></td><td style="text-align: right;"><p>Data sporządzenia: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Pracownik:</strong> [[employee_full_name]]</p>
                                <p><strong>Stanowisko:</strong> [[employee_position]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Lp.</th>
                                            <th>Data</th>
                                            <th>Godziny pracy</th>
                                            <th>Podpis pracownika</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>01.XX.XXXX</td>
                                            <td>8</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;"><strong>Łącznie godzin pracy:</strong></td>
                                            <td><strong>[[total_working_hours]]</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;">Godziny nadliczbowe:</td>
                                            <td>[[overtime_hours]]</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;">Dni nieobecności:</td>
                                            <td>[[absence_days]]</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br/>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Pracownik</p></td>
                                <td width="50%"><p>___________________<br>[[approver_full_name]]<br>[[approver_position]]</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Timesheet',
                        'description' => 'A document used to record an employee\'s working hours for a given accounting period.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TIMESHEET</h1><p style="font-size: 14px;">[[company_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Reporting Period: <strong>[[reporting_period]]</strong></p></td><td style="text-align: right;"><p>Date of Preparation: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Employee:</strong> [[employee_full_name]]</p>
                                <p><strong>Position:</strong> [[employee_position]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Date</th>
                                            <th>Working Hours</th>
                                            <th>Employee Signature</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>01.XX.XXXX</td>
                                            <td>8</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;"><strong>Total working hours:</strong></td>
                                            <td><strong>[[total_working_hours]]</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;">Overtime hours:</td>
                                            <td>[[overtime_hours]]</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;">Absence days:</td>
                                            <td>[[absence_days]]</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br/>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employee</p></td>
                                <td width="50%"><p>___________________<br>[[approver_full_name]]<br>[[approver_position]]</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Табель обліку робочого часу',
                        'description' => 'Документ, що використовується для обліку робочого часу працівника за певний звітний період.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ТАБЕЛЬ ОБЛІКУ РОБОЧОГО ЧАСУ</h1><p style="font-size: 14px;">[[company_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Звітний період: <strong>[[reporting_period]]</strong></p></td><td style="text-align: right;"><p>Дата складання: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Працівник:</strong> [[employee_full_name]]</p>
                                <p><strong>Посада:</strong> [[employee_position]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Дата</th>
                                            <th>Години роботи</th>
                                            <th>Підпис працівника</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>01.XX.XXXX</td>
                                            <td>8</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;"><strong>Всього робочих годин:</strong></td>
                                            <td><strong>[[total_working_hours]]</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;">Понаднормові години:</td>
                                            <td>[[overtime_hours]]</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;">Дні відсутності:</td>
                                            <td>[[absence_days]]</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br/>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Працівник</p></td>
                                <td width="50%"><p>___________________<br>[[approver_full_name]]<br>[[approver_position]]</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Arbeitszeitnachweis',
                        'description' => 'Ein Dokument zur Erfassung der Arbeitszeit eines Mitarbeiters für einen bestimmten Abrechnungszeitraum.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ARBEITSZEITNACHWEIS</h1><p style="font-size: 14px;">[[company_name]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Berichtszeitraum: <strong>[[reporting_period]]</strong></p></td><td style="text-align: right;"><p>Erstellungsdatum: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Mitarbeiter:</strong> [[employee_full_name]]</p>
                                <p><strong>Position:</strong> [[employee_position]]</p>
                                <br/>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Nr.</th>
                                            <th>Datum</th>
                                            <th>Arbeitsstunden</th>
                                            <th>Unterschrift des Mitarbeiters</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>01.XX.XXXX</td>
                                            <td>8</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td>...</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;"><strong>Gesamtarbeitsstunden:</strong></td>
                                            <td><strong>[[total_working_hours]]</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;">Überstunden:</td>
                                            <td>[[overtime_hours]]</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right;">Abwesenheitstage:</td>
                                            <td>[[absence_days]]</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br/>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Mitarbeiter</p></td>
                                <td width="50%"><p>___________________<br>[[approver_full_name]]<br>[[approver_position]]</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 27. Командировочное удостоверение / Business Trip Certificate ---
            [
                'slug' => 'business-trip-certificate-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"certificate_number","type":"text","required":true,"labels":{"pl":"Numer zaświadczenia","en":"Certificate Number","uk":"Номер посвідчення","de":"Bescheinigungsnummer"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"destination","type":"text","required":true,"labels":{"pl":"Miejsce docelowe podróży","en":"Destination of Trip","uk":"Місце призначення поїздки","de":"Reiseziel"}},
                    {"name":"purpose_of_trip","type":"textarea","required":true,"labels":{"pl":"Cel podróży służbowej","en":"Purpose of Business Trip","uk":"Мета відрядження","de":"Zweck der Geschäftsreise"}},
                    {"name":"trip_start_date","type":"date","required":true,"labels":{"pl":"Data rozpoczęcia podróży","en":"Trip Start Date","uk":"Дата початку поїздки","de":"Reisebeginn"}},
                    {"name":"trip_end_date","type":"date","required":true,"labels":{"pl":"Data zakończenia podróży","en":"Trip End Date","uk":"Дата закінчення поїздки","de":"Reiseende"}},
                    {"name":"approver_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko osoby zatwierdzającej","en":"Approver Full Name","uk":"ПІБ того, хто затверджує","de":"Vollständiger Name des Genehmigers"}},
                    {"name":"approver_position","type":"text","required":true,"labels":{"pl":"Stanowisko osoby zatwierdzającej","en":"Approver Position","uk":"Посада того, хто затверджує","de":"Position des Genehmigers"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Polecenie wyjazdu służbowego',
                        'description' => 'Dokument uprawniający pracownika do odbycia podróży służbowej w określonym celu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POLECENIE WYJAZDU SŁUŻBOWEGO</h1><p style="font-size: 14px;">Numer: [[certificate_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym polecam wyjazd służbowy dla:</p>
                                <p>Pana/Pani: <strong>[[employee_full_name]]</strong></p>
                                <p>Zatrudnionego/ej na stanowisku: [[employee_position]]</p>
                                <p>Do miejscowości: <strong>[[destination]]</strong></p>
                                <p>W celu: [[purpose_of_trip]]</p>
                                <p>W okresie od dnia: <strong>[[trip_start_date]]</strong> do dnia: <strong>[[trip_end_date]]</strong></p>
                                <br/>
                                <p>Pracownikowi przysługują należności z tytułu podróży służbowej zgodnie z obowiązującymi przepisami.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>[[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p>Do wiadomości: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Business Trip Certificate',
                        'description' => 'A document authorizing an employee to undertake a business trip for a specified purpose.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BUSINESS TRIP CERTIFICATE</h1><p style="font-size: 14px;">Number: [[certificate_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This certifies a business trip for:</p>
                                <p>Mr./Ms.: <strong>[[employee_full_name]]</strong></p>
                                <p>Employed in the position: [[employee_position]]</p>
                                <p>To destination: <strong>[[destination]]</strong></p>
                                <p>For the purpose of: [[purpose_of_trip]]</p>
                                <p>For the period from: <strong>[[trip_start_date]]</strong> to: <strong>[[trip_end_date]]</strong></p>
                                <br/>
                                <p>The employee is entitled to business trip allowances in accordance with applicable regulations.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>[[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p>For information: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Посвідчення про відрядження',
                        'description' => 'Документ, що уповноважує працівника на відрядження з певною метою.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОСВІДЧЕННЯ ПРО ВІДРЯДЖЕННЯ</h1><p style="font-size: 14px;">Номер: [[certificate_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим посвідчується відрядження для:</p>
                                <p>Пана/Пані: <strong>[[employee_full_name]]</strong></p>
                                <p>Який/яка працює на посаді: [[employee_position]]</p>
                                <p>До населеного пункту: <strong>[[destination]]</strong></p>
                                <p>З метою: [[purpose_of_trip]]</p>
                                <p>У період з: <strong>[[trip_start_date]]</strong> по: <strong>[[trip_end_date]]</strong></p>
                                <br/>
                                <p>Працівник має право на відрядження відповідно до чинних правил.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>[[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p>До відома: [[employee_full_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Dienstreisebescheinigung',
                        'description' => 'Ein Dokument, das einen Mitarbeiter zur Durchführung einer Dienstreise zu einem bestimmten Zweck berechtigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DIENSTREISEBESCHEINIGUNG</h1><p style="font-size: 14px;">Nummer: [[certificate_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>[[company_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit wird eine Dienstreise angeordnet für:</p>
                                <p>Herrn/Frau: <strong>[[employee_full_name]]</strong></p>
                                <p>Angestellt auf der Position: [[employee_position]]</p>
                                <p>Nach: <strong>[[destination]]</strong></p>
                                <p>Zum Zweck von: [[purpose_of_trip]]</p>
                                <p>Im Zeitraum vom: <strong>[[trip_start_date]]</strong> bis zum: <strong>[[trip_end_date]]</strong></p>
                                <br/>
                                <p>Dem Mitarbeiter stehen Reisekostenvergütungen gemäß den geltenden Vorschriften zu.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <p style="text-align: center;">___________________<br>[[approver_full_name]]<br>[[approver_position]]</p>
                                <br>
                                <p>Zur Kenntnisnahme: [[employee_full_name]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- 28. Коммерческое предложение / Commercial Offer ---
            [
                'slug' => 'commercial-offer-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy oferującej","en":"Offering Company Name","uk":"Назва компанії-продавця","de":"Name des anbietenden Unternehmens"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy oferującej","en":"Offering Company Address","uk":"Адреса компанії-продавця","de":"Adresse des anbietenden Unternehmens"}},
                    {"name":"company_contact","type":"text","required":true,"labels":{"pl":"Dane kontaktowe firmy","en":"Company Contact Details","uk":"Контактні дані компанії","de":"Kontaktdaten des Unternehmens"}},
                    {"name":"recipient_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko odbiorcy","en":"Recipient Name","uk":"Ім\'я та прізвище одержувача","de":"Name des Empfängers"}},
                    {"name":"recipient_company","type":"text","required":true,"labels":{"pl":"Nazwa firmy odbiorcy","en":"Recipient Company Name","uk":"Назва компанії-одержувача","de":"Name des Empfängerunternehmens"}},
                    {"name":"offer_subject","type":"text","required":true,"labels":{"pl":"Przedmiot oferty","en":"Subject of Offer","uk":"Предмет пропозиції","de":"Gegenstand des Angebots"}},
                    {"name":"offer_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły oferty (produkty/usługi, ceny, warunki)","en":"Offer details (products/services, prices, terms)","uk":"Деталі пропозиції (товари/послуги, ціни, умови)","de":"Angebotsdetails (Produkte/Dienstleistungen, Preise, Bedingungen)"}},
                    {"name":"validity_date","type":"date","required":true,"labels":{"pl":"Termin ważności oferty","en":"Offer Validity Date","uk":"Термін дії пропозиції","de":"Gültigkeitsdatum des Angebots"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Oferta handlowa',
                        'description' => 'Dokument przedstawiający propozycję sprzedaży produktów lub usług potencjalnemu klientowi.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>[[company_name]]</strong><br>[[company_address]]<br>[[company_contact]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[recipient_name]]</strong><br>[[recipient_company]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">OFERTA HANDLOWA</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> [[offer_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>Z przyjemnością przedstawiamy Państwu naszą ofertę dotyczącą [[offer_subject]].</p>
                                <p>[[offer_details]]</p>
                                <p>Mamy nadzieję, że nasza oferta spotka się z Państwa zainteresowaniem. Jesteśmy do dyspozycji w przypadku jakichkolwiek pytań.</p>
                                <p>Oferta ważna do dnia: <strong>[[validity_date]]</strong>.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[company_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Commercial Offer',
                        'description' => 'A document presenting a proposal to sell products or services to a potential client.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>[[company_name]]</strong><br>[[company_address]]<br>[[company_contact]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To: <strong>[[recipient_name]]</strong><br>[[recipient_company]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">COMMERCIAL OFFER</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Subject:</strong> [[offer_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Sir/Madam,</p>
                                <p>We are pleased to present our offer regarding [[offer_subject]].</p>
                                <p>[[offer_details]]</p>
                                <p>We hope our offer meets your interest. We are at your disposal for any questions.</p>
                                <p>Offer valid until: <strong>[[validity_date]]</strong>.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[company_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Комерційна пропозиція',
                        'description' => 'Документ, що представляє пропозицію продажу товарів або послуг потенційному клієнту.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>[[company_name]]</strong><br>[[company_address]]<br>[[company_contact]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>До: <strong>[[recipient_name]]</strong><br>[[recipient_company]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">КОМЕРЦІЙНА ПРОПОЗИЦІЯ</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Щодо:</strong> [[offer_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановні пані та панове,</p>
                                <p>З радістю представляємо Вам нашу пропозицію щодо [[offer_subject]].</p>
                                <p>[[offer_details]]</p>
                                <p>Сподіваємося, що наша пропозиція зацікавить Вас. Ми готові відповісти на будь-які питання.</p>
                                <p>Пропозиція дійсна до: <strong>[[validity_date]]</strong>.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[company_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Kommerzielles Angebot',
                        'description' => 'Ein Dokument, das ein Verkaufsangebot für Produkte oder Dienstleistungen an einen potenziellen Kunden darstellt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KOMMERZIELLES ANGEBOT</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[offer_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[company_name]]</strong><br>[[company_address]]<br>[[company_contact]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>Gerne unterbreiten wir Ihnen unser Angebot bezüglich [[offer_subject]].</p>
                                <p>[[offer_details]]</p>
                                <p>Wir hoffen, dass unser Angebot Ihr Interesse weckt. Für Fragen stehen wir Ihnen gerne zur Verfügung.</p>
                                <p>Angebot gültig bis: <strong>[[validity_date]]</strong>.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[company_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 29. Письмо-претензия / Complaint Letter ---
            [
                'slug' => 'complaint-letter-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_address","type":"text","required":true,"labels":{"pl":"Adres nadawcy","en":"Sender Address","uk":"Адреса відправника","de":"Adresse des Absenders"}},
                    {"name":"recipient_company","type":"text","required":true,"labels":{"pl":"Nazwa firmy odbiorcy","en":"Recipient Company Name","uk":"Назва компанії-одержувача","de":"Name des Empfängerunternehmens"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres firmy odbiorcy","en":"Recipient Company Address","uk":"Адреса компанії-одержувача","de":"Adresse des Empfängerunternehmens"}},
                    {"name":"subject_of_complaint","type":"text","required":true,"labels":{"pl":"Przedmiot reklamacji","en":"Subject of Complaint","uk":"Предмет скарги","de":"Gegenstand der Beschwerde"}},
                    {"name":"complaint_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły reklamacji (opis problemu, data, oczekiwania)","en":"Complaint details (problem description, date, expectations)","uk":"Деталі скарги (опис проблеми, дата, очікування)","de":"Beschwerdedetails (Problembeschreibung, Datum, Erwartungen)"}},
                    {"name":"attachments","type":"text","required":false,"labels":{"pl":"Załączniki (opcjonalnie)","en":"Attachments (optional)","uk":"Додатки (необов\'язково)","de":"Anhänge (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pismo reklamacyjne',
                        'description' => 'Oficjalne pismo zgłaszające niezadowolenie z produktu lub usługi i żądające rozwiązania problemu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[recipient_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">REKLAMACJA</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> [[subject_of_complaint]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>Niniejszym składam reklamację dotyczącą [[subject_of_complaint]].</p>
                                <p>[[complaint_details]]</p>
                                <p>Oczekuję [[expectations]]. W załączeniu przesyłam [[attachments]].</p>
                                <p>Proszę o pilne rozpatrzenie mojej reklamacji i informację o podjętych działaniach.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Complaint Letter',
                        'description' => 'An official letter reporting dissatisfaction with a product or service and demanding a resolution.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('F j, Y') . '</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>To: <strong>[[recipient_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">COMPLAINT LETTER</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Subject:</strong> [[subject_of_complaint]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Sir/Madam,</p>
                                <p>I hereby submit a complaint regarding [[subject_of_complaint]].</p>
                                <p>[[complaint_details]]</p>
                                <p>I expect [[expectations]]. Enclosed please find [[attachments]].</p>
                                <p>Please promptly address my complaint and inform me of the actions taken.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Лист-претензія',
                        'description' => 'Офіційний лист, що повідомляє про незадоволення продуктом або послугою та вимагає вирішення проблеми.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЛИСТ-ПРЕТЕНЗІЯ</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[subject_of_complaint]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До: <strong>[[recipient_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>Цим подаю претензію щодо [[subject_of_complaint]].</p>
                                <p>[[complaint_details]]</p>
                                <p>Очікую [[expectations]]. У додатку надсилаю [[attachments]].</p>
                                <p>Прошу терміново розглянути мою претензію та повідомити про вжиті заходи.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Beschwerdebrief',
                        'description' => 'Ein offizielles Schreiben, das Unzufriedenheit mit einem Produkt oder einer Dienstleistung meldet und eine Lösung des Problems fordert.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BESCHWERDEBRIEF</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[subject_of_complaint]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[recipient_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>Hiermit reiche ich eine Beschwerde bezüglich [[subject_of_complaint]] ein.</p>
                                <p>[[complaint_details]]</p>
                                <p>Ich erwarte [[expectations]]. Anbei sende ich Ihnen [[attachments]].</p>
                                <p>Bitte bearbeiten Sie meine Beschwerde umgehend und informieren Sie mich über die ergriffenen Maßnahmen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 30. Гарантийное письмо / Guarantee Letter ---
            [
                'slug' => 'guarantee-letter-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"guarantor_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy gwarantującej","en":"Guarantor Company Name","uk":"Назва компанії-гаранта","de":"Name des garantierenden Unternehmens"}},
                    {"name":"guarantor_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy gwarantującej","en":"Guarantor Company Address","uk":"Адреса компанії-гаранта","de":"Adresse des garantierenden Unternehmens"}},
                    {"name":"recipient_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy odbiorcy","en":"Recipient Company Name","uk":"Назва компанії-одержувача","de":"Name des Empfängerunternehmens"}},
                    {"name":"recipient_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy odbiorcy","en":"Recipient Company Address","uk":"Адреса компанії-одержувача","de":"Adresse des Empfängerunternehmens"}},
                    {"name":"guarantee_subject","type":"text","required":true,"labels":{"pl":"Przedmiot gwarancji","en":"Subject of Guarantee","uk":"Предмет гарантії","de":"Gegenstand der Garantie"}},
                    {"name":"guarantee_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły gwarancji (kwota, termin, warunki)","en":"Guarantee details (amount, term, conditions)","uk":"Деталі гарантії (сума, термін, умови)","de":"Garantiedetails (Betrag, Laufzeit, Bedingungen)"}},
                    {"name":"guarantor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko osoby upoważnionej","en":"Authorized Person Full Name","uk":"ПІБ уповноваженої особи","de":"Vollständiger Name der bevollmächtigten Person"}},
                    {"name":"guarantor_position","type":"text","required":true,"labels":{"pl":"Stanowisko osoby upoważnionej","en":"Authorized Person Position","uk":"Посада уповноваженої особи","de":"Position der bevollmächtigten Person"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'List gwarancyjny',
                        'description' => 'Dokument, w którym jedna strona zobowiązuje się do spełnienia określonych warunków lub zapłaty w przypadku niewykonania zobowiązania przez inną stronę.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>[[guarantor_company_name]]</strong><br>[[guarantor_company_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[recipient_company_name]]</strong><br>[[recipient_company_address]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">LIST GWARANCYJNY</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> [[guarantee_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>Niniejszym udzielamy gwarancji na [[guarantee_subject]].</p>
                                <p>[[guarantee_details]]</p>
                                <p>Zobowiązujemy się do wywiązania z powyższych warunków.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>[[guarantor_full_name]]</p>
                                <p>[[guarantor_position]]</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Guarantee Letter',
                        'description' => 'A document in which one party undertakes to fulfill certain conditions or make a payment in case of non-performance by another party.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GUARANTEE LETTER</h1><p style="font-size: 14px;"><strong>Subject:</strong> [[guarantee_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[guarantor_company_name]]</strong><br>[[guarantor_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To: <strong>[[recipient_company_name]]</strong><br>[[recipient_company_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>We hereby provide a guarantee for [[guarantee_subject]].</p>
                                <p>[[guarantee_details]]</p>
                                <p>We undertake to fulfill the above conditions.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>[[guarantor_full_name]]</p>
                                <p>[[guarantor_position]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Гарантійний лист',
                        'description' => 'Документ, в якому одна сторона зобов\'язується виконати певні умови або здійснити платіж у разі невиконання зобов\'язань іншою стороною.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ГАРАНТІЙНИЙ ЛИСТ</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[guarantee_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[guarantor_company_name]]</strong><br>[[guarantor_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До: <strong>[[recipient_company_name]]</strong><br>[[recipient_company_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>Цим надаємо гарантію на [[guarantee_subject]].</p>
                                <p>[[guarantee_details]]</p>
                                <p>Зобов\'язуємося виконати вищезазначені умови.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>[[guarantor_full_name]]</p>
                                <p>[[guarantor_position]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Garantieschreiben',
                        'description' => 'Ein Dokument, in dem sich eine Partei verpflichtet, bestimmte Bedingungen zu erfüllen oder eine Zahlung zu leisten, falls eine andere Partei ihre Verpflichtung nicht erfüllt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GARANTIESCHREIBEN</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[guarantee_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[guarantor_company_name]]</strong><br>[[guarantor_company_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[recipient_company_name]]</strong><br>[[recipient_company_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>Hiermit gewähren wir eine Garantie für [[guarantee_subject]].</p>
                                <p>[[guarantee_details]]</p>
                                <p>Wir verpflichten uns, die oben genannten Bedingungen zu erfüllen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>[[guarantor_full_name]]</p>
                                <p>[[guarantor_position]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- 31. Официальный запрос / Official Request ---
            [
                'slug' => 'official-request-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy wysyłającej","en":"Sending Company Name","uk":"Назва компанії-відправника","de":"Name des sendenden Unternehmens"}},
                    {"name":"sender_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy wysyłającej","en":"Sending Company Address","uk":"Адреса компанії-відправника","de":"Adresse des sendenden Unternehmens"}},
                    {"name":"recipient_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy odbiorcy","en":"Recipient Company Name","uk":"Назва компанії-одержувача","de":"Name des Empfängerunternehmens"}},
                    {"name":"recipient_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy odbiorcy","en":"Recipient Company Address","uk":"Адреса компанії-одержувача","de":"Adresse des Empfängerunternehmens"}},
                    {"name":"request_subject","type":"text","required":true,"labels":{"pl":"Przedmiot zapytania","en":"Subject of Request","uk":"Предмет запиту","de":"Gegenstand der Anfrage"}},
                    {"name":"request_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły zapytania (cel, wymagane informacje/dokumenty)","en":"Request details (purpose, required information/documents)","uk":"Деталі запиту (мета, необхідна інформація/документи)","de":"Anfragedetails (Zweck, benötigte Informationen/Dokumente)"}},
                    {"name":"contact_person","type":"text","required":true,"labels":{"pl":"Osoba do kontaktu","en":"Contact Person","uk":"Контактна особа","de":"Ansprechpartner"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Oficjalne zapytanie',
                        'description' => 'Formalne pismo z prośbą o informacje lub dokumenty.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[recipient_company_name]]</strong><br>[[recipient_company_address]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">OFICJALNE ZAPYTANIE</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> [[request_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>Zwracamy się z uprzejmą prośbą o udzielenie informacji/dokumentów dotyczących [[request_subject]].</p>
                                <p>[[request_details]]</p>
                                <p>W przypadku pytań prosimy o kontakt z Panem/Panią [[contact_person]].</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_company_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Official Request',
                        'description' => 'A formal letter requesting information or documents.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFFICIAL REQUEST</h1><p style="font-size: 14px;"><strong>Subject:</strong> [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To: <strong>[[recipient_company_name]]</strong><br>[[recipient_company_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>We kindly request information/documents regarding [[request_subject]].</p>
                                <p>[[request_details]]</p>
                                <p>For any questions, please contact Mr./Ms. [[contact_person]].</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_company_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Офіційний запит',
                        'description' => 'Формальний лист із запитом інформації або документів.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ОФІЦІЙНИЙ ЗАПИТ</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До: <strong>[[recipient_company_name]]</strong><br>[[recipient_company_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>Звертаємося з покірним проханням надати інформацію/документи щодо [[request_subject]].</p>
                                <p>[[request_details]]</p>
                                <p>У разі виникнення питань просимо звертатися до Пана/Пані [[contact_person]].</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_company_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Offizielle Anfrage',
                        'description' => 'Ein formelles Schreiben zur Anforderung von Informationen oder Dokumenten.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFFIZIELLE ANFRAGE</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[request_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[recipient_company_name]]</strong><br>[[recipient_company_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>Wir bitten höflich um Informationen/Dokumente bezüglich [[request_subject]].</p>
                                <p>[[request_details]]</p>
                                <p>Bei Fragen wenden Sie sich bitte an Herrn/Frau [[contact_person]].</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_company_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 32. Письмо-уведомление / Notification Letter ---
            [
                'slug' => 'notification-letter-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy wysyłającej","en":"Sending Company Name","uk":"Назва компанії-відправника","de":"Name des sendenden Unternehmens"}},
                    {"name":"sender_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy wysyłającej","en":"Sending Company Address","uk":"Адреса компанії-відправника","de":"Adresse des sendenden Unternehmens"}},
                    {"name":"recipient_name_or_company","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/Nazwa firmy odbiorcy","en":"Recipient Name/Company Name","uk":"ПІБ/Назва компанії одержувача","de":"Name/Firmenname des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"notification_subject","type":"text","required":true,"labels":{"pl":"Przedmiot powiadomienia","en":"Subject of Notification","uk":"Предмет повідомлення","de":"Gegenstand der Benachrichtigung"}},
                    {"name":"notification_details","type":"textarea","required":true,"labels":{"pl":"Treść powiadomienia","en":"Content of Notification","uk":"Зміст повідомлення","de":"Inhalt der Benachrichtigung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pismo informacyjne/Powiadomienie',
                        'description' => 'Oficjalne pismo informujące o ważnych zmianach, wydarzeniach lub decyzjach.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">POWIADOMIENIE</h1>
                                <p style="font-size: 14px; text-align: center;"><strong>Dotyczy:</strong> [[notification_subject]]</p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>Niniejszym informujemy o [[notification_subject]].</p>
                                <p>[[notification_details]]</p>
                                <p>W przypadku pytań prosimy o kontakt.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_company_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Notification Letter',
                        'description' => 'An official letter informing about important changes, events, or decisions.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">NOTIFICATION LETTER</h1><p style="font-size: 14px;"><strong>Subject:</strong> [[notification_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>We hereby inform you about [[notification_subject]].</p>
                                <p>[[notification_details]]</p>
                                <p>Please do not hesitate to contact us if you have any questions.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_company_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Лист-повідомлення',
                        'description' => 'Офіційний лист, що інформує про важливі зміни, події або рішення.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЛИСТ-ПОВІДОМЛЕННЯ</h1><p style="font-size: 14px;"><strong>Щодо:</strong> [[notification_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>Цим повідомляємо Вас про [[notification_subject]].</p>
                                <p>[[notification_details]]</p>
                                <p>У разі виникнення питань просимо звертатися до нас.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_company_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Benachrichtigungsschreiben',
                        'description' => 'Ein offizielles Schreiben, das über wichtige Änderungen, Ereignisse oder Entscheidungen informiert.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BENACHRICHTIGUNGSSCHREIBEN</h1><p style="font-size: 14px;"><strong>Betreff:</strong> [[notification_subject]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>Hiermit informieren wir Sie über [[notification_subject]].</p>
                                <p>[[notification_details]]</p>
                                <p>Bei Fragen stehen wir Ihnen gerne zur Verfügung.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_company_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 33. Письмо-извинение / Apology Letter ---
            [
                'slug' => 'apology-letter-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy nadawcy (jeśli dotyczy)","en":"Sender Company Name (if applicable)","uk":"Назва компанії відправника (якщо застосовно)","de":"Name des Absenderunternehmens (falls zutreffend)"}},
                    {"name":"recipient_name_or_company","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/Nazwa firmy odbiorcy","en":"Recipient Name/Company Name","uk":"ПІБ/Назва компанії одержувача","de":"Name/Firmenname des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"incident_date","type":"date","required":true,"labels":{"pl":"Data zdarzenia/sytuacji","en":"Date of incident/situation","uk":"Дата події/ситуації","de":"Datum des Vorfalls/der Situation"}},
                    {"name":"apology_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły przeprosin (za co przepraszasz, co zostanie zrobione)","en":"Apology details (what you are apologizing for, what will be done)","uk":"Деталі вибачень (за що вибачаєтеся, що буде зроблено)","de":"Entschuldigungsdetails (wofür Sie sich entschuldigen, was getan wird)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pismo z przeprosinami',
                        'description' => 'Oficjalne pismo wyrażające skruchę i przeprosiny za zaistniałą sytuację.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <table width="100%"><tr>
                                <td width="50%" style="vertical-align:top;"><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td>
                                <td width="50%" style="text-align: right; vertical-align:top;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td>
                                </tr></table>
                                <br/><br/>
                                <p>Do: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <h1 style="font-size: 18px; font-weight: bold; text-align: center;">PISMO Z PRZEPROSINAMI</h1>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowni Państwo,</p>
                                <p>Zwracam się do Państwa w związku z sytuacją, która miała miejsce w dniu [[incident_date]].</p>
                                <p>Niniejszym chciałbym/chciałabym serdecznie przeprosić za [[apology_details]].</p>
                                <p>Mam nadzieję, że nasze przeprosiny zostaną przyjęte i będziemy mogli kontynuować naszą współpracę/relacje.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Apology Letter',
                        'description' => 'An official letter expressing remorse and apology for a given situation.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">APOLOGY LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I am writing to you regarding the situation that occurred on [[incident_date]].</p>
                                <p>I would like to sincerely apologize for [[apology_details]].</p>
                                <p>I hope our apologies will be accepted and we can continue our cooperation/relationship.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Лист-вибачення',
                        'description' => 'Офіційний лист, що висловлює каяття та вибачення за ситуацію, що склалася.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ЛИСТ-ВИБАЧЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>Звертаюся до Вас у зв\'язку з ситуацією, що сталася [[incident_date]].</p>
                                <p>Цим хотів/хотіла б щиро вибачитися за [[apology_details]].</p>
                                <p>Сподіваюся, що наші вибачення будуть прийняті, і ми зможемо продовжити нашу співпрацю/відносини.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Entschuldigungsschreiben',
                        'description' => 'Ein offizielles Schreiben, das Reue und Entschuldigung für eine bestimmte Situation ausdrückt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ENTSCHULDIGUNGSSCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>Ich wende mich an Sie bezüglich der Situation, die am [[incident_date]] stattgefunden hat.</p>
                                <p>Hiermit möchte ich mich aufrichtig für [[apology_details]] entschuldigen.</p>
                                <p>Ich hoffe, dass unsere Entschuldigung angenommen wird und wir unsere Zusammenarbeit/Beziehung fortsetzen können.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- 34. Благодарственное письмо / Thank You Letter ---
            [
                'slug' => 'thank-you-letter-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
                    {"name":"sender_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy nadawcy (jeśli dotyczy)","en":"Sender Company Name (if applicable)","uk":"Назва компанії відправника (якщо застосовно)","de":"Name des Absenderunternehmens (falls zutreffend)"}},
                    {"name":"recipient_name_or_company","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/Nazwa firmy odbiorcy","en":"Recipient Name/Company Name","uk":"ПІБ/Назва компанії одержувача","de":"Name/Firmenname des Empfängers"}},
                    {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
                    {"name":"reason_for_thanks","type":"textarea","required":true,"labels":{"pl":"Powód podziękowania (za co dziękujesz, szczegóły)","en":"Reason for thanks (what you are thanking for, details)","uk":"Причина подяки (за що дякуєте, деталі)","de":"Grund des Dankes (wofür Sie sich bedanken, Details)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'List z podziękowaniami',
                        'description' => 'Oficjalne pismo wyrażające wdzięczność za pomoc, współpracę lub wykonaną usługę.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIST Z PODZIĘKOWANIAMI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Do: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Szanowni Państwo,</p>
                                <p>Pragnę serdecznie podziękować za [[reason_for_thanks]].</p>
                                <p>Cenimy Państwa zaangażowanie/wsparcie/profesjonalizm.</p>
                                <p>Z niecierpliwością oczekujemy na dalszą współpracę.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Thank You Letter',
                        'description' => 'An official letter expressing gratitude for assistance, cooperation, or a service rendered.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">THANK YOU LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>To: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Dear Sir/Madam,</p>
                                <p>I would like to sincerely thank you for [[reason_for_thanks]].</p>
                                <p>We appreciate your commitment/support/professionalism.</p>
                                <p>We look forward to further cooperation.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Подячний лист',
                        'description' => 'Офіційний лист, що висловлює подяку за допомогу, співпрацю або надану послугу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОДЯЧНИЙ ЛИСТ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>До: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Шановні пані та панове,</p>
                                <p>Хочу щиро подякувати за [[reason_for_thanks]].</p>
                                <p>Ми цінуємо Вашу відданість/підтримку/професіоналізм.</p>
                                <p>З нетерпінням чекаємо на подальшу співпрацю.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Dankesschreiben',
                        'description' => 'Ein offizielles Schreiben, das Dankbarkeit für Hilfe, Zusammenarbeit oder eine erbrachte Dienstleistung ausdrückt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DANKESSCHREIBEN</h1><p style="font-size: 14px;"></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p><strong>[[sender_full_name]]</strong><br>[[sender_company_name]]</p></td><td style="text-align: right;"><p>[[city]], den ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>An: <strong>[[recipient_name_or_company]]</strong><br>[[recipient_address]]</p>
                                <br/>
                                <p>Sehr geehrte Damen und Herren,</p>
                                <p>Ich möchte mich herzlich für [[reason_for_thanks]] bedanken.</p>
                                <p>Wir schätzen Ihr Engagement/Ihre Unterstützung/Ihre Professionalität.</p>
                                <p>Wir freuen uns auf eine weitere Zusammenarbeit.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[sender_full_name]])</p>
                            </div>'
                    ]
                ]
            ],
            // --- 35. Счет на оплату (Инвойс) / Invoice ---
            [
                'slug' => 'invoice-pl',
                'fields' => '[
                    {"name":"invoice_number","type":"text","required":true,"labels":{"pl":"Numer faktury","en":"Invoice Number","uk":"Номер рахунку","de":"Rechnungsnummer"}},
                    {"name":"invoice_date","type":"date","required":true,"labels":{"pl":"Data wystawienia","en":"Issue Date","uk":"Дата виставлення","de":"Ausstellungsdatum"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"pl":"Sprzedawca (nazwa firmy)","en":"Seller (company name)","uk":"Продавець (назва компанії)","de":"Verkäufer (Firmenname)"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedawcy","en":"Seller Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"seller_nip","type":"text","required":true,"labels":{"pl":"NIP sprzedawcy","en":"Seller NIP","uk":"ІПН продавця","de":"USt-IdNr. des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"pl":"Nabywca (nazwa firmy)","en":"Buyer (company name)","uk":"Покупець (назва компанії)","de":"Käufer (Firmenname)"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres nabywcy","en":"Buyer Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"buyer_nip","type":"text","required":true,"labels":{"pl":"NIP nabywcy","en":"Buyer NIP","uk":"ІПН покупця","de":"USt-IdNr. des Käufers"}},
                    {"name":"items","type":"textarea","required":true,"labels":{"pl":"Pozycje (nazwa, ilość, cena jednostkowa, wartość)","en":"Items (name, quantity, unit price, value)","uk":"Позиції (назва, кількість, ціна за одиницю, вартість)","de":"Positionen (Name, Menge, Einzelpreis, Wert)"}},
                    {"name":"total_amount","type":"number","required":true,"labels":{"pl":"Całkowita kwota","en":"Total Amount","uk":"Загальна сума","de":"Gesamtbetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"payment_method","type":"text","required":true,"labels":{"pl":"Metoda płatności","en":"Payment Method","uk":"Метод оплати","de":"Zahlungsmethode"}},
                    {"name":"payment_due_date","type":"date","required":true,"labels":{"pl":"Termin płatności","en":"Payment Due Date","uk":"Термін оплати","de":"Fälligkeitsdatum der Zahlung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Faktura (uproszczona)',
                        'description' => 'Standardowa faktura do rozliczeń handlowych.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FAKTURA</h1><p style="font-size: 14px;">Numer: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data wystawienia: [[invoice_date]]</p></td><td style="text-align: right;"><p>Miejscowość: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SPRZEDAWCA:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>NIP: [[seller_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">NABYWCA:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>NIP: [[buyer_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">POZYCJE:</h2>
                                <pre>[[items]]</pre>
                                <p><strong>Całkowita kwota: [[total_amount]] [[currency]]</strong></p>
                                <p>Metoda płatności: [[payment_method]]</p>
                                <p>Termin płatności: [[payment_due_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: right;">
                                <p>___________________<br>(Podpis wystawcy)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Invoice',
                        'description' => 'Standard invoice for commercial settlements.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">INVOICE</h1><p style="font-size: 14px;">Number: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Issue Date: [[invoice_date]]</p></td><td style="text-align: right;"><p>City: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SELLER:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>NIP: [[seller_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BUYER:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>NIP: [[buyer_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ITEMS:</h2>
                                <pre>[[items]]</pre>
                                <p><strong>Total Amount: [[total_amount]] [[currency]]</strong></p>
                                <p>Payment Method: [[payment_method]]</p>
                                <p>Payment Due Date: [[payment_due_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: right;">
                                <p>___________________<br>(Issuer\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Рахунок на оплату (Інвойс)',
                        'description' => 'Стандартний рахунок для комерційних розрахунків.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РАХУНОК НА ОПЛАТУ</h1><p style="font-size: 14px;">Номер: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата виставлення: [[invoice_date]]</p></td><td style="text-align: right;"><p>Місто: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПРОДАВЕЦЬ:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>ІПН: [[seller_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПОКУПЕЦЬ:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>ІПН: [[buyer_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПОЗИЦІЇ:</h2>
                                <pre>[[items]]</pre>
                                <p><strong>Загальна сума: [[total_amount]] [[currency]]</strong></p>
                                <p>Метод оплати: [[payment_method]]</p>
                                <p>Термін оплати: [[payment_due_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: right;">
                                <p>___________________<br>(Підпис того, хто виставив)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Rechnung',
                        'description' => 'Standardrechnung für kommerzielle Abrechnungen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RECHNUNG</h1><p style="font-size: 14px;">Nummer: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ausstellungsdatum: [[invoice_date]]</p></td><td style="text-align: right;"><p>Ort: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">VERKÄUFER:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>USt-IdNr.: [[seller_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">KÄUFER:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>USt-IdNr.: [[buyer_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">POSITIONEN:</h2>
                                <pre>[[items]]</pre>
                                <p><strong>Gesamtbetrag: [[total_amount]] [[currency]]</strong></p>
                                <p>Zahlungsmethode: [[payment_method]]</p>
                                <p>Fälligkeitsdatum der Zahlung: [[payment_due_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: right;">
                                <p>___________________<br>(Unterschrift des Ausstellers)</p>
                            </div>'
                    ]
                ]
            ],

            // --- 36. Акт выполненных работ / оказанных услуг / Acceptance Protocol of Works/Services ---
            [
                'slug' => 'acceptance-protocol-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"protocol_number","type":"text","required":true,"labels":{"pl":"Numer protokołu","en":"Protocol Number","uk":"Номер протоколу","de":"Protokollnummer"}},
                    {"name":"protocol_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia","en":"Date of Preparation","uk":"Дата складання","de":"Erstellungsdatum"}},
                    {"name":"service_provider_name","type":"text","required":true,"labels":{"pl":"Wykonawca (nazwa firmy)","en":"Service Provider (company name)","uk":"Виконавець (назва компанії)","de":"Dienstleister (Firmenname)"}},
                    {"name":"service_provider_address","type":"text","required":true,"labels":{"pl":"Adres wykonawcy","en":"Service Provider Address","uk":"Адреса виконавця","de":"Adresse des Dienstleisters"}},
                    {"name":"service_recipient_name","type":"text","required":true,"labels":{"pl":"Zleceniodawca (nazwa firmy)","en":"Service Recipient (company name)","uk":"Замовник (назва компанії)","de":"Auftraggeber (Firmenname)"}},
                    {"name":"service_recipient_address","type":"text","required":true,"labels":{"pl":"Adres zleceniodawcy","en":"Service Recipient Address","uk":"Адреса замовника","de":"Adresse des Auftraggebers"}},
                    {"name":"work_description","type":"textarea","required":true,"labels":{"pl":"Opis wykonanych prac/usług","en":"Description of performed works/services","uk":"Опис виконаних робіт/послуг","de":"Beschreibung der erbrachten Arbeiten/Dienstleistungen"}},
                    {"name":"completion_date","type":"date","required":true,"labels":{"pl":"Data zakończenia prac/usług","en":"Completion Date of Works/Services","uk":"Дата завершення робіт/послуг","de":"Fertigstellungsdatum der Arbeiten/Dienstleistungen"}},
                    {"name":"total_amount","type":"number","required":true,"labels":{"pl":"Wartość prac/usług","en":"Value of Works/Services","uk":"Вартість робіт/послуг","de":"Wert der Arbeiten/Dienstleistungen"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Protokół odbioru prac/usług',
                        'description' => 'Dokument potwierdzający wykonanie i odbiór prac lub usług.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ODBIORU PRAC/USŁUG</h1><p style="font-size: 14px;">Numer: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data sporządzenia: [[protocol_date]]</p></td><td style="text-align: right;"><p>Miejscowość: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Zawarty pomiędzy:</p>
                                <p><strong>Wykonawcą:</strong> [[service_provider_name]], adres: [[service_provider_address]]</p>
                                <p>a</p>
                                <p><strong>Zleceniodawcą:</strong> [[service_recipient_name]], adres: [[service_recipient_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">PRZEDMIOT PROTOKOŁU:</h2>
                                <p>Potwierdza się wykonanie następujących prac/usług:</p>
                                <p>[[work_description]]</p>
                                <p>Data zakończenia prac/usług: <strong>[[completion_date]]</strong></p>
                                <p>Wartość prac/usług: <strong>[[total_amount]] [[currency]]</strong></p>
                                <br/>
                                <p>Strony potwierdzają zgodność wykonanych prac/usług z umową.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wykonawca</p></td>
                                <td width="50%"><p>___________________<br>Zleceniodawca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Acceptance Protocol of Works/Services',
                        'description' => 'A document confirming the performance and acceptance of works or services.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ACCEPTANCE PROTOCOL OF WORKS/SERVICES</h1><p style="font-size: 14px;">Number: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Date of Preparation: [[protocol_date]]</p></td><td style="text-align: right;"><p>City: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Concluded between:</p>
                                <p><strong>Service Provider:</strong> [[service_provider_name]], address: [[service_provider_address]]</p>
                                <p>and</p>
                                <p><strong>Service Recipient:</strong> [[service_recipient_name]], address: [[service_recipient_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SUBJECT OF PROTOCOL:</h2>
                                <p>It is hereby confirmed that the following works/services have been performed:</p>
                                <p>[[work_description]]</p>
                                <p>Completion Date of Works/Services: <strong>[[completion_date]]</strong></p>
                                <p>Value of Works/Services: <strong>[[total_amount]] [[currency]]</strong></p>
                                <br/>
                                <p>The parties confirm the compliance of the performed works/services with the contract.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Service Provider</p></td>
                                <td width="50%"><p>___________________<br>Service Recipient</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Акт виконаних робіт / наданих послуг',
                        'description' => 'Документ, що підтверджує виконання та приймання робіт або послуг.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АКТ ВИКОНАНИХ РОБІТ / НАДАНИХ ПОСЛУГ</h1><p style="font-size: 14px;">Номер: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата складання: [[protocol_date]]</p></td><td style="text-align: right;"><p>Місто: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Укладено між:</p>
                                <p><strong>Виконавцем:</strong> [[service_provider_name]], адреса: [[service_provider_address]]</p>
                                <p>та</p>
                                <p><strong>Замовником:</strong> [[service_recipient_name]], адреса: [[service_recipient_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПРЕДМЕТ ПРОТОКОЛУ:</h2>
                                <p>Підтверджується виконання наступних робіт/послуг:</p>
                                <p>[[work_description]]</p>
                                <p>Дата завершення робіт/послуг: <strong>[[completion_date]]</strong></p>
                                <p>Вартість робіт/послуг: <strong>[[total_amount]] [[currency]]</strong></p>
                                <br/>
                                <p>Сторони підтверджують відповідність виконаних робіт/послуг договору.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Виконавець</p></td>
                                <td width="50%"><p>___________________<br>Замовник</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Abnahmeprotokoll für Arbeiten/Dienstleistungen',
                        'description' => 'Ein Dokument, das die Erbringung und Abnahme von Arbeiten oder Dienstleistungen bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ABNAHMEPROTOKOLL FÜR ARBEITEN/DIENSTLEISTUNGEN</h1><p style="font-size: 14px;">Nummer: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Erstellungsdatum: [[protocol_date]]</p></td><td style="text-align: right;"><p>Ort: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Abgeschlossen zwischen:</p>
                                <p><strong>Dienstleister:</strong> [[service_provider_name]], Adresse: [[service_provider_address]]</p>
                                <p>und</p>
                                <p><strong>Auftraggeber:</strong> [[service_recipient_name]], Adresse: [[service_recipient_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">GEGENSTAND DES PROTOKOLLS:</h2>
                                <p>Hiermit wird die Erbringung der folgenden Arbeiten/Dienstleistungen bestätigt:</p>
                                <p>[[work_description]]</p>
                                <p>Fertigstellungsdatum der Arbeiten/Dienstleistungen: <strong>[[completion_date]]</strong></p>
                                <p>Wert der Arbeiten/Dienstleistungen: <strong>[[total_amount]] [[currency]]</strong></p>
                                <br/>
                                <p>Die Parteien bestätigen die Übereinstimmung der erbrachten Arbeiten/Dienstleistungen mit dem Vertrag.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: center;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Dienstleister</p></td>
                                <td width="50%"><p>___________________<br>Auftraggeber</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 37. Счет-фактура / VAT Invoice ---
            [
                'slug' => 'vat-invoice-pl',
                'fields' => '[
                    {"name":"invoice_number","type":"text","required":true,"labels":{"pl":"Numer faktury VAT","en":"VAT Invoice Number","uk":"Номер ПДВ-рахунку","de":"USt-Rechnungsnummer"}},
                    {"name":"issue_date","type":"date","required":true,"labels":{"pl":"Data wystawienia","en":"Issue Date","uk":"Дата виставлення","de":"Ausstellungsdatum"}},
                    {"name":"sale_date","type":"date","required":true,"labels":{"pl":"Data sprzedaży","en":"Date of Sale","uk":"Дата продажу","de":"Verkaufsdatum"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"pl":"Sprzedawca (nazwa firmy)","en":"Seller (company name)","uk":"Продавець (назва компанії)","de":"Verkäufer (Firmenname)"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedawcy","en":"Seller Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"seller_nip","type":"text","required":true,"labels":{"pl":"NIP sprzedawcy","en":"Seller NIP","uk":"ІПН продавця","de":"USt-IdNr. des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"pl":"Nabywca (nazwa firmy)","en":"Buyer (company name)","uk":"Покупець (назва компанії)","de":"Käufer (Firmenname)"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres nabywcy","en":"Buyer Address","uk":"Адреса покупця","de":"Adresse des Käufers"}},
                    {"name":"buyer_nip","type":"text","required":true,"labels":{"pl":"NIP nabywcy","en":"Buyer NIP","uk":"ІПН покупця","de":"USt-IdNr. des Käufers"}},
                    {"name":"items_table","type":"textarea","required":true,"labels":{"pl":"Tabela pozycji (nazwa, ilość, j.m., cena netto, VAT %, kwota VAT, cena brutto)","en":"Items table (name, quantity, unit, net price, VAT %, VAT amount, gross price)","uk":"Таблиця позицій (назва, кількість, од. вим., ціна нетто, ПДВ %, сума ПДВ, ціна брутто)","de":"Positionstabelle (Name, Menge, Einheit, Nettopreis, MwSt. %, MwSt.-Betrag, Bruttopreis)"}},
                    {"name":"net_amount","type":"number","required":true,"labels":{"pl":"Kwota netto","en":"Net Amount","uk":"Сума нетто","de":"Nettobetrag"}},
                    {"name":"vat_rate","type":"text","required":true,"labels":{"pl":"Stawka VAT","en":"VAT Rate","uk":"Ставка ПДВ","de":"MwSt.-Satz"}},
                    {"name":"vat_amount","type":"number","required":true,"labels":{"pl":"Kwota VAT","en":"VAT Amount","uk":"Сума ПДВ","de":"MwSt.-Betrag"}},
                    {"name":"gross_amount","type":"number","required":true,"labels":{"pl":"Kwota brutto","en":"Gross Amount","uk":"Сума брутто","de":"Bruttobetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"payment_method","type":"text","required":true,"labels":{"pl":"Metoda płatności","en":"Payment Method","uk":"Метод оплати","de":"Zahlungsmethode"}},
                    {"name":"payment_due_date","type":"date","required":true,"labels":{"pl":"Termin płatności","en":"Payment Due Date","uk":"Термін оплати","de":"Fälligkeitsdatum der Zahlung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Faktura VAT',
                        'description' => 'Szczegółowa faktura VAT zgodna z polskimi przepisami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FAKTURA VAT</h1><p style="font-size: 14px;">Numer: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data wystawienia: [[issue_date]]</p><p>Data sprzedaży: [[sale_date]]</p></td><td style="text-align: right;"><p>Miejscowość: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SPRZEDAWCA:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>NIP: [[seller_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">NABYWCA:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>NIP: [[buyer_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SZCZEGÓŁY TRANSAKCJI:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Kwota netto: [[net_amount]] [[currency]]</p>
                                <p>Stawka VAT: [[vat_rate]]</p>
                                <p>Kwota VAT: [[vat_amount]] [[currency]]</p>
                                <p><strong>Kwota brutto: [[gross_amount]] [[currency]]</strong></p>
                                <p>Metoda płatności: [[payment_method]]</p>
                                <p>Termin płatności: [[payment_due_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: right;">
                                <p>___________________<br>(Podpis wystawcy)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'VAT Invoice',
                        'description' => 'Detailed VAT invoice compliant with Polish regulations.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VAT INVOICE</h1><p style="font-size: 14px;">Number: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Issue Date: [[issue_date]]</p><p>Date of Sale: [[sale_date]]</p></td><td style="text-align: right;"><p>City: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SELLER:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>NIP: [[seller_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">BUYER:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>NIP: [[buyer_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">TRANSACTION DETAILS:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Net Amount: [[net_amount]] [[currency]]</p>
                                <p>VAT Rate: [[vat_rate]]</p>
                                <p>VAT Amount: [[vat_amount]] [[currency]]</p>
                                <p><strong>Gross Amount: [[gross_amount]] [[currency]]</strong></p>
                                <p>Payment Method: [[payment_method]]</p>
                                <p>Payment Due Date: [[payment_due_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-align: right;">
                                <p>___________________<br>(Issuer\'s Signature)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Рахунок-фактура',
                        'description' => 'Детальний ПДВ-рахунок відповідно до польських правил.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">РАХУНОК-ФАКТУРА</h1><p style="font-size: 14px;">Номер: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата виставлення: [[issue_date]]</p><p>Дата продажу: [[sale_date]]</p></td><td style="text-align: right;"><p>Місто: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПРОДАВЕЦЬ:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>ІПН: [[seller_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПОКУПЕЦЬ:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>ІПН: [[buyer_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ДЕТАЛІ ОПЕРАЦІЇ:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Сума нетто: [[net_amount]] [[currency]]</p>
                                <p>Ставка ПДВ: [[vat_rate]]</p>
                                <p>Сума ПДВ: [[vat_amount]] [[currency]]</p>
                                <p><strong>Сума брутто: [[gross_amount]] [[currency]]</strong></p>
                                <p>Метод оплати: [[payment_method]]</p>
                                <p>Термін оплати: [[payment_due_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; text-size: 12px; text-align: right;">
                                <p>___________________<br>(Підпис того, хто виставив)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Umsatzsteuerrechnung',
                        'description' => 'Detaillierte Umsatzsteuerrechnung gemäß polnischen Vorschriften.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMSATZSTEUERRECHNUNG</h1><p style="font-size: 14px;">Nummer: [[invoice_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ausstellungsdatum: [[issue_date]]</p><p>Verkaufsdatum: [[sale_date]]</p></td><td style="text-align: right;"><p>Ort: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">VERKÄUFER:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]<br>USt-IdNr.: [[seller_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">KÄUFER:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]<br>USt-IdNr.: [[buyer_nip]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">TRANSAKTIONSDETAILS:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Nettobetrag: [[net_amount]] [[currency]]</p>
                                <p>MwSt.-Satz: [[vat_rate]]</p>
                                <p>MwSt.-Betrag: [[vat_amount]] [[currency]]</p>
                                <p><strong>Bruttobetrag: [[gross_amount]] [[currency]]</strong></p>
                                <p>Zahlungsmethode: [[payment_method]]</p>
                                <p>Fälligkeitsdatum der Zahlung: [[payment_due_date]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: right;">
                                <p>___________________<br>(Unterschrift des Ausstellers)</p>
                            </div>'
                    ]
                ]
            ],

            // --- 38. Товарная накладная / Delivery Note ---
            [
                'slug' => 'delivery-note-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"note_number","type":"text","required":true,"labels":{"pl":"Numer dowodu dostawy","en":"Delivery Note Number","uk":"Номер накладної","de":"Lieferscheinnummer"}},
                    {"name":"issue_date","type":"date","required":true,"labels":{"pl":"Data wystawienia","en":"Issue Date","uk":"Дата виставлення","de":"Ausstellungsdatum"}},
                    {"name":"seller_name","type":"text","required":true,"labels":{"pl":"Sprzedawca (nazwa firmy)","en":"Seller (company name)","uk":"Продавець (назва компанії)","de":"Verkäufer (Firmenname)"}},
                    {"name":"seller_address","type":"text","required":true,"labels":{"pl":"Adres sprzedawcy","en":"Seller Address","uk":"Адреса продавця","de":"Adresse des Verkäufers"}},
                    {"name":"buyer_name","type":"text","required":true,"labels":{"pl":"Odbiorca (nazwa firmy)","en":"Recipient (company name)","uk":"Отримувач (назва компанії)","de":"Empfänger (Firmenname)"}},
                    {"name":"buyer_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса отримувача","de":"Adresse des Empfängers"}},
                    {"name":"items_table","type":"textarea","required":true,"labels":{"pl":"Tabela towarów (nazwa, ilość, j.m., cena jednostkowa, wartość)","en":"Goods table (name, quantity, unit, unit price, value)","uk":"Таблиця товарів (назва, кількість, од. вим., ціна за одиницю, вартість)","de":"Warentabelle (Name, Menge, Einheit, Einzelpreis, Wert)"}},
                    {"name":"total_quantity","type":"number","required":true,"labels":{"pl":"Łączna ilość","en":"Total Quantity","uk":"Загальна кількість","de":"Gesamtmenge"}},
                    {"name":"total_amount","type":"number","required":true,"labels":{"pl":"Całkowita wartość","en":"Total Value","uk":"Загальна вартість","de":"Gesamtwert"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Dowód dostawy (WZ)',
                        'description' => 'Dokument potwierdzający wydanie towarów z magazynu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DOWÓD DOSTAWY (WZ)</h1><p style="font-size: 14px;">Numer: [[note_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data wystawienia: [[issue_date]]</p></td><td style="text-align: right;"><p>Miejscowość: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SPRZEDAWCA:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ODBIORCA:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SZCZEGÓŁY TOWARÓW:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Łączna ilość: [[total_quantity]]</p>
                                <p><strong>Całkowita wartość: [[total_amount]] [[currency]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wystawił</p></td>
                                <td width="50%"><p>___________________<br>Odebrał</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Delivery Note',
                        'description' => 'A document confirming the release of goods from the warehouse.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DELIVERY NOTE</h1><p style="font-size: 14px;">Number: [[note_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Issue Date: [[issue_date]]</p></td><td style="text-align: right;"><p>City: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SELLER:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">RECIPIENT:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">GOODS DETAILS:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Total Quantity: [[total_quantity]]</p>
                                <p><strong>Total Value: [[total_amount]] [[currency]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Issued by</p></td>
                                <td width="50%"><p>___________________<br>Received by</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Товарна накладна',
                        'description' => 'Документ, що підтверджує видачу товарів зі складу.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ТОВАРНА НАКЛАДНА</h1><p style="font-size: 14px;">Номер: [[note_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата виставлення: [[issue_date]]</p></td><td style="text-align: right;"><p>Місто: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПРОДАВЕЦЬ:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ОТРИМУВАЧ:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ДЕТАЛІ ТОВАРІВ:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Загальна кількість: [[total_quantity]]</p>
                                <p><strong>Загальна вартість: [[total_amount]] [[currency]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Видав</p></td>
                                <td width="50%"><p>___________________<br>Отримав</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Lieferschein',
                        'description' => 'Ein Dokument, das die Freigabe von Waren aus dem Lager bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LIEFERSCHEIN</h1><p style="font-size: 14px;">Nummer: [[note_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ausstellungsdatum: [[issue_date]]</p></td><td style="text-align: right;"><p>Ort: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">VERKÄUFER:</h2>
                                <p><strong>[[seller_name]]</strong><br>[[seller_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">EMPFÄNGER:</h2>
                                <p><strong>[[buyer_name]]</strong><br>[[buyer_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">WARENDETAILS:</h2>
                                <pre>[[items_table]]</pre>
                                <p>Gesamtmenge: [[total_quantity]]</p>
                                <p><strong>Gesamtwert: [[total_amount]] [[currency]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Ausgestellt von</p></td>
                                <td width="50%"><p>___________________<br>Empfangen von</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 39. Договор займа между юридическими лицами / Loan Agreement between Legal Entities ---
            [
                'slug' => 'loan-agreement-legal-entities-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"lender_name","type":"text","required":true,"labels":{"pl":"Pożyczkodawca (nazwa firmy)","en":"Lender (company name)","uk":"Позикодавець (назва компанії)","de":"Darlehensgeber (Firmenname)"}},
                    {"name":"lender_address","type":"text","required":true,"labels":{"pl":"Adres pożyczkodawcy","en":"Lender Address","uk":"Адреса позикодавця","de":"Adresse des Darlehensgebers"}},
                    {"name":"lender_nip","type":"text","required":true,"labels":{"pl":"NIP pożyczkodawcy","en":"Lender NIP","uk":"ІПН позикодавця","de":"USt-IdNr. des Darlehensgebers"}},
                    {"name":"borrower_name","type":"text","required":true,"labels":{"pl":"Pożyczkobiorca (nazwa firmy)","en":"Borrower (company name)","uk":"Позичальник (назва компанії)","de":"Darlehensnehmer (Firmenname)"}},
                    {"name":"borrower_address","type":"text","required":true,"labels":{"pl":"Adres pożyczkobiorcy","en":"Borrower Address","uk":"Адреса позичальника","de":"Adresse des Darlehensnehmers"}},
                    {"name":"borrower_nip","type":"text","required":true,"labels":{"pl":"NIP pożyczkobiorcy","en":"Borrower NIP","uk":"ІПН позичальника","de":"USt-IdNr. des Darlehensnehmers"}},
                    {"name":"loan_amount","type":"number","required":true,"labels":{"pl":"Kwota pożyczki","en":"Loan Amount","uk":"Сума позики","de":"Darlehensbetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"repayment_date","type":"date","required":true,"labels":{"pl":"Data spłaty","en":"Repayment Date","uk":"Дата погашення","de":"Rückzahlungsdatum"}},
                    {"name":"interest_rate","type":"text","required":true,"labels":{"pl":"Oprocentowanie","en":"Interest Rate","uk":"Процентна ставка","de":"Zinssatz"}},
                    {"name":"purpose_of_loan","type":"textarea","required":false,"labels":{"pl":"Cel pożyczki (opcjonalnie)","en":"Purpose of Loan (optional)","uk":"Мета позики (необов\'язково)","de":"Zweck des Darlehens (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa pożyczki między podmiotami prawnymi',
                        'description' => 'Umowa regulująca warunki pożyczki pieniężnej między dwiema firmami.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA POŻYCZKI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>[[lender_name]]</strong> z siedzibą w [[lender_address]], NIP: [[lender_nip]], zwanym/ą dalej "Pożyczkodawcą",</p>
                                <p>a</p>
                                <p><strong>[[borrower_name]]</strong> z siedzibą w [[borrower_address]], NIP: [[borrower_nip]], zwanym/ą dalej "Pożyczkobiorcą".</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Pożyczkodawca udziela Pożyczkobiorcy pożyczki w kwocie <strong>[[loan_amount]] [[currency]]</strong>.</p>
                                <p>Cel pożyczki: [[purpose_of_loan]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Warunki spłaty</h2>
                                <p>Pożyczka zostanie spłacona do dnia <strong>[[repayment_date]]</strong>.</p>
                                <p>Oprocentowanie pożyczki wynosi: [[interest_rate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Pożyczkodawca</p></td>
                                <td width="50%"><p>___________________<br>Pożyczkobiorca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Loan Agreement between Legal Entities',
                        'description' => 'An agreement regulating the terms of a monetary loan between two companies.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">LOAN AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>[[lender_name]]</strong> with its registered office in [[lender_address]], NIP: [[lender_nip]], hereinafter referred to as the "Lender",</p>
                                <p>and</p>
                                <p><strong>[[borrower_name]]</strong> with its registered office in [[borrower_address]], NIP: [[borrower_nip]], hereinafter referred to as the "Borrower".</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The Lender grants the Borrower a loan in the amount of <strong>[[loan_amount]] [[currency]]</strong>.</p>
                                <p>Purpose of the loan: [[purpose_of_loan]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Repayment Terms</h2>
                                <p>The loan shall be repaid by <strong>[[repayment_date]]</strong>.</p>
                                <p>The interest rate of the loan is: [[interest_rate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Lender</p></td>
                                <td width="50%"><p>___________________<br>Borrower</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір позики між юридичними особами',
                        'description' => 'Договір, що регулює умови грошової позики між двома компаніями.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ПОЗИКИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>[[lender_name]]</strong> з місцезнаходженням у [[lender_address]], ІПН: [[lender_nip]], надалі іменований "Позикодавець",</p>
                                <p>та</p>
                                <p><strong>[[borrower_name]]</strong> з місцезнаходженням у [[borrower_address]], ІПН: [[borrower_nip]], надалі іменований "Позичальник".</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Позикодавець надає Позичальнику позику у розмірі <strong>[[loan_amount]] [[currency]]</strong>.</p>
                                <p>Мета позики: [[purpose_of_loan]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Умови погашення</h2>
                                <p>Позика буде погашена до <strong>[[repayment_date]]</strong>.</p>
                                <p>Процентна ставка позики становить: [[interest_rate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Позикодавець</p></td>
                                <td width="50%"><p>___________________<br>Позичальник</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Darlehensvertrag zwischen juristischen Personen',
                        'description' => 'Ein Vertrag, der die Bedingungen eines Gelddarlehens zwischen zwei Unternehmen regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DARLEHENSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>[[lender_name]]</strong> mit Sitz in [[lender_address]], USt-IdNr.: [[lender_nip]], im Folgenden "Darlehensgeber" genannt,</p>
                                <p>und</p>
                                <p><strong>[[borrower_name]]</strong> mit Sitz in [[borrower_address]], USt-IdNr.: [[borrower_nip]], im Folgenden "Darlehensnehmer" genannt.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Der Darlehensgeber gewährt dem Darlehensnehmer ein Darlehen in Höhe von <strong>[[loan_amount]] [[currency]]</strong>.</p>
                                <p>Zweck des Darlehens: [[purpose_of_loan]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Rückzahlungsbedingungen</h2>
                                <p>Das Darlehen ist bis zum <strong>[[repayment_date]]</strong> zurückzuzahlen.</p>
                                <p>Der Zinssatz des Darlehens beträgt: [[interest_rate]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Darlehensgeber</p></td>
                                <td width="50%"><p>___________________<br>Darlehensnehmer</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 40. Авансовый отчет / Expense Report ---
            [
                'slug' => 'expense-report-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"report_number","type":"text","required":true,"labels":{"pl":"Numer raportu","en":"Report Number","uk":"Номер звіту","de":"Berichtsnummer"}},
                    {"name":"report_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia","en":"Date of Preparation","uk":"Дата складання","de":"Erstellungsdatum"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko pracownika","en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
                    {"name":"period_from","type":"date","required":true,"labels":{"pl":"Okres od","en":"Period From","uk":"Період з","de":"Zeitraum von"}},
                    {"name":"period_to","type":"date","required":true,"labels":{"pl":"Okres do","en":"Period To","uk":"Період до","de":"Zeitraum bis"}},
                    {"name":"purpose_of_advance","type":"textarea","required":true,"labels":{"pl":"Cel zaliczki","en":"Purpose of Advance","uk":"Мета авансу","de":"Zweck des Vorschusses"}},
                    {"name":"expenses_table","type":"textarea","required":true,"labels":{"pl":"Tabela wydatków (data, opis, kwota, waluta)","en":"Expenses table (date, description, amount, currency)","uk":"Таблиця витрат (дата, опис, сума, валюта)","de":"Ausgabentabelle (Datum, Beschreibung, Betrag, Währung)"}},
                    {"name":"total_expenses","type":"number","required":true,"labels":{"pl":"Łączna kwota wydatków","en":"Total Expenses Amount","uk":"Загальна сума витрат","de":"Gesamtausgabenbetrag"}},
                    {"name":"advance_received","type":"number","required":true,"labels":{"pl":"Otrzymana zaliczka","en":"Advance Received","uk":"Отриманий аванс","de":"Erhaltene Vorauszahlung"}},
                    {"name":"balance_due","type":"number","required":true,"labels":{"pl":"Saldo (do zwrotu/do wypłaty)","en":"Balance (to be returned/paid out)","uk":"Залишок (до повернення/виплати)","de":"Saldo (zurückzuzahlen/auszuzahlen)"}},
                    {"name":"approver_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko zatwierdzającego","en":"Approver Full Name","uk":"ПІБ того, хто затверджує","de":"Vollständiger Name des Genehmigers"}},
                    {"name":"approver_position","type":"text","required":true,"labels":{"pl":"Stanowisko zatwierdzającego","en":"Approver Position","uk":"Посада того, хто затверджує","de":"Position des Genehmigers"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Raport kasowy (rozliczenie zaliczki)',
                        'description' => 'Dokument służący do rozliczenia zaliczki pobranej na cele służbowe.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">RAPORT KASOWY</h1><p style="font-size: 14px;">Numer: [[report_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Firma: [[company_name]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Pracownik:</strong> [[employee_full_name]]</p>
                                <p><strong>Stanowisko:</strong> [[employee_position]]</p>
                                <p>Okres rozliczeniowy: od [[period_from]] do [[period_to]]</p>
                                <p>Cel zaliczki: [[purpose_of_advance]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SZCZEGÓŁY WYDATKÓW:</h2>
                                <pre>[[expenses_table]]</pre>
                                <p>Łączna kwota wydatków: <strong>[[total_expenses]]</strong></p>
                                <p>Otrzymana zaliczka: <strong>[[advance_received]]</strong></p>
                                <p>Saldo (do zwrotu/do wypłaty): <strong>[[balance_due]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Pracownik</p></td>
                                <td width="50%"><p>___________________<br>[[approver_full_name]]<br>[[approver_position]]</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Expense Report',
                        'description' => 'A document used to reconcile an advance payment taken for business purposes.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EXPENSE REPORT</h1><p style="font-size: 14px;">Number: [[report_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Company: [[company_name]]</p></td><td style="text-align: right;"><p>City: [[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Employee:</strong> [[employee_full_name]]</p>
                                <p><strong>Position:</strong> [[employee_position]]</p>
                                <p>Reporting Period: from [[period_from]] to [[period_to]]</p>
                                <p>Purpose of Advance: [[purpose_of_advance]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">EXPENSE DETAILS:</h2>
                                <pre>[[expenses_table]]</pre>
                                <p>Total Expenses Amount: <strong>[[total_expenses]]</strong></p>
                                <p>Advance Received: <strong>[[advance_received]]</strong></p>
                                <p>Balance (to be returned/paid out): <strong>[[balance_due]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employee</p></td>
                                <td width="50%"><p>___________________<br>[[approver_full_name]]<br>[[approver_position]]</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Авансовий звіт',
                        'description' => 'Документ, що використовується для розрахунку авансу, отриманого на службові цілі.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">АВАНСОВИЙ ЗВІТ</h1><p style="font-size: 14px;">Номер: [[report_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Компанія: [[company_name]]</p></td><td style="text-align: right;"><p>Місто: [[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Працівник:</strong> [[employee_full_name]]</p>
                                <p><strong>Посада:</strong> [[employee_position]]</p>
                                <p>Звітний період: з [[period_from]] по [[period_to]]</p>
                                <p>Мета авансу: [[purpose_of_advance]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ДЕТАЛІ ВИТРАТ:</h2>
                                <pre>[[expenses_table]]</pre>
                                <p>Загальна сума витрат: <strong>[[total_expenses]]</strong></p>
                                <p>Отриманий аванс: <strong>[[advance_received]]</strong></p>
                                <p>Залишок (до повернення/виплати): <strong>[[balance_due]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Працівник</p></td>
                                <td width="50%"><p>___________________<br>[[approver_full_name]]<br>[[approver_position]]</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Spesenabrechnung',
                        'description' => 'Ein Dokument zur Abrechnung eines für geschäftliche Zwecke entnommenen Vorschusses.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SPESENABRECHNUNG</h1><p style="font-size: 14px;">Nummer: [[report_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Firma: [[company_name]]</p></td><td style="text-align: right;"><p>Ort: [[city]], ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Mitarbeiter:</strong> [[employee_full_name]]</p>
                                <p><strong>Position:</strong> [[employee_position]]</p>
                                <p>Abrechnungszeitraum: von [[period_from]] bis [[period_to]]</p>
                                <p>Zweck des Vorschusses: [[purpose_of_advance]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">SPESENDETAILS:</h2>
                                <pre>[[expenses_table]]</pre>
                                <p>Gesamtausgabenbetrag: <strong>[[total_expenses]]</strong></p>
                                <p>Erhaltene Vorauszahlung: <strong>[[advance_received]]</strong></p>
                                <p>Saldo (zurückzuzahlen/auszuzahlen): <strong>[[balance_due]]</strong></p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Mitarbeiter</p></td>
                                <td width="50%"><p>___________________<br>[[approver_full_name]]<br>[[approver_position]]</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 41. Доверенность на получение ТМЦ / Power of Attorney for Goods Receipt ---
            [
                'slug' => 'power-of-attorney-goods-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"poa_number","type":"text","required":true,"labels":{"pl":"Numer pełnomocnictwa","en":"Power of Attorney Number","uk":"Номер довіреності","de":"Vollmachtnummer"}},
                    {"name":"issue_date","type":"date","required":true,"labels":{"pl":"Data wystawienia","en":"Issue Date","uk":"Дата виставлення","de":"Ausstellungsdatum"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy (udzielającej pełnomocnictwa)","en":"Company Name (granting power of attorney)","uk":"Назва компанії (що надає довіреність)","de":"Firmenname (Vollmachtgeber)"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens"}},
                    {"name":"company_nip","type":"text","required":true,"labels":{"pl":"NIP firmy","en":"Company NIP","uk":"ІПН компанії","de":"USt-IdNr. des Unternehmens"}},
                    {"name":"representative_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko przedstawiciela","en":"Representative Full Name","uk":"ПІБ представника","de":"Vollständiger Name des Vertreters"}},
                    {"name":"representative_id_number","type":"text","required":true,"labels":{"pl":"Numer dowodu tożsamości przedstawiciela","en":"Representative ID Number","uk":"Номер посвідчення представника","de":"Ausweisnummer des Vertreters"}},
                    {"name":"goods_description","type":"textarea","required":true,"labels":{"pl":"Opis towarów/materiałów do odbioru","en":"Description of goods/materials to be received","uk":"Опис товарів/матеріалів для отримання","de":"Beschreibung der zu empfangenden Waren/Materialien"}},
                    {"name":"supplier_name","type":"text","required":true,"labels":{"pl":"Nazwa dostawcy","en":"Supplier Name","uk":"Назва постачальника","de":"Name des Lieferanten"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Pełnomocnictwo do odbioru towarów',
                        'description' => 'Dokument uprawniający wskazaną osobę do odbioru towarów lub materiałów w imieniu firmy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PEŁNOMOCNICTWO</h1><p style="font-size: 14px;">Numer: [[poa_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Data wystawienia: [[issue_date]]</p></td><td style="text-align: right;"><p>Miejscowość: ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszym <strong>[[company_name]]</strong> z siedzibą w [[company_address]], NIP: [[company_nip]],</p>
                                <p>udziela pełnomocnictwa Panu/Pani: <strong>[[representative_full_name]]</strong>, legitymującemu/ej się dowodem osobistym o numerze: [[representative_id_number]],</p>
                                <p>do odbioru w naszym imieniu od firmy <strong>[[supplier_name]]</strong> następujących towarów/materiałów:</p>
                                <p>[[goods_description]]</p>
                                <br/>
                                <p>Pełnomocnictwo jest ważne do odwołania.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Podpis osoby upoważnionej z firmy)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Power of Attorney for Goods Receipt',
                        'description' => 'A document authorizing a designated person to receive goods or materials on behalf of the company.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POWER OF ATTORNEY</h1><p style="font-size: 14px;">Number: [[poa_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Issue Date: [[issue_date]]</p></td><td style="text-align: right;"><p>City: ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hereby <strong>[[company_name]]</strong> with its registered office in [[company_address]], NIP: [[company_nip]],</p>
                                <p>grants power of attorney to Mr./Ms.: <strong>[[representative_full_name]]</strong>, holding ID number: [[representative_id_number]],</p>
                                <p>to receive on our behalf from the company <strong>[[supplier_name]]</strong> the following goods/materials:</p>
                                <p>[[goods_description]]</p>
                                <br/>
                                <p>This Power of Attorney is valid until revoked.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Signature of authorized person from the company)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Довіреність на отримання ТМЦ',
                        'description' => 'Документ, що уповноважує зазначену особу на отримання товарів або матеріалів від імені компанії.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОВІРЕНІСТЬ</h1><p style="font-size: 14px;">Номер: [[poa_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Дата виставлення: [[issue_date]]</p></td><td style="text-align: right;"><p>Місто: ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цим <strong>[[company_name]]</strong> з місцезнаходженням у [[company_address]], ІПН: [[company_nip]],</p>
                                <p>надає довіреність Пану/Пані: <strong>[[representative_full_name]]</strong>, який/яка має посвідчення особи номер: [[representative_id_number]],</p>
                                <p>на отримання від нашого імені від компанії <strong>[[supplier_name]]</strong> наступних товарів/матеріалів:</p>
                                <p>[[goods_description]]</p>
                                <br/>
                                <p>Довіреність дійсна до відкликання.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Підпис уповноваженої особи від компанії)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Vollmacht zur Warenannahme',
                        'description' => 'Ein Dokument, das eine bestimmte Person ermächtigt, Waren oder Materialien im Namen des Unternehmens entgegenzunehmen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VOLLMACHT</h1><p style="font-size: 14px;">Nummer: [[poa_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ausstellungsdatum: [[issue_date]]</p></td><td style="text-align: right;"><p>Ort: ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Hiermit erteilt die <strong>[[company_name]]</strong> mit Sitz in [[company_address]], USt-IdNr.: [[company_nip]],</p>
                                <p>Herrn/Frau: <strong>[[representative_full_name]]</strong>, Ausweisnummer: [[representative_id_number]], die Vollmacht,</p>
                                <p>in unserem Namen von der Firma <strong>[[supplier_name]]</strong> folgende Waren/Materialien entgegenzunehmen:</p>
                                <p>[[goods_description]]</p>
                                <br/>
                                <p>Die Vollmacht ist bis auf Widerruf gültig.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Unterschrift der bevollmächtigten Person des Unternehmens)</p>
                            </div>'
                    ]
                ]
            ],

            // --- 42. Протокол разногласий к договору / Protocol of Disagreements to the Contract ---
            [
                'slug' => 'protocol-disagreements-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"protocol_number","type":"text","required":true,"labels":{"pl":"Numer protokołu","en":"Protocol Number","uk":"Номер протоколу","de":"Protokollnummer"}},
                    {"name":"protocol_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia","en":"Date of Preparation","uk":"Дата складання","de":"Erstellungsdatum"}},
                    {"name":"contract_name","type":"text","required":true,"labels":{"pl":"Nazwa umowy","en":"Contract Name","uk":"Назва договору","de":"Vertragsname"}},
                    {"name":"contract_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Contract Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"party_one_name","type":"text","required":true,"labels":{"pl":"Strona 1 (nazwa firmy)","en":"Party 1 (company name)","uk":"Сторона 1 (назва компанії)","de":"Partei 1 (Firmenname)"}},
                    {"name":"party_one_address","type":"text","required":true,"labels":{"pl":"Adres Strony 1","en":"Party 1 Address","uk":"Адреса Сторони 1","de":"Adresse der Partei 1"}},
                    {"name":"party_two_name","type":"text","required":true,"labels":{"pl":"Strona 2 (nazwa firmy)","en":"Party 2 (company name)","uk":"Сторона 2 (назва компанії)","de":"Partei 2 (Firmenname)"}},
                    {"name":"party_two_address","type":"text","required":true,"labels":{"pl":"Adres Strony 2","en":"Party 2 Address","uk":"Адреса Сторони 2","de":"Adresse der Partei 2"}},
                    {"name":"disagreement_points","type":"textarea","required":true,"labels":{"pl":"Punkty rozbieżności (artykuł, propozycja strony 1, propozycja strony 2, uzasadnienie)","en":"Points of disagreement (article, proposal of party 1, proposal of party 2, justification)","uk":"Пункти розбіжностей (стаття, пропозиція сторони 1, пропозиція сторони 2, обґрунтування)","de":"Streitpunkte (Artikel, Vorschlag Partei 1, Vorschlag Partei 2, Begründung)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Protokół rozbieżności do umowy',
                        'description' => 'Dokument formalizujący rozbieżności między stronami w treści umowy.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKÓŁ ROZBIEŻNOŚCI</h1><p style="font-size: 14px;">Numer: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Dotyczy umowy: <strong>[[contract_name]]</strong> z dnia [[contract_date]]</p></td><td style="text-align: right;"><p>Miejscowość: [[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Sporządzony pomiędzy:</p>
                                <p><strong>Stroną 1:</strong> [[party_one_name]], adres: [[party_one_address]]</p>
                                <p>a</p>
                                <p><strong>Stroną 2:</strong> [[party_two_name]], adres: [[party_two_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">PUNKTY ROZBIEŻNOŚCI:</h2>
                                <pre>[[disagreement_points]]</pre>
                                <br/>
                                <p>Protokół stanowi integralną część umowy i powinien być do niej dołączony.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Strona 1</p></td>
                                <td width="50%"><p>___________________<br>Strona 2</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Protocol of Disagreements to the Contract',
                        'description' => 'A document formalizing disagreements between parties regarding the content of a contract.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOCOL OF DISAGREEMENTS</h1><p style="font-size: 14px;">Number: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concerning contract: <strong>[[contract_name]]</strong> dated [[contract_date]]</p></td><td style="text-align: right;"><p>City: [[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Prepared between:</p>
                                <p><strong>Party 1:</strong> [[party_one_name]], address: [[party_one_address]]</p>
                                <p>and</p>
                                <p><strong>Party 2:</strong> [[party_two_name]], address: [[party_two_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">POINTS OF DISAGREEMENT:</h2>
                                <pre>[[disagreement_points]]</pre>
                                <br/>
                                <p>The protocol is an integral part of the contract and should be attached to it.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Party 1</p></td>
                                <td width="50%"><p>___________________<br>Party 2</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Протокол розбіжностей до договору',
                        'description' => 'Документ, що формалізує розбіжності між сторонами у змісті договору.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПРОТОКОЛ РОЗБІЖНОСТЕЙ</h1><p style="font-size: 14px;">Номер: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Щодо договору: <strong>[[contract_name]]</strong> від [[contract_date]]</p></td><td style="text-align: right;"><p>Місто: [[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Складено між:</p>
                                <p><strong>Стороною 1:</strong> [[party_one_name]], адреса: [[party_one_address]]</p>
                                <p>та</p>
                                <p><strong>Стороною 2:</strong> [[party_two_name]], адреса: [[party_two_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">ПУНКТИ РОЗБІЖНОСТЕЙ:</h2>
                                <pre>[[disagreement_points]]</pre>
                                <br/>
                                <p>Протокол є невід\'ємною частиною договору і повинен бути до нього доданий.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Сторона 1</p></td>
                                <td width="50%"><p>___________________<br>Сторона 2</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Protokoll der Meinungsverschiedenheiten zum Vertrag',
                        'description' => 'Ein Dokument, das Meinungsverschiedenheiten zwischen den Parteien bezüglich des Vertragsinhalts formalisiert.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PROTOKOLL DER MEINUNGSVERSCHIEDENHEITEN</h1><p style="font-size: 14px;">Nummer: [[protocol_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Betrifft Vertrag: <strong>[[contract_name]]</strong> vom [[contract_date]]</p></td><td style="text-align: right;"><p>Ort: [[city]], ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p>Erstellt zwischen:</p>
                                <p><strong>Partei 1:</strong> [[party_one_name]], Adresse: [[party_one_address]]</p>
                                <p>und</p>
                                <p><strong>Partei 2:</strong> [[party_two_name]], Adresse: [[party_two_address]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">STREITPUNKTE:</h2>
                                <pre>[[disagreement_points]]</pre>
                                <br/>
                                <p>Das Protokoll ist integraler Bestandteil des Vertrages und sollte diesem beigefügt werden.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Partei 1</p></td>
                                <td width="50%"><p>___________________<br>Partei 2</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 43. Договор на разработку программного обеспечения / Software Development Agreement ---
            [
                'slug' => 'software-development-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"developer_name","type":"text","required":true,"labels":{"pl":"Wykonawca (nazwa firmy/imię i nazwisko)","en":"Developer (company name/full name)","uk":"Розробник (назва компанії/ПІБ)","de":"Entwickler (Firmenname/vollständiger Name)"}},
                    {"name":"developer_address","type":"text","required":true,"labels":{"pl":"Adres wykonawcy","en":"Developer Address","uk":"Адреса розробника","de":"Adresse des Entwicklers"}},
                    {"name":"developer_nip","type":"text","required":true,"labels":{"pl":"NIP wykonawcy (jeśli firma)","en":"Developer NIP (if company)","uk":"ІПН розробника (якщо компанія)","de":"USt-IdNr. des Entwicklers (falls Firma)"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"pl":"Klient (nazwa firmy/imię i nazwisko)","en":"Client (company name/full name)","uk":"Клієнт (назва компанії/ПІБ)","de":"Kunde (Firmenname/vollständiger Name)"}},
                    {"name":"client_address","type":"text","required":true,"labels":{"pl":"Adres klienta","en":"Client Address","uk":"Адреса клієнта","de":"Adresse des Kunden"}},
                    {"name":"client_nip","type":"text","required":true,"labels":{"pl":"NIP klienta (jeśli firma)","en":"Client NIP (if company)","uk":"ІПН клієнта (якщо компанія)","de":"USt-IdNr. des Kunden (falls Firma)"}},
                    {"name":"project_description","type":"textarea","required":true,"labels":{"pl":"Opis projektu oprogramowania","en":"Description of software project","uk":"Опис проекту програмного забезпечення","de":"Beschreibung des Softwareprojekts"}},
                    {"name":"delivery_date","type":"date","required":true,"labels":{"pl":"Termin dostarczenia","en":"Delivery Date","uk":"Термін доставки","de":"Lieferdatum"}},
                    {"name":"total_fee","type":"number","required":true,"labels":{"pl":"Całkowite wynagrodzenie","en":"Total Fee","uk":"Загальна винагорода","de":"Gesamtvergütung"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa na rozwój oprogramowania',
                        'description' => 'Umowa regulująca warunki tworzenia i dostarczania oprogramowania.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NA ROZWÓJ OPROGRAMOWANIA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Wykonawcą:</strong> [[developer_name]], adres: [[developer_address]], NIP: [[developer_nip]],</p>
                                <p>a</p>
                                <p><strong>Klientem:</strong> [[client_name]], adres: [[client_address]], NIP: [[client_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Przedmiotem umowy jest rozwój oprogramowania zgodnie z opisem:</p>
                                <p>[[project_description]]</p>
                                <p>Termin dostarczenia: <strong>[[delivery_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Wynagrodzenie i płatności</h2>
                                <p>Całkowite wynagrodzenie wynosi: <strong>[[total_fee]] [[currency]]</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Wykonawca</p></td>
                                <td width="50%"><p>___________________<br>Klient</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Software Development Agreement',
                        'description' => 'An agreement regulating the terms of software creation and delivery.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SOFTWARE DEVELOPMENT AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Developer:</strong> [[developer_name]], address: [[developer_address]], NIP: [[developer_nip]],</p>
                                <p>and</p>
                                <p><strong>Client:</strong> [[client_name]], address: [[client_address]], NIP: [[client_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The subject of the agreement is the development of software according to the description:</p>
                                <p>[[project_description]]</p>
                                <p>Delivery date: <strong>[[delivery_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Remuneration and Payments</h2>
                                <p>The total fee is: <strong>[[total_fee]] [[currency]]</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Developer</p></td>
                                <td width="50%"><p>___________________<br>Client</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір на розробку програмного забезпечення',
                        'description' => 'Договір, що регулює умови створення та постачання програмного забезпечення.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР НА РОЗРОБКУ ПРОГРАМНОГО ЗАБЕЗПЕЧЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Розробником:</strong> [[developer_name]], адреса: [[developer_address]], ІПН: [[developer_nip]],</p>
                                <p>та</p>
                                <p><strong>Клієнтом:</strong> [[client_name]], адреса: [[client_address]], ІПН: [[client_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Предметом договору є розробка програмного забезпечення відповідно до опису:</p>
                                <p>[[project_description]]</p>
                                <p>Термін доставки: <strong>[[delivery_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Винагорода та платежі</h2>
                                <p>Загальна винагорода становить: <strong>[[total_fee]] [[currency]]</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Розробник</p></td>
                                <td width="50%"><p>___________________<br>Клієнт</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Softwareentwicklungsvertrag',
                        'description' => 'Ein Vertrag, der die Bedingungen für die Erstellung und Lieferung von Software regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SOFTWAREENTWICKLUNGSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Entwickler:</strong> [[developer_name]], Adresse: [[developer_address]], USt-IdNr.: [[developer_nip]],</p>
                                <p>und</p>
                                <p><strong>Kunde:</strong> [[client_name]], Adresse: [[client_address]], USt-IdNr.: [[client_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Gegenstand des Vertrages ist die Entwicklung von Software gemäß der Beschreibung:</p>
                                <p>[[project_description]]</p>
                                <p>Liefertermin: <strong>[[delivery_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Vergütung und Zahlungen</h2>
                                <p>Die Gesamtvergütung beträgt: <strong>[[total_fee]] [[currency]]</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Entwickler</p></td>
                                <td width="50%"><p>___________________<br>Kunde</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- 44. Договор на создание и поддержку сайта / Website Creation and Support Agreement ---
            [
                'slug' => 'website-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"service_provider_name","type":"text","required":true,"labels":{"pl":"Usługodawca (nazwa firmy/imię i nazwisko)","en":"Service Provider (company name/full name)","uk":"Постачальник послуг (назва компанії/ПІБ)","de":"Dienstleister (Firmenname/vollständiger Name)"}},
                    {"name":"service_provider_address","type":"text","required":true,"labels":{"pl":"Adres usługodawcy","en":"Service Provider Address","uk":"Адреса постачальника послуг","de":"Adresse des Dienstleisters"}},
                    {"name":"service_provider_nip","type":"text","required":true,"labels":{"pl":"NIP usługodawcy (jeśli firma)","en":"Service Provider NIP (if company)","uk":"ІПН постачальника послуг (якщо компанія)","de":"USt-IdNr. des Dienstleisters (falls Firma)"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"pl":"Klient (nazwa firmy/imię i nazwisko)","en":"Client (company name/full name)","uk":"Клієнт (назва компанії/ПІБ)","de":"Kunde (Firmenname/vollständiger Name)"}},
                    {"name":"client_address","type":"text","required":true,"labels":{"pl":"Adres klienta","en":"Client Address","uk":"Адреса клієнта","de":"Adresse des Kunden"}},
                    {"name":"client_nip","type":"text","required":true,"labels":{"pl":"NIP klienta (jeśli firma)","en":"Client NIP (if company)","uk":"ІПН клієнта (якщо компанія)","de":"USt-IdNr. des Kunden (falls Firma)"}},
                    {"name":"website_description","type":"textarea","required":true,"labels":{"pl":"Opis strony internetowej (funkcjonalności, wygląd)","en":"Website description (functionalities, appearance)","uk":"Опис веб-сайту (функціональність, зовнішній вигляд)","de":"Website-Beschreibung (Funktionalitäten, Aussehen)"}},
                    {"name":"creation_deadline","type":"date","required":true,"labels":{"pl":"Termin wykonania strony","en":"Website Creation Deadline","uk":"Термін створення веб-сайту","de":"Frist für die Website-Erstellung"}},
                    {"name":"support_period","type":"text","required":true,"labels":{"pl":"Okres wsparcia/utrzymania","en":"Support/Maintenance Period","uk":"Період підтримки/обслуговування","de":"Support-/Wartungszeitraum"}},
                    {"name":"total_fee","type":"number","required":true,"labels":{"pl":"Całkowite wynagrodzenie","en":"Total Fee","uk":"Загальна винагорода","de":"Gesamtvergütung"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment Terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa na stworzenie i wsparcie strony internetowej',
                        'description' => 'Umowa regulująca warunki stworzenia, wdrożenia i wsparcia technicznego strony internetowej.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA NA STWORZENIE I WSPARCIE STRONY INTERNETOWEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Usługodawcą:</strong> [[service_provider_name]], adres: [[service_provider_address]], NIP: [[service_provider_nip]],</p>
                                <p>a</p>
                                <p><strong>Klientem:</strong> [[client_name]], adres: [[client_address]], NIP: [[client_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Przedmiot umowy</h2>
                                <p>Przedmiotem umowy jest stworzenie i wdrożenie strony internetowej zgodnie z opisem:</p>
                                <p>[[website_description]]</p>
                                <p>Termin wykonania: <strong>[[creation_deadline]]</strong>.</p>
                                <p>Okres wsparcia: [[support_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Wynagrodzenie i płatności</h2>
                                <p>Całkowite wynagrodzenie wynosi: <strong>[[total_fee]] [[currency]]</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Postanowienia końcowe</h2>
                                <p>W sprawach nieuregulowanych niniejszą umową mają zastosowanie przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Usługodawca</p></td>
                                <td width="50%"><p>___________________<br>Klient</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Website Creation and Support Agreement',
                        'description' => 'An agreement regulating the terms of website creation, implementation, and technical support.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WEBSITE CREATION AND SUPPORT AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Service Provider:</strong> [[service_provider_name]], address: [[service_provider_address]], NIP: [[service_provider_nip]],</p>
                                <p>and</p>
                                <p><strong>Client:</strong> [[client_name]], address: [[client_address]], NIP: [[client_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Subject of the Agreement</h2>
                                <p>The subject of the agreement is the creation and implementation of a website according to the description:</p>
                                <p>[[website_description]]</p>
                                <p>Completion deadline: <strong>[[creation_deadline]]</strong>.</p>
                                <p>Support period: [[support_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Remuneration and Payments</h2>
                                <p>The total fee is: <strong>[[total_fee]] [[currency]]</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Final Provisions</h2>
                                <p>Matters not regulated by this agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Service Provider</p></td>
                                <td width="50%"><p>___________________<br>Client</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір на створення та підтримку веб-сайту',
                        'description' => 'Договір, що регулює умови створення, впровадження та технічної підтримки веб-сайту.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР НА СТВОРЕННЯ ТА ПІДТРИМКУ ВЕБ-САЙТУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Постачальником послуг:</strong> [[service_provider_name]], адреса: [[service_provider_address]], ІПН: [[service_provider_nip]],</p>
                                <p>та</p>
                                <p><strong>Клієнтом:</strong> [[client_name]], адреса: [[client_address]], ІПН: [[client_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Предмет договору</h2>
                                <p>Предметом договору є створення та впровадження веб-сайту відповідно до опису:</p>
                                <p>[[website_description]]</p>
                                <p>Термін виконання: <strong>[[creation_deadline]]</strong>.</p>
                                <p>Період підтримки: [[support_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Винагорода та платежі</h2>
                                <p>Загальна винагорода становить: <strong>[[total_fee]] [[currency]]</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Прикінцеві положення</h2>
                                <p>У справах, не врегульованих цим договором, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Постачальник послуг</p></td>
                                <td width="50%"><p>___________________<br>Клієнт</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Vertrag über Website-Erstellung und -Support',
                        'description' => 'Ein Vertrag, der die Bedingungen für die Erstellung, Implementierung und den technischen Support einer Website regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">VERTRAG ÜBER WEBSITE-ERSTELLUNG UND -SUPPORT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Dienstleister:</strong> [[service_provider_name]], Adresse: [[service_provider_address]], USt-IdNr.: [[service_provider_nip]],</p>
                                <p>und</p>
                                <p><strong>Kunde:</strong> [[client_name]], Adresse: [[client_address]], USt-IdNr.: [[client_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 1. Vertragsgegenstand</h2>
                                <p>Gegenstand des Vertrages ist die Erstellung und Implementierung einer Website gemäß der Beschreibung:</p>
                                <p>[[website_description]]</p>
                                <p>Frist für die Fertigstellung: <strong>[[creation_deadline]]</strong>.</p>
                                <p>Supportzeitraum: [[support_period]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 2. Vergütung und Zahlungen</h2>
                                <p>Die Gesamtvergütung beträgt: <strong>[[total_fee]] [[currency]]</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">§ 3. Schlussbestimmungen</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Dienstleister</p></td>
                                <td width="50%"><p>___________________<br>Kunde</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],
            [
                'slug' => 'technical-specification-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"ts_number","type":"text","required":true,"labels":{"pl":"Numer TZ","en":"TS Number","uk":"Номер ТЗ","de":"TS-Nummer"}},
                    {"name":"issue_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia","en":"Issue Date","uk":"Дата складання","de":"Erstellungsdatum"}},
                    {"name":"project_name","type":"text","required":true,"labels":{"pl":"Nazwa projektu","en":"Project Name","uk":"Назва проекту","de":"Projektname"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"pl":"Klient (nazwa firmy)","en":"Client (company name)","uk":"Клієнт (назва компанії)","de":"Kunde (Firmenname)"}},
                    {"name":"developer_name","type":"text","required":true,"labels":{"pl":"Wykonawca (nazwa firmy)","en":"Developer (company name)","uk":"Виконавець (назва компанії)","de":"Entwickler (Firmenname)"}},
                    {"name":"general_description","type":"textarea","required":true,"labels":{"pl":"Ogólny opis projektu","en":"General project description","uk":"Загальний опис проекту","de":"Allgemeine Projektbeschreibung"}},
                    {"name":"functional_requirements","type":"textarea","required":true,"labels":{"pl":"Wymagania funkcjonalne","en":"Functional requirements","uk":"Функціональні вимоги","de":"Funktionale Anforderungen"}},
                    {"name":"non_functional_requirements","type":"textarea","required":true,"labels":{"pl":"Wymagania niefunkcjonalne","en":"Non-functional requirements","uk":"Нефункціональні вимоги","de":"Nicht-funktionale Anforderungen"}},
                    {"name":"technologies_used","type":"textarea","required":true,"labels":{"pl":"Wykorzystane technologie","en":"Technologies used","uk":"Використані технології","de":"Verwendete Technologien"}},
                    {"name":"delivery_schedule","type":"textarea","required":true,"labels":{"pl":"Harmonogram dostarczenia","en":"Delivery schedule","uk":"Графік постачання","de":"Lieferplan"}},
                    {"name":"acceptance_criteria","type":"textarea","required":true,"labels":{"pl":"Kryteria odbioru","en":"Acceptance criteria","uk":"Критерії приймання","de":"Abnahmekriterien"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Specyfikacja Techniczna (TZ)',
                        'description' => 'Dokument szczegółowo opisujący wymagania i funkcjonalności dla projektu deweloperskiego.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SPECYFIKACJA TECHNICZNA</h1><p style="font-size: 14px;">Numer: [[ts_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Projekt: <strong>[[project_name]]</strong></p></td><td style="text-align: right;"><p>Miejscowość: [[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Klient:</strong> [[client_name]]</p>
                                <p><strong>Wykonawca:</strong> [[developer_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. OGÓLNY OPIS PROJEKTU</h2>
                                <p>[[general_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. WYMAGANIA FUNKCJONALNE</h2>
                                <p>[[functional_requirements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. WYMAGANIA NIEFUNKCJONALNE</h2>
                                <p>[[non_functional_requirements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. WYKORZYSTANE TECHNOLOGIE</h2>
                                <p>[[technologies_used]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. HARMONOGRAM DOSTARCZENIA</h2>
                                <p>[[delivery_schedule]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. KRYTERIA ODBIORU</h2>
                                <p>[[acceptance_criteria]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Klient</p></td>
                                <td width="50%"><p>___________________<br>Wykonawca</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Technical Specification (TS) for Development',
                        'description' => 'A document detailing the requirements and functionalities for a development project.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TECHNICAL SPECIFICATION</h1><p style="font-size: 14px;">Number: [[ts_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Project: <strong>[[project_name]]</strong></p></td><td style="text-align: right;"><p>City: [[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Client:</strong> [[client_name]]</p>
                                <p><strong>Developer:</strong> [[developer_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. GENERAL PROJECT DESCRIPTION</h2>
                                <p>[[general_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. FUNCTIONAL REQUIREMENTS</h2>
                                <p>[[functional_requirements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. NON-FUNCTIONAL REQUIREMENTS</h2>
                                <p>[[non_functional_requirements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. TECHNOLOGIES USED</h2>
                                <p>[[technologies_used]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. DELIVERY SCHEDULE</h2>
                                <p>[[delivery_schedule]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. ACCEPTANCE CRITERIA</h2>
                                <p>[[acceptance_criteria]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Client</p></td>
                                <td width="50%"><p>___________________<br>Developer</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Технічне завдання (ТЗ) на розробку',
                        'description' => 'Документ, що детально описує вимоги та функціональні можливості для проекту розробки.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ТЕХНІЧНЕ ЗАВДАННЯ</h1><p style="font-size: 14px;">Номер: [[ts_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Проект: <strong>[[project_name]]</strong></p></td><td style="text-align: right;"><p>Місто: [[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Клієнт:</strong> [[client_name]]</p>
                                <p><strong>Виконавець:</strong> [[developer_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ЗАГАЛЬНИЙ ОПИС ПРОЕКТУ</h2>
                                <p>[[general_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. ФУНКЦІОНАЛЬНІ ВИМОГИ</h2>
                                <p>[[functional_requirements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. НЕФУНКЦІОНАЛЬНІ ВИМОГИ</h2>
                                <p>[[non_functional_requirements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. ВИКОРИСТАНІ ТЕХНОЛОГІЇ</h2>
                                <p>[[technologies_used]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. ГРАФІК ПОСТАЧАННЯ</h2>
                                <p>[[delivery_schedule]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. КРИТЕРІЇ ПРИЙМАННЯ</h2>
                                <p>[[acceptance_criteria]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Клієнт</p></td>
                                <td width="50%"><p>___________________<br>Виконавець</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Technische Spezifikation (TS) für die Entwicklung',
                        'description' => 'Ein Dokument, das die Anforderungen und Funktionalitäten für ein Entwicklungsprojekt detailliert beschreibt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TECHNISCHE SPEZIFIKATION</h1><p style="font-size: 14px;">Nummer: [[ts_number]]</p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Projekt: <strong>[[project_name]]</strong></p></td><td style="text-align: right;"><p>Ort: [[city]], ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;">
                                <p><strong>Kunde:</strong> [[client_name]]</p>
                                <p><strong>Entwickler:</strong> [[developer_name]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ALLGEMEINE PROJEKTBESCHREIBUNG</h2>
                                <p>[[general_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. FUNKTIONALE ANFORDERUNGEN</h2>
                                <p>[[functional_requirements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. NICHT-FUNKTIONALE ANFORDERUNGEN</h2>
                                <p>[[non_functional_requirements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. VERWENDETE TECHNOLOGIEN</h2>
                                <p>[[technologies_used]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. LIEFERPLAN</h2>
                                <p>[[delivery_schedule]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">6. ABNAHMEKRITERIEN</h2>
                                <p>[[acceptance_criteria]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Kunde</p></td>
                                <td width="50%"><p>___________________<br>Entwickler</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Пользовательское соглашение для сайта / Website User Agreement ---
            [
                'slug' => 'website-user-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data wejścia w życie","en":"Effective Date","uk":"Дата набрання чинності","de":"Datum des Inkrafttretens"}},
                    {"name":"website_name","type":"text","required":true,"labels":{"pl":"Nazwa strony internetowej","en":"Website Name","uk":"Назва веб-сайту","de":"Name der Website"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy (operatora strony)","en":"Company Name (website operator)","uk":"Назва компанії (оператора веб-сайту)","de":"Firmenname (Website-Betreiber)"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens"}},
                    {"name":"terms_of_use","type":"textarea","required":true,"labels":{"pl":"Warunki użytkowania (np. prawa i obowiązki użytkowników, zasady korzystania)","en":"Terms of Use (e.g., user rights and obligations, usage rules)","uk":"Умови використання (напр., права та обов\'язки користувачів, правила користування)","de":"Nutzungsbedingungen (z.B. Rechte und Pflichten der Nutzer, Nutzungsregeln)"}},
                    {"name":"limitation_of_liability","type":"textarea","required":true,"labels":{"pl":"Ograniczenie odpowiedzialności","en":"Limitation of Liability","uk":"Обмеження відповідальності","de":"Haftungsbeschränkung"}},
                    {"name":"governing_law","type":"text","required":true,"labels":{"pl":"Prawo właściwe i jurysdykcja","en":"Governing Law and Jurisdiction","uk":"Застосовне право та юрисдикція","de":"Anwendbares Recht und Gerichtsstand"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Regulamin strony internetowej',
                        'description' => 'Dokument określający zasady korzystania ze strony internetowej, prawa i obowiązki użytkowników.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">REGULAMIN STRONY INTERNETOWEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Dla strony: <strong>[[website_name]]</strong></p></td><td style="text-align: right;"><p>Miejscowość: [[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejszy Regulamin określa zasady korzystania ze strony internetowej <strong>[[website_name]]</strong>, prowadzonej przez [[company_name]] z siedzibą w [[company_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. WARUNKI UŻYTKOWANIA</h2>
                                <p>[[terms_of_use]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. OGRANICZENIE ODPOWIEDZIALNOŚCI</h2>
                                <p>[[limitation_of_liability]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. PRAWO WŁAŚCIWE I JURYSDYKCJA</h2>
                                <p>[[governing_law]]</p>
                                <br/>
                                <p>Regulamin wchodzi w życie z dniem: <strong>[[agreement_date]]</strong>.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Operator strony)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Website User Agreement',
                        'description' => 'A document outlining the rules for using a website, user rights, and obligations.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WEBSITE USER AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>For website: <strong>[[website_name]]</strong></p></td><td style="text-align: right;"><p>City: [[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This User Agreement sets out the rules for using the website <strong>[[website_name]]</strong>, operated by [[company_name]] with its registered office in [[company_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. TERMS OF USE</h2>
                                <p>[[terms_of_use]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. LIMITATION OF LIABILITY</h2>
                                <p>[[limitation_of_liability]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. GOVERNING LAW AND JURISDICTION</h2>
                                <p>[[governing_law]]</p>
                                <br/>
                                <p>This Agreement comes into effect on: <strong>[[agreement_date]]</strong>.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Website Operator)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Користувацька угода для веб-сайту',
                        'description' => 'Документ, що визначає правила користування веб-сайтом, права та обов\'язки користувачів.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КОРИСТУВАЦЬКА УГОДА ДЛЯ ВЕБ-САЙТУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Для веб-сайту: <strong>[[website_name]]</strong></p></td><td style="text-align: right;"><p>Місто: [[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ця Користувацька угода визначає правила користування веб-сайтом <strong>[[website_name]]</strong>, що управляється [[company_name]] з місцезнаходженням у [[company_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. УМОВИ ВИКОРИСТАННЯ</h2>
                                <p>[[terms_of_use]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. ОБМЕЖЕННЯ ВІДПОВІДАЛЬНОСТІ</h2>
                                <p>[[limitation_of_liability]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ЗАСТОСОВНЕ ПРАВО ТА ЮРИСДИКЦІЯ</h2>
                                <p>[[governing_law]]</p>
                                <br/>
                                <p>Угода набирає чинності з: <strong>[[agreement_date]]</strong>.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Оператор веб-сайту)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Website-Nutzungsbedingungen',
                        'description' => 'Ein Dokument, das die Regeln für die Nutzung einer Website, Benutzerrechte und -pflichten festlegt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WEBSITE-NUTZUNGSBEDINGUNGEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Für Website: <strong>[[website_name]]</strong></p></td><td style="text-align: right;"><p>Ort: [[city]], ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Diese Nutzungsbedingungen legen die Regeln für die Nutzung der Website <strong>[[website_name]]</strong> fest, die von [[company_name]] mit Sitz in [[company_address]] betrieben wird.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. NUTZUNGSBEDINGUNGEN</h2>
                                <p>[[terms_of_use]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. HAFTUNGSBESCHRÄNKUNG</h2>
                                <p>[[limitation_of_liability]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ANWENDBARES RECHT UND GERICHTSSTAND</h2>
                                <p>[[governing_law]]</p>
                                <br/>
                                <p>Diese Vereinbarung tritt in Kraft am: <strong>[[agreement_date]]</strong>.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Website-Betreiber)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Политика конфиденциальности / Privacy Policy ---
            [
                'slug' => 'privacy-policy-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"policy_date","type":"date","required":true,"labels":{"pl":"Data wejścia w życie","en":"Effective Date","uk":"Дата набрання чинності","de":"Datum des Inkrafttretens"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy (administratora danych)","en":"Company Name (data controller)","uk":"Назва компанії (контролера даних)","de":"Firmenname (Datenverantwortlicher)"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens"}},
                    {"name":"data_collected","type":"textarea","required":true,"labels":{"pl":"Rodzaje zbieranych danych","en":"Types of data collected","uk":"Типи зібраних даних","de":"Arten der gesammelten Daten"}},
                    {"name":"purpose_of_data","type":"textarea","required":true,"labels":{"pl":"Cel zbierania danych","en":"Purpose of data collection","uk":"Мета збору даних","de":"Zweck der Datenerhebung"}},
                    {"name":"data_sharing","type":"textarea","required":true,"labels":{"pl":"Udostępnianie danych","en":"Data sharing","uk":"Передача даних","de":"Datenweitergabe"}},
                    {"name":"user_rights","type":"textarea","required":true,"labels":{"pl":"Prawa użytkowników (np. dostęp, poprawianie, usunięcie)","en":"User rights (e.g., access, rectification, erasure)","uk":"Права користувачів (напр., доступ, виправлення, видалення)","de":"Nutzerrechte (z.B. Zugang, Berichtigung, Löschung)"}},
                    {"name":"contact_info","type":"text","required":true,"labels":{"pl":"Dane kontaktowe administratora danych","en":"Data controller contact details","uk":"Контактні дані контролера даних","de":"Kontaktdaten des Datenverantwortlichen"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Polityka prywatności',
                        'description' => 'Dokument informujący o zasadach przetwarzania danych osobowych użytkowników, zgodny z RODO.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">POLITYKA PRYWATNOŚCI</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Dla: <strong>[[company_name]]</strong></p></td><td style="text-align: right;"><p>Miejscowość: [[city]], ' . date('d.m.Y') . ' r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejsza Polityka Prywatności określa zasady przetwarzania danych osobowych przez <strong>[[company_name]]</strong> z siedzibą w [[company_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. RODZAJE ZBIERANYCH DANYCH</h2>
                                <p>[[data_collected]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. CEL ZBIERANIA DANYCH</h2>
                                <p>[[purpose_of_data]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. UDOSTĘPNIANIE DANYCH</h2>
                                <p>[[data_sharing]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. PRAWA UŻYTKOWNIKÓW</h2>
                                <p>[[user_rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. DANE KONTAKTOWE</h2>
                                <p>W sprawach związanych z danymi osobowymi prosimy o kontakt: [[contact_info]].</p>
                                <br/>
                                <p>Polityka wchodzi w życie z dniem: <strong>[[policy_date]]</strong>.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Administrator Danych)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Privacy Policy',
                        'description' => 'A document informing about the rules for processing users\' personal data, compliant with GDPR.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">PRIVACY POLICY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>For: <strong>[[company_name]]</strong></p></td><td style="text-align: right;"><p>City: [[city]], ' . date('F j, Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This Privacy Policy sets out the rules for processing personal data by <strong>[[company_name]]</strong> with its registered office in [[company_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. TYPES OF DATA COLLECTED</h2>
                                <p>[[data_collected]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. PURPOSE OF DATA COLLECTION</h2>
                                <p>[[purpose_of_data]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. DATA SHARING</h2>
                                <p>[[data_sharing]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. USER RIGHTS</h2>
                                <p>[[user_rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. CONTACT DETAILS</h2>
                                <p>For matters related to personal data, please contact: [[contact_info]].</p>
                                <br/>
                                <p>This Policy comes into effect on: <strong>[[policy_date]]</strong>.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Data Controller)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Політика конфіденційності',
                        'description' => 'Документ, що інформує про правила обробки персональних даних користувачів, згідно з GDPR.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОЛІТИКА КОНФІДЕНЦІЙНОСТІ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Для: <strong>[[company_name]]</strong></p></td><td style="text-align: right;"><p>Місто: [[city]], ' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ця Політика конфіденційності визначає правила обробки персональних даних компанією <strong>[[company_name]]</strong> з місцезнаходженням у [[company_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ТИПИ ЗІБРАНИХ ДАНИХ</h2>
                                <p>[[data_collected]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. МЕТА ЗБОРУ ДАНИХ</h2>
                                <p>[[purpose_of_data]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ПЕРЕДАЧА ДАНИХ</h2>
                                <p>[[data_sharing]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. ПРАВА КОРИСТУВАЧІВ</h2>
                                <p>[[user_rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. КОНТАКТНІ ДАНІ</h2>
                                <p>З питань, пов\'язаних з персональними даними, просимо звертатися: [[contact_info]].</p>
                                <br/>
                                <p>Політика набирає чинності з: <strong>[[policy_date]]</strong>.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Контролер даних)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Datenschutzerklärung',
                        'description' => 'Ein Dokument, das über die Regeln zur Verarbeitung personenbezogener Nutzerdaten gemäß DSGVO informiert.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DATENSCHUTZERKLÄRUNG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Für: <strong>[[company_name]]</strong></p></td><td style="text-align: right;"><p>Ort: [[city]], ' . date('d.m.Y') . '</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Diese Datenschutzerklärung legt die Regeln für die Verarbeitung personenbezogener Daten durch die <strong>[[company_name]]</strong> mit Sitz in [[company_address]] fest.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ARTEN DER GESAMMELTEN DATEN</h2>
                                <p>[[data_collected]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. ZWECK DER DATENERHEBUNG</h2>
                                <p>[[purpose_of_data]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. DATENWEITERGABE</h2>
                                <p>[[data_sharing]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. RECHTE DER NUTZER</h2>
                                <p>[[user_rights]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. KONTAKTDATEN</h2>
                                <p>Bei Fragen zu personenbezogenen Daten wenden Sie sich bitte an: [[contact_info]].</p>
                                <br/>
                                <p>Diese Richtlinie tritt in Kraft am: <strong>[[policy_date]]</strong>.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Datenverantwortlicher)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Договор оферты / Offer Agreement ---
            [
                'slug' => 'offer-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"offer_date","type":"date","required":true,"labels":{"pl":"Data wystawienia oferty","en":"Offer Issue Date","uk":"Дата виставлення оферти","de":"Angebotsdatum"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy (oferenta)","en":"Company Name (offeror)","uk":"Назва компанії (оферента)","de":"Firmenname (Anbieter)"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens"}},
                    {"name":"company_nip","type":"text","required":true,"labels":{"pl":"NIP firmy","en":"Company NIP","uk":"ІПН компанії","de":"USt-IdNr. des Unternehmens"}},
                    {"name":"offer_subject","type":"text","required":true,"labels":{"pl":"Przedmiot oferty","en":"Subject of Offer","uk":"Предмет оферти","de":"Gegenstand des Angebots"}},
                    {"name":"offer_terms","type":"textarea","required":true,"labels":{"pl":"Warunki oferty (cena, zakres usług/produktów, termin realizacji)","en":"Offer terms (price, scope of services/products, completion date)","uk":"Умови оферти (ціна, обсяг послуг/товарів, термін виконання)","de":"Angebotsbedingungen (Preis, Leistungsumfang/Produkte, Fertigstellungsdatum)"}},
                    {"name":"acceptance_method","type":"textarea","required":true,"labels":{"pl":"Sposób akceptacji oferty","en":"Method of offer acceptance","uk":"Спосіб акцепту оферти","de":"Annahmeverfahren des Angebots"}},
                    {"name":"validity_period","type":"text","required":true,"labels":{"pl":"Okres ważności oferty","en":"Offer validity period","uk":"Термін дії оферти","de":"Gültigkeitsdauer des Angebots"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa oferty',
                        'description' => 'Dokument stanowiący ofertę handlową, która po akceptacji przez drugą stronę staje się wiążącą umową.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA OFERTY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Wystawiono w [[city]]</p></td><td style="text-align: right;"><p>dnia [[offer_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>Oferent:</strong> [[company_name]] z siedzibą w [[company_address]], NIP: [[company_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. PRZEDMIOT OFERTY</h2>
                                <p>Przedmiotem niniejszej oferty jest: [[offer_subject]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. WARUNKI OFERTY</h2>
                                <p>[[offer_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. AKCEPTACJA OFERTY</h2>
                                <p>Akceptacja oferty następuje poprzez: [[acceptance_method]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. OKRES WAŻNOŚCI</h2>
                                <p>Oferta jest ważna przez okres: [[validity_period]].</p>
                                <br/>
                                <p>W sprawach nieuregulowanych niniejszą Umową, zastosowanie mają przepisy Kodeksu Cywilnego.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Oferent)</p>
                            </div>'
                    ],
                    'en' => [
                        'title' => 'Offer Agreement',
                        'description' => 'A document constituting a commercial offer which, upon acceptance by the other party, becomes a binding agreement.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFFER AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Issued in [[city]]</p></td><td style="text-align: right;"><p>on [[offer_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>Offeror:</strong> [[company_name]] with its registered office in [[company_address]], NIP: [[company_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. SUBJECT OF OFFER</h2>
                                <p>The subject of this offer is: [[offer_subject]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. OFFER TERMS</h2>
                                <p>[[offer_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ACCEPTANCE OF OFFER</h2>
                                <p>Acceptance of the offer occurs through: [[acceptance_method]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. VALIDITY PERIOD</h2>
                                <p>The offer is valid for a period of: [[validity_period]].</p>
                                <br/>
                                <p>Matters not regulated by this Agreement shall be governed by the provisions of the Civil Code.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Offeror)</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Договір оферти',
                        'description' => 'Документ, що є комерційною пропозицією, яка після акцепту іншою стороною стає обов\'язковим договором.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР ОФЕРТИ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Виставлено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>Оферент:</strong> [[company_name]] з місцезнаходженням у [[company_address]], ІПН: [[company_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ПРЕДМЕТ ОФЕРТИ</h2>
                                <p>Предметом цієї оферти є: [[offer_subject]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. УМОВИ ОФЕРТИ</h2>
                                <p>[[offer_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. АКЦЕПТ ОФЕРТИ</h2>
                                <p>Акцепт оферти здійснюється шляхом: [[acceptance_method]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. ТЕРМІН ДІЇ</h2>
                                <p>Оферта дійсна протягом: [[validity_period]].</p>
                                <br/>
                                <p>У справах, не врегульованих цією Угодою, застосовуються положення Цивільного кодексу.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Оферент)</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Angebotsvertrag',
                        'description' => 'Ein Dokument, das ein kommerzielles Angebot darstellt, das nach Annahme durch die andere Partei zu einem verbindlichen Vertrag wird.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ANGEBOTSVERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Ausgestellt in [[city]]</p></td><td style="text-align: right;"><p>am [[offer_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>Anbieter:</strong> [[company_name]] mit Sitz in [[company_address]], USt-IdNr.: [[company_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. GEGENSTAND DES ANGEBOTS</h2>
                                <p>Gegenstand dieses Angebots ist: [[offer_subject]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. ANGEBOTSBEDINGUNGEN</h2>
                                <p>[[offer_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ANNAHME DES ANGEBOTS</h2>
                                <p>Die Annahme des Angebots erfolgt durch: [[acceptance_method]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. GÜLTIGKEITSDAUER</h2>
                                <p>Das Angebot ist gültig für einen Zeitraum von: [[validity_period]].</p>
                                <br/>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: center;">
                                <p>___________________<br>(Anbieter)</p>
                            </div>'
                    ]
                ]
            ],

            // --- Соглашение об уровне обслуживания (SLA) / Service Level Agreement (SLA) ---
            [
                'slug' => 'service-level-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"sla_date","type":"date","required":true,"labels":{"pl":"Data zawarcia SLA","en":"SLA Date","uk":"Дата укладення SLA","de":"SLA-Datum"}},
                    {"name":"service_provider_name","type":"text","required":true,"labels":{"pl":"Usługodawca (nazwa firmy)","en":"Service Provider (company name)","uk":"Постачальник послуг (назва компанії)","de":"Dienstleister (Firmenname)"}},
                    {"name":"service_provider_address","type":"text","required":true,"labels":{"pl":"Adres usługodawcy","en":"Service Provider Address","uk":"Адреса постачальника послуг","de":"Adresse des Dienstleisters"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"pl":"Klient (nazwa firmy)","en":"Client (company name)","uk":"Клієнт (назва компанії)","de":"Kunde (Firmenname)"}},
                    {"name":"client_address","type":"text","required":true,"labels":{"pl":"Adres klienta","en":"Client Address","uk":"Адреса клієнта","de":"Adresse des Kunden"}},
                    {"name":"service_description","type":"textarea","required":true,"labels":{"pl":"Opis usługi","en":"Service description","uk":"Опис послуги","de":"Dienstleistungsbeschreibung"}},
                    {"name":"service_levels","type":"textarea","required":true,"labels":{"pl":"Poziomy usług (np. dostępność, czas reakcji, czas rozwiązania)","en":"Service levels (e.g., availability, response time, resolution time)","uk":"Рівні послуг (напр., доступність, час реакції, час вирішення)","de":"Service-Levels (z.B. Verfügbarkeit, Reaktionszeit, Lösungszeit)"}},
                    {"name":"penalties","type":"textarea","required":false,"labels":{"pl":"Kary za niezgodność z SLA (opcjonalnie)","en":"Penalties for SLA non-compliance (optional)","uk":"Штрафи за недотримання SLA (необов\'язково)","de":"Strafen bei Nichteinhaltung des SLA (optional)"}},
                    {"name":"reporting","type":"textarea","required":true,"labels":{"pl":"Zasady raportowania","en":"Reporting rules","uk":"Правила звітності","de":"Berichtsregeln"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa o poziomie usług (SLA)',
                        'description' => 'Dokument określający gwarantowane poziomy świadczenia usług przez usługodawcę.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA O POZIOMIE USŁUG (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarto w [[city]]</p></td><td style="text-align: right;"><p>dnia [[sla_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Usługodawcą:</strong> [[service_provider_name]] z siedzibą w [[service_provider_address]],</p>
                                <p>a</p>
                                <p><strong>Klientem:</strong> [[client_name]] z siedzibą w [[client_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. OPIS USŁUGI</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. POZIOMY USŁUG</h2>
                                <p>[[service_levels]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. KARY ZA NIEZGODNOŚĆ</h2>
                                <p>[[penalties]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. RAPORTOWANIE</h2>
                                <p>[[reporting]]</p>
                                <br/>
                                <p>W sprawach nieuregulowanych niniejszą Umową, zastosowanie mają przepisy Kodeksu Cywilnego.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Usługodawca</p></td>
                                <td width="50%"><p>___________________<br>Klient</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Service Level Agreement (SLA)',
                        'description' => 'A document specifying the guaranteed service levels provided by the service provider.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SERVICE LEVEL AGREEMENT (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[sla_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Service Provider:</strong> [[service_provider_name]] with its registered office in [[service_provider_address]],</p>
                                <p>and</p>
                                <p><strong>Client:</strong> [[client_name]] with its registered office in [[client_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. SERVICE DESCRIPTION</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. SERVICE LEVELS</h2>
                                <p>[[service_levels]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. PENALTIES FOR NON-COMPLIANCE</h2>
                                <p>[[penalties]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. REPORTING</h2>
                                <p>[[reporting]]</p>
                                <br/>
                                <p>Matters not regulated by this Agreement shall be governed by the provisions of the Civil Code.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Service Provider</p></td>
                                <td width="50%"><p>___________________<br>Client</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про рівень обслуговування (SLA)',
                        'description' => 'Документ, що визначає гарантовані рівні надання послуг постачальником послуг.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">УГОДА ПРО РІВЕНЬ ОБСЛУГОВУВАННЯ (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Постачальником послуг:</strong> [[service_provider_name]] з місцезнаходженням у [[service_provider_address]],</p>
                                <p>та</p>
                                <p><strong>Клієнтом:</strong> [[client_name]] з місцезнаходженням у [[client_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ОПИС ПОСЛУГИ</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. РІВНІ ПОСЛУГ</h2>
                                <p>[[service_levels]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ШТРАФИ ЗА НЕДОТРИМАННЯ</h2>
                                <p>[[penalties]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. ЗВІТНІСТЬ</h2>
                                <p>[[reporting]]</p>
                                <br/>
                                <p>У справах, не врегульованих цією Угодою, застосовуються положення Цивільного кодексу.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Постачальник послуг</p></td>
                                <td width="50%"><p>___________________<br>Клієнт</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Service Level Agreement (SLA)',
                        'description' => 'Ein Dokument, das die garantierten Service-Levels des Dienstleisters festlegt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">SERVICE LEVEL AGREEMENT (SLA)</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[sla_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Dienstleister:</strong> [[service_provider_name]] mit Sitz in [[service_provider_address]],</p>
                                <p>und</p>
                                <p><strong>Kunde:</strong> [[client_name]] mit Sitz in [[client_address]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. DIENSTLEISTUNGSBESCHREIBUNG</h2>
                                <p>[[service_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. SERVICE-LEVELS</h2>
                                <p>[[service_levels]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. STRAFEN BEI NICHTEINHALTUNG</h2>
                                <p>[[penalties]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. BERICHTERSTATTUNG</h2>
                                <p>[[reporting]]</p>
                                <br/>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Dienstleister</p></td>
                                <td width="50%"><p>___________________<br>Kunde</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор с фрилансером (Gig-контракт) / Freelancer Agreement (Gig Contract) ---
            [
                'slug' => 'freelancer-agreement-pl',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"pl":"Data zawarcia umowy","en":"Agreement Date","uk":"Дата укладення договору","de":"Vertragsdatum"}},
                    {"name":"client_name","type":"text","required":true,"labels":{"pl":"Zleceniodawca (nazwa firmy/imię i nazwisko)","en":"Client (company name/full name)","uk":"Замовник (назва компанії/ПІБ)","de":"Auftraggeber (Firmenname/vollständiger Name)"}},
                    {"name":"client_address","type":"text","required":true,"labels":{"pl":"Adres zleceniodawcy","en":"Client Address","uk":"Адреса замовника","de":"Adresse des Auftraggebers"}},
                    {"name":"freelancer_name","type":"text","required":true,"labels":{"pl":"Freelancer (imię i nazwisko)","en":"Freelancer (full name)","uk":"Фрілансер (ПІБ)","de":"Freelancer (vollständiger Name)"}},
                    {"name":"freelancer_address","type":"text","required":true,"labels":{"pl":"Adres freelancera","en":"Freelancer Address","uk":"Адреса фрілансера","de":"Adresse des Freelancers"}},
                    {"name":"freelancer_pesel_nip","type":"text","required":true,"labels":{"pl":"PESEL/NIP freelancera","en":"Freelancer PESEL/NIP","uk":"ПЕСЕЛЬ/ІПН фрілансера","de":"PESEL/USt-IdNr. des Freelancers"}},
                    {"name":"scope_of_work","type":"textarea","required":true,"labels":{"pl":"Zakres prac/usług","en":"Scope of works/services","uk":"Обсяг робіт/послуг","de":"Umfang der Arbeiten/Dienstleistungen"}},
                    {"name":"deadline","type":"date","required":true,"labels":{"pl":"Termin wykonania","en":"Deadline","uk":"Термін виконання","de":"Frist"}},
                    {"name":"remuneration_amount","type":"number","required":true,"labels":{"pl":"Kwota wynagrodzenia","en":"Remuneration amount","uk":"Сума винагороди","de":"Vergütungsbetrag"}},
                    {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
                    {"name":"payment_terms","type":"textarea","required":true,"labels":{"pl":"Warunki płatności","en":"Payment terms","uk":"Умови оплати","de":"Zahlungsbedingungen"}},
                    {"name":"intellectual_property","type":"textarea","required":false,"labels":{"pl":"Prawa własności intelektualnej (opcjonalnie)","en":"Intellectual property rights (optional)","uk":"Права інтелектуальної власності (необов\'язково)","de":"Rechte an geistigem Eigentum (optional)"}}
                ]',
                'translations' => [
                    'pl' => [
                        'title' => 'Umowa z freelancerem (umowa o dzieło/zlecenie)',
                        'description' => 'Umowa regulująca współpracę z freelancerem na wykonanie określonych prac lub usług.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">UMOWA Z FREELANCEREM</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Zawarta w [[city]]</p></td><td style="text-align: right;"><p>dnia [[agreement_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>pomiędzy:</p>
                                <p><strong>Zleceniodawcą:</strong> [[client_name]], adres: [[client_address]],</p>
                                <p>a</p>
                                <p><strong>Freelancerem:</strong> [[freelancer_name]], adres: [[freelancer_address]], PESEL/NIP: [[freelancer_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ZAKRES PRAC/USŁUG</h2>
                                <p>Przedmiotem umowy jest wykonanie następujących prac/usług: [[scope_of_work]].</p>
                                <p>Termin wykonania: <strong>[[deadline]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. WYNAGRODZENIE I PŁATNOŚCI</h2>
                                <p>Wynagrodzenie wynosi: <strong>[[remuneration_amount]] [[currency]]</strong>.</p>
                                <p>Warunki płatności: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. PRAWA WŁASNOŚCI INTELEKTUALNEJ</h2>
                                <p>[[intellectual_property]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. POSTANOWIENIA KOŃCOWE</h2>
                                <p>W sprawach nieuregulowanych niniejszą Umową, zastosowanie mają przepisy Kodeksu Cywilnego. Umowę sporządzono w dwóch jednobrzmiących egzemplarzach.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Zleceniodawca</p></td>
                                <td width="50%"><p>___________________<br>Freelancer</p></td>
                                </tr></table></div>'
                    ],
                    'en' => [
                        'title' => 'Freelancer Agreement (Gig Contract)',
                        'description' => 'An agreement regulating cooperation with a freelancer for the performance of specific works or services.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FREELANCER AGREEMENT</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Concluded in [[city]]</p></td><td style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>between:</p>
                                <p><strong>Client:</strong> [[client_name]], address: [[client_address]],</p>
                                <p>and</p>
                                <p><strong>Freelancer:</strong> [[freelancer_name]], address: [[freelancer_address]], PESEL/NIP: [[freelancer_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. SCOPE OF WORKS/SERVICES</h2>
                                <p>The subject of the agreement is the performance of the following works/services: [[scope_of_work]].</p>
                                <p>Deadline: <strong>[[deadline]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. REMUNERATION AND PAYMENTS</h2>
                                <p>The remuneration is: <strong>[[remuneration_amount]] [[currency]]</strong>.</p>
                                <p>Payment terms: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. INTELLECTUAL PROPERTY RIGHTS</h2>
                                <p>[[intellectual_property]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. FINAL PROVISIONS</h2>
                                <p>Matters not regulated by this Agreement shall be governed by the provisions of the Civil Code. The agreement has been drawn up in two identical copies.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Client</p></td>
                                <td width="50%"><p>___________________<br>Freelancer</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір з фрілансером (Gig-контракт)',
                        'description' => 'Угода, що регулює співпрацю з фрілансером для виконання певних робіт або послуг.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ДОГОВІР З ФРІЛАНСЕРОМ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Укладено в [[city]]</p></td><td style="text-align: right;"><p>' . date('d.m.Y') . ' р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>між:</p>
                                <p><strong>Замовником:</strong> [[client_name]], адреса: [[client_address]],</p>
                                <p>та</p>
                                <p><strong>Фрілансером:</strong> [[freelancer_name]], адреса: [[freelancer_address]], ПЕСЕЛЬ/ІПН: [[freelancer_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. ОБСЯГ РОБІТ/ПОСЛУГ</h2>
                                <p>Предметом договору є виконання наступних робіт/послуг: [[scope_of_work]].</p>
                                <p>Термін виконання: <strong>[[deadline]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. ВИНАГОРОДА ТА ПЛАТЕЖІ</h2>
                                <p>Винагорода становить: <strong>[[remuneration_amount]] [[currency]]</strong>.</p>
                                <p>Умови оплати: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. ПРАВА ІНТЕЛЕКТУАЛЬНОЇ ВЛАСНОСТІ</h2>
                                <p>[[intellectual_property]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. ПРИКІНЦЕВІ ПОЛОЖЕННЯ</h2>
                                <p>У справах, не врегульованих цією Угодою, застосовуються положення Цивільного кодексу. Договір складено у двох однакових примірниках.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Замовник</p></td>
                                <td width="50%"><p>___________________<br>Фрілансер</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Freelancer-Vertrag (Gig-Vertrag)',
                        'description' => 'Eine Vereinbarung, die die Zusammenarbeit mit einem Freelancer zur Erbringung bestimmter Arbeiten oder Dienstleistungen regelt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FREELANCER-VERTRAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Abgeschlossen in [[city]]</p></td><td style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>zwischen:</p>
                                <p><strong>Auftraggeber:</strong> [[client_name]], Adresse: [[client_address]],</p>
                                <p>und</p>
                                <p><strong>Freelancer:</strong> [[freelancer_name]], Adresse: [[freelancer_address]], PESEL/USt-IdNr.: [[freelancer_pesel_nip]].</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. UMFANG DER ARBEITEN/DIENSTLEISTUNGEN</h2>
                                <p>Gegenstand des Vertrages ist die Erbringung der folgenden Arbeiten/Dienstleistungen: [[scope_of_work]].</p>
                                <p>Frist für die Fertigstellung: <strong>[[deadline]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. VERGÜTUNG UND ZAHLUNGEN</h2>
                                <p>Die Vergütung beträgt: <strong>[[remuneration_amount]] [[currency]]</strong>.</p>
                                <p>Zahlungsbedingungen: [[payment_terms]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. RECHTE AN GEISTIGEM EIGENTUM</h2>
                                <p>[[intellectual_property]]</p>
                                <h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. SCHLUSSBESTIMMUNGEN</h2>
                                <p>In Angelegenheiten, die in diesem Vertrag nicht geregelt sind, finden die Bestimmungen des Bürgerlichen Gesetzbuches Anwendung. Der Vertrag wurde in zwei gleichlautenden Exemplaren ausgefertigt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Auftraggeber</p></td>
                                <td width="50%"><p>___________________<br>Freelancer</p></td>
                                </tr></table></div>'
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
