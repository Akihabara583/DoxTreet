<?php

namespace Database\Seeders\US;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class UsWorkSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'work-us')->first();
        if (!$category) {
            $this->command->error('Category with slug "work-us" not found.');
            return;
        }


        $templatesData = [

            // --- Резюме (классическое) / Resume (Classic) ---
            [
                'slug' => 'resume-classic-us',
                'fields' => '[
                    {"name":"full_name","type":"text","required":true,"labels":{"en":"Full Name","uk":"Повне ім\'я","de":"Vollständiger Name","pl":"Imię i Nazwisko"}},
                    {"name":"phone","type":"text","required":true,"labels":{"en":"Phone","uk":"Телефон","de":"Telefon","pl":"Telefon"}},
                    {"name":"email","type":"email","required":true,"labels":{"en":"Email","uk":"Електронна пошта","de":"E-Mail","pl":"E-mail"}},
                    {"name":"linkedin_url","type":"text","required":false,"labels":{"en":"LinkedIn Profile URL (optional)","uk":"Посилання на профіль LinkedIn (необов\'язково)","de":"LinkedIn-Profil-URL (optional)","pl":"Adres URL profilu LinkedIn (opcjonalnie)"}},
                    {"name":"portfolio_url","type":"text","required":false,"labels":{"en":"Portfolio URL (optional)","uk":"Посилання на портфоліо (необов\'язково)","de":"Portfolio-URL (optional)","pl":"Adres URL portfolio (opcjonalnie)"}},
                    {"name":"summary","type":"textarea","required":true,"labels":{"en":"Professional Summary","uk":"Професійне резюме","de":"Berufliches Profil","pl":"Podsumowanie zawodowe"}},
                    {"name":"work_experience","type":"textarea","required":true,"labels":{"en":"Work Experience (Company, Position, Dates, Responsibilities)","uk":"Досвід роботи (Компанія, Посада, Дати, Обов\'язки)","de":"Berufserfahrung (Unternehmen, Position, Zeitraum, Aufgaben)","pl":"Doświadczenie zawodowe (Firma, Stanowisko, Okres, Obowiązki)"}},
                    {"name":"education","type":"textarea","required":true,"labels":{"en":"Education (University, Degree, Major, Dates)","uk":"Освіта (Університет, Ступінь, Спеціальність, Дати)","de":"Ausbildung (Universität, Abschluss, Hauptfach, Zeitraum)","pl":"Wykształcenie (Uczelnia, Stopień, Kierunek, Okres)"}},
                    {"name":"skills","type":"textarea","required":true,"labels":{"en":"Skills (Technical, Soft Skills, Languages)","uk":"Навички (Технічні, М\'які навички, Мови)","de":"Fähigkeiten (Technische, Soft Skills, Sprachen)","pl":"Umiejętności (Techniczne, Miękkie umiejętności, Języki)"}},
                    {"name":"awards_certifications","type":"textarea","required":false,"labels":{"en":"Awards & Certifications (optional)","uk":"Нагороди та сертифікати (необов\'язково)","de":"Auszeichnungen & Zertifizierungen (optional)","pl":"Nagrody i certyfikaty (opcjonalnie)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Resume (Classic)',
                        'description' => 'A standard, clean resume format providing a comprehensive overview of your qualifications and experience, suitable for most industries in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a> | <a href="[[portfolio_url]]">Portfolio</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Professional Summary</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Work Experience</h2>
                                <p>[[work_experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Education</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Skills</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Awards & Certifications</h2>
                                <p>[[awards_certifications]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'uk' => [
                        'title' => 'Резюме (класичне)',
                        'description' => 'Стандартний, чистий формат резюме, що надає повний огляд ваших кваліфікацій та досвіду, підходить для більшості галузей у США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a> | <a href="[[portfolio_url]]">Портфоліо</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Професійне резюме</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Досвід роботи</h2>
                                <p>[[work_experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Освіта</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Навички</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Нагороди та сертифікати</h2>
                                <p>[[awards_certifications]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'de' => [
                        'title' => 'Lebenslauf (klassisch)',
                        'description' => 'Ein standardisiertes, übersichtliches Lebenslauf-Format, das einen umfassenden Überblick über Ihre Qualifikationen und Erfahrungen bietet, geeignet für die meisten Branchen in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a> | <a href="[[portfolio_url]]">Portfolio</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Berufliches Profil</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Berufserfahrung</h2>
                                <p>[[work_experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Ausbildung</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Fähigkeiten</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Auszeichnungen & Zertifizierungen</h2>
                                <p>[[awards_certifications]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Życiorys (klasyczny)',
                        'description' => 'Standardowy, przejrzysty format życiorysu, zapewniający kompleksowy przegląd kwalifikacji i doświadczenia, odpowiedni dla większości branż w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a> | <a href="[[portfolio_url]]">Portfolio</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Podsumowanie zawodowe</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Doświadczenie zawodowe</h2>
                                <p>[[work_experience]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Wykształcenie</h2>
                                <p>[[education]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Umiejętności</h2>
                                <p>[[skills]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Nagrody i certyfikaty</h2>
                                <p>[[awards_certifications]]</p>
                            </div>',
                        'footer_html' => ''
                    ]
                ]
            ],

            // --- Резюме (хронологическое) / Resume (Chronological) ---
            [
                'slug' => 'resume-chronological-us',
                'fields' => '[
                    {"name":"full_name","type":"text","required":true,"labels":{"en":"Full Name","uk":"Повне ім\'я","de":"Vollständiger Name","pl":"Imię i Nazwisko"}},
                    {"name":"phone","type":"text","required":true,"labels":{"en":"Phone","uk":"Телефон","de":"Telefon","pl":"Telefon"}},
                    {"name":"email","type":"email","required":true,"labels":{"en":"Email","uk":"Електронна пошта","de":"E-Mail","pl":"E-mail"}},
                    {"name":"linkedin_url","type":"text","required":false,"labels":{"en":"LinkedIn Profile URL (optional)","uk":"Посилання на профіль LinkedIn (необов\'язково)","de":"LinkedIn-Profil-URL (optional)","pl":"Adres URL profilu LinkedIn (opcjonalnie)"}},
                    {"name":"summary","type":"textarea","required":true,"labels":{"en":"Professional Summary","uk":"Професійне резюме","de":"Berufliches Profil","pl":"Podsumowanie zawodowe"}},
                    {"name":"work_experience_chronological","type":"textarea","required":true,"labels":{"en":"Work Experience (reverse chronological: Company, Position, Dates, Responsibilities)","uk":"Досвід роботи (у зворотному хронологічному порядку: Компанія, Посада, Дати, Обов\'язки)","de":"Berufserfahrung (chronologisch absteigend: Unternehmen, Position, Zeitraum, Aufgaben)","pl":"Doświadczenie zawodowe (chronologicznie malejąco: Firma, Stanowisko, Okres, Obowiązki)"}},
                    {"name":"education_chronological","type":"textarea","required":true,"labels":{"en":"Education (reverse chronological: University, Degree, Major, Dates)","uk":"Освіта (у зворотному хронологічному порядку: Університет, Ступінь, Спеціальність, Дати)","de":"Ausbildung (chronologisch absteigend: Hochschule, Abschluss, Hauptfach, Zeitraum)","pl":"Wykształcenie (chronologicznie malejąco: Uczelnia, Stopień, Kierunek, Okres)"}},
                    {"name":"skills","type":"textarea","required":true,"labels":{"en":"Skills (Technical, Soft Skills, Languages)","uk":"Навички (Технічні, М\'які навички, Мови)","de":"Fähigkeiten (Technische, Soft Skills, Sprachen)","pl":"Umiejętności (Techniczne, Miękkie umiejętności, Języki)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Resume (Chronological)',
                        'description' => 'A classic resume format presenting your career and education in reverse chronological order, widely used in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Professional Summary</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Work Experience</h2>
                                <p>[[work_experience_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Education</h2>
                                <p>[[education_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Skills</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'uk' => [
                        'title' => 'Резюме (хронологічне)',
                        'description' => 'Класичний формат резюме, що представляє вашу кар\'єру та освіту у зворотному хронологічному порядку, широко використовується в США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Професійне резюме</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Досвід роботи</h2>
                                <p>[[work_experience_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Освіта</h2>
                                <p>[[education_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Навички</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'de' => [
                        'title' => 'Lebenslauf (chronologisch)',
                        'description' => 'Ein klassisches Lebenslauf-Format, das Ihre berufliche Laufbahn und Ausbildung in umgekehrter chronologischer Reihenfolge darstellt, in den USA weit verbreitet.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Berufliches Profil</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Berufserfahrung</h2>
                                <p>[[work_experience_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Ausbildung</h2>
                                <p>[[education_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Fähigkeiten</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Życiorys (chronologiczny)',
                        'description' => 'Klasyczny format życiorysu przedstawiający Twoją karierę i wykształcenie w odwróconej kolejności chronologicznej, szeroko stosowany w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Podsumowanie zawodowe</h2>
                                <p>[[summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Doświadczenie zawodowe</h2>
                                <p>[[work_experience_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Wykształcenie</h2>
                                <p>[[education_chronological]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Umiejętności</h2>
                                <p>[[skills]]</p>
                            </div>',
                        'footer_html' => ''
                    ]
                ]
            ],

            // --- Резюме (функциональное) / Resume (Functional) ---
            [
                'slug' => 'resume-functional-us',
                'fields' => '[
                    {"name":"full_name","type":"text","required":true,"labels":{"en":"Full Name","uk":"Повне ім\'я","de":"Vollständiger Name","pl":"Imię i Nazwisko"}},
                    {"name":"phone","type":"text","required":true,"labels":{"en":"Phone","uk":"Телефон","de":"Telefon","pl":"Telefon"}},
                    {"name":"email","type":"email","required":true,"labels":{"en":"Email","uk":"Електронна пошта","de":"E-Mail","pl":"E-mail"}},
                    {"name":"linkedin_url","type":"text","required":false,"labels":{"en":"LinkedIn Profile URL (optional)","uk":"Посилання на профіль LinkedIn (необов\'язково)","de":"LinkedIn-Profil-URL (optional)","pl":"Adres URL profilu LinkedIn (opcjonalnie)"}},
                    {"name":"career_objective","type":"textarea","required":true,"labels":{"en":"Career Objective","uk":"Професійна мета","de":"Berufsziel","pl":"Cel zawodowy"}},
                    {"name":"skills_summary","type":"textarea","required":true,"labels":{"en":"Summary of Skills and Competencies (by thematic areas)","uk":"Підсумок навичок та компетенцій (за тематичними областями)","de":"Zusammenfassung der Fähigkeiten und Kompetenzen (nach Themenbereichen)","pl":"Podsumowanie umiejętności i kompetencji (według obszarów tematycznych)"}},
                    {"name":"key_achievements","type":"textarea","required":true,"labels":{"en":"Key Achievements","uk":"Ключові досягнення","de":"Wichtigste Erfolge","pl":"Kluczowe osiągnięcia"}},
                    {"name":"employment_history_brief","type":"textarea","required":true,"labels":{"en":"Employment History (brief: Company, Position, Dates)","uk":"Історія працевлаштування (коротко: Компанія, Посада, Дати)","de":"Beruflicher Werdegang (kurzgefasst: Unternehmen, Position, Zeitraum)","pl":"Historia zatrudnienia (skrócona: Firma, Stanowisko, Okres)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Resume (Functional)',
                        'description' => 'A functional resume that highlights your skills and competencies, ideal for career changers or those with employment gaps in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Career Objective</h2>
                                <p>[[career_objective]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Summary of Skills and Competencies</h2>
                                <p>[[skills_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Key Achievements</h2>
                                <p>[[key_achievements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Employment History</h2>
                                <p>[[employment_history_brief]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'uk' => [
                        'title' => 'Резюме (функціональне)',
                        'description' => 'Функціональне резюме, що підкреслює ваші навички та компетенції, ідеально підходить для тих, хто змінює кар\'єру або має прогалини в резюме в США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Професійна мета</h2>
                                <p>[[career_objective]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Підсумок навичок та компетенцій</h2>
                                <p>[[skills_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Ключові досягнення</h2>
                                <p>[[key_achievements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Історія працевлаштування</h2>
                                <p>[[employment_history_brief]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'de' => [
                        'title' => 'Lebenslauf (funktional)',
                        'description' => 'Ein funktionaler Lebenslauf, der Ihre Fähigkeiten und Kompetenzen hervorhebt, ideal für Quereinsteiger oder bei Lücken im Lebenslauf in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Berufsziel</h2>
                                <p>[[career_objective]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Zusammenfassung der Fähigkeiten und Kompetenzen</h2>
                                <p>[[skills_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Wichtigste Erfolge</h2>
                                <p>[[key_achievements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Beruflicher Werdegang</h2>
                                <p>[[employment_history_brief]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Życiorys (funkcjonalny)',
                        'description' => 'Funkcjonalny życiorys, który podkreśla Twoje umiejętności i kompetencje, idealny dla osób zmieniających branżę lub z lukami w zatrudnieniu w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 5px;">[[full_name]]</h1>
                                <p style="font-size: 14px; margin-bottom: 10px;">[[phone]] | [[email]] | <a href="[[linkedin_url]]">LinkedIn</a></p>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Cel zawodowy</h2>
                                <p>[[career_objective]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Podsumowanie umiejętności i kompetencji</h2>
                                <p>[[skills_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Kluczowe osiągnięcia</h2>
                                <p>[[key_achievements]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Historia zatrudnienia</h2>
                                <p>[[employment_history_brief]]</p>
                            </div>',
                        'footer_html' => ''
                    ]
                ]
            ],

            // --- Сопроводительное письмо к резюме / Cover Letter ---
            [
                'slug' => 'cover-letter-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"letter_date","type":"date","required":true,"labels":{"en":"Date","uk":"Дата","de":"Datum","pl":"Data"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"en":"Your Full Name","uk":"Ваше повне ім\'я","de":"Ihr vollständiger Name","pl":"Twoje pełne imię i nazwisko"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"en":"Your Address","uk":"Ваша адреса","de":"Ihre Adresse","pl":"Twój adres"}},
                    {"name":"applicant_phone","type":"text","required":true,"labels":{"en":"Your Phone","uk":"Ваш телефон","de":"Ihre Telefonnummer","pl":"Twój telefon"}},
                    {"name":"applicant_email","type":"email","required":true,"labels":{"en":"Your Email","uk":"Ваша електронна пошта","de":"Ihre E-Mail","pl":"Twój e-mail"}},
                    {"name":"recipient_full_name","type":"text","required":false,"labels":{"en":"Hiring Manager Name (optional)","uk":"Ім\'я менеджера з найму (необов\'язково)","de":"Name des Personalverantwortlichen (optional)","pl":"Imię i nazwisko menedżera ds. rekrutacji (opcjonalnie)"}},
                    {"name":"recipient_title","type":"text","required":false,"labels":{"en":"Hiring Manager Title (optional)","uk":"Посада менеджера з найму (необов\'язково)","de":"Titel des Personalverantwortlichen (optional)","pl":"Stanowisko menedżera ds. rekrutacji (opcjonalnie)"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"en":"Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens","pl":"Adres firmy"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"en":"Job Title Applied For","uk":"Назва посади, на яку подається заява","de":"Stellenbezeichnung, auf die Sie sich bewerben","pl":"Stanowisko, na które aplikujesz"}},
                    {"name":"letter_body","type":"textarea","required":true,"labels":{"en":"Cover Letter Body","uk":"Текст супровідного листа","de":"Inhalt des Anschreibens","pl":"Treść listu motywacyjnego"}},
                    {"name":"closing_remark","type":"text","required":true,"labels":{"en":"Closing Remark (e.g., Sincerely, Respectfully)","uk":"Заключна фраза (напр., З повагою, З пошаною)","de":"Schlussformel (z.B. Mit freundlichen Grüßen, Hochachtungsvoll)","pl":"Zwrot grzecznościowy na zakończenie (np. Z poważaniem, Z szacunkiem)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Cover Letter',
                        'description' => 'A professional cover letter highlighting your motivation and suitability for the advertised position in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone]]<br>[[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p>[[recipient_full_name]]<br>[[recipient_title]]<br>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Dear [[recipient_full_name]],</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>I am writing to express my keen interest in the <strong>[[job_title]]</strong> position at [[company_name]], as advertised on [Platform/Website].</p>
                                <p>[[letter_body]]</p>
                                <p>Thank you for your time and consideration. I look forward to hearing from you soon.</p>
                                <br/>
                                <p>[[closing_remark]],</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Супровідний лист',
                        'description' => 'Професійний супровідний лист, що підкреслює вашу мотивацію та відповідність вакансії, на яку ви претендуєте в США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone]]<br>[[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p>[[recipient_full_name]]<br>[[recipient_title]]<br>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Шановний/а [[recipient_full_name]],</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Пишу, щоб висловити свій глибокий інтерес до посади <strong>[[job_title]]</strong> у [[company_name]], як було оголошено на [Платформа/Веб-сайт].</p>
                                <p>[[letter_body]]</p>
                                <p>Дякую за Ваш час та увагу. З нетерпінням чекаю на відповідь.</p>
                                <br/>
                                <p>[[closing_remark]],</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Anschreiben',
                        'description' => 'Ein professionelles Anschreiben, das Ihre Motivation und Eignung für die ausgeschriebene Stelle in den USA hervorhebt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone]]<br>[[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p>[[recipient_full_name]]<br>[[recipient_title]]<br>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Sehr geehrte/r [[recipient_full_name]],</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ich schreibe Ihnen, um mein großes Interesse an der Position als <strong>[[job_title]]</strong> bei [[company_name]] auszudrücken, wie auf [Plattform/Website] ausgeschrieben.</p>
                                <p>[[letter_body]]</p>
                                <p>Vielen Dank für Ihre Zeit und Ihr Interesse. Ich freue mich darauf, bald von Ihnen zu hören.</p>
                                <br/>
                                <p>[[closing_remark]],</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'List motywacyjny',
                        'description' => 'Profesjonalny list motywacyjny podkreślający Twoją motywację i przydatność na stanowisko, na które aplikujesz w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone]]<br>[[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p>[[recipient_full_name]]<br>[[recipient_title]]<br>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Szanowny/a [[recipient_full_name]],</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Piszę, aby wyrazić moje duże zainteresowanie stanowiskiem <strong>[[job_title]]</strong> w [[company_name]], zgodnie z ogłoszeniem na [Platforma/Strona internetowa].</p>
                                <p>[[letter_body]]</p>
                                <p>Dziękuję za poświęcony czas i uwagę. Z niecierpliwością oczekuję na Państwa odpowiedź.</p>
                                <br/>
                                <p>[[closing_remark]],</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление о приеме на работу / Job Application Statement ---
            [
                'slug' => 'job-application-statement-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"application_date","type":"date","required":true,"labels":{"en":"Application Date","uk":"Дата подання заяви","de":"Antragsdatum","pl":"Data złożenia wniosku"}},
                    {"name":"applicant_full_name","type":"text","required":true,"labels":{"en":"Your Full Name","uk":"Ваше повне ім\'я","de":"Ihr vollständiger Name","pl":"Twoje pełne imię i nazwisko"}},
                    {"name":"applicant_address","type":"text","required":true,"labels":{"en":"Your Address","uk":"Ваша адреса","de":"Ihre Adresse","pl":"Twój adres"}},
                    {"name":"applicant_phone","type":"text","required":true,"labels":{"en":"Your Phone","uk":"Ваш телефон","de":"Ihre Telefonnummer","pl":"Twój telefon"}},
                    {"name":"applicant_email","type":"email","required":true,"labels":{"en":"Your Email","uk":"Ваша електронна пошта","de":"Ihre E-Mail","pl":"Twój e-mail"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"en":"Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens","pl":"Adres firmy"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"en":"Job Title Applied For","uk":"Назва посади, на яку подається заява","de":"Stellenbezeichnung, auf die Sie sich bewerben","pl":"Stanowisko, na które aplikujesz"}},
                    {"name":"earliest_start_date","type":"date","required":true,"labels":{"en":"Earliest Start Date","uk":"Найраніша дата початку роботи","de":"Frühestmöglicher Eintrittstermin","pl":"Najwcześniejsza data rozpoczęcia pracy"}},
                    {"name":"salary_expectation","type":"text","required":false,"labels":{"en":"Salary Expectation (optional)","uk":"Очікувана зарплата (необов\'язково)","de":"Gehaltsvorstellung (optional)","pl":"Oczekiwania finansowe (opcjonalnie)"}},
                    {"name":"application_statement_body","type":"textarea","required":true,"labels":{"en":"Application Statement Body","uk":"Текст заяви про прийом на роботу","de":"Inhalt der Bewerbungserklärung","pl":"Treść podania o pracę"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Job Application Statement',
                        'description' => 'A formal job application stating your interest in a specific position and your availability in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone]]<br>[[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[application_date]]</p>
                                <br/>
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Subject: Application for [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear Hiring Manager,</p>
                                <p>I am writing to formally apply for the <strong>[[job_title]]</strong> position at [[company_name]].</p>
                                <p>[[application_statement_body]]</p>
                                <p>My earliest availability to start is [[earliest_start_date]], and my salary expectation is [[salary_expectation]].</p>
                                <p>Thank you for your time and consideration. I look forward to the opportunity to discuss my qualifications further.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява про прийом на роботу',
                        'description' => 'Формальна заява про прийом на роботу, що викладає ваш інтерес до певної посади та вашу доступність у США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone]]<br>[[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[application_date]]</p>
                                <br/>
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Тема: Заява на посаду [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний менеджер з найму,</p>
                                <p>Цим офіційно подаю заяву на посаду <strong>[[job_title]]</strong> у [[company_name]].</p>
                                <p>[[application_statement_body]]</p>
                                <p>Моя найраніша доступність для початку роботи – [[earliest_start_date]], а мої очікування щодо заробітної плати становлять [[salary_expectation]].</p>
                                <p>Дякую за Ваш час та увагу. З нетерпінням чекаю можливості обговорити мою кваліфікацію далі.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Bewerbungserklärung',
                        'description' => 'Eine formelle Bewerbung, die Ihr Interesse an einer bestimmten Position und Ihre Verfügbarkeit in den USA darlegt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone]]<br>[[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[application_date]]</p>
                                <br/>
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Betreff: Bewerbung als [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Personalverantwortliche/r,</p>
                                <p>hiermit bewerbe ich mich formell um die Position als <strong>[[job_title]]</strong> bei [[company_name]].</p>
                                <p>[[application_statement_body]]</p>
                                <p>Mein frühestmöglicher Eintrittstermin ist der [[earliest_start_date]], und meine Gehaltsvorstellung liegt bei [[salary_expectation]].</p>
                                <p>Vielen Dank für Ihre Zeit und Ihr Interesse. Ich freue mich auf die Gelegenheit, meine Qualifikationen näher zu besprechen.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[applicant_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Podanie o pracę',
                        'description' => 'Formalne podanie o pracę, przedstawiające Twoje zainteresowanie konkretnym stanowiskiem i Twoją dostępność w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[applicant_full_name]]<br>[[applicant_address]]<br>[[applicant_phone]]<br>[[applicant_email]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[application_date]]</p>
                                <br/>
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Temat: Podanie o pracę na stanowisko [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny Menedżerze ds. Rekrutacji,</p>
                                <p>Piszę, aby formalnie złożyć podanie o stanowisko <strong>[[job_title]]</strong> w [[company_name]].</p>
                                <p>[[application_statement_body]]</p>
                                <p>Moja najwcześniejsza dostępność do rozpoczęcia pracy to [[earliest_start_date]], a moje oczekiwania finansowe wynoszą [[salary_expectation]].</p>
                                <p>Dziękuję za poświęcony czas i uwagę. Z niecierpliwością oczekuję na możliwość dalszego omówienia moich kwalifikacji.</p>
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

            // --- Трудовой договор (бессрочный) / Employment Agreement (At-Will) ---
            [
                'slug' => 'employment-agreement-at-will-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"en":"Agreement Date","uk":"Дата угоди","de":"Vertragsdatum","pl":"Data umowy"}},
                    {"name":"employer_company_name","type":"text","required":true,"labels":{"en":"Employer Company Name","uk":"Назва компанії роботодавця","de":"Name des Arbeitgebers (Firma)","pl":"Nazwa firmy pracodawcy"}},
                    {"name":"employer_address","type":"text","required":true,"labels":{"en":"Employer Address","uk":"Адреса роботодавця","de":"Adresse des Arbeitgebers","pl":"Adres pracodawcy"}},
                    {"name":"employer_represented_by","type":"text","required":true,"labels":{"en":"Represented by (Name, Title)","uk":"Представлений (Ім\'я, Посада)","de":"Vertreten durch (Name, Position)","pl":"Reprezentowany przez (Imię, Stanowisko)"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Arbeitnehmers","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Arbeitnehmers","pl":"Adres pracownika"}},
                    {"name":"employee_ssn_ein","type":"text","required":false,"labels":{"en":"Employee SSN/EIN (optional)","uk":"SSN/EIN працівника (необов\'язково)","de":"Mitarbeiter-SSN/EIN (optional)","pl":"Numer SSN/EIN pracownika (opcjonalnie)"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"en":"Job Title/Position","uk":"Назва посади/Позиція","de":"Berufsbezeichnung/Position","pl":"Nazwa stanowiska/Pozycja"}},
                    {"name":"start_date","type":"date","required":true,"labels":{"en":"Start Date of Employment","uk":"Дата початку роботи","de":"Beginn des Arbeitsverhältnisses","pl":"Data rozpoczęcia zatrudnienia"}},
                    {"name":"gross_salary_per_period","type":"text","required":true,"labels":{"en":"Gross Salary (e.g., per hour, per week, per year)","uk":"Валова заробітна плата (напр., за годину, за тиждень, за рік)","de":"Bruttogehalt (z.B. pro Stunde, pro Woche, pro Jahr)","pl":"Wynagrodzenie brutto (np. za godzinę, za tydzień, za rok)"}},
                    {"name":"payment_frequency","type":"text","required":true,"labels":{"en":"Payment Frequency (e.g., bi-weekly, monthly)","uk":"Частота виплат (напр., раз на два тижні, щомісячно)","de":"Zahlungshäufigkeit (z.B. zweiwöchentlich, monatlich)","pl":"Częstotliwość płatności (np. dwutygodniowo, miesięcznie)"}},
                    {"name":"benefits_summary","type":"textarea","required":false,"labels":{"en":"Benefits Summary (optional)","uk":"Короткий опис переваг (необов\'язково)","de":"Zusammenfassung der Leistungen (optional)","pl":"Podsumowanie świadczeń (opcjonalnie)"}},
                    {"name":"at_will_statement","type":"textarea","required":true,"labels":{"en":"At-Will Employment Statement","uk":"Заява про працевлаштування за власним бажанням","de":"Erklärung zur Beschäftigung nach Belieben","pl":"Oświadczenie o zatrudnieniu na zasadzie dowolności"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Employment Agreement (At-Will)',
                        'description' => 'A standard at-will employment agreement, common in the USA, outlining key terms of employment that can be terminated by either party at any time for any legal reason.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Employment Agreement</h1>
                                <p style="font-size: 14px;">(At-Will Employment)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Concluded in [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>on [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This Employment Agreement ("Agreement") is made and entered into by and between:</p>
                                <p><strong>Employer:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Represented by [[employer_represented_by]]</p>
                                <p>and</p>
                                <p><strong>Employee:</strong> [[employee_full_name]]<br>[[employee_address]]<br>SSN/EIN: [[employee_ssn_ein]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Position and Start Date</h2>
                                <p>The Employer hires the Employee for the position of <strong>[[job_title]]</strong>, commencing on <strong>[[start_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Compensation</h2>
                                <p>The Employee\'s gross salary will be <strong>[[gross_salary_per_period]]</strong>, paid [[payment_frequency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Benefits</h2>
                                <p>[[benefits_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. At-Will Employment</h2>
                                <p>[[at_will_statement]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">5. Governing Law</h2>
                                <p>This Agreement shall be governed by and construed in accordance with the laws of the State of [[state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employer Signature</p></td>
                                <td width="50%"><p>___________________<br>Employee Signature</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Трудовий договір (за власним бажанням)',
                        'description' => 'Стандартний трудовий договір за власним бажанням, поширений у США, що визначає ключові умови працевлаштування, які можуть бути розірвані будь-якою стороною в будь-який час з будь-якої законної причини.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Трудовий договір</h1>
                                <p style="font-size: 14px;">(За власним бажанням)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Укладено в [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[agreement_date]] р.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цей Трудовий договір («Договір») укладено між:</p>
                                <p><strong>Роботодавець:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Представлений [[employer_represented_by]]</p>
                                <p>та</p>
                                <p><strong>Працівник:</strong> [[employee_full_name]]<br>[[employee_address]]<br>SSN/EIN: [[employee_ssn_ein]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Посада та дата початку роботи</h2>
                                <p>Роботодавець наймає Працівника на посаду <strong>[[job_title]]</strong>, починаючи з <strong>[[start_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Компенсація</h2>
                                <p>Валова заробітна плата Працівника становитиме <strong>[[gross_salary_per_period]]</strong>, виплачується [[payment_frequency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Переваги</h2>
                                <p>[[benefits_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Працевлаштування за власним бажанням</h2>
                                <p>[[at_will_statement]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">5. Застосовне право</h2>
                                <p>Ця Угода регулюється та тлумачиться відповідно до законів штату [[state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Підпис роботодавця</p></td>
                                <td width="50%"><p>___________________<br>Підпис працівника</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Arbeitsvertrag (nach Belieben kündbar)',
                        'description' => 'Ein Standard-Arbeitsvertrag nach Belieben, üblich in den USA, der die wesentlichen Beschäftigungsbedingungen festlegt, die von beiden Parteien jederzeit aus jedem rechtlichen Grund beendet werden können.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Arbeitsvertrag</h1>
                                <p style="font-size: 14px;">(At-Will Employment)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Abgeschlossen in [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>am [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dieser Arbeitsvertrag ("Vertrag") wird zwischen den folgenden Parteien geschlossen:</p>
                                <p><strong>Arbeitgeber:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Vertreten durch [[employer_represented_by]]</p>
                                <p>und</p>
                                <p><strong>Arbeitnehmer:</strong> [[employee_full_name]]<br>[[employee_address]]<br>SSN/EIN: [[employee_ssn_ein]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Position und Beginn der Beschäftigung</h2>
                                <p>Der Arbeitgeber stellt den Arbeitnehmer für die Position als <strong>[[job_title]]</strong> ein, beginnend am <strong>[[start_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Vergütung</h2>
                                <p>Das Bruttogehalt des Arbeitnehmers beträgt <strong>[[gross_salary_per_period]]</strong>, zahlbar [[payment_frequency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Leistungen</h2>
                                <p>[[benefits_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Beschäftigung nach Belieben (At-Will Employment)</h2>
                                <p>[[at_will_statement]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">5. Anwendbares Recht</h2>
                                <p>Dieser Vertrag unterliegt den Gesetzen des Staates [[state]] und wird entsprechend ausgelegt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Unterschrift des Arbeitgebers</p></td>
                                <td width="50%"><p>___________________<br>Unterschrift des Arbeitnehmers</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o pracę (na zasadzie dowolności)',
                        'description' => 'Standardowa umowa o pracę na zasadzie dowolności, powszechna w USA, określająca kluczowe warunki zatrudnienia, które mogą zostać rozwiązane przez każdą ze stron w dowolnym momencie z dowolnego legalnego powodu.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Umowa o pracę</h1>
                                <p style="font-size: 14px;">(Zatrudnienie na zasadzie dowolności)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Zawarta w [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>dnia [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejsza Umowa o Pracę ("Umowa") zostaje zawarta pomiędzy:</p>
                                <p><strong>Pracodawca:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Reprezentowany przez [[employer_represented_by]]</p>
                                <p>oraz</p>
                                <p><strong>Pracownik:</strong> [[employee_full_name]]<br>[[employee_address]]<br>SSN/EIN: [[employee_ssn_ein]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Stanowisko i data rozpoczęcia pracy</h2>
                                <p>Pracodawca zatrudnia Pracownika na stanowisku <strong>[[job_title]]</strong>, rozpoczynając od <strong>[[start_date]]</strong>.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Wynagrodzenie</h2>
                                <p>Wynagrodzenie brutto Pracownika będzie wynosić <strong>[[gross_salary_per_period]]</strong>, płatne [[payment_frequency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Świadczenia</h2>
                                <p>[[benefits_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Zatrudnienie na zasadzie dowolności</h2>
                                <p>[[at_will_statement]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">5. Prawo właściwe</h2>
                                <p>Niniejsza Umowa podlega i będzie interpretowana zgodnie z prawem stanu [[state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Podpis Pracodawcy</p></td>
                                <td width="50%"><p>___________________<br>Podpis Pracownika</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Срочный трудовой договор / Fixed-Term Employment Agreement ---
            [
                'slug' => 'fixed-term-employment-agreement-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"en":"Agreement Date","uk":"Дата угоди","de":"Vertragsdatum","pl":"Data umowy"}},
                    {"name":"employer_company_name","type":"text","required":true,"labels":{"en":"Employer Company Name","uk":"Назва компанії роботодавця","de":"Name des Arbeitgebers (Firma)","pl":"Nazwa firmy pracodawcy"}},
                    {"name":"employer_address","type":"text","required":true,"labels":{"en":"Employer Address","uk":"Адреса роботодавця","de":"Adresse des Arbeitgebers","pl":"Adres pracodawcy"}},
                    {"name":"employer_represented_by","type":"text","required":true,"labels":{"en":"Represented by (Name, Title)","uk":"Представлений (Ім\'я, Посада)","de":"Vertreten durch (Name, Position)","pl":"Reprezentowany przez (Imię, Stanowisko)"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Arbeitnehmers","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Arbeitnehmers","pl":"Adres pracownika"}},
                    {"name":"employee_ssn_ein","type":"text","required":false,"labels":{"en":"Employee SSN/EIN (optional)","uk":"SSN/EIN працівника (необов\'язково)","de":"Mitarbeiter-SSN/EIN (optional)","pl":"Numer SSN/EIN pracownika (opcjonalnie)"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"en":"Job Title/Position","uk":"Назва посади/Позиція","de":"Berufsbezeichnung/Position","pl":"Nazwa stanowiska/Pozycja"}},
                    {"name":"start_date","type":"date","required":true,"labels":{"en":"Start Date of Employment","uk":"Дата початку роботи","de":"Beginn des Arbeitsverhältnisses","pl":"Data rozpoczęcia zatrudnienia"}},
                    {"name":"end_date","type":"date","required":true,"labels":{"en":"End Date of Employment","uk":"Дата закінчення роботи","de":"Ende des Arbeitsverhältnisses","pl":"Data zakończenia zatrudnienia"}},
                    {"name":"gross_salary_per_period","type":"text","required":true,"labels":{"en":"Gross Salary (e.g., per hour, per week, per year)","uk":"Валова заробітна плата (напр., за годину, за тиждень, за рік)","de":"Bruttogehalt (z.B. pro Stunde, pro Woche, pro Jahr)","pl":"Wynagrodzenie brutto (np. za godzinę, za tydzień, za rok)"}},
                    {"name":"payment_frequency","type":"text","required":true,"labels":{"en":"Payment Frequency (e.g., bi-weekly, monthly)","uk":"Частота виплат (напр., раз на два тижні, щомісячно)","de":"Zahlungshäufigkeit (z.B. zweiwöchentlich, monatlich)","pl":"Częstotliwość płatności (np. dwutygodniowo, miesięcznie)"}},
                    {"name":"benefits_summary","type":"textarea","required":false,"labels":{"en":"Benefits Summary (optional)","uk":"Короткий опис переваг (необов\'язково)","de":"Zusammenfassung der Leistungen (optional)","pl":"Podsumowanie świadczeń (opcjonalnie)"}},
                    {"name":"reason_for_fixed_term","type":"textarea","required":false,"labels":{"en":"Reason for Fixed-Term (optional)","uk":"Причина строкового характеру (необов\'язково)","de":"Grund der Befristung (optional)","pl":"Powód zawarcia umowy na czas określony (opcjonalnie)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Fixed-Term Employment Agreement',
                        'description' => 'A standard fixed-term employment agreement, outlining specific start and end dates, common in the USA for project-based or temporary roles.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Employment Agreement</h1>
                                <p style="font-size: 14px;">(Fixed-Term)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Concluded in [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>on [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This Fixed-Term Employment Agreement ("Agreement") is made and entered into by and between:</p>
                                <p><strong>Employer:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Represented by [[employer_represented_by]]</p>
                                <p>and</p>
                                <p><strong>Employee:</strong> [[employee_full_name]]<br>[[employee_address]]<br>SSN/EIN: [[employee_ssn_ein]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Position and Term of Employment</h2>
                                <p>The Employer hires the Employee for the position of <strong>[[job_title]]</strong>, commencing on <strong>[[start_date]]</strong> and ending on <strong>[[end_date]]</strong>.</p>
                                <p>The reason for the fixed term is: [[reason_for_fixed_term]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Compensation</h2>
                                <p>The Employee\'s gross salary will be <strong>[[gross_salary_per_period]]</strong>, paid [[payment_frequency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Benefits</h2>
                                <p>[[benefits_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Governing Law</h2>
                                <p>This Agreement shall be governed by and construed in accordance with the laws of the State of [[state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employer Signature</p></td>
                                <td width="50%"><p>___________________<br>Employee Signature</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Строковий трудовий договір',
                        'description' => 'Стандартний строковий трудовий договір, що визначає конкретні дати початку та закінчення, поширений у США для проектних або тимчасових ролей.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Трудовий договір</h1>
                                <p style="font-size: 14px;">(Строковий)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Укладено в [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[agreement_date]] р.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цей Строковий трудовий договір («Договір») укладено між:</p>
                                <p><strong>Роботодавець:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Представлений [[employer_represented_by]]</p>
                                <p>та</p>
                                <p><strong>Працівник:</strong> [[employee_full_name]]<br>[[employee_address]]<br>SSN/EIN: [[employee_ssn_ein]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Посада та термін працевлаштування</h2>
                                <p>Роботодавець наймає Працівника на посаду <strong>[[job_title]]</strong>, починаючи з <strong>[[start_date]]</strong> та закінчуючи <strong>[[end_date]]</strong>.</p>
                                <p>Причина строкового характеру: [[reason_for_fixed_term]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Компенсація</h2>
                                <p>Валова заробітна плата Працівника становитиме <strong>[[gross_salary_per_period]]</strong>, виплачується [[payment_frequency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Переваги</h2>
                                <p>[[benefits_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Застосовне право</h2>
                                <p>Ця Угода регулюється та тлумачиться відповідно до законів штату [[state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Підпис роботодавця</p></td>
                                <td width="50%"><p>___________________<br>Підпис працівника</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Befristeter Arbeitsvertrag',
                        'description' => 'Ein Standard-Befristeter Arbeitsvertrag, der spezifische Start- und Enddaten festlegt, üblich in den USA für projektbasierte oder temporäre Rollen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Arbeitsvertrag</h1>
                                <p style="font-size: 14px;">(Befristet)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Abgeschlossen in [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>am [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dieser befristete Arbeitsvertrag ("Vertrag") wird zwischen den folgenden Parteien geschlossen:</p>
                                <p><strong>Arbeitgeber:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Vertreten durch [[employer_represented_by]]</p>
                                <p>und</p>
                                <p><strong>Arbeitnehmer:</strong> [[employee_full_name]]<br>[[employee_address]]<br>SSN/EIN: [[employee_ssn_ein]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Position und Laufzeit der Beschäftigung</h2>
                                <p>Der Arbeitgeber stellt den Arbeitnehmer für die Position als <strong>[[job_title]]</strong> ein, beginnend am <strong>[[start_date]]</strong> und endend am <strong>[[end_date]]</strong>.</p>
                                <p>Der Grund für die Befristung ist: [[reason_for_fixed_term]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Vergütung</h2>
                                <p>Das Bruttogehalt des Arbeitnehmers beträgt <strong>[[gross_salary_per_period]]</strong>, zahlbar [[payment_frequency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Leistungen</h2>
                                <p>[[benefits_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Anwendbares Recht</h2>
                                <p>Dieser Vertrag unterliegt den Gesetzen des Staates [[state]] und wird entsprechend ausgelegt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Unterschrift des Arbeitgebers</p></td>
                                <td width="50%"><p>___________________<br>Unterschrift des Arbeitnehmers</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o pracę na czas określony',
                        'description' => 'Standardowa umowa o pracę na czas określony, określająca konkretne daty rozpoczęcia i zakończenia, powszechna w USA dla ról projektowych lub tymczasowych.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Umowa o pracę</h1>
                                <p style="font-size: 14px;">(Na czas określony)</p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Zawarta w [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>dnia [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejsza Umowa o Pracę na Czas Określony ("Umowa") zostaje zawarta pomiędzy:</p>
                                <p><strong>Pracodawca:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Reprezentowany przez [[employer_represented_by]]</p>
                                <p>oraz</p>
                                <p><strong>Pracownik:</strong> [[employee_full_name]]<br>[[employee_address]]<br>SSN/EIN: [[employee_ssn_ein]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Stanowisko i okres zatrudnienia</h2>
                                <p>Pracodawca zatrudnia Pracownika na stanowisku <strong>[[job_title]]</strong>, rozpoczynając od <strong>[[start_date]]</strong> i kończąc w dniu <strong>[[end_date]]</strong>.</p>
                                <p>Powód zawarcia umowy na czas określony: [[reason_for_fixed_term]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Wynagrodzenie</h2>
                                <p>Wynagrodzenie brutto Pracownika będzie wynosić <strong>[[gross_salary_per_period]]</strong>, płatne [[payment_frequency]].</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Świadczenia</h2>
                                <p>[[benefits_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Prawo właściwe</h2>
                                <p>Niniejsza Umowa podlega i będzie interpretowana zgodnie z prawem stanu [[state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Podpis Pracodawcy</p></td>
                                <td width="50%"><p>___________________<br>Podpis Pracownika</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор о неразглашении (NDA) / Non-Disclosure Agreement (NDA) ---
            [
                'slug' => 'nda-agreement-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"en":"Agreement Date","uk":"Дата угоди","de":"Vertragsdatum","pl":"Data umowy"}},
                    {"name":"disclosing_party_name","type":"text","required":true,"labels":{"en":"Disclosing Party Name","uk":"Назва сторони, що розкриває","de":"Name der offenlegenden Partei","pl":"Nazwa Strony Ujawniającej"}},
                    {"name":"disclosing_party_address","type":"text","required":true,"labels":{"en":"Disclosing Party Address","uk":"Адреса сторони, що розкриває","de":"Adresse der offenlegenden Partei","pl":"Adres Strony Ujawniającej"}},
                    {"name":"receiving_party_name","type":"text","required":true,"labels":{"en":"Receiving Party Name","uk":"Назва сторони, що отримує","de":"Name der empfangenden Partei","pl":"Nazwa Strony Otrzymującej"}},
                    {"name":"receiving_party_address","type":"text","required":true,"labels":{"en":"Receiving Party Address","uk":"Адреса сторони, що отримує","de":"Adresse der empfangenden Partei","pl":"Adres Strony Otrzymującej"}},
                    {"name":"confidential_information_definition","type":"textarea","required":true,"labels":{"en":"Definition of Confidential Information","uk":"Визначення конфіденційної інформації","de":"Definition vertraulicher Informationen","pl":"Definicja Informacji Poufnych"}},
                    {"name":"purpose_of_disclosure","type":"textarea","required":true,"labels":{"en":"Purpose of Disclosure","uk":"Мета розкриття","de":"Zweck der Offenlegung","pl":"Cel ujawnienia"}},
                    {"name":"confidentiality_period_years","type":"number","required":true,"labels":{"en":"Confidentiality Period (in years)","uk":"Термін конфіденційності (у роках)","de":"Dauer der Vertraulichkeit (in Jahren)","pl":"Okres poufności (w latach)"}},
                    {"name":"exceptions_to_confidentiality","type":"textarea","required":false,"labels":{"en":"Exceptions to Confidentiality (optional)","uk":"Винятки з конфіденційності (необов\'язково)","de":"Ausnahmen von der Vertraulichkeit (optional)","pl":"Wyjątki od poufności (opcjonalnie)"}},
                    {"name":"governing_law_state","type":"text","required":true,"labels":{"en":"Governing Law State","uk":"Штат, що регулює право","de":"Anwendbares Recht (Bundesstaat)","pl":"Stan prawa właściwego"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Non-Disclosure Agreement (NDA)',
                        'description' => 'A legally binding agreement to protect confidential information exchanged between parties, compliant with US contract law.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Non-Disclosure Agreement (NDA)</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Concluded in [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>on [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This Non-Disclosure Agreement ("Agreement") is made and entered into by and between:</p>
                                <p><strong>Disclosing Party:</strong> [[disclosing_party_name]]<br>[[disclosing_party_address]]</p>
                                <p>and</p>
                                <p><strong>Receiving Party:</strong> [[receiving_party_name]]<br>[[receiving_party_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Definition of Confidential Information</h2>
                                <p>Confidential Information means: [[confidential_information_definition]]</p>
                                <p>The purpose of disclosure is: [[purpose_of_disclosure]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Obligation of Confidentiality</h2>
                                <p>The Receiving Party agrees to keep the Confidential Information strictly confidential for a period of <strong>[[confidentiality_period_years]] years</strong> from the date of disclosure and to use it only for the agreed purpose.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Exceptions</h2>
                                <p>The obligation of confidentiality does not apply to information that: [[exceptions_to_confidentiality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Governing Law</h2>
                                <p>This Agreement shall be governed by and construed in accordance with the laws of the State of [[governing_law_state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Disclosing Party Signature</p></td>
                                <td width="50%"><p>___________________<br>Receiving Party Signature</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про нерозголошення (NDA)',
                        'description' => 'Юридично обов\'язкова угода про захист конфіденційної інформації, що обмінюється між сторонами, відповідно до договірного права США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Угода про нерозголошення (NDA)</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Укладено в [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[agreement_date]] р.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Ця Угода про нерозголошення («Угода») укладена між:</p>
                                <p><strong>Сторона, що розкриває:</strong> [[disclosing_party_name]]<br>[[disclosing_party_address]]</p>
                                <p>та</p>
                                <p><strong>Сторона, що отримує:</strong> [[receiving_party_name]]<br>[[receiving_party_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Визначення конфіденційної інформації</h2>
                                <p>Конфіденційна інформація означає: [[confidential_information_definition]]</p>
                                <p>Мета розкриття: [[purpose_of_disclosure]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Зобов\'язання щодо конфіденційності</h2>
                                <p>Сторона, що отримує, погоджується зберігати Конфіденційну інформацію в суворій таємниці протягом <strong>[[confidentiality_period_years]] років</strong> з дати розкриття та використовувати її лише для узгодженої мети.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Винятки</h2>
                                <p>Зобов\'язання щодо конфіденційності не поширюється на інформацію, яка: [[exceptions_to_confidentiality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Застосовне право</h2>
                                <p>Ця Угода регулюється та тлумачиться відповідно до законів штату [[governing_law_state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Підпис сторони, що розкриває</p></td>
                                <td width="50%"><p>___________________<br>Підпис сторони, що отримує</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Geheimhaltungsvereinbarung (NDA)',
                        'description' => 'Eine rechtsverbindliche Vereinbarung zum Schutz vertraulicher Informationen, die zwischen Parteien ausgetauscht werden, konform mit dem US-amerikanischen Vertragsrecht.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Geheimhaltungsvereinbarung (NDA)</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Abgeschlossen in [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>am [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Diese Geheimhaltungsvereinbarung ("Vereinbarung") wird zwischen den folgenden Parteien geschlossen:</p>
                                <p><strong>Offenlegende Partei:</strong> [[disclosing_party_name]]<br>[[disclosing_party_address]]</p>
                                <p>und</p>
                                <p><strong>Empfangende Partei:</strong> [[receiving_party_name]]<br>[[receiving_party_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Definition vertraulicher Informationen</h2>
                                <p>Vertrauliche Informationen sind: [[confidential_information_definition]]</p>
                                <p>Der Zweck der Offenlegung ist: [[purpose_of_disclosure]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Geheimhaltungspflicht</h2>
                                <p>Die Empfangende Partei verpflichtet sich, die vertraulichen Informationen für einen Zeitraum von <strong>[[confidentiality_period_years]] Jahren</strong> ab dem Datum der Offenlegung streng geheim zu halten und nur für den vereinbarten Zweck zu verwenden.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Ausnahmen</h2>
                                <p>Die Geheimhaltungspflicht gilt nicht für Informationen, die: [[exceptions_to_confidentiality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Anwendbares Recht</h2>
                                <p>Diese Vereinbarung unterliegt den Gesetzen des Staates [[governing_law_state]] und wird entsprechend ausgelegt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Unterschrift der offenlegenden Partei</p></td>
                                <td width="50%"><p>___________________<br>Unterschrift der empfangenden Partei</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o zachowaniu poufności (NDA)',
                        'description' => 'Prawnie wiążąca umowa o ochronie poufnych informacji wymienianych między stronami, zgodna z prawem umów USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Umowa o zachowaniu poufności (NDA)</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Zawarta w [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>dnia [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejsza Umowa o Zachowaniu Poufności ("Umowa") zostaje zawarta pomiędzy:</p>
                                <p><strong>Stroną Ujawniającą:</strong> [[disclosing_party_name]]<br>[[disclosing_party_address]]</p>
                                <p>oraz</p>
                                <p><strong>Stroną Otrzymującą:</strong> [[receiving_party_name]]<br>[[receiving_party_address]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Definicja Informacji Poufnych</h2>
                                <p>Informacje Poufne oznaczają: [[confidential_information_definition]]</p>
                                <p>Celem ujawnienia jest: [[purpose_of_disclosure]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Obowiązek zachowania poufności</h2>
                                <p>Strona Otrzymująca zobowiązuje się do zachowania Informacji Poufnych w ścisłej tajemnicy przez okres <strong>[[confidentiality_period_years]] lat</strong> od daty ujawnienia i wykorzystywania ich wyłącznie w uzgodnionym celu.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Wyjątki</h2>
                                <p>Obowiązek zachowania poufności nie dotyczy informacji, które: [[exceptions_to_confidentiality]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Prawo właściwe</h2>
                                <p>Niniejsza Umowa podlega i będzie interpretowana zgodnie z prawem stanu [[governing_law_state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Podpis Strony Ujawniającej</p></td>
                                <td width="50%"><p>___________________<br>Podpis Strony Otrzymującej</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Договор о материальной ответственности / Material Liability Agreement ---
            [
                'slug' => 'material-liability-agreement-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"agreement_date","type":"date","required":true,"labels":{"en":"Agreement Date","uk":"Дата угоди","de":"Vertragsdatum","pl":"Data umowy"}},
                    {"name":"employer_company_name","type":"text","required":true,"labels":{"en":"Employer Company Name","uk":"Назва компанії роботодавця","de":"Name des Arbeitgebers (Firma)","pl":"Nazwa firmy pracodawcy"}},
                    {"name":"employer_address","type":"text","required":true,"labels":{"en":"Employer Address","uk":"Адреса роботодавця","de":"Adresse des Arbeitgebers","pl":"Adres pracodawcy"}},
                    {"name":"employer_represented_by","type":"text","required":true,"labels":{"en":"Represented by (Name, Title)","uk":"Представлений (Ім\'я, Посада)","de":"Vertreten durch (Name, Position)","pl":"Reprezentowany przez (Imię, Stanowisko)"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Arbeitnehmers","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Arbeitnehmers","pl":"Adres pracownika"}},
                    {"name":"employee_job_title","type":"text","required":true,"labels":{"en":"Employee Job Title/Position","uk":"Назва посади/Позиція працівника","de":"Berufsbezeichnung/Position des Arbeitnehmers","pl":"Nazwa stanowiska/Pozycja pracownika"}},
                    {"name":"property_description","type":"textarea","required":true,"labels":{"en":"Description of Entrusted Property","uk":"Опис довіреного майна","de":"Beschreibung des anvertrauten Eigentums","pl":"Opis powierzonego mienia"}},
                    {"name":"liability_scope","type":"textarea","required":true,"labels":{"en":"Scope of Liability (e.g., full liability, liability for gross negligence)","uk":"Обсяг відповідальності (напр., повна відповідальність, відповідальність за грубу недбалість)","de":"Umfang der Haftung (z.B. volle Haftung, Haftung für grobe Fahrlässigkeit)","pl":"Zakres odpowiedzialności (np. pełna odpowiedzialność, odpowiedzialność za rażące niedbalstwo)"}},
                    {"name":"governing_law_state","type":"text","required":true,"labels":{"en":"Governing Law State","uk":"Штат, що регулює право","de":"Anwendbares Recht (Bundesstaat)","pl":"Stan prawa właściwego"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Material Liability Agreement',
                        'description' => 'An agreement regulating an employee\'s liability for entrusted property or damages within the employment relationship, common in the USA for specific roles.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Material Liability Agreement</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Concluded in [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>on [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>This Material Liability Agreement ("Agreement") is made and entered into by and between:</p>
                                <p><strong>Employer:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Represented by [[employer_represented_by]]</p>
                                <p>and</p>
                                <p><strong>Employee:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Position: [[employee_job_title]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Entrusted Property</h2>
                                <p>The Employer entrusts the Employee with the following property: [[property_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Scope of Liability</h2>
                                <p>The Employee shall be liable for damages to the entrusted property according to the following scope: [[liability_scope]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Employee\'s Obligations</h2>
                                <p>The Employee undertakes to handle the entrusted property carefully and to protect it from damage or loss.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Governing Law</h2>
                                <p>This Agreement shall be governed by and construed in accordance with the laws of the State of [[governing_law_state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Employer Signature</p></td>
                                <td width="50%"><p>___________________<br>Employee Signature</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Договір про матеріальну відповідальність',
                        'description' => 'Угода, що регулює відповідальність працівника за довірене майно або збитки в рамках трудових відносин, поширена в США для певних ролей.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Договір про матеріальну відповідальність</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Укладено в [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>[[agreement_date]] р.</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Цей Договір про матеріальну відповідальність («Договір») укладено між:</p>
                                <p><strong>Роботодавець:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Представлений [[employer_represented_by]]</p>
                                <p>та</p>
                                <p><strong>Працівник:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Посада: [[employee_job_title]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Довірене майно</h2>
                                <p>Роботодавець довіряє Працівнику таке майно: [[property_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Обсяг відповідальності</h2>
                                <p>Працівник несе відповідальність за збитки, завдані довіреному майну, в такому обсязі: [[liability_scope]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Обов\'язки Працівника</h2>
                                <p>Працівник зобов\'язується дбайливо ставитися до довіреного майна та захищати його від пошкодження або втрати.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Застосовне право</h2>
                                <p>Ця Угода регулюється та тлумачиться відповідно до законів штату [[governing_law_state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Підпис роботодавця</p></td>
                                <td width="50%"><p>___________________<br>Підпис працівника</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Haftungsvereinbarung (Mitarbeiter)',
                        'description' => 'Eine Vereinbarung zur Regelung der Haftung des Arbeitnehmers für anvertrautes Eigentum oder Schäden im Rahmen des Arbeitsverhältnisses, üblich in den USA für spezifische Rollen.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Haftungsvereinbarung</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Abgeschlossen in [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>am [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Diese Haftungsvereinbarung ("Vereinbarung") wird zwischen den folgenden Parteien geschlossen:</p>
                                <p><strong>Arbeitgeber:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Vertreten durch [[employer_represented_by]]</p>
                                <p>und</p>
                                <p><strong>Arbeitnehmer:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Position: [[employee_job_title]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Anvertrautes Eigentum</h2>
                                <p>Der Arbeitgeber vertraut dem Arbeitnehmer folgendes Eigentum an: [[property_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Umfang der Haftung</h2>
                                <p>Der Arbeitnehmer haftet für Schäden am anvertrauten Eigentum gemäß folgendem Umfang: [[liability_scope]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Pflichten des Arbeitnehmers</h2>
                                <p>Der Arbeitnehmer verpflichtet sich, das anvertraute Eigentum sorgfältig zu behandeln und vor Beschädigung oder Verlust zu schützen.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Anwendbares Recht</h2>
                                <p>Diese Vereinbarung unterliegt den Gesetzen des Staates [[governing_law_state]] und wird entsprechend ausgelegt.</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Unterschrift des Arbeitgebers</p></td>
                                <td width="50%"><p>___________________<br>Unterschrift des Arbeitnehmers</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Umowa o odpowiedzialności materialnej',
                        'description' => 'Umowa regulująca odpowiedzialność pracownika za powierzone mienie lub szkody w ramach stosunku pracy, powszechna w USA dla określonych ról.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Umowa o odpowiedzialności materialnej</h1>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Zawarta w [[city]], [[state]]</p></td>
                                    <td width="50%" style="text-align: right;"><p>dnia [[agreement_date]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Niniejsza Umowa o Odpowiedzialności Materialnej ("Umowa") zostaje zawarta pomiędzy:</p>
                                <p><strong>Pracodawca:</strong> [[employer_company_name]]<br>[[employer_address]]<br>Reprezentowany przez [[employer_represented_by]]</p>
                                <p>oraz</p>
                                <p><strong>Pracownik:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Stanowisko: [[employee_job_title]]</p>
                                <br/>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Powierzone mienie</h2>
                                <p>Pracodawca powierza Pracownikowi następujące mienie: [[property_description]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Zakres odpowiedzialności</h2>
                                <p>Pracownik ponosi odpowiedzialność za szkody w powierzonym mieniu w następującym zakresie: [[liability_scope]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Obowiązki Pracownika</h2>
                                <p>Pracownik zobowiązuje się do starannego obchodzenia się z powierzonym mieniem i ochrony go przed uszkodzeniem lub utratą.</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Prawo właściwe</h2>
                                <p>Niniejsza Umowa podlega i będzie interpretowana zgodnie z prawem stanu [[governing_law_state]].</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Podpis Pracodawcy</p></td>
                                <td width="50%"><p>___________________<br>Podpis Pracownika</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Должностная инструкция / Job Description ---
            [
                'slug' => 'job-description-us',
                'fields' => '[
                    {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"en":"Job Title","uk":"Назва посади","de":"Stellenbezeichnung","pl":"Stanowisko"}},
                    {"name":"department","type":"text","required":true,"labels":{"en":"Department","uk":"Відділ","de":"Abteilung","pl":"Dział"}},
                    {"name":"reports_to","type":"text","required":true,"labels":{"en":"Reports To (Title/Name)","uk":"Підпорядковується (Посада/Ім\'я)","de":"Berichtet an (Position/Name)","pl":"Podlega (Stanowisko/Imię)"}},
                    {"name":"job_summary","type":"textarea","required":true,"labels":{"en":"Job Summary","uk":"Короткий опис посади","de":"Zusammenfassung der Stelle","pl":"Podsumowanie stanowiska"}},
                    {"name":"essential_duties_responsibilities","type":"textarea","required":true,"labels":{"en":"Essential Duties and Responsibilities","uk":"Основні обов\'язки та відповідальність","de":"Wesentliche Aufgaben und Verantwortlichkeiten","pl":"Podstawowe obowiązki i odpowiedzialności"}},
                    {"name":"qualifications","type":"textarea","required":true,"labels":{"en":"Qualifications (Education, Experience, Skills)","uk":"Кваліфікації (Освіта, Досвід, Навички)","de":"Qualifikationen (Ausbildung, Erfahrung, Fähigkeiten)","pl":"Kwalifikacje (Wykształcenie, Doświadczenie, Umiejętności)"}},
                    {"name":"physical_demands","type":"textarea","required":false,"labels":{"en":"Physical Demands (optional)","uk":"Фізичні вимоги (необов\'язково)","de":"Physische Anforderungen (optional)","pl":"Wymagania fizyczne (opcjonalnie)"}},
                    {"name":"work_environment","type":"textarea","required":false,"labels":{"en":"Work Environment (optional)","uk":"Робоче середовище (необов\'язково)","de":"Arbeitsumfeld (optional)","pl":"Środowisko pracy (opcjonalnie)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Job Description',
                        'description' => 'A detailed description of the tasks, responsibilities, and requirements of a specific position within a company in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Job Description</h1>
                                <p style="font-size: 14px;">Company: <strong>[[company_name]]</strong></p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Job Title: <strong>[[job_title]]</strong></p></td>
                                    <td width="50%" style="text-align: right;"><p>Department: [[department]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Reports To:</h2>
                                <p>[[reports_to]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Job Summary:</h2>
                                <p>[[job_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Essential Duties and Responsibilities:</h2>
                                <p>[[essential_duties_responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Qualifications:</h2>
                                <p>[[qualifications]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Physical Demands:</h2>
                                <p>[[physical_demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Work Environment:</h2>
                                <p>[[work_environment]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Date, Manager Signature</p></td>
                                <td width="50%"><p>___________________<br>Date, Employee Signature</p></td>
                                </tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Посадова інструкція',
                        'description' => 'Детальний опис завдань, обов\'язків та вимог до певної посади в компанії в США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Посадова інструкція</h1>
                                <p style="font-size: 14px;">Компанія: <strong>[[company_name]]</strong></p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Назва посади: <strong>[[job_title]]</strong></p></td>
                                    <td width="50%" style="text-align: right;"><p>Відділ: [[department]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Підпорядковується:</h2>
                                <p>[[reports_to]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Короткий опис посади:</h2>
                                <p>[[job_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Основні обов\'язки та відповідальність:</h2>
                                <p>[[essential_duties_responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Кваліфікації:</h2>
                                <p>[[qualifications]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Фізичні вимоги:</h2>
                                <p>[[physical_demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Робоче середовище:</h2>
                                <p>[[work_environment]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Дата, Підпис керівника</p></td>
                                <td width="50%"><p>___________________<br>Дата, Підпис працівника</p></td>
                                </tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Stellenbeschreibung',
                        'description' => 'Eine detaillierte Beschreibung der Aufgaben, Verantwortlichkeiten und Anforderungen einer bestimmten Position in einem Unternehmen in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Stellenbeschreibung</h1>
                                <p style="font-size: 14px;">Unternehmen: <strong>[[company_name]]</strong></p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Stellenbezeichnung: <strong>[[job_title]]</strong></p></td>
                                    <td width="50%" style="text-align: right;"><p>Abteilung: [[department]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Berichtet an:</h2>
                                <p>[[reports_to]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Zusammenfassung der Stelle:</h2>
                                <p>[[job_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Wesentliche Aufgaben und Verantwortlichkeiten:</h2>
                                <p>[[essential_duties_responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Qualifikationen:</h2>
                                <p>[[qualifications]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Physische Anforderungen:</h2>
                                <p>[[physical_demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Arbeitsumfeld:</h2>
                                <p>[[work_environment]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Datum, Unterschrift Manager</p></td>
                                <td width="50%"><p>___________________<br>Datum, Unterschrift Mitarbeiter</p></td>
                                </tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Opis stanowiska pracy',
                        'description' => 'Szczegółowy opis zadań, obowiązków i wymagań na danym stanowisku w firmie w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;">
                                <h1 style="font-size: 24px; font-weight: bold;">Opis stanowiska pracy</h1>
                                <p style="font-size: 14px;">Firma: <strong>[[company_name]]</strong></p>
                            </div>
                            <table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;">
                                <tr>
                                    <td width="50%"><p>Nazwa stanowiska: <strong>[[job_title]]</strong></p></td>
                                    <td width="50%" style="text-align: right;"><p>Dział: [[department]]</p></td>
                                </tr>
                            </table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Podlega:</h2>
                                <p>[[reports_to]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Podsumowanie stanowiska:</h2>
                                <p>[[job_summary]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Podstawowe obowiązki i odpowiedzialności:</h2>
                                <p>[[essential_duties_responsibilities]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Kwalifikacje:</h2>
                                <p>[[qualifications]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Wymagania fizyczne:</h2>
                                <p>[[physical_demands]]</p>
                                <h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Środowisko pracy:</h2>
                                <p>[[work_environment]]</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;">
                                <table width="100%" style="text-align: center;"><tr>
                                <td width="50%"><p>___________________<br>Data, Podpis menedżera</p></td>
                                <td width="50%"><p>___________________<br>Data, Podpis pracownika</p></td>
                                </tr></table></div>'
                    ]
                ]
            ],

            // --- Приказ о приеме на работу / Employment Confirmation Letter ---
            [
                'slug' => 'employment-confirmation-letter-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"letter_date","type":"date","required":true,"labels":{"en":"Date","uk":"Дата","de":"Datum","pl":"Data"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters","pl":"Adres pracownika"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"en":"Company Address","uk":"Адреса компанії","de":"Adresse der Firma","pl":"Adres firmy"}},
                    {"name":"job_title","type":"text","required":true,"labels":{"en":"Job Title","uk":"Назва посади","de":"Stellenbezeichnung","pl":"Stanowisko"}},
                    {"name":"start_date","type":"date","required":true,"labels":{"en":"Start Date of Employment","uk":"Дата початку роботи","de":"Beginn der Beschäftigung","pl":"Data rozpoczęcia zatrudnienia"}},
                    {"name":"gross_salary_per_period","type":"text","required":true,"labels":{"en":"Gross Salary (e.g., per hour, per week, per year)","uk":"Валова заробітна плата (напр., за годину, за тиждень, за рік)","de":"Bruttogehalt (z.B. pro Stunde, pro Woche, pro Jahr)","pl":"Wynagrodzenie brutto (np. za godzinę, za tydzień, za rok)"}},
                    {"name":"payment_frequency","type":"text","required":true,"labels":{"en":"Payment Frequency (e.g., bi-weekly, monthly)","uk":"Частота виплат (напр., раз на два тижні, щомісячно)","de":"Zahlungshäufigkeit (z.B. zweiwöchentlich, monatlich)","pl":"Częstotliwość płatności (np. dwutygodniowo, miesięcznie)"}},
                    {"name":"supervisor_name","type":"text","required":true,"labels":{"en":"Supervisor\'s Name","uk":"Ім\'я керівника","de":"Name des Vorgesetzten","pl":"Imię i nazwisko przełożonego"}},
                    {"name":"hr_contact_info","type":"text","required":false,"labels":{"en":"HR Contact Information (optional)","uk":"Контактна інформація відділу кадрів (необов\'язково)","de":"Kontaktinformationen der Personalabteilung (optional)","pl":"Dane kontaktowe HR (opcjonalnie)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Employment Confirmation Letter',
                        'description' => 'A formal letter confirming an employee\'s hiring and key employment terms in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p><strong>[[employee_full_name]]</strong><br>[[employee_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Subject: Employment Confirmation - [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear [[employee_full_name]],</p>
                                <p>We are pleased to confirm your employment with [[company_name]] as a <strong>[[job_title]]</strong>, effective <strong>[[start_date]]</strong>.</p>
                                <p>Your gross salary will be <strong>[[gross_salary_per_period]]</strong>, paid [[payment_frequency]].</p>
                                <p>You will report directly to [[supervisor_name]].</p>
                                <p>For any HR-related questions, please contact [[hr_contact_info]].</p>
                                <p>We are excited to have you join our team!</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>[[company_name]] Management</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Наказ про прийом на роботу',
                        'description' => 'Формальний лист, що підтверджує прийом працівника на роботу та ключові умови працевлаштування в США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p><strong>[[employee_full_name]]</strong><br>[[employee_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Тема: Підтвердження працевлаштування - [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а [[employee_full_name]],</p>
                                <p>Ми раді підтвердити ваше працевлаштування в [[company_name]] на посаді <strong>[[job_title]]</strong>, починаючи з <strong>[[start_date]]</strong>.</p>
                                <p>Ваша валова заробітна плата становитиме <strong>[[gross_salary_per_period]]</strong>, виплачується [[payment_frequency]].</p>
                                <p>Ви будете підпорядковуватися безпосередньо [[supervisor_name]].</p>
                                <p>З питань, пов\'язаних з персоналом, звертайтеся до [[hr_contact_info]].</p>
                                <p>Ми раді вітати вас у нашій команді!</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>Керівництво [[company_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Einstellungsbestätigung',
                        'description' => 'Ein formelles Schreiben, das die Einstellung eines Mitarbeiters und die wesentlichen Beschäftigungsbedingungen in den USA bestätigt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p><strong>[[employee_full_name]]</strong><br>[[employee_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Betreff: Einstellungsbestätigung - [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[employee_full_name]],</p>
                                <p>wir freuen uns, Ihre Einstellung in unserem Unternehmen, [[company_name]], als <strong>[[job_title]]</strong>, mit Wirkung zum <strong>[[start_date]]</strong> zu bestätigen.</p>
                                <p>Ihr Bruttogehalt beträgt <strong>[[gross_salary_per_period]]</strong>, zahlbar [[payment_frequency]].</p>
                                <p>Sie werden direkt an [[supervisor_name]] berichten.</p>
                                <p>Für alle Fragen zur Personalabteilung wenden Sie sich bitte an [[hr_contact_info]].</p>
                                <p>Wir freuen uns sehr, Sie in unserem Team begrüßen zu dürfen!</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>Management von [[company_name]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Potwierdzenie zatrudnienia',
                        'description' => 'Formalne pismo potwierdzające zatrudnienie pracownika i kluczowe warunki zatrudnienia w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p><strong>[[employee_full_name]]</strong><br>[[employee_address]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Temat: Potwierdzenie zatrudnienia - [[job_title]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny/a Panie/Pani [[employee_full_name]],</p>
                                <p>Z przyjemnością potwierdzamy Pańskie/Pani zatrudnienie w [[company_name]] na stanowisku <strong>[[job_title]]</strong>, ze skutkiem od <strong>[[start_date]]</strong>.</p>
                                <p>Pańskie/Pani wynagrodzenie brutto będzie wynosić <strong>[[gross_salary_per_period]]</strong>, płatne [[payment_frequency]].</p>
                                <p>Będzie Pan/Pani podlegać bezpośrednio [[supervisor_name]].</p>
                                <p>W przypadku pytań dotyczących HR, prosimy o kontakt z [[hr_contact_info]].</p>
                                <p>Cieszymy się, że dołącza Pan/Pani do naszego zespołu!</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>Kierownictwo [[company_name]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- Приказ о переводе на другую должность / Transfer Order ---
            [
                'slug' => 'transfer-order-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"letter_date","type":"date","required":true,"labels":{"en":"Date","uk":"Дата","de":"Datum","pl":"Data"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
                    {"name":"company_address","type":"text","required":true,"labels":{"en":"Company Address","uk":"Адреса компанії","de":"Adresse der Firma","pl":"Adres firmy"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_address","type":"text","required":true,"labels":{"en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters","pl":"Adres pracownika"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"en":"Employee ID","uk":"Номер працівника","de":"Personalnummer","pl":"Numer pracownika"}},
                    {"name":"old_job_title","type":"text","required":true,"labels":{"en":"Previous Job Title","uk":"Попередня назва посади","de":"Bisherige Stellenbezeichnung","pl":"Dotychczasowe stanowisko"}},
                    {"name":"new_job_title","type":"text","required":true,"labels":{"en":"New Job Title","uk":"Нова назва посади","de":"Neue Stellenbezeichnung","pl":"Nowe stanowisko"}},
                    {"name":"effective_date","type":"date","required":true,"labels":{"en":"Effective Date of Transfer","uk":"Дата набрання чинності переведенням","de":"Datum des Inkrafttretens der Versetzung","pl":"Data wejścia w życie przeniesienia"}},
                    {"name":"reason_for_transfer","type":"textarea","required":true,"labels":{"en":"Reason for Transfer","uk":"Причина переведення","de":"Grund der Versetzung","pl":"Powód przeniesienia"}},
                    {"name":"supervisor_name","type":"text","required":true,"labels":{"en":"Supervisor\'s Name","uk":"Ім\'я керівника","de":"Name des Vorgesetzten","pl":"Imię i nazwisko przełożonego"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Transfer Order',
                        'description' => 'An internal order for the transfer of an employee to another position within the company in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p><strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Employee ID: [[employee_id]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Subject: Employee Transfer - [[employee_full_name]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear [[employee_full_name]],</p>
                                <p>This letter confirms your transfer from your current position as <strong>[[old_job_title]]</strong> to the new position of <strong>[[new_job_title]]</strong>, effective <strong>[[effective_date]]</strong>.</p>
                                <p>The reason for this transfer is: [[reason_for_transfer]]</p>
                                <p>You will continue to report to [[supervisor_name]]. All other terms and conditions of your employment remain unchanged.</p>
                                <p>We believe this new role will provide you with valuable experience and contribute to your professional growth within the company. We look forward to your continued contributions.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>Management of [[company_name]]</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Наказ про переведення на іншу посаду',
                        'description' => 'Внутрішній наказ про переведення працівника на іншу посаду в межах компанії в США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p><strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Табельний номер: [[employee_id]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Тема: Переведення працівника - [[employee_full_name]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а [[employee_full_name]],</p>
                                <p>Цей лист підтверджує ваше переведення з поточної посади <strong>[[old_job_title]]</strong> на нову посаду <strong>[[new_job_title]]</strong>, починаючи з <strong>[[effective_date]]</strong>.</p>
                                <p>Причина цього переведення: [[reason_for_transfer]]</p>
                                <p>Ви продовжуватимете підпорядковуватися [[supervisor_name]]. Усі інші умови вашого працевлаштування залишаються незмінними.</p>
                                <p>Ми віримо, що ця нова роль надасть вам цінний досвід та сприятиме вашому професійному зростанню в компанії. Ми з нетерпінням чекаємо на ваш подальший внесок.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>Керівництво [[company_name]]</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Versetzungsanordnung',
                        'description' => 'Eine interne Anordnung zur Versetzung eines Mitarbeiters auf eine andere Position innerhalb des Unternehmens in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p><strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Personalnummer: [[employee_id]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Betreff: Mitarbeiterversetzung - [[employee_full_name]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[employee_full_name]],</p>
                                <p>dieses Schreiben bestätigt Ihre Versetzung von Ihrer derzeitigen Position als <strong>[[old_job_title]]</strong> auf die neue Position als <strong>[[new_job_title]]</strong>, gültig ab dem <strong>[[effective_date]]</strong>.</p>
                                <p>Der Grund für diese Versetzung ist: [[reason_for_transfer]]</p>
                                <p>Sie werden weiterhin an [[supervisor_name]] berichten. Alle anderen Bedingungen Ihres Arbeitsverhältnisses bleiben unverändert.</p>
                                <p>Wir glauben, dass diese neue Rolle Ihnen wertvolle Erfahrungen vermitteln und zu Ihrer beruflichen Entwicklung innerhalb des Unternehmens beitragen wird. Wir freuen uns auf Ihre weiteren Beiträge.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>Management von [[company_name]]</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Zarządzenie o przeniesieniu',
                        'description' => 'Wewnętrzne zarządzenie o przeniesieniu pracownika na inne stanowisko w firmie w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p>[[company_name]]<br>[[company_address]]</p>
                                <br/>
                                <p>[[city]], [[state]] [[letter_date]]</p>
                                <br/>
                                <p><strong>[[employee_full_name]]</strong><br>[[employee_address]]<br>Numer pracownika: [[employee_id]]</p>
                                <br/>
                                <h1 style="font-size: 16px; font-weight: bold;">Temat: Przeniesienie pracownika - [[employee_full_name]]</h1>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny/a Panie/Pani [[employee_full_name]],</p>
                                <p>Niniejszym pismo potwierdza Pańskie/Pani przeniesienie z dotychczasowego stanowiska <strong>[[old_job_title]]</strong> na nowe stanowisko <strong>[[new_job_title]]</strong>, ze skutkiem od <strong>[[effective_date]]</strong>.</p>
                                <p>Powodem tego przeniesienia jest: [[reason_for_transfer]]</p>
                                <p>Będzie Pan/Pani nadal podlegać [[supervisor_name]]. Wszystkie inne warunki Pańskiego/Pani zatrudnienia pozostają bez zmian.</p>
                                <p>Wierzymy, że ta nowa rola zapewni Panu/Pani cenne doświadczenie i przyczyni się do Pańskiego/Pani rozwoju zawodowego w firmie. Z niecierpliwością oczekujemy na Pański/Pani dalszy wkład.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>Kierownictwo [[company_name]]</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление на ежегодный оплачиваемый отпуск / Annual Paid Leave Request ---
            [
                'slug' => 'annual-paid-leave-request-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"request_date","type":"date","required":true,"labels":{"en":"Request Date","uk":"Дата запиту","de":"Antragsdatum","pl":"Data wniosku"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"en":"Employee ID","uk":"Номер працівника","de":"Personalnummer","pl":"Numer pracownika"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters","pl":"Stanowisko pracownika"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
                    {"name":"department","type":"text","required":true,"labels":{"en":"Department","uk":"Відділ","de":"Abteilung","pl":"Dział"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"en":"Supervisor\'s Full Name","uk":"Повне ім\'я керівника","de":"Vollständiger Name des Vorgesetzten","pl":"Imię i nazwisko przełożonego"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn","pl":"Data rozpoczęcia urlopu"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende","pl":"Data zakończenia urlopu"}},
                    {"name":"total_days_requested","type":"number","required":true,"labels":{"en":"Total Days Requested","uk":"Загальна кількість запитуваних днів","de":"Gesamtzahl der beantragten Tage","pl":"Całkowita liczba żądanych dni"}},
                    {"name":"reason_for_leave","type":"textarea","required":false,"labels":{"en":"Reason for Leave (optional)","uk":"Причина відпустки (необов\'язково)","de":"Grund des Urlaubs (optional)","pl":"Powód urlopu (opcjonalnie)"}},
                    {"name":"coverage_plan","type":"textarea","required":false,"labels":{"en":"Coverage Plan during absence (optional)","uk":"План заміщення під час відсутності (необов\'язково)","de":"Vertretungsplan während der Abwesenheit (optional)","pl":"Plan zastępstwa podczas nieobecności (opcjonalnie)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Annual Paid Leave Request',
                        'description' => 'A formal request from an employee for annual paid leave, to be submitted to their supervisor or HR in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>To:</strong> [[supervisor_full_name]]</p>
                                <p><strong>From:</strong> [[employee_full_name]] (Employee ID: [[employee_id]])</p>
                                <p><strong>Date:</strong> [[request_date]]</p>
                                <p><strong>Subject:</strong> Annual Paid Leave Request</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear [[supervisor_full_name]],</p>
                                <p>I am writing to request approval for annual paid leave for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>, totaling [[total_days_requested]] days.</p>
                                <p>Reason for leave: [[reason_for_leave]]</p>
                                <p>During my absence, [[coverage_plan]]</p>
                                <p>Thank you for your consideration of this request.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на щорічну оплачувану відпустку',
                        'description' => 'Формальна заява працівника на щорічну оплачувану відпустку, що подається керівнику або до відділу кадрів у США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Кому:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Від:</strong> [[employee_full_name]] (Табельний номер: [[employee_id]])</p>
                                <p><strong>Дата:</strong> [[request_date]]</p>
                                <p><strong>Тема:</strong> Заява на щорічну оплачувану відпустку</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а [[supervisor_full_name]],</p>
                                <p>Цим подаю заяву на затвердження щорічної оплачуваної відпустки на період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>, загальною тривалістю [[total_days_requested]] днів.</p>
                                <p>Причина відпустки: [[reason_for_leave]]</p>
                                <p>Під час моєї відсутності: [[coverage_plan]]</p>
                                <p>Дякую за розгляд цього запиту.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Jahresurlaub',
                        'description' => 'Ein formeller Antrag eines Mitarbeiters auf Jahresurlaub, der dem Vorgesetzten oder der Personalabteilung in den USA vorzulegen ist.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>An:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Von:</strong> [[employee_full_name]] (Personalnummer: [[employee_id]])</p>
                                <p><strong>Datum:</strong> [[request_date]]</p>
                                <p><strong>Betreff:</strong> Antrag auf Jahresurlaub</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich die Genehmigung meines Jahresurlaubs für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>, insgesamt [[total_days_requested]] Tage.</p>
                                <p>Grund des Urlaubs: [[reason_for_leave]]</p>
                                <p>Während meiner Abwesenheit: [[coverage_plan]]</p>
                                <p>Vielen Dank für die Berücksichtigung dieses Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o urlop wypoczynkowy',
                        'description' => 'Formalny wniosek pracownika o udzielenie płatnego urlopu wypoczynkowego, do złożenia przełożonemu lub do działu HR w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Do:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Od:</strong> [[employee_full_name]] (Numer pracownika: [[employee_id]])</p>
                                <p><strong>Data:</strong> [[request_date]]</p>
                                <p><strong>Temat:</strong> Wniosek o urlop wypoczynkowy</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny/a Panie/Pani [[supervisor_full_name]],</p>
                                <p>Piszę, aby prosić o zatwierdzenie urlopu wypoczynkowego na okres od <strong>[[leave_start_date]]</strong> do <strong>[[leave_end_date]]</strong> włącznie, co daje łącznie [[total_days_requested]] dni.</p>
                                <p>Powód urlopu: [[reason_for_leave]]</p>
                                <p>Podczas mojej nieobecności: [[coverage_plan]]</p>
                                <p>Dziękuję za rozważenie tego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ]
                ]
            ],
// --- Заявление на отпуск за свой счет (без сохранения заработной платы) / Leave of Absence Request (Unpaid) ---
            [
                'slug' => 'unpaid-leave-request-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"request_date","type":"date","required":true,"labels":{"en":"Request Date","uk":"Дата запиту","de":"Antragsdatum","pl":"Data wniosku"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"en":"Employee ID","uk":"Номер працівника","de":"Personalnummer","pl":"Numer pracownika"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters","pl":"Stanowisko pracownika"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
                    {"name":"department","type":"text","required":true,"labels":{"en":"Department","uk":"Відділ","de":"Abteilung","pl":"Dział"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"en":"Supervisor\'s Full Name","uk":"Повне ім\'я керівника","de":"Vollständiger Name des Vorgesetzten","pl":"Imię i nazwisko przełożonego"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn","pl":"Data rozpoczęcia urlopu"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende","pl":"Data zakończenia urlopu"}},
                    {"name":"total_days_requested","type":"number","required":true,"labels":{"en":"Total Days Requested","uk":"Загальна кількість запитуваних днів","de":"Gesamtzahl der beantragten Tage","pl":"Całkowita liczba żądanych dni"}},
                    {"name":"reason_for_leave","type":"textarea","required":true,"labels":{"en":"Reason for Leave (e.g., FMLA, personal, medical)","uk":"Причина відпустки (напр., FMLA, особиста, медична)","de":"Grund des Urlaubs (z.B. FMLA, persönlich, medizinisch)","pl":"Powód urlopu (np. FMLA, osobisty, medyczny)"}},
                    {"name":"coverage_plan","type":"textarea","required":false,"labels":{"en":"Coverage Plan during absence (optional)","uk":"План заміщення під час відсутності (необов\'язково)","de":"Vertretungsplan während der Abwesenheit (optional)","pl":"Plan zastępstwa podczas nieobecności (opcjonalnie)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Unpaid Leave of Absence Request',
                        'description' => 'A formal request from an employee for unpaid leave of absence, to be submitted to their supervisor or HR in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>To:</strong> [[supervisor_full_name]]</p>
                                <p><strong>From:</strong> [[employee_full_name]] (Employee ID: [[employee_id]])</p>
                                <p><strong>Date:</strong> [[request_date]]</p>
                                <p><strong>Subject:</strong> Unpaid Leave of Absence Request</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear [[supervisor_full_name]],</p>
                                <p>I am writing to request an unpaid leave of absence for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>, totaling [[total_days_requested]] days.</p>
                                <p>The reason for this request is: [[reason_for_leave]]</p>
                                <p>During my absence, I plan for [[coverage_plan]] to cover my responsibilities.</p>
                                <p>Thank you for your consideration of this request.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на відпустку за свій рахунок (без збереження заробітної плати)',
                        'description' => 'Формальна заява працівника на відпустку без збереження заробітної плати, що подається керівнику або до відділу кадрів у США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Кому:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Від:</strong> [[employee_full_name]] (Табельний номер: [[employee_id]])</p>
                                <p><strong>Дата:</strong> [[request_date]]</p>
                                <p><strong>Тема:</strong> Заява на відпустку без збереження заробітної плати</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а [[supervisor_full_name]],</p>
                                <p>Цим подаю заяву на затвердження відпустки без збереження заробітної плати на період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>, загальною тривалістю [[total_days_requested]] днів.</p>
                                <p>Причина відпустки: [[reason_for_leave]]</p>
                                <p>Під час моєї відсутності: [[coverage_plan]]</p>
                                <p>Дякую за розгляд цього запиту.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf unbezahlten Urlaub',
                        'description' => 'Ein formeller Antrag eines Mitarbeiters auf unbezahlten Urlaub, der dem Vorgesetzten oder der Personalabteilung in den USA vorzulegen ist.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>An:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Von:</strong> [[employee_full_name]] (Personalnummer: [[employee_id]])</p>
                                <p><strong>Datum:</strong> [[request_date]]</p>
                                <p><strong>Betreff:</strong> Antrag auf unbezahlten Urlaub</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich die Genehmigung eines unbezahlten Urlaubs für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>, insgesamt [[total_days_requested]] Tage.</p>
                                <p>Der Grund für diesen Antrag ist: [[reason_for_leave]]</p>
                                <p>Während meiner Abwesenheit wird [[coverage_plan]] meine Aufgaben übernehmen.</p>
                                <p>Vielen Dank für die Berücksichtigung dieses Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o urlop bezpłatny',
                        'description' => 'Formalny wniosek pracownika o udzielenie urlopu bezpłatnego, do złożenia przełożonemu lub do działu HR w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Do:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Od:</strong> [[employee_full_name]] (Numer pracownika: [[employee_id]])</p>
                                <p><strong>Data:</strong> [[request_date]]</p>
                                <p><strong>Temat:</strong> Wniosek o urlop bezpłatny</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny/a Panie/Pani [[supervisor_full_name]],</p>
                                <p>Piszę, aby prosić o zatwierdzenie urlopu bezpłatnego na okres od <strong>[[leave_start_date]]</strong> do <strong>[[leave_end_date]]</strong> włącznie, co daje łącznie [[total_days_requested]] dni.</p>
                                <p>Powód wniosku: [[reason_for_leave]]</p>
                                <p>Podczas mojej nieobecności: [[coverage_plan]]</p>
                                <p>Dziękuję za rozważenie tego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление на учебный отпуск / Educational Leave Request ---
            [
                'slug' => 'educational-leave-request-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"request_date","type":"date","required":true,"labels":{"en":"Request Date","uk":"Дата запиту","de":"Antragsdatum","pl":"Data wniosku"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"en":"Employee ID","uk":"Номер працівника","de":"Personalnummer","pl":"Numer pracownika"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters","pl":"Stanowisko pracownika"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
                    {"name":"department","type":"text","required":true,"labels":{"en":"Department","uk":"Відділ","de":"Abteilung","pl":"Dział"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"en":"Supervisor\'s Full Name","uk":"Повне ім\'я керівника","de":"Vollständiger Name des Vorgesetzten","pl":"Imię i nazwisko przełożonego"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn","pl":"Data rozpoczęcia urlopu"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende","pl":"Data zakończenia urlopu"}},
                    {"name":"total_days_requested","type":"number","required":true,"labels":{"en":"Total Days Requested","uk":"Загальна кількість запитуваних днів","de":"Gesamtzahl der beantragten Tage","pl":"Całkowita liczba żądanych dni"}},
                    {"name":"program_name","type":"text","required":true,"labels":{"en":"Educational Program Name","uk":"Назва освітньої програми","de":"Name des Bildungsprogramms","pl":"Nazwa programu edukacyjnego"}},
                    {"name":"institution_name","type":"text","required":true,"labels":{"en":"Institution Name","uk":"Назва навчального закладу","de":"Name der Bildungseinrichtung","pl":"Nazwa instytucji"}},
                    {"name":"relevance_to_job","type":"textarea","required":false,"labels":{"en":"Relevance to Job/Company (optional)","uk":"Відповідність роботі/компанії (необов\'язково)","de":"Relevanz für Job/Unternehmen (optional)","pl":"Związek z pracą/firmą (opcjonalnie)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Educational Leave Request',
                        'description' => 'A formal request from an employee for educational leave, to be submitted to their supervisor or HR in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>To:</strong> [[supervisor_full_name]]</p>
                                <p><strong>From:</strong> [[employee_full_name]] (Employee ID: [[employee_id]])</p>
                                <p><strong>Date:</strong> [[request_date]]</p>
                                <p><strong>Subject:</strong> Educational Leave Request</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear [[supervisor_full_name]],</p>
                                <p>I am writing to request approval for educational leave for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>, totaling [[total_days_requested]] days.</p>
                                <p>I plan to attend the <strong>[[program_name]]</strong> program at <strong>[[institution_name]]</strong>.</p>
                                <p>This program is relevant to my role and company as: [[relevance_to_job]]</p>
                                <p>Thank you for your consideration of this request.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на навчальну відпустку',
                        'description' => 'Формальна заява працівника на навчальну відпустку, що подається керівнику або до відділу кадрів у США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Кому:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Від:</strong> [[employee_full_name]] (Табельний номер: [[employee_id]])</p>
                                <p><strong>Дата:</strong> [[request_date]]</p>
                                <p><strong>Тема:</strong> Заява на навчальну відпустку</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а [[supervisor_full_name]],</p>
                                <p>Цим подаю заяву на затвердження навчальної відпустки на період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>, загальною тривалістю [[total_days_requested]] днів.</p>
                                <p>Я планую відвідати програму <strong>[[program_name]]</strong> у <strong>[[institution_name]]</strong>.</p>
                                <p>Ця програма є актуальною для моєї ролі та компанії, оскільки: [[relevance_to_job]]</p>
                                <p>Дякую за розгляд цього запиту.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Bildungsurlaub',
                        'description' => 'Ein formeller Antrag eines Mitarbeiters auf Bildungsurlaub, der dem Vorgesetzten oder der Personalabteilung in den USA vorzulegen ist.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>An:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Von:</strong> [[employee_full_name]] (Personalnummer: [[employee_id]])</p>
                                <p><strong>Datum:</strong> [[request_date]]</p>
                                <p><strong>Betreff:</strong> Antrag auf Bildungsurlaub</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich die Genehmigung eines Bildungsurlaubs für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>, insgesamt [[total_days_requested]] Tage.</p>
                                <p>Ich plane, am Programm <strong>[[program_name]]</strong> bei <strong>[[institution_name]]</strong> teilzunehmen.</p>
                                <p>Dieses Programm ist für meine Rolle und das Unternehmen relevant, da: [[relevance_to_job]]</p>
                                <p>Vielen Dank für die Berücksichtigung dieses Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o urlop szkoleniowy',
                        'description' => 'Formalny wniosek pracownika o urlop szkoleniowy, do złożenia przełożonemu lub do działu HR w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Do:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Od:</strong> [[employee_full_name]] (Numer pracownika: [[employee_id]])</p>
                                <p><strong>Data:</strong> [[request_date]]</p>
                                <p><strong>Temat:</strong> Wniosek o urlop szkoleniowy</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny/a Panie/Pani [[supervisor_full_name]],</p>
                                <p>Piszę, aby prosić o zatwierdzenie urlopu szkoleniowego na okres od <strong>[[leave_start_date]]</strong> do <strong>[[leave_end_date]]</strong> włącznie, co daje łącznie [[total_days_requested]] dni.</p>
                                <p>Planuję wziąć udział w programie <strong>[[program_name]]</strong> w <strong>[[institution_name]]</strong>.</p>
                                <p>Program ten jest istotny dla mojej roli i firmy, ponieważ: [[relevance_to_job]]</p>
                                <p>Dziękuję za rozważenie tego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление на отпуск по уходу за ребенком / Parental Leave Request ---
            [
                'slug' => 'parental-leave-request-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"request_date","type":"date","required":true,"labels":{"en":"Request Date","uk":"Дата запиту","de":"Antragsdatum","pl":"Data wniosku"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"en":"Employee ID","uk":"Номер працівника","de":"Personalnummer","pl":"Numer pracownika"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters","pl":"Stanowisko pracownika"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
                    {"name":"department","type":"text","required":true,"labels":{"en":"Department","uk":"Відділ","de":"Abteilung","pl":"Dział"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"en":"Supervisor\'s Full Name","uk":"Повне ім\'я керівника","de":"Vollständiger Name des Vorgesetzten","pl":"Imię i nazwisko przełożonego"}},
                    {"name":"child_full_name","type":"text","required":true,"labels":{"en":"Child\'s Full Name","uk":"Повне ім\'я дитини","de":"Vollständiger Name des Kindes","pl":"Imię i nazwisko dziecka"}},
                    {"name":"child_dob","type":"date","required":true,"labels":{"en":"Child\'s Date of Birth","uk":"Дата народження дитини","de":"Geburtsdatum des Kindes","pl":"Data urodzenia dziecka"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn","pl":"Data rozpoczęcia urlopu"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende","pl":"Data zakończenia urlopu"}},
                    {"name":"total_days_requested","type":"number","required":true,"labels":{"en":"Total Days Requested","uk":"Загальна кількість запитуваних днів","de":"Gesamtzahl der beantragten Tage","pl":"Całkowita liczba żądanych dni"}},
                    {"name":"reason_for_leave","type":"textarea","required":true,"labels":{"en":"Reason for Leave (e.g., birth, adoption, foster care)","uk":"Причина відпустки (напр., народження, усиновлення, опіка)","de":"Grund des Urlaubs (z.B. Geburt, Adoption, Pflege)","pl":"Powód urlopu (np. urodzenie, adopcja, opieka zastępcza)"}},
                    {"name":"fmla_note","type":"textarea","required":false,"labels":{"en":"FMLA/State Leave Act Reference (optional)","uk":"Посилання на FMLA/Закон штату про відпустки (необов\'язково)","de":"FMLA/Landesurlaubsgesetz-Referenz (optional)","pl":"Odwołanie do FMLA/ustawy o urlopach stanowych (opcjonalnie)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Parental Leave Request',
                        'description' => 'A formal request from an employee for parental leave, often under FMLA, to be submitted to their supervisor or HR in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>To:</strong> [[supervisor_full_name]]</p>
                                <p><strong>From:</strong> [[employee_full_name]] (Employee ID: [[employee_id]])</p>
                                <p><strong>Date:</strong> [[request_date]]</p>
                                <p><strong>Subject:</strong> Parental Leave Request</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear [[supervisor_full_name]],</p>
                                <p>I am writing to request parental leave for the period from <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong>, totaling [[total_days_requested]] days, in connection with [[reason_for_leave]] of my child, [[child_full_name]], born on [[child_dob]].</p>
                                <p>[[fmla_note]]</p>
                                <p>Thank you for your consideration of this request.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на відпустку по догляду за дитиною',
                        'description' => 'Формальна заява працівника на відпустку по догляду за дитиною, часто згідно з FMLA, що подається керівнику або до відділу кадрів у США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Кому:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Від:</strong> [[employee_full_name]] (Табельний номер: [[employee_id]])</p>
                                <p><strong>Дата:</strong> [[request_date]]</p>
                                <p><strong>Тема:</strong> Заява на відпустку по догляду за дитиною</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а [[supervisor_full_name]],</p>
                                <p>Цим подаю заяву на відпустку по догляду за дитиною на період з <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong>, загальною тривалістю [[total_days_requested]] днів, у зв\'язку з [[reason_for_leave]] моєї дитини, [[child_full_name]], народженої [[child_dob]].</p>
                                <p>[[fmla_note]]</p>
                                <p>Дякую за розгляд цього запиту.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Antrag auf Elternzeit',
                        'description' => 'Ein formeller Antrag eines Mitarbeiters auf Elternzeit, oft gemäß FMLA, der dem Vorgesetzten oder der Personalabteilung in den USA vorzulegen ist.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>An:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Von:</strong> [[employee_full_name]] (Personalnummer: [[employee_id]])</p>
                                <p><strong>Datum:</strong> [[request_date]]</p>
                                <p><strong>Betreff:</strong> Antrag auf Elternzeit</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit beantrage ich Elternzeit für den Zeitraum vom <strong>[[leave_start_date]]</strong> bis einschließlich <strong>[[leave_end_date]]</strong>, insgesamt [[total_days_requested]] Tage, im Zusammenhang mit [[reason_for_leave]] meines Kindes, [[child_full_name]], geboren am [[child_dob]].</p>
                                <p>[[fmla_note]]</p>
                                <p>Vielen Dank für die Berücksichtigung dieses Antrags.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Wniosek o urlop rodzicielski',
                        'description' => 'Formalny wniosek pracownika o urlop rodzicielski, często na podstawie FMLA, do złożenia przełożonemu lub do działu HR w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>Do:</strong> [[supervisor_full_name]]</p>
                                <p><strong>Od:</strong> [[employee_full_name]] (Numer pracownika: [[employee_id]])</p>
                                <p><strong>Data:</strong> [[request_date]]</p>
                                <p><strong>Temat:</strong> Wniosek o urlop rodzicielski</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny/a Panie/Pani [[supervisor_full_name]],</p>
                                <p>Piszę, aby prosić o zatwierdzenie urlopu rodzicielskiego na okres od <strong>[[leave_start_date]]</strong> do <strong>[[leave_end_date]]</strong> włącznie, co daje łącznie [[total_days_requested]] dni, w związku z [[reason_for_leave]] mojego dziecka, [[child_full_name]], urodzonego [[child_dob]].</p>
                                <p>[[fmla_note]]</p>
                                <p>Dziękuję za rozważenie tego wniosku.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Приказ на отпуск / Leave Approval Form ---
            [
                'slug' => 'leave-approval-form-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"approval_date","type":"date","required":true,"labels":{"en":"Approval Date","uk":"Дата затвердження","de":"Genehmigungsdatum","pl":"Data zatwierdzenia"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_id","type":"text","required":true,"labels":{"en":"Employee ID","uk":"Номер працівника","de":"Personalnummer","pl":"Numer pracownika"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters","pl":"Stanowisko pracownika"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
                    {"name":"department","type":"text","required":true,"labels":{"en":"Department","uk":"Відділ","de":"Abteilung","pl":"Dział"}},
                    {"name":"leave_type","type":"text","required":true,"labels":{"en":"Leave Type (e.g., Paid, Unpaid, FMLA)","uk":"Тип відпустки (напр., Оплачувана, Без оплати, FMLA)","de":"Urlaubsart (z.B. bezahlt, unbezahlt, FMLA)","pl":"Rodzaj urlopu (np. płatny, bezpłatny, FMLA)"}},
                    {"name":"leave_start_date","type":"date","required":true,"labels":{"en":"Leave Start Date","uk":"Дата початку відпустки","de":"Urlaubsbeginn","pl":"Data rozpoczęcia urlopu"}},
                    {"name":"leave_end_date","type":"date","required":true,"labels":{"en":"Leave End Date","uk":"Дата закінчення відпустки","de":"Urlaubsende","pl":"Data zakończenia urlopu"}},
                    {"name":"total_days_approved","type":"number","required":true,"labels":{"en":"Total Days Approved","uk":"Загальна кількість затверджених днів","de":"Gesamtzahl der genehmigten Tage","pl":"Całkowita liczba zatwierdzonych dni"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"en":"Supervisor\'s Full Name","uk":"Повне ім\'я керівника","de":"Vollständiger Name des Vorgesetzten","pl":"Imię i nazwisko przełożonego"}},
                    {"name":"hr_full_name","type":"text","required":false,"labels":{"en":"HR Representative Full Name (optional)","uk":"Повне ім\'я представника HR (необов\'язково)","de":"Vollständiger Name des HR-Vertreters (optional)","pl":"Imię i nazwisko przedstawiciela HR (opcjonalnie)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Leave Approval Form',
                        'description' => 'An internal HR document for approving an employee\'s leave request in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 14px; line-height: 1.5;">
                                <p><strong>[[company_name]]</strong></p>
                                <p><strong>Leave Approval Form</strong></p>
                                <p>Date: [[approval_date]]</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>Employee Name:</strong> [[employee_full_name]]</p>
                                <p><strong>Employee ID:</strong> [[employee_id]]</p>
                                <p><strong>Position:</strong> [[employee_position]]</p>
                                <p><strong>Department:</strong> [[department]]</p>
                                <br/>
                                <p><strong>Leave Type:</strong> [[leave_type]]</p>
                                <p><strong>Leave Period:</strong> From <strong>[[leave_start_date]]</strong> to <strong>[[leave_end_date]]</strong></p>
                                <p><strong>Total Days Approved:</strong> [[total_days_approved]]</p>
                                <br/>
                                <p>This leave request has been reviewed and approved.</p>
                                <br/>
                                <p>Approved by:</p>
                                <p>Supervisor: [[supervisor_full_name]]</p>
                                <p>HR Representative: [[hr_full_name]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'uk' => [
                        'title' => 'Форма затвердження відпустки',
                        'description' => 'Внутрішній HR-документ для затвердження запиту працівника на відпустку в США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 14px; line-height: 1.5;">
                                <p><strong>[[company_name]]</strong></p>
                                <p><strong>Форма затвердження відпустки</strong></p>
                                <p>Дата: [[approval_date]]</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>ПІБ працівника:</strong> [[employee_full_name]]</p>
                                <p><strong>Табельний номер:</strong> [[employee_id]]</p>
                                <p><strong>Посада:</strong> [[employee_position]]</p>
                                <p><strong>Відділ:</strong> [[department]]</p>
                                <br/>
                                <p><strong>Тип відпустки:</strong> [[leave_type]]</p>
                                <p><strong>Період відпустки:</strong> З <strong>[[leave_start_date]]</strong> по <strong>[[leave_end_date]]</strong></p>
                                <p><strong>Загальна кількість затверджених днів:</strong> [[total_days_approved]]</p>
                                <br/>
                                <p>Цей запит на відпустку розглянуто та затверджено.</p>
                                <br/>
                                <p>Затверджено:</p>
                                <p>Керівник: [[supervisor_full_name]]</p>
                                <p>Представник HR: [[hr_full_name]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'de' => [
                        'title' => 'Urlaubsgenehmigungsformular',
                        'description' => 'Ein internes HR-Dokument zur Genehmigung eines Urlaubsantrags eines Mitarbeiters in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 14px; line-height: 1.5;">
                                <p><strong>[[company_name]]</strong></p>
                                <p><strong>Urlaubsgenehmigungsformular</strong></p>
                                <p>Datum: [[approval_date]]</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>Name des Mitarbeiters:</strong> [[employee_full_name]]</p>
                                <p><strong>Personalnummer:</strong> [[employee_id]]</p>
                                <p><strong>Position:</strong> [[employee_position]]</p>
                                <p><strong>Abteilung:</strong> [[department]]</p>
                                <br/>
                                <p><strong>Urlaubsart:</strong> [[leave_type]]</p>
                                <p><strong>Urlaubszeitraum:</strong> Vom <strong>[[leave_start_date]]</strong> bis <strong>[[leave_end_date]]</strong></p>
                                <p><strong>Gesamtzahl der genehmigten Tage:</strong> [[total_days_approved]]</p>
                                <br/>
                                <p>Dieser Urlaubsantrag wurde geprüft und genehmigt.</p>
                                <br/>
                                <p>Genehmigt durch:</p>
                                <p>Vorgesetzte/r: [[supervisor_full_name]]</p>
                                <p>HR-Vertreter/in: [[hr_full_name]]</p>
                            </div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Formularz zatwierdzenia urlopu',
                        'description' => 'Wewnętrzny dokument HR do zatwierdzania wniosku pracownika o urlop w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 14px; line-height: 1.5;">
                                <p><strong>[[company_name]]</strong></p>
                                <p><strong>Formularz zatwierdzenia urlopu</strong></p>
                                <p>Data: [[approval_date]]</p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p><strong>Imię i nazwisko pracownika:</strong> [[employee_full_name]]</p>
                                <p><strong>Numer pracownika:</strong> [[employee_id]]</p>
                                <p><strong>Stanowisko:</strong> [[employee_position]]</p>
                                <p><strong>Dział:</strong> [[department]]</p>
                                <br/>
                                <p><strong>Rodzaj urlopu:</strong> [[leave_type]]</p>
                                <p><strong>Okres urlopu:</strong> Od <strong>[[leave_start_date]]</strong> do <strong>[[leave_end_date]]</strong></p>
                                <p><strong>Całkowita liczba zatwierdzonych dni:</strong> [[total_days_approved]]</p>
                                <br/>
                                <p>Ten wniosek o urlop został rozpatrzony i zatwierdzony.</p>
                                <br/>
                                <p>Zatwierdzone przez:</p>
                                <p>Przełożony: [[supervisor_full_name]]</p>
                                <p>Przedstawiciel HR: [[hr_full_name]]</p>
                            </div>',
                        'footer_html' => ''
                    ]
                ]
            ],

            // --- Заявление на увольнение по собственному желанию / Resignation Letter ---
            [
                'slug' => 'resignation-letter-us',
                'fields' => '[
                    {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
                    {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
                    {"name":"letter_date","type":"date","required":true,"labels":{"en":"Letter Date","uk":"Дата листа","de":"Datum des Schreibens","pl":"Data listu"}},
                    {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
                    {"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters","pl":"Stanowisko pracownika"}},
                    {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
                    {"name":"supervisor_full_name","type":"text","required":true,"labels":{"en":"Supervisor\'s Full Name","uk":"Повне ім\'я керівника","de":"Vollständiger Name des Vorgesetzten","pl":"Imię i nazwisko przełożonego"}},
                    {"name":"last_day_of_employment","type":"date","required":true,"labels":{"en":"Last Day of Employment","uk":"Останній день роботи","de":"Letzter Arbeitstag","pl":"Ostatni dzień zatrudnienia"}},
                    {"name":"reason_for_resignation","type":"textarea","required":false,"labels":{"en":"Reason for Resignation (optional)","uk":"Причина звільнення (необов\'язково)","de":"Grund der Kündigung (optional)","pl":"Powód rezygnacji (opcjonalnie)"}},
                    {"name":"offer_to_assist","type":"textarea","required":false,"labels":{"en":"Offer to assist with transition (optional)","uk":"Пропозиція допомоги у перехідний період (необов\'язково)","de":"Angebot zur Unterstützung beim Übergang (optional)","pl":"Oferta pomocy w okresie przejściowym (opcjonalnie)"}}
                ]',
                'translations' => [
                    'en' => [
                        'title' => 'Resignation Letter',
                        'description' => 'A formal letter from an employee to their employer stating their intention to resign, common in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>[[employee_full_name]]</strong></p>
                                <p>[[employee_position]]</p>
                                <p>[[city]], [[state]]</p>
                                <p>[[letter_date]]</p>
                                <br/>
                                <p><strong>[[supervisor_full_name]]</strong></p>
                                <p>[[company_name]]</p>
                                <br/>
                                <p><strong>Subject: Resignation</strong></p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Dear [[supervisor_full_name]],</p>
                                <p>Please accept this letter as formal notification that I am resigning from my position as [[employee_position]] at [[company_name]], effective <strong>[[last_day_of_employment]]</strong>.</p>
                                <p>My reason for resigning is: [[reason_for_resignation]]</p>
                                <p>[[offer_to_assist]]</p>
                                <p>I wish you and [[company_name]] all the best.</p>
                                <br/>
                                <p>Sincerely,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'uk' => [
                        'title' => 'Заява на звільнення за власним бажанням',
                        'description' => 'Формальний лист працівника роботодавцю про намір звільнитися, поширений у США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>[[employee_full_name]]</strong></p>
                                <p>[[employee_position]]</p>
                                <p>[[city]], [[state]]</p>
                                <p>[[letter_date]]</p>
                                <br/>
                                <p><strong>[[supervisor_full_name]]</strong></p>
                                <p>[[company_name]]</p>
                                <br/>
                                <p><strong>Тема: Звільнення</strong></p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Шановний/а [[supervisor_full_name]],</p>
                                <p>Прошу вважати цей лист офіційним повідомленням про моє звільнення з посади [[employee_position]] у [[company_name]], починаючи з <strong>[[last_day_of_employment]]</strong>.</p>
                                <p>Моя причина звільнення: [[reason_for_resignation]]</p>
                                <p>[[offer_to_assist]]</p>
                                <p>Бажаю Вам та [[company_name]] всього найкращого.</p>
                                <br/>
                                <p>З повагою,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'de' => [
                        'title' => 'Kündigungsschreiben (Eigenkündigung)',
                        'description' => 'Ein formelles Schreiben eines Mitarbeiters an seinen Arbeitgeber, in dem er seine Absicht zur Kündigung erklärt, üblich in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>[[employee_full_name]]</strong></p>
                                <p>[[employee_position]]</p>
                                <p>[[city]], [[state]]</p>
                                <p>[[letter_date]]</p>
                                <br/>
                                <p><strong>[[supervisor_full_name]]</strong></p>
                                <p>[[company_name]]</p>
                                <br/>
                                <p><strong>Betreff: Kündigung</strong></p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Sehr geehrte/r Herr/Frau [[supervisor_full_name]],</p>
                                <p>hiermit reiche ich meine Kündigung als [[employee_position]] bei [[company_name]] ein, mit Wirkung zum <strong>[[last_day_of_employment]]</strong>.</p>
                                <p>Mein Kündigungsgrund ist: [[reason_for_resignation]]</p>
                                <p>[[offer_to_assist]]</p>
                                <p>Ich wünsche Ihnen und [[company_name]] alles Gute.</p>
                                <br/>
                                <p>Mit freundlichen Grüßen,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ],
                    'pl' => [
                        'title' => 'Rezygnacja z pracy (wypowiedzenie umowy)',
                        'description' => 'Formalne pismo pracownika do pracodawcy informujące o zamiarze rezygnacji z pracy, powszechne w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;">
                                <p><strong>[[employee_full_name]]</strong></p>
                                <p>[[employee_position]]</p>
                                <p>[[city]], [[state]]</p>
                                <p>[[letter_date]]</p>
                                <br/>
                                <p><strong>[[supervisor_full_name]]</strong></p>
                                <p>[[company_name]]</p>
                                <br/>
                                <p><strong>Temat: Rezygnacja</strong></p>
                                <br/>
                            </div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;">
                                <p>Szanowny/a Panie/Pani [[supervisor_full_name]],</p>
                                <p>Proszę przyjąć niniejsze pismo jako formalne zawiadomienie o mojej rezygnacji ze stanowiska [[employee_position]] w [[company_name]], ze skutkiem od <strong>[[last_day_of_employment]]</strong>.</p>
                                <p>Moja przyczyna rezygnacji to: [[reason_for_resignation]]</p>
                                <p>[[offer_to_assist]]</p>
                                <p>Życzę Panu/Pani i [[company_name]] wszystkiego najlepszego.</p>
                                <br/>
                                <p>Z poważaniem,</p>
                            </div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;">
                                <p>___________________</p>
                                <p>([[employee_full_name]])</p>
                            </div>'
                    ]
                ]
            ],

            // --- Заявление на увольнение по соглашению сторон / Mutual Separation Agreement ---
            [
                'slug' => 'mutual-separation-agreement-us',
                'fields' => '[
            {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
            {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
            {"name":"agreement_date","type":"date","required":true,"labels":{"en":"Agreement Date","uk":"Дата угоди","de":"Vereinbarungsdatum","pl":"Data umowy"}},
            {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
            {"name":"company_address","type":"text","required":true,"labels":{"en":"Company Address","uk":"Адреса компанії","de":"Adresse der Firma","pl":"Adres firmy"}},
            {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
            {"name":"employee_address","type":"text","required":true,"labels":{"en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters","pl":"Adres pracownika"}},
            {"name":"employee_job_title","type":"text","required":true,"labels":{"en":"Employee Job Title","uk":"Назва посади працівника","de":"Stellenbezeichnung des Mitarbeiters","pl":"Stanowisko pracownika"}},
            {"name":"last_day_of_employment","type":"date","required":true,"labels":{"en":"Last Day of Employment","uk":"Останній день роботи","de":"Letzter Arbeitstag","pl":"Ostatni dzień zatrudnienia"}},
            {"name":"severance_details","type":"textarea","required":false,"labels":{"en":"Severance Package Details (optional)","uk":"Деталі вихідної допомоги (необов\'язково)","de":"Details zur Abfindung (optional)","pl":"Szczegóły pakietu odprawowego (opcjonalnie)"}},
            {"name":"mutual_release_of_claims","type":"textarea","required":true,"labels":{"en":"Mutual Release of Claims","uk":"Взаємна відмова від претензій","de":"Gegenseitiger Verzicht auf Ansprüche","pl":"Wzajemne zrzeczenie się roszczeń"}},
            {"name":"confidentiality_clause","type":"textarea","required":false,"labels":{"en":"Confidentiality Clause (optional)","uk":"Пункт про конфіденційність (необов\'язково)","de":"Vertraulichkeitsklausel (optional)","pl":"Klauzula poufności (opcjonalnie)"}},
            {"name":"non_disparagement_clause","type":"textarea","required":false,"labels":{"en":"Non-Disparagement Clause (optional)","uk":"Пункт про нерозголошення негативної інформації (необов\'язково)","de":"Nichtverunglimpfungsklausel (optional)","pl":"Klauzula o nieoczernianiu (opcjonalnie)"}},
            {"name":"governing_law_state","type":"text","required":true,"labels":{"en":"Governing Law State","uk":"Штат, що регулює право","de":"Anwendbares Recht (Bundesstaat)","pl":"Stan prawa właściwego"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Mutual Separation Agreement',
                        'description' => 'A legally binding agreement between an employer and employee to mutually terminate employment, outlining terms such as severance, release of claims, and confidentiality, common in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Mutual Separation Agreement</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>Concluded in [[city]], [[state]]</p></td><td width="50%" style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>This Mutual Separation Agreement ("Agreement") is made and entered into by and between:</p><p><strong>Employer:</strong> [[company_name]]<br>[[company_address]]</p><p>and</p><p><strong>Employee:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Position: [[employee_job_title]]</p><br/><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Termination of Employment</h2><p>The Employer and Employee mutually agree to terminate the Employee\'s employment, effective <strong>[[last_day_of_employment]]</strong>.</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Severance Package</h2><p>[[severance_details]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Mutual Release of Claims</h2><p>[[mutual_release_of_claims]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Confidentiality and Non-Disparagement</h2><p>[[confidentiality_clause]]</p><p>[[non_disparagement_clause]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">5. Governing Law</h2><p>This Agreement shall be governed by and construed in accordance with the laws of the State of [[governing_law_state]].</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Employer Signature</p></td><td width="50%"><p>___________________<br>Employee Signature</p></td></tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про взаємне розірвання трудового договору',
                        'description' => 'Юридично обов\'язкова угода між роботодавцем та працівником про взаємне розірвання трудових відносин, що визначає умови, такі як вихідна допомога, відмова від претензій та конфіденційність, поширена в США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Угода про взаємне розірвання трудового договору</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>Укладено в [[city]], [[state]]</p></td><td width="50%" style="text-align: right;"><p>[[agreement_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Ця Угода про взаємне розірвання («Угода») укладена між:</p><p><strong>Роботодавець:</strong> [[company_name]]<br>[[company_address]]</p><p>та</p><p><strong>Працівник:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Посада: [[employee_job_title]]</p><br/><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Припинення трудових відносин</h2><p>Роботодавець та Працівник взаємно погоджуються розірвати трудові відносини Працівника, починаючи з <strong>[[last_day_of_employment]]</strong>.</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Вихідна допомога</h2><p>[[severance_details]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Взаємна відмова від претензій</h2><p>[[mutual_release_of_claims]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Конфіденційність та нерозголошення негативної інформації</h2><p>[[confidentiality_clause]]</p><p>[[non_disparagement_clause]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">5. Застосовне право</h2><p>Ця Угода регулюється та тлумачиться відповідно до законів штату [[governing_law_state]].</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Підпис роботодавця</p></td><td width="50%"><p>___________________<br>Підпис працівника</p></td></tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Einvernehmliche Aufhebungsvereinbarung',
                        'description' => 'Eine rechtsverbindliche Vereinbarung zwischen einem Arbeitgeber und einem Arbeitnehmer zur einvernehmlichen Beendigung des Arbeitsverhältnisses, die Bedingungen wie Abfindung, Verzicht auf Ansprüche und Vertraulichkeit festlegt, üblich in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Einvernehmliche Aufhebungsvereinbarung</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>Abgeschlossen in [[city]], [[state]]</p></td><td width="50%" style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Diese Einvernehmliche Aufhebungsvereinbarung ("Vereinbarung") wird zwischen den folgenden Parteien geschlossen:</p><p><strong>Arbeitgeber:</strong> [[company_name]]<br>[[company_address]]</p><p>und</p><p><strong>Arbeitnehmer:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Position: [[employee_job_title]]</p><br/><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Beendigung des Arbeitsverhältnisses</h2><p>Arbeitgeber und Arbeitnehmer vereinbaren einvernehmlich, das Arbeitsverhältnis des Arbeitnehmers mit Wirkung zum <strong>[[last_day_of_employment]]</strong> zu beenden.</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Abfindungspaket</h2><p>[[severance_details]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Gegenseitiger Verzicht auf Ansprüche</h2><p>[[mutual_release_of_claims]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Vertraulichkeit und Nichtverunglimpfung</h2><p>[[confidentiality_clause]]</p><p>[[non_disparagement_clause]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">5. Anwendbares Recht</h2><p>Diese Vereinbarung unterliegt den Gesetzen des Staates [[governing_law_state]] und wird entsprechend ausgelegt.</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Unterschrift des Arbeitgebers</p></td><td width="50%"><p>___________________<br>Unterschrift des Arbeitnehmers</p></td></tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Porozumienie o rozwiązaniu umowy o pracę za porozumieniem stron',
                        'description' => 'Prawnie wiążąca umowa między pracodawcą a pracownikiem o wzajemnym rozwiązaniu stosunku pracy, określająca warunki takie jak odprawa, zrzeczenie się roszczeń i poufność, powszechna w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Porozumienie o rozwiązaniu umowy o pracę</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>Zawarte w [[city]], [[state]]</p></td><td width="50%" style="text-align: right;"><p>dnia [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Niniejsze Porozumienie o Rozwiązaniu Umowy o Pracę ("Umowa") zostaje zawarte pomiędzy:</p><p><strong>Pracodawca:</strong> [[company_name]]<br>[[company_address]]</p><p>oraz</p><p><strong>Pracownik:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Stanowisko: [[employee_job_title]]</p><br/><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Rozwiązanie stosunku pracy</h2><p>Pracodawca i Pracownik wzajemnie zgadzają się rozwiązać stosunek pracy Pracownika, ze skutkiem od <strong>[[last_day_of_employment]]</strong>.</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Pakiet odprawowy</h2><p>[[severance_details]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Wzajemne zrzeczenie się roszczeń</h2><p>[[mutual_release_of_claims]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Poufność i zakaz oczerniania</h2><p>[[confidentiality_clause]]</p><p>[[non_disparagement_clause]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">5. Prawo właściwe</h2><p>Niniejsza Umowa podlega i będzie interpretowana zgodnie z prawem stanu [[governing_law_state]].</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Podpis Pracodawcy</p></td><td width="50%"><p>___________________<br>Podpis Pracownika</p></td></tr></table></div>'
                    ]
                ]
            ],

            // --- Соглашение о расторжении трудового договора / Termination of Employment Agreement ---
            [
                'slug' => 'termination-employment-agreement-us',
                'fields' => '[
            {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
            {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
            {"name":"agreement_date","type":"date","required":true,"labels":{"en":"Agreement Date","uk":"Дата угоди","de":"Vereinbarungsdatum","pl":"Data umowy"}},
            {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
            {"name":"company_address","type":"text","required":true,"labels":{"en":"Company Address","uk":"Адреса компанії","de":"Adresse der Firma","pl":"Adres firmy"}},
            {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
            {"name":"employee_address","type":"text","required":true,"labels":{"en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters","pl":"Adres pracownika"}},
            {"name":"employee_job_title","type":"text","required":true,"labels":{"en":"Employee Job Title","uk":"Назва посади працівника","de":"Stellenbezeichnung des Mitarbeiters","pl":"Stanowisko pracownika"}},
            {"name":"last_day_of_employment","type":"date","required":true,"labels":{"en":"Last Day of Employment","uk":"Останній день роботи","de":"Letzter Arbeitstag","pl":"Ostatni dzień zatrudnienia"}},
            {"name":"reason_for_termination","type":"textarea","required":true,"labels":{"en":"Reason for Termination","uk":"Причина розірвання","de":"Grund der Kündigung","pl":"Powód rozwiązania"}},
            {"name":"final_pay_details","type":"textarea","required":false,"labels":{"en":"Final Pay and Benefits Details (optional)","uk":"Деталі остаточної оплати та переваг (необов\'язково)","de":"Details zur Endabrechnung und Leistungen (optional)","pl":"Szczegóły końcowej płatności i świadczeń (opcjonalnie)"}},
            {"name":"return_of_property","type":"textarea","required":false,"labels":{"en":"Return of Company Property (optional)","uk":"Повернення майна компанії (необов\'язково)","de":"Rückgabe von Firmeneigentum (optional)","pl":"Zwrot mienia firmy (opcjonalnie)"}},
            {"name":"governing_law_state","type":"text","required":true,"labels":{"en":"Governing Law State","uk":"Штат, що регулює право","de":"Anwendbares Recht (Bundesstaat)","pl":"Stan prawa właściwego"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Termination of Employment Agreement',
                        'description' => 'A formal agreement outlining the terms and conditions of an employee\'s termination from employment, common in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Termination of Employment Agreement</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>Concluded in [[city]], [[state]]</p></td><td width="50%" style="text-align: right;"><p>on [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>This Termination of Employment Agreement ("Agreement") is made and entered into by and between:</p><p><strong>Company:</strong> [[company_name]]<br>[[company_address]]</p><p>and</p><p><strong>Employee:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Position: [[employee_job_title]]</p><br/><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Termination Date and Reason</h2><p>The Employee\'s employment with the Company is terminated, effective <strong>[[last_day_of_employment]]</strong>, due to: [[reason_for_termination]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Final Pay and Benefits</h2><p>[[final_pay_details]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Return of Company Property</h2><p>[[return_of_property]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Governing Law</h2><p>This Agreement shall be governed by and construed in accordance with the laws of the State of [[governing_law_state]].</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Company Representative Signature</p></td><td width="50%"><p>___________________<br>Employee Signature</p></td></tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Угода про розірвання трудового договору',
                        'description' => 'Формальна угода, що визначає умови та положення про розірвання трудових відносин працівника, поширена в США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Угода про розірвання трудового договору</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>Укладено в [[city]], [[state]]</p></td><td width="50%" style="text-align: right;"><p>[[agreement_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Ця Угода про розірвання трудового договору («Угода») укладена між:</p><p><strong>Компанія:</strong> [[company_name]]<br>[[company_address]]</p><p>та</p><p><strong>Працівник:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Посада: [[employee_job_title]]</p><br/><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Дата та причина розірвання</h2><p>Трудові відносини Працівника з Компанією припиняються, починаючи з <strong>[[last_day_of_employment]]</strong>, у зв\'язку з: [[reason_for_termination]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Остаточна оплата та переваги</h2><p>[[final_pay_details]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Повернення майна компанії</h2><p>[[return_of_property]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Застосовне право</h2><p>Ця Угода регулюється та тлумачиться відповідно до законів штату [[governing_law_state]].</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Підпис представника компанії</p></td><td width="50%"><p>___________________<br>Підпис працівника</p></td></tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Vereinbarung zur Beendigung des Arbeitsverhältnisses',
                        'description' => 'Eine formelle Vereinbarung, die die Bedingungen und Konditionen der Beendigung des Arbeitsverhältnisses eines Mitarbeiters festlegt, üblich in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Vereinbarung zur Beendigung des Arbeitsverhältnisses</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>Abgeschlossen in [[city]], [[state]]</p></td><td width="50%" style="text-align: right;"><p>am [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Diese Vereinbarung zur Beendigung des Arbeitsverhältnisses ("Vereinbarung") wird zwischen den folgenden Parteien geschlossen:</p><p><strong>Unternehmen:</strong> [[company_name]]<br>[[company_address]]</p><p>und</p><p><strong>Arbeitnehmer:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Position: [[employee_job_title]]</p><br/><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Beendigungsdatum und Grund</h2><p>Das Arbeitsverhältnis des Arbeitnehmers mit dem Unternehmen wird mit Wirkung zum <strong>[[last_day_of_employment]]</strong> beendet, aufgrund von: [[reason_for_termination]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Endabrechnung und Leistungen</h2><p>[[final_pay_details]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Rückgabe von Firmeneigentum</h2><p>[[return_of_property]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Anwendbares Recht</h2><p>Diese Vereinbarung unterliegt den Gesetzen des Staates [[governing_law_state]] und wird entsprechend ausgelegt.</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Unterschrift des Unternehmensvertreters</p></td><td width="50%"><p>___________________<br>Unterschrift des Arbeitnehmers</p></td></tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Porozumienie o rozwiązaniu umowy o pracę',
                        'description' => 'Formalna umowa określająca warunki rozwiązania umowy o pracę pracownika, powszechna w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Porozumienie o rozwiązaniu umowy o pracę</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>Zawarta w [[city]], [[state]]</p></td><td width="50%" style="text-align: right;"><p>dnia [[agreement_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Niniejsze Porozumienie o Rozwiązaniu Umowy o Pracę ("Umowa") zostaje zawarte pomiędzy:</p><p><strong>Firma:</strong> [[company_name]]<br>[[company_address]]</p><p>oraz</p><p><strong>Pracownik:</strong> [[employee_full_name]]<br>[[employee_address]]<br>Stanowisko: [[employee_job_title]]</p><br/><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">1. Data i powód rozwiązania</h2><p>Stosunek pracy Pracownika z Firmą zostaje rozwiązany ze skutkiem od <strong>[[last_day_of_employment]]</strong>, z powodu: [[reason_for_termination]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">2. Końcowa płatność i świadczenia</h2><p>[[final_pay_details]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">3. Zwrot mienia firmy</h2><p>[[return_of_property]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">4. Prawo właściwe</h2><p>Niniejsza Umowa podlega i będzie interpretowana zgodnie z prawem stanu [[governing_law_state]].</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Podpis przedstawiciela firmy</p></td><td width="50%"><p>___________________<br>Podpis Pracownika</p></td></tr></table></div>'
                    ]
                ]
            ],

            // --- Приказ об увольнении / Termination Letter ---
            [
                'slug' => 'termination-letter-us',
                'fields' => '[
            {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
            {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
            {"name":"letter_date","type":"date","required":true,"labels":{"en":"Date","uk":"Дата","de":"Datum","pl":"Data"}},
            {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
            {"name":"employee_address","type":"text","required":true,"labels":{"en":"Employee Address","uk":"Адреса працівника","de":"Adresse des Mitarbeiters","pl":"Adres pracownika"}},
            {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
            {"name":"company_address","type":"text","required":true,"labels":{"en":"Company Address","uk":"Адреса компанії","de":"Adresse der Firma","pl":"Adres firmy"}},
            {"name":"job_title","type":"text","required":true,"labels":{"en":"Job Title","uk":"Назва посади","de":"Stellenbezeichnung","pl":"Stanowisko"}},
            {"name":"last_day_of_employment","type":"date","required":true,"labels":{"en":"Last Day of Employment","uk":"Останній день роботи","de":"Letzter Arbeitstag","pl":"Ostatni dzień zatrudnienia"}},
            {"name":"reason_for_termination","type":"textarea","required":true,"labels":{"en":"Reason for Termination","uk":"Причина розірвання","de":"Grund der Kündigung","pl":"Powód rozwiązania"}},
            {"name":"final_pay_details","type":"textarea","required":false,"labels":{"en":"Final Pay and Benefits Details (optional)","uk":"Деталі остаточної оплати та переваг (необов\'язково)","de":"Details zur Endabrechnung und Leistungen (optional)","pl":"Szczegóły końcowej płatności i świadczeń (opcjonalnie)"}},
            {"name":"return_of_property_instructions","type":"textarea","required":false,"labels":{"en":"Instructions for Return of Company Property (optional)","uk":"Інструкції щодо повернення майна компанії (необов\'язково)","de":"Anweisungen zur Rückgabe von Firmeneigentum (optional)","pl":"Instrukcje dotyczące zwrotu mienia firmy (opcjonalnie)"}},
            {"name":"hr_full_name","type":"text","required":true,"labels":{"en":"HR Representative Full Name","uk":"Повне ім\'я представника HR","de":"Vollständiger Name des HR-Vertreters","pl":"Imię i nazwisko przedstawiciela HR"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Termination Letter',
                        'description' => 'A formal letter from an employer to an employee confirming the termination of employment, common in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;"><p>[[company_name]]<br>[[company_address]]</p><br/><p>[[city]], [[state]] [[letter_date]]</p><br/><p><strong>[[employee_full_name]]</strong><br>[[employee_address]]</p><br/><h1 style="font-size: 16px; font-weight: bold;">Subject: Termination of Employment</h1><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Dear [[employee_full_name]],</p><p>This letter serves to confirm the termination of your employment with [[company_name]], effective <strong>[[last_day_of_employment]]</strong>.</p><p>The reason for this termination is: [[reason_for_termination]]</p><p>Your final pay and benefits will be processed as follows: [[final_pay_details]]</p><p>Please ensure all company property is returned by [[last_day_of_employment]] as per: [[return_of_property_instructions]]</p><p>We wish you all the best in your future endeavors.</p><br/><p>Sincerely,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>[[hr_full_name]]<br>HR Department</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Наказ про звільнення',
                        'description' => 'Формальний лист від роботодавця працівнику, що підтверджує розірвання трудових відносин, поширений у США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;"><p>[[company_name]]<br>[[company_address]]</p><br/><p>[[city]], [[state]] [[letter_date]]</p><br/><p><strong>[[employee_full_name]]</strong><br>[[employee_address]]</p><br/><h1 style="font-size: 16px; font-weight: bold;">Тема: Розірвання трудового договору</h1><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Шановний/а [[employee_full_name]],</p><p>Цим листом підтверджується розірвання ваших трудових відносин з [[company_name]], починаючи з <strong>[[last_day_of_employment]]</strong>.</p><p>Причина цього розірвання: [[reason_for_termination]]</p><p>Ваша остаточна оплата та переваги будуть оброблені наступним чином: [[final_pay_details]]</p><p>Будь ласка, переконайтеся, що все майно компанії повернено до [[last_day_of_employment]] відповідно до: [[return_of_property_instructions]]</p><p>Бажаємо вам успіхів у майбутніх починаннях.</p><br/><p>З повагою,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>[[hr_full_name]]<br>Відділ кадрів</p></div>'
                    ],
                    'de' => [
                        'title' => 'Kündigungsschreiben',
                        'description' => 'Ein formelles Schreiben eines Arbeitgebers an einen Arbeitnehmer, das die Beendigung des Arbeitsverhältnisses bestätigt, üblich in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;"><p>[[company_name]]<br>[[company_address]]</p><br/><p>[[city]], [[state]] [[letter_date]]</p><br/><p><strong>[[employee_full_name]]</strong><br>[[employee_address]]</p><br/><h1 style="font-size: 16px; font-weight: bold;">Betreff: Beendigung des Arbeitsverhältnisses</h1><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Sehr geehrte/r Herr/Frau [[employee_full_name]],</p><p>dieses Schreiben bestätigt die Beendigung Ihres Arbeitsverhältnisses mit [[company_name]] mit Wirkung zum <strong>[[last_day_of_employment]]</strong>.</p><p>Der Grund für diese Beendigung ist: [[reason_for_termination]]</p><p>Ihre Endabrechnung und Leistungen werden wie folgt bearbeitet: [[final_pay_details]]</p><p>Bitte stellen Sie sicher, dass das gesamte Firmeneigentum bis zum [[last_day_of_employment]] gemäß: [[return_of_property_instructions]] zurückgegeben wird.</p><p>Wir wünschen Ihnen alles Gute für Ihre zukünftigen Bemühungen.</p><br/><p>Mit freundlichen Grüßen,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>[[hr_full_name]]<br>Personalabteilung</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Pismo o rozwiązaniu umowy o pracę',
                        'description' => 'Formalne pismo od pracodawcy do pracownika potwierdzające rozwiązanie stosunku pracy, powszechne w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;"><p>[[company_name]]<br>[[company_address]]</p><br/><p>[[city]], [[state]] [[letter_date]]</p><br/><p><strong>[[employee_full_name]]</strong><br>[[employee_address]]</p><br/><h1 style="font-size: 16px; font-weight: bold;">Temat: Rozwiązanie umowy o pracę</h1><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Szanowny/a Panie/Pani [[employee_full_name]],</p><p>Niniejsze pismo potwierdza rozwiązanie Pańskiego/Pani zatrudnienia w [[company_name]], ze skutkiem od <strong>[[last_day_of_employment]]</strong>.</p><p>Powodem rozwiązania jest: [[reason_for_termination]]</p><p>Pańska/Pani końcowa płatność i świadczenia zostaną przetworzone w następujący sposób: [[final_pay_details]]</p><p>Proszę upewnić się, że całe mienie firmy zostanie zwrócone do [[last_day_of_employment]] zgodnie z: [[return_of_property_instructions]]</p><p>Życzymy Panu/Pani wszystkiego najlepszego w przyszłych przedsięwzięciach.</p><br/><p>Z poważaniem,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>[[hr_full_name]]<br>Dział HR</p></div>'
                    ]
                ]
            ],

            // --- Рекомендательное письмо / Letter of Recommendation ---
            [
                'slug' => 'letter-of-recommendation-us',
                'fields' => '[
            {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
            {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
            {"name":"letter_date","type":"date","required":true,"labels":{"en":"Date","uk":"Дата","de":"Datum","pl":"Data"}},
            {"name":"recommender_full_name","type":"text","required":true,"labels":{"en":"Your Full Name (Recommender)","uk":"Ваше повне ім\'я (рекомендант)","de":"Ihr vollständiger Name (Empfehlender)","pl":"Twoje pełne imię i nazwisko (rekomendujący)"}},
            {"name":"recommender_title","type":"text","required":true,"labels":{"en":"Your Title","uk":"Ваша посада","de":"Ihre Position","pl":"Twoje stanowisko"}},
            {"name":"recommender_company","type":"text","required":true,"labels":{"en":"Your Company","uk":"Ваша компанія","de":"Ihr Unternehmen","pl":"Twoja firma"}},
            {"name":"recipient_full_name","type":"text","required":false,"labels":{"en":"Recipient Name (optional)","uk":"Ім\'я одержувача (необов\'язково)","de":"Name des Empfängers (optional)","pl":"Imię i nazwisko odbiorcy (opcjonalnie)"}},
            {"name":"recipient_title","type":"text","required":false,"labels":{"en":"Recipient Title (optional)","uk":"Посада одержувача (необов\'язково)","de":"Titel des Empfängers (optional)","pl":"Stanowisko odbiorcy (opcjonalnie)"}},
            {"name":"recipient_organization","type":"text","required":false,"labels":{"en":"Recipient Organization (optional)","uk":"Організація одержувача (необов\'язково)","de":"Empfängerorganisation (optional)","pl":"Organizacja odbiorcy (opcjonalnie)"}},
            {"name":"candidate_full_name","type":"text","required":true,"labels":{"en":"Candidate Full Name","uk":"Повне ім\'я кандидата","de":"Vollständiger Name des Kandidaten","pl":"Pełne imię i nazwisko kandydata"}},
            {"name":"relationship_to_candidate","type":"text","required":true,"labels":{"en":"Your Relationship to Candidate","uk":"Ваші стосунки з кандидатом","de":"Ihre Beziehung zum Kandidaten","pl":"Twoja relacja z kandydatem"}},
            {"name":"recommendation_period","type":"text","required":true,"labels":{"en":"Period of Observation/Supervision","uk":"Період спостереження/нагляду","de":"Zeitraum der Beobachtung/Betreuung","pl":"Okres obserwacji/nadzoru"}},
            {"name":"recommendation_body","type":"textarea","required":true,"labels":{"en":"Recommendation Letter Body","uk":"Текст рекомендаційного листа","de":"Inhalt des Empfehlungsschreibens","pl":"Treść listu rekomendacyjnego"}},
            {"name":"closing_remark","type":"text","required":true,"labels":{"en":"Closing Remark (e.g., Sincerely, Best regards)","uk":"Заключна фраза (напр., З повагою, З найкращими побажаннями)","de":"Schlussformel (z.B. Mit freundlichen Grüßen, Beste Grüße)","pl":"Zwrot grzecznościowy na zakończenie (np. Z poważaniem, Z najlepszymi życzeniami)"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Letter of Recommendation',
                        'description' => 'A formal letter providing a positive assessment of an individual\'s qualities and abilities, typically for employment or academic purposes in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;"><p>[[recommender_full_name]]<br>[[recommender_title]]<br>[[recommender_company]]</p><br/><p>[[city]], [[state]] [[letter_date]]</p><br/><p>[[recipient_full_name]]<br>[[recipient_title]]<br>[[recipient_organization]]</p><br/><h1 style="font-size: 16px; font-weight: bold;">Subject: Letter of Recommendation for [[candidate_full_name]]</h1><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Dear [[recipient_full_name]],</p><p>I am writing to recommend [[candidate_full_name]]. I have known [[candidate_full_name]] in my capacity as [[relationship_to_candidate]] for [[recommendation_period]].</p><p>[[recommendation_body]]</p><p>I wholeheartedly recommend [[candidate_full_name]] for [purpose of recommendation]. Please feel free to contact me if you require any further information.</p><br/><p>[[closing_remark]],</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[recommender_full_name]])</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Рекомендаційний лист',
                        'description' => 'Формальний лист, що надає позитивну оцінку якостей та здібностей особи, зазвичай для працевлаштування або академічних цілей у США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;"><p>[[recommender_full_name]]<br>[[recommender_title]]<br>[[recommender_company]]</p><br/><p>[[city]], [[state]] [[letter_date]]</p><br/><p>[[recipient_full_name]]<br>[[recipient_title]]<br>[[recipient_organization]]</p><br/><h1 style="font-size: 16px; font-weight: bold;">Тема: Рекомендаційний лист для [[candidate_full_name]]</h1><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Шановний/а [[recipient_full_name]],</p><p>Цим листом я рекомендую [[candidate_full_name]]. Я знаю [[candidate_full_name]] у своїй якості [[relationship_to_candidate]] протягом [[recommendation_period]].</p><p>[[recommendation_body]]</p><p>Я щиро рекомендую [[candidate_full_name]] для [мета рекомендації]. Будь ласка, не соромтеся зв\'язатися зі мною, якщо Вам потрібна додаткова інформація.</p><br/><p>З повагою,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[recommender_full_name]])</p></div>'
                    ],
                    'de' => [
                        'title' => 'Empfehlungsschreiben',
                        'description' => 'Ein formelles Schreiben, das eine positive Bewertung der Eigenschaften und Fähigkeiten einer Person enthält, typischerweise für Beschäftigungs- oder akademische Zwecke in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;"><p>[[recommender_full_name]]<br>[[recommender_title]]<br>[[recommender_company]]</p><br/><p>[[city]], [[state]] [[letter_date]]</p><br/><p>[[recipient_full_name]]<br>[[recipient_title]]<br>[[recipient_organization]]</p><br/><h1 style="font-size: 16px; font-weight: bold;">Betreff: Empfehlungsschreiben für [[candidate_full_name]]</h1><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Sehr geehrte/r Herr/Frau [[recipient_full_name]],</p><p>ich schreibe Ihnen, um [[candidate_full_name]] zu empfehlen. Ich kenne [[candidate_full_name]] in meiner Funktion als [[relationship_to_candidate]] seit [[recommendation_period]].</p><p>[[recommendation_body]]</p><p>Ich empfehle [[candidate_full_name]] uneingeschränkt für [Zweck der Empfehlung]. Bitte zögern Sie nicht, mich zu kontaktieren, falls Sie weitere Informationen benötigen.</p><br/><p>Mit freundlichen Grüßen,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[recommender_full_name]])</p></div>'
                    ],
                    'pl' => [
                        'title' => 'List rekomendacyjny',
                        'description' => 'Formalne pismo zawierające pozytywną ocenę cech i umiejętności osoby, zazwyczaj w celach zatrudnienia lub akademickich w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: left; font-size: 12px; line-height: 1.5;"><p>[[recommender_full_name]]<br>[[recommender_title]]<br>[[recommender_company]]</p><br/><p>[[city]], [[state]] [[letter_date]]</p><br/><p>[[recipient_full_name]]<br>[[recipient_title]]<br>[[recipient_organization]]</p><br/><h1 style="font-size: 16px; font-weight: bold;">Temat: List rekomendacyjny dla [[candidate_full_name]]</h1><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Szanowny/a Panie/Pani [[recipient_full_name]],</p><p>Piszę, aby polecić [[candidate_full_name]]. Znam [[candidate_full_name]] w mojej roli [[relationship_to_candidate]] przez [[recommendation_period]].</p><p>[[recommendation_body]]</p><p>Z pełnym przekonaniem polecam [[candidate_full_name]] do [cel rekomendacji]. Proszę o kontakt, jeśli potrzebuje Pan/Pani dalszych informacji.</p><br/><p>Z poważaniem,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[recommender_full_name]])</p></div>'
                    ]
                ]
            ],

            // --- Характеристика на сотрудника / Employee Performance Review ---
            [
                'slug' => 'employee-performance-review-us',
                'fields' => '[
            {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
            {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
            {"name":"review_date","type":"date","required":true,"labels":{"en":"Review Date","uk":"Дата огляду","de":"Datum der Überprüfung","pl":"Data oceny"}},
            {"name":"employee_full_name","type":"text","required":true,"labels":{"en":"Employee Full Name","uk":"Повне ім\'я працівника","de":"Vollständiger Name des Mitarbeiters","pl":"Imię i nazwisko pracownika"}},
            {"name":"employee_id","type":"text","required":true,"labels":{"en":"Employee ID","uk":"Номер працівника","de":"Personalnummer","pl":"Numer pracownika"}},
            {"name":"employee_position","type":"text","required":true,"labels":{"en":"Employee Position","uk":"Посада працівника","de":"Position des Mitarbeiters","pl":"Stanowisko pracownika"}},
            {"name":"company_name","type":"text","required":true,"labels":{"en":"Company Name","uk":"Назва компанії","de":"Firmenname","pl":"Nazwa firmy"}},
            {"name":"department","type":"text","required":true,"labels":{"en":"Department","uk":"Відділ","de":"Abteilung","pl":"Dział"}},
            {"name":"review_period","type":"text","required":true,"labels":{"en":"Review Period (e.g., Q1 2023, Annual 2022)","uk":"Період огляду (напр., 1 квартал 2023, Річний 2022)","de":"Überprüfungszeitraum (z.B. Q1 2023, jährlich 2022)","pl":"Okres oceny (np. Q1 2023, roczna 2022)"}},
            {"name":"reviewer_full_name","type":"text","required":true,"labels":{"en":"Reviewer\'s Full Name (Supervisor/Manager)","uk":"Повне ім\'я того, хто проводить огляд (керівника/менеджера)","de":"Vollständiger Name des Prüfers (Vorgesetzter/Manager)","pl":"Imię i nazwisko oceniającego (przełożony/menedżer)"}},
            {"name":"performance_summary","type":"textarea","required":true,"labels":{"en":"Performance Summary","uk":"Підсумок продуктивності","de":"Leistungszusammenfassung","pl":"Podsumowanie wyników"}},
            {"name":"strengths","type":"textarea","required":true,"labels":{"en":"Strengths","uk":"Сильні сторони","de":"Stärken","pl":"Mocne strony"}},
            {"name":"areas_for_improvement","type":"textarea","required":true,"labels":{"en":"Areas for Improvement","uk":"Напрямки для покращення","de":"Verbesserungspotenziale","pl":"Obszary do poprawy"}},
            {"name":"goals_for_next_period","type":"textarea","required":true,"labels":{"en":"Goals for Next Period","uk":"Цілі на наступний період","de":"Ziele für den nächsten Zeitraum","pl":"Cele na następny okres"}},
            {"name":"employee_comments","type":"textarea","required":false,"labels":{"en":"Employee Comments (optional)","uk":"Коментарі працівника (необов\'язково)","de":"Kommentare des Mitarbeiters (optional)","pl":"Komentarze pracownika (opcjonalnie)"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Employee Performance Review',
                        'description' => 'A formal document used by employers to evaluate an employee\'s job performance, common in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Employee Performance Review</h1><p style="font-size: 14px;">Company: <strong>[[company_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>Employee Name: <strong>[[employee_full_name]]</strong> (ID: [[employee_id]])</p></td><td width="50%" style="text-align: right;"><p>Review Date: [[review_date]]</p></td></tr><tr><td><p>Position: [[employee_position]]</p></td><td style="text-align: right;"><p>Review Period: [[review_period]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Performance Summary:</h2><p>[[performance_summary]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Strengths:</h2><p>[[strengths]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Areas for Improvement:</h2><p>[[areas_for_improvement]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Goals for Next Period:</h2><p>[[goals_for_next_period]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Employee Comments:</h2><p>[[employee_comments]]</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Reviewer: [[reviewer_full_name]]</p></td><td width="50%"><p>___________________<br>Employee Signature</p></td></tr></table></div>'
                    ],
                    'uk' => [
                        'title' => 'Характеристика на працівника',
                        'description' => 'Формальний документ, що використовується роботодавцями для оцінки ефективності роботи працівника, поширений у США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Характеристика на працівника</h1><p style="font-size: 14px;">Компанія: <strong>[[company_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>ПІБ працівника: <strong>[[employee_full_name]]</strong> (Табельний номер: [[employee_id]])</p></td><td width="50%" style="text-align: right;"><p>Дата огляду: [[review_date]]</p></td></tr><tr><td><p>Посада: [[employee_position]]</p></td><td style="text-align: right;"><p>Період огляду: [[review_period]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Підсумок продуктивності:</h2><p>[[performance_summary]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Сильні сторони:</h2><p>[[strengths]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Напрямки для покращення:</h2><p>[[areas_for_improvement]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Цілі на наступний період:</h2><p>[[goals_for_next_period]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Коментарі працівника:</h2><p>[[employee_comments]]</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Оглядач: [[reviewer_full_name]]</p></td><td width="50%"><p>___________________<br>Підпис працівника</p></td></tr></table></div>'
                    ],
                    'de' => [
                        'title' => 'Leistungsbeurteilung des Mitarbeiters',
                        'description' => 'Ein formelles Dokument, das von Arbeitgebern zur Bewertung der Arbeitsleistung eines Mitarbeiters verwendet wird, üblich in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Leistungsbeurteilung des Mitarbeiters</h1><p style="font-size: 14px;">Unternehmen: <strong>[[company_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>Name des Mitarbeiters: <strong>[[employee_full_name]]</strong> (ID: [[employee_id]])</p></td><td width="50%" style="text-align: right;"><p>Datum der Überprüfung: [[review_date]]</p></td></tr><tr><td><p>Position: [[employee_position]]</p></td><td style="text-align: right;"><p>Überprüfungszeitraum: [[review_period]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Leistungszusammenfassung:</h2><p>[[performance_summary]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Stärken:</h2><p>[[strengths]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Verbesserungspotenziale:</h2><p>[[areas_for_improvement]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Ziele für den nächsten Zeitraum:</h2><p>[[goals_for_next_period]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Kommentare des Mitarbeiters:</h2><p>[[employee_comments]]</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Prüfer: [[reviewer_full_name]]</p></td><td width="50%"><p>___________________<br>Unterschrift des Mitarbeiters</p></td></tr></table></div>'
                    ],
                    'pl' => [
                        'title' => 'Ocena wyników pracownika',
                        'description' => 'Formalny dokument używany przez pracodawców do oceny wyników pracy pracownika, powszechny w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; margin-bottom: 20px;"><h1 style="font-size: 24px; font-weight: bold;">Ocena wyników pracownika</h1><p style="font-size: 14px;">Firma: <strong>[[company_name]]</strong></p></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td width="50%"><p>Imię i nazwisko pracownika: <strong>[[employee_full_name]]</strong> (ID: [[employee_id]])</p></td><td width="50%" style="text-align: right;"><p>Data oceny: [[review_date]]</p></td></tr><tr><td><p>Stanowisko: [[employee_position]]</p></td><td style="text-align: right;"><p>Okres oceny: [[review_period]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Podsumowanie wyników:</h2><p>[[performance_summary]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Mocne strony:</h2><p>[[strengths]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Obszary do poprawy:</h2><p>[[areas_for_improvement]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Cele na następny okres:</h2><p>[[goals_for_next_period]]</p><h2 style="font-size:14px; font-weight:bold; border-bottom:1px solid #333; padding-bottom:3px; margin-top:20px;">Komentarze pracownika:</h2><p>[[employee_comments]]</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px;"><table width="100%" style="text-align: center;"><tr><td width="50%"><p>___________________<br>Oceniający: [[reviewer_full_name]]</p></td><td width="50%"><p>___________________<br>Podpis pracownika</p></td></tr></table></div>'
                    ]
                ]
            ],

            // --- Служебная записка / Memo ---
            [
                'slug' => 'memo-us',
                'fields' => '[
            {"name":"city","type":"text","required":true,"labels":{"en":"City","uk":"Місто","de":"Ort","pl":"Miejscowość"}},
            {"name":"state","type":"text","required":true,"labels":{"en":"State","uk":"Штат","de":"Bundesstaat","pl":"Stan"}},
            {"name":"memo_date","type":"date","required":true,"labels":{"en":"Date","uk":"Дата","de":"Datum","pl":"Data"}},
            {"name":"to_recipients","type":"text","required":true,"labels":{"en":"To (Recipients)","uk":"Кому (Одержувачі)","de":"An (Empfänger)","pl":"Do (Odbiorcy)"}},
            {"name":"from_sender","type":"text","required":true,"labels":{"en":"From (Sender)","uk":"Від (Відправник)","de":"Von (Absender)","pl":"Od (Nadawca)"}},
            {"name":"subject","type":"text","required":true,"labels":{"en":"Subject","uk":"Тема","de":"Betreff","pl":"Temat"}},
            {"name":"memo_body","type":"textarea","required":true,"labels":{"en":"Memo Body","uk":"Текст службової записки","de":"Inhalt der Notiz","pl":"Treść notatki służbowej"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Memo',
                        'description' => 'A standard internal communication document used to convey information within an organization in the USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p><strong>MEMORANDUM</strong></p><p><strong>TO:</strong> [[to_recipients]]</p><p><strong>FROM:</strong> [[from_sender]]</p><p><strong>DATE:</strong> [[memo_date]]</p><p><strong>SUBJECT:</strong> [[subject]]</p><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>[[memo_body]]</p></div>',
                        'footer_html' => ''
                    ],
                    'uk' => [
                        'title' => 'Службова записка',
                        'description' => 'Стандартний внутрішній документ для передачі інформації в організації в США.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p><strong>СЛУЖБОВА ЗАПИСКА</strong></p><p><strong>КОМУ:</strong> [[to_recipients]]</p><p><strong>ВІД:</strong> [[from_sender]]</p><p><strong>ДАТА:</strong> [[memo_date]]</p><p><strong>ТЕМА:</strong> [[subject]]</p><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>[[memo_body]]</p></div>',
                        'footer_html' => ''
                    ],
                    'de' => [
                        'title' => 'Memo',
                        'description' => 'Ein standardisiertes internes Kommunikationsdokument zur Übermittlung von Informationen innerhalb einer Organisation in den USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;"><p><strong>MEMORANDUM</strong></p><p><strong>AN:</strong> [[to_recipients]]</p><p><strong>VON:</strong> [[from_sender]]</p><p><strong>DATUM:</strong> [[memo_date]]</p><p><strong>BETREFF:</strong> [[subject]]</p><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>[[memo_body]]</p></div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Notatka służbowa',
                        'description' => 'Standardowy wewnętrzny dokument komunikacyjny używany do przekazywania informacji w organizacji w USA.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center; font-size: 12px; line-height: 1.5;"><p><strong>MEMORANDUM</strong></p><p><strong>DO:</strong> [[to_recipients]]</p><p><strong>OD:</strong> [[from_sender]]</p><p><strong>DATA:</strong> [[memo_date]]</p><p><strong>TEMAT:</strong> [[subject]]</p><br/></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>[[memo_body]]</p></div>',
                        'footer_html' => ''
                    ]
                ]
            ],
            // --- Объяснительная записка / Explanation Letter (Explanation Letter) ---
            [
                'slug' => 'explanation-letter-us',
                'fields' => '[
            {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
            {"name":"letter_date","type":"date","required":true,"labels":{"pl":"Data","en":"Date","uk":"Дата","de":"Datum"}},
            {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
            {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko","en":"Position","uk":"Посада","de":"Position"}},
            {"name":"department","type":"text","required":true,"labels":{"pl":"Dział","en":"Department","uk":"Відділ","de":"Abteilung"}},
            {"name":"manager_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko przełożonego","en":"Manager Full Name","uk":"ПІБ керівника","de":"Vollständiger Name des Vorgesetzten"}},
            {"name":"incident_date","type":"date","required":true,"labels":{"pl":"Data zdarzenia","en":"Incident Date","uk":"Дата події","de":"Datum des Vorfalls"}},
            {"name":"incident_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis zdarzenia","en":"Detailed Description of Incident","uk":"Детальний опис події","de":"Detaillierte Beschreibung des Vorfalls"}},
            {"name":"reason_for_incident","type":"textarea","required":true,"labels":{"pl":"Przyczyna zdarzenia","en":"Reason for Incident","uk":"Причина події","de":"Grund des Vorfalls"}},
            {"name":"actions_taken","type":"textarea","required":false,"labels":{"pl":"Podjęte działania (opcjonalnie)","en":"Actions Taken (optional)","uk":"Вжиті заходи (необов\'язково)","de":"Ergriffene Maßnahmen (optional)"}},
            {"name":"future_prevention","type":"textarea","required":false,"labels":{"pl":"Propozycje zapobiegania w przyszłości (opcjonalnie)","en":"Suggestions for Future Prevention (optional)","uk":"Пропозиції щодо запобігання в майбутньому (необов\'язково)","de":"Vorschläge zur zukünftigen Prävention (optional)"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Explanation Letter',
                        'description' => 'A formal letter from an employee explaining an incident or absence.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">EXPLANATION LETTER</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>To: [[manager_full_name]]<br>From: [[employee_full_name]]<br>Position: [[employee_position]]<br>Department: [[department]]</p></td><td style="text-align: right;"><p>[[city]], [[letter_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p><strong>Subject: Explanation Regarding Incident on [[incident_date]]</strong></p><br/><p>Dear [[manager_full_name]],</p><p>This letter serves to explain the incident that occurred on [[incident_date]].</p><p>Detailed description of the incident: [[incident_description]]</p><p>The reason for this incident was: [[reason_for_incident]]</p><p>Actions taken: [[actions_taken]]</p><p>Suggestions for future prevention: [[future_prevention]]</p><br/><p>I apologize for any inconvenience this may have caused.</p><br/><p>Sincerely,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[employee_full_name]])</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Пояснювальна записка',
                        'description' => 'Офіційний лист від працівника з поясненням інциденту або відсутності.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ПОЯСНЮВАЛЬНА ЗАПИСКА</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Кому: [[manager_full_name]]<br>Від: [[employee_full_name]]<br>Посада: [[employee_position]]<br>Відділ: [[department]]</p></td><td style="text-align: right;"><p>[[city]], [[letter_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p><strong>Тема: Пояснення щодо інциденту [[incident_date]]</strong></p><br/><p>Шановний/а [[manager_full_name]],</p><p>Цей лист слугує поясненням інциденту, що стався [[incident_date]].</p><p>Детальний опис інциденту: [[incident_description]]</p><p>Причина цього інциденту: [[reason_for_incident]]</p><p>Вжиті заходи: [[actions_taken]]</p><p>Пропозиції щодо запобігання в майбутньому: [[future_prevention]]</p><br/><p>Прошу вибачення за будь-які незручності, які це могло спричинити.</p><br/><p>З повагою,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[employee_full_name]])</p></div>'
                    ],
                    'de' => [
                        'title' => 'Erklärungsschreiben',
                        'description' => 'Ein formelles Schreiben eines Mitarbeiters zur Erklärung eines Vorfalls oder einer Abwesenheit.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ERKLÄRUNGSSCHREIBEN</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>An: [[manager_full_name]]<br>Von: [[employee_full_name]]<br>Position: [[employee_position]]<br>Abteilung: [[department]]</p></td><td style="text-align: right;"><p>[[city]], [[letter_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p><strong>Betreff: Erklärung zum Vorfall vom [[incident_date]]</strong></p><br/><p>Sehr geehrte/r Herr/Frau [[manager_full_name]],</p><p>Dieses Schreiben dient zur Erklärung des Vorfalls, der sich am [[incident_date]] ereignet hat.</p><p>Detaillierte Beschreibung des Vorfalls: [[incident_description]]</p><p>Der Grund für diesen Vorfall war: [[reason_for_incident]]</p><p>Ergriffene Maßnahmen: [[actions_taken]]</p><p>Vorschläge zur zukünftigen Prävention: [[future_prevention]]</p><br/><p>Ich entschuldige mich für etwaige Unannehmlichkeiten.</p><br/><p>Mit freundlichen Grüßen,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[employee_full_name]])</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Wyjaśnienie',
                        'description' => 'Formalne pismo od pracownika wyjaśniające incydent lub nieobecność.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">WYJAŚNIENIE</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Do: [[manager_full_name]]<br>Od: [[employee_full_name]]<br>Stanowisko: [[employee_position]]<br>Dział: [[department]]</p></td><td style="text-align: right;"><p>[[city]], [[letter_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p><strong>Temat: Wyjaśnienie dotyczące zdarzenia z dnia [[incident_date]]</strong></p><br/><p>Szanowny/a Panie/Pani [[manager_full_name]],</p><p>Niniejsze pismo służy wyjaśnieniu zdarzenia, które miało miejsce w dniu [[incident_date]].</p><p>Szczegółowy opis zdarzenia: [[incident_description]]</p><p>Przyczyna zdarzenia: [[reason_for_incident]]</p><p>Podjęte działania: [[actions_taken]]</p><p>Propozycje zapobiegania w przyszłości: [[future_prevention]]</p><br/><p>Przepraszam za wszelkie niedogodności, które to mogło spowodować.</p><br/><p>Z poważaniem,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[employee_full_name]])</p></div>'
                    ]
                ]
            ],

            // --- Табель учета рабочего времени / Timesheet (Timesheet) ---
            [
                'slug' => 'timesheet-us',
                'fields' => '[
            {"name":"company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy","en":"Company Name","uk":"Назва компанії","de":"Firmenname"}},
            {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
            {"name":"employee_id","type":"text","required":true,"labels":{"pl":"Numer identyfikacyjny pracownika","en":"Employee ID","uk":"Ідентифікаційний номер працівника","de":"Mitarbeiter-ID"}},
            {"name":"pay_period_start","type":"date","required":true,"labels":{"pl":"Okres rozliczeniowy od","en":"Pay Period Start","uk":"Період оплати від","de":"Abrechnungszeitraum von"}},
            {"name":"pay_period_end","type":"date","required":true,"labels":{"pl":"Okres rozliczeniowy do","en":"Pay Period End","uk":"Період оплати до","de":"Abrechnungszeitraum bis"}},
            {"name":"daily_entries","type":"textarea","required":true,"labels":{"pl":"Codzienne wpisy (data, godzina rozpoczęcia, godzina zakończenia, przerwa, regularne godziny, nadgodziny)","en":"Daily Entries (date, start time, end time, break, regular hours, overtime)","uk":"Щоденні записи (дата, час початку, час закінчення, перерва, звичайні години, понаднормові)","de":"Tägliche Einträge (Datum, Startzeit, Endzeit, Pause, reguläre Stunden, Überstunden)"}},
            {"name":"total_regular_hours","type":"number","required":true,"labels":{"pl":"Łączne godziny regularne","en":"Total Regular Hours","uk":"Загальні звичайні години","de":"Gesamte reguläre Stunden"}},
            {"name":"total_overtime_hours","type":"number","required":true,"labels":{"pl":"Łączne godziny nadliczbowe","en":"Total Overtime Hours","uk":"Загальні понаднормові години","de":"Gesamte Überstunden"}},
            {"name":"employee_signature_date","type":"date","required":true,"labels":{"pl":"Data podpisu pracownika","en":"Employee Signature Date","uk":"Дата підпису працівника","de":"Datum der Unterschrift des Mitarbeiters"}},
            {"name":"manager_signature_date","type":"date","required":true,"labels":{"pl":"Data podpisu przełożonego","en":"Manager Signature Date","uk":"Дата підпису керівника","de":"Datum der Unterschrift des Vorgesetzten"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Timesheet',
                        'description' => 'A standard timesheet for tracking employee work hours, including regular and overtime hours.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">TIMESHEET</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Company: <strong>[[company_name]]</strong><br>Employee Name: <strong>[[employee_full_name]]</strong><br>Employee ID: [[employee_id]]</p></td><td style="text-align: right;"><p>Pay Period: [[pay_period_start]] - [[pay_period_end]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;"><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Daily Entries:</h2><pre>Date        | Start Time | End Time | Break | Regular Hours | Overtime Hours
-----------------------------------------------------------------------------------
[[daily_entries]]
                </pre><p><strong>Total Regular Hours: [[total_regular_hours]]</strong></p><p><strong>Total Overtime Hours: [[total_overtime_hours]]</strong></p><br/><p>Employee Signature: ___________________ Date: [[employee_signature_date]]</p><br/><p>Manager Signature: ___________________ Date: [[manager_signature_date]]</p></div>',
                        'footer_html' => ''
                    ],
                    'uk' => [
                        'title' => 'Табель обліку робочого часу',
                        'description' => 'Стандартний табель обліку робочого часу працівників, включаючи звичайні та понаднормові години.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ТАБЕЛЬ ОБЛІКУ РОБОЧОГО ЧАСУ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Компанія: <strong>[[company_name]]</strong><br>ПІБ працівника: <strong>[[employee_full_name]]</strong><br>Ідентифікатор працівника: [[employee_id]]</p></td><td style="text-align: right;"><p>Період оплати: [[pay_period_start]] - [[pay_period_end]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;"><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Щоденні записи:</h2><pre>Дата        | Час початку | Час закінчення | Перерва | Звичайні години | Понаднормові години
-----------------------------------------------------------------------------------
[[daily_entries]]
                </pre><p><strong>Всього звичайних годин: [[total_regular_hours]]</strong></p><p><strong>Всього понаднормових годин: [[total_overtime_hours]]</strong></p><br/><p>Підпис працівника: ___________________ Дата: [[employee_signature_date]]</p><br/><p>Підпис керівника: ___________________ Дата: [[manager_signature_date]]</p></div>',
                        'footer_html' => ''
                    ],
                    'de' => [
                        'title' => 'Stundenzettel',
                        'description' => 'Ein Standard-Stundenzettel zur Erfassung der Arbeitszeiten von Mitarbeitern, einschließlich regulärer und Überstunden.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">STUNDENZETTEL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Firma: <strong>[[company_name]]</strong><br>Mitarbeitername: <strong>[[employee_full_name]]</strong><br>Mitarbeiter-ID: [[employee_id]]</p></td><td style="text-align: right;"><p>Abrechnungszeitraum: [[pay_period_start]] - [[pay_period_end]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;"><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Tägliche Einträge:</h2><pre>Datum       | Startzeit   | Endzeit   | Pause | Reguläre Stunden | Überstunden
-----------------------------------------------------------------------------------
[[daily_entries]]
                </pre><p><strong>Gesamte reguläre Stunden: [[total_regular_hours]]</strong></p><p><strong>Gesamte Überstunden: [[total_overtime_hours]]</strong></p><br/><p>Unterschrift Mitarbeiter: ___________________ Datum: [[employee_signature_date]]</p><br/><p>Unterschrift Vorgesetzter: ___________________ Datum: [[manager_signature_date]]</p></div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Karta czasu pracy',
                        'description' => 'Standardowa karta czasu pracy do śledzenia godzin pracy pracownika, w tym godzin regularnych i nadliczbowych.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">KARTA CZASU PRACY</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Firma: <strong>[[company_name]]</strong><br>Imię i nazwisko pracownika: <strong>[[employee_full_name]]</strong><br>Numer identyfikacyjny pracownika: [[employee_id]]</p></td><td style="text-align: right;"><p>Okres rozliczeniowy: [[pay_period_start]] - [[pay_period_end]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;"><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Codzienne wpisy:</h2><pre>Data        | Godzina rozpoczęcia | Godzina zakończenia | Przerwa | Godziny regularne | Godziny nadliczbowe
-----------------------------------------------------------------------------------
[[daily_entries]]
                </pre><p><strong>Łączne godziny regularne: [[total_regular_hours]]</strong></p><p><strong>Łączne godziny nadliczbowe: [[total_overtime_hours]]</strong></p><br/><p>Podpis pracownika: ___________________ Data: [[employee_signature_date]]</p><br/><p>Podpis przełożonego: ___________________ Data: [[manager_signature_date]]</p></div>',
                        'footer_html' => ''
                    ]
                ]
            ],

            // --- Командировочное удостоверение / Business Trip Form (Business Trip Authorization Form) ---
            [
                'slug' => 'business-trip-form-us',
                'fields' => '[
            {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
            {"name":"form_date","type":"date","required":true,"labels":{"pl":"Data sporządzenia formularza","en":"Form Date","uk":"Дата складання форми","de":"Datum des Formulars"}},
            {"name":"employee_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko pracownika","en":"Employee Full Name","uk":"ПІБ працівника","de":"Vollständiger Name des Mitarbeiters"}},
            {"name":"employee_position","type":"text","required":true,"labels":{"pl":"Stanowisko","en":"Position","uk":"Посада","de":"Position"}},
            {"name":"department","type":"text","required":true,"labels":{"pl":"Dział","en":"Department","uk":"Відділ","de":"Abteilung"}},
            {"name":"trip_purpose","type":"textarea","required":true,"labels":{"pl":"Cel podróży służbowej","en":"Purpose of Business Trip","uk":"Мета відрядження","de":"Zweck der Dienstreise"}},
            {"name":"destination","type":"text","required":true,"labels":{"pl":"Miejsce docelowe","en":"Destination","uk":"Пункт призначення","de":"Reiseziel"}},
            {"name":"departure_date","type":"date","required":true,"labels":{"pl":"Data wyjazdu","en":"Departure Date","uk":"Дата від\'їзду","de":"Abreisedatum"}},
            {"name":"return_date","type":"date","required":true,"labels":{"pl":"Data powrotu","en":"Return Date","uk":"Дата повернення","de":"Rückreisedatum"}},
            {"name":"transportation_method","type":"text","required":true,"labels":{"pl":"Środek transportu","en":"Method of Transportation","uk":"Вид транспорту","de":"Transportmittel"}},
            {"name":"accommodation_details","type":"textarea","required":false,"labels":{"pl":"Szczegóły zakwaterowania (opcjonalnie)","en":"Accommodation Details (optional)","uk":"Деталі проживання (необов\'язково)","de":"Unterkunftsdetails (optional)"}},
            {"name":"estimated_expenses","type":"textarea","required":false,"labels":{"pl":"Szacowane wydatki (opcjonalnie)","en":"Estimated Expenses (optional)","uk":"Очікувані витрати (необов\'язково)","de":"Geschätzte Ausgaben (optional)"}},
            {"name":"manager_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko osoby zatwierdzającej","en":"Approving Manager Full Name","uk":"ПІБ керівника, що затверджує","de":"Vollständiger Name des genehmigenden Vorgesetzten"}},
            {"name":"manager_signature_date","type":"date","required":true,"labels":{"pl":"Data podpisu zatwierdzającego","en":"Manager Signature Date","uk":"Дата підпису керівника","de":"Datum der Unterschrift des Vorgesetzten"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Business Trip Authorization Form',
                        'description' => 'A form to authorize and document an employee\'s business trip.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BUSINESS TRIP AUTHORIZATION FORM</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Employee Name: <strong>[[employee_full_name]]</strong><br>Position: [[employee_position]]<br>Department: [[department]]</p></td><td style="text-align: right;"><p>[[city]], [[form_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;"><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Trip Details:</h2><p>Purpose of Trip: [[trip_purpose]]</p><p>Destination: <strong>[[destination]]</strong></p><p>Departure Date: <strong>[[departure_date]]</strong></p><p>Return Date: <strong>[[return_date]]</strong></p><p>Method of Transportation: [[transportation_method]]</p><p>Accommodation Details: [[accommodation_details]]</p><p>Estimated Expenses: [[estimated_expenses]]</p><br/><p>This business trip is hereby authorized.</p><br/><p>Approved By: ___________________ Date: [[manager_signature_date]]</p><p>([[manager_full_name]])</p></div>',
                        'footer_html' => ''
                    ],
                    'uk' => [
                        'title' => 'Форма дозволу на відрядження',
                        'description' => 'Форма для авторизації та документування відрядження працівника.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">ФОРМА ДОЗВОЛУ НА ВІДРЯДЖЕННЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>ПІБ працівника: <strong>[[employee_full_name]]</strong><br>Посада: [[employee_position]]<br>Відділ: [[department]]</p></td><td style="text-align: right;"><p>[[city]], [[form_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;"><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Деталі поїздки:</h2><p>Мета поїздки: [[trip_purpose]]</p><p>Пункт призначення: <strong>[[destination]]</strong></p><p>Дата від\'їзду: <strong>[[departure_date]]</strong></p><p>Дата повернення: <strong>[[return_date]]</strong></p><p>Вид транспорту: [[transportation_method]]</p><p>Деталі проживання: [[accommodation_details]]</p><p>Очікувані витрати: [[estimated_expenses]]</p><br/><p>Це відрядження цим дозволяється.</p><br/><p>Затверджено: ___________________ Дата: [[manager_signature_date]]</p><p>([[manager_full_name]])</p></div>',
                        'footer_html' => ''
                    ],
                    'de' => [
                        'title' => 'Dienstreise-Genehmigungsformular',
                        'description' => 'Ein Formular zur Genehmigung und Dokumentation einer Dienstreise eines Mitarbeiters.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">DIENSTREISE-GENEHMIGUNGSFORMULAR</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Mitarbeitername: <strong>[[employee_full_name]]</strong><br>Position: [[employee_position]]<br>Abteilung: [[department]]</p></td><td style="text-align: right;"><p>[[city]], [[form_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;"><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Reisedetails:</h2><p>Zweck der Reise: [[trip_purpose]]</p><p>Reiseziel: <strong>[[destination]]</strong></p><p>Abreisedatum: <strong>[[departure_date]]</strong></p><p>Rückreisedatum: <strong>[[return_date]]</strong></p><p>Transportmittel: [[transportation_method]]</p><p>Unterkunftsdetails: [[accommodation_details]]</p><p>Geschätzte Ausgaben: [[estimated_expenses]]</p><br/><p>Diese Dienstreise ist hiermit genehmigt.</p><br/><p>Genehmigt von: ___________________ Datum: [[manager_signature_date]]</p><p>([[manager_full_name]])</p></div>',
                        'footer_html' => ''
                    ],
                    'pl' => [
                        'title' => 'Formularz autoryzacji podróży służbowej',
                        'description' => 'Formularz do autoryzacji i dokumentowania podróży służbowej pracownika.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">FORMULARZ AUTORYZACJI PODRÓŻY SŁUŻBOWEJ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Imię i nazwisko pracownika: <strong>[[employee_full_name]]</strong><br>Stanowisko: [[employee_position]]<br>Dział: [[department]]</p></td><td style="text-align: right;"><p>[[city]], [[form_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6;"><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">Szczegóły podróży:</h2><p>Cel podróży: [[trip_purpose]]</p><p>Miejsce docelowe: <strong>[[destination]]</strong></p><p>Data wyjazdu: <strong>[[departure_date]]</strong></p><p>Data powrotu: <strong>[[return_date]]</strong></p><p>Środek transportu: [[transportation_method]]</p><p>Szczegóły zakwaterowania: [[accommodation_details]]</p><p>Szacowane wydatki: [[estimated_expenses]]</p><br/><p>Niniejsza podróż służbowa jest niniejszym autoryzowana.</p><br/><p>Zatwierdzono przez: ___________________ Data: [[manager_signature_date]]</p><p>([[manager_full_name]])</p></div>',
                        'footer_html' => ''
                    ]
                ]
            ],

            // --- Коммерческое предложение / Business Proposal (Business Proposal) ---
            [
                'slug' => 'business-proposal-us',
                'fields' => '[
            {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
            {"name":"proposal_date","type":"date","required":true,"labels":{"pl":"Data oferty","en":"Proposal Date","uk":"Дата пропозиції","de":"Angebotsdatum"}},
            {"name":"sender_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy (oferenta)","en":"Sender Company Name","uk":"Назва компанії (оферента)","de":"Firmenname (Anbieter)"}},
            {"name":"sender_company_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Sender Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens"}},
            {"name":"recipient_company_name","type":"text","required":true,"labels":{"pl":"Nazwa firmy (odbiorcy)","en":"Recipient Company Name","uk":"Назва компанії (одержувача)","de":"Firmenname (Empfänger)"}},
            {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres firmy","en":"Recipient Company Address","uk":"Адреса компанії","de":"Adresse des Unternehmens"}},
            {"name":"proposal_subject","type":"text","required":true,"labels":{"pl":"Temat oferty","en":"Proposal Subject","uk":"Тема пропозиції","de":"Betreff des Angebots"}},
            {"name":"introduction","type":"textarea","required":true,"labels":{"pl":"Wprowadzenie (krótki opis, cel)","en":"Introduction (brief description, purpose)","uk":"Вступ (короткий опис, мета)","de":"Einleitung (kurze Beschreibung, Zweck)"}},
            {"name":"solution_description","type":"textarea","required":true,"labels":{"pl":"Opis oferowanego rozwiązania/usługi/produktu","en":"Description of Offered Solution/Service/Product","uk":"Опис пропонованого рішення/послуги/продукту","de":"Beschreibung der angebotenen Lösung/Dienstleistung/des Produkts"}},
            {"name":"benefits","type":"textarea","required":true,"labels":{"pl":"Korzyści dla klienta","en":"Benefits for the Client","uk":"Переваги для клієнта","de":"Vorteile für den Kunden"}},
            {"name":"pricing","type":"textarea","required":true,"labels":{"pl":"Cennik/warunki finansowe","en":"Pricing/Financial Terms","uk":"Прайс-лист/фінансові умови","de":"Preisgestaltung/Finanzielle Bedingungen"}},
            {"name":"call_to_action","type":"textarea","required":true,"labels":{"pl":"Wezwanie do działania (np. umówienie spotkania, kontakt)","en":"Call to Action (e.g., schedule meeting, contact)","uk":"Заклик до дії (напр., домовитися про зустріч, зв\'язатися)","de":"Handlungsaufforderung (z.B. Termin vereinbaren, Kontakt aufnehmen)"}},
            {"name":"contact_person","type":"text","required":true,"labels":{"pl":"Osoba do kontaktu","en":"Contact Person","uk":"Контактна особа","de":"Ansprechpartner"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Business Proposal',
                        'description' => 'A formal document outlining a proposed business solution, service, or product to a potential client.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">BUSINESS PROPOSAL</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>From: <strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], [[proposal_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>To: <strong>[[recipient_company_name]]</strong><br>[[recipient_address]]</p><br/><p><strong>Subject: [[proposal_subject]]</strong></p><br/><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Introduction</h2><p>[[introduction]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Our Solution/Service/Product</h2><p>[[solution_description]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Benefits for You</h2><p>[[benefits]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Pricing and Financial Terms</h2><p>[[pricing]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Next Steps</h2><p>[[call_to_action]]</p><br/><p>For any questions, please contact: [[contact_person]]</p><br/><p>Sincerely,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[sender_company_name]])</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Комерційна пропозиція',
                        'description' => 'Офіційний документ, що викладає пропоноване бізнес-рішення, послугу або продукт потенційному клієнту.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">КОМЕРЦІЙНА ПРОПОЗИЦІЯ</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Від: <strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], [[proposal_date]] р.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Кому: <strong>[[recipient_company_name]]</strong><br>[[recipient_address]]</p><br/><p><strong>Тема: [[proposal_subject]]</strong></p><br/><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Вступ</h2><p>[[introduction]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Наше рішення/послуга/продукт</h2><p>[[solution_description]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Переваги для Вас</h2><p>[[benefits]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Ціноутворення та фінансові умови</h2><p>[[pricing]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Наступні кроки</h2><p>[[call_to_action]]</p><br/><p>З будь-яких питань звертайтеся: [[contact_person]]</p><br/><p>З повагою,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[sender_company_name]])</p></div>'
                    ],
                    'de' => [
                        'title' => 'Geschäftsvorschlag',
                        'description' => 'Ein formelles Dokument, das eine vorgeschlagene Geschäftslösung, Dienstleistung oder ein Produkt einem potenziellen Kunden darlegt.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">GESCHÄFTSVORSCHLAG</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Von: <strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], [[proposal_date]]</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>An: <strong>[[recipient_company_name]]</strong><br>[[recipient_address]]</p><br/><p><strong>Betreff: [[proposal_subject]]</strong></p><br/><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Einleitung</h2><p>[[introduction]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Unsere Lösung/Dienstleistung/Produkt</h2><p>[[solution_description]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Vorteile für Sie</h2><p>[[benefits]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Preisgestaltung und Finanzielle Bedingungen</h2><p>[[pricing]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Nächste Schritte</h2><p>[[call_to_action]]</p><br/><p>Für Fragen kontaktieren Sie bitte: [[contact_person]]</p><br/><p>Mit freundlichen Grüßen,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[sender_company_name]])</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Oferta biznesowa',
                        'description' => 'Formalny dokument przedstawiający proponowane rozwiązanie biznesowe, usługę lub produkt potencjalnemu klientowi.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; text-align: center;"><h1 style="font-size: 20px; font-weight: bold;">OFERTA BIZNESOWA</h1></div><table width="100%" style="font-family: DejaVu Sans, sans-serif; font-size:12px;"><tr><td><p>Od: <strong>[[sender_company_name]]</strong><br>[[sender_company_address]]</p></td><td style="text-align: right;"><p>[[city]], [[proposal_date]] r.</p></td></tr></table>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Do: <strong>[[recipient_company_name]]</strong><br>[[recipient_address]]</p><br/><p><strong>Temat: [[proposal_subject]]</strong></p><br/><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">1. Wprowadzenie</h2><p>[[introduction]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">2. Nasze rozwiązanie/usługa/produkt</h2><p>[[solution_description]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">3. Korzyści dla klienta</h2><p>[[benefits]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">4. Cennik/warunki finansowe</h2><p>[[pricing]]</p><h2 style="font-size:14px; font-weight:bold; margin-top:15px;">5. Następne kroki</h2><p>[[call_to_action]]</p><br/><p>W przypadku pytań prosimy o kontakt: [[contact_person]]</p><br/><p>Z poważaniem,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 50px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[sender_company_name]])</p></div>'
                    ]
                ]
            ],

            // --- Письмо-претензия / Demand Letter ---
            [
                'slug' => 'demand-letter-us',
                'fields' => '[
            {"name":"sender_city","type":"text","required":true,"labels":{"pl":"Miejscowość (Nadawca)","en":"City (Sender)","uk":"Місто (Відправник)","de":"Ort (Absender)"}},
            {"name":"sender_state","type":"text","required":true,"labels":{"pl":"Stan (Nadawca)","en":"State (Sender)","uk":"Штат (Відправник)","de":"Bundesstaat (Absender)"}},
            {"name":"sender_zip_code","type":"text","required":true,"labels":{"pl":"Kod pocztowy (Nadawca)","en":"Zip Code (Sender)","uk":"Поштовий індекс (Відправник)","de":"Postleitzahl (Absender)"}},
            {"name":"letter_date","type":"date","required":true,"labels":{"pl":"Data listu","en":"Letter Date","uk":"Дата листа","de":"Datum des Schreibens"}},
            {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
            {"name":"sender_address","type":"text","required":true,"labels":{"pl":"Adres nadawcy","en":"Sender Address","uk":"Адреса відправника","de":"Adresse des Absenders"}},
            {"name":"sender_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail nadawcy","en":"Sender Phone & Email","uk":"Телефон та e-mail відправника","de":"Telefon und E-Mail des Absenders"}},
            {"name":"recipient_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa odbiorcy","en":"Recipient Name/Company Name","uk":"ПІБ/назва одержувача","de":"Name/Firmenname des Empfängers"}},
            {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
            {"name":"recipient_city","type":"text","required":true,"labels":{"pl":"Miejscowość (Odbiorca)","en":"City (Recipient)","uk":"Місто (Одержувач)","de":"Ort (Empfänger)"}},
            {"name":"recipient_state","type":"text","required":true,"labels":{"pl":"Stan (Odbiorca)","en":"State (Recipient)","uk":"Штат (Одержувач)","de":"Bundesstaat (Empfänger)"}},
            {"name":"recipient_zip_code","type":"text","required":true,"labels":{"pl":"Kod pocztowy (Odbiorca)","en":"Zip Code (Recipient)","uk":"Поштовий індекс (Одержувач)","de":"Postleitzahl (Empfänger)"}},
            {"name":"subject_of_demand","type":"text","required":true,"labels":{"pl":"Przedmiot żądania","en":"Subject of Demand","uk":"Предмет вимоги","de":"Gegenstand der Forderung"}},
            {"name":"incident_description","type":"textarea","required":true,"labels":{"pl":"Szczegółowy opis incydentu/problemu","en":"Detailed description of incident/problem","uk":"Детальний опис інциденту/проблеми","de":"Detaillierte Beschreibung des Vorfalls/Problems"}},
            {"name":"demanded_action","type":"textarea","required":true,"labels":{"pl":"Żądane działanie/rozstrzygnięcie","en":"Demanded action/resolution","uk":"Затребувані дії/вирішення","de":"Geforderte Maßnahme/Lösung"}},
            {"name":"deadline_for_response","type":"date","required":true,"labels":{"pl":"Termin odpowiedzi","en":"Deadline for Response","uk":"Термін відповіді","de":"Frist für Antwort"}},
            {"name":"consequences_of_non_compliance","type":"textarea","required":true,"labels":{"pl":"Konsekwencje braku zgodności","en":"Consequences of Non-Compliance","uk":"Наслідки недотримання","de":"Konsequenzen bei Nichteinhaltung"}},
            {"name":"attachments","type":"textarea","required":false,"labels":{"pl":"Załączniki (opcjonalnie)","en":"Attachments (optional)","uk":"Додатки (необов\'язково)","de":"Anhänge (optional)"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Demand Letter',
                        'description' => 'A formal letter demanding action or payment from another party.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[sender_full_name]]</p><p>[[sender_address]]</p><p>[[sender_city]], [[sender_state]] [[sender_zip_code]]</p><p>[[sender_phone_email]]</p><br/><p>[[letter_date]]</p><br/><p>[[recipient_name]]</p><p>[[recipient_address]]</p><p>[[recipient_city]], [[recipient_state]] [[recipient_zip_code]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Subject: [[subject_of_demand]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Dear [[recipient_name]],</p><p>This letter serves as a formal demand regarding the following incident/problem:</p><p>[[incident_description]]</p><p>Therefore, I demand that you [[demanded_action]] by <strong>[[deadline_for_response]]</strong>.</p><p>Be advised that if this demand is not met by the specified deadline, [[consequences_of_non_compliance]]</p><p>Enclosed are copies of relevant documents: [[attachments]]</p><br/><p>Sincerely,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[sender_full_name]])</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Лист-вимога',
                        'description' => 'Офіційний лист з вимогою дії або оплати від іншої сторони.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[sender_full_name]]</p><p>[[sender_address]]</p><p>[[sender_city]], [[sender_state]] [[sender_zip_code]]</p><p>[[sender_phone_email]]</p><br/><p>[[letter_date]] р.</p><br/><p>[[recipient_name]]</p><p>[[recipient_address]]</p><p>[[recipient_city]], [[recipient_state]] [[recipient_zip_code]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Тема: [[subject_of_demand]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Шановний/а [[recipient_name]],</p><p>Цей лист є офіційною вимогою щодо наступного інциденту/проблеми:</p><p>[[incident_description]]</p><p>Тому я вимагаю, щоб Ви [[demanded_action]] до <strong>[[deadline_for_response]]</strong>.</p><p>Повідомляємо, що у разі невиконання цієї вимоги до зазначеного терміну, [[consequences_of_non_compliance]]</p><p>Додаються копії відповідних документів: [[attachments]]</p><br/><p>З повагою,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[sender_full_name]])</p></div>'
                    ],
                    'de' => [
                        'title' => 'Aufforderungsschreiben',
                        'description' => 'Ein formelles Schreiben, das eine Handlung oder Zahlung von einer anderen Partei fordert.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[sender_full_name]]</p><p>[[sender_address]]</p><p>[[sender_city]], [[sender_state]] [[sender_zip_code]]</p><p>[[sender_phone_email]]</p><br/><p>[[letter_date]]</p><br/><p>[[recipient_name]]</p><p>[[recipient_address]]</p><p>[[recipient_city]], [[recipient_state]] [[recipient_zip_code]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Betreff: [[subject_of_demand]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Sehr geehrte/r Herr/Frau [[recipient_name]],</p><p>dieses Schreiben dient als formelle Aufforderung bezüglich des folgenden Vorfalls/Problems:</p><p>[[incident_description]]</p><p>Daher fordere ich Sie hiermit auf, [[demanded_action]] bis zum <strong>[[deadline_for_response]]</strong>.</p><p>Beachten Sie, dass bei Nichteinhaltung dieser Forderung bis zur angegebenen Frist [[consequences_of_non_compliance]]</p><p>Anbei finden Sie Kopien relevanter Dokumente: [[attachments]]</p><br/><p>Mit freundlichen Grüßen,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[sender_full_name]])</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Pismo-wezwanie',
                        'description' => 'Formalne pismo żądające działania lub płatności od innej strony.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[sender_full_name]]</p><p>[[sender_address]]</p><p>[[sender_city]], [[sender_state]] [[sender_zip_code]]</p><p>[[sender_phone_email]]</p><br/><p>[[letter_date]] r.</p><br/><p>[[recipient_name]]</p><p>[[recipient_address]]</p><p>[[recipient_city]], [[recipient_state]] [[recipient_zip_code]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Temat: [[subject_of_demand]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Szanowny/a Panie/Pani [[recipient_name]],</p><p>Niniejsze pismo stanowi formalne żądanie dotyczące następującego incydentu/problemu:</p><p>[[incident_description]]</p><p>Dlatego żądam, aby Państwo [[demanded_action]] do dnia <strong>[[deadline_for_response]]</strong>.</p><p>Informujemy, że w przypadku nie spełnienia tego żądania w określonym terminie, [[consequences_of_non_compliance]]</p><p>W załączeniu znajdują się kopie odpowiednich dokumentów: [[attachments]]</p><br/><p>Z poważaniem,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; font-size: 12px; text-align: left;"><p>___________________</p><p>([[sender_full_name]])</p></div>'
                    ]
                ]
            ],

            // --- Гарантийное письмо / Letter of Guarantee ---
            [
                'slug' => 'guarantee-letter-us',
                'fields' => '[
            {"name":"city","type":"text","required":true,"labels":{"pl":"Miejscowość","en":"City","uk":"Місто","de":"Ort"}},
            {"name":"state","type":"text","required":true,"labels":{"pl":"Stan","en":"State","uk":"Штат","de":"Bundesstaat"}},
            {"name":"zip_code","type":"text","required":true,"labels":{"pl":"Kod pocztowy","en":"Zip Code","uk":"Поштовий індекс","de":"Postleitzahl"}},
            {"name":"letter_date","type":"date","required":true,"labels":{"pl":"Data listu","en":"Letter Date","uk":"Дата листа","de":"Datum des Schreibens"}},
            {"name":"guarantor_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko gwaranta","en":"Guarantor Full Name","uk":"ПІБ гаранта","de":"Vollständiger Name des Garanten"}},
            {"name":"guarantor_address","type":"text","required":true,"labels":{"pl":"Adres gwaranta","en":"Guarantor Address","uk":"Адреса гаранта","de":"Adresse des Garanten"}},
            {"name":"beneficiary_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko beneficjenta","en":"Beneficiary Full Name","uk":"ПІБ бенефіціара","de":"Vollständiger Name des Begünstigten"}},
            {"name":"beneficiary_address","type":"text","required":true,"labels":{"pl":"Adres beneficjenta","en":"Beneficiary Address","uk":"Адреса бенефіціара","de":"Adresse des Begünstigten"}},
            {"name":"debtor_full_name","type":"text","required":false,"labels":{"pl":"Imię i nazwisko dłużnika (jeśli dotyczy)","en":"Debtor Full Name (if applicable)","uk":"ПІБ боржника (якщо застосовно)","de":"Vollständiger Name des Schuldners (falls zutreffend)"}},
            {"name":"guaranteed_obligation_description","type":"textarea","required":true,"labels":{"pl":"Opis zobowiązania objętego gwarancją","en":"Description of guaranteed obligation","uk":"Опис гарантованого зобов\'язання","de":"Beschreibung der garantierten Verpflichtung"}},
            {"name":"guaranteed_amount","type":"number","required":false,"labels":{"pl":"Gwarantowana kwota (opcjonalnie)","en":"Guaranteed Amount (optional)","uk":"Гарантована сума (необов\'язково)","de":"Garantierter Betrag (optional)"}},
            {"name":"currency","type":"text","required":true,"labels":{"pl":"Waluta","en":"Currency","uk":"Валюта","de":"Währung"}},
            {"name":"guarantee_conditions","type":"textarea","required":true,"labels":{"pl":"Warunki gwarancji","en":"Guarantee Conditions","uk":"Умови гарантії","de":"Garantiebedingungen"}},
            {"name":"guarantee_duration","type":"text","required":true,"labels":{"pl":"Okres obowiązywania gwarancji","en":"Guarantee Duration","uk":"Термін дії гарантії","de":"Garantiedauer"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Letter of Guarantee',
                        'description' => 'A formal letter providing a guarantee for an obligation or payment.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[guarantor_full_name]]</p><p>[[guarantor_address]]</p><p>[[city]], [[state]] [[zip_code]]</p><br/><p>[[letter_date]]</p><br/><p>[[beneficiary_full_name]]</p><p>[[beneficiary_address]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Subject: Letter of Guarantee for [[guaranteed_obligation_description]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Dear [[beneficiary_full_name]],</p><p>This letter serves as a guarantee for the obligation of [[debtor_full_name]] (if applicable) regarding: [[guaranteed_obligation_description]].</p><p>The guaranteed amount is: [[guaranteed_amount]] [[currency]] (if applicable).</p><p>The conditions of this guarantee are as follows: [[guarantee_conditions]]</p><p>This guarantee is valid for the period of: [[guarantee_duration]].</p><br/><p>Sincerely,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[guarantor_full_name]])</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Гарантійний лист',
                        'description' => 'Офіційний лист, що надає гарантію зобов\'язання або оплати.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[guarantor_full_name]]</p><p>[[guarantor_address]]</p><p>[[city]], [[state]] [[zip_code]]</p><br/><p>[[letter_date]] р.</p><br/><p>[[beneficiary_full_name]]</p><p>[[beneficiary_address]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Тема: Гарантійний лист щодо [[guaranteed_obligation_description]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Шановний/а [[beneficiary_full_name]],</p><p>Цей лист є гарантією зобов\'язання [[debtor_full_name]] (якщо застосовно) щодо: [[guaranteed_obligation_description]].</p><p>Гарантована сума становить: [[guaranteed_amount]] [[currency]] (якщо застосовно).</p><p>Умови цієї гарантії такі: [[guarantee_conditions]]</p><p>Ця гарантія дійсна протягом: [[guarantee_duration]].</p><br/><p>З повагою,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[guarantor_full_name]])</p></div>'
                    ],
                    'de' => [
                        'title' => 'Garantieschreiben',
                        'description' => 'Ein formelles Schreiben, das eine Garantie für eine Verpflichtung oder Zahlung bietet.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[guarantor_full_name]]</p><p>[[guarantor_address]]</p><p>[[city]], [[state]] [[zip_code]]</p><br/><p>[[letter_date]]</p><br/><p>[[beneficiary_full_name]]</p><p>[[beneficiary_address]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Betreff: Garantieschreiben für [[guaranteed_obligation_description]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Sehr geehrte/r Herr/Frau [[beneficiary_full_name]],</p><p>dieses Schreiben dient als Garantie für die Verpflichtung von [[debtor_full_name]] (falls zutreffend) bezüglich: [[guaranteed_obligation_description]].</p><p>Der garantierte Betrag ist: [[guaranteed_amount]] [[currency]] (falls zutreffend).</p><p>Die Bedingungen dieser Garantie lauten wie folgt: [[guarantee_conditions]]</p><p>Diese Garantie ist gültig für den Zeitraum von: [[guarantee_duration]].</p><br/><p>Mit freundlichen Grüßen,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[guarantor_full_name]])</p></div>'
                    ],
                    'pl' => [
                        'title' => 'List gwarancyjny',
                        'description' => 'Formalne pismo stanowiące gwarancję zobowiązania lub płatności.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[guarantor_full_name]]</p><p>[[guarantor_address]]</p><p>[[city]], [[state]] [[zip_code]]</p><br/><p>[[letter_date]] r.</p><br/><p>[[beneficiary_full_name]]</p><p>[[beneficiary_address]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Temat: List gwarancyjny dla [[guaranteed_obligation_description]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Szanowny/a Panie/Pani [[beneficiary_full_name]],</p><p>Niniejsze pismo stanowi gwarancję zobowiązania [[debtor_full_name]] (jeśli dotyczy) dotyczącego: [[guaranteed_obligation_description]].</p><p>Gwarantowana kwota wynosi: [[guaranteed_amount]] [[currency]] (jeśli dotyczy).</p><p>Warunki niniejszej gwarancji są następujące: [[guarantee_conditions]]</p><p>Niniejsza gwarancja jest ważna przez okres: [[guarantee_duration]].</p><br/><p>Z poważaniem,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[guarantor_full_name]])</p></div>'
                    ]
                ]
            ],

            // --- Официальный запрос / Official Request (Formal Inquiry) ---
            [
                'slug' => 'official-inquiry-us',
                'fields' => '[
            {"name":"sender_city","type":"text","required":true,"labels":{"pl":"Miejscowość (Nadawca)","en":"City (Sender)","uk":"Місто (Відправник)","de":"Ort (Absender)"}},
            {"name":"sender_state","type":"text","required":true,"labels":{"pl":"Stan (Nadawca)","en":"State (Sender)","uk":"Штат (Відправник)","de":"Bundesstaat (Absender)"}},
            {"name":"sender_zip_code","type":"text","required":true,"labels":{"pl":"Kod pocztowy (Nadawca)","en":"Zip Code (Sender)","uk":"Поштовий індекс (Відправник)","de":"Postleitzahl (Absender)"}},
            {"name":"letter_date","type":"date","required":true,"labels":{"pl":"Data listu","en":"Letter Date","uk":"Дата листа","de":"Datum des Schreibens"}},
            {"name":"sender_full_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko nadawcy","en":"Sender Full Name","uk":"ПІБ відправника","de":"Vollständiger Name des Absenders"}},
            {"name":"sender_address","type":"text","required":true,"labels":{"pl":"Adres nadawcy","en":"Sender Address","uk":"Адреса відправника","de":"Adresse des Absenders"}},
            {"name":"sender_phone_email","type":"text","required":true,"labels":{"pl":"Telefon i e-mail nadawcy","en":"Sender Phone & Email","uk":"Телефон та e-mail відправника","de":"Telefon und E-Mail des Absenders"}},
            {"name":"recipient_name","type":"text","required":true,"labels":{"pl":"Imię i nazwisko/nazwa odbiorcy","en":"Recipient Name/Company Name","uk":"ПІБ/назва одержувача","de":"Name/Firmenname des Empfängers"}},
            {"name":"recipient_title","type":"text","required":false,"labels":{"pl":"Stanowisko odbiorcy (opcjonalnie)","en":"Recipient\'s Title (optional)","uk":"Посада одержувача (необов\'язково)","de":"Position des Empfängers (optional)"}},
            {"name":"recipient_organization","type":"text","required":true,"labels":{"pl":"Organizacja odbiorcy","en":"Recipient\'s Organization","uk":"Організація одержувача","de":"Organisation des Empfängers"}},
            {"name":"recipient_address","type":"text","required":true,"labels":{"pl":"Adres odbiorcy","en":"Recipient Address","uk":"Адреса одержувача","de":"Adresse des Empfängers"}},
            {"name":"recipient_city","type":"text","required":true,"labels":{"pl":"Miejscowość (Odbiorca)","en":"City (Recipient)","uk":"Місто (Одержувач)","de":"Ort (Empfänger)"}},
            {"name":"recipient_state","type":"text","required":true,"labels":{"pl":"Stan (Odbiorca)","en":"State (Recipient)","uk":"Штат (Одержувач)","de":"Bundesstaat (Empfänger)"}},
            {"name":"recipient_zip_code","type":"text","required":true,"labels":{"pl":"Kod pocztowy (Odbiorca)","en":"Zip Code (Recipient)","uk":"Поштовий індекс (Одержувач)","de":"Postleitzahl (Empfänger)"}},
            {"name":"subject_of_inquiry","type":"text","required":true,"labels":{"pl":"Przedmiot zapytania","en":"Subject of Inquiry","uk":"Предмет запиту","de":"Gegenstand der Anfrage"}},
            {"name":"inquiry_details","type":"textarea","required":true,"labels":{"pl":"Szczegóły zapytania (konkretne pytania, wymagane informacje/dokumenty)","en":"Inquiry details (specific questions, required information/documents)","uk":"Деталі запиту (конкретні питання, необхідна інформація/документи)","de":"Details der Anfrage (spezifische Fragen, benötigte Informationen/Dokumente)"}},
            {"name":"reason_for_inquiry","type":"textarea","required":true,"labels":{"pl":"Powód zapytania","en":"Reason for Inquiry","uk":"Причина запиту","de":"Grund der Anfrage"}},
            {"name":"deadline_for_response","type":"date","required":false,"labels":{"pl":"Termin odpowiedzi (opcjonalnie)","en":"Deadline for Response (optional)","uk":"Термін відповіді (необов\'язково)","de":"Frist für Antwort (optional)"}}
        ]',
                'translations' => [
                    'en' => [
                        'title' => 'Formal Inquiry',
                        'description' => 'A formal letter requesting specific information or documents.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[sender_full_name]]</p><p>[[sender_address]]</p><p>[[sender_city]], [[sender_state]] [[sender_zip_code]]</p><p>[[sender_phone_email]]</p><br/><p>[[letter_date]]</p><br/><p>[[recipient_name]]</p><p>[[recipient_title]]</p><p>[[recipient_organization]]</p><p>[[recipient_address]]</p><p>[[recipient_city]], [[recipient_state]] [[recipient_zip_code]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Subject: Formal Inquiry regarding [[subject_of_inquiry]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Dear [[recipient_name]],</p><p>I am writing to formally request information regarding [[subject_of_inquiry]].</p><p>The reason for this inquiry is: [[reason_for_inquiry]]</p><p>Specifically, I would appreciate it if you could provide the following:</p><p>[[inquiry_details]]</p><p>I would appreciate a response by <strong>[[deadline_for_response]]</strong> (if applicable).</p><br/><p>Sincerely,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[sender_full_name]])</p></div>'
                    ],
                    'uk' => [
                        'title' => 'Офіційний запит',
                        'description' => 'Офіційний лист із запитом на конкретну інформацію або документи.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[sender_full_name]]</p><p>[[sender_address]]</p><p>[[sender_city]], [[sender_state]] [[sender_zip_code]]</p><p>[[sender_phone_email]]</p><br/><p>[[letter_date]] р.</p><br/><p>[[recipient_name]]</p><p>[[recipient_title]]</p><p>[[recipient_organization]]</p><p>[[recipient_address]]</p><p>[[recipient_city]], [[recipient_state]] [[recipient_zip_code]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Тема: Офіційний запит щодо [[subject_of_inquiry]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Шановний/а [[recipient_name]],</p><p>Я пишу, щоб офіційно запросити інформацію щодо [[subject_of_inquiry]].</p><p>Причина цього запиту: [[reason_for_inquiry]]</p><p>Зокрема, я був би вдячний, якби Ви могли надати наступне:</p><p>[[inquiry_details]]</p><p>Я був би вдячний за відповідь до <strong>[[deadline_for_response]]</strong> (якщо застосовно).</p><br/><p>З повагою,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[sender_full_name]])</p></div>'
                    ],
                    'de' => [
                        'title' => 'Formelle Anfrage',
                        'description' => 'Ein formelles Schreiben zur Anforderung spezifischer Informationen oder Dokumente.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[sender_full_name]]</p><p>[[sender_address]]</p><p>[[sender_city]], [[sender_state]] [[sender_zip_code]]</p><p>[[sender_phone_email]]</p><br/><p>[[letter_date]]</p><br/><p>[[recipient_name]]</p><p>[[recipient_title]]</p><p>[[recipient_organization]]</p><p>[[recipient_address]]</p><p>[[recipient_city]], [[recipient_state]] [[recipient_zip_code]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Betreff: Formelle Anfrage bezüglich [[subject_of_inquiry]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Sehr geehrte/r Herr/Frau [[recipient_name]],</p><p>ich schreibe Ihnen, um formell Informationen bezüglich [[subject_of_inquiry]] anzufordern.</p><p>Der Grund für diese Anfrage ist: [[reason_for_inquiry]]</p><p>Insbesondere würde ich es begrüßen, wenn Sie Folgendes bereitstellen könnten:</p><p>[[inquiry_details]]</p><p>Ich würde mich über eine Antwort bis zum <strong>[[deadline_for_response]]</strong> (falls zutreffend) freuen.</p><br/><p>Mit freundlichen Grüßen,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[sender_full_name]])</p></div>'
                    ],
                    'pl' => [
                        'title' => 'Formalne zapytanie',
                        'description' => 'Formalne pismo z prośbą o konkretne informacje lub dokumenty.',
                        'header_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.5;"><p>[[sender_full_name]]</p><p>[[sender_address]]</p><p>[[sender_city]], [[sender_state]] [[sender_zip_code]]</p><p>[[sender_phone_email]]</p><br/><p>[[letter_date]] r.</p><br/><p>[[recipient_name]]</p><p>[[recipient_title]]</p><p>[[recipient_organization]]</p><p>[[recipient_address]]</p><p>[[recipient_city]], [[recipient_state]] [[recipient_zip_code]]</p><br/><h1 style="font-size: 18px; font-weight: bold; text-align: center;">Temat: Formalne zapytanie dotyczące [[subject_of_inquiry]]</h1></div>',
                        'body_html' => '<div style="font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.6; text-align: justify;"><p>Szanowny/a Panie/Pani [[recipient_name]],</p><p>Piszę, aby formalnie poprosić o informacje dotyczące [[subject_of_inquiry]].</p><p>Powodem tego zapytania jest: [[reason_for_inquiry]]</p><p>W szczególności, byłbym wdzięczny, gdyby Państwo mogli dostarczyć następujące:</p><p>[[inquiry_details]]</p><p>Byłbym wdzięczny za odpowiedź do dnia <strong>[[deadline_for_response]]</strong> (jeśli dotyczy).</p><br/><p>Z poważaniem,</p></div>',
                        'footer_html' => '<div style="font-family: DejaVu Sans, sans-serif; margin-top: 40px; text-align: left;"><p>___________________</p><p>([[sender_full_name]])</p></div>'
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
                'country_code' => $data['country_code'] ?? 'US',
                'fields' => json_decode($data['fields'], true),
            ]
        );

        if (isset($data['translations']) && is_array($data['translations'])) {
            foreach ($data['translations'] as $locale => $transData) {
                // Ensure all languages have HTML content by falling back to Polish version if empty
                $transData['header_html'] = $transData['header_html'] ?? ($data['translations']['us']['header_html'] ?? '');
                $transData['body_html'] = $transData['body_html'] ?? ($data['translations']['us']['body_html'] ?? '');
                $transData['footer_html'] = $transData['footer_html'] ?? ($data['translations']['us']['footer_html'] ?? '');

                $template->translations()->updateOrCreate(['locale' => $locale], $transData);
            }
        }
    }
}
